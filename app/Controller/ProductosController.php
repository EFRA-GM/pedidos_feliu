<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 * @property PaginatorComponent $Paginator
 */
class ProductosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator' => array('limit' => 5));

	public function isAuthorized($user){
		if($user['role'] == 'personal'){
			if(in_array($this->action, array('view','index','add','edit'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No teiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		if($user['role'] == 'cliente'){
			if(in_array($this->action, array('view','index'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No tiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		if($user['role'] == 'publico'){
			if(in_array($this->action, array('view','index'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('Inicia sesion para continuar', 'default', array('class' => 'alert alert-danger'));
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
		$this->Producto->recursive = 0;
		$this->set('productos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('El producto No existe'));
		}
		$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
		$this->set('producto', $this->Producto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		    $this->request->data['Producto']['activo'] = 1;
			$this->Producto->create();
			if ($this->Producto->save($this->request->data)) {
				$this->Flash->success(__('El Producto ha sido guardado.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El producto no pudo ser guardado. Por favor intenta de nuevo.'));
			}
		}
		$marcas = $this->Producto->Marca->find('list');
		$this->set(compact('marcas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('El producto no existe'));
		}
		if ($this->request->is(array('post', 'put'))) {

			if (strlen($this->request->data['Producto']['foto']['name']) == 0 ) {
				unset($this->request->data['Producto']['foto']);
				unset($this->request->data['Producto']['foto_dir']);
			}

			if ($this->Producto->save($this->request->data)) {
				$this->Flash->success(__('El Producto ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El producto no pudo ser guardado. Por favor intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
			$this->request->data = $this->Producto->find('first', $options);
		}
		$marcas = $this->Producto->Marca->find('list');
		$this->set(compact('marcas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $actual = null) {
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('El producto no existe'));
		}
		$this->request->allowMethod('post', 'delete');
		$actual = ($actual==0) ? 1 : 0;
		$datos = array('Producto' => array('id' => $id, 'activo' => $actual));
		if ($this->Producto->save($datos)) {
			$this->Flash->success(__('la informacion se guardo correctamente'));
		} else {
			$this->Flash->error(__('Ocurrio un problema. Por favor intenta de nuevo.'));
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
					
					App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
	    			$this->layout = 'pdf'; //this will use the pdf.ctp layout

					$registros = $this->Producto->find('all');
					$lista;

					foreach ($registros as $producto) {
						$cantidad = 0;
						foreach ($producto['Pedido'] as $pedido) {
							if ($pedido['fecha_solicitud'] >= $this->request->data['Pedido']['inicio'] && $pedido['fecha_solicitud'] <= $this->request->data['Pedido']['fin'].' 23:59:59' && $pedido['estado'] == 1) {
								$cantidad += $pedido['PedidosProducto']['cantdad'];
							}
						}
						$lista[$producto['Producto']['descripcion']] = array('Marca' => $producto['Marca']['nombre'], 'Cantidad' => $cantidad);
					}

					$this->set('registros', $lista);
					$this->set('inicio', $this->request->data['Pedido']['inicio']);
					$this->set('fin', $this->request->data['Pedido']['fin']);
					
					$this->render('productospdf');
				}
			}

		}
	}

}
