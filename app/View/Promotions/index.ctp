<?php echo $this->element('menu_admin');  ?>
<div class="promotions index">
	<h2><?php echo __('Promociones'); ?></h2>
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
			<th class="actions"><?php echo __('Acciones'); ?></th>
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
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $promotion['Promotion']['id']), array('confirm' => __('seguro que desea eliminar la promocion # %s?', $promotion['Promotion']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Promoción'), array('action' => 'add')); ?></li>
	</ul>
</div>
