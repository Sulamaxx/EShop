<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eShop | Admins | Sign In</title>

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="start.css"/>
    <link rel="stylesheet" href="style.css" />


</head>

<body style="background-color: black; ">
    <div class='stars'></div>
    <div class='stars2'></div>
    <div class='stars3'></div>
    <div class="container-fluid justify-content-center position-fixed" id="maindiv" style="margin-top: 100px;">
        <div class="row align-content-center">



            <div class="col-12 p-5">
                <div class="row">

                    <div class="col-3 d-none d-lg-block"></div>

                    <div class="col-12 col-lg-6 d-block bg-white pb-2" style="border-radius: 10px;">
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 logo"></div>
                                    <div class="col-12">
                                        <p class="text-center title1">Hi, Welcome to Online Shop Admins.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <p class="title02">Sign In to your account.</p>
                                <span class="text-danger" id="msg"></span>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" />
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="adminVerification();">
                                    Send Verification Code to Login
                                </button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="backToCustomerLogin();">Back to Customer Login</button>
                            </div>

                            <div class="col-12 text-center d-none d-lg-block fixed-bottom">
                                <p class="fw-bold text-white-50">&copy; 2022 OnlineShop.lk All Rights Reserved.</p>
                            </div>

                            <div class="col-3 d-none d-lg-block"></div>

                            <!-- modal -->

                            <div class="modal position-fixed" tabindex="-1" id="verificationModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Admin Verification</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="form-label">Enter the verification code you got by an email</label>
                                            <input type="text" class="form-control" id="verificationcode" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeMode();">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="verificationAdmin();">Verify</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>