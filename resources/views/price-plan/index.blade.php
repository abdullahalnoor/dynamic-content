@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Pricing Paln
        <a href="{{route('pricing.create')}}" class="btn btn-primary float-right" id="categoryModal">
          Add New
        </a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
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