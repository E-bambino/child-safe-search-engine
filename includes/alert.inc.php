<?php
$successAlert = '<div class="alert alert-primary" role="alert" id="success-alert">
	User was signed up successfully! Please Login!
</div>';

$parentExistsAlert = '<div class="alert alert-danger" role="alert" id="parent-exists-alert">
	A parent with those credentials already exists!
	<a href="/parent_login.php">Log in</a>
</div>';

$emptyInputAlert = '<div class="alert alert-danger" role="alert" id="empty-input-alert">
	Please fill all fields!
</div>';

$stmtFailedAlert = '<div class="alert alert-danger" role="alert" id="stmt-failed-alert">
	There was an unexpected error! Contact the developer!
</div>';
$justLoggedInAlert = '<div class="alert alert-success" role="alert">
Welcome User
</div>';
$messageSentAlert = '<script>
  alert("Message Sent Successfuly!");
</script>';
$resetSentAlert = '<div class="alert alert-success" role="alert">
Reset Email Sent Successfully! Check your email!
</div>';
$passResetSuccess = '<div class="alert alert-success" role="alert">
Your Password has been reset successfully!<a class="alert-link" href="/parent_login.php" title="">Login</a>
!
</div>';
$alertBannedSearch = '<div class="alert alert-danger" role="alert">
Your have searchd for a banned word! Your parent will be alerted of your search!
!
</div>';
