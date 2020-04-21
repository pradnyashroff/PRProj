 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase</title>
     	   <?php include_once 'styles.php'; ?>
		   <style>
.col-lg-3,.col-lg-4,.col-lg-2{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:2%;
				padding-bottom:2%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
				
				</style>
		   
<style>
.bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
label,.col-sm-1,.box-title
{
	color:#3482AE;
	text-transform: uppercase;
	font-family:'exo';
}

table{
	font-size:12px!important;
	border:1px solid black;
    border-color:#3482AE;
	text-align: center;
	width:100%;
	box-shadow: 5px 5px 5px 5px rgba(46,61,73,0.15);
}
th {
	font-family:'exo';
	text-transform: uppercase;
}
thead,th,td
{
	font-family:'exo';
	text-align: center;
}
body{
	font-family:'exo';
}
</style>	
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >

<!-- Site wrapper -->
<div class="wrapper"  >

       	   <?php include_once 'headsidelist.php'; ?>

 
 
<!-- Site wrapper -->

 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
  <section class="content" >
   
  		<div class="row">
      <div class="col-sm-4">
	  
	   <div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
	   
	   <span class="list-group-item list-group-item-action" style="background-color:#3482AE;" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center;color:white;"> Quick Links </h6></span>
	   
	   
      <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home">Purchase  Requisition </a>
	  <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo site_url('purchase/PR/approved_list') ?>" role="tab" aria-controls="profile">Cost Comparision</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" role="tab" aria-controls="messages">Item Code</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo site_url('purchase/informal_po/informal_po_menu') ?>" role="tab" aria-controls="settings">Informal PO </a>
	<!--  <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo site_url('purchase/capex/capex_menu') ?>" role="tab" aria-controls="settings">Capex</a> -->
    </div>
       
      </div>
	  
	   <div class="col-sm-4">
	
       <div class="list-group"  id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);" >
	   
	   <span class="list-group-item list-group-item-action " style="background-color:#3482AE;"id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center; color:white;"> Pending PR for DH/PH</h6></span>
	  <marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();" style="height:155px;" > 
	   <div id="scroll">
	   

	   <!-- start -->
	   
	   <?php $is_PH=$this->method_call->is_PH($emp_code); 
				
				
				
				 $pr_submited_dh= $this->method_call->list_pr_submited_dh($emp_code);
 if($pr_submited_dh!=null){
	 	   
			  
foreach ($pr_submited_dh->result() as $row)  
         {  ?>
			
			 <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/PR/approve_dh_pr/'.$row->pr_id) ?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> PR <?php echo $row->pr_id ;?>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->pr_state ;?> </a>
			
				<?php }
				} 
				
				
			?>
				<?php
				 $pr_submited_ph= $this->method_call->list_pr_submited_PH($emp_code);
 if($pr_submited_ph!=null){
	 	   
	$sr_no=1;			  
foreach ($pr_submited_ph->result() as $row)  
         {  ?>
			
			 <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/PR/approve_pr_ph/'.$row->pr_id) ?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> PR <?php echo $row->pr_id ;?>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->pr_state ;?> </a>
			
			
				<?php }  }
						
				   
				
         ?>  
				
	   <!-- end -->
		
		
     
    </div></marquee>
	</div>
	   
		
      </div>
	  
	<!-- profile pic-->  
	  <!-- Widget: user widget style 1 -->
	<div class="col-sm-4" >
          <div class="box box-widget widget-user" style="background-color:#3482AE;" >
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color:#3482AE;">
              <h6 style="text-align:center;background-color:#3482AE;color:#FFFFFF;"><?php echo  $emp_name;?></h6>
            
            </div>
            <div class="widget-user-image">
			
			<?php $image= $this->method_call->profile_pic_fetch($emp_code);
 if($image!=null){
	  foreach ($image->result() as $row)  {
	 ?>

 <img src ="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" class="img-circle" style="height:110px;width:120px;border-radius: 50%;"></img> 
	 
	 <?php
	
	  }

 }?>
              
            </div>
			<br>
            <div class="box-footer">
              <div class="row">
                  <h5 style="text-align:center;" ><?php echo $emp_designation; ?></h5>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
	</div>
	  
