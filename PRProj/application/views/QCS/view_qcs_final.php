 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create QCS</title>
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
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Create QCS
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/QCS/index') ?>">QCS</a></li>

<li class="active">Create QCS
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
                  
                  <th ></th>
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
                  
                </tr>
				
                </thead>
		
                <tbody>
				
	 

				
				  <?php $item= $this->method_call->list_items($pr_id);
 if($item!=null){
	 	   
	$sr_no=1;			  
foreach ($item->result() as $row3)  
         {  ?>
			<tr>
				 <td  ><?php echo $row3->item_id; ?></td>
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
                
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
               		
              </table>
			
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
				
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                 
                                             <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
				
			 
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
			
			<div class="form-group col-sm-12">

<div class="col-sm-4"><br><button type="button" onclick="window.print();"  class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">PDF</button></div>
<div class="col-sm-4"></div>
				<div class="col-sm-4"></div>

                </div>
			
			<?php	 } ?>

         
                </div>
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
		
		
		 <?php
$pr_plant=$row->plant_code;
		$emp_dept=$dept_nm['dept_name'];
		$qcs_owner=$row->pr_owner_name;

		 }
 } ?>
      </div>
      <!-- /.row -->
	  
	     <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
   <div class="box-header with-border">
              <h3 class="box-title">QCS</h3>

              <div class="box-tools pull-right">
              <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> 
                </button>-->
				  <button type="button" class="btn btn-box-tool" href="#collapseQCS" data-toggle="collapse""><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body collapse" id="collapseQCS">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" value="auto-genrated" readonly class="form-control"  required>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label">2</label>
			   <label class="col-sm-4 control-label"> Plant </label>
				<div class="input-group  col-sm-6">
                                      <input type="text" name="pr_plant" value="<?php echo $pr_plant; ?>" readonly class="form-control"  required>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" readonly name="qcs_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
                                    <input type="text" readonly name="emp_dept" value="<?php echo $emp_dept; ?>" class="form-control"  required>
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5 </label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly value="<?php echo $qcs_owner; ?>" name="qcs_owner" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Reference</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly name="pr_ref" value="<?php echo $pr_id; ?>" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				
				
				
			   <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-10 pull-left control-label">Requirement Details</label>
				
			  </div>
			  
			  
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
			   <th  ></th>
                  
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="3" ><center>Supplier 1 <input type="text" placeholder="supplier 1 name"  name="" class="form-control"  required> <center></th>
			
				
				 <th colspan="3" > <center>Supplier 2  <input type="text" placeholder="supplier 2 name"  name="" class="form-control"  required> <center></th>
				 <th colspan="3" > <center>Supplier 3  <input type="text" placeholder="supplier 3 name"  name="" class="form-control"  required> <center></th>

				
                
      </tr>
			
                <tr >
                				 <th colspan="7" style="text-align:right;"></th>

				    <th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
			
			<th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
			<th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
				  
                </tr>  
			
				
                </thead>
		
                <tbody>
				<!-- Items to be inserted here -->
	 
					<tr>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  ></td>
				 <td  >  </td>
				 <td  > </td>
				 <td  > </td>
				
                
      </tr>
	  				<!-- Items to be inserted here END-->

	    <tr>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="13" style="text-align:left;">
				 
				 <div class="form-group col-sm-3">
			  
			 
				<div class="col-sm-12">
                 
                 <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn  bg-skincolor " style="border: 1px solid orange;">Add New Item</button>
         
                </div>	
                </div>
			  			 
			  			  <div class="form-group col-sm-9">
			  
			 <div class="col-sm-4">

	
  <button type="button" id="delete_can" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Delete Item</button>
		</div>
                </div>
				 
				</td>
				
				 
				  <td colspan="3"  >   </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	
	    <tr>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="7" style="text-align:right;"> Grand Total</td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly required></td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly  required></td>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly required></td>
				
                
      </tr> 

	   <tr>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="7" style="text-align:right;">PO to Be Release In Favor Of </td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 1 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">TECHNICAL DETAILS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 


	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 2 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">CREDIBILITY OF THE SUPPLIER CHECKED													
</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 3 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">INSURANCE & FREIGHT</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>

	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 4 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">DELIVERY PERIOD (In Working Days)</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 5 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">DELIVERY MODE</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 6 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">INSPECTION / TESTING													</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 7 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">PAYMENT TERMS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 8 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">WARRANTY</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 9 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">TAXES & DUTIES</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
              <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 10 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">SCOPE OF INSTALLATION</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
              <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 11 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">SUPPLIERS CONTACT DETAILS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 12 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">VALIDITY OF PRICE /QUOT (In Days)</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 13 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">Quotation</td>
								 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
                </tbody>
               		
              </table>
			  
			  
			  
			  
			  
			  
			  
		  </div>
			  
			  <div class="form-group col-sm-3">
			  
	
			   <label class="col-sm-12 pull-left control-label">Additional Remarks </label>
			                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			    <textarea></textarea>
                </div>
				
				
				
			  
			
			  
              </div>
              <!-- /.box-body 
                <div class="box-footer">
			   		
			  <div class="form-group col-sm-12">
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Save</button></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Reset</button></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Cancel</button></div>
				
                </div>
			    <div class="form-group col-sm-12">
