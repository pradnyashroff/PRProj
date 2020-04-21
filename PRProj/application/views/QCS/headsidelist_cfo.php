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

  <header class="main-header"style="background-color:black;">
    <!-- Logo -->
    <a href="<?php echo site_url('Welcome/index') ?>" class="logo" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini " style="color:#fff;"><b>R</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO-WHITE.png" style="height:50px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:black;" >
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
			  

              <li class="footer"><a href="<?php echo site_url('PR/Listview/index');?>">View all</a></li>
            </ul>
          </li> -->
 
	<!--	  
		  <?php $noti= $this->method_call->storenoti($emp_code);
 if($noti!=null){
			?>
			   <li class="dropdown notifications-menu">
		  	
			
			
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o oranga"></i>
              <span class="label label-warning"><?php echo count($noti->result()); ?></span>
            </a>
            <ul class="dropdown-menu">
		
              <li class="header">  You have <?php echo count($noti->result()); ?> Approved PR  </li>
			  
              <li>
               
                <ul class="menu">
                  <?php 
				  
				   
				  
foreach ($noti->result() as $row)  
         {  ?>
		  
		
                  <li>
                   <a href="<?php echo site_url('purchase/QCS/draft_qcs_step_one/'.$row->qcs_id);?>">
<i class="fa fa-warning text-yellow"></i> QCS <?php echo $row->qcs_id; ?> is Pending<br>     
  <?php echo $row->qcs_date; ?>               </a>
                  </li>
					<?php }  ?>
                </ul>
              </li>
              <li class="footer">  <a href="<?php echo site_url('purchase/QCS/draft_qcs_step_one') ?>">View all</a></li>
            </ul>
          </li> 
		  
			  
			  
		  <?php } ?>
		-->   
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
	
		
		    <?php
		        if($emp_dept == '25' || $emp_code == '100121'|| $emp_code == '100198'){
		            ?>
		            	<li>
		    
					<a href="<?php echo site_url('QCS/index') ?>" class=""><span class="fa fa-home"></span><span>HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>	
		<?php
		}
		 
else
{
    ?>
    <li>
		    
					<a href="<?php echo site_url('Welcome/index') ?>" class=""><span class="fa fa-home"></span><span>HOME</span></a>
<hr style="margin-bottom:0px;margin-top:0px">

					</li>			
					
<?php
    }
	?>		
			
		
	
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
	
		
	
		

	
	
				<li class="treeview">
          <a href="#" class="">
            
            <span>Check Approval status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/PR/Pending_Approval') ?>" class="">
            <i class="fa fa-edit"></i> <span> Pending Approval</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		<li>
          <a href="<?php echo site_url('purchase/PR/processed_master') ?>" class="">
            <i class="glyphicon glyphicon-check"></i> <span> Processed PR </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 </ul>
		</li>
		
	<!--
				<li class="treeview">
          <a href="#" class="">
            
            <span>PR Approval status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/QCS/Pending_Approval') ?>" class="">
            <i class="fa fa-edit"></i> <span> Pending Approval</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/sourcing_approved') ?>" class="">
            <i class="fa fa-edit"></i> <span> Approved PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		 </ul>
		</li>
		
		-->
		<!--end-->
	
		</ul>
		
		

					<!-- qcs-->
				
				<li class="treeview">
						 <a href="#" class="">
            <i class="fa fa-inr"></i>
            <span>QCS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  
		   <ul class="treeview-menu">
				
				<li>
          <a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" class="">
            <i class="fa fa-edit"></i> <span> Create QCS </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		<li class="treeview">
	
	          <a href="#" class="">
            
            <span>Check existing QCS Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
			<li>
          <a href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" class="">
            <i class="fa fa-edit"></i> <span> Draft </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/qcs_pending_approval_list') ?>" class="">
            <i class="fa fa-edit"></i> <span> Pending Approval </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/approved_qcs_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>Approved </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/qcs_rejected') ?>" class="">
            <i class="fa fa-edit"></i> <span>Rejected </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/qcs_step2_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>Incomplete QCS   </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		</ul>
		</li>
		<!-- qcs approval -->

		<li class="treeview">
          <a href="#" class="">
            
            <span>QCS Approval Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/QCS/sourcing_head_approve_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>  Pending</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/QCS/approved1_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>Approved </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
	
		 </ul>
		</li>
		
<!-- end --->	
		
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
				

		
		<li class="treeview">
	
	          <a href="#" class="">
            
            <span>Existing Informal PO Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
			
		
				<li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span> Pending Approval </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span>Approved </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="#" class="">
            <i class="fa fa-edit"></i> <span>Rejected </span>
           
          </a>
			<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			
		</ul>
		</li>
		
		<li class="treeview">
		
          <a href="#" class="">
            
            <span>Informal PO  Approval Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/informal_po/informal_po_approval') ?>" class="">
            <i class="fa fa-edit"></i> <span>  Pending</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
			<li>
          <a href="<?php echo site_url('purchase/informal_po/po_approved_list') ?>" class="">
            <i class="fa fa-edit"></i> <span>Approved </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
	
		 </ul>
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

	<!--
		 <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/PR/approved_list') ?>" class="">
            <i class="fa fa-check-square-o"></i> <span> Apprved </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		</ul>
		-->
        </li>
		

		
          </ul>
		  
        </li>
		<!-- end -->
		
		<!-- old list 
		<li class="treeview">
          <a href="#" class="">
            <i class="fa fa-inr"></i>
            <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		  
				
		 <li>
          <a href="<?php echo site_url('purchase/PR/create_pr') ?>" class="">
            <i class="fa fa-edit"></i> <span>Create PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li> 
			

		
	

		
		
	<li class="treeview">
          <a href="#" class="">
            
            <span>Check existing PR Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		
		<li>
          <a href="<?php echo site_url('purchase/PR/pr_master_draft') ?>" class="">
            <i class="fa fa-edit"></i> <span> Drafted PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
		<li>
          <a href="<?php echo site_url('purchase/PR/pr_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Pending PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li><li>
          <a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Processed PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		<li>
          <a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Rejected PR</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		
	
		</ul>
			
		<li class="treeview">
          <a href="#" class="">
            
            <span>Check Approval status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right " style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
         <ul class="treeview-menu">
		 	<li>
          <a href="<?php echo site_url('purchase/QCS/Pending_Approval') ?>" class="">
            <i class="fa fa-edit"></i> <span> Pending Approval</span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		<li>
          <a href="<?php echo site_url('purchase/PR/processed_master') ?>" class="">
            <i class="fa fa-edit"></i> <span> Processed PR </span>
           
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

        </li>
		 </ul>
		</li>
		
          </ul>
		  
        </li>
		
-->
					
 <li>
           <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" class="">
            <i class="fa fa-edit"></i> <span>Cash Reimbursement </span>
             <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right" style="color:#f6b69b!important;font-size: 20px;font-weight: 900;"></i>
            </span>
          </a>
<hr style="margin-bottom:0px;margin-top:0px">

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
