<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
	if (isset($this->session->userdata['logged_in'])) 
	{
		$emp_id = ($this->session->userdata['logged_in']['emp_id']);
		$emp_code = ($this->session->userdata['logged_in']['emp_code']);
		$emp_name = ($this->session->userdata['logged_in']['emp_name']);
		
		
	} 
	else 
	{
    redirect('Welcome/user_login_process', 'location');
	}
?>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>QCS No: <?php echo $qcs_id;?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
		
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">	  
         <div class="content-wrapper"  style="text-transform: uppercase;">
            <div class="container-fluid">
               <div class="card">
                  <div class="wraper" style="margin-left:5%; margin-right:5%; margin-top:2%">
                      <br>
                      <div class="title">
					 
						<center><h3><b>View QCS </b></h3></center><span style="margin-left:80%;font-family:exo;"><?php
							echo "<b>Date :- </b>" . date("d - M - Y");

						?></span><hr>
                       </div>
						
                        <div class="repport_container">
						<?php $qcs_detail= $this->method_call->qcs_detail($qcs_id);
								if($qcs_detail!=null){
									foreach ($qcs_detail->result() as $row4)  
								{  
						?>
							<div class="form_content_line"  style="font-family: exo; font-size: 14px">
							<h4 style="font-family: exo;">Basic QCS Details:-</h4>
							<hr>
							 <table style="width:100%;border:1px solid; font-size:14px;"	>
								<tr>
									<th style="text-align:center">QCS Number:- </th>
									<td> <?php echo $row4->qcs_id; ?></td>
									<th style="text-align:center">QCS Owner:-</th>
									<td><?php echo $row4->qcs_owner; ?></td>
									<th style="text-align:center">Plant:-</th>
									<td><?php echo $row4->plant_code; ?> </td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<th style="text-align:center">PR Number:-</th>
									<td><?php echo $row4->pr_id; ?>	</td>
									
									<th style="text-align:center">PR Type:-</th>
									<td><input type="hidden" value="<?php echo $row4->pr_type; ?>" readonly   name="" class="form-control"  required>
										<?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
										<?php print_r($pt_name['pt_name']); ?></td>
									<th style="text-align:center">Fund No/ION No.:-</th>
									<td><?php $ionno= $this->method_call->fetch_ion_no($row4->pr_id);?>
											<?php echo $ionno;?>
									</td>
								</tr>
							</table>
								</div><hr><?php }}?>
						<div class="form_content_line"  style="font-family: exo; font-size: 14px;margin-right:0%;margin-left:0%;">
						
						<h4 style="font-family: exo;">View QCS Item Details:-</h4><hr>
							  <table style="width:100%;border:1px solid; font-size:14px;"	>
							
							<thead>
								<tr style="width:100%;border:1px solid;">
									<th>Sr. No.</th>
									<th>Item Code</th>
									<th>HSN Code</th>
									<th>Item Descriptions</th>
									<th>Qty.</th>
									<th>UOM</th>
									<th colspan="4" > 1.Final Supplier :&nbsp;&nbsp;  <?php echo $row4-> sup1_nm; ?><center></th>
									<th colspan="4"> 2.Supplier 2  :&nbsp;&nbsp;  <?php echo $row4-> sup2_nm; ?>  <center></th>
									<th colspan="4"> 3.Supplier 3  :&nbsp; &nbsp;  <?php echo $row4-> sup3_nm; ?> <center></th>
								</tr>
								<tr style="width:100%;border:1px solid;">
									<th colspan="6" ></th>
									<th >  Quoted Rate </th>  
									<th >  Quoted Amt </th>  
									<th>  Final Rates </th>  
									<th> Final Amt	</th>  
									<th>  Quoted Rate </th>  
									<th>  Quoted Amt </th>  
									<th>  Final Rates </th>  
									<th> Final Amt	</th>  
									<th>  Quoted Rate </th>
									<th>  QUOTED Amt </th>  			
									<th>  Final Rates </th>  
									<th> Final Amt	</th> 
								</tr>  
							</thead>
							<?php
								$view_item= $this->method_call->view_qcs_items($qcs_id);
								$final_rate=0; 
								$total_final_ammount1=0;
								$total_quoted_amount2 = 0;
								$total_final_ammount2=0;
								$total_quoted_amount3 =0;
								$total_final_ammount3=0;
								if($view_item!=null){
									$sr_no=1;			  
									foreach ($view_item->result() as $rowitem)  
									{  
							?>
							<tbody>
								<tr style="border:1px solid;"> 
									<td><?php echo $sr_no; ?> </td>
									<td><?php echo $rowitem->q_item_code; ?></td> 
									<td> <?php echo $rowitem->q_hsn_code; ?></td>  				 
									<td><?php echo $rowitem->q_item_description; ?></td> 
									<td><?php echo $rowitem->q_req_quantity; ?></td>  
									<td><?php echo $rowitem->q_uom; ?></td> 
									<td><?php echo $rowitem->quot_rate1; ?></td>  
									<td><?php echo $rowitem->quoted_amt1; ?></td>  
									<td><?php echo $rowitem->final_rate1; ?> </td>  
									<td><?php echo $rowitem->final_amt1; ?> </td>  
									<td><?php echo $rowitem->quot_rate2; ?></td>  
									<td><?php echo $rowitem->quoted_amt2; ?></td>  
									<td> <?php echo $rowitem->final_rate2; ?> </td>  
									<td><?php echo $rowitem->final_amt2; ?> </td>
									
									<td><?php echo $rowitem->quot_rate3; ?></td>  
									<td><?php echo $rowitem->quoted_amt3; ?></td>  
									<td><?php echo $rowitem->final_rate3; ?> </td>  
									<td ><?php echo $rowitem->final_amt3; ?> </td>
								
								 <?php
									$quoted_ammount1=$rowitem->quoted_amt1;
									$final_rate=$final_rate+$quoted_ammount1;
									
									$final_ammount1 = $rowitem->final_amt1;
									$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
									
									$quoted_amount2 = $rowitem->quoted_amt2;
									$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
									
									$final_ammount2 = $rowitem->final_amt2;
									$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
									
									$quoted_amount3 = $rowitem->quoted_amt3;
									$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
									
									$final_ammount3 = $rowitem->final_amt3;
									$total_final_ammount3 = $total_final_ammount3+$final_ammount3;	?>
									</tr>
									 <?php  $sr_no++; }
											} ?>
								<tfoot>
									<tr style="border:1px solid;">
										<td style="text-align:center;" colspan="7"><b>Grand Total:</b></td>
										<td class="right"><B><?php echo $final_rate; ?></b></td>
										<td class="right" colspan="1"></td>
										<td class="right "><B><?php echo $total_final_ammount1; ?></b></td>
										<td class="right" colspan ="1"></td>
										<td class="right "><B><?php echo $total_quoted_amount2; ?></b></td>
										<td class="right" colspan ="1"></td>
										<td class="right "><B><?php echo $total_final_ammount2; ?></b></td>
										<td class="right" colspan ="1"></td>
										<td class="right "><B><?php echo $total_quoted_amount3; ?></b></td>
										<td class="right" colspan ="1"></td>
										<td class="right "><B><?php echo $total_final_ammount3; ?></b></td>
			
									</tr>
								</tfoot>
							</tbody>
								
						</table>
						</div>
						<div class="form_content_line"  style="font-family: exo; font-size: 14px"><hr>
						
						<h4 style="font-family: exo;"> TECHNICAL SPECIFICATION COMPARISON:-</h4><hr>
							 <table style="width:100%;border:1px solid; font-size:14px;"	>
								<tbody>
									<tr style="text-align:center;border:1px solid;"> 
									<th style="display:none" >  </td>
									<th style="text-align:center;"> Sr No </td>
									<th style="display:none" >  </td>
									<th style="display:none" >  </td>
									<th style="display:none" >  </td>
									<th style="display:none" >  </td>
									<th colspan="6" style="text-align:center;">Technical Specification</td>
									<th colspan="3" style="text-align:center;"><b> <center>Final Supplier :&nbsp;&nbsp; <?php echo $row4->sup1_nm; ?><center></b> </td>
									<th style="display:none" >  </td>
									<th style="display:none"> </td>
									<th colspan="3" style="text-align:center;"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $row4->sup2_nm; ?><center></b> </td>
									<th style="display:none" >  </td>
									<th style="display:none"> </td>
									<th colspan="3" style="text-align:center;"><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $row4->sup3_nm; ?><center></b> </td>
									<th style="display:none" >  </td>
									<th style="display:none;"> </td>
								</tr> 
								<?php
									$show_tech_spe= $this->method_call->qcs_techspec_show($qcs_id);
									if($show_tech_spe!=null){
										$sr_no=1;			  
										foreach ($show_tech_spe->result() as $rowtech)  
										{  
								?>
								<tr>
									<td style="display:none" >  </td>
									<td  style="text-align:center;"> 1 </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td colspan="6" style="text-align:center;">Technical Details</td>
									 <td colspan="3" style="text-align:center;"><?php echo $rowtech->tech_det_sup1; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3" style="text-align:center;"><?php echo $rowtech->tech_det_sup2; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3" style="text-align:center;"><?php echo $rowtech->tech_det_sup3; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
								</tr> 
								<tr>
									<td style="display:none" >  </td>
									  <td style="text-align:center;"> 2 </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									<td colspan="6" style="text-align:center;">Credibility Of The Supplier Checked													
									</td>
								 <td colspan="3"  style="text-align:center;">  
								 <?php echo $rowtech->credibility_sup1; ?> </td>
				 				 <td style="display:none" style="text-align:center;">  </td>
								<td style="display:none"> </td>
								<td colspan="3" style="text-align:center;"> <?php echo $rowtech->credibility_sup2; ?></td>
				  			 <td style="display:none" >  </td>
								<td style="display:none"> </td>
								<td colspan="3" style="text-align:center;"><?php echo $rowtech->credibility_sup3; ?></td>
				  			 <td style="display:none" >  </td>
							<td style="display:none"> </td>
							</tr>
							<tr>
							<td style="display:none" >  </td>
							  <td style="text-align:center;"> 3 </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							<td colspan="6" style="text-align:center;">Insurance & Freight</td>
							<td colspan="3"  style="text-align:center;"><?php echo $rowtech->insurance_sup1; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							 
							  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->insurance_sup2; ?></td>
				  			 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							 
							  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->insurance_sup3; ?></td>
							  <td style="display:none" >  </td>
							 <td style="display:none"> </td>
						</tr>
							<tr>
							<td style="display:none" >  </td>
						  <td style="text-align:center;"> 4 </td>
						 <td style="display:none" >  </td>
						 <td style="display:none" >  </td>
						 <td style="display:none" >  </td>
						 <td style="display:none" >  </td>
							 <td colspan="6" style="text-align:center;">Delivery Period</td>
							 <td colspan="3" style="text-align:center;" ><?php echo $rowtech->del_period_sup1; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->del_period_sup2; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->del_period_sup3; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
						</tr> 
						<tr>
							<td style="display:none" >  </td>
							  <td style="text-align:center;"> 5 </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
								 <td colspan="6" style="text-align:center;">Delivery Mode</td>
								 <td colspan="3"  style="text-align:center;"><?php echo $rowtech->del_mode_sup1; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->del_mode_sup2; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->del_mode_sup3; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								</tr> 
								<tr>
									<td style="display:none" >  </td>
									  <td style="text-align:center;"> 6 </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td colspan="6" style="text-align:center;">Inspection / Testing													</td>
									 <td colspan="3" style="text-align:center;"> <?php echo $rowtech->inspection_sup1; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									 <td colspan="3"  style="text-align:center;"></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3" style="text-align:center;"><?php echo $rowtech->inspection_sup3; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									</tr>
								<tr>
									<td style="display:none" >  </td>
									  <td style="text-align:center;"> 7 </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td colspan="6" style="text-align:center;">Payment Terms</td>
									 <td colspan="3" style="text-align:center;" ><?php echo $rowtech->pymt_terms_sup1; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->pymt_terms_sup2; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->pymt_terms_sup3; ?></td>
									 <td style="display:none" >  </td>
									 <td style="display:none"> </td>
									</tr>
									<tr>
										<td style="display:none" >  </td>
										  <td style="text-align:center;" > 8 </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td colspan="6" style="text-align:center;">Warranty</td>
										 <td colspan="3" style="text-align:center;" ><?php echo $rowtech->warranty_sup1; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
										  <td colspan="3" style="text-align:center;"><?php echo $rowtech->warranty_sup2; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
										  <td colspan="3" style="text-align:center;"><?php echo $rowtech->warranty_sup3; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
										</tr>  
										<tr>
										<td style="display:none" >  </td>
									  <td style="text-align:center;"> 9 </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td style="display:none" >  </td>
									 <td colspan="6" style="text-align:center;">Scope Of Installation </td>
									 <td colspan="3"  style="text-align:center;"><?php echo $rowtech->scope_instal_sup1; ?></td>
									<td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->scope_instal_sup2; ?></td>
										<td style="display:none" >  </td>
									 <td style="display:none"> </td>
									  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->scope_instal_sup3; ?></td>
										<td style="display:none" >  </td>
										<td style="display:none"> </td>
										</tr>
										<tr>
										 <td style="display:none" >  </td>
										  <td style="text-align:center;"> 10 </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td style="display:none" >  </td>
										 <td colspan="6" style="text-align:center;">Taxes & Duties</td>
										 <td colspan="3" style="text-align:center;" ><?php echo $rowtech->taxes_duties_sup1; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
										  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->taxes_duties_sup2; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
										  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->taxes_duties_sup3; ?></td>
										 <td style="display:none" >  </td>
										 <td style="display:none"> </td>
									</tr>
									<tr>
									<td style="display:none" >  </td>
								  <td style="text-align:center;"> 11 </td>
								 <td style="display:none" >  </td>
								 <td style="display:none" >  </td>
								 <td style="display:none" >  </td>
								 <td style="display:none" >  </td>
								 <td colspan="6" style="text-align:center;">Note</td>
								 <td colspan="3" style="text-align:center;"><?php echo $rowtech->note_sup1; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								  <td colspan="3"   style="text-align:center;"><?php echo $rowtech->note_sup2; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->note_sup3; ?></td>
								 <td style="display:none" >  </td>
								 <td style="display:none"> </td>
								</tr>
							<tr>
								<td style="display:none" >  </td>
							  <td style="text-align:center;"> 12 </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td colspan="6" style="text-align:center;">Validity Of Price/Quote </td>
							 <td colspan="3" style="text-align:center;" ><?php echo $rowtech->validity_price_sup1; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3"  style="text-align:center;"><?php echo $rowtech->validity_price_sup2; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3" style="text-align:center;" ><?php echo $rowtech->validity_price_sup3; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							</tr>
							<tr >
							<td style="display:none" >  </td>
							  <td style="text-align:center;"> 13 </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td style="display:none" >  </td>
							 <td colspan="6" style="text-align:center;">REPL Scope</td>
							 <td colspan="3"  style="text-align:center;"><?php echo $rowtech->repl_scope_sup1; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3" style="text-align:center;"><?php echo $rowtech->repl_scope_sup2; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							  <td colspan="3" style="text-align:center;"><?php echo $rowtech->repl_scope_sup3; ?></td>
							 <td style="display:none" >  </td>
							 <td style="display:none"> </td>
							</tr>
						</tbody>
						<?php }}?>
						</table>
						</div>
					 
						</div>
					</div><br><br>
				</div></div>
				
			</div>
			 
		
</body>
</html>

