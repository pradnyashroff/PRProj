<?php
if (isset($this->session->userdata['logged_in'])) {
    $emp_id = ($this->session->userdata['logged_in']['emp_id']);
    $emp_code = ($this->session->userdata['logged_in']['emp_code']);
    $plant_code = ($this->session->userdata['logged_in']['plant_code']);
    $grade_id = ($this->session->userdata['logged_in']['grade_id']);
    $emp_name = ($this->session->userdata['logged_in']['emp_name']);
    $emp_designation = ($this->session->userdata['logged_in']['emp_designation']);
    $emp_dept = ($this->session->userdata['logged_in']['emp_dept']);
    $emp_email = ($this->session->userdata['logged_in']['emp_email']);
    $emp_mobile = ($this->session->userdata['logged_in']['emp_mobile']);
    $pr_dh_id = ($this->session->userdata['logged_in']['pr_dh_id']);
    $pr_allowed = ($this->session->userdata['logged_in']['pr_allowed']);
    $emp_status = ($this->session->userdata['logged_in']['emp_status']);
} 
else {

    redirect('Welcome/user_login_process', 'location');
}
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <header class="main-header" style="border-bottom:1px solid white;text-transform:uppercase;">
        <a href="<?php echo site_url('Welcome/index') ?>" class="logo" >
            <span class="logo-mini " style="color:#fff;"><b>R</b></span>
            <span class="logo-lg"><img src="<?php echo base_url(); ?>dist/img/RUCHA-LOGO-WHITE.png" style="height:50px;">
            </span>
        </a>
        <nav class="navbar navbar-static-top" >
            <a href="#" class="sidebar-toggle fa fa-caret-square-o-right " id="menu-toggle"  data-toggle="push-menu" role="button" style="font-size: 30px; color:#fff;   padding-bottom: 0px;    padding-top: 8px;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <span class="emp_detail">Plant ID : <?php echo $plant_code; ?>  Rucha Engineers Pvt. Ltd - Unit <?php echo $plant_code; ?> </span>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <?php
                            $image = $this->method_call->profile_pic_fetch($emp_code);
                                if ($image != null) {
                                    foreach ($image->result() as $row) {
                        ?>
                        <img src="<?php echo base_url() . "uploads/profile_attachment/" . $row->profile_attachment ?>" style="height:50px; width:50px;" class="img-circle"> <span style="padding-top:50%;color:white;">&nbsp; &nbsp;<?php echo ucwords($emp_name); ?> </span>
                        <?php
                            }
                            }
                        ?>
                    </li>
                    <li class="dropdown user user-menu">		 
		                <a href="#" data-toggle="dropdown" style="color:#fff;" ><i class="fa fa-cog"></i><span style="color:#fff;"> Settings</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo site_url('purchase/PR/emp_profile/'.$emp_code); ?>">Profile Update</a></li>
                        <li><a tabindex="-1" href="<?php echo site_url('Welcome/reset_my_password');?>">Reset Password </a></li>
                        <li class="dropdown-submenu">
                            <a class="test" tabindex="-1" href="#">Help <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url('dist/ELAR_guidelines/FlowChart-ELAR.xlsx') ?>">ELAR Flow</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url('dist/ELAR_guidelines/Cash_Reimbursement_System.pdf') ?>">ELAR User Manual</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url('dist/ELAR_guidelines/ELAR_Guidelines.pdf') ?>">ELAR Dashboard Manual</a></li>
		                    </ul>
                        </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-power-off "></i> <span style="color:#fff;">Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar" id="sidebar" style="background-color:#3482AE; color:#FFFFFF;text-transform:uppercase;">
        <div id="split-bar"></div>
            <section class="sidebar" style="font-size:14px;color:#FFFFFF;text-transform:uppercase;">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header" style="background-color:#3482AE;color:#FFFFFF">MAIN NAVIGATION</li>
                    <hr style="margin-bottom:0px;margin-top:0px">
                    <li><a href="<?php echo site_url('Welcome/index') ?>" class=""><span class="fa fa-home" style="color:#FFFFFF"></span><span style="color:#FFFFFF">HOME</span></a>
                    <hr style="margin-bottom:0px;margin-top:0px"></li>			
                    <li class="treeview"><a href="#" class=""><i class="fa fa-inr" style="color:#FFFFFF;"></i>
                        <span style="color:#FFFFFF;">Purchase</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview" style="background-color:#3481AE;">
                                <a href="#" class="">
                                    <i class="glyphicon glyphicon-list-alt" style="color:#FFFFFF;"></i>
                                    <span style="color:#FFFFFF;">PR</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?php echo site_url('purchase/PR/create_pr') ?>" class="">
                                            <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Create PR</span>
                                        </a>
                                   </li> 
                                    <li class="treeview">
                                        <a href="#" class="">
                                            <span style="color:#FFFFFF;">Check existing PR Status</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo site_url('purchase/PR/pr_master_draft') ?>" class=""><i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Drafted PR</span></a>
                                            </li>
                                            <li><a href="<?php echo site_url('purchase/PR/pr_master') ?>" class=""><i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Pending PR</span></a>
                                            </li>
                                            <li><a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>" class=""><i class="glyphicon glyphicon-check" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Processed PR</span></a> 
                                            </li> 
                                            <li><a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>" class=""><i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Rejected PR</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#" class="">
                                            <span style="color:#FFFFFF;">Check Approval status</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo site_url('purchase/PR/Pending_Approval') ?>" class=""><i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Pending Approval</span></a>
                                            </li>
                                            <li><a href="<?php echo site_url('purchase/PR/processed_master') ?>" class=""><i class="glyphicon glyphicon-check" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Processed PR </span></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <li class="treeview" style="background-color:#3481AE;">
                                    <a href="#" class="">
                                        <i class="fa fa-inr" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">QCS</span>
                                        <span class="pull-right-container">
                                        <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                    <li><a href="<?php echo site_url('purchase/PR/approved_list') ?>" class="">
                                        <i class="fa fa-check-square-o" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Apprved </span></a>
                                    </li>
                                </ul>
                                <li class="treeview" style="background-color:#3481AE;">
                                    <a href="#" class="">
                                        <i class="glyphicon glyphicon-tasks" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Item Code </span>
                                        <span class="pull-right-container">
                                        <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                    <li>
                                        <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list') ?>" class="">
                                        <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Create Item Code </span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="#" class="">
                                            <span style="color:#FFFFFF;">Existing Item Code Status</span>
                                            <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/itemcode_draftlist') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Draft </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/pending_list') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Pending Approval </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/approved_itemcode_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/rejected_Itemcode') ?>" class="">
                                                <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Rejected </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="treeview" style="background-color:#3481AE;">
                                        <a href="#" class="">
                                            <span style="color:#FFFFFF;">Item Code  Approval Status</span>
                                            <span class="pull-right-container">
                                             <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                             </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/approval_list') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Pending</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('purchase/itemcode/approved_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
                                                </a>
                                        
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview" style="background-color:#3481AE;">
                                <a href="#" class="">
                                <i class="glyphicon glyphicon-modal-window" style="color:#FFFFFF;"></i>
                                <span style="color:#FFFFFF;">Informal PO </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('purchase/informal_po/po_pending_list') ?>" class="">
                                        <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Informal PO Forwarded  </span>
                                    </a>
                                    
                                </li>
                                <li class="treeview" style="background-color:#3481AE;">
                                    <a href="#" class="">
                                        <span style="color:#FFFFFF;">Existing Informal PO Status</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo site_url('purchase/informal_po/pending_list') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Pending Approval </span>
                                            </a>
                                          
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/informal_po/approved_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
                                            </a>
                                         
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/informal_po/po_rejected_list') ?>" class="">
                                                <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Rejected </span>
                                            </a>
                                           
                                        </li>
                                    </ul>
                                </li>
                                <!-- Informal PO  approval -->
                                <li class="treeview" style="background-color:#3481AE;">
                                    <a href="#" class="">
                                        <span style="color:#FFFFFF;">Informal PO  Approval Status</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo site_url('purchase/informal_po/informal_po_approval') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Pending</span>
                                            </a>
                                        
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/informal_po/po_approved_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
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
                                <i class="glyphicon glyphicon-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">CAPEX</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('purchase/capex/capex_create_list') ?>" class="">
                                        <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Create Capex </span>
                                    </a>
                                  
                                </li>
                                <li class="treeview">
                                    <a href="#" class="">
                                        <span style="color:#FFFFFF;">Existing Capex Status</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/capex_draft_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Draft Capex </span>
                                            </a>
                                        
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/pending_list') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Pending Approval </span>
                                            </a>
                                           
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/approved_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
                                            </a>
                                         
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/po_rejected_list') ?>" class="">
                                                <i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Rejected </span>
                                            </a>
                                           
                                        </li>
                                    </ul>
                                </li>
                                <!-- Capex approval -->
                                <li class="treeview" style="background-color:#3481AE;">
                                    <a href="#" class="">

                                        <span style="color:#FFFFFF;">Capex Approval Status</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/informal_po_approval') ?>" class="">
                                                <i class="glyphicon glyphicon-alert" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Pending</span>
                                            </a>
                                           
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('purchase/capex/po_approved_list') ?>" class="">
                                                <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Approved </span>
                                            </a>
                                      
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
      <hr style="margin-bottom:0px;margin-top:0px">
            <li class="treeview">
                <a href="#" class="">
                    <i class="fa fa-inr" style="color:#FFFFFF;"></i>
                    <span style="color:#FFFFFF;">Cash Reimbursement</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                    </span>
                </a>
				<ul class="treeview-menu" style="background-color:#3481AE;">
                        <li class="treeview">

                            <a href="#" class="">
                                <i class="glyphicon glyphicon-user" style="color:#FFFFFF;"></i>
                                <span style="color:#FFFFFF;">User</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                               
                                <li class="treeview">

                                    <a href="#" class="">
										<i class="glyphicon glyphicon-pencil" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Create</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
								<li>
								<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" class="">
                                   <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bike</i> <span style="color:#FFFFFF;">&nbsp; Local Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/IOU/IouCntr/create_local_claim') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;">account_balance</i><span style="color:#FFFFFF;">&nbsp; IOU Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/Other/Other_cntr/create_other_claim') ?>" class="">
                                 <i class="material-icons" style="font-size:20px;color:#FFFFFF;">assignment</i><span style="color:#FFFFFF;">&nbsp; Other Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/create_travel_claim') ?>" class="">
                                   <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp; Travel Claim</span>
                                </a>
                            </li>
                                    </ul>
                                </li>
								 <li class="treeview">

                                    <a href="#" class="">
										<i class="fa fa-edit" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Draft</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
								<li>
								<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_draft_tbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bike</i> <span style="color:#FFFFFF;">&nbsp;Local Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/IOU/IouCntr/iou_draft_tbl') ?>" class="">
                                     <i class="material-icons" style="color:#FFFFFF; font-size:20px;">account_balance</i><span style="color:#FFFFFF;">&nbsp; IOU Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_claim_draft_tbl') ?>" class="">
                                    <i class="material-icons" style="font-size:20px;color:#FFFFFF;">assignment</i><span style="color:#FFFFFF;">&nbsp; Other Claim</span>
                                </a>
                            </li>
							<li>
								<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_claim_draft_tbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp; Travel Claim</span>
                                </a>
                            </li>
                                    </ul>
                                </li>
                                <!-- end -->
								<li class="treeview">

                                    <a href="#" class="">
										<i class="glyphicon glyphicon-question-sign" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Pending</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
								<li>
									<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_pending_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bike</i> <span style="color:#FFFFFF;">&nbsp;Local Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/IOU/IouCntr/iou_pending_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">account_balance</i><span style="color:#FFFFFF;">&nbsp; IOU Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_claim_pending_tbl') ?>" class="">
                                        <i class="material-icons" style="font-size:20px;color:#FFFFFF;">assignment</i><span style="color:#FFFFFF;">&nbsp; Other Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_claim_pending_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp;Travel Claim</span>
                                    </a>
                                        
                                </li>
                                    </ul>
                                </li>
                                <!-- end -->
								
								<li class="treeview">

                                    <a href="#" class="">
										<i class="glyphicon glyphicon-ok-sign" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Approved</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
								<li>
									<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_approved_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bike</i> <span style="color:#FFFFFF;">&nbsp;Local Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/IOU/IouCntr/iou_accepted_tbl') ?>" class="">
                                        <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> IOU Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Approved_tbl') ?>" class="">
                                        <i class="material-icons" style="font-size:20px;color:#FFFFFF;">assignment</i><span style="color:#FFFFFF;">&nbsp;Other Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_claim_approved_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp; Travel IOU Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_without_iou_claim_approved_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp; Travel Non IOU Claim</span>
                                    </a>
                                </li>
                                    </ul>
                                </li>
                                <!-- end -->
								<li class="treeview">

                                    <a href="#" class="">
										<i class="glyphicon glyphicon-remove-sign" style="color:#FFFFFF;"></i>
                                        <span style="color:#FFFFFF;">Rejected</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
								<li>
									<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_reject_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bike</i> <span style="color:#FFFFFF;">&nbsp;Local Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/IOU/IouCntr/iou_reject_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">account_balance</i><span style="color:#FFFFFF;">&nbsp;  IOU Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Rejected_tbl') ?>" class="">
                                        <i class="material-icons" style="font-size:20px;color:#FFFFFF;">assignment</i><span style="color:#FFFFFF;">&nbsp; Other Claim</span>
                                    </a>
                                        
                                </li>
								<li>
									<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_claim_rejected_tbl') ?>" class="">
                                        <i class="material-icons" style="color:#FFFFFF; font-size:20px;">directions_bus</i>  <span style="color:#FFFFFF;">&nbsp; Travel Claim</span>
                                    </a>
                                        
                                </li>
                                    </ul>
                                </li>
                                <!-- end -->
                                
							</ul>
						</li>
						
						
					 
				</ul>
			</li>
            <hr style="margin-bottom:0px;margin-top:0px">
		    <li class="treeview">
                <a href="#" class="">
                    <i class="fa fa-book" style="color:#FFFFFF;"></i>
                    <span style="color:#FFFFFF;">Library Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="background-color:#3481AE;">
                    <?php
                    if($emp_code==100847)
                    {
                ?>
                <li class="treeview">
                    <a href="#" class="">
                        <i class="glyphicon glyphicon-user" style="color:#FFFFFF;"></i>
                        <span style="color:#FFFFFF;">Admin</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Add_New_Book') ?>" class="">
                                <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Add Book</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Add_Category') ?>" class="">
                                <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Add Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Quantity_Tbl') ?>" class="">
                                <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Add Book Quantity</span>
                            </a>
                        </li>
                        <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Available_Book') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Available Book</span>
                                </a>
                            </li>
                        <li>
                        <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Request_Book') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Pending Req. Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Given_Book') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Given Book</span>
                                </a>
                            </li>
                        <li>
                        <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/AdminRejectBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Reject Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/Reports') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Reports</span>
                                </a>
                            </li>

                    </ul>
                </li>
            <?php } 
                    else
                    {



            ?>
                   
                    <li class="treeview">
                        <a href="#" class="">
                            <i class="glyphicon glyphicon-user" style="color:#FFFFFF;"></i>
                            <span style="color:#FFFFFF;">User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-down pull-right " style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/AvilableBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Avilable Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/AvilableBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Send Book Request</span>
                                        </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/PendingBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Pending Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/IssuedBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Issued Book</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/UserRejectBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Reject Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/E_BookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;EBook</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/IssuedBookTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Returned Book</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo site_url('LMS/LMS_cntr/BookHistoryTbl') ?>" class="">
                                    <i class="material-icons" style="color:#FFFFFF; font-size:20px;"></i> <span style="color:#FFFFFF;">&nbsp;Book History</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                 <?php  }
                 ?>  
            </ul>
        </li>
        <hr style="margin-bottom:0px;margin-top:0px">
                <li>
                    <a href="" class="">
                        <i class="fa fa-user-plus" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Asset Tracking</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                        </span>
                    </a>
                    <hr style="margin-bottom:0px;margin-top:0px">

                </li>
                <li>
                    <a href="#" class="">
                        <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">  Leave Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                        </span>
                    </a>
                    <hr style="margin-bottom:0px;margin-top:0px">

                </li>
               
                <li>
                    <a href="#" class="">
                        <i class="fa fa-edit" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;"> Visitor Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right" style="color:#FFFFFF!important;font-size: 20px;font-weight: 900;"></i>
                        </span>
                    </a>
                    <hr style="margin-bottom:0px;margin-top:0px">

                </li>
               
            </li><hr style="margin-bottom:0px;margin-top:0px">
                <li>
                    <a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off" style="color:#FFFFFF;"></i> <span style="color:#FFFFFF;">Logout</span></a>
                    <hr style="margin-bottom:0px;margin-top:0px">

                </li>			


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    
    
        <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
