<?php

require "connection.php";
$count = $_POST["count"];
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


$id=uniqid();
for ($i = 1; $i <= $count; $i++) {

    $pid = $_POST["pid" .$i];
    $qty = $_POST["qty" . $i];


    Database::iud("INSERT INTO `temporary_store`(`pid`,`qty`,`random_no`,`date`)  VALUES('".$pid."','".$qty."','".$id."','".$date."')");

}

echo $id;

?>