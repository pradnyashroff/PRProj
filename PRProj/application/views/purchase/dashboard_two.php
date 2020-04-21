 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase</title>
     	   <?php include_once 'styles.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini" >

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
      <div class="col-sm-8">
	   <div class="well">
	   
       <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" style ="font-size :15px;">Purchase  Requisition &nbsp;    &nbsp;    &nbsp;  &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;           <span class="badge">  &nbsp;    &nbsp;    &nbsp; 8+ &nbsp;    &nbsp;    &nbsp;      </span></a>
	   <br><br>
	   
	   
	    <a href="<?php echo site_url('purchase/PR/approved_list') ?>" style ="font-size :15px;">Cost Comparision &nbsp;    &nbsp;    &nbsp;  &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;        &nbsp; &nbsp; &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp; &nbsp;    &nbsp;    &nbsp;                   <span class="badge">  &nbsp;    &nbsp;    &nbsp;              5+&nbsp;    &nbsp;    &nbsp;      </span></a><br><br>
	   
	   
	       <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" style ="font-size :15px;">Item Code &nbsp;    &nbsp;    &nbsp;  &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;     &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp;  &nbsp;      &nbsp;    &nbsp;    &nbsp;&nbsp;&nbsp; &nbsp;   &nbsp;                   <span class="badge">  &nbsp;    &nbsp;    &nbsp; 6+ &nbsp;    &nbsp;    &nbsp;      </span></a><br><br>
	   
	      <a href="<?php echo site_url('purchase/informal_po/informal_po_menu') ?>" style ="font-size :15px;">Informal PO &nbsp;    &nbsp;    &nbsp;  &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;   &nbsp;      &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp;  &nbsp;      &nbsp; &nbsp;   &nbsp;                   <span class="badge">  &nbsp;    &nbsp;    &nbsp;4+ &nbsp;    &nbsp;    &nbsp;      </span></a><br></br>
		  
		   <a href="<?php echo site_url('purchase/capex/capex_menu') ?>" style ="font-size :15px;">Capex &nbsp;    &nbsp;    &nbsp;  &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;    &nbsp;      &nbsp;    &nbsp;   &nbsp;      &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp; &nbsp;      &nbsp;    &nbsp;  &nbsp;      &nbsp;    &nbsp;    &nbsp; &nbsp;   &nbsp;  &nbsp;    &nbsp; &nbsp;   &nbsp;                   <span class="badge">  &nbsp;    &nbsp;    &nbsp; 1+ &nbsp;    &nbsp;    &nbsp;      </span></a><br>
	   
	   
		</div>
      </div>
	  
	<!-- profile pic-->  
	   <div class="col-sm-4">
  <div class="well">
		<h5 style="text-align:center;"><b> <?php echo $emp_name ?></b></h5>
		<h5 style="text-align:center;">( <?php echo $emp_designation ?>)</h5>
		 <p style="text-align:center; margin-top:0px; margin-bottom:0px; padding:0px;">
		 
		 <?php $image= $this->method_call->profile_pic_fetch($emp_code);
 if($image!=null){
	  foreach ($image->result() as $row)  {
	 ?>

 <img src ="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" style="height:120px;width:150px;border-radius: 50%;"  ></img> 
	 
	 <?php
	
	  }

 }?>
        </p>
		</div>
      </div>
	  
</div>	 
   
   
   
   <div class="row">

<!-- count draft pr -->	  
        <div class="col-sm-3">
          <div class="well-sm" style="background-color:#2185d0;text-align:center;">
           <a href="<?php echo site_url('purchase/PR/create_pr') ?>"> <h4 style="color:white;">Draft PR</h4></a>
        	<?php $noti= $this->method_call->draftpr_noti($emp_code);
 if($noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($noti->result()); ?></h4></p>
		 <?php
		 }
		 else{?>

		 <?php echo '0' ;}?>		 
          </div>
        </div>
		
		
		
 <!-- pending  draft pr -->	 
        <div class="col-sm-3" >
          <div class="well well-sm" style="background-color:#b5cc18;text-align:center;"">
              <a href="<?php echo site_url('purchase/PR/pr_master_draft') ?>"> <h4 style="color:white;">Pending PR</h4> </a>
          <?php $pending_noti= $this->method_call->pending_noti($emp_code);
 if($pending_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($pending_noti->result()); ?></h4></p>
		 <?php
		 }
		 else{?>

		 <?php echo '0' ;}?>	
          </div>
        </div>
		
