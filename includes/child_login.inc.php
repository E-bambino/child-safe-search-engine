<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	require_once 'db_conn.inc.php';
	require_once './child_functions.inc.php';


	if (emptyInputLogin($username, $password) !== false) {
		header("location: ../child_login.php?error=emptyinput");
		exit();
	}

	loginChild($conn, $username, $password);
} else {
	header("location: ../child_login.php");
	exit();
}