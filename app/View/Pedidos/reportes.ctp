<?php echo $this->element('menu_admin');  ?>
<?php 

echo $this->Html->css(array('jquery-ui.min'));	
echo $this->Html->script(array('jquery-ui.min'));

?>

<h1>PEDIDOS CONFIRMADOS</h1>
<div class="index">
	<?php 

	echo $this->Form->create('Pedido');
		echo $this->Form->input('inicio', array('required' => 'required'));
		echo $this->Form->input('fin', array('required' => 'required'));
	echo $this->Form->end('Enviar');

	?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('pedidos'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('productos'), array('action' => 'viewpdf')); ?></li>
	</ul>
</div>


<script type="text/javascript">
	
	$(function(){
    $("#PedidoFin").datepicker({
        dateFormat: "dd-mm-yy"
    });
    $("#PedidoInicio").datepicker({
        dateFormat: "dd-mm-yy"
    });
});
</script>

