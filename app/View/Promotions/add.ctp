<?php echo $this->element('menu_admin');  ?>
<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Promoción'); ?></legend>
	<?php
		echo $this->Form->input('descuento');
		echo $this->Form->input('total_minimo');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista de las Promociones'), array('action' => 'index')); ?></li>
	</ul>
</div>
