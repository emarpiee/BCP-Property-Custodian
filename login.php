<?php 
//check if the user already logged in, if true always redirect to index
session_start();
if(isset($_SESSION['login_user'])){
    if($_SESSION['roleId'] == 1) { // PC HEAD
        header("location:user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 2){ //PC CLERK
    header("location:user_pc_clerk/dashboard.php");
} else if($_SESSION['roleId'] == 3){ //Head Department
    header("location:user_head_department/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:user_pc_assistant/dashboard.php");
}
} 
?>
<!DOCTYPE html>
<html oncontextmenu="return false" lang="en">
<!-- prevent user from right clicking -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login to BCP Porperty Custodian</title>
    <link rel="stylesheet" href="style/main.css" />
    <link rel="stylesheet" href="style/bootstrap.css" />
    <link rel="stylesheet" href="style/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
            <div class="form-container d-flex justify-content-center align-items-center w-100 p-1 p-lg-4">
                <div class="mt-1 px-5">
                    <div class="form-header1 ps-2 mb-5">
                        <h1 class="header1 fw-bold fs-1 m-0">BCP</h1>
                        <h1 class="header2 fw-bold fs-2 m-0">PROPERTY CUSTODIAN</h1>
                    </div>
                    <form action="session.php" method="POST">
                        <span class="loginLineBreak my-4"></span>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="Enter Email Address here" />
                            <label for="floatingEmail">Email Address</label>
                        </div>
                        <div class="mb-3">
                            <div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" required name="password" id="inputPassword" placeholder="Enter Password here" />
                                    <label for="inputPassword">Password</label>
                                    <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="buttonTemplate sumbit-button btn rounded-2 w-100" name="submit"> Log in </button>
                        <div class="mt-2 text-center"> <?php 
                        if(isset($_REQUEST['err'])){?> <p class="p-1 alert alert-danger text-center" role="alert"> <?php echo $_REQUEST['err']; ?> </p> <?php }?> </div>
                        <div class="d-flex small">
                            <a href="#" class="me-auto" style="text-decoration: none;">Forgot your password?</a>
                            <div class="dropdown" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Account requests are only available to BCP employees. Students who wish to request an account for internship purposes within the BCP Property Custodian should first reach out to the office.">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"> Request an Account for... </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="Request-Account-Head-Department.php">Head of the Department</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item disabled" href="#">Auditor</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item disabled" href="#">Property Custodian Assistant</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="loginLineBreak my-3"></span>
                        <span>By using our site, you understand and agree to the BCP Property Custodian's <a href="ToS/Terms-of-Service.php" target="_blank">Terms of Service</a> and <a href="ps/Policy-Statement.php" target="_blank">Policy Statement</a>. </span>
                    </form>
                </div>
            </div>
        </div>`
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
            //password eye button
        let showPassword = document.querySelector("#passwordIconId");
        const passwordField = document.querySelector("#inputPassword");
        showPassword.addEventListener("click", function() {
            this.classList.toggle("fa-eye");
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        });
            //initialize tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            // prevent user from using F12 (inspect element)
        $(document).keydown(function(e) {
            if (e.which === 123) {
                return false;
            }
        });
    </script>
</body>
</html>