 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create CAPEX</title>
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
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1 style="color:#FFFFFF; font-family:'exo'">
       Create CAPEX
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
         <li> <a href="<?php echo site_url('purchase/Capex/index') ?>" style="color:#FFFFFF;">Capex</a></li>

<li class="active" style="color:#FFFFFF;">Create CAPEX
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
  	<section class="content" id="content">
	  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('purchase/Capex/insert_capex') ?>" >  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
	  	  <?php $qcs_detail= $this->method_call->qcs_detail_capex($qcs_id);
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
		
			
              <input type="hidden" name="capex_emp_code" class=" form-control"  readonly value="<?php echo $emp_code; ?>"  required>                          
    
         
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">CAPEX Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" value="auto-genrated" style="background-color:#E6F2FF" readonly class="form-control"  required>
    
                </div>
                </div>
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Plant</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="pr_plant" class=" form-control" style="background-color:#E6F2FF"  readonly value="<?php echo $qcs_row->plant_code; ?>"  required>                          
    
         
                </div>
                </div> 
				
				
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE; text-transform: uppercase;">CAPEX Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" readonly name="qcs_date" style="background-color:#E6F2FF" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Department</label>
				<div class="input-group  col-sm-6">
				 <input type="hidden" readonly  value="<?php echo $qcs_row->dept_id; ?>" class="form-control"  required>
				  <?php $dept_nm= $this->method_call->fetch_dept_nm($qcs_row->dept_id); ?>

				 <input type="Text" name="pr_plant" class=" form-control"  style="background-color:#E6F2FF" readonly value="<?php print_r($dept_nm['dept_name']); ?> "  required>                          
    
         
         
                </div>
                </div>
			  
			 	 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR No</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" name="cap_pr_no" class=" form-control" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->pr_id;?>"  required>                          
    
		<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#prModal"href="#prModal<?php echo $qcs_row->pr_id?>">&nbsp;<?php echo $qcs_row->pr_id; ?></span>
				</p>
         
         
                </div>
                </div> 
			 
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Date</label>
				<div class="input-group  col-sm-6">
				
				
				 
				  <?php $pr_date= $this->method_call->fetch_pr_date($qcs_row->pr_id); ?>
                      <input type="Text" name="pr_plant" class=" form-control" style="background-color:#E6F2FF" readonly value="<?php print_r($pr_date['pr_date']); ?>"  required>                   
    
         
                </div>
                </div>
			
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS NO</label>
				<div class="input-group  col-sm-6">
				
				
				 <input type="hidden" name="qcs_no"  class=" form-control" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->qcs_id; ?> " required> 
  	<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#qcsModal"href="#qcsModal<?php echo $qcs_row->qcs_id?>">&nbsp;<?php echo $qcs_row->qcs_id; ?></span>
				</p>                
          
         
                </div>
                </div>
						
				
				
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS Owner </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="pr_owner_empcode" value="<?php echo $qcs_row->qcs_owner; ?>" readonly style="background-color:#E6F2FF" class="form-control"  required>                          
    
         
                </div>
                </div>
				
			  
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS Date </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="pr_owner_empcode" value="<?php echo $qcs_row->qcs_date ?>" style="background-color:#E6F2FF" readonly class="form-control"  required>                          
    
         
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
	  				
				 <?php $qcs_detail= $this->method_call->pr_qcs_detail_capex($qcs_id);
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
                 
                  <input type="text" value="<?php echo $qcs_pr_row->ion_no; ?>"  name="fund_no"  class="form-control" >

               
				  
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
                 
            
                  
                  
                  <select class="form-control" required name="asset_gl_code">	
					

				
						
				
							  <?php $gl_code= $this->method_call->glCodeList();
							 	if($gl_code!=null){
									
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
					
				<option value="<?php echo $row_glCode->gl_code; ?>(<?php echo $row_glCode->gl_desc;?>)"><?php echo $row_glCode->gl_code;?> <b>(<?php echo $row_glCode->gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select>    

               
				  
                </div>
                </div>
			</br>


	
			 	<div class="row invoice-info">
					<div class="col-sm-1">
					</div> 
					<div class="col-sm-1 invoice-col" style="color:#3482AE">3</div>
					<label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Action</label>
					<div class="box-tools" style="padding-left:43%;font-size:15px;">
						<input type="radio" name="yesno" value ="capitalGl" id="yesCheck" onclick="javascript:yesnoCheck();" />&nbsp;Capital GL Code
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="radio" name="yesno" id="noCheck" value="revenueGl" onclick="javascript:yesnoCheck();" /> &nbsp; Revenue GL Code
					</div>
				</div></br>
			
	<div id="div1" style="display:none">			
				  	
					
					
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Required Capital GL Code-1</label>
				<div class="col-sm-4">
                 
                   
                  <select class="form-control" required name="capitalGlCode1">	
					

				
						
				
							  <?php $gl_code= $this->method_call->glCodeList();
							 	if($gl_code!=null){
									
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
					
				<option value="<?php echo $row_glCode->gl_code; ?>(<?php echo $row_glCode->gl_desc;?>)"><?php echo $row_glCode->gl_code;?> <b>(<?php echo $row_glCode->gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select>    

               

               
				  
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "0" name="amtGlCode1" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter than QCS GrandTotal" class="form-control" >

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
                 
                   
                  <select class="form-control" required name="capitalGlCode2">	
					

				
						
				
							  <?php $gl_code= $this->method_call->glCodeList();
							 	if($gl_code!=null){
									
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
					
				<option value="<?php echo $row_glCode->gl_code; ?>(<?php echo $row_glCode->gl_desc;?>)"><?php echo $row_glCode->gl_code;?> <b>(<?php echo $row_glCode->gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select>    

               

               
				  
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "0"  name="amtGlCode2" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter than QCS GrandTotal" class="form-control" >

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
                 
                   
                  <select class="form-control" required name="capitalGlCode3">	
					

				
						
				
							  <?php $gl_code= $this->method_call->glCodeList();
							 	if($gl_code!=null){
									
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
					
				<option value="<?php echo $row_glCode->gl_code; ?>(<?php echo $row_glCode->gl_desc;?>)"><?php echo $row_glCode->gl_code;?> <b>(<?php echo $row_glCode->gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select>    

               

               
				  
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text"  value = "0" name="amtGlCode3" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter than QCS GrandTotal"  class="form-control" >

				</div>
                </div>
				</br>

</div>


<div id="div2" style="display:none">
	  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Revenue GL Code-1</label>
				<div class="col-sm-4 ">
                  <select class="form-control" required name="revenuGlCode1">
			
							
							  <?php $gl_code= $this->method_call->revenu_glCodeList();
							if($gl_code!=null){
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
			
			<option value="<?php echo $row_glCode->rev_gl_code;?>(<?php echo $row_glCode->rev_gl_desc;?>)"><?php echo $row_glCode->rev_gl_code;?> <b>(<?php echo $row_glCode->rev_gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select> 
				  
				  
                </div>
				
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "0"  name="amtRevenueGlCode1" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter than  QCS GrandTotal" class="form-control" >

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
                  <select class="form-control" required name="revenuGlCode2">
			
							
							  <?php $gl_code= $this->method_call->revenu_glCodeList();
							if($gl_code!=null){
										foreach ($gl_code->result() as $row_glCode)  
						{  ?>
			
			<option value="<?php echo $row_glCode->rev_gl_code;?>(<?php echo $row_glCode->rev_gl_desc;?>)"><?php echo $row_glCode->rev_gl_code;?> <b>(<?php echo $row_glCode->rev_gl_desc;?>)</b> </option>
			
	<?php }
				}
					?>
							 </select> 
				  
				  
                </div>
				
				<div class="col-sm-2">
				  
                  <input type="text" value = "0"  name="amtRevenueGlCode2" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter than QCS GrandTotal" class="form-control" >

				</div>
                </div>
			</br>

</div>			

			</br>

			
			  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			4
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Budget Sr. Number</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value=""  name="budget_sr_no"  class="form-control" >

               
				  
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
                 
                  <input type="date" value=""  name="proj_comp_date" placeholder="DD/MM/YYYY" class="form-control" >

               
				  
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
                 
                  <input type="text" value="<?php echo $qcs_pr_row->pr_owner_name; ?>" style="background-color:#E6F2FF" readonly name="cap_recommender"  class="form-control" >

               
				  
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
                 
				  
                      <input type="Text" readonly name="cap_comp_unit" class=" form-control" style="background-color:#E6F2FF"  value="<?php echo $qcs_pr_row->plant_code; ?>"  required>  
                  
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
                 
				 <select class="form-control" name="cap_capex_type">  
				<option value="" >Select option</option>
				 <option value="Expansion">Expansion</option>
				 <option value="Automation">Automation</option>
				 <option value="Refurbishment">Refurbishment</option>
				 <option value="Tooling">Tooling</option>
				<option value="Quality">Quality</option>
				 <option value="Safety">Safety</option>
				 <option value ="IT">IT</option>
				 <option value="Other">Other</option>
				</select>
                

               
				  
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
                 
                <!--  <input type="text"   name="cap_fin_year" data-toggle="tooltip" data-placement="top" class="form-control" >-->

               <select class="form-control" name="cap_fin_year">  
				
				 <option value="YES">YES</option>
				 <option value="NO">NO</option>
				 
				</select>
				  
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
                 
                 	 <select class="form-control" name="cap_approve_proj">  
				
				 <option value="YES">YES</option>
				 <option value="NO">NO</option>
				 
				</select>
               
				  
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
                 
                  <textarea rows="4" cols="50"  required maxlength="250" name="cap_brief_background"  class="form-control" ></textarea>

               
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
				
				 
				

      </tr>
			
              
				
                </thead>
		<tbody>
		<?php $view_item= $this->method_call->view_qcs_items($qcs_id);
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
 
		 </table>
				  
                </div>
                </div>
				
				<br>
	
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	13
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Source/ Supplier/ Agency</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="cap_supllier" value="<?php echo $qcs_pr_row->selected_supplier; ?>" style="background-color:#E6F2FF" readonly class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_credibility_check" data-toggle="tooltip" data-placement="top" title="Do we have prior experience of this source? If so, how was it? Is this a Catalog/ standard item? If it is a new source and a designed item/ system then have we done any reference checks? If so, what is the feedback?" class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_quan_total_amt" style="background-color:#E6F2FF" readonly value= "<?php echo $total_final_ammount1; ?>" class="form-control" >

               
				  
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
                 
                 	 <select class="form-control" name="cap_basis_price">  
				<option value="" >Select option</option>
				 <option value="Ex-Works">Ex-Works</option>
				 <option value="FOB">FOB</option>
				 <option value="CIF">CIF</option>
				 <option value="At Site">At Site</option>
				 <option value="Fixed">Fixed</option>
				 <option value="Estimated">Estimated</option>
				 
				</select>
               
				  
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
                 
                  <input type="text" name="cap_payment_term" style="background-color:#E6F2FF" readonly value ="<?php echo $qcs_row->pymt_terms_sup1;?>" class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_warranty" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->warranty_sup1; ?>"   class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_bank_gurantee" required  class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_penalties_involved" required  class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_specfic_exclusion" required  class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_noteworthy_cond" required  class="form-control" >

               
				  
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
                 
                  <input type="text" name="cap_tech_asp" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
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
                 
                  <input type="text" name="estimated_associated" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
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
                 
                <input type="file"  name="capex_attachment" class="form-control">

                </div>
                </div>
				
				<br>
				
				    <input type="hidden" name="capex_status" required value="capex_draft" class="form-control" >

				
	
				
				<br>

			</div>
			</div>
			
			
			<!-- end -->
	


			<!-- 4. Item Code Updation -->
			
			
			 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE">3. Item Code Updation</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body ">
									   <div class="table-responsive" style="width:100%;">
		

						
				 <div class="form-group col-sm-12">
				  
		<table id="exampletest" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
					<th >Item ID </th>
					<th >HSN Code</th>
				   
					<th >Item Code</th>
                 
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
                    <th>  Final Rates </th>  
					<th> Final Amt	</th>              
			
			
		</tr>
			
              
		
				
                </thead>
		
	 <tbody>
				
                                    <?php $view_item= $this->method_call->view_qcs_items($qcs_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>

               
				
			<tr>
			
		
				 
			 <td class="glyphicon glyphicon-edit" style="color:red;" onclick="itemCodeUpdate_data('<?php echo $rowitem->qcs_item_id;?>','<?php echo $rowitem->q_item_code;?>','<?php $varItemDesc = $rowitem->q_item_description; echo htmlspecialchars($varItemDesc);?>')" data-toggle="modal" data-target="#itemcodeModal"href="#itemcodeModal<?php echo $qcs_row->pr_id?>"><?php echo $rowitem->qcs_item_id; ?></td>
				
            <td>  <?php echo $rowitem->q_hsn_code; ?></td> 
             
         
            <td> <?php echo $rowitem->q_item_code; ?> </td>
		
          
            <td>  <?php echo $rowitem->q_item_description; ?></td>  
            <td>  <?php echo $rowitem->q_req_quantity; ?></td>  
            <td>  <?php echo $rowitem->q_uom; ?></td>  
            <td>  <?php echo $rowitem->final_rate1; ?></td>  
            <td>  <?php echo $rowitem->final_amt1; ?></td>  
            			
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
			
			
			
</div>
<!--end -->
		
		


            </div>
			

			
</div>
<!--end -->
	
	<input type="hidden"  class=" form-control" name ="qcs_emp_code" value="<?php echo $qcs_row->qcs_emp_code; ?>" readonly   required>                          
	<!-- body close -->
<!-- footer start -->	
<div class="box-footer">
					  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
				
<div class="col-sm-2"><button type="submit" id="" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Save Draft</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/capex/capex_menu') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Cancel</a></div>
				
				
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
   
   	<!--  PR view modal -->

<div class="modal fade displaycontent" id="prModal">

<div class="modal-dialog" role="document" style="width:980px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo'">View PR</h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>
			

            <div class="row">
			
			  <div class="form-group col-md-6">
				<label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
                  <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF"  readonly value="  <?php echo $qcs_row->pr_id; ?>"  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF"  readonly value="<?php echo $qcs_row->pr_owner_name; ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($qcs_row->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($qcs_row->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
					
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php echo $qcs_row->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>		
			    <div class="form-group col-sm-12">
			        
					<table id="exam" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
					<thead style="text-align: center;" >
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
				  <?php $item= $this->method_call->list_pr_items_qid($qcs_id);
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
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Cumulative Total Amount of PR <?php echo $qcs_row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $qcs_row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $qcs_row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">10</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $qcs_row->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">11</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $qcs_row->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">12</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $qcs_row->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">13</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $qcs_row->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">14</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $qcs_row->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">15</label>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                   <?php echo $qcs_row->procurement_res;  ?>

         
                </div>
                </div>
		
			
 
		
	</div>
		
        </section>
	  
	 </div>
    </div>
  </div>
  </div>
  </div>
  
  <!--end  -->	 
   
        <!--  QCS view modal -->

<div class="modal fade displaycontent" id="qcsModal">

<div class="modal-dialog" role="document" style="width:1280px;">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo';">View QCS</h4>
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
	  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">QCS No :</label>
				<div class="input-group  col-sm-4">
              <?php echo $qcs_row->qcs_id; ?>
                </div>
                </div> 
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">QCS Owner :</label>
				<div class="input-group  col-sm-4">
				
				
				<?php echo $qcs_row->qcs_owner; ?>
         
                </div>
                </div>
				<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-4 pull-left control-label " style="color:#3482AE"> QCS Date/Time:</label>
				<div class="input-group  col-sm-6">
               <?php echo $qcs_row->qcs_date; ?>
                </div>
                </div> 
				<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Selected Supplier:</label>
				<div class="input-group  col-sm-4">
                 
				<?php echo $qcs_row->selected_supplier; ?>	
    
                </div>
                </div>
				 
				
					
				
					<div class="form-group col-sm-4">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">Justification for Selection of Supplier :</label>
				<div class="input-group  col-sm-6">
                 
                              
         <?php echo $qcs_row->justification_supplier; ?>

         
                </div>
                </div>
				</div>
				</div>
				</div>
		 <div class="box-header with-border">
					   <div class="box box-default ">
							<div class="box-header with-border">
								<h3 class="box-title" style="color:#3482AE;text-transform: uppercase;">2 . QCS Item Details</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
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
				 <th colspan="4" ><center> 1. <?php echo $qcs_row-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" > <center>2. <?php echo $qcs_row-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $qcs_row-> sup3_nm; ?>   <center></th>
				

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
         { 					

  ?>
		 <!-- item code -->
	
	
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			 <td  ><?php echo $rowitem->q_item_code; ?></td> 
				 
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
	</div>
	</div>
	</div>
       
			  
<!-- end -->	

  <!-- Technical specification -->
  <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE">3 . Technical Specification Comparison</h3>

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
				<table id="example6" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
					<tbody style="text-align: center;" >
						<tr style="background-color:#3482AE;color:#FFFFFF">				
	  
			 <td style="display:none" >  </td>
			  <td > Sr No </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:center;" >Technical Specification</td>
				 <td colspan="3" ><b> <center>Selected Supplier   :&nbsp;&nbsp; <?php echo $qcs_row->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" ><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $qcs_row->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3" ><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $qcs_row->sup3_nm; ?><center></b> </td>
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
				 <td colspan="6" style="text-align:center;" >Technical Details</td>
				 <td colspan="3"  > <?php echo $qcs_row->tech_det_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->tech_det_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->tech_det_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >Credibility Of The Supplier Checked													
</td>
				 <td colspan="3">  
				     <?php echo $qcs_row->credibility_sup1; ?>       
				 </td>
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"> 
				  <?php echo $qcs_row->credibility_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
				<?php echo $qcs_row->credibility_sup3; ?>
				  
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
			 
			 
			 
				 <td colspan="6" style="text-align:center;" >Insurance & Freight</td>
				 
				 <td colspan="3"  > 
					<?php echo $qcs_row->insurance_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >
				  	<?php echo $qcs_row->insurance_sup2; ?>
				  </td>
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3">  
						<?php echo $qcs_row->insurance_sup3; ?>
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
				 <td colspan="6" style="text-align:center;" >Delivery Period</td>
				 <td colspan="3"  >  <?php echo $qcs_row->del_period_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">  <?php echo $qcs_row->del_period_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->del_period_sup3; ?></td>
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
				 <td colspan="6" style="text-align:center;" >Delivery Mode</td>
				 <td colspan="3">  <?php echo $qcs_row->del_mode_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><?php echo $qcs_row->del_mode_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"> <?php echo $qcs_row->del_mode_sup3; ?>   </td>
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
				 <td colspan="6" style="text-align:center;" >Inspection / Testing													</td>
				 <td colspan="3">
				 	<?php echo $qcs_row->inspection_sup1; ?>
				</td>
				
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				  <td colspan="3"  >  
						<?php echo $qcs_row->inspection_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3">
					<?php echo $qcs_row->inspection_sup3; ?>				  
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
				 <td colspan="6" style="text-align:center;" >Payment Terms</td>
				 <td colspan="3"  >  <?php echo $qcs_row->pymt_terms_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->pymt_terms_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $qcs_row->pymt_terms_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >Warranty</td>
				 <td colspan="3"  >  <?php echo $qcs_row->warranty_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > <?php echo $qcs_row->warranty_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->warranty_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >Scope Of Installation </td>
				 <td colspan="3"  > 
				 		<?php echo $qcs_row->scope_instal_sup1; ?>
				 </td>
				 
				 
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  
				  			<?php echo $qcs_row->scope_instal_sup2; ?>
				  </td>
				  
				  
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  > 
				  			<?php echo $qcs_row->scope_instal_sup3; ?>
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
				 <td colspan="6" style="text-align:center;" >Taxes & Duties</td>
				 <td colspan="3"  >  <?php echo $qcs_row->taxes_duties_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->taxes_duties_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->taxes_duties_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >Note</td>
				 <td colspan="3"  >  <?php echo $qcs_row->note_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->note_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->note_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >Validity Of Price/Quote</td>
				 <td colspan="3"  >  <?php echo $qcs_row->validity_price_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->validity_price_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->validity_price_sup3; ?> </td>
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
				 <td colspan="6" style="text-align:center;" >REPL Scope</td>
				 <td colspan="3"  > <?php echo $qcs_row->repl_scope_sup1; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->repl_scope_sup2; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $qcs_row->repl_scope_sup3; ?> </td>
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

<!-- item code model -->

<div class="modal fade displaycontent" id="itemcodeModal">

<div class="modal-dialog" role="document" style="width:650px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo'">Item Code </h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

		
  <form id="itemDetails" name="itemDetails" action="<?php echo site_url('purchase/capex/updateItemCodeEdit'); ?>" method="post">
            <div class="row">
			
			
			 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Item Code</label>
				<div class="input-group  col-sm-4">
             
			 <input type="hidden" name="qcs_item_idEdit" class=" form-control" id="qcs_item_idEdit"   required>
			  <input type="Text" name="itm_codeEdit" class=" form-control" id="itm_codeEdit"   required>

         
                </div>
                </div>
				
				<br><br>
					 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Item Description</label>
				<div class="input-group  col-sm-6">
             
			
			  <textarea name="qcs_desc_idEdit" class=" form-control" id="qcs_desc_idEdit" style="background-color:#E6F2FF" readonly></textarea>

         
                </div>
                </div>
				
				<br><br><br>
				
				 <div class="form-group col-sm-12">
			 <div class="col-sm-4">
			 </div>
				
<div class="col-sm-4"><button type="submit" name="save" class="btn" style="width: 70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Update</button></div>

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
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
function itemCodeUpdate_data(qcs_item_id,q_item_code,q_item_description) {
 // alert("pr_id..... "+qcs_item_id);
  // alert("q_item_code..... "+q_item_code);
   document.getElementById("itm_codeEdit").value = q_item_code;
	document.getElementById("qcs_item_idEdit").value = qcs_item_id;
	document.getElementById("qcs_desc_idEdit").value = q_item_description;
	
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

<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
		
	
        document.getElementById('div1').style.display = 'block';
		document.getElementById('div2').style.display = 'none';
    }
	
	else if (document.getElementById('noCheck').checked) {
		
        document.getElementById('div2').style.display = 'block';
		document.getElementById('div1').style.display = 'none';
		
    }
	
	
    

}

</script>
  </body>
</html>