@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Product
        <button type="button" class="btn btn-primary float-right" id="addProductModal">
          Add New
        </button>
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
            @forelse ($products as $product)
            <tr>
              <td> {{ $product->name }} </td>
              <td>
                <a href="" class="btn btn-info editProduct" data-route="{{route('product.edit',$product->id)}}">Edit</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="2" class="text-center">No Product Found...</td>
            </tr>
            @endforelse
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

<script>
  $(document).ready(function(){
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    
      $("#addProductModal").on("click",function(e){
        e.preventDefault();
        $.get("{{route('product.create')}}",function(data){
          $("#modals").empty().append(data);
          // console.log(data);
          $("#modals #productModal").modal("show");
        })
      });

      $("#modals").on("submit","#productCreateForm",function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
          url:"{{route('product.create')}}",
          data:formData, 
          cache: false, 
          contentType: false,
          processData: false,
          type:'POST',
        })
        .done(function(data){
          console.log(data);
        })
        .fail(function(err){
          console.log(err.responseJSON.errors.image);
          $("#modals #errImage").empty().append(err.responseJSON.errors.image);
        });
      });

      $(".editProduct").on("click",function(e){
        e.preventDefault();
        var route = $(this).data("route");
        $.get(route,function(data){
          $("#modals").empty().append(data);
          $("#modals #productModal").modal("show");
        })
      })

  });

</script>


























@endpush