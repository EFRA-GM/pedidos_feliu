<?php $numero=1; ?>

<h2><?php echo __('Noticias'); ?></h2>
	

<div class="card-deck">
<?php foreach ($noticias as $sub => $noticia): ?>
	<div class="card border-success text-white bg-dark mb-3" style="width: 18rem;">
	  <div class="card-header">
	    <?php echo $this->Html->image('../files/noticia/foto/'.$noticia['Noticia']['id'].'/thumb_'.$noticia['Noticia']['foto'], array('class' => 'card-img-top', 'alt' => 'imagen noticia', 'height' => 225)); ?>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title"><?php echo $noticia['Noticia']['titulo']; ?></h5>
	    <p class="card-text"><?php echo $noticia['Noticia']['descripcion']; ?></p>
	  </div>
	  <div class="card-footer">
	  	<?php echo $this->Html->link('Seguir Leyendo', array('controller' => 'noticias', 'action' => 'view', $noticia['Noticia']['id'] ), array('class' => 'btn btn-primary')); ?>
	  </div>
	</div>
	<?php 
	if ($numero == 3) {
		$numero = 0;
		echo '</div><br><div class="card-deck">';
	}
	$numero++;
	?>
<?php endforeach; ?>
<?php while ( $numero < 4): ?>
	<div class="card border-light mb-3" style="width: 18rem;">
	</div>
	<?php $numero++ ?>
<?php endwhile; ?>
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

