<?php
// session_start();
// require "connection.php";

$user = $_SESSION["u"]["email"];





?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


</head>

<body >


    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="row ">

                    <div class="col-12 text-center mt-5  mb-2">
                        <span class="fs-1 fw-bold text-danger">My Cart</span>
                    </div>

                    <div class="col-12 mb-3" style="border-radius: 10px;">

                        <div class="row">


                            <div class=" col-lg-9 col-12 bg-light border border-1 border-primary" style="height: 600px; border-radius: 10px; overflow-y: scroll;">

                                <div class="row" id="cartBox">



                                </div>
                            </div>

                            <div class="col-lg-3 col-12   border border-1 border-primary" style="height: 600px;" id="cartBuyBox">
                               


                            
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="custom.js"></script>

</body>

</html>