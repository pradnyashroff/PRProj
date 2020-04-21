 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Draft PR</title>
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
      Draft PR
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

<li class="active" style="color:#FFFFFF;">Draft PR
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
		  
		  			  <form method="post" id="main_form" action="<?php echo site_url('purchase/PR_draft/draft_update_pr') ?>" enctype='multipart/form-data' >

          <div class="box box-info">
 
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR NUMBER </label>
				<div class="input-group  col-sm-6">
                 
               
             <input type="text" value="<?php echo $row->pr_id; ?>" style="background-color:#E6F2FF" readonly name="draft_pr_id" class="form-control"  required>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE"> PLANT </label>
				<div class="input-group  col-sm-6">
                   <!--<input type="text" value="<?php echo $row->plant_code; ?>" style="background-color:#E6F2FF" name="plant_code" readonly class="form-control"  required>-->
           <?php if ($emp_dept == 12 || $emp_dept == 13||$emp_dept == 100||$emp_dept == 101 || $emp_code==100321) { ?>
							 <select class="form-control" required name="plant_code">
								<option value="<?php echo $row->plant_code; ?>" ><?php echo $row->plant_code; ?></option>
								<?php $plantlist= $this->method_call->plants();
										if($plantlist!=null){
											foreach ($plantlist->result() as $row1)  
												{  ?>
												<option value="<?php echo $row1->plant_code; ?>"><?php echo $row1->plant_code;  ?></option>
								<?php 			}
										}
								?>
							</select>
					 <?php } else { ?>
                                               <input type="text" style="background-color:#E6F2FF"  value="<?php echo $plant_code; ?>" name="plant_code" readonly class="form-control"  required>

				  <?php } ?>
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE">PR DATE</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" value="<?php echo $row->pr_date; ?>" style="background-color:#E6F2FF" name="pr_date" readonly  style=" line-height: 10px;padding: 0px 8px;   float: none;">

               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR TYPE</label>
				<div class="input-group  col-sm-6">
				
				
				
                             <select class="form-control" required name="pr_type" onchange="prtype(this.value)">
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
				<option value="<?php echo $row->pr_type; ?>" ><?php print_r($pr_type_nm['pt_name']); ?></option>
							
							  <?php $list= $this->method_call->pr_type();
 if($list!=null){
	 foreach ($list->result() as $row1)  
         {  ?>
			
			<option value="<?php echo $row1->pt_id; ?>"><?php echo $row1->pt_name;  ?></option>
			
	<?php }
				}
				?>
							 </select>
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR OWNER</label>
				<div class="input-group  col-sm-6">
                 
         <input type="text" name="pr_owner_name" value="<?php echo $row->pr_owner_name; ?>" style="background-color:#E6F2FF" readonly  class="form-control"  required>
         <input type="hidden" name="pr_owner" value="<?php echo $row->pr_owner; ?>" style="background-color:#E6F2FF" readonly  class="form-control"  required>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">DEPARTMENT</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->dept_id; ?>" style="background-color:#E6F2FF" readonly   name="dept_id" class="form-control"  required>
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
  <input type="text" value="<?php print_r($dept_nm['dept_name']); ?>" style="background-color:#E6F2FF" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				
				
				<!-- email ph -->
						 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">EMAIL PH</label>
				<div class="input-group  col-sm-6">
                  <input type="text" value="<?php echo $row->ph_id; ?>" readonly   name="ph_id" class="form-control"  required>
  <?php $dh_eid= $this->method_call->fetchemp_email($row->ph_id); ?>
  <input type="text" name="ph_eid" value="<?php print_r($dh_eid['emp_email']); ?>" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				<!-- email DH-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">EMAIL DH</label>
				<div class="input-group  col-sm-6">
                  <input type="text" value="<?php echo $row->dh_id; ?>" readonly   name="dh_id" class="form-control"  required>
  <?php $dh_eid= $this->method_call->fetchemp_email($row->dh_id); ?>
  <input type="text" name="dh_eid" value="<?php print_r($dh_eid['emp_email']); ?>" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				
					<!-- email owner-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">EMAIL OWNER</label>
				<div class="input-group  col-sm-6">
                  <input type="text" value="<?php echo $row->pr_owner; ?>" readonly   name="owner_id" class="form-control"  required>
  <?php $owner_eid= $this->method_call->fetchemp_email($row->pr_owner); ?>
  <input type="text" name="owner_eid" value="<?php print_r($owner_eid['emp_email']); ?>" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
				
			   <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-6 pull-left control-label" style="color:#3482AE">REQUIREMENT DETAILS :</label>
				
                </div>
			  
			    <div class="form-group col-sm-12">
			              <table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                  <th ></th>
                  
                  <th >SR.NO.</th>
				   <th>ITEM CODE</th>
				   <th>ITEM DESCRIPTIONS</th>
				   <th>REQ QTY.</th>
				   <th>UOM</th>
				   <th>APPROX. RATE</th>
				   <th>APPROX. TOT. AMT.</th>
				   <th style="display:none;">ION NO.</th>
				   <th>EXPECTED DELIVERY PERIOD</th>
				   <th>PROJECT DETAILS</th>
				   <th>TECHNICAL DETAILS/Mfg Name</th>
				   <th>Customer Code</th>
				   <th >Sales Material</th>
				   <th >Ecn/New</th>
				   <th >Ecn/New Code</th>
                   <th>EDIT ITEM</th>
				   
                  
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
				 <td  style="text-align: center;"><?php echo $row3->item_id; ?></td>
				 <td  style="text-align: center;"><?php echo $sr_no; ?> </td>
				 <td  style="text-align: center;"><?php echo $row3->item_code; ?></td>  
            <td style="text-align: left;">  <?php echo $row3->item_description; ?></td>  
            <td style="text-align: left;"> <?php echo $row3->req_qty; ?></td>  
            <td style="text-align: left;"> <?php echo $row3->uom; ?></td>  
            <td style="text-align: left;"> <?php echo $row3->approx_rate; ?></td>  
            <td style="text-align: left;">  <?php echo $row3->approx_total_amt; ?></td>  
            <td style="display:none;"> <?php echo $row3->ion_no; ?></td>  
            <td style="text-align: left;">  <?php echo $row3->expected_delivery; ?> </td>  
            <td style="text-align: left;"> <?php echo $row3->project_detail; ?> </td>  
            <td style="text-align: left;"> <?php echo $row3->technical_detail; ?> </td> 
			 <td style="text-align: left;"> <?php echo $row3->cust_code; ?> </td> 
			 <td style="text-align: left;"> <?php echo $row3->sales_material; ?> </td> 
             
            <td style="text-align: left;"> <?php echo $row3->ecn_new; ?> </td> 
			 <td style="text-align: left;"> <?php echo $row3->ecn_newcode; ?> </td>
             <td><a href="#"class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#editModal"  style="width:30px;height:20px;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="edit_item(<?php echo $row3->item_id; ?>)" ><span class=""></span></a></td>
            
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
                          <label class="col-sm-3.5 pull-right  control-label" style="font-size:14px;color:#3482AE">CUMULATIVE TOTAL AMOUNT OF PR <?php echo $row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
					
                           <div class="input-group  col-sm-5 pull-right">

                </div>
                           
			  </div>	  
			  
			  <input type="hidden" name="final_rate" value="<?php echo $final_rate;?>" readonly  class="form-control"  required>
  
			  
                                        <div class="form-group col-sm-12">
                                             <center>
			
			  
				
			 
		<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn " style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Add New Item</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button type="button" id="delete_can" class="btn" style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Delete Item</button>
		
			 
			
			  
			  
			 
			  </center>
                                        </div>
				
			  
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">DELIVERY LOCATION</label>
				<div class="input-group  col-sm-6">
				
				
                 <?php if ($emp_dept == 12 || $emp_dept == 13||$emp_dept == 100||$emp_dept == 101 || $emp_code==100321) { ?>
				 
				 <select class="form-control" required name="delivary_loc">
							 <option value="<?php echo $row->delivary_loc; ?>" ><?php echo $row->delivary_loc; ?></option>
							
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
	 foreach ($plantlist->result() as $row2)  
         {  ?>
			
			<option value="<?php echo $row2->plant_code; ?>"><?php echo $row2->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				  <?php } else { ?>
                                                <input type="text" name="delivary_loc" value="<?php echo $row->delivary_loc; ?>" readonly class="form-control"  required>

				  <?php } ?>
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">INSPECTION REQUIRED AT SUPPLIER END</label>
				<div class="input-group  col-sm-6">
                                                <select class="form-control" name="inspection_req" required >  
				 <option value="<?php echo $row->inspection_req;  ?>" > <?php echo $row->inspection_req;  ?></option>
				 <option value="Yes"  style="color:#3482AE">YES</option>
				 <option value="No"  style="color:#3482AE">NO</option>
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">10</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CONSIDERED IN BUDGET</label>
				<div class="input-group  col-sm-6">
                 <select class="form-control" name="budget_consider" required >  
				 <option value="<?php echo $row->budget_consider;  ?>" ><?php echo $row->budget_consider;  ?></option>
				 <option value="Yes" style="color:#3482AE">YES</option>
				 <option value="No" style="color:#3482AE">NO</option>
				 </select>              

         
                </div>
                </div>
				<!--
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6">
                <select class="form-control" id="cust_cost" name="cust_cost" required >  
				 <option value="<?php echo $row->cust_cost;  ?>" ><?php echo $row->cust_cost;  ?></option>
				 <option value="Up Front" >Up Front</option>
				 <option value="Amortization" >Amortization</option>
				 <option value="REPL Own Investment" >REPL Own Investment</option>
				 </select>      
         
                </div><br>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label" id="lab">Depending Field</label>
				<div class="input-group  col-sm-6">
                 
                                 <input type="text" name="cust_cost_val" value="<?php echo $row->cust_cost_val;  ?>" class="form-control"  required>

         
                </div>
                </div>
                minlength="6" maxlength = "6"
				-->
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">11</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">ION NO /FUND NO</label>
				<div class="input-group  col-sm-6">
                        <input type="text" name="ion_no"  value="<?php echo $row->ion_no;  ?>" class="form-control"  required>
                      
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">12</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CUSTOMER COST-UPFRONT (IN RS.)</label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"  value ="<?php echo $row->cust_cost_upfront; ?>"  name="cust_cost_upfront" class="form-control"  required>
    
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">13</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">CUSTOMER COST AMORTIZATION(IN MONTHS) </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"  value ="<?php echo $row->cust_cost_amortization; ?>"   name="cust_cost_amortization" class="form-control"  required>
    
                </div>
                </div>
                               
				
				
				   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">14</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">OWN INVESTMENT (RECOVERY PERIOD IN MONTHS)</label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"  value ="<?php echo $row->own_investment; ?>"   name="own_investment" class="form-control"  required>
    
                </div>
                </div>

				
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label"  style="color:#3482AE">15</label>
			   <label class="col-sm-5 pull-left control-label"  style="color:#3482AE">REASON OF PROCUREMENT</label>
				<div class="input-group  col-sm-6">
                 
                         <input type="text" name="procurement_res" value="<?php echo $row->procurement_res;  ?>" class="form-control"  required>

         
                </div>
                </div>
                                  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label"  style="color:#3482AE"></label>
			   <label class="col-sm-5 pull-left control-label"  style="color:#3482AE"></label>
				<div class="input-group  col-sm-6">
             
         
                </div>
                </div>
                                
				
			  
			 
				
				
				<!--pradnya-->
				
			
                                <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label"  style="color:#3482AE">&nbsp;</label>
			   <label class="col-sm-5 pull-left control-label"  style="color:#3482AE">&nbsp;</label>
				<div class="input-group  col-sm-6">
                 &nbsp;

         
                </div>
                </div>
				
				
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1666</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">ATTACHMENT</label>
				
                </div>
				  <div class="form-group col-sm-12" style="color:#3482AE">
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]" class="btn" style="border-style:solid ; border-color:#3482AE;">REFERENCE QUOTE</button></div>
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]" class="btn" style="border-style:solid ; border-color:#3482AE;">DRAWING</button></div>
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]" class="btn" style="border-style:solid ; border-color:#3482AE;">IMAGES</button></div>
				
                </div>
		
			  
			   <div class="form-group col-sm-12">
			    <div class="col-sm-5 pull-right">
				
				
