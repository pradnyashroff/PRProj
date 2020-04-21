 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
 
 <?php
if (isset($this->session->userdata['logged_in'])) {

header("location: https://www.rucha.co.in/portal/index.php/Welcome/user_login_process");
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico"  style="height:20px;">	
  <title>Login | User Login</title>
     	   <?php include_once 'purchase/styles.php'; ?>
 
</head>
<body class="hold-transition login-page" oncontextmenu="return false;"> 
 

<!--<marquee>  <h1 style ="color:red;"> Website  Is In Under Maintenance Please Try Again After Some Time </h1> </marquee>-->

<div class="login-box">
    
   <!--<p id="demo" style = "font-size:30px;color:red;text-align:center;"></p>-->
  
    
  <div class="login-logo">
   <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO.png" style="height:100px;"></span>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="font-family:'exo'">
      <span style="font-family:Exo; font-size:28px; text-align: center; "> <p style="text-align: center;"><b style="color:#367FA8;font-family:'exo'" >RUCHA</b> <b>PORTAL</b> LOGIN </p> </span>
     <!--<p class="login-box-msg">Sign in to start your session</p>-->
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
<?php echo form_open('Welcome/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>  
<!--<img src="<?php echo base_url(); ?>dist/img/BOOq7hk.gif" style="width:100%; height:20%">-->


 <div class="form-group has-feedback">
        <input type="number"    class="form-control" name="emp_code" id="name" placeholder="User ID" required   style=" text-align:center; font-family:'exo'">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"     class="form-control" name="emp_password" id="password"  placeholder="Password" required style=" text-align:center; font-family:'exo'">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    <div class="row">
     
        <!-- /.col -->
  <div class="col-xs-6">
          <button type="submit"    class="btn  btn-block btn-flat" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';">Submit</button>
        </div>
		 <div class="col-xs-6">
          <a  class="btn  btn-block btn-flat"    style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35); font-family:'exo'" href="<?php echo site_url('Welcome/reset_my_password');?>">Reset Password?</a>
        </div>
    
      </div>
  <?php echo form_close(); ?>
   <div class="row">
     
        <!-- /.col -->
        <div class="col-xs-12">
	<!-- ter><span>Support Contact :<br>   Email ID: mis@ruchagroup.com   </span>
		<br>Contact No: 9860300193</center>-->
	
        </div>
		
        <!-- /.col -->
      </div>

    <!-- /.social-auth-links -->

  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



 
 

       	   <?php include_once 'purchase/scripts.php'; ?>
 	   <script>
// Set the date we're counting down to
var countDownDate = new Date("AUG 12, 2019 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
  <script>
       $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    }); 
  </script>
  </body>
</html>