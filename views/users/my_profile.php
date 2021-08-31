<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email']))
{
   $id= $_SESSION["id"];
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
                    <li class="active">
                        <a href="my_profile.php">
                            <i class="far fa-user"></i>
                            <p >My Profile</p>
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
                $userData =$dataManipulation->showUserDataByid($id);

                ?>
                    <div class="row">
                        <form  role="form " action="../../views/dataprocess/user_data_process.php" method="post" enctype="multipart/form-data">

                               <input type="hidden" name="id" value="<?php echo $id?>">
                            <div class="col-sm-4" style="margin: 20px">


                                <div style="height: 500px; width: 300px; border: 1px solid; border-color: #a71d2a; border-radius: 25px; box-shadow: 3px 3px 8px #0F0F0F , -3px -3px 8px black;">
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
                                    <h4 style="margin-left: 15px; padding-bottom: 5px"><?php echo $userData->name?></h4>
                                    <hr>
                                    <strong style="margin-left: 15px; font-weight:800 "><?php echo $userData->email?></strong>
                                    <hr>
                                    <input style="margin-left: 15px" required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg"><span style="padding-left: 10px">
                                         <br>
                                         <br>
                                        <input style="margin-left: 15px" type="submit" class="btn btn-primary"  name="upload_photo" value="upload"></span>


                                </div>
                            </div>
                        </form>

                    <div class="col-md-8" style="padding-left: 0px; padding-top: 20px">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">My Profile</h5>
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
                                                <input type="text"  class="form-control" name="name" value="<?php echo $name?>" >
                                                <input type="hidden" name="id" value="<?php echo $id?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select  name="gender" class="form-control">
                                                    <option value="<?php echo $gender?>"><?php echo $gender?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" name="age"  class="form-control" value="<?php echo $age?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group" style="padding-left: 12px;">
                                                <label>Phone Number</label>
                                                <input type="number" name="phone"  class="form-control" value="<?php echo $phone?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text"  class="form-control" name="address" value="<?php echo $address?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password"  class="form-control" name="pass" value="<?php echo $pass?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email"  class="form-control" name="email" value="<?php echo $email?>" >
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <input type="submit"  class="btn btn-success" name="update_profile" value="Update" >
                                        </div>
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
