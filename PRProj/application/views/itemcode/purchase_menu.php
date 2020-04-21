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
<div class="wrapper"  >


 
 
 
 
 
 
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
<h3> Purchase
 </h3><br><br>	</center>
	
	</div>
   
   
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
		  <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

         <p>Purchase Requisition</p>
            </div>
          
            
           
          </div>
		   </a>
        </div>
        <!-- ./col  -->
		    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
		   
		   
		   
		   <a href="<?php echo site_url('purchase/PR/approved_list') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>QCS
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
		
		
		
		<!--
        <div class="col-lg-6 col-xs-6">
       
		   <a href="
		   
		   
		   <?php  if($emp_dept=='25'){ echo site_url('purchase/QCS/index'); }else{ echo site_url('purchase/PR/'); } ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>QCS
</p>
            </div>
           
            
          </div>
		  </a>
        </div> -->
        <!-- ./col -->
		
		
				<div class="col-lg-6 col-xs-6">
          <!-- small box -->
		    <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Item Code Generation</p>
            </div>
           
            
          </div>
		  </a>
        </div>
		
		
		<div class="col-lg-6 col-xs-6">
          <!-- small box -->
		    <a href="<?php echo site_url('purchase/capex/capex_menu') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>CAPEX
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
        <!-- ./col -->
		
		
		<!--
		<div class="col-lg-6 col-xs-6">
        
		   <a href="<?php echo site_url('') ?>">
          <div class="small-box bg-skincolor">
            <div class="inner">

              <p>Reports
</p>
            </div>
           
            
          </div>
		  </a>
        </div>
		-->
		
        <!-- ./col -->
        </div>
     
  
       <!-- /.row -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>

  
  </body>
</html>