<?php echo $this->element('menu_admin');  ?>
<div class="noticias index">
	<h2><?php echo __('Noticias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($noticias as $marca): ?>
	<tr>
		<td><?php echo h($marca['Noticia']['id']); ?>&nbsp;</td>
		<td><?php echo h($marca['Noticia']['titulo']); ?>&nbsp;</td>
		<td><?php echo substr($marca['Noticia']['descripcion'], 0, 60).' ...'; ?>&nbsp;</td>
		<td><?php echo h($marca['Noticia']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $marca['Noticia']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $marca['Noticia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $marca['Noticia']['id']), array('confirm' => __('¿Seguro que desea eliminar la noticia %s?', $marca['Noticia']['titulo']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total {:count} iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Noticia'), array('action' => 'add')); ?></li>
	</ul>
</div>

