@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Google Recapthe

      </div>
      <div class="card-body">


        @if(Session::has('success'))
        <h4 class="text-success text-center">
          {{ Session::get('success') }}
        </h4>
        @else
        <h4 class="text-danger text-center">
          {{ Session::get('error') }}
        </h4>
        @endif
        <h4 class="text-danger text-center">
          <span id="errorRobot"></span>
        </h4>

        <form id="createForm" action="{{route('google.captha')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="naem">name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="g-recaptcha" data-sitekey="6Lcp33MUAAAAAAJmgH27uf-UZZB7DUl3OH6Xhtii"></div>
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-info" value="Create">
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection
 @push('script')

<script>
  $("#createForm").on("submit",function(e){
    var verToken = grecaptcha.getResponse();
    if(verToken.length === 0){
      $("#errorRobot").text("You are Probably a Robot..");
      e.preventDefault();
    }
  })

</script>





























@endpush