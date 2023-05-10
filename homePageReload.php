<?php
require "connection.php";
?>
<div class="col-12 border-bottom pb-3 border-1 border-dark" style="height: auto;">
    <div class="row p-2 justify-content-center">
        <img src="resources/add1.jpg" alt="" class="col-12 col-lg-6" />
        <img src="resources/add2.jpg" alt="" class="col-12 col-lg-6 mt-3 mt-lg-0" />
    </div>
</div>

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12 justify-content-center mb-3">
            <div class="row ">
                <div id="carouselExampleCaptions" class="col-12 carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="resources/slider_images/slide1.jpg" class="d-block poster-img-1">
                            <div class="carousel-caption d-none d-md-block poster-caption">
                                <h5 class="poster-title">Welcome to Online Shop</h5>
                                <p class="poster-text">The World's Best Online Store By One Click.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="resources/slider_images/slide2.jpg" class="d-block poster-img-1">
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title">Be Free...</h5>
                                <p class="poster-text">Experience the Lowest Delivery Costs With Us.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="resources/slider_images/slide3.jpg" class="d-block poster-img-1">
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                <h5 class="poster-title">Be Free...</h5>
                                <p class="poster-text">Experience the Lowest Delivery Costs With Us.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-contenet-center">
                <?php
                $categoryrs = Database::search("SELECT * FROM `category`");
                $num = $categoryrs->num_rows;

                for ($y = 0; $y < $num; $y++) {
                    $d = $categoryrs->fetch_assoc();
                    $categoryid = $d["id"];
                ?>

                    <div class="col-12 text-start mt-2 mb-5 border-bottom border-1 border-dark">
                        <a href="#" class="fs-2 text-dark fw-bold"><?php echo $d["name"]; ?></a>&nbsp;&nbsp;
                        <a href="#" onclick="viewProductAll(<?php echo $categoryid; ?>);" class="link-light link3 fs-6">See All&nbsp; &rarr;</a>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center">

                            <?php
                            $productrs  = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $d["id"] . "' AND `status_id`='2' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                            $pn = $productrs->num_rows;
                            for ($z = 0; $z < $pn; $z++) {
                                $pd = $productrs->fetch_assoc();

                                $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pd["id"] . "'");
                                $image = $imagers->fetch_assoc();
                            ?>
                                <a href='<?php echo "singleProductView.php?id=" . ($pd["id"]) ?>' style="cursor: pointer; margin-left: 10px; margin-bottom: 80px;" class="col-lg-2 col-10 mt-1">
                                    <!-- <div class="col-12" style=" " > -->
                                    <div class="row justify-content-center">
                                        <div class="homeproductviewbox ">
                                            <img src="<?php echo $image["code"]; ?>" class="homeproductview" alt="Click here to buy...">
                                            <!-- </div> -->
                                            <h5 class="card-title col-12 fs-4 fw-bold mt-4 text-center"><?php echo $pd["title"]; ?></h5>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            } ?>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>

        <div class="col-12 border-top border-1 border-dark mb-4 mt-2">
            <div class="row justify-content-center">
                <img src="resources/add3.jpg" alt="" class="">
            </div>
        </div>

    </div>

</div>