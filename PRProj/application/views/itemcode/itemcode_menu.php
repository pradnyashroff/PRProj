 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ItemCode</title>
     	   <?php include_once 'styles.php'; ?>

		   <style>
				.col-lg-3,.col-lg-4{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:3%;
				padding-bottom:3%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
				
				</style>
		   
</head>
<body class="hold-transition skin-blue sidebar-mini" >

<!-- Site wrapper -->
<div class="wrapper"  >

       	   <?php include_once 'headsidelist.php'; ?>

 
 
<!-- Site wrapper -->



 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header)
<ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
</li> <li class="active">ItemCode
</li>
</li>
      </ol>-->

    <!-- Main content -->
  <section class="content" style="    padding-top: 15%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row">
   <div class="row" style="margin-left:8%;">
   <div class="col-lg-1"></div>
		<div class="col-lg-9"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';"> ItemCode</h3>
			</div>
		</div>	
		
	<div class="col-lg-1"></div>
	</div>
 </div>
 <div class="row" style="margin-left:0%;">
	   <div class="col-lg-4">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Create ItemCode</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/itemcode/itemcode_create_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Create ItemCode</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	     <div class="col-lg-4">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/itemcode/pending_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Check Exiting ItemCode Status</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/itemcode/pending_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Check Exiting ItemCode Status</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	    <div class="col-lg-4">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/itemcode/approval_list');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Check ItemCode Approval Status</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/itemcode/approval_list');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Check ItemCode Approval Status</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
   </div>
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>