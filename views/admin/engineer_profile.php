 <?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
 $dataManipulation = new DataManipulation;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email']))
{
    $email = $_SESSION["email"];
    ?>
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger" style="background-color: #7c077b !important;">
            <div class="logo">
                <a class="simple-text logo-mini">
                    <div class="logo-image-small">
                    </div>
                </a>
                <a style="color: #ce0000;" class="simple-text logo-normal">
                    <?php
                    $data=$dataManipulation->adminProfile($email);
                    ?>
                    <?php echo $data->fname?>
                </a>
            </div>
            <div class="sidebar-wrapper" style="background-color: #4f0547; position: fixed">
                <ul class="nav">
                    <li >
                        <a href="controller.php">
                            <i style="color: white" class="fas fa-cog"></i>
                            <p class="user_side_bar_bg">Controller</p>
                        </a>
                    </li>
                    <li>
                        <a href="my_profile.php">
                            <i style="color: white" class="nc-icon nc-single-02"></i>
                            <p class="user_side_bar_bg">My Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage_account.php">
                            <i style="color: white" class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p class="user_side_bar_bg" >Manage Account</p>
                        </a>
                    </li>
                    <li>
                        <a href="manage_post.php">
                            <i style="color: white" class="nav-icon fas fa-mail-bulk"></i>
                            <p class="user_side_bar_bg">Manage Post</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="pending_request.php">
                            <i style="color: white" class="nav-icon fas fa-recycle"></i>
                            <p class="user_side_bar_bg">Pending Request</p>
                        </a>
                    </li>

                    <li>
                        <a href="notice.php">
                            <i style="color: white" class="fas fa-exclamation-circle"></i>
                            <p class="user_side_bar_bg">Notice</p>
                        </a>
                    </li>
                    <li>
                        <a href="payment_schedule.php">
                            <i style="color: white" class="nc-icon nc-money-coins"></i>
                            <p class="user_side_bar_bg">Payment Schedule</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_receive.php">
                            <i style="color: white" class="fas fa-user-check"></i>
                            <p class="user_side_bar_bg">Money Receive</p>
                        </a>
                    </li>
                    <li>
                        <a href="hire_history.php">

                            <i style="color: white" class="fas fa-h-square"></i>
                            <p class="user_side_bar_bg">Hire History</p>
                        </a>
                    </li>

                    <li>
                        <a href="add_admin.php">
                            <i style="color: white" class="fas fa-user-cog"></i>
                            <p class="user_side_bar_bg">Add Admin</p>
                        </a>
                    </li>
                    <li>
                        <a href="trash_list.php">
                            <i style="color: white" class="nav-icon fas fa-trash"></i>
                            <p class="user_side_bar_bg"> Trash List</p>
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
                            <?php
                            $data=$dataManipulation->adminProfile($email);
                            $image=$data->image;
                            if($image){
                                ?>
                                <li class="nav-item">
                                    <img src="<?php echo $image?>" width="60px" height="45px" style="border: 1px solid; border-color: #7c151f; border-radius: 50%">
                                </li>
                                <?php
                            }else{
                                ?>
                                <li class="nav-item">
                                    <img src="" class="avatar" >
                                </li>
                                <?php
                            }
                            ?>

                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='my_profile.php'>
                                    <?php echo $data->email?>
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
                if(isset($_GET['engineer_id'])){
                    $egineerData =$dataManipulation->showEngineerProfileBYid($_GET['engineer_id']);
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
                        $approved =$egineerData->approved;
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

                <div class="row" style="padding-top: 10px; ">

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
                                <h6 style="margin-left: 15px; color: #2b2b2b"><?php echo $category?></h6>
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
                                    <p style="padding:  10px;font-size: 20px; color: red">Profile is Not Complete</p>
                                    <?php
                                }
                                ?>

                                <hr>
                                  <?php
                                  if($approved=='yes'){
                                      ?>
                                      <p style="color: #28a745;margin: 5px;font-size: 25px">Verified</p>
                                      <?php
                                  }else{
                                     ?>
                                      <a href="../dataprocess/admin_data_process.php?confirm_engineer_id=<?php echo $egineerData->id?>"  class="btn bg-success fancy" data-type="iframe" style="margin-left: 15px" type="submit" class="btn btn-primary"  name="change_profile" value="Confirm"><i class="fas fa-check-circle"></i> Confirm</a>
                                      <?php
                                  }
                                  ?>




                            </div>
                        </div>
                    </form>

                    <div class="col-md-8" style="padding-left: 0px; padding-top: 20px">
                        <?php

                        if(isset($_SESSION['ConfirmMeg'])){
                            echo $_SESSION['ConfirmMeg'];
                            unset($_SESSION['ConfirmMeg']);
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
