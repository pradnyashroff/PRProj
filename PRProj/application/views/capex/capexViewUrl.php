 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php $capex_detail= $this->method_call->detail_capex(base64_decode($passID));
 if($capex_detail!=null){
	 foreach ($capex_detail->result() as $capex_row)  
         {  ?>    
		 
  <title> CAPEX NO <?php echo $capex_row->capex_id; ?> </title>
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

 

 <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <b><h1 style ="text-align:center;">
     View CAPEX 
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1><b>


    </section>

    <!-- Main content -->


	 
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
 
 
 
  <?php $q_capex_detail= $this->method_call->qcs_detail_for_capex(base64_decode($passID));
 if($q_capex_detail!=null){
	 foreach ($q_capex_detail->result() as $q_row)  
         {  ?> 
				
	  	 
      <div class="box-body">
        


      
         <div class=" form-group col-sm-12" style="text-align:center; font-size:20px;">
		<span> <b> CAPITAL EXPENDITURE  APPROVAL MEMO </b></span>
		 </div>
		 
		 </br></br> </br>
					 <div class="col-sm-3">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-6 pull-left control-label">CAPEX NO : </label>
				<div class="input-group  col-sm-4">
                 
               <?php echo $capex_row->capex_id; ?>
    
                </div>
                </div>
				
				
				 <div class="col-sm-5">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">CAPEX Owner : </label>
				<div class="input-group  col-sm-5">
                 
               <?php echo $capex_row->cap_recommender; ?>
    
                </div>
                </div>
				
				
				
				
				
					  	 
				
			  
			  <div class="form-group col-sm-3">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">CAPEX Date :</label>
				<div class="input-group  col-sm-6">
                  
				  <?php echo $capex_row->capex_date; ?>

                </div>
                </div>
				
				
				 <div class="form-group col-sm-3">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-6 pull-left control-label">QCS NO :</label>
				<div class="input-group  col-sm-4">
				
				
				 <?php echo $q_row->qcs_id; ?> 
                </div>
                </div>
				
			
				
				
					 <div class="form-group col-sm-5">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner : </label>
				<div class="input-group  col-sm-5">
			<?php echo $q_row->qcs_owner; ?>
                </div>
                </div>
				
				
				 <div class="form-group col-sm-3">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">QCS Date :</label>
				<div class="input-group  col-sm-4">
					<?php echo $q_row->qcs_date; ?>
				</div>
                </div>
				
			
			   <div class="col-sm-3">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-6 pull-left control-label">PR No :</label>
				<div class="input-group  col-sm-4">
               <?php echo $capex_row->pr_id;?>
                </div>
                </div> 
				
				
						
			 <div class="form-group col-sm-5">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">Department :</label>
				<div class="input-group  col-sm-5">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($q_row->dept_id); ?>
		
						
				<?php print_r($dept_nm['dept_name']); ?>
         
                </div>
                </div>
		
				
				 	
				
				 <div class="col-sm-3">
			  
			  <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-4 pull-left control-label">Plant :</label>
				<div class="input-group  col-sm-4">
              <?php echo $q_row->plant_code; ?>
                </div>
                </div> 
				
				
			 

		<!-- end -->
				<!-- capex start -->
			</br>	</br>	</br>	 </br>	</br> </br></br> </br>
			
			 <?php } 
 } ?>				
		
			
				<!-- Capex detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Capex Detail</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
	  				
			
    
 <table id="example" class="table table-bordered table-striped display" style="font-size: 12px!important;">
    <thead>
      <tr>
        <th style="width:5%;">SR.No</th>
		<th style="width:30%;" >Capex Details</th>
		<th > Approval Memo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
		<td>FUND NO</td>
		<td><?php echo $capex_row->fund_no; ?></td>
      </tr>
     
	 
	  <tr>
        <td>2</td>
		<td>Master Asset GL Code</td>
		<td><?php echo $capex_row->master_gl_code; ?> </td>
      </tr>
	  
	  <?php 
			if($capex_row->radio_val == 'capitalGl')
			{
				?>
				
		<tr>
        <td>3.1</td>
		<td>Required Capital GL Code-1 </td>
		<td><?php echo $capex_row->actual_gl_code;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Ammount : </b> <?php echo $capex_row->amtGlCode1;?>  </td>
      </tr>
	  
	    <tr>
        <td>3.2</td>
		<td>Required Capital GL Code-2</td>
		<td><?php echo $capex_row->actual_gl_code2;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Ammount : </b>  <?php echo $capex_row->amtGlCode2;?> </td>
      </tr>
	  
	  
	  
	    <tr>
        <td>3.3</td>
		<td>Required Capital GL Code-3</td>
		<td><?php echo $capex_row->actual_gl_code3;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Ammount : </b>  <?php echo $capex_row->amtGlCode3;?> </td>
      </tr>
	 		
				
			<?php
			}
			
			else 
			{
				?>
				
				    <tr>
        <td>3.1</td>
		<td>Revenue GL Code-1</td>
		<td><?php echo $capex_row->revenue_gl_code1;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Ammount : </b>  <?php echo $capex_row->amtRevenueGlCode1;?> </td> </td>
      </tr>
			



				    <tr>
        <td>3.2</td>
		<td>Revenue GL Code-2</td>
		<td><?php echo $capex_row->revenue_gl_code2;?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Ammount : </b>  <?php echo $capex_row->amtRevenueGlCode2;?> </td></td>
      </tr>
							
				
		<?php 
		}
	  ?>
	  
	  
	  
	   <tr>
        <td>4</td>
		<td>Budget Sr. Number</td>
		<td><?php echo $capex_row->budget_no; ?></td>
      </tr>
	  
	   <tr>
        <td>5</td>
		<td>Project completion Date (Put-To-Use Date) (Approx.)</td>
		<td><?php echo $capex_row->proj_comp_date; ?></td>
      </tr>
	  
	  
	   <tr>
        <td>6</td>
		<td>Recommender</td>
		<td><?php echo $capex_row->cap_recommender; ?></td>
      </tr>
	  
	   
	  
	  
	     <tr>
        <td>7</td>
		<td>Company/ Unit</td>
		<td><?php echo $capex_row->cap_unit; ?></td>
      </tr>
	  
	  
	     <tr>
        <td>8</td>
		<td>Type of Capex</td>
		<td><?php echo $capex_row->capex_type; ?></td>
      </tr>
	  
	   <tr>
        <td>9</td>
		<td>Part of Business Plan for the FY?</td>
		<td><?php echo $capex_row->bussiness_plan; ?></td>
      </tr>
	  
	   <tr>
        <td>10</td>
		<td>Part of Approved Project</td>
		<td><?php echo $capex_row->approved_proj; ?></td>
      </tr>
	  
	   
	   <tr>
        <td>11</td>
		<td>Brief Background/ Description of Capex</td>
		<td><?php echo $capex_row->des_capex; ?></td>
      </tr>
	 
	  
	   <tr>
        <td>12</td>
		<td>Brief Business/ Financial  Justification for Capex</td>
		<td>
        <table id="exampletest" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th>  Final Rates </th>  
            <th> Final Amt	</th>  
			
				
				 
				

      </tr>
			
             
		
				
                </thead>
		<tbody>
		<?php $view_item= $this->method_call->qcs_items_capex(base64_decode($passID));
				  	$final_rate=0; 
					$total_final_ammount1=0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>
		 <!-- item code -->
	
		
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			 <td  ><?php echo $rowitem->q_item_code; ?></td> 
				
				<td> <?php echo $rowitem->q_hsn_code; ?></td>  				 
            <td>  <?php echo $rowitem->q_item_description; ?></td>  
            <td> <?php echo $rowitem->q_req_quantity; ?></td>  
            <td> <?php echo $rowitem->q_uom; ?></td>  
          
            <td>  <?php echo $rowitem->final_rate1; ?> </td>  
            <td> <?php echo $rowitem->final_amt1; ?> </td>  
			

			
		
		
		
		
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
 
		
		</td>
      </tr>
	  
	   
	    <tr>
        <td>13</td>
		<td>Source/ Supplier/ Agency</td>
		<td><?php echo $capex_row->cap_sel_supplier; ?></td>
      </tr>
	  
	   <tr>
        <td>14</td>
		<td>Credibility Check</td>
		<td><?php echo $capex_row->credibility_check; ?></td>
      </tr>
	  
	   <tr>
        <td>15</td>
		<td>Quantum (Total Amount) of Capex</td>
		<td><?php echo $capex_row->quant_capex; ?></td>
      </tr>
	  
	  
	     <tr>
        <td>16</td>
		<td>Basis of Price</td>
		<td><?php echo $capex_row->basis_price; ?></td>
      </tr>
	  
	   
	  
	     <tr>
        <td>17</td>
		<td>Payment Terms</td>
		<td><?php echo $capex_row->pay_term; ?></td>
      </tr>
	  
	  
	      <tr>
        <td>18</td>
		<td>Any warranties/ Guarantees</td>
		<td><?php echo $capex_row->warranties_capex; ?></td>
      </tr>
	  
	      <tr>
        <td>19</td>
		<td>Any Bank Guarantees Involved</td>
		<td><?php echo $capex_row->bank_guarantees; ?></td>
      </tr>
	  
	    <tr>
        <td>20</td>
		<td>Any penalties involved for failure on delivery or performance</td>
		<td><?php echo $capex_row->delivery_peformace; ?></td>
      </tr>
	  
	  
	    <tr>
        <td>21</td>
		<td>Specific exclusions and inclusions in the scope of supply</td>
		<td><?php echo $capex_row->scope_supply; ?></td>
      </tr>
	  
	     <tr>
        <td>22</td>
		<td>Any other special/ noteworthy terms or condition</td>
		<td><?php echo $capex_row->noteworthy_capex; ?></td>
      </tr>
	  
	     <tr>
        <td>23</td>
		<td>Any Technical Aspect to be highlighted</td>
		<td><?php echo $capex_row->technical_aspect; ?></td>
      </tr>
	  
	   <tr>
        <td>24</td>
		<td>Estimated Associated or Consequential Costs- that is, cost to company to make the capex actually productive</td>
		<td><?php echo $capex_row->estimated_associated; ?></td>
      </tr>
	  
	   <tr>
        <td>25</td>
		<td>ROI Attachment</td>
		<td>  <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/capex_attachment/". $capex_row->capex_attachment ?>"> <?php echo $capex_row->capex_attachment ?></a> </b></td>
      </tr>
	  
    </tbody>
  </table>

	  



	  

	</div>
		 <?php }
 }?>
 
 <!-- Approver History -->
 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">3. &nbsp; Approver History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
				
			        <table id="example" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>
					
				
			
                <tr>
                				
				
				<th> Capex ID</th>
			
				<th>Approver Name</th>				
				<th> Approver Comment </th>
				<th> Approver Status</th>  				
				<th>  Date / Time </th>  
				
                </tr>  
			
				
                </thead>
				

                <tbody>
				
	 				
				</tbody>
				
  <?php $item= $this->method_call->capex_approver_history_id(base64_decode($passID));
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         {   $appver_name= $this->method_call->fetch_emp_name($rowhistory->cpx_approval_emp_code); ?>
	
			<tr>
				 <td>  <?php echo $rowhistory->capex_id; ?></td>
				 
				 <td><?php echo $appver_name; ?></td>
				 <td  ><?php echo $rowhistory->cpx_approval_comment; ?></td> 
				<td><?php echo $rowhistory->cpx_approver_status; ?></td>
				<td><?php echo $rowhistory->cpx_approval_date; ?></td>
			</tr>
	 

				
		 <?php  }
 } ?>
                
	  
	  
	  </tbody>
               		
              </table>
				 
				
			 </div>
			 
			 
            </div>
			
			
			
