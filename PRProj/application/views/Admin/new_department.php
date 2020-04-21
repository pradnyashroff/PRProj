 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Add New Department</title>
			<?php include_once 'styles.php'; ?>
		<style>
			.kv-file-upload{
				display:none;
			}
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
			th{
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
			<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add New Department
				<?php 
					if (isset($error)) 
						{ 
							echo "<div class='message'>";
							echo $error;
							echo "</div>";
						}
				?>
			</h1>
			<ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
				<li><a href="<?php echo site_url('ATS/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
				<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  Add New Department</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row" >
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<!-- Horizontal Form -->
					<div class="box">
						<!-- /.box-header -->
						<!-- form start -->
						<?php echo form_open_multipart('Admin/Admin/add_department'); ?>
						<div class="box-body">
							<div class="form-group col-sm-12">
								<label class="col-sm-2 pull-left control-label">1</label>
								<label class="col-sm-5 pull-left control-label">Department Name </label>
								<div class="col-sm-5 pull-right">
									<input type="text" value=""  name="dept_name" required class="form-control" >
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<div class="col-sm-12">
								<div class="col-sm-4"></div>
								<div class="col-sm-2">
									<button type="submit" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%;">Submit</button>
								</div>
								<div class="col-sm-2">
									<a href="<?php echo site_url('Welcome/index') ?>" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%;">Cancel</a>
								</div>
								<div class="col-sm-4"></div>
							</div>
						</div>
						<!-- /.box-footer -->
						<?php echo form_close(); ?>
					</div>
				</div>
				<!--/.col (right) -->
				<div class="col-md-1"></div>
			</div>
			<!-- /.row -->
		</section>
	  	<?php include_once 'scripts.php'; ?>
	</div>
</body>
</html>