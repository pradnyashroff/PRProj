<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<head>
  		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<title>FTGS QCS Draft</title>
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
          FTGS QCS Draft
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
                <form method="post" id="main_form" action="<?php echo site_url('FTGS_PR/Ftgs_pr/DraftinsertQcsSteptwo') ?>" enctype='multipart/form-data'>
                  
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
    
<div class="col-sm-3">
 <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn" style="width: 40%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">Add Item</button>
 </div>


	<!-- Custom Item -->
<div class="col-sm-3">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#AddCustomModal" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">Add Custom Item</button>
</div>

	<!-- View Item -->
<div class="col-sm-3">
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalView" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">Detailed View</button>
</div>

	<!-- Edit / Delete Item -->


<div class="col-sm-3"> 
<button type="button" id="item_btnold" data-toggle="modal" data-target="#myModalEditDelete" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;font-family:'exo';">Edit/Delete Item</button>
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
				 <td colspan="3"  >  <input type="text" value="<?php echo $rowTech->ftgs_tech_det_sup1; ?>"  name="tech_det_sup1" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"value="<?php echo $rowTech->ftgs_tech_det_sup2; ?> " name="tech_det_sup2" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" value="<?php echo $rowTech->ftgs_tech_det_sup3; ?>"   name="tech_det_sup3" class="form-control full_width" > </td>
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
				 <select class="form-control"   name="supplier1_checked" value=""  >  
				 <option value="<?php echo $rowTech->ftgs_credibility_sup1; ?>" ><?php echo $rowTech->ftgs_credibility_sup1; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>              
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <select class="form-control" name="supplier2_checked" value="" >  
				  <option value="<?php echo $rowTech->ftgs_credibility_sup2; ?>" ><?php echo $rowTech->ftgs_credibility_sup2; ?></option>
				 <option value="Yes" >Yes</option>
				 <option value="No" >No</option>
				 </select>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<select class="form-control" name="supplier3_checked" value="" >  
				 <option value="<?php echo $rowTech->ftgs_credibility_sup3; ?>" ><?php echo $rowTech->ftgs_credibility_sup3; ?></option>
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
			 
			 
			 
				 <td colspan="6">Insurance & Freight</td>
				 
				 <td colspan="3"  > 
			<select class="form-control" name="supplier1_insurance">  
			 <option value="<?php echo $rowTech->ftgs_insurance_sup1; ?>" ><?php echo $rowTech->ftgs_insurance_sup1; ?></option>
				<option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="Extra At Actual">Extra At Actual</option>
				
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<select class="form-control" name="supplier2_insurance">  
				  	 <option value="<?php echo $rowTech->ftgs_insurance_sup2; ?>" ><?php echo $rowTech->ftgs_insurance_sup2; ?></option>
				 <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="Extra At Actual">Extra At Actual</option>
				
				 <option value="In REPL Scope">In REPL Scope</option>
				 <option value="Not Applicable">Not Applicable</option>
				 </select>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
							<select class="form-control" name="supplier3_insurance">  
				 <option value="<?php echo $rowTech->ftgs_insurance_sup3; ?>" ><?php echo $rowTech->ftgs_insurance_sup3; ?></option>			
			    <option value="In Supplier Scope">In Supplier Scope</option>
				 <option value="Extra At Actual">Extra At Actual</option>
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
				 <td colspan="6">Delivery Period</td>
				 <td colspan="3"  >  <input type="text"  name="delivery_period_sup1" value="<?php echo $rowTech->ftgs_del_period_sup1; ?>" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" name="delivery_period_sup2" value="<?php echo $rowTech->ftgs_del_period_sup2; ?>" class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text" name="delivery_period_sup3" value="<?php echo $rowTech->ftgs_del_period_sup3; ?>" class="form-control full_width" > </td>
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
				
				  			<select class="form-control" name="delivery_mode_sup1"  >  
				 <option value="<?php echo $rowTech->ftgs_del_mode_sup1; ?>" ><?php echo $rowTech->ftgs_del_mode_sup1; ?></option>		
				 <option value="By Road">By Road</option>
				 <option value="By Air">By Air</option>
				 <option value="By Sea">By Sea</option>
				</select>
				 
				 </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <select class="form-control" name="delivery_mode_sup2"  >  
								 <option value="<?php echo $rowTech->ftgs_del_mode_sup2; ?>" ><?php echo $rowTech->ftgs_del_mode_sup2; ?></option>		
				 <option value="By Road">By Road</option>
				 <option value="By Air">By Air</option>
				 <option value="By Sea">By Sea</option>
				</select> </td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >

			<select class="form-control" name="delivery_mode_sup3"  >  
			 <option value="<?php echo $rowTech->ftgs_del_mode_sup3; ?>" ><?php echo $rowTech->ftgs_del_mode_sup3; ?></option>		
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
				 <td colspan="6">Inspection / Testing</td>
				 <td colspan="3">
				 	<select class="form-control" name="supplier1_testing"  >
				 <option value="<?php echo $rowTech->ftgs_inspection_sup1; ?>" ><?php echo $rowTech->ftgs_inspection_sup1; ?></option>							
				 <option value="No" >No</option>
				 <option value="Yes" >Yes</option>
				 
				 </select>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<select class="form-control" name="supplier2_testing"  >  
				 <option value="<?php echo $rowTech->ftgs_inspection_sup2; ?>" ><?php echo $rowTech->ftgs_inspection_sup2; ?></option>			
				<option value="No" >No</option>
				 <option value="Yes" >Yes</option>
				
				 </select>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<select class="form-control" name="supplier3_testing"  >  
				 <option value="<?php echo $rowTech->ftgs_inspection_sup3; ?>" ><?php echo $rowTech->ftgs_inspection_sup3; ?></option>		
				 <option value="No" >No</option>
				 <option value="Yes" >Yes</option>
				 
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
				 <td colspan="6">Payment Terms</td>
				 <td colspan="3"  >  <input type="text"  name="pay_terms_sup1" value="<?php echo $rowTech->ftgs_pymt_terms_sup1; ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="pay_terms_sup2" value="<?php echo $rowTech->ftgs_pymt_terms_sup2; ?>" class="form-control full_width"   > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="pay_terms_sup3"  value="<?php echo $rowTech->ftgs_pymt_terms_sup3; ?>"class="form-control full_width"   > </td>
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
				 <td colspan="3"  >  <input type="text"    name="warranty_sup1" value="<?php echo $rowTech->ftgs_warranty_sup1; ?>" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"   name="warranty_sup2" value="<?php echo $rowTech->ftgs_warranty_sup2; ?>" class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="warranty_sup3"  value="<?php echo $rowTech->ftgs_warranty_sup3; ?>"class="form-control full_width" > </td>
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
				 <input type="text" name="scope_inst_sup1"  value="<?php echo $rowTech->ftgs_scope_instal_sup1; ?>" class="form-control full_width"   > 
				
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				   <input type="text"  name="scope_inst_sup2" value="<?php echo $rowTech->ftgs_scope_instal_sup2; ?>" class="form-control full_width"   > 

				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				   <input type="text" name="scope_inst_sup3" value="<?php echo $rowTech->ftgs_scope_instal_sup3; ?>" class="form-control full_width"> 
				
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
				 <td colspan="3"  >  <input type="text"  name="sup1_taxes" value="<?php echo $rowTech->ftgs_taxes_duties_sup1; ?>" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup2_taxes" value="<?php echo $rowTech->ftgs_taxes_duties_sup2; ?>" class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup3_taxes" value="<?php echo $rowTech->ftgs_taxes_duties_sup3; ?>" class="form-control full_width"> </td>
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
				 <td colspan="3"  >  <input type="text"   name="sup1_note" value="<?php echo $rowTech->ftgs_note_sup1; ?>" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup2_note" value="<?php echo $rowTech->ftgs_note_sup2; ?>"class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="sup3_note" value="<?php echo $rowTech->ftgs_note_sup3; ?>" class="form-control full_width" > </td>
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
				 <td colspan="3"  >  <input type="text" name="price_sup1"  value="<?php echo $rowTech->ftgs_validity_price_sup1; ?>" class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"   name="price_sup2" value="<?php echo $rowTech->ftgs_validity_price_sup2; ?>" class="form-control full_width"  > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"   name="price_sup3" value="<?php echo $rowTech->ftgs_validity_price_sup3; ?>" class="form-control full_width" > </td>
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
				 <td colspan="3"  >  <input type="text"  name="repl_sup1" value="<?php echo $rowTech->ftgs_repl_scope_sup1; ?>" class="form-control full_width"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"   name="repl_sup2" value="<?php echo $rowTech->ftgs_repl_scope_sup2; ?>" class="form-control full_width" > </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"   name="repl_sup3" value="<?php echo $rowTech->ftgs_repl_scope_sup3; ?>" class="form-control full_width" > </td>
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
			        <table id="example6" class="table table">
            
		
                <tbody>
					   <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6"></td>
				 <td colspan="3"><center><b>Final Supplier   :&nbsp;&nbsp; <?php echo $row4->ftgs_sup1_nm; ?></b><center> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><center><b>Supplier 2  :&nbsp;&nbsp; <?php echo $row4->ftgs_sup2_nm; ?> </b><center> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><center><b>Supplier 3  :&nbsp;&nbsp; <?php echo $row4->ftgs_sup3_nm; ?></b>  <center></td>
				 <td style="display:none" > </td>
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
               
                <select class="form-control" name="draft_outside_budget" onchange="eventOfText_budget(this.value,'<?php echo $row4->ftgs_outside_budget; ?>')">  
				<option value="<?php echo $row4->ftgs_outside_budget; ?>"><?php echo $row4->ftgs_outside_budget; ?></option>		
				 <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="just_draft_outside_budget" maxlength = "100" name="just_draft_outside_budget" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_outside_budget; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                
					<!--<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Order Value > 5 lakhs </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="order_value" onchange="if (this.value=='YES'){this.form['just_order_value'].style.visibility='visible'}else {this.form['just_order_value'].style.visibility='hidden'};" >
		

				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				   
				 </select>	
             
                                   
    
                </div>
				
				<div class="form-group col-sm-4">
               
                <textarea name="just_order_value" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"> </textarea>	
			     </div>
				 
				 
                </div>-->
                
            
				
				
				
				
				
				    
                <!--<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Quotations Received < 2 Suppliers </label>
			  <div class="form-group col-sm-3">
               <select class="form-control" name="quotation_received" value="" onchange="if (this.value=='YES'){this.form['just_quot_reec'].style.visibility='visible'}else {this.form['just_quot_reec'].style.visibility='hidden'};" >  
		 <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				   
				 </select>	
			        
				</div>
				<div class="form-group col-sm-4">
               
                <textarea name="just_quot_reec" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"> </textarea>	
			     </div>
				 
				 
				  </div>-->
				
				
				 <label class="pull-left control-label" style="color:red;">Other than Capital</label>
                </br>
                               <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Any advance for non-proprietary items  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_nonproprietery" onchange="eventOfprop_item(this.value,'<?php echo $row4->ftgs_non_properitery_item; ?>')">    
		<option value="<?php echo $row4->ftgs_non_properitery_item; ?>" ><?php echo $row4->ftgs_non_properitery_item; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_adv_nonprop" maxlength = "100" name="draft_just_adv_nonprop" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_adv_nonproprietery; ?></textarea>	
			      </div>
				  
				  
                </div>
				
             <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Advance Payment > 20% for proprietary items
			</label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_advance_proprietery" onchange="eventOf_prope_item(this.value,'<?php echo $row4->ftgs_properitery_item; ?>')">  
		<option value="<?php echo $row4->ftgs_properitery_item; ?>" ><?php echo $row4->ftgs_properitery_item; ?></option>
				 <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_adv_prop" maxlength = "100" name="draft_just_adv_prop" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_adv_proprietery; ?></textarea>	
			      </div>
				  
				  
                </div>
                
				     
                
                <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 30 days for non-proprietary  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_final_payment_grn" onchange="eventOfpost_grn_non(this.value,'<?php echo $row4->ftgs_post_grn_nonproprietary; ?>')">   
					<option value="<?php echo $row4->ftgs_post_grn_nonproprietary; ?>" ><?php echo $row4->ftgs_post_grn_nonproprietary; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_final_pay_grn" maxlength = "100" name="draft_just_final_pay_grn" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_final_payment_grn; ?></textarea>	
			      </div>
				  
				  
                </div>
                
                
                 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Final payment post-GRN < 7 days for proprietary  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_final_payment_post_grn" onchange="eventOfpost_grn_prop(this.value,'<?php echo $row4->ftgs_post_grn_proprietary; ?>')">   
				<option value="<?php echo $row4->ftgs_post_grn_proprietary; ?>" ><?php echo $row4->ftgs_post_grn_proprietary; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_final_pay_post_grn" maxlength = "100" name="draft_just_final_pay_post_grn" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_final_pymt_post_grn; ?></textarea>	
			      </div>
				  
				  
                </div>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Delivery terms not at REPL gate  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_delivery_gate" onchange="eventOfpost_del_terms(this.value,'<?php echo $row4->ftgs_delivery_terms; ?>')">   
					<option value="<?php echo $row4->ftgs_delivery_terms; ?>" ><?php echo $row4->ftgs_delivery_terms; ?></option>
				  <option value="YES">YES</option>
				  <option value="NO">NO</option>
				 </select>	
             
                                   
    
                </div>
				
				  <div class="form-group col-sm-4">
               
                <textarea id="draft_just_delivery_gate" maxlength = "100" name="draft_just_delivery_gate" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"><?php echo $row4->ftgs_just_delivery_gate; ?></textarea>	
			      </div>
                </div>
				
				<!-- capex -->
				
				  <label class="pull-left control-label" style="color:red;">For CAPEX Only</label>
				<br>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label"> If cost non-reimbursable by customer  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_cost_reimb_cust" value="" onchange="if (this.value=='YES'){this.form['just_cost_reimb_cust'].style.visibility='visible'}else {this.form['just_cost_reimb_cust'].style.visibility='hidden'};" >  
		
				 
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                </div>
				
				<div class="form-group col-sm-4">
               
                <textarea name="draft_just_cost_reimb_cust" maxlength="100" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"> </textarea>	
			     </div>
				 
				 
                </div>
				
				
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">REPL cost > customer agreed reimbursement  </label>
				<div class="form-group col-sm-3">
               
                <select class="form-control" name="draft_repl_cost_agreed" value="" onchange="if (this.value=='YES'){this.form['just_repl_cost_agree'].style.visibility='visible'}else {this.form['just_repl_cost_agree'].style.visibility='hidden'};" >  
		
				 
				  <option value="NO" >NO</option>
				   <option value="YES" >YES</option>
				
				 </select>	
             
                </div>
				
				<div class="form-group col-sm-4">
               
                <textarea name="draft_just_repl_cost_agree"  maxlength= "100" rows="1" data-toggle="tooltip" title="Justification if Yes" class="form-control" style="visibility:hidden;"> </textarea>	
			     </div>
				 
				 
                </div>
				
            </div>
			
