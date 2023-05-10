<?php

session_start();

?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title id="title"></title>
    <link rel="icon" href="resources/logo.png" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="fontawesome.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="owl.css" />
    <!-- <link rel="stylesheet" href="style.css" /> -->




</head>


<?php

if (isset($_GET["x"])) {

    $x = $_GET["x"];

    // echo $x;

    if ($x == 4) {

?>

        <body onload="pageNavigator(4);msgNotificationCustomer();">

        <?php
    } else if ($x == 7) {

        ?>

            <body onload="pageNavigator(7);">

            <?php
        } else {

            ?>

                <body onload="loadHomePage();pageNavigator(0);msgNotificationCustomer();">

                <?php
            }
        } else {
                ?>

                <body onload="loadHomePage();pageNavigator(0);msgNotificationCustomer();">

                <?php
            }


                ?>


                <!-- ***** Preloader Start ***** -->
                <div id="preloader">
                    <div class="jumper">
                        <div></div>
                        <div></div>
                        <div></div>

                    </div>
                </div>
                <!-- ***** Preloader End ***** -->

                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <!-- <div class="msgButton" id="msgButton"></div> -->

                        <!-- Header -->
                        <header class="">

                            <a href="adminSignin.php" class="sticky-top" title="Go To Admin SignIn" style="position: inherit;"><i class="fs-1 text-white fw-bold bi bi-person-badge"></i></a>

                            <nav class="navbar navbar-expand-lg">
                                <div class="container col-12 col-lg-9">


                                    <label class="navbar-brand mt-lg-1" onclick="loadHomePage();pageNavigator(0);msgNotificationCustomer();">
                                        <span class="offset-0 offset-lg-3 mt-2 mt-lg-0 text-danger fw-bold fs-4">Online<em class="text-white fs-1 fw-bold"> Shop</em></span>
                                    </label>
                                    <button class="navbar-toggler mt-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"><i class="bi bi-list text-black"></i></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarResponsive">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item " id="li0">
                                                <!-- <label class="nav-link" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" onclick="pageNavigator(0);">Home -->
                                                <label class="nav-link" data-toggle="collapse" data-target="#navbarResponsive" onclick="loadHomePage();pageNavigator(0);msgNotificationCustomer();">Home
                                                    <!-- <span class="sr-only">(current)</span> -->
                                                </label>
                                            </li>
                                            <?php
                                            // if (isset($_SESSION["u"])) {
                                            ?>
                                            <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive" id="li1"><label class="nav-link" onclick="pageNavigator(1); redirectToProduct();msgNotificationCustomer();">Products</label></li>
                                            <?php
                                            // } else {
                                            ?>
                                            <!-- <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive" id="li1"><label class="nav-link" onclick="redirectFuction();">Products</label></li> -->
                                            <?php
                                            // }


                                            ?>


                                            <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" href="#" onclick="pageNavigator(2);msgNotificationCustomer();">About Us</label></li>



                                            <?php
                                            if (isset($_SESSION["u"])) {
                                            ?>
                                                <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" href="#" onclick="pageNavigator(7);msgNotificationClean();loadMsg();">Message<div id="msgLabel" class="notificationBall"></div></label></li>

                                            <?php
                                            } else {
                                            ?>
                                                <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" href="#" onclick="redirectFuction();">Message</label></li>

                                            <?php
                                            }


                                            ?>


                                            <li class="nav-item dropdown">
                                                <label class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-circle text-warning"></i></label>

                                                <?php
                                                // session_start();
                                                if (isset($_SESSION["u"])) {

                                                ?>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><label class="dropdown-item" data-toggle="collapse" data-target="#navbarResponsive" onclick="pageNavigator(4); msgNotificationCustomer();">My Profile</label></li>
                                                        <li><label class="dropdown-item" data-toggle="collapse" data-target="#navbarResponsive" onclick="pageNavigator(5); watchListReload(); msgNotificationCustomer();">My Watch List</label></li>
                                                        <li><label class="dropdown-item" data-toggle="collapse" data-target="#navbarResponsive" onclick="pageNavigator(6);reloadPuchaseHistory();changePrice();msgNotificationCustomer();">My Purchase History</label></li>
                                                    </ul>
                                                <?php } else {
                                                ?>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><label class="dropdown-item" onclick="redirectFuction();">My Profile</label></li>
                                                        <li><label class="dropdown-item" onclick="redirectFuction();">My Watch List</label></li>
                                                        <li><label class="dropdown-item" onclick="redirectFuction();">My Purchase History</label></li>
                                                    </ul>
                                                <?php
                                                }  ?>
                                            </li>


                                            <li class="nav-item">
                                                <?php
                                                if (isset($_SESSION["u"])) {
                                                ?>
                                                    <label class="nav-link" data-toggle="collapse" data-target="#navbarResponsive" onclick=" cartBuyingUpdate(); pageNavigator(8); msgNotificationCustomer();"><i class="bi bi-cart4 text-warning"></i></label>
                                                <?php
                                                } else {
                                                ?>
                                                    <label class="nav-link" onclick="redirectFuction();"><i class="bi bi-cart4 text-warning"></i></label>
                                                <?php

                                                }
                                                ?>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 align-self-center text-end" style="margin-top: -12px;">

                                    <span class="text-lg-start label1 text-white sticky-top"><b>Welcome</b>


                                        <?php

                                        if (isset($_SESSION["u"])) {
                                            $data = $_SESSION["u"];
                                        ?>


                                            <?php echo $data["fname"]; ?>

                                    </span>

                                    <span class="text-lg-start label2 sticky-top" style="color: blue; margin-left: 5px;" onclick="signoutCustomer();"> Sign Out </span>

                                <?php
                                        } else {

                                ?>
                                    <a href="index.php" style="color: blue; margin-left: 5px;" class="text-lg-start label2 sticky-top "> Sign In or Register </a>
                                <?php

                                        }

                                ?>

                                <span class="text-lg-start label2 text-warning" id="h&S" style="margin-left: 5px;" onclick=""> Help and Contact</span>

                                </div>
                            </nav>

                        </header>






                        <div class="col-12" style="margin-top: 100px; width: 100vw;" hidden id="div0">
                            <div class="row justify-content-center">
                                <?php require "home.php" ?>
                            </div>

                        </div>



                        <div class="col-11" style="margin-top: 120px;" hidden id="div1">
                            <div class="row justify-content-center">
                                <?php require "customerProductView.php" ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 60px;" hidden id="div2">
                            <div class="row justify-content-center">
                                <?php require "aboutUs.php"; ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 60px;" hidden id="div3">
                            <div class="row justify-content-center">

                            </div>

                        </div>

                        <div class="col-11" style="margin-top: 60px;" hidden id="div4">
                            <div class="row justify-content-center">
                                <?php require "userprofile.php" ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 60px;" hidden id="div5">
                            <div class="row justify-content-center">
                                <?php require "watchList.php"; ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 60px;" hidden id="div6">
                            <div class="row justify-content-center">
                                <?php 
                                require "purchaseHistory.php"; 
                                ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 85px;" hidden id="div7">
                            <div class="row justify-content-center">
                                <?php require "message.php"; ?>
                            </div>

                        </div>
                        <div class="col-11" style="margin-top: 60px;" hidden id="div8">
                            <div class="row justify-content-center">
                                <?php require "cart.php"; ?>
                            </div>

                        </div>

                    </div>

                    <div class="row vw-100" style="margin-left: -10px;">
                        <?php require "footer.php" ?>
                    </div>

                </div>
              


                <script src="jquery/jquery.min.js"></script>
                <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="script.js"></script>
                <script src="custom.js"></script>
                <script src="owl.js"></script>






                </body>

</html>