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
        //$type ="Enginner";
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
                            <li class="active">
                                <a href="profile.php">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>Profile</p>

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
                            <div class="card card-user"  style="box-shadow: 5px 10px 10px 2px black; border-color: #a71d2a; border: 3px solid">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Profile</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["insertMsg"])) {
                                        echo $_SESSION["insertMsg"];
                                        unset($_SESSION["insertMsg"]);
                                    }

                                    //$id = $_SESSION["id"];

                                    //var_dump($data);
                                    $userType = $data->type;
                                    if ($data) {
                                        ?>
                                        <?php
                                        if($userType=="Lawyer"){
                                            ?>
                                            <form action="../dataprocess/engineer_lawyer_data_process.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                  <input  name="id" type="hidden" value="<?php echo $id; ?>"
                                              </div>

                                                <div class="row">
                                                    <div class="col-6" style="padding-left: 20px">
                                                        <h4>NID Card</h4>
                                                        <?php
                                                        if($data->nid_image){
                                                            ?>
                                                            <img src="<?php echo $data->nid_image?> " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img src="../../contents/images/nid_1.jpg " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }
                                                        ?>

                                                        <input required type="file" name="nidPhoto" >

                                                    </div>
                                                    <div class="col-6" style="padding-left: 20px">
                                                        <h4>Licence Card</h4>
                                                        <?php
                                                        if($data->nid_image){
                                                            ?>
                                                            <img src="<?php echo $data->document_image?> " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img src="../../contents/images/licence.jpg " width="400" height="200" alt="Avatar">
                                                            <?php
                                                        }
                                                        ?>

                                                        <input required type="file" name="documentPhoto">
                                                        <input type="submit" class="btn btn-primary add_engineer_verify_image" name="add_engineer_verify_image" value="upload">
                                                    </div>

                                                </div>

                                            </form>
                                            <hr style="border: dashed 3px; width: 100%">
                                            <?php
                                        }else{
                                            ?>

                                            <form action="../dataprocess/engineer_lawyer_data_process.php" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <input  name="id" type="hidden" value="<?php echo $id; ?>"
                                                </div>

                                                <div class="row">
                                                    <div class="col-6" style="padding-left: 20px">
                                                        <h4>NID Card</h4>
                                                        <?php
                                                        if($data->nid_image){
                                                            ?>
                                                            <img src="<?php echo $data->nid_image?> " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img src="../../contents/images/nid_1.jpg " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }
                                                        ?>

                                                        <input required type="file" name="nidPhoto" >

                                                    </div>
                                                    <div class="col-6" style="padding-left: 20px">
                                                        <h4>Certificate</h4>
                                                        <?php
                                                        if($data->nid_image){
                                                            ?>
                                                            <img src="<?php echo $data->document_image?> " width="400" height="200" alt="Avatar" >
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <img src="../../contents/images/va-certificate.jpg " width="400" height="200" alt="Avatar">
                                                            <?php
                                                        }
                                                        ?>

                                                        <input required type="file" name="documentPhoto">
                                                        <input type="submit" class="btn btn-primary add_engineer_verify_image" name="add_engineer_verify_image" value="upload">
                                                    </div>

                                                </div>

                                            </form>

                                            <?php
                                        }
                                        ?>


                                    <?php
                                    $data = $dataManipulation->viewEnginnerLawyer($id);
                                    if($data){
                                        $email = $data->email;
                                        $fullname = $data->fullname;
                                        $age= $data->age;
                                        $pass= $data->pass;
                                        $address= $data->address;
                                        $category= $data->category;
                                        $experience= $data->experience;
                                        $office= $data->office;
                                        $university= $data->university;
                                        $city= $data->city;
                                        $pnumber= $data->pnumber;
                                        $image= $data->image;
                                    }else{
                                        $email = "";
                                        $fullname = "";
                                        $age= "";
                                        $pass= "";
                                        $address= "";
                                        $category= "";
                                        $experience= "";
                                        $office= "";
                                        $university= "";
                                        $city= "";
                                        $pnumber= "";
                                        $image= "";
                                    }
                                    ?>
                                        <form action="../dataprocess/engineer_lawyer_data_process.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" class="form-control"
                                                   value="<?php echo $data->id ?>">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="card" style="width: 18rem;">
                                                        <img style="padding-left: 20px" src="<?php echo $image?>" height = "200" width="250" alt="Please Upload your Profile Image">
                                                        <div class="card-body">
                                                            <h6 class="card-title"><?php echo $fullname?></h6>
                                                            <hr>
                                                            <p class="card-text"><?php echo $email?></p>
                                                            <hr>
                                                            <p class="card-text"><?php echo $pnumber?></p>
                                                            <hr>
                                                            <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                                                            <button type="submit" name="upload_photo" class="btn btn-primary">upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>

                                                <div class="col-sm-8" style="padding-right: 20px">
                                                    <form action="../dataprocess/engineer_lawyer_data_process.php" method="post">
                                                    <div class="row">

                                                        <div class="col-md-7 pr-1">
                                                            <div class="form-group">
                                                                <label>Company Name</label>
                                                                <input type="text" class="form-control" disabled=""
                                                                       placeholder="Company"
                                                                       value="Hire Engineer and Lawyer System">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 pl-1">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" class="form-control" name="email"
                                                                       placeholder="Email" value="<?php echo $email ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>Fullname</label>
                                                                <input type="text" class="form-control" name="fullname"
                                                                       value="<?php echo $fullname ?>"
                                                                       placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 px-1">
                                                            <div class="form-group">
                                                                <label>Age</label>

                                                                <input type="text" placeholder="Age" class="form-control" name="age" value="<?php echo $age ?>">
                                                                <input type="hidden"   name="id" value="<?php echo $id?>">

                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 px-1">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="pass"
                                                                       placeholder="Password" value="<?php echo $pass ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="address"
                                                                       value="<?php echo $address ?>"
                                                                       placeholder="Home Address">
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if($userType=='Engineer'){
                                                            ?>
                                                            <div class="col-md-5">
                                                                <label >Category </label><span style="color: #1D00AF"><?php echo  " ".$category ?></span>

                                                                    <select  name="category" class="form-control">
                                                                        <option value="<?php echo  " ".$category ?>"> <?php echo  " ".$category ?></option>
                                                                        <option value="Software Engineer">Software Engineer</option>
                                                                        <option value="Environmental Engineer">Environmental Engineer</option>
                                                                        <option value="Electrical Engineer">Electrical Engineer</option>
                                                                        <option value="Mechanical Engineer">Mechanical Engineer</option>
                                                                        <option value="Chemical Engineer">Chemical Engineer</option>
                                                                        <option value="System Engineer">System Engineer</option>
                                                                        <option value="Texttile Engineer">Texttile Engineer</option>
                                                                        <option value="Civil Engineer">Civil Engineer</option>
                                                                    </select>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            ?>

                                                            <div class="col-md-5">
                                                                <label >Category </label><span style="color: #1D00AF"><?php echo  " ".$category ?></span>

                                                                <select name="category" class="form-control">
                                                                    <option value="<?php echo  " ".$category ?>"><?php echo  " ".$category ?></option>
                                                                    <option value="Civil Matters">Civil Matters</option>
                                                                    <option value="Cyber Crime">Cyber Crime</option>
                                                                    <option value="Criminal Matters">Criminal Matters</option>
                                                                    <option value="Divorce and Child Custody">Divorce and Child Custody</option>
                                                                    <option value="Employment Issue">Employment Issue</option>
                                                                </select>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input type="text" class="form-control" name="experience"
                                                                       value="<?php echo $experience ?>"
                                                                       placeholder="Experience">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 px-1">
                                                            <div class="form-group">
                                                                <label>Office</label>
                                                                <input type="text" class="form-control" name="office"
                                                                       placeholder="Office" value="<?php echo $office ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 pr-1">
                                                            <div class="form-group">
                                                                <label>University</label>
                                                                <input type="text" class="form-control" name="university"
                                                                       value="<?php echo $university ?>" placeholder="University">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pr-1">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control" name="city"
                                                                       value="<?php echo $city ?>" placeholder="City">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <input type="number" class="form-control" name="pnumber"
                                                                       value="<?php echo $pnumber ?>"
                                                                       placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="update mr-auto mr-3">
                                                          <?php
                                                          if (isset($_SESSION["UpdateMsg"])) {
                                                              echo $_SESSION["UpdateMsg"];
                                                              unset($_SESSION["UpdateMsg"]);
                                                          }
                                                          ?>
                                                        </div>
                                                        <div class="update ml-auto mr-3">
                                                            <button type="submit" name="update_engineer_lawyer_profile" class="btn btn-primary">Update Profile
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <?php
                                    }
                                    ?>
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
    } else {
        Utility::redirect("../login.php");
    }

?>
