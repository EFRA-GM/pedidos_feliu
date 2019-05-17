
<div class="continer">
	<div class="row">
		<div class="col-md-6">

<?php 
$total_pedido = 0;
$total_descuento = 0;
?>

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
						<th>Producto</th>
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
				<span class="total">Subtotal: </span>
				<span id="total" class="total">
					$ <?php echo $total_pedido ?>
				</span>
				<br />

				<span class="total">Descuento: </span>
				<span id="total" class="total">
					$ <?php 
					if(count($promocion) > 0){
						if($total_pedido >= $promocion[0]['Promotion']['total_minimo']){
							$total_descuento = $total_pedido * ($promocion[0]['Promotion']['descuento'] / 100);
							echo $total_descuento;
						}else
							echo '00.00';
					}else
						echo '00.00';
					?>
				</span>
				<br />

				<span class="total">total: </span>
				<span id="total" class="total">
					$ <?php echo $total_pedido - $total_descuento; ?>
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

<?php if(count($promocion) > 0): ?>
<?php if($total_pedido >= $promocion[0]['Promotion']['total_minimo']):?>
	
	<script type="text/javascript">
		alert('Confirme ahora su pedido y obtenga hasta un <?php echo $promocion[0]['Promotion']['descuento'] ?> % de descuento');
	</script>

<?php endif; ?>
<?php endif; ?>

