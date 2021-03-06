<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Pendding Interplant PR FTGS </title>
    <?php include_once 'styles.php'; ?>
	<style>
			@media print {
			  #printPageButton {
				display: none;
			  }
			}
		   @media (min-width: 992px) {

		   .row-fluid {
			overflow-x: scroll;
			white-space: nowrap;
			max-height:500px;
		  }
		  .col-md-3 {
			display: inline-block;
			vertical-align: top;
			float: none;
		  }
		}

		label,.col-sm-1,.box-title
		{
			color:#3482AE;
			text-transform: uppercase;
			font-family:'exo';
		}

		table{
			font-size:12px!important;
			border:1px solid black;
			border-color:#3482AE;
			text-align: center;
			width:100%;
			box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);
		}
		th {
			font-family:'exo';
			text-transform: uppercase;
		}
		thead,th,td
		{
			font-family:'exo';
			text-align: center;
		}
		body{
			font-family:'exo';
		}
		</style>
	</head>
	<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
		<?php include_once 'headsidelistFTGS.php'; ?>			
		<div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
			<section class="content-header">
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View Pendding Interplant PR FTGS</h1>
				<ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
					<li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
					<li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">FTGS PR</a></li>
					<li class="active" style="color:#FFFFFF;text-transform: uppercase;">View Pendding Interplant PR FTGS</li>
				</ol>
			</section>
			<section class="content">
				<div class="wrapper">
						
					<?php 
						
						$ftgsprdetails= $this->method_call->ftgsprDetails($ftgs_pr_id);
						if($ftgsprdetails!=null)
						{
							foreach ($ftgsprdetails->result() as $row)  
							{   
							?>
						
					
					<div class="box-body">
					
								 
					
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">1</label>
							<label class="col-sm-4 pull-left control-label">Pr No</label>
							<div class="input-group  col-sm-6">
								<?php echo $row->ftgs_pr_id; ?>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">2</label>
							<label class="col-sm-4 pull-left control-label">Plant</label>
							<div class="input-group  col-sm-6">
								<?php echo $row->ftgs_plant_code; ?>
							</div>
							

						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">3</label>
							<label class="col-sm-4 pull-left control-label">Date</label>
							<div class="input-group  col-sm-6">
								<?php echo $row->ftgs_pr_date; ?>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">4</label>
							<label class="col-sm-4 pull-left control-label">PR Type</label>
							<div class="input-group  col-sm-6">
								<?php
									$pr_type=$this->method_call->pr_type();
									if($pr_type!=null)
									{
										foreach($pr_type->result() as $prtype)
										{?>
											<?php echo $prtype->pt_name ?> 
										<?php }
									}
								?>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">5</label>
							<label class="col-sm-4 pull-left control-label">PR Owner</label>
							<div class="input-group  col-sm-6">
								<?php echo $row->ftgs_pr_owner_name; ?>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">6</label>
							<label class="col-sm-4 pull-left control-label">Department</label>
							<div class="input-group  col-sm-6">
								<?php
											$emp_dept=$row->ftgs_dept_id;
											$dept=$this->method_call->department($emp_dept);
										 ?>
										<?php print_r($dept['dept_name']); ?>
							</div>
						</div>
						<div class="form-group col-sm-6">
									<label class="col-sm-6 pull-left control-label">7 &nbsp;&nbsp;&nbsp;&nbsp;ItemCode Updation:</label>
								</div>
								<div class="form-group col-sm-12">
									<table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;border-color:#3482AE;text-align: center; width:100%;">
										<thead style="text-align: center;" >
											<tr style="background-color:#3482AE;color:#FFFFFF">
												
												<th>ITEM CODE</th>
												<th>ITEM DESCRIPTION</th>
												<th>REQ QTY.</th>
												<th>UOM.</th>
												<th>APPROX RATE</th>
												<th>APPROX TOTAL AMT.</th>
												<th  style="display:none;">ION NO.</th>
												<th>EXP DELIVERY TIME</th>
												<th>PROJ DETAILS</th>
												<th>TECH DETAILS/ MFG NAME</th>
												<th>Customer Code</th>
												<th>Sales Material</th>
												<th>Ecn/New</th>
												<th>Ecn/New Code</th>
												
											</tr>
										</thead>
									
									<tbody>
										<?php $item= $this->method_call->ftgs_item($ftgs_pr_id);
											$final_rate=0; 	   
											if($item!=null){
												$sr_no=1;			  
												foreach ($item->result() as $itempr)  
													{  
										?>
										
										<tr>
											<td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#edititemcode" onclick="edit_itemcode(<?php echo $itempr->ftgs_item_id; ?>)" ><?php echo $itempr->ftgs_item_code; ?></a></p></td>
											
											<td><?php echo $itempr	->ftgs_item_description	; ?></td>  
											<td><?php echo $itempr	->ftgs_req_qty	; ?></td>  
											<td><?php echo $itempr	->ftgs_uom	; ?></td> 
											<td><?php echo $itempr	->ftgs_approx_rate	; ?></td>  
											<td><?php echo $itempr	->ftgs_approx_total_amt	; ?></td>  
											<td><?php echo $itempr	->ftgs_expected_delivery	; ?></td> 
											<td><?php echo $itempr	->ftgs_project_detail	; ?></td>  
											<td><?php echo $itempr	->ftgs_technical_detail	; ?></td>
											<td><?php echo $itempr	->ftgs_cust_code	; ?></td> 
											<td><?php echo $itempr	->ftgs_sales_material	; ?></td>  
											<td><?php echo $itempr	->ftgs_ecn_new	; ?></td>  
											<td><?php echo $itempr	->ftgs_ecn_newcode	; ?></td> 
											<!--<td><?php echo $itempr	->ftgs_item_status	; ?></td> -->
										</tr>
										<?php
											$approx_rate=$itempr->ftgs_approx_total_amt;
											$final_rate=$final_rate+$approx_rate;
										?>
										<?php  $sr_no++; }
										} ?>
									</tbody>
									
									 </table>
									 
									 <div class="form-group col-sm-12"><br>
									<label class="col-sm-3.5 pull-right  control-label" style="font-size:14px;color:#3482AE">Total Cumulative PR Amount: <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">8</label>
									<label class="col-sm-5 pull-left control-label" >DELIVERY LOCATION </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_delivary_loc; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">9</label>
									<label class="col-sm-5 pull-left control-label" >SUPPLIER END INSPECTION REQ? </label>
									<div class="input-group  col-sm-6">
										 <?php echo $row->ftgs_inspection_req; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">10</label>
									<label class="col-sm-5 pull-left control-label" >CONSIDERED IN BUDGET? </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_budget_consider; ?></div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">11</label>
									<label class="col-sm-5 pull-left control-label" >FUND NO/ION NO. </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_ion_no; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">12</label>
									<label class="col-sm-5 pull-left control-label" >CUSTOMER COST - UPFRONT (In Rs.)</label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_cust_cost_upfront; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">13</label>
									<label class="col-sm-5 pull-left control-label" >CUSTOMER COST - AMORTIZATION(In Months) </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_cust_cost_amortization; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">14</label>
									<label class="col-sm-5 pull-left control-label" >OWN INVESTMENT(Recovery Period In Months) </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_own_investment; ?>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">15</label>
									<label class="col-sm-5 pull-left control-label" >REASON OF PROCUREMENT </label>
									<div class="input-group  col-sm-6">
										<?php echo $row->ftgs_procurement_res; ?>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-2 pull-left control-label" style="color:#3482AE">16 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attachment</label>
								
								<div class="input-group  col-sm-6">
									<?php 
											$filefetch= $this->method_call->fetchupload($ftgs_pr_id);
											if($filefetch!=null)
											{
												foreach ($filefetch->result() as $rowattach)  
												{  
										?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_pr/". $ftgs_pr_id ."/".$rowattach->ftgs_file_name;?>"><?php echo $rowattach->ftgs_file_name; ?></a><br><br>
										
										
											<?php } }
											?>
								</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-3 pull-left control-label" style="color:#3482AE">17 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APPROVER STATUS</label>
									
								</div>
								<div class="form-group col-sm-12">
								 <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
										<tbody>
											<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
												<th colspan="3" >  APPROVER NAME</th>
												<th colspan="3" >APPROVER DATE/TIME</th>
												<th colspan="3" >APPROVER COMMENT</th>
												<th colspan="3" >ACTION</th>
											</tr>
													
											<tr>
											<?php $approval= $this->method_call->approval_status($ftgs_pr_id);
										 
											if($approval!=null){
														  
												foreach ($approval->result() as $row1)  
													{  
										?>								
												
												<td colspan="3" ><?php echo $row1->emp_name; ?></td>
												<td colspan="3" > <?php echo $row1->action_date ." ".$row1->action_time; ?></td> 
												<td colspan="3" >
												<?php $comment=$row1->comment; 
														if($comment=="")
														
															echo "Pending";
													
														else
													
															echo $comment;
													
														?></td>
												<td><?php if($row1->action=="1")
															{
																echo 'Accepted';
															}
														elseif ($row1->action=="2") {
															echo 'Rejected';
															}
														else
															{
															echo 'Pending';
															}
													?>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
									</table>
									
									</div>
									 <form method="post" id="pend_pr" name="pend_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/ItemCodeAuth_insert') ?>" >
									<div class="form-group col-lg-12">
										<label class="col-lg-4 pull-left control-label">17. &nbsp;&nbsp;&nbsp;Action</label>
										<div class="input-group  col-lg-6">
											<input type="radio" name="ftgs_status" value="1" required > &nbsp;&nbsp;APPROVE</input>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" name="ftgs_status" value="2" >&nbsp;&nbsp; REJECT</input>
										</div>
									</div>
									<div class="form-group col-lg-12">
										<label class="col-lg-4 pull-left control-label">18. &nbsp;&nbsp;&nbsp;Approver Comment</label>
										<div class="input-group  col-lg-6">
											<textarea class="form-control" name="txt_comment" required> </textarea>
										</div>
									</div>
									<div class="box-footer">
										<div class="form-group col-sm-12">
											<center>
											<button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button>
											</center>
										</div>			
									</div>
									
									<!------Mail Details Code Start From here--->
									
										
									<?php $plant = $row->ftgs_plant_code;
										$autho_code=$this->method_call->getItemCodeAuthoDetails();
										$ICCode=$autho_code['autho_code'];
									?>
									<input type="hidden" value="<?php print_r($autho_code['autho_code']); ?>" name="txt_ItemCode_Autho" class="form-control"  required>
									<?php $UserEmail=$this->method_call->fetchUserMailDetails($ftgs_pr_id);?>			<!-- UserMail  -->
									<?php $EmpDept=$this->method_call->getUserDept($emp_dept);?>						<!-- UserDepartment  -->
									<?php $ItemCodeAuthoEmail=$this->method_call->fetchItemCodeMailDetails($ICCode);?>					<!-- Department Head Mail  -->
									
									<input class="form-control" type="hidden" name="txtEmpNameEmail" value="<?php echo $row->ftgs_pr_owner_name; ?>"/>
									<input class="form-control" type="hidden" name="txtUserAuthoEmail" value="<?php print_r($UserEmail['UserEmail']); ?>"/>
									<input class="form-control" type="hidden" name="txtEmpPlant" value="<?php echo $row->ftgs_plant_code; ?>"/>
									<input class="form-control" type="hidden" name="txtEmpDept" value="<?php print_r($EmpDept['UserDept']); ?>"/>
									<input class="form-control" type="hidden" name="txtItemCodeAuthoEmail" value="<?php print_r($ItemCodeAuthoEmail['itemCodeEmail']); ?>"/>
									<input class="form-control" type="hidden" name="txtPRDate" value=" <?php echo $row->ftgs_pr_date; ?>"/>
								    <input class="form-control" type="hidden" name="txtTotalAmt" value=" <?php echo $final_rate; ?>"/>
									 <input class="form-control" type="hidden" name="txtPHName" value="<?php echo $emp_name; ?>"/>
									<!------Mail Details Code Start From here--->
								
										
										
								<input type="hidden" name="txt_emp_code" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required>
								<input class="form-control" type="hidden" name="txtftgsId" value="<?php echo $ftgs_pr_id; ?>"/>
								<?php $ftgsuserid=$this->method_call->getUserDetails($ftgs_pr_id);?>
								<input type="hidden" name="user_id" class="form-control" value="<?php print_r($ftgsuserid['user']); ?>">
								<?php $plant = $row->ftgs_plant_code;
									$autho_code=$this->method_call->getSanctionAuthoDetails($plant);?>
									<input type="hidden" value="<?php print_r($autho_code['autho_code']); ?>" name="txt_plant_Autho" class="form-control"  required>
								
								<?php $ftgsActionData = $this->method_call->ftgsItemCodeActionData($emp_code,$ftgs_pr_id);
									if ($ftgsActionData != null) {
										foreach ($ftgsActionData->result() as $row1) {
								?>
								<input type="hidden" name="Ftgs_action_id" class="form-control" value="<?php echo $row1->action_grid_id;?>">
                               <?php }
								}
								?></form>
								
								 	<?php } } ?>
									
							 </div>
					</div>
								
				</div>
				
					
			</section>
			
	</div>
	<div class="modal fade displaycontent" id="edititemcode">
				<div class="modal-dialog" role="document" style="width: 530px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#3482AE">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Item Code</h4>
						</div>
						<div class="modal-body">
							<section class="module pt-10" id="contact" >
								<div class="container" style="width: auto;">
									<form method="post" id="add_ftgs_pr" name="add_ftgs_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/update_itemCode') ?>" enctype='multipart/form-data'>
									<div class="row">
										<input type="hidden" name="temp_pr_id" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
										<input type="hidden" name="edit_item_id" id="edit_item_id" placeholder="" readonly class="form-control"  required></td>
										 <div class="form-group col-md-12">
											<label >Item Code</label>
											<input class="form-control" id="edit_item_code" type="edit_item_code" required name="edit_item_code" value="" />	
										 </div>
										 <div class="form-group col-md-12">
											<label >Item Descriptions</label>
											<textarea readonly required name="edit_description" id="edit_description" style="width:100%; background-color:#E6F2FF;"></textarea>
											
										 </div>
										 
										 
										 <div class="form-group col-md-12">
											<label >Item Status</label>
									<select class="form-control" required name="edit_item_status" id="edit_item_status">
										<option value="InHouse">InHouse(REPL-4)</option>
										<option value="OutSource">OutSource</option>
										
										
									</select>
									
								</div>
								
										 <center>
											<button type="submit"  name="save"  class="btn" style="width: 18%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Update</button>
										</center> 
									</div>
								</form>
								</div>
                            </section>
                        </div>
                     </div>
				</div>
			</div>
	<?php include_once 'scripts.php'; ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	<script>
		$(document).ready(function(){ 
			var doc = new jsPDF();
			var specialElementHandlers = {
				'#editor': function(element, renderer){
					return true;
				}
			};
			$('#cmd').click(function () {
				doc.fromHTML($('#example').get(0), 15, 15, {
					'width': 170, 
					'elementHandlers': specialElementHandlers
				});
				doc.save('sample-file.pdf');
			});
		});
    $(function () {
		$('#example').excelTableFilter();
	});
	$(document).ready(function (){
		var table = $('#example').DataTable({
			'columnDefs': [
				{
					'targets': 0,
					'checkboxes': {
					'selectRow': true
				}
			}
		],
		'select': {
        'style': 'multi'
      },
	  "bStateSave": true,
	  "ordering": false,
      'order': [[1, 'desc']]
   });
	$("#status_filter").change(function () {
		var num=$(this).val();
		$('input[type=search].form-control').val(num);
	    $('input[type=search].form-control').keyup();
	});
    $('#frm-example1').on('submit', function(e){
		var form = this;
		var rows_selected = table.column(0).checkboxes.selected();
		$.each(rows_selected, function(index, rowId){
        $(form).append(
            $('<input>')
            .attr('type', 'text')
            .attr('name', 'id[]')
            .val(rowId)
         );
     });
	$('#example-console-rows').text(rows_selected.join(","));
		$('#can_id').val(rows_selected.join(","));
        $('#example-console-form').text($(form).serialize());
        $('input[name="id\[\]"]', form).remove();
     });   
	});
	
	function edit_itemcode(id)
			{
				
			$.ajax({
				url : "<?php echo site_url('FTGS_PR/Ftgs_pr/ftgs_edit')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{  
					$('[name="edit_item_id"]').val(data.ftgs_item_id);
					$('[name="edit_item_code"]').val(data.ftgs_item_code);
					$('[name="edit_description"]').val(data.ftgs_item_description);//ftgs_item_status
					$('[name="edit_item_status"]').val(data.ftgs_item_status);
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