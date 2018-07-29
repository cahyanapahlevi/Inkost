<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kost Daerah Kampus Jember</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.css">
<style type="text/css">
  body {
    padding-top: 10px;
  }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiwtQ2kajg6d8MXHtXXi-JVCjSC6NRoFw&callback=initMap"
    async defer></script>
 <script>
   function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -8.159841, lng: 113.7230735},
          zoom: 13
        });

        // Menggunakan fungsi HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon: 'location.png',
              title: 'Posisi Kamu',
              animation: google.maps.Animation.DROP,
            });

            map.setCenter(pos);

            var user_location = position.coords.latitude+","+position.coords.longitude;
            var url = "tampil.php";
            var jarak = 1;
            var info = [];
            $.ajax({
                url: url,
                data: "position="+encodeURI(user_location)+"&jarak="+jarak,
                dataType: 'json',
                cache: true,
                success: function(msg){
                  for(i=0; i < msg.data.kost.length;i++){
                    var point = new google.maps.LatLng(parseFloat(msg.data.kost[i].latitude),parseFloat(msg.data.kost[i].longitude));
                    tanda = new google.maps.Marker({
                        position: point,
                        map: map,
                        icon: "marker.png",
                        animation: google.maps.Animation.DROP,
                        title: msg.data.kost[i].alamat_kost
                    });
                  }
                }
            });

          }, function() {
            handleLocationError(true, map.getCenter());
          });
        } else {
          handleLocationError(false, map.getCenter());
        }
      }

      function showPlaces() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -8.159841, lng: 113.7230735},
          zoom: 13
        });

        // Menggunakan fungsi HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            marker = new google.maps.Marker({
              position: pos,
              map: map,
              icon: 'location.png',
              title: 'Posisi Kamu',
              animation: google.maps.Animation.DROP,
            });

            map.setCenter(pos);
            var user_location = position.coords.latitude+","+position.coords.longitude;
            var url = "tampil.php";
            var jarak = document.getElementById("jarak").value;

            $.ajax({
                url: url,
                data: "position="+encodeURI(user_location)+"&jarak="+jarak,
                dataType: 'json',
                cache: true,
                success: function(msg){
                  for(i=0; i < msg.data.kost.length;i++){
                    var point = new google.maps.LatLng(parseFloat(msg.data.kost[i].latitude),parseFloat(msg.data.kost[i].longitude));
                    tanda = new google.maps.Marker({
                        position: point,
                        map: map,
                        icon: "marker.png",
                        animation: google.maps.Animation.DROP,
                        title: msg.data.kost[i].alamat_kost
                    });
                  }
                }
            });

          }, function() {
            handleLocationError(true, map.getCenter());
          });
        } else {
          handleLocationError(false, map.getCenter());
        }
      }
      function handleLocationError(browserHasGeolocation, pos) {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -8.159841, lng: 113.7230735},
          zoom: 13
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script> 
</head> 
<body> 
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <legend><h3>Cari Tempat Kost</h3></legend>
      </div>
    </div>
    <div id="map" style="width:100%; height:600px;"></div>
    <div class="row">
      <div class="col-lg-12">
        <hr>
        <footer>
         <p>&copy; 2016 by <a>CT DevTeam</a></p>
        </footer>
      </div>
    </div>
  </div>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>