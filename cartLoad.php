<?php
session_start();
require "connection.php";
$user = $_SESSION["u"]["email"];

$result = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
$n = $result->num_rows;
$totalprice;

if ($n != 0) {

    for ($i = 0; $i < $n; $i++) {

        $data = $result->fetch_Assoc();

        $product = $data["product_id"];


        $result1 = Database::search("SELECT * FROM `product` WHERE `id`='" . $product . "'");
        $data1 = $result1->fetch_assoc();

        $totalprice = Database::search("SELECT SUM(`price`) FROM `product` WHERE `id`='" . $product . "'");

        $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product . "'");
        $img = $imgrs->fetch_assoc();

        $model_has_brand_id = $data1["model_has_brand_id"];

        $result2 = Database::search("SELECT * FROM `model_has_brand` WHERE `id`='" . $model_has_brand_id . "'");
        $data2 = $result2->fetch_assoc();

        $model_id = $data2["model_id"];
        $brand_id = $data2["brand_id"];

        $result3 = Database::search("SELECT * FROM `model` WHERE `id`='" . $model_id . "'");
        $result4 = Database::search("SELECT * FROM `brand` WHERE `id`='" . $brand_id . "'");
        $data3 = $result3->fetch_assoc();
        $data4 = $result4->fetch_assoc();


?>
         <div class="col-12 mt-2 border-bottom border-1 border-dark pb-2">
                    <div class="row justify-content-center">

                        <div class="col-lg-2 col-4" >
                            <img class="rounded border border-danger" style="height: 150px; width: 150px;" src="<?php echo $img["code"]; ?>" alt="">
                        </div>

                        <div class="col-lg-7 col-8 mt-0 mt-lg-5">
                            <div class="row">
                                <span class="col-12 col-lg-3 text-center text-lg-start fs-4 fw-bold text-primary"><?php echo $product;?> : <?php echo $data4["name"]; ?></span>
                                <span class="col-12 col-lg-3 text-center text-lg-start fs-5 fw-bold text-success"><?php echo $data3["name"]; ?></span>
                                <span class="d-none d-lg-block col-lg-3 text-secondary fs-5 fw-bold text-lg-start text-center"><?php echo $data1["description"]; ?></span>
                                <span class="col-12 col-lg-3 text-danger fs-5 fw-bold text-center text-lg-start">Rs. <?php echo $data1["price"]; ?>.00</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12 mt-2 mt-lg-5">
                            <div class="row justify-content-center">
                                <button class="col-12 col-lg-11 btn btn-danger text-center" onclick="deleteFromCart(<?php echo $product ?>);">Remove From Cart</button>

                            </div>
                        </div>


                    </div>
                </div>

            <?php
        }
    } else {

            ?>

            <span class="col-12 fs-1 fw-bold text-primary text-center" style="margin-top: 150px;">....Empty Cart....</span>
            <i class="bi bi-cart-x-fill fs-1 text-center col-12 text-warning cartimg" onclick="pageNavigator(1); redirectToProduct();"></i>


        <?php

    }

        ?>


