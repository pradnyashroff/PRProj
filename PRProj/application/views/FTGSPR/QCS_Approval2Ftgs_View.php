<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
  		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<title>FTGS QCS View</title>
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
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
  <?php include_once 'headsidelistFTGS.php'; ?>	
    <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
      <section class="content-header">
        <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
          FTGS QCS View
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
        <li class="active" style="color:#FFFFFF;text-transform: uppercase;">FTGS QCS Draft</li>
        </ol>
      </section>
     <section class="content" id="content">
        <div class="wrapper">
            <?php 
                    $FTGS_QCS_Draft_view= $this->method_call->ftgsqcsDetails($ftgs_qcs_id);
                    if($FTGS_QCS_Draft_view!=null){
                      foreach ($FTGS_QCS_Draft_view->result() as $row4)  
                        { 
                        $pr_id=$row4->ftgs_pr_id; ?>
            <div class="box-body">
               
                  
                    <div class="box-header with-border">
                      <div class="box box-default">
                        <div class="box-header with-border">
                        <h3 class="box-title">1 . QCS Details</h3>
                          <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          </div>
                        </div>
                        <div class="box-body">
                          <div class="col-sm-4">
                             <label class="col-sm-1 pull-left control-label">1</label>
                              <label class="col-sm-4 pull-left control-label">QCS Number </label>
                             <div class="input-group  col-sm-6">
                                <?php echo $row4->ftgs_qcs_id; ?>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <label class="col-sm-1 pull-left control-label">2</label>
                              <label class="col-sm-4 pull-left control-label">PR NO </label>
                              <div class="input-group  col-sm-6">
                                 <?php echo $row4->ftgs_pr_id; ?>
                              </div>
                          </div>
                          <div class="form-group col-sm-4 ">
                      <label class="col-sm-1 pull-left control-label">3</label>
                    <label class="col-sm-4 pull-left control-label">QCS Owner</label>
                  <div class="input-group  col-sm-6">
                     <?php echo $row4->ftgs_qcs_owner; ?>
                    </div>
                        </div>
                <div class="form-group col-sm-4 ">
                      <label class="col-sm-1 pull-left control-label">4</label>
                    <label class="col-sm-4 pull-left control-label">Plant</label>
                    <div class="input-group  col-sm-6">
                       <?php echo $row4->ftgs_plant_code; ?>
                      </div>
                        </div>
                <div class="form-group col-sm-4">
                      <label class="col-sm-1 pull-left control-label">5</label>
                    <label class="col-sm-4 pull-left control-label">PR Type</label>
                  <div class="input-group  col-sm-6">
                     <?php echo $row4->ftgs_pr_type; ?>
                  </div>
                        </div>
                <div class="form-group col-sm-4 ">
                      <label class="col-sm-1 pull-left control-label">6</label>
                    <label class="col-sm-4 pull-left control-label">Fund NO/ION NO</label>
                  <div class="input-group  col-sm-6">
						<?php $ionno= $this->method_call->fetch_ion_no($row4->ftgs_pr_id);?>
						<?php echo $ionno; ?>
                  </div>
                        </div>
                        </div>
                      </div>
                    </div>
                      

					  
					  
					  
					  
					  <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Cost Comparison Summary</h3>

              <div class="box-tools pull-center">
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
				
							
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->ftgs_view_qcs_items($ftgs_qcs_id);
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
		
			<tr>
				
            <td>  <?php echo $rowitem->ftgs_quot_rate1; ?></td>  
            <td> <?php echo $rowitem->ftgs_quoted_amt1; ?></td>  
            <td>  <?php echo $rowitem->ftgs_final_rate1; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt1; ?> </td>  
			<td>  <?php echo $rowitem->ftgs_quot_rate2; ?></td>  
            <td> <?php echo $rowitem->ftgs_quoted_amt2; ?></td>  
            <td>  <?php echo $rowitem->ftgs_final_rate2; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt2; ?> </td>
			
			<td>  <?php echo $rowitem->ftgs_quot_rate3; ?></td>  
            <td> <?php echo $rowitem->ftgs_quoted_amt3; ?></td>  
            <td>  <?php echo $rowitem->ftgs_final_rate3; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt3; ?> </td>
		
		
                <?php

				$quoted_ammount1=$rowitem->ftgs_quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->ftgs_final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowitem->ftgs_quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowitem->ftgs_final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowitem->ftgs_quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowitem->ftgs_final_amt3;
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


			
				 
	
               		
              </table>

				
				
			<!--end -->	
		
		  </div>
						 

				
				   <div class="form-group col-sm-12">
			         <table id="example6" class="table table">
                <thead>

				
				
                <tr style="background-color:#3482AE;color:#FFFFFF;">
                				
				<th>  SR.NO </th> 
				<th>  Item ID </th>  
				<th>  Item Code </th>  
			<th>  Item Status </th>  
            <th>  Qty </th>  
            <th> UOM	</th>  
			
			<th>  Quoted Rate </th>  
			<th>  Quoted Amt </th> 
			<th> Final Amt	</th> 			
            <th>  Final Rates </th>  
            <th> % Add</th>  
			
			<th>  Final Amt </th>
			
			 			
           
				  
                </tr>  
			
				
                </thead>
						
                <tbody>
				
							
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->ftgs_view_qcs_items($ftgs_qcs_id);
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
		
			<tr>
				
				<td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#edititemcode" onclick="itemCodeUpdate_data('<?php echo $rowitem->ftgs_qcs_item_id;?>','<?php echo $rowitem->ftgs_q_item_code;?>','<?php echo $rowitem->ftgs_final_amt1;?>','<?php echo $rowitem->ftgs_q_req_quantity;?>')" ><?php echo $rowitem->ftgs_qcs_item_id; ?></a></p></td>
											
				<td>  <?php echo $rowitem->ftgs_qcs_item_id; ?> </td>
				<td>  <?php echo $rowitem->ftgs_q_item_code; ?></td>
				<td>  <?php echo $rowitem->ftgs_q_itm_sts; ?></td>
				<td>  <?php echo $rowitem->ftgs_q_req_quantity	; ?></td>	
				<td>  <?php echo $rowitem->ftgs_q_uom; ?></td>		
				
            <td>  <?php echo $rowitem->ftgs_quot_rate1; ?></td>  
            <td> <?php echo $rowitem->ftgs_quoted_amt1; ?></td>  
            <td>  <?php echo $rowitem->ftgs_final_rate1; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt1; ?> </td>  
		
			
			<td> <?php echo $rowitem->amt_per_add; ?> %</td>  
			<td> <?php echo $rowitem->per_final_amt; ?></td>  
           
		
		
                <?php

				$quoted_ammount1=$rowitem->ftgs_quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->ftgs_final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
				
					$final_ammount3 = $rowitem->per_final_amt;
					$total_final_ammount3 = $total_final_ammount3+$final_ammount3;
					
				?>
      </tr>
		
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
				
	
              </table>

				
			  
			  <!--button -->
   <div class="form-group col-sm-12">
    
<div class="col-sm-4">
</div>
	<!-- View Item -->
<div class="col-sm-4">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalView" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">Detailed View</button>
</div>

	<!-- Edit / Delete Item -->


<div class="col-sm-4"> 
</div>
   </div>
				
				
				
		
		  </div>
				
				
			 </div>
				
				 
				
			 </div>
			 
			 
            </div>
			
			
			
</div>
<!--end -->



<div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
             <h3 class="box-title">3 . Technical Specification Comparison</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  		  
			   <div class="box-body">
		
				
				 <?php 
                    $FTGS_QCS_Draft_view= $this->method_call->ftgsqcsTechDetails($ftgs_qcs_id);
                    if($FTGS_QCS_Draft_view!=null){
                      foreach ($FTGS_QCS_Draft_view->result() as $rowTech)  
                        { 
                        
						?>
					

            <div class="row">
              <div class="col-sm-12" style="  ">
			 

		<br>
		
	  
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table table">
            
                <tbody>
					   <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6">Technical Specification</td>
				 <td colspan="3"><b> <center>Final Supplier  :&nbsp;&nbsp; <?php echo $row4->ftgs_sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $row4->ftgs_sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $row4->ftgs_sup3_nm; ?><center></b> </td>
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
				 <td colspan="6">Technical Details</td>
				 <td colspan="3"  >  <?php echo $rowTech->ftgs_tech_det_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_tech_det_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowTech->ftgs_tech_det_sup3; ?> </td>
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
				 <td colspan="3"  >  
				 <?php echo $rowTech->ftgs_credibility_sup1; ?>          
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <?php echo $rowTech->ftgs_credibility_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<?php echo $rowTech->ftgs_credibility_sup3; ?>
				  
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
			<?php echo $rowTech->ftgs_insurance_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				 <?php echo $rowTech->ftgs_insurance_sup2; ?>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
							<?php echo $rowTech->ftgs_insurance_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $rowTech->ftgs_del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_del_period_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowTech->ftgs_del_period_sup3; ?> </td>
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
				 <td colspan="3"  >
				<?php echo $rowTech->ftgs_del_mode_sup1; ?>
				 </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_del_mode_sup2; ?> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >

			<?php echo $rowTech->ftgs_del_mode_sup3; ?>
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
				 <td colspan="6">Inspection / Testing</td>
				 <td colspan="3">
				 <?php echo $rowTech->ftgs_inspection_sup1; ?>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
					<?php echo $rowTech->ftgs_inspection_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
				<?php echo $rowTech->ftgs_inspection_sup3; ?>			  
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
				 <td colspan="3"  > <?php echo $rowTech->ftgs_pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowTech->ftgs_pymt_terms_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_pymt_terms_sup3; ?> </td>
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
				 <td colspan="3"  >  <?php echo $rowTech->ftgs_warranty_sup1; ?></td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_warranty_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowTech->ftgs_warranty_sup3; ?></td>
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
				 <?php echo $rowTech->ftgs_scope_instal_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				 <?php echo $rowTech->ftgs_scope_instal_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				<?php echo $rowTech->ftgs_scope_instal_sup3; ?>
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
				 <td colspan="3"  >  <?php echo $rowTech->ftgs_taxes_duties_sup1; ?></td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $rowTech->ftgs_taxes_duties_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_taxes_duties_sup3; ?></td>
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
				 <td colspan="3"  >  <?php echo $rowTech->ftgs_note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_note_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_note_sup3; ?> </td>
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
				 <td colspan="3"  > <?php echo $rowTech->ftgs_validity_price_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_validity_price_sup2; ?></td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_validity_price_sup3; ?></td>
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
				 <td colspan="3"  > <?php echo $rowTech->ftgs_repl_scope_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $rowTech->ftgs_repl_scope_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  ><?php echo $rowTech->ftgs_repl_scope_sup3; ?></td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
			
      </tr>
	  
	
                </tbody>
               		
              </table>
		
			  
		  </div>

		</div>
			<?php
						}
					}
					
					?>						
			  	
				
			 </div>
            </div>
			  
			  
			  
			  
			
			 
            </div>
		
</div>
<!--end -->

   
   
      <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Quotation Attachments</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
					   <div class="box-body">
		
				
				
				   <div class="form-group col-sm-12">
	
	 <div class="form-group col-sm-12">
			    <div class="col-sm-5 ">
				
				
<?php $filea= $this->method_call->filefetchqcs($ftgs_qcs_id); 
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
 <a style="color: #337ab7;" href="<?php echo base_url()."uploads/Ftgs_qcs/". $ftgs_qcs_id ."/".$rowfile->ftgs_qcs_file_nm;?>"><?php echo $rowfile->ftgs_qcs_file_nm; ?></a></br></br>
		 <?php
		 }
 } ?>
                </div>
			  
			                </div>
		  </div>
				
				
			 </div>
            </div>
			
			
			
