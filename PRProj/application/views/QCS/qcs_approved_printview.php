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
 QCS View
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

<li class="active" style="color:#FFFFFF;text-transform: uppercase;"> QCS View
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
		 
		            	 <!-- QCS Detail -->
 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . QCS Detail</h3>

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
                 
               
               <input type="text" name="" value="<?php echo $row4->qcs_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				
				
				
				
				
				
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">2</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
	 <input type="text" class="form-control" readonly name="qcs_date" style="background-color:#E6F2FF;" readonly value ="<?php echo $row4->qcs_date; ?>" >
  
         
                </div>
                </div>
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
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
    <input type="text" style="background-color:#E6F2FF;" readonly name="qcs_owner_nm" value="<?php echo $row4->qcs_owner; ?>" class="form-control"  required>              

	 
    
         
                </div>
                </div>
				
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
    <input type="text" style="background-color:#E6F2FF;" readonly name="pr_code" value="<?php echo $row4->plant_code; ?> " class="form-control"  required>              

    
         
                </div>
                </div>
				
				
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
			  <input type="hidden" value="<?php echo $row4->pr_type; ?>" readonly  style="background-color:#E6F2FF;"  name="" class="form-control"  required>
  
  <?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
  <input type="text" name="" value="<?php print_r($pt_name['pt_name']); ?>" readonly style="background-color:#E6F2FF;"  class="form-control"  required>

 

          
         
                </div>
                </div>
				
		
				 <div class="form-group col-sm-4 ">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Fund NO/ION NO</label>
				<div class="input-group  col-sm-6">
					<?php $ionno= $this->method_call->fetch_ion_no($row4->pr_id);?>
   


<input type="text" name="" value="<?php echo $ionno;?>" readonly style="background-color:#E6F2FF;"  class="form-control"  required>   
         
                </div>
                </div>	
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
        <input type="hidden" style="background-color:#E6F2FF;" readonly name="pr_id" value="<?php echo $row4->pr_id; ?>" class="form-control"  required>
        
        <p style="color:#ff0000;font-size:15px;">  
	<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#pr_view_Modal"href="#pr_view_Modal<?php echo $row4->pr_id?>">&nbsp;<?php echo $row4->pr_id; ?></span>
				</p>
				
    
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
					   <div class="box box-default">
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

				
				
<tr style="background-color:#3482AE;color:#FFFFFF;">

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

					<tr style="background-color:#3482AE;color:#FFFFFF;">

					<th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center><b> Final Supplier :&nbsp;&nbsp;   <?php echo $row4->sup1_nm; ?></b><center></th>
			
				
				 <th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center><b>  Supplier 2  :&nbsp;&nbsp;   <?php echo $row4->sup2_nm; ?>  </b><center></th>
				 <th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center><b>  Supplier 3  :&nbsp; &nbsp;   <?php echo $row4->sup3_nm; ?>  </b><center></th> 
				 
		 
				
					</tr>
				
                <tr>
                				

			<th style="border:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;">  Final Total Amount (₹)</th>  
            
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;">  Final Total Amount (₹) </th>  
       
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;">  Final Total Amount (₹)</th>  
           
				  
                </tr>  
			
				
                </thead>
						<td style="border:none;"><center> <?php echo $final_rate; ?></center></td>
						<td style="border:none;"><center> <?php echo $total_final_ammount1; ?></center></td>
						<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"><center> <?php echo $total_quoted_amount2; ?></center></td>
						<td style="border:none;"><center> <?php echo $total_final_ammount2; ?></center></td>
						<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"><center> <?php echo $total_quoted_amount3; ?></center></td>
						<td style="border:none;">  <center><?php echo $total_final_ammount3; ?></center></td>
                <tbody>
				
				 
	  </tbody>
               		
              </table>
			  
			  <!--button -->
   <div class="form-group col-sm-12">
    
<div class="col-sm-4">

 </div>



	<!-- View Item -->
