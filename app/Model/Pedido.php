<?php
App::uses('AppModel', 'Model');
/**
 * Pedido Model
 *
 * @property Cliente $Cliente
 */
class Pedido extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'created';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasAndBelongsToMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'joinTable' => 'pedidos_productos',
			'foreignKey' => 'pedido_id',
			'associationForeignKey' => 'producto_id',
			'unique' => 'keepExisting'
		)
	);

}
