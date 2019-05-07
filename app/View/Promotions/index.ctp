<?php echo $this->element('menu_admin');  ?>
<div class="promotions index">
	<h2><?php echo __('Promotions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descuento'); ?></th>
			<th><?php echo $this->Paginator->sort('total_minimo'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($promotions as $promotion): ?>
	<tr>
		<td><?php echo h($promotion['Promotion']['id']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['descuento']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['total_minimo']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['fecha_fin']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['created']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promotion['Promotion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $promotion['Promotion']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?></li>
	</ul>
</div>
