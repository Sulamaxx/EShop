<?php
session_start();
// echo "ok";
require "connection.php";

if (isset($_SESSION["p"])) {

    $product_id = $_SESSION["p"]["id"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $product_id . "'");

    $product_rs1 = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_id . "'");
    $product_num1 = $product_rs1->num_rows;

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {
        if ($product_num1 == 1) {
            function function_alert($message)
            {
                echo "<script>alert('$message');</script>";
            }

            function_alert("Cannot delete because customer used it as a cart saved item");
        } else {

            Database::iud("DELETE FROM `images` WHERE `product_id`='" . $product_id . "'");
            Database::iud("DELETE FROM `product` WHERE `id`='" . $product_id . "'");
        }
        // echo $product_id;
?>

        <script>
            // setTimeout(() => {
            //     window.location = "adminPanel.php";

            // }, 500);
            window.location = "adminPanel.php?id=3";
        </script>


    <?php
    } else {
        echo "Cannot delete Something went wrong";
    ?>

        <script>
            window.location = "adminPanel.php?id=3";
        </script>


<?php


    }
} else {
    echo "Something went wrong";
}
?>