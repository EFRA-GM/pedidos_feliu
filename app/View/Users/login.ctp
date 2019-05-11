<style>

  @font-face{
    font-family:Fuentechida;
    src:url(<?php echo Router::url('/').'files/font/OleoScript-Regular.ttf'; ?>);    
  }

  body{
        background-image: url(<?php echo Router::url('/').'img/cerveza_fondo.jpg'; ?>);
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment:fixed;
    }
</style>

  <div class="container formulario">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
      <!-- <img src="imagenes/heineken.png" class="logo center-block"> -->
      <?php echo $this->Html->image('heineken.png', array('class' => 'logo center-block')); ?>
      </div>
    </div>
     
    <div class=" espaciado">
    </div>

    <div class="row">
      <fieldset class="col-xs-10 col-xs-offset-1">
        <legend class="hidden-xs">
          <h3>inicio de sesi&oacute;n</h3>
        </legend>
                  
        <!-- <form role="form" class="form-horizontal"> -->
        <?php echo $this->Form->create('User', array('novalidate' => true, 'class' => 'form-horizontal', 'role' => 'form')); ?>
                      
            <div id="div_edad">
              <div class="form-group">
                <label class="col-xs-12" for="Edad"><h4>Edad</h4></label>
                <span id="label_edad" style="color:white;font-family: fuentechida;">0</span>
                <div class="col-xs-10 col-xs-offset-1">
                  <!-- <input type="range" min="1" max="100" value="0" class="slider" id="mi_edad"> -->
                  <?php echo $this->Form->input('edad', array('label' => false, 'class' => 'slider', 'placeholder' => 'Edad', 'type' => 'range', 'min' => 1, 'max' => 100, 'value' => 1 )); ?>
                </div>
              </div>
              <a href="#" id="mostrar_credenciales">O inicia sesion</a>
            </div>
            
            <div id="credenciales" style="display:none">
            
              <div class="form-group">
                <label class="col-xs-12" for="usuario"><h4>Usuario</h4></label>
                <div class="col-xs-10 col-xs-offset-1">
                  <!-- <input type="text" id="usuario" class="form-control Input"> -->
                  <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control Input', 'placeholder' => 'Usuario')); ?>
                </div>
               </div>
            
              <div class="form-group">
                <label class="col-xs-12" for="password"><h4>Password</h4></label>
                <div class="col-xs-10 col-xs-offset-1">
                  <!-- <input type="password" id="password" class="form-control col-xs-12 Input"> -->
                  <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control col-xs-12 Input', 'placeholder' => 'Contraseña')); ?>
                </div>
              </div>
            
              <a href="#" id="mostrar_invitado">Ingresar como invitado</a>
            </div>
            
            <div class="form-group">
              <!-- <button type="submit" class="btn btn-danger center-block">Aceptar</button> -->
              <?php echo $this->Form->button('Acceder', array('class' => 'btn btn-danger center-block')); ?>
            </div>
                   
        <?php echo $this->Form->end(); ?>
      <!-- </form> -->




      </fieldset>
        
    </div>
  </div>


<script type="text/javascript"> 
  
    $(document).ready(function(){ 
    
      $('#mostrar_credenciales').on('click',function(){
        cambiar();
      });
      
      $('#mostrar_invitado').on('click',function(){
        cambiar();
      });
      
      $('#UserEdad').change(function(){
        document.getElementById('label_edad').innerHTML = $(this).val();
      });
      
      
      function cambiar(){
        $('#credenciales').toggle();
        $('#div_edad').toggle();
        $('#UserEdad').val(0);
        $('#UserUsername').val('');
        $('#UserPassword').val('');
        document.getElementById('label_edad').innerHTML = 0;
      }
    });
</script>



