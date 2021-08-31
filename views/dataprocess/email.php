<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
$datamanipulation =new DataManipulation();
$registration =new registration();

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer( true);
use App\Utility\Utility;

$datamanipulation =new DataManipulation();
 //$userEmail=$_SESSION['email'];



if (isset($_POST['signup']))
{

    $registration->registrationSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $isExist = $registration->isExistEmail();
    $isExistUsers = $registration->isExistEmailUser();
    $type = $_POST['type'];
    $pass = $_POST['pass'];

    $emailToken = rand(100000, 999999);
    $_POST['emailToken'] = $emailToken;
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $email = $_POST['email'];
    $_SESSION['mm']=$email;

    $fullname = $_POST['fullname'];
    if ($isExist){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($isExistUsers){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        if ($type=='Lawyer' || $type=='Engineer'){

            if($type=='Engineer'){
                $type='Engineer';
            }elseif ($type=='Lawyer'){
                $type='Lawyer';
            }


            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'hireengineerlawyersystem@gmail.com';                     // SMTP username
                $mail->Password   = 'hireengineer123';                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
                //$mail->addAddress("$userEmail", 'User');     // Add a recipient
                $mail->addAddress($email);               // Name is optional
                $mail->addReplyTo($email, 'Validation Code');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Code';
                $mail->Body    = "<p>Confirmation  Code <b>$emailToken</b>  </p>";
                $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

                if($mail->send()){
                    $insert = $registration->insertLawyerEngineer($fullname,$email,$emailToken,$pass,$type);
                    if($insert){
                        Utility::redirect('../check_valid_mail.php');
                       // include '../check_valid_mail.php';

                    }
                }

            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //echo 'Message has been sent';
            }





            //$insert = $registration->insertLawyerEngineer();
           /* if ($insert){
                $_SESSION["isSuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Success - </b> $fullname Your Registration Successfully. </span>
                        </div>";
                Utility::redirect("$http");
            }*/

        }
        else{

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'hireengineerlawyersystem@gmail.com';                     // SMTP username
                $mail->Password   = 'hireengineer123';                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
                //$mail->addAddress("$userEmail", 'User');     // Add a recipient
                $mail->addAddress($email);               // Name is optional
                $mail->addReplyTo($email, 'Validation Code');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Code';
                $mail->Body    = "<p>Confirmation  Code <b>$emailToken</b>  </p>";
                $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

                if($mail->send()){
                    $insert = $registration->insertUser($fullname,$email,$emailToken,$pass,$type);
                    if($insert){
                        Utility::redirect('../check_valid_mail.php');
                        // include '../recover-password.php';

                    }
                }

            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //echo 'Message has been sent';
            }

            //$insert = $registration->insertUser();
           /* if ($insert){
                $_SESSION["isSuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Success - </b> $fullname Your Registration Successfully. </span>
                        </div>";
                Utility::redirect("$http");
            }*/
        }

    }
}

