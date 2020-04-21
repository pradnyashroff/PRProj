<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QCS Draft</title>
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
      QCS Draft
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

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">QCS Draft
</li>
</li>
      </ol>

    </section>
	
	
	<section class="content" id="content">
 
 
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
	    <div class="box-body">
		<form method="post" id="main_form" action="<?php echo site_url('purchase/QCS/qcs_draft_step2') ?>" enctype='multipart/form-data'>
		
		

		 
		 	  <?php $qcs_detail= $this->method_call->qcs_detail($qcs_id);
 if($qcs_detail!=null){
	 foreach ($qcs_detail->result() as $row4)  
         {  ?>
		 
		 	 <!-- QCS Detail -->
 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . QCS Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
               <?php echo $row4->qcs_id; ?>
    
                </div>
                </div>
				
				<input type="hidden" name="draft_qcs_no" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required>
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
        <input type="hidden" readonly name="pr_id" value="<?php echo $row4->pr_id; ?>" class="form-control"  required>
    
    
    <p style="color:#ff0000;font-size:15px;">  
	<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#pr_view_Modal"href="#pr_view_Modal<?php echo $row4->pr_id?>">&nbsp;<?php echo $row4->pr_id; ?></span>
				</p>
                </div>
                </div>
				
				
				
				  <!--<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date /Time</label>
				<div class="input-group  col-sm-6">
                  
	<?php echo $row4->qcs_date; ?>
  
         
                </div>
                </div>-->
			<!--
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>

    <input type="text" readonly name="pr_dept" value="<?php echo($dept_nm['dept_name']); ?>" class="form-control"  required>              

    
         
                </div>
                </div>
				
				-->
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
    <?php echo $row4->qcs_owner; ?>           

     <input type="hidden" readonly name="qcs_emp_code" value="<?php echo $row4->qcs_emp_code; ?>" class="form-control"  required> 
         
                </div>
                </div>
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
   <?php echo $row4->plant_code; ?>              

    
         
                </div>
                </div>
				
				
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
			  <input type="hidden" value="<?php echo $row4->pr_type; ?>" readonly   name="" class="form-control"  required>
  
  <?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
<?php print_r($pt_name['pt_name']); ?>

 

          
         
                </div>
                </div>
				
		
		
		          <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Fund NO/ION NO</label>
				<div class="input-group  col-sm-6">
					<?php $ionno= $this->method_call->fetch_ion_no($row4->pr_id);?>
   
                   <?php echo $ionno;?>
         
                </div>
                </div>
				
				
			 </div>
			 
			 
            </div>
			
			
			
</div>
<!--end -->
		 
	  
				   
				
				
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
				 <td style="display:none;"><?php echo $row3->item_id; ?></td>
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
<!--Cost comparision  -->
  <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Cost Comparison Summary</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
						   <div class="form-group col-sm-12 hidden">
			        <table id="example6" class="table table">
                <thead>

				
				
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                				

				<th>  Quoted Rate </th>  
			<th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>  
			  <th>  Quoted Amt </th>  
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			<th>  Quoted Rate </th>
			<th>  QUOTED Amt </th>  			
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
			        <table id="example6" class="table table">
                <thead>

					 <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">

					<th colspan="2"<b> Final Supplier :&nbsp;&nbsp;   <?php echo $row4->sup1_nm; ?></b></th>
			
				
				 <th colspan="2" <b>  Supplier 2  :&nbsp;&nbsp;   <?php echo $row4->sup2_nm; ?>  </b></th>
				 <th colspan="2" <b>  Supplier 3  :&nbsp; &nbsp;   <?php echo $row4->sup3_nm; ?>  </b></th> 
				 
		 
				
					</tr>
				
                <tr>
                				

			<th>  Quoted Total Amount (₹) </th>  
            <th>  Final Total Amount (₹)</th>  
            
			
			<th>  Quoted Total Amount (₹) </th>  
            <th> Final Total Amount (₹) </th>  
       
			<th>  Quoted Total Amount (₹) </th>  
            <th>  Final Total Amount (₹)</th>  
           
				  
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
    
<div class="col-sm-3">
 <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn" style="width: 40%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Item</button>
 </div>


	<!-- Custom Item -->
<div class="col-sm-3">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#AddCustomModal" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Custom Item</button>
</div>
	<!-- View Item -->
<div class="col-sm-3">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalEdit" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Detailed View</button>
</div>

	<!-- Edit / Delete Item -->


<div class="col-sm-3"> 
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalEditDelete" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Edit/Delete Item</button>
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
              <h3 class="box-title">3  . Technical Specification Comparison</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				
					<!--  <form method="post" id="" action="<?php echo site_url('purchase/QCS/add_technicalDetail') ?>" >-->

            <div class="row">
              <div class="col-sm-12" style="  "><!-- temp_qcs_id = cobination of pr+emp_code -->
 <!--  <input type="hidden" name="temp_qcs_id" placeholder="" value="<?php echo $pr_id.$emp_code; ?>" readonly class="form-control"  required> -->

		<br>
		
	  
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
            
                <tbody>
							<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;">Technical Specification</td>
				 <td colspan="3"><b> <center>Final Supplier :&nbsp;&nbsp; <?php echo $row4->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $row4->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $row4->sup3_nm; ?><center></b> </td>
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
				 <td colspan="6" style="text-align:center;">Technical Details</td>
				 <td colspan="3"  > <input type="text" value="<?php echo $rowtech->tech_det_sup1; ?>"  name="draft_tech_det_sup1" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->tech_det_sup2; ?>"  name="draft_tech_det_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->tech_det_sup3; ?>"  name="draft_tech_det_sup3" class="form-control full_width"   > </td>
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
				 <td colspan="6" style="text-align:center;">Credibility Of The Supplier Checked													
</td>
				 <td colspan="3"  >  
				 <select class="form-control" name="draft_supplier1_checked"  >  
				 <option value="<?php echo $rowtech->credibility_sup1; ?>" ><?php echo $rowtech->credibility_sup1; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>              
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <select class="form-control" name="draft_supplier2_checked"  >  
				 <option value="<?php echo $rowtech->credibility_sup2; ?>" ><?php echo $rowtech->credibility_sup2; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<select class="form-control" name="draft_supplier3_checked"  >  
				 <option value="<?php echo $rowtech->credibility_sup3; ?>" ><?php echo $rowtech->credibility_sup3; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>
				  
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
			 
			 
			 
				 <td colspan="6" style="text-align:center;">Insurance & Freight</td>
				 
				 <td colspan="3"  > 
			<select class="form-control" name="draft_supplier1_insurance"  >  
				 <option value="<?php echo $rowtech->insurance_sup1; ?>" ><?php echo $rowtech->insurance_sup1; ?></option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<select class="form-control" name="draft_supplier2_insurance"  >  
				 <option value="<?php echo $rowtech->insurance_sup2; ?>" ><?php echo $rowtech->insurance_sup2; ?></option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
							<select class="form-control" name="draft_supplier3_insurance"  >  
				 <option value="<?php echo $rowtech->insurance_sup3; ?>" ><?php echo $rowtech->insurance_sup3; ?></option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
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
				 <td colspan="6" style="text-align:center;">Delivery Period</td>
				 <td colspan="3"  >  <input type="text"  name="draft_delivery_period_up_sup1" class="form-control full_width" value ="<?php echo $rowtech->del_period_sup1; ?>"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value ="<?php echo $rowtech->del_period_sup2; ?>"  name="draft_delivery_period_up_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value ="<?php echo $rowtech->del_period_sup3; ?>"  name="draft_delivery_period_up_sup3" class="form-control full_width"   > </td>
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
				 <td colspan="6" style="text-align:center;">Delivery Mode</td>
				 <td colspan="3"  > 
				 <select class="form-control" name="draft_del_mode_sup1"  >  
				 <option value="<?php echo $rowtech->del_mode_sup1; ?>" ><?php echo $rowtech->del_mode_sup1; ?></option>
				 
				 <option value="By Road">By Road</option>
				 <option value="By Air">By Air</option>
				 <option value="By Sea">By Sea</option>
				</select>
				
			 </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >

				   <select class="form-control" name="draft_del_mode_sup2" >  
				 
				  <option value="<?php echo $rowtech->del_mode_sup2; ?>"><?php echo $rowtech->del_mode_sup2; ?></option>
				  
				 <option value="By Road">By Road</option>
				 <option value="By Air">By Air</option>
				 <option value="By Sea">By Sea</option>
				</select>
				

				 </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >

				     <select class="form-control" name="draft_del_mode_sup3"  >  
				 <option value="<?php echo $rowtech->del_mode_sup3; ?>"><?php echo $rowtech->del_mode_sup3; ?></option>
				 
				 <option value="By Road">By Road</option>
				 <option value="By Air">By Air</option>
				 <option value="By Sea">By Sea</option>
				</select>
				
				  </td>
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
				 <td colspan="6" style="text-align:center;">Inspection / Testing													</td>
				 <td colspan="3">
				 	<select class="form-control" name="draft_supplier1_testing"  >  
				 <option value="<?php echo $rowtech->inspection_sup1; ?>" ><?php echo $rowtech->inspection_sup1; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<select class="form-control" name="draft_supplier2_testing"  >  
				 <option value="<?php echo $rowtech->inspection_sup2; ?>" ><?php echo $rowtech->inspection_sup2; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<select class="form-control" name="draft_supplier3_testing"  >  
				 <option value="<?php echo $rowtech->inspection_sup3; ?>" ><?php echo $rowtech->inspection_sup3; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>				  
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
				 <td colspan="6" style="text-align:center;">Payment Terms</td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->pymt_terms_sup1; ?>" name="draft_pay_terms_sup1" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->pymt_terms_sup2; ?>"  name="draft_pay_terms_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->pymt_terms_sup3; ?>"  name="draft_pay_terms_sup3" class="form-control full_width"   > </td>
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
				 <td colspan="6" style="text-align:center;">Warranty</td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->warranty_sup1; ?>"    name="draft_warranty_sup1" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"value="<?php echo $rowtech->warranty_sup2; ?>"  name="draft_warranty_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="draft_warranty_sup3" class="form-control full_width" value="<?php echo $rowtech->warranty_sup3; ?>"    > </td>
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
				 <td colspan="6" style="text-align:center;">Scope Of Installation </td>
				 <td colspan="3"  > 
				 			<select class="form-control" name="draft_scope_inst_sup1"  >  
				 <option value="<?php echo $rowtech->scope_instal_sup1; ?>"  ><?php echo $rowtech->scope_instal_sup1; ?> </option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  
				  			<select class="form-control" name="draft_scope_inst_sup2"  >  
				<option value="<?php echo $rowtech->scope_instal_sup2; ?>"  ><?php echo $rowtech->scope_instal_sup2; ?> </option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				  			<select class="form-control" name="draft_scope_inst_sup3"  >  
				<option value="<?php echo $rowtech->scope_instal_sup3; ?>"  ><?php echo $rowtech->scope_instal_sup3; ?> </option>
				 <option value="Extra At Actual">Extra At Actual</option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
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
				 <td colspan="6" style="text-align:center;">Taxes & Duties</td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->taxes_duties_sup1; ?>"  name="draft_sup1_taxes" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->taxes_duties_sup2; ?>"  name="draft_sup2_taxes" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->taxes_duties_sup3; ?>"  name="draft_sup3_taxes" class="form-control full_width"> </td>
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
				 <td colspan="6" style="text-align:center;">Note</td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->note_sup1; ?>"  name="draft_sup1_note" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->note_sup2; ?>"  name="draft_sup2_note" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->note_sup3; ?>"  name="draft_sup3_note" class="form-control full_width"   > </td>
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
				 <td colspan="6" style="text-align:center;">Validity Of Price/Quote </td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->validity_price_sup1; ?>"  name="draft_price_sup1" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->validity_price_sup2; ?>" name="draft_price_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->validity_price_sup3; ?>"  name="draft_price_sup3" class="form-control full_width"   > </td>
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
				 <td colspan="6" style="text-align:center;">REPL Scope</td>
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->repl_scope_sup1; ?>" name="draft_repl_sup1" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  value="<?php echo $rowtech->repl_scope_sup2; ?>"  name="draft_repl_sup2" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowtech->repl_scope_sup3; ?>"  name="draft_repl_sup3" class="form-control full_width"   > </td>
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


<!-- Quotation Attachments -->
 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Quotation Attachments</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				
				   <div class="form-group col-sm-12">
			        <table id="example6" class="table table">
            
		
                <tbody>
					 <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;"></td>
				 <td colspan="3"><b> <center>Final Supplier:&nbsp;&nbsp; <?php echo $row4->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b> <center>Supplier 2  :&nbsp;&nbsp; <?php echo $row4->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b> <center>Supplier 3  :&nbsp;&nbsp; <?php echo $row4->sup3_nm; ?><center></b></td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  
	
			
					  <tr>
	  
			 <td style="display:none" >  </td>
			
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;">Initial Quote</td>
				 <td colspan="3"  >  <input type="file" name="upload_data[]"class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="file" name="upload_data2[]" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="file" name="upload_data3[]" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 

	  
	  
			<tr>
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;">Final Quote</td>
				 <td colspan="3"  >  <input type="file"  name="upload_data4[]" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="file" name="upload_data5[]" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="file" name="upload_data6[]" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  <?php }  } 
				
			
				
         ?>  
				
	  
	  </tbody>
               		
              </table>
              	 <div class="form-group col-sm-12">
	 
	 <div class="col-sm-5">
	</div>
			    <div class="col-sm-4">
				  
				
  <button type="button" class="btn" style="width:60%; background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;" data-toggle="modal" data-target="#updateModel">Update Existing File</button>
                </div>
				
				<div class="col-sm-5 ">
				</div>
		</div>
	 <div class="form-group col-sm-12">
			    <div class="col-sm-5 ">
				
				
