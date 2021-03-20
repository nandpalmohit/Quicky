<?php
	session_start();
	if (isset($_SESSION['unique_id'])) { //if user is logged in 
		include_once "config.php";
		$logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
		if(isset($logout_id)){
			$status = "Offline now";
			$sql = mysqli_query($conn, "UPDATE user_acc SET user_status = '{$status}' WHERE unique_id = {$logout_id}");
		}
		if($sql){
			session_unset();
			session_destroy();
			header("location: ../login.php");
		}else{
			header("location: ../user.php");

		}
	}else{
		header("location: ../login.php");
	}
?>