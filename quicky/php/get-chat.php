<?php
	session_start();
	if (isset($_SESSION['unique_id'])) {

		include_once "config.php";
		$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
		$output = "";

		$sql = "SELECT * FROM chat_master LEFT JOIN user_acc on user_acc.unique_id = chat_master.outgoing_acc_id
				WHERE (outgoing_acc_id = {$outgoing_id} AND incoming_acc_id = {$incoming_id}) 
				OR (outgoing_acc_id = {$incoming_id} AND incoming_acc_id = {$outgoing_id}) ORDER BY chat_id ASC";
		$query = mysqli_query($conn, $sql);
		if(mysqli_num_rows($query) > 0){
			while($row = mysqli_fetch_assoc($query)){
				if($row['outgoing_acc_id'] === $outgoing_id){ //user is a msg send
					$output .= '<div class="chat outgoing">
									<div class="details">
					    				<p>' .$row['message'].'</p>
									</div>
								</div> ';
				}else{ //user is a msg reciever
					$output .= '<div class="chat incoming">
									<img src="php/assets/' .$row['user_image'].' ">
									<div class="details">
					    				<p>'. $row['message'] .'</p>
									</div>
								</div> ';
				}
			}
		}
		echo $output;
	}
	else{
		header("../login.php");
	}

?>