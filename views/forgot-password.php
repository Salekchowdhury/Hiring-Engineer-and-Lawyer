<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hiring Engineer Lawyer System</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../contents/css/nabil.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card callout callout-info" style="border-top: 3px solid #a75806; border-top-left-radius: 15%;border-left: 4px solid #a75806;  ">
      <div class="card-header text-center">

      </div>
      <?php
      if(isset($_SESSION['errorMessageForgot'])){
          echo $_SESSION['errorMessageForgot'];
          unset($_SESSION['errorMessageForgot']);
      }
      ?>
    <div class="card-body">
      <p class="login-box-msg" style="color: #28a745">You forgot your password? Here you can easily retrieve a new password.</p>
      <form autocomplete="off" action="dataprocess/email.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="forgot-pass" style="background: #a75806;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-primary btn-block"><i class="fa fa-key mr-2" aria-hidden="true"></i>Request new password</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
  </div>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/bappi.min.js"></script>
</body>
</html>
