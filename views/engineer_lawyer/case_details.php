<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
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
                                <i style="color: white"  class="nc-icon nc-single-02"></i>
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
                        <li class="active">
                            <a href="add_case.php">
                                <i class="far fa-calendar-plus"></i>
                                <p class="user_side_bar_bg">Add Case</p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

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


                    /*         if($duration>=$day && $approval=="yes"){
                                 */?><!--
                            <li>
                                <a href="case_details.php">
                                    <i style="color: white" class="fas fa-info-circle"></i>
                                    <p class="user_side_bar_bg">Case Details</p>
                                </a>
                            </li>
                            --><?php
                    /*                        }
                                            */?>




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
                        <div class="card card-plain">

                            <div class="card-header">
                                <h4 class="card-title">All Case Details</h4>
                                <?php
                                if (isset($_SESSION["insertMsg"])) {
                                    echo $_SESSION["insertMsg"];
                                    unset($_SESSION["insertMsg"]);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table" id="nabil1">
                                        <thead class=" text-primary" style="background-color: rgba(19,77,79,0.96)">
                                        <th>
                                            SL
                                        </th>
                                        <th>
                                            Case Title
                                        </th>
                                        <th>
                                            Court Name
                                        </th>

                                        <th>
                                            Case No
                                        </th>
                                          <th >
                                           Case Type
                                        </th>
                                          <th >
                                            Party Name
                                        </th>
                                        <th >
                                            Contact No
                                        </th>

                                          <th>
                                            Date
                                        </th>
                                        <th >
                                            Advocate Name
                                        </th>

                                        <th style="text-align: center">
                                            Status
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $data =$dataManipulation->showAllCaseByUserId($id);
                                        $s=1;
                                        if($data){
                                            foreach ($data as $list){
                                                $date=$list->add_date;
                                                $dateArray = explode("-",$date);

                                                $dateRevers= array_reverse($dateArray);
                                                $add_date = implode("-", $dateRevers);

                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $s?>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->title?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->court_name?>

                                                    </td>
                                                    <td >
                                                        <?php echo $list->case_no?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->case_type?>

                                                    </td>
                                                    <td >
                                                        <?php echo $list->party_name?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->phone?>

                                                    </td>

                                                    <td>
                                                        <?php echo $add_date?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->advocate_name?>

                                                    </td>


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

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-plain">

                            <div class="card-header">
                                <h4 class="card-title">Today Case </h4>
                                <?php
                                if (isset($_SESSION["insertMsg"])) {
                                    echo $_SESSION["insertMsg"];
                                    unset($_SESSION["insertMsg"]);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table id="nabil2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr style="color:white;background-color:#344e86;">
                                            <th>
                                                SL
                                            </th>
                                            <th>
                                                Case Title
                                            </th>

                                            <th>
                                                Case No
                                            </th>

                                            <th >
                                                Party Contact
                                            </th>

                                            <th >
                                                Advocate Name
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $todayData=$dataManipulation->showTodayData();
                                        $id=1;
                                        if($todayData){
                                            foreach ($todayData as $list){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $id?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->title?>

                                                    </td>
                                                    <td >
                                                        <?php echo $list->case_no?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->phone?>

                                                    </td>

                                                    <td>
                                                        <?php echo $list->advocate_name?>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $id++;
                                        }
                                        ?>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-plain">

                            <div class="card-header">
                                <h4 class="card-title">Upcoming Case </h4>
                                <?php
                                if (isset($_SESSION["insertMsg"])) {
                                    echo $_SESSION["insertMsg"];
                                    unset($_SESSION["insertMsg"]);
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table id="nabil" class="table table-bordered table-hover">
                                        <thead>
                                        <tr style="color:white;background-color:#344e86;">
                                            <th>
                                                SL
                                            </th>
                                            <th>
                                                Case Title
                                            </th>

                                            <th>
                                                Case No
                                            </th>

                                            <th >
                                                Party Contact
                                            </th>

                                            <th >
                                                Advocate Name
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $todayData=$dataManipulation->showUpcomingData();
                                        $id=1;
                                        if($todayData){
                                            foreach ($todayData as $list){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $id?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->title?>

                                                    </td>
                                                    <td >
                                                        <?php echo $list->case_no?>

                                                    </td>
                                                    <td>
                                                        <?php echo $list->phone?>

                                                    </td>

                                                    <td>
                                                        <?php echo $list->advocate_name?>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $id++;
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
        $('.fancy').fancybox({
            toolbar  : false,
            smallBtn : true,



            iframe : {
                css:{
                    height:'90%',
                    width: '80%'

                }
            }
        })
    </script>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

