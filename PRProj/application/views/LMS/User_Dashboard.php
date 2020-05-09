	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LMS</title> 
        <?php include_once 'styles.php'; ?>
        <style>
			.bs-wizard {margin-top: 40px;}
			/*Form Wizard*/
			.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
			.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
			.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
			.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
			.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
			.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #3482AE; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
			.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #ffffff; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
			.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
			.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #3482AE;}
			.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
			.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
			.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
			.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
			.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
			.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
			.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
			.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
			.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
			/*END Form Wizard*/
			label,.col-sm-1,.box-title
			{
				color:#3482AE;
				text-transform: uppercase;
				font-family:'exo';
			}
			.kv-file-upload{
				display:none;
				font-family:'exo';
			}
			@media (min-width: 992px) {
				.row-fluid 
				{
					overflow-x: scroll;
					white-space: nowrap;
					max-height:500px;
					font-family:'exo';
				}
				.col-md-3 
				{
					display: inline-block;
					vertical-align: top;
					float: none;
					font-family:'exo';
				}
			}
			.col-lg-3,.col-lg-6{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:1%;
				padding-bottom:1%;
				text-transform: uppercase;
				font-family:'exo';
			}
			
				
		</style>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
    </head>
	<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >  	  
        <?php include_once 'headsidelist.php'; ?> 
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
			<section class="content-header">  
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">User DashBoard
				<?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
				</h1>
               
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-Home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">LMS</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">User DashBoard
                    </li>
                    </li>
                </ol>
            </section>
            <section class="content">
				<div class="wrapper">
					<div class="box-body">
						<div class="row" style="margin-left:1%;margin-right:1%;">
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="AvilableBookTbl"> <h4 style="color:white;font-family: exo;">Available Book</h4></a>
									<?php  $bookCount= $this->method_call->Admin_Stock_Total_Book();
 										if($bookCount!=null){
 									?> 
	 	 							<?php echo count($bookCount->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?> 
				

				 		 				 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="PendingBookTbl"> <h4 style="color:white;">Pending Book</h4></a>
									<?php  $bookPendingCount= $this->method_call->pendingBook($emp_code);
 										if($bookPendingCount!=null){
 									?> 
	 	 							<?php echo count($bookPendingCount->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?>		 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="IssuedBookTbl"> <h4 style="color:white;">Issued Book</h4></a>
									<?php  $bookIssuedCount= $this->method_call->issuedBook($emp_code);
 										if($bookIssuedCount!=null){
 									?> 
	 	 							<?php echo count($bookIssuedCount->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?>			 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="E_BookTbl"> <h4 style="color:white;">E-Book</h4></a>
									<?php  $eBookCount= $this->method_call->E_BookCount();
 										if($eBookCount!=null){
 									?> 
	 	 							<?php echo count($eBookCount->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?>			 
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-left:0.5%;margin-right:0.5%;">
						<div class="col-md-6">
							<div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
								<span class="list-group-item list-group-item-action" style="background-color:#3482AE;" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center;color:white;"> Pending Book Table</h6></span>
								<div class="table-responsive">  
									<table id="example" class="table table">
									<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
										<th>Order ID</th>
										<th>Book Name</th>
										<th>order Date</th>
										<th>Status</th>
									</tr>
								</table>
									<marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();"style="height:20%;">
										<table id="example" class="table table">
											<tbody>
												<?php $bookPendingCount= $this->method_call->pendingBook($emp_code);
														if($bookPendingCount!=null){
															$sr_no=1;
														foreach ($bookPendingCount->result() as $row)  
														{
													?>
												
												<tr>
													<td> <a href="<?php echo site_url('LMS/LMS_cntr/PendingView/'.$row->order_id);?>"style="color:red;" class="fa fa-eye"><?php echo $row->order_id; ?></a></td>
													<td><?php $book_nm=$this->method_call->fetch_book_nm($row->book_id);?>
														<?php print_r($book_nm['book_name']); ?></td>
													<td><?php echo $row->order_date; ?></td>
													<td><?php $status=$row->order_status; 
																if($status==0)
																{
																	echo "Pending";
																}
													?></td>
												<?php
											}
										}
										?>
											</tbody>
										</table>
									</marquee>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
								<span class="list-group-item list-group-item-action" style="background-color:#3482AE;" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center;color:white;">Return Book(Cross Deadline) </h6></span>
								<div class="table-responsive"> 
								<table id="example" class="table table">
									<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
										<th>Order ID</th>
										<th>Book Name</th>
										<th>Return Date</th>
									</tr>
								</table>
								<marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();"style="height:20%;">
									<table id="example" class="table table">
										<tbody>
											<?php 
												
												date_default_timezone_set('Asia/Kolkata');
							       			 	$NewDate=Date('d-m-Y', strtotime('+3 days'));
											 	$bookIssuedCount= $this->method_call->issuedBook($emp_code);
												if($bookIssuedCount!=null){
													$sr_no=1;
													foreach ($bookIssuedCount->result() as $row)  
													{
														$dueDate=$row->book_due_date;
														$now = time(); // or your date as well
														$your_date = strtotime("$dueDate");
														$datediff = $now - $your_date;

														$dueDates=round($datediff / (60 * 60 * 24));
														if($dueDates<1 && $dueDates>=-2)
														{
														?>
											<tr style="background-color: Yellow;color: black;">
												<td> <a href="<?php echo site_url('LMS/LMS_cntr/User_Issued_Book_View/'.$row->order_id);?>" style="color:red;" class="fa fa-eye"><?php echo $row->order_id; ?></a></td>
												<td><?php $book_nm=$this->method_call->fetch_book_nm($row->book_id);?>
														<?php print_r($book_nm['book_name']); ?></td>
												<td><?php echo $row->book_due_date; ?></td>
											</tr>
											<?php  }
													elseif ($dueDates<-1) 
													{
												 ?>
												<tr style="background-color: green;color: white;">
												<td> <a href="<?php echo site_url('LMS/LMS_cntr/User_Issued_Book_View/'.$row->order_id);?>" style="color:red;" class="fa fa-eye"><?php echo $row->order_id; ?></a></td>
												<td><?php $book_nm=$this->method_call->fetch_book_nm($row->book_id);?>
														<?php print_r($book_nm['book_name']); ?></td>
												<td><?php echo $row->book_due_date; ?></td>
											</tr>


											<?php  }
													elseif ($dueDates>=	1) 
													{
												 ?>
												<tr style="background-color: red;color: white;">
												<td> <a href="<?php echo site_url('LMS/LMS_cntr/User_Issued_Book_View/'.$row->order_id);?>" style="color:red;" class="fa fa-eye"><?php echo $row->order_id; ?></a></td>
												<td><?php $book_nm=$this->method_call->fetch_book_nm($row->book_id);?>
														<?php print_r($book_nm['book_name']); ?></td>
												<td><?php echo $row->book_due_date; ?></td>
											</tr>


											 <?php } } } ?>
										</tbody>
									</table>
								</marquee>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="well" style="background-color:white; ">
								<h4 style="color:#3482AE;font-family:'exo';"> Book Request Flow </h4>
								<div class="row bs-wizard" style="border-bottom:0;">
									<div class="col-xs-6 bs-wizard-step complete"><!-- complete -->
										<div class="text-center bs-wizard-stepnum" style="color:#3482AE;font-family:'exo';">Step 1</div>
										<div class="progress"><div class="progress-bar"></div></div>
										<a href="#" class="bs-wizard-dot"></a>
										<div class="bs-wizard-info text-center" style="color:#3482AE;font-family:'exo';"> Request Book</div>
									</div>
									<div class="col-xs-6 bs-wizard-step complete"><!-- complete -->
										<div class="text-center bs-wizard-stepnum" style="color:#3482AE;font-family:'exo';">Step 2</div>
										<div class="progress"><div class="progress-bar"></div></div>
										<a href="#" class="bs-wizard-dot"></a>
										<div class="bs-wizard-info text-center" style="color:#3482AE;font-family:'exo';">Book Keeper</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="modal fade displaycontent" id="reqt_book">
			<div class="modal-dialog" role="document" style="width: 1000px;">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#3482AE">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Request New Book</h4>
					</div>
					<div class="modal-body">
						<section class="module pt-10" id="contact" >
							<div class="container" style="width: auto;">
								<br>
								<form method="post" id="reqt_book_details" name="reqt_book_details" action="" >
									<div class="row">
										<div class="col-sm-12" style="  ">
											<div class="form-group col-md-6">
												<label>Emp Name</label>
												<input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
												<input class="form-control" style="background-color:#E6F2FF;" readonly type="text" name="txt_emp_name" id="txt_emp_name" value="<?php echo $emp_name;?>"/>		
											</div>
											<div class="form-group col-md-6">
												<label for="sel1">Date</label>
												<?php 
													date_default_timezone_set('Asia/Kolkata');
													$date = date('d-m-Y');
												?>
												<input class="form-control" style="background-color:#E6F2FF;" readonly type="text" name="txt_reqt_date" id="txt_reqt_date" value="<?php echo $date;?>"/>
											</div>
											<div class="form-group col-md-6">
												<label >Plant</label>
												<?php $plant_nm=$this->method_call->fetch_plant_nm($plant_code); $plantnm=$plant_nm['plant_name']; ?>
												<input class="form-control" type="text" style="background-color:#E6F2FF;" readonly name="txt_plant_name" id="txt_plant_name" value="<?php echo $plantnm;?>"/>	
											</div>
											<div class="form-group col-md-6">
												<label >Department</label>
												<?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept); $deptnm=$dept_nm['dept_name']; ?>
												<input class="form-control" style="background-color:#E6F2FF;" readonly type="text" name="txt_dept_name" id="txt_dept_name" value="<?php echo$deptnm; ?>"/>		
											</div>
											<div class="form-group col-md-6">
												<label >Book Name</label>
												<input class="form-control" type="text" required name="txt_book_name" id="txt_book_name" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Author</label>
												<input class="form-control" type="text"  required name="txt_author" id="txt_author" value=""/>		
											</div>
											<div class="form-group col-md-6">
												<label >Publisher</label>
												<input class="form-control" type="text" required id="txt_publisher" name="txt_publisher" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Quantity</label>
												<input class="form-control" type="text" required name="txt_quantity" id="txt_quantity" value=""/>		
											</div>
											<div class="form-group col-md-6">
												<label >Purpose</label>
												<textarea class="form-control" required rows="3" name="area_purpose"></textarea>  
											</div>
											
                                        </div>
										<center><button type="submit" name="save"  class="btn" style="width: 19%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Submit</button></center> 
									</section>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
    
		<?php include_once 'scripts.php'; ?>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script> 
			$(function () 
			{
				$('#example').excelTableFilter();
			});
			
		</script>
	</body>
</html>

