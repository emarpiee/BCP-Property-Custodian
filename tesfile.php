<?php 	
	include('configs/config.php');
	$sql = 'SELECT * FROM pc_accounts';
	$result = mysqli_query($conn, $sql);
	$accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Test 
	</title>
</head>
<body>
	<h1>
		Users
	</h1>
	<div>
		<ul>
			<?php foreach($accounts as $account): ?>
				<li>
					<p>
						<?php echo htmlspecialchars($account['lastName'] . ", " . $account['firstName']); ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</body>
</html>