</div>	 
   
   <div class="row" style="margin-left:8%;">
		<div class="col-lg-1"></div>
		<div class="col-lg-9"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';"> PR</h3>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
   <div class="row" style="margin-left:0%;margin-right:0%;">
		
	   <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/pr_master_draft');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Draft PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/pr_master_draft');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Draft PR </h5>
				
	  <?php $noti= $this->method_call->draftpr_noti($emp_code);
 if($noti!=null){
	 
	 ?> 
	 
	 <h5><?php echo count($noti->result()); ?></h5>
		 <?php
		 }
		 else{?>

			<h4 > <?php echo '0' ;}?> </h4 >
		
			</div>
		  </a>
		  <?php } ?>
       </div>
	  
	   
	   <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Pending PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Pending PR </h5>
				
	  <?php  $pending_noti= $this->method_call->pending_noti($emp_code);
 if($pending_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($pending_noti->result()); ?></h4></p>
		 <?php
		 }
		 else{?>

		<h4 > <?php echo '0' ;}?> 
		
		  <?php } ?>
		</h4 >
       </div>
	   
	   
	   </div>
	    <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/rejected_pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Rejected PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/rejected_pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Rejected PR </h5>
				
	  <?php $rej_noti= $this->method_call->rejpr_noti($emp_code);
 if($rej_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($rej_noti->result()); ?></h4></p>
		 <?php
		 }
		 else{
			 ?>

			<h4 > <?php echo '0' ;}?> </h4 >
		  <?php } ?>
       </div>
	   
	   
	   </div>
	    <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/processed_pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/processed_pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved PR </h5>
				
	 <?php $app_noti= $this->method_call->approved_noti($emp_code);
 if($app_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($app_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

			<h4 > <?php echo '0' ;}?> </h4 >
		  <?php } ?>
       </div>
	   
	   
	   </div>
	   </div>
	 
		<div class="row" style="margin-left:0%;margin-right:0%;">
	   <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/approved_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Approved QCS</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/approved_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved QCS </h5>
				
	<?php $qcs_noti= $this->method_call->approved_qcs_noti($emp_code);
 if($qcs_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($qcs_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

			<h4 > <?php echo '0' ;}?> </h4 >
			<?php } ?>
       </div> </div>
	    <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Approved ItemCode</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved ItemCode </h5>
				
	<?php $itemcode_noti= $this->method_call->approved_itemcode_noti($emp_code);
 if($itemcode_noti!=null){
	 ?> 
	 
	 <p><h4 ><?php echo count($itemcode_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

			<h4 > <?php echo '0' ;}?> </h4 >
			<?php } ?>
       </div>
	   
	    </div>
 <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/informal_po/approved_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Approved Informal PO</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/informal_po/approved_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved Informal PO </h5>
				
	<?php $po_noti= $this->method_call->approved_po_noti($emp_code);
 if($po_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($po_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		<h4 > <?php echo '0' ;}?> </h4 >	
			<?php } ?>
       </div>
	   
	    </div>
		<div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/capex/approved_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Approved Capex</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/capex/approved_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved Capex </h5>
				
	<?php $capex_noti= $this->method_call->approved_capex_noti($emp_code);
 if($capex_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($capex_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		<h4 > <?php echo '0' ;}?> <h4 >		
			<?php } ?>
       </div>
	   
	    </div></div>
		
		<?php $level_emp= $this->method_call->fetchLevel($emp_code); 
		$levelEmp=$level_emp['auth_level'];
		?>
		<input type="hidden" name="txt_level" value="<?php print_r($level_emp['auth_level']);?>" class="form-control"  required>
		
		
		<!--DEPT Head Count-->
		<?php
			if($levelEmp==1)
			{?>
				
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ph_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendDHFtgsPRCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ph_rejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $reject = $this->method_call->rejectDHFtgsPRCount($emp_code);
						if($reject != null){
					?>
					<h5><?php echo count($reject->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ph_approvalTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $approved = $this->method_call->approveDHFtgsPRCount($emp_code);
						if($approved != null){
					?>
					<h5><?php echo count($approved->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
		</div>
		<!--End DH 
		---Start Plant Head-->
		<?php
			}
			elseif($levelEmp==2)
			{?>
				
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
			<div class="col-lg-3">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/plant_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendPHFtgsPRCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-3">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/plant_rejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $reject = $this->method_call->rejectPHFtgsPRCount($emp_code);
						if($reject != null){
					?>
					<h5><?php echo count($reject->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-3">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/plant_approvTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
				<?php $approved = $this->method_call->approvePHFtgsPRCount($emp_code);
						if($approved != null){
					?>
					<h5><?php echo count($approved->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
					
			</div>
			
			<div class="col-lg-3">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/QCS_AuthorityPending_FTGS_tbl'); ?>"  style="color: #FFFFFF;">Pending FTGS QCS </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendlevel2FtgsQcsCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			
		</div>
		<?php
			}
			elseif($levelEmp==3)
			{?>
				
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/IC_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendItemFtgsPRCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ICrejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $reject = $this->method_call->rejectItemFtgsPRCount($emp_code);
						if($reject != null){
					?>
					<h5><?php echo count($reject->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ICapproveTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $approved = $this->method_call->approveItemFtgsPRCount($emp_code);
						if($approved != null){
					?>
					<h5><?php echo count($approved->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
		</div>
		<?php
			}
			elseif($levelEmp==4)
			{?>
				
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ION_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendIONFtgsPRCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ION_rejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $reject = $this->method_call->rejectIONFtgsPRCount($emp_code);
						if($reject != null){
					?>
					<h5><?php echo count($reject->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ION_approveTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $approved = $this->method_call->approveIONFtgsPRCount($emp_code);
						if($approved != null){
					?>
					<h5><?php echo count($approved->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
		</div>
		<?php
			}
			elseif($levelEmp==5)
			{?>
				
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/AssCode_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $pending = $this->method_call->pendAssetFtgsPRCount($emp_code);
						if($pending != null){
					?>
					<h5><?php echo count($pending->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ACC_rejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $reject = $this->method_call->rejectAssetFtgsPRCount($emp_code);
						if($reject != null){
					?>
					<h5><?php echo count($reject->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/ACC_approveTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $approved = $this->method_call->approveAssetFtgsPRCount($emp_code);
						if($approved != null){
					?>
					<h5><?php echo count($approved->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
		</div>
		<?php
			}

			else 
			{
		?>
		<!-- Interplant FTGS PR -->
		 <div class="row" style="margin-left:8%;">
			<div class="col-lg-1"></div>
			<div class="col-lg-9"style="text-align:center;">
				<div class="single_service_part dropdown">
					<i class="flaticon-chip"></i>
					<h3 style="color:#3482AE;font-family:'exo';"> INTERPLANT FTGS PR</h3>
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div class="row" style="margin-left:0%;margin-right:0%;">
		<div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/draftTBL');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Draft FTGS PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/draftTBL');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Draft FTGS PR </h5>
				<?php $noti= $this->method_call->draftFtgsPRCount($emp_code);
						if($noti!=null){
				?> 
				<h4><?php echo count($noti->result()); ?></h4>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
			</div>
		  </a>
		  <?php } ?>
       </div>
	  <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/penddingTBL');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Pending FTGS PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/penddingTBL');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Pending FTGS PR </h5>
				<?php  $pending= $this->method_call->pendingFtgsPRCount($emp_code);
						if($pending!=null){
				?> 
				<p><h4 ><?php echo count($pending->result()); ?></h4></p>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> 
				<?php } ?>
				</h4 >
			</div>
		</div>
	    <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/rejectTBL');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Rejected FTGS PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/rejectTBL');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Rejected FTGS PR </h5>
				<?php $reject= $this->method_call->rejectFtgsPRCount($emp_code);
					if($reject!=null){
				?> 
				<p><h4 ><?php echo count($reject->result()); ?></h4></p>
				<?php
					}
				else{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
				<?php } ?>
			</div>
	   </div>
	   <div class="col-lg-3">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/approvalTBL');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Approved FTGS PR </h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/approvalTBL');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Approved FTGS PR </h5>
				<?php $approve= $this->method_call->approvedFtgsPRCount($emp_code);
					if($approve!=null){
				?> 
				<p><h4 ><?php echo count($approve->result()); ?></h4></p>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
				<?php } ?>
			</div>
	     </div>
		 
		 
		  <div class="col-lg-3">
          <!-- small box -->
		  
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/QCS_AuthorityPending_FTGS_tbl');  ?>" style="color:#FFFFFF;">
		   <!--<a href="<?php echo site_url('FTGS_PR/Ftgs_pr/penddingQCSTBL');  ?>" style="color:#FFFFFF;">-->
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Pending FTGS QCS </h5>
				<?php $approve= $this->method_call->pendingFtgsPRLevel5($emp_code);
					if($approve!=null){
				?> 
				<p><h4 ><?php echo count($approve->result()); ?></h4></p>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
				<?php } ?>
			</div>
	     </div>
		 
		  <div class="col-lg-3">
          <!-- small box -->
		  
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/capexCreateTbl');  ?>" style="color:#FFFFFF;">
		  
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Create CAPEX </h5>
				<?php $approve= $this->method_call->CapexCreteCount($emp_code);
					if($approve!=null){
				?> 
				<p><h4 ><?php echo count($approve->result()); ?></h4></p>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
				
			</div>
	     </div>
		 
		 
		<?php 
				if($emp_code == '100006' || $emp_code == '100012' )
				{
			?>		
		 <div class="col-lg-3">
          <!-- small box -->
		  
		   <a href="<?php echo site_url('FTGS_PR/Ftgs_pr/CAPEX_AuthorityPending_FTGS_tbl');  ?>" style="color:#FFFFFF;">
		  
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h5 style="font-family:'exo';font-size:13px;" > Pending FTGS CAPEX </h5>
				<?php $approve= $this->method_call->cpxAuthPenCount($emp_code);
					if($approve!=null){
				?> 
				<p><h4 ><?php echo count($approve->result()); ?></h4></p>
				<?php
					}
					else
					{
				?>
				<h4 > <?php echo '0' ;}?> </h4 >
				
			</div>
	     </div>
		 <?php 
				}
				else {
					
				}
				?>
		 
		 
		 	
		 
		 	 

	        <div class="row">
        <div class="col-sm-12">
          <div class="well" style="background-color:white; ">
		  <h4> PR Flow </h4>

  
  
  <!-- start -->
  	     <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-2 bs-wizard-step complete" hidden>
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Create PR</div>
                </div>
				
				  <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Create PR</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> DH Approved/Rejected</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">PH Approved/Rejected</div>
                </div>
                
               
				
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Sourcing Approved/Rejected</div>
                </div>
				
				
					<div class="col-xs-1 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">QCS</div>
                </div>
				
					<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 6</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Sourcing Approved/Rejected</div>
                </div>
				
				
				 <div class="col-xs-1 bs-wizard-step complete"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 7</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Informal PO/Capex </div>
                </div>
				
	   </div>
</div>

          </div>
        </div>
			

  
       <!-- /.row -->
	   
	   <div class ="row">
	   

	   </div>
    </section><!-- /.content   -->

  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  </body>
</html>