<?php
App::uses('AppController', 'Controller');
/**
 * PedidosProductos Controller
 *
 * @property PedidosProducto $PedidosProducto
 * @property PaginatorComponent $Paginator
 */
class PedidosProductosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PedidosProducto->recursive = 0;
		$this->set('pedidosProductos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PedidosProducto->exists($id)) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		$options = array('conditions' => array('PedidosProducto.' . $this->PedidosProducto->primaryKey => $id));
		$this->set('pedidosProducto', $this->PedidosProducto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
			$this->PedidosProducto->create();
			if ($this->PedidosProducto->save($this->request->data)) {
				debug($this->request->data);
				$this->Flash->success(__('The pedidos producto has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pedidos producto could not be saved. Please, try again.'));
			}
		}
		$productos = $this->PedidosProducto->Producto->find('list');
		$pedidos = $this->PedidosProducto->Pedido->find('list');
		$this->set(compact('productos', 'pedidos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PedidosProducto->exists($id)) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PedidosProducto->save($this->request->data)) {
				$this->Flash->success(__('The pedidos producto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pedidos producto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PedidosProducto.' . $this->PedidosProducto->primaryKey => $id));
			$this->request->data = $this->PedidosProducto->find('first', $options);
		}
		$productos = $this->PedidosProducto->Producto->find('list');
		$pedidos = $this->PedidosProducto->Pedido->find('list');
		$this->set(compact('productos', 'pedidos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PedidosProducto->id = $id;
		if (!$this->PedidosProducto->exists()) {
			throw new NotFoundException(__('Invalid pedidos producto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PedidosProducto->delete()) {
			$this->Flash->success(__('The pedidos producto has been deleted.'));
		} else {
			$this->Flash->error(__('The pedidos producto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function itemupdate(){

			$id_pedido = 0;

			if ($this->request->is('ajax')) {
				# Obtiene el id mandado por ajax
				$id = $this->request->data['id'];
				# Obtiene la cantidad mandado por ajax y si no existe le asigna null
				$cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null; 

				# Si la cantidad recibida es 0 entoncecs convertirla a 1 porque no tiene sentido pedir 0 de un platillo
				if ($cantidad==0) {
					$cantidad=1;
				}



				# Select id, precio, pedido_id from Pedidos where id=$id
				$item = $this->PedidosProducto->find('all', array('fields' => array('PedidosProducto.id', 'PedidosProducto.precio_unitario', 'PedidosProducto.pedido_id'), 'conditions' => array('PedidosProducto.id' => $id)));
				
				# Guarda el precio de ese producto en $precio_item
				$precio_item = $item[0]['PedidosProducto']['precio_unitario'];

				$id_pedido = $item[0]['PedidosProducto']['pedido_id'];

				# Calcula el subtotal
				$subtotal_item = $cantidad * $precio_item;

				# Se prepara en un arreglo los datos a guardar
				$item_update = array('id' => $id, 'cantdad' => $cantidad);

				# Guarda los datos del arreglo en el modelo pedido
				$this->PedidosProducto->save($item_update);

				
			}

			# Select SUM(pedidos.subtotal) as subtotal from pedidos
			$total = $this->PedidosProducto->find('all', array('fields' => array('SUM(PedidosProducto.cantdad * PedidosProducto.precio_unitario) as subtotal'), 'conditions' => array('PedidosProducto.pedido_id' => $id_pedido)));

			# guarda el subtotal en una variabel
			$mostrar_total = $total[0][0]['subtotal'];
			

			# Select id, subtotal from pedidos where id=$id
			$pedido_update = $this->PedidosProducto->find('all', array('fields' => array('PedidosProducto.id', 'PedidosProducto.cantdad', 'PedidosProducto.precio_unitario'), 'conditions' => array('PedidosProducto.id' => $id)));

			
			# Prepara el arreglo que se mandara en formato json
			# el array contiene id, subtotal y total
			$mostrar_pedido = array('id' => $pedido_update[0]['PedidosProducto']['id'], 'subtotal' => $pedido_update[0]['PedidosProducto']['cantdad'] * $pedido_update[0]['PedidosProducto']['precio_unitario'], 'total' => $mostrar_total);

			# Se envia el json
			echo json_encode(compact('mostrar_pedido'));

			# Esta accion no tiene vista
			$this->autoRender=false;

		}


		public function remove(){

			$id_pedido = 0;
			if($this->request->is('ajax')){
				# Si es por ajax obtener el id mandado
				$id = $this->request->data['id'];

				# select pedido_id from pedidosproductos where id = $id
				$item = $this->PedidosProducto->find('all', array('fields' => array('PedidosProducto.pedido_id'), 'conditions' => array('PedidosProducto.id' => $id)));
				$id_pedido = $item[0]['PedidosProducto']['pedido_id'];

				# Eliminar el registro del modelo Pedido que coincida con el id
				$this->PedidosProducto->delete($id);
			}



			# select sum(subtotal) as subtotal from pedidos
			$total_remove = $this->PedidosProducto->find('all', array('fields' => array('SUM(PedidosProducto.cantdad * PedidosProducto.precio_unitario) as subtotal'), 'conditions' => array('PedidosProducto.pedido_id' => $id_pedido)));

			# guardar el subtotal total
			$mostrar_total_remove = $total_remove[0][0]['subtotal'];

			# Selecciona todos los platillos en pedidos
			$pedidos = $this->PedidosProducto->find('all', array('conditions' => array('PedidosProducto.pedido_id' => $id_pedido)));
			if(count($pedidos) == 0){
				# Si no hay entonces pon el total en 0.00 no null
				$mostrar_total_remove = "0.00";
			}

			# mandar la variable con la suma de los subtotales
			echo json_encode(compact('pedidos','mostrar_total_remove'));

			# Esta accion no tiene una vista
			$this->autoRender = false;
		}


		
}
