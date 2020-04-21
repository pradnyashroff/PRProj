<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    </head>
      <style>
           
            input[type="checkbox"]{
                width: 20px; /*Desired width*/
                height: 20px; /*Desired height*/
            }
        </style>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">	  
        <?php include_once 'reportHeadList.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper"  style="text-transform: uppercase;">
            <div class="container-fluid">
                <!-- Breadcrumbs--><div class="card">
                    <div class="wraper" style="margin-left:5%; margin-right:5%; margin-top:2%">
                      
                                <br><br>
                                <div class="title">
                                    <center><h5><b style="color:#FF0000">TRAVEL REIMBURSEMENT CLAIM</b></h5></center>
                                </div>
                                
                                <br>
                                <div class="repport_container">
                                 
                                    
                                    <br>

                              

                               <div class="form_content_line"  style="font-family: Square721 BT; font-size: 14px">
                              
                                   
                                   
                                   
                                   
                                   <table style="width:100%">
                                              <?php
                            $LocalClaimDetail = $this->method_call->travelClaimDetailsApproval($trv_mst_id);
                            if ($LocalClaimDetail != null) {
                                foreach ($LocalClaimDetail->result() as $row) {
                                    ?>
  <tr>
    <th>Plant Code: </th>
    <td><?php echo $row->plant_code; ?> -(<?php echo $row->plant_name; ?>)</td>
    <th>Claim Number:</th>
    <td><?php echo $row->trv_mst_id; ?></td>
    <th>Claim Date:</th>
    <td><?php echo $row->reg_date; ?></td>
  </tr>
  <tr>
    <th>Claimer Name: </th>
    <td><?php echo $row->emp_name; ?>-(<?php echo $row->emp_code; ?>)</td>
    <th>Department:</th>
    <td><?php echo $row->dept_name; ?></td>
    <th>Grade:</th>
    <td><?php echo $row->grade; ?></td>
  </tr>
  
                                      <?php
                                }
                            }
                            ?>
       <?php $conveyanceList= $this->method_call->fetchTrvlDetailForDraft($trv_mst_id);
                  
                    if($conveyanceList!=null){			  
foreach ($conveyanceList->result() as $row)  
         {  ?>          
  <tr>
    <th>Jour. Date From: </th>
    <td><?php echo $row->from_date; ?></td>
    <th>Jour. Date To:</th>
    <td><?php echo $row->to_date; ?></td>
    <th>Total Days:</th>
    <td><?php echo $row->days; ?> Days</td>
  </tr>
  <tr>
    <th>Purpose of the tour: </th>
    <td><?php echo $row->justification; ?></td>
  </tr>
  <tr>
    <th>Total Claim Amount: </th>
    <td>&#8377;- <label  id="lblTotalValue"></label>/-</td>
  </tr>
</table>
    <?php  }
  } ?>        </div>






        <hr>
                                    
                            <h5>Traveling Details - Total Amount: &#8377;<label id="lblTrvlTotalAmt"></label>/-  </h5>
                            <div class="form-group col-sm-12">

                                <table style="font-family: Square721 BT; font-size: 12px" id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>From Station</th>
                                            <th>Dep.Time</th>
                                            <th>To Station</th>
                                            <th>ARV Time</th>
                                            <th>Travel Mode</th>
                                            <th>Class</th>
                                            <th>Amt Per</th>
                                            <th>Total Amt</th>
                                            <th>Persons</th>
                                            <th>Team Members</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conveyanceList = $this->method_call->fetchTrvlReimDetailsByClaimId($trv_mst_id);
                                        $final_rate1 = 0;
                                        if ($conveyanceList != null) {
                                            $sr_no = 1;
                                            foreach ($conveyanceList->result() as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->trv_date; ?></td>
                                                    <td><?php echo $row->from_station; ?></td>
                                                    <td><?php echo $row->depr_time; ?></td>
                                                    <td><?php echo $row->to_station; ?></td>
                                                    <td><?php echo $row->arv_time; ?></td>
                                                    <td><?php echo $row->trv_mode; ?></td>
                                                    <td><?php echo $row->class; ?></td>
                                                    <td><?php echo $row->amount; ?></td>
                                                    <td><?php echo $row->total_amount; ?></td>
                                                    <td><?php echo $row->persons; ?></td>
                                                    <td>
                                                        <?php
                                                        $teamList = $this->method_call->fetchTrvlReimDetailsByClaimIdTeamMemeber($row->trvd_id);

                                                        if ($teamList != null) {

                                                            foreach ($teamList->result() as $rowTemMem) {
                                                                ?>
                                                                <?php echo $rowTemMem->emp_code; ?> - &nbsp;&nbsp <?php echo $rowTemMem->emp_name; ?>  
                                                                <hr>     
                                                        <?php }
                                                    }
                                                    ?>
                                                    </td>
                                                    <?php
                                                    $approx_rate = $row->total_amount;
                                                    $final_rate1 = $final_rate1 + $approx_rate;
                                                    ?>
                                                </tr>

        <?php $sr_no++;
    }
}
?>
                                        </tfoot>
                                </table>

                                <div class="form-group col-sm-12">


                                    <div class="form-group col-sm-4">
                                       
                                        <input type="hidden" id="txtTrvlTotalAmt" value="<?php echo $final_rate1; ?>">
                                    </div>
                                    <div class="form-group col-sm-1">
                                    </div>

                                </div>
                            </div>
                            <hr>
                          
                                				<!-- ItemCode detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h5 class="box-title"> Hotels Details - Total Amount: &#8377;<label id="lblHotelTotalAmt"></label>/-  </h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              
              
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
	 		 <div class="form-group col-sm-12">
                         
        <table id="hotels" style="font-family: Square721 BT; font-size: 12px" class="table table-bordered">
                <thead>
                <tr>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Bill No</th>
                  <th>Expenses</th>
                  <th>Total Amount</th>
                 </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchHotelReimDetailsByClaimId($trv_mst_id);
                 $final_rate2=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                   <td><?php echo $row->from_date; ?></td>
                  <td><?php echo $row->to_date; ?></td>
                  <td><?php echo $row->bill_no; ?></td>
                  <td><?php echo $row->expenses; ?></td>
                  <td><?php echo $row->total_amount; ?></td>
                
                  <?php
                  
                                        $approx_rate=$row->total_amount;
					$final_rate2=$final_rate2+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                       
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                             <input type="hidden" id="txtHotelTotalAmt" value="<?php echo $final_rate2; ?>">
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			  </div>
              
			</div>
			</div>
            </div>
		<!--End Box-->

                <hr>
                                		<!-- ItemCode detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h5 class="box-title"> Intra City Travel Details - Total Amount: &#8377;<label id="lblIntraTotalAmt"></label>/-</h5>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              
              
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
	 		 <div class="form-group col-sm-12">
                         
        <table style="font-family: Square721 BT; font-size: 12px" id="travelIntraCity" class="table table-bordered">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Place From</th>
                  <th>Place To</th>
                  <th>Travel Mode</th>
                  <th>Travel Amount</th>
                  <th>Reason</th>
                 </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLocalTrvlReimDetailsByClaimId($trv_mst_id);
                 $final_rate3=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $row->trvl_date; ?></td>
                  <td><?php echo $row->place_from; ?></td>
                  <td><?php echo $row->place_to; ?></td>
                  <td><?php echo $row->trvl_mode; ?></td>
                  <td><?php echo $row->trvl_amt; ?></td>
                  <td><?php echo $row->trvl_reason; ?></td>
                  
                     
                  <?php
                  
                                        $approx_rate=$row->trvl_amt;
					$final_rate3=$final_rate3+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                       
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                                  <input type="hidden" id="txtIntraTotalAmt" value="<?php echo $final_rate3; ?>">
                           
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			  </div>
              
            
			</div>
			</div>
            </div>
                                                
                                                
                                                                                                
                                                <hr>                                    
                                                
                                                                                		<!-- ItemCode detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
   
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              
              
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
              	           <h5>About Daily Conveyances Details - Total Amount: &#8377;<label id="lblMealTotalAmt"></label>/-</h5>
                        <table style="font-family: Square721 BT; font-size: 12px" id="MealDetails" class="table table-bordered">
                <thead>
                <tr>
                  <th>Emp Code</th>
                  <th>Emp Name</th>
                  <th>Grade</th>
                  <th>Days</th>
                  <th>Applicable Rates</th>
                  <th>Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchMealTrvlDetailsByClaimId($trv_mst_id);
                 $final_rate4=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $row->emp_code; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td><?php echo $row->grade; ?></td>
                  <td><?php echo $row->days; ?></td>
                  <td><?php echo $row->applicable_rate; ?></td>
                  <td><?php echo $row->total_amt; ?></td>
                   
                     
                  <?php
                  
                                        $approx_rate=$row->total_amt;
					$final_rate4=$final_rate4+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                       
                       
                      
                       
                       
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                               <input type="hidden" id="txtMealTotalAmt" value="<?php echo $final_rate4; ?>">
                             
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			  </div>
              
              <hr>    
                       
                       
                       
                       
                 <?php 
                  $totalAmtclaim = $final_rate1 + $final_rate2 + $final_rate3 + $final_rate4;
                ?>
                      
                       <br><br><br>
                  <div class="form-group col-sm-12">
                      <center>
                              <h2>
                                  <input type="hidden" id="txtTotAmtRep" value="<?php echo $totalAmtclaim; ?>">
                              </h2>
                          </center>
                      
                      
                      
                      <div class="box-body">
              	           <h5>Link IOU With Travel Claim :</h5>
                        <table style="font-family: Square721 BT; font-size: 12px" id="iouLinkWithTrvel" class="table table-bordered">
                <thead>
                <tr>
                  <th>IOU Claim No</th>
                  <th>IOU Amount</th>
                  <th>IOU Claim Date</th>
                   <th>IOU Justification</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLinkedIouWithTravelAfterApproved($trv_mst_id);
                 $final_rate5=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $row->lou_clm_id; ?></td>
                  <td><?php echo $row->iou_amt; ?></td>
                  <td><?php echo $row->iou_date; ?></td>
                  <td><?php echo $row->iou_justfic; ?></td>
                     
                  <?php
                  
                                        $approx_rate=$row->iou_amt;
					$final_rate5=$final_rate5+$approx_rate;
                                       
                  ?>
                
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                 	  </div>
                          </div>     
              
               
                                   
                                          
                </div>
                                   
                               
			</div>
                                                                                        
                        </div>

                                <br><br><hr>
                          <h5>Approval Status :</h5>
                                      <div class="form-group col-sm-12">
			 <table id="example" style="font-family: Square721 BT; font-size: 12px" class="table table-bordered" >
          		
                <tbody>
				
				  <tr>
	  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				
                                   <td style="display:none"> </td>
				 <td colspan="3" > <center><b> Action By</b>   <center> </td>
				<td colspan="3" ><center><b> Action</b> <center> </td>
				 <td colspan="3" ><center><b>Action Date - Time </b> <center> </td>
				<td colspan="3" > <center><b>Comments</b>   <center> </td>
				
				 
				 
				
                
      </tr>

	
	  <tr>
                     <?php
                        $LocalClaimHodActtionStatus = $this->method_call->TravelClaimDetailsHodActionStatus($trv_mst_id,$emp_code);
                      //  echo '$lrcm_id-----------' .$lrcm_id;
                       // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimHodActtionStatus != null) {
                            foreach ($LocalClaimHodActtionStatus->result() as $row) {
                                ?>
              
			 <td style="display:none" >  </td>
                         <td colspan="3"  ><?php echo $row->emp_name; ?></td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			   
				 <td colspan="3"> <?php 
                                 if($row->actual_action=="1"){
                                     echo 'Approved';
                                 }elseif ($row->actual_action=="2") {
                                     echo 'Rejected';
                                    }
                                    else {
                                        echo 'Pending';
                                    }
                                 ?></td>
				 
				  <td colspan="3"> <?php echo $row->action_date.' - '.$row->action_time ?></td>
				  
				 
					    <td colspan="3"> <?php 
                                 if($row->comment==""){
                                     echo 'No Comment Found';
                                 }  else {
                                        echo $row->comment;
                                    }
                                 ?> </td>
						
				   
				  <?php }
                        }
                        ?>	
				
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
		
			
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>

				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 


	  <tr>
              <?php
                        $LocalClaimSanAuthoActtionStatus = $this->method_call->TravelDetailsSanAuthoActionStatus($trv_mst_id,$emp_code);
                      //  echo '$lrcm_id-----------' .$lrcm_id;
                       // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimSanAuthoActtionStatus != null) {
                            foreach ($LocalClaimSanAuthoActtionStatus->result() as $row) {
                                ?>
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
                         <td colspan="3">
                         <?php if($row->emp_name==""){
                                  echo 'Your Request Not Procced Due To Reject....';
                         }  else {
                             echo $row->emp_name;
                         }
                         ?></td>
				
                                 <td colspan="3">  <?php 
                                 if($row->actual_action=="1"){
                                     echo 'Approved';
                                 }elseif ($row->actual_action=="2") {
                                     echo 'Rejected';
                                    }
                                    else {
                                        echo 'Pending';
                                    }
                                 ?> </td>
				 
				 <td colspan="3">  <?php echo $row->action_date.' - '.$row->action_time ?> </td>
						
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
					   <td colspan="3">  <?php 
                                 if($row->comment==""){
                                     echo 'No Comment Found';
                                 }  else {
                                        echo $row->comment;
                                    }
                                 ?>  </td>
					
				
				
				   
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <?php }
                        }
                        ?>	
				 
				
                
      </tr>
					  

	
	 

               
	


	 
				</tbody>
               		
              </table>
			
	
	</div>
                          <hr>          

                    </div>

                </div>

            </div>

        </div>
        <script>
            $(document).ready(function () {         
    var totalAmt= document.getElementById('txtTotAmtRep').value;
    var txtTrvlTotalAmt= document.getElementById('txtTrvlTotalAmt').value;
    var txtHotelTotalAmt= document.getElementById('txtHotelTotalAmt').value;
    var txtIntraTotalAmt= document.getElementById('txtIntraTotalAmt').value;
    var txtMealTotalAmt= document.getElementById('txtMealTotalAmt').value;
    document.getElementById("lblTotalValue").innerHTML = totalAmt;
    document.getElementById("lblTrvlTotalAmt").innerHTML = txtTrvlTotalAmt;
    document.getElementById("lblHotelTotalAmt").innerHTML = txtHotelTotalAmt;
    document.getElementById("lblIntraTotalAmt").innerHTML = txtIntraTotalAmt;
    document.getElementById("lblMealTotalAmt").innerHTML = txtMealTotalAmt;

});
            </script>
    </body>
</html>

