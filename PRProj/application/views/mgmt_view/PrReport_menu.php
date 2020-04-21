 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase Report</title>
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
    <!-- Content Header (Page header) -->
<ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
</li> <li class="active">Purchase Report
</li>
</li>
      </ol>

    <!-- Main content -->
  <section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
  
   <div class="row">
   
   <div class="col-lg-12 col-xs-12" >
	<center>
<h3> Purchase Report
 </h3><br><br>	</center>
	
	</div>
   
   
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		  <a href="<?php echo site_url('purchase/Mgmt_ctr/pendingPRList') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">
 
         <p>PR Reports</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/Mgmt_ctr/QCSReportList') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

					<p>QCS Reports </p>
            </div>
           
            
          </div>
		  </a>
        </div>
        <!-- ./col -->
		
		
		<div class="col-lg-4 col-xs-6">
          <!-- small box -->
		   <a href="<?php echo site_url('purchase/Mgmt_ctr/capex_list') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p> Capex Reports</p>
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