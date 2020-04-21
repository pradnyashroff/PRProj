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
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Cost Comparison Summary</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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

					<th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <center><b> Final Supplier   :&nbsp;&nbsp;   <?php echo $row4->ftgs_sup1_nm; ?></b><center></th>
			
				
				 <th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Supplier 2  :&nbsp;&nbsp;   <?php echo $row4->ftgs_sup2_nm; ?>  </th>
				 <th colspan="2" style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> Supplier 3  :&nbsp; &nbsp;   <?php echo $row4->ftgs_sup3_nm; ?>  </th> 
				 
		 
				
					</tr>
				
                <tr>
                				

			<th style="border:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;">  Final Total Amount (₹)</th>  
            
			
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;"> Final Total Amount (₹) </th>  
       
			<th style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;">  Quoted Total Amount (₹) </th>  
            <th style="border:none;">  Final Total Amount (₹)</th>  
           
				  
                </tr>  
			
				
                </thead>
						
                <tbody>
						<td style="border:none;"> <?php echo $final_rate; ?></td>
						<td style="border:none;"> <?php echo $total_final_ammount1; ?></td>
						<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <?php echo $total_quoted_amount2; ?></td>
						<td style="border:none;"> <?php echo $total_final_ammount2; ?></td>
						<td style="	border: 1px solid silver;border-top:none;border-bottom:none;border-right:none;"> <?php echo $total_quoted_amount3; ?></td>
						<td style="border:none;"> <?php echo $total_final_ammount3; ?></td>	
				 
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
				 <?php echo $rowTech->ftgs_insurance_sup2; ?>" >
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
							
						<span style="color:#3482AE;">( <?php echo $row4->just_draft_outside_budget; ?> ) </span>
							
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
							
						<span style="color:#3482AE;">( <?php echo $row4->ftgs_just_adv_nonproprietery; ?> ) </span>
							
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
 <form method="post" id="main_form" action="<?php echo site_url('FTGS_PR/Ftgs_pr/RejectForwordToDraft') ?>" enctype='multipart/form-data'>
                
<div class="box-footer">
  <input type="hidden"  name="qcs_emp_nm" value="<?php echo $emp_name; ?>" class="form-control"  required>
  <input type="hidden"  name="txt_emp_code" value="<?php echo $emp_code; ?>" class="form-control"  required>
  <input type="hidden"  name="txtftgsId" value="<?php echo $row4->ftgs_qcs_id; ?>" class="form-control"  required>
  <input type="hidden"  name="txtftgsPRId" value=" <?php echo $row4->ftgs_pr_id; ?>" class="form-control"  required>
    <input type="hidden"  name="txtPREmpCode" value=" <?php echo $row4->ftgs_pr_owner_empcode; ?>" class="form-control"  required>  
	
	<?php
			if($row4->ftgs_qcs_status ==3)
			{
				?>			<div class="form-group col-lg-12">
									<label class="col-lg-1 pull-left control-label">9</label>
									<label class="col-lg-4 pull-left control-label">Action</label>
									<div class="input-group  col-lg-6">
										<input type="radio" name="ftgs_status" value="1" required >&nbsp;&nbsp; Save as Draft</input>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" disabled name="ftgs_status" value="no_action" > &nbsp;&nbsp; NO ACTION ON FTGS PR</input>
										
         							</div>
								</div>
									
									<div class="form-group col-sm-12">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-2"><button type="submit"  class="btn" id ="printPageButton" class="btn  bg-skincolor " style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Proceed</button></div>
    <div class="col-sm-2"> <a href="<?php echo site_url('') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
    </div>
    <div class="col-sm-4"></div>
  </div>
	<?php	
	}
	else
	{
	?>
  <div class="form-group col-sm-12">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-2"><button type="submit" onclick="window.print();"  class="btn" id ="printPageButton" class="btn  bg-skincolor " style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Print</button></div>
    <div class="col-sm-2"> <a href="<?php echo site_url('') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
    </div>
    <div class="col-sm-4"></div>
  </div>
<?php 
}
?>
	

								<?php
									$autho_code=$this->method_call->getApproval5AuthID(); //getQcsApproval2Autho(100297)
									$IOCode=$autho_code['autho_code'];
									?>
									<input type="hidden" value="<?php print_r($autho_code['autho_code']); ?>" name="txt_sourcingApp2" class="form-control"  required>
									
  
  

</div>
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

function supplier1() {
      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_quot_amt1').value = setResult;
      }
}
function finalSupplier1() {

      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_amount1').value = setResult;
      }
}

function supplier2() {
      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_quot_amt2').value = setResult;
      }
}
function finalSupplier2() {
      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_amount2').value = setResult;
      }
}
function supplier3() {
      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_quot_amt3').value = setResult;
      }
}
function finalSupplier3() {
      var txtFirstNumberValue = document.getElementById('txt_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_amount3').value = setResult;
      }
}
function custom_supplier1() {
      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_quot_amt1').value = setResult;
      }
}
function custom_final_supplier() {

      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_amount1').value = setResult;
      }
}

function custom_supplier2() {
      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_quot_amt2').value = setResult;
      }
}
function custom_final_supplier2() {
      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_amount2').value = setResult;
      }
}
function custom_supplier3() {
      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_quot_amt3').value = setResult;
      }
}
function custom_final_supplier3() {
      var txtFirstNumberValue = document.getElementById('txt_custom_qty').value;
      var txtSecondNumberValue = document.getElementById('txt_custom_final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      var setResult = result.toFixed(2);
      if (!isNaN(result)) {
         document.getElementById('txt_custom_amount3').value = setResult;
      }
}


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
	  function eventOfText(result,ftgs_offers_received){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_quot_reec").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_quot_reec").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	 
//outside budget	 
	  	  function eventOfText_budget(result,ftgs_outside_budget){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("just_draft_outside_budget").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("just_draft_outside_budget").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
	  
 //order value 
 
 	  function eventOfText_orderv(result,ftgs_order_value){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("just_draft_order_value").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("just_draft_order_value").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	

 //eventOfprop_item
 
 	  function eventOfprop_item(result,ftgs_non_properitery_item){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_adv_nonprop").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_adv_nonprop").style.visibility='hidden';
			  
		  }
		  
			  
	  }	
	  
 //properitery_item
 
  
 	  function eventOf_prope_item(result,ftgs_properitery_item){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_adv_prop").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_adv_prop").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
	  
	  
	  //eventOfpost_grn_non
	  function eventOfpost_grn_non(result,ftgs_post_grn_nonproprietary){
		 
		 
		  if (result=='YES'){
			  
			  document.getElementById("draft_just_final_pay_grn").style.visibility='visible';
			 
		  }else if(result=='NO'){
			  
			  document.getElementById("draft_just_final_pay_grn").style.visibility='hidden';
			  
		  }
		  
			  
	  }
	  
//post_grn_proprietary
function eventOfpost_grn_prop(result,ftgs_post_grn_proprietary){
		 
		 
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
</body>
</html>