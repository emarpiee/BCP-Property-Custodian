<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">DEPARTMENT's INFORMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateData">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="fnameField" class="col-md-3 form-label">FIRSTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="fnameField" name="fname">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="lnameField" class="col-md-3 form-label">LASTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="lnameField" name="fname">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="emailField" class="col-md-3 form-label">EMAIL</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="emailField" name="email">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="statusField" class="col-md-3 form-label">ACCOUNT STATUS</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="statusField" name="status">
            </div>
          </div>
          <!-- <div class="mb-3 row">
            <label for="cityField" class="col-md-3 form-label">City</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="cityField" name="City">
            </div>
          </div> -->
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