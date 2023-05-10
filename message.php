<?php
$user = $_SESSION['u']['email'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center mt-3">
                <span class="fs-2 fw-bold text-primary">Message Section</span>
            </div>
            <div class="col-10 mt-3 mb-3">
                <div class="row">
                    <div class="col-12 border border-2 border-dark" id="msgboxuser" style="height: 400px; border-radius: 10px; padding: 5px; overflow-y: scroll; overflow-x: hidden;">
                        <?php
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
                        }
                        ?>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <input type="text" name="" class="col-9" id="msgbox1" style="border-radius: 5px;">
                            <button class="btn btn-danger col-3" onclick="msgSend();">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="custom.js"></script>
</body>
</html>