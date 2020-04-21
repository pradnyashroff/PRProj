 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create New PR</title>
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
       Create a PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;">
        <li ><a href="<?php echo site_url('Welcome/index') ?>"  style="color:#FFFFFF;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>"  style="color:#FFFFFF;">Purchase</a></li>

<li class="active"  style="color:#FFFFFF;">Create a PR
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
	
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  
	<form method="post" id="main_form" action="<?php echo site_url('purchase/PR/insert_pr') ?>" enctype='multipart/form-data'>

          <div class="box">
					<div class="box-body"  style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
            <!-- /.box-header -->
            <!-- form start -->
		


            
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR NO. : </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" style="background-color:#E6F2FF" value="automatic" readonly name="" class="form-control"  required>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE"> PLANT :</label>
				<div class="input-group  col-sm-6">
				
				   <?php if ($emp_dept == 12 || $emp_dept == 13||$emp_dept == 100||$emp_dept == 101 ||$emp_code == 100321) { ?>
				 
				 <select class="form-control" required name="plant_code">
							 <option value="" >Choose Location</option>
							
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
	 foreach ($plantlist->result() as $row)  
         {  ?>
			
			<option value="<?php echo $row->plant_code; ?>"><?php echo $row->plant_code;  ?></option>
			
	<?php }
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
			   <label class="col-sm-4 control-label" style="color:#3482AE">PR DATE :</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" style="background-color:#E6F2FF"  class="form-control" name="pr_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>

               
         
                </div>
				
			<!--	<?php
				
				$expire = time() + 30 * 24 * 60 *60;

$date_in_future = date( "Y-m-d", $expire );

echo ($date_in_future);

?>

</br>
<?php
echo date('Y-m-d', strtotime("+40 days"));
?>

</br>

<?php
$today=date('d-m-Y');
$next_date= date('d-m-Y', strtotime($today. ' + 90 days'));
echo $next_date;
?>

-->
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE"> 4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR TYPE :</label>
				<div class="input-group  col-sm-6">
                             <select class="form-control" required name="pr_type" id="pr_type" onchange="prtype(this.value)">
							 <option value="" >Select PR Type</option>
							
							  <?php $list= $this->method_call->pr_type();
 if($list!=null){
	 foreach ($list->result() as $row)  
         {  ?>
			
			<option value="<?php echo $row->pt_id; ?>"><?php echo $row->pt_name;  ?></option>
			
	<?php }
				}
				?>
							 </select>
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR OWNER :</label>
				<div class="input-group  col-sm-6">
                 
         <input type="text" style="background-color:#E6F2FF"  name="pr_owner_name" value="<?php echo $emp_name; ?>" readonly  class="form-control"  required>
         <input type="hidden" name="pr_owner" value="<?php echo $emp_code; ?>" readonly  class="form-control"  required>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">DEPARTMENT:</label>
				<div class="input-group  col-sm-6">
                 
  <input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="dept_id" class="form-control"  required>
  <?php $dept_nm= $this->method_call->fetch_dept_nm($emp_dept); ?>
  <input type="text" style="background-color:#E6F2FF"  value="<?php print_r($dept_nm['dept_name']); ?>" readonly  class="form-control"  required>
    
         
                </div>
                </div>
				
				
				
				<!-- new -->
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-6 pull-left control-label" style="color:#3482AE">REQUIREMENT DETAILS :</label>
				
                </div>
				<div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">&nbsp;</label>
			   <label class="col-sm-6 pull-left control-label">&nbsp;</label>
				
                </div>
				
		
		
			  
			
				
			        <table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                  <th></th>
                  
                  <th scope="col" style="text-align: center;">SR NO.</th>
                   <th scope="col" style="text-align: center;">ITEM CODE</th>
				   <th scope="col" style="text-align: center;">ITEM DESCRIPTION</th>
				  
				   <th scope="col" style="text-align: center;">REQ QTY.</th>
				   <th scope="col" style="text-align: center;">UOM.</th>
				   <th scope="col" style="text-align: center;">APPROX RATE</th>
				   <th scope="col" style="text-align: center;">APPROX TOTAL AMT.</th>
				   <th  style="display:none;">ION NO.</th>
				   <th scope="col" style="text-align: center;">EXP DELIVERY TIME</th>
				   <th scope="col" style="text-align: center;">PROJ DETAILS</th>
				   <th scope="col" style="text-align: center;">TECH DETAILS/ MFG NAME</th>
				    
				   <th scope="col" style="text-align: center;">Customer Code</th>
				   <th scope="col" style="text-align: center;">Sales Material</th>
				   <th scope="col" style="text-align: center;">Ecn/New</th>
				   <th scope="col" style="text-align: center;">Ecn/New Code</th>
				    <th scope="col" style="text-align: center;">ACTION</th>
                  
                </tr>
				
                </thead>
		
                <tbody >
				
	 

				
				  <?php $item= $this->method_call->list_items($emp_code);
				  	$final_rate=0; 	   

 if($item!=null){
	$sr_no=1;			  
foreach ($item->result() as $row)  
         {  ?>
			<tr>
				 <td style="font-family:'exo-bold'"><?php echo $row->item_id; ?></td>
				 <td  ><?php echo $sr_no; ?> </td>
				 <td  ><?php echo $row->item_code; ?></td>  
            <td>  <?php echo $row->item_description; ?></td>  
            <td> <?php echo $row->req_qty; ?></td>  
            <td> <?php echo $row->uom; ?></td>  
            <td> <?php echo $row->approx_rate; ?></td>  
            <td>  <?php echo $row->approx_total_amt; ?></td>  
            <td style="display:none;"> <?php echo $row->ion_no; ?></td>  
            <td>  <?php echo $row->expected_delivery; ?> </td>  
            <td> <?php echo $row->project_detail; ?> </td>  
            <td> <?php echo $row->technical_detail; ?> </td>  
			<td>  <?php echo $row->cust_code; ?> </td>  
            <td> <?php echo $row->sales_material; ?> </td>  
            <td> <?php echo $row->ecn_new; ?> </td>  
			<td> <?php echo $row->ecn_newcode; ?> </td>  
			  <td><a href="#" class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#editModal" style="width:30px;height:20px;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" onclick="edit_item(<?php echo $row->item_id; ?>)" ></a></td>
                  
			
                <?php

				$approx_rate=$row->approx_total_amt;
					$final_rate=$final_rate+$approx_rate;
				?>
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
               		
              </table>
	

			  
			  
			  <br>
			   <label class="col-sm-3.5 pull-right  control-label" style="font-size:14px;color:#3482AE">Total Cumulative PR Amount: <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				
				</br>	</br>
				
			  <center>
			
			  
				
			 
		<button type="button"  id="item_btnold" disabled data-toggle="modal" data-target="#myModal" class="btn " data-toggle="tooltip" title="Please Select PR Type First" style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Add New Item</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button type="button" id="delete_can" class="btn" style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Delete Item</button>
		
			 
			
			  
			  
			 
			  </center>
		
					</br>	</br>	 
			  			 
				
			  
			  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label" >DELIVERY LOCATION </label>
				<div class="input-group  col-sm-6">
                 <?php if ($emp_dept == 12 || $emp_dept == 13||$emp_dept == 100||$emp_dept == 101 ||$emp_code == 100321) { ?>
				 
				 <select class="form-control" required name="delivary_loc">
							 <option value="" >Select Delivery Location</option>
							
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
	 foreach ($plantlist->result() as $row)  
         {  ?>
			
			<option value="<?php echo $row->plant_code; ?>"><?php echo $row->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				  <?php } else { ?>
                                                <input type="text" name="delivary_loc" value="<?php echo $plant_code; ?>" readonly class="form-control"  required>

				  <?php } ?>
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">SUPPLIER END INSPECTION REQ?</label>
				<div class="input-group  col-sm-6">
                                                <select class="form-control" name="inspection_req" required >  
				 <option value="" >Select option</option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">CONSIDERED IN BUDGET?</label>
				<div class="input-group  col-sm-6">
                 <select class="form-control" name="budget_consider" required >  
				 <option value="" >Select option</option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>              

         
                </div>
                </div>
				
				
				<!--
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6">
                <select class="form-control" id="cust_cost" name="cust_cost" required >  
				 <option value="" >Select option</option>
				 <option value="Up Front" >Up Front</option>
				 <option value="Amortization" >Amortization</option>
				 <option value="REPL Own Investment" >REPL Own Investment</option>
				 </select>      
         
                </div><br>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label" id="lab">Depending Field</label>
				<div class="input-group  col-sm-6">
                 
                                 <input type="text" name="cust_cost_val" class="form-control"  required>

         
                </div>
                </div>
				
				-->
				
					   
			  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">FUND NO/ION NO.</label>
				<div class="input-group  col-sm-6">
                        <input type="text" name="ion_no"  class="form-control"  required>
                      
               
         
                </div>
                </div>
				
						   <div class="form-group col-sm-6" style="color:#3482AE">
			  
			  <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">CUSTOMER COST - UPFRONT (In Rs.) </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"   name="cust_cost_upfront" class="form-control"  required>
    
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			  <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label"> CUSTOMER COST - AMORTIZATION(In Months) </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"   name="cust_cost_amortization" class="form-control"  required>
    
                </div>
                </div>

				
				
				   <div class="form-group col-sm-6" style="color:#3482AE">
			  
			  <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">OWN INVESTMENT(Recovery Period In Months)	 </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text"   name="own_investment" class="form-control"  required>
    
                </div>
                </div>
			


				
			  <div class="form-group col-sm-6" style="color:#3482AE">
			  
			 <label class="col-sm-1  control-label">15</label>
			   <label class="col-sm-5  control-label">REASON OF PROCUREMENT</label>
				<div class="input-group  col-sm-6">
                 
                                                <input type="text" name="procurement_res" class="form-control"  required>

         
                </div>
                </div>
			<div class="form-group col-sm-6" style="color:#3482AE">
			  
                            <label class="col-sm-1  control-label">&nbsp;</label>
			   <label class="col-sm-5  control-label">&nbsp;</label>
				<div class="input-group  col-sm-6">
                 
                                             
         
                </div>
                </div>
                                
	 <div class="form-group col-sm-6" style="color:#3482AE">
			  
			 <label class="col-sm-1 pull-left control-label">16</label>
			   <label class="col-sm-5 pull-left control-label">ATTACHMENT</label>
				
                </div>
				  <div class="form-group col-sm-12" style="color:#3482AE">
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]"  class="btn" style="border-style:solid ; border-color:#3482AE;">Reference Quote</button></div>
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]" class="btn" style="border-style:solid ; border-color:#3482AE;">Drawing</button></div>
<div class="col-sm-4"><input type="file" id="btn-submit" name="upload_data[]" class="btn" style="border-style:solid ; border-color:#3482AE;">Images</button></div>
				
                </div>
			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
			   		   <input type="hidden" name="pr_state" value="draft" class="form-control"  required>
			   		   <input type="hidden" name="pr_dh_id" value="<?php echo $pr_dh_id; ?>" class="form-control"  required>

	<center>		 
<button type="submit" id="submit_mainold" class="btn" style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Save</button>&nbsp;&nbsp;&nbsp;
<button type="reset" id="btn-submit" class="btn " style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Reset</button>&nbsp;&nbsp;&nbsp;
<button type="button" id="btn-submit" class="btn  "style="width: 12%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Cancel</button>
    </center>		       
				
	</div>
	</form>
	 
			  
              </div>
              <!-- /.box-footer -->
          

        </div>
        <!--/.col (right) -->
	
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
 <form method="POST" action="<?php echo site_url('purchase/PR/add_item');?>" id="delpur">

	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="text" name="item_id_list" id="can_id"> 
		</form>
		
		
	<!-- edit - item -->

<div class="modal fade displaycontent" id="editModal">

<div class="modal-dialog" role="document" style="width: 720px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE;color: white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" >Edit New Item</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
            <br>
			 <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('purchase/PR/update_item') ?>" enctype='multipart/form-data'>

						

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_pr_id" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
   <input type="hidden" name="edit_item_id" id="edit_item_id" placeholder="" readonly class="form-control"  required></td>

				  <div class="form-group col-md-3">
                    <label style="color:#3482AE" >Item Code</label>
 <input class="form-control" type="text" name="edit_item_code"  id="edit_item_code"  required  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>
				  <div class="form-group col-md-9" style="float: right;">
                    <label style="color:#3482AE">Item Descriptions</label>
 <input class="form-control" type="text" name="edit_item_description" id="edit_item_description" required  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
	
<div class="form-group col-md-4" >
                    <label style="color:#3482AE">Required Quantity</label>
 <input class="form-control" type="text" name="edit_quntity" id="edit_quntity" required  data-validation-required-message="Please enter Valid Required Quantity."/>		 	</div>
	
        
  <div class="form-group col-md-4">
                    <label style="color:#3482AE">UOM</label>
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
                    <label style="color:#3482AE">Approx rate. <span class="fa fa-inr"></span></label>
 <input class="form-control" type="text" placeholder="0.00"  id="edit_amt" name="edit_amt" required  value="" onkeyup="edit_mul();"  data-validation-required-message="Please enter Valid input."  />		 	</div>

<div class="form-group col-md-6">
                    <label style="color:#3482AE">Approx. Total Amount <span class="fa fa-inr"></span></label>
<input class="form-control" type="text"    required readonly name="edit_approx_total_amt" id="edit_approx_total_amt"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-4 hidden">
                    <label style="color:#3482AE">ION No.</label>
 <input class="form-control" type="text"  name="edit_ion_no" id="edit_ion_no"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>


<div class="form-group col-md-6">
                    <label style="color:#3482AE">	Expected Delivery Period.</label>
 <input class="form-control" type="text" required name="edit_expected_delivery" id="edit_expected_delivery" data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label style="color:#3482AE">	Project Details</label>
 <input class="form-control" type="text" required name="edit_project_detail" id="edit_project_detail"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label style="color:#3482AE">Technical Details/Mfg Name</label>
 <input class="form-control" type="text" required name="edit_technical_detail" id="edit_technical_detail"  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label style="color:#3482AE">Customer Code</label>
 <input class="form-control" type="text" required name="edit_Customer_Code" id="edit_Customer_Code" value=""  data-validation-required-message="Please enter Valid Customer Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label style="color:#3482AE">Saleable Material</label>
 <input class="form-control" type="text" required name="edit_saleable_material" id="edit_saleable_material" value=""  data-validation-required-message="Please enter Valid Saleable Material."/>		 	</div>



<div class="form-group col-md-6">
                    <label style="color:#3482AE" >ECN/NEW</label>
				<select name="edit_ecn_new" id="edit_ecn_new" class="form-control" onchange="get_data(this.value)"  required>
					<option value="ECN">	ECN	</option>
					<option value="New">	New	</option>
					</select>
</div>	
			
<div class="form-group col-md-6">
		<?php $ecnew=$row->ecn_new; ?>
		
        <div id="ecn1"><label style="color:#3482AE"><?php echo $ecnew. "Code";?></label></div>
		<div id="newc" style="display:none;"><label style="color:#3482AE" id="newc" for="foo" style="display:none;"><?php echo $ecnew. "Code";?></label></div>
		<input class="form-control" type="text" required name="edit_ecn_newcode" id="edit_ecn_newcode"  value="0"  data-validation-required-message="Please enter Valid New Code."/>		 	</div>



   <center><button type="submit"  name="save"  class="btn" style="width: 18%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Update Details</button>
    </center> 
                               
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
	 
        document.getElementById('ecnadd').style.display = 'block';
		document.getElementById('newadd').style.display = 'none';
    }
	else {
		
        document.getElementById('newadd').style.display = 'block';
		document.getElementById('ecnadd').style.display = 'none';
            }
}
</script>
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

	


