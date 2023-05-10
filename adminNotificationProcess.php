<?php
require "connection.php";


$result = Database::search("SELECT * FROM `message` WHERE `to`='admin' AND `watch`='0' ");
$n = $result->num_rows;

if ($n != 0) {

    echo "Success";
}

?>