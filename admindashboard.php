<html lang="en">


<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="chart1.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>


    <div class="container-fluid div1">
        <div class="row justify-content-center" style="margin-top: 50px;">



            <div class="col-12 text-center m-2">
                <span class="col-12 fs-1 fw-bold text-white">Admin Dash Board</span>
            </div>

            <div class="col-12 mt-4">
                <div class="row gap-lg-5 gap-0 justify-content-center">

                    <div class="col-12 mt-3 text-center">
                        <span class="fs-3 fw-bold text-primary">All Users View</span>
                    </div>
                    <div class="mb-4 mb-lg-0 col-11 bg-light divall" style="height: 600px; overflow-y: scroll;">
                        <div class="row justify-content-center">

                            <?php

                            $result = Database::search("SELECT * FROM `users` INNER JOIN `profile_image` ON `users`.`email`=`profile_image`.`users_email` ORDER BY `joined_date` DESC");
                            $n = $result->num_rows;
                            // echo $n;

                            for ($i = 0; $i < $n; $i++) {

                                $data = $result->fetch_assoc();
                            ?>

                                <div class="col-7 col-md-6 col-lg-4 mb-2 mt-5 mt-md-0">
                                    <div class="row">

                                        <div class="col-md-5 col-12 p-md-3 p-2">
                                            <img class="" src="<?php echo $data['path'] ?>" style="height: 150px; width: 150px; border-radius: 50%; border: 3px red solid;" alt="Profile">
                                        </div>
                                        <div class="col-md-7 col-12 pt-md-5 pt-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="fs-5 text-black fw-bold"><?php echo $data["fname"]; ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="fs-5 text-black fw-bold"><?php echo $data["email"]; ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="fs-5 text-black fw-bold"><?php echo $data["joined_date"]; ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <span class="fs-5 text-black fw-bold"><?php echo $data["mobile"]; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            <?php

                            }
                            ?>


                        </div>
                    </div>


                    <div class="col-12 mt-3 text-center">
                        <span class="fs-3 fw-bold text-primary">All Product View</span>
                    </div>

                    <div class=" mb-4 mb-lg-0 col-11 bg-light divall" style="height: 600px; overflow-y: scroll;">
                        <?php

                        $result1 = Database::search("SELECT * FROM `product` ORDER BY `qty` ASC");
                        $n1 = $result1->num_rows;
                        // echo $n;

                        for ($i = 0; $i < $n1; $i++) {

                            $data1 = $result1->fetch_assoc();

                            $pid = $data1["id"];

                            $product = Database::search("
                                    
                            SELECT `title`,`model`.`name` AS `modelname`,`brand`.`name` AS `brandname`,`price`,`qty`  FROM `product` INNER JOIN `model_has_brand` ON `product`.`model_has_brand_id`=`model_has_brand`.`id` 
                            INNER JOIN `model` ON `model_has_brand`.`model_id`=`model`.`id` 
                            INNER JOIN `brand` ON `model_has_brand`.`brand_id`=`brand`.`id`
                            WHERE `product`.`id`='" . $pid . "';
                            ");
                            $productdata = $product->fetch_assoc();

                            $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                            $img = $imgrs->fetch_assoc();

                        ?>

                            <div class="col-12 border-bottom border-danger mb-2">
                                <div class="row">
                                    <div class="col-2 d-none d-lg-block fs-5 fw-bold text-center mt-0 mt-lg-4"><?php echo $data1["id"] ?></div>
                                    <div class="col-2 d-none d-lg-block justify-content-center p-3">
                                        <img src="<?php echo $img["code"] ?>" class="border border-2 border-danger" style="border-radius: 10px;" height="150px" width="150px" alt="">
                                    </div>
                                    <div class="col-6 col-lg-2 mt-0 mt-lg-4">
                                        <span class="fs-5 text-black fw-bold"><?php echo $productdata["brandname"]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 mt-0 mt-lg-4">
                                        <span class="fs-5 text-black fw-bold"><?php echo $productdata["modelname"]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 mt-0 mt-lg-4">
                                        <span class="fs-5 text-black fw-bold">Rs. <?php echo $data1["price"]; ?>.00</span>
                                    </div>
                                    <div class="col-6 col-lg-2 mt-0 mt-lg-4">
                                        <?php
                                        if ($productdata["qty"] <= 10) {
                                        ?>
                                            <span class="fs-3 text-danger fw-bold"><?php echo $data1["qty"]; ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="fs-5 text-dark fw-bold"><?php echo $data1["qty"]; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>


                        <?php

                        }
                        ?>
                    </div>

                    <div class=" mb-4 mb-lg-0 col-11 bg-primary divall" style="height: fit-content;">

                        <?php
                        $d = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $d->setTimezone($tz);
                        $date = $d->format("Y-m-d");

                        // echo $date;

                        $result2 = Database::search("SELECT SUM(`balance`) AS `total` FROM `invoice_item` WHERE `date`='" . $date . "'");
                        $data2 = $result2->fetch_assoc();

                        ?>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3 col-12 text-center">
                                    <i class="bi bi-cash-coin col-12 fw-bold text-white p-4" style="font-size: 150px;"></i>
                                </div>
                                <div class="col-lg-9 col-12 mb-5 mb-lg-0">
                                    <div class="row">
                                        <span class="col-12 text-center fs-1 text-white fw-bold mt-5">Daily Income</span>
                                        <?php
                                        if (strlen($data2["total"]) != 0) {
                                        ?>
                                            <span class="col-12 text-center fs-2 text-white fw-bold">Rs. <?php echo $data2["total"]; ?>.00</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="col-12 text-center fs-2 text-white fw-bold">Rs. 0.00</span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class=" col-11 bg-success divall" style="height: fit-content;">

                        <?php
                        $d = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $d->setTimezone($tz);
                        $date = $d->format("Y-m-d");

                        // echo $date;

                        $result3 = Database::search("SELECT SUM(`balance`) AS `total` FROM `invoice_item`");

                        $data3 = $result3->fetch_assoc();

                        ?>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-lg-9 col-12">
                                    <div class="row">
                                        <span class="col-12 text-center fs-1 text-white fw-bold mt-5">Total Income</span>
                                        <span class="col-12 text-center fs-2 text-white fw-bold">Rs. <?php echo $data3["total"]; ?>.00</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-12 text-center">
                                    <i class="bi bi-cash-coin col-12 fw-bold text-white p-4" style="font-size: 150px;"></i>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>




            <div class="col-11 bodyabout mt-5 mb-5">

                <div class="wrapper1 col-12 ">

                    <div class="row justify-content-center">

                        <div class="counter col_fourth col-10 col-lg-3 m-0">
                            <i class="bi bi-person-gear fa-2x fs-1"></i>
                            <h2 class="timer count-title count-number" data-to="20" data-speed="1500"></h2>
                            <p class="count-text ">Number of Staff</p>
                        </div>

                        <div class="counter col_fourth col-10 col-lg-3 mt-5 mt-lg-0 mx-5">

                            <?php

                            $result = Database::search("SELECT * FROM `users` ORDER BY `joined_date` DESC");
                            $n = $result->num_rows;

                            ?>

                            <i class="bi bi-person-heart fa-2x fs-1"></i>
                            <h2 class="timer count-title count-number" data-to="<?php echo $n; ?>" data-speed="1500"></h2>
                            <p class="count-text ">Clients</p>
                        </div>

                        <div class="counter col_fourth end col-10 col-lg-3 mt-5 mt-lg-0">
                            <i class="bi bi-calendar3 fa-2x fs-1"></i>
                            <h2 class="timer count-title count-number" data-to="25" data-speed="1500"></h2>
                            <p class="count-text ">Years of Experties</p>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="jquery/jquery.js"></script>
    <script src="star.js"></script>
    <!-- <script src="script.js"></script> -->
</body>

</html>