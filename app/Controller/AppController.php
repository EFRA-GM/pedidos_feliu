<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				'controller' => 'marcas',
				'action' => 'index'			
			),
			'logoutRedirect' => array(
				'controller' => 'users',
				'action' => 'login'
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			),
			'authorize' => array('Controller'),	# Indica que la autorizacion la aremos desde el contr.
			'authError' => false
		)
	);

	# Todas las acciones que pasan antes de que el usuario ingrese sus credenciales
	public function beforeFilter(){
		# A que acciones pueden accedes sin estar autenticados
		$this->Auth->allow('login', 'logout');
		# Establecer una variable que nos almacene los datos del usuario que se ha autenticado
		$this->set('current_user', $this->Auth->user());
	}


	# controlara las acciones permitidas de acuerdo con el tipo de usuario
	public function isAuthorized($user){

		if(isset($user['role']) && $user['role'] == 'admin'){
			# Si el usuario es de tipo admin que pueda accceder a cualquier accion
			return true;
		}
		# de lo contrario restingir toas las acciones
		return false;
	}

}
