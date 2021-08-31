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
if (isset($_SESSION['email'])){
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
                    <li class="active">
                        <a href="manage_account.php">
                            <i  class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p >Manage Account</p>
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
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" >
                <div class="container-fluid" >
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
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="card-title">Manage Account</h4>
                            </div>
                            <?php
                            if (isset($_SESSION["success"])){
                                echo $_SESSION["success"];
                                unset($_SESSION["success"]);
                            }
                            ?>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color:  #4f0547">
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>

                                        <th>
                                            Gmail
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Image
                                        </th>

                                        <th>
                                          Action
                                        </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data=$dataManipulation->showAllapproveAccount();
                                            $s=1;
                                            if($data){
                                                 foreach ($data as $list){
                                                        ?>
                                                     <tr>
                                                         <td>
                                                             <?php echo $s?>
                                                         </td>
                                                         <td>
                                                             <?php echo $list->fullname?>
                                                         </td>

                                                         <td>
                                                             <?php echo $list->pnumber?>
                                                         </td>

                                                         <td>
                                                             <?php echo $list->email?>
                                                         </td>
                                                         <td>
                                                             <?php echo $list->type?>
                                                         </td>

                                                         <td>
                                                             <img src=" <?php echo $list->image?>" width="80" height="90">
                                                         </td>
                                                         <td class="text-center">
                                                             <?php
                                                             if( $list->type=='Engineer'){
                                                                 ?>
                                                                 <a class="btn bg-primary fancy" data-type="iframe" href="engineer_profile.php?engineer_id=<?php echo $list->id?>"><i class="fa fa-eye"></i></a>
                                                                 <a class="btn bg-danger fancy" data-type="iframe" href="../dataprocess/admin_data_process.php?moveToTrahAccount=<?php echo $list->id?>"><i class="fa fa-trash"></i></a>
                                                                 <?php
                                                             }else{
                                                                 ?>
                                                                 <a class="btn bg-primary fancy" data-type="iframe" href="lawyer_profile.php?Lawyer_id=<?php echo $list->id?>"><i class="fa fa-eye"></i></a>
                                                                 <a class="btn bg-danger fancy" data-type="iframe" href="../dataprocess/admin_data_process.php?moveToTrahAccount=<?php echo $list->id?>"><i class="fa fa-trash"></i></a>
                                                                 <?php
                                                             }
                                                             ?>



                                                         </td>
                                                     </tr>
                                                     <?php
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

