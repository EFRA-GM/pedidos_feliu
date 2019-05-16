<?php echo $this->element('menu_admin');  ?>
<?php echo $this->Html->script('push.min'); ?>

	<h2><?php echo __('Pedidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pedidos as $pedido): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($pedido['Cliente']['nombre'].' '.$pedido['Cliente']['apellido'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
		</td>
		<td><?php 
			switch ($pedido['Pedido']['estado']) {
				case '0':
					echo 'Pendiente';
					break;
				case '1':
					echo 'Enviado';
					break;
				case '2':
					echo 'Recibido'; // Confirmado
					break;
				default:
					echo 'Entregado';
					break;
			}
			 ?>&nbsp;</td>
		<td><?php echo $this->Time->format( 'd-m-Y h:i A', h($pedido['Pedido']['fecha_solicitud'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $pedido['Pedido']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $pedido['Pedido']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pedido['Pedido']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de un total de {:count} iniciando en el registro {:start}, finalizando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>


<script type="text/javascript">	
	var env = <?php echo $_SESSION['enviados'] ?> ;
	$(document).ready(function() {
		
		function verificar(){
			$.ajax({
				type: "POST",
				url: basePath + "pedidos/nuevas_solicitudes",
				data: {
					anterior: env
				},
				dataType: "json",
				success: function (data){

					//si el numero regresado es mayor a 0 entonces mostrar el mensaje
					if (data.resultado.diferencia > 0){
						env = env + data.resultado.diferencia;
						mostrar();
					}
				},
				error: function(){
					alert("Tenemos problemas!!!");
				}
			});
		}

		function mostrar(){
			Push.create("Nueva Solicitud",{
				body: "Un Cliente acaba de enviar un nuevo pedido",
				icon: basePath + "img/logoh.png",
				onClick: function () {
					window.location = basePath + "pedidos/";
					this.close();
				}
			});
		}


		setInterval(verificar, 5000);
	});
</script>