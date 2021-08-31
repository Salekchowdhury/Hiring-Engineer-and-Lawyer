<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation =new DataManipulation();
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION['email']))
    {
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
                        <li >
                            <a href="my_profile.php">
                                <i style="color: white" class="far fa-user"></i>
                                <p class="user_side_bar_bg">My Profile</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="post.php">
                                <i class="far fa-clone"></i>
                                <p >Post</p>
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
                    $reg = new Registration();
                    $data = $reg->userEmail($_SESSION['email']);
                    ?>
                    <div class="d-flex justify-content-center " >
                        <div style="width: 90%" class="card-body box-profile card-danger ">
                            <div class="card card-danger card-outline callout callout-danger">
                                <form id="FormData" action="../dataprocess/user_data_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="name" name="name" value="<?php echo $data->name ?>">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $data->id?>">
                                    <div class="card-body ">
                                        <strong><i class="fas fa-book mr-1"></i>Post Box</strong>
                                        <div class="custom-file">
                                            <select name="Post-Type" class="form-control Post-Type">
                                                <option value="">Please Select Post Type</option>
                                                <option value="Engineer">Engineer</option>
                                                <option value="Lawyer">Lawyer</option>
                                            </select>
                                           <!-- <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose File</label>-->
                                        </div>
                                        <textarea style="resize: none; height: 150px" name="noticeInfo" class="post-message main-search form-control p-1"></textarea>
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <button type="submit" name="newNotice" style="background: #02c27f;border: #00adc2;color: #ffffff;font-weight: bold" class="newNotice btn btn-block"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ">
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
                        var html = " ";
                        var htmlString = " ";
                        for (var i = 0;  i<data.length;  i++){
                            if (data[i].commentNo == null) {
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
