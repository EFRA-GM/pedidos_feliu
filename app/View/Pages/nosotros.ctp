<?php 
# Obtener los datos de la empresa
App::import('Model', 'Dato');
$modelo = new Dato();
$empresa = $modelo->findById(1);
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>

<style>
  #map { 
  height: 580px; }
</style>

<h1>NUESTRA COMPAÑIA</h1>
<br>


<div class="row">
	<div class="col-lg-8">
		<div id="map"></div>
	</div>
	<div class="col-lg-4">

		<div class="card mb-3">
		  <?php echo $this->Html->image('foto.jpg', array('alt'=>'foto', 'class'=>'card-img-top')); ?>
		  <div class="card-body">
		    <h5 class="card-title">Distribuidora Feliu S.A. de C.V.</h5>
		    <p class="card-text">
		    	<b>DIRECCIÓN: </b>
		    	<?php echo $empresa['Dato']['direccion']; ?>
		    </p>
		    <p class="card-text">
		    	<b>TELEFONO: </b>
		    	<?php echo $empresa['Dato']['telefono']; ?>
		    </p>
		    <p class="card-text">
		    	<b>E-MAIL: </b>
		    	<?php echo $empresa['Dato']['mail']; ?>
		    </p>
		    <p class="card-text"><small class="text-muted">Contactanos</small></p>
		  </div>
		</div
	</div>
</div>


<script>
	var map = L.map('map').setView([<?php echo $empresa['Dato']['latitud'] ?>, <?php echo $empresa['Dato']['longitud'] ?>], 16);
	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    	maxZoom: 18
	}).addTo(map);

	L.control.scale().addTo(map);
	marker = new L.marker([<?php echo $empresa['Dato']['latitud'] ?>, <?php echo $empresa['Dato']['longitud'] ?>], 
		{draggable: false,
		title: "Distribuidora Feliu",
		alt: "Distribuidora Feliu"
	}).bindPopup("<h3>Distribuidora Feliu</h3>");
	map.addLayer(marker);
 </script>