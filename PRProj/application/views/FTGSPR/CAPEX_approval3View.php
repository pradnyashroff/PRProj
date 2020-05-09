 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View CAPEX</title>
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
	box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);
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
<body class="hold-transition skin-blue sidebar-mini" onload="enableDisable();"  >
 
      	   <?php include_once 'headsidelistFTGS.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1 style="color:#FFFFFF; font-family:'exo'">
       View CAPEX
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;"> <i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;">Capex</a></li>

<li class="active" style="color:#FFFFFF;">View CAPEX
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
  	<section class="content" id="content">
	  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('FTGS_PR/Ftgs_pr/insert_capexApproval3') ?>" >  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
	  	  <?php $qcs_detail= $this->method_call->capex_detail($ftgs_capex_id);
 if($qcs_detail!=null){
	 foreach ($qcs_detail->result() as $qcs_row)  
         {  ?>    
		 
      <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
		<!-- Approver History -->
 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1. &nbsp; Basic Capex Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
		
			
             
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">CAPEX Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="dft_cno" value="<?php echo $qcs_row->ftgs_capex_id; ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>
    
                </div>
                </div>
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Plant</label>
				<div class="input-group  col-sm-6">
                 
         <input type="text" name="txtEmpPlant" value="<?php echo $qcs_row->ftgs_plant_code; ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>
    
                </div>
                </div> 
				
				
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-3 control-label" style="color:#3482AE; text-transform: uppercase;">CAPEX Date</label>
				<div class="input-group  col-sm-6">
                   <input type="text" name="txtCpxDate" value="<?php echo $qcs_row->ftgs_capex_date	; ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>
    
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Department</label>
				<div class="input-group  col-sm-6">
				<input type="hidden" readonly  value="<?php echo $qcs_row->ftgs_dept_id; ?>" class="form-control"  required>
				  <?php $dept_nm= $this->method_call->fetch_dept_nm($qcs_row->ftgs_dept_id); ?>

				 <input type="Text" name="txtEmpDept" class=" form-control"  style="background-color:#E6F2FF" readonly value="<?php print_r($dept_nm['dept_name']); ?> "  required>                          
    
				
         
                </div>
                </div>
			  
			 	 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR No</label>
				<div class="input-group  col-sm-6">
                  <input type="text" name="txtftgsPRId" class=" form-control" style="background-color:#E6F2FF" value="<?php echo $qcs_row->ftgs_pr_id; ?>" readonly value=""  required>                          
    
		
         
         
                </div>
                </div> 
			 
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Date</label>
				<div class="input-group  col-sm-6">
				
				   <input type="text" name="" value="<?php echo $qcs_row->ftgs_pr_date; ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>
    
        
                </div>
                </div>
			
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS NO</label>
				<div class="input-group  col-sm-6">
				
				  <input type="text" name="txtftgsQCSId" class=" form-control" style="background-color:#E6F2FF" value="<?php echo $qcs_row->ftgs_qcs_id; ?>" readonly value=""  required>                          
    
		
				
         
                </div>
                </div>
						
				
				
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS Owner </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="pr_owner_empcode" value="<?php echo $qcs_row->ftgs_qcs_owner;?>" readonly style="background-color:#E6F2FF" class="form-control"  required>                          
    
         
                </div>
                </div>
				
			  
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS Date </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="pr_owner_empcode" value="<?php echo $qcs_row->ftgs_qcs_date ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>                          
    
         
                </div>
                </div>
				
			 </div>
			 
			 
            </div>
			
			
			

<!--end -->

				<!-- Capex detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE;">2 . Capex Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
	  				
				 <?php $qcs_detail= $this->method_call->capex_detail($ftgs_capex_id);
 if($qcs_detail!=null){
	 
	 foreach ($qcs_detail->result() as $qcs_pr_row)  
         {  ?>  
	  
	   	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
     1   
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">FUND NO</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" readonly value="<?php echo $qcs_row->ftgs_ion_no; ?>"  name="dft_fund_no" style="background-color:#E6F2FF" class="form-control" >

               
				  
                </div>
                </div>
				
				</br>
				
				  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
2
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Master Asset GL Code</label>
				<div class="col-sm-7 pull-right">
                 
            <input type="text" readonly value="<?php echo $qcs_row->ftgs_master_gl_code; ?>"  name="dft_fund_no" style="background-color:#E6F2FF"  class="form-control" >

				  
                </div>
                </div>
			</br>


	
			 				
			<div class="row invoice-info">
					<div class="col-sm-1">
					</div> 
					
					 <input type="hidden" value = "<?php echo $qcs_row ->ftgs_radio_val;?>" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
					
					
					<?php 
				 if($qcs_row->ftgs_radio_val == "capitalGl")
				 {
					
					 ?>
					 <div id="div1" class="desc">			
				  	
					
					
					<div class="row invoice-info">
			  
			
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Required Capital GL Code-1</label>
				<div class="col-sm-4">
				
				 <input type="text"readonly value = "<?php echo $qcs_row ->ftgs_actual_gl_code;?>" style="background-color:#E6F2FF" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
					
					
               
               
				  
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "<?php echo $qcs_row ->ftgs_amtGlCode1 ;?>"style="background-color:#E6F2FF" name="dftamtGlCode1" onkeyup="enableDisable()" id="dftamtGlCode1" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >
				
					
				</div>
                </div>
				<br>
				
					
				  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
3.2
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Required Capital GL Code-2</label>
				<div class="col-sm-4">
               
				
				 <input type="text"readonly value = "<?php echo $qcs_row ->ftgs_actual_gl_code2;?>" style="background-color:#E6F2FF" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
					
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "<?php echo $qcs_row ->ftgs_amtGlCode2 ;?>" style="background-color:#E6F2FF"  name="dftamtGlCode2" id="dftamtGlCode2" 
  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

				</div>
                </div>
				</br>
				
					
				  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
3.3
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Required Capital GL Code-3</label>
				<div class="col-sm-4">
                 <input type="text"readonly value = "<?php echo $qcs_row ->ftgs_actual_gl_code3;?>" style="background-color:#E6F2FF" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
				
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text"  value = "<?php echo $qcs_row ->ftgs_amtGlCode3;?>" name="dftamtGlCode3"  style="background-color:#E6F2FF" id="dftamtGlCode3"  onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal"  class="form-control" >

				</div>
                </div>
				

</div>
					 
					
					 
					
				 <?php
				 }
				 
				 else
				 {
					 
					 ?>
					 
					 
					 		
					  <div id="div2">
	  	<div class="row invoice-info">
			  
			
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Revenue GL Code-1</label>
				<div class="col-sm-4 ">
				<input type="text"readonly value = "<?php echo $qcs_row ->ftgs_revenue_gl_code1;?>" style="background-color:#E6F2FF" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
				
                </div>
				
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "<?php echo $qcs_row->ftgs_amtRevenueGlCode1; ?>"  style="background-color:#E6F2FF" name="dftamtRevenueGlCode1" id="dftamtRevenueGlCode1" onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

				</div>
                </div>
			</br>

			
			
				  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			3.2
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Revenue GL Code-2</label>
				<div class="col-sm-4 ">
				
				<input type="text"readonly value = "<?php echo $qcs_row ->ftgs_revenue_gl_code2;?>" style="background-color:#E6F2FF" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
				
                </div>
				
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "<?php echo $qcs_row->ftgs_amtRevenueGlCode2; ?>" style="background-color:#E6F2FF" name="dftamtRevenueGlCode2" id="dftamtRevenueGlCode2" onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

				</div>
                </div>
			

</div>					




						 <?php
				 }
				?>
					
						
					
					
					
					</div>
				</div></br>
			

			</br>

			  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			4
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Budget Sr. Number</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $qcs_row->ftgs_budget_no; ?>" style="background-color:#E6F2FF" readonly name="dft_budget_sr_no"  class="form-control" >

               
				  
                </div>
                </div>
			</br>
			
			
			
	  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			5
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Project completion Date (Put-To-Use Date) (Approx.)</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $qcs_row->ftgs_proj_comp_date; ?>"  style="background-color:#E6F2FF"readonly name="dft_proj_comp_date"  class="form-control" >

               
				  
                </div>
                </div>
			</br>

			
			
	  
			</br>

			  
			  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
    6
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Recommender</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $qcs_row->ftgs_cap_recommender; ?>"  readonly style="background-color:#E6F2FF" readonly name="dft_cap_recommender"  class="form-control" >

               
				  
                </div>
                </div>
			<br>
				



<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
     7
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Company/ Unit</label>
				<div class="col-sm-7 pull-right">
                 
				  
                      <input type="Text" readonly name="dft_cap_comp_unit" readonly class=" form-control" style="background-color:#E6F2FF"  value="<?php echo $qcs_row->ftgs_cap_unit; ?>"  required>  
                  
                </div>
                </div>

				
				<br>
		
				
				
				<?php 
		 }
 }?>
	
				
				<br>
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		8
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Type of Capex</label>
				<div class="col-sm-7 pull-right">
                
 <input type="Text" readonly name="dft_cap_comp_unit" readonly class=" form-control" style="background-color:#E6F2FF"  value="<?php echo $qcs_row->ftgs_capex_type; ?>"  required>  
                  				
				
                </div>
                </div>
				
					<br>
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	9
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Part of Business Plan for the FY?</label>
				<div class="col-sm-7 pull-right">
                 
               <input type="Text" readonly name="dft_cap_comp_unit" readonly class=" form-control" style="background-color:#E6F2FF"  value="<?php echo $qcs_row->ftgs_bussiness_plan; ?>"  required>  
  
             
				  
                </div>
                </div>
				
				
				<br>
				
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		10
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Part of Approved Project</label>
				<div class="col-sm-7 pull-right">
               <input type="Text" readonly name="dft_cap_comp_unit" readonly class=" form-control" style="background-color:#E6F2FF"  value="<?php echo $qcs_row->ftgs_approved_proj; ?>"  required>  
    
                 	
                </div>
                </div>
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	11
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Brief Background/ Description of Capex</label>
				<div class="col-sm-7 pull-right">
                 
                  <textarea rows="4" cols="50" readonly  required maxlength="250" name="cap_brief_background" style="background-color:#E6F2FF"   class="form-control" ><?php echo $qcs_row->ftgs_des_capex;?></textarea>

               
				<div id="the-count">
					<span id="current">0</span>
					<span id="maximum">/ 250</span>
				 </div>
				  
                </div>
				
                </div>
				
				<br>
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	12
      </div>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Brief Business/ Financial  Justification for Capex</label>
				<div class="col-sm-12 pull-right table-responsive">
				 
                     
			 <table id="exampletest" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				    <th>  Final Rates </th>  
           `		 <th> Final Amt	</th>
					<th>Item Status	</th>		   
					 <th> % Add	</th>
					<th> Amt	</th>
				

      </tr>
			
              
				
                </thead>
		<tbody>
		<?php $view_item= $this->method_call->qcs_items_capex($ftgs_capex_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
					$total_final_ammount2 = 0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>
		 <!-- item code -->
	
		
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			 <td  ><?php echo $rowitem->ftgs_q_item_code; ?></td> 
				
				<td> <?php echo $rowitem->ftgs_q_hsn_code; ?></td>  				 
            <td>  <?php echo $rowitem->ftgs_q_item_description; ?></td>  
            <td> <?php echo $rowitem->ftgs_q_req_quantity; ?></td>  
            <td> <?php echo $rowitem->ftgs_q_uom; ?></td>  
           
            <td>  <?php echo $rowitem->ftgs_final_rate1; ?> </td>  
            <td> <?php echo $rowitem->ftgs_final_amt1; ?> </td>  
			 <td> <?php echo $rowitem->ftgs_q_itm_sts; ?> </td>  
			 <td> <?php echo $rowitem->amt_per_add; ?> % </td>  
			 <td> <?php echo $rowitem->per_final_amt; ?> </td>  

			
		
		
		
		
                <?php

				
					$final_ammount1 = $rowitem->ftgs_final_amt1;
					$total_final_ammount1 = $total_final_ammount1+$final_ammount1;
					
					
					$perfinal_ammount1 = $rowitem->per_final_amt;
					$total_final_ammount2 = $total_final_ammount2+$perfinal_ammount1;
					
				
					
				?>
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
				
				  <tfoot>
        <tr>
            <td style="text-align:right;" colspan="7"><b>Grand Total:</b></td>
			
			<td class="right "><B><?php echo $total_final_ammount1; ?></b></td>
			
			<td class="right "></td><td class="right "></td>
			<td class="right "><B><?php echo $total_final_ammount2; ?></b></td>
        </tr>
    </tfoot>
	
		 </tbody>
		 </table>
 
		 </table>
				  
                </div>
                </div>
				
				<br>
	
				<input type="hidden" name="dft_grand_total" id="dft_grand_total" value="<?php echo  $total_final_ammount1; ?>" readonly class="form-control" >

				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	13
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Source/ Supplier/ Agency</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_supllier" value="<?php echo $qcs_row->ftgs_cap_sel_supplier; ?>" style="background-color:#E6F2FF" readonly class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	14
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Credibility Check</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" style="background-color:#E6F2FF" name="dft_cap_credibility_check" value="<?php echo $qcs_row->ftgs_credibility_check; ?>" data-toggle="tooltip" data-placement="top" title="Do we have prior experience of this source? If so, how was it? Is this a Catalog/ standard item? If it is a new source and a designed item/ system then have we done any reference checks? If so, what is the feedback?" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	15
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Quantum (Total Amount) of Capex</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_quan_total_amt" style="background-color:#E6F2FF" readonly value= "<?php echo $qcs_row->ftgs_quant_capex; ?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	16
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Basis of Price</label>
				<div class="col-sm-7 pull-right">
                  <input type="text" name="dft_cap_quan_total_amt" style="background-color:#E6F2FF" readonly value= "<?php echo $qcs_row->ftgs_basis_price; ?>" class="form-control" >

                </div>
                </div>
				<br>
			
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	17
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Payment Terms (In Days)</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_pay_term" style="background-color:#E6F2FF" readonly value ="<?php echo $qcs_row->ftgs_pay_term;?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	18
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Any warranties/ Guarantees</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_warranty" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->ftgs_warranties_capex; ?>"   class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
19
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Any Bank Guarantees Involved</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_bank_gurantee" style="background-color:#E6F2FF" value = "<?php echo $qcs_row->ftgs_bank_guarantees; ?>" required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		20
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Any penalties involved for failure on delivery or performance</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_penalties_involved" style="background-color:#E6F2FF" value = "<?php echo $qcs_row->ftgs_delivery_peformace; ?>" required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		21
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Specific exclusions and inclusions in the scope of supply</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_specfic_exclusion"  style="background-color:#E6F2FF" value = "<?php echo $qcs_row->ftgs_scope_supply; ?>" required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		22
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Any other special/ noteworthy terms or condition</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_noteworthy_cond" style="background-color:#E6F2FF"  value = "<?php echo $qcs_row->ftgs_noteworthy_capex; ?>"required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col " style="color:#3482AE">
		23
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Any Technical Aspect to be highlighted</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_tech_asp" style="background-color:#E6F2FF" value = "<?php echo $qcs_row->ftgs_technical_aspect; ?>" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		24
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Estimated Associated or Consequential Costs- that is, cost to company to make the capex actually productive</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_estimated_associated" style="background-color:#E6F2FF" value = "<?php echo $qcs_row->ftgs_estimated_associated; ?>" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
                </div>
                </div>
				
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		25
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">ROI Attachment</label>
				<div class="col-sm-7 pull-right">
                 
                

                </div>
				
        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_capex_attachment/". $qcs_row->ftgs_capex_attachment ?>"> <?php echo $qcs_row->ftgs_capex_attachment ?></a> </b>
        

                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		25
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Justification Of CAPEX</label>
				<div class="col-sm-7 pull-right">
                 
                
 <textarea class="form-control" style="background-color:#E6F2FF" value ="" maxlength="250" rows="4" cols="50" name="txt_comment" >  <?php echo $qcs_row->ftgs_justification_capex; ?></textarea>

                </div>
		
                </div>
				
				  
				
				<br>

			</div>
			</div>
			
			
			<!-- end -->
	



<!-- Asset code -->
			
			
			 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE">3. Asset Code Creation </h3>
				

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  
			   <div class="box-body ">
			   
			   
			   			   <div class="box-body table-responsive">
						   <table id="exampletest" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                     
                  <th >Sr. No.</th>
				  <th >Business Area</th>
					<th style="display:none" >Capex id</th>
				
					<th >Item Code</th>
				    <th >Item Descriptions</th>
				   <th >UOM</th>
				    <th >Qty.</th>
					<th>Cost Centre</th>
					<th>Asset Group </th>
				
      </tr>
	
                </thead>
		<tbody>
		
							<?php $view_item = $this->method_call->qcs_items_assetcode_new($ftgs_capex_id);
						//echo "printing view item list here.....".$view_item->num_rows();
						
							if($view_item->num_rows()=="0"){
				
				$disableFlag="True";
			}
			else{
				$disableFlag="False";
				
			}
			
				
 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $row_asset)  
         {  ?>
		
		<tr> 
				
			<!-- <td><a href="#"  data-toggle="modal" data-target="#assetc_up_Modal" onclick="assetCodeUpdate_data('<?php echo $row_asset->asset_id;?>','<?php echo $row_asset->cost_center;?>','<?php echo $row_asset->asset_grp; ?>')"  ><?php echo $row_asset->asset_id;?></a></td>-->
			<td class="glyphicon glyphicon-edit" style="color:red;" onclick="assetCodeUpdate_data('<?php echo $row_asset->ftgs_asset_id;?>','<?php echo $row_asset->ftgs_cost_center;?>','<?php echo $row_asset->ftgs_asset_grp;?>','<?php echo $row_asset->ftgs_q_item_code;?>','<?php $varassetDesc = $row_asset->ftgs_q_item_description; echo htmlspecialchars($varassetDesc); ?>')" data-toggle="modal" data-target="#assetc_up_Modal"href="#assetc_up_Modal<?php echo $row_asset->ftgs_asset_id;?>"><?php echo $row_asset->ftgs_asset_id; ?></td>
			<td><?php echo $qcs_row->ftgs_cap_unit; ?></td>
				
			<td style="display:none"><?php echo $row_asset->ftgs_capex_id; ?></td>
			
			 <td  ><?php echo $row_asset->ftgs_q_item_code; ?></td> 
			<td>  <?php echo $row_asset->ftgs_q_item_description; ?></td>  
			   <td> <?php echo $row_asset->ftgs_q_uom; ?></td> 
            <td> <?php echo $row_asset->ftgs_q_req_quantity; ?></td>  
			
          
            <td>  <?php echo $row_asset->ftgs_cost_center; ?>   </td>  
			
			
            <td><?php echo $row_asset->ftgs_asset_grp; ?>  </td>  
           
         
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
		
	
		 </tbody>
		
		 </table>
		
			 </div>
			   
			  
			    
			   </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
            </div>
			
			
			
</div>




						<div class="form-group col-sm-12">
						  <label class="pull-left control-label">4</label>
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
											<?php $approval= $this->method_call->cpx_approval_status($ftgs_capex_id);
										 
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
<!--end -->


			
			
			

		
					<input type="hidden" name="qcs_emp_code" value="<?php echo $qcs_row->ftgs_qcs_emp_code;  ?>" class=" form-control" id="qcs_emp_code"   required>
				  <input type="hidden" name="txt_emp_code" value="<?php echo $emp_code; ?>" class=" form-control" id="capex_emp_code"   required>
				    <input type="hidden" name="user_nm" value="<?php echo $emp_name; ?>" class=" form-control" id="capex_emp_nm"   required>
				  
	

		   
<?php
								$ftgsActionData = $this->method_call->getCaxapp4AuthoDetails();
							
								if ($ftgsActionData != null) {
								foreach ($ftgsActionData->result() as $row1) {
										?>
                            <input type="hidden" name="authoID" class="form-control" value="<?php echo $row1->auth_id;?>">
							 <input type="hidden" name="authoMail" class="form-control" value="<?php echo $row1->emp_email;?>">
                          
                                <?php }
                        }
                        ?>
						
      
						
						
									<?php
								$ftgsActionData = $this->method_call->ftgscpx3IDAction($emp_code,$ftgs_capex_id);
							
								if ($ftgsActionData != null) {
								foreach ($ftgsActionData->result() as $row1) {
										?>
                            <input type="hidden" name="Ftgs_action_id" class="form-control" value="<?php echo $row1->action_grid_id;?>">
                          
                                <?php }
                        }
                        ?>
						
<!--end -->


	<div class="form-group col-sm-12">
			  
			   <label class=" pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Asset code Attachment</label>
				<div class="input-group  col-sm-6">
				        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/ftgs_assetFile/". $qcs_row->ftgs_assetFile ?>"> <?php echo $qcs_row->ftgs_assetFile ?></a> </b>
        
                </div>
                </div> 	

	<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">ION NO</label>
				<div class="input-group  col-sm-6">
                  <input type="Text" name="txtIonNo" readonly value="<?php echo $qcs_row->ftgs_capex_ion_no;?>" style="background-color:#E6F2FF" class="form-control"> </input>

         
                </div>
                </div>
		
		
		
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">8</label>
			   <label class="col-sm-4 pull-left control-label">Release NO</label>
				<div class="input-group  col-sm-6">
                  <input type="Text" name="txtRelseNo" readonly value="<?php echo $qcs_row->ftgs_cpx_release_no;?>" style="background-color:#E6F2FF" class="form-control"> </input>

         
                </div>
                </div>
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">9</label>
			   <label class="col-sm-4 pull-left control-label">Action</label>
				<div class="input-group  col-sm-6">
                 
                                        <input type="radio" name="ftgs_status"  value="1" required > Approve</input> 
			   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
         
				 <input type="radio" name="ftgs_status" value="2"> Reject</input>

			
         
                </div>
                </div>
				
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">10</label>
			   <label class="col-sm-4 pull-left control-label">Comment</label>
				<div class="input-group  col-sm-6">
                 
                                        <textarea class="form-control"  value ="" maxlength="250" rows="4" cols="50" name="txt_comment" > </textarea>

                    <div id="the-count1">
					<span id="current1">0</span>
					<span id="maximum1">/ 250</span>
				 </div>
         
                </div>
                </div>

            </div>
	<!-- body close -->
<!-- footer start -->	
<div class="box-footer">
					  <div class="form-group col-sm-12">
					   <div class="col-sm-4">
					   </div>
			 
				
<div class="col-sm-2"><button type="submit" id="btnDraftSubmit" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Proceed</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('Welcome/index') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Cancel</a></div>
				
				
				<div class="col-sm-4 ">
				</div>
				
                </div>
					
	</div>				 
		
	<!--end -->		
			             <!-- /.box-body -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		 <?php
		 }
 }?>
		 

   </div>
  
  </div>			
			   
        

       
</form>
   
   </section>
  
  
   
   
   
   
   
  <!-- /.content-wrapper -->
 
  
   

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
function itemCodeUpdate_data(ftgs_qcs_item_id,ftgs_q_item_code,ftgs_q_item_description) {
 // alert("pr_id..... "+qcs_item_id);
  // alert("q_item_code..... "+q_item_code);
   document.getElementById("itm_codeEdit").value = ftgs_q_item_code;
	document.getElementById("qcs_item_idEdit").value = ftgs_qcs_item_id;
	document.getElementById("qcs_desc_idEdit").value = ftgs_q_item_description;
	
}
</script>
<script>
$(document).ready(function (){
    $("#itemCodeUpdate").submit(function(e){
       
        e.preventDefault();
        $.ajax({
             //alert("in ......");
            url:'<?php echo base_url() ?>/purchase/Capex/updateItemCodeEdit',
            type:'POST',
            dataType:'json',
            data: $("#itemCodeUpdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#itemCodeUpdate')[0].reset();
                $("#response").html(mydata['success']);
                
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});

    
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
<script>
document.addEventListener('DOMContentLoaded', function() {
 //  var test= document.getElementById('yesno').value();
 	var radioStatus = document.getElementById('yesno').value;
   
    if (radioStatus == "capitalGl") {
		
	$("#div1").show();
    $("#div2").hide();
	
    }
	
	else if(radioStatus == "revenueGl"){
		
	$("#div1").hide();
    $("#div2").show();
		
    }
}, false);
  


function enableDisable(){
	
	var radioStatus = document.getElementById('radioStatus').value;
	if(radioStatus == "capitalGl"){
		
   var dftamtGlCode1 = parseInt(document.getElementById('dftamtGlCode1').value);
   var dftamtGlCode2 = parseInt(document.getElementById('dftamtGlCode2').value);
   var dftamtGlCode3 = parseInt(document.getElementById('dftamtGlCode3').value);
		var dft_grand_total = document.getElementById('dft_grand_total').value;
		//alert(dft_grand_total);
		var resultDftamtGlCode = dftamtGlCode1 + dftamtGlCode2 + dftamtGlCode3;
		
		
		if(resultDftamtGlCode > dft_grand_total )
		{
			document.getElementById("btnDraftSubmit").disabled = true;
		}
		else	
		{
			document.getElementById("btnDraftSubmit").disabled = false;
		}
		
	}
	else{
		
		var dftamtRevenueGlCode1 = parseInt(document.getElementById('dftamtRevenueGlCode1').value);
		var dftamtRevenueGlCode2 = parseInt(document.getElementById('dftamtRevenueGlCode2').value);
		var dft_grand_total = document.getElementById('dft_grand_total').value;
		//alert(dft_grand_total);
		var resultDftamtGlCode = dftamtRevenueGlCode1 + dftamtRevenueGlCode2 ;
		
		
		if(resultDftamtGlCode > dft_grand_total )
		{
			document.getElementById("btnDraftSubmit").disabled = true;
		}
		else	
		{
			document.getElementById("btnDraftSubmit").disabled = false;
		}
		
	}
		
  }	
  
  
 function caprevCheck(radioPara) {
	
		
	
		
	
    if (radioPara == "capitalGl") {
		
	$("#div1").show();
    $("#div2").hide();
	
    }
	
	else{
		
	$("#div1").hide();
    $("#div2").show();
		
    }
	
	
   
}


</script>

<script>
	function pradnya(capex_owner){
		
		var owner =capex_owner;
		exportMe(owner);
	}
	</script>
	<script>
	function exportMe(owner){
		
        //getting values of current time for generating the file name
		var capex_owner = owner; 
		var capex_id = "<?php echo $ftgs_capex_id ?>"; 
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('exampletestExport');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = capex_owner+"-CapexID-"+ capex_id +"-"+ postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
  
	}	
	</script>
  </body>
</html>