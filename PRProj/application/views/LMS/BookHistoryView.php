<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Book History View</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Book History View
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Book History View
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<div class="box-body">
						<?php $RequestBookDetail= $this->method_call->RequestBookDetail($order_id);
 									if($RequestBookDetail!=null){
	 									foreach ($RequestBookDetail->result() as $row)  
         								{  ?>
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">1 . Your Details</h3>
										<div class="box-tools pull-center">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
											</button>
										</div>
									</div>
									<div class="box-body" style="font-family: exo;">
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">1</label>
											<label class="col-sm-4 pull-left control-label" style="font-family: exo;">Order ID</label>
											<div class="input-group  col-sm-6">
												<?php echo $row->order_id; ?>
											</div>
										</div>
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">2</label>
											<label class="col-sm-4 pull-left control-label">Name</label>
											<div class="input-group  col-sm-6">
												<input class="form-control" type="hidden" name="txt_emp_code" id="txt_emp_code" value="<?php echo $row->order_by; ?>" required style="background-color:#E6F2FF;" readonly />

												<?php $emp_nm=$this->method_call->fetch_emp_nm($row->order_by);
												print_r($emp_nm['emp_name']); ?>
											</div>
										</div>
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">3</label>
											<label class="col-sm-4 pull-left control-label"> Order Date</label>
											<div class="input-group  col-sm-6">
												<?php echo $row->order_date;?>
											</div>
										</div> 
										<div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">4</label>
											<label class="col-sm-4 pull-left control-label"> Plant </label>
											<div class="input-group  col-sm-6">
												<?php $plant_code=$this->method_call->fetch_plant($row->order_by);?>
												<?php  print_r($plant_code['plant_code']); ?>
											</div>
										</div>
										
										
										 <div class="form-group col-sm-4">
											<label class="col-sm-1 pull-left control-label">5</label>
											<label class="col-sm-4 pull-left control-label">Department</label>
											<div class="input-group  col-sm-6">
												<?php $dept_code=$this->method_call->fetch_dept_code($row->order_by);
												$emp_dept=$dept_code['dept_code'];?>
												<?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);
												print_r($dept_nm['dept_name']); ?>
                                                
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
													
													<div class="form-group col-sm-4" hidden>
														<label class="col-sm-1 pull-left control-label">1</label>
														<label class="col-sm-4 pull-left control-label">Book ID</label>
														<div class="input-group  col-sm-6">
															<input class="form-control" type="text" name="txt_BookId" id="txt_BookId" value="<?php  echo $row->book_id; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>

													<?php  $bookDetails= $this->method_call->bookDetails($row->book_id);
														if($bookDetails!=null){
															$sr_no=1;
														foreach ($bookDetails->result() as $row1)  
														{
													?>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">1</label>
														<label class="col-sm-4 pull-left control-label">Book Name</label>
														<div class="input-group  col-sm-6">
															<?php  echo $row1->book_name;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">2</label>
														<label class="col-sm-4 pull-left control-label">Author Name</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->autho_name;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">3</label>
														<label class="col-sm-4 pull-left control-label">Publisher</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->publisher;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">4</label>
														<label class="col-sm-4 pull-left control-label">Book Price</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->book_price;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">5</label>
														<label class="col-sm-4 pull-left control-label">Edition</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->edition;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">6</label>
														<label class="col-sm-4 pull-left control-label">Book Thumbnel</label>
														<div class="form-group  col-sm-6">
															<img src="<?php echo base_url().'uploads/LMS/BookThumnel/'.$row1->book_tumbnel ?>" style="height:50px;width:100px">
														</div>
													</div>
												<?php } } ?>
											</div>
										</div> 
									</div> 
								</div> 
							</div>
							<div class="form-group col-sm-12">
			 					<label class="col-sm-1 pull-left control-label">3</label>
			  					<label class="col-sm-3 pull-left control-label">Justification: </label>
								<div class="input-group  col-sm-6">
                               		<?php echo $row->remark; ?>
               					</div>
               				</div>
               				<div class="form-group col-sm-12">
			 					<label class="col-sm-1 pull-left control-label">4</label>
			  					<label class="col-sm-3 pull-left control-label">Status: </label>
								<div class="input-group  col-sm-6">
									<?php $status=$row->order_status; 
										if($status==0)
										{
											echo "Pending Book";
										}
										elseif($status==1)
										{
											echo "Issued Book";
										}
										elseif($status==2)
										{
											echo "Returned Book";
										}
									?>
                    			</div>
               				</div>
							<?php } } ?>
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

	