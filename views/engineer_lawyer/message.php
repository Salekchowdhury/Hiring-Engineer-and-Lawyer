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
    $type=$data->type;
    ?>
    <style>
        body{
            margin-top:20px;
            background:#eee;
        }
        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .box.box-primary {
            border-top-color: #3c8dbc;
        }
        .box.box-info {
            border-top-color: #00c0ef;
        }
        .box.box-danger {
            border-top-color: #dd4b39;
        }
        .box.box-warning {
            border-top-color: #f39c12;
        }
        .box.box-success {
            border-top-color: #00a65a;
        }
        .box.box-default {
            border-top-color: #d2d6de;
        }
        .box.collapsed-box .box-body, .box.collapsed-box .box-footer {
            display: none;
        }
        .box .nav-stacked>li {
            border-bottom: 1px solid #f4f4f4;
            margin: 0;
        }
        .box .nav-stacked>li:last-of-type {
            border-bottom: none;
        }
        .box.height-control .box-body {
            max-height: 300px;
            overflow: auto;
        }
        .box .border-right {
            border-right: 1px solid #f4f4f4;
        }
        .box .border-left {
            border-left: 1px solid #f4f4f4;
        }
        .box.box-solid {
            border-top: 0;
        }
        .box.box-solid>.box-header .btn.btn-default {
            background: transparent;
        }
        .box.box-solid>.box-header .btn:hover, .box.box-solid>.box-header a:hover {
            background: rgba(0, 0, 0, 0.1);
        }
        .box.box-solid.box-default {
            border: 1px solid #d2d6de;
        }
        .box.box-solid.box-default>.box-header {
            color: #444;
            background: #d2d6de;
            background-color: #d2d6de;
        }
        .box.box-solid.box-default>.box-header a, .box.box-solid.box-default>.box-header .btn {
            color: #444;
        }
        .box.box-solid.box-primary {
            border: 1px solid #3c8dbc;
        }
        .box.box-solid.box-primary>.box-header {
            color: #fff;
            background: #3c8dbc;
            background-color: #3c8dbc;
        }
        .box.box-solid.box-primary>.box-header a, .box.box-solid.box-primary>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-info {
            border: 1px solid #00c0ef;
        }
        .box.box-solid.box-info>.box-header {
            color: #fff;
            background: #00c0ef;
            background-color: #00c0ef;
        }
        .box.box-solid.box-info>.box-header a, .box.box-solid.box-info>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-danger {
            border: 1px solid #dd4b39;
        }
        .box.box-solid.box-danger>.box-header {
            color: #fff;
            background: #dd4b39;
            background-color: #dd4b39;
        }
        .box.box-solid.box-danger>.box-header a, .box.box-solid.box-danger>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-warning {
            border: 1px solid #f39c12;
        }
        .box.box-solid.box-warning>.box-header {
            color: #fff;
            background: #f39c12;
            background-color: #f39c12;
        }
        .box.box-solid.box-warning>.box-header a, .box.box-solid.box-warning>.box-header .btn {
            color: #fff;
        }
        .box.box-solid.box-success {
            border: 1px solid #00a65a;
        }
        .box.box-solid.box-success>.box-header {
            color: #fff;
            background: #00a65a;
            background-color: #00a65a;
        }
        .box.box-solid.box-success>.box-header a, .box.box-solid.box-success>.box-header .btn {
            color: #fff;
        }
        .box.box-solid>.box-header>.box-tools .btn {
            border: 0;
            box-shadow: none;
        }
        .box.box-solid[class*='bg']>.box-header {
            color: #fff;
        }
        .box .box-group>.box {
            margin-bottom: 5px;
        }
        .box .knob-label {
            text-align: center;
            color: #333;
            font-weight: 100;
            font-size: 12px;
            margin-bottom: 0.3em;
        }
        .box>.overlay, .overlay-wrapper>.overlay, .box>.loading-img, .overlay-wrapper>.loading-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%}
        .box .overlay, .overlay-wrapper .overlay {
            z-index: 50;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 3px;
        }
        .box .overlay>.fa, .overlay-wrapper .overlay>.fa {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -15px;
            margin-top: -15px;
            color: #000;
            font-size: 30px;
        }
        .box .overlay.dark, .overlay-wrapper .overlay.dark {
            background: rgba(0, 0, 0, 0.5);
        }
        .box-header:before, .box-body:before, .box-footer:before, .box-header:after, .box-body:after, .box-footer:after {
            content: " ";
            display: table;
        }
        .box-header:after, .box-body:after, .box-footer:after {
            clear: both;
        }
        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
        }
        .box-header.with-border {
            border-bottom: 1px solid #f4f4f4;
        }
        .collapsed-box .box-header.with-border {
            border-bottom: none;
        }
        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            line-height: 1;
        }
        .box-header>.fa, .box-header>.glyphicon, .box-header>.ion {
            margin-right: 5px;
        }
        .box-header>.box-tools {
            position: absolute;
            right: 10px;
            top: -1px;
        }
        .box-header>.box-tools [data-toggle="tooltip"] {
            position: relative;
        }
        .box-header>.box-tools.pull-right .dropdown-menu {
            right: 0;
            left: auto;
        }
        .btn-box-tool {
            padding: 5px;
            font-size: 12px;
            background: transparent;
            color: #97a0b3;
        }
        .open .btn-box-tool, .btn-box-tool:hover {
            color: #606c84;
        }
        .btn-box-tool.btn:active {
            box-shadow: none;
        }
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }
        .no-header .box-body {
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }
        .box-body>.table {
            margin-bottom: 0;
        }
        .box-body .fc {
            margin-top: 5px;
        }
        .box-body .full-width-chart {
            margin: -19px;
        }
        .box-body.no-padding .full-width-chart {
            margin: -9px;
        }
        .box-body .box-pane {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 3px;
        }
        .box-body .box-pane-right {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 0;
        }
        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #f4f4f4;
            padding: 10px;
            background-color: #fff;
        }
        .direct-chat .box-body {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            position: relative;
            overflow-x: hidden;
            padding: 0;
        }
        .direct-chat.chat-pane-open .direct-chat-contacts {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
        }
        .direct-chat-messages {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
            padding: 10px;
            height: 250px;
            overflow: auto;
        }
        .direct-chat-msg, .direct-chat-text {
            display: block;
        }
        .direct-chat-msg {
            margin-bottom: 10px;
        }
        .direct-chat-msg:before, .direct-chat-msg:after {
            content: " ";
            display: table;
        }
        .direct-chat-msg:after {
            clear: both;
        }
        .direct-chat-messages, .direct-chat-contacts {
            -webkit-transition: -webkit-transform .5s ease-in-out;
            -moz-transition: -moz-transform .5s ease-in-out;
            -o-transition: -o-transform .5s ease-in-out;
            transition: transform .5s ease-in-out;
        }
        .direct-chat-text {
            border-radius: 5px;
            position: relative;
            padding: 5px 10px;
            background: #d2d6de;
            border: 1px solid #d2d6de;
            margin: 5px 0 0 50px;
            color: #444;
        }
        .direct-chat-text:after, .direct-chat-text:before {
            position: absolute;
            right: 100%;
            top: 15px;
            border: solid transparent;
            border-right-color: #d2d6de;
            content: ' ';
            height: 0;
            width: 0;
            pointer-events: none;
        }
        .direct-chat-text:after {
            border-width: 5px;
            margin-top: -5px;
        }
        .direct-chat-text:before {
            border-width: 6px;
            margin-top: -6px;
        }
        .right .direct-chat-text {
            margin-right: 50px;
            margin-left: 0;
        }
        .right .direct-chat-text:after, .right .direct-chat-text:before {
            right: auto;
            left: 100%;
            border-right-color: transparent;
            border-left-color: #d2d6de;
        }
        .direct-chat-img {
            border-radius: 50%;
            float: left;
            width: 40px;
            height: 40px;
        }
        .right .direct-chat-img {
            float: right;
        }
        .direct-chat-info {
            display: block;
            margin-bottom: 2px;
            font-size: 12px;
        }
        .direct-chat-name {
            font-weight: 600;
        }
        .direct-chat-timestamp {
            color: #999;
        }
        .direct-chat-contacts-open .direct-chat-contacts {
            -webkit-transform: translate(0,  0);
            -ms-transform: translate(0,  0);
            -o-transform: translate(0,  0);
            transform: translate(0,  0);
        }
        .direct-chat-contacts {
            -webkit-transform: translate(101%,  0);
            -ms-transform: translate(101%,  0);
            -o-transform: translate(101%,  0);
            transform: translate(101%,  0);
            position: absolute;
            top: 0;
            bottom: 0;
            height: 250px;
            width: 100%;
            background: #222d32;
            color: #fff;
            overflow: auto;
        }
        .contacts-list>li {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin: 0;
        }
        .contacts-list>li:before, .contacts-list>li:after {
            content: " ";
            display: table;
        }
        .contacts-list>li:after {
            clear: both;
        }
        .contacts-list>li:last-of-type {
            border-bottom: none;
        }
        .contacts-list-img {
            border-radius: 50%;
            width: 40px;
            float: left;
        }
        .contacts-list-info {
            margin-left: 45px;
            color: #fff;
        }
        .contacts-list-name, .contacts-list-status {
            display: block;
        }
        .contacts-list-name {
            font-weight: 600;
        }
        .contacts-list-status {
            font-size: 12px;
        }
        .contacts-list-date {
            color: #aaa;
            font-weight: normal;
        }
        .contacts-list-msg {
            color: #999;
        }
        .direct-chat-danger .right>.direct-chat-text {
            background: #dd4b39;
            border-color: #dd4b39;
            color: #fff;
        }
        .direct-chat-danger .right>.direct-chat-text:after, .direct-chat-danger .right>.direct-chat-text:before {
            border-left-color: #dd4b39;
        }
        .direct-chat-primary .right>.direct-chat-text {
            background: #3c8dbc;
            border-color: #3c8dbc;
            color: #fff;
        }
        .direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
            border-left-color: #3c8dbc;
        }
        .direct-chat-warning .right>.direct-chat-text {
            background: #f39c12;
            border-color: #f39c12;
            color: #fff;
        }
        .direct-chat-warning .right>.direct-chat-text:after, .direct-chat-warning .right>.direct-chat-text:before {
            border-left-color: #f39c12;
        }
        .direct-chat-info .right>.direct-chat-text {
            background: #00c0ef;
            border-color: #00c0ef;
            color: #fff;
        }
        .direct-chat-info .right>.direct-chat-text:after, .direct-chat-info .right>.direct-chat-text:before {
            border-left-color: #00c0ef;
        }
        .direct-chat-success .right>.direct-chat-text {
            background: #00a65a;
            border-color: #00a65a;
            color: #fff;
        }
        .direct-chat-success .right>.direct-chat-text:after, .direct-chat-success .right>.direct-chat-text:before {
            border-left-color: #00a65a;
        }
    </style>
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
                        <li class="active">
                            <a href="message.php">
                                <i  class="nc-icon nc-paper"></i>
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
                        <h3>Message</h3>
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
                                <h4 class="card-title">Chat</h4>
                                <input type="hidden" class="user_id" value="<?php echo $data->id?>">
                                <input type="hidden" class="user_name" value="<?php echo $data->fullname?>">
                                <input type="hidden" class="sellers_name">
                                <input type="hidden"  class="seller_id">
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 300px;">
                                    <table class="table">
                                        <thead class=" text-primary" style="background-color: rgba(19,77,79,0.96)">
                                        <th>
                                            SL
                                        </th>

                                        <th>
                                            User Name
                                        </th>
                                        <th>
                                            User Email
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                        </thead>
                                        <tbody class="attrTable">
                                        <?php

                                        $data=$dataManipulation->viewalluserforchat();
                                        //var_dump($data);
                                        $s=1;
                                        if($data){
                                            foreach ($data as $list){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $s;?>
                                                    </td>
                                                    <td class="attrName">
                                                        <?php echo $list->name?>
                                                        <span class="message-show-on-alert badge-success badge"></span>
                                                    </td>
                                                    <td>
                                                        <?php echo $list->email?>
                                                    </td>
                                                    <td>
                                                        <a data-id = "<?php echo $list->id?>" href="#" class="attrValue show-chat-box-click btn-sm btn-info"><i class="fas fa-user-edit"></i></a>
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

            <div  style="display: none; position: absolute; width: 35%; bottom: 2%;right: 5%; z-index: 9999999" class="show-chat-box">
                <div class="row bootstrap snippets bootdeys">
                    <div class="">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Chat</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool btn-close-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body ">
                                <div style="height: 400px;width: 400px" class="direct-chat-messages chatlogs">
                                </div>
                            </div>
                            <div class="box-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input style="border-right:1px solid #bebebe;height: 40px;margin-top: 9px" type="text" name="message" placeholder="Type Message ..." class="form-control chatMessageSend">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-success chatSendBtn">Send</button>
                                        </span>
                                    </div>
                                </form>
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

        setInterval(function () {
            var ary = [];
            var sellers_id = $(".user_id").val();
            $(function () {
                $('.attrTable tr').each(function (a, b) {
                    /*var name = $('.attrName', b).text();*/
                    var value = $('.attrValue', b).attr('data-id');
                    ary.push(value)
                });
                /*console.log(JSON.stringify(ary));*/
                $.ajax({
                    url: "../dataprocess/process.php",
                    type:'GET',
                    data:{user_type:ary,sellers_id:sellers_id},
                    success:function (result) {
                        var datas = JSON.parse(result);

                        htmlstring = "";
                        var j = 0;
                        for (var f = 0; f<ary.length; f++) {
                            for (var i = 0; i < datas.length; i++) {
                                if ((datas[i].message == "unseen") && (datas[i].users_id == ary[f]) ) {
                                    console.log(datas)

                                    $('.attrTable tr').each(function (a, b) {
                                        var name = $('.attrName', b).text();
                                        /*var value = $('.attrValue', b).attr('data-id');*/
                                        if($(".attrValue",b).attr('data-id') == datas[i].users_id){

                                            j=j+1;
                                            htmlstring = $(".attrValue",b).attr('data-id');
                                            $('.attrName .message-show-on-alert',b).text(j);
                                        }
                                    });
                                }
                            }
                            j=0;
                        }
                    }
                });
            });
        },800);
        $(".btn-close-tool").click(function () {
            $(".show-chat-box").css("display","none");
            location.reload();
        });
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
        $(".show-chat-box-click").click(function () {
            var users_name = $(".user_name").val();
            var users_id = $(".user_id").val();
            var sellers_id = $(this).attr("data-id");
            var sellerDataCollectViaId = "";
            var sellers_name = $(this).parent().parent().find('td').eq('1').text().trim();
            $(".seller_id").val(sellers_id);
            $(".sellers_name").val(sellers_name);
            setInterval(function () {
                $.ajax({
                    type: "POST",
                    url: "../dataprocess/process.php",
                    data: {
                        sellerSDataCollectViaId :sellerDataCollectViaId,
                        users_id :users_id,
                        sellers_id :sellers_id
                    },
                    success: function(data)
                    {
                        console.log(data)
                        var data = JSON.parse(data);
                        var htmlstring = "";
                        for(var i =0; i<data.length;i++){
                            if((data[i].message_from) !=null){
                                htmlstring +="<div class=\"direct-chat-msg\">\n" +
                                    "                        <div class=\"direct-chat-info clearfix\">\n" +
                                    "                            <span class=\"direct-chat-name pull-left\">" + data[i].users_name + "</span>\n" +
                                    "                            <span class=\"direct-chat-timestamp pull-right\">" + tConvert(data[i].time) + "</span>\n" +
                                    "                        </div>\n" +
                                    "                        <img class=\"direct-chat-img\"  src=\"https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/479f6dd6-8708-455f-b7d9-505b5dc63cf5/ddpnnto-00cb3926-bc7e-451d-93f7-8944556a7aa0.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzQ3OWY2ZGQ2LTg3MDgtNDU1Zi1iN2Q5LTUwNWI1ZGM2M2NmNVwvZGRwbm50by0wMGNiMzkyNi1iYzdlLTQ1MWQtOTNmNy04OTQ0NTU2YTdhYTAuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.fOsSihboR4FsbRWFSawrFV3QpFKmo5J9jFntgFIWsww\"  alt=\"Message User Image\">\n" +
                                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                                    "                        </div>\n" +
                                    "                    </div>"
                            }
                            if((data[i].message_to) !=null){
                                htmlstring += "<div class=\"direct-chat-msg right\">\n" +
                                    "                        <div class=\"direct-chat-info clearfix\">\n" +
                                    "                            <span class=\"direct-chat-name pull-right\">"+ data[i].eng_law_name + "</span>\n" +
                                    "                            <span class=\"direct-chat-timestamp pull-left\">"+tConvert(data[i].time) + "</span>\n" +
                                    "                        </div>\n" +
                                    "                        <img class=\"direct-chat-img\"  src=\"https://miro.medium.com/max/1033/1*MAsNORFL89roPfIFMBnA4A.jpeg\"  alt=\"Message User Image\">\n" +
                                    "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                                    "                        </div>\n" +
                                    "                    </div>"
                            }
                        }
                        $('.chatlogs').html(htmlstring);
                    }
                });
            },1000);

            $(".btn-tool").click(function () {
                sellers_id = null;
                $(".seller_id").val("")
            });
            $(".show-chat-box").css("display","block")
        });

        $(".chatSendBtn").click(function () {
            var users_name = $(".user_name").val();
            var users_id = $(".user_id").val();
            var sellers_id = $(".seller_id").val();
            var sellers_name = $(".sellers_name").val();
            var chat_message = $(".chatMessageSend").val();
            var htmlstring = " ";
            var sellerDataCollectViaId = " ";
            if(chat_message.length>0){
                $.ajax({
                    type: "POST",
                    url: "../dataprocess/process.php",
                    data: {
                        buyers_names :users_name,
                        buyers_ids :users_id,
                        sellers_ids :sellers_id,
                        sellers_names :sellers_name,
                        chat_messages :chat_message,
                        sellerActive :htmlstring
                    },
                    success: function(data)
                    {
                        $(".chatMessageSend").val("")
                        $.ajax({
                            type: "POST",
                            url: "../dataprocess/process.php",
                            data: {
                                sellerSDataCollectViaId :sellerDataCollectViaId,
                                users_id :users_id,
                                sellers_id :sellers_id
                            },
                            success: function(data)
                            {
                                console.log(data)
                                var data = JSON.parse(data);
                                var htmlstring = "";
                                for(var i =0; i<data.length;i++){
                                    if((data[i].message_from) !=null){
                                        htmlstring +="<div class=\"direct-chat-msg\">\n" +
                                            "                        <div class=\"direct-chat-info clearfix\">\n" +
                                            "                            <span class=\"direct-chat-name pull-left\">" + data[i].users_name + "</span>\n" +
                                            "                            <span class=\"direct-chat-timestamp pull-right\">" + tConvert(data[i].time) + "</span>\n" +
                                            "                        </div>\n" +
                                            "                        <img class=\"direct-chat-img\"  src=\"https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/479f6dd6-8708-455f-b7d9-505b5dc63cf5/ddpnnto-00cb3926-bc7e-451d-93f7-8944556a7aa0.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzQ3OWY2ZGQ2LTg3MDgtNDU1Zi1iN2Q5LTUwNWI1ZGM2M2NmNVwvZGRwbm50by0wMGNiMzkyNi1iYzdlLTQ1MWQtOTNmNy04OTQ0NTU2YTdhYTAuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.fOsSihboR4FsbRWFSawrFV3QpFKmo5J9jFntgFIWsww\"  alt=\"Message User Image\">\n" +
                                            "                        <div class=\"direct-chat-text\">\n" + data[i].message_from +
                                            "                        </div>\n" +
                                            "                    </div>"
                                    }
                                    if((data[i].message_to) !=null){
                                        htmlstring += "<div class=\"direct-chat-msg right\">\n" +
                                            "                        <div class=\"direct-chat-info clearfix\">\n" +
                                            "                            <span class=\"direct-chat-name pull-right\">"+ data[i].eng_law_name + "</span>\n" +
                                            "                            <span class=\"direct-chat-timestamp pull-left\">"+tConvert(data[i].time) + "</span>\n" +
                                            "                        </div>\n" +
                                            "                        <img class=\"direct-chat-img\"  src=\"https://miro.medium.com/max/1033/1*MAsNORFL89roPfIFMBnA4A.jpeg\"  alt=\"Message User Image\">\n" +
                                            "                        <div class=\"direct-chat-text\">\n" + data[i].message_to +
                                            "                        </div>\n" +
                                            "                    </div>"
                                    }
                                }
                                $('.chatlogs').html(htmlstring);
                            }
                        });
                    }
                });
            }
        });
    </script>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>