<div class="col-sm-4">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalEdit" class="btn" style="width: 40%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Detailed View</button>
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
              <h3 class="box-title">3 . Technical Specification Comparison</h3>

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
			        <table id="example6" class="table table">
            
                <tbody>
								 <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6">Technical Specification</td>
				 <td colspan="3"><b> <center>Final Supplier   :&nbsp;&nbsp; <?php echo $row4->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" ><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $row4->sup2_nm; ?><center></b> </td>
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
				 <td colspan="6">Technical Details</td>
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
				 <td colspan="6">Credibility Of The Supplier Checked													
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
			 
			 
			 
				 <td colspan="6">Insurance & Freight</td>
				 
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
				 <td colspan="6">Delivery Period</td>
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
				 <td colspan="6">Delivery Mode</td>
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
				 <td colspan="6">Inspection / Testing													</td>
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
				 <td colspan="6">Payment Terms</td>
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
				 <td colspan="6">Warranty</td>
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
				 <td colspan="6">Scope Of Installation </td>
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
				 <td colspan="6">Taxes & Duties</td>
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
				 <td colspan="6">Note</td>
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
				 <td colspan="6">Validity Of Price/Quote</td>
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
				 <td colspan="6">REPL Scope</td>
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
              <h3 class="box-title">4 . Quotation Attachments</h3>

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

