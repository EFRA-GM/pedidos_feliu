<?php
App::uses('AppController', 'Controller');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 */
class PedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */

	# 'order'=>'Pedido.fecha_solicitud DESC'	--> Se ordena la tabla de acuerdo a la fecha de forma descendente
	public $components = array('Paginator'=>array('order'=>'Pedido.fecha_solicitud DESC'));

	public function isAuthorized($user){
		if($user['role'] == 'personal'){
			if(in_array($this->action, array('view','index','add','edit'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No tiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		if($user['role'] == 'cliente'){
			if(in_array($this->action, array('view','index','carrito','add','confirmarPedido', 'quitar','edit'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No tiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		if($user['role'] == 'publico'){
			if($this->Auth->user('id')){
					$this->Session->setFlash('No tiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
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
		$this->Pedido->recursive = 0;
		$this->set('pedidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
		$this->set('pedido', $this->Pedido->find('first', $options));
	}

	public function carrito(){
		$id_cliente = $this->_getCliente();	

		$pedido_cliente = $this->Pedido->find('all', array('conditions' => array('Pedido.cliente_id' => $id_cliente, 'Pedido.estado' => 0)));
		//debug($pedido_cliente);
		if (count($pedido_cliente) == 0 || count($pedido_cliente[0]['Producto']) == 0) {
			$this->Session->setFlash('No hay productos en el pedido', 'default', array('class' => 'alert alert-warning'));
			return $this->redirect(array('controller' => 'marcas','action' => 'index'));
		}


		$productos = $pedido_cliente[0]['Producto'];
		$this->set('productos', $productos );

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {


		// Este dato debe ser dinamico de acuerdo al ACL
		$id_usuario = $this->_getCliente();

		if($this->request->is('ajax')){


				$id_pedido_pendiente = $this->Pedido->find('all', array('fields' => array('Pedido.id'), 'conditions' => array('Pedido.cliente_id' => $id_usuario, 'Pedido.estado' => 0)));
				
				$pedido = 0;
				if(!$id_pedido_pendiente){
					# Si no hay ningun pedido pendiente
					# Entonces crear uno y guardar el id generado en $id_pedido_pendiente
					//echo 'NO EXISTE PEDIDO';
					$nuevo_pedido = array('cliente_id' => $id_usuario, 'estado' => 0, 'fecha_solicitud' => date("Y-m-d H:i:s"));
					$this->Pedido->saveAll($nuevo_pedido);
					$pedido = $this->Pedido->id;
				}else{
					# Esto guarda solo el id no en arreglo
					$pedido = $id_pedido_pendiente[0]['Pedido']['id'];	
				}
				


				# Recibir los parametros que enviamos desde el script js 
				$id = $this->request->data['id'];
				$cantidad = $this->request->data['cantidad'];

				
				
				# Recuperame el producto con este ID y guardalo en $producto
				App::import('Model', 'Producto');
      		 	$cerveza = new Producto();
       			$producto = $cerveza->findById($id);


       			
				# Recupera el precio de ese producto y guardalo en $precio
				
				$precio = $producto['Producto']['precio'];
				
				
				$subtotal = $cantidad * $precio;



				
				# Crear el arreglo con los datos que vamos a guardar en la tabla de BD
				$detalle_pedido = array('producto_id' => $id, 'pedido_id' => $id_pedido_pendiente, 'cantdad' => $cantidad, 'precio_unitario' => $precio);

      		 
      		 	$arreglo = array('PedidosProducto' => array('producto_id' => $id,
																'pedido_id' => $pedido,
																'cantdad' => $cantidad,
																'precio_unitario' => $precio));

      		 	
      		 	$this->Pedido->PedidosProducto->save($arreglo);
       			
      		 	# IMPORTANTE: RECUERDA VERIFICAR QUE EL PRODUCTO NO ESTE AGREADO YA

       			
				/*
				// Select platillo_id from Pedidos where platillo_id=$id
				$existe_pedido = $this->Pedido->find('all', array('fields' => array('Pedido.platillo_id'),'conditions'=>array('Pedido.platillo_id'=>$id)));

				if (count($existe_pedido)==0) { 	# Si todavia no esta añadido el platillo
					# Guardar el arreglo con el modelo Pedido
					$this->Pedido->save($pedido);
				}
				*/
				
				
			}


		$this->autoRender = false;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


	# Muestra la vista con los detalles del pedido 
	public function edit() {
		$cliente_id = $this->_getCliente();	# REmplazar por usuario de sesion


		if ($this->request->is(array('post', 'put'))) {
			# Obtener el pedido del cliente que se quiere confirmar
			$pedido_cliente = $this->Pedido->find('all', array('conditions' => array('Pedido.cliente_id' => $cliente_id, 'Pedido.estado' => 0)));
			//debug($pedido_cliente);
			$this->set('pedido_cliente',$pedido_cliente);

		}
	}

	public function confirmarPedido() {
		$cliente_id = $this->_getCliente();	# REmplazar por usuario de sesion

		if ($this->request->is(array('post', 'put'))) {
			# Obtener el pedido del cliente que se quiere confirmar
			$pedido_cliente = $this->Pedido->find('all', array('conditions' => array('Pedido.cliente_id' => $cliente_id, 'Pedido.estado' => 0)));
			
			# se prepara el arreglo para modificar el pedido, especificamente el estado ponerlo a 1 y la fecha a la fecha actual
			$guardar_pedido = $pedido_cliente[0]['Pedido'];
			$guardar_pedido['estado'] = 1;
			$guardar_pedido['fecha_solicitud'] = date("Y-m-d H:i:s");

			# Se Actaliza el registro y se manda un mensaje dependiendo del resultado
			if($this->Pedido->save($guardar_pedido)){
				$this->Flash->success(_('El Pedido fue enviado con exito'));
				return $this->redirect(array('controller' => 'marcas','action' => 'index'));
			}else{
				$this->Flash->error(_('Ocurrio un problema. Intentelo de nuevo'));
				return $this->redirect(array('controller' => 'pedidos','action' => 'carrito'));
			}

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
		$this->Pedido->id = $id;
		if (!$this->Pedido->exists()) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pedido->delete()) {
			$this->Flash->success(__('The pedido has been deleted.'));
		} else {
			$this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function quitar(){

			$cliente_id = $this->_getCliente();

			$pedido_cliente = $this->Pedido->find('all', array('conditions' => array('Pedido.cliente_id' => $cliente_id, 'Pedido.estado' => 0)));
			
			$id_pedido = $pedido_cliente[0]['Pedido']['id'];
			
			if($this->Pedido->PedidosProducto->deleteAll(array('PedidosProducto.pedido_id' => $id_pedido),false)){
				$this->Session->setFlash('Todos los pedidos se han eliminado', 'default', array('class' => 'alert alert-success'));
			}else{
				$this->Session->setFlash('Ocurrio un Error', 'default', array('class' => 'alert alert-danger'));
			}
			
			return $this->redirect(array('controller' => 'marcas', 'action' => 'index'));

		}

		# Funcion que devuelve el id del cliente que utiliza la aplicacion
		public function _getCliente(){

			if($this->Auth->user()['role'] == 'cliente'){
				# Recuperame Todos los datos del usuario actual
				App::import('Model', 'User');
      		 	$objUser = new User();
       			$usuario = $objUser->findById($this->Auth->user()['id']);
       			return $usuario['Cliente'][0]['id'];
			}else{
				return 0;
			}
		}

		

}
