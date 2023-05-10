<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {
    $data = $_SESSION["a"];


?>


    <!DOCTYPE html>

    <html>

    <head>
        <title class="title"></title>
        <link rel="icon" href="resources/logo.png" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <link rel="stylesheet" href="fontawesome.css" />
        <link rel="stylesheet" href="header.css" />
        <link rel="stylesheet" href="owl.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
<?php
if(isset($_GET["id"])=="3"){
?>
 <body onload="adminSearch();adminNotification(); pageNavigatorA(3);">
<?php
}else{
?>
 <body onload="adminNotification(); pageNavigatorA(0); ">
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

                <!-- Header -->
                <header class="">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container col-12 col-lg-9">

                            <a href="adminSignin.php" title="Go To Admin SignIn" style="position: absolute;"><i class="fs-1 text-white fw-bold bi bi-person-badge"></i></a>

                            <label class="navbar-brand mt-lg-1" onclick="adminNotification(); pageNavigatorA(0);">
                                <h2 class="offset-0 offset-lg-3 text-danger fw-bold fs-4">Online<em class="text-white fs-1 fw-bold"> Shop</em></h2>
                            </label>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="bi bi-list text-black"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive">
                                        <label class="nav-link" onclick=" adminHomeLoad(); adminNotification(); pageNavigatorA(0);">Home
                                            <!-- <span class="sr-only">(current)</span> -->
                                        </label>
                                    </li>


                                    <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" onclick="adminSearch();adminNotification(); pageNavigatorA(3);">Products</label></li>

                                    <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" onclick="adminNotification(); adminHomeLoad(); reloadAddProduct(); pageNavigatorA(1);">Add Products</label></li>

                                    <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" onclick="buyingPageReload(); adminNotification(); adminHomeLoad(); changePrice(); pageNavigatorA(2); ">Buying History</label></li>

                                    <li class="nav-item" data-toggle="collapse" data-target="#navbarResponsive"><label class="nav-link" onclick="adminHomeLoad();pageNavigatorA(4); ">Message<div id="msgLabelAdmin" class="notificationBall1"></label></li>




                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 align-self-center text-end" style="margin-top: -12px;">

                            <span class="text-lg-start label1 text-white"><b>Welcome</b>

                                <?php echo $data["fname"]; ?>

                            </span> |

                            <span class="text-lg-start label2 text-dark" onclick="signOutAdmin();"> Sign Out </span> |

                        </div>
                    </nav>

                </header>


                <div class="col-12" style="margin-top: 100px;" hidden id="div00">
                    <div class="row justify-content-center">
                        <?php require "admindashboard.php" ?>
                    </div>
                </div>
                <div class="col-11" style="margin-top: 60px;" hidden id="div01">
                    <div class="row justify-content-center">
                        <?php require "addproduct.php" ?>
                    </div>
                </div>
                <div class="col-11" style="margin-top: 60px;" hidden id="div02">
                    <div class="row justify-content-center">
                        <?php require "buyingHistory.php" ?>
                    </div>
                </div>
                <div class="col-11" style="margin-top: 60px;" hidden id="div04">
                    <div class="row justify-content-center">
                        <?php require  "adminMsgPanel.php"; ?>
                    </div>
                </div>
                <div class="col-11" style="margin-top: 60px;" hidden id="div03">
                    <div class="row justify-content-center">
                        <?php require "products.php" ;?>
                    </div>
                </div>
                <div class="container vw-100">
                    <div class="row">
                        <?php require "footer.php"; ?>
                    </div>
                </div>

            </div>

        </div>

        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="custom.js"></script>
        <script src="owl.js"></script>
        <script src="script.js"></script>


    <?php
} else {
    ?>

        <script>
            window.location = "adminSignin.php";
        </script>

    </body>

    </html>

<?php
}
?>