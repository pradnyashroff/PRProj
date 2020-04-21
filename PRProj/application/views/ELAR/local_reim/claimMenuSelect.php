<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cash Reimbursement Dashboard</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<style>
		body{
			font-family:'exo';
			}
		thead,th,td
		{
			font-family:'exo';
			text-align: center;
		}
		th {
			font-family:'exo';
			text-transform: uppercase;
		}
		table{
			font-size:12px!important;
			border:1px solid black;
			border-color:#3482AE;
			text-align: center;
			width:100%;
			box-shadow: 5px 5px 5px 5px rgba(46,61,73,0.15);
		}

		label,.col-sm-1,.box-title
		{
			color:#3482AE;
			text-transform: uppercase;
			font-family:'exo';
		}
		</style>
        
		
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Cash &nbsp;Reimbursement  &nbsp;Dashboard
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement Dashboard
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
        <div class="wrapper">
		
		
		<!--User authority-->
		
		
		<h3 style="margin-left:3%;font-family:'exo';" >User</h3>
      <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
           <div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Create</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="create_local_claim">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/create_local_claim">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/create_other_claim">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/create_travel_claim">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Draft</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="local_claim_draft_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localClaimdraft($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/iou_draft_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iouClaimdraft($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/other_claim_draft_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->otherClaimdraft($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/travel_claim_draft_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_draft($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Pending</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="local_claim_pending_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localClaim($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/iou_pending_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iouClaimpending($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/other_claim_pending_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->otherClaimpending($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/travel_claim_pending_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_pending($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
	</div>
	 <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="local_claim_approved_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localClaimappr($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/iou_accepted_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iouClaimapprove($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/other_Approved_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->otherClaimapproval($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/travel_claim_approved_tbl">Travel IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_approve($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				<li><a href="../../../ELAR/Travel/Travel_cntr/travel_without_iou_claim_approved_tbl">Travel Non IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_Approve_noniou($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Rejected</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="local_claim_reject_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localClaimreject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/iou_reject_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iouClaimReject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/other_Rejected_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->otherClaimreject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/travel_claim_rejected_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_Reject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				<li> <br><br></li>
			  </ul>
            </div>
          </div>
        </div>
	 </div>
	 <hr style="margin-bottom:0px;margin-top:0px;background-color:#3482AE;color:#FFFFFF;">
	<!-- End User-->
	
	<!--Reporting Authorinting-->
	
	 <?php $reporting_autho=$this->method_call->repoAuthNavBarStatus($emp_code);?>
                                 <?php 
                                    if($reporting_autho['reporting_autho']==""){?>
                                 
                                 <?php } else {
                                    ?>  
		<h3 style="margin-left:3%;font-family:'exo';">Reporting Authority</h3>							
     <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Pending</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="appr_local_claim_pend_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localpendingapprove($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/approval_pending_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_approv_pending($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/appr_other_claim_pend_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->otherpendingapprove($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/approval_travel_claim_pending_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_pending_approver($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
			</ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="appr_local_claim_accpt_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localacceptapprove($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/approval_accepted_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_approv_approve($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/appr_other_claim_approved_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_accept_approve($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/approval_travel_claim_approved_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_approve_approver($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Rejected</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="appr_local_claim_rejct_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localrjtapprove($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/approval_rejected_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_approv_Reject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/approval_rejected_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_reject_approve($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/approval_travel_claim_reject_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_reject_approver($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
	 </div>
	<?php
	}
    ?>
	 
	 <!-- End Reporting Authority-->
	 
	 <!-- SA Authority -->

	<?php $sam_id=$this->method_call->sancAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($sam_id['sam_id']==""){?>
                                 
                                 <?php } else {
                                    ?>  
		<h3 style="margin-left:3%;font-family:'exo';">Sanction Authority</h3>							
     <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Pending</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="sanc_local_claim_pend_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localpendingSA($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/sanc_pending_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_sa_pending($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/sanc_pending_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_pending_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_claim_pending_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_pending_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
			</ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="sanc_local_claim_Accept_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localapproveSA($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/sanc_accepted_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_sa_approve($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/sanc_accepted_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_accept_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_claim_approved_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_approve_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Rejected</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="sanc_local_claim_reject_tbl">Local Claim  <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->localrejectSA($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/IOU/IouCntr/sanc_rejected_tbl">IOU Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->iou_sa_reject($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Other/Other_cntr/sanc_rejected_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_reject_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_claim_reject_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_reject_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
	 </div>
	 <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="text-align:justify; font-size:23px; font-family:exo;">NON IOU Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_nonIOU_claim_approved_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_noniou_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
	 
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="text-align:justify; font-size:23px; font-family:exo;">Claimer Outstanding</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_Claimer_OutStanding_claim_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_outstanding_sa($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
			</ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="text-align:justify; font-size:23px;font-family:exo;">Company Outstanding</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Travel/Travel_cntr/sancAutho_travel_Company_OutStanding_claim_tbl">Travel Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->travel_Claim_approve_approver($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
				
			  </ul>
            </div>
          </div>
        </div>
		</div>
	<?php
	}
    ?>
	
	<!--End SA Autority-->
	
	<!--Higher Authorinting-->
	
	<?php $ocha_id=$this->method_call->higherAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($ocha_id['ocha_id']==""){?>
                                 
                                 <?php } else {
                                    ?>   
		<h3 style="margin-left:3%;font-family:'exo';">Higher Authority</h3>							
     <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Pending</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/other_higherAuthority_claim_draft_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_pending_high($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
             </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/other_higher_accepted_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_approval_high($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                
			  </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Rejected</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/other_higher_rejected_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_reject_high($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
             </ul>
            </div>
          </div>
        </div>
	 </div>
	<?php
	}
    ?>
	 
	 <!-- End Higher Authority-->
	 
	<!--MD Office-->
	<?php $ocha_id=$this->method_call->mdOfficeAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($ocha_id['ocha_id']==""){?>
                                
                                 <?php } else {
                                    ?>  
<hr style="margin-bottom:0px;margin-top:0px">									
		<h3 style="margin-left:3%;font-family:'exo';">MD Office Authority</h3>							
     <div class="row" style="margin-top:1%;margin-left:1%;margin-right:1%;">
		<div class="col-md-4" >
            <div class="box box-widget widget-user-2" >
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Pending</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/other_mdOfficeAuthority_claim_draft_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_pending_mdoffice($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
            </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Approved</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/other_mdOffice_claim_accept_tbl">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_approval_mdoffice($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                
			  </ul>
            </div>
          </div>
        </div>
		<div class="col-md-4">
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;">
				
              <h3 class="widget-user-username" style="margin-left:35%;font-family:exo;">Rejected</h3>
             
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="../../../ELAR/Other/Other_cntr/rejectOtherMdOfficeClaim">Other Claim <span class="pull-right badge" style="background-color:#3482AE;color:#FFFFFF; font-family:exo;"><?php $noti= $this->method_call->other_Claim_reject_mdoffice($emp_code);if($noti!=null){?><?php echo count($noti->result()); ?><?php }	else{?> <?php echo '0' ;}?></span></a></li>
                
			  </ul>
            </div>
          </div>
        </div>
	 </div>
	
	<?php
	}
    ?>


<!--End MD office Authority-->



	   <!--<div class="col-xs-12">
     
          <div class="box">
            
            box-header 
           <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);height:60%;">             
				
			</div>
           </div>
         </div>
		 /.content -->
       </div>
       </section></div>
 
    
<!--Edit delete action model pop up end from here
			<div class="modal fade displaycontent" id="selectCliam">
                <div class="modal-dialog" role="document" style="width: 720px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3482AE">
                          
                            <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Select Claim</h4>
                        </div>
                        <div class="modal-body" style="height:200px; margin-top:50px;">
                            <section class="module pt-10" id="contact" >
                                <div class="container" style="width: auto;">
                                      <div class="row">
                                            <div class="col-sm-12" style="  ">
                                                <select class="form-control" required name="selectVal" id="selectVal" onchange="changeFunc();">
													 <option value="" >Select Claim</option>
													 <option value="LocalClaim" >Local Claim</option>
													 <option value="IOUClaim" >IOU Claim</option>
													 <option value="OtherClaim" >Other Claim</option>
													 <option value="TravelClaim" >Travel Claim</option>
												</select>
                                             </div>
										</div>
								</div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>-->
<?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">


$(function() {
  $('#selectCliam').modal({
    show: true,
    keyboard: false,
    backdrop: 'static'
  });
});
	
	
    $(document).ready(function(){
        $("#selectCliam").modal('show');
    });

function changeFunc()
{

	 var selectBox = document.getElementById("selectVal");
	 var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   
	if(selectedValue=="LocalClaim")
	{
		window.location.href = "localDashboard";
	}
	else if(selectedValue=="IOUClaim")
	{
		window.location.href = "../../../ELAR/IOU/IouCntr/iouDashboard";
	}
	else if(selectedValue=="OtherClaim")
	{
		window.location.href = "../../../ELAR/Other/Other_cntr/appr_other_claim_dash";
	}
	else if(selectedValue=="TravelClaim")
	{
		window.location.href = "../../../ELAR/Travel/Travel_cntr/travel_Claim_dashboard";
	}
	
}

$(document).ready(function (){
   var table = $('#example').DataTable({
      'columnDefs': [
         {
            'targets': 0,
         }
      ],
      'select': {
         'style': 'multi'
      },
	  "bStateSave": true,
	  "ordering": false,
      'order': [[1, 'desc']]
   });

     $("#status_filter").change(function () {
			   var num=$(this).val();
			   $('input[type=search].form-control').val(num);
	
    $('input[type=search].form-control').keyup();
		 });
		
		
   // Handle form submission event
    $('#frm-example').on('submit', function(e){
      var form = this;
      


      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      $('#can_id').val(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
    
   });   
});

</script>
</body>
</html>

