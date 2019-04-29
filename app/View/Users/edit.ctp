<?php echo $this->element('menu_admin');  ?>
<div class="users form">
<?php 
# para que no se mustre la contraseña y no se vuelva a encriptar lo que ya estaba encriptado
# De lo contrario se perderia la contraseña original
$this->request->data['User']['password'] = ''; 
?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fullname');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role', array('class' => 'form-control', 'label' => 'Rol', 'type' => 'select', 'options' => array('admin' => 'Administrador', 'cliente' => 'Cliente', 'publico' => 'Publico', 'personal' => 'Personal'), array('class' => 'form-control')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
