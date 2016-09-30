<div class="white-square">
<div id="map"></div>
</div>
<script type="text/javascript">
  
  var map, marker;
  function initMap() {

      $.get('http://ip-api.com/json')
      .done(function(response)
      {
        var position = new google.maps.LatLng(response.lat, response.lon);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: position
        });

      $.get('assets/parts/markers.php')
      .done(function(response)
      { 
          var bounds = new google.maps.LatLngBounds();
          for (var i=0; i<response.length; i++) 
          {
           var position = new google.maps.LatLng(response[i].lat, response[i].lng);
           bounds.extend(position);
           var image = 'assets/img/ukraine.png';

           marker = new google.maps.Marker(
           {
             position: position,
             map: map,
             icon: image,
             animation: google.maps.Animation.DROP,
             title: response[i].address
           });
           map.setCenter(bounds.getCenter(), map.fitBounds(bounds));
          }
      });
    });
  }

</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqYMMNXZkWhvk_1YD0FjDmfFwXBdxXNc&callback=initMap">
</script>