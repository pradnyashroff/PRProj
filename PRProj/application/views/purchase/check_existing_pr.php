 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Check Existing PR</title>
     	   <?php include_once 'styles.php'; ?>
<style>
.col-lg-3,.col-lg-5{
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
</head>
<body class="hold-transition skin-blue sidebar-mini" >

<!-- Site wrapper -->
<div class="wrapper"  >

       	   <?php include_once 'purchase_sidebar.php'; ?>

 
 
<!-- Site wrapper -->
<div class="wrapper"  >


 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
  <section class="content" style="    padding-top: 15%;  padding-left: 10%;  padding-right: 10%;">
    <div class="row">
   <div class="row" style="margin-left:8%;">
   <div class="col-lg-1"></div>
		<div class="col-lg-9"style="text-align:center;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				<h3 style="color:#3482AE;font-family:'exo';"> Check Existing PR</h3>
			</div>
		</div>	
		
	<div class="col-lg-1"></div>
	</div>
  
 
 </div>
  
  
   <div class="row" style="margin-left:12%;">
		
	   <div class="col-lg-5">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/pr_master_draft');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Drafted PR</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/pr_master_draft');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Drafted PR</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	  
	    <div class="col-lg-5">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Pending PR</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Pending PR</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	   </div>
	   
	    <div class="row" style="margin-left:12%;">
		
	   <div class="col-lg-5">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/processed_pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Processed PR</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/processed_pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Processed PR</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	  
	    <div class="col-lg-5">
          <!-- small box --><?php if($emp_status !='1'){ ?>
		  <a href="<?php echo site_url('purchase/PR/rejected_pr_master');  ?>" style="color:#FFFFFF;">
		   <a href="#" class="na" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Rejected PR</h5>
			  </div>
		  </a>
		  <?php } else {  ?>
		 
		   <a href="<?php echo site_url('purchase/PR/rejected_pr_master');  ?>" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';" >Rejected PR</h5>
			</div>
		  </a>
		  <?php } ?>
       </div>
	   </div>
  
  
  
  
  
   <!-- small box
        <div class="col-lg-6 col-xs-6">
          
		  <a href="<?php echo site_url('purchase/PR/pr_master_draft') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

         <p>Drafted PR</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
      
        <div class="col-lg-6 col-xs-6">
          
		   <a href="<?php echo site_url('purchase/PR/pr_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Pending PR
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
	
		<div class="col-lg-6 col-xs-6">
         
		   <a href="<?php echo site_url('purchase/PR/processed_pr_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Processed PR
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
      
		<div class="col-lg-6 col-xs-6">
         
		   <a href="<?php echo site_url('purchase/PR/rejected_pr_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Rejected PR</p>
            </div>
           
            
          </div>
		  </a>
        </div>
		     </div>
     
  
       
	   -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>