
<?php //debug($productos)
	echo $this->Html->script(array('cart'), array('inline' => false));

	echo $this->Form->create(null, array('url' => array('controller' => 'pedidos', 'action' => 'edit')));
?>


<h1>PEDIDOS</h1>

<hr>
<di class="row">
	<div class="col col-sm-1">IMAGEN</div>
	<div class="col col-sm-7">PPRODUCTO</div>
	<div class="col col-sm-1">PRECIO</div>
	<div class="col col-sm-1">CANTIDAD</div>
	<div class="col col-sm-1">SUBTOTAL</div>
	<div class="col col-sm-1">ELIMINAR</div>
</di>

<?php 
	$tabindex =1; 
	$total = 0;
?>

<?php foreach ($productos as $producto): ?>

<div class="row" id="row-<?php echo $producto['PedidosProducto']['id']; ?>">

	<div class="col col-sm-1">
		<figure>
			<!-- IMAGEN -->
		<?php echo $this->Html->image('../files/producto/foto/'.$producto['id'].'/thumb_'.$producto['foto'], array('class'=>'img-pedidos')); ?>
		</figure>
	</div>
	
	<div class="col col-sm-7">
		<strong>
			<!-- NOMBRE PLATILLO -->
			<?php echo $this->Html->link($producto['descripcion'], array('controller'=>'productos', 'action' => 'view', $producto['id'])); ?>
		</strong>
	</div>

	<div class="col col-sm-1" id="price-<?php echo $producto['PedidosProducto']['id']; ?>">
		<!-- PRECIO -->
		<?php echo $producto['PedidosProducto']['precio_unitario']; ?>
	</div>

	<div class="col col-sm-1">
		<!-- INPUT CANTIDAD -->
		<?php echo $this->Form->input($producto['PedidosProducto']['id'], array('div'=>false, 'class'=>'numeric form-control input-small', 'label'=>false, 'size'=>2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $producto['PedidosProducto']['id'], 'value'=>$producto['PedidosProducto']['cantdad'])); ?>
		
	</div>

	<div class="col col-sm-1" style="background-color: none;" id="subtotal_<?php echo $producto['PedidosProducto']['id']; ?>">
		<!-- SUBTOTAL -->
		<?php echo $producto['PedidosProducto']['cantdad'] * $producto['PedidosProducto']['precio_unitario']; ?>
	</div>

	<div class="col col-sm-1">
		<?php 
			echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span>','#',array('escapeTitle'=>false,'title'=>'Eliminar Item', 'id'=>$producto['PedidosProducto']['id'],'class'=>'remove'));
		?>
	</div>

</div>

<br />

<?php $total = $total + ($producto['PedidosProducto']['cantdad'] * $producto['PedidosProducto']['precio_unitario']); ?>

<?php endforeach; ?>

<hr>


<div class="row">
	<div class="col col-sm-12">
		<div class="pull-right tr">
			
			<?php echo $this->Html->link('Quitar Pedidos', array('controller' => 'pedidos', 'action' => 'quitar'), array('class' => 'btn btn-danger', 'confirm' => '¿Esta seguro de quitar todos los pedidos?')); ?>

			&nbsp;&nbsp;

			<?php //echo $this->Form->button('Recalcular', array('class' => 'btn btn-default', 'escape' => false, 'name' => 'recalcular', 'value' => 'recalcular')); ?>			

			<span class="total">Total Orden</span>
			<span id="total" class="total">
				$ <?php echo $total; ?>
			</span>

			<br />
			<?php echo $this->Form->button('<i class="glyphicon glyphicon-arrow-right"></i> Procesar Orden', array('class' => 'btn btn-primary', 'escape' => false, 'name' => 'procesar', 'value' => 'procesar')); ?> 


			<?php echo $this->Form->end(); ?>

		</div>
	</div>
</div>


