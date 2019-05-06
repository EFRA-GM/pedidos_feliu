<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	# Todas las acciones que pasar antes de que el usuario ingrese sus credenciales
	public function beforeFilter(){
		# Se manda a llamar al beforefilter del padre
		parent::beforeFilter();

		# A que acciones pueden accedes si estar autenticados
		//$this->Auth->allow('add');
	}


	public function isAuthorized($user){
		if($user['role'] == 'personal'){
			# $this->action investigar la funcion de esta variable
			if(in_array($this->action, array('add','index'))){
				return true; # Si es una de las acciones de arriba permitir acceco
			}else{ # De lo contrario restringir
				if($this->Auth->user('id')){
					$this->Session->setFlash('No teiene los privilegios para acceder', 'default', array('class' => 'alert alert-danger'));
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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Datos guardados correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Los datos no se agregaron. Por favor, intente de nuevo.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	# Accion para que los usuarios puedan logearse en el sistema
	public function login(){

		
		if ($this->request->is('post')) {
			//debug($this->request->data);
			//$this->request->data['User']['username'] = 'efra';
			//$this->request->data['User']['password'] = 'efra';
			if($this->request->data['User']['username'] == '' && $this->request->data['User']['password'] == ''){
				if($this->request->data['User']['edad'] >= 18){
					$this->request->data['User']['username'] = 'publico';
					$this->request->data['User']['password'] = 'publico';
				}else{
					$this->Session->setFlash('Debes tener mas de 18 años para poder ingresar', 'default', array('class' => 'alert alert-danger'));
					$this->redirect(array('action' => 'login'));
				}
			}

			if ($this->Auth->login()) { # si se pudo autenticar el usuario
				return $this->redirect($this->Auth->redirectUrl()); # Mandarlo al url que indicamos
			}
			$this->Session->setFlash('Usuario y/o contraseña incorrecta', 'default', array('class' => 'alert alert-danger'));
		}

		//$this->layout = 'signin';
	}

	# Accion para cerrar sesion
	public function logout(){
		# cierra sesion y redirecciona
		return $this->redirect($this->Auth->logout());
	}
}
