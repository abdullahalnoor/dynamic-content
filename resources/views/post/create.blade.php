@extends('welcome') 
@section('content')


<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="{{route('post.create')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}"> @if($errors->has('title'))
        <span>
          {{ $errors->first('title') }}
        </span> @endif
      </div>
      <div class="form-group">
        <label for="date">date</label>
        <input type="date" class="form-control" name="date" value="{{old('date')}}"> @if($errors->has('date'))
        <span>
                {{ $errors->first('title') }}
              </span> @endif
      </div>

      <div class="form-group">
        <label for="time">time</label>
        <input type="time" class="form-control" name="time" value="{{old('time')}}"> @if($errors->has('time'))
        <span>
                {{ $errors->first('time') }}
              </span> @endif
      </div>
      <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" cols="30" rows="10" class="form-control"></textarea> @if($errors->has('description'))
        <span>
                  {{ $errors->first('description') }}
                </span> @endif
      </div>




      <div class="form-group mt-5">
        <input type="submit" class="btn btn-primary btn-block" value="Create">
      </div>

    </form>
  </div>
</div>
@endsection