<?php $filea= $this->method_call->filefetchqcs($qcs_id); 
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
			
			
			
</div>
<!--end -->


<!-- self declaration -->


 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">5 . Self Declaration</h3>

              <div class="box-tools pull-right">
                <button type="button" onclick="sendData('<?php echo $row4->offers_received; ?>','<?php echo $row4->outside_budget; ?>','<?php echo $row4->order_value; ?>','<?php echo $row4->non_properitery_item; ?>','<?php echo $row4->properitery_item; ?>','<?php echo $row4->post_grn_nonproprietary; ?>','<?php echo $row4->post_grn_proprietary; ?>','<?php echo $row4->delivery_terms;?>','<?php echo $row4->cost_reimb_cust; ?>','<?php echo $row4->repl_cost_agreed; ?>','<?php echo $row4->advance_bg; ?>','<?php echo $row4->advance_25; ?>','<?php echo $row4->paymt_trm_grn_90; ?>','<?php echo $row4->imported_item; ?>')" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
			 <label class="pull-left control-label" style="color:red;">Common for all</label>
                </br>
				
					<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">Outside Allotted Budget </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_outside_budget" onchange="eventOfText_budget(this.value,'<?php echo $row4->outside_budget; ?>')">  
		<option value="<?php echo $row4->outside_budget; ?>"><?php echo $row4->outside_budget; ?></option>		
				 <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="just_draft_outside_budget" maxlength = "100" name="just_draft_outside_budget" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_outside_budget; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                
                

	<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Order Value > 5 lakhs </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_order_value" onchange="eventOfText_orderv(this.value,'<?php echo $row4->order_value; ?>')">  
				<option value="<?php echo $row4->order_value; ?>" ><?php echo $row4->order_value; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                </div>
				
					  <div class="form-group col-sm-4">
               
                <textarea id="just_draft_order_value"  maxlength = "100" name="just_draft_order_value" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_order_value; ?></textarea>	
			      </div>
				  
                </div>
              

				 

				
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Quotations Received < 2 Suppliers </label>
					  <div class="form-group col-sm-3">
              
				    <select class="form-control" name="draft_quotation_received" value="" onchange="eventOfText(this.value,'<?php echo $row4->offers_received; ?>')">  
		
				<option value="<?php echo $row4->offers_received; ?>" ><?php echo $row4->offers_received; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_quot_reec" maxlength = "100" name="draft_just_quot_reec" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_quot_reec; ?></textarea>	
			      </div>
				  
				
				
                </div>
				
				
				

				
				
                <label class="pull-left control-label" style="color:red;">Other than Capital</label>
                </br>

				
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Any advance for non-proprietary items  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_nonproprietery" onchange="eventOfprop_item(this.value,'<?php echo $row4->non_properitery_item; ?>')">    
		<option value="<?php echo $row4->non_properitery_item; ?>" ><?php echo $row4->non_properitery_item; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_adv_nonprop" maxlength = "100" name="draft_just_adv_nonprop" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_adv_nonproprietery; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Advance Payment > 20% for proprietary items
 </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_proprietery" onchange="eventOf_prope_item(this.value,'<?php echo $row4->properitery_item; ?>')">  
		<option value="<?php echo $row4->properitery_item; ?>" ><?php echo $row4->properitery_item; ?></option>
				 <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_adv_prop" maxlength = "100" name="draft_just_adv_prop" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_adv_proprietery; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                
           
                
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 30 days for non-proprietary  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_final_payment_grn" onchange="eventOfpost_grn_non(this.value,'<?php echo $row4->post_grn_nonproprietary; ?>')">   
					<option value="<?php echo $row4->post_grn_nonproprietary; ?>" ><?php echo $row4->post_grn_nonproprietary; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_final_pay_grn" maxlength = "100" name="draft_just_final_pay_grn" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_final_payment_grn; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 7 days for proprietary  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_final_payment_post_grn" onchange="eventOfpost_grn_prop(this.value,'<?php echo $row4->post_grn_proprietary; ?>')">   
				<option value="<?php echo $row4->post_grn_proprietary; ?>" ><?php echo $row4->post_grn_proprietary; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_final_pay_post_grn" maxlength = "100" name="draft_just_final_pay_post_grn" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_final_pymt_post_grn; ?></textarea>	
			      </div>
				  
				  
                </div>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">Delivery terms not at REPL gate  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_delivery_gate" onchange="eventOfpost_del_terms(this.value,'<?php echo $row4->delivery_terms; ?>')">   
					<option value="<?php echo $row4->delivery_terms; ?>" ><?php echo $row4->delivery_terms; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_delivery_gate" maxlength = "100" name="draft_just_delivery_gate" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_delivery_gate; ?></textarea>	
			      </div>
                </div>
                
				<!-- capex -->
				
				  <label class="pull-left control-label" style="color:red;">For CAPEX Only</label>
				<br>
				
                	 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">9</label>
			   <label class="col-sm-4 pull-left control-label"> If cost non-reimbursable by customer  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_cost_reimb_cust" onchange="eventOfpost_cost_rei(this.value,'<?php echo $row4->cost_reimb_cust; ?>')">   
		
				 <option value="<?php echo $row4->cost_reimb_cust; ?>" ><?php echo $row4->cost_reimb_cust; ?></option>
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_cost_reimb" maxlength = "100" name="draft_just_cost_reimb" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_cost_reimb_cust; ?></textarea>	
			      </div>
                </div>
				
				
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">10</label>
			   <label class="col-sm-4 pull-left control-label">REPL cost > customer agreed reimbursement  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_repl_cost_agreed" onchange="eventOf_repl_cost(this.value,'<?php echo $row4->repl_cost_agreed; ?>')">   
		
				  <option value="<?php echo $row4->repl_cost_agreed; ?>" ><?php echo $row4->repl_cost_agreed; ?></option>
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                                 
    
                </div>
				 <div class="form-group col-sm-4">
               
                <textarea id="draft_just_repl_cost_agreed"  maxlength = "100" name="draft_just_repl_cost_agreed" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_repl_cost_agree; ?></textarea>	
			      </div>  
                </div>
				
				
				
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">11</label>
			   <label class="col-sm-4 pull-left control-label">Advance Payment > Rs. 2 Lakhs without BG  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_payment_bg" onchange="eventOf_advance_bg(this.value,'<?php echo $row4->advance_bg; ?>')">   
		
				 <option value="<?php echo $row4->advance_bg; ?>" ><?php echo $row4->advance_bg; ?></option> 
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                                   
    
                </div>
				
				 <div class="form-group col-sm-4">
               
                <textarea id="draft_just_adva_pay_bg" maxlength = "100" name="draft_just_adva_pay_bg" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_adv_pymt_bg; ?></textarea>	
			      </div>
                </div>
                
                
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">12</label>
			   <label class="col-sm-4 pull-left control-label">Advance of > 25%</label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_25" onchange="eventOf_advance_25(this.value,'<?php echo $row4->advance_25; ?>')">    
		
				 <option value="<?php echo $row4->advance_25; ?>" ><?php echo $row4->advance_25; ?></option>  
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                                   
    
                </div>
				
				 <div class="form-group col-sm-4">
               
                <textarea id="draft_just_advance_25" maxlength = "100" name="draft_just_advance_25" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_advance_25; ?></textarea>	
			      </div>
                </div>
				
				
				
				
				  <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">13</label>
			   <label class="col-sm-4 pull-left control-label">Payment terms > 90% before GRN </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_paymt_trm_grn_90" onchange="eventOf_trm_grn_90(this.value,'<?php echo $row4->paymt_trm_grn_90; ?>')">    
		
				  <option value="<?php echo $row4->paymt_trm_grn_90; ?>" ><?php echo $row4->paymt_trm_grn_90; ?></option>  
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
                            
    
                </div>
				
					 <div class="form-group col-sm-4">
               
                <textarea id="draft_just_paymt_trm_grn_90" maxlength = "100" name="draft_just_paymt_trm_grn_90" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_paymt_trm_grn_90; ?></textarea>	
			      </div>
				  
				  
                </div>
               
			   
				  <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">14</label>
			   <label class="col-sm-4 pull-left control-label">Imported items </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_imported_item" onchange="eventOf_imported_item(this.value,'<?php echo $row4->imported_item; ?>')">    
		
				  <option value="<?php echo $row4->imported_item; ?>" ><?php echo $row4->imported_item; ?></option>  
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                                   
    
                </div>
				
					 <div class="form-group col-sm-4">
               
                <textarea id="draft_just_imported_item" maxlength = "100" name="draft_just_imported_item" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->just_imported_item; ?></textarea>	
			      </div>
                </div>
               
				
				
			 </div>
            </div>
			
			
			
