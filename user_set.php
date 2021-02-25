<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sympols -->
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<title>User Info</title>
	</head>
	
	<body>
	
	<?php include "header.php"; ?>	
	
	<div class="page-wrapper">
		<h1>Hello, <?php echo $_SESSION['userName']; ?></h1>

		<button class="uBt" onclick="window.location.href='change-password.php'">Change Password</button>
		<br>
		<br>
		<button class="uBt" onclick="window.location.href='change-username.php'">Change Username</button>
		<br>
		<br>
		<button class="uBt" onclick="window.location.href='logout.php'">Logout</button>
		
		<br>
		<br>
		<form class="staf">
			Last upload: <?php print_r($_SESSION["uDate"]);?>
			<br>
			<br>
			Number of uploads: <?php print_r($_SESSION["nOfEntries"]);?>
		</form>
	</div>
	
	<?php include "footer.php";?>

	</body>
</html>