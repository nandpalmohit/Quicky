<?php
	session_start();
	// error_reporting(0);
	include_once "config.php";
	$email = mysqli_real_escape_string($conn, $_POST['acEmail']);
	$password = mysqli_real_escape_string($conn, $_POST['acPassword']);

	if(!empty($email) && !empty($password)){

		// check the user entered email and password is coorect or not.
		$sql = mysqli_query($conn, "SELECT * FROM user_acc WHERE user_email = '{$email}' AND user_pass = '{$password}'");

		if(mysqli_num_rows($sql) > 0) { 
			//if the data is correct
			$row = mysqli_fetch_assoc($sql);
			$status = "Active now";
			$sql2 = mysqli_query($conn, "UPDATE user_acc SET user_status = '{$status}' WHERE unique_id = {$row['unique_id']}");
			if($sql2){
				$_SESSION['unique_id'] = $row['unique_id'];
				echo 'success';
			}
		}
		else{
			echo 'Email or Password is wrong!';
		}
	}
	else{
		echo 'All Input fields are required';
	}
?>