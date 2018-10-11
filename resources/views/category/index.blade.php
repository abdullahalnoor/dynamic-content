@extends('welcome') 
@section('content')

<div class="row justify-content-center">

  <div class="col-md-8">
    <div class="card ">
      <div class="card-header">
        Categoy
        <button type="button" class="btn btn-primary float-right" id="categoryModal">
          Add New
        </button>
      </div>
      <div class="card-body">
        <table class="table" id="refreshTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                <a href="" class="catEdit btn btn-primary" data-route="{{route('category.edit',$category->id)}}" data-id="{{$category->id}}">Edit</a>
                <a href="" class="catDelete btn btn-danger" data-id="{{$category->id}}" data-title="Category Item Delete">Delete</a>
              </td>
            </tr>
            @empty @endforelse
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
    $.ajaxSetup({
       headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    // alert('dd')
    $("#categoryModal").on("click",function(e){
      e.preventDefault();
      $.get("{{route('category.create')}}",function(data){
        // console.log(data);
        $("#modals").empty().append(data);
        $("#modals #categoryModal").modal("show");
      })
    });


    $("#modals").on("submit","#catCreateForm",function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      console.log(frmData)
      $.ajax({
        url:"{{route('category.store')}}",
        method:"POST",
        data:frmData,
      })
      .done(function(data){
        // console.log(data)
        $("#modals #categoryModal").modal("hide");
        $("#refreshTable").load(location.href + " #refreshTable");
      })
      .fail(function(err){
        // console.log(err.responseJSON);
        var errName = err.responseJSON.errors.name;        
        var errStatus = err.responseJSON.errors.status;
        $("#modals #errName").empty().append(errName);        
        $("#modals #errStatus").empty().append(errStatus);
      });
    });


    $(".catDelete").on("click",function(e){
      e.preventDefault();
      // alert('active');
      var catId = $(this).data('id');
      var title = $(this).data('title');
      title = title.toString();
      catId = parseInt(catId);
      console.log(title);
      $("#deleteModal").modal("show");
      $("#deleteModal #deleteId").val(catId);      
      $("#exampleModalLabel").empty().append("<span>"+title+"</span>");
    });

    $("#delForm").on("submit",function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      $.ajax({
        url:"{{route('category.delete')}}",
        method:"POST",
        data:frmData
      })
      .done(function(data){
        console.log(data)
        $("#deleteModal").modal("hide");
        // location.reload();
        $("#refreshTable").load(location.href + " #refreshTable");
      })
      .fail(function(err){
        
      });
    });

    $(".catEdit").on("click",function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var route = $(this).data("route");
      $.get(route,function(data){
        // console.log(data)
        $("#modals").empty().append(data);
        $("#modals #categoryEditModal").modal("show");
      })
    });

    $("#modals").on("submit","#catEditForm",function(e){
      e.preventDefault();
      var frmData = $(this).serialize();
      // console.log(frmData);
      $.ajax({
        url:"{{route('category.updateData')}}",
        method:"POST",
        data:frmData
      })
      .done(function(data){
        console.log(data);
        $("#modals #categoryEditModal").modal("hide");
        $("#refreshTable").load(location.href + " #refreshTable");
        // window.location.href = '{{route("product.index")}}';
      })
      .fail(function(err){
        console.log(err);
      });
    });


  });

</script>
























































































































@endpush