<?php echo $this->element('menu_admin');  ?>
<?php 
echo $this->Html->css('fileinput.min');
echo $this->Html->script('fileinput.min');
?>

<div class="marcas form">
<?php echo $this->Form->create('Marca', array('type' => 'file','novalidate'=>'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Edit Marca'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		# Input para subir foto sele asigna un id para utilizar en el script de vistaprevia
		# data-show-caption muestra vista previa
		echo $this->Form->input('foto', array('type'=>'file','label'=>'Foto','id'=>'foto','class'=>'file','data-show-upload'=>'false','data-show-caption'=>'true'));
		echo $this->Form->input('foto_dir', array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Marca.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Marca.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Marcas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
