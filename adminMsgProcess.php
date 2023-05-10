<?php
require "connection.php";
$msg=$_POST["msg"];
$name=$_POST["name"];

// echo $msg;
// echo $name;

$date=new DateTime();
$tz=new DateTimeZone("Asia/Colombo");
$date->setTimezone($tz);
$d=$date->format("Y-m-d");
$t=$date->format("H:i:s");

if(empty($msg)){

    echo "Please Enter Your Message";
    
}else{

    $msg1=strval($msg);

Database::iud("INSERT INTO `message`(`from`,`to`,`msg`,`date`,`time`) VALUES('admin','".$name."','".$msg1."','".$d."','".$t."')");

echo "success";

}

?>