<div class="modal fade displaycontent" id="myModal">

<div class="modal-dialog" role="document" style="width: 720px;">
    <div class="modal-content">
       <div class="modal-header" style="background-color:#3482AE;color: white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add New Item</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
            <br>
			
						  <form method="post" id="item_form" action="<?php echo site_url('purchase/PR/add_item') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_pr_id" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
  
				  <div class="form-group col-md-3">
                    <label >Item Code</label>
 <input class="form-control" type="text" name="item_code" value="" required  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>
				  <div class="form-group col-md-9" style="float: right;">
                    <label >Item Descriptions</label>
 <input class="form-control" type="text" name="item_description" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="req_qty" id="qty"   required data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  <div class="form-group col-md-4">
                    <label >UOM</label>
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
                    <label >Approx rate. <span class="fa fa-inr"></span></label>
 <input class="form-control" type="text" placeholder="0.00"  id="amt" required name="approx_rate" value="" onkeyup="mul();"  data-validation-required-message="Please enter Valid input."  />		 	</div>

<div class="form-group col-md-6">
                    <label >Approx. Total Amount <span class="fa fa-inr"></span></label>
 <input class="form-control" type="text"   id="fin" required readonly name="approx_total_amt"   data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-4 hidden">
                    <label >ION No.</label>
 <input class="form-control" type="text"  name="ion_no" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>


