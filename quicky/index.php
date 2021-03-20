<?php
	session_start();
	if(isset($_SESSION['unique_id'])) {
		header("location: user.php");
	}
?>

<!-- header file -->
<?php include_once "header.php"; ?>

<body>
<!-- Quicky - Realtime Messanger App By Nandpal Mohit -->

	<!--  -->
	<div class="wrapper">
		<section class="form signup">
			<header>Quicky <span>signup</span></header>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="error-alert">This is an error message!</div>
				<div class="name-details">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="acfName" placeholder="First Name" required>
					</div>
					<div class="field input">
						<label>Last Name</label>
						<input type="text" name="aclName" placeholder="Last Name" required>
					</div>
				</div>
				<div class="field input">
					<label>Email Address</label>
					<input type="email" name="acEmail" placeholder="Enter Email Address" required>
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="acPassword" placeholder="Enter New Password" required>
					<i class="fas fa-eye"></i>
				</div>
				<div class="field image">
					<label>Select Image</label>
					<input type="file" name="acImage" placeholder="Select Image" required>
				</div>
				<div class="field submit">
					<button class="btn-submit" type="submit">Continue to Chat</button>
				</div>
			</form>
			<div class="link">Already signed up? <a href="login.php">Login Now</a></div>
		</section>
	</div>
	<!-- javascript for password show hide -->
	<script src="javascript/pass-show-hide.js"></script>
	<!-- javascript for signup -->
	<script src="javascript/signup.js"></script>
</body>
</html>