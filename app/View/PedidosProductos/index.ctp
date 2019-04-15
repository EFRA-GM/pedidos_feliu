<div class="pedidosProductos index">
	<h2><?php echo __('Pedidos Productos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('producto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pedido_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantdad'); ?></th>
			<th><?php echo $this->Paginator->sort('precio_unitario'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidosProductos as $pedidosProducto): ?>
	<tr>
		<td><?php echo h($pedidosProducto['PedidosProducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedidosProducto['Producto']['descripcion'], array('controller' => 'productos', 'action' => 'view', $pedidosProducto['Producto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pedidosProducto['Pedido']['created'], array('controller' => 'pedidos', 'action' => 'view', $pedidosProducto['Pedido']['id'])); ?>
		</td>
		<td><?php echo h($pedidosProducto['PedidosProducto']['cantdad']); ?>&nbsp;</td>
		<td><?php echo h($pedidosProducto['PedidosProducto']['precio_unitario']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pedidosProducto['PedidosProducto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pedidosProducto['PedidosProducto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pedidosProducto['PedidosProducto']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedidosProducto['PedidosProducto']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pedidos Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidos'), array('controller' => 'pedidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedido'), array('controller' => 'pedidos', 'action' => 'add')); ?> </li>
	</ul>
</div>
