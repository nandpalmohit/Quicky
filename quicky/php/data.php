<?php
	error_reporting(0);
	$outgoing_id = $_SESSION['unique_id'];
	while($row = mysqli_fetch_assoc($sql)){

		$sql2 = "SELECT * FROM chat_master WHERE (incoming_acc_id = {$row['unique_id']} 
				 OR outgoing_acc_id = {$row['unique_id']}) AND (outgoing_acc_id = {$outgoing_id} 
				 OR incoming_acc_id = {$outgoing_id}) ORDER BY chat_id DESC LIMIT 1";

		$query2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($query2);

		if(mysqli_num_rows($query2) > 0){
			$result = $row2['message'];
		}else{
			$result = "No message available";
		}
		// trimming the message for display
		(strlen($result) > 28) ? $msg = substr($result,0, 28) : $msg = $result;
		// adding you: if login user send msg last
		($outgoing_id == $row2['outgoing_acc_id']) ? $you = "You: " : $you = "";
		// check user status
		($row['user_status'] == "Offline now") ? $offline = "offline" : $offline = "";

			$output .= '<a href="chat.php?user_id='.$row['unique_id'].'" title="">
							<div class="content">
								<img src="php/assets/'. $row['user_image'] .'" alt="">
								<div class="details">
									<span>'. $row['user_fname']." ".$row['user_lname'] .'</span>
									<p>'. $you . $msg.'</p>
								</div>
							</div>
							<div class="status-dot '.$offline.' "><i class="fas fa-circle"></i></div>
						</a> '; 
	}
?>