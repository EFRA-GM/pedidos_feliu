<?php echo $this->element('menu_admin');  ?>
<?php 
	echo $this->Html->script(array('ckeditor/ckeditor', 'fileinput.min'));
	echo $this->Html->css('fileinput.min');
?>


<div class="noticias form">
<?php echo $this->Form->create('Noticia', array('type' => 'file','novalidate'=>'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Agregar Noticia'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('contenido');
		# Input para subir foto sele asigna un id para utilizar en el script de vistaprevia
		# data-show-caption muestra vista previa
		echo $this->Form->input('foto', array('type'=>'file','label'=>'Foto','id'=>'foto','class'=>'file','data-show-upload'=>'false','data-show-caption'=>'true'));
		echo $this->Form->input('foto_dir', array('type'=>'hidden'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listas de las noticias'), array('action' => 'index')); ?></li>
	</ul>
</div>

<script type="text/javascript">
     CKEDITOR.replace('NoticiaContenido')
</script>
