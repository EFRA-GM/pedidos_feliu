<?php echo $this->element('menu_admin');  ?>
<!--<div class="productos index">-->
	<h2><?php echo __('Productos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th><?php echo $this->Paginator->sort('foto'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('marca_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($productos as $producto): ?>
	<tr>
		<td><?php echo h($producto['Producto']['id']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['precio']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('../files/producto/foto/'.$producto['Producto']['id'].'/thumb_'.$producto['Producto']['foto']); ?>&nbsp;</td>
		<td><?php echo h($producto['Producto']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($producto['Marca']['nombre'], array('controller' => 'marcas', 'action' => 'view', $producto['Marca']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $producto['Producto']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $producto['Producto']['id'])); ?>

			<?php 
				$texto = '';
				$texto = ($producto['Producto']['activo'] == 0) ? 'Activar' : 'Desactivar';
			?>

			<?php echo $this->Form->postLink($texto, array('action' => 'delete', $producto['Producto']['id'],$producto['Producto']['activo']), array('confirm' => __('¿Estas seguro de querer '.$texto.'# %s?', $producto['Producto']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registro de un total de {:count} , iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
<!--</div>-->
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Marcas'), array('controller' => 'marcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'marcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->