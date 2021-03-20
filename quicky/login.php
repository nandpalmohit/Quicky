<?php
	session_start();
	if (isset($_SESSION['unique_id'])) {
		header("location: user.php");
	}
?>

<!-- header file -->
<?php include_once "header.php"; ?>

<body>
	<!--  -->
	<div class="wrapper">
		<section class="form login">
			<header>Quicky <span>login</span></header>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="error-alert"></div>
				<div class="field input">
					<label>Email Address</label>
					<input type="text" placeholder="Enter Your Email Address" name="acEmail">
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" placeholder="Enter Your Password" name="acPassword">
					<i class="fas fa-eye"></i>
				</div>
				<div class="field submit">
					<button class="btn-submit" type="submit">Continue to Chat</button>
				</div>
			</form>
			<div class="link">Not registered yet? <a href="index.php">Signup Now</a></div>
		</section>
	</div>
	<!-- javascript for password show hide -->
	<script src="javascript/pass-show-hide.js"></script>
	<!-- javascript for login -->
	<script src="javascript/login.js"></script>

</body>
</html>