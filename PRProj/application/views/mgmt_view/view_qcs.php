<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> QCS View </title>
     	   <?php include_once 'styles.php'; ?>
<style>
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



   

    @media print
    {
        .non-printable { display: none; }
        .printable { display: block; }
    }
   
   
   @media print {
    #printbtn {
        display :  none;
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
 QCS View 
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
      
<li class="active"> QCS View
</li>
</li>
      </ol>

    </section>
	
	
	<section class="content" id="content">
 
 
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
	    <div class="box-body">
		
		
		

		 
		 	  <?php $qcs_detail= $this->method_call->qcs_detail($qcs_id);
 if($qcs_detail!=null){
	 foreach ($qcs_detail->result() as $row4)  
         {  ?>
		 
	  
				     <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
               <input type="text" name="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required>
    
                </div>
                </div>
				
				
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
        <input type="text" readonly name="pr_id" value="<?php echo $row4->pr_id; ?>" class="form-control"  required>
    
                </div>
                </div>
				
				
				
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
	 <input type="text" class="form-control" readonly name="qcs_date" readonly value ="<?php echo $row4->qcs_date; ?>" >
  
         
                </div>
                </div>
		
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
    <input type="text" readonly name="qcs_owner_nm" value="<?php echo $row4->qcs_owner; ?>" class="form-control"  required>              

	 
    
         
                </div>
                </div>
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
    <input type="text" readonly name="pr_code" value="<?php echo $row4->plant_code; ?> " class="form-control"  required>              

    
         
                </div>
                </div>
				
				
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
			  <input type="hidden" value="<?php echo $row4->pr_type; ?>" readonly   name="" class="form-control"  required>
  
  <?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
  <input type="text" name="" value="<?php print_r($pt_name['pt_name']); ?>" readonly  class="form-control"  required>

 

          
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">ION NO</label>
				<div class="input-group  col-sm-6">
					<?php $ionno= $this->method_call->fetch_ion_no($row4->pr_id);?>
   
                    <input type="text" name="" value="<?php echo $ionno;?>" readonly  class="form-control"  required>   
         
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12 hidden">
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
			
<!--end -->


				</div>
<!--btn end -->
<!--Cost comparision  -->
  <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">7 . Cost Comparison Summary</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
						   <div class="form-group col-sm-12 hidden">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>

				
				
                <tr>
                				

				<th>  Quoted Rate </th>  
			<th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>  
			  <th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>
			<th>  Quot Amt </th>  			
            <th>  Final Rates </th>  
            <th> Final Amt	</th> 
			 			
           
				  
                </tr>  
			
				
                </thead>
						
                <tbody>
				      <tbody>
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->view_qcs_items($qcs_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
					$total_quoted_amount2 = 0;
					$total_final_ammount2=0;
					$total_quoted_amount3 =0;
					$total_final_ammount3=0;					

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>
		 <!-- item code -->
		   <div class="form-group col-sm-4 hidden ">
			  <div class="input-group  col-sm-6">
                <input type="text" readonly name="" value="<?php echo $rowitem->q_item_code; ?>" class="form-control"  required>
			
         <?php $item_nm= $this->method_call->fetch_item_nm($rowitem->q_item_code); ?>
 <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($item_nm['item_code']); ?>"  >
                </div>
                </div>
				
				<!-- end-->
			<tr>
				
            <td>  <?php echo $rowitem->quot_rate1; ?></td>  
            <td> <?php echo $rowitem->quoted_amt1; ?></td>  
            <td>  <?php echo $rowitem->final_rate1; ?> </td>  
            <td> <?php echo $rowitem->final_amt1; ?> </td>  
			<td>  <?php echo $rowitem->quot_rate2; ?></td>  
            <td> <?php echo $rowitem->quoted_amt2; ?></td>  
            <td>  <?php echo $rowitem->final_rate2; ?> </td>  
            <td> <?php echo $rowitem->final_amt2; ?> </td>
			
			<td>  <?php echo $rowitem->quot_rate3; ?></td>  
            <td> <?php echo $rowitem->quoted_amt3; ?></td>  
            <td>  <?php echo $rowitem->final_rate3; ?> </td>  
            <td> <?php echo $rowitem->final_amt3; ?> </td>
		
		
                <?php

				$quoted_ammount1=$rowitem->quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowitem->quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowitem->final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowitem->quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowitem->final_amt3;
					$total_final_ammount3 = $total_final_ammount3+$final_ammount3;
					
				?>
      </tr>
		
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
				  <tfoot>
        <tr>
           <td class="right" colspan="1"></td>
			<td class="right"><B><?php echo $final_rate; ?></b></td>
			<td class="right" colspan="1"></td>
			<td class="right "><B><?php echo $total_final_ammount1; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_quoted_amount2; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_final_ammount2; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_quoted_amount3; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_final_ammount3; ?></b></td>
			<td class="right" colspan ="1"></td>
        </tr>
    </tfoot>

		 </tbody>
				 
	  </tbody>
               		
              </table>

				
				
			<!--end -->	
		
		  </div>
						 

				
				   <div class="form-group col-sm-12">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>

					<tr>

					<th colspan="2" style="color:#1E8449;" > <center><b> Final Supplier  :&nbsp;&nbsp;   <?php echo $row4->sup1_nm; ?></b><center></th>
			
				
				 <th colspan="2" > <center><b>  Supplier 2  :&nbsp;&nbsp;   <?php echo $row4->sup2_nm; ?>  </b><center></th>
				 <th colspan="2" > <center><b>  Supplier 3  :&nbsp; &nbsp;   <?php echo $row4->sup3_nm; ?>  </b><center></th> 
				 
		 
				
					</tr>
				
                <tr>
                				

			<th width="16%">  Quoted Total Amount (₹) </th>  
            <th width="16%">  Final Total Amount (₹)</th>  
            
			
			<th width="16%">  Quoted Total Amount (₹) </th>  
            <th width="16%"> Final Total Amount (₹) </th>  
       
			<th width="16%">  Quoted Total Amount (₹) </th>  
            <th width="16%">  Final Total Amount (₹)</th>  
           
				  
                </tr>  
			
				
                </thead>
						<td> <?php echo $final_rate; ?></td>
						<td> <?php echo $total_final_ammount1; ?></td>
						<td> <?php echo $total_quoted_amount2; ?></td>
						<td> <?php echo $total_final_ammount2; ?></td>
						<td> <?php echo $total_quoted_amount3; ?></td>
						<td> <?php echo $total_final_ammount3; ?></td>
                <tbody>
				
				 
	  </tbody>
               		
              </table>
			  
			  <!--button -->
   <div class="form-group col-sm-12">
    
<div class="col-sm-4">

 </div>



	<!-- View Item -->
<div class="col-sm-4">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalEdit" class="btn  bg-skincolor " style="border: 1px solid orange;">Detailed View</button>
</div>

	<!-- Edit / Delete Item -->


<div class="col-sm-4"> 

</div>

	
                </div>
			
		  </div>
				
			 </div>
			 
            </div>
			
</div>				 

<!-- Technical specification -->
  <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">8 . Technical Specification Comparison</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				
				

            <div class="row">
              <div class="col-sm-12" style="  "><!-- temp_qcs_id = cobination of pr+emp_code -->
 

		<br>
		
	  
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
            
                <tbody>
								  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">Technical Specification</td>
				 <td colspan="3" style="color:#1E8449;"   ><b> <center>Final Supplier  :&nbsp;&nbsp; <?php echo $row4->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  ><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $row4->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  ><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $row4->sup3_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
			<?php
				 $show_tech_spe= $this->method_call->qcs_techspec_show($qcs_id);
 if($show_tech_spe!=null){
	 	   
	$sr_no=1;			  
foreach ($show_tech_spe->result() as $rowtech)  
         {  ?>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 1 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">Technical Details</td>
				 <td colspan="3"  > <?php echo $rowtech->tech_det_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->tech_det_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->tech_det_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">Credibility Of The Supplier Checked													
</td>
				 <td colspan="3">  
				     <?php echo $rowtech->credibility_sup1; ?>       
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <?php echo $rowtech->credibility_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<?php echo $rowtech->credibility_sup3; ?>
				  
				  </td>
				  
				  
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
			 
			 
			 
				 <td colspan="6" style="text-align:right;">Insurance & Freight</td>
				 
				 <td colspan="3"  > 
			<?php echo $rowtech->insurance_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<?php echo $rowtech->insurance_sup2; ?>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<?php echo $rowtech->insurance_sup3; ?>
				  </td>
				  
				  
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
				 <td colspan="6" style="text-align:right;">Delivery Period</td>
				 <td colspan="3"  >  <?php echo $rowtech->del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">  <?php echo $rowtech->del_period_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->del_period_sup3; ?></td>
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
				 <td colspan="6" style="text-align:right;">Delivery Mode</td>
				 <td colspan="3">  <?php echo $rowtech->del_mode_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><?php echo $rowtech->del_mode_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"> <?php echo $rowtech->del_mode_sup3; ?>   </td>
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
				 <td colspan="6" style="text-align:right;">Inspection / Testing													</td>
				 <td colspan="3">
				 	<?php echo $rowtech->inspection_sup1; ?>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<?php echo $rowtech->inspection_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<?php echo $rowtech->inspection_sup3; ?>				  
				  </td>
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
				 <td colspan="6" style="text-align:right;">Payment Terms</td>
				 <td colspan="3"  >  <?php echo $rowtech->pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->pymt_terms_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowtech->pymt_terms_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">Warranty</td>
				 <td colspan="3"  >  <?php echo $rowtech->warranty_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowtech->warranty_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->warranty_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">Scope Of Installation </td>
				 <td colspan="3"  > 
				 		<?php echo $rowtech->scope_instal_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  
				  			<?php echo $rowtech->scope_instal_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				  			<?php echo $rowtech->scope_instal_sup3; ?>
				  </td>
				  
				  
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
				 <td colspan="6" style="text-align:right;">Taxes & Duties</td>
				 <td colspan="3"  >  <?php echo $rowtech->taxes_duties_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->taxes_duties_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->taxes_duties_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">Note</td>
				 <td colspan="3"  >  <?php echo $rowtech->note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->note_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->note_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">Validity Of Price/Quote</td>
				 <td colspan="3"  >  <?php echo $rowtech->validity_price_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->validity_price_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->validity_price_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:right;">REPL Scope</td>
				 <td colspan="3"  > <?php echo $rowtech->repl_scope_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->repl_scope_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowtech->repl_scope_sup3; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
			
      </tr>
	
                </tbody>
               		
              </table>
		
			  
		  </div>

		</div>
				
				
			 </div>
            </div>
			
			
			
</div>
<!-- end -->
    <!--/.col (right) -->
	

</div>
<!-- end -->
 <?php }  } 
				
			
				
         ?>  


<!-- Quotation Attachments -->
 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">9 . Quotation Attachments</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				
				   <div class="form-group col-sm-12">
			
               		<!-- <label class="col-sm-5 pull-left control-label">Initial Quote1<br><br>Final Quote1<br><br>Initial Quote2<br><br>Final Quote2<br><br>Initial Quote3<br><br>Final Quote3</label> -->
             
			     <div class="col-sm-5 ">
				
				
<?php $filea= $this->method_call->filefetchqcs($qcs_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
 <a style="color: #337ab7;" href="<?php echo base_url()."uploads/qcs/". $qcs_id ."/".$rowfile->qcs_file_nm;?>"><?php echo $rowfile->qcs_file_nm; ?></a></br></br>
		 <?php }
 } ?>
                </div>
		
		  </div>
				
				
			 </div>
			 
			 
            </div>
			
			
			
</div>
<!--end -->


				
 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">10</label>
			   <label class="col-sm-4 pull-left control-label">Additional Details (Attachments) </label>
				<div class="input-group  col-sm-6">
                 
               
                                      
        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/qcs_attachments/". $row4->additional_attachment ?>"> <?php echo $row4->additional_attachment ?></a> </b>
           
    
                </div>
                </div>
				
		
				
				
				
				<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">11</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier </label>
				<div class="input-group  col-sm-6">
                 
				<?php echo $row4->selected_supplier; ?>	
    
                </div>
                </div>
				
					<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">12</label>
			   <label class="col-sm-4 pull-left control-label">Justification for Selection of Supplier</label>
				<div class="input-group  col-sm-6">
                 
                              
         <?php echo $row4->justification_supplier; ?>

         
                </div>
                </div>
				
					
			  </br>
			  </br>
			  
			 
	
		  <!-- start -->
			    	<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">13</label>
			   <label class="col-sm-4 pull-left control-label">Approval Status </label>
				
                </div>
			  <?php
			  if($row4->pr_type == 13){
				  ?>
				   <div class="form-group col-sm-12">
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
				<td colspan="4" ><center> Approver Name <center> </td>
				 <td colspan="4" ><center>Approval Date/Time  <center> </td>
				
				 <td colspan="4" > <center>Approval Comment   <center> </td>
				
				 
				 
				
                
      </tr>
	  <?php
$sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level1);

 $approval_level1= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level1);
	?>
	
	  <tr>
	  
			 <td style="display:none" >  </td>
			  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" readonly value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   required> </td>
				 <td colspan="4"  >  <input type="text" readonly value=" <?php echo $approval_level1 ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" readonly value=" Approval Pending From Sourcing Manager " class="form-control full_width"   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" readonly value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width"   > </td>
				  
				  <?php
				 }?>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>

				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 

  <?php
				 $sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level2); 
				 
				  
					  $approval_level2= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level2);
				 ?>
	  <tr>
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $sourcing_mgr_name?>"  class="form-control full_width" readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $approval_level2?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text"readonly value="Approval Pending From Sourcing Head" class="form-control full_width"   > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text"readonly value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width"   > </td>
				 <?php
				 }
				?>				 
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
				
		</tbody>
