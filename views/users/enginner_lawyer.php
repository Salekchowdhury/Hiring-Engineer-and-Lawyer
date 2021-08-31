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
                    <li class="active">
                        <a href="enginner_lawyer.php">
                            <i class="fas fa-user-graduate"></i>
                            <p >Engineer & Lawyer</p>
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
                <div class="col-md-12">

                    <div style="height: 96%" class="card ">
                        <div style="background-color: #23349a" class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#Engineer" data-toggle="tab" style="color: white">Engineer</a></li>
                                <li class="nav-item"><a class="nav-link " href="#Lawyer" data-toggle="tab" style="color: white">Lawyer</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div style="" class="tab-pane active" id="Engineer">
                                    <div class="content">
                                        <div class="col-md-12">

                                            <div style="height: 96%" class="card ">

                                                <div class="card-body">
                                                    <div class="tab-content">

                                                        <div style="border-radius: 15px; padding: 5px; border: 2px solid; border-color: #23349a; box-shadow: 5px 10px 10px 2px #3db592" class="tab-pane active" id="Engineer">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card card-plain">
                                                                            <div class="card-header">
                                                                                <h4 class="card-title">ENGINEERS</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <?php
                                                                                if(isset($_SESSION['deleteMsg'])){
                                                                                    echo $_SESSION['deleteMsg'];
                                                                                    unset($_SESSION['deleteMsg']);
                                                                                }
                                                                                ?>
                                                                                <div class="scroll-content" style="height: 600px;">
                                                                                    <table class="table" id="nabil">
                                                                                        <thead  style="color: white; background-color: #23349a" class=" text-primary">
                                                                                        <th>
                                                                                         Image
                                                                                        </th>
                                                                                        <th>
                                                                                            Name
                                                                                        </th>
                                                                                        <th>
                                                                                            Mobile

                                                                                        </th>

                                                                                        <th>
                                                                                            Category
                                                                                        </th>


                                                                                        <th style="text-align: center">
                                                                                            Action
                                                                                        </th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <?php
                                                                                        $enginnerData =$dataManipulation->showAllEngineer();
                                                                                        $s=1;
                                                                                        if($enginnerData){
                                                                                            foreach ($enginnerData as $list){

                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <img style="padding: 3px; border: solid 1px; border-color: #23349a; border-radius: 50%" src="<?php echo $list->image?>" width="140px" height="140px">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $list->fullname?>
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        <?php echo $list->pnumber?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $list->category?>
                                                                                                    </td>



                                                                                                    <td class="text-center">
                                                                                                        <a class="btn bg-success fancy" data-type="iframe" href="email_form.php?engineer_id=<?php echo $list->id?>"><i class="fa fa-mail-bulk"></i> Email</a>
                                                                                                        <a href="engineer_profile.php?engineer_id=<?php echo $list->id?>" class="btn bg-primary fancy" data-type="iframe"  style="padding-right: 29px;"><i class="fa fa-street-view"></i> View</a>

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







                                                            <!--    <div class="row">
                                                                    <div class="col-3">

                                                                        <img style="padding: 3px; border: solid 1px; border-color: #23349a; border-radius: 50%" src="../../contents/images/male5.jpeg" width="200px" height="185px">
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <h5 style="font-weight: 600">Name: <strong style="color: #23349a"> Tanmoy Koron</strong></h5>
                                                                        <h5 style="font-weight: 600">Email: <strong style="color: #23349a">Tanmoykoron@gmail.com</strong></h5>
                                                                        <h5 style="font-weight: 600">Mobile: <strong style="color: #23349a">01747859641</strong></h5>
                                                                        <h5 style="font-weight: 600">Address: <strong style="color: #23349a"> Tiger Pass,Chittagong</strong></h5>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <a class="btn bg-success fancy" data-type="iframe" href="email_form.php"><i class="fa fa-mail-bulk"></i> Email</a>
                                                                        <a class="btn bg-primary fancy" data-type="iframe" href="engineer_profile.php" style="padding-right: 29px;"><i class="fa fa-street-view"></i> View</a>


                                                                    </div>

                                                                </div>-->
                                                        </div>


                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <br>
                                        <hr>
                                    </div>




                                </div>
                                <div  class="tab-pane " id="Lawyer">

                                    <div class="content">
                                        <div class="col-md-12">

                                            <div style="height: 100%" class="card ">

                                                <div class="card-body">
                                                    <div class="tab-content">

                                                        <div style="border-radius: 15px; padding: 5px; border: 2px solid; border-color: #23349a; box-shadow: 5px 10px 10px 2px #3db592" class="tab-pane active" id="Engineer">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card card-plain">
                                                                            <div class="card-header">
                                                                                <h4 class="card-title">LAWYERS</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <?php
                                                                                if(isset($_SESSION['deleteMsg'])){
                                                                                    echo $_SESSION['deleteMsg'];
                                                                                    unset($_SESSION['deleteMsg']);
                                                                                }
                                                                                ?>
                                                                                <div class="scroll-content" style="height: 600px;">
                                                                                    <table class="table" id="nabil1">
                                                                                        <thead  style="color: white; background-color: #23349a" class=" text-primary">
                                                                                        <th>
                                                                                            Image
                                                                                        </th>
                                                                                        <th>
                                                                                            Name
                                                                                        </th>
                                                                                        <th>
                                                                                            Mobile

                                                                                        </th>

                                                                                        <th>
                                                                                            Category
                                                                                        </th>


                                                                                        <th style="text-align: center">
                                                                                            Action
                                                                                        </th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <?php
                                                                                        $enginnerData =$dataManipulation->showAllLawyer();
                                                                                        $s=1;
                                                                                        if($enginnerData){
                                                                                            foreach ($enginnerData as $list){

                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <img style="padding: 3px; border: solid 1px; border-color: #23349a; border-radius: 50%" src="<?php echo $list->image?>" width="140px" height="140px">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $list->fullname?>
                                                                                                    </td>

                                                                                                    <td>
                                                                                                        <?php echo $list->pnumber?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <?php echo $list->category?>
                                                                                                    </td>



                                                                                                    <td class="text-center">
                                                                                                        <a class="btn bg-success fancy" data-type="iframe" href="email_form.php?engineer_id=<?php echo $list->id?>"><i class="fa fa-mail-bulk"></i> Email</a>
                                                                                                        <a href="engineer_profile.php?engineer_id=<?php echo $list->id?>" class="btn bg-primary fancy" data-type="iframe"  style="padding-right: 29px;"><i class="fa fa-street-view"></i> View</a>

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







                                                            <!--    <div class="row">
                                                                    <div class="col-3">

                                                                        <img style="padding: 3px; border: solid 1px; border-color: #23349a; border-radius: 50%" src="../../contents/images/male5.jpeg" width="200px" height="185px">
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <h5 style="font-weight: 600">Name: <strong style="color: #23349a"> Tanmoy Koron</strong></h5>
                                                                        <h5 style="font-weight: 600">Email: <strong style="color: #23349a">Tanmoykoron@gmail.com</strong></h5>
                                                                        <h5 style="font-weight: 600">Mobile: <strong style="color: #23349a">01747859641</strong></h5>
                                                                        <h5 style="font-weight: 600">Address: <strong style="color: #23349a"> Tiger Pass,Chittagong</strong></h5>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <a class="btn bg-success fancy" data-type="iframe" href="email_form.php"><i class="fa fa-mail-bulk"></i> Email</a>
                                                                        <a class="btn bg-primary fancy" data-type="iframe" href="engineer_profile.php" style="padding-right: 29px;"><i class="fa fa-street-view"></i> View</a>


                                                                    </div>

                                                                </div>-->
                                                        </div>


                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <br>
                                        <hr>
                                    </div>


                                </div>

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <br>
                <hr>
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