if(isset($_POST['send_message_form_engineer_lawyer_panel']))
{
    //var_dump($_POST);
    $subject = $_POST['subect'];
    $message_user = $_POST['mesaage'];
    $name_user = $_POST['name'];
    $email = $_POST['email'];
    $http_reffer = $_SERVER["HTTP_REFERER"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hireengineerlawyersystem@gmail.com';                     // SMTP username
        $mail->Password   = 'hireengineer123';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
        //$mail->addAddress("$userEmail", 'User');     // Add a recipient
        $mail->addAddress('hireengineerlawyersystem@gmail.com');               // Name is optional
        $mail->addReplyTo($email, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                              <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message_user</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){

            $_SESSION["SendMessage"] = "<div style='background-color: #218838' class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Success - </b> Your message sent to admin. </span>
                        </div>";
           Utility::redirect("$http_reffer");

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if (isset($_POST['forgot-pass'])){
    $emailToken = rand(100000, 999999);
    $_POST['emailToken'] = $emailToken;
    $http_reffer = $_SERVER['HTTP_REFERER'];
    $email = $_POST['email'];
    $checkAdminEmail = $registration->checkAdminEmail($email);
    $checkUserEmail = $registration->checkUserEmail($email);
    $checkEngineerLawyerEmail = $registration->checkEngineerLawyerEmail($email);

    if($checkAdminEmail || $checkUserEmail || $checkEngineerLawyerEmail){
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hireengineerlawyersystem@gmail.com';
            $mail->Password   = 'hireengineer123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
            $mail->addAddress("$email", 'User');
            $mail->addAddress('hireengineerlawyersystem@gmail.com');
            $mail->addReplyTo('hireengineerlawyersystem@gmail.com', 'Information');

            $mail->isHTML(true);
            $mail->Subject = "Verification Code";
            $mail->Body    = "<p>Here is your code <b> $emailToken </b></p>";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                if($checkUserEmail){
                    $update_forgot = $registration->checkUserActivetokenUpdate($email,$emailToken);
                    $_SESSION['mm'] = $email;
                    Utility::redirect("../recover-password.php");

                }elseif ($checkEngineerLawyerEmail){

                    $update_forgot = $registration->checkEngineerLawyerActivetokenUpdate($email,$emailToken);
                    $_SESSION['mm'] = $email;
                    Utility::redirect("../recover-password.php");
                }elseif ($checkAdminEmail){

                    $update_forgot = $registration->checkAdminActivetokenUpdate($email,$emailToken);
                    $_SESSION['mm'] = $email;
                    Utility::redirect("../recover-password.php");
                }


            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }
    }
    else{
        $_SESSION['errorMessageForgot'] = "<div class=\"alert alert-danger alert-dismissible rounded-0\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                  <h5><i class=\"icon fas fa-exclamation-triangle\"></i> Oops!</h5>
                  Sorry. Your email address is not registered.
                </div>";
        Utility::redirect("$http_reffer");
    }
}





if(isset($_POST['forgotPassword'])){
    $http_reffer = $_SERVER["HTTP_REFERER"];
    $_SESSION['email']=$_POST['email'];
    $receiver=$_POST['email'];
    $emailToken = rand(100000, 999999);
    $_POST['emailToken'] = $emailToken;

    $checkUserEmail=$datamanipulation->checkEmailInUserTable($receiver);
    var_dump($checkUserEmail);
    $checkNurseDoctorEmail=$datamanipulation->checkEmailInNurseDoctorTable($receiver);
    if($checkUserEmail){

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'oldagehomeservice@gmail.com';                     // SMTP username
            $mail->Password   = 'oldagehome12';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('oldagehomeservice@gmail.com', 'Old Age Home Service');
            $mail->addAddress("$receiver", 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Change password';
            $mail->Body    = "$emailToken";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){

                $status=$registration->update_user_emailtoken($emailToken,$receiver);
                if($status){
                    Utility::redirect('../verify.php');
                    //include_once ("../../views/login_register_forgot/verification_forgot_password.php");
                }


                /* utility::redirect("view_List.php");
                 include_once ("../../views/teacher/post-board.php");*/

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }



    }elseif($checkNurseDoctorEmail){

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'oldagehomeservice@gmail.com';                     // SMTP username
            $mail->Password   = 'oldagehome12';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('oldagehomeservice@gmail.com', 'Old Age Home Service');
            $mail->addAddress("$receiver", 'User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('oldagehomeservice@gmail.com', 'confirmation code');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Change password';
            $mail->Body    = "$emailToken";
            $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

            if($mail->send()){
                $status=$registration->update_nurse_doctor_emailtoken($emailToken,$receiver);
                if($status){
                    Utility::redirect('../verify.php');
                }


                /* utility::redirect("view_List.php");
                 include_once ("../../views/teacher/post-board.php");*/

            }

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //echo 'Message has been sent';
        }



    }
    else{

        $_SESSION['SendMessage']="<div class='alert alert-danger' >Wrong Email id.Please try again </div>";
        Utility::redirect("$http_reffer");
    }


}


if(isset($_POST['Mesaage_send_to_engineer'])){
    $receiver=$_POST['engineerEmail'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $name=$_POST['name'];


    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hireengineerlawyersystem@gmail.com';                     // SMTP username
        $mail->Password   = 'hireengineer123';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
        $mail->addAddress("$receiver", 'User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('hireengineerlawyersystem@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["SendMessage"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>Your message sent to $name.</span>
                        </div>";

            Utility::redirect("$http_reffer");

            /* utility::redirect("view_List.php");
             include_once ("../../views/teacher/post-board.php");*/

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}
if(isset($_POST['send_message_to_user'])){
    $receiver=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['mesaage'];
    $name=$_POST['name'];


    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hireengineerlawyersystem@gmail.com';                     // SMTP username
        $mail->Password   = 'hireengineer123';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('hireengineerlawyersystem@gmail.com', 'Hire Engineer Lawyer System');
        $mail->addAddress("$receiver", 'User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('hireengineerlawyersystem@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "
                               <table>
                              <tr><th>Message</th></tr>
                              <tr><td>$message</td></tr>
                              </table>";
        $mail->AltBody = 'this is the body in plain text for non-HTML main clients';

        if($mail->send()){
            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["SendMessage"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>Your message sent to $name.</span>
                        </div>";

            Utility::redirect("$http_reffer");

            /* utility::redirect("view_List.php");
             include_once ("../../views/teacher/post-board.php");*/

        }

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //echo 'Message has been sent';
    }



}