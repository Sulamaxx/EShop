<?php

// use LDAP\Result;

require "connection.php";
include("./config.php");

$no              = $_POST["randomNo"];


$rs = Database::search("SELECT * FROM `temporary_store` WHERE random_no='" . $no . "'");
$count = $rs->num_rows;
if ($count != 0) {




  $token = $_POST["stripeToken"];
  $contact_name = $_POST["c_name"];
  $token_card_type = $_POST["stripeTokenType"];
  $phone           = $_POST["phone"];
  $email           = $_POST["stripeEmail"];
  $address         = $_POST["address"];
  $amount          = $_POST["amount"];
  $desc            = $_POST["product_name"];


  $charge = \Stripe\Charge::create([
    "amount" => str_replace(",", "", $amount) * 100,
    "currency" => 'inr',
    "description" => $desc,
    "source" => $token,
  ]);

  Database::iud("INSERT INTO `invoice`(`users_email`,`total`,`name`,`address`,`contact`) VALUES('" . $email . "','" . $amount . "','" . $contact_name . "','" . $address . "','" . $phone . "')");

  $iid = Database::$connection->insert_id;

  $d = new DateTime();
  $tz = new DateTimeZone("Asia/Colombo");
  $d->setTimezone($tz);
  $date = $d->format("Y-m-d");
  $time = $d->format("H:i:s");

  for ($i = 0; $i < $count; $i++) {
    $data = $rs->fetch_assoc();

    $result = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["pid"] . "'");
    $Pdata = $result->fetch_assoc();

    $result1 = Database::search("SELECT * FROM `temporary_store` WHERE random_no='" . $no . "' AND `pid`='".$data["pid"]."'");
    $TPdata = $result1->fetch_assoc();

    Database::iud("INSERT INTO `invoice_item`(`product_id`,`qty`,`balance`,`invoice_id`,`date`,`time`) VALUES('" . $data["pid"] . "','" . $TPdata["qty"] . "','" . ($Pdata["price"] * $TPdata["qty"]) . "','" . $iid . "','" . $date . "','" . $time . "')");

    $currentqty = $Pdata["qty"] - $data["qty"];

    Database::iud("UPDATE product SET `qty`='" . $currentqty . "' WHERE `id`='" . $data["pid"] . "'");
  }

  Database::iud("DELETE FROM temporary_store WHERE `random_no`='" . $no . "'");


  if ($charge) {
    header("Location:success1.php?iid=$iid" . "&email=$email");
  }
} else {

  echo '<script>alert("Something went wrong");</script>';

  header("location:index.php");
}
