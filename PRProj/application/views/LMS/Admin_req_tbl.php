<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Request Book</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Pending Book
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Request Book
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
												<th>Sr.No</th>
												<th>Emp Name</th>
												<th>HR Name</th>
												<th> Book Name</th>
												<th>Quantity</th>
												<th>Action</th>
											</tr>
										</thead>
									<tbody>
										<td> <a class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#ReqBookDetails" style="color:red;" href="">1</a></td>
										<td>ABC</td>
										<td>XYZ</td>
										<td>CPP</td>
										<td>1</td>
										<td><a><span class='glyphicon glyphicon-trash' style="color:red;"></span></a></td>
                                    </tbody>
								</table>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start Add Book Details-->
	<div class="modal fade displaycontent" id="ReqBookDetails">
			<div class="modal-dialog" role="document" style="width: 700px;">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#3482AE">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Request Book Details</h4>
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
												<label>HR Name</label>
												<input class="form-control" style="background-color:#E6F2FF;" readonly type="text" name="txt_hr_name" id="txt_hr_name" value=""/>		
											</div>
											<div class="form-group col-md-6">
												<label>Book Name</label>
												<input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>" />
												<input class="form-control" style="background-color:#E6F2FF;" readonly type="text"  required name="txt_book_name" id="txt_book_name" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label for="sel1">Author Name</label>
												<input class="form-control" type="text"  required name="txt_auth_name" style="background-color:#E6F2FF;" readonly id="txt_auth_name" value=""/>
											</div>
											<div class="form-group col-md-6">
												<label >Publisher</label>
												<input class="form-control" type="text"  required name="txt_publisher" style="background-color:#E6F2FF;" readonly id="txt_publisher" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Category</label>
												<input class="form-control" type="text"  required name="txt_category" style="background-color:#E6F2FF;" readonly id="txt_category" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Book Type</label>
												<input class="form-control" type="text"  required name="txt_book_type" style="background-color:#E6F2FF;" readonly id="txt_book_type" value=""/>	
											</div>
											<div class="form-group col-md-6">
												<label >Comment</label>
												<textarea class="form-control" rows="3" cols="30" name="areaComment" required> </textarea>
											</div>
											<div class="form-group col-md-12">
												<label >Action</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio"  required name="txt_book_type" style="background-color:#E6F2FF;" readonly id="txt_book_type" value=""/>	&nbsp;&nbsp;Approve&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input  type="radio"  required name="txt_book_type" style="background-color:#E6F2FF;" readonly id="txt_book_type" value=""/>&nbsp;&nbsp;Reject	
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

