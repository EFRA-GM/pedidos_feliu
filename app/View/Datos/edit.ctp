<!-- Librerias necesarias para mostrar el mapa -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
<!-- Estilos necesarios para el tamaño del mapa -->
<style>
  #map { 
  width: : 50%;
  height: 400px; }
</style>

<?php echo $this->element('menu_admin');  ?>

<?php echo $this->Form->create('Dato'); ?>
	<fieldset>
		<legend><?php echo __('Editar Datos'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('telefono');
		echo $this->Form->input('mail');
		echo $this->Form->input('mision');
		echo $this->Form->input('vision');
		echo $this->Form->input('objetivos');
		echo $this->Form->input('direccion');
		echo '<div id="map"></div>';
		echo $this->Form->input('longitud', array('type'=>'hidden'));
		echo $this->Form->input('latitud',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>

<!-- Script para mostrar el mapa -->
<script>
	var map = L.map('map').setView([<?php echo $this->request->data['Dato']['latitud'] ?>, <?php echo $this->request->data['Dato']['longitud'] ?>], 16);
	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    	maxZoom: 18
	}).addTo(map);

	L.control.scale().addTo(map);
	marker = new L.marker([<?php echo $this->request->data['Dato']['latitud'] ?>, <?php echo $this->request->data['Dato']['longitud'] ?>], {draggable: true});
	marker.on('dragend', function(event){
			var position = marker.getLatLng();
			$('#DatoLongitud').val(position.lng);
			$('#DatoLatitud').val(position.lat);
		});
	map.addLayer(marker);
</script>



