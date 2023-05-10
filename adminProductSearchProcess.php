<?php
require "connection.php";
$word = $_POST["id"];
$c = $_POST["c"];

// echo $word;

?>

<div class="col-12 text-center">
    <div class="row justify-content-center">

        <?php
        global $pageno;
        if (isset($_GET["page"])) {
            $pageno = $_GET["page"];
        } else {
            $pageno = 1;
        }



        if ($word == "" and $c == "Select Category") {
            $query = "SELECT * FROM `product`";
        } else if ($word != "" and $c == "Select Category") {
            $query = "SELECT * FROM `product` WHERE `title`LIKE '%$word%' ";
        } else if ($word == "" and $c != "Select Category") {
            $query = "SELECT * FROM product INNER JOIN category ON product.category_id=category.id WHERE `category`.`name`='" . $c . "'";
        } else {
            $query = "SELECT * FROM product INNER JOIN category ON product.category_id=category.id WHERE `product`.`title` LIKE '%$word%'  AND `category`.`name`='" . $c . "'";
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;
        $product_data = $product_rs->fetch_assoc();

        // $results_per_page = 6;
        // $number_of_pages = ceil($product_num / $results_per_page);

        // $page_results = ($pageno - 1) * $results_per_page;

        if ($word == "" and $c == "Select Category") {
            $query1 = "SELECT product.id AS pid,product.title AS ptitle,product.price AS pprice ,product.qty AS pqty, product.status_id as pstatus_id FROM `product`";
        } else if ($word != "" and $c == "Select Category") {
            $query1 = "SELECT product.id AS pid,product.title AS ptitle,product.price  AS pprice ,product.qty AS pqty, product.status_id as pstatus_id FROM `product` WHERE `title` LIKE '%$word%' ";
        } else if ($word == "" and $c != "Select Category") {
            $query1 = "SELECT product.id AS pid,product.title AS ptitle,product.price AS pprice ,product.qty AS pqty, product.status_id as pstatus_id FROM product INNER JOIN category ON product.category_id=category.id WHERE `category`.`name`='" . $c . "' ";
        } else {
            $query1 = "SELECT product.id AS pid,product.title AS ptitle,product.price AS pprice ,product.qty AS pqty, product.status_id as pstatus_id FROM product INNER JOIN category ON product.category_id=category.id WHERE `product`.`title` LIKE '%$word%' AND `category`.`name`='" . $c . "'";
        }

        $selected_rs = Database::search($query1);
        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <!-- card -->

            <div class="card mb-3 mt-3 ms-4 col-9 col-lg-5 bg-warning border border-2 border-dark">
                <div class="row g-2">
                    <div class="col-md-4 mt-4 mb-2">

                        <?php

                        $product_img_rs = Database::search("SELECT * FROM `images` WHERE 
                                                    `product_id`='" . $selected_data["pid"] . "'");
                        $product_img_data = $product_img_rs->fetch_assoc();

                        ?>

                        <img src="<?php echo $product_img_data["code"]; ?>" style="margin-top: -8px; height: 150px;" class="img-fluid rounded-start col-12 " />

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo $selected_data["ptitle"]; ?></h5>
                            <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["pprice"]; ?> .00</span>
                            <br />
                            <span class="card-text fw-bold text-success"><?php echo $selected_data["pqty"]; ?> Items left</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $selected_data["pid"]; ?>" <?php if ($selected_data["pstatus_id"] == 2) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> onclick="changeStatus(<?php echo $selected_data['pid']; ?>);">
                                <label class="form-check-label text-primary fw-bold" for="flexSwitchCheckDefault<?php echo $selected_data["pid"]; ?>" id="switchlbl<?php echo $selected_data["pid"]; ?>">

                                    <?php
                                    if ($selected_data["pstatus_id"] == 2) {
                                        echo "Make Your Product Deactive";
                                    } else {
                                        echo "Make Your Product Active";
                                    }
                                    ?>
                                </label>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-1">

                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-success fw-bold" onclick="sendId(<?php echo $selected_data['pid']; ?>);">Update</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-danger fw-bold" onclick="sendIdDelete(<?php echo $selected_data['pid']; ?>);">Delete</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- card -->

        <?php

        }

        ?>



    </div>
</div>

<?php




?>