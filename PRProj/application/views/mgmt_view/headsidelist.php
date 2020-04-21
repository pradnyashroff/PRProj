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
</style>
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
         		 <?php $image= $this->method_call->profile_pic_fetch($emp_code);
 if($image!=null){
	  foreach ($image->result() as $row)  {
	 ?>
	 
	
	
	 <img src="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" style="height:50px; width:50px;" class="img-circle"> <span style="padding-top:50%;color:white;"> <?php echo ucwords($emp_name);?> </span>
		 
		 
      <?php 
 }
 }?>
		  
   	 
          </li>
		  
		  
		    <li class="dropdown user user-menu">		 

     <a href="#" style="color:#fff;" ><i class="fa fa-cog"></i><span style="color:#fff;"> Settings</span></a>
		 
  <div class="dropdown-content">

 <p><i class="fa fa-user"></i> <a href="<?php echo site_url('purchase/PR/emp_profile/'.$emp_code); ?>"> Profile Update </a></p>

<hr >

 <p><i class="fa fa-lock"></i> <a href="<?php echo site_url('Welcome/reset_my_password');?>"> Reset Password </a></p>
 
 
<!--<hr >

 <p><i class="glyphicon glyphicon-wrench"></i> 
<a href="<?php echo base_url(); ?>dist/abc.pdf">Help</a></p> 
-->

  </div>


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
      
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li>
					<a href="<?php echo site_url('purchase/Mgmt_ctr/home') ?>" class=""><span class="fa fa-home"></span><span>HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
		
		
		
		<li class="treeview">
          <a href="#" class="">
            <i class="fa fa-inr"></i>
            <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
         <ul class="treeview-menu">
		  
				
		
		
		
		
		
	<li class="treeview">
	
	  <a href="#" class="">
           <i class="glyphicon glyphicon-list-alt"></i>
            <span >PR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 <li>
          <a href="<?php echo site_url('purchase/Mgmt_ctr/pr_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>View PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li> 

		
		<!--end-->
	
		</ul>
		
		

				<!-- QCS -->
				
			<li class="treeview">
          <a href="#" class="">
           <i class="fa fa-inr"></i> <span>QCS</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>

	
		 <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/Mgmt_ctr/qcs_list') ?>" class="">
            <i class="fa fa-check-square-o"></i> <span> View QCS </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		</ul>
		
		<!-- end-->
		
		
			<!-- Item Code -->
				
				<li class="treeview">
						 <a href="#" class="">
            <i class="glyphicon glyphicon-tasks"></i>
            <span>Item Code </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
		   <ul class="treeview-menu">
				
				<li>
          <a href="<?php echo site_url('purchase/Mgmt_ctr/itemcode_list') ?>" class="">
            <i class="fa fa-edit"></i> <span> View Item Code </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		

		
		   </ul>
		  
				</li>
<!-- end -->	
		
		
		<!-- Informal PO -->
		
				
				<li class="treeview">
						 <a href="#" class="">
            <i class="glyphicon glyphicon-modal-window"></i>
            <span>Informal PO </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
		   <ul class="treeview-menu">
				
<li>
          <a href="<?php echo site_url('purchase/Mgmt_ctr/informal_po_list') ?>" class="">
            <i class="fa fa-edit"></i> <span> View Informal PO   </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		

		
<!-- end --->	
		
		   </ul>
		  
				</li>
<!-- end -->
		
		<!-- capex -->
			
			<li class="treeview">
          <a href="#" class="">
           <i class="glyphicon glyphicon-edit"></i> <span>CAPEX</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
  
		   <ul class="treeview-menu">
				
		<li>
          <a href="<?php echo site_url('purchase/capex/capex_create_list') ?>" class="">
            <i class="fa fa-edit"></i> <span> View Capex </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		

		
	
		
		   </ul>
        </li>
		
<!-- end --->
		
          </ul>
		  
        </li>
		

			 <li>
          <a href="" class="">
            <i class="fa fa-user-plus"></i> <span>Asset Tracking</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span>  Leave Management</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span>Cash Reimbursement </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span> Visitor Management</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>

		<li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span>Material Gate Pass</span>
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
    </section>
    <!-- /.sidebar -->
  </aside>
