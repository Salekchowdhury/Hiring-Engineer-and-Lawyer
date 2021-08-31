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
                    <li >
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
                    <li class="active">
                        <a href="money_receive.php">
                            <i  class="fas fa-user-check"></i>
                            <p>Money Receive</p>
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
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="card-title">Money Receive</h4>

                                <?php
                                $totalAmount=$dataManipulation->totalPayment();

                                if (isset($_SESSION["SuccessMsg"])){
                                    echo $_SESSION["SuccessMsg"];
                                    unset($_SESSION["SuccessMsg"]);
                                }
                                ?>
                                <div style=" margin-left: 450px;width: 300px; height: 50px; border-color: #1e7e34; border: 3px solid; border-radius: 15px" class="card-title">
                                    <strong style="color: rgba(13,6,8,0.95);padding: 15px; font-size: 30px">BDT <b style="font-size: 27px; color: #1e7e34"> <?php echo $totalAmount->amount?> </b>TK</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 310px;">
                                    <table class="table table-hover">
                                        <thead class=" text-primary" style="background-color:  #4f0547">
                                        <th>
                                            Id
                                        </th>

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                           <th>
                                            Type
                                        </th>

                                        <th>
                                            Transaction
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                           <th>
                                            Duration
                                        </th>

                                         <th>
                                            Action
                                        </th>

                                        </thead>
                                        <tbody>
                                        <?php
                                        $dataManipulation = new DataManipulation();
                                        $s=1;
                                        $data = $dataManipulation->ShowPaymentList();
                                        if ($data){

                                            foreach ($data as $list){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $s?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->name?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->number?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->type?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->transaction?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->Pay_date?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->amount?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->duration?>
                                                    </td>
                                                    <?php
                                                    if($list->approve=="no"){
                                                       ?>
                                                        <td>

                                                            <a class="btn bg-success  btn-outline-danger btn-round fancy" data-type="iframe" href="../dataprocess/admin_data_process.php?confirm_payment_id= <?php echo $list->id?>"><i class="far fa-check-circle"></i> Confirm</a>
                                                        </td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <td>
                                                            <i style="margin-left: 50px" class="fas fa-user-check fa-3x"></i>
                                                        </td>


                                                        <?php
                                                    }
                                                    ?>


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
else{
    Utility::redirect("../login.php");
}
?>

