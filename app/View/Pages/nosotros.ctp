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
  width: : 50%;
  height: 400px; }
</style>

<h1>NUESTRA COMPAÑIA</h1>
<br>
<br>


<div id="map"></div>


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