</table>
</div>		
			<?php	  
			  }
			  else{
				  ?>
	 <div class="form-group col-sm-12">
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
				<td colspan="4" ><center> Approver Name <center> </td>
				 <td colspan="4" ><center>Approval Date/Time  <center> </td>
				
				 <td colspan="4" > <center>Approval Comment   <center> </td>
				
				 
				 
				
                
      </tr>
	  <?php
$sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level1);

 $approval_level1= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level1);
	?>
	
	  <tr>
	  
			 <td style="display:none" >  </td>
			  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text"value=" <?php echo $approval_level1 ?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" value=" Approval Pending From Sourcing Manager " class="form-control full_width"readonly   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width" readonly> </td>
				  
				  <?php
				 }?>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>

				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 

  <?php
				 $sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level2); 
				 
				  
					  $approval_level2= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level2);
				 ?>
	  <tr>
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $sourcing_mgr_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $approval_level2?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text" value="Approval Pending From Sourcing Head" class="form-control full_width" readonly  > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text" value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width" readonly  > </td>
				 <?php
				 }
				?>				 
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
					  
	 <?php
		 $cfo_name= $this->method_call->fetch_emp_name($row4->approval_level3); 

 $cfo_dt= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level3);
							
	 ?>
	
	 

               
					 
	  <tr>
	  
			 <td style="display:none" >  </td>
		
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $cfo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $cfo_dt?>" class="form-control full_width"  readonly > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				   if($row4->approval_level4_comment == null){
					   ?>
					   <td colspan="4"  >  <input type="text" value="Approval Pending From CFO"  class="form-control full_width" readonly  > </td>
					 <?php
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" value="<?php  echo $row4->approval_level3_comment?>"  class="form-control full_width"  readonly > </td>
				  <?php
				 }
				 ?>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
      </tr> 
		 
