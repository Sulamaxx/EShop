<?php
session_start();
require "connection.php";

$id=$_GET["id"];
// echo $id;

$user=$_SESSION["u"]["email"];

// echo $user;

$result=Database::search("SELECT * FROM `cart` WHERE `product_id`='".$id."' AND `user_email`='".$user."'");
$n=$result->num_rows;

if($n==1){

    echo "This product already added to cart.";

}else{

    Database::iud("INSERT INTO `cart`(`product_id`,`user_email`) VALUES('".$id."','".$user."')");

    echo "success";
}

?>