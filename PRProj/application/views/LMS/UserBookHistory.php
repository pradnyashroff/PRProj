<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Book History</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >      	  
        <?php include_once 'headsidelist.php'; ?> 
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;"> Book History
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;"> Book History
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
												<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
													<th>Order ID</th>
													<th>Book Name</th>
													<th>order Date</th>
													<th>Status</th>
												</tr>
											</tr>
										</thead>
									<tbody>
												<?php $bookPendingCount= $this->method_call->BookHistoryDetails($emp_code);
														if($bookPendingCount!=null){
															$sr_no=1;
														foreach ($bookPendingCount->result() as $row)  
														{
													?>
												
												<tr>
													 <td> <a href="<?php echo site_url('LMS/LMS_cntr/BookHistoryView/'.$row->order_id);?>"style="color:red;" class="fa fa-eye"><?php echo $row->order_id; ?></a></td>
													<td><?php $book_nm=$this->method_call->fetch_book_nm($row->book_id);?>
														<?php print_r($book_nm['book_name']); ?></td>
													<td><?php echo $row->order_date; ?></td>
													<td><?php $status=$row->order_status; 
																if($status==0)
																{
																	echo "Pending";
																}
																elseif($status==1)
																{
																	echo "Issued";
																}
																elseif($status==2)
																{
																	echo "Returned";
																}
													?></td>
												</tr>
												<?php
											}
										}
										?>
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

