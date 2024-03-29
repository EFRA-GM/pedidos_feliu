$(document).ready(function(){
	$('.numeric').on('keyup change', function(event){
		var cantidad = Math.round($(this).val());
		ajaxupdate($(this).attr("data-id"),cantidad);
		
	});

	//para que las entradas solo acepten numeros
	$('.numeric').on('input', function(){
		this.value = this.value.replace(/[^0-9]/g,'');
		
	});

	function ajaxupdate(id,cantidad){
		$.ajax({
			type: "POST",
			url: basePath + "pedidos_productos/itemupdate",
			data: {
				id: id,
				cantidad: cantidad
			},
			dataType: "json",
			success: function (data){
				if($('#subtotal_' + data.mostrar_pedido.id).html() != data.mostrar_pedido.subtotal){
					$('#subtotal_' + data.mostrar_pedido.id).html(data.mostrar_pedido.subtotal);
				}
				$('#total').html('$ ' + data.mostrar_pedido.total);

			},
			error: function(){
				alert("Tenemos problemas!!!");
			}
		});
	} 

	$('.remove').click(function(){
		ajaxcart($(this).attr("id"),0);
		return false;
	});

	function ajaxcart(id, cantidad){
		if(cantidad===0){
			$('#row-' + id).fadeOut(1000, function(){$('#row-' + id).remove();});
		}

		$.ajax({
			type: "POST",
			url: basePath + "pedidos_productos/remove",
			data: {
				id: id
			},
			dataType: "json",
			success: function(data){
				$('#msg').html('<div class="alert alert-success flash-msg">Producto eliminado.</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');

				$('#total').html('$ ' + data.mostrar_total_remove);

				if(data.pedidos == ""){
					window.location.replace(basePath + "marcas/index");
				}
			},
			error: function(){
				alert("Tenemos problemas!!!");
			}
		});

	}


});