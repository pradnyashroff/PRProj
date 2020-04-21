 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Insert Via Excel</title>
     	   <?php include_once 'styles.php'; ?>
<style>


   @media (min-width: 992px) {

   .row-fluid {
    overflow-x: scroll;
    white-space: nowrap;
    max-height:500px;
  }
  .col-md-3 {
    display: inline-block;
    vertical-align: top;
    float: none;
  }
}
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
	<?php include_once 'headsidelist.php'; ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Insert Via Excel</h1>
			<ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
				<li><a href="<?php echo site_url('ATS/Ats/ats_menu') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
				<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Insert Via Excel
				</li>
				</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Insert Via Excel</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" action="<?php echo site_url('ATS/ats/ExcelDataAdd/');?>" id="delpur" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group"><br>
									<label for="exampleInputEmail1">Select Excel File</label><br><br>
									<input type="file" required name="userfile" >
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" value="add" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Submit</button>
							</div>
						</form>
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section><!-- /.content -->
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
   <?php include_once 'scripts.php'; ?>
</body>
</html>