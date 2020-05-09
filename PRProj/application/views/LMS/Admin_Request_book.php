<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pending Request Book Table</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Pending Request Book Table
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;"> Pending Request Book Table
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
												<th>Order ID</th>
												<th>Emp Name</th>
												<th>Book Name</th>
												<td>Order Date</td>
												<td>Status</td>
											</tr>
										</thead>
									<tbody>
										<?php $admin_pending_book= $this->method_call->admin_pending_book_count($emp_code);
														if($admin_pending_book!=null){
															$sr_no=1;
														foreach ($admin_pending_book->result() as $booktot)  
														{
													?>
										<tr>
											<td> <a href="<?php echo site_url('LMS/LMS_cntr/Req_pending_book_view/'.$booktot->order_id);?>" style="color:red;" class="fa fa-eye"><?php echo $booktot->order_id; ?></a></td>
											<td><?php $emp_nm=$this->method_call->fetch_emp_nm($booktot->order_by);	print_r($emp_nm['emp_name']); ?></td>
											<td><?php $book_nm=$this->method_call->fetch_book_nm($booktot->book_id);?><?php print_r($book_nm['book_name']); ?></td>
											<td><?php echo $booktot->order_date; ?></td>
											<td><?php $status=$booktot->order_status; 
												if($status==0)
												{
													echo "Pending";
												}
											?></td>
										</tr>
										<?php } } ?>
                                    </tbody>
								</table>
							</div> 
						</div>
					</div>
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

