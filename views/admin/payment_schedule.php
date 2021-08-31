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
        <div class="sidebar" data-color="white" data-active-color="danger"
             style="background-color: #7c077b !important;">
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
                            <p class="user_side_bar_bg">Manage Account</p>
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
                    <li class="active">
                        <a href="payment_schedule.php">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Payment Schedule</p>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="row " style="padding-top: 50px">
                    <div class="col-md-11 wow slideInDown">
                        <div class="card card-plain">
                            <div style="border-radius: 15px; border: 2px solid;    margin-top: -20px; border-color: #24ff19; box-shadow: 5px 10px 10px 2px black"
                                 class="tab-pane ">
                                <form class="form-horizontal" action="../dataprocess/admin_data_process.php"
                                      method="post">


                                    <div style="padding: 10px" class="form-group row">
                                        <div class="col-6">
                                            <label class="col-sm-3 col-form-label"><strong style="padding-right: 90px">Amount
                                                    :</strong></label>
                                            <div class="col-sm-10">
                                                <input required class="form-control" name="amount" value="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="col-sm-3 col-form-label"><strong style="padding-right: 90px">Duration:</strong></label>
                                            <div class="col-sm-10">
                                                <select required name="duration" class="form-control">
                                                    <option value="">Select Duration</option>
                                                    <option value="2 Month">2 Month</option>
                                                    <option value="3 Month">3 Month</option>
                                                    <option value="4 Month">4 Month</option>
                                                    <option value="6 Month">6 Month</option>
                                                    <option value="1 year">1 year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class=" update ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary btn-round" name="add_schedule">
                                                Add Schedule
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="card-title">Payment Schedule</h4>
                            </div>
                            <?php
                            if (isset($_SESSION['inserMsg'])) {
                                echo $_SESSION['inserMsg'];
                                unset($_SESSION['inserMsg']);
                            }
                            if (isset($_SESSION['deleteMsg'])) {
                                echo $_SESSION['deleteMsg'];
                                unset($_SESSION['deleteMsg']);
                            }
                            ?>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 310px;">
                                    <table class="table table-hover">
                                        <thead class=" text-primary" style="background-color:  #4f0547">
                                        <th>
                                            SL
                                        </th>

                                        <th>
                                            Duration
                                        </th>

                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                        </thead>
                                        <?php
                                        $data = $dataManipulation->showPaymentSchedule();
                                        $s = 1;
                                        foreach ($data as $list) {
                                            ?>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    <?php echo $s ?>
                                                </td>
                                                <td>
                                                    <?php echo $list->duration ?>
                                                </td>
                                                <td>
                                                    <?php echo $list->amount ?>
                                                </td>

                                                <td>
                                                    <div class="update ml-auto mr-auto">
                                                        <a href="../dataprocess/admin_data_process.php?delete_payment_schedule=<?php echo $list->id?>" name="delete"
                                                           class="btn btn-danger ">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>
                                            <?php
                                            $s++;
                                        }
                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3"
                         style="margin-top: 50px; border-bottom-right-radius: 15px; border-top-left-radius: 15px; height: 350px; box-shadow: 5px 10px 10px 2px black; background-color: rgba(25,246,230,0.05)">
                        <?php
                        $date=date("Y-m-d");
                        $todayAmount=$dataManipulation->todayPayment($date);
                        $totalAmount=$dataManipulation->totalPayment();

                        ?>
                        <br>
                        <br>
                        <h4>Today Pay:<b> <?php echo $todayAmount->amount?> Tk</b></h4>
                        <h4>Total:<b> <?php echo $totalAmount->amount?> Tk</b></h4>
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

