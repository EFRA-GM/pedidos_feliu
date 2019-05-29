<?php echo $this->element('menu_admin');  ?>
<!--<div class="productos index">-->
	<h2><?php echo __('Marcas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>id</th>
			<th>nombre</th>
			<th>foto</th>
			<th>activo</th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($marcas as $marca): ?>
	<tr>
		<td><?php echo h($marca['Marca']['id']); ?>&nbsp;</td>
		<td><?php echo h($marca['Marca']['nombre']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('../files/marca/foto/'.$marca['Marca']['id'].'/thumb_'.$marca['Marca']['foto']); ?>&nbsp;</td>
		<td><?php 
		if ($marca['Marca']['activo'] == 0) {
			echo 'inactivo';
		}else
			echo 'activo';
		
		?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $marca['Marca']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $marca['Marca']['id'])); ?>
			<?php 
				$texto;
				if ($marca['Marca']['activo'] == 0) {
					$texto = 'Activar';
				}else
					$texto = 'Desactivar';
				echo $this->Form->postLink($texto, array('action' => 'activarDesactivar', $marca['Marca']['id'], $marca['Marca']['activo']), array('confirm' => __('¿Esta seguro de querer '.$texto.' # %s?', $marca['Marca']['id'])));
			?>
			<?php  ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	</p>

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