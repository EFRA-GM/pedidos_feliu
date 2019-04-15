<?php
App::uses('AppModel', 'Model');
/**
 * Noticia Model
 *
 */
class Noticia extends AppModel { 

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo';

	public $actsAs = array(
		'Upload.Upload' => array(
			'foto' => array(				# para alamacenar las imagenes de la bd
				'field' => array(
					'dir' => 'foto_dir'
				),
				'thumbnailMethod' => 'php',
				'thumbnailSizes' => array(
					'vga' => '600x450',
					'thumb' => '200x200'
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
		'titulo' => array(
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
		'contenido' => array(
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



	# Funcion para que funcione la validacion
	function checkUniqueName($data){
		$isUnique = $this->find('first',array('fields' => array('Noticia.foto'),'conditions' => array('Noticia.foto'=> $data['foto'])));
		if (!empty($isUnique)) {
			return false;
		}else{
			return true;
		}

	}
}
