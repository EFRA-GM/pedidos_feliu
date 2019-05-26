
<div class="clientes view">
<h2><?php echo __('Cliente'); ?></h2>
	
	<table class="table-striped table-bordered">
		<tbody>
		<tr>
			<td><b>Id</b></td>
			<td><?php echo h($cliente['Cliente']['id']); ?></td>
		</tr>
		<tr>
			<td><b>Nombre Completo</b></td>
			<td><?php echo $cliente['Cliente']['nombre'].' '.$cliente['Cliente']['apellido'] ; ?></td>
		</tr>
		<tr>
			<td><b>Direccion</b></td>
			<td><?php echo $cliente['Cliente']['direccion'] ?></td>
		</tr>
		<tr>
			<td><b>Telefono</b></td>
			<td><?php echo $cliente['Cliente']['telefono'] ?></td>
		</tr>
		</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('confirm' => __('Estas seguro de eliminar al cliente # %s?', $cliente['Cliente']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div>
	<h2>Pedidos Confirmados</h2>

	<?php if(count($cliente['Pedido']) > 0): ?>
	<table class="table-striped table-bordered">
		<thead>
		<tr>
			<th>Id</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Promocion</th>
			<th>Ver</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($cliente['Pedido'] as $pedido): ?>
			<tr>
				<td><?php echo $pedido['id'] ?></td>
				<td><?php echo $pedido['fecha_solicitud'] ?></td>
				<td><?php 
				switch ($pedido['estado']) {
				 	case 0:
				 		echo 'Pendiente';
				 		break;
				 	case 1:
				 		echo 'Confirmado';
				 		break;
				 	case 2:
				 		echo 'Recivido';
				 		break;
				 	default:
				 		echo 'Entregado';
				 		break;
				 } ?></td>
				<td><?php 
				switch ($pedido['promotion_id']) {
				 	case 0:
				 		echo 'No';
				 		break;
				 	default:
				 		echo 'Si';
				 		break;
				 } ?></td>
				<td><?php echo $this->Html->link('Ver', array('controller' => 'pedidos', 'action' => 'view', $pedido['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else: ?>
		<div class="alert-primary">El Cliente aun no tiene pedidos</div>
	<?php endif; ?>

</div>
