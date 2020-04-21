 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Approve PR</title>
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
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >

 
       	   <?php include_once 'purchase_sidebar.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1 style="color:#FFFFFF; font-family:'exo'">
      Approve PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
    <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;"> <i class="fa fa-dashboard" style="color:#FFFFFF;"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" style="color:#FFFFFF;">Purchase</a></li>

<li class="active" style="color:#FFFFFF;"> Approve PR
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
		


              <div class="box-body">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR NUMBER </label>
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
			
                         	 <div class="form-group col-sm-8">   
                           	
                  	</div>
                  
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-7 pull-left control-label" style="color:#3482AE">REQUIREMENT DETAILS :</label>
				
                </div>
				<div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">&nbsp;</label>
			   <label class="col-sm-6 pull-left control-label">&nbsp;</label>
				
                </div>
                           	
			   
                  <!-- email owner-->
			<div class="form-group col-sm-4" hidden>
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email owner</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->pr_owner; ?>" readonly   name="owner_id" class="form-control"  required>
  <?php $owner_eid= $this->method_call->fetchemp_email($row->pr_owner); ?>
  <input type="hidden" name="owner_eid" value="<?php print_r($owner_eid['emp_email']); ?>" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				
			
			
			  
			    <div class="form-group col-sm-12">
			        <table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                  
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
				   <th>ION No.</th>
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details/Mfg Name</th>
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
			<tr>
				 <td  ><?php echo $sr_no; ?> </td>
				 <td  ><?php echo $row3->item_code; ?></td>  
            <td>  <?php echo $row3->item_description; ?></td>  
            <td> <?php echo $row3->req_qty; ?></td>  
            <td> <?php echo $row3->uom; ?></td>  
            <td> <?php echo $row3->approx_rate; ?></td>  
            <td>  <?php echo $row3->approx_total_amt; ?></td>  
            <td> <?php echo $row3->ion_no; ?></td>  
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
			  
			  <label class="col-sm-2 pull-left control-label" style="color:#3482AE"></label>
			  
				<label class="col-sm-3.5 pull-right  control-label" style="font-size:14px;color:#3482AE">Cumulative Total Amount of PR <?php echo $row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
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
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">INSEPECTION REQ. AT SUPPLIER END</label>
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
			
		  
		  
	</div>
              <!-- /.box-body -->
              <div class="box-footer">
			   		
		 <div class="form-group col-sm-12">
<?php $filea= $this->method_call->filefetch($pr_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
			  <a style="color: #337ab7;" href="<?php echo base_url()."uploads/PR/". $pr_id ."/".$rowfile->file_name;?>"><?php echo $rowfile->file_name; ?></a><br><br>
		 <?php }
 } ?>
			  
			                </div>
							
							
							 <input type="hidden" name="pr_state" value="submited_dh" class="form-control"  required> 
		<?php $ph_id= $this->method_call->fetch_ph_id($row->delivary_loc); ?>
		<input type="hidden" name="pr_ph_id" value="<?php print_r($ph_id['ph_id']);  ?>" class="form-control"  required>
		<input type="hidden" name="pr_dh_id" value="<?php echo $row->dh_id;  ?>" class="form-control"  required>
		
		
		 
			  <form method="post" action="<?php echo site_url('purchase/PR/dh_update_pr') ?>" >

			    <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">18</label>
			   <div class="input-group  col-sm-5 pull-left" ><input type="radio" name="pr_state" value="DH_approved" required  > <B style="color:#3482AE"> &nbsp;APPROVE</B></input></div>
				<div class="input-group  col-sm-5 pull-right">
                 
                                    <input type="radio" name="pr_state" value="DH_reject" style="color:#3482AE" ><b style="color:#3482AE"> &nbsp; REJECT </b></input>

         
                </div>
                </div>
				<div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">19</label>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">APPROVER COMMENT</label>
				<div class="input-group  col-sm-8">
                 
                                        <textarea class="form-control" rows="4" cols="50" name="dh_comment" required> </textarea>

         
                </div>
                </div>
				
			  
			    <div class="form-group col-sm-12">
<div class="col-sm-4"><input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>"></input>

<input type="hidden" name="pr_by_id" value="<?php echo $row->pr_owner;  ?>"></input>
<input type="hidden" name="approval_id" value="<?php echo $emp_code;  ?>"></input>
</div>
<div class="col-sm-4"><button type="submit" id="btn-submit" class="btN" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Proceed</button></div>
<div class="col-sm-4"></div>
				
                </div>
				
				
					<!-- email owner-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email owner</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->pr_owner; ?>" readonly   name="owner_id" class="form-control"  required>
  <?php $eid_owner= $this->method_call->fetchemp_email($row->pr_owner); ?>
  <input type="hidden" name="emp_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>


                </div>
                
                		
                </div>	
                
                				<!-- email ph -->
						 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label ">email PH</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->ph_id; ?>" readonly   name="ph_id" class="form-control"  required>
  <?php $ph_eid= $this->method_call->fetchemp_email($row->ph_id); ?>
  <input type="hidden" name="ph_eid" value="<?php print_r($ph_eid['emp_email']); ?>" readonly  class="form-control"  required>

    
         
                </div>
                </div>
				<!--end-->	
				
				
					<!-- DH nm-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">DH Nm</label>
				<div class="input-group  col-sm-6">
                  <input type="text" value="<?php echo $row->dh_id; ?>" readonly   name="owner_id" class="form-control"  required>
  <?php $dhnm= $this->method_call->fetch_emp_name($row->dh_id); ?>
  <input type="text" name="dhnm" value="<?php echo $dhnm; ?>" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				
				
	</div>
	</form>
	   

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

  
  </body>
</html>