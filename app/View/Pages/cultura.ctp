<?php echo $this->Html->css('main.css'); 
echo $this->Html->script(array('jquery.scrolly.min','jquery.scrollex.min','skel.min','util','main'))
?> 

	
		<!-- Banner principal -->
		<?php echo $this->Html->image('banner.jpg',array('alt'=>'banner','class'=>'d-block w-100')); ?>
			<section id="banner" class="bg-img" data-bg="banner.jpg" >

				<div class="inner">

					<header>
						<h1>CULTURA CERVECERA</h1>
					</header>
				</div>
				<a href="#one" class="more"></a>
			</section>

		<!-- uno -->
		
		<?php echo $this->Html->image('banner2.jpg',array('alt'=>'banner','class'=>'d-block w-100')); ?>
			<section id="one" class="wrapper post bg-img" data-bg="banner2.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Selección de ingredientes</h2>
							
						</header>
						<div class="content">
							<p>Este proceso es delicado ya que debe observarse con sumo cuidado que los granos tengan una textura homogénea; cualquier defecto afecta a la estabilidad del producto final.</p>
						</div>
						
					</article>
				</div>
				<a href="#two" class="more"></a>
			</section>

		<!-- dos -->
		<?php echo $this->Html->image('banner3.jpg',array('alt'=>'banner','class'=>'d-block w-100')); ?>
			<section id="two" class="wrapper post bg-img" data-bg="banner5.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Malteado</h2>
							
						</header>
						<div class="content">
							<p>La cebada se introduce en tanques con agua fría, donde se remoja y oxigena continuamente para mantener la humedad. Después se seca y, dependiendo del tiempo y la temperatura, obtenemos distintos tipos de malta.</p>
						</div>
						
					</article>
				</div>
				<a href="#three" class="more"></a>
			</section>

		<!-- tres -->
		<?php echo $this->Html->image('banner4.jpg',array('alt'=>'banner','class'=>'d-block w-100')); ?>
			<section id="three" class="wrapper post bg-img" data-bg="banner4.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Macerado</h2>
							
						</header>
						<div class="content">
							<p>Después de obtenerse la malta se tritura y mezcla con agua caliente para extraer sus azúcares naturales. Al terminar este proceso se obtiene lo que se conoce como mosto; es decir, una especie de agua azucarada.</p>
						</div>
						
					</article>
				</div>
				<a href="#four" class="more"></a>
			</section>

		<!-- cuatro -->
		<?php echo $this->Html->image('banner5.jpg',array('alt'=>'banner','class'=>'d-block w-100')); ?>
			<section id="four" class="wrapper post bg-img" data-bg="banner3.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Ebullición/Lupulización</h2>
							
						</header>
						<div class="content">
							<p>Obtenido el mosto se lleva a un caldero a hervir junto con el lúpulo, aquí es donde se da el amargor y aroma.</p>
						</div>
						
					</article>
				</div>
			</section>



		<!-- Scripts -->
			
			


