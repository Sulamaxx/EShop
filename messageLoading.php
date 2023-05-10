<?php
session_start();
require "connection.php";
$user = $_SESSION['u']['email'];
$results = Database::search("SELECT * FROM message WHERE `from`='" . $user . "' AND `to`='admin' OR `to`='" . $user . "' AND `from`='admin' ORDER BY `id` DESC");
$n = $results->num_rows;
if ($n > 0) {
    for ($x = 0; $x < $n; $x++) {
        $data = $results->fetch_assoc();
        $rs2 = Database::search("SELECT * FROM `profile_image` WHERE `users_email`='" . $data["from"] . "'");
        $img = $rs2->fetch_assoc();
        if ($data["from"] == "admin") {
?>
           <div class="col-12 msgfrom">
                <div class="row">
                    <img src="resources/profile_img/newuser.svg" class="img123 col-2" alt="">
                    <div class="col-10">
                        <div class="row bg-info bgmsg" style="width: fit-content;">
                            <p class=" mt-3 text-white fs-5 p-2"><?php echo $data["msg"] ?></p>
                            <label class="fs-6"><?php echo $data["time"] ?> , <?php echo $data["date"] ?></label>
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
                    <img class="col-2 img123 mt-0 mt-lg-3" src="<?php echo $img["path"] ?>" alt="" />
                </div>
            </div>
<?php
        }
    }
} else {
    echo "Error";
}
?>