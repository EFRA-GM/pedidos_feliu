<?php echo $this->element('menu_admin');  ?>
<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descuento');
		echo $this->Form->input('total_minimo');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promotion.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Promotion.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?></li>
	</ul>
</div>
