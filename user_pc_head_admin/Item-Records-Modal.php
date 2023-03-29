<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="firstNameAdd" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstNameAdd" name="FirstName"
                                placeholder="Please Enter Your First Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lastNameAdd" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastNameAdd" name="LastName"
                                placeholder="Please Enter Your Last Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="emailAdd" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="emailAdd" name="Email"
                                placeholder="Please Enter Your Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mobileAdd" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="mobileAdd" name="Mobile"
                                placeholder="Please Enter Your Mobile Number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" onclick="addUser()">Submit</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update User Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- REQUEST ID -->
                    <div class="mb-3 row">
                        <label for="updateRequestNo" class="col-sm-3 col-form-label">Reference number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " id="updateRequestNo" name="requestID"
                                placeholder="Reference number..." disabled readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateItemName" class="col-sm-3 col-form-label">Item name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " id="updateItemName" name="itemName"
                                placeholder="Item name..." disabled readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateItemQuantity" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="updateItemQuantity" name="itemQuantity"
                                placeholder="Item quantity..." disabled readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateFullName" class="col-sm-3 col-form-label">Requested by</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="updateFullName" name="fullName"
                                placeholder="Requested by..." disabled readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDeptName" class="col-sm-3 col-form-label">Dept. name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="updateDeptName" name="deptName"
                                placeholder="Department's name..." disabled readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDeptLoc" class="col-sm-3 col-form-label">Dept. Location</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="updateDeptLoc" name="deptLoc"
                                placeholder="Department's location..." disabled readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-outline-dark" onclick="updateUser()">Update</button> -->
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddenData">
                </div>
            </div>
        </div>
    </div>