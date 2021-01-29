<?php
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['userName'])){
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="satan.css"> 
	<title>Change Password</title>
</head>
<body>      
	<form action="change-p.php" method="post">
		<h2>Change Password</h2>
		
		<?php if(isset($_GET['error'])) { ?> 
			<p class="error"><?php echo $_GET['error'];?> </p>
		<?php } ?>

		<?php if(isset($_GET['success'])) { ?> 
			<p class="success"><?php echo $_GET['success'];?> </p>
		<?php } ?>

		<label>Old Password</label>
		<input type="password" name="op" placeholder="Old Password">
			   
		
		<label>New Password</label>
		<input type="password" name="np" placeholder="New Password">
			   

		<label>Confirm New Password</label>
		<input type="password" name="c_np" placeholder="Confirm New Password">
			   

		<button type="submit">CHANGE</button>
		<a href="user_set.php" class="ca">Back</a>
	</form>
</body>
</html>



<?php
} else{
	header("Location: index.php");
	exit();
}
?>