<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Manage Book Category</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Manage Book Category
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Manage Book Category
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
												<th>Category ID</th>
												<th>Category Name</th>
												<th>Category Description</th>
                                                <th>Action</th>
											</tr>
										</thead>
									<tbody>
										<?php $Admin_manage_cate= $this->method_call->Adminmanage_cate();
														if($Admin_manage_cate!=null){
															$sr_no=1;
														foreach ($Admin_manage_cate->result() as $bookCate)  
														{
													?>
									<tr>
                                        <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#BookDeta" onclick="CateDetails(<?php echo $bookCate->cat_id; ?>)" ><?php echo $bookCate->cat_id;?></a></td>

                                        <td><?php echo $bookCate->cat_name; ?></td>
										<td><?php echo $bookCate->cat_desc; ?></td>
                                        <td><a href="" onclick="deleteBookCate('<?php echo $bookCate->cat_id; ?>')"><span class='glyphicon glyphicon-trash' style="color:red;"></span></a></td>
										
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
                    <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Update Category Details</h4>
                </div>
                <div class="modal-body">
                    <section class="module pt-10" id="contact" >
                        <div class="container" style="width: auto;">
                            <br>
                            <form method="post" id="Edit_Category_details" name="Edit_Category_details" action="<?php echo site_url('LMS/LMS_cntr/editBookCate') ?>" enctype="multipart/form-data" >     
                                <div class="row">
                                    <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>" />
                                    <div class="col-sm-12" style="  ">
                                        <input class="form-control" readonly type="hidden" required name="txtCateId"  id="txtCateId"/>
                                       <div class="form-group col-md-12">
                                            <label>Category Name</label>
                                            <input class="form-control"  type="text" required name="txtCateNm"  id="txtCateNm"/>        
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label> Category Description</label>
                                            <textarea class="form-control" rows="4" cols="50" name="txtCateDescri" id="txtCateDescri" required> </textarea>    
                                        </div>
                                        <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Category</button></center>
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
		function CateDetails(id)
		{
  			alert(id);
    		$.ajax({
        		url : "<?php echo site_url('LMS/LMS_cntr/EditCate')?>/" + id,
        		type: "GET",
        		dataType: "JSON",
        		success: function(data)
        		{  
        			$('[name="txtCateId"]').val(data.cat_id);
                    $('[name="txtCateNm"]').val(data.cat_name);
        		 	$('[name="txtCateDescri"]').val(data.cat_desc);
        		 	
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
        function deleteBookCate(delete_id){
          alert(delete_id);
          $.ajax({
       url : "<?php echo site_url('LMS/LMS_cntr/deleteBookCate')?>/" + delete_id,
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

