<?php
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['userName'])){

	include "db_conn.php";

	if (isset($_POST['op']) && isset($_POST['np']) 
		&& isset($_POST['c_np'])){
	
		function validate($data){
			$data = trim($data); //remove spaces
			$data = stripslashes($data); //remove quotes -> read as text
			$data = htmlspecialchars($data);
			return $data;
		}

		$op = validate($_POST['op']);
		$np = validate($_POST['np']);
		$c_np = validate($_POST['c_np']);

		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $np);
		$lowercase = preg_match('@[a-z]@', $np);
		$number = preg_match('@[0-9]@', $np);
		$specialChars = preg_match('@[^\w]@', $np);

		if(empty($op)){
			header("Location: change-password.php?error=Old password is required");
			exit();
		} else if(empty($np)){
			header("Location: change-password.php?error=New password is required");
			exit();
		}else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($np) < 8) {
			header("Location: change-password.php?error=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character&$user_data");
			exit();
		} else if($np !== $c_np){
			header("Location: change-password.php?error=The current password does not match");
			exit();
		} else {
			//hashing password
			//$op = md5($op);
			//$np = md5($np);
			$id = $_SESSION['userID'];

			$result = mysqli_query($conn,"SELECT password FROM person WHERE userID='$id' AND password='$op'");

			if(mysqli_num_rows($result) === 1){
				
				$result2 = mysqli_query($conn,"UPDATE person SET password='$np' WHERE userID='$id'");
				header("Location: change-password.php?success=Your password has been updated successfully");

			} else{
				header("Location: change-password.php?error=Incorrect password");
				exit();
			}
		}

	} else {
		header("Location: change-password.php");
		exit();
		}

} else{
	header("Location: index.php");
	exit();
}