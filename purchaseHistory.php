<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container-fluid " style=" margin-top: 50px;">
        <div class="row justify-content-center">
            <span class="col-12 text-center fw-bold fs-2 ">Purchase History</span>
            <div class="mt-3 col-12 overflow-hidden">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <span class="col-6 fs-3 fw-bold">Total</span>
                            <span class="col-6 fs-3 text-end fw-bold border-bottom border-dark border-1" id="totalPriceLabel"></span>
                        </div>
                    </div>
                    <div class="col-2 col-lg-3 text-center"><i class="bi bi-search fs-3 fw-bold searchbtnbutton" onclick="searchBuyingCustomer(); changePrice();"> Search</i></div>
                    <div class="col-10 col-lg-3"><input class="col-12 fs-5 fw-bold" id="selectDate" type="date" value="<?php echo date('Y-m-d'); ?>"></div>
                </div>
            </div>
            <div class="col-12 bg-light border border-1 border-dark mb-3 mt-2" style="height: 800px; overflow-y: scroll;">
                <div class="row" id="buyingHistoryBox">
                  
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="custom.js"></script>
</body>
</html>