</div>
<!--end -->
		
			<!-- condition -->
				<?php
					if($row4->pr_type == '13' && ($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->non_properitery_item == 'YES'||$row4->properitery_item == 'YES'||$row4->post_grn_proprietary == 'YES'||$row4->post_grn_nonproprietary == 'YES'||$row4->delivery_terms == 'YES'))
					{
						?>
	        	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			

						<!-- approval 3 -->
		<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
				<?php
				}
				
					else if($row4->pr_type == '13' && $row4->outside_budget == 'NO' && $row4->order_value == 'NO' && $row4->offers_received == 'NO' && $row4->non_properitery_item == 'NO' && $row4->properitery_item == 'NO' && $row4->post_grn_proprietary == 'NO' && $row4->post_grn_nonproprietary == 'NO' && $row4->delivery_terms == 'NO' )
					{
						?>
						
						
						 	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			

					<!-- approval 3 -->
	
		<input type="hidden" name="sourcing_approval3" value="<?php echo 'NULL'; ?> " class="form-control">
		
						
						
		
				<?php
				}
					
					else if($row4->pr_type == '1' &&($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->cost_reimb_cust == 'YES'||$row4->repl_cost_agreed == 'YES'||$row4->advance_bg == 'YES'||$row4->advance_25 == 'YES'||$row4->paymt_trm_grn_90 == 'YES'||$row4->imported_item == 'YES'))
					{
						?>
						
						 	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			
	<!-- approval 3 -->
						
						<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
					<!-- approval 4 -->
			<?php $sourcing_approval4= $this->method_call->fetch_sourcing_approval4($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval4" value="<?php print_r($sourcing_approval4['approval_level4']);?>" class="form-control">
				</div> 

		
							<!-- approval 5 -->
		<?php $sourcing_approval5= $this->method_call->fetch_sourcing_approval5($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval5" value="<?php print_r($sourcing_approval5['approval_level5']);?>" class="form-control">
		
		<?php 
		}
			
				else if($row4->pr_type == '6' &&($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->cost_reimb_cust == 'YES'||$row4->repl_cost_agreed == 'YES'||$row4->advance_bg == 'YES'||$row4->advance_25 == 'YES'||$row4->paymt_trm_grn_90 == 'YES'||$row4->imported_item == 'YES'))
					{
						?>
						
						 	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			

	<!-- approval 3 -->
						
						<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
					<!-- approval 4 -->
			<?php $sourcing_approval4= $this->method_call->fetch_sourcing_approval4($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval4" value="<?php print_r($sourcing_approval4['approval_level4']);?>" class="form-control">
				</div> 

		
							<!-- approval 5 -->
		<?php $sourcing_approval5= $this->method_call->fetch_sourcing_approval5($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval5" value="<?php print_r($sourcing_approval5['approval_level5']);?>" class="form-control">
		
		<?php 
		}
		
		
			else if($row4->pr_type == '8' &&($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->cost_reimb_cust == 'YES'||$row4->repl_cost_agreed == 'YES'||$row4->advance_bg == 'YES'||$row4->advance_25 == 'YES'||$row4->paymt_trm_grn_90 == 'YES'||$row4->imported_item == 'YES'))
					{
						?>
						 	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			
		<!-- approval 3 -->
						<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
					<!-- approval 4 -->
			<?php $sourcing_approval4= $this->method_call->fetch_sourcing_approval4($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval4" value="<?php print_r($sourcing_approval4['approval_level4']);?>" class="form-control">
				</div> 

		
							<!-- approval 5 -->
		<?php $sourcing_approval5= $this->method_call->fetch_sourcing_approval5($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval5" value="<?php print_r($sourcing_approval5['approval_level5']);?>" class="form-control">
		
		<?php 
		}
		
			else if($row4->pr_type != '13' && $row4->outside_budget == 'NO' && $row4->order_value == 'NO' && $row4->offers_received == 'NO' && $row4->cost_reimb_cust == 'NO' && $row4->repl_cost_agreed == 'NO' && $row4->advance_bg == 'NO' && $row4->advance_25 == 'NO' && $row4->paymt_trm_grn_90 == 'NO' && $row4->imported_item == 'NO' )
					{
						?>
						
						 	<!-- approval 1 -->
	<?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  >
		
					<!-- approval 2 -->
			<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  >
			

						
						<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
					<!-- approval 4 -->
			<?php $sourcing_approval4= $this->method_call->fetch_sourcing_approval4($row4->pr_type); ?>
			<input type="hidden" name="sourcing_approval4" value="<?php print_r($sourcing_approval4['approval_level4']);?>" class="form-control">
				

							
		<?php 
		}
		
		
				else
				{
					?>
				
			<?php	}
					
				?>
			<!-- end -->
				
 <div class="form-group col-sm-12">
			  <br>
				<br>
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Additional Details (Attachments) </label>
				<div class="input-group  col-sm-6">
                 
                        <input type="file" class="form-control" name="additional_attachment"/>
                         <input type="hidden" class="form-control" value="<?php echo $row4->additional_attachment ?>" name="attachment_check"/>
                </div>
				 <div class="col-sm-5 pull-right">
        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/additional_attachment/". $row4->additional_attachment ?>"> <?php echo $row4->additional_attachment ?></a> </b>
              </div>
                </div>
				
		
				
				
				
				<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier </label>
				<div class="input-group  col-sm-6" style="color:#1E8449;">

                 <input type="text" name="draft_select_sup" style="background-color:#E6F2FF;" readonly value="<?php print_r($row4->sup1_nm);?>" class="form-control"  >
                 
                           <!--        <select class="form-control" name="draft_select_sup" value="" >  
				 <option value="<?php echo $row4->selected_supplier; ?>" ><?php echo $row4->selected_supplier; ?></option>
				 <option value="<?php echo $row4->sup1_nm; ?>" ><?php echo $row4->sup1_nm; ?></option>
				 <option value="<?php echo $row4->sup2_nm; ?>" ><?php echo $row4->sup2_nm; ?></option>
				  <option value="<?php echo $row4->sup3_nm; ?>" ><?php echo $row4->sup3_nm; ?></option>
				 </select>	-->
               
                                   
    
                </div>
                </div>
				
					<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">Justification for Selection of Supplier</label>
				<div class="input-group  col-sm-6">
				
				 <textarea class="form-control" name="draft_select_sup_justi"  maxlength="250" rows="5" name="comment" id="comment"><?php echo $row4->justification_supplier; ?> </textarea>
                 <div id="the-count">
					<span id="current">0</span>
					<span id="maximum">/ 250</span>
				 </div>
                          
				
			<!--	 <input type="text" style="height:80px;"  name="draft_select_sup_justi" value="<?php echo $row4->justification_supplier; ?>" class="form-control"  required>
                 
                   -->                   

         
                </div>
                </div>
				
				
								<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">9</label>
			 <label class="col-sm-4 pull-left control-label">Action</label>
			   <div class="input-group  col-sm-5 pull-left"><input type="radio" name="qcs_state" value="Qcs_Draft" required >&nbsp;  Save as Draft</input>
				
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <input type="radio" name="qcs_state" value="submited_Sourcing_Mgr"> &nbsp;Submit for Approval</input>
</div>
         
                </div>
               
				
			
				
				
				    <div class="box-footer">
			   		   

		
		 <input type="hidden" readonly name="qcs_emp_nm" value="<?php echo $emp_name; ?>" class="form-control"  required>
				
			  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
				
<div class="col-sm-2"><button type="submit" id="" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a></div>
				
				
				<div class="col-sm-4">
				</div>
				
                </div>
				
				
						<!-- Sourcing mgr EID-->
								 <div class="form-group col-sm-4 hidden ">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email sourcing mgr</label>
				<div class="input-group  col-sm-6">
               
				  
  <?php $eid_owner= $this->method_call->fetchemp_email($row4->approval_level1); ?>
  <input type="text" name="sourcing_head_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>


                </div>
                
                		
                </div>	
				
				
							<!-- Pr owner EID-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email PR owner</label>
				<div class="input-group  col-sm-6">
               
			  
  <?php $eid_owner= $this->method_call->fetchemp_email($row4->pr_owner_empcode); ?>
  <input type="text" name="pr_owner_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>


                </div>
                
                		
                </div>
				
				
				
						<!-- Pr owner EID-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Name PR owner</label>
				<div class="input-group  col-sm-6">
               
			  
   <?php $eid_owner= $this->method_call->emp_name_pr($row4->pr_owner_empcode); ?>
  <input type="text" name="emp_email" value="<?php print_r($eid_owner['emp_name']); ?>" readonly  class="form-control"  required>


                </div>
                
                		
                </div>
				
				
	</div>
				
</form>
				
				 
				  <?php }
 } ?>		
	

	</section>
	
	<div class="modal fade displaycontent" id="myModal">

<div class="modal-dialog" role="document" style="width:1250px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add New Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			
			<form method="post" id="" action="<?php echo site_url('purchase/QCS/draft_add_item') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_prid" placeholder="" value="<?php echo $row4->pr_id; ?>" readonly class="form-control"  required></td>

      <input type="hidden" name="" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
   
      <input type="hidden" name="tempqcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required></td>
	   
                  
 <input class="form-control" type="hidden"id="textboxid" name="pr_itemid"/>	


	 
				  <div class="form-group col-md-4">
                    <label >Item Code</label>
			<select class="form-control" id="item_code" name="item_code" >
					<option value="">Select Item From PR items</option>
					
			 <?php $item= $this->method_call->list_items_qcs($qcs_id);
 if($item!=null){
			  
foreach ($item->result() as $row8) 
 
         {  ?>
		 	 <option value="<?php echo $row8->item_id ; ?>" data-time='<?php echo $row8->item_code ; ?>' data-time1='<?php echo $row8->item_description ; ?>' data-time2='<?php echo $row8->req_qty ; ?>' data-time3='<?php echo $row8->uom ; ?>'><?php echo $row8->item_code; ?></option>
			 
		
			
		 <?php 
		 }
 } ?>
      
					</select>
	 	</div>
		
		 
		
 
 			  <div class="form-group col-md-4">
                    <label >Item Description</label>
					<!--
			<select class="form-control" id="item_description"  name="item_description" >
			
					<option value="">Select Description</option>
			 <?php $item= $this->method_call->list_items_qcs($qcs_id);
 if($item!=null){
			  
foreach ($item->result() as $row8)  
         {  ?>
		 <option value="<?php echo $row8->item_id; ?>"><?php echo $row8->item_description; ?></option>
			
		 <?php  }
 } ?>
      
					</select>
					-->
					
					 <input class="form-control" type="text" name="item_description" id="item_description" required value=""data-validation-required-message="Please enter Item Description."/>	
	 	</div>
		
		
		
 			  <div class="form-group col-md-4">
                    <label >Item Specification</label>
				 <input class="form-control" type="text" name="item_specification" id="item_specification"  required data-validation-required-message="Please enter Item Specification."/>	
					 
	 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="qty" id="qty" style="background-color:#E6F2FF;" readonly required data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  
  <div class="form-group col-md-4">
                    <label >UOM</label>
 <input class="form-control" type="text" style="background-color:#E6F2FF;"  readonly name="uom" id="uom_item" required data-validation-required-message="Please enter UOM."/>		
 </div>

	 <div class="form-group col-md-4" style="float: right;">
                    <label >HSN Code</label>
 <input class="form-control" type="text" name="hsn_code" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>	
 </div>		
			
		
<div class="form-group col-md-4">
                    <label >Supplier Name</label>
</div>			
<div class="form-group col-md-2">
                    <label >QUOTED Rates</label>
</div>

<div class="form-group col-md-2">
                    <label >Quoted  Amt</span></label>
 	 	</div>
		
		
<div class="form-group col-md-2">
                    <label >Final Rates</span></label>
 	 	</div>
 
<div class="form-group col-md-2">
                    <label >Final Amt</label>
 	 	</div>


 
 <!-- supplier1 -->
 <div class="form-group col-md-4">
                    <label >1. <?php echo $row4->sup1_nm; ?></label>
</div>	
		
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate1"  onkeyup="mul();"  id ="quot_rate1" value=""  />	
 </div>
 
 
  <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="quot_amt1" id="quot_amt1"   value=""  />	
 </div>
 
 
 
 <div class="form-group col-md-2">
                 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate1" id= "final_rate1" onkeyup="mulfinal_amt();"  value=""  />		
				 </div>
				 
				 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount1" id="amount1"  value="" />	
 </div>
 
 <!--	<div class="form-group col-md-12">
                    <center><b><h4 >Supplier 2 </h4></b></center>
  	</div>-->
			
	<div class="form-group col-md-4">
                    <label > 2. <?php echo $row4->sup2_nm; ?></label>
	 	</div>			
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate2" id="quot_rate2" onkeyup="mul_quat2();"  value=""  />
 </div>
 
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="quot_amt2" id="quot_amt2" value=""  />	
 </div>
 
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate2" id="final_rate2"  onkeyup="mul_final_quat2();"  value="" />		 	</div>
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount2" id="amount2" value=""     />		 	</div>


 
 
 <!-- Supplier 3-->
 
 	<div class="form-group col-md-4">
 <label > 3.<?php echo $row4->sup3_nm; ?></label>
  	</div>
			
			
<div class="form-group col-md-2">
                  
 <input class="form-control" type="number" onkeyup="mul_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate3" id="quot_rate3" value=""  />	
 </div>
 
 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="quot_amt3" id="quot_amt3" value=""  />	
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" onkeyup="mul_final_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate3"  id="final_rate3" value=""     />
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount3"  id="amount3" value=""     />
 </div>

 
  <center><button type="submit" class="btn" style="width: 10%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Item</button>
</center>
		</div>
		</form>
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end -->
  <!-- Add custom item in draft -->
	<div class="modal fade displaycontent" id="AddCustomModal">

<div class="modal-dialog" role="document" style="width:1300px;">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
       <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Custom Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			
			<form method="post" id="" action="<?php echo site_url('purchase/QCS/draft_add_item') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_prid" placeholder="" value="<?php echo $row4->pr_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required></td>

      <input type="hidden" name="" placeholder="" value="<?php echo $emp_code; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required></td>
   
      <input type="hidden" name="tempqcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required></td>
	   
                  
 <input class="form-control" type="hidden"id="textboxid1" name="item_code"/>	


	 
				  <div class="form-group col-md-4">
                    <label >Item Code</label>
					
					<input class="form-control" type="text" name="pr_itemid" id="item_code" required value=""data-validation-required-message="Please enter Item Code."/>	
					
		
	 	</div>
		
		 
		
 
 			  <div class="form-group col-md-4">
                    <label >Item Description</label>
				
					
					 <input class="form-control" type="text" name="item_description" id="item_description" required value=""data-validation-required-message="Please enter Item Description."/>	
	 	</div>
		
		
		
 			  <div class="form-group col-md-4">
                    <label >Item Specification</label>
				 <input class="form-control" type="text" name="item_specification"  required data-validation-required-message="Please enter Item Specification."/>	
					 
	 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="qty" id="custom_qty" required value=""data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

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
 <input class="form-control" type="text" name="hsn_code" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>	
 </div>		
			
		
<div class="form-group col-md-4">
                    <label >Supplier Name</label>
</div>			
<div class="form-group col-md-2">
                    <label >QUOTED Rates</label>
</div>

<div class="form-group col-md-2">
                    <label >Quoted  Amt</span></label>
 	 	</div>
		
		
<div class="form-group col-md-2">
                    <label >Final Rates</span></label>
 	 	</div>
 
<div class="form-group col-md-2">
                    <label >Final Amt</label>
 	 	</div>


 
 <!-- supplier1 -->
 <div class="form-group col-md-4">
                    <label >1. <?php echo $row4->sup1_nm; ?></label>
</div>	
		
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate1"  onkeyup="custom_mul();"  id ="custom_quot_rate1" value=""  />	
 </div>
 
 
  <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="quot_amt1" id="custom_quot_amt1"   value=""  />	
 </div>
 
 
 
 <div class="form-group col-md-2">
                 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate1" id= "custom_final_rate1" onkeyup="custom_mulfinal_amt();"  value=""  />		
				 </div>
				 
				 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount1" id="custom_amount1"  value="" />	
 </div>
 
 <!--	<div class="form-group col-md-12">
                    <center><b><h4 >Supplier 2 </h4></b></center>
  	</div>-->
			
	<div class="form-group col-md-4">
                    <label > 2. <?php echo $row4->sup2_nm; ?></label>
	 	</div>			
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate2" id="custom_quot_rate2" onkeyup="custom_mul_quat2();"  />
 </div>
 
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly  required name="quot_amt2" id="custom_quot_amt2"   />	
 </div>
 
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate2" id="custom_final_rate2"  onkeyup="custom_mul_final_quat2();"  value="" />		 	</div>
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount2" id="custom_amount2" value=""     />		 	</div>


 
 
 <!-- Supplier 3-->
 
 	<div class="form-group col-md-4">
 <label > 3.<?php echo $row4->sup3_nm; ?></label>
  	</div>
			
			
<div class="form-group col-md-2">
                  
 <input class="form-control" type="number" onkeyup="custom_mul_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate3" id="custom_quot_rate3" value=""  />	
 </div>
 
 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="quot_amt3" id="custom_quot_amt3" value=""  />	
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" onkeyup="custom_mul_final_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate3"  id="custom_final_rate3" value=""     />
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" style="background-color:#E6F2FF;" readonly required name="amount3"  id="custom_amount3" value=""     />
 </div>

 
 <center> <button type="submit" class="btn" style="width: 15%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Custom Item</button>
</center>
		</div>
		</form>
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end -->
  <!-- view modal -->

<div class="modal fade displaycontent" id="myModalEdit">

<div class="modal-dialog" role="document" style="width:1250px;">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
         <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			<!--
						  <form method="post" id="" action="<?php echo site_url('purchase/QCS/add_item') ?>" >
-->

            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table">
                <thead>
					<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
			 
			 
         
                  <th style="border:none;">Sr. No.</th>
				   <th style="border:none;">Item Code</th>
				   
				   <th style="border:none;">HSN Code</th>
				   <th style="border:none;">Item Descriptions</th>
				   <th style="border:none;">Qty.</th>
				   <th style="border:none;">UOM</th>
				 <th style="border:none;" colspan="4" > 1. <?php echo $row4-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" style="border:none;" > 2. <?php echo $row4-> sup2_nm; ?>  <center></th>
				 <th colspan="4" style="border:none;"> 3. <?php echo $row4-> sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr >
                				 <th colspan="6" ></th>

			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			<th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			  <th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>
			<th style="border:none;">  QUOTED Amt </th>  			
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th> 
			 			
				  
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
			
				 
			<td  style="border:none;"><?php echo $sr_no; ?> </td>
			 <td  style="border:none;"><?php echo $rowitem->q_item_code; ?></td> 
				 	<!--<td  ><?php print_r($item_nm['item_code']); ?></td> -->
					
				<td style="border:none;"> <?php echo $rowitem->q_hsn_code; ?></td>  				 
            <td style="border:none;">  <?php echo $rowitem->q_item_description; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->q_req_quantity; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->q_uom; ?></td>  
            <td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate1; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt1; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate1; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt1; ?> </td>  
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate2; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt2; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate2; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt2; ?> </td>
			
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate3; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt3; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate3; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt3; ?> </td>

			
		
		
		
		
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
            <td style="text-align:center;" colspan="7"><b>Grand Total:</b></td>
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

  <!-- EDIT delete item -->


<div class="modal fade displaycontent" id="myModalEditDelete">

<div class="modal-dialog" role="document" style="width:1250px;">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit/Delete Item in QCS</h4>
      </div>
      <div class="modal-body">
    
			
			  
	  <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			<!--
						  <form method="post" id="" action="<?php echo site_url('purchase/QCS/add_item') ?>" >
-->

            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table">
                <thead>
					<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
			 
			 
           <th style="border:none;"> </th>
                  <th style="border:none;">Sr. No.</th>
				   <th style="border:none;">Item Code</th>
				   
				   <th style="border:none;">HSN Code</th>
				   <th style="border:none;">Item Descriptions</th>
				   <th style="border:none;">Qty.</th>
				   <th style="border:none;">UOM</th>
				 <th colspan="4" style="border:none;"> 1. <?php echo $row4-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" style="border:none;"> 2. <?php echo $row4-> sup2_nm; ?>  <center></th>
				 <th colspan="4" style="border:none;"> 3. <?php echo $row4-> sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr >
                				 <th colspan="7" style="text-align:center;"></th>

			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			<th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			  <th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>
			<th style="border:none;">  QUOTED Amt </th>  			
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th> 
			 			
				  
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
			 <td style="width:5%;"><p style="color:red;">
				<a href="<?php echo site_url('purchase/QCS/qcs_edit_del_item/'.$rowitem->qcs_item_id);?>"style="color:red;"><span class="glyphicon glyphicon-edit" style="color:red;"> <?php echo $rowitem->qcs_item_id;?></span></a>
				</p>
				</td> 
			<td style="border:none;"><?php echo $sr_no; ?> </td>
			 <td style="border:none;"><?php echo $rowitem->q_item_code; ?></td> 
				 	<!--<td  ><?php print_r($item_nm['item_code']); ?></td> -->
					
				<td> <?php echo $rowitem->q_hsn_code; ?></td>  				 
            <td style="border:none;">  <?php echo $rowitem->q_item_description; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->q_req_quantity; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->q_uom; ?></td>  
            <td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate1; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt1; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate1; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt1; ?> </td>  
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate2; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt2; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate2; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt2; ?> </td>
			
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->quot_rate3; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->quoted_amt3; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->final_rate3; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->final_amt3; ?> </td>

			
		
		
		
		
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
            <td style="text-align:center;" colspan="8"><b>Grand Total:</b></td>
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
  <!-- end -->

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
			
	  <?php $qcs_detail= $this->method_call->qcs_detail_steptwo($qcs_id);
 if($qcs_detail!=null){
	 foreach ($qcs_detail->result() as $row_pr)  
         {  ?>
		 
            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row_pr->pr_id; ?>" required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row_pr->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;"  readonly value="<?php echo $row_pr->plant_code; ?>" required>  
						
                </div>
                </div>
				
				
				
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($row_pr->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php echo $row_pr->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-6 pull-left control-label">7  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	


	    <div class="form-group col-sm-12">
			        <table id="exam" class="table table">
                <thead>
            <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th ></th>
                  
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
				
	 

				
				  <?php $item= $this->method_call->list_items_pr($qcs_id);
				  $final_rate=0;
 if($item!=null){
	 	   				
	$sr_no=1;			  
foreach ($item->result() as $row3)  
         {  ?>
			<tr>
				<td></td>
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $row_pr->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row_pr->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row_pr->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row_pr->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row_pr->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row_pr->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row_pr->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
			<div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row_pr->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-5 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
                   <?php echo $row_pr->procurement_res;  ?>

         
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
 <?php 
		 }
 }
 ?>
  <!-- end --->



<!-- Modal -->
  <div class="modal fade" id="updateModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       <div class="modal-header" style="background-color:#3482AE">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Update File</h4>
        </div>
        <div class="modal-body">
           <table id="example" class="table table">
                <thead>
					
				
			
               <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                				
				
				<th> File No</th>
				<th> File </th>	
				<th>Update </th>
				<th>Delete </th>				
				
				
                </tr>  
			
				
                </thead>
				

              
                <tbody>
				
				<?php $filea= $this->method_call->filefetchqcs($qcs_id); 
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
	<tr>
	
<td><?php echo $rowfile->f_qcs_id; ?></td>	
<td>  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('purchase/QCS/updateItemCode'); ?>">
 
 <input type="hidden" name="qcs_file_id" id="qcs_item_id" class="form-control" value=" <?php echo $rowfile->f_qcs_id; ?>">
<input type="hidden" name="qcs_folder_Name"  class="form-control" value=" <?php echo $rowfile->qcs_id; ?>">
 <input class="form-control" type="file" name="picture" /> <?php echo $rowfile->qcs_file_nm;?></td>
 <td><button type="submit" name="save"  class="btn btn-success" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-pencil-square-o"></i></button></td>
  </form>
 

   <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('purchase/QCS/draftDeleteFile/'.$rowfile->f_qcs_id); ?>">
  <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button>
  </td>
</tr>
 <?php }
 } ?>

                
				</tbody>

               		
              </table>
			  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="width: 10%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!--end -->
  <!--end -->
  	   <?php include_once 'scripts.php'; ?>
<script>

$('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 140) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
</script>

<script>
	function sendData(para,para2,para3,para4,para5,para6,para7,para8,para9,para10,para11,para12,para13,para14){
//quot_reec		
		 if(para == 'YES'){
			 
			  document.getElementById("draft_just_quot_reec").style.visibility='visible';
			  
		  }
		  else if(para == 'NO'){
			   
			  document.getElementById("draft_just_quot_reec").style.visibility='hidden';
			    
		  }
//outside_budget		  
		  if(para2 == 'YES'){
			 
			  
			   document.getElementById("just_draft_outside_budget").style.visibility='visible';
		  }

		  else if(para2 == 'NO'){
			   
			
			    document.getElementById("just_draft_outside_budget").style.visibility='hidden';
		  }
//Order Value		  
		  if(para3 == 'YES'){
			   document.getElementById("just_draft_order_value").style.visibility='visible';
		  }
		  else if(para3 == 'NO'){
			   document.getElementById("just_draft_order_value").style.visibility='hidden';
		  }
		  //non-proprietary item
		  if(para4 == 'YES'){
			   document.getElementById("draft_just_adv_nonprop").style.visibility='visible';
		  }
		  else if(para4 == 'NO'){
			   document.getElementById("draft_just_adv_nonprop").style.visibility='hidden';
		  }
//advance prop   
		   if(para5 == 'YES'){
			   document.getElementById("draft_just_adv_prop").style.visibility='visible';
		  }
		  else if(para5 == 'NO'){
			   document.getElementById("draft_just_adv_prop").style.visibility='hidden';
		  }
		  
//draft_just_final_pay_grn
		   if(para6 == 'YES'){
			   document.getElementById("draft_just_final_pay_grn").style.visibility='visible';
		  }
		  else if(para6 == 'NO'){
			   document.getElementById("draft_just_final_pay_grn").style.visibility='hidden';
		  }
		  
//		  
	 if(para7 == 'YES'){
			   document.getElementById("draft_just_final_pay_post_grn").style.visibility='visible';
		  }
		  else if(para7 == 'NO'){
			   document.getElementById("draft_just_final_pay_post_grn").style.visibility='hidden';
		  }	

//para8	
		if(para8 == 'YES'){
			   document.getElementById("draft_just_delivery_gate").style.visibility='visible';
		  }
		  else if(para8 == 'NO'){
			   document.getElementById("draft_just_delivery_gate").style.visibility='hidden';
		  }	
		  
//para9	

			if(para9 == 'YES'){
			   document.getElementById("draft_just_cost_reimb").style.visibility='visible';
		  }
		  else if(para9 == 'NO'){
			   document.getElementById("draft_just_cost_reimb").style.visibility='hidden';
		  }	
//para10
			
			if(para10 == 'YES'){
			   document.getElementById("draft_just_repl_cost_agreed").style.visibility='visible';
		  }
		  else if(para10 == 'NO'){
			   document.getElementById("draft_just_repl_cost_agreed").style.visibility='hidden';
		  }	

//para11

			
			if(para11 == 'YES'){
			   document.getElementById("draft_just_adva_pay_bg").style.visibility='visible';
		  }
		  else if(para11 == 'NO'){
			   document.getElementById("draft_just_adva_pay_bg").style.visibility='hidden';
		  }	

//para12	


			if(para12 == 'YES'){
			   document.getElementById("draft_just_advance_25").style.visibility='visible';
		  }
		  else if(para12 == 'NO'){
			   document.getElementById("draft_just_advance_25").style.visibility='hidden';
		  }	

//para13
		if(para13 == 'YES'){
			   document.getElementById("draft_just_paymt_trm_grn_90").style.visibility='visible';
		  }
		  else if(para13 == 'NO'){
			   document.getElementById("draft_just_paymt_trm_grn_90").style.visibility='hidden';
		  }	


//para14	

			if(para14 == 'YES'){
			   document.getElementById("draft_just_imported_item").style.visibility='visible';
		  }
		  else if(para14 == 'NO'){
			   document.getElementById("draft_just_imported_item").style.visibility='hidden';
		  }	

	  
	  
	}
	</script>
	
	  <script>
//3 .quot_reec	  
	  function eventOfText(result,offers_received){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_quot_reec").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_quot_reec").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	 
//outside budget	 
	  	  function eventOfText_budget(result,outside_budget){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("just_draft_outside_budget").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("just_draft_outside_budget").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
	  
 //order value 
 
 	  function eventOfText_orderv(result,order_value){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("just_draft_order_value").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("just_draft_order_value").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	

 //eventOfprop_item
 
 	  function eventOfprop_item(result,non_properitery_item){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_adv_nonprop").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_adv_nonprop").style.visibility='hidden';
			  
		  }
		  
			  
	  }	
	  
 //properitery_item
 
  
 	  function eventOf_prope_item(result,properitery_item){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_adv_prop").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_adv_prop").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
	  
	  
	  //eventOfpost_grn_non
	  function eventOfpost_grn_non(result,post_grn_nonproprietary){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_final_pay_grn").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_final_pay_grn").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
//post_grn_proprietary
function eventOfpost_grn_prop(result,post_grn_proprietary){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_final_pay_post_grn").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_final_pay_post_grn").style.visibility='hidden';
			  
		  }
		  
			  
	  }


//eventOfpost_del_terms
function eventOfpost_del_terms(result,delivery_terms){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_delivery_gate").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_delivery_gate").style.visibility='hidden';
			  
		  }
		  
			  
	  }
//cost_reimb_cust
function eventOfpost_cost_rei(result,cost_reimb_cust){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_cost_reimb").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_cost_reimb").style.visibility='hidden';
			  
		  }
		  
			  
	  }	

