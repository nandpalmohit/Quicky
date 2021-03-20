<?php
	session_start();
	// error_reporting(0);
	if (!isset($_SESSION['unique_id'])) {
		header("location: login.php");
	}
?>
<!-- header file -->
<?php include_once "header.php"; ?>
<body>
	<!--  -->
	<div class="wrapper">
		<section class="chat-area">
			<!-- header -->
			<header>
				<?php
					include_once "php/config.php";
					$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
					$sql = mysqli_query($conn, "SELECT * from user_acc WHERE unique_id = {$user_id}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql); //insert data in $row
					}
				?>
				<a class="back-icon" href="user.php"><i class="fas fa-arrow-left"></i></a>
				<img src="php/assets/<?php echo $row['user_image']; ?>" alt="">
				<div class="details">
					<span><?php echo $row['user_fname']." ".$row['user_lname']; ?></span>
					<p><?php echo $row['user_status']; ?></p>
				</div>
			</header>
			<!-- chat box -->
			<div class="chat-box">
			</div>
			<!-- msg send box -->
			<form action="" class="typing-area" autocomplete="OFF">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
				<input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
				<input type="text" class="input-field" name="message" placeholder="Type a new message here....">
				<button type="submit"><i class="fab fa-telegram-plane"></i></button>
			</form>
		</section>
	</div>
	<!-- javascript for chat -->
	<script src="javascript/chat.js"></script>
</body>
</html>