<?php 
	// connection established
	$conn = mysqli_connect("localhost","root","","quicky_app");

	if($conn){
		// echo 'Database Connected';
	}
	else{
		echo 'Error in Connection';
	}

?>