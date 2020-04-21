 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tech Support</title>
     	   <?php include_once 'styles.php'; ?>
<style>

.col-lg-4{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:3%;
				padding-bottom:3%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">
 
 <?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['emp_code']);
$emp_name = ($this->session->userdata['logged_in']['emp_name']);
//$at_id = ($this->session->userdata['logged_in']['at_id']);
//$plant_group = ($this->session->userdata['logged_in']['plant_group']);
}

else{
	
	redirect('Welcome/user_login_process', 'location');
} 
?>
<!-- Site wrapper -->
<div class="wrapper"  >

 <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('ATS/ats/home') ?>" class="logo" style="background-color:#ee312f;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini " style="color:#fff;"><b>Y</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/logo.png" style="height:35px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:-webkit-linear-gradient(left, #ee312f, #a82f59,#682e7d);">
      <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle fa fa-caret-square-o-right " id="menu-toggle"  data-toggle="push-menu" role="button" style="font-size: 30px; color:#fff;   padding-bottom: 0px;    padding-top: 8px;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		 <li class="dropdown user user-menu">
         <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          </li>
         <li class="dropdown user user-menu">
          <a href="#" style="color:#fff;"><i class="fa fa-user "></i> <?php echo $emp_name; 
		 ?></a>
          </li>
		   <li class="dropdown user user-menu">
			<a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>
			</li>
        
        </ul>
      </div>
    </nav>
  </header>
 <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  <div class="row" style="margin-left:8%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-8"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';">  ATS Admin</h3>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	
	<div class="row" style="margin-left:8%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-4">
		  <a href="<?php echo site_url('ATS/Ats/new_employee');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Add a Employee</h5>
			  </div>
		  </a>
		
       </div>
	   <div class="col-lg-4">
		  <a href="<?php echo site_url('ATS/Ats/employee_master');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Employee Master</h5>
			  </div>
		  </a>
		
       </div>
	    </div>
	   <div class="row" style="margin-left:8%;">
	   <div class="col-lg-1"></div>
	   <div class="col-lg-4">
		  <a href="<?php echo site_url('ATS/Ats/plants');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Plants</h5>
			  </div>
		  </a>
		
       </div>
	   <div class="col-lg-4">
		  <a href="<?php echo site_url('ATS/Ats/insert_excel');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Insert Via Excel</h5>
			  </div>
		  </a>
		
       </div>
	   </div>
      
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>