<!-- self declaration -->


 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">5 . Self Declaration</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			    
			   <div class="box-body">
		 <label class="pull-left control-label" style="color:red;">Common for all</label>
                </br>
				
					<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Outside Allotted Budget </label>
			   
				<div class="col-sm-1">
               
             <?php echo $row4->outside_budget; ?>
			 </div>
			 
			 <div class= "col-sm-5">
			 	<?php 
						if($row4->outside_budget == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_outside_budget; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
             
                </div>
				
                </div>
                
                
                
                	

				<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Order Value > 5 lakhs </label>
				<div class="col-sm-1">
               
             <?php echo $row4->order_value; ?> 
           </div>
		   
		   <div class="col-sm-5">
		   
			 	<?php 
						if($row4->order_value == 'YES'){
							?>
							
						<span>( <?php echo $row4->just_order_value; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					

					
    
                </div>
                </div>
				
				
				
                
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Quotations Received < 2 Suppliers </label>
				<div class="col-sm-1">
               
              <?php echo $row4->offers_received; ?> 
            </div>
			
			<div class="col-sm-5">
			 	<?php 
						if($row4->offers_received == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_quot_reec; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                </div>
				
			
                </div>
			
					
                <label class="pull-left control-label" style="color:red;">Other than Capital</label>
                </br>
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Any advance for non-proprietary items  </label>
			<div class="col-sm-1">
               
               <?php echo $row4->non_properitery_item; ?> 
             </div>
			 
			 <div class="col-sm-5">
			 	<?php 
						if($row4->non_properitery_item == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_adv_nonproprietery; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
									   
    
                </div>
                </div>
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Advance Payment > 20% for proprietary items </label>
				<div class="col-sm-1">
               
             <?php echo $row4->properitery_item; ?> 
             </div>
			 
			 <div class="col-sm-5">
			 	<?php 
						if($row4->properitery_item == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_adv_proprietery; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					                
    
                </div>
                </div>
				
				
				    <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Final payment post-GRN < 30 days for non-proprietary  </label>
			<div class="col-sm-1">
               
                <?php echo $row4->post_grn_nonproprietary; ?> 
             </div>
			 
			 <div class="col-sm-5">
			 	<?php 
						if($row4->post_grn_nonproprietary == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_final_payment_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					            
    
                </div>
                </div>
				
				  <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Final payment post-GRN <7 days for proprietary  </label>
				<div class="col-sm-1">
               
               <?php echo $row4->post_grn_proprietary; ?> 
             </div>
			 <div class="col-sm-5">
			 	<?php 
						if($row4->post_grn_nonproprietary == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->just_final_payment_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>					
    
                </div>
                </div>
				
				
				   <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery terms not at REPL gate  </label>
			<div class="col-sm-1">
               
                <?php echo $row4->delivery_terms; ?> 
				</div>
			<div class="col-sm-5">	
			 	<?php 
						if($row4->delivery_terms == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_delivery_gate; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					             
    
                </div>
                </div>
				
                
                 <label class="pull-left control-label" style="color:red;">For CAPEX Only</label>
				<br>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label"> If cost non-reimbursable by customer  </label>
				<div class="col-sm-1">
                 <?php echo $row4->cost_reimb_cust; ?> 
            </div>
			<div class="col-sm-5">
             
			 	<?php 
						if($row4->cost_reimb_cust == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_cost_reimb_cust; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                                   
    
                </div>
                </div>
                
                
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">REPL cost > customer agreed reimbursement  </label>
		<div class="col-sm-1">
               <?php echo $row4->repl_cost_agreed; ?> 
            </div>    
           
<div class="col-sm-5">		   
                   	<?php 
						if($row4->repl_cost_agreed == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_repl_cost_agree; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                                            
    
                </div>
                </div>
				
				
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Advance Payment > Rs. 2 Lakhs without BG  </label>
				<div class="col-sm-1">
               
              <?php echo $row4->advance_bg; ?>	
</div>

<div class="col-sm-5">			  
                 	<?php 
						if($row4->advance_bg == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_adv_pymt_bg; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>                  
    
                </div>
                </div>
                
                
				   <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Advance of > 25%</label>
				<div class="col-sm-1">
			   <?php echo $row4->advance_25; ?>
			   </div>
		<div class="col-sm-5">	   
			   	<?php 
						if($row4->advance_25 == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_advance_25; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
               
                </div>
                </div>
            
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Payment terms > 90% before GRN </label>
				<div class="col-sm-1">
               <?php echo $row4->paymt_trm_grn_90; ?> 
			    
			   </div>
			   <div class="col-sm-5">
			   	<?php 
						if($row4->paymt_trm_grn_90 == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_paymt_trm_grn_90; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
              
                </div>
                </div>
               
			   
				  <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Imported items </label>
			<div class="col-sm-1">
               <?php echo $row4->imported_item; ?>
			   </div>
			   <div class="col-sm-5">
			   	<?php 
						if($row4->imported_item == 'YES'){
							?>
						
						<span style="color:#3482AE;">( <?php echo $row4->just_imported_item; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
             
                </div>
                </div>
                
              
				
				
			 </div>
            </div>
			
			
			
</div>
<!--end -->		
				
 <div class="form-group col-sm-12">
			  <BR><BR>
			<label class="pull-left control-label"><h4 class="box-title">6</h4></label>
			   <label class="col-sm-5 pull-left control-label"><h4 class="box-title">Additional Details (Attachments)</h4> </label>
				<div class="input-group  col-sm-6">
                 
               
                                      
      <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/additional_attachment/". $row4->additional_attachment ?>"> <?php echo $row4->additional_attachment ?></a> </b>
           
    
               </div>
                </div>
				
		
				
				
				
				<div class="form-group col-sm-12">
			  
		  <label class="pull-left control-label"><h4 class="box-title">7</h4></label>
			   <label class="col-sm-5 pull-left control-label"><h4 class="box-title">Selected Supplier </h4> </label>
				<div class="input-group  col-sm-6">
                 
				<?php echo $row4->selected_supplier; ?>	
    
                </div>
                </div>
				
					<div class="form-group col-sm-12">
			  
		  
			 <label class="pull-left control-label"><h4 class="box-title">8</h4></label>
			   <label class="col-sm-5 pull-left control-label"><h4 class="box-title">Justification for Selection of Supplier</h4></label>
				<div class="input-group  col-sm-6">
                 
                 
                              
         <?php echo $row4->justification_supplier; ?>

         
               </div>
                </div>
				
				
				
				<br><br><br><br><br><br><br><br><br><br><br>
				<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">9. &nbsp; Approval Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
				
			
				   	  <?php
			  if($row4->pr_type == '13' && $row4->outside_budget == 'NO' && $row4->order_value == 'NO' && $row4->offers_received == 'NO' && $row4->non_properitery_item == 'NO' && $row4->properitery_item == 'NO' && $row4->post_grn_proprietary == 'NO' && $row4->post_grn_nonproprietary == 'NO' && $row4->delivery_terms == 'NO' )
			  {
				  ?>
			        <table id="example" class="table table">
          		
                <tbody>
				
				<tr style="background-color:#3482AE;color:#FFFFFF;">
	  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   required> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $approval_level1 ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" Approval Pending From Sourcing Manager " class="form-control full_width"   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width"   > </td>
				  
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
				 <td colspan="4"  >  <input type="text" value="<?php echo $sourcing_mgr_name?>" style="background-color:#E6F2FF;"  class="form-control full_width" readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $approval_level2?>" style="background-color:#E6F2FF;" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="Approval Pending From Sourcing Head" class="form-control full_width"   > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width"   > </td>
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
			  
			  else if($row4->pr_type == '13' && ($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->non_properitery_item == 'YES'||$row4->properitery_item == 'YES'||$row4->post_grn_proprietary == 'YES'||$row4->post_grn_nonproprietary == 'YES'||$row4->delivery_terms == 'YES'))
			  {
				  ?>
				  
				    <table id="example" class="table table">
          		
                <tbody>
				
				 <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   required> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $approval_level1 ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" Approval Pending From Sourcing Manager " class="form-control full_width"   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width"   > </td>
				  
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
				 <td colspan="4"  >  <input type="text" value="<?php echo $sourcing_mgr_name?>" style="background-color:#E6F2FF;"  class="form-control full_width" readonly> </td>
				 <td colspan="4"  >  <input type="text" value="<?php echo $approval_level2?>" style="background-color:#E6F2FF;" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="Approval Pending From Sourcing Head" class="form-control full_width"   > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width"   > </td>
				 <?php
				 }
				?>				 
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	 <?php 
	  $sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level3);

	$approval_level1= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level3);
	?>
	
	  <tr>
	  
			 <td style="display:none" >  </td>
			  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   required> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $approval_level1 ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level3_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" Approval Pending From MDO Office " class="form-control full_width"   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $row4->approval_level3_comment ?> " class="form-control full_width"   > </td>
				  
				  <?php
				 }?>
				  
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
				  
			 
		
	   else if($row4->pr_type != '13' && ($row4->outside_budget == 'YES' || $row4->order_value == 'YES'||$row4->offers_received == 'YES'||$row4->cost_reimb_cust == 'YES'||$row4->repl_cost_agreed == 'YES'||$row4->advance_bg == 'YES'||$row4->advance_25 == 'YES'||$row4->paymt_trm_grn_90 == 'YES'||$row4->imported_item == 'YES'))
	   {	
?>   
	 <div class="form-group col-sm-12">
			        <table id="example" class="table table">
          		
                <tbody>
				
				  <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value=" <?php echo $approval_level1 ?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value=" Approval Pending From Sourcing Manager " class="form-control full_width"readonly   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text"  style="background-color:#E6F2FF;" value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width" readonly> </td>
				  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $sourcing_mgr_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $approval_level2?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From Sourcing Head" class="form-control full_width" readonly  > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width" readonly  > </td>
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $cfo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $cfo_dt?>" class="form-control full_width"  readonly > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				   if($row4->approval_level4_comment == null){
					   ?>
					   <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From CFO"  class="form-control full_width" readonly  > </td>
					 <?php
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php  echo $row4->approval_level3_comment?>"  class="form-control full_width"  readonly > </td>
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $coo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $coo_dt?>" class="form-control full_width" readonly> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 <?php
				  if($row4->approval_level4_comment == null){
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From COO" class="form-control full_width" readonly> </td>
				<?php
					
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text"  style="background-color:#E6F2FF;" value="<?php  echo $row4->approval_level4_comment?>"  class="form-control full_width" readonly> </td>
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
	  $sourcing_mgr_name= $this->method_call->fetch_emp_name($row4->approval_level5);

	$approval_level1= $this->method_call->fetch_status_sourcing_mgr($qcs_id,$row4->approval_level5);
	?>
	
	  <tr>
	  
			 <td style="display:none" >  </td>
			  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   required> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $approval_level1 ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level5_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" Approval Pending From MDO Office " class="form-control full_width"   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" readonly value=" <?php echo $row4->approval_level5_comment ?> " class="form-control full_width"   > </td>
				  
				  <?php
				 }?>
				  
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
		 

	
		 else
		 {
			
?>
 <div class="form-group col-sm-12">
			        <table id="example" class="table table">
          		
                <tbody>
				
				 <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $sourcing_mgr_name ?>" class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value=" <?php echo $approval_level1 ?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				<?php 		 
		 if($row4->approval_level1_comment == null){
			 ?>
			  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value=" Approval Pending From Sourcing Manager " class="form-control full_width"readonly   > </td>
					 
				<?php	 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value=" <?php echo $row4->approval_level1_comment ?> " class="form-control full_width" readonly> </td>
				  
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $sourcing_mgr_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $approval_level2?>" class="form-control full_width" readonly  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				 if($row4->approval_level2_comment == null){
					 ?>
					 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From Sourcing Head" class="form-control full_width" readonly  > </td>
					 <?php
				 }else{
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $row4->approval_level2_comment ?>" class="form-control full_width" readonly  > </td>
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $cfo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $cfo_dt?>" class="form-control full_width"  readonly > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				 <?php
				   if($row4->approval_level4_comment == null){
					   ?>
					   <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From CFO"  class="form-control full_width" readonly  > </td>
					 <?php
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php  echo $row4->approval_level3_comment?>"  class="form-control full_width"  readonly > </td>
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
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $coo_name?>"  class="form-control full_width"   readonly> </td>
				 <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php echo $coo_dt?>" class="form-control full_width" readonly> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 <?php
				  if($row4->approval_level4_comment == null){
				 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="Approval Pending From COO" class="form-control full_width" readonly> </td>
				<?php
					
					 
				 }else{
					 ?>
				  <td colspan="4"  >  <input type="text" style="background-color:#E6F2FF;" value="<?php  echo $row4->approval_level4_comment?>"  class="form-control full_width" readonly> </td>
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
	<?php
	
	}
	
	?>
	</div></div>
		  <!--end-->
			  
			  
			 
	<!-- Approver History -->

 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">10 &nbsp; Approver History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
             
			  
			  
			   <div class="box-body">
		
				
			        <table id="example" class="table table">
                <thead>
					
				
			
                <tr style="background-color:#3482AE;color:#FFFFFF;">
                				
				
				<th> QCS ID</th>
			
				<th>Approver Name</th>				
				<th> Approver Comment </th>
				<th> Approver Status</th>  				
				<th>  Date / Time </th>  
				
                </tr>  
			
				
                </thead>
				

                <tbody>
				
	 				  <?php $item= $this->method_call->qcs_approver_history_id($qcs_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         {   $appver_name= $this->method_call->fetch_emp_name($rowhistory->approval_emp_code); ?>
	
			<tr>
				 <td>  <?php echo $rowhistory->qcs_id; ?></td>
				 
				 <td><?php echo $appver_name; ?></td>
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
			 
			 
            </div>
			
			
			
</div>

<!--end -->
			  <!--end-->
<!--				
<div class="col-sm-2"><button type="submit" id=""  class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Print</button></div>
-->
 <div class="form-group col-sm-12">
     	  <div class="form-group col-sm-5">
     	      </div>
	  <div class="form-group col-sm-2">

			
			 <a href="<?php echo site_url('purchase/QCS/qcs_print/'.$row4->qcs_id) ?>" class="btn " style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">
          <span class="glyphicon glyphicon-print"></span> Print QCS
        </a>
			  
              </div>
              	  <div class="form-group col-sm-5">
              	      </div>
	</div>			
				<div class="col-sm-4">
				</div>
				
                </div>
			
				
				 <input type="hidden"  name="qcs_num" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required> 
				 
				   <input type="hidden" readonly name="pr_id" value="<?php echo $row4->pr_id; ?>" class="form-control"  required>
				   
				    <input type="hidden" readonly name="qcs_emp_code" value="<?php echo $row4->qcs_emp_code; ?>" class="form-control"  required>
				 <!-- approval 1 -->
				 <?php $sourcing_approval1= $this->method_call->fetch_sourcing_approval1($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval1" value="<?php print_r($sourcing_approval1['approval_level1']);?>" class="form-control"  required>
		
			<!-- approval 2 -->
		<?php $sourcing_approval2= $this->method_call->fetch_sourcing_approval2($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval2" value="<?php print_r($sourcing_approval2['approval_level2']);?>" class="form-control"  required>	
		
		<!-- approval 3 -->
		<?php $sourcing_approval3= $this->method_call->fetch_sourcing_approval3($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval3" value="<?php print_r($sourcing_approval3['approval_level3']);?>" class="form-control">
		
		<!-- approval 3 -->
		<?php $sourcing_approval4= $this->method_call->fetch_sourcing_approval4($row4->pr_type); ?>
		<input type="hidden" name="sourcing_approval4" value="<?php print_r($sourcing_approval4['approval_level4']);?>" class="form-control">
	</div>
				

				
				 
				  <?php }
 } ?>		
	

	</section>
	



<!-- view modal -->

<div class="modal fade displaycontent" id="myModalEdit">

<div class="modal-dialog" role="document" style="width:1200px;">
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
  <form method="post" id="" action="" >
            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table">
                <thead>
					<tr style="background-color:#3482AE;color:#FFFFFF;">
			 
			 
         
                  <th style="border:none;">Sr. No.</th>
				   <th style="border:none;">Item Code</th>
				   
				   <th style="border:none;">HSN Code</th>
				   <th style="border:none;">Item Descriptions</th>
				   <th style="border:none;">Qty.</th>
				   <th style="border:none;">UOM</th>
				 <th colspan="4" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"><center> 1. <?php echo $row4-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center>2. <?php echo $row4-> sup2_nm; ?>  <center></th>
				 <th colspan="4" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center>3. <?php echo $row4-> sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr >
                				 <th colspan="6" style="text-align:right;"></th>

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
			 <td style="border:none;" ><?php echo $rowitem->q_item_code; ?></td> 
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
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->pr_id; ?>" required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->plant_code; ?>" required>  
						
                </div>
                </div>
				
				
				
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-4 pull-left control-label">6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Requirement Details</label>
				<div class="input-group  col-sm-6 pull-right">

                </div>
			  </div>	


	    <div class="form-group col-sm-12">
			        <table id="exam" class="table table">
                <thead>
              <tr style="background-color:#3482AE;color:#FFFFFF;">
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $row4->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row4->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row4->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
                   <?php echo $row4->procurement_res;  ?>

         
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
  <!-- pr view modal -->
  
  <div class="modal fade displaycontent" id="pr_view_Modal">

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
	
	<input type="Text" name="pr_plant" class="form-control"  readonly value="<?php echo $row4->pr_id; ?>" required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" readonly value="<?php echo $row4->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control"  readonly value="<?php echo $row4->plant_code; ?>" required>  
						
                </div>
                </div>
				
				
				
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($row4->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php echo $row4->pr_date; ?>"  required>
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $row4->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row4->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row4->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row4->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                   <?php echo $row4->procurement_res;  ?>

         
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