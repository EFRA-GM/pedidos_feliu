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
	public $components = array('Paginator', 'Flash');

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
}
