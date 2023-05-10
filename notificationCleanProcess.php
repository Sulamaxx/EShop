<?php
require "connection.php";
session_start();

Database::iud("UPDATE `message` SET `watch`='1' WHERE `from`='admin' AND `to`='".$_SESSION["u"]["email"]."'");

$result=Database::search("SELECT * FROM `message` WHERE `from`='admin' AND `watch`='0' ");
$n=$result->num_rows;

if($n!=1){

    echo "Success";
}
