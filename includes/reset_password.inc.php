<?php

function validate_password_reset_request($selector, $validator)
{
    $currentDate = date("U");
    require 'db_conn.inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result =  mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            return false;
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if ($tokenCheck === false) {
                return false;
            } elseif ($tokenCheck === true) {
                return $row["pwdResetEmail"];
            }
        }
    }
}

function update_password($email, $password)
{
    require 'db_conn.inc.php';

    $sql = "UPDATE parents SET password=? WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    } else {
        $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $email);
        mysqli_stmt_execute($stmt);

        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }
}

if (isset($_POST["submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($password) || empty($password2)) {
        header("location: ../create_new_password.php?newpassword=empty");
        exit();
    }

    $email = validate_password_reset_request($selector, $validator);
    if (!$email) {
        echo "You need to resubmit your reset request";
        exit();
    } else {
        if (update_password($email, $password)) {
            session_start();
            $_SESSION['passResetSuccess'] = "Password was reset successfully";
            header("location: ../index.php");
            exit();
        } else {
            echo "There was an error updating the password";
            exit();
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
