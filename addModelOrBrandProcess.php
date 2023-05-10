<?php
require "connection.php";

$name=$_POST["name"];

$word=$_POST["word"];

// echo $name;
// echo $word;

if(empty($name)){
    echo "Please Enter The Name";
}else{

    if($word=="model"){

        $result=Database::search("SELECT * FROM `model` WHERE `name`='".$name."'");

        $n=$result->num_rows;

        if($n==1){
            echo "This Name Already Exist";
        }else{

            Database::iud("INSERT INTO `model`(`name`) VALUES('".$name."')");
            echo "success";
        }

    }else{

        $result=Database::search("SELECT * FROM `brand` WHERE `name`='".$name."'");

        $n=$result->num_rows;

        if($n==1){
            echo "This Name Already Exist";
        }else{

            Database::iud("INSERT INTO `brand`(`name`) VALUES('".$name."')");
            echo "success";
        }

    }

}


?>