<!-- count rejected  pr -->	 		
        <div class="col-sm-3">
          <div class="well well-sm" style="background-color:#db2828;text-align:center;"">
          <a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>">  <h4 style="color:white;">Rejected PR</h4> </a>
			
			<?php $rej_noti= $this->method_call->rejpr_noti($emp_code);
 if($rej_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($rej_noti->result()); ?></h4></p>
		 <?php
		 }
		 else{
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
           
          </div>
        </div>
		
				
	<!-- Approved PR -->	
        <div class="col-sm-3">
        <div class="well well-sm" style="background-color:#fbbd08;text-align:center;""> 
                      <a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>"> <h4 style="color:white;"> <h4 style="color:white;">Approved PR</h4></a>
          	
			<?php $app_noti= $this->method_call->approved_noti($emp_code);
 if($app_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($app_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
          </div>
        </div>
		
		
		
		</div>
		
		
			  <!-- QCS approved notificatin -->
	  <div class="row">
	  <div class="col-sm-3">
        <div class="well well-sm" style="background-color:#2185d0;text-align:center;""> 
           <a href="<?php echo site_url('purchase/PR/approved_list') ?>"> <h4 style="color:white;">Approved QCS</h4></a>
          	
			<?php $qcs_noti= $this->method_call->approved_qcs_noti($emp_code);
 if($qcs_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($qcs_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
          </div>
        </div>
		
		
			<!-- Item code approved -->
		<div class="col-sm-3">
        <div class="well well-sm" style="background-color:#b5cc18;text-align:center;""> 
           <a href="<?php echo site_url('purchase/PR/approved_list') ?>"> <h4 style="color:white;">Approved ItemCode</h4></a>
          	
			<?php $itemcode_noti= $this->method_call->approved_itemcode_noti($emp_code);
 if($itemcode_noti!=null){
	 ?> 
	 
	 <p><h4 ><?php echo count($itemcode_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
          </div>
        </div>
		
		<!-- Informal po    --> 
		<div class="col-sm-3">
        <div class="well well-sm" style="background-color:#db2828;text-align:center;""> 
           <a href="<?php echo site_url('purchase/PR/approved_list') ?>"> <h4 style="color:white;">Approved Informal PO</h4></a>
          	
			<?php $po_noti= $this->method_call->approved_po_noti($emp_code);
 if($po_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($po_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
          </div>
        </div>
		
		<!-- Capex notification -->
		<div class="col-sm-3">
        <div class="well well-sm" style="background-color:#fbbd08;text-align:center;""> 
           <a href="#"> <h4 style="color:white;">Approved Capex</h4></a>
          	
			<?php $capex_noti= $this->method_call->approved_capex_noti($emp_code);
 if($capex_noti!=null){
	 
	 ?> 
	 
	 <p><h4 ><?php echo count($capex_noti->result()); ?></h4></p>
		 <?php
		 }
		 else
		 {
			 ?>

		 <?php echo '0' ;}?>	
		 
		 	
          </div>
        </div>
		
		</div>
		
		  <!-- pr flow  -->

	        <div class="row">
        <div class="col-sm-12">
          <div class="well">
		  <h4> PR Flow </h4>
            <div class="progress">

    <div class="progress-bar progress-bar-success" role="progressbar"  style="width:10%">
     Create PR
    </div>

    <div class="progress-bar progress-bar-warning" role="progressbar" style="width:20%">
     DH Approved/Rejected
    </div>
    <div class="progress-bar progress-bar-info" role="progressbar" style="width:20%">
     PH Approved/Rejected
    </div>
	 <div class="progress-bar progress-bar-warning" role="progressbar" style="width:20%">
     Sourcing Approved/Rejected
    </div>
	
	
	 <div class="progress-bar progress-bar-danger" role="progressbar" style="width:10%">
     QCS
    </div>
	 <div class="progress-bar progress-bar-success" role="progressbar" style="width:20%">
    Informal PO/Capex
    </div>
	
  </div>
</div>

          </div>
        </div>
			

   
  
       <!-- /.row -->
    </section><!-- /.content -->

  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>