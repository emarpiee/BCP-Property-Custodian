<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP MySQL AJAX jQuery - Bootstrap Modal v.5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Create New User Modal -->
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
                    <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="firstNameEdit" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstNameEdit" name="FirstName"
                                placeholder="Please Enter Your First Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lastNameEdit" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastNameEdit" name="LastName"
                                placeholder="Please Enter Your Last Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="emailEdit" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="emailEdit" name="Email"
                                placeholder="Please Enter Your Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mobileEdit" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="mobileEdit" name="Mobile"
                                placeholder="Please Enter Your Mobile Number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-Danger" onclick="getUser('.$requestID.')">Delete</button>
                    <button type="button" class="btn btn-outline-dark" onclick="updateUser()">Update</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddenData">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container my-5">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-text">
                    CRUD PHP MySQL AJAX jQuery - Bootstrap Modal v.5
                </span>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#createModal">
                    Add New Users
                </button>
            </div>
        </nav>
        <div id="displayDataTable"></div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>