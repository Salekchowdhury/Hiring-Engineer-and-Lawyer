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


if(isset($_POST['add_engineer_verify_image'])){
    var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

  $id =$_POST['id'];
    $random = rand(1000,10000);
    $files = $_FILES['nidPhoto'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $engineerNID = '../../contents/engineer_lawyer_image/' . $random . $fileName;
    move_uploaded_file($fileTmpName, $engineerNID);

    $random1 = rand(1000,10000);
    $files = $_FILES['documentPhoto'];
    $fileName1 = $files['name'];
    $fileTmpName1 = $files['tmp_name'];
    $engineerCertificate = '../../contents/engineer_lawyer_image/' . $random1 . $fileName1;
    move_uploaded_file($fileTmpName1, $engineerCertificate);



    $insertEngineerDocument =$dataManipulation->updateEngineerDocument($engineerNID,$engineerCertificate,$id);
    if($insertEngineerDocument){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Upload - </b> Upload Your Document Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }


}
if(isset($_POST['upload_photo'])){
   var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

  $id =$_POST['id'];
    $random = rand(1000,10000);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/user_image/' . $random . $fileName;
    move_uploaded_file($fileTmpName, $image);




    $updateUserPhoto =$dataManipulation->updateUserPhoto($image,$id);
    var_dump($updateUserPhoto);
    if($updateUserPhoto){
        $_SESSION["UpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Upload - </b> Upload Your Photo Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }


}
if(isset($_POST['update_profile'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $id = $_POST['id'];
    $email =$_POST['email'];
  $name =$_POST['name'];
  $gender =$_POST['gender'];
  $age =$_POST['age'];
  $pass =$_POST['pass'];
  $address =$_POST['address'];
  $phone =$_POST['phone'];






  $updateUserProfile =$dataManipulation->updateUserProfile($id,$email,$name,$gender,$age,$pass,$address,$phone);
  //var_dump($updateEngineerLawyerProfile);
   if($updateUserProfile){
        $_SESSION["UpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Your Profile Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }


}
if(isset($_POST['add_project'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $user_id = $_POST['user_id'];
    $title =$_POST['title'];
  $address =$_POST['address'];
  $phone =$_POST['phone'];
  $owner_name =$_POST['owner_name'];
  $amount =$_POST['amount'];
  $advance =$_POST['advance'];
  $add_date =$_POST['add_date'];
  $date_line =$_POST['date_line'];






  $inserProject =$dataManipulation->inserProject($user_id,$title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line);
  //var_dump($updateEngineerLawyerProfile);
   if($inserProject){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Added - </b> Added New Project Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }


}
if(isset($_POST['add_client'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $user_id = $_POST['user_id'];
    $name =$_POST['name'];
  $address =$_POST['address'];
  $gender =$_POST['gender'];
  $age =$_POST['age'];
  $phone =$_POST['phone'];
  $join_date =$_POST['join_date'];
    $note =$_POST['note'];

    $random = rand(1000,10000);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/client_image/' . $random . $fileName;
    move_uploaded_file($fileTmpName, $image);




  $inserClient =$dataManipulation->inserClient($user_id,$name,$address,$gender,$age,$phone,$join_date,$note,$image);
  //var_dump($updateEngineerLawyerProfile);
   if($inserClient){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Insert - </b> Insert New Client Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");

    }


}
if(isset($_POST['edit_project'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $id = $_POST['id'];
    $title =$_POST['title'];
  $address =$_POST['address'];
  $phone =$_POST['phone'];
  $owner_name =$_POST['owner_name'];
  $amount =$_POST['amount'];
  $advance =$_POST['advance'];
  $add_date =$_POST['add_date'];
  $date_line =$_POST['date_line'];






  $updateProject =$dataManipulation->updateProject($id,$title,$address,$phone,$owner_name,$amount,$advance,$add_date,$date_line);
  //var_dump($updateEngineerLawyerProfile);
   if($updateProject){
        $_SESSION["updateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Project Data Successfully.</span>
                         </div>";
        Utility::redirect("../engineer_lawyer/add_project.php");


    }


}
if(isset($_POST['edit_client'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $id = $_POST['id'];
    $name =$_POST['name'];
    $address =$_POST['address'];
    $gender =$_POST['gender'];
    $age =$_POST['age'];
    $phone =$_POST['phone'];
    $join_date =$_POST['join_date'];
    $note =$_POST['note'];






  $updateClient =$dataManipulation->updateClient($id,$name,$address,$gender,$age,$phone,$join_date,$note);
  //var_dump($updateEngineerLawyerProfile);
   if($updateClient){
        $_SESSION["updateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Update - </b> Update Client Data Successfully.</span>
                         </div>";
        Utility::redirect("../engineer_lawyer/add_client.php");


    }


}
if(isset($_POST['add_case'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $user_id = $_POST['user_id'];
    $title =$_POST['title'];
    $court_name =$_POST['court_name'];
    $case_type =$_POST['case_type'];
    $case_no =$_POST['case_no'];
    $behalf =$_POST['behalf'];
    $party_name =$_POST['party_name'];
    $phone =$_POST['phone'];
    $respodent_name =$_POST['respodent_name'];
    $advocate_name =$_POST['advocate_name'];
    $advocate_phone =$_POST['advocate_phone'];
    $add_date =$_POST['add_date'];






  $insertCase =$dataManipulation->insertCase($user_id,$title,$court_name,$case_type,$case_no,$behalf,$party_name,$phone,$respodent_name,$advocate_name,$advocate_phone,$add_date);
  //var_dump($updateEngineerLawyerProfile);
   if($insertCase){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                              <b> Insert - </b> Insert New Case Data Successfully.</span>
                         </div>";
        Utility::redirect("../engineer_lawyer/case_details.php");

    }


}
if(isset($_GET['delete_project'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];



  $delete_project =$dataManipulation->delete_project($_GET['delete_project']);
  //var_dump($updateEngineerLawyerProfile);
   if($delete_project){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Project Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");


    }


}
if(isset($_GET['delete_client'])){

    $http = $_SERVER["HTTP_REFERER"];

  $delete_client =$dataManipulation->delete_client($_GET['delete_client']);

   if($delete_client){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Client Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");


    }


}
if(isset($_GET['deleteBookingData'])){

    $http = $_SERVER["HTTP_REFERER"];

  $delete_booking_history =$dataManipulation->delete_booking_history($_GET['deleteBookingData']);

   if($delete_booking_history){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Delete - </b> Delete Booking Data Successfully.</span>
                         </div>";
        Utility::redirect("$http");


    }


}
if(isset($_GET['confirm_engineer_id'])){

    $http = $_SERVER["HTTP_REFERER"];
    $userData=$dataManipulation->showUserDataByEmail($email);
    $user_id=$userData->id;
    $user_name=$userData->name;
    $user_email=$userData->email;

    $data=$dataManipulation->showEngineerProfileBYid($_GET['confirm_engineer_id']);
    $hired_id=$data->id;
    $hired_name=$data->fullname;
    $hired_email=$data->email;
    $type=$data->type;


  $inserHireData =$dataManipulation->inserHireData($user_id,$user_name,$user_email,$hired_id,$hired_name,$hired_email,$type);

    //var_dump($inserHireData);
   if($inserHireData){
        $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Confirm - </b> Send Confirm Message To $hired_name.</span>
                         </div>";
        Utility::redirect("$http");


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
if (isset($_POST['noticeInfo'])){
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $textarea = $_POST['noticeInfo'];
    $position = $_POST['Post-Type'];
    $dataManipulation->textareaPostSave($user_id,$user_name,$textarea,$position);
}
if (isset($_GET['getData']))
{
    $data = $dataManipulation->getPostDataToShow();
    echo json_encode($data);
}
if (isset($_POST['commentValue'])){
    $commentNo = $_POST['commentNo'];
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $commentValue = $_POST['commentValue'];
    $data = $dataManipulation->insertComment($user_id,$user_name,$commentValue,$commentNo);

}
if (isset($_POST['btn-save-changes'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $user_id = $_POST['user_no_from'];
    $user_update_post = $_POST['updatePostDataSection'];
    $data = $dataManipulation->postUpdateDataCollectviaUserId($user_id,$user_update_post);
    if ($data){
        $_SESSION['TostUpdate'] = "<div id=\"toast-container\" class=\"toast-top-right\"><div class=\"toast toast-success\" aria-live=\"polite\" style=\"\"><div class=\"toast-message\">Update your post Successfully</div></div></div>";
        Utility::redirect("$http_reffer");
    }
}
if (isset($_GET['managePostDelete'])){
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $id = $_GET['managePostDelete'];
    $managePostDelete = $dataManipulation->managePostDelete($id);
    if ($managePostDelete){
        $_SESSION['TostUpdate'] ="<div id=\"toast-container\" class=\"toast-top-right\"><div class=\"toast toast-error\" aria-live=\"assertive\" style=\"\"><div class=\"toast-message\">Delete post Successfully</div></div></div>";
        Utility::redirect("$http_reffer");
    }
}