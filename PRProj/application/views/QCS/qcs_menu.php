 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase | Dashboard</title>
     	   <?php include_once 'styles.php'; ?>

<style>



.card-base > .card-icon {
        text-align: center;
        position: relative;
    }


.card-base > .card-icon > .card-data {
    min-height: 120px !important;
    margin-top: -24px;
    background: ghostwhite;
    border: 1px solid #e0e0e0;
    padding: 15px 0 10px 0;
     box-shadow: 1px 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    min-height: 215px;
    }


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
<style>
.col-lg-3,.col-lg-4 {
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:3%;
				padding-bottom:2%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
				
				</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >



       	   <?php include_once 'headsidelist.php'; ?>

 
 
<!-- Site wrapper -->


 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="text-transform: uppercase;">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
 
  
	<section class="content" >
   <div class="row" style="margin-left:0%;margin-right:0%;">
        <div class="col-sm-4">
	  
	   <div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
	   
	   <span class="list-group-item list-group-item-action" style="background-color:#3482AE;" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center;color:FFFFFF;"> Quick Links </h6></span>
	   
	    <marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();" style="height:25%;" >

      <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home">Create QCS </a>
	  
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo site_url('purchase/QCS/qcs_step2_list') ?>" role="tab" aria-controls="profile">Incomplete QCS</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" role="tab" aria-controls="messages">Draft QCS</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo site_url('purchase/QCS/qcs_pending_approval_list') ?>" role="tab" aria-controls="settings">Pending QCS </a>
      
      
        <a class="list-group-item list-group-item-action" href="<?php echo base_url('dist/PR_guidelines/Purchase_Process_Flow_13072019.pdf') ?>" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home">PR Purchase Flow</a>
	   <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/Purchase_Process_Flow_13072019.pdf') ?>" role="tab" aria-controls="profile">PR User Manual</a>
   
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/QCS_System_User_Manual.pdf') ?>" role="tab" aria-controls="profile">Cost Comparision User Manual</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/Informal_PO_System_User_Manual.pdf') ?>" role="tab" aria-controls="messages">Item Code</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/Informal_PO_System_User_Manual.pdf') ?>" role="tab" aria-controls="settings">Informal PO </a>
       <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/Capex_System_User_Manual.pdf') ?>" role="tab" aria-controls="settings">Capex User Manual </a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo base_url('dist/PR_guidelines/PR_System_Password_Reset_Manual_Ver1.0.pdf') ?>" role="tab" aria-controls="settings">Password User Manual </a>

  </marquee>
  </div>
   
  </div>
  
  
  
    <div class="col-sm-4">
	  
	   
       <div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
	   
	   <span class="list-group-item list-group-item-action " style="background-color:#3482AE;"id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center; color:white;"> QCS Pending for Approval  </h6></span>
	  <marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();" style="height:25%;" > 
	<div id="scroll">
	
	
					
	  <?php $qcs_approval1= $this->method_call->list_sourcing_mgr_approval1($emp_code);
 if($qcs_approval1!=null){
	 	   
	//$sr_no=1;			  
foreach ($qcs_approval1->result() as $row)  
         {  ?>
			<a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/QCS/sourcing_head_approve/'.$row->qcs_id);?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> QCS <?php echo $row->qcs_id ;?>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->qcs_status ;?> </a>
			
		
				   <?php }  }
				   
				   
				   
			?>	   
	
	<?php $qcs_approval2 = $this->method_call->list_sourcing_head_approval2($emp_code);
	if($qcs_approval2 != null){
	foreach ($qcs_approval2->result() as $row)  
         {  ?>
			
			
 <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/QCS/sourcing_head_approval2/'.$row->qcs_id);?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> QCS <?php echo $row->qcs_id ;?>   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->qcs_status ;?> </a>
		
				   <?php }  }
	   
		?>	
		
	<?php	
	   $qcs_approval3= $this->method_call->list_cfo_approval1($emp_code);
 if($qcs_approval3!=null){
	 	   
	//$sr_no=1;			  
foreach ($qcs_approval3->result() as $row)  
         {  ?>
			
			<a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/QCS/cfo_approval/'.$row->qcs_id);?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> QCS <?php echo $row->qcs_id ;?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->qcs_status ;?> </a>
			
			
			
				   <?php }  }
	
?>

		<?php
$qcs_approval4= $this->method_call->list_coo_approval1($emp_code);
 if($qcs_approval4!=null){
	 	   
	//$sr_no=1;			  
foreach ($qcs_approval4->result() as $row)  
         {  ?>
		 
		 
				<a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/QCS/coo_approval/'.$row->qcs_id);?>" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> QCS <?php echo $row->qcs_id ;?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->qcs_status ;?> </a>
			
			
		
				   <?php }  }
         ?>  
			

	 
    </div>
	</marquee>
	</div>
	  
      </div>
	  
	
	  <!-- Widget: user widget style 1 -->
	<div class="col-sm-4" >
          <div class="box box-widget widget-user"  >
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header " style="background-color:#3482AE;color: #FFFFFF;">
              <h6 style="text-align:center;"><?php echo  $emp_name;?></h6>
            
            </div>
            <div class="widget-user-image">
			
			<?php $image= $this->method_call->profile_pic_fetch($emp_code);
 if($image!=null){
	  foreach ($image->result() as $row)  {
	 ?>

 <img src ="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" class="img-circle" style="height:100px;width:120px;border-radius: 50%;"></img> 
	 
	 <?php
	
	  }

 }?>
              
            </div>
		
            <div class="box-footer">
			<br>
              <div class="row">
                  <h5 style="text-align:center;" ><?php echo $emp_designation; ?></h5>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
	</div>
