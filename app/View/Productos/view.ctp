
<?php echo $this->Html->script(array('addtocart'), array('inline' => false)); ?>

<table>
	
	<tbody>
	<tr>
		<td style="max-height: 600px;">
			<?php echo $this->Html->image('../files/producto/foto/'.$producto['Producto']['id'].'/vga_'.$producto['Producto']['foto']); ?>
		</td>
		<td>
			<h2><?php echo __('Producto'); ?></h2>


		<br />
		<?php echo __('Descripcion: '); ?></dt>
		
			<?php echo h($producto['Producto']['descripcion']); ?>
			&nbsp;


		
		<br />
		<?php echo __('Precio: '); ?></dt>
		
			<?php echo '$ '.h($producto['Producto']['precio']); ?>
			&nbsp;

		<br />
		<br />

		<?php echo $this->Form->button('Agregar a Pedido', array('class' => 'btn btn-primary addtocart', 'id' => $producto['Producto']['id'])); ?>
		
		<br />
		<br />

		
		<?php echo __('Created: '); ?></dt>
	
			<?php echo h($producto['Producto']['created']); ?>
			&nbsp;
		<br />
		<?php echo __('Modified: '); ?></dt>
		
			<?php echo h($producto['Producto']['modified']); ?>
			&nbsp;
		<br />
		<?php echo __('Marca: '); ?></dt>
		
			<?php echo $this->Html->link($producto['Marca']['nombre'], array('controller' => 'marcas', 'action' => 'view', $producto['Marca']['id'])); ?>
			&nbsp;
		

		</td>
	</tr>
	</tbody>
</table>



<!--
<div style="float: left;">
	
</div>

<div style="float: right;">
	
</div>
-->