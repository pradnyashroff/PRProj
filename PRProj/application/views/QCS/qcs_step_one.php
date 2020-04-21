 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create QCS Step-1</title>
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
	box-shadow: 5px 5px 5px 5px rgba(46,61,73,0.15);
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
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
       Create QCS (Step -1 : Supplier Details)
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/QCS/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">QCS</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create QCS Step -1
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
		  

          <div class="box">
 
            <!-- /.box-header -->
            <!-- form start -->
		
<!--<?php echo form_open_multipart('purchase/QCS/qcs_step_two/'.$row->pr_id); ?> -->
<form method="post" id="main_form" action="<?php echo site_url('purchase/QCS/insert_qcs/'.$row->pr_id); ?>" enctype='multipart/form-data'>
              <div class="box-body">
			  
			  <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6" >
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
			
				  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" value="auto-genrated" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="hidden" style="background-color:#E6F2FF;" readonly name="pr_id" value="<?php echo $pr_id; ?>" class="form-control"  required>
                                      <p style="color:red;font-size:15px;">  
	<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#pr_view_Modal"href="#pr_view_Modal<?php echo $row->pr_id?>">&nbsp;<?php echo $row->pr_id; ?></span>
				</p>
    
                </div>
                </div>
			
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" style="background-color:#E6F2FF;" readonly name="qcs_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->dept_id; ?>" style="background-color:#E6F2FF;" readonly   name="dept_id" class="form-control"  required>
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
  <input type="text" value="<?php print_r($dept_nm['dept_name']); ?>" style="background-color:#E6F2FF;" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
			  
			 
			 
			 
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
				
                             <select class="form-control" style="background-color:#E6F2FF;" readonly required name="pr_type">
				
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
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
                 
                   <input type="hidden" value="<?php echo $row->pr_source_id; ?>" readonly  style="background-color:#E6F2FF;"  name="owner_id" class="form-control"  required>
				 <?php $owner_nm= $this->method_call->fetch_emp_name($row->pr_source_id); ?>
				 <input type="Text" name="qcs_owner" class=" form-control" id="qcs_owner"  style="background-color:#E6F2FF;" readonly value="<?php echo $owner_nm; ?>"" placeholder="PR Type" required>                          
    
         
                </div>
                </div>
			
		<div class="input-group  col-sm-6">
		  <input type="hidden" value="<?php echo $row->pr_source_id; ?>" style="background-color:#E6F2FF;" readonly   name="qcs_owner_id" class="form-control"  required>
		  </div>
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
                 
                 
				
				 <input type="Text" name="pr_plant" class=" form-control" id="pr_plant" style="background-color:#E6F2FF;" readonly value=" <?php echo $row->plant_code; ?>" placeholder="PR Type" required>                          
    
         
                </div>
                </div> 
				
					 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Pr Owner emp</label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="pr_owner_empcode" value="<?php echo $row->pr_owner; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>                          
    
         
                </div>
                </div>
				
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-6 pull-left control-label">8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Supplier Details in the following Table: </label>
			  </div>
			  
			  		    <div class="form-group col-sm-12">
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
          		
                <tbody>
				
				 
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" style="text-align:right;">Detail</td>
								 <td style="display:none"> </td>
				<td colspan="3" ><center>  Name <center> </td>
				 <td colspan="3" ><center>Contact Number  <center> </td>
				
				 <td colspan="3" > <center>Contact Person   <center> </td>
				
				  <td colspan="3" > <center> Contact Mail ID<center>    </td>
				 
				
                
      </tr>

	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td  colspan="2"  >Final Supplier</td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="3"  >  <input type="text"  name="sup1_nm" class="form-control full_width"   required> </td>
				 <td colspan="3"  >  <input type="text" pattern="[0-9]{10}" placeholder="Enter 10 Digit Number" name="sup1_mno" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup1_contactp" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="sup1_eid" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 


	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td  colspan="2">Supplier-2</td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="3"  >  <input type="text"  name="sup2_nm" value="" class="form-control full_width"   required> </td>
				 <td colspan="3"  >  <input type="text"  placeholder="Enter 10 Digit Number"   name="sup2_mno" value="" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup2_contactp" value="" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="email"   name="sup2_eid" value="" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td  colspan="2" >Supplier-3</td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="3"  >  <input type="text"  name="sup3_nm" class="form-control full_width"   required> </td>
				 <td colspan="3"  >  <input type="text"  placeholder="Enter 10 Digit Number"   name="sup3_mno" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup3_contactp" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="email"  name="sup3_eid" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
      </tr> 

				</tbody>
               		
              </table>
			
			  </div>
			  
			  	 				  <?php $item= $this->method_call->qcs_last_inserid();
 if($item!=null){
	 	//$sr_no=$qcs_id+1;   
	  
foreach ($item->result() as $row9)  
         {  ?>
	
	   <input type="hidden" readonly name="last_inserqcs_id" value="<?php echo $row9->qcs_id+1; ?>" class="form-control"  required>
	   
		 <?php  }
 } ?>
			  
			
			   <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" id="" name="step2_pending" value="Incomplete_Qcs"class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Procced</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
           
					 <?php }
 } ?>
	
	
	 <!-- pr view modal -->
  
  <div class="modal fade displaycontent" id="pr_view_Modal">

<div class="modal-dialog" role="document" style="width:980px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View PR</h4>
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
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->pr_id; ?>" required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->plant_code; ?>" required>  
						
                </div>
                </div>
				
				
				
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($row->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		<div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;"  readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php echo $row->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-7">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-6 pull-right">

                </div>
			  </div>	


	    <div class="form-group col-sm-12">
			        <table id="exam" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                
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
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
			<div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-5 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
                   <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
		
			
 
		
	</div>
				
				
				
				</div>
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
 
  <!-- end --->		  
              <!-- /.box-body -->
          
              <!-- /.box-footer -->
			    </form>
          </div>

        </div>
        <!--/.col (right) -->

      </div>
      <!-- /.row -->
	  
	
	  
	  
	  
	  
      <!-- /.row -->
   
    <!-- /.content -->
   <!-- /.content -->
  </div>
   </section>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
   <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example6').DataTable({
	   
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
        title: "Submit QCS Step-1",
        text: "You will not be able to Edit this QCS!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your QCS Step -1 Recorded Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}
	
});
</script>




  </body>
</html>