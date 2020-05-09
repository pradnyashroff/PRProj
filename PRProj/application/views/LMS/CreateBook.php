<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Send Book Request</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Send Book Request
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('LMS/LMS_cntr/User_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('LMS/LMS_cntr/User_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;">LMS</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Send Book Request
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<div class="box-body">
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('LMS/LMS_cntr/SendRequest') ?>" >
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">1 . Your Details</h3>
										<div class="box-tools pull-center">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<div class="box-body">
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">1</label>
											<label class="col-sm-4 pull-left control-label" style="font-family: exo;">Order ID</label>
											<div class="form-group  col-sm-6">
												<input class="form-control" type="text" name="txt_OrderId" id="txt_OrderId" value="Automatic" required style="background-color:#E6F2FF;" readonly />
											</div>
										</div>
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">2</label>
											<label class="col-sm-4 pull-left control-label">Name</label>
											<div class="form-group  col-sm-6">
												<input class="form-control" type="hidden" name="txt_emp_code" id="txt_emp_code" value="<?php echo $emp_code; ?>" required style="background-color:#E6F2FF;" readonly />
												<input class="form-control" type="text" name="txt_emp_nm" id="txt_emp_nm" value="<?php echo $emp_name; ?>" required style="background-color:#E6F2FF;" readonly />
                                                
											</div>
										</div>
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">3</label>
											<label class="col-sm-4 pull-left control-label"> Date</label>
											<div class="form-group  col-sm-6">
												<?php date_default_timezone_set('Asia/Kolkata'); $date = date('d-m-Y');?>
												<input class="form-control" type="text" name="txt_date" id="txt_date" value="<?php echo $date;?>" required style="background-color:#E6F2FF;" readonly />
												
											</div>
										</div> 
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">4</label>
											<label class="col-sm-4 pull-left control-label"> Plant </label>
											<div class="form-group  col-sm-6">
												<input class="form-control" type="text" name="txt_plant" id="txt_plant" value="<?php echo $plant_code;?>" required style="background-color:#E6F2FF;" readonly />
											</div>
										</div>
										
										
										 <div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">5</label>
											<label class="col-sm-4 pull-left control-label">Department</label>
											<div class="form-group  col-sm-6">
												<input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="dept_id" class="form-control"  required>
												<?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
												<input class="form-control" type="text" name="txt_dept" id="txt_dept" value="<?php print_r($dept_nm['dept_name']); ?>" required style="background-color:#E6F2FF;" readonly />
                                                
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">2 . Books Details</h3>
										<div class="box-tools pull-center">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<div class="box-body">					 
										<div class="form-group col-sm-12">
											<div class="table-responsive">
												<input class="form-control" type="hidden" name="txt_bookID" id="txt_bookID" value="<?php echo $book_id ;?>" required style="background-color:#E6F2FF;" readonly />
												<?php $fetchBookDetails= $this->method_call->fetchBookDetails($book_id);
														if($fetchBookDetails!=null){
															$sr_no=1;
														foreach ($fetchBookDetails->result() as $bookDetail)  
														{
													?>
													<div class="form-group col-sm-4" hidden>
														<label class="col-sm-1 pull-left control-label">1</label>
														<label class="col-sm-4 pull-left control-label">Book ID</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_bookId" id="txt_bookId" value="<?php  echo $bookDetail->book_id; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">1</label>
														<label class="col-sm-4 pull-left control-label">Book Name</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_BookName" id="txt_BookName" value="<?php  echo $bookDetail->book_name; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">2</label>
														<label class="col-sm-4 pull-left control-label">Author Name</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_AuthorNm" id="txt_AuthorNm" value="<?php  echo $bookDetail->autho_name; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">3</label>
														<label class="col-sm-4 pull-left control-label">Publisher</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_Publisher" id="txt_Publisher" value="<?php  echo $bookDetail->publisher; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">4</label>
														<label class="col-sm-4 pull-left control-label">Book Price</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_BookPrice" id="txt_BookPrice" value="<?php  echo $bookDetail->book_price; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">5</label>
														<label class="col-sm-4 pull-left control-label">Edition</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_Edition" id="txt_Edition" value="<?php  echo $bookDetail->edition; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-4">
														<label class="col-sm-1 pull-left control-label">6</label>
														<label class="col-sm-4 pull-left control-label">Book Thumbnel</label>
														<div class="form-group  col-sm-6">
															<img src="<?php echo base_url().'uploads/LMS/BookThumnel/'.$bookDetail->book_tumbnel ?>" style="height:50px;width:100px">
														</div>
													</div>


													<?php
														}
													}
													?>
												
											</div>
											
										</div> 
									</div> 
								</div> 
							</div>
							<div class="col-sm-12">
								<label class="col-sm-2 pull-left control-label">3.&nbsp;&nbsp;&nbsp;&nbsp;Comment</label>
								<div class="input-group  col-sm-6">
									<textarea class="form-control" rows="4" cols="50" name="areaComment" required></textarea>
								</div>
							</div>
							<div class="col-sm-12"><br>
								<center> <button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Send Request</button>
								</center>
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

