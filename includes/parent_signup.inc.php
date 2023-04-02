<?php

if (isset($_POST['submit'])) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	require_once 'db_conn.inc.php';
	require_once './parents_functions.inc.php';


	if (emptyInputSignup($fname, $lname, $username, $email, $password, $password2) !== false) {
		header("location: ../parent_signup.php?error=emptyinput");
		exit();
	}

	if (parentExists($conn, $username, $email) !== false) {
		header("location: ../parent_signup.php?error=parentexists");
		exit();
	}

	createParent($conn, $fname, $lname, $username, $email, $password);
} else {
	header("location: ../parent_signup.php");
	exit();
}
