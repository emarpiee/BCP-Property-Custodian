<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">ITEM-REQUEST INFORMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateData">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="itemId" id="itemId" value="">
          <input type="hidden" name="trid" id="trid" value="">

          <!--  -->
          <div class="mb-3 row">
            <label for="requestIDField" class="col-md-3 form-label">REQ NO.</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="requestIDField" name="requestID"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="itemSpecificField" class="col-md-3 form-label">ITEM NAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="itemSpecificField" name="itemSpecific"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="itemTypeField" class="col-md-3 form-label">REQUEST-TYPE</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="itemTypeField" name="itemType"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="itemMessageField" class="col-md-3 form-label">REPORT / CONCERN</label>
            <div class="col-md-9">
              <textarea class="form-control" id="itemMessageField" name="itemMessage" style="resize: none;" disabled readonly></textarea>
              <!-- <input type="text" class="form-control" id="itemMessageField" name="itemMessage"  disabled readonly> -->
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="itemQuantityField" class="col-md-3 form-label">REQUESTED QUANTITY</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="itemQuantityField" name="itemQuantity">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="statusOfRequestField" class="col-md-3 form-label">STATUS OF REQUEST</label>
            <div class="col-md-9">
              <select class="form-select" aria-label="Item Name" id="statusOfRequestField" name="statusOfRequest">
                <option value="PENDING">PENDING</option>
                <option value="APPROVED">APPROVE</option>
                <option value="DECLINED">DECLINE</option>
                
              </select>
            </div>
          </div>

          <div class="separator mb-4">DEPARTMENT INFORMATION</div>

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
              <input type="text" class="form-control" id="deptNameField" name="deptName" disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="deptCampusField" class="col-md-3 form-label">CAMPUS</label>
            <div class="col-md-9">
              <select class="form-select" id="deptCampusField" aria-label="Campus" name="deptCampus" disabled readonly>
                <option value="MV Campus">BCP MV Campus</option>
                <option value="Main Campus">BCP Main Campus</option>
                <option value="San Agustin Campus">BCP San Agustin Campus</option>
                <option value="Bulacan Campus">BCP Bulacan Campus</option>
                <option value="Marine Campus">BCP Marine Campus</option>
              </select>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="deptRoomField" class="col-md-3 form-label">ROOM</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="deptRoomField" name="deptRoom" disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="contactNumberField" class="col-md-3 form-label">DEPARTMENT CONTACT NO.</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="contactNumberField" name="contactNumber" disabled readonly>
            </div>
          </div>

          <div class="separator mb-4">USER INFORMATION</div>

          <!--  -->
          <div class="mb-3 row">
            <label for="userRoleField" class="col-md-3 form-label">USER ROLE</label>
            <div class="col-md-9">
              <select class="form-select" id="userRoleField" aria-label="User Role" name="userRole" disabled readonly>
                <option value="Property Custodian Head">Property Custodian Head</option>
                <option value="Property Custodian Clerk">Property Custodian Clerk</option>
                <option value="Property Custodian Auditor">Property Custodian Auditor</option>
                <option value="Head of the Department">Head of the Department</option>
                <option value="Property Custodian Assistant">Property Custodian Assistant</option>
              </select>
            </div>
          </div>


          <!--  -->
          <div class="mb-3 row">
            <label for="fnameField" class="col-md-3 form-label">FIRSTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="fnameField" name="fname" disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="lnameField" class="col-md-3 form-label">LASTNAME</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="lnameField" name="fname" disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="emailField" class="col-md-3 form-label">EMAIL</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="emailField" name="email" disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="statusField" class="col-md-3 form-label">ACCOUNT STATUS</label>
            <div class="col-md-9">
              <select class="form-select" aria-label="Item Name" id="statusField" name="status" disabled readonly>
                <option value="PENDING">PENDING</option>
                <option value="ACTIVE">ACTIVATE</option>
                <option value="DECLINED">DECLINE</option>
                <option value="ARCHIVED">ARCHIVE</option>
              </select>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">UPDATE</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>