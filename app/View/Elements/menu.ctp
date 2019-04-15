<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">

    <?php echo $this->Html->image('logoh.png'); ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!--<a class="nav-link" href="http://localhost/feliz">Inicio<span class="sr-only">(current)</span></a>-->
        <?php echo $this->Html->link('Inicio', array('controller'=>'pages','action'=>'home'),array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item">
        <?php echo $this->Html->link('Noticias', array('controller'=>'noticias','action'=>'index'),array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item active">
        
        <?php echo $this->Html->link('Nuestra compañia', array('controller'=>'pages','action'=>'nosotros'),array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item">
        <?php echo $this->Html->link('Marcas', array('controller'=>'marcas','action'=>'index'),array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cultura Cervecera</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php echo $this->Html->link('Nueva Marca', array('controller'=>'marcas','action'=>'add'),array('class'=>'dropdown-item')) ?>

          <?php echo $this->Html->link('Nuevo Producto', array('controller'=>'Productos','action'=>'add'),array('class'=>'dropdown-item')) ?>

          <?php echo $this->Html->link('Nueva Noticia', array('controller'=>'noticias','action'=>'add'),array('class'=>'dropdown-item')) ?>

          <?php echo $this->Html->link('Nuevo Cliente', array('controller'=>'clientes','action'=>'add'),array('class'=>'dropdown-item')) ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Algo mas aqui</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php echo $this->Html->link('Nuevo Cliente', array('controller'=>'clientes','action'=>'add'),array('class'=>'dropdown-item')) ?>

          

          <?php echo $this->Html->link('Ver Cliente', array('controller'=>'clientes','action'=>'index'),array('class'=>'dropdown-item')) ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Algo mas aqui</a>
        </div>
      </li>
      <li class="nav-item">

      <li class="nav-item">
        <?php echo $this->Html->link('Pedidos', array('controller' => 'pedidos', 'action' => 'carrito') ,array('class'=>'nav-link')) ?>
      </li>

        <!--<a class="nav-link disabled" href="#">Desactivado</a>-->
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>