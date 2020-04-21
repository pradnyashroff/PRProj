 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
<style>
	.col-lg-4{
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrative</title>
    <?php include_once 'styles.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<!-- Site wrapper -->
  <?php include_once 'headsidelist_ATS.php'; ?>
	<!-- Site wrapper -->
	<div class="wrapper"  >
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header)
			<ol class="breadcrumb" style="    text-align: right;background-color:transparent;">
				<li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				</li> <li class="active">Administrative
				</li>
				</li>
			</ol> -->
			<!-- Main content -->
			<section class="content" style="    padding-top: 5%;  padding-left: 10%;  padding-right: 10%;">
				<div class="row" style="margin-left:2%;">
					<div class="col-lg-1"></div>
						<div class="col-lg-9"style="text-align:center;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<h3 style="color:#3482AE;font-family:'exo';"> Administrative</h3>
							</div>
						</div>
					<div class="col-lg-1"></div>
				</div>
				<div class="row" style="margin-left:2%;">
					
					<div class="col-lg-4">
					<!-- small box -->
						<a href="<?php echo site_url('purchase/Mgmt_ctr/pr_list') ?>" style="color:#FFFFFF;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >View PR</h5>
							 </div>
						</a>
					</div>
					<!-- ./col -->
					
					<div class="col-lg-4">
						<!-- small box -->
						<a href="<?php echo site_url('purchase/Mgmt_ctr/qcs_list') ?>" style="color:#FFFFFF;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >View QCS</h5>
							 </div>
						</a>
					</div>
					<!-- ./col -->	
					<div class="col-lg-4 col-xs-6">
						<a href="<?php echo site_url('purchase/Mgmt_ctr/capex_list') ?>" style="color:#FFFFFF;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >View Capex</h5>
							 </div>
						</a>
					</div>
					</div>
					<div class="row" style="margin-left:2%;">
					<div class="col-lg-4 col-xs-6">
						<!-- small box -->
						<a href="<?php echo site_url('purchase/Mgmt_ctr/informal_po_list') ?>" style="color:#FFFFFF;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >View Informal PO</h5>
							 </div>
						</a>
					</div>
					<div class="col-lg-4 col-xs-6">
						<!-- small box -->
						<a href="<?php echo site_url('purchase/Mgmt_ctr/itemcode_list') ?>" style="color:#FFFFFF;">
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >View ItemCode</h5>
							 </div>
						</a>
					</div>
					<div class="col-lg-4 col-xs-6" >          
						<a href="<?php echo site_url('purchase/Mgmt_ctr/purchaseReport') ?>" style="color:#FFFFFF;">             
							<div class="single_service_part dropdown">
								<i class="flaticon-chip"></i>
								<i class='' style='font-size:24px'></i>
								<h5 style="font-family:'exo';" >Reports</h5>
							 </div>
						</a> 
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->
			</section><!-- /.content -->
		</div>
	</div>
	<!-- /.content-wrapper -->
	<?php include_once 'scripts.php'; ?>
</body>
</html>