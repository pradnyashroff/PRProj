 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase</title>
     	   <?php include_once 'styles.php'; ?>
		   <style>
.col-lg-3,.col-lg-4,.col-lg-8{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:4%;
				padding-bottom:4%;
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
<!-- Site wrapper -->
 <?php include_once 'headsidelist.php'; ?>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
  <section class="content" >
    <?php
	   
			if($emp_code=="100782" || $emp_code=="100890" || $emp_code=="100847")
			{
	   ?>
   
   <div class="row" style="margin-left:25%;margin-right:0%;margin-top:13%;">
		
	   <div class="col-lg-4">
          <!-- small box -->
		
		   <a href="<?php echo site_url('ATS/Ats/new_asset') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Create an Asset </h5>
			  </div>
		  </a>	
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	
	 
	 <h5></h5>
		 

			<h4 >  </h4 >
		
			</div>
		  </a>
		  
       </div>
	  
	  
	   <div class="col-lg-4">
          <!-- small box -->
		 
		     <a href="<?php echo site_url('ATS/Ats/asset_master') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Asset Master </h5>
			  </div>
		  </a>
		  
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	  
	 
	 <p><h4 ></h4></p>
		 
		<h4 > 
		</h4 >
       </div>
	    </div>
	   
	   </div>
	   <div class="row" style="margin-left:25%;margin-right:0%;">
	    <div class="col-lg-4">
          <!-- small box -->
		  
		 <a href="<?php echo site_url('ATS/Ats/scan_asset') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Scan Asset</h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	 
	 
	 <p><h4 ></h4></p>
		

			<h4 >  </h4 >
		 
       </div>
	   
	   
	   </div>
	    <div class="col-lg-4">
          <!-- small box -->
		 	 <a href="<?php echo site_url('ATS/Ats/archival_master') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Asset Verification Master </h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" ></h5>
	
	 
	 <p><h4 ></h4></p>
		 
       </div> </div>
	   
	   
	   </div>
	   
	   
	 
	   	   <div class="row" style="margin-left:25%;margin-right:0%;">
	    <div class="col-lg-8">
          <!-- small box -->
	
		 <a href="<?php echo site_url('ATS/Ats/insert_excel') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Insert Via Excel</h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	 
	 
	 <p><h4 ></h4></p>
		

			<h4 >  </h4 >
		 
       </div>
	   
	   
	   </div>

	   
	   
	   </div>
	   
	   					   	  
	   <?php
			}
			
			else
			{
				?>
				
				
				 <div class="row" style="margin-left:25%;margin-right:0%;margin-top:13%;">
		
	   <div class="col-lg-4">
          <!-- small box -->
		
		   <a href="<?php echo site_url('ATS/Ats/new_asset') ?>" class="" style="color:#FFFFFF;"> 
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Create an Asset </h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	
	 
	 <h5></h5>
		 

			<h4 >  </h4 >
		
			</div>
		  </a>
		  
       </div>
	  
	  
	   <div class="col-lg-4">
          <!-- small box -->
		  <a href="" style="color:#FFFFFF;">
		   <a href="<?php echo site_url('ATS/Ats/asset_master') ?>" class="" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >Asset Master </h5>
			  </div>
		  </a>
		  
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	  
	 
	 <p><h4 ></h4></p>
		 
		<h4 > 
		</h4 >
       </div>
	    </div>
	   
	   </div>
	   <div class="row" style="margin-left:25%;margin-right:0%;">
	    <div class="col-lg-4">
          <!-- small box -->
		  
		   <a href="<?php echo site_url('ATS/Ats/scan_asset') ?>" class="" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Scan Asset</h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" >  </h5>
				
	 
	 
	 <p><h4 ></h4></p>
		

			<h4 >  </h4 >
		 
       </div>
	   
	   
	   </div>
	    <div class="col-lg-4">
          <!-- small box -->
		 
		   <a href="<?php echo site_url('ATS/Ats/archival_master') ?>" class="" style="color:#FFFFFF;">
			  <div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" > Asset Verification Master </h5>
			  </div>
		  </a>
		 
		 
		   <a href="" style="color:#FFFFFF;">
			<div class="single_service_part dropdown">
				<i class="flaticon-chip"></i>
				
				<h5 style="font-family:'exo';font-size:13px;" ></h5>
	
	 
	 <p><h4 ></h4></p>
		 
       </div> </div>
	   
	   
	   </div>
	   
	   

	   <?php
			}
			?>
			
			
	   </div>
	 
  <!-- start -->
  	     


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