</div>
<!--end -->
  <!-- end --->
  
  
   <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">5 . Self Declaration</h3>
               <div class="box-tools pull-right">
                <button type="button" onclick="sendData('<?php echo $row4->ftgs_offers_received; ?>','<?php echo $row4->ftgs_outside_budget; ?>','<?php echo $row4->ftgs_order_value; ?>','<?php echo $row4->ftgs_non_properitery_item; ?>','<?php echo $row4->ftgs_properitery_item; ?>','<?php echo $row4->ftgs_post_grn_nonproprietary; ?>','<?php echo $row4->ftgs_post_grn_proprietary; ?>','<?php echo $row4->ftgs_delivery_terms;?>','<?php echo $row4->ftgs_cost_reimb_cust; ?>','<?php echo $row4->ftgs_repl_cost_agreed; ?>','<?php echo $row4->ftgs_advance_bg; ?>','<?php echo $row4->ftgs_advance_25; ?>','<?php echo $row4->ftgs_paymt_trm_grn_90; ?>','<?php echo $row4->ftgs_imported_item; ?>')" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                <?php echo $row4->ftgs_outside_budget; ?>
              
                </div>
				
				  <div class="form-group col-sm-4">
				  <?php 
						if($row4->ftgs_outside_budget == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_outside_budget; ?> ) </span>
							
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
			  
			  <label class="pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Any advance for non-proprietary items  </label>
				<div class="form-group col-sm-3">
               
               <?php echo $row4->ftgs_non_properitery_item; ?>
             
                </div>
				
				  <div class="form-group col-sm-4">
               <?php 
						if($row4->ftgs_non_properitery_item == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->draft_just_adv_nonprop; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                 </div>
				  
				  
                </div>
				
             <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Advance Payment > 20% for proprietary items
			</label>
				<div class="form-group col-sm-3">
               
                <?php echo $row4->ftgs_properitery_item; ?>
                </div>
				
				  <div class="form-group col-sm-4">
               
			   <?php 
						if($row4->ftgs_properitery_item == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_adv_proprietery; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
			    </div>
				  
				  
                </div>
                
				     
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 30 days for non-proprietary  </label>
				<div class="form-group col-sm-3">
               <?php echo $row4->ftgs_post_grn_nonproprietary; ?>
                </div>
				
				  <div class="form-group col-sm-4">
               
			    <?php 
						if($row4->ftgs_post_grn_nonproprietary == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_final_payment_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
			    </div>
				  
				  
                </div>
                
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 7 days for proprietary  </label>
				<div class="form-group col-sm-3">
               
                <?php echo $row4->ftgs_post_grn_proprietary; ?>
                </div>
				
				  <div class="form-group col-sm-4">
                <?php 
						if($row4->ftgs_post_grn_proprietary == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_final_pymt_post_grn; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                 </div>
				  
				  
                </div>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Delivery terms not at REPL gate  </label>
				<div class="form-group col-sm-3">
               
               <?php echo $row4->ftgs_delivery_terms; ?>
                </div>
				
				  <div class="form-group col-sm-4">
                <?php 
						if($row4->ftgs_delivery_terms == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_delivery_gate; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                  </div>
                </div>
				
				<!-- capex -->
				
				  <label class="pull-left control-label" style="color:red;">For CAPEX Only</label>
				<br>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label"> If cost non-reimbursable by customer  </label>
				<div class="form-group col-sm-3">
              <?php echo $row4->ftgs_cost_reimb_cust;?>
             
                </div>
				
				<div class="form-group col-sm-4">
                <?php 
						if($row4->ftgs_cost_reimb_cust == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_cost_reimb_cust; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
					
				 </div>
				 
				 
                </div>
				
				
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">REPL cost > customer agreed reimbursement  </label>
				<div class="form-group col-sm-3">
           <?php echo $row4->ftgs_repl_cost_agreed;?>
                </div>
				
				<div class="form-group col-sm-4">
               
			   <?php 
						if($row4->ftgs_repl_cost_agreed == 'YES'){
							?>
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_repl_cost_agree; ?> ) </span>
							
						<?php
						}
						else{
							
							
						}
					?>
                  </div>
				 
				 
                </div>
				
            </div>
			
</div>
   
   
   <!--end-->

   
<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Additional Details (Attachments) </label>
				<div class="input-group  col-sm-6">
                 <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_additional_attachment/". $row4->ftgs_additional_attachment ?>"> <?php echo $row4->ftgs_additional_attachment ?></a> </b>
        

                </div>
				
				
			    </div>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier</label>
				<div class="input-group  col-sm-6" >
                 
            <?php echo $row4->ftgs_sup1_nm; ?>
                  
                </div>
                </div>
				
				
						<div class="form-group col-sm-12">
						  <label class="pull-left control-label">8</label>
						     <label class="col-sm-4 pull-left control-label">APPROVER STATUS</label>
									
								<div class="form-group col-sm-12">
								<table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
										<tbody>
											<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
												<th colspan="3" >  APPROVER NAME</th>
												<th colspan="3" >APPROVER DATE/TIME</th>
												<th colspan="3" >APPROVER COMMENT</th>
												<th colspan="3" >ACTION</th>
											</tr>
													
											<tr>
											<?php $approval= $this->method_call->qcs_approval_status($ftgs_qcs_id);
										 
											if($approval!=null){
														  
												foreach ($approval->result() as $row1)  
													{  
										?>								
												
												<td colspan="3" ><?php echo $row1->emp_name; ?></td>
												<td colspan="3" > <?php echo $row1->action_date ." ".$row1->action_time; ?></td> 
												<td colspan="3" >
												<?php $comment=$row1->comment; 
														if($comment=="")
														
															echo "Pending";
													
														else
													
															echo $comment;
													
														?></td>
												<td><?php if($row1->action=="1")
															{
																echo 'Accepted';
															}
														elseif ($row1->action=="2") {
															echo 'Rejected';
															}
														else
															{
															echo 'Pending';
															}
													?>
												</td>
											</tr>
											<?php } } ?>
										</tbody>
									</table>
									
									</div>
									
						 <form method="post" id="pend_pr" name="pend_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/QcsApproval2_insert') ?>" >
									<div class="form-group col-lg-12">
										<label class="col-lg-4 pull-left control-label">9. &nbsp;&nbsp;&nbsp;Action</label>
										<div class="input-group  col-lg-6">
											<input type="radio" name="ftgs_status" value="1" required > &nbsp;&nbsp;APPROVE</input>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" name="ftgs_status" value="2" >&nbsp;&nbsp; REJECT</input>
										</div>
									</div>
									<div class="form-group col-lg-12">
										<label class="col-lg-4 pull-left control-label">10. &nbsp;&nbsp;&nbsp;Approver Comment</label>
										<div class="input-group  col-lg-6">
											<textarea class="form-control" name="txt_comment" required> </textarea>
										</div>
									</div>
									<!------Mail Details Code Start From here--->
									
									 
									  <input type="hidden"  name="qcs_emp_nm" value="<?php echo $emp_name; ?>" class="form-control"  required>
									  <input type="hidden"  name="txt_emp_code" value="<?php echo $emp_code; ?>" class="form-control"  required>
									  <input type="hidden"  name="txtftgsId" value="<?php echo $row4->ftgs_qcs_id; ?>" class="form-control"  required>
									  <input type="hidden"  name="txtftgsPRId" value=" <?php echo $row4->ftgs_pr_id; ?>" class="form-control"  required>
										<input type="hidden"  name="txtPREmpCode" value=" <?php echo $row4->ftgs_pr_owner_empcode; ?>" class="form-control"  required>  
									<input class="form-control" type="hidden" name="txtTotalAmt" value=" <?php echo $final_rate; ?>"/>
									<input class="form-control" type="hidden" name="txtqcsDate" value=" <?php echo $row4->ftgs_qcs_date; ?>"/>
									<input class="form-control" type="hidden" name="txtEmpPlant" value=" <?php echo $row4->ftgs_plant_code; ?>"/>
									<input class="form-control" type="hidden" name="txtAmtPer" value=" <?php echo $total_final_ammount3;; ?>"/>
									
									<!------Mail Details Code Start From here--->
									
									<div class="box-footer">
										<div class="form-group col-sm-12">
											<center>
											<button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button>
											</center>
										</div>			
									</div>
							
							
					
									
									<?php
								$autho_code = $this->method_call->getApproval3AuthoDetails();
							
								if ($autho_code != null) {
								foreach ($autho_code->result() as $row1) {
										?>
                            <input type="hidden" name="authoID" class="form-control" value="<?php echo $row1->auth_id;?>">
							 <input type="hidden" name="authoMail" class="form-control" value="<?php echo $row1->emp_email;?>">
                          
                                <?php }
                        }
                        ?>
						
						
						
									<?php
								$ftgsActionData = $this->method_call->ftgsApproval2Action($emp_code,$ftgs_qcs_id);
							
								if ($ftgsActionData != null) {
								foreach ($ftgsActionData->result() as $row1) {
										?>
                            <input type="hidden" name="Ftgs_action_id" class="form-control" value="<?php echo $row1->action_grid_id;?>">
                             
                                <?php }
                        }
                        ?>
						</form>						

</div>
</section>


  <!-- end -->

    </div>
	
	
	
  
  
  
  <!-- view modal -->

<div class="modal fade displaycontent" id="myModalView">

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
		

            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->ftgs_qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table">
                <thead>
					<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
			 
			 
         
                  <th style="border:none;">Sr. No.</th>
				   <th style="border:none;">Item Code</th>
				   
				   <th style="border:none;">HSN Code</th>
				   <th style="border:none;">Item Status </th>
				   <th style="border:none;">Item Descriptions</th>
				   <th style="border:none;">Qty.</th>
				   <th style="border:none;">UOM</th>
				 <th colspan="4" style="border:none;"><center> 1. <?php echo $row4-> ftgs_sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" style="border:none;"> <center>2. <?php echo $row4-> ftgs_sup2_nm; ?>  <center></th>
				 <th colspan="4" style="border:none;"> <center>3. <?php echo $row4-> ftgs_sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr >
                				 <th colspan="7" style="text-align:right;"></th>

			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			<th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>  
			  <th style="border:none;">  Quoted Amt </th>  
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th>  
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Rate </th>
			<th style="border:none;">    QUOTED  Amt </th>  			
            <th style="border:none;">  Final Rates </th>  
            <th style="border:none;"> Final Amt	</th> 
			 			
				  
                </tr>  
		
				
                </thead>
		
                <tbody>
				<!-- Items to be inserted here -->

									
				  <?php $view_item= $this->method_call->ftgs_view_qcs_items($ftgs_qcs_id);
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
			
				 
			<td  style="border:none;"><?php echo $sr_no; ?> </td>
			 <td  style="border:none;"><?php echo $rowitem->ftgs_q_item_code	; ?></td> 
				 	<!--<td  ><?php print_r($item_nm['item_code']); ?></td> -->
					
				<td style="border:none;">  <?php echo $rowitem->ftgs_q_hsn_code; ?></td>  	
				<td style="border:none;">  <?php echo $rowitem->ftgs_q_itm_sts; ?></td>  					
            <td style="border:none;">  <?php echo $rowitem->ftgs_q_item_description; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_q_req_quantity; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_q_uom; ?></td>  
            <td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->ftgs_quot_rate1; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_quoted_amt1; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->ftgs_final_rate1; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_final_amt1; ?> </td>  
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->ftgs_quot_rate2; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_quoted_amt2; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->ftgs_final_rate2; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_final_amt2; ?> </td>
			
			<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  <?php echo $rowitem->ftgs_quot_rate3; ?></td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_quoted_amt3; ?></td>  
            <td style="border:none;">  <?php echo $rowitem->ftgs_final_rate3; ?> </td>  
            <td style="border:none;"> <?php echo $rowitem->ftgs_final_amt3; ?> </td>

			
		
		
		
		
                <?php

				$quoted_ammount1=$rowitem->ftgs_quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->ftgs_final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowitem->ftgs_quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowitem->ftgs_final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowitem->ftgs_quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowitem->ftgs_final_amt3;
					$total_final_ammount3 = $total_final_ammount3+$final_ammount3;
					
				?>
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
				
				  <tfoot>
        <tr>
            <td style="text-align:right;" colspan="8"><b>Grand Total:</b></td>
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
  
  <div class="modal fade displaycontent" id="edititemcode">
				<div class="modal-dialog" role="document" style="width: 630px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#3482AE">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Details</h4>
						</div>
						<div class="modal-body">
							<section class="module pt-10" id="contact" >
								<div class="container" style="width: auto;">
									<form method="post" id="add_ftgs_pr" name="add_ftgs_pr" action="<?php echo site_url('FTGS_PR/Ftgs_pr/PerAddAgaintItem') ?>" enctype='multipart/form-data'>
									<div class="row">
										
								 <table id="example6" class="table table">
                <thead>

				
				
                <tr style="background-color:#3482AE;color:#FFFFFF;">
                				
			<th>  Item ID </th>  
		<th>  Item Code </th>  
			<th>Qty</th>
          <th>  Final Rates </th>  
            <th> % Add</th>  
			
			<th>  Final Amt </th>
			
			 			
           
				  
                </tr>  
			
				
                </thead>
						
                <tbody>
				
				<tr>
			<td><input type ="text" value=" <?php echo $rowitem->ftgs_qcs_item_id; ?> " class="form-control"  name="ftgs_qcs_item_id" id="ftgs_qcs_item_id"> </td>			
		
			<td><input type ="text" value=" <?php echo $rowitem->ftgs_q_item_code; ?> " class="form-control"  name="ftgs_q_item_code" id="ftgs_q_item_code"></td>
			<td><input type ="text" value=" <?php echo $rowitem->ftgs_q_req_quantity; ?> " class="form-control"  name="ftgs_q_req_quantity" id="ftgs_q_req_quantity"></td>
			
			<td ><input type ="text" value=" <?php echo $rowitem->ftgs_final_amt1; ?> " class="form-control"  name="finalamt" id="finalamt"> </td>
			
		
		
			<td><input type ="text" class="form-control"  onkeyup="AddPerVal();" name="add10per" id="add10per">  </td>
			<td><input type ="text" class="form-control" name="txt10op" id ="txt10op"> </td>
	
				</tr>
				
							
				<!-- Items to be inserted here -->

									
			<!--	  <?php $view_item= $this->method_call->ftgs_view_qcs_items($ftgs_qcs_id);
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
		
			<tr>
				
				<td><?php echo $rowitem->ftgs_q_item_code; ?></td>
											
			
		``<td>  <?php echo $rowitem->ftgs_q_req_quantity; ?></td>	
				
          
            <td>  <?php echo $rowitem->ftgs_final_rate1; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt1; ?> </td> 
	<td style="display:none;"><input type ="text" value=" <?php echo $rowitem->ftgs_qcs_item_id; ?> " class="form-control"  name="ftgs_qcs_item_id" id="ftgs_qcs_item_id"> </td>			
			<td style="display:none;"><input type ="text" value=" <?php echo $rowitem->ftgs_final_amt1; ?> " class="form-control"  name="finalamt" id="finalamt"> </td>
			<td><input type ="text" class="form-control"  onkeyup="AddPerVal();" name="add10per" id="add10per">  </td>
			<td><input type ="text" class="form-control" name="txt10op" id ="txt10op"> </td>
		
           
		
		
                <?php

				$quoted_ammount1=$rowitem->ftgs_quoted_amt1;
					$final_rate=$final_rate+$quoted_ammount1;
					
					$final_ammount1 = $rowitem->ftgs_final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					$quoted_amount2 = $rowitem->ftgs_quoted_amt2;
					$total_quoted_amount2 = $total_quoted_amount2+$quoted_amount2;
					
					$final_ammount2 = $rowitem->ftgs_final_amt2;
					$total_final_ammount2 = $total_final_ammount2+$final_ammount2;
					
					$quoted_amount3 = $rowitem->ftgs_quoted_amt3;
					$total_quoted_amount3 = $total_quoted_amount3+$quoted_amount3;
					
					$final_ammount3 = $rowitem->ftgs_final_amt3;
					$total_final_ammount3 = $total_final_ammount3+$final_ammount3;
					
				?>
      </tr>
		
	 
		 <?php  $sr_no++; }
 } ?>
         -->       
				</tbody>
				
               		
              </table>

										 <center>
											<button type="submit"  name="save"  class="btn" style="width: 18%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Update</button>
										</center> 
									</div>
								</form>
								</div>
                            </section>
							</form>
                        </div>
                     </div>
				</div>
			</div>
  
        
<?php } 
}?>





    <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script> 
    $(function () {
      
      $('#example').excelTableFilter();
   
    });
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
     //Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })


</script>
<script>
function AddPerVal() {
      var txtFirstNumberValue = document.getElementById('finalamt').value;
      var txtSecondNumberValue = document.getElementById('add10per').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) / 100;
	  var r2 = parseFloat(txtFirstNumberValue) + result;
       var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt10op').value = r2;
      }
}

</script>


   <script>
	function itemCodeUpdate_data(ftgs_qcs_item_id,ftgs_q_item_code,ftgs_final_amt1,ftgs_q_req_quantity) {

   document.getElementById("ftgs_qcs_item_id").value = ftgs_qcs_item_id;
	document.getElementById("ftgs_q_item_code").value = ftgs_q_item_code;
	document.getElementById("finalamt").value = ftgs_final_amt1;
	document.getElementById("ftgs_q_req_quantity").value = ftgs_q_req_quantity;
	
}
</script>
</body>
</html>