<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Issued Book View</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Issued Book View
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Issued Book View
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('LMS/LMS_cntr/ReturnBook') ?>" >
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
												<input class="form-control" type="hidden" name="txt_Order_Id" id="txt_Order_Id" value="<?php echo $row->order_id; ?>" required style="background-color:#E6F2FF;" readonly />
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
														<label class="col-sm-3 pull-left control-label">Book Name</label>
														<div class="input-group  col-sm-6">
															<?php  echo $row1->book_name;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">2</label>
														<label class="col-sm-3 pull-left control-label">Author Name</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->autho_name;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">3</label>
														<label class="col-sm-3 pull-left control-label">Publisher</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->publisher;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">4</label>
														<label class="col-sm-3 pull-left control-label">Book Price</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->book_price;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">5</label>
														<label class="col-sm-3 pull-left control-label">Edition</label>
														<div class="form-group  col-sm-6">
															<?php  echo $row1->edition;?>
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">6</label>
														<label class="col-sm-3 pull-left control-label">Book Thumbnel</label>
														<div class="form-group  col-sm-6">
															<img src="<?php echo base_url().'uploads/LMS/BookThumnel/'.$row1->book_tumbnel ?>" style="height:50px;width:100px">
														</div>
													</div>
												<?php } } ?>
												<?php  $totalBook= $this->method_call->totalBook($row->book_id);
														if($totalBook!=null){
														foreach ($totalBook->result() as $row2)  
														{
															$totalBook=$row2->total_book;
															$Stock_id=$row2->book_stock_id;
													?>

													<div class="form-group col-sm-4">
															<input class="form-control" type="hidden" name="txt_totalBook" id="txt_totalBook" value="<?php  echo $totalBook;?>" required style="background-color:#E6F2FF;" readonly />
															<input class="form-control" type="hidden" name="txt_BookStockId" id="txt_BookStockId" value="<?php  echo $row2->book_stock_id;?>" required style="background-color:#E6F2FF;" readonly />
													</div>
													<?php
														} }
													?>

													<?php  $InStockBook= $this->method_call->InStockBook($Stock_id);
														if($InStockBook!=null){
														foreach ($InStockBook->result() as $row3)  
														{
															
													?>

													<div class="form-group col-sm-4">
															<input class="form-control" type="hidden" name="txt_Instock" id="txt_Instock" value="<?php  echo $row3->in_stock;?>" required style="background-color:#E6F2FF;" readonly />
															<input class="form-control" type="hidden" name="txt_OutstandingBook" id="txt_OutstandingBook" value="<?php  echo $row3->outstanding_book;?>" required style="background-color:#E6F2FF;" readonly />
													</div>
													<?php
														} }
													?>
										</div> 
									</div> 
								</div> 
							</div>
							<!-- <div class="form-group col-sm-12">
			 					<label class="col-sm-1 pull-left control-label">3</label>
			  					<label class="col-sm-3 pull-left control-label">Justification: </label>
								<div class="input-group  col-sm-6">
                               		<?php echo $row->remark; ?>
               					</div>
               				</div> -->
							<?php } } ?>
							<div class="col-sm-12">
								<label class="col-sm-3 pull-left control-label">3.&nbsp;&nbsp;&nbsp;&nbsp;FeedBack</label>
								<div class="input-group  col-sm-6">
									<textarea class="form-control" rows="2" cols="50" name="areaComment" required></textarea>
								</div>
							</div>
							<!-- <div class="form-group col-lg-12">
								<label class="col-sm-3 pull-left control-label">4.&nbsp;&nbsp;&nbsp;&nbsp;Action</label>
			  			 		<div class="input-group  col-lg-6">
									<input type="radio" name="BookReturn" value="ReturnBook" required >&nbsp;&nbsp; Return Book</input>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="BookReturn" value="RenewBook" > &nbsp;&nbsp;Renew Book</input>
         		               </div>
               			 	</div> -->&nbsp;&nbsp;&nbsp;&nbsp;
               			 	<div class="col-sm-12">
								<div class="col-sm-5"></div>
							 	<div class="col-sm-4">
									<center><button type="submit" name="save"  class="btn" style="width:50%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Submit</button></center>
								</div>
								
								<div class="col-sm-2"></div>
							</div>
						</div>

					</div>
				</form>
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

	 