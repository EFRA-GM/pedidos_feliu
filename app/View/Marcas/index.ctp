<!--<div class="marcas index">-->
	

	<!--<div class="platillos index">-->
	


	<div class="page-header">
		<h1><?php echo __('MARCAS'); ?></h1>
	</div>

	<div class="row">

		<?php foreach ($marcas as $marca): ?>

		<div class="col col-sm-4">
			<figure class="marca">
				<!-- IMAGEN DE LA MARCA -->
				<?php echo $this->Html->image('../files/marca/foto/'.$marca['Marca']['id'].'/thumb_'.$marca['Marca']['foto'],array('url'=>array('controller'=>'marcas','action'=>'view',$marca['Marca']['id']))); ?>
			</figure>
			<br />
				<!-- NOMBRE DE LA MARCA -->
				<?php echo $this->Html->link($marca['Marca']['nombre'], array('action' => 'view', $marca['Marca']['id'])); ?>
			<br />
			<span class="glyphicon glyphicon-cutlery" aria-hidden="true">
				<!-- CATEGORIA DEL PLATILLO -->
				
			</span>
			<br />
		</div>

		<?php endforeach; ?>

	</div>

	<br />
	<br />
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>


	<!--</div>-->
<!--</div>-->

<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Marca'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->



