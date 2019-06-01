<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>




<h2><?php echo h($noticia['Noticia']['titulo']); ?></h2>
	
	

  

  	<div class="fb-like" data-href="<?php echo 'http://localhost'.Router::url('/').'noticias/view/'.$noticia['Noticia']['id']; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true"></div>
  	<div class="fb-share-button" 
    data-href="<?php echo Router::url($this->here,true) ?>" 
    data-layout="button_count"> Compartir
  	</div>

		<br>
		<br>
		<?php echo $this->Html->image('../files/noticia/foto/'.$noticia['Noticia']['id'].'/vga_'.$noticia['Noticia']['foto'], array('rel' => 'image_src')); ?>

		<br><br><br>
		<dd>
			<?php //echo h($noticia['Noticia']['contenido']);
				print $noticia['Noticia']['contenido'];
			 ?>
			&nbsp;
		</dd>
		
			PUBLICADO EL: <?php echo h($noticia['Noticia']['created']); ?>
			&nbsp;
	


