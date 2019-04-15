<?php 
echo $this->Html->css('fileinput.min');
echo $this->Html->script('fileinput.min');
?>

<div class="productos form">
<?php echo $this->Form->create('Producto', array('type' => 'file','novalidate'=>'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Producto'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('precio');
		# Input para subir foto sele asigna un id para utilizar en el script de vistaprevia
		# data-show-caption muestra vista previa
		echo $this->Form->input('foto', array('type'=>'file','label'=>'Foto','id'=>'foto','class'=>'file','data-show-upload'=>'false','data-show-caption'=>'true'));
		echo $this->Form->input('foto_dir', array('type'=>'hidden'));
		echo $this->Form->input('marca_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

