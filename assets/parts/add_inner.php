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

        map.addListener('click', function(e)
          {
            $.get('/assets/parts/geocode_reverse.php?latlng=' + e.latLng.lat() + ',' + e.latLng.lng())
            .done(function(response)
            {
              if(marker)
              {
                marker.setMap(null);
              }

              var position = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
              var image = 'assets/img/ukraine.png';

              marker = new google.maps.Marker(
              {
                position: position,
                map: map,
                icon: image,
                animation: google.maps.Animation.DROP,
                title: response.address
              });
              map.setCenter(position);

              $("#lat").val(response.lat);
              $("#lng").val(response.lng);
              $("#address").val(response.address);

            });
          });
      });
    }

</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqYMMNXZkWhvk_1YD0FjDmfFwXBdxXNc&callback=initMap">
</script>

<div id="add" class="form-group">
	<form action="/index.php" method="GET">
		<input type="hidden" name="action" value="save">
		<input type="hidden" class="form-control" type="text" name="lat" id="lat" placeholder="Lat">
		<input type="hidden" class="form-control" type="text" name="lng" id="lng" placeholder="Lng">
		<input class="form-control" type="text" name="name" placeholder="Назва">
		<input class="form-control" type="email" name="email" placeholder="Email">
		<input class="form-control" type="text" name="phone" placeholder="Телефон">
		<input class="form-control" type="text" name="address" id="address" placeholder="Адреса">
		<textarea rows="6" class="form-control" type="text" name="description" placeholder="Опис"></textarea>
		<button class="btn btn-primary btn-block" type="submit">Додати</button>
	</form>
</div>