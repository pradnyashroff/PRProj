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
	 
    <a href="<?php echo site_url('ATS/ats/home') ?>" class="logo" style="background-color:#ee312f;">
	 
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
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
		  <!-- Notifications: style can be found in dropdown.less-->
		  
		  
		
 <li class="dropdown user user-menu">
           
         <a href="#" style="color:#fff;"> <?php echo ucwords($emp_name); 
		
		 ?></a>
          </li>
          <!-- Control Sidebar Toggle Button -->
           <li class="dropdown user user-menu">
           

					<a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>


					          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar" id="sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
	 <div id="split-bar"></div>
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
    <?php if ($emp_code=="111111" && $emp_code=="111112"){ ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li>
					<a href="<?php echo site_url('ATS/Ats/home') ?>" class=""><span>HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
		
				
			 <li>
          <a href="<?php echo site_url('ATS/Ats/new_employee') ?>" class="">
            <i class="fa fa-edit"></i> <span>  Add a Employee</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('ATS/Ats/employee_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Employee Master </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('ATS/Ats/plants') ?>" class="">
            <i class="fa fa-edit"></i> <span> Plants </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		 <li>
          <a href="<?php echo site_url('ATS/Ats/insert_excel') ?>" class="">
            <i class="fa fa-edit"></i> <span> Insert Via Excel </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		
		
		
					<li>
					<a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off"></i> <span>Logout</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
	
      </ul>
	<?php }
else {
	?>
	  <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li>
					<a href="<?php echo site_url('ATS/Ats/index') ?>" class=""><span>HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
		
				
			 <li>
          <a href="<?php echo site_url('ATS/Ats/new_asset') ?>" class="">
            <i class="fa fa-edit"></i> <span> Create an Asset</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('ATS/Ats/asset_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Asset Master </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('ATS/Ats/scan_asset') ?>" class="">
            <i class="fa fa-edit"></i> <span> Scan Asset </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="<?php echo site_url('ATS/Ats/archival_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Asset Verification Master </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
        
        
        	 <li>
          <a href="<?php echo site_url('ATS/Ats/printBarcode') ?>" class="">
            <i class="fa fa-edit"></i> <span> Print Barcode </span>
             
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		
					<li>
					<a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off"></i> <span>Logout</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
	
      </ul>
	
<?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>
