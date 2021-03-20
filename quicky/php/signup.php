<?php
	session_start();
	include_once "config.php";
	$fname = mysqli_real_escape_string($conn, $_POST['acfName']);
	$lname = mysqli_real_escape_string($conn, $_POST['aclName']);
	$email = mysqli_real_escape_string($conn, $_POST['acEmail']);
	$password = mysqli_real_escape_string($conn, $_POST['acPassword']);

	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		
		// if email is valid
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			// check that email is already exist or not
			$sql = mysqli_query($conn, "SELECT user_email FROM user_acc WHERE user_email = '{$email}'");
			// if email is already exist 
			if(mysqli_num_rows($sql) > 0){
				echo "$email is already exist !";
			}
			else{
				// check the user upload file or not
				if(isset($_FILES['acImage'])){
					$img_name = $_FILES['acImage']['name']; // getting user uploaded image name
					$tmp_img = $_FILES['acImage']['tmp_name']; // temp file to save the file in database/folder.

					$img_explode = explode('.', $img_name); //explode the image 
					$img_ext = end($img_explode); // get the extension of image

					$extension = ['png','jpeg','jpg'];
					if(in_array($img_ext, $extension) === true){
						$time = time(); // used to rename the user file with current time for unique name.

						// move the uploaded file image to folder
						$new_img = $time.$img_name;

						if(move_uploaded_file($tmp_img, "assets/".$new_img)){ // if move uploaded successfully
							$status = "Active Now"; // status of user active now
							$random_id = rand(time(), 10000000); //creating random id for user

							// insert all the data in database table
							$sqlData = mysqli_query($conn, "INSERT INTO user_acc (unique_id, user_fname, user_lname, user_email, user_pass,	user_image, user_status) VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}', '{$new_img}','{$status}')");
							if($sqlData){
								$sql2 = mysqli_query($conn, "SELECT * FROM user_acc WHERE user_email = '{$email}'");
								if(mysqli_num_rows($sql2) > 0){
									$row = mysqli_fetch_assoc($sql2);
									$_SESSION['unique_id'] = $row['unique_id'];
									echo 'success';
								}
							}
						}
					}
					else{
						echo 'Please select an Image file like png, jpeg, jpg';
					}
				}
				else{
					echo 'Please select an Image file for your Profile !';
				}
			}

		}else{
			echo "$email is not a valid Email ID !";
		}
	}
	else{
		echo 'All Input fields are required';
	}
?>