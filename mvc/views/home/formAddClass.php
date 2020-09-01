<div id="add" data-toggle="modal" data-target="#addClass"></div>
  <div class="modal" id="addClass">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD CLASS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Id Class:</span>
            </div>
            <input type="text" class="form-control" id="idClass">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Name Class:</span>
            </div>
            <select class="form-control" id="nameClass">
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
            <input type="number" class="form-control" id="numberStudent">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Time Start Teach:</span>
            </div>
            <input type="time" class="form-control" id="timeStartTeach">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Time End Teach:</span>
            </div>
            <input type="time" class="form-control" id="timeEndTeach">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Date Start:</span>
            </div>
            <input type="date" class="form-control" id="dateStart">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Date End:</span>
            </div>
            <input type="date" class="form-control" id="dateEnd">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Address:</span>
            </div>
            <input type="text" class="form-control" id="address">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Email Teacher:</span>
            </div>
            <select class="form-control" id="emailTeacher">
              <?php
              //print_r($data["listTeacher"]);
                foreach ($data["listTeacher"] as $key) {
                  echo "<option value='$key->email'>$key->email</option>";
                } 
              ?>
            </select>
          </div>
        </div>
        

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger buttonCommit" data-dismiss="modal" onclick="add()">Add</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>