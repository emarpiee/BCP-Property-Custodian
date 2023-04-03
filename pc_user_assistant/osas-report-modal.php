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
          <!-- HIDDEN DATA -->
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">

          <!--  -->
          <div class="mb-3 row">
            <label for="idField" class="col-md-3 form-label">ID</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="idField" name="ID"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="concernField" class="col-md-3 form-label">CONCERN</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="concernField" name="concern"  disabled readonly>
            </div>
          </div>


          <!--  -->
          <div class="mb-3 row">
            <label for="moField" class="col-md-3 form-label">MONITORED OFFICER</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="moField" name="moField"  disabled readonly>
            </div>
          </div>


          <!--  -->
          <div class="mb-3 row">
            <label for="facilityField" class="col-md-3 form-label">FACILITY</label>
            <div class="col-md-9">
              <textarea class="form-control" id="facilityField" name="facilityField" style="resize: none;" disabled readonly></textarea>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="smField" class="col-md-3 form-label">SPOT MONITORING</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="smField" name="smField"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="receivedByField" class="col-md-3 form-label">RECEIVED BY</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="receivedByField" name="receivedByField"  disabled readonly>
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="etaField" class="col-md-3 form-label">ETA</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="etaField" name="etaField" disabled readonly >
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="statusField" class="col-md-3 form-label">STATUS</label>
            <div class="col-md-9">
              <select class="form-select" aria-label="Item Name" id="statusField" name="statusField" disabled readonly>
                <option value="Pending">PENDING</option>
                <option value="Approved">APPROVE</option>
                <option value="Declined">DECLINE</option>
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>