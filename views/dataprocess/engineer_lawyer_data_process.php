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
   // var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

  $id =$_POST['id'];
    $random = rand(1000,10000);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/engineer_lawyer_image/' . $random . $fileName;
    move_uploaded_file($fileTmpName, $image);




    $insertEngineerDocument =$dataManipulation->updateEngineerLawyerPhoto($image,$id);
    if($insertEngineerDocument){

        Utility::redirect("$http");

    }


}
if(isset($_POST['update_engineer_lawyer_profile'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $id = $_POST['id'];
    $email =$_POST['email'];
  $fullname =$_POST['fullname'];
  $age =$_POST['age'];
  $pass =$_POST['pass'];
  $address =$_POST['address'];
  $category =$_POST['category'];
  $experience =$_POST['experience'];
  $office =$_POST['office'];
  $university =$_POST['university'];
  $city =$_POST['city'];
  $pnumber =$_POST['pnumber'];





  $updateEngineerLawyerProfile =$dataManipulation->updateEngineerLawyerProfile($id,$email,$fullname,$age,$pass,$address,$category,$experience,$office,$university,$city,$pnumber);
  //var_dump($updateEngineerLawyerProfile);
   if($updateEngineerLawyerProfile){
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
if(isset($_POST['paymentDetails'])){
    //var_dump($_POST);
    $http = $_SERVER["HTTP_REFERER"];

    $engi_law_id = $_POST['engi_law_id'];
    $name = $_POST['name'];
    $pay_amount =$_POST['amount'];
  $type =$_POST['type'];
  $number =$_POST['number'];
  $duration =$_POST['duration'];
  $transaction =$_POST['transaction'];
  //$date =$_POST['date'];






  $inserManyDetails =$dataManipulation->inserManyDetails($engi_law_id,$name,$pay_amount,$type,$number,$duration,$transaction);
  //var_dump($updateEngineerLawyerProfile);
   if($inserManyDetails){
        $_SESSION["insertMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Send - </b> Send Your Payment Details Successfully.</span>
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