<?php
App::uses('AppController', 'Controller');
/**
 * Datos Controller
 *
 * @property Dato $Dato
 * @property PaginatorComponent $Paginator
 */
class DatosController extends AppController {

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
		$this->Dato->recursive = 0;
		$this->set('datos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dato->exists($id)) {
			throw new NotFoundException(__('Invalid dato'));
		}
		$options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
		$this->set('dato', $this->Dato->find('first', $options));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$id = 1;
		if (!$this->Dato->exists($id)) {
			throw new NotFoundException(__('Invalid dato'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dato->save($this->request->data)) {
				$this->Flash->success(__('La informacion se guardó correctamente'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('ocurrio u problema. Por favor intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Dato.' . $this->Dato->primaryKey => $id));
			$this->request->data = $this->Dato->find('first', $options);
		}
	}
}
