
<!-- Site wrapper -->
<div class="wrapper"  >

<header class="main-header" style="border-bottom:1px solid white;"  >
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
		  
	  
		
      


<li class="dropdown user user-menu">
         		 <?php $image= $this->method_call->profile_pic_fetch($emp_code);
 if($image!=null){
	  foreach ($image->result() as $row)  {
	 ?>
	 
	
	
	 <img src="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" style="height:50px; width:50px;" class="img-circle"> <span style="padding-top:50%;color:white;"> <?php echo ucwords($emp_name);?> </span>
		 
		 
      <?php 
 }
 }?>
 
		 
          </li>
<!--------------------------------------------menu submenu start------------------------------------------------->

	<li class="dropdown user user-menu">		 
	
	 <a href="#" data-toggle="dropdown" style="color:#fff;" ><i class="fa fa-cog"></i><span style="color:#fff;"> Settings</span></a>

    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="<?php echo site_url('purchase/PR/emp_profile/'.$emp_code); ?>">Profile Update</a></li>
      <li><a tabindex="-1" href="<?php echo site_url('Welcome/reset_my_password');?>">Reset Password </a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Help <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Purchase_Process_Flow_13072019.pdf') ?>">Purchase Flow</a></li>
          <li><a tabindex="-1" href="#">PR User Manual</a></li>
          <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/QCS_System_User_Manual.pdf') ?>">QCS User Manual</a></li>
		    <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Informal_PO_System_User_Manual.pdf') ?>">PO User Manual</a></li>
			  <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Capex_System_User_Manual.pdf') ?>">CAPEX User Manual</a></li>
			  <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/PR_System_Password_Reset_Manual_Ver1.0.pdf') ?>">Reset Password Manual</a></li>
          
        </ul>
      </li>
    </ul>

</li>
	

		  
<!--------------------------------------------menu submenu end------------------------------------------------->



		  
	
		
          <!-- Control Sidebar Toggle Button -->
           <li class="dropdown user user-menu">
           

					<a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>


					          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

 