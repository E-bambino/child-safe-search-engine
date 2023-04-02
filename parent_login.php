<?php
include_once 'includes/header.php';

if (isset($_SESSION['parentId'])) {
	header("location: /index.php");
	exit();
} elseif (isset($_SESSION['childId'])) {
	header("location: /index.php");
	exit();
}
?>

<section>
	<div class="alert alert-primary" role="alert" id="success-alert">
		User has logged in successfully!
	</div>
	<div class="alert alert-danger" role="alert" id="empty-input-alert">
		Please fill all fields!
	</div>
	<div class="alert alert-danger" role="alert" id="wrong-login-alert">
		Wrong Login Credentials!
	</div>

</section>

<main class="container-fluid">
	<h2>Parent Login</h2>
	<form action="includes/parent_login.inc.php" method="post" accept-charset="utf-8">
		<div class="row row-cols-lg-2 row-cols-sm-1 row-cols-md-2 g-2 my-2">
			<div class="col">
				<div class="form-floating">
					<input type="text" class="form-control" name="username" placeholder="Username or Email">
					<label for="username">Username or Email</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating input-group">
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkPasswordMatch()">
					<label for="password">Password</label>
					<button class="btn btn-sm btn-dark" type="button" id="show-password-button" onclick="togglePasswordVisibility('password', this)">
						<img src="/img/open_eye.svg" alt="">
					</button>
				</div>
			</div>
		</div>
		<button class="btn btn-success" type="submit" name="submit">Log In</button>
	</form>
	<a class="btn btn-outline-dark my-2" href="reset_password.php">Forgot Your Password</a>
</main>

<?php
include_once 'includes/footer.php';
?>

<script>
	// Hide all alerts initially
	$("#success-alert").hide();
	$("#empty-input-alert").hide();
	$("#wrong-login-alert").hide();

	// Get the URL of the current page
	const url = window.location.href;

	// Check if the URL contains a specific string
	if (url.includes("error=wronglogin")) {
		// Display the wrong-login-alert if the string is found
		$("#wrong-login-alert").show();
	} else if (url.includes("error=loginsuccess")) {
		// Display the success-alert if the string is found
		$("#success-alert").show();
	} else if (url.includes("error=emptyinput")) {
		// Display the empty-input-alert if the string is found
		$("#empty-input-alert").show();
	}
</script>