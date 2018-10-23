@extends('welcome') @push('style')

<link rel="stylesheet" href="{{asset('css/select2.min.css')}}"> 
@endpush 
@section('content')


<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="{{route('blog.create')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="">title</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label for="">tag</label>
        <select class="js-example-basic-multiple form-control" name="tag[]" multiple="multiple">

          @foreach ($tags as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
  
        </select>
      </div>





      <div class="form-group mt-5">
        <input type="submit" class="btn btn-primary btn-block" value="Create">
      </div>

    </form>
  </div>
</div>
@endsection
 @push('script')

<script src="{{asset('js/select2.min.js')}}"></script>



<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>







@endpush