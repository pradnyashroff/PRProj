 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ATS</title>
     	   <?php include_once 'styles.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
 <?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$emp_name = ($this->session->userdata['logged_in']['emp_name']);
$at_id = ($this->session->userdata['logged_in']['at_id']);
$plant_group = ($this->session->userdata['logged_in']['plant_group']);
}

else{
	
	redirect('Welcome/user_login_process', 'location');
} 
?>
<!-- Site wrapper -->
<div class="wrapper"  >

 <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('ATS/ats/index') ?>" class="logo" style="background-color:#ee312f;">
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
           
         <a href="#" style="color:#fff;"><i class="fa fa-user "></i> <?php echo ucwords($emp_name); 
		
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
    <!-- Content Header (Page header) -->

 <ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
</li>
      </ol>
    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row">
   <div class="col-lg-12 col-xs-12" >
	<center>
<h3> Select Your Action

 </h3><br><br>	</center>
	
	</div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		  <a href="<?php echo site_url('ATS/Ats/new_asset') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

         <p>Create an Asset
</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('ATS/Ats/asset_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Asset Master
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		    <a href="<?php echo site_url('ATS/Ats/scan_asset') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Scan Asset
</p>
            </div>
           
          
          </div></a>
        </div>
		
	
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		    <a href="<?php echo site_url('ATS/Ats/archival_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Asset Verification Master
</p>
            </div>
           
          
          </div></a>
        </div>
		
		
		</div>
     
  
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>