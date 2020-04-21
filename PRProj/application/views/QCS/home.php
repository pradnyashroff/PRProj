 <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
 
 ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal Index</title>
     	   <?php include_once 'styles.php'; ?>
		    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
.sweet-alert h2 {

    font-size: 14px;
}

</style>

<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
  
  	
}


.col-lg-3{
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
<div class="wrapper"  >

 <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('') ?>" class="logo" >
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
		  <!-- Notifications: style can be found in dropdown.less
		    <li class="dropdown user user-menu ">
           
       <a href="<?php echo site_url('PR/Kanban/view_all') ?>"> <i class="fa fa-user-plus oranga"></i></a>
          </li>-->
		  
  
		  
		
          <!--<li class="dropdown notifications-menu">
		  	
			
			
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
			  

              <li class="footer"><a href="<?php echo site_url('');?>">View all</a></li>
            </ul>
          </li> -->
		
	
        <li class="dropdown user user-menu">
           
         <a href="#" style="color:#fff;"><i class="fa fa-user "></i> <?php echo ucwords($emp_name); 
		
		 ?></a>
          </li>
		   <li class="dropdown user user-menu">
           

					<a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>


					          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->

 
    <!-- Main content -->
   <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row" style="margin-left:8%;">
   <div class="col-lg-1"></div>
		<div class="col-lg-9"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';"> Choose Your Task</h3>
			</div>
		</div>	
		
	<div class="col-lg-1"></div>
	</div>
      <div class="row" style="margin-left:8%;">
		<div class="col-lg-1"></div>
	   <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/Mgmt_ctr/home');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='fas fa-shopping-cart' style='font-size:24px'></i>
				<h5 style="font-family:'exo';" >Purchase</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/QCS/index');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='fas fa-shopping-cart' style='font-size:24px'></i>
				<h5 style="font-family:'exo';" >Purchase</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	  

	   <div class="col-lg-3">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='fa fa-map-marker' style='font-size:24px'></i>
				<h5 style="font-family:'exo';">Asset Tracking</h5>
			</div>
		</div>
			<div class="col-lg-3">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<i class='fas fa-chalkboard-teacher' style='font-size:24px'></i>
				<h5 style="font-family:'exo';">Leave Management</h5>
			</div>
		</div>
		<div class="col-lg-1"></div>

 </div>
 <div class="row" style="margin-left:8%;">
		<div class="col-lg-1"></div>
           	<div class="col-lg-3">
				<a href="#" style="color:#FFFFFF;" >
				 	<div class="single_service_part dropdown">
						<i class="flaticon-chip"></i>
						<i class='fas fa-rupee-sign' style='font-size:24px'></i>
						 <h5 style="font-family:'exo';">Cash Reimbursement</h5>
					</div>
          
        
				</div>
		  </a>
				

		



			<div class="col-lg-3">
					  <div class="single_service_part dropdown">
							<i class="flaticon-chip"></i>
							<i class='fas fa-chalkboard-teacher' style='font-size:24px'></i>
							 <h5 style="font-family:'exo';">Visitor Management</h5>
						</div>
			</div>
			   <div class="col-lg-3">
						  <div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='fas fa-address-card' style='font-size:24px'></i>
								 <h5 style="font-family:'exo';">Meterial Gate Pass</h5>
							</div>
				</div>
					<div class="col-lg-1">
					</div>
</div>


       
       
		        





     <!-- ./col -->
	 
	 
     <!-- ./col -->
      </div>
     
  
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>