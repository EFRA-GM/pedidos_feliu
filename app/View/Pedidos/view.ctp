<?php echo $this->element('menu_admin');  ?>
<div class="continer">
	<div class="row">
		<div class="col-md-6">

<?php $total_pedido = 0; ?>

<h2>Detalles del Pedido</h2>
<br>
<h3>Datos del cliente</h3>
<br>
<b>NOMBRE COMPLETO: </b> <?php echo $pedido['Cliente']['nombre'].' '.$pedido['Cliente']['apellido']; ?>
<br>
<b>DIRECCION:</b> <?php echo $pedido['Cliente']['direccion']; ?>
<br>
<b>TELEFONO:</b> <?php echo $pedido['Cliente']['telefono']; ?>
<br>
<br>
<h3>Detalles del pedido</h3>
<br>
<table class="table table-striped">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($pedido['Producto'] as $producto): ?>
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
			</p>

</div>
</div>
</div>