<?php $filea= $this->method_call->filefetch($pr_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
 <a style="color: #337ab7;" href="<?php echo base_url()."uploads/PR/". $pr_id ."/".$rowfile->file_name;?>"><?php echo $rowfile->file_name; ?></a><br><br>
		 <?php }
 } ?>
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
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">20</label>
			   <div class="input-group  col-sm-5 pull-left" style="color:#3482AE"><input type="radio" name="pr_state" value="draft" required style="color:#3482AE" > SAVE AS DRAFT</input></div>
				<div class="input-group  col-sm-5 pull-right" style="color:#3482AE">
                 
                                    <input type="radio" name="pr_state" value="submited_dh" style="color:#3482AE"> SUBMIT FOR APPROVAL</input>

         
                </div>
                </div>
			  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			
		 
			   		
		<?php $ph_id= $this->method_call->fetch_ph_id($row->plant_code); ?>
		<input type="hidden" name="pr_ph_id" value="<?php print_r($ph_id['ph_id']);?>" class="form-control"  required>
		<input type="hidden" name="pr_dh_id" value="<?php echo $row->dh_id;  ?>" class="form-control"  required>
		
<!--					
<?php 
if($row->plant_code == '10040'){
	?>
	<input type="text" name="pr_source_id" value="<?php echo 100305  ?>" class="form-control"  required>
	
		<?php 
}


			else{
				?>
				
						 <?php if($row->pr_type=='13'){
				 $source_id= $this->method_call->fetch_source_id($row->plant_code); ?>

				
<input type="text" name="pr_source_id" value="<?php echo $source_id['plant_source_id'][0]->plant_source_id;  ?>" class="form-control"  required>

		 <?php }else{ ?>
		<?php $source_id= $this->method_call->fetch_cap_source_id($row->pr_type); ?>

			 <input type="hidden" name="pr_source_id" value="<?php  print_r($source_id['cap_source_id']); ?>" class="form-control"  required>

	<?php	 }
		 
		 ?>
			

<?php			
			}
