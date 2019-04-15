<div class="pedidosProductos view">
<h2><?php echo __('Pedidos Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pedidosProducto['PedidosProducto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedidosProducto['Producto']['descripcion'], array('controller' => 'productos', 'action' => 'view', $pedidosProducto['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pedido'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pedidosProducto['Pedido']['created'], array('controller' => 'pedidos', 'action' => 'view', $pedidosProducto['Pedido']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantdad'); ?></dt>
		<dd>
			<?php echo h($pedidosProducto['PedidosProducto']['cantdad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Unitario'); ?></dt>
		<dd>
			<?php echo h($pedidosProducto['PedidosProducto']['precio_unitario']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pedidos Producto'), array('action' => 'edit', $pedidosProducto['PedidosProducto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pedidos Producto'), array('action' => 'delete', $pedidosProducto['PedidosProducto']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedidosProducto['PedidosProducto']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidos Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
