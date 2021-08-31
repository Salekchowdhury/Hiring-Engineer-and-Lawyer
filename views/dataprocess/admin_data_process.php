<?php
/**
 * Created by PhpStorm.
 * User: sAlek Chowdhury
 * Date: 31-Mar-20
 * Time: 8:06 AM
 */
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$dataManipulation = new DataManipulation();
use App\Utility\Utility;
if(!isset($_SESSION)){
    session_start();
    $email=$_SESSION['email'];
}

if(isset($_POST['notic_post'])){
    $http = $_SERVER["HTTP_REFERER"];
    $notic = $_POST['notice'];
    $data = $dataManipulation->insertNotice($notic);
    //Utility::redirect("$http");
    //var_dump($data);
    if($data){
        $_SESSION["inserMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Added a New Notice Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if(isset($_POST['add_schedule'])){
    $http = $_SERVER["HTTP_REFERER"];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];
    $data = $dataManipulation->insertPayment($amount,$duration);

    if($data){
        $_SESSION["inserMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Added a New Payment Schedule Successfully.</span>
                         </div>";
        Utility::redirect("$http");
    }

}
if(isset($_POST['update_notice'])){
    $http = $_SERVER["HTTP_REFERER"];
    $notic = $_POST['notice'];
    $id = $_POST['id'];
    $data = $dataManipulation->updateNotice($id,$notic);
    //Utility::redirect("$http");
    //var_dump($data);
    if($data){
        $_SESSION["updateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Notice Successfully.</span>
                         </div>";
        Utility::redirect("../admin/notice.php");


    }

}
if(isset($_POST['ChangeAdminProfile'])){
    $http = $_SERVER["HTTP_REFERER"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data = $dataManipulation->ChangeAdminProfile($name,$phone,$email,$password);

    if($data){
        $_SESSION["updateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_POST['AdminImageUpload'])){
    $http = $_SERVER["HTTP_REFERER"];

    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/images/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);
    $email = $_POST['email'];

    $data = $dataManipulation->ChangeAdminImage($email,$destinationFile);

    if($data){
        $_SESSION["updateImgMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Change  Image Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if (isset($_GET["delete_admin_id"]))
{
    $id = $_GET['delete_admin_id'];
    $http = $_SERVER["HTTP_REFERER"];

    $data =$dataManipulation->delete_admin($id);


    if ($data)
    {
        $_SESSION["deleteMsg"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Delete - </b> Delete Data Successfully. </span>
                        </div>";
        Utility::redirect($http);

    }else{
        $_SESSION["notDeleteMsg"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Not Deleted - </b> Something Wrong. </span>
                        </div>";
        Utility::redirect($http);
    }

}

if(isset($_POST['add_admin'])){
    $http = $_SERVER["HTTP_REFERER"];

    $name =$_POST['name'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $county =$_POST['country'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    $random = rand(1000,10000);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/admin_image/' . $random . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);


    $checkEmail =$dataManipulation->isExitsAdminEmail($email);
    if($checkEmail){
        $_SESSION["ExitsMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Exits - </b> This Email Id Is Exist.</span>
                         </div>";
        Utility::redirect("$http");
    }else{

        $data = $dataManipulation->addAdmin($name,$address,$city,$county,$phone,$email,$password,$destinationFile);

        if($data){
            $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> New Admin Added Successfully.</span>
                         </div>";
            Utility::redirect("$http");

        }
    }


}
if(isset($_GET['delete_notice'])){
    $http = $_SERVER["HTTP_REFERER"];
    $notic = $_GET['delete_notice'];
    $data = $dataManipulation->deleteNotice($_GET['delete_notice']);

    if($data){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Notice Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['confirm_engineer_id'])){
    $http = $_SERVER["HTTP_REFERER"];

    $data = $dataManipulation->confirmEngineerProfile($_GET['confirm_engineer_id']);

    if($data){
        $_SESSION["ConfirmMeg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirm - </b> Confirm Engineer Profile Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['confirm_lawyer_id'])){
    $http = $_SERVER["HTTP_REFERER"];

    $data = $dataManipulation->confirmEngineerProfile($_GET['confirm_lawyer_id']);

    if($data){
        $_SESSION["ConfirmData"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirm - </b> Confirm Lawyer Profile Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['delete_payment_schedule'])){
    $http = $_SERVER["HTTP_REFERER"];

    $data = $dataManipulation->deletePaymentSchedule($_GET['delete_payment_schedule']);

    if($data){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['moveToTrahAccount'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['moveToTrahAccount'];
    $data = $dataManipulation->ActivationDelete($id);

    if($data){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Moved - </b> Data Move To Trash.</span>
                         </div>";
        Utility::redirect("../admin/trash_list.php");



    }

}
if(isset($_GET['confirm_payment_id'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['confirm_payment_id'];
    $data = $dataManipulation->approveConfirm($id);

    if($data){
        $_SESSION["SuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b>  Successfully accepting payments.</span>
                         </div>";
        Utility::redirect($http);



    }

}
if(isset($_GET['changeDeleteToyesApproved'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['changeDeleteToyesApproved'];
    $data = $dataManipulation->changeDeleteToyesApproved($id);

    if($data){
        $_SESSION["success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Recovery - </b> Recovered Data....</span>
                         </div>";
        Utility::redirect("../admin/manage_account.php");



    }

}
if(isset($_GET['recoverOwnerId'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['recoverOwnerId'];
    $data = $dataManipulation->confirmOwner($id);

    if($data){
        $_SESSION["recoverMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Recovered - </b> Recovery Data Successfully.</span>
                         </div>";
        Utility::redirect("../admin/manage_account.php");


    }

}

if(isset($_GET['confirmOwnerId'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['confirmOwnerId'];
    $data = $dataManipulation->confirmOwner($id);

    if($data){
        $_SESSION["confirmMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirm - </b> Accept Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['confirmUserId'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['confirmUserId'];
    $data = $dataManipulation->confirmOwner($id);

    if($data){
        $_SESSION["confirmuserMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirm - </b> Accept Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['deleteOwnerId'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['deleteOwnerId'];
    $data = $dataManipulation->deleteOwnerAccount($id);

    if($data){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Delete Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['deleteUserId'])){
    $http = $_SERVER["HTTP_REFERER"];
    $id = $_GET['deleteUserId'];
    $data = $dataManipulation->deleteOwnerAccount($id);

    if($data){
        $_SESSION["deleteUserMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Deleted - </b> Delete Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_GET['delete_admin_id'])){
    $http = $_SERVER["HTTP_REFERER"];
    $notic = $_GET['delete_admin_id'];
    $data = $dataManipulation->deleteAdmin($_GET['delete_admin_id']);

    if($data){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }

}
if(isset($_POST['change_user_pass'])){
    $email=$_SESSION['email'];;
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    if($password==$repass){

        $updateAdminPassword = $dataManipulation->updateAdminPassword($password,$email);
        $updateRegisterPassword = $dataManipulation->updateRegisterPassword($password,$email);
        //var_dump($updateRegisterPassword);
        if($updateAdminPassword || $updateRegisterPassword ){
            Utility::redirect("../../views/login_register_forgot/login.php");
            //include_once ("../../views/login_register_forgot/login.php");
        }

    }else{
        $http_reffer= $_SERVER['HTTP_REFERER'];
        $_SESSION['errorMessageForForgotPass']="<div class='alert alert-danger'>Not match password and Re-type password!</div>";
        Utility::redirect("$http_reffer");
    }

}
if (isset($_POST["add_admin"]))
{
    $http = $_SERVER["HTTP_REFERER"];

    $name = $_POST['name'];
    $addedBy = $_POST['addedBy'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = "admin";

    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $destinationFile = '../../contents/admin_img/' . date('d_m_Y_h_i_s_') . $fileName;
    move_uploaded_file($fileTmpName, $destinationFile);


    $isExist =$dataManipulation->AdminEmailisExist($email);

    if($isExist){
        $_SESSION["isExistMsg"] = "<div style='background-color: #218838' class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> is Exist - </b> Sorry! This Email ID Already Exist... </span>
                        </div>";
        Utility::redirect($http);
    }else{
        $data =$dataManipulation->inser_admin_data($name, $type, $phone, $email, $password , $addedBy, $destinationFile);


        if ($data)
        {
            $_SESSION["insertMsg"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Insert Data Successfully. </span>
                        </div>";
            Utility::redirect($http);

        }
    }

}
if (isset($_POST['postDataCollect'])){

    $user_id = $_POST['value'];
    $data = $dataManipulation->postDataCollectviaUserId($user_id);
    echo json_encode($data);
}
if (isset($_GET["logout"]))
{
    session_destroy();
    Utility::redirect("../login_register_forgot/login.php");

}