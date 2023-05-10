<?php

session_start();

require "connection.php";

$user = $_SESSION["u"]["email"];

$id = $_GET["id"];


$result = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $id . "' AND `users_email`='" . $user . "'");
$n = $result->num_rows;

if ($n == 1) {

    Database::iud("DELETE FROM `watchlist` WHERE `product_id`='" . $id . "' AND `users_email`='" . $user . "'");

    echo "removed";
} else {

    Database::iud("INSERT INTO `watchlist`(`product_id`,`users_email`) VALUES('" . $id . "','" . $user . "')");

    echo "added";
}
