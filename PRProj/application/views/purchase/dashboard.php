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
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
  
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 810px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
	
 spanone {
    display: inline-block;
    width: 70px;
    height: 70px;
    margin: 6px;
    background-color: yellow;
  }

  </style>
  

</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MAIN NAVIGATION</a>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('purchase/dashboard') ?>" class="">Home</a></li>
         <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class="">Purchase</a></li>
        <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Asset Tracking</span></a></li>
		<li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Leave Management</span></a></li>
		
		 <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Cash Reimbursement </span></a></li>
		 
		  <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Visitor Management</span></a></li>
		  
		   <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Material Gate Pass</span></a></li>
		   
		    <li> <a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h4>MAIN NAVIGATION</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="<?php echo site_url('purchase/PR/dashboard') ?>" class="">Home</a></li>
        <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class="">Purchase</a></li>
        <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Asset Tracking</span></a></li>
		<li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Leave Management</span></a></li>
		
		 <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Cash Reimbursement </span></a></li>
		 
		  <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Visitor Management</span></a></li>
		  
		   <li> <a href="<?php echo site_url('purchase/PR/index') ?>" class=""></i> <span>Material Gate Pass</span></a></li>
		   
		    <li> <a href="<?php echo site_url('welcome/logout') ?>" class=""><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
      </ul>
	  <br>
    </div>
    <br>
    
    <div class="col-sm-9">
	<div class="row">
      <div class="col-sm-8">
	   <div class="well">
	   
        <img src="<?php echo base_url(); ?>assets/images/233.png" style="height:200px;width:180px;" ></img>
        
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

 <img src ="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>" style="height:130px;width:150px;border-radius: 50%;"  ></img> 
	 
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
              <a href="<?php echo site_url('purchase/PR/pr_master') ?>"> <h4 style="color:white;">Pending PR</h4> </a>
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

	  <br>
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
	
	
	 <div class="progress-bar progress-bar-danger" role="progressbar" style="width:20%">
     QCS
    </div>
	 <div class="progress-bar progress-bar-success" role="progressbar" style="width:10%">
    Capex
    </div>
	
  </div>
</div>

          </div>
        </div>
		
		
		
		
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
        
		<a href="<?php echo site_url('purchase/PR/create_pr') ?>"><h4>Create PR
		<div class="progress"> 
    <div class="progress-bar"  style="width:40%"></div>
  </div></h4></a>

<a href="<?php echo site_url('purchase/PR/pr_master') ?>" class="">
            <h4>Pending PR
			<div class="progress"> 
    <div class="progress-bar bg-success" style="width:20%"></div>
  </div></h4></a>
  
  
  </p> 
           <a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>" class="">
            <h4>Rejected PR
			<div class="progress"> 
    <div class="progress-bar bg-danger" style="width:30%"></div>
  </div></h4></a>
  
  
    <a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>" class="">
            <h4>Approved PR
			<div class="progress"> 
    <div class="progress-bar bg-warning" style="width:50%"></div>
  </div></h4></a>
			
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <img src="<?php echo base_url(); ?>assets/images/pie.png" style="height:250px;"></img>
          </div>
        </div>
       
      </div>
	  
	  
	  
	  
        
      </div>
	  
	  
    </div>
  </div>
</div>





</body>
<script>
$('.calendar').pignoseCalendar({
    init: function(context) {
        /**
         * @params context PignoseCalendarContext
         * @returns void
         */

         // This is chaining Element, It is exactly same as the each elements of $('.calendar').
         var $this = $(this);

         // You can get target element in `context` variable.
         var $element = context.element;

         // You can also get calendar element, It is calendar view DOM.
         var $calendar = context.calendar;
    }
});
</script>

<script>
$('#example').pieChart();

</script>

</html>