?>	
		
		
-->


		 <?php if($row->pr_type=='13'){
				 $source_id= $this->method_call->fetch_source_id($row->plant_code); ?>

				
<input type="hidden" name="pr_source_id" value="<?php echo $source_id['plant_source_id'][0]->plant_source_id;  ?>" class="form-control"  required>

		 <?php }else{ ?>
		<?php $source_id= $this->method_call->fetch_cap_source_id($row->pr_type); ?>

			 <input type="hidden" name="pr_source_id" value="<?php  print_r($source_id['cap_source_id']); ?>" class="form-control"  required>

	<?php	 }
		 
		 ?>

	

	    <div class="form-group col-sm-12">
<div class="col-sm-4"></div>
<div class="col-sm-4"><button type="submit" id="submit_mainold" class="btn" style="width: 35%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);"> PROCEED </button></div>
<div class="col-sm-4"></div>
				
                </div>
					</form>
				
	</div>

		

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
 <form method="POST" action="<?php echo site_url('purchase/PR_draft/add_item_draft');?>" id="delpur">

	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="item_id_list" id="can_id"> 
<input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>"> 
		</form>
  
  
  
  
  
  
  
  
  <!-- edit - item -->

<div class="modal fade displaycontent" id="editModal">

<div class="modal-dialog" role="document" style="width: 720px;">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#3482AE;color: white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit New Item</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
            <br>
			 <form method="post"  action="<?php echo site_url('purchase/PR/update_items') ?>" enctype='multipart/form-data'>

						

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_pr_id" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
<input type="hidden" name="edit_item_id" id="edit_item_id" placeholder="" readonly class="form-control"  required></td>

				  <div class="form-group col-md-3">
                    <label >Item Code</label>
 <input class="form-control" type="text" name="edit_item_code"  id="edit_item_code"  required  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>
				  <div class="form-group col-md-9" style="float: right;">
                    <label >Item Descriptions</label>
 <input class="form-control" type="text" name="edit_item_description" id="edit_item_description" required  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="number" name="edit_quntity" id="edit_quntity" required data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  <div class="form-group col-md-4">
                    <label >UOM</label>
					<select name="edit_uom" id="edit_uom" class="select2 form-control" style="position: unset!important;" required>
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

