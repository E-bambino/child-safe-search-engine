<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require("../vendor/autoload.php");

if (file_exists("../PHPMailer")) {
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    require '../PHPMailer/src/Exception.php';
} elseif (file_exists("./PHPMailer")) {
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    require './PHPMailer/src/Exception.php';
}


function sendEmail($recipient, $subject, $body)
{

    // Instantiating PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'childprotectsys@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'fznnbjgxrxfgtcga'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to, 587 for SSL and 465 for SSL

        // Recipient email configuration
        $mail->setFrom('childprotectsys@gmail.com', 'childProtect'); // Replace with your email address and name
        $mail->addReplyTo('childprotectsys@gmail.com', 'childProtect'); // Replace with your email address and name

        $mail->addAddress($recipient); // Set recipient email address

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return $mail->ErrorInfo;
    }
}