//eventOf_repl_cost
function eventOf_repl_cost(result,repl_cost_agreed){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_repl_cost_agreed").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_repl_cost_agreed").style.visibility='hidden';
			  
		  }
		  
			  
	  }	
//eventOf_advance_bg
function eventOf_advance_bg(result,advance_bg){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_adva_pay_bg").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_adva_pay_bg").style.visibility='hidden';
			  
		  }
		  
			  
	  }	
//draft_just_advance_25
function eventOf_advance_25(result,advance_25){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_advance_25").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_advance_25").style.visibility='hidden';
			  
		  }
		  
			  
	  }	
//eventOf_trm_grn_90
function eventOf_trm_grn_90(result,paymt_trm_grn_90){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_paymt_trm_grn_90").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_paymt_trm_grn_90").style.visibility='hidden';
			  
		  }
		  
			  
	  }

//eventOf_imported_item
function eventOf_imported_item(result,imported_item){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_imported_item").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_imported_item").style.visibility='hidden';
			  
		  }
		  
			  
	  }	  
	  </script> 
<script>

function mul() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('quot_amt1').value = setResult;
      }
}
</script>


<!--sup  final rate 1 -->
<script>
function mulfinal_amt() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('amount1').value = setResult;
      }
}
</script>


<!-- quoted 2 -->
<script>

