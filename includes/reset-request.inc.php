<?php

require_once 'email_config.inc.php';
require_once 'db_conn.inc.php';

if (isset($_POST['reset-request-submit'])) {


    // Get the email entered by the user
    $recipient = $_POST['email'];
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $currentUrl = "http" . (!empty($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['SERVER_NAME'];

    $url = "$currentUrl/create_new_password.php?selector=" . "$selector" . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $recipient);
        mysqli_stmt_execute($stmt);
    }


    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $recipient, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    // mysqli_close($conn);

    $subject = 'Reset your password for ChildProtect';

    $body = '<p>We recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
    $body .= '<p>Here is your password reset link: <br>';
    $body .= '<a href="' . $url . '">' . $url . '</a></p>';


    if (sendEmail($recipient, $subject, $body)) {
        session_start();
        $_SESSION['resetSent'] = "reset email was sent successfully";
        header("location: ../reset_password.php?reset=success");
    } else {
        echo ("Email not sent");
    }
} else {
    header("location: ../index.php");
}
