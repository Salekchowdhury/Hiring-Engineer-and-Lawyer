<?php
    include_once "../../vendor/autoload.php";
    use App\DataManipulation\DataManipulation;
    $dataManipulation = new DataManipulation;
    use App\Utility\Utility;
    if (!isset($_SESSION)){
    session_start();
    }
    require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION["email"]))
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
                        <li class="active">
                            <a href="my_profile.php">
                                <i  class="nc-icon nc-single-02"></i>
                                <p >My Profile</p>
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
                    <div class="row">
                        <div class="col-md-9" style="padding-top: 15px">
                            <div class="card card-user" style="background-color: currentColor; ">
                                <div class="card-header">
                                    <h5 class="card-title" style="color: white">Edit Profile</h5>

                                    <?php
                                    if (isset($_SESSION["successMsg"])){
                                        echo $_SESSION["successMsg"];
                                        unset($_SESSION["successMsg"]);
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                              <?php
                                              $data = $dataManipulation->showAdminProfile($email);
                                              ?>
                                        <form action="../dataprocess/process.php" method="post">
                                            <div class="row">
                                                <div class="col-md-5 pr-1">
                                                    <div class="form-group">
                                                        <label>Company (disabled)</label>
                                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Hire Engineer and Lawyer System(Admin)">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="pass" placeholder="Password" value="<?php echo $data->pass?>">
                                                        <input type="hidden"  name="id" value="<?php echo $data->id?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data->email?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" name="fname" value="<?php echo $data->fname?>" placeholder="First Name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="address" value="<?php echo $data->address?>" placeholder="Home Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city" value="<?php echo $data->city?>" placeholder="City">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 pl-1">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="number" class="form-control" name="pnumber" value="<?php echo $data->pnumber?>" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                    <button type="submit" name="update_profile" class="btn btn-success btn-round">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="border: 2px dashed royalblue; margin-top: 15px;border-radius: 20px; height:600px">
                            <?php

                            ?>
                            <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $data->image?>" alt="Avatar" class="m-4 avatar mb-2">
                            <form action="../../views/dataprocess/admin_data_process.php" method="post" enctype="multipart/form-data" >
                                <input type = 'hidden' name="email"  value="<?php echo $data->email?>">
                                <input required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                <input type="submit" class="btn btn-primary w-100 mb-2"  name="AdminImageUpload" value="Upload"style="padding-top: 5px;margin-top: 80px;" >


                            </form>
                            <h5><?php echo $data->fname?></h5>
                            <hr>
                            <h5><?php echo $data->email?></h5>
                            <hr>
                            <h5><?php echo  $data->pnumber?></h5>
                            <hr>
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
    else{
        Utility::redirect("../login.php");
    }
?>
