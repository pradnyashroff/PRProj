<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Stock Dashboard</title> 
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
			}
			@media (min-width: 992px) {
				.row-fluid 
				{
					overflow-x: scroll;
					white-space: nowrap;
					max-height:500px;
				}
				.col-md-3 
				{
					display: inline-block;
					vertical-align: top;
					float: none;
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
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Stock Dashboard
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Stock Dashboard
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
									<a href="Admin_Book_list"> <h4 style="color:white;">Total Books</h4></a>
									<?php  $totakBookCount= $this->method_call->Admin_Stock_Total_Book();
 										if($totakBookCount!=null){
 									?> 
	 	 							<?php echo count($totakBookCount->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?> 
				 		 			
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="Admin_Stock_OverDueDate"> <h4 style="color:white;">OverDue Date</h4></a>
									<?php $bookOverDueDate= $this->method_call->bookOverDueDate();
 										if($bookOverDueDate!=null)
 										{
											
											echo count($bookOverDueDate->result());
		 										
		 								}
		 								else
		 									{
		 										echo '0' ;
		 									}
		 							?>  		 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;">
									<a href="Admin_Given_Book	"> <h4 style="color:white;">Given Books</h4></a>
									<?php  $admin_Given_book= $this->method_call->admin_Given_book_count($emp_code);
 										if($admin_Given_book!=null){
 											echo count($admin_Given_book->result()); ?>
		 							<?php
		 								}
		 							else{?>
										<?php echo '0' ;}?>  
								</div>
							</div>
							<div class="col-lg-3">
								<div class="well-sm" style="text-align:center;padding-top:6%;padding-bottom:7%;">
									<a href="<?php echo site_url('LMS/LMS_cntr/Admin_Add_New_Book') ?>" class=""><h4 style="color:white;">Add New Book</h4></a>		 
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 5%;">
							<div class="col-sm-12">
							<h4 style="color:#3482AE;font-family:'exo';">Total Book</h4><br>
							<div class="table-responsive">
									<table id="example" class="table table">
										<thead>
											<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
												<th>Sr.No</th>
												<th>Book Name</th>
												<th>Author</th>
												<th>Publisher</th>
												<th>Quantity</th>
												<th>Action</th>
											</tr>
										</thead>
									<tbody>
										<?php $Admin_Stock_total_book= $this->method_call->Admin_Stock_Total_Book();
														if($Admin_Stock_total_book!=null){
															$sr_no=1;
														foreach ($Admin_Stock_total_book->result() as $booktot)  
														{
													?>
									<tr>

									<td><a href="#" class="fa fa-eye" style="color:red;" data-toggle="modal" data-target="#BookDetails" onclick="Book_Detail(<?php echo $booktot->book_id; ?>)" ><?php echo $booktot->book_id; ?></a></td>
										<td><?php echo $booktot->book_name; ?></td>
										<td><?php echo $booktot->autho_name; ?></td>
										<td><?php echo $booktot->publisher; ?></td>
										<td><?php echo $booktot->total_book; ?></td>
										<td><a><span class='glyphicon glyphicon-trash' style="color:red;"></span></a></td>
										
									</tr>
									<?php $sr_no++;  } } ?>
                                    </tbody>
								</table>
							
					</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="modal fade displaycontent" id="BookDetails">
			<div class="modal-dialog" role="document" style="width: 900px;">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#3482AE">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Book Details</h4>
					</div>
					<div class="modal-body">
						<section class="module pt-10" id="contact" >
							<div class="container" style="width: auto;">
								<br>
								<form method="post" id="reqt_book_details" name="reqt_book_details" action="" >
									<div class="row">
										<div class="col-sm-12" style="  ">
											<input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
											<input class="form-control" type="hidden" required name="txtBookId" value="" />
											<div class="form-group col-md-6">
												<label>Book Name</label>
												<input class="form-control" type="text" style="background-color:#E6F2FF;" readonly name="txt_book_name" id="txt_book_name" value=""/>		
											</div>
											<div class="form-group col-md-6">
												<label >Author Name</label>
												<input class="form-control" type="text" required name="txt_author_name" id="txt_author_name" style="background-color:#E6F2FF;" readonly value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Publisher</label>
												<input class="form-control" type="text" style="background-color:#E6F2FF;" readonly required id="txt_publisher" name="txt_publisher" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Edition</label>
												<input class="form-control" type="text" style="background-color:#E6F2FF;" readonly required id="txt_Edition" name="txt_Edition" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Price</label>
												<input class="form-control" type="text" style="background-color:#E6F2FF;" readonly required name="txt_Price" id="txt_Price" value=""/>		
											</div>
											 <div class="form-group col-md-6">
                                        		<label  >Book Thumbnel</label>
                                        		<div class="div_bookThumbnel">
                                        		</div>
                                    		</div>
											
										</div>
										 
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
	<script type="text/javascript">
		function Book_Detail(id)
		{
  			//alert(id);
  			$.ajax({
		        url : "<?php echo site_url('LMS/LMS_cntr/viewBookDetails')?>/" + id,
		        type: "GET",
		        dataType: "JSON",
		        success: function(data)
		        {   $('[name="txtBookId"]').val(data.book_id);
		            $('[name="txt_book_name"]').val(data.book_name);
		            $('[name="txt_author_name"]').val(data.autho_name);
		            $('[name="txt_publisher"]').val(data.publisher);
		            $('[name="txt_Price"]').val(data.book_price);
		            $('[name="txt_Edition"]').val(data.edition);
		            $('.div_bookThumbnel').html('<img src="<?php echo base_url()."uploads/LMS/BookThumnel/"?>' + data.book_tumbnel + '" style="height:50px;width:50px" />');
		        },
        		error: function (jqXHR, textStatus, errorThrown)
        		{
            		alert('Error get data from ajax');
        		}
   			});
  		}
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

