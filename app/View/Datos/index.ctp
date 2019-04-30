
	<h2><?php echo __('Datos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('mail'); ?></th>
			<th><?php echo $this->Paginator->sort('mision'); ?></th>
			<th><?php echo $this->Paginator->sort('vision'); ?></th>
			<th><?php echo $this->Paginator->sort('objetivos'); ?></th>
			<th><?php echo $this->Paginator->sort('longitud'); ?></th>
			<th><?php echo $this->Paginator->sort('latitud'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($datos as $dato): ?>
	<tr>
		<td><?php echo h($dato['Dato']['id']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['mail']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['mision']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['vision']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['objetivos']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['longitud']); ?>&nbsp;</td>
		<td><?php echo h($dato['Dato']['latitud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dato['Dato']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dato['Dato']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dato['Dato']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dato['Dato']['id']))); ?>
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