<?php
 $coo_name= $this->method_call->fetch_emp_name($row4->approval_level4);
$coo_dt= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level4);
				 
            
?>

	  <tr>
	  
			 <td style="display:none" >  </td>
			
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $coo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $coo_dt?>" class="form-control full_width" readonly> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 <?php
				  if($row4->approval_level4_comment == null){
				 ?>
				  <td colspan="4"  >  <input type="text" value="Approval Pending From COO" class="form-control full_width" readonly> </td>
				<?php
					
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" value="<?php  echo $row4->approval_level4_comment?>"  class="form-control full_width" readonly> </td>
				  <?php
				 }
				 ?>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				   </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
      </tr> <?php
		
		 ?>
				</tbody>
               		
              </table>
			
	
	</div>
	<?php
			  }
	?>		  
			  <!--end-->
		
			 <div class="form-group col-sm-12">
				<h4><b><h4>9.&nbsp;&nbsp;  Approval History</h4></b> </h4>
			        <table id="example" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>
					
				
			
                <tr>
                				
				
				<th> QCS ID</th>
				<th> Approver ID </th> 
				<th> Approver Name </th>				
				<th> Approver Comment </th>
				<th> Approver Status</th>  				
				<th>  Date / Time </th>  
				
                </tr>  
			
				
                </thead>
				

                <tbody>
				 
				
	 				  <?php $item= $this->method_call->qcs_approver_history_id($qcs_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         { 
		  $appver_name= $this->method_call->fetch_emp_name($rowhistory->approval_emp_code); ?>
	
			<tr>
				 <td  ><?php echo $rowhistory->qcs_id; ?></td>
				 <td  ><?php echo $rowhistory->approval_emp_code; ?> </td>
				  <td  ><?php echo $appver_name; ?> </td>
				 <td  ><?php echo $rowhistory->approval_comment; ?></td> 
				 
				<td><?php echo $rowhistory->approver_status; ?></td>
			<td><?php echo $rowhistory->approval_date; ?></td>
			</tr>
	 

				
		 <?php  }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>
		
		  </div>	
				
				
				    <div class="box-footer">
			   		  

			  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
<!--				
<div class="col-sm-2"><button type="submit" id=""  class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Print</button></div>
-->

	  <div class="form-group col-sm-2">

			
			 <a href="" onClick="window.print()"  id ="printbtn"class="btn bg-skincolor btn-lg">
          <span class="glyphicon glyphicon-print"></span> Print QCS
        </a>
			  
              </div>
				
				<div class="col-sm-4">
				</div>
				
                </div>
			
				
				 </div>
				

				
				 
				  <?php }
 } ?>		
	

	</section>
	



