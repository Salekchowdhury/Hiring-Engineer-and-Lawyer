<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
use App\Utility\Utility;
$dataManipulation = new DataManipulation();
if (!isset($_SESSION)){
    session_start();
}
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
                            <li >
                                <a href="profile.php">
                                    <i  style="color: white" class="nc-icon nc-single-02"></i>
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
                            <li class="active">
                                <a href="add_client.php">
                                    <i class="fas fa-user-plus"></i>
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
                        <div class="col-md-12 wow slideInLeft" data-wow-duration= "2s">
                            <div class="card card-plain">


                                <div style="border-radius: 15px;    margin-top: 30px; ; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                                    <form class="form-horizontal" action="../dataprocess/engineer_lawyer_data_process.php" method="post" enctype="multipart/form-data">
                                        <input class="user_id" name="user_id" type="hidden" value="<?php echo $id?>" >

                                        <div style="padding: 10px" class="form-group row">
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Name:</strong></label>
                                                <div class="col-sm-10">
                                                    <input required class="form-control" name="name" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Address:</strong></label>
                                                <div class="col-sm-10">
                                                    <input required class="form-control" name="address" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 90px">Gender:</strong></label>
                                                <div class="col-sm-10">
                                                    <select required name="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong  style="padding-right: 120px">Age:</strong></label>
                                                <div class="col-sm-10">
                                                    <input required class="form-control" name="age" value="">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong style="padding-right: 90px"> Phone:</strong></label>
                                                <div class="col-sm-10">
                                                    <input required class="form-control" name="phone" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong style="padding-right: 50px">Date of Joining</strong></label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control datepicker" name="join_date" placeholder="Joining Date" >

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col-sm-3 col-form-label"><strong style="padding-right: 110px"> Note:</strong></label>
                                                <div class="col-sm-10">
                                                    <textarea required class="form-control" name="note" value=""></textarea>
                                                </div>
                                            </div>
                                            <div style="padding: 30px;" class="col-1">
                                                <i class="fas fa-camera fa-3x"></i>
                                                <input  type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <div class="col-6">
                                                <br>
                                                <?php
                                                if (isset($_SESSION["insertMsg"])) {
                                                    echo $_SESSION["insertMsg"];
                                                    unset($_SESSION["insertMsg"]);
                                                }
                                                ?>
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-6">
                                                <button type="submit" class="btn btn-primary" name="add_client" >Add Client</button>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="row wow slideInDown" data-wow-duration= "1s">
                                <div class="card-body">
                                    <h4>All Your Client</h4>
                                    <?php
                                    if (isset($_SESSION["updateMsg"])) {
                                        echo $_SESSION["updateMsg"];
                                        unset($_SESSION["updateMsg"]);
                                    }
                                    if (isset($_SESSION["deleteMsg"])) {
                                        echo $_SESSION["deleteMsg"];
                                        unset($_SESSION["deleteMsg"]);
                                    }
                                    ?>
                                    <div class="scroll-content" style="height: 300px;">
                                        <table id="nabil1" class="table">
                                            <thead class=" text-primary" style="background-color: rgba(19,77,79,0.96)">
                                            <th>
                                                SL
                                            </th>
                                            <th >
                                                Name
                                            </th>

                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Gender
                                            </th>
                                            <th>
                                                Age
                                            </th>
                                            <th style="text-align: center">
                                                Note
                                            </th>
                                            <th>
                                                 Date of Adding
                                            </th>
                                            <th>
                                                image
                                            </th>
                                            <th >
                                                Action
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $data =$dataManipulation->showAllClientByUserId($id);
                                            $s=1;
                                            if($data){
                                                foreach ($data as $list){
                                                    $date=$list->join_date;
                                                    $dateArray = explode("-",$date);

                                                    $dateRevers= array_reverse($dateArray);
                                                    $join_date = implode("-", $dateRevers);

                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $s?>
                                                        </td>
                                                        <td>
                                                            <?php echo $list->name?>

                                                        </td>
                                                        <td>
                                                            <?php echo $list->phone?>

                                                        </td>
                                                        <td >
                                                            <?php echo $list->gender?>

                                                        </td>
                                                        <td>
                                                            <?php echo $list->age?>

                                                        </td>
                                                        <td style="width: 220px">
                                                            <?php echo $list->note?>

                                                        </td>
                                                        <td>
                                                            <?php echo $join_date?>

                                                        </td>
                                                        <td><img src="<?php echo $list->image?>" width="70px" height="80px"></td>

                                                        <td>
                                                            <a href="edit_client.php?edit_client=<?php echo $list->id?>" title="Edit" <i class=" btn btn-success far fa-edit" aria-hidden="true"></i></a>
                                                            <a href="../dataprocess/engineer_lawyer_data_process.php?delete_client=<?php echo $list->id?>" title="Delete" <i class=" btn btn-danger far fa-trash-alt" aria-hidden="true"></i></a>

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
        <script>
            new WOW().init();
        </script>
        <script>
            $(function () {
                $("#nabil").DataTable({
                    "lengthMenu":[ 3,4 ],
                });
                $("#jesin2").DataTable({
                    "lengthMenu":[ 3,4 ],
                });
                $("#jesin3").DataTable({
                    "lengthMenu":[ 3,4 ],
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthMenu":[ 3 ],
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });

                $('#salek').DataTable({
                    "paging": true,
                    "lengthMenu":[ 3 ],
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
        <?php
    }
    else {
        Utility::redirect("../login.php");
    }

?>
