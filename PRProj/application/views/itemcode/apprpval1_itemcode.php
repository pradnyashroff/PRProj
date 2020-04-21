 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Approve By Taxation ItemCode</title>
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
     Approve By Taxation Department 
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
         <li> <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" style="color:#FFFFFF;text-transform: uppercase;">ItemCode</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Taxation ItemCode
</li>
</li>
      </ol>

    </section>

   <!-- Main content -->
  	<section class="content" id="content">
	  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">


 
       <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
        	  <?php $itencode_detail = $this->method_call->itemcode_file($iten_gen_id);
 if($itencode_detail!=null){
	 foreach ($itencode_detail->result() as $rowitem)  
         {  ?>
		 

       <form method="POST" action="<?php echo site_url('purchase/itemcode/approval1_itmCode');?>" id="delpur">    
<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Informal PO Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
			   	   
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">ItemCode No </label>
				<div class="input-group  col-sm-6" name="itemcodeno">
                      <!--<?php echo $rowitem->iten_gen_id; ?>-->
					  
					   <input type="text" name="itemcodeno" class=" form-control"  style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->iten_gen_id; ?>" required>  
    
                </div>
                </div>

		 
		  <div class="col-sm-4">
			 
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR No</label>
				<div class="input-group  col-sm-6">
				
				<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editModal"href="#editModal<?php echo $rowitem->pr_id?>">&nbsp;<?php echo $rowitem->pr_id; ?></span>
				</p>
				
                  <input type="hidden" name="itemcode_pr_no" class=" form-control" href="#editModal<?php echo $rowitem->pr_id?>"  data-toggle="modal" data-target="#editModal" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->pr_id; ?>"  required>                          
    
         
         
                </div>
                </div> 

				
		
			 	<div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">QCS No</label>
				<div class="input-group  col-sm-6">
					
				<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#qcsModal"href="#qcsModal<?php echo $rowitem->qcs_id?>">&nbsp;<?php echo $rowitem->qcs_id; ?></span>
				</p>
			
                  <input type="hidden" name="itemcode_qcs_no" class=" form-control" href="#qcsModal<?php echo $rowitem->qcs_id?>" data-toggle="modal" data-target="#qcsModal" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->qcs_id; ?>" required>                          
    
         
         
                </div>
				<br>
                </div>  
				
				 	
				
				
				<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->plant_code; ?>" required>  
						
                </div>
                </div>  
				<div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Itemdate</label>
				<div class="input-group  col-sm-6">
				
				
				
				
                  <input type="text" name="itemdate" class=" form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->item_gen_date; ?>" required>                          
    
          
         </div>
		 </div>
		   </div>
		 </div>  </div>
		 
				
				<!-- end -->
				
				


			
			
			
			
			<!-- new start -->
			
			<!-- ItemCode detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . ItemCode Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
			  
				    <table id="example6" class="table table">
                <thead style="width:100%;">
					
				
			
                	<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
				 
               
				<th > ItemCode ID</th>  
				<th> QCS ID</th>  
				<th> ItemCode </th>  
				<th > HSN Code  </th>  
				<th> Item Description</th>
				<th> Item Date</th>
			
                </tr>  
			
				
                </thead>
		
                <tbody>
				
	 				  <?php $item= $this->method_call->qcs_itemcode_itemid($iten_gen_id);
 if($item!=null){
	 	   
	 $sr_no=1;		 
foreach ($item->result() as $row5)  
         {  ?>
			<tr>

				<td class="glyphicon glyphicon-edit" style="color:red;" onclick="hsnCodeUpdate_data('<?php echo $row5->qcs_item_id;?>','<?php echo $row5->q_hsn_code;?>','<?php $varassetDesc =$row5->q_item_description; echo htmlspecialchars($varassetDesc); ?>')" data-toggle="modal" data-target="#itemhsn_up_Modal"<?php echo $row5->qcs_item_id;?>"><?php echo $row5->qcs_item_id; ?></td>
				
				 <td><?php echo $row5->qcs_id; ?></td>
				 <td><?php echo $row5->q_item_code; ?> </td>
				<td>   <?php echo $row5->q_hsn_code; ?></td>
				 
				<td><?php echo $row5->q_item_description; ?></td>
				<td><?php echo $row5->qcs_item_date; ?></td>
			</tr>
	 

	 
				 
		 <?php $sr_no++; }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>	  		  
				

			</div>
			</div>
           
			<!-- end -->
			
			
		 	 				
		
 <input type="hidden" name="up_itemcodeno" class=" form-control"   readonly value="<?php echo $rowitem->iten_gen_id; ?>" required>  
	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="item_id_list" id="can_id"> 
		
		<br>
		
			
		
			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">File Attachments </label>
				<div class="input-group  col-sm-6">
                 
                <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/itemcode_attachment/". $rowitem->itemcode_attachment ?>"> <?php echo $rowitem->itemcode_attachment ?></a> </b>
    
                </div>
				
				
			  
			  
                </div>

						<div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-3 pull-left control-label">Taxation Department Comment</label>
				<div class="input-group  col-sm-8">
				 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				  <?php $approval1_name= $this->method_call->fetch_emp_name($rowitem->item_gen_approval1); ?>

                                   <?php if($rowitem->item_gen_app1_cmt == null){
					 echo "Approval Pending From Taxation Department  ($approval1_name)";
					 
				 }else{
				 echo $rowitem->item_gen_app1_cmt; echo ' ('.$approval1_name.')'; } ?>

				
				
                                
    
          
         
                </div>
                </div> 
				
						<div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-3 pull-left control-label">SAP Department Comment</label>
				<div class="input-group  col-sm-8">
				 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				  <?php $approval2_name= $this->method_call->fetch_emp_name($rowitem->item_gen_approval2); ?>

                                   <?php if($rowitem->item_gen_app2_cmt == null){
					 echo "Approval Pending From SAP Department  ($approval2_name)";
					 
				 }else{
				 echo $rowitem->item_gen_app2_cmt; echo ' ('.$approval2_name.')'; } ?>

				
                                       
    
          
         
                </div>
                </div> 
				
				
				<div class="form-group col-sm-12">
			  
				 <label class="col-sm-1 pull-left control-label">6</label>
			 <label class="col-sm-4 pull-left control-label">Approve / Reject</label>
			 <div class="input-group  col-sm-6">
			 &nbsp;&nbsp;&nbsp;
			    <input type="radio" name="itemcode_state" value="Approve_by_taxation_dept"> Approve</input>
				
				&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;
			
           <input type="radio" name="itemcode_state" value="Reject_by_taxation_dept"> Reject</input>

                </div>
				
				</div>
				

					<div class="form-group col-sm-12">	 
		 
				
			   <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Approver Comment </label>
				<div class="input-group  col-sm-4">
                     
					  
					  
					   
					     <textarea name="tax_comment" rows="4" cols="50"  required ></textarea>
    
                </div>

 </div>		   

			
	



				

<!--end -->
				
	<!-- body close -->

<!-- footer start -->	
<div class="box-footer">

<input type="hidden" name="item_gen_approval1" class="form-control" readonly value="<?php echo $rowitem->item_gen_approval1; ?>"> 

<input type="hidden" name="item_gen_approval2" class="form-control" readonly value="<?php echo $rowitem->item_gen_approval2; ?>"> 

<input type="hidden" name="pr_emp_code" class="form-control" readonly value="<?php echo $rowitem->pr_owner; ?>"> 
 

						<!-- Pr owner EID-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email PR owner</label>
				<div class="input-group  col-sm-6">
               
			   <?php $eid_owner= $this->method_call->fetchemp_email($rowitem->pr_owner); ?>
  <input type="text" name="pr_owner_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>
 


                </div>
                
                		
                </div>
				
				
						<!-- Approval2 EID-->
								 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">email approval2</label>
				<div class="input-group  col-sm-6">
               
			   <?php $eid_owner= $this->method_call->fetchemp_email($rowitem->item_gen_approval2); ?>
  <input type="text" name="tax_emp_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>
 


                </div>
                </br> </br>
                		
                </div>
					  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
				<!--
 <div class="col-sm-2"><button type="button" id="delete_can" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Update HSNCode </button></div>
-->
				
<div class="col-sm-2"><button type="submit" id="" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Proceed</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/itemcode/approval_list') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Cancel</a></div>
				
				
				<div class="col-sm-3 ">
				</div>
				
                </div>
					
	</div>	

</form>
<div class="modal fade displaycontent" id="itemhsn_up_Modal">

<div class="modal-dialog" role="document" style="width:600px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">HSN CODE </h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

		
  <form id="itemDetails" name="itemDetails" action="<?php echo site_url('purchase/itemcode/updateHSNCode'); ?>" method="post">
            <div class="row">
			
			
			 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">1</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">HSN CODE</label>
				<div class="input-group  col-sm-6">
             
			 <input type="hidden" name="item_idEdit"  class=" form-control" id="item_idEdit"   required>
			  <input type="Text" name="item_hsncode" class=" form-control" id="itm_codeEdit"   required>

         
                </div>
                </div>
				
				<br><br>
					 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">2</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">ITEM DESCRIPTION</label>
				<div class="input-group  col-sm-6">
             
			
			  <textarea name="desc_idEdit" style="background-color:#E6F2FF" class=" form-control" id="desc_idEdit" readonly></textarea>

         
                </div>
                </div>
				
				<br><br><br>
				
				 <div class="form-group col-sm-12">
			 <div class="col-sm-4">
			 </div>
				
<div class="col-sm-4"><button type="submit" name="save" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">UPDATE</button></div>

<div class="col-sm-4">
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
   </div>
   
	<!--  PR view modal -->

<div class="modal fade displaycontent" id="editModal">

<div class="modal-dialog" role="document" style="width:980px;">
    <div class="modal-content">
       <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo';">View PR</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			

            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="  <?php echo $rowitem->pr_id; ?>"  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($rowitem->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($rowitem->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php echo $rowitem->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-6 pull-left control-label">7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>		
			    <div class="form-group col-sm-12">
			        <table id="exam" class="table table">
                <thead>
              <tr style="background-color:#3482AE;color:#FFFFFF">
                  
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
			  
			  <label class="col-sm-2 pull-left control-label" style="color:#3482AE"></label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Cumulative Total Amount of PR <?php echo $rowitem->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $rowitem->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $rowitem->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">10</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">11</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">12</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">13</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">14</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $rowitem->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">15</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
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
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo'; text-transform: uppercase;">View QCS</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			<div class="box-header with-border">
					   <div class="box box-default">
							<div class="box-header with-border">
								<h3 class="box-title" style="color:#3482AE;text-transform: uppercase;">1 . Basic QCS Details</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body">

          
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">QCS No </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->qcs_id; ?>
					  
	   </div>
				</div>
				
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">2</label>
                  <label class="col-sm-5 pull-left control-label">QCS Date </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->qcs_date; ?> 
					  
	   </div>
				</div>
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">3</label>
                  <label class="col-sm-5 pull-left control-label">Plant </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->plant_code; ?>
					  
	   </div>
				</div>
				
				  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">4</label>
                  <label class="col-sm-5 pull-left control-label">QCS Owner </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->qcs_owner; ?>    
					  
	   </div>
				</div>
				 <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">5</label>
                  <label class="col-sm-5 pull-left control-label">Selected Supplier </label>
	<div class="input-group  col-sm-6">
	
			<?php echo $rowitem->selected_supplier; ?>			  
	   </div>
				</div>
				
				 <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">6</label>
                  <label class="col-sm-5 pull-left control-label">Justification for Selection of Supplier </label>
	<div class="input-group  col-sm-6">
	
	<?php echo $rowitem->justification_supplier; ?>			  
	   </div>
				</div>
				</div></div></div>
					 
		 <div class="box-header with-border">
					   <div class="box box-default ">
							<div class="box-header with-border">
								<h3 class="box-title" style="color:#3482AE;text-transform: uppercase;">2 . Requirement Details</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
				  <table id="exampletest" class="table table">
                <thead>
		<tr style="background-color:#3482AE;color:#FFFFFF; text-transform: uppercase;">
					<th >Sr. No.</th>
				   <th >Item Code</th>
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $rowitem-> sup1_nm; ?>  <center></th>
				<th colspan="4" > <center>2. <?php echo $rowitem-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $rowitem-> sup3_nm; ?>   <center></th>
		</tr>
			
                <tr >
                				 <th colspan="6" style="text-align:center;"></th>

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
			<td>  <?php echo $rowqcsitem->quot_rate2; ?></td>  
            <td> <?php echo $rowqcsitem->quoted_amt2; ?></td>  
            <td>  <?php echo $rowqcsitem->final_rate2; ?> </td>  
            <td> <?php echo $rowqcsitem->final_amt2; ?> </td>
			
			<td>  <?php echo $rowqcsitem->quot_rate3; ?></td>  
            <td> <?php echo $rowqcsitem->quoted_amt3; ?></td>  
            <td>  <?php echo $rowqcsitem->final_rate3; ?> </td>  
            <td> <?php echo $rowqcsitem->final_amt3; ?> </td>

			
		
		
		
		
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
				</div></div></div></div>
				<div class="box-body">
		<div class="box-header with-border">
					   <div class="box box-default collapsed-box">
							<div class="box-header with-border">
								<h3 class="box-title" style="color:#3482AE;text-transform: uppercase;">3 . Technical Specification Comparison</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
									</button>
									
								</div>
							</div>
							<div class="box-body">
				
				
					

            <div class="row">
              <div class="col-sm-12" style="  ">
            <div class="row">
			
			
			    <div class="form-group col-sm-12">
				<table id="example6" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
					<thead style="text-align: center;" >
						<tr style="background-color:#3482AE;color:#FFFFFF; text-transform: uppercase;">
			       
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;">Technical Specification</td>
				 <td colspan="3" ><b> <center>Selected Supplier   :&nbsp;&nbsp; <?php echo $rowitem->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $rowitem->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $rowitem->sup3_nm; ?><center></b> </td>
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
				 <td colspan="6" >Technical Details</td>
				 <td colspan="3"  > <?php echo $rowitem->tech_det_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->tech_det_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->tech_det_sup3; ?> </td>
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
				     <?php echo $rowitem->credibility_sup1; ?>       
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <?php echo $rowitem->credibility_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<?php echo $rowitem->credibility_sup3; ?>
				  
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
			 
			 
			 
				 <td colspan="6" >Insurance & Freight</td>
				 
				 <td colspan="3"  > 
					<?php echo $rowitem->insurance_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<?php echo $rowitem->insurance_sup2; ?>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
						<?php echo $rowitem->insurance_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $rowitem->del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">  <?php echo $rowitem->del_period_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->del_period_sup3; ?></td>
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
				 <td colspan="6" >Delivery Mode</td>
				 <td colspan="3">  <?php echo $rowitem->del_mode_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><?php echo $rowitem->del_mode_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"> <?php echo $rowitem->del_mode_sup3; ?>   </td>
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
				 <td colspan="6" >Inspection / Testing													</td>
				 <td colspan="3">
				 	<?php echo $rowitem->inspection_sup1; ?>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<?php echo $rowitem->inspection_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<?php echo $rowitem->inspection_sup3; ?>				  
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
				 <td colspan="6" >Payment Terms</td>
				 <td colspan="3"  >  <?php echo $rowitem->pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->pymt_terms_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowitem->pymt_terms_sup3; ?> </td>
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
				 <td colspan="6" >Warranty</td>
				 <td colspan="3"  >  <?php echo $rowitem->warranty_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowitem->warranty_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->warranty_sup3; ?> </td>
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
				 		<?php echo $rowitem->scope_instal_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  
				  			<?php echo $rowitem->scope_instal_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				  			<?php echo $rowitem->scope_instal_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $rowitem->taxes_duties_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->taxes_duties_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->taxes_duties_sup3; ?> </td>
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
				 <td colspan="3"  >  <?php echo $rowitem->note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->note_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->note_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;">Validity Of Price/Quote</td>
				 <td colspan="3"  >  <?php echo $rowitem->validity_price_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->validity_price_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->validity_price_sup3; ?> </td>
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
				 <td colspan="3"  > <?php echo $rowitem->repl_scope_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->repl_scope_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->repl_scope_sup3; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
			
      </tr>
	  
	   <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 14 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;">Supplier Mobile NO</td>
				 <td colspan="3"  > <?php echo $rowitem->sup1_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				   <td colspan="3"  >  <?php echo $rowitem->sup2_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->sup3_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 
			
      </tr>
	  
	   <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 15</td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6"style="text-align:center;">Supplier Contact Person</td>
				 <td colspan="3"  > <?php echo $rowitem->sup1_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				    <td colspan="3"  >  <?php echo $rowitem->sup2_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->sup3_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 
			
      </tr>
	  
	  
	   <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 16 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6"style="text-align:center;">Supplier EmailID</td>
				 <td colspan="3"  > <?php echo $rowitem->sup1_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				   <td colspan="3"  >  <?php echo $rowitem->sup2_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowitem->sup3_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				
				 
			
      </tr>
	
	
                </tbody>
               		
              </table>
		
	
                
			  
		  </div>
		 
			
			
 
		
	</div>
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  
  
    </div>

		</div>
				
				
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
 }
 } 
?>		
	<!--end -->		
			             <!-- /.box-body -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		

   </div>
  
  </div>			
			    </form>
        

       

   
   </section>

  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
    	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/checkboxes.js"></script>
  
 <script>
function hsnCodeUpdate_data(iten_gen_id,q_hsn_code,q_item_description) {
 // alert("pr_id..... "+qcs_item_id);
  // alert("q_item_code..... "+q_item_code);
	
	document.getElementById("item_idEdit").value = iten_gen_id;
	document.getElementById("itm_codeEdit").value = q_hsn_code;
	document.getElementById("desc_idEdit").value = q_item_description;
	
	
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