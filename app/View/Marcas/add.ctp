<?php echo $this->element('menu_admin');  ?>
<?php 
echo $this->Html->css('fileinput.min');
echo $this->Html->script('fileinput.min');
?>

<div class="marcas form">
<?php echo $this->Form->create('Marca', array('type' => 'file','novalidate'=>'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Añadir Marca'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		# Input para subir foto sele asigna un id para utilizar en el script de vistaprevia
		# data-show-caption muestra vista previa
		echo $this->Form->input('foto', array('type'=>'file','label'=>'Foto','id'=>'foto','class'=>'file','data-show-upload'=>'false','data-show-caption'=>'true'));
		echo $this->Form->input('foto_dir', array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


