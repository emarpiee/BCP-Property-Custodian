<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login to BCP Porperty Custodian</title>
    <link rel="stylesheet" href="style/main.css" />
    <link rel="stylesheet" href="style/bootstrap.css" />
    <link rel="stylesheet" href="style/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/images/bcp-logo.png">
    <style>
        .custom-tooltip {
            --bs-tooltip-bg: var(--bs-secondary);
        }
    </style>
</head>
<body>
    <div class="loginContainer">
        <div class="d-lg-flex position-relative">
            <div class="d-flex logoContainer">
                <div class="polygon1 position-relative">
                    <img class="logo" src="assets/images/bcp-logo.png" alt="bcp-logo" />
                </div>
                <div class="polygon2"></div>
            </div>
            <div class="form-container d-flex justify-content-center w-100 p-1 p-lg-4">
                <div class="mt-1 px-5">
                    <div class="form-header1 ps-2 mb-5">
                        <h1 class="header1 fw-bold fs-1 m-0">BCP</h1>
                        <h1 class="header2 fw-bold fs-2 m-0">PROPERTY CUSTODIAN</h1>
                    </div>
                    <span class="loginLineBreak my-4"></span>
                    <form action="" method="POST">
                        <!-- ACCOUNT INFORMATION -->
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="EM" name="email" placeholder="Email" required>
                                    <label for="EM">Email</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating">
                                    <input type="password" minlength="8" maxlength="128" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                    <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
                                </div>
                            </div>
                        </div>

                        <!-- USER INFORMATION -->
                        <div class="row mb-3">

                            <!-- FIRSTNAME -->
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="FN" name="firstName" placeholder="First Name" required>
                                    <label for="FN">First Name</label>
                                </div>
                            </div>

                            <!-- MIDDLE NAME -->
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="MN" name="middleName" placeholder="Middle Name" required>
                                    <label for="MD">Middle Name</label>
                                </div>
                            </div>

                            <!-- LAST NAME -->
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="LN" name="lastName" placeholder="Lastname" required>
                                    <label for="LN">Last Name Name</label>
                                </div>
                            </div>
                        </div>

                        <!-- DEPARTMENT INFO -->
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="DN" name="deptName" placeholder="Department Name" required>
                                    <label for="DN">Department Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" minlength="1" maxlength="1" class="form-control" id="DF" name="deptFloor" placeholder="Department Floor" required>
                                    <label for="DF">Department Floor</label>
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Campus" name="deptCampus" required>
                                    <option value="">Campus...</option>
                                    <option value="MV Campus">MV Campus</option>
                                    <option value="Main Campus">Main Campus</option>
                                    <option value="San Agustin Campus">San Agustin</option>
                                    <option value="Bulacan Campus">Bulacan Campus</option>
                                    <option value="Marine Campus">Marine Campus</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-floating"></div>
                            </div>

                        </div>
                        <div class="row justify-content-center gap-5">
                            <button type="submit" class=" col-5 btn btn-primary" name="register">
                                Submit
                            </button>
                            <a class="col-5 btn btn-outline-secondary" href="login.php" role="button">Login Instead</a>
                        </div>
                    </form>
                    <span class="loginLineBreak my-3"></span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>

        //password eye button
        let showPassword = document.querySelector("#passwordIconId");
        const passwordField = document.querySelector("#inputPassword");
        showPassword.addEventListener("click", function() {
            this.classList.toggle("fa-eye");
            const type =
            passwordField.getAttribute("type") === "password" ?
            "text" : "password";
            passwordField.setAttribute("type", type);
        });

        //initialize tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
</body>

</html>