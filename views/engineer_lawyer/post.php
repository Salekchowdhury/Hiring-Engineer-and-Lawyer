<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
use App\Utility\Utility;
$dataManipulation = new DataManipulation();
if (!isset($_SESSION)){session_start();}
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
                            <li class="active">
                                <a href="post.php">

                                    <i  class="fas fa-paste"></i>
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
                <div class="content ">
                    <?php
                    $reg = new Registration();
                    $data = $reg->userengineer_lawyerEmail($_SESSION['email']);
                    ?>
                    <div class="row d-flex justify-content-center pt-5 ">
                        <input type="hidden" id="name" name="name" value="<?php echo $data->fullname ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $data->id?>">
                        <input type="hidden" id="user_type" name="user_type" value="<?php echo $data->type?>">
                        <div class="col-md-8 dataShow"></div>

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
        showData()
        var user_name = $("#name").val();
        var user_id = $("#user_id").val();
        var user_type = $("#user_type").val();
        function tConvert (time) {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join (''); // return adjusted time or original string
        }
        function showData() {
            var getData = " ";
            $.ajax({
                type: "GET",
                url: "../dataprocess/user_data_process.php",
                data: {
                    getData: getData
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    console.log(data);
                    var html = " ";
                    var htmlString = " ";
                    for (var i = 0;  i<data.length;  i++){
                        if (data[i].commentNo == null && data[i].position == user_type) {
                            html +="<div class=\"\">\n" +
                                "<div class=\"card card-widget\">\n" +
                                "<div class=\"card-header\">\n" +
                                "<div class=\"user-block\">\n" +
                                "<img style='width: 40px; height: 40px; border-radius: 50%' class=\"img-circle\" src=\"../../contents/images/ok-2B.jpg\" alt=\"User Image\">\n" +
                                "<span class=\"username\"><a href=\"#\">" + data[i].name + "</a></span>\n" +
                                "<p class=\"description\">" +data[i].date + " Time " +  tConvert(data[i].time) +"</p>\n" +
                                "</div>\n" +
                                "<div class=\"card-tools\">\n"

                            html += "</div>\n" +
                                "</div>\n" +
                                "<div class=\"card-body\">\n" +
                                "<div style='white-space: pre-wrap;'>" + data[i].post + "</div>" +
                                "<span class=\"float-right text-muted\">Comments</span></div>"

                            for (var j = 0; j < data.length; j++) {
                                if (data[i].no == data[j].commentNo) {
                                    html += "<div class=\"card-footer card-comments\">\n" +
                                        "<div class=\"card-comment\">\n" +
                                        "<img style='height: 40px; width: 40px; border-radius: 50%' class=\"img-circle img-sm\" src=\"../../contents/images/ok-2B.jpg\" alt=\"User Image\">\n" +

                                        "<span class=\"username text-info\">\n" + data[j].name +
                                        "<span class=\"text-muted float-right\">" + tConvert(data[j].time) + "</span>\n" +
                                        "</span><div style='white-space: pre-wrap' class='pl-5'>" + data[j].post +
                                        "</div></div>\n" +
                                        "</div>\n"
                                }
                            }
                            html += "<div class=\"card-footer row\">\n" +
                                "<a style='margin-left: 30px' href='' data-id ='"+ data[i].no +"' class=\"telegrambtn  text-primary img-fluid img-circle img-sm\"><i class=\"fab fa-telegram fa-2x\" ></i></a>\n" +
                                "<div class=\"img-push col-md-10 \">\n" +
                                "<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Press enter to post comment\">\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>"


                        }
                        $(".dataShow").html(html);
                        $(".telegrambtn").click(function (e) {
                            e.preventDefault();
                            var commentValue = $(this).parent().find('input').val();
                            var commentNo = $(this).attr("data-id");
                            var user_name = $("#name").val();
                            var user_id = $("#user_id").val();
                            if (commentValue.length>0){
                                $.ajax({
                                    type: "POST",
                                    url: "../dataprocess/user_data_process.php",
                                    data: {
                                        commentValue: commentValue,
                                        commentNo: commentNo,
                                        user_name: user_name,
                                        user_id: user_id,
                                    },
                                    success: function(data)
                                    {
                                        showData()
                                    }
                                });
                                $(this).parent().find('input').val(" ")

                            }
                        })
                        $(".confirm_Btn_eye").click(function () {
                            var confirm = $(this).attr('data-id');
                            $(".parent_id").val(confirm)
                        });
                    }


                }
            });
        }
        function submitPostData(form_data) {
            $.ajax({
                type: "POST",
                url: "../dataprocess/user_data_process.php",
                data: form_data,
                processData:false,
                contentType:false,
                cache:false,
                success: function(data)
                {
                    console.log(data)
                    showData()
                }
            });
        }
        $(".resetbtn").click(function () {
            document.getElementById("ConfirmForm").reset();
        });
        $(".newNotice").click(function (e) {
            e.preventDefault();
            var textarea = $(".post-message").val().length;
            var textareas = $(".post-message").val();
            var imageFilename = $(".Post-Type").val().length;
            var form_data = new FormData($('#FormData')[0]);
            /*form_data.append("file",imageFilename);*/
            form_data.append("user_name",user_name);
            form_data.append("user_id",user_id);
            console.log(textarea);
            console.log(imageFilename);
            if(textarea>0 && imageFilename>0)
            {

                submitPostData(form_data);
                $(".post-message").val("");
                document.getElementById("FormData").reset();
            }

        })

    </script>
        <?php
    }
    else {
        Utility::redirect("../login.php");
    }
?>
