<?php
	session_start();
	if (!isset($_SESSION['unique_id'])) {
		header("location: login.php");
	}
?>
<!-- header file -->
<?php include_once "header.php"; ?>

<body>
	<!-- wrapper class -->
	<div class="wrapper">
		<section class="user">
			<!-- header -->
			<header id="header" class="">
				<?php
					include_once "php/config.php";
					$sql = mysqli_query($conn, "SELECT * from user_acc WHERE unique_id = {$_SESSION['unique_id']}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql); //insert data in $row
					}
				?>
				<div class="content">
					<img src="php/assets/<?php echo $row['user_image']; ?>" alt="">
					<div class="details">
						<span><?php echo $row['user_fname']." ".$row['user_lname']; ?></span>
						<p><?php echo $row['user_status']; ?></p>
					</div>
				</div>
				<a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
			</header>
			<!-- search -->
			<div class="search">
				<span class="text">Select an user for message</span>
				<input type="text" name="" value="" placeholder="Enter Name to Search...">
				<button type=""><i class="fas fa-search"></i></button>
			</div>
			<!-- users list -->
			<div class="users-list">
			</div>
		</section>
	</div>
	<!-- javascript for search users -->
	<script src="javascript/users.js"></script>

</body>
</html>