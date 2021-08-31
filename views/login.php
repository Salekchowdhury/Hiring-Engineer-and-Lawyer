<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hiring engineer and lawyer system</title>
    <link rel="stylesheet" href="../contents/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../contents/css/custom_style.css">
    <link rel="stylesheet" href="../contents/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../contents/css/custom.css">
    <link href="../contents/css/fontawesome-free-5.11.1-web/css/all.min.css" rel="stylesheet" />

</head>
<body>
<div style="text-transform: uppercase; font-size: 45px; color:white; background-color: rgba(19,6,12,0.94) ">
    <marquee >A Web Based System for Hiring Engineer & Lawyer System</marquee>
</div>

    <div class="main">

        <div class="row">

            <div class="col-6">
                <section class="signup mb-0" style="margin-left: 10px;">
                    <div class="container">
                        <div class="signup-content">
                            <div class="signup-form">
                                <?php
                                if (isset($_SESSION["isExistMsg"])){
                                    echo $_SESSION["isExistMsg"];
                                    unset($_SESSION["isExistMsg"]);
                                }
                                if (isset($_SESSION["isSuccessMsg"])){
                                    echo $_SESSION["isSuccessMsg"];
                                    unset($_SESSION["isSuccessMsg"]);
                                }  if (isset($_SESSION["SuccessRegister"])){
                                    echo $_SESSION["SuccessRegister"];
                                    unset($_SESSION["SuccessRegister"]);
                                }
                                ?>
                                <h1 class="form-title">Sign up</h1>

                                <form action="dataprocess/email.php" method="post" class="register-form" id="register-form">
                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="fullname" id="name" placeholder="Your Name" required autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email" required autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="zmdi zmdi-border-color"></i></label>
                                        <select name="type" class="chng">
                                            <option value="-"disabled selected>---------------Select your option-------------</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Lawyer">Lawyer</option>
                                            <option value="user">User</option>
                                        </select>
                                        <label class="relative"><i class="zmdi zmdi-chevron-down"></i></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="pass" id="pass" placeholder="Password" required autocomplete="off"/>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="signup" id="signup" class="form-submit btn btn-outline-light bg-success" value="Register"/>
                                        <p class="mb-1">
                                            <a href="forgot-password.php">I forgot my password</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-6">
                <section class="sign-in mb-0" style="margin-right: 10px;">
                    <div class="container">
                        <div class="signin-content">
                            <!-- <div class="signin-image">
                                 <figure><img src="../contents/images/signin-image.jpg" alt="sing up image"></figure>
                                 <a href="register.php" class="signup-image-link">Create an account</a>
                             </div>-->

                            <div class="signin-form">
                                <?php
                                if (isset($_SESSION["isErorMsg"])){
                                    echo $_SESSION["isErorMsg"];
                                    unset($_SESSION["isErorMsg"]);
                                }
                                ?>
                                <h1 class="form-title">Sign in</h1>
                                <form action="dataprocess/registration_process.php" method="post" class="register-form" id="login-form">
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="signin" id="signin" class="form-submit btn w-100 bg-success " value="Log in"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>

    <script src="../contents/js/jquery-3.2.1.min.js"></script>
    <script src="../contents/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../contents/js/jquery.magnific-popup.min.js"></script>
    <script src="../contents/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="../contents/js/main_custom.js"></script>
</body>
</html>