<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Distribuidora Feliu');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		if (isset($current_user)) { # Para saber si se debe incluir los estilos para todo el sistemas o solo para el login
			echo $this->Html->css(array('cake.generic','bootstrap.min','bootstrap-grid.min','style'));	
			echo $this->Html->script(array('jquery-3.3.1.min','bootstrap.min','bootstrap.bundle.min'));
		}else{
			echo $this->Html->css(array('bootstrap/bootstrap.min', 'bootstrap/bootstrap-theme.min','signin'));
			echo $this->Html->script(array('jquery-3.3.1.min'));
		}
		
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<script type="text/javascript">
		var basePath = "<?php echo Router::url('/'); ?>";
		//$('#foto').fileinput();
		//para utilizar en el script addtocart
		
	</script>

</head>
<body>
	<div id="container-fluid">
		
		<?php 
		if (isset($current_user)) { # El menu solo se mostrara cuando ya se haya iniciado sesion
			echo $this->element('menu'); 
		} 
		?>

		<div id="content">

			<?php echo $this->Flash->render(); ?>
			<?php echo $this->Session->flash('auth'); # Componente para los mensajes de autenticacion?>

			<?php echo $this->fetch('content'); ?>

			<br>
			<div id="msg"></div>
			<br>

		</div>
		

	</div>
	
</body>
</html>
