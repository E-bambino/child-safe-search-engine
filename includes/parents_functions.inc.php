<?php
// function to check if any input fields are empty
function emptyInputSignup($fname, $lname, $username, $email, $password, $password2)
{
    if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($password2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function to check if parent already exists in the database
function parentExists($conn, $username, $email)
{
    $sql = "SELECT * FROM parents WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /parent_signup.php?error=parentexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $checkResults = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($checkResults)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// function to create a new user record in the database
function createParent($conn, $fname, $lname, $username, $email, $password)
{
    $fullName = $fname . " " . $lname;
    $sql = "INSERT INTO parents (full_name, username, email, password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /parent_signup.php?error=stmtfailed");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $fullName = $fname . " " . $lname;

    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $username, $email, $hashedPass);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: /parent_signup.php?error=none");
    exit();
}


// function to check if any input fields are empty
function emptyInputLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


// function to log in a parent
function loginParent($conn, $username, $password)
{
    $parentExists = parentExists($conn, $username, $username);

    if ($parentExists === false) {
        $_SESSION['error'] = "wronglogin";
        header("location: /parent_login.php");
        exit();
    }

    $hashedPass = $parentExists["password"];
    $checkPassword = password_verify($password, $hashedPass);

    if ($checkPassword === false) {
        header("location: /parent_login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['parentId'] = $parentExists["parent_id"];
        $_SESSION['parentUsername'] = $parentExists["username"];
        $_SESSION['justLoggedIn'] = "Logged In";
        header("location: /index.php");
        exit();
    }
}