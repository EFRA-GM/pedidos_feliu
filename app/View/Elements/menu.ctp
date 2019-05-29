<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="#">

    <?php echo $this->Html->image('logoh.png',array('url' => array('controller'=>'pages','action'=>'home'))); ?>
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

      <?php if($current_user['role'] == 'admin'): ?>
        <?php echo $this->Html->link('Administrador', array('controller'=>'marcas','action'=>'ver'),array('class'=>'nav-link')) ?>
      <?php endif; ?>


      <?php if($current_user['role'] != 'admin' && $current_user['role'] != 'personal'): ?>
        <li class="nav-item">
        <li class="nav-item">
          <?php echo $this->Html->link('Pedidos', array('controller' => 'pedidos', 'action' => 'carrito') ,array('class'=>'nav-link')) ?>
        </li>
          <!--<a class="nav-link disabled" href="#">Desactivado</a>-->
        </li>
      <?php endif; ?>

      <?php if($current_user['role'] == 'cliente'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi Cuenta</a>
          <div class="dropdown-menu"> 
            <?php echo $this->Html->link('Mi información', array('controller'=>'clientes','action'=>'modificar'),array('class'=>'dropdown-item')) ?>
            <?php echo $this->Html->link('Ver pedidos', array('controller'=>'pedidos','action'=>'mis_pedidos'),array('class'=>'dropdown-item')) ?>
          </div>
        </li>
      <?php endif; ?>



      <li class="nav-item active">
        <?php 
          $texto_logout = '';
          if($current_user['role'] == 'publico')
            $texto_logout = 'Iniciar Sesion';
          else
            $texto_logout = 'Salir';
        ?>

        <?php echo $this->Html->link($texto_logout, array('controller'=>'users','action'=>'logout'),array('class'=>'btn btn-danger my-2 my-sm-0')) ?>
      </li>




    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    -->
  </div>

</nav>
