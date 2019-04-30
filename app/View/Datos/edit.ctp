<?php echo $this->element('menu_admin');  ?>

<?php echo $this->Form->create('Dato'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dato'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		echo $this->Form->input('mail');
		echo $this->Form->input('mision');
		echo $this->Form->input('vision');
		echo $this->Form->input('objetivos');
		echo $this->Form->input('longitud');
		echo $this->Form->input('latitud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

