<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
	<fieldset>
		<legend><?php echo __('NUEVO CLIENTE'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		# Creara credenciales para que pueda acceder
		//echo $this->Form->input('User.fullname');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar clientes'), array('action' => 'index')); ?></li>
	</ul>
</div>
