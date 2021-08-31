<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation =new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email']))
{
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

                    <li>
                        <a href="contact_us.php">
                            <i style="color: white" class="fas fa-address-card"></i>
                            <p class="user_side_bar_bg">Contact Us</p>
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
            <div class="content">
                <?php
                if(isset($_GET['Lawyer_id'])){
                    $egineerData =$dataManipulation->showEngineerProfileBYid($_GET['Lawyer_id']);
                    if($egineerData){
                        $fullName =$egineerData->fullname;
                        $address =$egineerData->address;
                        $age =$egineerData->age;
                        $university =$egineerData->university;
                        $pnumber =$egineerData->pnumber;
                        $office =$egineerData->office;
                        $category =$egineerData->category;
                        $engineerEmail =$egineerData->email;
                        $experience =$egineerData->experience;
                        $image =$egineerData->image;
                        $nid_image =$egineerData->nid_image;
                        $document_image =$egineerData->document_image;
                    }else{

                        $address ="";
                        $age ="";
                        $university ="";
                        $pnumber ="";
                        $office ="";
                        $fullName ="";
                        $experience ="";
                        $nid_image ="";
                        $document_image ="";
                    }
                }
                ?>

                <div class="row" style="padding-top: 10px; background: url(../../contents/images/lawyer_bg_img.jpg) ">

                    <div class="col-1"></div>
                    <div class="col-5" style=" height: 250px; border-radius: 15px">
                        <?php
                        if($nid_image){
                            ?>
                            <img src="<?php echo $nid_image?> " width="400px" height="200" alt="Avatar" class="avatar">
                            <?php
                        }else{
                            ?>
                            <img src="../../contents/images/nid_1.jpg " width="400px" height="200" alt="Avatar" class="avatar">
                            <?php
                        }
                        ?>


                    </div>
                    <div class="col-5" style=" height: 250px; border-radius: 15px">
                        <?php
                        if($nid_image){
                            ?>
                            <img src="<?php echo $document_image?> " width="400px" height="200" alt="Avatar" class="avatar">
                            <?php
                        }else{
                            ?>
                            <img src="../../contents/images/va-certificate.jpg " width="400px" height="200" alt="Avatar" class="avatar">
                            <?php
                        }
                        ?>


                    </div>

                    <div class="col-1"></div>
                    <form  role="form " action="../../views/process/student_data_process.php" method="post" enctype="multipart/form-data">

                        <div class="col-sm-4" style="margin: 20px">
                            <div style="height: 500px; width: 300px; border: 1px solid; border-color: #a71d2a; border-radius: 25px; box-shadow: 3px 3px 8px #0F0F0F , -3px -3px 8px black;">
                                <img style="margin: 10px 10px 10px 40px; border-color: #ff5c0e; border: dotted 2px;  border-radius: 50%" src="<?php echo $image?> " width="200px" height="170" alt="Avatar" class="avatar">
                                <h4 style="margin-left: 15px; padding-bottom: 5px; color: #51cbce"><?php echo $fullName?></h4>
                                <h6 style="margin-left: 15px; color: #51cbce"><?php echo $category?></h6>
                                <hr>
                                <!--  <strong style="margin-left: 15px; font-weight:800 ">Azim.chowdhury@gmail.com</strong>
                                  <hr>-->
                                <?php
                                if($experience){
                                    ?>
                                    <p style="padding:  10px;font-size: 20px; color: #51cbce"><?php echo $experience."Experience" ?></p>
                                    <?php
                                }else{

                                    ?>
                                    <p style="padding:  10px;font-size: 20px; color: #51cbce">Profile is Not Complete</p>
                                    <?php
                                }
                                ?>

                                <hr>

                                <a href="../dataprocess/user_data_process.php?confirm_engineer_id=<?php echo $egineerData->id?>"  class="btn bg-success fancy" data-type="iframe" style="margin-left: 15px" type="submit" class="btn btn-primary"  name="change_profile" value="Confirm"><i class="fas fa-check-circle"></i> Confirm</a>
                                <a href="email_form.php?engineer_id=<?php echo $egineerData->id?>" class="btn bg-success fancy" data-type="iframe"><i class="fa fa-mail-bulk"></i> Email</a>


                            </div>
                        </div>
                    </form>

                    <div class="col-md-8" style="padding-left: 0px; padding-top: 20px">
                        <?php

                        if(isset($_SESSION['successMsg'])){
                            echo $_SESSION['successMsg'];
                            unset($_SESSION['successMsg']);
                        }

                        ?>
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pl-1">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" disabled class="form-control" value="<?php echo $fullName?>" name="fullname">
                                            </div>
                                        </div>
                                        <!--<div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input type="text"  disabled class="form-control" value="Male">
                                            </div>
                                        </div>-->
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" disabled  class="form-control" value="<?php echo $age?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-1" style="">
                                            <div class="form-group">
                                                <label>University</label>
                                                <input style="color: #28a745; font-size: 20px" type="text" disabled  class="form-control" value="<?php echo $university?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group" >
                                                <label>Phone Number</label>
                                                <input type="number"  disabled class="form-control" value="<?php echo $pnumber?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" disabled class="form-control" name="address" value="<?php echo $address?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-12 pl-1">
                                            <div class="form-group" style="">
                                                <label>Office</label>
                                                <input type="text" disabled class="form-control" name="address" value="<?php echo $office?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <input type="text" disabled class="form-control" name="address" value="<?php echo $category?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" disabled class="form-control" name="email" value="<?php echo $engineerEmail?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                    <div class="row">


                                    </div>
                                    <div class="row">

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>




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
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>
