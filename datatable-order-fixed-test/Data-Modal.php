<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title m-auto" id="exampleModalLabel">DEPARTMENT's INFORMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateData">
          <!-- HIDDEN DATA -->
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">

          <!--  -->
          <div class="mb-3 row">
            <label for="idField" class="col-md-3 form-label">DEPARTMENT ID NO.</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="idField" name="id"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="deptNameField" class="col-md-3 form-label">DEPARTMENT NAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="deptNameField" name="deptName">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="deptCampusField" class="col-md-3 form-label">CAMPUS</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="deptCampusField" name="deptCampus">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="deptRoomField" class="col-md-3 form-label">ROOM</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="deptRoomField" name="deptRoom">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="contactNumberField" class="col-md-3 form-label">DEPARTMENT CONTACT NO.</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="contactNumberField" name="contactNumber">
            </div>
          </div>

          <div class="separator mb-4">HEAD OF THE DEPT. INFORMATION</div>
          <!--  -->
          <div class="mb-3 row">
            <label for="fnameField" class="col-md-3 form-label">FIRSTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="fnameField" name="fname">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="lnameField" class="col-md-3 form-label">LASTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="lnameField" name="fname">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="emailField" class="col-md-3 form-label">EMAIL</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="emailField" name="email">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="statusField" class="col-md-3 form-label">UPDATE ACCOUNT STATUS</label>
            <div class="col-md-9">
              <select class="form-select" aria-label="Item Name" id="statusField" name="status">
                <option value="PENDING">PENDING</option>
                <option value="ACTIVE">ACTIVATE</option>
                <option value="DECLINED">DECLINE</option>
                <option value="ARCHIVED">ARCHIVE</option>
              </select>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Add user Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addUser" action="">
          <div class="mb-3 row">
            <label for="addUserField" class="col-md-3 form-label">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addUserField" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addEmailField" class="col-md-3 form-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="addEmailField" name="email">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addMobileField" class="col-md-3 form-label">Mobile</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addMobileField" name="mobile">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addCityField" class="col-md-3 form-label">City</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addCityField" name="City">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>