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
  var map;
      function initMap() {
        var uluru = {lat: 23.6895 , lng: 90.4841};
        map = new google.maps.Map(document.getElementById('map'), {
          center:uluru ,
          zoom: 8,
          
        });

        var marker = new google.maps.Marker({position: uluru, map: map});

      }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcGXUfX9HF_srPwsYIKwqQdC1mZaDB2pU&callback=initMap" async
  defer></script>























@endpush