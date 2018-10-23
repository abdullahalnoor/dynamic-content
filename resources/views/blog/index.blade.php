@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Blog <a href="{{route('blog.create')}}" class="btn btn-primary float-right" id="categoryModal">
          Add New
        </a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Title</th>
              <th>Tag</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($blogs as $item)
            <tr>
              <td> {{ $item->name }} </td>
              <td> {{ $item->title }} </td>
              <td>

                @foreach ($item->tags as $tag)
                <span>
                      {{ $tag->name }},
                    </span> @endforeach

              </td>
              <td>
                <a href="{{route('blog.edit',$item->id)}}" class="btn btn-info">Edit</a>
                <form action="{{route('blog.delete')}}" method="POST">
                  @csrf @method('DELETE')
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <input type="submit" class="btn btn-danger" value="Delete">
                </form>

              </td>
            </tr>
            @empty @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection
 @push('script') 
@endpush