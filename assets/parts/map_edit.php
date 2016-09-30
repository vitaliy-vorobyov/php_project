<div class="white-square">
<div id="map"></div>
</div>
<script type="text/javascript">
  
  var map, marker;
  function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8
        });

        var position = new google.maps.LatLng($("#lat").val(), $("#lng").val());
        var image = 'assets/img/ukraine.png';

        marker = new google.maps.Marker(
        {
          position: position,
          map: map,
          icon: image,
          animation: google.maps.Animation.DROP,
          title: $("#address").val()
        });
        map.setCenter(position);
  }

</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqYMMNXZkWhvk_1YD0FjDmfFwXBdxXNc&callback=initMap">
</script>