</div>
   
   
   <!--end-->

   
<div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Additional Details (Attachments) </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="file"  name="ftgs_additional_attachment"  class="form-control"  >
					<input type="hidden"  name="attachment_check" value="<?php echo $row4->ftgs_additional_attachment ?>"  class="form-control"  >
               
                </div>
				
				<div class="col-sm-5 pull-right">
        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_additional_attachment/". $row4->ftgs_additional_attachment ?>"> <?php echo $row4->ftgs_additional_attachment ?></a> </b>
              </div>
			  
			    </div>
				
				 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Selected Supplier</label>
				<div class="input-group  col-sm-6" >
                 
               <input type="text" name="select_sup" value="<?php echo $row4->ftgs_sup1_nm; ?>" class="form-control" style="background-color:#E6F2FF;" readonly>
                  
                </div>
                </div>
				
				
				
					<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">Justification for QCS Approval</label>
				<div class="input-group  col-sm-6">
                 
                                        <textarea class="form-control" maxlength="250" rows="4" cols="50" name="draftjustification_sup" ><?php echo $row4->ftgs_justification_supplier ?> </textarea>

                    <div id="the-count">
					<span id="current">0</span>
					<span id="maximum">/ 250</span>
				 </div>
         
                </div>
                </div>
   
   
<div class="form-group col-sm-12">
  <label class="pull-left control-label">9</label>
    <label class="col-sm-4 pull-left control-label">Action</label>
    <div class="input-group  col-sm-5 pull-left"><input type="radio" name="rdo_qcsftgs_status" value="1" required >&nbsp;  Save as Draft</input>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="rdo_qcsftgs_status" value="2"> &nbsp;Submit for Approval</input>
  </div>
