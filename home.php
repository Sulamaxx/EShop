<?php
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="header.css" />

</head>

<body style="margin: 0px; background-color: #81c3e9;">
    <div class="container-fluid">

        <div class="row justify-content-center" id="allproductview">

            <div class="col-12 bg-white">
                <div class="row text-center justify-content-center">
                    <?php
                    $categoryrs1 = Database::search("SELECT * FROM `category`");
                    $num1 = $categoryrs1->num_rows;
                    for ($x = 0; $x < $num1; $x++) {
                        $cd1 = $categoryrs1->fetch_assoc();
                        // if (isset($_SESSION["u"])) { 
                            ?>
                            <div class=" mt-2 text-center text-black btn mb-2 ms-1  ellipsis" onclick="viewProductAll(<?php echo $cd1['id']; ?>);"><img src="" alt=""><?php echo $cd1["name"]; ?></div>
                        <?php
                        // } else { ?>
                            <!-- <div class="mt-2 text-center text-black btn mb-2 ms-1 ellipsis" onclick=""><img src="" alt=""><?php echo $cd1["name"]; ?></div> -->
                    <?php
                        // }
                    } ?>
                </div>
            </div>

            <div class="col-11">
                <div class="row justify-content-center">
                    <img src="resources/logo.png" class="col-2 logoimg" alt="">
                    <div class="col-12 col-lg-10">
                        <div class="row justify-content-center mt-lg-4 mt-1">
                            <input type="text" id="searchText" class="col-lg-8 col-12 serachinput" />
                            <div class="col-lg-4 col-12 justify-content-center mt-2 mt-lg-0 mb-2 mb-lg-0">
                                <button class="col-lg-11 col-12 searchbtn" onclick="serachButton();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="searchBox">
               

            

            </div>


        </div>

    </div>


    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="custom.js"></script>


</body>

</html>