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
<div class="wrapper" style="background-color:#3482AE; text-transform: uppercase;">

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
	 
	
	
	 <img src="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" style="height:50px; width:60px;" class="img-circle"> <span style="padding-top:50%;color:white;"> <?php echo ucwords($emp_name);?> </span>
		 
		 
      <?php 
 }
 }?>
		 
		 
		  
		 
		 
		 
          </li>
          
		 <!--------------------------------------------menu submenu start------------------------------------------------->

	<li class="dropdown user user-menu">		 
	
	 <a href="#" data-toggle="dropdown" style="color:#fff;" ><i class="fa fa-cog"></i><span style="color:#fff;"> Settings</span></a>

    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="<?php echo site_url('purchase/QCS/emp_profile/'.$emp_code); ?>">Profile Update</a></li>
      <li><a tabindex="-1" href="<?php echo site_url('Welcome/reset_my_password');?>">Reset Password </a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Help <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Purchase_Process_Flow_13072019.pdf') ?>">Purchase Flow</a></li>
          <li><a tabindex="-1" href="#">PR User Manual</a></li>
          <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/QCS_System_User_Manual.pdf') ?>">QCS User Manual</a></li>
		    <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Informal_PO_System_User_Manual.pdf') ?>">PO User Manual</a></li>
			  <li><a tabindex="-1" href="<?php echo base_url('dist/PR_guidelines/Capex_System_User_Manual1.pdf') ?>">CAPEX User Manual</a></li>
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

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar" id="sidebar" style="background-color:#3482AE; color:#FFFFFF">
    <!-- sidebar: style can be found in sidebar.less -->
	 <div id="split-bar"></div>
   <section class="sidebar" style="font-size:14px;color:#FFFFFF">
      <!-- Sidebar user panel -->
      
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color:#3482AE;color:#FFFFFF">MAIN NAVIGATION</li>
        
    <hr style="margin-bottom:0px;margin-top:0px">
		<li>
					<a href="<?php echo site_url('Welcome/index') ?>" class=""><span class="fa fa-home" style="color:#FFFFFF"></span><span style="color:#FFFFFF">HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
		
		
		
		<li class="treeview">
          <a href="#" class="">
            <i class="fa fa-inr" style="color:#FFFFFF"></i>
            <span style="color:#FFFFFF">Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
         <ul class="treeview-menu">
		  
				
		
		
		
		
		
	<li class="treeview" style="background-color:#3481AE;">
	
	  <a href="#" class="">
           <i class="glyphicon glyphicon-list-alt"style="color:#FFFFFF"></i>
            <span style="color:#FFFFFF">PR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 <li>
          <a href="<?php echo site_url('purchase/PR/create_pr') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Create PR</span>
           
          </a>


        </li> 
	
	
	<li class="treeview">
	
	          <a href="#" class="">
            
            <span style="color:#FFFFFF"> Check existing PR Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		
		<li>
          <a href="<?php echo site_url('purchase/PR/pr_master_draft') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Drafted PR</span>
           
          </a>


        </li>
		
		<li>
          <a href="<?php echo site_url('purchase/PR/pr_master') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Pending PR</span>
           
          </a>


        </li><li>
          <a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>" class="">
            <i class="glyphicon glyphicon-check" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Processed PR</span>
           
          </a>


        </li>
		<li>
          <a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>" class="">
            <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Rejected PR</span>
           
          </a>


        </li>
		
	
		</ul>
	</li>
	<!-- end -->
				<li class="treeview">
          <a href="#" class="">
            
            <span style="color:#FFFFFF">Check Approval status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/PR/Pending_Approval') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Pending Approval</span>
           
          </a>


        </li>
		<li>
          <a href="<?php echo site_url('purchase/PR/processed_master') ?>" class="">
            <i class="glyphicon glyphicon-check" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Processed PR </span>
           
          </a>


        </li>
		 </ul>
		</li>
		
		
		<!--end-->
	
		</ul>
		
		

				<!-- QCS -->
				
			<li class="treeview" style="background-color:#3481AE;">
          <a href="#" class="">
           <i class="fa fa-inr" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">QCS</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>

	
		 <ul class="treeview-menu">
		     <li>
          <a href="<?php echo site_url('purchase/PR/PendingQCSList') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Pending </span>
           
          </a>


        </li>
        
        	<li>
          <a href="<?php echo site_url('purchase/PR/RejectedQCSList') ?>" class="">
            <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Rejected </span>
           
          </a>


        </li>
		 	<li>
          <a href="<?php echo site_url('purchase/PR/approved_list') ?>" class="">
            <i class="fa fa-check-square-o" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Apprved </span>
           
          </a>


        </li>
		</ul>
		
		
		
		<!-- Item Code -->
				
				<li class="treeview" style="background-color:#3481AE;">
						 <a href="#" class="">
            <i class="glyphicon glyphicon-tasks" style="color:#FFFFFF"></i>
            <span style="color:#FFFFFF">Item Code </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
		   <ul class="treeview-menu">
				
				<li>
          <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Create Item Code </span>
           
          </a>
	

        </li>
		
		<li class="treeview">
	
	          <a href="#" class="">
            
            <span style="color:#FFFFFF">Existing Item Code Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
			<li>
          <a href="<?php echo site_url('purchase/itemcode/itemcode_draftlist') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Draft </span>
           
          </a>
		

        </li>
		
		
				<li>
          <a href="<?php echo site_url('purchase/itemcode/pending_list') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Pending Approval </span>
           
          </a>
			

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/itemcode/approved_itemcode_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>
		

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/itemcode/rejected_Itemcode') ?>" class="">
            <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Rejected </span>
           
          </a>
		

        </li>
		
			
		</ul>
		</li>
		<!-- Item Code approval -->

		<li class="treeview">
          <a href="#" class="">
            
            <span style="color:#FFFFFF">Item Code  Approval Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/itemcode/approval_list') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Pending</span>
           
          </a>


        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/itemcode/approved_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>


        </li>
		
	
		 </ul>
		</li>
		
