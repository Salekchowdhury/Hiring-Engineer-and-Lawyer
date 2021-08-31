<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php if (isset($_SESSION['email'])) {
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
                    <li>
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
                    <li>
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

                    <li class="active">
                        <a href="add_admin.php">
                            <i  class="fas fa-user-cog"></i>
                            <p >Add Admin</p>
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
                <div class="row ">
                    <div class="col-md-11 wow slideInDown" style="margin-top: 40px; ">
                        <div class="card card-plain">


                            <div style="border-radius: 15px; background-color: #35977e;border: 2px solid;    margin-top: -20px; border-color: #861234; box-shadow: 5px 10px 10px 2px rgba(33,9,18,0.83)" class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/admin_data_process.php" method="post" enctype="multipart/form-data">


                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 110px;color: white">Name:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="name" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 100px;color: white">Address:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="address" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 120px;color: white">City:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="city" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 105px;color: white">Countyr:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="country" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 110px;color: white">Phone:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="phone" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 110px;color: white">Email:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="email" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-sm-3 col-form-label pading_right"><strong style="padding-right: 90px;color: white">Password:</strong></label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" name="password" value="">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                           <div class="col-6">
                                               <br>
                                               <br>
                                               <br>
                                               <?php

                                               if(isset($_SESSION['insertMsg'])){
                                                   echo $_SESSION['insertMsg'];
                                                   unset($_SESSION['insertMsg']);
                                               }
                                               if(isset($_SESSION['ExitsMsg'])){
                                                   echo $_SESSION['ExitsMsg'];
                                                   unset($_SESSION['ExitsMsg']);
                                               }

                                               ?>
                                        </div>

                                        <div style="padding: 30px;" class="col-1">
                                            <i class="fas fa-camera fa-3x"></i>
                                            <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                        </div>


                                    </div>


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="add_admin" >Add Admin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <section class="content wow slideInLeft" >
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">


                                    <h3>All Admin</h3>
                                    <?php

                                    if(isset($_SESSION['deleteMsg'])){
                                        echo $_SESSION['deleteMsg'];
                                        unset($_SESSION['deleteMsg']);
                                    }
                                    if(isset($_SESSION['notDeleteMsg'])){
                                        echo $_SESSION['notDeleteMsg'];
                                        unset($_SESSION['notDeleteMsg']);
                                    }

                                    ?>

                                    <table id="nabil1" class="table table-bordered table-hover">
                                        <thead style="background-color:  #4f0547">
                                        <tr style="color:white;">
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                         $data =$dataManipulation->showAllAdmin();
                                         $s=1;
                                         if ($data){
                                            foreach ($data as $list){
                                                ?>
                                                <tr>
                                                    <td><?php echo $s?></td>
                                                    <td><?php echo $list->fname?></td>
                                                    <td><?php echo $list->pnumber?></td>
                                                    <td><?php echo $list->email?></td>
                                                    <td><img src="<?php echo $list->image?>" width="70px" height="80px"></td>
                                                    <td>

                                                        <a href="../../views/dataprocess/admin_data_process.php?delete_admin_id=<?php echo $list->id?>" title="View" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>

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
    <script>
        new WOW().init();
    </script>
    <?php
}
else{
    Utility::redirect("../login.php");
}
?>
