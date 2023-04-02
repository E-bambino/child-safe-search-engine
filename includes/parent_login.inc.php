<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	require_once 'db_conn.inc.php';
	require_once './parent_functions.inc.php';


	if (emptyInputLogin($username, $password) !== false) {
		header("location: ../parent_login.php?error=emptyinput");
		exit();
	}

	loginParent($conn, $username, $password);
} else {
	header("location: ../parent_login.php");
	exit();
}