<div class="form-group col-md-6">
                    <label >	Expected Delivery Period.</label>
 <input class="form-control" type="text" required name="expected_delivery" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >	Project Details</label>
 <input class="form-control" type="text" required name="project_detail" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >Technical Details/Mfg Name</label>
 <input class="form-control" type="text" required name="technical_detail" value=""  data-validation-required-message="Please enter Valid Item Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >Customer Code</label>
 <input class="form-control" type="text" required name="customer_code" id="customer_code" value=""  data-validation-required-message="Please enter Valid Customer Code."/>		 	</div>

<div class="form-group col-md-6">
                    <label >Saleable Material</label>
 <input class="form-control" type="text" required name="saleable_material" id="saleable_material" value=""  data-validation-required-message="Please enter Valid sales_material."/>		 	</div>

<div class="form-group col-md-6">
                    <label  >ECN/NEW</label><br><br>
				<select name="ecn_new" id="ecn_new1" class="select2 form-control" onchange="get_data1(this.value)" style="position: unset!important; width:100%;" required>
					<option value="ECN">	ECN	</option>
					<option value="New">	New	</option>
					</select>
</div>	
		
<div class="form-group col-md-6" id="ecnadd" >
        <label>ECN Code</label></div>
 <!--<input class="form-control" type="text" required name="ecn_newcode" id="ecn_new"  value="0"  data-validation-required-message="Please enter Valid ECN/New Code."/>		 	</div>
--><div class="form-group col-md-6" id="newadd" style="display:none;">
        <label>New Code</label></div>
 <div class="form-group col-md-6"><input class="form-control" type="text" required name="ecn_newcode" id="ecn_new"  value="0"  data-validation-required-message="Please enter Valid ECN/New Code."/>		 	</div>
</div>
<center>

  <button type="submit"  class="btn   " style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 3px rgba(0,0,0,.35);">Add Item</button>
</center>
</div></form>
     </section>
	  
	 </div>
    </div>
  </div>
  </div>




  </body>
</html>



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

<script>
      function edit_item(id)
{
  //  alert(id);
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
			
				document.getElementById("ecn_new1").disabled = true;
				document.getElementById("customer_code").disabled = true;
				document.getElementById("saleable_material").disabled = true;
				document.getElementById("ecn_new").disabled = true;
				
				
				document.getElementById("edit_Customer_Code").disabled = true;
				document.getElementById("edit_saleable_material").disabled = true;
				document.getElementById("edit_ecn_new").disabled = true;
				document.getElementById("edit_ecn_newcode").disabled = true;
				
			 
			  
		  }
		  
		  else{
			

		  }
 
	  }
	  </script>
