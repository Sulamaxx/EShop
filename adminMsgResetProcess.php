<div class="col-12 border border-3 border-dark m-2 mb-4" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

    <div class="row p-4">

        <?php

        require "connection.php";

        $rs = Database::search("SELECT DISTINCT `from` FROM `message`");

        $rsnum = $rs->num_rows;

        for ($i = 0; $i < $rsnum; $i++) {

            $data = $rs->fetch_assoc();




            if ($data["from"] != "admin") {


                $rs1 = Database::search("SELECT * FROM `message` WHERE `from`='" . $data["from"] . "' ORDER BY `id` DESC LIMIT 1");
                $msg = $rs1->fetch_assoc();

                $name = $data["from"];

                $rs2 = Database::search("SELECT * FROM `profile_image` WHERE `users_email`='" . $name . "'");

                $img = $rs2->fetch_assoc();


        ?>


                <div class="col-12 mt-2">
                    <button class="col-12 btn btn-warning text-lg-start text-center" onclick="clickMsg('<?php echo $name ?>'); adminNotificationClean();">

                        <img src="<?php echo $img["path"]; ?>" class="col-3 col-lg-1" style="border-radius: 50%;" alt="">

                        <?php echo $name ?>

                        <!-- <br /> -->
                        <div class="row mx-0 mx-lg-2" style="margin-top: -30px;">




                            <?php


                            if ($msg["watch"] == "0") {

                            ?>
                                &nbsp;<span class="fw-bold text-black offset-1 mt-0 p-0 col-12"><?php echo $msg["msg"] ?></span>
                            <?php

                            } else {

                            ?>
                                &nbsp;<span class="text-black-50 offset-1 mt-0 p-0 col-12"><?php echo $msg["msg"] ?></span>
                            <?php

                            }

                            ?>
                        </div>

                    </button>
                </div>


        <?php

            }
        }

        ?>


    </div>
</div>