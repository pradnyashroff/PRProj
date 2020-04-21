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
<body class="hold-transition skin-blue sidebar-mini" >
 
       	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      View PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('purchase/Mgmt_ctr/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         

<li class="active"> View PR
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
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">PR Number </label>
				<div class="input-group  col-sm-6">
                 
               
            <?php echo $row->pr_id; ?>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label">2</label>
			   <label class="col-sm-4 control-label"> Plant </label>
				<div class="input-group  col-sm-6">
                                    <?php echo $row->plant_code; ?>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">PR Date</label>
				<div class="input-group  col-sm-6">
                  
				<?php echo $row->pr_date; ?>

               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
				
                          
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
		<?php print_r($pr_type_nm['pt_name']); ?>
					
							
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
<?php print_r($dept_nm['dept_name']); ?>
    
         
                </div>
                </div>
				
				
				
				
				
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>
			  
			    <div class="form-group col-sm-12">
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
                <tr>
                  
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
			
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details/Mfg Name</th>
                  
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
           
            <td>  <?php echo $row3->expected_delivery; ?> </td>  
            <td> <?php echo $row3->project_detail; ?> </td>  
            <td> <?php echo $row3->technical_detail; ?> </td>  
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  		
				
			  
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
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
			  
			  <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost - Upfront (In Rs.) </label>
				<div class="input-group  col-sm-6">
                 <?php echo $row->cust_cost_upfront; ?>
               
                                 
    
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost - Amortization  (In Months) </label>
				<div class="input-group  col-sm-6">
                 
               
                                    <?php echo $row->cust_cost_amortization; ?>
    
                </div>
                </div>

				
				
				   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment (Recovery Period In Months)	 </label>
				<div class="input-group  col-sm-6">
                 
               
                                   <?php echo $row->own_investment; ?>
                </div>
                </div>

				
				<div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-3 pull-left control-label">Fund NO/ION NO</label>
				<div class="input-group  col-sm-8">
                 
                                             <?php echo $row->ion_no;  ?>

         
                </div>
                </div>
				
				
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                 
                                             <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
				
			<!-- 
			  	  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-3 pull-left control-label">Department Head Comment</label>
				<div class="input-group  col-sm-8">
                   <?php $dh_name= $this->method_call->fetch_emp_name($row->dh_id); ?>

                                   <?php if($row->dh_comment == null){
					 echo "Approval Pending From Department Head ($dh_name)";
					 
				 }else{
					 
					 $dh_dt= $this->method_call->fetch_status_dt($pr_id,$row->dh_id);
					 
				 echo $row->dh_comment; echo ' ('.$dh_name.')'; echo ' ('. $dh_dt.')'; } ?>

         
                </div>
                </div> 
			  
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-3 pull-left control-label">Plant Head Comment</label>
				<div class="input-group  col-sm-8">
			<?php $ph_name= $this->method_call->fetch_emp_name($row->ph_id); ?>

                 <?php if($row->ph_comment == null){
					 echo "Approval Pending From Plant Head ($ph_name)" ;
					 
				 }else{
					 
				 $ph_dt= $this->method_call->fetch_status_dt($pr_id,$row->ph_id);
				 
				 echo $row->ph_comment; echo ' ('.$ph_name.')'; echo ' ('. $ph_dt.')';
				
				 } ?>

         
                </div>
                </div> 
			  
			   <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Sourcing Department Comment</label>
				<div class="input-group  col-sm-8">
			<?php $source_name= $this->method_call->fetch_emp_name($row->pr_source_id); ?>

                 <?php if($row->source_comment == null){
					 echo "Approval Pending From Sourcing Department ($source_name)" ;
					 
				 }else{
				$source_dt= $this->method_call->fetch_status_dt($pr_id,$row->pr_source_id);
	 
				 echo $row->source_comment; echo ' ('.$source_name.')'; echo ' ('. $source_dt.')';
				
			?>
			
			
			
				<?php	 } ?>

         
                </div>
                </div> 
			  
			
	-->
	
	
			 <!-- start -->
			  
			   <div class="form-group col-sm-12">
			       <label class="col-sm-1 pull-left control-label">16</label>
				<label class="col-sm-3 pull-left control-label">Approver Status </label>
			       
			            
			            
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
          		
                <tbody>
				
				  <tr>
	  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				
								 <td style="display:none"> </td>
				 <td colspan="3" > <center><b> Comment</b>   <center> </td>
				<td colspan="3" ><center><b> Approver Name</b> <center> </td>
				 <td colspan="3" ><center><b>Approval Date/Time </b> <center> </td>
				
				 <td colspan="3" > <center><b>Approval Comment</b>   <center> </td>
				
				 
				 
				
                
      </tr>

	
	  <tr>
	  
			 <td style="display:none" >  </td>
			   <td colspan="3"  >Department Head Comment </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			   <?php $dh_name= $this->method_call->fetch_emp_name($row->dh_id); 
			  $dh_dt= $this->method_call->fetch_status_dt($pr_id,$row->dh_id);
			  ?>
				 <td colspan="3">  <?php echo $dh_name ?> </td>
				 
				  <td colspan="3">  <?php echo $dh_dt ?> </td>
				  
				   <?php if($row->dh_comment == null){
											   
					   ?>
					    <td colspan="3">  Approval Pending From Department Head </td>
						<?php
				   }
				   else{?>
				   
					   <td colspan="3"> <?php echo $row->dh_comment ?></td>
				<?php
				   } ?>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
		
			
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>

				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 


	  <tr>
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="3"> Plant Head Comment </td>
				 
				<?php $ph_name= $this->method_call->fetch_emp_name($row->ph_id);
 $ph_dt= $this->method_call->fetch_status_dt($pr_id,$row->ph_id);
 ?>
				
				 <td colspan="3">  <?php echo $ph_name ?> </td>
				 
				 <td colspan="3">  <?php echo $ph_dt ?> </td>
						
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <?php if($row->ph_comment == null){
					  
				 ?>
					   <td colspan="3">  Approval Pending From Plant Head </td>
					<?php
					 
				 }else{
					?> 
				 <td colspan="3">  <?php echo $row->ph_comment ?> </td>
				<?php 
				 }
				?>
				   
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
					  

	
	 

               
					 
	  <tr>
	  
			 <td style="display:none" >  </td>
		
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="3"  >  Sourcing Department Comment </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 	<?php $source_name= $this->method_call->fetch_emp_name($row->pr_source_id); 
 $source_dt= $this->method_call->fetch_status_dt($pr_id,$row->pr_source_id);
				?>
					   <td colspan="3"  >  <?php echo $source_name ?> </td>
			
				 <td colspan="3"  >  <?php echo $source_dt ?> </td>
				 
				  <?php if($row->source_comment == null){
					 
					  ?>
					   
					    <td colspan="3"  >  Approval Pending From Sourcing Department </td>
					
				<?php	 
				 }else{
				?>
	 
				  <td colspan="3"  > <?php  echo $row->source_comment ?> </td>
				 <?php
				 }
				 ?>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
      </tr> 
		 


	 
				</tbody>
               		
              </table>
			
	
	</div>
	
		
			  
			   <div class="form-group col-sm-12">
				<label class="col-sm-1 pull-left control-label">15</label>
				<label class="col-sm-3 pull-left control-label">Approver History </label>
			        <table id="example" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>
					
				
			
                <tr>
                				
				
				<th> PR ID</th>
				
				<th>Approver Name</th>				
				<th> Approver Comment </th>
				<th> Approver Status</th>  				
				<th>  Date / Time </th>  
				
                </tr>  
			
				
                </thead>
				

                <tbody>
				
				
	 				  <?php $item= $this->method_call->pr_approver_history_id($pr_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         { $appver_name= $this->method_call->fetch_emp_name($rowhistory->pr_approver_id); 
         ?>  
	
			<tr>
				 <td> <?php echo $rowhistory->pr_id; ?> </td>
				
				 <td> <?php echo $appver_name; ?></td>
				 <td> <?php echo $rowhistory->pr_approver_cmt; ?></td> 
				 
			<td><?php echo $rowhistory->pr_approver_status; ?></td>
			<td><?php echo $rowhistory->pr_approver_date; ?></td>
			</tr>
	 

				
		 <?php  }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>
		
		  </div>
			
			  <div class="form-group col-sm-12">

<div class="col-sm-4"></div>
<div class="col-sm-4">
<br><button type="button" onclick="window.print();"  id ="printPageButton" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">PDF</button></div>
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