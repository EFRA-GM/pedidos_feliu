$(document).ready(function(){
	$('.addtocart').on('click', function(event){
		$.ajax({
			type: "POST",
			url: basePath + "pedidos/add",
			data: {
				id: $(this).attr("id"),
				cantidad: 1
			},
			dataType: "json",
			success: function(data){
				if (data.resultado == 'invitado') {
					//Inicie sesion para continuar
					$('#msg').html('<div class="alert alert-danger flash-msg">Inicie Sesion para continuar.</div>');
					$('.flash-msg').delay(2000).fadeOut('slow');
				} else {
					$('#msg').html('<div class="alert alert-success flash-msg">Producto agregado al pedido.</div>');
					$('.flash-msg').delay(2000).fadeOut('slow');
				}
			},
			error: function(){
				alert('Tenemos problemas!!!');
			}
		});
		return false;
	});
}); 



