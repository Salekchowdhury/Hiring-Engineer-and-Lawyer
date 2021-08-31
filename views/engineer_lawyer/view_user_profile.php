<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
$reg = new Registration();
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
                                <li class="">
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






                            <li>
                                <a href="contact_us.php">
                                    <i style="color: white" class="nc-icon nc-badge"></i>
                                    <p class="user_side_bar_bg">Contact Us </p>
                                </a>
                            </li>
                        </ul>
                    </div>
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
                    <?php
                    if(isset($_GET['user_id'])){
                        $user_id = $_GET['user_id'];
                        $userData =$dataManipulation->showUserDataByid($user_id);
                    }


                    ?>
                    <div class="row">
                        <form  role="form " action="../../views/dataprocess/user_data_process.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="col-sm-4" style="margin: 20px">


                                <div style="height: 300px; width: 300px; border: 1px solid; border-color: #a71d2a; border-radius: 25px; box-shadow: 3px 3px 8px #0F0F0F , -3px -3px 8px black;">
                                    <?php
                                    if($userData->image){
                                        ?>
                                        <img style="margin: 10px 10px 10px 40px; border-color: #ff5c0e; border: dotted 2px;  border-radius: 50%" src="<?php echo $userData->image?> " width="200px" height="170" alt="Avatar" class="avatar">

                                        <?php
                                    }else{
                                        ?>
                                        <img style="margin: 10px 10px 10px 40px; border-color: #ff5c0e; border: dotted 2px;  border-radius: 50%" src="../../contents/images/profile_icon.png " width="200px" height="170" alt="Avatar" class="avatar">

                                        <?php
                                    }
                                    ?>
                                    <h4 style="margin-left: 15px; padding-bottom: 5px;color: #28a745"><?php echo $userData->name?></h4>
                                    <hr>

                                </div>
                            </div>
                        </form>

                        <div class="col-md-8" style="padding-left: 0px; padding-top: 20px">
                            <div class="card card-user">
                                <div class="card-header">

                                    <?php
                                    if (isset($_SESSION["UpdateMsg"])) {
                                        echo $_SESSION["UpdateMsg"];
                                        unset($_SESSION["UpdateMsg"]);
                                    }
                                    if($userData){

                                        $email =$userData->email;
                                        $name =$userData->name;
                                        if($userData->gender){
                                            $gender =$userData->gender;
                                        }else{
                                            $gender ="";
                                        }

                                        if($userData->age){
                                            $age =$userData->age;
                                        }else{
                                            $age ="";
                                        }
                                        if($userData->address){
                                            $address  =$userData->address;
                                        }else{
                                            $address ="";
                                        }
                                        if($userData->phone){
                                            $phone =$userData->phone;
                                        }else{
                                            $phone ="";
                                        }
                                        $pass =$userData->pass;
                                    }
                                    ?>

                                </div>
                                <div class="card-body">
                                    <form action="../dataprocess/user_data_process.php" method="post">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input disabled type="text"  class="form-control" name="name" value="<?php echo $name?>" >
                                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select disabled name="gender" class="form-control">
                                                        <option value="<?php echo $gender?>"><?php echo $gender?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input disabled type="number" name="age"  class="form-control" value="<?php echo $age?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group" style="padding-left: 12px;">
                                                    <label>Phone Number</label>
                                                    <input disabled  type="number" name="phone"  class="form-control" value="<?php echo $phone?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8 pl-1">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input disabled type="text"  class="form-control" name="address" value="<?php echo $address?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input disabled type="email"  class="form-control" name="email" value="<?php echo $email?>" >
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_SESSION["SendMessage"])){
                        echo $_SESSION["SendMessage"];
                        unset($_SESSION["SendMessage"]);
                    }

                    ?>
                    <div class="col-12" style="padding-top: 55px;">

                        <div style="border-radius: 15px; border: 2px solid;  background-color: white;   margin-top: -20px;  border-color: #28a745; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                            <form class="form-horizontal" action="../dataprocess/email.php" method="post">
                                <input class="" name="email" type="hidden" value="<?php echo $email?>" >
                                <input class="" name="name" type="hidden" value="<?php echo $name?>" >

                                <div style="padding: 10px" class="form-group row">
                                    <div class="col-6">
                                        <label  class="col-sm-3 "><strong  >Name:</strong></label>
                                        <div class="col-sm-10">
                                            <input  disabled class="form-control" name="name" value="<?php echo $data->fullname?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-4 "><strong  >Email:</strong></label>
                                        <div class="col-sm-10">
                                            <input  disabled=""  class="form-control" name="email" value="<?php echo $data->email?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-4 "><strong  >Message Subect:</strong></label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" name="subject" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-3 "><strong  >Your Mesaage:</strong></label>
                                        <div class="col-sm-10">
                                            <textarea required class="form-control " rows="10" name="mesaage" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-outline-success btn-round" name="send_message_to_user" >Send Message</button>
                                    </div>
                                </div>
                            </form>
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
    } else {
        Utility::redirect("../login.php");
    }

?>
