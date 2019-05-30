<?php 
# Obtener los datos de la empresa
App::import('Model', 'Dato');
$modelo = new Dato();
$empresa = $modelo->findById(1);
?>


<!-- TARGETAS PARA LA MISION, VISION Y OBJETIVOS -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php echo $this->Html->image('slide1.jpg',array('alt'=>'Primer Slide','class'=>'d-block w-100')); ?>
    </div>
    <div class="carousel-item">
      <?php echo $this->Html->image('slide2.jpg',array('alt'=>'Primer Slide','class'=>'d-block w-100')); ?>
    </div>
    <div class="carousel-item">
      <?php echo $this->Html->image('slide3.jpg',array('alt'=>'Primer Slide','class'=>'d-block w-100')); ?>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<br>

<!-- TARGETAS PARA LA MISION, VISION Y OBJETIVOS -->
<div class="card-deck">

  <div class="card text-white bg-success border-danger mb-3" style="width: 18rem;">
    <div class="card-header">
    <?php echo $this->Html->image('mision2.jpg', array('alt'=>'Misión', 'class' => 'card-img-top', 'height' => 225)); ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Misión</h5>
      <p class="card-text"><?php echo $empresa['Dato']['mision']; ?></p>
    </div>
  </div>

  <div class="card text-white bg-success border-danger mb-3" style="width: 18rem;">
    <div class="card-header">
    <?php echo $this->Html->image('vision.jpg', array('alt'=>'Visión', 'class' => 'card-img-top', 'height' => 225)); ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Visión</h5>
      <p class="card-text"><?php echo $empresa['Dato']['vision']; ?></p>
    </div>
  </div>

  <div class="card text-white bg-success border-danger mb-3" style="width: 18rem;">
    <div class="card-header">
    <?php echo $this->Html->image('objetivos.jpg', array('alt'=>'Objetivos', 'class' => 'card-img-top', 'height' => 225)); ?>
    </div>
    <div class="card-body">
      <h5 class="card-title">Objetivos</h5>
      <p class="card-text"><?php echo $empresa['Dato']['objetivos']; ?></p>
    </div>
  </div>

</div>
