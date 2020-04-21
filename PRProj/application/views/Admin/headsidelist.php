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

    <hr style="margin-bottom:0px;margin-top:0px">
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar" id="sidebar" style="background-color:#3482AE; color:#FFFFFF">
    <!-- sidebar: style can be found in sidebar.less -->
	 <div id="split-bar"></div>
	  <hr style="margin-bottom:0px;margin-top:0px">
   <section class="sidebar" style="font-size:14px;color:#FFFFFF;background-color:#3482AE;">
      <!-- Sidebar user panel -->
   
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="background-color:#3482AE;">
        <li class="header" style="color:#FFFFFF;background-color:#3482AE;">MAIN NAVIGATION</li>
		<hr style="margin-bottom:0px;margin-top:0px">
		<li>
		<a href="<?php echo site_url('Admin/Admin/index') ?>" class="" style="color:#FFFFFF;background-color:#3482AE;"><span style="color:#FFFFFF;background-color:#3482AE;">HOME</span></a>
		<hr style="margin-bottom:0px;margin-top:0px">
		</li>			
		 <li>
          <a href="<?php echo site_url('Admin/Admin/new_employee') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> New Employee</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('Admin/Admin/employee_master') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Employee Master </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
	<li>
          <a href="<?php echo site_url('Admin/Admin/pr_master') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">PR Master </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
	
						
					<li>
					<a href="<?php echo site_url('welcome/logout') ?>" class="" style="color:#FFFFFF;"><i class="fa fa-power-off" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Logout</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
	
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
