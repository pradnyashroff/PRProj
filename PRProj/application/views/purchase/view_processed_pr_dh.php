 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View PR</title>
     	   <?php include_once 'styles.php'; ?>
<style>

.kv-file-upload{
	display:none;
	
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


@media print {
  #printPageButton {
    display: none;
  }
}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
 
       	   <?php include_once 'purchase_sidebar.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo'">
      View PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
      <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard" style="color:#FFFFFF;"> Home</i></a></li>
         <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" style="color:#FFFFFF;">Purchase</a></li>

<li class="active" style="color:#FFFFFF;"> View PR
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
   <section class="content">
	  
	  
							  <?php $pr_detail= $this->method_call->pr_detail($pr_id);
 if($pr_detail!=null){
	 foreach ($pr_detail->result() as $row)  
         {  ?>
	  
	  
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  

          <div class="box box-info">
 
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
			  

			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR NUMBER</label>
				<div class="input-group  col-sm-6">
                 
               
            <?php echo $row->pr_id; ?>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE"> PLANT </label>
				<div class="input-group  col-sm-6">
                                    <?php echo $row->plant_code; ?>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE">PR DATE</label>
				<div class="input-group  col-sm-6">
                  
				<?php echo $row->pr_date; ?>

               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR TYPE</label>
				<div class="input-group  col-sm-6">
				
				
				
                          
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
		<?php print_r($pr_type_nm['pt_name']); ?>
					
							
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR OWNER</label>
				<div class="input-group  col-sm-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">DEPARTMENT</label>
				<div class="input-group  col-sm-6">
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
<?php print_r($dept_nm['dept_name']); ?>
    
         
                </div>
                </div>
				
	  <div class="form-group col-sm-4">			
			</div>	
			
		
			 <div class="form-group col-sm-4">			
			</div>	 <div class="form-group col-sm-4">			
			</div>
			 
		  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-6 pull-left control-label" style="color:#3482AE">REQUIREMENT DETAILS:</label>
				
                </div>
			  
			
				
			    <div class="form-group col-sm-12">
			       <table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                  
                    <th style="width: 5%">SR. NO.</th>
				   <th style="width: 10%">ITEM CODE</th>
				   <th>ITEM DESCRIPTIONS</th>
				   <th style="width: 10%">REQ QTY.</th>
				   <th>UOM</th>
				   <th style="width: 10%">APPROX. RATE</th>
				   <th style="width: 15%">APPROX. TOTAL AMOUNT</th>
                   <th>EXPECTED DELIVERY PERIOD</th>
				   <th>PROJECT DETAILS</th>
				   <th>TECHNICAL DETAILS/MFG NAME</th>
                  <th>Customer Code</th>
				   <th>Sales Material</th>
				   <th>Ecn/New</th>
				   <th>Ecn/New Code</th>
                </tr>
				
                </thead>
		
                <tbody>
				
	 

				
				  <?php $item= $this->method_call->list_items($pr_id);
				  				  $final_rate=0;

 if($item!=null){
	 	   
	$sr_no=1;			  
foreach ($item->result() as $row3)  
         {  ?>
                    <tr style="text-align:left ">
				 <td  ><?php echo $sr_no; ?> </td>
				 <td  ><?php echo $row3->item_code; ?></td>  
            <td>  <?php echo $row3->item_description; ?></td>  
            <td> <?php echo $row3->req_qty; ?></td>  
            <td> <?php echo $row3->uom; ?></td>  
            <td> <?php echo $row3->approx_rate; ?></td>  
            <td>  <?php echo $row3->approx_total_amt; ?></td>  
           
            <td>  <?php echo $row3->expected_delivery; ?> </td>  
            <td> <?php echo $row3->project_detail; ?> </td>  
            <td> <?php echo $row3->technical_detail; ?> </td>  
			<td>  <?php echo $row3->cust_code; ?> </td>  
            <td> <?php echo $row3->sales_material; ?> </td>  
            <td> <?php echo $row3->ecn_new; ?> </td>  
			<td> <?php echo $row3->ecn_newcode; ?> </td>  
                <?php

				$approx_rate=$row3->approx_total_amt;
					$final_rate=$final_rate+$approx_rate;
				?>
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
               		
              </table>
			
			  </div>
			  
			  		 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label"></label>
                          <label class="col-sm-3.5 pull-right  control-label" style="font-size:14px;color:#3482AE">Total Cumulative PR Amount:<?php echo $row->pr_id; ?> :<span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
			  	<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  		
				
			  
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">DELIVERY LOCATION</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">INSPECTION REQUIRED AT SUPPLIER END</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">10</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CONSIDERED IN BUDGET</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->budget_consider;  ?>

         
                </div>
                </div>
			<!--	
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6">
                <?php echo $row->cust_cost;  ?>
         
                </div><br>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label" id="lab">Depending Field</label>
				<div class="input-group  col-sm-6">
                 
                            <?php echo $row->cust_cost_val;  ?>
         
                </div>
                </div>
				-->
				
				<div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">11</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CUSTOMER COST - UPFRONT (IN RS.)</label>
				<div class="input-group  col-sm-6">
                 <?php echo $row->cust_cost_upfront; ?>
               
                                 
    
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">12</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CUSTOMER COST - AMORTIZATION (IN MONTHS)</label>
				<div class="input-group  col-sm-6">
                 
               
                                    <?php echo $row->cust_cost_amortization; ?>
    
                </div>
                </div>

				
				
				   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">13</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">OWN INVESTMENT (RECOVERY PERIOD IN MONTHS)</label>
				<div class="input-group  col-sm-6">
                 
               
                                   <?php echo $row->own_investment; ?>
                </div>
                </div>

				
				<div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">14</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">FUND NO/ION NO</label>
				<div class="input-group  col-sm-6">
                 
                                             <?php echo $row->ion_no;  ?>

         
                </div>
                </div>
				
				
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">15</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">REASON OF PROCUREMENT</label>
				<div class="input-group  col-sm-6">
                 
                                             <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
				

	
			 <!-- start -->
			  
			   <div class="form-group col-sm-6">
			       <label class="col-sm-1 pull-left control-label" style="color:#3482AE">16</label>
				<label class="col-sm-5 pull-left control-label" style="color:#3482AE">APPROVER STATUS</label>
			       
			     </div>       
			            
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
          		
                <tbody>
				
				  <tr>
	  
				
				 <td colspan="3" > <center><b style="color:#3482AE"> APPROVER NAME</b>   <center> </td>
				<td colspan="3" ><center><b style="color:#3482AE"> APPROVER DATE/TIME</b> <center> </td>
				 <td colspan="3" ><center><b style="color:#3482AE">APPROVER COMMENT</b> <center> </td>
				
				 <td colspan="3" > <center><b style="color:#3482AE">ACTION</b>   <center> </td>
				
				 
				 
				
                
      </tr>

	
      <tr style="background-color:  #ccddff">
	  
			
			  
			
			   <?php $dh_name= $this->method_call->fetch_emp_name($row->dh_id); 
			  $dh_dt= $this->method_call->fetch_status_dt($pr_id,$row->dh_id);
			  ?>
				 <td colspan="3"> DH Name : <?php echo $dh_name ?> </td>
				 
				  <td colspan="3">  <?php echo $dh_dt ?> </td>
				  
				   <?php if($row->dh_comment == null){
											   
					   ?>
					    <td colspan="3" style="color:#3482AE">  APPROVAL PENDING FROM DEPARTMENT HEAD</td>
						<?php
				   }
				   else{?>
				   
					   <td colspan="3"> <?php echo $row->dh_comment ?></td>
				<?php
				   } ?>
				<td colspan="3" >Recent Action</td>
				
				 
				
                
      </tr> 


	  <tr style="background-color:  #ccffcc">
	  
			
				 
				 
				<?php $ph_name= $this->method_call->fetch_emp_name($row->ph_id);
 $ph_dt= $this->method_call->fetch_status_dt($pr_id,$row->ph_id);
 ?>
				
				 <td colspan="3"> PH Name : <?php echo $ph_name ?> </td>
				 
				 <td colspan="3">  <?php echo $ph_dt ?> </td>
						
				
				 
				  <?php if($row->ph_comment == null){
					  
				 ?>
					   <td colspan="3" style="color:#3482AE">  APPROVAL PENDING FROM PLANT HEAD</td>
					<?php
					 
				 }else{
					?> 
				 <td colspan="3">  <?php echo $row->ph_comment ?> </td>
				<?php 
				 }
				?>
				   <td colspan="3" >Recent Action</td>
				 
				 
				
                
      </tr>
					  

	
	 

               
					 
	  <tr style="background-color:  #FCF8E4">
	  
			
				
				 	<?php $source_name= $this->method_call->fetch_emp_name($row->pr_source_id); 
 $source_dt= $this->method_call->fetch_status_dt($pr_id,$row->pr_source_id);
				?>
					   <td colspan="3"  >Sourcing Person :   <?php echo $source_name ?> </td>
			
				 <td colspan="3"  >  <?php echo $source_dt ?> </td>
				 
				  <?php if($row->source_comment == null){
					 
					  ?>
					   
					    <td colspan="3" style="color:#3482AE" >APPORVAL PENDING FROM SOURCING DEPARTMENT</td>
					
				<?php	 
				 }else{
				?>
	 
				  <td colspan="3"  > <?php  echo $row->source_comment ?> </td>
                                  
				 <?php
				 }
				 ?>
				  
				<td colspan="3" >Recent Action</td>
				
      </tr> 
		 

 <?php $item= $this->method_call->pr_approver_history_id($pr_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         { $appver_name= $this->method_call->fetch_emp_name($rowhistory->pr_approver_id); 
         ?>  
	
			<tr>
				
				
				 <td colspan="3" > Previous Actions By : <?php echo $appver_name; ?></td>
				<td colspan="3" ><?php echo $rowhistory->pr_approver_date; ?></td>
				   <td colspan="3" > <?php echo $rowhistory->pr_approver_cmt; ?></td> 
			<td colspan="3" ><?php echo $rowhistory->pr_approver_status; ?></td>
			
                       
			</tr>
	 

				
		 <?php  }
 } ?>
	 
				</tbody>
               		
              </table>
			
	
	
	
		
                         </br></br>  
                           
			
			  <div class="form-group col-sm-12">

<div class="col-sm-4"></div>
<div class="col-sm-4">
<br>

<button type="submit" onclick="window.print();"  class="btn" id ="printPageButton" class="btn  bg-skincolor " style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">PDF</button></div>
				<div class="col-sm-4"></div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			   		
		 <div class="form-group col-sm-12">
<?php $filea= $this->method_call->filefetch($pr_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
			
			    <div class="form-group col-sm-4">
			  <a style="color: #337ab7;" href="<?php echo base_url()."uploads/PR/". $pr_id ."/".$rowfile->file_name;?>"><?php echo $rowfile->file_name; ?></a>
			  </div>
		 <?php }
 } ?>
			  
			                </div>
							
							
							 <input type="hidden" name="pr_state" value="submited_dh" class="form-control"  required> 
		<?php $ph_id= $this->method_call->fetch_ph_id($row->delivary_loc); ?>
		<input type="hidden" name="pr_ph_id" value="<?php print_r($ph_id['ph_id']);  ?>" class="form-control"  required>
		<input type="hidden" name="pr_dh_id" value="<?php echo $row->dh_id;  ?>" class="form-control"  required>
		
		
		 
			  

			   
	   

              </div>
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
		 <?php }
 } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

 
  </body>
</html>