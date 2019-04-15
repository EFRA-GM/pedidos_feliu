
	<h2><?php echo __('Noticias'); ?></h2>
	
<?php foreach ($noticias as $noticia): ?>
	

	<div class="media">
  		<?php echo $this->Html->image('../files/noticia/foto/'.$noticia['Noticia']['id'].'/thumb_'.$noticia['Noticia']['foto'], array('class' => 'align-self-center mr-3"', 'alt' => 'Generic placeholder image')); ?>
  		<div class="media-body">
    		<h5 class="mt-0"><?php echo h($noticia['Noticia']['titulo']); ?></h5>
    		<p><?php echo 'Fecha de publicacion: '.h($noticia['Noticia']['created']); ?></p>
    		<p><?php echo h($noticia['Noticia']['descripcion']); ?></p>
    		<p><?php echo $this->Html->link(__('Leer Mas'), array('action' => 'view', $noticia['Noticia']['id']),array('class' => 'btn btn-primary btn-lg')); ?></p>
    		


   		</div>
	</div>
	<br><br>

<?php endforeach; ?>


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

