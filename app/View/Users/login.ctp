
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <?php echo $this->Html->image('heineken.png', $options = array('id' => 'icon', 'alt' => 'User Icon')); ?>
    </div>

    <!-- Login Form -->
    <?php echo $this->Form->create('User'); ?>
      <?php echo $this->Form->input('username', array('label' => false, 'class' => 'fadeIn second', 'placeholder' => 'Usuario')); ?>
      <?php echo $this->Form->input('password', array('label' => false, 'class' => 'fadeIn third', 'placeholder' => 'Contraseña')); ?>
      <?php //echo $this->Form->input('edad', array('label' => false, 'class' => 'form-control', 'placeholder' => 'edad')); ?>
      <?php echo $this->Form->button('Acceder', array('class' => 'fadeIn fourth')); ?>
    <?php echo $this->Form->end(); ?>


<!--
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
-->
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>