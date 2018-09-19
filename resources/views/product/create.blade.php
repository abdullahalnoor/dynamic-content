<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="productCreateForm" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
            <span id="errName" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image">
            <span id="errImage" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <label for="">Stauts</label>
            <select name="status" class="form-control">
              <option> Select One</option>
              <option value="1">Publishe</option>              
              <option value="0">Unpublishe</option>
            </select>
            <span id="errStatus" class="text-danger font-weight-bold"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>