<div class="col-sm-4"></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Approve</button></div>
<div class="col-sm-4"></div>
				
                </div>
              </div>-->
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
	
      </div>
	  
	  
	  
	  
	  
	  
	  
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<form method="POST" action="<?php echo site_url('purchase/PR/add_item');?>" id="delpur">

	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="item_id_list" id="can_id"> 
		</form>
       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/checkboxes.js"></script>
     <script type="text/javascript">

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
	   "scrollX": true,
	  "bStateSave": true,
	  	  "ordering": false,

   });
   
   
   
    // Handle form submission event
    $('#delete_can').on('click', function(e){
      var form = this;
      
      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'text')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      $('#can_id').val(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
    swal({
        title: "Are you sure?",
        text: "Delete Customer Purchase Information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#delpur" ).submit();
    });
    
   });  
   
   
      // Handle form submission event
    $('#submit_main').on('click', function(e){
     
     
    swal({
        title: "Are you sure?",
        text: "Submit PR into Draft Mode!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#main_form" ).submit();
    });
    
   });  
   
     $('#item_btn').on('click', function(e){

     
    swal({
        title: "Are you sure?",
        text: "Add Items!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#item_form" ).submit();
    });
    
   });  
   
   
   
   
   
   
   
   

});
</script>
 

   <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example6').DataTable({
	   
	 
      'select': {
         'style': 'multi'
      },
	   "scrollX": true,
	  "bStateSave": true,
	  	  "ordering": false,
		  "paging": false,
  //"scrollY":        '50vh',
     //   "scrollCollapse": true
   });
   
   
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	
	
    // Handle form submission event
    $('#delete_can').on('click', function(e){
      var form = this;
      
      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'text')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      $('#can_id').val(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
	    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Delete Customer Purchase Information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#delpur" ).submit();
    });
    
   });  
   
   
   
   
   
   
   
   

});
</script>
 
  <script type='text/javascript'>
$('#btn-submit').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Submit PR",
        text: "You will not be able to Edit this PR!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your PR Recorded Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}
	
});
</script>


<div class="modal fade displaycontent" id="myModal">

<div class="modal-dialog" role="document" style="width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add New Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
            <br>
			
						  <form method="post" id="" action="<?php echo site_url('purchase/QCS/add_item') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  "><!-- temp_qcs_id = cobination of pr+emp_code -->
   <input type="text" name="temp_qcs_id" placeholder="" value="<?php echo $pr_id.$emp_code; ?>" readonly class="form-control"  required></td>

				  <div class="form-group col-md-3">
                    <label >Item Code</label>
					<select class="form-control" name="item_code" >
					<option value="">Select Item From PR items</option>
					  <?php $item= $this->method_call->list_items($pr_id);
 if($item!=null){
			  
foreach ($item->result() as $row8)  
         {  ?>
		 <option value="<?php echo $row3->item_id; ?>"><?php echo $row3->item_code; ?></option>
			
           
	 
		 <?php  }
 } ?>
      
					</select>
	 	</div>
		
		
				  <div class="form-group col-md-9" style="float: right;">
                    <label >Item Description</label>
 <input class="form-control" type="text" name="item_description" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="number" name="qty" id="qty" required value=""  data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  <div class="form-group col-md-4">
                    <label >UOM</label>
					<select name="uom" class="select2 form-control" style="position: unset!important;     width: 100%;" required>
					<option value="Each">	Each	</option>
					
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

	 <div class="form-group col-md-4" style="float: right;">
                    <label >HSN Code</label>
 <input class="form-control" type="text" name="hsn_code" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>		
			
		
<div class="form-group col-md-2">
                    <label >Name</label>
</div>			
<div class="form-group col-md-3">
                    <label >Quot Rates<span class="fa fa-inr"></span></label>
</div>
<div class="form-group col-md-3">
                    <label >Final Rates<span class="fa fa-inr"></span></label>
 	 	</div>
 
<div class="form-group col-md-3">
                    <label >Amount<span class="fa fa-inr"></span></label>
 	 	</div>


 
 <!-- supplier1 -->
 <div class="form-group col-md-2">
                    <label >Supplier 1</label>
</div>	
		
 <div class="form-group col-md-3">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate1" value=""  />	
 </div>
 
 <div class="form-group col-md-3">
                 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate1" value=""  />		
				 </div>
				 
				 <div class="form-group col-md-3">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount1" value="" />	
 </div>
 
 <!--	<div class="form-group col-md-12">
                    <center><b><h4 >Supplier 2 </h4></b></center>
  	</div>-->
			
	<div class="form-group col-md-2">
                    <label >Supplier 2</label>
	 	</div>			
<div class="form-group col-md-3">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate2" value=""  />		 	</div>
 
<div class="form-group col-md-3">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate2" value="" />		 	</div>
 
<div class="form-group col-md-3">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount2" value=""     />		 	</div>


 
 
 <!-- Supplier 3-->
 
 	<div class="form-group col-md-2">
 <label >Supplier 3</label>
  	</div>
			
			
<div class="form-group col-md-3">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate3" value=""  />	
 </div>
 
<div class="form-group col-md-3">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate3" value=""     />
 </div>
 
<div class="form-group col-md-3">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount3" value=""     />
 </div>


 
 
 
 
 
 
  <button type="submit"  class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Add Item</button>

		</div>
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  </div>


	

  </body>
</html>