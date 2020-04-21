 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico"  style="height:20px;">	
  <title>Informal PO</title>
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
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
     Informal PO
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome/index') ?>"style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/informal_po/informal_po_menu') ?>"style="color:#FFFFFF;text-transform: uppercase;">Informal PO  </a></li>

<li class="active"style="color:#FFFFFF;text-transform: uppercase;">Approval1 PO</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
  	<section class="content" id="content">
	  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
 
<form method="post" id="main_form" action="<?php echo site_url('purchase/informal_po/approval1_po'); ?>" enctype='multipart/form-data'>

 		  
	  <?php $qcs_detail= $this->method_call->informal_po_detail($informal_po_id);
 if($qcs_detail!=null){
	 foreach ($qcs_detail->result() as $po_row)  
         {  ?>
		   

      <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
        


<!-- po deatil -->
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
			   
			   
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label"> PO NO </label>
				<div class="input-group  col-sm-6">
                      <input type="text" name="po_no" value="<?php echo $po_row->informal_po_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="po_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->plant_code; ?>"  required>                          

                </div>
                </div> 
				
				
			    <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">PO Date/Time</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="po_date" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->informal_po_date; ?>"   required>                          

                </div>
                </div> 
	 
			 	 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR NO</label>
				<div class="input-group  col-sm-6">
				
					<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editModal"href="#editModal<?php echo $po_row->pr_id?>">&nbsp;<?php echo $po_row->pr_id; ?></span>
				</p>
				
				
				 <input type="hidden" name="po_pr_no" class=" form-control" href="#editModal<?php echo $po_row->pr_id?>"  data-toggle="modal" data-target="#editModal" readonly value="<?php echo $po_row->pr_id; ?>"  required>  
                  

 <input type="hidden" name="po_pr_empcode" class=" form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->pr_owner; ?>"  required>  				  

                </div>
                </div> 
	 
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="po_pr_owner" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->pr_owner_name; ?>"  required>                          

                </div>
                </div> 
				
				
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Date/Time</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="po_pr_date" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->pr_date; ?>"  required>                          

                </div>
                </div> 
			
			
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">QCS No</label>
				<div class="input-group  col-sm-6">
				
					<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#qcsModal"href="#qcsModal<?php echo $po_row->qcs_id?>">&nbsp;<?php echo $po_row->qcs_id; ?></span>
				</p>
				
				
                <input type="hidden" name="po_qcs_no" class=" form-control" href="#qcsModal<?php echo $po_row->qcs_id?>" data-toggle="modal" data-target="#qcsModal"  style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->qcs_id; ?>" required>                        

                </div>
                </div> 
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
				
				
				 <input type="Text" name="po_qcs_nm" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->qcs_owner; ?> "required> 
                  

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-4 pull-left control-label">QCS Date/Time</label>
				<div class="input-group  col-sm-6">
				
                 <input type="Text" name="po_qcs_date" class="form-control" style="background-color:#E6F2FF;"  readonly value="<?php echo $po_row->qcs_date; ?> "  required>                          

                </div>
                </div> 
				
				
				
				<!-- end -->
				
			
			<br>
			
			
			
		
</div>
 </div>
            </div>
			
			
			

<!--end -->

 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label"><h4>2 .</h4></label>
			   <label class="col-sm-5 pull-left control-label"><h4>Final Supplier</h4></label>
				<div class="input-group  col-sm-6" style="color:#3482AE;text-transform: uppercase;font-family:'exo';">
                 
            <h4 >   <?php echo $po_row->selected_supplier; ?> </h4>
    
                </div>
                </div>
				</br>
				</br>
				
				 <input type="hidden" name="final_sup" class="form-control"  readonly value="<?php echo $po_row->selected_supplier; ?>">  
				
<!-- item detail  -->
 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Item Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			    <div class="table-responsive" style="width:100%;">
		

						
				 <div class="form-group col-sm-12">
				  <table id="exampletest" class="table" style="font-size: 12px!important;">
                <thead>
		<tr style="background-color:#3482AE;color:#FFFFFF;">
					<th >Sr. No.</th>
					<th >HSN Code</th>
				    <th >Item Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> <?php echo $po_row->selected_supplier; ?>   <center></th>
			
		</tr>
			
                <tr >
           <th colspan="6" ></th>

			 
            <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
			
                </tr>  
		
				
                </thead>
		
	 <tbody>
				
				<?php $view_item= $this->method_call->qcs_items_po($informal_po_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>

               
				
			<tr>
				 
				 <td  ><?php echo $sr_no; ?> </td>
				
            <td>  <?php echo $rowitem->q_hsn_code; ?></td> 
			<td  ><?php echo $rowitem->q_item_code; ?></td>  			
            <td> <?php echo $rowitem->q_item_description; ?></td>  
            <td> <?php echo $rowitem->q_req_quantity; ?></td>  
            <td> <?php echo $rowitem->q_uom; ?></td>  
            <td>  <?php echo $rowitem->final_rate1; ?></td>  
            <td> <?php echo $rowitem->final_amt1; ?></td>  
            			
              <?php

				$quoted_ammount1=$rowitem->quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;   
     	?>
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
<tfoot>
        <tr>
            <td style="text-align:right;" colspan="7"><b>Grand Total:</b></td>
			
			<td class="right "><B><?php echo $total_final_ammount1; ?></b></td>
			
			
			
        </tr>
    </tfoot>
	</tbody>
	</table>
				</div>
				
				
			 </div>
            </div>
			
			
			
</div>
<!--end -->

<!-- Technical Declaration -->


  <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Technical Specification Comparison</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				

            <div class="row">
              <div class="" style="  ">
 

		<br>
		
				
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table" style="font-size: 12px!important;">
            
                <tbody>
								  <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
			
					<td colspan="1" > Sr No </td>
			
					<td colspan="2" >Technical Specification</td>
				 
				 <td colspan="7"  ><b> Supplier   :&nbsp;&nbsp; <?php echo $po_row->selected_supplier; ?></b> </td>
				 
				 
				 
				
                
      </tr> 
			<?php
				 $show_tech_spe= $this->method_call->qcs_techspec_show_po($informal_po_id);
 if($show_tech_spe!=null){
	 	   
	$sr_no=1;			  
foreach ($show_tech_spe->result() as $rowtech)  
         {  ?>
	  
	  <tr>
	  
			
			  <td colspan="1"  > 1 </td>
			 
				 <td colspan="2" >Technical Details</td>
				 <td colspan="7"  > <?php echo $rowtech->tech_det_sup1; ?> </td>
				
				
				
                
      </tr> 


	  <tr>
	  
			
			  <td colspan="1"> 2 </td>
			
				 <td colspan="2" >Credibility Of The Supplier Checked													
</td>
				 <td colspan="7">  
				     <?php echo $rowtech->credibility_sup1; ?>       
				 </td>
				 
			
				  
				
				
                
      </tr>
	  
	  <tr>
	  
			 
			  <td colspan="1" > 3 </td>
			
				 <td colspan="2" >Insurance & Freight</td>
				 
				 <td colspan="7"  > 
			<?php echo $rowtech->insurance_sup1; ?>
				 </td>
			
                
      </tr>

	  <tr>
	  
			
			  <td colspan="1"> 4 </td>
			 
				 <td colspan="2" >Delivery Period </td>
				 <td colspan="7"  >  <?php echo $rowtech->del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 
				
      </tr> 
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 5 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" >Delivery Mode</td>
				 <td colspan="3">  <?php echo $rowtech->del_mode_sup1; ?> </td>
				 <td style="display:none" >  </td>
				
      </tr> 
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 6 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" >Inspection / Testing													</td>
				 <td colspan="3">
				 	<?php echo $rowtech->inspection_sup1; ?>
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
				 <td colspan="2" >Payment Terms </td>
				 <td colspan="3"  >  <?php echo $rowtech->pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 8 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" >Warranty</td>
				 <td colspan="3"  >  <?php echo $rowtech->warranty_sup1; ?> </td>
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
				 <td colspan="2" >Scope Of Installation </td>
				 <td colspan="3"  > 
				 		<?php echo $rowtech->scope_instal_sup1; ?>
				 </td>
				
                
      </tr>
              <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 10 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" >Taxes & Duties</td>
				 <td colspan="3"  >  <?php echo $rowtech->taxes_duties_sup1; ?> </td>
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
				 <td colspan="2" >Note</td>
				 <td colspan="3"  >  <?php echo $rowtech->note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				
				 
				
                
      </tr>
           
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 12 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" >Validity Of Price/Quote </td>
				 <td colspan="3"  >  <?php echo $rowtech->validity_price_sup1; ?> </td>
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
				 <td colspan="2">REPL Scope</td>
				 <td colspan="3"  > <?php echo $rowtech->repl_scope_sup1; ?> </td>
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
				 <td colspan="2">Supplier Mobile NO</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_contact_no; ?> </td>
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
				 <td colspan="2">Supplier Contact Person</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_contact_person; ?> </td>
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
				 <td colspan="2">Supplier EmailID</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_eid; ?> </td>
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
	
<?php 
 }
 }?>
</div>
			
			
			

<!-- end -->

    <!--/.col (right) -->
	

<!-- end -->	
                
                
  	
                
  	
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
		
					<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Outside Allotted Budget </label>
				<div class="col-sm-1">
               
                <?php echo $po_row->outside_budget; ?>
                                   
    
                </div>
				
				
				   <div class="col-sm-5">
		   
			 	<?php 
						if($po_row->outside_budget == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_outside_budget; ?> ) </span>
							
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
               
                
                       <?php echo $po_row->order_value; ?>                      
    
                </div>
				
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->order_value == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_order_value; ?> ) </span>
							
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
               
               
               <?php echo $po_row->offers_received; ?>        
                                   
    
                </div>
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->offers_received == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_quot_reec; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
                </div>
				
				
				
                </div>
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Any advance for non-proprietary items  </label>
				<div class="col-sm-1">
               
                <?php echo $po_row->non_properitery_item; ?>        
                                   
    
                </div>
				
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->non_properitery_item == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_adv_nonproprietery; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
                </div>
                </div>
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Advance Payment > 20% for proprietary items
 </label>
				<div class="col-sm-1">
               
               <?php echo $po_row->properitery_item; ?>        
             
                                   
    
                </div>
				
				
				 <div class="col-sm-5">
		   
			 	<?php 
						if($po_row->properitery_item == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_adv_proprietery; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					

					
    
                </div>
                </div>
                
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Advance Payment > Rs. 2 Lakhs without BG  </label>
				<div class="col-sm-1">
               
                
               <?php echo $po_row->advance_bg; ?>        
                                   
    
                </div>
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->advance_bg == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_adv_pymt_bg; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
                </div>
                </div>
                
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Final payment post-GRN < 30 days for non-proprietary  </label>
				<div class="col-sm-1">
               
            
                               <?php echo $po_row->post_grn_nonproprietary; ?>              
    
                </div>
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->post_grn_nonproprietary == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_final_payment_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
                </div>
				
				
                </div>
                
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Final payment post-GRN <7 days for proprietary  </label>
				<div class="col-sm-1">
               
               
               <?php echo $po_row->post_grn_proprietary; ?>        
                                   
    
                </div>
				
				
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->post_grn_proprietary == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_final_pymt_post_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
                </div>
				
				
                </div>
                
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Delivery terms not at REPL gate  </label>
				<div class="col-sm-1">
               
               <?php echo $po_row->delivery_terms; ?>        
                                   
    
                </div>
				
					
				<div class="col-sm-5">
		   
			 	<?php 
						if($po_row->delivery_terms == 'YES'){
							?>
							
						<span >( <?php echo $po_row->just_delivery_gate; ?> ) </span>
							
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
			  
			  <label class="pull-left control-label"><h4>6</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4>QCS Attachments </h4></label>
				<div class="input-group  col-sm-6">
                 
                <div class="form-group col-sm-12">
			    <div class="col-sm-5 ">
				
	<?php  $filea= $this->method_call->filefetchqcs_po($informal_po_id);
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>			

			  
 <a style="color: #337ab7;" href="<?php echo base_url()."uploads/qcs/". $po_row->qcs_id ."/".$rowfile->qcs_file_nm;?>"><?php echo $rowfile->qcs_file_nm; ?></a></br></br>
 <?php }
 } ?>		
                </div>
			  
			                </div>
                                     
    
                </div>
                </div>

				
				
				<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label"><h4>7</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4>Informal PO Attachments</h4></label>
			  	<div class="input-group  col-sm-6"> 
				<div class="form-group col-sm-12">
						 <div class="col-sm-5 ">
                 <a style="color: #337ab7;" href="<?php echo base_url()."uploads/informal_po_attachment/".$po_row->informal_po_attachment;?>"><?php echo $po_row->informal_po_attachment; ?>
				 </a></br></br>
				 </div>

    
                </div>
				
				
				</div>
				<!-- <img src="<?php echo base_url()."uploads/informal_po_attachment/".$po_row->informal_po_attachment;?>" style="height:50px";width="50px;">
			-->
				
                </div>
				
				
				 
				
				<!-- body close -->
	
	<div class="form-group col-sm-12">
			  
    <div class="table-responsive" style="width:100%;">
	 <label class="pull-left control-label"><h4>8</h4></label>
	  <label class="col-sm-4 pull-left control-label"><h4>Approval History</h4></label>
						
			        <table id="example" class="table " style="font-size: 12px!important;">
                <thead>
					
				
			
                <tr style="background-color:#3482AE;color:#FFFFFF;">
                				
				
				
				<th> Approver ID </th> 
				<th> Approver Name </th>				
				<th> Approver Comment </th>
				<th>  Date / Time </th>  
				<th> Approver Status</th>  				
				
				
                </tr>  
			
				
                </thead>
				

                <tbody>
			        
				
 <?php $item= $this->method_call->po_approver_history_id($informal_po_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         { 
		  $appver_name= $this->method_call->fetch_emp_name($rowhistory->po_approval_emp_code); ?>
	
			<tr>
				
				 <td><?php echo $rowhistory->po_approval_emp_code; ?> </td>
				 <td><?php echo $appver_name; ?> </td>
				 <td><?php echo $rowhistory->po_approval_comment; ?></td> 
				 	<td><?php echo $rowhistory->po_approval_date; ?></td>
				<td><?php echo $rowhistory->po_approver_status; ?></td>
			
				
			</tr>
	 

				
		 <?php  }
 } ?>
	  
	  
			</tbody>
               		
              </table>
		
		  </div>
	
</div>

 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label"><h4>9</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4>Justification of Informal PO</h4></label>
			  	<div class="input-group  col-sm-6"> 
				<div class="form-group col-sm-12">
						 
								<h4><?php  echo $po_row->just_informal_po; ?></h4>
								
						

    
                </div>
				
 <input type="hidden" name="just_informalpo" class="form-control"  readonly value="<?php  echo $po_row->just_informal_po; ?> "  required>  

				
				</div>
				
				
                </div>	

<?php $emp_name= $this->method_call->fetch_emp_name($emp_code); ?>
  <input type="hidden" name="login_unm" class="form-control"  readonly value="<?php echo $emp_name; ?>"  required>      				

		
			 
	 <div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label"><h4>10</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4> Sourcing Comment</h4></label>
			<h5><div class="input-group  col-sm-6">
			<?php $emp_name= $this->method_call->fetch_emp_name($po_row->po_approval_level1); ?>

                 <?php if($po_row->po_approval_level1_cmt == null){
					 echo "Approval Pending From Sourcing  ($emp_name)" ;
					 
				 }else{
					 $cfo_dt= $this->method_call->fetch_po_status_dt($informal_po_id,$po_row->po_approval_level1);
				 echo $po_row->po_approval_level1_cmt; echo ' ('.$emp_name.')('.$cfo_dt.')';
				
				 } ?>

         
                </div></h5>
				
				  <?php $eid_owner= $this->method_call->fetchemp_email($po_row->pr_owner_empcode); ?>
  <input type="hidden" name="po_owner_eid" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  >
  
  
                </div> 			
				
					
						<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label"><h4>11</h4></label>
			 <label class="col-sm-5 pull-left control-label"><h4>Approve / Reject</h4></label>
			   <div class="input-group  col-sm-6">
			  <input type="radio" name="info_po_state" value="PO_Approved" required > APPROVE</input> 
			   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <input type="radio" name="info_po_state" value="PO_Reject" > REJECT</input>

         
                </div>
                </div>	
				
				
				
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label"><h4>12</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4>Approver Comment</h4></label>
				<div class="input-group  col-sm-6">
                 
              
				<textarea name="po_approver_cmt"  maxlength = "250" rows="4" cols="50"  required ></textarea>
				
				  <div id="the-count">
					<span id="current">0</span>
					<span id="maximum">/ 250</span>
				 </div>
         
                </div>
                </div>			

				


 
 <?php $emp_name= $this->method_call->fetch_emp_name($emp_code); ?>
  <input type="hidden" name="sub_mail" value="<?php echo $emp_name; ?>" readonly  class="form-control"  >
  			
<input type="hidden" name="login_emp_code" value="<?php echo $emp_code; ?>" readonly  class="form-control"  >
								
<input type="hidden" name="po_empcode" class="form-control"  readonly value="<?php echo $po_row->informal_po_empcode; ?> "  required>   

 <input type="hidden" name="po_approval1_emp" class="form-control"  readonly value="<?php echo $po_row->po_approval_level1; ?> "  required>  


<!-- footer start -->	
<div class="box-footer">

					  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
				
<div class="col-sm-2"><button type="submit" id="btn-submit"  class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Proceed</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/informal_po/index') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Cancel</a></div>
				
				
				<div class="col-sm-4 ">
				</div>
				
                </div>
					
	</div>				 
   <?php 
 }
 }?>		
	<!--end -->		
			             <!-- /.box-body h    -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		

   </div>
  
  </div>			
		
  

   </section>

  	
	<!--end -->	
  
  
  	<!--  PR view modal -->

