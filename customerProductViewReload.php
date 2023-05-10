<?php

session_start();
require "connection.php";

$categoryrs = Database::search("SELECT * FROM `category`");
$num = $categoryrs->num_rows;

for ($y = 0; $y < $num; $y++) {
    $d = $categoryrs->fetch_assoc();
    $categoryid = $d["id"];
?>

    <div class="col-12 text-center">
        <a href="#" class="fs-2 text-dark fw-bold"><?php echo $d["name"]; ?></a>
    </div>
    <!-- Category name -->

    <!-- Products -->

    <div class="col-12 mb-3">

        <div class="row border border-dark justify-content-center gap-2" style="height: 650px; overflow-y: scroll;">


            <?php
            $productrs  = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $d["id"] . "' AND `status_id`='2' ORDER BY `datetime_added` DESC");
            $pn = $productrs->num_rows;
            
            for ($z = 0; $z < $pn; $z++) {
                $pd = $productrs->fetch_assoc();

                $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pd["id"] . "'");
                $image = $imagers->fetch_assoc();
               

            ?>

                <div class="col-6 col-lg-3 m-3 mb-3">
                    <div class="row">

                        <img src="<?php echo $image["code"]; ?>" class="card-img-top img-thumbnail imgcustomerproductview mb-3" style="">

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <h5 class="card-title col-12 fs-4 fw-bold"><?php echo $pd["title"]; ?> &nbsp;<span class="badge bg-info">New</span></h5>
                                <span class="card-text col-12 fs-5 text-primary">Rs.<?php echo $pd["price"]; ?>.00</span>
                                <br />
                                <?php
                                if ($pd["qty"] > 0) {
                                ?>
                                    <span class="card-text col-12 text-danger fs-5"><b>In Stock</b></span>
                                    <br />
                                    <span class="card-text col-12 text-success fw-bold fs-5"><?php echo $pd["qty"]; ?> Item Available</span>
                                <?php
                                } else {
                                ?>
                                    <span class="card-text col-12 text-danger fs-5"><b>Out of Stock</b></span>
                                    <br />
                                    <span class="card-text col-12 text-success fw-bold fs-5">00 Item Available</span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="row">

                                <?php

                                if ($pd["qty"] > 0) {
                                    if (isset($_SESSION["u"])) {
                                ?>
                                        <a href='<?php echo "singleProductView.php?id=" . ($pd["id"]) ?>'  class="btn btn-success col-12 fs-5 fw-bold">Buy Now</a>

                                        <?php

                                        $user = $_SESSION["u"]["email"];
                                        $id = $pd["id"];

                                        $result = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $id . "' AND `user_email`='" . $user . "'");
                                        $no = $result->num_rows;

                                        if ($no == 1) {
                                        ?>
                                            <a onclick='addToCart(<?php echo $pd["id"]; ?>);' class="btn btn-danger col-12 mt-1 fs-5 fw-bold text-white">Already in Cart</a>

                                        <?php
                                        } else {
                                        ?>

                                            <a onclick='addToCart(<?php echo $pd["id"]; ?>);' class="btn btn-danger col-12 mt-1 fs-5 fw-bold text-white">Add to Cart</a>

                                        <?php
                                        }

                                        ?>


                                    <?php

                                    } else {

                                    ?>
                                        <a href="#" class="btn btn-success col-12 fs-5 fw-bold" onclick="Alert();">Buy Now</a>
                                        <a href="#" class="btn btn-danger col-12 mt-1  fs-5 fw-bold text-white" onclick="Alert();">Add to Cart</a>
                                    <?php

                                    }
                                } else {

                                    ?>
                                    <a href="#" class="btn btn-success col-12 disabled fs-5 fw-bold text-white">Buy Now</a>
                                    <a href="#" class="btn btn-danger col-12 mt-1 disabled fs-5 fw-bold text-white">Add to Cart</a>
                                    <?php
                                }


                                if (isset($_SESSION["u"])) {

                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE   `product_id` ='" . $pd["id"] . "' AND `users_email`='" . $_SESSION["u"]["email"] . "'");
                                    $watchlist_num = $watchlist_rs->num_rows;

                                    if ($watchlist_num != 0) {

                                    ?>

                                        <a class="btn btn-secondary col-12 mt-1" onclick='addToWatchlist(<?php echo $pd["id"]; ?>);'>
                                            <i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $pd["id"]; ?>"></i>
                                        </a>

                                    <?php

                                    } else {

                                    ?>

                                        <a class="btn btn-secondary col-12 mt-1" onclick='addToWatchlist(<?php echo $pd["id"]; ?>);'>
                                            <i class="bi bi-heart-fill fs-5 text-white" id="heart<?php echo $pd["id"]; ?>"></i></a>

                                    <?php
                                    }
                                } else {
                                    ?>

                                    <a class="btn btn-secondary col-12 mt-1" onclick="Alert();">
                                        <i class="bi bi-heart-fill fs-5 text-white" id="heart<?php echo $pd["id"]; ?>"></i></a>

                                <?php

                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


        </div>

    </div>

    <!-- Products -->


<?php
}

?>