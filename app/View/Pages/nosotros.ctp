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
	var map = L.map('map').setView([21.248730316048224, -98.77522406614116], 16);
	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    	maxZoom: 18
	}).addTo(map);

	L.control.scale().addTo(map);
	marker = new L.marker([21.248730316048224, -98.77522406614116], {draggable: false});
	map.addLayer(marker);
 </script>
