<?php
App::uses('Noticia', 'Model');

/**
 * Noticia Test Case
 */
class NoticiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.noticia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Noticia = ClassRegistry::init('Noticia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Noticia);

		parent::tearDown();
	}

}
