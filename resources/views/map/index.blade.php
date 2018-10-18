@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Google Map

      </div>
      <div class="card-body">
        <div id="map" style="width:100%;height:400px"></div>
      </div>
    </div>
  </div>

</div>

<div id="modals">

</div>
  @include('components.delete-modal')
@endsection
 @push('script')
<script>
  // Initialize and add the map
  // function initMap() {
    // The location of Uluru
  //   var uluru = {lat: -25.344, lng: 131.036};
  //   // The map, centered at Uluru
  //   var map = new google.maps.Map(
  //       document.getElementById('map'), {zoom: 4, center: uluru});
  //   // The marker, positioned at Uluru
  //   var marker = new google.maps.Marker({position: uluru, map: map});
  // // }
$(document).ready(function(){
  // var uluru = {lat: -25.344, lng: 131.036};
  var uluru = new google.maps.LatLng(-33.8665433,151.1956316);

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru
  });
  // var marker = new google.maps.Marker({
  //   position: uluru,
  //   map: map
  // });

  // var pyrmont = new google.maps.LatLng(-33.8665433,151.1956316);

  var request = {
    location: uluru,
    radius: '500',
    type: ['restaurant']
  };
 
  service = new google.maps.places.PlacesService(map);
  
  service.nearbySearch(request, callback);

    function callback(results, status) {
      console.log(results);
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        var place = results[i];
        createMarker(results[i]);
        }
      }
    }


})

</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY9YR1kuI7vib6-t2zeIhBtDFynNoJdA4&libraries=places"></script>
































@endpush