function mul_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);    
      if (!isNaN(result)) {
         document.getElementById('quot_amt2').value = setResult;
      }
}
</script>


<!--sup  final rate 2 -->
<script>
function mul_final_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('amount2').value = setResult;
      }
}
</script>




<!-- quoted 3 -->
<script>

function mul_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('quot_amt3').value = setResult;
      }
}
</script>


<!--sup  final rate 3 -->
<script>
function mul_final_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('amount3').value = setResult;
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
	<!-- custom item calculations -->
<script>

function custom_mul() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_quot_amt1').value = setResult;
      }
}
</script>


<!--sup  final rate 1 -->
<script>
function custom_mulfinal_amt() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_amount1').value = setResult;
      }
}
</script>

<!-- quoted 2 -->
<script>

function custom_mul_quat2() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_quot_amt2').value = setResult;
      }
}
</script>


<!--sup  final rate 2 -->
<script>
function custom_mul_final_quat2() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_amount2').value = setResult;
      }
}
</script>




<!-- quoted 3 -->
<script>

function custom_mul_quat3() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_quot_amt3').value = setResult;
      }
}
</script>


<!--sup  final rate 3 -->
<script>
function custom_mul_final_quat3() {
      var txtFirstNumberValue = document.getElementById('custom_qty').value;
      var txtSecondNumberValue = document.getElementById('custom_final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('custom_amount3').value = setResult;
      }
}
</script>

<script type="text/javascript">
$('#item_code').on('change',function(e){
        $('#textboxid').val($(this).children(':selected').attr('data-time'))
		$('#item_description').val($(this).children(':selected').attr('data-time1'))
		$('#qty').val($(this).children(':selected').attr('data-time2'))
		$('#uom_item').val($(this).children(':selected').attr('data-time3'))
    });
	</script>  
<script type="text/javascript">
$('#item_code_draft').on('change',function(e){
          $('#textboxid').val($(this).children(':selected').attr('data-time'))
	
    });
	</script> 	
	
	
	<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
       
        e.preventDefault();
        $.ajax({
             alert("in ......");
            url:'<?php echo base_url() ?>/purchase/QCS/updateItemCode',
            type:'POST',
            dataType:'json',
            data: $("#frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#frmupdate')[0].reset();
                $("#response").html(mydata['success']);
                
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});

    
</script>   
</body>
</html>