<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;
$dataManipulation = new DataManipulation();
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
    $type=$data->type;
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
                                <p class="user_side_bar_bg" >Profile</p>

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

                        <li >
                            <a href="notice.php">
                                <i style="color: white" class="fas fa-exclamation-triangle"></i>
                                <p class="user_side_bar_bg">Notice</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($duration>=$day && $approval=="yes" ){
                        ?>
                        <li class="active">
                            <a href="hire_request.php">
                                <i  class="fab fa-hire-a-helper"></i>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="card-title">Hire Request</h4>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: rgba(19,77,79,0.96)">
                                        <th>
                                            SL
                                        </th>

                                        <th>
                                            Client Name
                                        </th>
                                        <th>
                                            Client Email
                                        </th>

                                        <th>
                                            Date
                                        </th>

                                        <th class="text-center">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>
                                          <?php

                                          $data=$dataManipulation->viewHireRequest($type, $id);
                                          //var_dump($data);
                                          $s=1;
                                          if($data){
                                              foreach ($data as $list){
                                                  ?>
                                                  <tr>
                                                      <td>
                                                     <?php echo $s;?>
                                                      </td>
                                                      <td>
                                                          <?php echo $list->user_name?>
                                                      </td>
                                                      <td>
                                                          <?php echo $list->user_email?>
                                                      </td>

                                                      <td>
                                                          <?php echo $list->date?>
                                                      </td>

                                                      <td class="text-center">
                                                          <a href="view_user_profile.php?user_id=<?php echo $list->user_id?>" class="btn bg-warning btn-round btn-secondary "><i style="color: #0b0b0b" class="fa fa-eye"> PROFILE</i></a>
                                                      </td>
                                                  </tr>

                                                  <?php
                                                  $s++;
                                              }
                                          }
                                          ?>


                                        </tbody>
                                    </table>
                                </div>
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

