<div class="row" style="padding: 10px; height:550px; overflow-y: scroll; vertical-align: auto;">

    <?php

    session_start();
    require "connection.php";
    $user = $_SESSION["u"]["email"];
    ?>

    <div class="col-12 ">
        <div class="row border-bottom border-dark border-1">
            <span class="col-3  text-center fs-5 fw-bold">Id</span>
            <span class="col-3 text-center fs-5 fw-bold">Qty</span>
            <span class="col-6 text-end fw-bold fs-5">Unit Price</span>
        </div>
    </div>



    <?php
    $result0 = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
    $n0 = $result0->num_rows;
    $totalPrice = 0;
    if ($n0 != 0) {


        for ($x = 1; $x <= $n0; $x++) {
            $data01 = $result0->fetch_Assoc();
            $product0 = $data01["product_id"];

            $result00 = Database::search("SELECT * FROM `product` WHERE `id`='" . $product0 . "'");
            $data0 = $result00->fetch_assoc();

            $totalPrice += $data0["price"];

    ?>
            <div class="col-12">
                <div class="row">

                    <span class="col-2 text-center" hidden id="productId<?php echo $x ?>"><?php echo $data0["id"]; ?></span>
                    <span class="col-3 text-center"><?php echo $x; ?> : <?php echo $data0["id"]; ?></span>

                    <input type="text" value="1" class="col-lg-2 col-2 text-end" id="qtyforbuying<?php echo $x; ?>" />

                    <div class="col-1 col-lg-1 border-1 border border-dark">
                        <div class="row text-center ">
                            <i onclick="qtyIncrement(<?php echo $data0['qty']; ?>,<?php echo $data0['id']; ?>,<?php echo $x; ?>,<?php echo $n0; ?>); reloadPrice(<?php echo $data0['id']; ?>,0,<?php echo $x; ?>);" class="bi bi-caret-up-fill  border border-1 border-danger col-12 text-center m-0 p-0 qtyIncrement" style="height: 12px; font-size: 9px;"></i>
                            <i onclick="qtyDecrement(<?php echo $data0['id']; ?>,<?php echo $x; ?>,<?php echo $n0; ?>); reloadPrice(<?php echo $data0['id']; ?>,1,<?php echo $x; ?>);" class="bi bi-caret-down-fill border border-1 border-danger col-12 text-center m-0 p-0 qtyDecrement" style="height: 12px;font-size: 9px;"></i>
                        </div>
                    </div>

                    <div class="col-6 col-lg-6 text-end">
                        <div class="row">
                            <span class="col-12 text-end fs-5" id="priceBox<?php echo $x; ?>">Rs. <?php echo $data0["price"]; ?>.00</span>
                        </div>
                    </div>

                </div>
            </div>

    <?php

        }
    }

    ?>






    <div class="col-12 ">
        <div class="row border-bottom border-dark border-1">
            <span class="col-6 text-center fs-5 fw-bold">Total</span>
            <span class="col-6 text-end fw-bold fs-5" id="totalPrice">Rs. <?php echo $totalPrice; ?>.00</span>
        </div>
    </div>

</div>

<div class="row mt-4">
    <!--    
        <div class="col-12">
            <form action="checkout-charge.php?id=<?php echo "0"; ?>" method="POST">
                <button class="btn btn-primary col-12"> Buy
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MPMNuK1Ge9YQehemebVqeAmFfP5y1AeN9THOzU8NgAyW9NcJqAVCDd9VbGhg56i1prXXWI3YrCu6eGuoRKPoUwj00knZ5Hgl9" data-amount="<?php echo ($totalPrice * 100); ?>" data-name="<?php echo "Cart package"; ?>" data-description="<?php echo ""; ?>" data-image="<?php echo $img[0]; ?>" data-currency="lkr" data-locale="auto">
                    </script>
                </button>
            </form>
        </div> -->

    <button class="btn btn-success col-12" onclick="cartBuying(<?php echo $n0; ?>);">Buy</button>

</div>