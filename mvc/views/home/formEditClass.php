<div class="modal" id="editClass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">EDIT CLASS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Id Class:</span>
            </div>
            <input type="text" readonly class="form-control" id="editIdClass">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Name Class:</span>
            </div>
            <select class="form-control" id="editNameClass">
              <?php
              //print_r($data["listSubject"]);
                foreach ($data["listSubject"] as $key) {
                  echo "<option value='$key->nameSubject level $key->level'>$key->nameSubject level $key->level</option>";
                } 
              ?>
            </select>          
            </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Number Student:</span>
            </div>
            <input type="number" class="form-control" id="editNumberStudent">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Time Start Teach:</span>
            </div>
            <input type="time" class="form-control" id="editTimeStartTeach">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Time End Teach:</span>
            </div>
            <input type="time" class="form-control" id="editTimeEndTeach">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Date Start:</span>
            </div>
            <input type="date" class="form-control" id="editDateStart">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Date End:</span>
            </div>
            <input type="date" class="form-control" id="editDateEnd">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Address:</span>
            </div>
            <input type="text" class="form-control" id="editAddress">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Email Teacher:</span>
            </div>
            <select class="form-control" id="editEmailTeacher">
            <?php
              //print_r($data["listTeacher"]);
                foreach ($data["listTeacher"] as $key) {
                  echo "<option value='$key->email'>$key->email</option>";
                } 
              ?>
            </select>          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger buttonCommit" data-dismiss="modal"
            onclick="methodEditClass()">Edit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>