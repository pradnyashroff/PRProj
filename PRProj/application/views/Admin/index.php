 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Index</title>
     	   <?php include_once 'styles.php'; ?>
<style>
.sweet-alert h2 {

    font-size: 14px;
}
</style>
<style>
.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-8{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:4%;
				padding-bottom:4%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
				
				</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
  <?php

if (isset($this->session->userdata['logged_in'])) {
$emp_id = ($this->session->userdata['logged_in']['emp_id']);
$emp_code = ($this->session->userdata['logged_in']['emp_code']);
$plant_code = ($this->session->userdata['logged_in']['plant_code']);
$emp_name = ($this->session->userdata['logged_in']['emp_name']);
$emp_designation = ($this->session->userdata['logged_in']['emp_designation']);
$emp_dept = ($this->session->userdata['logged_in']['emp_dept']);
$emp_email = ($this->session->userdata['logged_in']['emp_email']);
$emp_mobile = ($this->session->userdata['logged_in']['emp_mobile']);
$pr_dh_id = ($this->session->userdata['logged_in']['pr_dh_id']);
$pr_allowed = ($this->session->userdata['logged_in']['pr_allowed']);
$emp_status = ($this->session->userdata['logged_in']['emp_status']);
}

else{
	
	redirect('Welcome/user_login_process', 'location');
} 
?>
<!-- Site wrapper -->
<div class="wrapper" >

    <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('Welcome/index') ?>" class="logo" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini " style="color:#fff;"><b>R</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO-WHITE.png" style="height:50px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle fa fa-caret-square-o-right " id="menu-toggle"  data-toggle="push-menu" role="button" style="font-size: 30px; color:#fff;   padding-bottom: 0px;    padding-top: 8px;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
<span class="emp_detail">Plant ID : <?php echo $plant_code; ?>  Rucha Engineers Pvt. Ltd - Unit <?php echo $plant_code; ?> </span>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
		  <!-- Notifications: style can be found in dropdown.less-->
		  
	  
		
         <!-- <li class="dropdown notifications-menu">
		  	
			
			
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o " style="color:#fff;"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
		
              <li class="header">  You have # Pending PR  </li>
			  
              <li>
               
                <ul class="menu">
  
                  <li>
                   <a href="#">
<i class="fa fa-warning text-yellow"></i> PR ##### is pending<br>     
  #date             </a>
                  </li>
				
                </ul>
              </li>
			  

              <li class="footer"><a href="<?php echo site_url('PR/Listview/index');?>">View all</a></li>
            </ul>
          </li> -->



	<li class="dropdown user user-menu">
           
         <a href="#" style="color:#fff;"> <?php echo ucwords($emp_name); 
		
		 ?></a>
		 
		 
		  <ul class="dropdown-menu">
		
              <li class="header"><a href="<?php echo site_url('Welcome/setnewpassword/'); ?>">Reset Password</a></li>
			  
             
			  

              <li class="footer"></li>
            </ul>
		 
		 
		 
          </li>
          <!-- Control Sidebar Toggle Button -->
           <li class="dropdown user user-menu">
           

					<a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>


					          </li>
        </ul>
      </div>
    </nav>
  </header>
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
   <div class="row" style="margin-left:10%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-9"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';"> Choose Your Task</h3>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	
	<div class="row" style="margin-left:15%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-4">
          
		  <a href="<?php echo site_url('Admin/Admin/new_employee');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='' style='font-size:24px'></i>
				<h5 style="font-family:'exo';" >Add Employee</h5>
			  </div>
		  </a>
		  
		
       </div>
       <!-- ./col -->
	     
		<div class="col-lg-4">
		     <a href="<?php echo site_url('Admin/Admin/employee_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='' style='font-size:24px'></i>
				<h5 style="font-family:'exo';">Employee Master</h5>
			</div>
			</a>
		</div></div>
		<div class="row" style="margin-left:15%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-4">
		     <a href="<?php echo site_url('Admin/Admin/pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='' style='font-size:24px'></i>
				<h5 style="font-family:'exo';">PR Master</h5>
			</div>
			</a>
		</div>
	
		<div class="col-lg-4">
          
		  <a href="<?php echo site_url('ATS/Ats/insert_excel');  ?>" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='' style='font-size:24px'></i>
				<h5 style="font-family:'exo';" >Insert Via Excel(ATS)</h5>
			  </div>
		  </a>
		  
		
       </div>
       <!-- ./col -->
	     
		<div class="col-lg-5" hidden>
		     <a href="<?php echo site_url('Admin/Admin/ElarEmpMaster');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='' style='font-size:24px'></i>
				<h5 style="font-family:'exo';">Claim Master</h5>
			</div>
			</a>
		</div>
		
	<div class="col-lg-1"></div>
	</div>	
  
      </section>
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>