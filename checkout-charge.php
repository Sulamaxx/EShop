<?php

use LDAP\Result;

include("./config.php");
require "connection.php";

$token = $_POST["stripeToken"];
$token_card_type = $_POST["stripeTokenType"];
$email           = $_POST["stripeEmail"];

$pid = $_GET["id"];

// $phone           = $_POST["phone"];
// $contact_name = $_POST["c_name"];
// $address         = $_POST["address"];
// $amount          = $_POST["data-amount"]; 
// $desc            = $_POST["product_name"];

$result = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$data = $result->fetch_assoc();


$result1 = Database::search("SELECT * FROM `users` WHERE `email`='" . $email . "'");
$data1 = $result1->fetch_assoc();

$result3 = Database::search("SELECT `user_has_address`.`line1` AS `line01`, `user_has_address`.`line2` AS `line02`, `city`.`name` AS `cityname` FROM `user_has_address` INNER JOIN `city` ON `user_has_address`.`city_id`=`city`.`id`  WHERE `user_has_address`.`users_email`='" . $email . "'");
$data3 = $result3->fetch_assoc();

$fulladdress = $data3["line01"] . "," . $data3["line02"] . "," . $data3["cityname"];


$phone           = $data1["mobile"];
$contact_name = $data1["fname"];
$address         = $fulladdress;
$amount          = $data["price"];
$desc            = $data["description"];

$qty = 1;

$charge = \Stripe\Charge::create([
  "amount" => str_replace(",", "", $amount) * 100,
  "currency" => 'inr',
  "description" => $desc,
  "source" => $token,
]);

if ($charge) {
  $d = new DateTime();
  $tz = new DateTimeZone("Asia/Colombo");
  $d->setTimezone($tz);
  $date = $d->format("Y-m-d");
  $time = $d->format("H:i:s");
  Database::iud("INSERT INTO `invoice`(`users_email`,`total`) VALUES('" . $email . "','".$data["price"]."')");

  $iid =  Database::$connection->insert_id;
  
  $currentqty = $data["qty"] - 1;
  Database::iud("INSERT INTO `invoice_item`(`product_id`,`qty`,`balance`,`invoice_id`,`date`,`time`) VALUES('" . $pid . "','" . $qty . "','" . $amount . "','" . $iid . "','" . $date . "','" . $time . "')");
  Database::iud("UPDATE product SET qty='" . $currentqty . "'");
 
  header("Location:success.php?id=$iid&email=$email&pid=$pid");
}
