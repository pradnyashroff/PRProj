 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Capex</title>
     	   <?php include_once 'styles.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini" >

<!-- Site wrapper -->
<div class="wrapper"  >

       	   <?php include_once 'headsidelist.php'; ?>

 
 
<!-- Site wrapper -->
<div class="wrapper"  >



 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header)
<ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
</li> <li class="active">CAPEX
</li>
</li>
      </ol> -->

    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row">
   
   <div class="col-lg-12 col-xs-12" >
	<center>
<h3 style="color:#3482AE; font-family:'exo';text-transform: uppercase;"> CAPEX
 </h3><br><br>	</center>
	
	</div>
   
   
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		  <a href="<?php echo site_url('purchase/capex/capex_create_list') ?>">
          <div class="small-box" style="width:100%;background-color:#3482AE;text-align:center;color:white;font-family:'exo';box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">
            <div class="inner">
 
         <p>Create CAPEX</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>">
         <div class="small-box" style="width:100%;background-color:#3482AE;text-align:center;font-family:'exo';color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">
      
            <div class="inner">

<p> Check Exiting CAPEX Status </p>
            </div>
           
            
          </div>
		  </a>
        </div>
        <!-- ./col -->
		
		
		<div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/QCS/processed_master') ?>">
        <div class="small-box" style="width:100%;background-color:#3482AE;text-align:center;font-family:'exo';color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">
      
            <div class="inner">

              <p>Check CAPEX Approval Status</p>
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