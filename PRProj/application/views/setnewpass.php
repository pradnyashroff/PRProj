 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
 
 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Set New Password | User Login</title>
     	   <?php include_once 'purchase/styles.php'; ?>

</head>
<body class="hold-transition login-page" >
 


 
<div class="login-box">
  <div class="login-logo">
   <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO.png" style="height:100px;"></span>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter your New Password</p>
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

<form action="<?php echo site_url('Welcome/set_new_password');  ?>" method="post" onsubmit="return checkpass(this);">
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>    

  <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="name" placeholder="Password" required   style=" text-align:center;">
        <input type="hidden" class="form-control" name="user_id" value="<?php echo $id['user_id'];  ?>" required >
		
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  
	   <div class="form-group has-feedback">
        <input type="password" class="form-control" name="conf_password" id="name" placeholder="Confirm Password" required   style=" text-align:center;">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    
      <div class="row">
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn  btn-block btn-flat" style="background-color:#f6b69b;">Submit</button>
        </div>
		 <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
      </div>
  </form>
   
    <!-- /.social-auth-links -->

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



 
 

       	   <?php include_once 'purchase/scripts.php'; ?>
<script type="text/javascript" language="JavaScript">
<!--
//--------------------------------
// This code compares two fields in a form and submit it
// if they're the same, or not if they're different.
//--------------------------------
function checkpass(theForm) {
    if (theForm.password.value != theForm.conf_password.value)
    {
        alert('Password and confirm password is not same!');
        return false;
    } else {
        return true;
    }
}
//-->
</script> 
  
  </body>
</html>