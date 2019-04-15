<?php
App::uses('AppController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 * @property PaginatorComponent $Paginator
 */
class MarcasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator'=>array('limit'=>6));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Marca->recursive = 0;
		$this->set('marcas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('La marca no existe'));
		}
		$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
		$this->set('marca', $this->Marca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Marca->create();
			if ($this->Marca->save($this->request->data)) {
				$this->Flash->success(__('La marca ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La marca no pudo ser guardada. Por favor intenta de nuevo.'));
			}
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
		if (!$this->Marca->exists($id)) {
			throw new NotFoundException(__('Marca no permitida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Marca->save($this->request->data)) {
				$this->Flash->success(__('La marca ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La marca no pudo ser guardada. Por favor intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Marca.' . $this->Marca->primaryKey => $id));
			$this->request->data = $this->Marca->find('first', $options);
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Marca no permitida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Marca->delete()) {
			$this->Flash->success(__('La marca ha sido eliminada.'));
		} else {
			$this->Flash->error(__('La marca no pudo ser eliminada. Por favor intenta de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
