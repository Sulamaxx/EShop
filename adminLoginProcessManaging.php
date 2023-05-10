<?php
session_start();

require "connection.php";


$vcode = $_POST["vcode"];
$email = $_POST["email"];


$rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' AND `verificationcode`='" . $vcode . "'");

$n = $rs->num_rows;

if ($n == 1) {


    $d = $rs->fetch_assoc();
    $_SESSION["a"] = $d;

    echo "Success";
} else {

    echo "Somethings went wrong please try again latter";

}

?>