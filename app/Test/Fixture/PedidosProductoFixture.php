<?php
/**
 * PedidosProducto Fixture
 */
class PedidosProductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'producto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pedido_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantdad' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'precio_unitario' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '6,2', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'producto_id' => 1,
			'pedido_id' => 1,
			'cantdad' => 1,
			'precio_unitario' => ''
		),
	);

}
