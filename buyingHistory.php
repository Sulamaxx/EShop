<?php

// require "connection.php";

if(isset($_SESSION["u"])){

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/logo.png" />
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />


<body>

    <div class="container-fluid justify-content-center m-5">
        <div class="row">

            <div class="col-12 text-center">
                <span class="fs-1 fw-bold">Buying Histroy</span>
            </div>

            <div class="mt-3 col-12 overflow-hidden">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <span class="col-6 fs-3 fw-bold">Total</span>
                            <span class="col-6 fs-3 text-end fw-bold border-bottom border-dark border-1" id="totalPriceLabel"></span>
                        </div>
                    </div>
                    <div class="col-2 col-lg-3 text-center"><i class="bi bi-search fs-3 fw-bold searchbtnbutton" onclick="searchBuying(); changePrice();"> Search</i></div>
                    <div class="col-10 col-lg-3"><input class="col-12 fs-5 fw-bold" id="selectDate" type="date" value="<?php echo date('Y-m-d'); ?>"></div>
                </div>
            </div>

            <div class="col-12 mt-3 border border-1 border-dark" style="height: 600px; border-radius: 10px; overflow-y: scroll;">
                <div class="row"  id="buyingBox">


                   
                </div>
            </div>
        </div>

    </div>



    <script src="script.js"></script>
</body>

</html>

<?php
}else{

    header("location:index.php");
}

?>