<div class="form-group col-md-4">
                    <label >Approx rate. <span class="fa fa-inr"></span></label>
 <input class="form-control" type="number"  id="edit_amt" name="edit_amt" required  value="" onkeyup="edit_mul();"  data-validation-required-message="Please enter Valid input."  />		 	</div>

<div class="form-group col-md-6">
                    <label >Approx. Total Amount <span class="fa fa-inr"></span></label>
 <input class="form-control" type="number"    required readonly name="edit_approx_total_amt" id="edit_approx_total_amt"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-4 hidden">
                    <label >ION No.</label>
 <input class="form-control" type="number"  name="edit_ion_no" id="edit_ion_no"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>


<div class="form-group col-md-6">
                    <label >	Expected Delivery Period.</label>
 <input class="form-control" type="text" required name="edit_expected_delivery" id="edit_expected_delivery" data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >	Project Details</label>
 <input class="form-control" type="text" required name="edit_project_detail" id="edit_project_detail"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >Technical Details/Mfg Name</label>
 <input class="form-control" type="text" required name="edit_technical_detail" id="edit_technical_detail"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>
<div class="form-group col-md-6">
                    <label >Customer Code</label>
 <input class="form-control" type="text" required name="edit_Customer_Code" id="edit_Customer_Code" value=""  data-validation-required-message="Please enter Valid Customer Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >Saleable Material</label>
 <input class="form-control" type="text" required name="edit_saleable_material" id="edit_saleable_material" value=""  data-validation-required-message="Please enter Valid Saleable Material."/>		 	</div>
