<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Quantity</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Quantity
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Add Quantity
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="wrapper">
					<div class="box-body">
						<form method="post" id="add_book_details" name="add_book_details" action="<?php echo site_url('LMS/LMS_cntr/addBookQuantity') ?>" enctype="multipart/form-data" >
							<div class="box-header with-border">
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Add Quantity</h3>
									</div>
									<div class="box-body">
										 <input class="form-control" type="hidden" name="txt_book_type" id="txt_book_type" style="background-color:#E6F2FF;" readonly value="<?php echo $book_id?>"/>
										<input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
										<?php $fetchBookDetails= $this->method_call->addQuantity($book_id);
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
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">1</label>
														<label class="col-sm-4 pull-left control-label">Book Name</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_BookName" id="txt_BookName" value="<?php  echo $bookDetail->book_name; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">2</label>
														<label class="col-sm-4 pull-left control-label">Author Name</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_AuthorNm" id="txt_AuthorNm" value="<?php  echo $bookDetail->autho_name; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">3</label>
														<label class="col-sm-4 pull-left control-label">Publisher</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_Publisher" id="txt_Publisher" value="<?php  echo $bookDetail->publisher; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">4</label>
														<label class="col-sm-4 pull-left control-label">Book Price</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_BookPrice" id="txt_BookPrice" value="<?php  echo $bookDetail->book_price; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">5</label>
														<label class="col-sm-4 pull-left control-label">Edition</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_Edition" id="txt_Edition" value="<?php  echo $bookDetail->edition; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">6</label>
														<label class="col-sm-4 pull-left control-label">Book Thumbnel</label>
														<div class="form-group  col-sm-6">
															<img src="<?php echo base_url().'uploads/LMS/BookThumnel/'.$bookDetail->book_tumbnel ?>" style="height:50px;width:100px">
														</div>
													</div>

													<div class="form-group col-sm-6">
														<label class="col-sm-1 pull-left control-label">7</label>
														<label class="col-sm-4 pull-left control-label">Quantity</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_quantity" id="txt_quantity" value="" required  />
														</div>
													</div>
													

													<?php
														}
													}
													?>

													<?php $TotalQuantity= $this->method_call->totalQuantity($book_id);
														if($TotalQuantity!=null){
															$sr_no=1;
														foreach ($TotalQuantity->result() as $TQ)  
														{
													?>
													<div class="form-group col-sm-4" hidden>
														<label class="col-sm-1 pull-left control-label">8</label>
														<label class="col-sm-4 pull-left control-label">Toatl Quantity</label>
														<div class="form-group  col-sm-6">
															<input class="form-control" type="text" name="txt_oldQuantity" id="txt_oldQuantity" value="<?php  echo $TQ->total_book; 
															;?>" required style="background-color:#E6F2FF;" readonly />
														</div>
													</div>
													<?php
														}
													}
													?>
												
										<div class="form-group col-sm-12">
										<center><button type="submit" name="save"  class="btn" style="width: 19%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Quantity</button></center>
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
			function addQuantity(id)
		{
  			alert(id);
    		$.ajax({
        		url : "<?php echo site_url('LMS/LMS_cntr/addQuantity')?>/" + id,
        		type: "GET",
        		dataType: "JSON",
        		success: function(data)
        		{  
        			$('[name="txtBookId"]').val(data.book_id);
        		 	$('[name="txtBookNm"]').val(data.book_name);
        		 	$('[name="txtBookType"]').val(data.book_type);
        		 	//$('[name="txt_total_book"]').val(data.total_book);
        		 	$('[name="txtBookAuthoNm"]').val(data.autho_name);
        		 	$('[name="txtPublisher"]').val(data.publisher);
        		 	$('[name="txtPrice"]').val(data.book_price);
        		 	$('[name="txtEdition"]').val(data.edition);
        		 	$('.div_imagetranscrits').html('<img src="<?php echo base_url()."uploads/LMS/BookThumnel/"?>' + data.book_tumbnel + '" style="height:100px;width:100px" />');
                },
        		error: function (jqXHR, textStatus, errorThrown)
        		{
            		alert('Error get data from ajax');
        		}
    		});
		}
		</script>
	</body>
</html>

