 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal Index</title>
     	   <?php include_once 'styles.php'; ?>
<style>
.sweet-alert h2 {

    font-size: 14px;
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
$emp_supervisor_id = ($this->session->userdata['logged_in']['emp_supervisor_id']);
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
		  
  
		  
		
          <li class="dropdown notifications-menu">
		  	
			
			
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
          </li> 
		
	
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
  
   <div class="row">
   <div class="col-lg-12 col-xs-12" >
	<center>
<h3> Choose Your Task
 </h3><br><br>	</center>
	
	</div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="#" class="na">
          <div class="small-box bg-skincolor">
            <div class="inner">

         <p>Purchase<br></p>
            </div>
          
            
           
          </div>
		   </a>
		   <?php } else {  ?>
		   
		   <a href="">
          <div class="small-box bg-skincolor">
            <div class="inner">

         <p>Purchase<br></p>
            </div>
          
            
           
          </div>
		   </a>
		   <?php } ?>
        </div>
       
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Asset Tracking
</p>
            </div>
           
          
          </div></a>
        </div>
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Leave Management</p>
            </div>
         
          </div>
        </div>
        <!-- ./col -->
       
		        <div class="col-lg-4 col-xs-6">
				  <a href="<?php echo site_url('') ?>">
				  <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Cash Reimbursement</p>
            </div>
          
        
          </div> </a>
				
</div>





<div class="col-lg-4 col-xs-6">
				  <a href="<?php echo site_url('') ?>">
				  <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Visitor Management</p>
            </div>
          
        
          </div> </a>
				
</div>
     <!-- ./col -->
	 
	 
	 <div class="col-lg-4 col-xs-6">
				  <a href="<?php echo site_url('') ?>">
				  <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Material Gate Pass</p>
            </div>
          
        
          </div> </a>
				
</div>
     <!-- ./col -->
      </div>
     
  
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>