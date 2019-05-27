
<div class="clientes form">

<h2>Mis Pedidos</h2>

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
		<?php foreach ($pedidos as $pedido): ?>
			<tr>
				<td><?php echo $pedido['Pedido']['id'] ?></td>
				<td><?php echo $pedido['Pedido']['fecha_solicitud'] ?></td>
				<td><?php 
				switch ($pedido['Pedido']['estado']) {
				 	case 0:
				 		echo 'En Captura';
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
				switch ($pedido['Pedido']['promotion_id']) {
				 	case 0:
				 		echo 'No';
				 		break;
				 	default:
				 		echo 'Si';
				 		break;
				 } ?></td>
				<td><?php echo $this->Html->link('Ver', array('controller' => 'pedidos', 'action' => 'view', $pedido['Pedido']['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>



</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Mi Informacion'), array('controller' => 'clientes','action' => 'modificar')); ?></li>
		<li><?php echo $this->Html->link(__('Mis Pedidos'), array('controller' => 'pedidos','action' => 'mis_pedidos')); ?></li>
	</ul>
</div>
