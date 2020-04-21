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


       	   <?php include_once 'headsidelist_cfo.php'; ?>

 
 
<!-- Site wrapper -->



 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
</li> <li class="active">Purchase
</li>
</li>
      </ol>

    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row">
   
   <div class="col-lg-12 col-xs-12" >
	<center>
<h3> QCS
 </h3><br><br>	</center>
	
	</div>
   
   
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		  <a href="<?php echo site_url('purchase/QCS/sourcing_head_approve_list') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">
 
         <p>Pending Approvals</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

               <!--<p>In Process QCS
</p>-->
<p> Create QCS </p>
            </div>
           
            
          </div>
		  </a>
        </div>
        <!-- ./col -->
		
		
		<div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/QCS/processed_master') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Processed QCS
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
		
	
        <!-- ./col -->
		
		
        <!-- ./col -->
        </div>
     
  
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>