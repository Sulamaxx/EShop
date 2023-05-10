<?php
session_start();
if (isset($_SESSION["u"])) {
    if (isset($_GET)) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Payment Integartion</title>
            <link rel="stylesheet" href="_style.css" />
            <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>

        <body>
            <button type="button" onclick="redirectToHome();" class="back">Go Back</button>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-container">
                        <form autocomplete="off" action="checkout-charge1.php" method="POST">

                            <input type="text" name="randomNo" value="<?php echo $_GET["id"]?>" hidden/>
                            <div>
                                <label>Customer Name</label>
                                <input type="text" name="c_name" required />
                            </div>
                            <div>
                                <label>Address</label>
                                <input type="text" name="address" required />
                            </div>
                            <div>
                                <label>Contact number</label>
                                <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required />
                            </div>
                            <div>
                                <label>Product name</label>
                                <input type="text" name="product_name" value="<?php echo "MultiProjects" ?>" disabled required />
                            </div>
                            <div>
                                <label>Price</label>
                                <input type="text" name="price" value="RS. <?php echo $_GET["price"] ?> .00" disabled required />
                            </div>

                            <input type="hidden" name="amount" value="<?php echo $_GET["price"] ?>">
                            <input type="hidden" name="product_name" value="<?php echo "MultiProjects" ?>">

                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MPMNuK1Ge9YQehemebVqeAmFfP5y1AeN9THOzU8NgAyW9NcJqAVCDd9VbGhg56i1prXXWI3YrCu6eGuoRKPoUwj00knZ5Hgl9" data-amount=<?php echo str_replace(",", "", $_GET["price"]) * 100 ?> data-name="<?php echo "MultiProjects" ?>" data-description="<?php echo "MultiProjects" ?>" data-image="<?php echo "resources/cart.jpg" ?>" data-currency="lkr" data-locale="auto">
                            </script>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-container">
                        <h4>Product Name&nbsp;:&nbsp;<?php "MultiProjects" ?></h4>
                        <img src="resources/cart.jpg" />
                        <span>Price &nbsp;:&nbsp;<?php echo $_GET["price"] ?></span>
                    </div>
                </div>
            </div>

    <?php
    }
} else {
    header("location:index.php");
}

    ?>
    <script src="custom.js"></script>

        </body>

        </html>