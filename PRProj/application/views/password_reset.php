 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
 
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password | User Login</title>
     	   <?php include_once 'purchase/styles.php'; ?>

</head>
<body class="hold-transition login-page" >
 


 
<div class="login-box">
  <div class="login-logo">
   <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO.png" style="height:100px;"></span>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter your User ID to Reset your Password</p>
	<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php echo form_open('Welcome/reset_password'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>    

  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="emp_code" id="name" placeholder="User ID" required   style=" text-align:center;">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    
      <div class="row">
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
           
          <button type="submit" class="btn  btn-block btn-flat" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Submit</button>
        </div>
		 <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
      </div>
  <?php echo form_close(); ?>
   
    <!-- /.social-auth-links -->

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



 
 

       	   <?php include_once 'purchase/scripts.php'; ?>

  
  </body>
</html>