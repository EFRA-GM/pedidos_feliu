<div class="continer">
	<div class="row">
		<div class="col-md-6">

<?php $total_pedido = 0; ?>

<h2>Procesar Pedido</h2>
<br>
<h3>Datos del cliente</h3>
<br>
<b>NOMBRE COMPLETO: </b> <?php echo $pedido_cliente[0]['Cliente']['nombre'].' '.$pedido_cliente[0]['Cliente']['apellido']; ?>
<br>
<b>DIRECCION:</b> <?php echo $pedido_cliente[0]['Cliente']['direccion']; ?>
<br>
<b>TELEFONO:</b> <?php echo $pedido_cliente[0]['Cliente']['telefono']; ?>
<br>
<br>
<h3>Detalles del pedido</h3>
<br>
<table class="table table-striped">
				<thead>
					<tr>
						<th>Platillo</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($pedido_cliente[0]['Producto'] as $producto): ?>
					<tr>
						<td><?php echo $producto['descripcion']; ?></td>
						<td><?php echo '$ '.$producto['PedidosProducto']['precio_unitario']; ?></td>
						<td><?php echo $producto['PedidosProducto']['cantdad']; ?></td>
						<td><?php echo '$ '.($producto['PedidosProducto']['cantdad'] * $producto['PedidosProducto']['precio_unitario']); ?></td>
					</tr>
					<?php $total_pedido += $producto['PedidosProducto']['cantdad'] * $producto['PedidosProducto']['precio_unitario']; ?>
				<?php endforeach; ?>
				</tbody>
</table>

			<p>
				<span class="total">Total Orden: </span>
				<span id="total" class="total">
					$ <?php echo $total_pedido ?>
				</span>
				<br />
				<br />

				<?php //echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-success'))    array('class' => 'btn btn-success'); 
				echo $this->Form->create(null, array('url' => array('controller' => 'pedidos', 'action' => 'confirmarPedido')));

				echo $this->Form->button('Confirmar',array('class' => 'btn btn-primary', 'escape' => false, 'name' => 'confirmar', 'value' => 'confirmar'));

				echo $this->Form->end();
				?>

			</p>

</div>
</div>
</div>
