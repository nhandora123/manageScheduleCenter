<div class="modal" id="deleteClass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DELETE CLASS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form name="deleteClass">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input">

                  <label for="all">
                    <input type="radio" id="all" name="delete" value="1">
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i><span>Xóa hết !</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input">
                  <label for="fromdate">
                    <input type="radio" id="fromdate" name="delete" value="0" checked>
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i><span>Xóa kể từ ngày <span
                        id="labelFromDate"></span></span>
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="deleteButtonClass" data-dismiss="modal" class="btn btn-danger buttonCommit"
            onclick="methodDeleteClass()">DELETE</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
