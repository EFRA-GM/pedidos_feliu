<?php 
# para que no se mustre la contraseña y no se vuelva a encriptar lo que ya estaba encriptado
# De lo contrario se perderia la contraseña original
$this->request->data['User']['password'] = ''; 
?>

<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		# Para editar las credenciales de usuario
		echo $this->Form->input('User.id');
		//echo $this->Form->input('User.fullname');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cliente.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Cliente.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
	</ul>
</div>
