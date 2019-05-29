<?php
App::uses('AppController', 'Controller');
/**
 * Noticias Controller
 *
 * @property Noticia $Noticia
 * @property PaginatorComponent $Paginator
 */
class NoticiasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator'=>array('order'=>'Noticia.created DESC'));

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
		$this->Noticia->recursive = 0;
		$this->set('noticias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('La no ticia no existe'));
		}
		$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
		$this->set('noticia', $this->Noticia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Noticia->create();
			if ($this->Noticia->save($this->request->data)) {
				$this->Flash->success(__('La Noticia ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La noticia no pudo ser guardada.Por favor intenta de nuevo.'));
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
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('La no ticia no existe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Noticia->save($this->request->data)) {
				$this->Flash->success(__('La noticia ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('La noticia no pudo ser guardada.Por favor intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
			$this->request->data = $this->Noticia->find('first', $options);
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
		$this->Noticia->id = $id;
		if (!$this->Noticia->exists()) {
			throw new NotFoundException(__('La noticia no existe'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Noticia->delete()) {
			$this->Flash->success(__('La Noticia ha sido eliminada.'));
		} else {
			$this->Flash->error(__('La noticia no pudo ser eliminada.Por favor intenta de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
