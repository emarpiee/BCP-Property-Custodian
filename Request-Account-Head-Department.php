<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Register an Account</title>
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

					<!-- REGISTRATION FORM -->
					<form action="" method="POST">
						<?php include('forms/Account-Form.php'); ?>
						<div class="row justify-content-center gap-5">
							<button type="submit" class=" col-5 btn btn-primary" name="register">
								Submit
							</button>
							<a class="col-5 btn btn-outline-secondary" href="login.php" role="button">Login Instead</a>
						</div>
					</form>
					<span class="loginLineBreak my-4"></span>
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