<!-- view modal -->

<div class="modal fade displaycontent" id="myModalEdit">

<div class="modal-dialog" role="document" style="width:1380px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">View Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			<!--
						  <form method="post" id="" action="<?php echo site_url('purchase/QCS/add_item') ?>" >
-->
  <form method="post" id="" action="" >
            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $row4-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" > <center>2. <?php echo $row4-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $row4-> sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr >
                				 <th colspan="6" style="text-align:right;"></th>

			<th>  Quoted Rate </th>  
			<th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>  
			  <th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>
			<th>  Quot Amt </th>  			
            <th>  Final Rates </th>  
            <th> Final Amt	</th> 
			 			
				  
                </tr>  
		
				
                </thead>
		
                <tbody>
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->view_qcs_items($qcs_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
					$total_quoted_amount2 = 0;
					$total_final_ammount2=0;
					$total_quoted_amount3 =0;
					$total_final_ammount3=0;					

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>
		 <!-- item code -->
	
		   <div class="form-group col-sm-4 hidden ">
			  <div class="input-group  col-sm-6">
                <input type="text" readonly name="" value="<?php echo $rowitem->q_item_code; ?>" class="form-control"  required>
			
         <?php $item_nm= $this->method_call->fetch_item_nm($rowitem->q_item_code); ?>
 <input type="Text" name="" class=" form-control" id="" readonly value="<?php print_r($item_nm['item_code']); ?>"  >
                </div>
                </div>
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			 <td  ><?php echo $rowitem->q_item_code; ?></td> 
				 	<!--<td  ><?php print_r($item_nm['item_code']); ?></td> -->
					
				<td> <?php echo $rowitem->q_hsn_code; ?></td>  				 
            <td>  <?php echo $rowitem->q_item_description; ?></td>  
            <td> <?php echo $rowitem->q_req_quantity; ?></td>  
            <td> <?php echo $rowitem->q_uom; ?></td>  
            <td>  <?php echo $rowitem->quot_rate1; ?></td>  
            <td> <?php echo $rowitem->quoted_amt1; ?></td>  
            <td>  <?php echo $rowitem->final_rate1; ?> </td>  
            <td> <?php echo $rowitem->final_amt1; ?> </td>  
			<td>  <?php echo $rowitem->quot_rate2; ?></td>  
            <td> <?php echo $rowitem->quoted_amt2; ?></td>  
            <td>  <?php echo $rowitem->final_rate2; ?> </td>  
            <td> <?php echo $rowitem->final_amt2; ?> </td>
			
			<td>  <?php echo $rowitem->quot_rate3; ?></td>  
            <td> <?php echo $rowitem->quoted_amt3; ?></td>  
            <td>  <?php echo $rowitem->final_rate3; ?> </td>  
            <td> <?php echo $rowitem->final_amt3; ?> </td>

			
		
		
		
		
                <?php

				$quoted_ammount1=$rowitem->quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowitem->quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowitem->final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowitem->quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowitem->final_amt3;
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
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_quoted_amount2; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_final_ammount2; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_quoted_amount3; ?></b></td>
			<td class="right" colspan ="1"></td>
			<td class="right "><B><?php echo $total_final_ammount3; ?></b></td>
			
        </tr>
    </tfoot>
	
		 </tbody>
		 </table>
	
        </section>
	 
	 </div>
    </div>
  </div>
  </div>
  </div>
    </div>
  </div>
  		
  <!--end -->
  

  <!--end -->
  	   <?php include_once 'scripts.php'; ?>
	   
<script>

function mul() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt1').value = result;
      }
}
</script>


<!--sup  final rate 1 -->
<script>
function mulfinal_amt() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount1').value = result;
      }
}
</script>


<!-- quoted 2 -->
<script>

function mul_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt2').value = result;
      }
}
</script>


<!--sup  final rate 2 -->
<script>
function mul_final_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount2').value = result;
      }
}
</script>




<!-- quoted 3 -->
<script>

function mul_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt3').value = result;
      }
}
</script>


<!--sup  final rate 3 -->
<script>
function mul_final_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount3').value = result;
      }
}
</script>

	<!-- swal funcction btn_draft---->
  <script type='text/javascript'>
$('#btn_draft').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Submit QCS Step-2",
        text: "You will not be able to Edit this QCS!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your QCS Step - 2  Submitted Successfully.", "success");				 
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