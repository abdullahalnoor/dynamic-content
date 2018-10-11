@extends('welcome') 
@section('content')


<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price">
      </div>
      <div class="form-group">
        <label for="">Link</label>
        <input type="text" class="form-control" name="link">
      </div>

      <div id="dynamicInput">

      </div>

      <i class="fa fa-facebook"></i>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Icon</label>
            <input type="text" class="form-control socioicon" autocomplete="off" id="social_icon">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Icon</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <button type="button" id="addInput" class="btn btn-info">Add Pricing Plan Detail</button>



      <div class="form-group mt-5">
        <input type="submit" class="btn btn-primary btn-block" value="Create">
      </div>

    </form>
  </div>
</div>
@endsection
 @push('script')
<script>
  $(document).ready(function () {
     $('.socioicon').on('focus', function () {
        $('.socioicon').iconpicker(); 
        });
     });

  $(document).ready(function(){
  $("#addInput").on("click",function(e){
    e.preventDefault();
    $("#dynamicInput").append(`<div class="form-group">
      <label for="">Link</label>
      <input type="text" class="form-control" name="link">
    </div>`)
  })
});

</script>









































@endpush