</div>
<div class="box-footer">
  <input type="hidden"  name="qcs_emp_nm" value="<?php echo $emp_name; ?>" class="form-control"  required>
  <input type="hidden"  name="txt_emp_code" value="<?php echo $emp_code; ?>" class="form-control"  required>
  <input type="hidden"  name="txtftgsId" value="<?php echo $row4->ftgs_qcs_id; ?>" class="form-control"  required>
  <input type="hidden"  name="txtftgsPRId" value=" <?php echo $row4->ftgs_pr_id; ?>" class="form-control"  required>
    <input type="hidden"  name="txtPREmpCode" value=" <?php echo $row4->ftgs_pr_owner_empcode; ?>" class="form-control"  required>  
  <div class="form-group col-sm-12">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-2"><button type="submit" id="" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button>
    </div>
    <div class="col-sm-2"> <a href="<?php echo site_url('') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
    </div>
    <div class="col-sm-4"></div>
  </div>

								<?php
									$autho_code=$this->method_call->getApproval5AuthID(); //getQcsApproval2Autho(100297)
									$IOCode=$autho_code['autho_code'];
									?>
									<input type="hidden" value="<?php print_r($autho_code['autho_code']); ?>" name="txt_sourcingApp2" class="form-control"  required>
									
  
  
</form>
</div>
</div>
</section>


  <!-- end -->

    </div>
	
	
	
	
	
  
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
			
			<form method="post" id="" action="<?php echo site_url('FTGS_PR/Ftgs_pr/inserQcsAddItem') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  ">
   <input type="hidden" name="temp_prid" placeholder="" value="<?php echo $row4->ftgs_pr_id; ?>" readonly class="form-control"  ></td>

      <input type="hidden" name="" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  ></td>
   
      <input type="hidden" name="tempqcs_id" placeholder="" value="<?php echo $row4->ftgs_qcs_id; ?>" readonly class="form-control" ></td>
	   
                  
 <input class="form-control" type="hidden"id="textboxid" name="pr_itemid"/>	


	 
				  <div class="form-group col-md-4">
                    <label >Item Code</label>
					
					
						<select class="form-control" id="item_code" name="item_code" >
					<option value="">Select Item From PR items</option>
					
			 <?php $item= $this->method_call->ftgs_list_items_qcs($ftgs_qcs_id);
 if($item!=null){
			  
foreach ($item->result() as $row8) 
 
         {  ?>
			
		 <option value="<?php echo $row8->ftgs_item_id ; ?>" data-time='<?php echo $row8->ftgs_item_code ; ?>' data-time1='<?php echo $row8->ftgs_item_description ; ?>' data-time2='<?php echo $row8->ftgs_req_qty ; ?>' data-time3='<?php echo $row8->ftgs_uom ; ?>'data-time4='<?php echo $row8->ftgs_item_status ; ?>'><?php echo $row8->ftgs_item_code; ?></option>
			
		 <?php 
		 }
 } ?>
      
					</select>
			
	 	</div>
		
		 
		
		
 
 			  <div class="form-group col-md-4">
                    <label >Item Description</label>
					 <input class="form-control" type="text" value=""  name="item_description" id="item_description" required value=""data-validation-required-message="Please enter Item Description."/>	

					
						 	</div>
		
		
		
 			  <div class="form-group col-md-4">
                    <label >Item Specification</label>
				 <input class="form-control" type="text" name="item_specification"  required data-validation-required-message="Please enter Item Specification."/>	
					 
	 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="qty" id="qty" style="background-color:#E6F2FF;" required readonly data-validation-required-message="Please enter Valid Quantity."/>		 	</div>
 
  <div class="form-group col-md-4">
                    <label >UOM</label>
 <input class="form-control" type="text" style="background-color:#E6F2FF;" readonly name="uom" id="uom_item" required data-validation-required-message="Please enter UOM."/>		
 </div>
 



	 <div class="form-group col-md-4" style="float: right;">
                    <label >HSN Code</label>
 <input class="form-control" type="text" name="hsn_code" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>	
 </div>		
			
 <div class="form-group col-md-12">		
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


 </div>
 <!-- supplier1 -->
 <div class="form-group col-md-4">
 
                    <label  >1. &nbsp;&nbsp;	<?php echo $row4->ftgs_sup1_nm; ?></label>
