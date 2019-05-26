<!--  Este es el menu que e aparecera al administrador del sistema apara podeer realizar sus operaciones exclusivas
	  Inclusive tambien puede que le apresca al responsable de ventas solo con las opciones a las que tenga acceso
-->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <?php echo $this->Html->link('Nueva Marca', array('controller'=>'marcas','action'=>'add'),array('class'=>'nav-link active')) ?>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Productos</a>
    <div class="dropdown-menu">
      <?php echo $this->Html->link('Ver', array('controller'=>'Productos','action'=>'index'),array('class'=>'dropdown-item')) ?>
      <?php echo $this->Html->link('Nuevo', array('controller'=>'Productos','action'=>'add'),array('class'=>'dropdown-item')) ?>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Noticias</a>
    <div class="dropdown-menu">
      <?php echo $this->Html->link('Nueva', array('controller'=>'noticias','action'=>'add'),array('class'=>'dropdown-item')) ?>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cliente</a>
    <div class="dropdown-menu">
      <?php echo $this->Html->link('Ver', array('controller'=>'clientes','action'=>'index'),array('class'=>'dropdown-item')) ?>
      <?php echo $this->Html->link('Nuevo', array('controller'=>'clientes','action'=>'add'),array('class'=>'dropdown-item')) ?>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
    <div class="dropdown-menu">
      <?php echo $this->Html->link('Ver', array('controller'=>'users','action'=>'index'),array('class'=>'dropdown-item')) ?>
      <?php echo $this->Html->link('Nuevo', array('controller'=>'users','action'=>'add'),array('class'=>'dropdown-item')) ?>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Promociones</a>
    <div class="dropdown-menu">
      <?php echo $this->Html->link('Ver', array('controller'=>'promotions','action'=>'index'),array('class'=>'dropdown-item')) ?>
      <?php echo $this->Html->link('Nuevo', array('controller'=>'promotions','action'=>'add'),array('class'=>'dropdown-item')) ?>
    </div>
  </li>

  <li class="nav-item">
    <?php echo $this->Html->link('Empresa', array('controller'=>'datos','action'=>'edit',1),array('class'=>'nav-link')) ?>
  </li>

  <li class="nav-item">
    <?php echo $this->Html->link('Solicitudes', array('controller'=>'pedidos','action'=>'index'),array('class'=>'nav-link')) ?>
  </li>

  <li class="nav-item">
    <?php echo $this->Html->link('Reportes', array('controller'=>'pedidos','action'=>'reportes'),array('class'=>'nav-link')) ?>
  </li>

  <!-- Menu Desplegable
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  -->

  <!--
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  -->
  <!--
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
  -->

</ul>

<!-- Esto es necesario para dar el efecto dropdown -->
 <script type="text/javascript">
 	$('.dropdown-toggle').dropdown();
 </script>
