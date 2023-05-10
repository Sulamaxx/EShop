<?php



if (isset($_SESSION["a"])) {



?>

    <!DOCTYPE html>

    <html>

    <head>
        <!-- <title>Online Shop | Products</title> -->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="resources/logo.png" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

    </head>

    <body style="background-color: wheat;" onload="">

        <div class="container-fluid" style="margin-top: 50px;">
            <div class="row">

                <!-- body -->

                <div class="col-12">
                    <div class="row ">
                       
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-12 mt-1">
                                    <select class="form-select col-12 fs-4" name="" id="adminSearchCategory">
                                        <option value="0">Select Category</option>
                                        <?php
                                        $result = Database::search("SELECT * FROM `category`");
                                        $n = $result->num_rows;
                                        for ($i = 0; $i < $n; $i++) {
                                            $data = $result->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data["name"] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-lg-4 col-12 mt-1">
                                    <input type="text" class="col-12 fs-4 p-4 text-end form-control" id="adminProductSearch">
                                </div>
                                <div class="col-lg-4 col-12 mt-1 mt-lg-0">
                                    <button class="col-12 text-center fs-3 fw-bold btn btn-primary" onclick="adminSearch();"><i class="bi bi-search fs-3 fw-bold text-white"></i> - Search</button>
                                </div>
                            </div>
                        </div>


                        <!-- products -->

                        <div class="col-12 pt-5 mt-3 mb-3 bg-white rounded border border-2 border-dark ">
                            <div class="row" id="sort">

                                

                            </div>
                        </div>

                        <!-- products -->




                    </div>
                </div>

                <!-- body -->

            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {

?>
    <script>
        alert("Please Sign In first.");
        window.location = "adminSignin.php";
    </script>
<?php

}

?>