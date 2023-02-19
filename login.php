<?php 
//check if the user already logged in, if true always redirect to index
session_start();
if(isset($_SESSION['login_user'])){
    header('location:homeTest.php');
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/main.css" />
    <link rel="stylesheet" href="style/bootstrap.css" />
    <link rel="stylesheet" href="style/login.css" />
    <title>Login to BCP Porperty Custodian</title>
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
            <div class="form-container d-flex justify-content-center w-100 p-3 p-lg-5">
                <div class="m-auto">
                    <div class="form-header1 ps-2 mb-5">
                        <h1 class="header1 fw-bold fs-1 m-0">BCP</h1>
                        <h1 class="header2 fw-bold fs-1 m-0">PROPERTY CUSTODIAN</h1>
                    </div>
                    <form action="session.php" method="POST">
                        <span class="loginLineBreak my-4"></span>
                        <div class="mb-3">
                            <label htmlFor="exampleInputEmail1" class="form-label fw-semibold fs-6">
                                Email
                            </label>
                            <input type="email" class="inputField input-form form-control px-3 fs-6 fw-normal" required name="email" placeholder="Enter Email Address here" />
                        </div>
                        <div class="mb-3">
                            <label htmlFor="inputPassword" class="form-label fw-semibold fs-6">
                                Password
                            </label>
                            <div id="login">
                                <div class="passwordContainer">
                                    <input type="password" class="inputField input-form form-control px-3 fs-6 fw-normal" required name="password" placeholder="Enter Password here"/>
                                    <i class="fa-solid fa-eye-slash" id="passwordIconId"></i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="buttonTemplate sumbit-button btn rounded-2 w-100 mt-3" name="submit">
                            Log in
                        </button>
                        <div class="mb-3">
                            <?php 
                            if(isset($_REQUEST["err"]))
                                $msg="Invalid username or Password";
                            ?>
                            <p class="errorInput"><?php if(isset($msg))
                            {

                                echo $msg;
                            }
                        ?></p>
                    </div>
                    <span class="loginLineBreak my-4"></span>
                    <span>By using our site, you understand and agree to the BCP Property Custodian's Terms of Service and Policy Statement.</span>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    let showPassword = document.querySelector("#passwordIconId");
    const passwordField = document.querySelector("#inputPassword");

    showPassword.addEventListener("click", function() {
        this.classList.toggle("fa-eye");

        const type =
        passwordField.getAttribute("type") === "password" ?
        "text" :
        "password";
        passwordField.setAttribute("type", type);
    });
</script>
</body>

</html>