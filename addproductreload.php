<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

?>


    <div class="col-12" style="margin-top: 60px;">
        <div class="row justify-content-center">

            <div class="col-12 text-center">
                <h2 class="h2 text-danger fw-bold">Add New Product</h2>
            </div>


            <div class="col-12 col-lg-6">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">Select Product Category</label>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-select" id="category">
                                    <option value="0">Select Category</option>

                                    <?php

                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;

                                    for ($x = 0; $x < $category_num; $x++) {
                                        $category_data = $category_rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                    <?php

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">Select Product Brand <i onclick="addModelOrBrand(1);" class="bi bi-plus-circle-fill fs-4 fw-bold text-dark plusmark"></i></label>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-select" id="brand">
                                    <option value="0">Select Brand</option>

                                    <?php

                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_num = $brand_rs->num_rows;

                                    for ($y = 0; $y < $brand_num; $y++) {
                                        $brand_data = $brand_rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                    <?php

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">Select Product Model <i class="bi bi-plus-circle-fill fs-4 fw-bold text-dark plusmark" onclick="addModelOrBrand(0);"></i></label>
                            </div>
                            <div class="col-12 mb-3">
                                <select class="form-select" id="model">
                                    <option value="0">Select Model</option>

                                    <?php

                                    $model_rs = Database::search("SELECT * FROM `model`");
                                    $model_num = $model_rs->num_rows;

                                    for ($z = 0; $z < $model_num; $z++) {
                                        $model_data = $model_rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                    <?php

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>







                    <div class="col-12">
                        <hr class="hr-break-1" />
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">
                                    Add a title to your Product.
                                </label>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" id="title" />
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="hr-break-1" />
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold lbl1">Select Product Condition</label>
                                    </div>
                                    <div class="col-12 offset-1">
                                        <div class="row">
                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="bn" checked />
                                                <label class="form-check-label" for="bn">
                                                    Brand new
                                                </label>
                                            </div>
                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="radio" name="condition" id="us" />
                                                <label class="form-check-label" for="us">
                                                    Used
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1 fw-bold">Select Product Colour</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr1" checked>
                                                <label class="form-check-label" for="clr1">
                                                    Gold
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr2">
                                                <label class="form-check-label" for="clr2">
                                                    Silver
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr3">
                                                <label class="form-check-label" for="clr3">
                                                    Graphite
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr4">
                                                <label class="form-check-label" for="clr4">
                                                    Pacific Blue
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr5">
                                                <label class="form-check-label" for="clr5">
                                                    Jet Black
                                                </label>
                                            </div>

                                            <div class="form-check offset-1 col-5">
                                                <input class="form-check-input" type="radio" name="clrradio" id="clr6">
                                                <label class="form-check-label" for="clr6">
                                                    Rose Gold
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="row">

                                    <label class="form-label fw-bold lbl1">Add Product Quantity</label>
                                    <input type="number" class="form-control" value="0" min="0" id="qty" />

                                </div>
                            </div>




                        </div>
                    </div>


                    <div class="row mt-3">
                        <hr class="hr-break-1" />
                    </div>


                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold lbl1">Cost Per Item</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold lbl1">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="offset-2 col-2 pm1"></div>
                                            <div class="col-2 pm2"></div>
                                            <div class="col-2 pm3"></div>
                                            <div class="col-2 pm4"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>




            <div class="col-12 col-lg-6">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">Delivery Costs</label>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <label>Delivery Cost Within Colombo</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12">
                                        <label>Delivery Cost Out Of Colombo</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <hr class="hr-break-1" />
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label fw-bold lbl1">Product Description</label>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" cols="30" rows="25" id="description"></textarea>
                            </div>

                        </div>
                    </div>


                </div>
            </div>






            <div class="col-lg-12">


                <hr class="hr-break-1" />

                <div class="col-12">
                    <div class="row justify-content-center">

                        <div class="col-12">
                            <label class="form-label fw-bold lbl1">Add Product Images</label>
                        </div>
                        <div class="col-10">
                            <div class="row justify-content-center">
                                <div class="col-6 col-lg-3 border border-primary rounded">
                                    <img class="img-fluid" src="resources/addproductimg.svg" id="preview0" style="width: 250px; height: 250px; background-size: auto;" />
                                </div>
                                <div class="col-6 col-lg-3 border border-primary rounded">
                                    <img class="img-fluid" src="resources/addproductimg.svg" id="preview1" style="width: 250px; height: 250px; background-size: auto;" />
                                </div>
                                <div class="col-6 col-lg-3 border border-primary rounded">
                                    <img class="img-fluid" src="resources/addproductimg.svg" id="preview2" style="width: 250px; height: 250px; background-size: auto;" />
                                </div>
                                <div class="col-6 col-lg-3 border border-primary rounded">
                                    <img class="img-fluid" src="resources/addproductimg.svg" id="preview3" style="width: 250px; height: 250px; background-size: auto;" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 d-grid mt-3">

                            <input type="file" accept="img/*" class="d-none" id="imageuploader" multiple />
                            <label for="imageuploader" class="col-12 btn btn-success" onclick="changeProductImageAdd();">Upload Image</label>

                        </div>

                    </div>
                </div>


                <hr class="hr-break-1" />


                <div class="col-12">
                    <label class="form-label fw-bold lbl1">Notice...</label>
                    <br />
                    <label class="form-label">We are taking 5% of the product from price from every
                        product as a service charge.</label>
                </div>

                <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3 mt-2">
                    <button class="btn btn-danger fw-bold" onclick="addproduct();">Add Product</button>
                </div>

            </div>



        </div>
    </div>




    <!-- model -->
    <div class="modal" style="margin-top: 200px;" tabindex="-1" id="modelForBrand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outputName"></h5>
                    <button type="button" class="btn-close" onclick="closemodel();" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-12">
                            <label class="form-label">Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="gavename" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closemodel();" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SaveModel();">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model -->
<?php

} else {

?>
    <script>
        window.location = "adminSignin.php";
    </script>
<?php

}

?>