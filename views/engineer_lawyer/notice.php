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
if (isset($_SESSION["id"])&& $_SESSION["email"]) {
    $email = $_SESSION["email"];
    $id = $_SESSION["id"];
    $data = $dataManipulation->viewEnginnerLawyer($id);
    $type =$data->type;
    ?>
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a class="simple-text logo-mini">
                    <div class="logo-image-small">
                    </div>
                </a>
                <a style="color: #ce0000;" class="simple-text logo-normal">
                    <?php echo $data->fullname?>
                </a>
            </div>
            <div class="sidebar-wrapper" style="background-color: rgba(19,77,79,0.96); position: fixed">
                <ul class="nav">
                    <?php
                    $currentDate=date("Y/m/d");

                    $checkPaymentDate=$dataManipulation->showPermissionDateById($id);
                    $paymentDate=$checkPaymentDate->date;

                    $findDuration=$dataManipulation->showDuration($paymentDate,$id);

                    $duration=$findDuration->duration;
                    $approval=$findDuration->approve;

                    $checkPermission =$dataManipulation->checkPaymentDate($currentDate,$paymentDate);
                    $day=$checkPermission->day;
                    ?>

                    <?php
                    if($duration>=$day && $approval=="yes" ){
                        ?>
                        <li >
                            <a href="profile.php">
                                <i style="color: white" class="nc-icon nc-single-02"></i>
                                <p class="user_side_bar_bg">Profile</p>

                            </a>
                        </li>
                        <?php
                    }else{
                        ?>

                        <li>
                            <a href="payment.php">

                                <i style="color: white" class="fas fa-money-bill-alt"></i>
                                <p class="user_side_bar_bg">Payment</p>

                            </a>
                        </li>
                        <?php
                    }
                    ?>


                    <?php
                    if($duration>=$day && $approval=="yes" ){
                        ?>
                        <li>
                            <a href="post.php">

                                <i style="color: white" class="fas fa-paste"></i>
                                <p class="user_side_bar_bg">Post</p>

                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($duration>=$day && $approval=="yes"){
                        ?>

                        <li class="active">
                            <a href="notice.php">
                                <i  class="fas fa-exclamation-triangle"></i>
                                <p class="user_side_bar_bg">Notice</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($duration>=$day && $approval=="yes" ){
                        ?>
                        <li>
                            <a href="hire_request.php">
                                <i style="color: white" class="fab fa-hire-a-helper"></i>
                                <p class="user_side_bar_bg">Hire Request</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($duration>=$day && $approval=="yes" ){
                        ?>
                        <li>
                            <a href="message.php">
                                <i style="color: white" class="nc-icon nc-paper"></i>
                                <p class="user_side_bar_bg">Message</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($type=="Engineer"){

                        if($duration>=$day && $approval=="yes"){
                            ?>
                            <li>
                                <a href="add_project.php">
                                    <i style="color: white" class="fas fa-briefcase"></i>
                                    <p class="user_side_bar_bg">Add Project</p>
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                        <?php
                    }
                    if($duration>=$day && $approval=="yes"){
                        ?>
                        <li>
                            <a href="add_client.php">
                                <i style="color: white" class="fas fa-user-plus"></i>
                                <p class="user_side_bar_bg">Add Client</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($type=="Lawyer"){
                    if($duration>=$day && $approval=="yes"){
                        ?>
                        <li>
                            <a href="add_case.php">
                                <i style="color: white" class="far fa-calendar-plus"></i>
                                <p class="user_side_bar_bg">Add Case</p>
                            </a>
                        </li>
                        <?php
                        ?>
                        <li>
                            <a href="case_details.php">
                                <i style="color: white" class="fas fa-info-circle"></i>
                                <p class="user_side_bar_bg">Case Details</p>
                            </a>
                        </li>
                        <?php
                    }
                    }
                    ?>

                <?php



                    /*         if($duration>=$day && $approval=="yes"){
                                 */?><!--
                            <li>
                                <a href="case_details.php">
                                    <i style="color: white" class="fas fa-info-circle"></i>
                                    <p class="user_side_bar_bg">Case Details</p>
                                </a>
                            </li>
                            --><?php
                    /*                        }
                                            */?>




                    <li>
                        <a href="contact_us.php">
                            <i style="color: white" class="nc-icon nc-badge"></i>
                            <p class="user_side_bar_bg">Contact Us </p>
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
                                <img src="<?php echo $data->image?>" width="60px" height="45px" style="border: 1px solid; border-color: #7c151f; border-radius: 50%">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='profile.php'>
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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-info" >
                                    <div class="card card-warning" style="background-color: rgba(19,77,79,0.96); box-shadow: 5px 10px 10px 2px black">
                                        <div class="card-header">
                                            <marquee> <h4 class="card-title" style="color: white">Notice Section</h4></marquee>
                                        </div>

                                    </div>

                                    <?php
                                    $list = $dataManipulation->showAllnotice();

                                    if($list){
                                        foreach ($list as $lists){
                                            ?>
                                            <div class="row">
                                                <div class="col-8"><b><?php $date = $lists->date; echo  date(' m/d/Y', strtotime($date)); $time = $lists->time; echo"   ". date('h:i:s a' , strtotime($time));?></b></div>

                                                <div class=""> </div>


                                            </div>
                                            <!--<div class="mb-5 mr-5 d-flex justify-content-end">9/5/2020</div>-->
                                            <p style="text-align: justify;margin-bottom: 50px; border-bottom: 5px dashed #0b2e13">
                                                <?php echo $lists->note;?>
                                            </p>
                                            <?php
                                        }}

                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>
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