<div class="modal fade displaycontent" id="editModal">

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
			

            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;"  readonly value="  <?php echo $po_row->pr_id; ?>"  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($po_row->dept_id); ?>
						   <input type="Text" name="pr_dept_nm" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($po_row->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php echo $po_row->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>		
			    <div class="form-group col-sm-12">
			        <table id="exam" class="table " style="font-size: 12px!important;">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;">
                  
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
				  <?php $item= $this->method_call->list_pr_items_po($informal_po_id);
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $po_row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $po_row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $po_row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $po_row->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $po_row->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $po_row->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $po_row->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $po_row->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                   <?php echo $po_row->procurement_res;  ?>

         
                </div>
                </div>
		
			
 
		
	</div>
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end    -->	
  
    <!--  QCS view modal -->

<div class="modal fade displaycontent" id="qcsModal">

<div class="modal-dialog" role="document" style="width:1280px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View QCS</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

	  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS No :</label>
				<div class="input-group  col-sm-6">
              <?php echo $po_row->qcs_id; ?>
                </div>
                </div> 
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner :</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $po_row->qcs_owner; ?>
         
                </div>
                </div>
				<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier :</label>
				<div class="input-group  col-sm-6">
                 
				<?php echo $po_row->selected_supplier; ?>	
    
                </div>
                </div>
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">QCS Date/Time :</label>
				<div class="input-group  col-sm-6">
               <?php echo $po_row->qcs_date; ?>
                </div>
                </div> 
				
					
				<br><br>
					<div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Justification for Selection of Supplier :</label>
				<div class="input-group  col-sm-6">
                 
                              
         <?php echo $po_row->justification_supplier; ?>

         
                </div>
                </div>
		 <div class="form-group col-sm-6">
			 <label class="col-sm-1 pull-left control-label"><h4>6</h4></label>
			   <label class="col-sm-5 pull-left control-label"><h4>QCS Item Detail :</h4></label>
			 </div>  
			  <div class="table-responsive" style="width:100%;">
            <table id="exampletest" class="table " style="font-size: 12px!important;">
                <thead>
					<tr style="background-color:#3482AE;color:#FFFFFF;">
			 
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $po_row-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" > <center>2. <?php echo $po_row-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $po_row-> sup3_nm; ?>   <center></th>
				

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

									
				  <?php $view_item= $this->method_call->qcs_items_po($informal_po_id);
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
	
    </div>   
		
		  
<!-- end -->	

   <!-- Technical specification --> 
  <div class="box-header with-border ">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">7 . Technical Specification Comparison</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
				
					

            <div class="row">
              <div class="col-sm-12" style="  ">
            <div class="row">
			
			
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table" style="font-size: 12px!important;">
            
                <tbody>
								  <tr style="background-color:#3482AE;color:#FFFFFF;">
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" >Technical Specification</td>
				 <td colspan="3"  ><b> <center>Final Supplier   :&nbsp;&nbsp; <?php echo $po_row->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $po_row->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" ><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $po_row->sup3_nm; ?><center></b> </td>
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
				 <td colspan="6" >Credibility Of The Supplier Checked													
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
			 
			 
			 
				 <td colspan="6" >Insurance & Freight</td>
				 
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
				 
				  <td colspan="3">  
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
				 <td colspan="6" >Inspection / Testing													</td>
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
	  
	   <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 14 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6">Supplier Mobile NO</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				   <td colspan="3"  >  <?php echo $po_row->sup2_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $po_row->sup3_contact_no; ?> </td>
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
				 <td colspan="6">Supplier Contact Person</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				    <td colspan="3"  >  <?php echo $po_row->sup2_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $po_row->sup3_contact_person; ?> </td>
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
				 <td colspan="6">Supplier EmailID</td>
				 <td colspan="3"  > <?php echo $po_row->sup1_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				   <td colspan="3"  >  <?php echo $po_row->sup2_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $po_row->sup3_eid; ?> </td>
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
<!-- end --> 
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
        title: "Informal PO Approve",
        text: "You will not be able to Edit this PO!",
        type: "success",
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your PO Approve Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}	
});
</script>


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

  </body>
</html>