</div>
<!--end -->
 
	


<!-- Asset code -->
			
			
			 <div class="box-header">
					   <div class="box box-default">
					   <div class="box-header">
              <h3 class="box-title">4.  Asset Code Creation </h3>
				

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  
			   <div class="box-body ">
			   
			   
			   			   <div class="box-body table-responsive hidden">
                          <table id="exampletest" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
                  <th >Sr. No.</th>
				  <th >Business Area</th>
				 
				  
				   <th >Item Code</th>
				    <th >Item Descriptions</th>
				   <th >UOM</th>
				    <th >Qty.</th>
					<th>Cost Centre</th>
					<th>Asset Group </th>
				
      </tr>
	
                </thead>
		<tbody>
		
							<?php $view_item = $this->method_call->qcs_items_assetcode(base64_decode($passID));
						
				
 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $row_asset)  
         {  ?>
		
		<tr> 
			
			<td> <?php echo $row_asset->asset_id; ?></td>
			<td> <?php echo $row_asset->cap_unit; ?></td>
			<td><?php echo $row_asset->q_item_code; ?></td> 
			<td><?php echo $row_asset->q_item_description; ?></td>  
			<td> <?php echo $row_asset->q_uom; ?></td> 
            <td> <?php echo $row_asset->q_req_quantity; ?></td>  
			<td>  <?php echo $row_asset->cost_center; ?></td>  
			<td><?php echo $row_asset->asset_grp; ?>  </td>  
           
         
		</tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
		
	
		 </tbody>
		
		 </table>
		
			 </div>
			   
			  <br>
			
			   
			   </div>
			 	<div class="form-group col-sm-12">
			  
			 
			   <label class="col-sm-4 pull-left control-label">5 . Asset Code List :</label>
				<div class="input-group  col-sm-6">
				
				 <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/assetFile_attach/". $capex_row->assetFile_attach ?>"> <?php  echo $capex_row->assetFile_attach; ?></a> </b>
    
                </div>
                </div> 
                
                <div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">CAPEX ION NO</label>
				<div class="input-group  col-sm-6">
				
				<?php echo $capex_row->capex_ion_no;?>
                </div>
                </div> 
                
                
                	<div class="form-group col-sm-12">
			  
			   <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Release NO</label>
				<div class="input-group  col-sm-6">
				
		 <?php echo $capex_row->cpx_release_no;?>
                </div>
                </div> 	
                

			   </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
            </div>
			
			
			
</div>
<!--end -->


			


				   
				</div>
				</div>
			

			
</div>
<!--end -->
	

	<!-- body close -->
<!-- footer start -->	
			 
		
	<!--end -->		
			             <!-- /.box-body -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		

   </div>
  
  </div>			
			  
        

       
</form>
   
   </section>
  <!-- /.content-wrapper -->

  
  
  	<!--  PR view modal -->

<div class="modal fade displaycontent" id="prModal">

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
			
  
            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label">1</label>
                  <label class="col-sm-5 pull-left control-label">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control"  readonly value=" <?php echo $capex_row->pr_id;  ?> "  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control"  readonly value="<?php echo $capex_row->pr_owner_name;  ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control"  readonly value="<?php echo $capex_row->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($capex_row->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($capex_row->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" readonly value="<?php echo $capex_row->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	
			  
			  
			  			  <div class="table-responsive" style="width:100%;">
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
				  <?php $item= $this->method_call->list_pr_items(base64_decode($passID));
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
			   <label class="col-sm-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $capex_row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $capex_row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $capex_row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                   <?php echo $capex_row->procurement_res;  ?>

         
                </div>
                </div>
		
			
 
		
	</div>
			
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end   -->	
  
  
<!-- item code model -->

<div class="modal fade displaycontent" id="itemc_up_Modal">

<div class="modal-dialog" role="document" style="width:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Item Code </h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

		
  <form id="itemDetails" name="itemDetails" action="<?php echo site_url('purchase/capex/updateItemCodeEdit'); ?>" method="post">
            <div class="row">
			
			
			 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Item Code</label>
				<div class="input-group  col-sm-4">
             
			 <input type="hidden" name="qcs_item_idEdit" class=" form-control" id="qcs_item_idEdit"   required>
			  <input type="Text" name="itm_codeEdit" class=" form-control" id="itm_codeEdit"   required>

         
                </div>
                </div>
				
				<br><br><br>
				
				 <div class="form-group col-sm-12">
			 <div class="col-sm-4">
			 </div>
				
<div class="col-sm-4"><button type="submit" name="save" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Update</button></div>

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
  <!-- end -->
  
    <!--  QCS view modal -->

<div class="modal fade displaycontent" id="qcsModal">

<div class="modal-dialog" role="document" style="width:1280px;">
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

	  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS No :</label>
				<div class="input-group  col-sm-6">
              <?php echo $q_row->qcs_id; ?>
                </div>
                </div> 
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner :</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $q_row->qcs_owner; ?>
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">QCS Date/Time :</label>
				<div class="input-group  col-sm-6">
               <?php echo $q_row->qcs_date; ?>
                </div>
                </div> 
				
					<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier :</label>
				<div class="input-group  col-sm-6">
                 
				<?php echo $q_row->selected_supplier; ?>	
    
                </div>
                </div>
				<br><br>
					<div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Justification for Selection of Supplier :</label>
				<div class="input-group  col-sm-6">
                 
                              
         <?php echo $q_row->justification_supplier; ?>

         
                </div>
                </div>
		 <div class="form-group col-sm-12">
			 <label class="col-sm-1 pull-left control-label"><h4>6</h4></label>
			   <label class="col-sm-4 pull-left control-label"><h4>QCS Item Detail :</h4></label>
			 </div>  
           <table id="exampletest" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $q_row-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" > <center>2. <?php echo $q_row-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $q_row-> sup3_nm; ?>   <center></th>
				

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

					 <?php
				  	$final_rate=0; 
					$total_final_ammount1=0;
					$total_quoted_amount2 = 0;
					$total_final_ammount2=0;
					$total_quoted_amount3 =0;
					$total_final_ammount3=0;					

  ?>
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
		
<?php
		 ?>
                
				
				
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
	
       
			  
<!-- end -->	

  <!-- Technical specification -->
  <div class="box-header with-border">
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
				 <td colspan="3" style="color:#1E8449" ><b> <center>Selected Supplier   :&nbsp;&nbsp; <?php echo $q_row->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" style="color:#00008B" ><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $q_row->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" style="color:#00008B" ><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $q_row->sup3_nm; ?><center></b> </td>
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
				 <td colspan="6" style="text-align:right;">Technical Details</td>
				 <td colspan="3"  > <?php echo $capex_row->tech_det_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->tech_det_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->tech_det_sup3; ?> </td>
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
				     <?php echo $capex_row->credibility_sup1; ?>       
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <?php echo $capex_row->credibility_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<?php echo $capex_row->credibility_sup3; ?>
				  
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
					<?php echo $capex_row->insurance_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<?php echo $capex_row->insurance_sup2; ?>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
						<?php echo $capex_row->insurance_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $capex_row->del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">  <?php echo $capex_row->del_period_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->del_period_sup3; ?></td>
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
				 <td colspan="3">  <?php echo $capex_row->del_mode_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><?php echo $capex_row->del_mode_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"> <?php echo $capex_row->del_mode_sup3; ?>   </td>
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
				 	<?php echo $capex_row->inspection_sup1; ?>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<?php echo $capex_row->inspection_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<?php echo $capex_row->inspection_sup3; ?>				  
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
				 <td colspan="3"  >  <?php echo $capex_row->pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->pymt_terms_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $capex_row->pymt_terms_sup3; ?> </td>
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
				 <td colspan="3"  >  <?php echo $capex_row->warranty_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $capex_row->warranty_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->warranty_sup3; ?> </td>
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
				 		<?php echo $capex_row->scope_instal_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  
				  			<?php echo $capex_row->scope_instal_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				  			<?php echo $capex_row->scope_instal_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $capex_row->taxes_duties_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->taxes_duties_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->taxes_duties_sup3; ?> </td>
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
				 <td colspan="3"  >  <?php echo $capex_row->note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->note_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->note_sup3; ?> </td>
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
				 <td colspan="3"  >  <?php echo $capex_row->validity_price_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->validity_price_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->validity_price_sup3; ?> </td>
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
				 <td colspan="3"  > <?php echo $capex_row->repl_scope_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->repl_scope_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->repl_scope_sup3; ?> </td>
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
<!-- end -->
  
       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

   <script>
function itemCodeUpdate_data(qcs_item_id,q_item_code) {
 // alert("pr_id..... "+qcs_item_id);
  // alert("q_item_code..... "+q_item_code);
   document.getElementById("itm_codeEdit").value = q_item_code;
	document.getElementById("qcs_item_idEdit").value = qcs_item_id;
	
}
</script>
   
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