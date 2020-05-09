<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add New Book</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add New Book
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Add New Book
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<div class="box-body">
						<form method="post" id="add_book_details" name="add_book_details" action="<?php echo site_url('LMS/LMS_cntr/addBook') ?>" enctype="multipart/form-data" >
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Add New Book</h3>
									</div>
									<div class="box-body">
										<input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">1</label>
											<label class="col-sm-4 pull-left control-label">Category </label>
											<div class="input-group  col-sm-6">
												<select class="form-control" required name="sel_Category" >
							 						<option value="" >Select Category</option>
							 						<?php $Book_Category= $this->method_call->book_Category();
														if($Book_Category!=null){
														foreach ($Book_Category->result() as $bookCat)  
														{
													?>
													<option value="<?php echo $bookCat->cat_id; ?>"><?php echo $bookCat->cat_name;  ?></option>
													<?php 
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">2</label>
											<label class="col-sm-4 pull-left control-label">Book Type :</label>
											<div class="input-group  col-sm-6">
                                                <select class="form-control" required name="sel_Book_Type" onchange="Ebook_Dis(this.value)">
							 						<option value="" >Select Book Type</option>
							 						<option value="E-Book">E-Book</option>
							 						<option value="Book">Book</option>
												</select>
											</div>
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">3</label>
											<label class="col-sm-4 pull-left control-label"> Book Name :</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" name="txt_book_name" id="txt_book_name" value=""/>
											</div>
										</div> 
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">4</label>
											<label class="col-sm-4 pull-left control-label"> Author Name:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" required name="txt_author_name" id="txt_author_name" value=""/>	
											</div>
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">5</label>
											<label class="col-sm-4 pull-left control-label">Publisher:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" required id="txt_publisher" name="txt_publisher" value=""/>
											</div> 	
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">6</label>
											<label class="col-sm-4 pull-left control-label">Book Price:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" required id="txt_price" name="txt_price" value=""/>
											</div>
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">7</label>
											<label class="col-sm-4 pull-left control-label">Edition:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="text" required id="txt_Edition" name="txt_Edition" value=""/>
											</div>
										</div>
										<div class="form-group col-sm-6">
											<label class="col-sm-1 pull-left control-label">8</label>
											<label class="col-sm-4 pull-left control-label">Book Tumbnel:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="file"  name="file_book_tumbnel" />
											</div>
										</div>
										<div class="form-group col-sm-6" id="txt_EBook" style="display: none;">
											<label class="col-sm-1 pull-left control-label">9</label>
											<label class="col-sm-4 pull-left control-label">E-Book Link:</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="file" name="file_EBookLink" />
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

			function Ebook_Dis(id)
			{
    			
   				if(id =='E-Book')
   				{
   					document.getElementById("txt_EBook").style.display = "block"; 
	            }
				else 
				{
					document.getElementById("txt_EBook").style.display = "none"; 
                }
            }
		</script>
	</body>
</html>

