<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $resultset = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");

    $n = $resultset->num_rows;

            if ($n == 1) {

        $code = uniqid();
        Database::iud("UPDATE `admin` SET `verificationcode` = '".$code."' WHERE `email`='".$email."'" );

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sjeewaranga@gmail.com'; 
            $mail->Password = 'vyomzjxscsoasqkz'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sjeewaranga@gmail.com', 'Online Shop'); 
            $mail->addReplyTo('sjeewaranga@gmail.com', 'Online Shop'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'Online Shop Admin LogIn verification code.'; 
            $bodyContent = '<h1 style="color:green;">Your Verification code is : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }


    } else {
        echo "Email Address not found.";
    }
} else {
    echo "Please Enter Your Email Address.";
}
