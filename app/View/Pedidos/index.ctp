<?php echo $this->element('menu_admin');  ?>

	<h2><?php echo __('Pedidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidos as $pedido): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($pedido['Cliente']['nombre'].' '.$pedido['Cliente']['apellido'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
		</td>
		<td><?php 
			switch ($pedido['Pedido']['estado']) {
				case '0':
					echo 'Pendiente';
					break;
				case '1':
					echo 'En proceso';
					break;
				case '2':
					echo 'Confirmado';
					break;
				default:
					echo 'Entregado';
					break;
			}
			 ?>&nbsp;</td>
		<td><?php echo h($pedido['Pedido']['fecha_solicitud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pedido['Pedido']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pedido['Pedido']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedido['Pedido']['id']))); ?>
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

