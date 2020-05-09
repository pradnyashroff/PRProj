<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Available Book</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Available Book
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Available Book
                    </li>
                    </li>
                </ol>
            </section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">        
								<div class="table-responsive">
									<table id="example" class="table table">
										<thead>
											<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
												<th>Book ID</th>
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
															$Quantity=$booktot->total_book;
															if($Quantity<0)
															{

															}
															else{
													?>
									<tr>
                                        <td><a href="#" class="fa fa-eye" style="color:red;" data-toggle="modal" data-target="#BookDetails" onclick="Book_Detail(<?php echo $booktot->book_id; ?>)" ><?php echo $booktot->book_id; ?></a></td>
                                        <td><?php echo $booktot->book_name; ?></td>
										<td><?php echo $booktot->autho_name; ?></td>
                                        <td><?php echo $booktot->publisher; ?></td>
                                        <td><?php echo $booktot->total_book; ?></td>
                                        <td> <a href="<?php echo site_url('LMS/LMS_cntr/CreateBook/'.$booktot->book_id);?>" style="color:green;" class=""><button>Book Request</button></a></td>
                                        
									</tr>
									<?php $sr_no++;   } } } ?>
                                    </tbody>
								</table>
							</div> 
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

