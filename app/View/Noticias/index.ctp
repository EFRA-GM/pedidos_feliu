
	<h2><?php echo __('Noticias'); ?></h2>
	

<div class="row">
<?php foreach ($noticias as $noticia): ?>

	<div class="col col-sm-4" align="center">	
		<div class="card" style="width: 18rem;">
		  <?php echo $this->Html->image('../files/noticia/foto/'.$noticia['Noticia']['id'].'/thumb_'.$noticia['Noticia']['foto'], array('class' => 'card-img-top', 'alt' => 'imagen noticia', 'height' => 300)); ?>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo h($noticia['Noticia']['titulo']); ?></h5>
		    <div style="height: 250px"><p class="card-text"><?php echo h($noticia['Noticia']['descripcion']); ?></p><br><br></div>
		    <a href="#" class="btn btn-primary">Go somewhere</a>
		  </div>
		</div>
		<br>
		<br>		
	</div>


<?php endforeach; ?>
</div>

	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('atras'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