</div>	
		
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate1"  onkeyup="mul();"  id ="quot_rate1" value=""  />	
 </div>
 
 
  <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" style="background-color:#E6F2FF;" readonly min="0" value="0.01" step="0.01"  required name="quot_amt1" id="quot_amt1"   value=""  />	
 </div>
 
 
 
 <div class="form-group col-md-2">
                 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate1" id= "final_rate1" onkeyup="mulfinal_amt();"  value=""  />		
				 </div>
				 
				 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount1" id="amount1" style="background-color:#E6F2FF;" readonly value="" />	
 </div>
 
 <!--	<div class="form-group col-md-12">
                    <center><b><h4 >Supplier 2 </h4></b></center>
  	</div>-->
			
	<div class="form-group col-md-4">
                    <label > 2.&nbsp;&nbsp;<?php echo $row4->ftgs_sup2_nm; ?></label>
	 	</div>			
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate2" id="quot_rate2" onkeyup="mul_quat2();"  value=""  />
 </div>
 
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_amt2" id="quot_amt2" style="background-color:#E6F2FF;" readonly value=""  />	
 </div>
 
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate2" id="final_rate2"  onkeyup="mul_final_quat2();"  value="" />		 	</div>
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount2" id="amount2" value="" style="background-color:#E6F2FF;" readonly    />		 	</div>


 
 
 <!-- Supplier 3-->
 
 	<div class="form-group col-md-4">
 <label> 3.&nbsp;&nbsp;<?php echo $row4->ftgs_sup3_nm; ?></label>
  	</div>
			
			