<div class="form-group col-md-6">
                    <label style="color:#3482AE" >ECN/NEW</label>
				<select name="edit_ecn_new" id="edit_ecn_new" class="select2 form-control" onchange="get_data(this.value)" style="position: unset!important; width:100%;" required>
					<option value="ECN">	ECN	</option>
					<option value="New">	New	</option>
					</select>
</div>					
<div class="form-group col-md-6">
		<?php $ecnew=$row3->ecn_new; ?>
		
        <div id="ecn1"><label style="color:#3482AE"><?php echo $ecnew. " Code";?></label></div>
		<div id="newc" style="display:none;"><label style="color:#3482AE" id="newc" for="foo" style="display:none;"><?php echo $ecnew. " Code";?></label></div>
		<input class="form-control" type="text" required name="edit_ecn_newcode" id="edit_ecn_newcode"  value="0"  data-validation-required-message="Please enter Valid ECN/New Code."/>		 	</div>



  <center><button type="submit" name="save" class="btn" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 3px rgba(0,0,0,.35);">Update Details</button></center> 
                               
		</div>
        </section>
	  
	 </div>
	 </form>
    </div>
  </div>
  </div>	
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
 
  <script type='text/javascript'>
$('#cust_cost').change(function(){
  var cust_cost = $('#cust_cost').val();
  if(cust_cost == 'Up Front'){
	  var lab='Customer Cost Rs.';
  }
  else if(cust_cost == 'Amortization') {
	  
	  	  var lab='Recovery Period (In Months)';

  }
  else if(cust_cost == 'REPL Own Investment') {
	  
	  	  var lab='ROI Period (In Months)';

  }
 
  $("#lab").html(lab);
});
</script>
<script>

function mul() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('amt').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('fin').value = result;
      }
}
</script>

<script>

function edit_mul() {
      var txtFirstNumberValue = document.getElementById('edit_quntity').value;
      var txtSecondNumberValue = document.getElementById('edit_amt').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
       var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('edit_approx_total_amt').value = setResult;
      }
}
</script>
<div class="modal fade displaycontent" id="myModal">

<div class="modal-dialog" role="document" style="width: 720px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:white">Add New Item</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
            <br>
			
		  <form method="post" id="item_form" action="<?php echo site_url('purchase/PR_draft/add_item_draft') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="pr_id" placeholder="" value="<?php echo $pr_id; ?>" readonly class="form-control"  required></td>

				  <div class="form-group col-md-3">
                    <label style="color:#3482AE;">Item Code</label>
 <input class="form-control" type="text" name="item_code" value="" required  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>
				  <div class="form-group col-md-9" style="float: right;">
                    <label  style="color:#3482AE;">Item Descriptions</label>
 <input class="form-control" type="text" name="item_description" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label  style="color:#3482AE;">Required Quantity</label>
 <input class="form-control" type="text" name="req_qty" id="qty" required value=""  data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  <div class="form-group col-md-4">
                    <label  style="color:#3482AE;" >UOM</label>
					<select name="uom" class="select2 form-control" style="position: unset!important;" required>
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

<div class="form-group col-md-4">
                    <label  style="color:#3482AE;">Approx rate. <span class="fa fa-inr"></span></label>
 <input class="form-control"   type="text"  id="amt" required name="approx_rate" value="" onkeyup="mul();"  data-validation-required-message="Please enter Valid input."  />		 	</div>


<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">Approx. Total Amount <span class="fa fa-inr"></span></label>
 <input class="form-control" type="text" id="fin" readonly required name="approx_total_amt" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-4 hidden">
                    <label  style="color:#3482AE;">ION No.</label>
 <input class="form-control" type="text"  name="ion_no" id="fin" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>


