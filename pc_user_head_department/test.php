<?php include('../config.php');
//set login attempt if not set
		if(!isset($_SESSION['attempt'])){
			$_SESSION['attempt'] = 0;
		}
 
		//check if there are 3 attempts already
		if($_SESSION['attempt'] == 3){
			$_SESSION['error'] = 'Attempt limit reach';
		}
		else{
			//get the user with the email
			$sql = "SELECT * FROM users WHERE username = '".$_POST['username']."'";
			$query = $conn->query($sql);
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				//verify password
				if(password_verify($_POST['password'], $row['password'])){
					//action after a successful login
					//for now just message a successful login
					$_SESSION['success'] = 'Login successful';
					//unset our attempt
					unset($_SESSION['attempt']);
				}
				else{
					$_SESSION['error'] = 'Password incorrect';
					//this is where we put our 3 attempt limit
					$_SESSION['attempt'] += 1;
					//set the time to allow login if third attempt is reach
					if($_SESSION['attempt'] == 3){
						$_SESSION['attempt_again'] = time() + (30);
						//note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
	?>
