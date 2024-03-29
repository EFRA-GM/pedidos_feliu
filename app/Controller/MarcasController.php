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
	public $components = array('Paginator'=>array('limit'=>6, 'conditions' => array('Marca.activo' => 1)));


	public function isAuthorized($user){
		if($user['role'] == 'personal'){
			if(in_array($this->action, array('view','index'))){
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
					$this->Session->setFlash('No teiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		if($user['role'] == 'publico'){
			if(in_array($this->action, array('view','index'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('Inicie sesion para continuar', 'default', array('class' => 'alert alert-danger'));
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
		    $this->request->data['Marca']['activo'] = 1;
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
			if (strlen($this->request->data['Marca']['foto']['name']) == 0) {
				unset($this->request->data['Marca']['foto']);
				unset($this->request->data['Marca']['foto_dir']);
			}
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

	public function ver() {
		$this->set('marcas',$this->Marca->find('all'));
	}

	public function activarDesactivar($id = null, $actual = null) {
		/*if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Marca no permitida'));
		}*/
		$this->request->allowMethod('post', 'delete');
		$actual = ($actual==0) ? 1 : 0;
		$datos = array('Marca' => array('id' => $id, 'activo' => $actual));
		if ($this->Marca->save($datos)) {
			$this->Flash->success(__('La informacion se guardo correctamente'));
		} else {
			$this->Flash->error(__('Ocurrio un error. Intente de nuevo'));
		}
		return $this->redirect(array('action' => 'ver'));
	}
}
