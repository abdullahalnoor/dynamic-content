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




 <script>
    function initMap() {
      var options = {
        center: {
          lat: 23.8103,
          lng: 90.4125
        },
        zoom: 8,
      }
      var map = new google.maps.Map(document.getElementById('map'), options);
      /*
            var marker = new google.maps.Marker({
              position: {
                lat: 23.8103,
                lng: 90.4125
              },
              icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
              map: map
            });
            var infoWindow = new google.maps.infoWindow({
              content: '<h4>Dahaka Mega City</h4>'
            });

            marker.addListener('click', function () {
              infoWindow.open(map, marker)
            });
            */
      //add marker
      // addMarker({
      //   lat: 23.8103,
      //   lng: 90.4125
      // });
      // addMarker({
      //   lat: 23.6238,
      //   lng: 90.5000
      // });
      // addMarker({
      //   lat: 23.4607,
      //   lng: 91.1809
      // })

      // function addMarker(coords) {
      //   var marker = new google.maps.Marker({
      //     position: coords,
      //     map: map,
      //     icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
      //   })
      // }

      // addMarker({
      //   coords: {
      //     lat: 23.8103,
      //     lng: 90.4125
      //   },
      //   icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
      // });
      // addMarker({
      //   coords: {
      //     lat: 23.6238,
      //     lng: 90.5000
      //   }
      // });
      // addMarker({
      //   coords: {
      //     lat: 23.4607,
      //     lng: 91.1809
      //   }
      // });


      // function addMarker(props) {
      //   var marker = new google.maps.Marker({
      //     position: props.coords,
      //     map: map,
      //     icon: props.icon
      //   })
      // }

      var markers = [{
          coords: {
            lat: 23.8103,
            lng: 90.4125
          },
          icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',

        },
        {
          coords: {
            lat: 23.6238,
            lng: 90.5000
          },
          content: '<h2>Narayangonj</h2>'
        },
        {
          coords: {
            lat: 23.4607,
            lng: 91.1809
          }
        },
      ];

      for (var i = 0; i <= markers.length; i++) {
        addMarker(markers[i]);
      }


      function addMarker(props) {
        var marker = new google.maps.Marker({
          position: props.coords,
          map: map,
          icon: props.icon
        })
      }

      if (props.icon) {
        marker.setIcon(props.icon)
      }
      if (props.content) {
        var infoWindow = new google.maps.infoWindow({
          content: props.content
        })
      }

    }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO17cPBWtPmRdPSILiRjqZjtmbZ1lLyL8&callback=initMap"
    async defer></script>



@endpush