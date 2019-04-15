<div class="pedidosProductos form">
<?php echo $this->Form->create('PedidosProducto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pedidos Producto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('producto_id');
		echo $this->Form->input('pedido_id');
		echo $this->Form->input('cantdad');
		echo $this->Form->input('precio_unitario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PedidosProducto.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PedidosProducto.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidos Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
