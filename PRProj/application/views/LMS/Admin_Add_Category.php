<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Category</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Category
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('LMS/LMS_cntr/Admin_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('LMS/LMS_cntr/Admin_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;">LMS</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Add Category
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<div class="box-body">
						<form method="post" id="add_book_details" name="add_book_details" action="<?php echo site_url('LMS/LMS_cntr/addBookCate') ?>" enctype="multipart/form-data" >
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Add Category</h3>
									</div>
									<div class="box-body">
										<div class="form-group col-sm-12">
											<label class="col-sm-1 pull-left control-label">1</label>
											<label class="col-sm-4 pull-left control-label">Category Name</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" name="txt_cate_Name" id="txt_cate_Name" value="" required />
											</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="col-sm-1 pull-left control-label">2</label>
											<label class="col-sm-4 pull-left control-label">Category Description :</label>
											<div class="input-group  col-sm-6">
                                                <textarea class="form-control" rows="4" cols="50" name="txtArea_cate_descri" required> </textarea>
											</div>
										</div>
										
										<div class="form-group col-sm-12">
										<center><button type="submit" name="save"  class="btn" style="width: 19%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add</button></center>
										</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
		<?php include_once 'scripts.php'; ?>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function (){
				var table = $('#example').DataTable({
					'columnDefs': [
					{
						'targets': 0,
					}
					],
					'select': {
						'style': 'multi'
					},
					"bStateSave": true,
					"ordering": false,
					'order': [[1, 'desc']]
				});
			});

		</script>
	</body>
</html>

