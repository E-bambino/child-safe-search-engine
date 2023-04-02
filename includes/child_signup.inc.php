<?php
session_start();

if (isset($_POST['submit'])) {

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$parent_username = $_SESSION['parentUsername'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	require_once 'db_conn.inc.php';
	require_once './child_functions.inc.php';

	if (emptyInputSignup($fname, $lname, $username, $parent_username, $password, $password2) !== false) {
		header("location: ../child_signup.php?error=emptyinput");
		exit();
	}

	if (childExists($conn, $username) !== false) {
		header("location: ../child_signup.php?error=childexists");
		exit();
	}

	createChild($conn, $fname, $lname, $username, $parent_username, $password);
} else {
	header("location: ../child_signup.php");
	exit();
}
