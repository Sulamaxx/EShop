<?php
session_start();
require "connection.php";
$user = $_SESSION['u']['email'];
$msg = $_POST["msg"];
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");
$time = $d->format("H:i:s");
$admin = "admin";
if (empty($msg)) {
    echo "Please enter your message.";
} else {
    $msg1=Strval($msg);
    Database::iud("INSERT INTO `message`(`from`,`to`,`msg`,`date`,`time`) VALUES('" . $user . "','" . $admin . "','" .$msg1. "','" . $date . "','" . $time . "')");
    echo "Success";
}
?>