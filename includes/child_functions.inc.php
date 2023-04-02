<?php
// function to check if any input fields are empty
function emptyInputSignup($fname, $lname, $username, $parent_id, $password, $password2)
{
    if (empty($fname) || empty($lname) || empty($username) || empty($parent_id) || empty($password) || empty($password2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function to check if child already exists in the database
function childExists($conn, $username)
{
    $sql = "SELECT * FROM children WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /child_signup.php?error=childExists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
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
function createChild($conn, $fname, $lname, $username, $parent_username, $password)
{
    $fullName = $fname . " " . $lname;
    $sql = "INSERT INTO children (full_name, username, parent, password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /child_signup.php?error=stmtfailed");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $fullName = $fname . " " . $lname;

    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $username, $parent_username, $hashedPass);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: /child_signup.php?error=none");
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
function loginChild($conn, $username, $password)
{
    $childExists = childExists($conn, $username);

    if ($childExists === false) {
        $_SESSION['error'] = "wronglogin";
        header("location: /parent_login.php");
        exit();
    }

    $hashedPass = $childExists["password"];
    $checkPassword = password_verify($password, $hashedPass);

    if ($checkPassword === false) {
        header("location: /parent_login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['childId'] = $childExists["child_id"];
        $_SESSION['childUsername'] = $childExists["username"];
        $_SESSION['justLoggedIn'] = "Logged In";
        header("location: /index.php");
        exit();
    }
}
