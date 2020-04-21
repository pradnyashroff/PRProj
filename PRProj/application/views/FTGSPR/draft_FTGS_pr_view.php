<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Draft Interplant PR FTGS </title>
    <?php include_once 'styles.php'; ?>
	<style>
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
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View Draft Interplant PR FTGS</h1>
				<ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
					<li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
					<li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">FTGS PR</a></li>
					<li class="active" style="color:#FFFFFF;text-transform: uppercase;">View Draft Interplant PR FTGS</li>
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
					<form method="post" id="draft_ftgs_pr" name="draft_ftgs_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/draft_insert_ftgs_pr') ?>" enctype='multipart/form-data'>
					<div class="box-body">
					<input type="hidden" name="txt_emp_code" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required>
					 <input class="form-control" type="hidden" name="txtftgsId" value="<?php echo $ftgs_pr_id; ?>"/>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">1</label>
							<label class="col-sm-4 pull-left control-label">Pr No</label>
							<div class="input-group  col-sm-6">
								<input class="form-control" type="text" id="draft_pr_no" name="draft_pr_no" value="<?php echo $row->ftgs_pr_id; ?>" style="background-color:#E6F2FF" readonly required>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">2</label>
							<label class="col-sm-4 pull-left control-label">Plant</label>
							<div class="input-group  col-sm-6">
								<select class="form-control" required name="draft_plant" id="draft_plant">
									<option value="<?php echo $row->ftgs_plant_code; ?>" ><?php echo $row->ftgs_plant_code; ?></option>
									<?php
										$plant=$this->method_call->plant();
										if($plant!=null)
										{
											foreach($plant->result() as $row1)
											{?>
												<option value="<?php echo $row1->plant_code; ?>"><?php echo $row1->plant_code;  ?></option>
											<?php }
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">3</label>
							<label class="col-sm-4 pull-left control-label">Date</label>
							<div class="input-group  col-sm-6">
								<input class="form-control" type="text" id="draft_date" name="draft_date" value="<?php echo $row->ftgs_pr_date; ?>" style="background-color:#E6F2FF" readonly required>
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
											<input class="form-control" type="text" id="draft_pr_type_nm" name="draft_pr_type_nm" value="<?php echo $prtype->pt_name ?>" style="background-color:#E6F2FF" readonly required>
											<input class="form-control" type="hidden" id="draft_pr_type" name="draft_pr_type" value="<?php echo $prtype->pt_id ?>" style="background-color:#E6F2FF" readonly required>
									<?php }
									}
								?>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">5</label>
							<label class="col-sm-4 pull-left control-label">PR Owner</label>
							<div class="input-group  col-sm-6">
								<input class="form-control" type="hidden" id="draft_pr_owner_code" name="draft_pr_owner_code" value="<?php echo $emp_code ?>" style="background-color:#E6F2FF" readonly required>
								<input class="form-control" type="text" id="draft_pr_owner" name="draft_pr_owner" value="<?php echo $row->ftgs_pr_owner_name; ?>" style="background-color:#E6F2FF" readonly required>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-1 pull-left control-label">6</label>
							<label class="col-sm-4 pull-left control-label">Department</label>
							<div class="input-group  col-sm-6">
								 <input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="draft_dept_id" class="form-control"  required>
										 <?php
											$dept=$this->method_call->department($emp_dept);
										 ?>
										<input class="form-control" type="text" id="draft_department" name="draft_department" value="<?php print_r($dept['dept_name']); ?>" style="background-color:#E6F2FF" readonly required>
							</div>
						</div>
						<div class="form-group col-sm-6">
									<label class="col-sm-6 pull-left control-label">7 &nbsp;&nbsp;&nbsp;&nbsp;REQUIREMENT DETAILS:</label>
								</div>
								<div class="form-group col-sm-12">
									<table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;border-color:#3482AE;text-align: center; width:100%;">
										<thead style="text-align: center;" >
											<tr style="background-color:#3482AE;color:#FFFFFF">
												
												<th scope="col" style="text-align: center;">Sr no</th>
												<th scope="col" style="text-align: center;">ITEM CODE</th>
												<th scope="col" style="text-align: center;">ITEM DESCRIPTION</th>
												<th scope="col" style="text-align: center;">REQ QTY.</th>
												<th scope="col" style="text-align: center;">UOM.</th>
												<th scope="col" style="text-align: center;">APPROX RATE</th>
												<th scope="col" style="text-align: center;">APPROX TOTAL AMT.</th>
												<th  style="display:none;">ION NO.</th>
												<th scope="col" style="text-align: center;">EXP DELIVERY TIME</th>
												<th scope="col" style="text-align: center;">PROJ DETAILS</th>
												<th scope="col" style="text-align: center;">TECH DETAILS/ MFG NAME</th>
												<th scope="col" style="text-align: center;">Customer Code</th>
												<th scope="col" style="text-align: center;">Sales Material</th>
												<th scope="col" style="text-align: center;">Ecn/New</th>
												<th scope="col" style="text-align: center;">Ecn/New Code</th>
												<th scope="col" style="text-align: center;">Action</th>
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
											
											<td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#editdraft" onclick="edit_ftgs_items(<?php echo $itempr->ftgs_item_id; ?>)" ><?php echo $sr_no; ?></a></p></td>
											<td><?php echo $itempr	->ftgs_item_code	; ?></td> 
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
											<td><a onclick="deleteData('<?php echo $itempr->ftgs_item_id; ?>')"><span class='glyphicon glyphicon-trash' style="color:red;"></span></a></td>
											
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
									  <input class="form-control" type="hidden" name="txtTotalAmt" value=" <?php echo $final_rate; ?>"/>
									</div>
									<center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#darft_addItem" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button>
                                    </center>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">8</label>
									<label class="col-sm-5 pull-left control-label" >DELIVERY LOCATION </label>
									<div class="input-group  col-sm-6">
										<select class="form-control" required name="draft_location" id="draft_location">
										<option value="<?php echo $row->ftgs_delivary_loc; ?>" >  <?php echo $row->ftgs_delivary_loc; ?></option>
										<?php
											$plant=$this->method_call->plant();
											if($plant!=null)
											{
												foreach($plant->result() as $row1)
												{?>
													<option value="<?php echo $row1->plant_code; ?>"><?php echo $row1->plant_code;  ?></option>
													
												<?php }
											}
										?>
									</select>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">9</label>
									<label class="col-sm-5 pull-left control-label" >SUPPLIER END INSPECTION REQ? </label>
									<div class="input-group  col-sm-6">
										 <select class="form-control" name="draft_supplier" required >  
											 <option value="<?php echo $row->ftgs_inspection_req; ?>" ><?php echo $row->ftgs_inspection_req; ?></option>
											 <option value="Yes" >Yes</option>
											 <option value="No" >No</option>
										</select>          
									
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">10</label>
									<label class="col-sm-5 pull-left control-label" >CONSIDERED IN BUDGET? </label>
									<div class="input-group  col-sm-6">
										 <select class="form-control" name="draft_conside_budge" required >  
											 <option value="<?php echo $row->ftgs_budget_consider; ?>" ><?php echo $row->ftgs_budget_consider; ?></option>
											 <option value="Yes" >Yes</option>
											 <option value="No" >No</option>
										</select> 
										
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">11</label>
									<label class="col-sm-5 pull-left control-label" >FUND NO/ION NO. </label>
									<div class="input-group  col-sm-6">
										<input type="text" name="draft_ion_no"  value= "<?php echo $row->ftgs_ion_no; ?>" class="form-control"  required>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">12</label>
									<label class="col-sm-5 pull-left control-label" >CUSTOMER COST - UPFRONT (In Rs.)</label>
									<div class="input-group  col-sm-6">
										<input type="text" name="draft_cust_cost_upfront"  value="<?php echo $row->ftgs_cust_cost_upfront; ?>" class="form-control"  required>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">13</label>
									<label class="col-sm-5 pull-left control-label" >CUSTOMER COST - AMORTIZATION(In Months) </label>
									<div class="input-group  col-sm-6">
										<input type="text" name="draft_cust_cost_amort" value="<?php echo $row->ftgs_cust_cost_amortization; ?>" class="form-control"  required>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">14</label>
									<label class="col-sm-5 pull-left control-label" >OWN INVESTMENT(Recovery Period In Months) </label>
									<div class="input-group  col-sm-6">
										<input type="text" name="draft_own_inve"  value="<?php echo $row->ftgs_own_investment; ?>" class="form-control"  required>
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label class="col-sm-1 pull-left control-label">15</label>
									<label class="col-sm-5 pull-left control-label" >REASON OF PROCUREMENT </label>
									<div class="input-group  col-sm-6">
										<input type="text" name="draft_reson"  value="<?php echo $row->ftgs_procurement_res; ?>" class="form-control"  required>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-4 pull-left control-label">16 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	ATTACHMENT </label>
								</div>
								<div class="form-group col-sm-12">
									<div class="col-sm-4"><input type="file" id="btn-attach" name="upload_file[]"  class="btn" style="border-style:solid ; border-color:#3482AE;">Reference Quote</button></div>
									<div class="col-sm-4"><input type="file" id="btn-attach" name="upload_file[]" class="btn" style="border-style:solid ; border-color:#3482AE;">Drawing</button></div>
									<div class="col-sm-4"><input type="file" id="btn-attach" name="upload_file[]" class="btn" style="border-style:solid ; border-color:#3482AE;">Images</button></div>
								</div>
								<div class="form-group col-sm-12">
									<?php 
											$filefetch= $this->method_call->fetchupload($ftgs_pr_id);
											if($filefetch!=null)
											{
												foreach ($filefetch->result() as $rowattach)  
												{  
										?>
										<a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_pr/". $ftgs_pr_id ."/".$rowattach->ftgs_file_name;?>"><?php echo $rowattach->ftgs_file_name; ?></a><br><br>
										
										
											<?php } }
											?>
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
								<div class="form-group col-lg-12">
									<label class="col-lg-1 pull-left control-label">18</label>
									<label class="col-lg-4 pull-left control-label">Action</label>
									<div class="input-group  col-lg-6">
										<input type="radio" name="rdo_ftgs_status" value="0" required >&nbsp;&nbsp; Save as Draft</input>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="rdo_ftgs_status" value="1" > &nbsp;&nbsp;Submit for Approval</input>
         							</div>
								</div>
								
									<!------Mail Details Code Start From here--->
									<?php $authId= $this->method_call->fetchReportingDetails($row->ftgs_plant_code); 
										$DHCode=$authId['auth_id'];
									?>
									<?php $UserEmail=$this->method_call->fetchUserMailDetails($ftgs_pr_id);?>			<!-- UserMail  -->
									<?php $EmpDept=$this->method_call->getUserDept($emp_dept);?>						<!-- UserDepartment  -->
									<?php $DHEmail=$this->method_call->fetchDHMailDetails($DHCode);?>					<!-- Department Head Mail  -->
									
									<input class="form-control" type="hidden" name="txtEmpNameEmail" value="<?php echo $row->ftgs_pr_owner_name; ?>"/>
									<input class="form-control" type="hidden" name="txtUserAuthoEmail" value="<?php print_r($UserEmail['UserEmail']); ?>"/>
									<input class="form-control" type="hidden" name="txtEmpPlant" value="<?php echo $row->ftgs_plant_code; ?>"/>
									<input class="form-control" type="hidden" name="txtEmpDept" value="<?php print_r($EmpDept['UserDept']); ?>"/>
									<input class="form-control" type="hidden" name="txtDHAuthoEmail" value="<?php print_r($DHEmail['DHEmail']); ?>"/>
									<input type="hidden" name="authIDLevel1" value="<?php print_r($authId['auth_id']);?>" class="form-control"  required>
									 
									
									<!------Mail Details Code End --->
									<div class="form-group col-lg-12">
										<center>
											<button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button>
										</center>
									</div>
								</div>
							</div>
						</div>
					</form>
						<?php } } ?>
			</section>
		</div>
		<div class="modal fade displaycontent" id="darft_addItem">
				<div class="modal-dialog" role="document" style="width: 720px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#3482AE">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add FTGS PR ITEMS</h4>
						</div>
						<div class="modal-body">
							<section class="module pt-10" id="contact" >
								<div class="container" style="width: auto;">
									<form method="post" id="draft_add_ftgs_pr" name="draft_add_ftgs_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/draft_add_item_ftgs') ?>" enctype='multipart/form-data'>
									<div class="row">
									
										<input type="hidden" name="draft_temp_ftgs_id" placeholder="" value="<?php echo $ftgs_pr_id; ?>" readonly class="form-control"  required>
										 <div class="form-group col-md-6">
											<label >Item Code</label>
											<input class="form-control" type="draft_item_code" required name="draft_item_code" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Item Descriptions</label>
											<input class="form-control" type="draft_description" required name="draft_description" value="" />	
										 </div>
										 <div class="form-group col-md-4">
											<label >Required Quantity</label>
											<input class="form-control" type="draft_reqr_quntity" id="draft_reqr_quntity" required name="draft_reqr_quntity" value="" />	
										 </div>
										 <div class="form-group col-md-4">
											<label >UOM</label>
											
											<select name="draft_uom" class="select2 form-control" style="position: unset!important;" required>
												<option value="Each">Each</option>
													<option value="Kilogram">	Kilogram	</option>
													<option value="Dozen">	Dozen	</option>
													<option value="Meter">	Meter	</option>
													<option value="Foot">	Foot	</option>
													<option value="Liter">	Liter	</option>
													<option value="BOX">	BOX	</option>
													<option value="Bag">	Bag	</option>
													<option value="Rupees">	Rupees	</option>
													<option value="SET">	SET	</option>
													<option value="Kilometer">	Kilometer	</option>
													<option value="Gram">	Gram	</option>
													<option value="Hours">	Hours	</option>
													<option value="Days">	Days	</option>
													<option value="Months">	Months	</option>
													<option value="Minute">	Minute	</option>
													<option value="Pack">	Pack	</option>
													<option value="Pair">	Pair	</option>
													<option value="Pallet">	Pallet	</option>
													<option value="Centimeter">	Centimeter	</option>
													<option value="Inch">	Inch	</option>
													<option value="1_minute">	1_minute</option>
													<option value="1_Square Meter">	1_Square Meter	</option>
													<option value="Acre">	Acre	</option>
													<option value="Activity unit">	Activity unit	</option>
													<option value="Bottle">	Bottle	</option>
													<option value="Canister">	Canister	</option>
													<option value="Carton">	Carton	</option>
													<option value="Case">	Case	</option>
													<option value="Centiliter">	Centiliter	</option>
													<option value="Centimeter/second">	Centimeter/second	</option>
													<option value="Crate">	Crate	</option>
													<option value="Cubic centimeter">	Cubic centimeter	</option>
													<option value="Cubic centimeter/second">	Cubic centimeter/second	</option>
													<option value="Cubic decimeter">	Cubic decimeter	</option>
													<option value="Cubic foot">	Cubic foot	</option>
													<option value="Cubic inch">	Cubic inch	</option>
													<option value="Cubic meter">	Cubic meter	</option>
													<option value="Cubic meter/day">	Cubic meter/day	</option>
													<option value="Cubic meter/Hour">	Cubic meter/Hour	</option>
													<option value="Cubic meter/second">	Cubic meter/second	</option>
													<option value="Cubic millimeter">	Cubic millimeter	</option>
													<option value="Cubic yard">	Cubic yard	</option>
													<option value="Days">	Days	</option>
													<option value="Decibel (A Weighting)">	Decibel (A Weighting)	</option>
													<option value="Decibel (C Weighting)">	Decibel (C Weighting)	</option>
													<option value="Decimeter">	Decimeter	</option>
													<option value="Degree">	Degree	</option>
													<option value="Drum">	Drum	</option>
													<option value="Enzyme Units">	Enzyme Units	</option>
													<option value="Enzyme Units/Milliliter">	Enzyme Units/Milliliter	</option>
													<option value="Evaporation Rate">	Evaporation Rate	</option>
													<option value="Fluid Ounce US">	Fluid Ounce US	</option>
													<option value="Gallon">	Gallon	</option>
													<option value="Gallons per hour (US)">	Gallons per hour (US)	</option>
													<option value="Gallons per mile (US)">	Gallons per mile (US)	</option>
													<option value="Gigajoule">	Gigajoule	</option>
													<option value="Gigaohm">	Gigaohm	</option>
													<option value="Gram Active Ingredient">	Gram Active Ingredient	</option>
													<option value="Gram Active Ingredient/Liter">	Gram Active Ingredient/Liter	</option>
													<option value="Gram Gold">	Gram Gold	</option>
													<option value="Gram/Cubic Centimeter">	Gram/Cubic Centimeter	</option>
													<option value="Gram/Cubic meter">	Gram/Cubic meter	</option>
													<option value="Gram/liter">	Gram/liter	</option>
													<option value="Gram/Mole">	Gram/Mole	</option>
													<option value="Gram/square meter">	Gram/square meter	</option>
													<option value="Gross">	Gross	</option>
													<option value="Group proportion">	Group proportion	</option>
													<option value="Half Yearly">	Half Yearly	</option>
													<option value="Heat Conductivity">	Heat Conductivity	</option>
													<option value="Hectare">	Hectare	</option>
													<option value="Hectoliter">	Hectoliter	</option>
													<option value="Hour">	Hour	</option>
													<option value="Joule/Kilogram">	Joule/Kilogram	</option>
													<option value="Joule/Mole">	Joule/Mole	</option>
													<option value="Kelvin/Minute">	Kelvin/Minute	</option>
													<option value="Kelvin/Second">	Kelvin/Second	</option>
													<option value="kg / ea">	kg / ea	</option>
													<option value="kg Active Ingredient/kg">	kg Active Ingredient/kg	</option>
													<option value="Kilogram Active Ingredient">	Kilogram Active Ingredient	</option>
													<option value="Kilogram/cubic decimeter">	Kilogram/cubic decimeter	</option>
													<option value="Kilogram/cubic meter">	Kilogram/cubic meter	</option>
													<option value="Kilogram/Mole">	Kilogram/Mole	</option>
													<option value="Kilogram/second">	Kilogram/second	</option>
													<option value="Kilogram/US Barrel">	Kilogram/US Barrel	</option>
													<option value="Kilojoule/kilogram">	Kilojoule/kilogram	</option>
													<option value="Kilojoule/Mole">	Kilojoule/Mole	</option>
													<option value="Kilometer/hour">	Kilometer/hour	</option>
													<option value="Kilomol">	Kilomol	</option>
													<option value="Kilonewton">	Kilonewton	</option>
													<option value="Kilopascal">	Kilopascal	</option>
													<option value="Kiloton">	Kiloton	</option>
													<option value="Kilovoltampere">	Kilovoltampere	</option>
													<option value="Length in Metres per Unit">	Length in Metres per Unit	</option>
													<option value="Liter per 100 km">	Liter per 100 km	</option>
													<option value="Liter per hour">	Liter per hour	</option>
													<option value="Liter/Minute">	Liter/Minute	</option>
													<option value="Liter/Mole Second">	Liter/Mole Second	</option>
													<option value="Megajoule">	Megajoule	</option>
													<option value="Meganewton">	Meganewton	</option>
													<option value="Megavolt">	Megavolt	</option>
													<option value="Megavoltampere">	Megavoltampere	</option>
													<option value="Megawatt hour">	Megawatt hour	</option>
													<option value="Megohm">	Megohm	</option>
													<option value="Meter/Hour">	Meter/Hour	</option>
													<option value="Meter/Minute">	Meter/Minute	</option>
													<option value="Meter/second">	Meter/second	</option>
													<option value="Meter/Square Second">	Meter/Square Second	</option>
													<option value="Microampere">	Microampere	</option>
													<option value="Microfarad">	Microfarad	</option>
													<option value="Microgram/cubic meter">	Microgram/cubic meter	</option>
													<option value="Microgram/liter">	Microgram/liter	</option>
													<option value="Microliter">	Microliter	</option>
													<option value="Micrometer">	Micrometer	</option>
													<option value="Microsecond">	Microsecond	</option>
													<option value="Microsiemens per centimeter">	Microsiemens per centimeter	</option>
													<option value="Mile">	Mile	</option>
													<option value="Miles per gallon (US)">	Miles per gallon (US)	</option>
													<option value="Millifarad">	Millifarad	</option>
													<option value="Milligram">	Milligram	</option>
													<option value="Milligram/cubic meter">	Milligram/cubic meter	</option>
													<option value="Milligram/liter">	Milligram/liter	</option>
													<option value="Milliliter">	Milliliter	</option>
													<option value="Milliliter Active Ingredient">	Milliliter Active Ingredient	</option>
													<option value="Millimeter">	Millimeter	</option>
													<option value="Millimole per Liter">	Millimole per Liter	</option>
													<option value="Millinewton/meter">	Millinewton/meter	</option>
													<option value="Millipascal seconds">	Millipascal seconds	</option>
													<option value="Millisecond">	Millisecond	</option>
													<option value="Mole per Cubic Meter">	Mole per Cubic Meter	</option>
													<option value="Mole per Liter">	Mole per Liter	</option>
													<option value="Nanoampere">	Nanoampere	</option>
													<option value="Nanofarad">	Nanofarad	</option>
													<option value="Nanometer">	Nanometer	</option>
													<option value="Nanosecond">	Nanosecond	</option>
													<option value="Newton/meter">	Newton/meter	</option>
													<option value="Newton/Square millimeter">	Newton/Square millimeter	</option>
													<option value="Number of Persons">	Number of Persons	</option>
													<option value="Ounce">	Ounce	</option>
													<option value="Parts per billion">	Parts per billion	</option>
													<option value="Parts per million">	Parts per million	</option>
													<option value="Parts per trillion">	Parts per trillion	</option>
													<option value="Pascal second">	Pascal second	</option>
													<option value="Per mille">	Per mille	</option>
													<option value="Percentage">	Percentage	</option>
													<option value="Permeation Rate">	Permeation Rate	</option>
													<option value="Permeation Rate SI">	Permeation Rate SI	</option>
													<option value="Picosecond">	Picosecond	</option>
													<option value="Piece">	Piece	</option>
													<option value="Pikofarad">	Pikofarad	</option>
													<option value="Pint, US liquid">	Pint, US liquid	</option>
													<option value="Points">	Points	</option>
													<option value="Pound">	Pound	</option>
													<option value="Quart, US liquid">	Quart, US liquid	</option>
													<option value="Quarterly">	Quarterly	</option>
													<option value="Role">	Role	</option>
													<option value="Siemens per meter">	Siemens per meter	</option>
													<option value="Spec. Heat Capacity">	Spec. Heat Capacity	</option>
													<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
													<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
													<option value="Square centimeter">	Square centimeter	</option>
													<option value="Square foot">	Square foot	</option>
													<option value="Square inch">	Square inch	</option>
													<option value="Square kilometer">	Square kilometer	</option>
													<option value="Square meter">	Square meter	</option>
													<option value="Square meter/second">	Square meter/second	</option>
													<option value="Square mile">	Square mile	</option>
													<option value="Square millimeter">	Square millimeter	</option>
													<option value="Square Yard">	Square Yard	</option>
													<option value="Thousands">	Thousands	</option>
													<option value="Ton">	Ton	</option>
													<option value="Ton/Cubic meter">	Ton/Cubic meter	</option>
													<option value="US gallon">	US gallon	</option>
													<option value="US Ton">	US Ton	</option>
													<option value="Value-Only Material">	Value-Only Material	</option>
													<option value="Voltampere">	Voltampere	</option>
													<option value="Weeks">	Weeks	</option>
													<option value="Yards">	Yards	</option>
													<option value="Years">	Years	</option>
											</select>
										 </div>
										 <div class="form-group col-md-4">
											<label >Approx rate. <span class="fa fa-inr"></span></label>
											<input class="form-control" placeholder="0.00" type="draft_approx_rate" onkeyup="adddrft_totalamt();" id="draft_approx_rate" required name="draft_approx_rate" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Approx. Total Amount. <span class="fa fa-inr"></span></label>
											<input class="form-control" type="draft_apporox_amt" id="draft_apporox_amt" required readonly  name="draft_apporox_amt" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Expected Delivery Period.</span></label>
											<input class="form-control" type="draft_delivary_period" required name="draft_delivary_period" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Project Details</label>
											<input class="form-control" type="draft_project_details" required name="draft_project_details" value="" />	
										 </div><div class="form-group col-md-6">
											<label >Technical Details/Mfg Name</label>
											<input class="form-control" type="draft_mfg_nm" required name="draft_mfg_nm" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Customer Code</span></label>
											<input class="form-control" type="draft_cust_cost" required name="draft_cust_cost" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Saleable Material</label>
											<input class="form-control" type="draft_sales_meterial" required name="draft_sales_meterial" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >ECN/NEW</label>
											<select name="draft_ecn_ne" id="draft_ecn_new" class="select2 form-control" onchange="get_data(this.value)" style="position: unset!important; width:100%;" required>
												<option value="ECN">	ECN	</option>
												<option value="New">	New	</option>
											</select>
											
										 </div>
										 <div class="form-group col-md-6" id="ecnadd" >
											<label>ECN Code</label>
										</div>
										<div class="form-group col-md-6" id="newadd" style="display:none;">
											<label>New Code</label>
										</div>
										<div class="form-group col-md-6"><input class="form-control" type="text" required name="draft_ecn_newcode" id="draft_ecn_newcode"  value="0"  data-validation-required-message="Please enter Valid ECN/New Code."/>		 	
										</div>
										<center>
											<button type="submit"  name="save"  class="btn" style="width: 18%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Add Items</button>
										</center> 
											
									</div>
									</form>
								</div>
                            </section>
                        </div>
                     </div>
				</div>
			</div>
		<div class="modal fade displaycontent" id="editdraft">
				<div class="modal-dialog" role="document" style="width: 720px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#3482AE">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit FTGS PR ITEMS</h4>
						</div>
						<div class="modal-body">
							<section class="module pt-10" id="contact" >
								<div class="container" style="width: auto;">
									<form method="post" id="add_ftgs_pr" name="add_ftgs_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/drftupdate_item_ftgs') ?>" enctype='multipart/form-data'>
									<div class="row">
										<input type="hidden" name="temp_pr_id" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
										<input type="hidden" name="editdrft_item_id" id="editdrft_item_id" placeholder="" readonly class="form-control"  required></td>
										
										 <div class="form-group col-md-6">
											<label >Item Code</label>
											<input class="form-control" id="editdrft_item_code" type="editdrft_item_code" required name="editdrft_item_code" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Item Descriptions</label>
											<input class="form-control" type="editdrft_description" required name="editdrft_description" id="editdrft_description" value="" />	
										 </div>
										 <div class="form-group col-md-4">
											<label >Required Quantity</label>
											<input class="form-control" type="editdrft_reqri_quntity" id="editdrft_reqri_quntity" required name="editdrft_reqri_quntity" value="" />	
										 </div>
										 <div class="form-group col-md-4">
											<label >UOM</label>
											
											<select name="editdrft_uom" id= "editdrft_uom" class="select2 form-control" style="width:100%;" required ">
												<option value="Each">Each</option>
													<option value="Kilogram">	Kilogram	</option>
													<option value="Dozen">	Dozen	</option>
													<option value="Meter">	Meter	</option>
													<option value="Foot">	Foot	</option>
													<option value="Liter">	Liter	</option>
													<option value="BOX">	BOX	</option>
													<option value="Bag">	Bag	</option>
													<option value="Rupees">	Rupees	</option>
													<option value="SET">	SET	</option>
													<option value="Kilometer">	Kilometer	</option>
													<option value="Gram">	Gram	</option>
													<option value="Hours">	Hours	</option>
													<option value="Days">	Days	</option>
													<option value="Months">	Months	</option>
													<option value="Minute">	Minute	</option>
													<option value="Pack">	Pack	</option>
													<option value="Pair">	Pair	</option>
													<option value="Pallet">	Pallet	</option>
													<option value="Centimeter">	Centimeter	</option>
													<option value="Inch">	Inch	</option>
													<option value="1_minute">	1_minute</option>
													<option value="1_Square Meter">	1_Square Meter	</option>
													<option value="Acre">	Acre	</option>
													<option value="Activity unit">	Activity unit	</option>
													<option value="Bottle">	Bottle	</option>
													<option value="Canister">	Canister	</option>
													<option value="Carton">	Carton	</option>
													<option value="Case">	Case	</option>
													<option value="Centiliter">	Centiliter	</option>
													<option value="Centimeter/second">	Centimeter/second	</option>
													<option value="Crate">	Crate	</option>
													<option value="Cubic centimeter">	Cubic centimeter	</option>
													<option value="Cubic centimeter/second">	Cubic centimeter/second	</option>
													<option value="Cubic decimeter">	Cubic decimeter	</option>
													<option value="Cubic foot">	Cubic foot	</option>
													<option value="Cubic inch">	Cubic inch	</option>
													<option value="Cubic meter">	Cubic meter	</option>
													<option value="Cubic meter/day">	Cubic meter/day	</option>
													<option value="Cubic meter/Hour">	Cubic meter/Hour	</option>
													<option value="Cubic meter/second">	Cubic meter/second	</option>
													<option value="Cubic millimeter">	Cubic millimeter	</option>
													<option value="Cubic yard">	Cubic yard	</option>
													<option value="Days">	Days	</option>
													<option value="Decibel (A Weighting)">	Decibel (A Weighting)	</option>
													<option value="Decibel (C Weighting)">	Decibel (C Weighting)	</option>
													<option value="Decimeter">	Decimeter	</option>
													<option value="Degree">	Degree	</option>
													<option value="Drum">	Drum	</option>
													<option value="Enzyme Units">	Enzyme Units	</option>
													<option value="Enzyme Units/Milliliter">	Enzyme Units/Milliliter	</option>
													<option value="Evaporation Rate">	Evaporation Rate	</option>
													<option value="Fluid Ounce US">	Fluid Ounce US	</option>
													<option value="Gallon">	Gallon	</option>
													<option value="Gallons per hour (US)">	Gallons per hour (US)	</option>
													<option value="Gallons per mile (US)">	Gallons per mile (US)	</option>
													<option value="Gigajoule">	Gigajoule	</option>
													<option value="Gigaohm">	Gigaohm	</option>
													<option value="Gram Active Ingredient">	Gram Active Ingredient	</option>
													<option value="Gram Active Ingredient/Liter">	Gram Active Ingredient/Liter	</option>
													<option value="Gram Gold">	Gram Gold	</option>
													<option value="Gram/Cubic Centimeter">	Gram/Cubic Centimeter	</option>
													<option value="Gram/Cubic meter">	Gram/Cubic meter	</option>
													<option value="Gram/liter">	Gram/liter	</option>
													<option value="Gram/Mole">	Gram/Mole	</option>
													<option value="Gram/square meter">	Gram/square meter	</option>
													<option value="Gross">	Gross	</option>
													<option value="Group proportion">	Group proportion	</option>
													<option value="Half Yearly">	Half Yearly	</option>
													<option value="Heat Conductivity">	Heat Conductivity	</option>
													<option value="Hectare">	Hectare	</option>
													<option value="Hectoliter">	Hectoliter	</option>
													<option value="Hour">	Hour	</option>
													<option value="Joule/Kilogram">	Joule/Kilogram	</option>
													<option value="Joule/Mole">	Joule/Mole	</option>
													<option value="Kelvin/Minute">	Kelvin/Minute	</option>
													<option value="Kelvin/Second">	Kelvin/Second	</option>
													<option value="kg / ea">	kg / ea	</option>
													<option value="kg Active Ingredient/kg">	kg Active Ingredient/kg	</option>
													<option value="Kilogram Active Ingredient">	Kilogram Active Ingredient	</option>
													<option value="Kilogram/cubic decimeter">	Kilogram/cubic decimeter	</option>
													<option value="Kilogram/cubic meter">	Kilogram/cubic meter	</option>
													<option value="Kilogram/Mole">	Kilogram/Mole	</option>
													<option value="Kilogram/second">	Kilogram/second	</option>
													<option value="Kilogram/US Barrel">	Kilogram/US Barrel	</option>
													<option value="Kilojoule/kilogram">	Kilojoule/kilogram	</option>
													<option value="Kilojoule/Mole">	Kilojoule/Mole	</option>
													<option value="Kilometer/hour">	Kilometer/hour	</option>
													<option value="Kilomol">	Kilomol	</option>
													<option value="Kilonewton">	Kilonewton	</option>
													<option value="Kilopascal">	Kilopascal	</option>
													<option value="Kiloton">	Kiloton	</option>
													<option value="Kilovoltampere">	Kilovoltampere	</option>
													<option value="Length in Metres per Unit">	Length in Metres per Unit	</option>
													<option value="Liter per 100 km">	Liter per 100 km	</option>
													<option value="Liter per hour">	Liter per hour	</option>
													<option value="Liter/Minute">	Liter/Minute	</option>
													<option value="Liter/Mole Second">	Liter/Mole Second	</option>
													<option value="Megajoule">	Megajoule	</option>
													<option value="Meganewton">	Meganewton	</option>
													<option value="Megavolt">	Megavolt	</option>
													<option value="Megavoltampere">	Megavoltampere	</option>
													<option value="Megawatt hour">	Megawatt hour	</option>
													<option value="Megohm">	Megohm	</option>
													<option value="Meter/Hour">	Meter/Hour	</option>
													<option value="Meter/Minute">	Meter/Minute	</option>
													<option value="Meter/second">	Meter/second	</option>
													<option value="Meter/Square Second">	Meter/Square Second	</option>
													<option value="Microampere">	Microampere	</option>
													<option value="Microfarad">	Microfarad	</option>
													<option value="Microgram/cubic meter">	Microgram/cubic meter	</option>
													<option value="Microgram/liter">	Microgram/liter	</option>
													<option value="Microliter">	Microliter	</option>
													<option value="Micrometer">	Micrometer	</option>
													<option value="Microsecond">	Microsecond	</option>
													<option value="Microsiemens per centimeter">	Microsiemens per centimeter	</option>
													<option value="Mile">	Mile	</option>
													<option value="Miles per gallon (US)">	Miles per gallon (US)	</option>
													<option value="Millifarad">	Millifarad	</option>
													<option value="Milligram">	Milligram	</option>
													<option value="Milligram/cubic meter">	Milligram/cubic meter	</option>
													<option value="Milligram/liter">	Milligram/liter	</option>
													<option value="Milliliter">	Milliliter	</option>
													<option value="Milliliter Active Ingredient">	Milliliter Active Ingredient	</option>
													<option value="Millimeter">	Millimeter	</option>
													<option value="Millimole per Liter">	Millimole per Liter	</option>
													<option value="Millinewton/meter">	Millinewton/meter	</option>
													<option value="Millipascal seconds">	Millipascal seconds	</option>
													<option value="Millisecond">	Millisecond	</option>
													<option value="Mole per Cubic Meter">	Mole per Cubic Meter	</option>
													<option value="Mole per Liter">	Mole per Liter	</option>
													<option value="Nanoampere">	Nanoampere	</option>
													<option value="Nanofarad">	Nanofarad	</option>
													<option value="Nanometer">	Nanometer	</option>
													<option value="Nanosecond">	Nanosecond	</option>
													<option value="Newton/meter">	Newton/meter	</option>
													<option value="Newton/Square millimeter">	Newton/Square millimeter	</option>
													<option value="Number of Persons">	Number of Persons	</option>
													<option value="Ounce">	Ounce	</option>
													<option value="Parts per billion">	Parts per billion	</option>
													<option value="Parts per million">	Parts per million	</option>
													<option value="Parts per trillion">	Parts per trillion	</option>
													<option value="Pascal second">	Pascal second	</option>
													<option value="Per mille">	Per mille	</option>
													<option value="Percentage">	Percentage	</option>
													<option value="Permeation Rate">	Permeation Rate	</option>
													<option value="Permeation Rate SI">	Permeation Rate SI	</option>
													<option value="Picosecond">	Picosecond	</option>
													<option value="Piece">	Piece	</option>
													<option value="Pikofarad">	Pikofarad	</option>
													<option value="Pint, US liquid">	Pint, US liquid	</option>
													<option value="Points">	Points	</option>
													<option value="Pound">	Pound	</option>
													<option value="Quart, US liquid">	Quart, US liquid	</option>
													<option value="Quarterly">	Quarterly	</option>
													<option value="Role">	Role	</option>
													<option value="Siemens per meter">	Siemens per meter	</option>
													<option value="Spec. Heat Capacity">	Spec. Heat Capacity	</option>
													<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
													<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
													<option value="Square centimeter">	Square centimeter	</option>
													<option value="Square foot">	Square foot	</option>
													<option value="Square inch">	Square inch	</option>
													<option value="Square kilometer">	Square kilometer	</option>
													<option value="Square meter">	Square meter	</option>
													<option value="Square meter/second">	Square meter/second	</option>
													<option value="Square mile">	Square mile	</option>
													<option value="Square millimeter">	Square millimeter	</option>
													<option value="Square Yard">	Square Yard	</option>
													<option value="Thousands">	Thousands	</option>
													<option value="Ton">	Ton	</option>
													<option value="Ton/Cubic meter">	Ton/Cubic meter	</option>
													<option value="US gallon">	US gallon	</option>
													<option value="US Ton">	US Ton	</option>
													<option value="Value-Only Material">	Value-Only Material	</option>
													<option value="Voltampere">	Voltampere	</option>
													<option value="Weeks">	Weeks	</option>
													<option value="Yards">	Yards	</option>
													<option value="Years">	Years	</option>
											</select>
										 </div>
										 <div class="form-group col-md-4">
											<label >Approx rate. <span class="fa fa-inr"></span></label>
											<input class="form-control" placeholder="0.00" type="editdrft_approx_rate" onkeyup="editdrft_totalamt();" id="editdrft_approx_rate" required name="editdrft_approx_rate" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Approx. Total Amount. <span class="fa fa-inr"></span></label>
											<input class="form-control" type="editdrft_apporox_amt" id="editdrft_apporox_amt" required readonly  name="editdrft_apporox_amt" id="editdrft_apporox_amt" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Expected Delivery Period.</span></label>
											<input class="form-control" type="editdrft_delivary_period" required name="editdrft_delivary_period" id="editdrft_delivary_period" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Project Details</label>
											<input class="form-control" type="editdrft_project_details" required name="editdrft_project_details" id="editdrft_project_details"  value="" />	
										 </div><div class="form-group col-md-6">
											<label >Technical Details/Mfg Name</label>
											<input class="form-control" type="editdrft_mfg_nm" required name="editdrft_mfg_nm" id="editdrft_mfg_nm" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Customer Code</span></label>
											<input class="form-control" type="editdrft_cust_cost" required name="editdrft_cust_cost" id="editdrft_cust_cost" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >Saleable Material</label>
											<input class="form-control" type="edit_sales_meterial" id="editdrft_sales_meterial" required name="editdrft_sales_meterial" value="" />	
										 </div>
										 <div class="form-group col-md-6">
											<label >ECN/NEW</label><div><br></div>
											<select name="editdrft_ecn_new" id="editdrft_ecn_new" class="select2 form-control"  style="position: unset!important; width:100%;" required>
											
												<option value="ECN">	ECN	</option>
												<option value="New">	New	</option>
											</select>
											
										 </div>
										
										<div class="form-group col-md-6" id="ecnadd" >
											<?php $ecnew=$itempr->ftgs_ecn_new; ?>
											<label><?php echo $ecnew. "Code";?></label>
										</div>
										<div class="form-group col-md-6">
											<input class="form-control" type="text" required name="editdrft_ecn_newcode" id="editdrft_ecn_newcode"/>	 	
										</div>
										 <!--<div class="form-group col-md-6" id="ecnadd" >
											<?php $ecnew=$itempr->ftgs_ecn_new; ?>
											<div id="ecn1"><label style="color:#3482AE"><?php echo $ecnew. "Code";?></label></div>
											<div id="newc" style="display:none;"><label style="color:#3482AE" id="newc" for="foo" style="display:none;"><?php echo $ecnew. "Code";?></label></div>
												<div class="form-group col-md-6">
													<input class="form-control" type="text" required name="editdrft_ecn_newcode" id="editdrft_ecn_newcode"/>		 	
												</div>
												</div>-->
												
										<center>
											<button type="submit"  name="save"  class="btn" style="width: 18%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Update Items</button>
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
    $('#frm-example').on('submit', function(e){
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
	function edit_ftgs_items(id)
			{
			$.ajax({
				url : "<?php echo site_url('FTGS_PR/Ftgs_pr/ftgs_edit')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{  
					$('[name="editdrft_item_id"]').val(data.ftgs_item_id);
					$('[name="editdrft_item_code"]').val(data.ftgs_item_code);
					$('[name="editdrft_description"]').val(data.ftgs_item_description);
					$('[name="editdrft_reqri_quntity"]').val(data.ftgs_req_qty);
					$('[name="editdrft_uom"]').val(data.ftgs_uom);
					$('[name="editdrft_approx_rate"]').val(data.ftgs_approx_rate);
					$('[name="editdrft_apporox_amt"]').val(data.ftgs_approx_total_amt);
					$('[name="editdrft_delivary_period"]').val(data.ftgs_expected_delivery);
					$('[name="editdrft_project_details"]').val(data.ftgs_project_detail);
					$('[name="editdrft_mfg_nm"]').val(data.ftgs_technical_detail);
					$('[name="editdrft_cust_cost"]').val(data.ftgs_cust_code);
					$('[name="editdrft_sales_meterial"]').val(data.ftgs_sales_material);
					$('[name="editdrftecn_new"]').val(data.ftgs_ecn_new);
					$('[name="editdrft_ecn_newcode"]').val(data.ftgs_ecn_newcode);
					
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		}
		function editdrft_totalamt() {
			  var editdrft_reqri_quntity = document.getElementById('editdrft_reqri_quntity').value;
			  var editdrft_approx_rate = document.getElementById('editdrft_approx_rate').value;
			  var result = parseFloat(editdrft_reqri_quntity) * parseFloat(editdrft_approx_rate);
			  if (!isNaN(result)) {
					document.getElementById('editdrft_apporox_amt').value = result;
				}
			}
		function adddrft_totalamt() {
			 var draft_reqr_quntity = document.getElementById('draft_reqr_quntity').value;
			 var draft_approx_rate = document.getElementById('draft_approx_rate').value;
			 var result = parseFloat(draft_reqr_quntity) * parseFloat(draft_approx_rate);
			 if (!isNaN(result)) {
				document.getElementById('draft_apporox_amt').value = result;
			}
		}
		function deleteData(delete_id){
			$.ajax({
			url : "<?php echo site_url('FTGS_PR/Ftgs_pr/deleteftgsData')?>/" + delete_id,
			type: "GET",
			dataType: "JSON",
			success: function()
			{
				
			}
			
            });
			alert("success");
			location.reload();
           }
		   function get_data(id)
			{
				if(id=="ECN"){
					document.getElementById('ecnadd').style.display = 'block';
					document.getElementById('newadd').style.display = 'none';
				}
				else 
				{
					document.getElementById('newadd').style.display = 'block';
					document.getElementById('ecnadd').style.display = 'none';
				}
			}
	</script>
  </body>
</html>