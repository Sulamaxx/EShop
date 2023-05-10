<?php
require "connection.php";
$pid = $_POST["id"];
$price = $_POST["price"];
$x = $_POST["x"];
$y = $_POST["y"];



$result = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$data = $result->fetch_assoc();

$fullPriceMax = $data["qty"] * $data["price"];
$fullPriceMin = 1 * $data["price"];
$newTotalPrice = $price;

$abc = substr($y, 3, -3);

// echo $abc;
// echo $fullPriceMax;
// echo $fullPriceMin;

if ($x == 0) {
    if ($fullPriceMax != $abc) {

        $newTotalPrice = $price + $data["price"];
    }
} else {
    if ($fullPriceMin != $abc) {

        $newTotalPrice = $price - $data["price"];
    }
}


?>
Rs. <?php echo $newTotalPrice; ?>.00