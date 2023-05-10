<?php
session_start();
require "connection.php";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product View</title>
    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


</head>

<body class="bgcolor">

    <?php

    if (isset($_GET["id"])) {

        $cid = $_GET["id"];

        $result = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cid . "'");
        $n = $result->num_rows;

        $result2 = Database::search("SELECT * FROM `category` WHERE `id`='" . $cid . "'");
        $category = $result2->fetch_assoc();

    ?>

        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="row justify-content-center">

                    <i class="bi bi-house-heart-fill text-white fw-bold position-sticky" onclick="redirectToHome();" style="font-size: 72px; margin-top: 20px; margin-left: 20px;"></i>

                        <div class="col-12 text-center mt-5  mb-2">
                            <span class="fs-1 fw-bold text-danger"><?php echo $category["name"] ?></span>
                        </div>

                        <div class="col-11 mb-3 border border-1 border-dark" style="border-radius: 10px;">

                            <div class="row justify-content-center">

                                <div class=" col-12 bg-light" style=" border-radius: 10px;">
                                    <div class="row">


                                        <?php

                                        if ($n != 0) {

                                            for ($i = 0; $i < $n; $i++) {

                                                $data = $result->fetch_assoc();

                                                $pid = $data["id"];

                                                $result3 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                $img = $result3->fetch_assoc();

                                                $product = Database::search("
                                    
                                    SELECT `title`,`model`.`name` AS `modelname`,`brand`.`name` AS `brandname`,`price`,`qty`  FROM `product` INNER JOIN `model_has_brand` ON `product`.`model_has_brand_id`=`model_has_brand`.`id` 
                                    INNER JOIN `model` ON `model_has_brand`.`model_id`=`model`.`id` 
                                    INNER JOIN `brand` ON `model_has_brand`.`brand_id`=`brand`.`id`
                                    WHERE `product`.`id`='" . $pid . "';

                                    ");
                                                $productData = $product->fetch_assoc();

                                        ?>


                                                <div class="col-12 mt-2 border-bottom border-1 border-dark pb-2 mb-4">
                                                    <div class="row justify-content-center">

                                                        <div class="col-lg-2 col-4" style="height: 150px;">
                                                            <img class="rounded border border-danger" style="height: 150px; width: 150px;" src="<?php echo $img["code"]; ?>" alt="">
                                                        </div>

                                                        <div class="col-lg-7 col-8 mt-0 mt-md-5 mt-lg-5">
                                                            <div class="row offset-2 offset-lg-0">
                                                                <span class="col-12 col-md-3 col-lg-3 text-primary fw-bold fs-4"><?php echo $productData["brandname"]; ?></span>
                                                                <span class="col-12 col-md-3 col-lg-3 text-primary fw-bold fs-4"><?php echo $productData["modelname"]; ?></span>
                                                                <span class="col-12 col-md-3 col-lg-3 text-primary fw-bold fs-4"><?php echo $productData["qty"] ?></span>
                                                                <span class="col-12 col-md-3 col-lg-3 text-primary fw-bold fs-4">Rs. <?php echo $productData["price"]; ?>.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-12 mt-2 mt-lg-5">
                                                            <div class="row justify-content-center">
                                                                <?php
                                                                if (isset($_SESSION["u"])) {
                                                                ?>
                                                                    <a class="btn btn-success col-12 col-lg-11 text-center mb-1" href='<?php echo "singleProductView.php?id=" . ($pid) ?>'>Buy</a>

                                                                    <?php


                                                                    $user = $_SESSION["u"]["email"];

                                                                    $result4 = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $user . "'");
                                                                    $no = $result4->num_rows;

                                                                    if ($no == 1) {


                                                                    ?>

                                                                        <button class="col-12 col-lg-11 btn btn-danger text-center" onclick="addToCart(<?php echo $pid; ?>);">Already Added to Cart</button>
                                                                    <?php

                                                                    } else {

                                                                    ?>

                                                                        <button class="col-12 col-lg-11 btn btn-danger text-center" onclick="addToCart(<?php echo $pid; ?>); reloadSingle();">Add To Cart</button>

                                                                    <?php

                                                                    }

                                                                } else {
                                                                    ?>
                                                                    <a class="btn btn-success col-12 col-lg-11 text-center mb-1" onclick="redirectFuction();">Buy</a>
                                                                    <button class="col-12 col-lg-11 btn btn-danger text-center" onclick="redirectFuction();">Add To Cart</button>
                                                                <?php

                                                                }

                                                                ?>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>



                                            <?php

                                            }


                                        } else {


                                            ?>

                                            <span class="col-12 fw-bold fs-1 text-center text-primary" style="margin-top: 200px; margin-bottom: 200px;">...Empty Products...</span>

                                        <?php


                                        }

                                        ?>



                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php

    } else {




    ?>

        <script>
            alert("Some Error Please Try Again");
            window.location = "page.php";
        </script>

    <?php


    }

    ?>



    <script src="custom.js"></script>
    <script src="script.js"></script>

</body>

</html>