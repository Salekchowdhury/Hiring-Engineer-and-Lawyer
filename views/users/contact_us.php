<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation =new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $userData=$dataManipulation->showUserDataByEmail($email);
    ?>

    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger" style="background-color: #7c151f !important;">
            <div class="logo">
                <a class="simple-text logo-mini">
                    <div class="logo-image-small">
                    </div>
                </a>
                <a style="color: #ce0000;" class="simple-text logo-normal">
                  <?php echo $userData->name?>
                </a>
            </div>
            <div class="sidebar-wrapper" style="background-color: #05287c">
                <ul class="nav">
                    <li>
                        <a href="my_profile.php">
                            <i style="color: white" class="far fa-user"></i>
                            <p class="user_side_bar_bg">My Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="post.php">
                            <i style="color: white" class="far fa-clone"></i>
                            <p class="user_side_bar_bg">Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage_post.php">
                            <i style="color: white" class="fas fa-align-left"></i>
                            <p class="user_side_bar_bg">Manage Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="enginner_lawyer.php">
                            <i style="color: white" class="fas fa-user-graduate"></i>
                            <p class="user_side_bar_bg">Engineer & Lawyer</p>
                        </a>
                    </li>
                    <li>
                        <a href="booking_history.php">
                            <i style="color: white" class="fas fa-landmark"></i>
                            <p class="user_side_bar_bg">Booking History</p>
                        </a>
                    </li>
                    <li>
                        <a href="message.php" >
                            <i  style="color: white" class="fas fa-comment-dots"></i>
                            <p class="user_side_bar_bg">Message</p>
                        </a>
                    </li>

                    <li class="active">
                        <a href="contact_us.php">
                            <i class="fas fa-address-card"></i>
                            <p >Contact Us</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <h3>A Web Based System for Hiring Engineer & Lawyer</h3>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <img src="<?php echo $userData->image?>" width="60px" height="45px" style="border: 1px solid; border-color: #7c151f; border-radius: 50%">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='my_profile.php'>
                                    <?php echo $userData->name?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='../dataprocess/process.php?logout="buttonHit"'>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div   class="content wow bounceInUp" data-wow-duration= "2s" style="padding-top: 30px">
                <div class="row">
                    <div class="col-5">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <span style="color: #344e86; font-size: 25px"> Address:</span>
                        <p style="padding-left: 30px"> KOTWALI, CHITTAGONG</p>
                        <hr style="border-color: red; border: 4px dashed">
                    </div>
                    <div class="col-3">
                        <i class="fas fa-phone fa-2x"></i><span style="color: #344e86; font-size: 25px"> Phone:</span>
                        <p style="padding-left: 30px">+8801954196150</p>
                        <hr style="border-color: red; border: 4px dashed">
                    </div>
                    <div class="col-4">
                        <i class="far fa-envelope fa-2x"></i><span style="color: #344e86; font-size: 25px"> Mail:</span>
                        <p style="padding-left: 30px">hireengineerlawyersystem@gmail.com</p>
                        <hr style="border-color: red; border: 4px dashed">
                    </div>

                    <div class="col-12" style="padding-top: 55px;">

                        <div style="border-radius: 15px; border: 2px solid;  background-color: white;   margin-top: -20px;  border-color: #28a745; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                            <form class="form-horizontal" action="../dataprocess/email.php" method="post">
                                <input class="" name="email" type="hidden" value="<?php echo $email?>" >

                                <div style="padding: 10px" class="form-group row">
                                    <div class="col-6">
                                        <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Name:</strong></label>
                                        <div class="col-sm-10">
                                            <input  disabled class="form-control" name="name" value="<?php echo $userData->name?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-4 col-form-label"><strong  style="padding-right: 90px">Email:</strong></label>
                                        <div class="col-sm-10">
                                            <input  disabled=""  class="form-control" name="email" value="<?php echo $email?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Subect:</strong></label>
                                        <div class="col-sm-10">
                                            <input  class="form-control" name="subect" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 80px">Mesaage:</strong></label>
                                        <div class="col-sm-10">
                                            <textarea  class="form-control " rows="10" name="mesaage" value=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="send_message_form_engineer_lawyer_panel" >Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <br>
                <?php

                if(isset($_SESSION['SendMessage'])){
                    echo $_SESSION['SendMessage'];
                    unset($_SESSION['SendMessage']);
                }

                ?>


            </div>


            <footer class="footer footer-black p-0 footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
              <span class="copyright">
                Copyright &copy; All rights reserved
                <script>
                  document.write(new Date().getFullYear())
                </script>

              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php
    require_once "../../include/foot.php";

    ?>
    <script>
        new WOW().init();
    </script>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