<div class="form-group col-md-2">
                  
 <input class="form-control" type="number" onkeyup="mul_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate3" id="quot_rate3" value=""  />	
 </div>
 
 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_amt3" style="background-color:#E6F2FF;" readonly id="quot_amt3" value=""  />	
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" onkeyup="mul_final_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate3"  id="final_rate3" value=""     />
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount3" style="background-color:#E6F2FF;" readonly  id="amount3" value=""     />
 </div>

 <div class="form-group col-md-2">
                    <label >Item Status</label>
					 <input class="form-control" type="text" readonly  name="item_sts" id="item_sts" required value=""data-validation-required-message="Please enter Item Description."/>	

					
						 	</div>
<center>  <button type="submit"  class="btn" style="width: 8%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Add Item</button>
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
  
  
    
  <!-- Add custom item -->
<div class="modal fade displaycontent" id="AddCustomModal">

<div class="modal-dialog" role="document" style="width:1250px;">
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
			
			<form method="post" id="" action="<?php echo site_url('FTGS_PR/Ftgs_pr/inserQcsAddItem') ?>" >

            <div class="row">
              <div class="col-sm-12" style="  "><!-- temp_qcs_id = cobination of pr+emp_code -->
   <input type="hidden" name="temp_prid" placeholder="" value="<?php echo $row4->ftgs_pr_id; ?>" readonly class="form-control"  required></td>

      <input type="hidden" name="" placeholder="" value="<?php echo $emp_code; ?>" readonly class="form-control"  required></td>
   
      <input type="hidden" name="tempqcs_id" placeholder="" value="<?php echo $row4->ftgs_qcs_id; ?>" readonly class="form-control"  required></td>
	  
	  <!-- custom_item_code -->
				  <div class="form-group col-md-4">
                    <label >Custom Code</label>
					<input class="form-control" type="text" name="pr_itemid" required value=""  data-validation-required-message="Please enter Valid Custom Item Code."/>
					
	 	</div>
		
		
				  <div class="form-group col-md-4" ">
                    <label >Item Description</label>
 <input class="form-control" type="text" name="item_description" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
 
  <div class="form-group col-md-4" style="float: right;">
                    <label >Item Specification</label>
 <input class="form-control" type="text" name="item_specification" required value=""  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="qty" id="custom_qty" required data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

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
                    <label >1. <?php echo $row4->ftgs_sup1_nm; ?></label>
