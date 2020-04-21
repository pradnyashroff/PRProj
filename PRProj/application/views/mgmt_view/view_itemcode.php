 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View ItemCode</title>
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
     View ItemCode
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
         <li> <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>">ItemCode</a></li>

<li class="active">View ItemCode
</li>
</li>
      </ol>

    </section>

   <!-- Main content -->
  	<section class="content" id="content">
	  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">


 
      <div class="box-body">
        	  <?php $itencode_detail = $this->method_call->itemcode_file($iten_gen_id);
 if($itencode_detail!=null){
	 foreach ($itencode_detail->result() as $rowitem)  
         {  ?>
		 

        
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">ItemCode No </label>
				<div class="input-group  col-sm-6" name="itemcodeno">
                      <?php echo $rowitem->iten_gen_id; ?>
					  
					   <input type="hidden" name="itemcodeno" class=" form-control"   readonly value="<?php echo $rowitem->iten_gen_id; ?>" required>  
    
                </div>
                </div>

		 
		  <div class="col-sm-4">
			 
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR No</label>
				<div class="input-group  col-sm-6">
				
				<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editModal"href="#editModal<?php echo $rowitem->pr_id?>">&nbsp;<?php echo $rowitem->pr_id; ?></span>
				</p>
				
                  <input type="hidden" name="itemcode_pr_no" class=" form-control" href="#editModal<?php echo $rowitem->pr_id?>"  data-toggle="modal" data-target="#editModal" readonly value="<?php echo $rowitem->pr_id; ?>"  required>                          
    
         
         
                </div>
                </div> 

				
		
			 	<div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">QCS No</label>
				<div class="input-group  col-sm-6">
		
				<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#qcsModal"href="#qcsModal<?php echo $rowitem->qcs_id?>">&nbsp;<?php echo $rowitem->qcs_id; ?></span>
				</p>
				
			
                  <input type="hidden" name="itemcode_qcs_no" class=" form-control" href="#qcsModal<?php echo $rowitem->qcs_id?>" data-toggle="modal" data-target="#qcsModal"  readonly value="<?php echo $rowitem->qcs_id; ?>" required>                          
    
         
         
                </div>
                </div>  
				
				 	<div class="col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Itemdate</label>
				<div class="input-group  col-sm-6">
				
				
				
				
                  <input type="text" name="itemdate" class=" form-control"readonly value="<?php echo $rowitem->item_gen_date; ?>" required>                          
    
          
         
                </div>
                </div> 
				
				
				
				<!-- end -->
				
				

				<!-- ItemCode start -->
			</br>	</br></br><br>
			
				<!-- ItemCode detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . ItemCode Detail</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
			  
				    <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
					
				
			
                <tr>
				
                 <th >Sr. No.</th>
				<th > ItemCode ID</th>  
				<th style ="text-align:center;"width="130"> QCS ID</th>  
				<th style ="text-align:center;"width="130"> ItemCode </th>  
				<th style ="text-align:center;"width="140"> HSN Code  </th>  
				<th style ="text-align:center;"width="180"> Item Description</th>
				<th style ="text-align:center;"width="150"> Item Date</th>
			
                </tr>  
			
				
                </thead>
		
                <tbody>
				
	 				  <?php $item= $this->method_call->qcs_itemcode_itemid($iten_gen_id);
 if($item!=null){
	 	   
	 $sr_no=1;		 
foreach ($item->result() as $row5)  
         {  ?>
			<tr>
				
				  <td  ><?php echo $sr_no; ?> </td>
				<td style ="text-align:center;" name="qcs_item_id"><?php echo $row5->qcs_item_id; ?></td>
				 <td style ="text-align:center;"  ><?php echo $row5->qcs_id; ?></td>
				 <td style ="text-align:center;"  ><?php echo $row5->q_item_code; ?> </td>
				<td>   <?php echo $row5->q_hsn_code; ?></td>
				 
				<td><?php echo $row5->q_item_description; ?></td>
				<td style ="text-align:center;"><?php echo $row5->qcs_item_date; ?></td>
			</tr>
	 

	 
				 
		 <?php $sr_no++; }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>	  		  
				

			</div>
			</div>
            </div>
			
			<br><br><br>
			
		 	 				
		
 <input type="hidden" name="up_itemcodeno" class=" form-control"   readonly value="<?php echo $rowitem->iten_gen_id; ?>" required>  
	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="item_id_list" id="can_id"> 
		
 
		 
			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">File Attachments </label>
				<div class="input-group  col-sm-6">
                 
                <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/itemcode_attachment/". $rowitem->itemcode_attachment ?>"> <?php echo $rowitem->itemcode_attachment ?></a> </b>
    
                </div>
				
                </div>
				
					<div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Taxation Department Comment</label>
				<div class="input-group  col-sm-7">
				
				  <?php $approval1_name= $this->method_call->fetch_emp_name($rowitem->item_gen_approval1); ?>

                                   <?php if($rowitem->item_gen_app1_cmt == null){
					 echo "Approval Pending From Taxation Department  ($approval1_name)";
					 
				 }else{
				 echo $rowitem->item_gen_app1_cmt; echo ' ('.$approval1_name.')'; } ?>

				
                </div>
                </div> 
				
						<div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">SAP Department Comment</label>
				<div class="input-group  col-sm-7">
				
				  <?php $approval2_name= $this->method_call->fetch_emp_name($rowitem->item_gen_approval2); ?>

                                   <?php if($rowitem->item_gen_app2_cmt == null){
					 echo "Approval Pending From SAP Department  ($approval2_name)";
					 
				 }else{
				 echo $rowitem->item_gen_app2_cmt; echo ' ('.$approval2_name.')'; } ?>

				
                </div>
                </div> 
				
				<div class="form-group col-sm-12">
					<label class="col-sm-1 pull-left control-label">8</label>
					  <label class="col-sm-4 pull-left control-label">ItemCode List</label>
					  </div>
                <div  align="center">

			<?php echo $rowitem->item_code_list; ?>
                </div>

				
				</br>
	
		



<!--end -->
				
	<!-- body close -->

<!-- footer start -->	
<div class="box-footer">

						
				
						
					  <div class="form-group col-sm-12">
			  <div class="col-sm-2">
				</div>
 				
				
				<div class="col-sm-3 ">
				</div>
				
                </div>
					
	</div>	

</form>

	
  	<!--  PR view modal -->

<div class="modal fade displaycontent" id="editModal">

<div class="modal-dialog" role="document" style="width:980px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">View PR</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			
  <form method="post" id="" action="" >
            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control"  readonly value="  <?php echo $rowitem->pr_id; ?>"  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control"  readonly value="<?php echo $rowitem->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control"  readonly value="<?php echo $rowitem->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($rowitem->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($rowitem->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php echo $rowitem->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>		
			    <div class="form-group col-sm-12">
			        <table id="exam" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
                <tr>
                  
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
				   <th style="display:none;">ION No.</th>
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details/Mfg Name</th>
                  
                </tr>
				
                </thead>
		
                <tbody>
				
	 

				
				  <?php $item= $this->method_call->list_pr_items($iten_gen_id);
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
            <td style="display:none;"> <?php echo $row3->ion_no; ?></td>  
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $rowitem->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $rowitem->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $rowitem->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->budget_consider;  ?>

         
                </div>
                </div>
				
				    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6">
                <?php echo $rowitem->cust_cost;  ?>
         
                </div><br>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label" id="lab">Depending Field</label>
				<div class="input-group  col-sm-6">
                 
                            <?php echo $rowitem->cust_cost_val;  ?>
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                   <?php echo $rowitem->procurement_res;  ?>

         
                </div>
                </div>
		
			
 
		
	</div>
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end -->	
  
  
  
  <!-- QCS view Modal-->
  <div class="modal fade displaycontent" id="qcsModal">

<div class="modal-dialog" role="document" style="width:1180px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">View QCS</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			
  <form method="post" id="" action="" >
            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">QCS No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="qcs_no" class="form-control"  readonly value="  <?php echo $rowitem->qcs_id; ?>"  required>     
					  
	   </div>
				</div>
				
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">2</label>
                  <label class="col-sm-5 pull-left control-label">QCS Date </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="qcs_no" class="form-control"  readonly value="  <?php echo $rowitem->qcs_date; ?>"  required>     
					  
	   </div>
				</div>
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">3</label>
                  <label class="col-sm-5 pull-left control-label">Plant </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="qcs_no" class="form-control"  readonly value="  <?php echo $rowitem->plant_code; ?>"  required>     
					  
	   </div>
				</div>
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">4</label>
                  <label class="col-sm-5 pull-left control-label">QCS Owner </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="qcs_owner_nm" class="form-control"  readonly value="  <?php echo $rowitem->qcs_owner; ?>"  required>     
					  
	   </div>
				</div>
				
					  <div class="form-group col-md-12">
				<label class="col-sm-1 pull-left control-label">5</label>
                  <label class="col-sm-5 pull-left control-label">Requirement Details </label>
	
				</div>
				
				 <div class="form-group col-sm-12">
				  <table id="exampletest" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
		<tr>
					<th >Sr. No.</th>
				   <th >Item Code</th>
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $rowitem-> sup1_nm; ?>  <center></th>
			
		</tr>
			
                <tr >
                				 <th colspan="6" style="text-align:right;"></th>

			<th>  Quoted Rate </th>  
			<th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			
			 			
				  
                </tr>  
		
				
                </thead>
		
                <tbody>
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->qcs_items_list($iten_gen_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
					$total_quoted_amount2 = 0;
					$total_final_ammount2=0;
					$total_quoted_amount3 =0;
					$total_final_ammount3=0;					

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowqcsitem)  
         {  ?>
		 <!-- item code -->
	
		  
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			 <td  ><?php echo $rowqcsitem->q_item_code; ?></td> 
				 	
					
				<td> <?php echo $rowqcsitem->q_hsn_code; ?></td>  				 
            <td>  <?php echo $rowqcsitem->q_item_description; ?></td>  
            <td> <?php echo $rowqcsitem->q_req_quantity; ?></td>  
            <td> <?php echo $rowqcsitem->q_uom; ?></td>  
            <td>  <?php echo $rowqcsitem->quot_rate1; ?></td>  
            <td> <?php echo $rowqcsitem->quoted_amt1; ?></td>  
            <td>  <?php echo $rowqcsitem->final_rate1; ?> </td>  
            <td> <?php echo $rowqcsitem->final_amt1; ?> </td>  
			
			
		
		
		
		
                <?php

				$quoted_ammount1=$rowqcsitem->quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowqcsitem->final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowqcsitem->quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowqcsitem->final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowqcsitem->quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowqcsitem->final_amt3;
					$total_final_ammount3 = $total_final_ammount3+$final_ammount3;
					
				?>
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
				
				  <tfoot>
        <tr>
            <td style="text-align:right;" colspan="7"><b>Grand Total:</b></td>
			<td class="right"><B><?php echo $final_rate; ?></b></td>
			<td class="right" colspan="1"></td>
			<td class="right "><B><?php echo $total_final_ammount1; ?></b></td>
			
		
			
        </tr>
    </tfoot>
	
		 </tbody>
		 </table>
				</div>
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">6</label>
                  <label class="col-sm-5 pull-left control-label">Selected Supplier </label>
	<div class="input-group  col-sm-6">
	
			<?php echo $rowitem->selected_supplier; ?>			  
	   </div>
				</div>
				
				 <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">7</label>
                  <label class="col-sm-5 pull-left control-label">Justification for Selection of Supplier </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->justification_supplier; ?>			  
	   </div>
				</div>
		
			</div>
		</form>
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  <!--end -->
  
  
  <?php 
 } }
 ?>
			             <!-- /.box-body -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		

   </div>
  
  </div>			
			
   
   </section>
   
   
   
 
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
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
        text: "Update HSN Code!",
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
 




  </body>
</html>