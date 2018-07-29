<?php
  include "koneksi.php";
?>
 
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 1350px;
        height: 700px;
      }
    </style>
     <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
				animation: google.maps.Animation.DROP,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
			marker.addListener('click', toggleBounce);
          }
		  function toggleBounce() {
			   if (marker.getAnimation() !== null) {
				     marker.setAnimation(null);
					   } else {
						     marker.setAnimation(google.maps.Animation.BOUNCE);
							   }
							   }

          <?php
            $query = mysql_query("select * from peta");
          while ($data = mysql_fetch_array($query)) {
            $lat = $data['latitude'];
            $lon = $data['longitude'];
            $nama = $data['nama_kost'];
            echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>