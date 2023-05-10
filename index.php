<!DOCTYPE html>

<html>

<head>

    <title>eShop</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="start.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body class="bg-black" onload="animationIndex(); move();">
    <div class='stars'></div>
    <div class='stars2'></div>
    <div class='stars3'></div>
    <div class="container-fluid vh-100 d-flex justify-content-center position-fixed" >
        <div class="row align-content-center">



            <!-- content1 -->
            <div class="col-12">
                <div class="row">


                    <div class="col-3 d-none d-lg-block"></div>



                    <div class="col-12 col-lg-6 bg-white h-75 pb-5 pb-lg-0 pt-5 pt-lg-0" style="border-radius: 10px;">


                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <a href="adminSignin.php" class="mt-5 mt-lg-0" title="Go To Admin SignIn" style="position: absolute;"><i class="fs-1 text-black fw-bold bi bi-person-badge"></i></a>
                                    <div class="col-12 logo"></div>
                                    <div class="col-12">
                                        <p class="text-center title1">Hi, Welcome to Online Shop</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="signUpBox">
                                <div class="row g-2">

                                    <div class="col-12">
                                        <p class="title02">Create New Account</p>
                                        <span class="text-danger" id="msg"></span>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" id="fname" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" type="text" id="lname" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" id="email" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" id="password" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input class="form-control" type="text" id="mobile" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="gender">


                                            <option value="0">Select</option>
                                            <?php

                                            require "connection.php";

                                            $resultset = Database::search("SELECT * FROM `gender`");
                                            $n = $resultset->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $f = $resultset->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $f["id"]; ?>"><?php echo $f["gender_name"]; ?></option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-dark" onclick="changeView();">Already have an account? Sign In</button>
                                    </div>

                                </div>
                            </div>



                            <div class="col-12 d-none" id="signInBox">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <p class="title02">Sign In to your account..</p>
                                        <span class="text-danger" id="msg2"></span>
                                    </div>


                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }

                                    ?>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" id="email2" value="<?php echo $email ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" id="password2" value="<?php echo $password ?>" />
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                                            <label class="form-check-label">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password</a>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-danger" onclick="changeView();">New to Online Shop? Join Now</button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 d-none d-lg-block m-2">
                                <p class="text-center text-black-50">&copy; 2022 Onlineshop.lk || All Rights Reserved.</p>
                            </div>

                        </div>
                    </div>


                    <div class="col-3 d-none d-lg-block"></div>



                </div>
            </div>
            <!-- content1 -->

        </div>

    </div>

    <!-- model -->
    <div class="modal mt-5" tabindex="-1" id="fogotPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np" />
                                <button class="btn btn-secondary" type="button" id="npb" onclick="showpassword1();"><i class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button class="btn btn-secondary" type="button" id="rnpb" onclick="showpassword2();"><i class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Verification Code</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="vc" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetpassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model -->

    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>