<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">	Expected Delivery Period.</label>
 <input class="form-control" type="text" required name="expected_delivery" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">	Project Details</label>
 <input class="form-control" type="text" required name="project_detail" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">Technical Details/Mfg Name</label>
 <input class="form-control" type="text" required name="technical_detail" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">Customer Code</label>
 <input class="form-control" type="text" required name="customer_code" id="customer_code"  data-validation-required-message="Please enter Valid Customer Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label  style="color:#3482AE;">Saleable Material</label>
 <input class="form-control" type="text" required name="saleable_material" id="saleable_material"  data-validation-required-message="Please enter Valid Saleable Material."/>		 	</div>
<div class="form-group col-md-6">
                    <label style="color:#3482AE" >ECN/NEW</label>
				<select name="ecn_new" id="ecn_new"  class="select2 form-control" onchange="get_data1(this.value)" style="position: unset!important; width:100%;" required>
					<option value="ECN">	ECN	</option>
					<option value="New">	New	</option>
					</select>
</div>					
<div class="form-group col-md-6">
	
        <div id="ecn1"><label style="color:#3482AE">ECN Code</label></div>
		<div id="newc" style="display:none;"><label style="color:#3482AE" id="newc" for="foo" style="display:none;">New Code</label></div>
		<input class="form-control" type="text" required name="ecn_newcode" id="labelecn_newcode"  value="0"  data-validation-required-message="Please enter Valid ECN/New Code."/>		 	</div>


  <button type="submit"  class="btn" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 3px rgba(0,0,0,.35);">Add Item</button>
  </form>
		</div>
        </section>
	  
	 </div>
    </div>
  </div>
  </div>

 <script>
 function get_data(id)
{
  
	if(id=="ECN"){
	 
        document.getElementById('ecn1').style.display = 'block';
		document.getElementById('newc').style.display = 'none';
    }
	else {
		
        document.getElementById('newc').style.display = 'block';
		document.getElementById('ecn1').style.display = 'none';
            }
}
 function get_data1(id)
{
  
	if(id=="ECN"){
	
        document.getElementById('ecn1').style.display = 'block';
		document.getElementById('newc').style.display = 'none';
    }
	else {
		
        document.getElementById('newc').style.display = 'block';
		document.getElementById('ecn1').style.display = 'none';
            }
}
</script>
	<script>
      function edit_item(id)
{
    //alert(id);
	   $.ajax({
		url : "<?php echo site_url('purchase/PR/ajax_edit')?>/" + id,
		type: "GET",
        dataType: "JSON",
        success: function(data)
        {   $('[name="edit_item_id"]').val(data.item_id);
            $('[name="edit_item_code"]').val(data.item_code);
            $('[name="edit_item_description"]').val(data.item_description);
            $('[name="edit_quntity"]').val(data.req_qty);
            $('[name="edit_uom"]').val(data.uom);
            $('[name="edit_amt"]').val(data.approx_rate);
            $('[name="edit_approx_total_amt"]').val(data.approx_total_amt);
            $('[name="edit_ion_no"]').val(data.ion_no);
            $('[name="edit_expected_delivery"]').val(data.expected_delivery);
            $('[name="edit_project_detail"]').val(data.project_detail);
			$('[name="edit_technical_detail"]').val(data.technical_detail);
			$('[name="edit_Customer_Code"]').val(data.cust_code);
			$('[name="edit_saleable_material"]').val(data.sales_material);
			$('[name="edit_ecn_new"]').val(data.ecn_new);
			$('[name="edit_ecn_newcode"]').val(data.ecn_newcode);
		
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

    


      </script>

 <script>
	 
	  
	  function prtype(ptId)
	  {
		
		
		if(ptId==""){
			
			document.getElementById("item_btnold").disabled = true;
		}else{
			
			document.getElementById("item_btnold").disabled = false;
		}
		
		
		
		  if(ptId=='13'){
			
			 // document.getElementById("priya").style.display = "none";
			
				document.getElementById("ecn_new").disabled = true;
				document.getElementById("customer_code").disabled = true;
				document.getElementById("saleable_material").disabled = true;
				document.getElementById("labelecn_newcode").disabled = true;
				
				
				document.getElementById("edit_Customer_Code").disabled = true;
				document.getElementById("edit_saleable_material").disabled = true;
				document.getElementById("edit_ecn_new").disabled = true;
				document.getElementById("edit_ecn_newcode").disabled = true;
				
			 
			  
		  }
		  
		  else{
			

		  }
 
	  }
	  </script>



  </body>
</html>
</html>