<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function isAuthorized($user){
		if($user['role'] == 'cliente'){
			if(in_array($this->action, array('modificar'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No tiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		return parent::isAuthorized($user);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cliente->recursive = 0;
		$this->set('clientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('El cliente no existe'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//debug($this->request->data);
			# Todos los clientes solo podran tener el rol cliente
			$this->request->data['User']['role'] = 'cliente';
			# Asignar fullname
			$this->request->data['User']['fullname'] = $this->request->data['Cliente']['nombre'].' '.$this->request->data['Cliente']['apellido'];
			//$this->Cliente->create();
			if ($this->Cliente->saveAssociated($this->request->data)) {
				$this->Flash->success(__('El cliente se guardo correctamente'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El cliente no pudo ser guardado. Por favor intenta de nuevo.'));
			}
			$users = $this->Cliente->User->find('list');
			$this->set(compact('users'));
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('El cliente no existe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			#Si no se escribio una nueva contraseña se dejara la actual
			if (strlen($this->request->data['User']['password']) == 0) {
				unset($this->request->data['User']['password']);
			}

			# Todos los clientes solo podran tener el rol cliente
			$this->request->data['User']['role'] = 'cliente';
			# Asignar fullname
			$this->request->data['User']['fullname'] = $this->request->data['Cliente']['nombre'].' '.$this->request->data['Cliente']['apellido'];

			if ($this->Cliente->saveAssociated($this->request->data)) {
				$this->Flash->success(__('Los datos se guardaron correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El cliente no pudo ser guardado. Por favor intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('El cliente no existe'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Flash->success(__('El cliente ha sido eliminado.'));
		} else {
			$this->Flash->error(__('El cliente no pudo ser eliminado. Por favor intenta de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function reportes() {
		if ($this->request->is('post')) {
			if ($this->request->data['Pedido']['inicio'] =='' || $this->request->data['Pedido']['fin'] =='') {
				$this->Session->setFlash('Rellene los campos faltantes', 'default', array('class' => 'alert alert-warning'));
			}else{
				$this->request->data['Pedido']['inicio'] = date("Y-m-d", strtotime($this->request->data['Pedido']['inicio']));
				$this->request->data['Pedido']['fin'] = date("Y-m-d", strtotime($this->request->data['Pedido']['fin']));

				if ($this->request->data['Pedido']['inicio'] > $this->request->data['Pedido']['fin']) {
					$this->Session->setFlash('la fecha final debe ser mayor o igual a la fecha de inicio', 'default', array('class' => 'alert alert-warning'));
				}else{
					$registros = $this->Cliente->find('all');
					$lista;

					foreach ($registros as $cliente) {
						$cantidad = 0;
						$subcl = 0;
						$desccl = 0;
						$totcl = 0;
						foreach ($cliente['Pedido'] as $pedido) {
							if ($pedido['fecha_solicitud'] >= $this->request->data['Pedido']['inicio'] && $pedido['fecha_solicitud'] <= $this->request->data['Pedido']['fin'].' 23:59:59' && $pedido['estado'] == 1) {
								$cantidad += 1;
								# Obtener el total de este pedido (subtotal)
								App::import('Model', 'PedidosProducto');
								$modelo = new PedidosProducto();
								$subtotal = $modelo->find('all', array('fields' => array('SUM(PedidosProducto.precio_unitario *cantdad) as TOTAL'), 'conditions' => array('PedidosProducto.pedido_id' => $pedido['id']) ));
								$subcl += $subtotal[0][0]['TOTAL'];

								#obtener el descuento si tiene descuento
								$descuento	= 0;
								if ($pedido['promotion_id'] != 0) {
									App::import('Model', 'Promotion');
									$modelo = new Promotion();
									$promocion = $modelo->findById($pedido['promotion_id']);
									$descuento = $promocion['Promotion']['descuento'] * $subtotal[0][0]['TOTAL'] / 100;
								}
								$desccl += $descuento;
								#obtener el total
								$totcl += ($subtotal[0][0]['TOTAL'] - $descuento);
							}
						}

						$lista[$cliente['Cliente']['nombre'].' '.$cliente['Cliente']['apellido']] = array('Cantidad' => $cantidad, 'Subtotal' => $subcl,'Descuento' => $desccl, 'Total' => $totcl);

					}
					App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
	    			$this->layout = 'pdf'; //this will use the pdf.ctp layout

					$this->set('registros', $lista);
					$this->set('inicio', $this->request->data['Pedido']['inicio']);
					$this->set('fin', $this->request->data['Pedido']['fin']);
					
					$this->render('clientespdf');
				}
			}

		}
	}

	public function modificar() {
		
		
		if ($this->request->is(array('post', 'put'))) {
			#Si no se escribio una nueva contraseña se dejara la actual
			if (strlen($this->request->data['User']['password']) == 0) {
				unset($this->request->data['User']['password']);
			}

			# Todos los clientes solo podran tener el rol cliente
			$this->request->data['User']['role'] = 'cliente';
			# Asignar fullname
			$this->request->data['User']['fullname'] = $this->request->data['Cliente']['nombre'].' '.$this->request->data['Cliente']['apellido'];

			if ($this->Cliente->saveAssociated($this->request->data)) {
				$this->Flash->success(__('Los datos se guardaron correctamente.'));
				return $this->redirect(array('action' => 'modificar'));
			} else {
				$this->Flash->error(__('El cliente no pudo ser guardado. Por favor intenta de nuevo.'));
			}
		} else {
			//$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$client = $this->Cliente->find('first',array('conditions' => array('Cliente.user_id' => $this->Auth->user()['id'])));
			$this->request->data = $client;
		}
	}
}