</div>

 </br>

  <div class="row" style="margin-left:0%;margin-right:0%;">
	<div class="col-lg-4">
			<h4 style="font-family:'exo';" ><a href="<?php echo site_url('purchase/QCS/Pending_Approval') ?>" style="color: #FFFFFF;">Pending PR </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->pending_pr_noti($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h4 > <?php echo '0' ;}?> 
					</h4> 
		</div>
	 
 <div class="col-lg-4">
			<h4 style="font-family:'exo';" ><a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" style="color: #FFFFFF;">Create QCS </a></h4>
		    <h4 class="card-block text-center">
				<?php $qcs_noti = $this->method_call->create_qcs_noti($emp_code);

	if($qcs_noti!= null)
	{
		?>
		 <h5><?php echo count($qcs_noti->result()); ?></h5>
		<?php
	}
		else{
			?>
	<h4> <?php echo '0' ;}?> 
</h4> 
		</div>
			 
 <div class="col-lg-4">
			<h4 style="font-family:'exo';" ><a href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" style="color: #FFFFFF;">Draft QCS</a></h4>
		    <h4 class="card-block text-center">
<?php $draft_qcs = $this->method_call->list_qcs_draft($emp_code);

	if($draft_qcs!= null)
	{
		?>
		<h5><?php echo count($draft_qcs->result()); ?></h5>
		<?php
	}
			else{
				?>
			<h4><?php echo '0';} ?>
			
</h4>
		</div>
	  </div>
 
 
 <div class="row" style="margin-left:0%;margin-right:0%;">
	<div class="col-lg-4">
		<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('purchase/QCS/qcs_pending_approval_list'); ?>"  style="color: #FFFFFF;">Pending QCS </a></h4>
		<h4 class="card-block text-center"><?php $noti_qcs = $this->method_call->pending_qcs_noti($emp_code);
			if($noti_qcs != null){
				?>
			<h5><?php echo count($noti_qcs->result()); ?></h5>
			<?php
			}
			else{
			?>
			<?php echo  '0' ;}?>
		</h4>
	</div>
	<div class="col-lg-4">
		<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('purchase/QCS/qcs_rejected'); ?>"  style="color: #FFFFFF;">Rejected QCS</a></h4>
		<h4 class="card-block text-center"><?php $rej_noti_qcs = $this->method_call->rejected_qcs_noti($emp_code);
			if($rej_noti_qcs != null){
			?>
			<h5><?php echo count($rej_noti_qcs->result()); ?></h5>
			<?php
			}
			else{
			?>
			<?php echo  '0' ;}?> 
		</h4>
	</div>
		
		<div class="col-lg-4">
			<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('purchase/QCS/approved_qcs_list'); ?>" style="color: #FFFFFF;">Approved QCS </a></h4>
		    <h4 class="card-block text-center"><?php $appove_noti_qcs = $this->method_call->appove_noti_qcs($emp_code);

