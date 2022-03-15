
@section("editModel")
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body pl-3 pr-3 w-75">
        <input type="text" class="form-control border-bottom mb-2 user_id" value="id" >
        <input type="text" class="form-control border-bottom mb-2 user_name" value="name">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN"> 
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
        <input type="text" class="form-control border-bottom mb-2" value="ADMIN">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection