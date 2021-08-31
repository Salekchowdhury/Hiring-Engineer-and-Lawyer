<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
$dataManipulation =new DataManipulation();
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email'])){
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
                    <li>
                        <a href="my_profile.php">
                            <i style="color: white" class="far fa-user"></i>
                            <p class="user_side_bar_bg">My Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="post.php">
                            <i style="color: white" class="far fa-clone"></i>
                            <p class="user_side_bar_bg">Post</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="manage_post.php">
                            <i class="fas fa-align-left"></i>
                            <p >Manage Post</p>
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
            <?php
            if(isset($_SESSION['TostUpdate'])){
                echo $_SESSION['TostUpdate'];
                unset($_SESSION['TostUpdate']);
            }
            ?>
            <div class="content">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <ul class="timeline">
                                <?php

                                $listOfValues = $dataManipulation->viewPostByUserId($userData->id);
                                if ($listOfValues){
                                    foreach ($listOfValues as $listOfValues){
                                        ?>

                                        <li class="timeline-item bg-white rounded ml-3 p-4 shadow mb-2">
                                            <div class="timeline-arrow"></div>
                                            <h2 class="h5 mb-0"><?php echo $listOfValues->date?></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i><?php echo $listOfValues->time?></span>
                                            <div class="text-small mt-2 font-weight-light"><?php echo nl2br($listOfValues->post)?>.</div>

                                            <?php

                                            if ($listOfValues->commentNo == NULL ){
                                                $comment = $dataManipulation->viewPostComment($listOfValues->no);
                                                foreach ($comment as $comments){
                                                    if($listOfValues->no == $comments->commentNo ) {
                                                        ?>
                                                        <div style="margin-top: 10px;">
                                                            <span style="display:block;text-align: center;">=========Comments========</span>
                                                            <p style="font-size: 20px"><b><?php echo $comments->name; ?></b></p>
                                                            <div class="text-small mt-2 font-weight-light p-2"><?php echo nl2br($comments->post); ?></div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <div class="timeline-footer">
                                                <a data-id ="<?php echo $listOfValues->no; ?>" class="btn btn-primary btn-sm editPost"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                <a href="../dataprocess/user_data_process.php?managePostDelete=<?php echo $listOfValues->no; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                            </div>
                                        </li>

                                        <?php
                                    }
                                }
                                ?>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <form action="../dataprocess/user_data_process.php" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div style="min-height: 250px" class="modal-body">
                                <textarea name="updatePostDataSection" class="updatePostDataSection" style="resize: none; width: 100%;height: 240px"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="user_no_from" class="user_no_from">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn-save-changes" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


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
        $("#toast-container").fadeOut(3000);

        $(".editPost").click(function () {
            var value = $(this).attr('data-id');
            var postDataCollect = " ";

            $.ajax({
                type: "POST",
                url: "../dataprocess/user_data_process.php",
                data: {
                    value: value,
                    postDataCollect :postDataCollect
                },
                success: function(data)
                {

                    var data = JSON.parse(data)
                    $(".updatePostDataSection").val(data.post)
                    $(".user_no_from").val(data.no)

                }
            });
        })
    </script>
    <?php
}


