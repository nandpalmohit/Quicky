<?php 
	session_start();
	error_reporting(0);
	include_once "config.php";
	$outgoing_id = $_SESSION['unique_id'];
	$sql = mysqli_query($conn,"SELECT * FROM user_acc WHERE NOT unique_id = {$outgoing_id}");
	$output = "";
	if(mysqli_num_rows($sql) == 1){
		$row = mysqli_fetch_assoc($sql);
		$output .= "No users are available to chat";
	}
	elseif (mysqli_num_rows($sql) > 0) {
		include "data.php";
	}
	echo $output;
?>