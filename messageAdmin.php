<?php

require "connection.php";

$name = $_GET["x"];
// echo $name;


Database::iud("UPDATE `message` SET `watch`='1' WHERE `from`='" . $name . "'");

?>


<div class="col-12 border border-2 border-dark" style="height: 400px; border-radius: 10px; padding: 5px; overflow-y: scroll; overflow-x: hidden;">

    <?php


    $results = Database::search("SELECT * FROM message WHERE `from`='" . $name . "' AND `to`='admin' OR `to`='" . $name . "' AND `from`='admin' ORDER BY `id` DESC");


    $n = $results->num_rows;

    if ($n > 0) {


        for ($x = 0; $x < $n; $x++) {
            $data = $results->fetch_assoc();

            $rs2 = Database::search("SELECT * FROM `profile_image` WHERE `users_email`='" . $data["from"] . "'");

            $img = $rs2->fetch_assoc();

            if ($data["from"] != "admin") {

    ?>

                <div class="col-12 msgfrom">
                    <div class="row justify-content-star">
                        <img src="<?php echo $img["path"]; ?>" class="img123 col-2 mt-0 mt-lg-3" alt="">
                        <div class="col-10">
                            <div class="row bg-info bgmsg" style="width: fit-content;">
                                <p class=" mt-3 bg-info text-white fs-5 p-2"><?php echo $data["msg"] ?></p>
                                <label class="fs-6"><?php echo $data["date"] ?> , <?php echo $data["time"] ?></label>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
            ?>

                <div class="col-12 p-2 msg">
                    <div class="row justify-content-end">
                        <div class="col-10">
                            <div class="row justify-content-end">
                                <div class="bg-primary bgmsg" style="width: fit-content; margin-right: 5px;">
                                    <p class="col-12 mt-3 fs-5 text-white"><?php echo $data["msg"] ?></p>
                                    <label class="fs-6"><?php echo $data["time"] ?> , <?php echo $data["date"] ?></label>
                                </div>
                            </div>
                        </div>
                        <img class="col-2 img123 mt-0 mt-lg-3" src="resources/profile_img/newuser.svg" alt="" />


                    </div>
                </div>

    <?php

            }
        }
    }



    ?>
</div>

<div class="col-12 mt-2 mb-2">
    <div class="row">

        <input type="text" name="" class="col-9" id="msgbox1" style="border-radius: 5px;">
        <button class="btn btn-outline-danger col-3" onclick="msgSend1('<?php echo $name ?>');">Send</button>

    </div>
</div>