if($appove_noti_qcs != null){
?>
<h5><?php echo count($appove_noti_qcs->result()); ?></h5>
		<?php
	}
	else{
		?>
	<?php echo  '0' ;}?> </h4>
		</div>
		
		</div>
 
 <!-- INTERPLANT FTGS PR -->
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
			<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/POCret_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>
				<h4 class="card-block text-center">
					
					<!-- approval2 level 5-->
					<?php $noti_qcs = $this->method_call->pendingFtgsPR($emp_code);
						if($noti_qcs != null){
					?>
					<h5><?php echo count($noti_qcs->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?>
				</h4>
			</div>
			<div class="col-lg-4">
				<!--<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/POCret_penddingTBL'); ?>"  style="color: #FFFFFF;">Pending FTGS PR </a></h4>-->
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/QCS_AuthorityPending_FTGS_tbl'); ?>"  style="color: #FFFFFF;">Pending FTGS QCS </a></h4>
				<h4 class="card-block text-center">
					
					<!-- approval2 level 5-->
					<?php $noti_qcs = $this->method_call->pendingFtgsPRLevel5($emp_code);
						if($noti_qcs != null){
					?>
					<h5><?php echo count($noti_qcs->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?>
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/PO_rejectTBL'); ?>"  style="color: #FFFFFF;">Rejected FTGS PR</a></h4>
				<h4 class="card-block text-center">
					<?php $rej_noti_qcs = $this->method_call->rejectFtgsPR($emp_code);
							if($rej_noti_qcs != null){
					?>
					<h5><?php echo count($rej_noti_qcs->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> 
				</h4>
			</div>
			<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/po_approveTBL'); ?>" style="color: #FFFFFF;">Approved FTGS PR </a></h4>
				<h4 class="card-block text-center">
					<?php $appove_noti_qcs = $this->method_call->approveFtgsPR($emp_code);
						if($appove_noti_qcs != null){
					?>
					<h5><?php echo count($appove_noti_qcs->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> </h4>
			</div>
			
			<?php
					if($emp_code== 100662  || $emp_code == 100171)
					{
						?>
						
						<div class="col-lg-4">
				<h4 style="font-family:'exo';" ><a href = "<?php echo site_url('FTGS_PR/Ftgs_pr/CAPEX_AuthorityPending_FTGS_tbl'); ?>" style="color: #FFFFFF;">Pending FTGS PO </a></h4>
				<h4 class="card-block text-center">
					<?php $appove_noti_qcs = $this->method_call->pendingFtgsPRLevel5($emp_code);
						if($appove_noti_qcs != null){
					?>
					<h5><?php echo count($appove_noti_qcs->result()); ?></h5>
					<?php
						}
						else{
					?>
					<?php echo  '0' ;}?> </h4>
					</div>
						
				<?php 
				}
			?>
		</div>
 
 
 
  <!--
<div class="row">
   Icon Cards


    <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title" ><a href="<?php echo site_url('purchase/QCS/Pending_Approval') ?>" style="color: #bb7824;">Pending PR </a></h3>

<h4 class="card-block text-center">
<?php $noti= $this->method_call->pending_pr_noti($emp_code);
 if($noti!=null){
	 
	 ?> 
	 
	 <h5><?php echo count($noti->result()); ?></h5>
		 <?php
		 }
		 else{?>

			<h4 > <?php echo '0' ;}?> 
 </h4> 
</div>
</div>

    </div>

	
</div>


    <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title"><a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" style="color: #bb7824;">Create QCS </a></h3>
<h4 class="card-block text-center">

<?php $qcs_noti = $this->method_call->create_qcs_noti($emp_code);

	if($qcs_noti!= null)
	{
		?>
		 <h5><?php echo count($qcs_noti->result()); ?></h5>
		<?php
	}
		else{
			?>
	<h4> <?php echo '0' ;}?> 
</h4>

 </div>
</div>

    </div>

	
</div>
   
   
       <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title"> <a href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" style="color: #bb7824;">Draft QCS</a></h3>
<h4 class="card-block text-center">
<?php $draft_qcs = $this->method_call->list_qcs_draft($emp_code);

	if($draft_qcs!= null)
	{
		?>
		<h5><?php echo count($draft_qcs->result()); ?></h5>
		<?php
	}
			else{
				?>
			<h4><?php echo '0';} ?>
			
</h4>
 </div>
</div>

    </div>

	
</div>

</div>

 </br> </br> </br>
<div class ="row"> 


       <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title" ><a href = "<?php echo site_url('purchase/QCS/qcs_pending_approval_list'); ?>" style="color: #bb7824;">Pending QCS</a></h3>
<h4 class="card-block text-center"><?php $noti_qcs = $this->method_call->pending_qcs_noti($emp_code);
	if($noti_qcs != null){
		?>
		<h5><?php echo count($noti_qcs->result()); ?></h5>
		<?php
	}
	else{
		?>
	<?php echo  '0' ;}?>
</h4>
 </div>
</div>

    </div>

	
</div>




       <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title" ><a href = "<?php echo site_url('purchase/QCS/qcs_rejected'); ?>" style="color: #bb7824;">Rejected QCS </a></h3>
<h4 class="card-block text-center"><?php $rej_noti_qcs = $this->method_call->rejected_qcs_noti($emp_code);

if($rej_noti_qcs != null){
?>
<h5><?php echo count($rej_noti_qcs->result()); ?></h5>
		<?php
	}
	else{
		?>
	<?php echo  '0' ;}?> 
	</h4>
 </div>
</div>

    </div>

	
</div>




       <div class = "col-md-4">
        <div class="card-base">
<div class="card-icon">
<div class="card-data widgetCardData">
<h3 class="box-title" ><a href = "<?php echo site_url('purchase/QCS/approved_qcs_list'); ?>" style="color: #bb7824;">Approved QCS </a> </h3>
<h4 class="card-block text-center"><?php $appove_noti_qcs = $this->method_call->appove_noti_qcs($emp_code);

if($appove_noti_qcs != null){
?>
<h5><?php echo count($appove_noti_qcs->result()); ?></h5>
		<?php
	}
	else{
		?>
	<?php echo  '0' ;}?> </h4>
</div>
</div>

    </div>

	
</div>





</div> 
  -->
 
   


		
	
        <!-- ./col -->
		
		
        <!-- ./col -->
        </div>
     </section>
  
       <!-- /.row -->
<!-- /.content -->

  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>