</div>	
		
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate1"  onkeyup="custom_mul();"  id ="custom_quot_rate1" value=""  />	
 </div>
 
 
  <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_amt1" id="custom_quot_amt1" readonly style="background-color:#E6F2FF;" value=""  />	
 </div>
 
 
 
 <div class="form-group col-md-2">
                 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate1" id= "custom_final_rate1" onkeyup="custom_mulfinal_amt();"  value=""  />		
				 </div>
				 
				 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount1" id="custom_amount1" style="background-color:#E6F2FF;" readonly value="" />	
 </div>
 
 <!--	<div class="form-group col-md-12">
                    <center><b><h4 >Supplier 2 </h4></b></center>
  	</div>-->
			
	<div class="form-group col-md-4">
                    <label > 2. <?php echo $row4->ftgs_sup2_nm; ?></label>
	 	</div>			
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate2" id="custom_quot_rate2" onkeyup="custom_mul_quat2();"  value=""  />
 </div>
 
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_amt2" id="custom_quot_amt2" style="background-color:#E6F2FF;" readonly  />	
 </div>
 
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate2" id="custom_final_rate2"  onkeyup="custom_mul_final_quat2();"  value="" />		 	</div>
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount2" id="custom_amount2" style="background-color:#E6F2FF;" readonly   />		 	</div>


 
 
 <!-- Supplier 3-->
 
 	<div class="form-group col-md-4">
 <label > 3.<?php echo $row4->ftgs_sup3_nm; ?></label>
  	</div>
			
			
