<div class="white-square">
<div id="map"></div>
</div>
<script type="text/javascript">
  
  var map, marker;
  function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8
        });


        var d = document;
        var findText = d.querySelector('pre');

        var regV_lat = /\[lat\] => (.*)/gi; 
        var text_lat = findText.textContent.match(regV_lat); 
        var result_lat = text_lat.join().replace("[lat] => ","");

        var regV_lng = /\[lng\] => (.*)/gi; 
        var text_lng = findText.textContent.match(regV_lng); 
        var result_lng = text_lng.join().replace("[lng] => ","");

        var regV_description = /\[description\] => (.*)/gi; 
        var text_description = findText.textContent.match(regV_description); 
        var result_description = text_description.join().replace("[description] => ","");


        var position = new google.maps.LatLng(result_lat, result_lng);
        var image = 'assets/img/ukraine.png';

        marker = new google.maps.Marker(
        {
          position: position,
          map: map,
          icon: image,
          animation: google.maps.Animation.DROP,
          title: result_description
        });
        map.setCenter(position);
  }

</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqYMMNXZkWhvk_1YD0FjDmfFwXBdxXNc&callback=initMap">
</script>