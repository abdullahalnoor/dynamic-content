<div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="catEditForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" value="{{$category->id}}" name="id">
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
            <span id="errName" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <label for="">Stauts</label>
            <select name="status" class="form-control">
              <option> Select One</option>
              <option value="1" {{$category->status == 1 ? 'selected':'' }}>Published</option>              
              <option value="0" {{$category->status == 0 ? 'selected':'' }}>Unpublished</option>
            </select>
            <span id="errStatus" class="text-danger font-weight-bold"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>