<div class="form-group col-md-2">
                  
 <input class="form-control" type="number" onkeyup="custom_mul_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_rate3" id="custom_quot_rate3" value=""  />	
 </div>
 
 <div class="form-group col-md-2">
                  
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01"  required name="quot_amt3" id="custom_quot_amt3" style="background-color:#E6F2FF;" style="background-color:#E6F2FF;" readonly />	
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" onkeyup="custom_mul_final_quat3();" placeholder="0.00" min="0" value="0.01" step="0.01" required name="final_rate3"  id="custom_final_rate3" value=""     />
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="number" placeholder="0.00" min="0" value="0.01" step="0.01" required name="amount3"  id="custom_amount3"  style="background-color:#E6F2FF;" style="background-color:#E6F2FF;" readonly   />
 </div>

  <div class="form-group col-md-12">
											<label >Item Status</label>
									<select class="form-control" required name="item_sts" id="item_sts">
										<option value="InHouse">InHouse(REPL-4)</option>
										<option value="OutSource">OutSource</option>
										
										
									</select>
									
								</div>
 <center> <button type="submit"  class="btn" style="width: 13%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Custom Item</button>
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
  
  <!-- EDIT delete item -->


<div class="modal fade displaycontent" id="myModalEditDelete">

<div class="modal-dialog" role="document" style="width:1280px;">
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
		
  <form method="post" id="" action="" >
            <div class="row">
			  <input type="hidden" name="view_qcs_id" placeholder="" value="<?php echo $row4->ftgs_qcs_id; ?>" readonly class="form-control"  required></td>
           <table id="exampletest" class="table table">
                <thead>
			<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;border:none;">
			 
			 
           <th></th>
                  <th  style="border:none;">Sr. No.</th>
				   <th style="border:none;" >Item Code</th>
				   
				   <th  style="border:none;">HSN Code</th>
				    <th  style="border:none;">Item Status</th>
				   <th  style="border:none;">Item Descriptions</th>
				   <th  style="border:none;">Qty.</th>
				   <th  style="border:none;">UOM</th>
				 <th colspan="4"  style="border:none;"><center> 1. <?php echo $row4-> ftgs_sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4"  style="border:none;"> <center>2. <?php echo $row4-> ftgs_sup2_nm; ?>  <center></th>
				 <th colspan="4" style="border:none;" > <center>3. <?php echo $row4-> ftgs_sup3_nm; ?>   <center></th>
				

      </tr>
			
                <tr style="border:none;">
                				 <th colspan="8" style="text-align:right;"></th>

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
			<td style="width:8%;" style="border:none;"><p style="color:red;border:none;">
				<a href="<?php echo site_url('FTGS_PR/Ftgs_pr/QCS_editDeleteItem/'.$rowitem->ftgs_qcs_item_id);?>"style="color:red;border:none;"><span class="glyphicon glyphicon-edit" style="color:red;border:none;"> <?php echo $rowitem->ftgs_qcs_item_id;?></span></a>
				</p>
				</td> 
				
			<td   style="border:none;border-left:none;"><?php echo $sr_no; ?> </td>
			 <td  style="border:none;" ><?php echo $rowitem->ftgs_q_item_code; ?></td> 
				 
					
				<td style="border:none;"> <?php echo $rowitem->ftgs_q_hsn_code; ?></td>  	
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
            <td style="text-align:right;" colspan="9"><b>Grand Total:</b></td>
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
				
				<?php $filea= $this->method_call->filefetchqcs($ftgs_qcs_id); 
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
	<tr>
	
<td><?php echo $rowfile->ftgs_fQcs_id; ?></td>	
<td>  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('FTGS_PR/Ftgs_pr/updateFtgsFile'); ?>">
 
 <input type="text" name="qcs_file_id" id="qcs_item_id" class="form-control" value=" <?php echo $rowfile->ftgs_fQcs_id; ?>">
<input type="text" name="qcs_folder_Name"  class="form-control" value=" <?php echo $rowfile->ftgs_qcs_id; ?>">
 <input class="form-control" type="file" name="picture" /> <?php echo $rowfile->ftgs_qcs_file_nm;?></td>
 <td><button type="submit" name="save"  class="btn btn-success" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-pencil-square-o"></i></button></td>
  </form>
 

   <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('FTGS_PR/Ftgs_pr/draftDeleteFile/'.$rowfile->ftgs_fQcs_id); ?>">
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