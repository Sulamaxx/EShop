<?php
require "connection.php";
$pid = $_POST["pid"];
$qty = $_POST["qty"];


$result = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$data = $result->fetch_assoc();

$newPrice = $qty * $data["price"];

// echo $pid;
// echo $qty;
?>
Rs. <?php echo $newPrice; ?>.00