<?php
include_once "../../vendor/autoload.php";
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION))
{session_start();}

$reg = new Registration();
if (isset($_POST['signup']))
{
    $reg->registrationSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $isExist = $reg->isExistEmail();
    $isExistUsers = $reg->isExistEmailUser();
    $type = $_POST['type'];
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
            $emailToken = rand(100000, 999999);
            $_POST['emailToken'] = $emailToken;
            $http_reffer = $_SERVER['HTTP_REFERER'];
            $email = $_POST['email'];


                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'houseflatbooking@gmail.com';                     // SMTP username
                    $mail->Password   = 'houseflat123';                               // SMTP password
                    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 465;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('houseflatbooking@gmail.com', 'House and Flat Rental System');
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
                        $status =$registration->insertRegisterData($name,$email,$phone,$user_type,$password,$destinationFile,$emailToken);
                        if($status){
                            Utility::redirect('../login_register_forgot/verification.php');
                            //include '../login_register_forgot/verification.php';

                        }
                    }

                }
                catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    //echo 'Message has been sent';
                }





            $insert = $reg->insertLawyerEngineer();
            if ($insert){
                $_SESSION["isSuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Success - </b> $fullname Your Registration Successfully. </span>
                        </div>";
                Utility::redirect("$http");
            }
        }
        else{
            $insert = $reg->insertUser();
            if ($insert){
                $_SESSION["isSuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Success - </b> $fullname Your Registration Successfully. </span>
                        </div>";
                Utility::redirect("$http");
            }
        }

    }
}
if (isset($_POST['confirm'])){
    $reg->member_idSetData($_POST);
    $status = $reg->isExistMemberId($_POST['member_id']);
    $http = $_SERVER["HTTP_REFERER"];
    if ($status){
        $data = $reg->updateUser($_POST['email']);

        if ($data)
        {
            Utility::redirect("../login.php");
        }
    }

    else{
        $_SESSION["notMatchMemberID"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Member Id not Matched. Please try again. </span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_POST["signin"]))
{
    $reg->authSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $admin = $reg->admin();
    $engineer_lawyer = $reg->engineer_lawyer();
    $moderatorApprovedNo = $reg->moderatorApprovedNo();
    $user = $reg->user();
    if ($admin){
        $_SESSION["email"] = $admin->email;
        Utility::redirect("../admin/controller.php");
    }
    elseif ($moderatorApprovedNo){
        $_SESSION["isErorMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Sorry..! Id not activated yet </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($engineer_lawyer){
        $_SESSION["email"] = $engineer_lawyer->email;
        $_SESSION["id"] = $engineer_lawyer->id;
        Utility::redirect("../engineer_lawyer/payment.php");

    }
    elseif ($user){
        $_SESSION["email"] = $user->email;
        $_SESSION["id"] = $user->id;
        Utility::redirect("../users/my_profile.php");
    }
    else{
        $_SESSION["isErorMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Incorrect email and password. </span>
                        </div>";
        Utility::redirect("$http");
    }
}