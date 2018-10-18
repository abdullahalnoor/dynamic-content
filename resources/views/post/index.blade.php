@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Post
        <a href="{{route('post.create')}}" class="btn btn-primary float-right" id="categoryModal">
          Add New
        </a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>

            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $item)

            <tr>
              <td>{{ $item->title}}</td>
              <td>{!! substr($item->description,0,20) !!} {{ strlen($item->description) > 20?'...':'' }}</td>

            </tr>

            @empty
            <tr>
              <td colspan="3">
                <h3 class="text-center text-danger">
                  No Record Found..
                </h3>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="row justify-content-center">
          {{ $posts->links('post.pagination',['paginator'=>$posts]) }}
        </div>
      </div>
    </div>
  </div>

</div>

<div id="modals">

</div>
  @include('components.delete-modal')
@endsection
 @push('script') 
@endpush