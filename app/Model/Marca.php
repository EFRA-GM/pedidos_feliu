<?php
App::uses('AppModel', 'Model');
/**
 * Marca Model
 *
 * @property Producto $Producto
 */
class Marca extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	public $actsAs = array(
		'Upload.Upload' => array(
			'foto' => array(				# para alamacenar las imagenes de la bd
				'field' => array(
					'dir' => 'foto_dir'
				),
				'thumbnailMethod' => 'php',
				'thumbnailSizes' => array(
					'vga' => '600x450',
					'thumb' => '300x300'
				),
				'deleteOnUpdate' => true,
				'deleteFolderOnDelete' => true
			)
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foto' => array(
			'uploadError' => array(			# Por si exste algun arror de no se subio
				'rule' => 'uploadError',
				'message' => 'Algo anda mal! Intenta de nuevo',
				'on' => 'create'			# cada vez que creemos un nuevo registro, valida que necesariamente necesitamos subir una imagen
			),
			'isUnderPhpSizeLimit' => array(
				'rule' => 'isUnderPhpSizeLimit',
				'message' => 'Archivo muy pesado'
			),
			'isValidMimeType' => array(
				'rule' => array('isValidMimeType', array('image/jpeg','image/png'),'false'),
				'message' => 'la imagen no es jpg ni png'
			),
			'isValidExtension' => array(
				'rule' => array('isValidExtension', array('jpg','png'),false),
				'message' => 'La imagen no tien la extension jpg ni png'
			),
			'checkUniqueName' => array(
				'rule' => array('checkUniqueName'),
				'message' => 'La imagen ya se encuentra registrada',
				'on' => 'update'
			)
			/*  Se tubo que quitar esta valdacion porque henera conflictos
			'isBelowMaxSize' => array(
				'rule' => array('isBelowMaxSize' => 1048576), 	# solo permite 1 Mb
				'message' => 'El tamaño de la imagen es demasiado grande'
			)*/
		)
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'marca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);



	# Funcion para que funcione la validacion
	function checkUniqueName($data){
		$isUnique = $this->find('first',array('fields' => array('Marca.foto'),'conditions' => array('Marca.foto'=> $data['foto'])));
		if (!empty($isUnique)) {
			return false;
		}else{
			return true;
		}

	}

}
