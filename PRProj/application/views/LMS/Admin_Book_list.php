<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Book List</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Book List
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('LMS/LMS_cntr/Admin_Stock_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('LMS/LMS_cntr/Admin_Stock_DashBoard') ?>" style="color:#FFFFFF;text-transform: uppercase;">LMS</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Book List
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
												<th>Author Name</th>
                                                <th>Publisher</th>
                                                <th>Edition</th>
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
                                        <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#BookDeta" onclick="BookDetails(<?php echo $booktot->book_id; ?>)" ><?php echo $booktot->book_id;?></a></td>

                                        <td><?php echo $booktot->book_name; ?></td>
										<td><?php echo $booktot->autho_name; ?></td>
                                        <td><?php echo $booktot->publisher; ?></td>
                                        <td><?php echo $booktot->edition; ?></td>
										<td><a href="" onclick="deleteBook('<?php echo $booktot->book_id; ?>')"><span class='glyphicon glyphicon-trash' style="color:red;"></span></a></td>
									</tr>
									<?php $sr_no++;  } } ?>
                                    </tbody>
								</table>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="modal fade displaycontent" id="BookDeta">
        <div class="modal-dialog" role="document" style="width: 720px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3482AE">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Update Book Details</h4>
                </div>
                <div class="modal-body">
                    <section class="module pt-10" id="contact" >
                        <div class="container" style="width: auto;">
                            <br>
                            <form method="post" id="add_book_details" name="Edit_book_details" action="<?php echo site_url('LMS/LMS_cntr/editBookDetails') ?>" enctype="multipart/form-data" >     
                                <div class="row">
                                    <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
                                    <div class="col-sm-12" style="  ">
                                        <input class="form-control" readonly type="hidden" required name="txtBookId"  id="txtBookId"/>
                                        <div class="form-group col-sm-6" hidden>
                                            <label class="col-sm-1 pull-left control-label"></label>
                                            <label class="col-sm-4 pull-left control-label">Total Book :</label>
                                            <div class="input-group  col-sm-6">
                                                <input class="form-control" readonly type="text" required name="txt_total_book"  id="txt_total_book"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Book Name</label>
                                            <input class="form-control"  type="text" required name="txtBookNm"  id="txtBookNm"/>        
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Category</label>
                                            
                                            <select class="form-control" required name="txtBookType"  id="txtBookType" >
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
                                        <div class="form-group col-md-6">
                                            <label>Author Name</label>
                                            <input class="form-control"  type="text" required name="txtBookAuthoNm"  id="txtBookAuthoNm"/>      
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Publisher</label>
                                            <input class="form-control"  type="text" required name="txtPublisher"  id="txtPublisher"/>      
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Price</label>
                                            <input class="form-control"  type="text" required name="txtPrice"  id="txtPrice"/>      
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Edition</label>
                                            <input class="form-control"  type="text" required name="txtEdition"  id="txtEdition"/>      
                                        </div>
                                        <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Book Details</button></center>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
	<?php include_once 'scripts.php'; ?>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script type="text/javascript">
		function BookDetails(id)
		{
  			alert(id);
    		$.ajax({
        		url : "<?php echo site_url('LMS/LMS_cntr/AdminBookDtl')?>/" + id,
        		type: "GET",
        		dataType: "JSON",

        		success: function(data)
        		{  

        			$('[name="txtBookId"]').val(data.book_id);
        		 	$('[name="txtBookNm"]').val(data.book_name);
        		 	$('[name="txtBookType"]').val(data.book_type);
        		 	$('[name="txt_total_book"]').val(data.total_book);
        		 	$('[name="txtBookAuthoNm"]').val(data.autho_name);
        		 	$('[name="txtPublisher"]').val(data.publisher);
        		 	$('[name="txtPrice"]').val(data.book_price);
        		 	$('[name="txtEdition"]').val(data.edition);
                    $('[name="txt_quantity"]').val(data.total_book);
        		 	$('.div_imagetranscrits').html('<img src="<?php echo base_url()."uploads/LMS/BookThumnel/"?>' + data.book_tumbnel + '" style="height:100px;width:100px" />');
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
        function deleteBook(delete_id){
          alert(delete_id);
          $.ajax({
       url : "<?php echo site_url('LMS/LMS_cntr/deleteBook')?>/" + delete_id,
        type: "GET",
        dataType: "JSON",
        success: function()
        {
          
        }
            
            
        });
        location.reload();
        
      }
	</script>
	</body>
</html>