<!-- end --->	
		
		   </ul>
		  
				</li>
<!-- end -->



	<!-- Informal PO -->
		
				
				<li class="treeview" style="background-color:#3481AE;">
						 <a href="#" class="">
            <i class="glyphicon glyphicon-modal-window" style="color:#FFFFFF"></i>
            <span style="color:#FFFFFF">Informal PO </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
		   <ul class="treeview-menu">
				
<li>
          <a href="<?php echo site_url('purchase/informal_po/po_pending_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Create Informal PO   </span>
           
          </a>
		

        </li>
		
		<li class="treeview">
	
	          <a href="#" class="">
            
            <span style="color:#FFFFFF">Existing Informal PO Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
			
		
				<li>
         <a href="<?php echo site_url('purchase/informal_po/pending_list') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Pending Approval </span>
           
          </a>
		

        </li>
		
			<li>
       <a href="<?php echo site_url('purchase/informal_po/approved_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>
	

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/informal_po/po_rejected_list') ?>" class="">
            <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Rejected </span>
           
          </a>


        </li>
		
			
		</ul>
		</li>
		<!-- Informal PO  approval -->

		<li class="treeview">
          <a href="#" class="">
            
            <span style="color:#FFFFFF">Informal PO  Approval Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/informal_po/informal_po_approval') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Pending</span>
           
          </a>


        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/informal_po/po_approved_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>


        </li>
		
	
		 </ul>
		</li>
		
<!-- end --->	
		
		   </ul>
		  
				</li>
<!-- end -->	


		<!-- capex -->
		
			<li class="treeview" style="background-color:#3481AE;">
          <a href="#" class="">
           <i class="glyphicon glyphicon-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">CAPEX</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>

		   <ul class="treeview-menu">
				
		<li>
          <a href="<?php echo site_url('purchase/capex/capex_create_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Create Capex </span>
           
          </a>
	

        </li>
		
		<li class="treeview">
	
	          <a href="#" class="">
            
            <span style="color:#FFFFFF">Existing Capex Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
			
			
			
				<li>
         <a href="<?php echo site_url('purchase/capex/capex_draft_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Draft Capex </span>
           
          </a>


        </li>
		
		
		
				<li>
         <a href="<?php echo site_url('purchase/capex/pending_list') ?>" class="">
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Pending Approval </span>
           
          </a>
	

        </li>
		
			<li>
       <a href="<?php echo site_url('purchase/capex/approved_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>
	

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/capex/rejected_list') ?>" class="">
            <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Rejected </span>
           
          </a>
		

        </li>
		
			
		</ul>
		</li>
		<!-- Capex approval -->

		<li class="treeview">
          <a href="#" class="">
            
            <span style="color:#FFFFFF">Capex Approval Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
			 	<li>
          <a href="<?php echo site_url('purchase/capex/capx_pending_list') ?>" class="">
       
            <i class="glyphicon glyphicon-alert " style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Pending</span>
           
          </a>


        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/capex/capex_approver_list') ?>" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Approved </span>
           
          </a>


        </li>
		
	
		 </ul>
		</li>
		
	
		
		   </ul>
        </li>
		

		
          </ul>
		  
        </li>
		

	
					

		
		
		
	<!-- end -->			
				
		
	
		
		
		
		
				
			<hr style="margin-bottom:0px;margin-top:0px">	
			 <li>
          <a href="" class="">
            <i class="fa fa-user-plus" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Asset Tracking</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">  Leave Management</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Cash Reimbursement </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		 <li>
          <a href="#" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF"> Visitor Management</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>

		<li>
          <a href="#" class="">
            <i class="fa fa-edit" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Material Gate Pass</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		<li>
					<a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off" style="color:#FFFFFF"></i> <span style="color:#FFFFFF">Logout</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
	
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>