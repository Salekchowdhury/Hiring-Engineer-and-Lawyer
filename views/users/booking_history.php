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
                    <li class="active">
                        <a href="booking_history.php">
                            <i class="fas fa-landmark"></i>
                            <p >Booking History</p>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="card-title">History</h4>
                            </div>
                            <div class="card-body">
                                <?php

                                if(isset($_SESSION['deleteMsg'])){
                                    echo $_SESSION['deleteMsg'];
                                    unset($_SESSION['deleteMsg']);
                                }

                                ?>
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table">
                                        <thead style="color: white; background-color: #860569" class=" text-primary">
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                           Name
                                        </th>
                                        <th>
                                             Type
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Email
                                        </th>

                                        <th style="text-align: center">
                                          Action
                                        </th>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $data=$dataManipulation->showBookingHistoryBy( $userData->id);
                                             $s=1;
                                             if($data){
                                                 foreach ($data as $list){
                                                     $date=$list->date;
                                                     $dateArray = explode("-",$date);

                                                     $dateRevers= array_reverse($dateArray);
                                                     $date = implode("-", $dateRevers);
                                                     ?>
                                                     <tr>
                                                         <td>
                                                            <?php echo $s?>
                                                         </td>
                                                         <td>
                                                             <?php echo $list->hired_name?>
                                                         </td>
                                                         <td>
                                                             <?php echo $list->type?>
                                                         </td>
                                                         <td>
                                                             <?php echo $date?>
                                                         </td>
                                                         <td>
                                                             <?php echo $list->hired_email?>
                                                         </td>

                                                         <td class="text-center">
                                                             <a class="btn bg-danger btn-round fancy" data-type="iframe" href="../dataprocess/user_data_process.php?deleteBookingData= <?php echo $list->id?>"><i class="fa fa-trash"></i></a>

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


