<?php
require "connection.php";
$date = $_POST["d"];

?>
<table class="col-12 justify-content-center">
    <tr class="col-12  text-center tablehead">
        <th class="col-2 p-2">In_Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</th>
        <th class="col-2 p-2">Product</th>
        <th class="col-2 p-2">Product Name</th>
        <th class="col-2 p-2">QTY</th>
        <th class="col-2 p-2">Buyer gmail</th>
        <th class="col-2 p-2">Balnce</th>
    </tr>

    <?php
    $result = Database::search("
SELECT invoice.id AS iid, product.id AS pid, invoice_item.date AS bdate,product.title AS pname,invoice_item.qty AS bqty,invoice.users_email AS bemail,invoice_item.balance AS cost
FROM invoice_item INNER JOIN invoice ON invoice_item.invoice_id=invoice.id 
INNER JOIN product ON invoice_item.product_id=product.id
INNER JOIN model_has_brand ON product.model_has_brand_id=model_has_brand.id
INNER JOIN model ON model_has_brand.model_id=model.id
INNER JOIN brand ON model_has_brand.brand_id=brand.id
WHERE invoice_item.date='" . $date . "' ORDER BY invoice.id DESC
");
    $n = $result->num_rows;
    $total = 0;

    if ($n != 0) {

        for ($i = 0; $i < $n; $i++) {

            $data = $result->fetch_assoc();
            $result1 = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $data["pid"] . "'");
            $img = $result1->fetch_assoc();
            $total += $data["cost"];
    ?>

            <tr class="border-bottom">
                <td class="col-2 p-2 border-right text-center"><?php echo $data["iid"]; ?>&nbsp; . &nbsp;<?php echo $data["bdate"] ?></td>
                <td class="col-2 p-2 border-right text-center">
                    <img src="<?php echo $img["code"] ?>" class="border border-1 border-danger rounded" style="height: 120px; width: 120px;" alt="">
                </td>

                <td class="col-2 p-2 border-right"><?php echo $data["pname"] ?></td>
                <td class="col-2 p-2 border-right text-center"><?php echo $data["bqty"] ?></td>
                <td class="col-2 p-2 border-right text-center"><?php echo $data["bemail"] ?></td>
                <td class="col-2 p-2 border-right text-end">Rs. <?php echo $data["cost"] ?>.00</td>
            </tr>

        <?php
        }
        ?>
        <span class="col-12 fs-2 position-absolute" id="totalBuyingPrice" hidden><?php echo $total; ?></span>
    <?php
    } else {

    ?>


        <span class="col-12 fs-2 position-absolute" id="totalBuyingPrice" hidden><?php echo $total; ?></span>


        <span class="col-12 p-2 border-right position-absolute fs-2 fw-bold text-center" style="margin-top:300px;">Empty Buying History</span>



    <?php
    }
    ?>


</table>