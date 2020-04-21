<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Local Reimbursement Report</title>
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
   <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" > 
        <?php include_once 'reportHeadList.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="font-family:'exo';">
            <div class="container-fluid" style="font-family:'exo';">
                <!-- Breadcrumbs--><div class="card">
                    <div class="wraper" style="margin-left:5%; margin-right:5%; margin-top:2%; font-family:'exo';">
                      
                                <br><br>
                                <div class="title">
                                    <center><h5 style="font-family:'exo';"><b style="color:#FF0000;">LOCAL REIMBURSEMENT CLAIM</b></h5></center>
                                </div>
                                
                                <br>
                                <div class="repport_container" style="font-family:'exo';">
                                 
                                    
                                    <br>

                              

                               <div class="form_content_line"  style="font-family:'exo'; font-size: 14px">
                              
                                   
                                   
                                   
                                   
                                   <table style="width:100%" style="font-family:'exo';">
                                               <?php $LocalClaimDetail= $this->method_call->localClaimDetails($lrcm_id);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row)  
         {  ?>
  <tr style="font-family:'exo';">
    <th>Plant Code: </th>
    <?php $grade=$this->method_call->getPlantNameDetails($row->plant_code);?>
                                      
    <td> <?php echo $row->plant_code; ?> -(  <?php print_r($grade['plant_name']); ?>)</td>
    <th>Claim Number:</th>
    <td><?php echo $row->lrcm_id; ?></td>
    <th>Claim Date:</th>
    <td><?php echo $row->reg_date; ?></td>
  </tr>
  
                                      <?php
                                }
                            }
                            ?>
  <tr style="font-family:'exo';">
    <th>Claimer Name: </th>
    <td><?php echo $emp_name; ?>-(<?php echo $row->emp_code; ?>)</td>
    <th>Department:</th>
     <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
     <td><?php print_r($dept_nm['dept_name']); ?></td>
    <th>Grade:</th>
     <?php $grade=$this->method_call->getGradeDetails($emp_code);?>
    <td> <?php print_r($grade['grade']); ?></td>
  </tr>
  </table>
       </div>






        <hr>
                                    
         <h5>Gate Pass Details Total Amount: &#8377;- <label  id="lblTotalValue"></label>/-</h5>
                              <div class="form-group col-sm-12">
                         <div class="table-responsive">
        <table id="example" style="font-family:'exo'; font-size: 12px" class="table table-bordered">
                <thead>
                <tr style="font-family:'exo';">
                  <th>Sr.No.</th>
                  <th>Travel Mode</th>
                  <th>Date</th>
                  <th>Gate Pass No.</th>
                  <th>From Location</th>
                  <th>To Location</th>
                  <th>KM</th>
                  <th>Amount</th>
                  <th>Reason</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLocalReimDetailsByClaimId($lrcm_id);
                 $final_rate=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr style="font-family:'exo';">
                    <td><?php echo $sr_no; ?></td>
                  <td><?php echo $row->vehicle; ?></td>
                  <td><?php echo $row->trvl_date; ?></td>
                  <td><?php echo $row->gate_pass_no; ?></td>
                  <td><?php echo $row->place_from; ?></td>
                  <td><?php echo $row->place_to; ?></td>
                  <td><?php echo $row->trvl_km; ?></td>
                  <td><?php echo $row->trvl_amt; ?></td>
                  <td><?php echo $row->trvl_reason; ?></td>
                    <?php

				$total_rate=$row->trvl_amt;
					$final_rate=$final_rate+$total_rate;
				?>   
                  </tr>
                	 <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                    </div>   
                  <div class="form-group col-sm-12" style="font-family:'exo';">
                      <div class="form-group col-sm-7"></div>
			
                          <div class="form-group col-sm-4">
                              <input type="hidden" id="txtTotalAmt" value="<?php echo $final_rate; ?>">
                          </div>
				<div class="form-group col-sm-1">
                                    
                                </div>
                </div>
                                  
			  </div>
         <hr>
                           <h5 style="font-family:'exo';">Claim Actions Log :</h5>
                                                              <div class="form-group col-sm-12">
			  <table id="example" class="table table-bordered" style="font-family:'exo'; font-size: 12px">
          		
                <tbody>
				
				  <tr style="font-family:'exo';">
	  
			 
                                <th colspan="3" style="font-family:'exo';"> <center><b>No</b>   <center> </th>
                                <th colspan="3" ><center><b> Claim No</b> <center> </th>      
                                <th colspan="3" > <center><b>Action Date - Time</b>   <center> </th>
				<th colspan="3" ><center><b>Action By </b> <center> </th>
                                <th colspan="3" ><center><b> Action</b> <center> </th>
				<th colspan="3" > <center><b>Comment</b>   <center> </th>
                       
                                
				
				 
				 
				
                
      </tr>

	
	  <tr style="font-family:'exo';">
                     <?php
                        $LocalClaimHodApproved = $this->method_call->localClaimDetailsStatusLog($lrcm_id);
                       // echo '$lrcm_id-----------' .$lrcm_id;
                        // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimHodApproved != null) {
                             $sr_no = 1;
                            foreach ($LocalClaimHodApproved->result() as $row) {
                               
                                ?>
                         <td colspan="3"><?php echo $sr_no; ?></td>
			 <td colspan="3"><?php echo $row->lrcm_id; ?></td>
                         <td colspan="3"><?php echo $row->action_date ?> - <?php echo $row->action_time ?> </td>
                         <td colspan="3"><?php echo $row->emp_name?> </td>
                         <td colspan="3">
                         <?php 
                                 if($row->actual_action=="1"){
                                     echo 'Accepted';
                                 }elseif ($row->actual_action=="2") {
                                     echo 'Rejected';
                                    }
                                    else {
                                        echo 'Pending';
                                    }
                                 ?></td>			 
                         
                         <td colspan="3"><?php 
                                 if($row->comment==""){
                                     echo 'No Comment Found';
                                 }  else {
                                        echo $row->comment;
                                    }
                                 ?> </td>
                        						
	 </tr> 
	 
         <?php $sr_no++;}
                        }
                        ?>	
				
	 	</tbody>
               		
              </table>
			
	
	</div>
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                        </div>
                                
                          
                                
                                
                                
                                
                                
                                
                                
                    </div>              
                                
                                
                                

                  

                    </div>
                  

                </div>

            </div>
        </div>
        <script>
            $(document).ready(function () {         
    var totalAmt= document.getElementById('txtTotalAmt').value;
   
    document.getElementById("lblTotalValue").innerHTML = totalAmt;
    

});
            </script>
    </body>
</html>

