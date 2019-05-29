<div class="page-header">
		<h2><?php echo __('PRODUCTOS DE LA MARCA '.$marca['Marca']['nombre']); ?></h2>
		<div class="alert alert-success"><p><?php echo $marca['Marca']['descripcion'] ?></p></div>
	</div>

	<div class="row">

		<?php foreach ($marca['Producto'] as $producto): ?>
		<?php if($producto['activo'] == 1): ?>
			<div class="col col-sm-3">
				<figure class="producto">
					<!-- IMAGEN DEL PLATILLO -->
					<?php echo $this->Html->image('../files/producto/foto/'.$producto['id'].'/thumb_'.$producto['foto'], array('url' => array('controller' => 'productos', 'action' => 'view',$producto['id']))); ?>
				</figure>
				<br />
					<!-- NOMBRE DEL PLATILLO -->
					<?php echo $this->Html->link($producto['descripcion'], array('controller' => 'productos', 'action' => 'view',$producto['id'])); ?>
				<br />
				<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
					<!-- CATEGORIA DEL PLATILLO -->
					<?php //echo $producto['marca_id']; ?>
				<br />
					$<!-- PRECIO DEL PLATILLO --> <?php echo $producto['precio']; ?> &nbsp;
				<br />
				<br />
			</div>
		<?php endif; ?>
		<?php endforeach; ?>

	</div>