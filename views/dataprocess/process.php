<?php
include_once "../../vendor/autoload.php";
if (!isset($_SESSION)){session_start();}
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;
use App\Registration\Registration;
$registration =new registration();

$dataManipulation = new DataManipulation();

if (isset($_POST["update_profile"]))
{
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $pnumber = $_POST["pnumber"];

    //$dataManipulation->adminSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $status = $dataManipulation->updateAdminData($id,$pass,$email,$fname,$address,$city,$pnumber);
    if ($status){
        $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}

if (isset($_POST['change_recover_password'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $user_mail = $_POST['email'];
    $otp = $_POST['otp'];
    $pass = $_POST['password'];
    $updateUserPassword = $registration->updateUserPassword($user_mail,$pass);
    $updateEngineerLawyerPassword = $registration->updateEngineerLawyerPassword($user_mail,$pass);
    $updateAdminPassword = $registration->updateAdminPassword($user_mail,$pass);
    //$statusTrue = $registration->recoverEmailToken($user_mail,$otp);
    if ($updateUserPassword ||$updateEngineerLawyerPassword || $updateAdminPassword){

        Utility::redirect("../login.php");

    }
    else{
        $_SESSION['errorMessageRecover'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                  <h5><i class=\"icon fas fa-exclamation-triangle\"></i> Oops!</h5>
                  Sorry. Your otp not matched
                </div>";
        Utility::redirect("$http_reffer");
    }
}
if (isset($_POST['checValidkMail'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $user_mail = $_POST['email'];
    $otp = $_POST['otp'];
    //$pass = $_POST['password'];
    $updateUserPassword = $registration->checkValidMailForUser($user_mail,$otp);
    $updateEngineerLawyerPassword = $registration->checkValidMailForUserEngineerLawyer($user_mail,$otp);
    //$updateAdminPassword = $registration->updateAdminPassword($user_mail,$pass);
    //$statusTrue = $registration->recoverEmailToken($user_mail,$otp);
    if ($updateUserPassword ||$updateEngineerLawyerPassword ){
        $_SESSION['SuccessRegister'] = "<div class=\"alert alert-success alert-dismissible rounded-0\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                  <h5><i class=\"icon fas fa-exclamation-triangle\"></i> Your Registration Successfully!</h5>
                </div>";
        Utility::redirect("../login.php");

    }
    else{
        $_SESSION['errorMessageRecover'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                  <h5><i class=\"icon fas fa-exclamation-triangle\"></i> Oops!</h5>
                  Sorry. Your otp not matched
                </div>";
        Utility::redirect("$http_reffer");
    }
}




if (isset($_GET["id"]))
{
    $status = $dataManipulation->deleteNotApproved($_GET["id"]);
    $http = $_SERVER["HTTP_REFERER"];
    if ($status){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Delete - </b>Moderateor Id Delete Successfully.</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_GET["active_id"]))
{
    $status = $dataManipulation->moderatorApproved($_GET["active_id"]);
    if ($status){
        Utility::redirect("../admin/active_moderator_list.php");
    }
}
if (isset($_POST["update_moderator_profile"])){
    $dataManipulation->moderatorSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->updateModeratorDetails($_POST['id']);
    if ($status){
        $_SESSION["successModeratorMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_POST["add_member"]))
{
    $data = $dataManipulation->memberSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $idtoken = $dataManipulation->memberIdIsExist($_POST["member_id"]);
    if ($idtoken){
        $_SESSION["addMemberExist"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Member id already exist.</span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        $status = $dataManipulation->memberDataInsert();
        if ($status)
        {
            Utility::redirect("../engineer_lawyer/view_member_details.php");
        }
    }


}
if (isset($_GET["update_id"]))
{

    $update_id = $_GET['update_id'];
    $data = $dataManipulation->singleMember($update_id);

    if ($data)
    {
        $_SESSION["data_id"] = $data->id;
        Utility::redirect("../engineer_lawyer/update_member_details.php");
    }
}

if (isset($_POST["update_member"])){
    $dataManipulation->memberSetData($_POST);
    $data = $dataManipulation->updateMemberDetails($_POST['id']);
    if ($data)
    {
        $_SESSION["successMemberUpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>  Update Member Data Successfully .</span>
                        </div>";
        Utility::redirect("../engineer_lawyer/update_member_details.php");
    }

}
if (isset($_POST['send']))
{
    $dataManipulation->userSetData($_POST);
    $data = $dataManipulation->insertUserDonate();
    if ($data){
        Utility::redirect("../users/money_send_details.php");
    }
}
if (isset($_GET['alert_id']))
{
    $data = $dataManipulation->updateAlert($_GET['alert_id']);
    if ($data)
    {
        Utility::redirect("../engineer_lawyer/serious_condition_member.php");
    }
}
if (isset($_GET['warning_id']))
{
    $data = $dataManipulation->updateWarning($_GET['warning_id']);
    if ($data)
    {
        Utility::redirect("../engineer_lawyer/view_member_details.php");
    }
}
if (isset($_GET['notification_id']))
{
    $data = $dataManipulation->updateNotification($_GET['notification_id']);
    if ($data)
    {
        Utility::redirect("../users/serious_condition.php");
    }
    else{
        Utility::redirect("../users/serious_condition.php");
    }
}

if (isset($_GET['leave_id'])){

    $data = $dataManipulation->updateLeftMemberDetails($_GET['leave_id']);
    if ($data)
    {
        Utility::redirect("../engineer_lawyer/case_details.php");
    }

}
if (isset($_GET['send_msg_id']))
{
    $data = $dataManipulation->userAlert($_GET['send_msg_id']);
    $http = $_SERVER['HTTP_REFERER'];
    if ($data) {
        $_SESSION["alertUsers"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Reminder alert send successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }

}
if (isset($_POST['sellerSDataCollectViaId']))
{
    $users_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $dataManipulation->viewSellerBuyersTotalInfoS($users_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['buyers_ids']) && isset($_POST['sellerActive']) && isset($_POST['sellers_names'])){
    $buyers_name = $_POST['buyers_names'];
    $buyers_id = $_POST['buyers_ids'];
    $sellers_id = $_POST['sellers_ids'];
    $sellers_name = $_POST['sellers_names'];
    $chat_message = $_POST['chat_messages'];
    $data = $dataManipulation->insertMessageForChatSellers($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}
if (isset($_GET['user_type_for_buyers'])){
    $data = $dataManipulation->showAlertonMessageforbuyers($_GET['user_id']);
    echo json_encode($data);
}
if (isset($_GET["logout"]))
{
    session_destroy();
    Utility::redirect("../login.php");
}
if (isset($_POST['sellerDataCollectViaId']))
{
    $users_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $data = $dataManipulation->viewSellerBuyersTotalInfo($users_id,$sellers_id);
    echo json_encode($data);
}
if (isset($_POST['users_name']) && isset($_POST['users_id'])){
    $buyers_name = $_POST['users_name'];
    $buyers_id = $_POST['users_id'];
    $sellers_id = $_POST['sellers_id'];
    $sellers_name = $_POST['sellers_name'];
    $chat_message = $_POST['chat_message'];
    $data = $dataManipulation->insertMessageForChat($buyers_id,$sellers_id,$buyers_name,$sellers_name,$chat_message);

}

if (isset($_GET['user_type'])){
    $data = $dataManipulation->showAlertonMessage($_GET['sellers_id']);
    echo json_encode($data);
}