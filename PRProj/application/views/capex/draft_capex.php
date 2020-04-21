 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Draft CAPEX</title>
     	   <?php include_once 'styles.php'; ?>
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo'; onload="enableDisable();" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo'">
       Draft CAPEX
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/Capex/index') ?>" style="color:#FFFFFF;">Capex</a></li>

<li class="active" style="color:#FFFFFF;">Draft CAPEX
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
  	<section class="content" id="content">
	  <form method="post" enctype="multipart/form-data"  action="<?php echo site_url('purchase/Capex/draft_update_capex') ?>" >  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
  
	  	  <?php $capex_detail= $this->method_call->detail_capex($capex_id);
 if($capex_detail!=null){
	 foreach ($capex_detail->result() as $capex_row)  
         {  ?>  



			<!-- 4. Item Code Updation -->
			
			
			 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
             <h3 class="box-title" style="color:#3482AE">1. BASIC CAPEX DETAILS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body ">



              <input type="hidden" name="capex_emp_code" class=" form-control"  readonly value="<?php echo $emp_code; ?>"  required>                          
    
         
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">CAPEX NO </label>
				<div class="input-group  col-sm-6">
                 
                <input type="text" name="dft_cno" style="background-color:#E6F2FF" value="<?php echo $capex_row->capex_id; ?>" readonly class="form-control"  required>
    
                </div>
                </div>
				
					  	  <?php $q_capex_detail= $this->method_call->qcs_detail_for_capex($capex_id);
 if($q_capex_detail!=null){
	 foreach ($q_capex_detail->result() as $q_row)  
         {  ?> 
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">Plant</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="dft_plant" class=" form-control" style="background-color:#E6F2FF" value="<?php echo $q_row->plant_code; ?>" readonly   required>                          
    
         
                </div>
                </div> 
				
				
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE">CAPEX Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="text" class="form-control" style="background-color:#E6F2FF" readonly name="dft_date" value="<?php echo $capex_row->capex_date; ?>">

                </div>
                </div>
				
				
				<div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">PR No</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" name="dft_pr_no" class=" form-control"  style="background-color:#E6F2FF" readonly value="<?php echo $capex_row->pr_id;?>"  required>                          
    
		<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#prModal"href="#prModal<?php echo $q_row->pr_id?>">&nbsp;<?php echo $q_row->pr_id; ?></span>
				</p>
				
         
         
                </div>
                </div> 
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">Department</label>
				<div class="input-group  col-sm-6">
	   
					<?php $dept_nm= $this->method_call->fetch_dept_nm($q_row->dept_id); ?>
						   <input type="Text" name="dft_plant" class=" form-control" id="dft_plant" style="background-color:#E6F2FF" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
         
                </div>
                </div>
			 
			 	 
			 
			
 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">PR Date</label>
				<div class="input-group  col-sm-6">
				
				
				 
				  <?php $pr_date= $this->method_call->fetch_pr_date($q_row->pr_id); ?>
                      <input type="Text" name="pr_plant" class=" form-control" style="background-color:#E6F2FF" readonly value="<?php print_r($pr_date['pr_date']); ?>"  required>                   
    
         
                </div>
                </div>
			
						
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">QCS NO</label>
				<div class="input-group  col-sm-6">
				
				
				 <input type="hidden" name="dft_qcs_no"  class=" form-control" style="background-color:#E6F2FF" readonly value="<?php echo $q_row->qcs_id; ?> " required> 
                 	<p style="color:red;font-size:15px;">
				<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#qcsModal"href="#qcsModal<?php echo $q_row->qcs_id?>">&nbsp;<?php echo $q_row->qcs_id; ?></span>
				</p>
				 
          
         
                </div>
                </div>
				
				
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">QCS Owner </label>
				<div class="input-group  col-sm-6">
				<input type="Text"  class=" form-control" name ="dft_q_owner" style="background-color:#E6F2FF" value="<?php echo $q_row->qcs_owner; ?>" readonly   required>                          
    		
                  
                </div>
                </div>
				
			  
	
				
							
		
					 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE">QCS Date </label>
				<div class="input-group  col-sm-6">
  <input type="text" name="dft_q_date" class=" form-control" style="background-color:#E6F2FF" value="<?php echo $q_row->qcs_date; ?>" readonly   required>                          
                
                </div>
                </div>

		<!-- end -->
				<!-- capex start -->
			</br>	</br>	</br>	 </br>	</br>	
			
			 <?php } 
 } ?>				
		
				
			 </div>
            </div>
			
			
			
</div>
<!--end -->
		 
		 
     
			
				<!-- Capex detail collapsed-box -->
				<div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE">2 . Capex Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
	  				

	  
	   	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
     1   
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">FUND NO</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $capex_row->fund_no; ?> "  name="dft_fund_no"  class="form-control" >

               
				  
                </div>
                </div>

				
				</br>
				
				  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
2
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Master Asset GL Code</label>
				<div class="col-sm-7 pull-right">
                 
              
						<select class="form-control" required name="dft_asset_gl_code">	
						<option value="<?php echo $capex_row->master_gl_code;?>"><?php echo $capex_row->master_gl_code;?> </option>

				
						
				
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
			</br> <input type="hidden" value = "<?php echo $capex_row ->radio_val;?>" name="radioStatus" id="radioStatus" data-toggle="tooltip" data-placement="top" title="Enter Ammount" class="form-control" >
							<!--End This type for getting radio selected status option  -->
				
			<!-- start style="display:none"  -->
			
			<div class="row invoice-info">
					<div class="col-sm-1">
					</div> 
					<div class="col-sm-1 invoice-col" style="color:#3482AE">3</div>
					<label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Action</label>
					<div class="box-tools" style="padding-left:43%;font-size:15px;">
					
					
					<?php 
				 if($capex_row->radio_val == "capitalGl")
				 {
					
					 ?>
					 
					 
					 <input type="radio" name="yesno"  id="yesno" required  value="capitalGl" onclick="caprevCheck(this.value); "/>&nbsp;Capital GL Code
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<input type="radio" name="yesno" id="yesno" required value="revenueGl" onclick="caprevCheck(this.value);"  /> &nbsp; Revenue GL Code
					 
				 <?php
				 }
				 
				 else
				 {
					 
					 ?>
					 <input type="radio" name="yesno" id="yesno" required value="revenueGl" onclick="caprevCheck(this.value);"  /> &nbsp; Revenue GL Code
					&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<input type="radio" name="yesno"  id="yesno"  required value="capitalGl" onclick="caprevCheck(this.value); "/>&nbsp;&nbsp; Capital GL Code
				 <?php
				 }
				?>
					
						
					
					
					
					</div>
				</div></br>
				
				
					 <div id="div2">
	  	<div class="row invoice-info">
			  
			<div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Revenue GL Code-1</label>
				<div class="col-sm-4 ">
                <select class="form-control"  name="dftrevenuGlCode1">
			<option value="<?php echo $capex_row->revenue_gl_code1;?>"><?php echo $capex_row->revenue_gl_code1;?> </option>

							
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
				  
                  <input type="text" value = "<?php echo $capex_row->amtRevenueGlCode1; ?>" name="dftamtRevenueGlCode1" id="dftamtRevenueGlCode1" onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

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
                 <select class="form-control"  name="dftrevenuGlCode2">
			<option value="<?php echo $capex_row->revenue_gl_code2;?>"><?php echo $capex_row->revenue_gl_code2;?> </option>

							
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
				  
                  <input type="text" value = "<?php echo $capex_row->amtRevenueGlCode2; ?>" name="dftamtRevenueGlCode2" id="dftamtRevenueGlCode2" onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

				</div>
                </div>
			

</div>	
	 			
	<div id="div1" class="desc">			
				  	
					
					
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
3.1
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Required Capital GL Code-1</label>
				<div class="col-sm-4">
                 <select class="form-control"  name="dft_capitalGlCode1">	
				<option value="<?php echo $capex_row->actual_gl_code;?>"><?php echo $capex_row->actual_gl_code;?> </option>

	
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
				  
                  <input type="text" value = "<?php echo $capex_row ->amtGlCode1 ;?>" name="dftamtGlCode1" onkeyup="enableDisable()" id="dftamtGlCode1" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >
				
					
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
                <select class="form-control"  name="dftcapitalGlCode2">	
					<option value="<?php echo $capex_row->actual_gl_code2;?>"><?php echo $capex_row->actual_gl_code2;?> </option>


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
				  
                  <input type="text" value = "<?php echo $capex_row ->amtGlCode2 ;?>"  name="dftamtGlCode2" id="dftamtGlCode2" 
 onkeyup="enableDisable()" data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal" class="form-control" >

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
                 
                 <select class="form-control"  name="dftcapitalGlCode3">	
					<option value="<?php echo $capex_row->actual_gl_code3;?>"><?php echo $capex_row->actual_gl_code3;?> </option>


				
						
				
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
				  
                  <input type="text"  value = "<?php echo $capex_row ->amtGlCode3;?>" name="dftamtGlCode3" id="dftamtGlCode3"  onkeyup="enableDisable()"  data-toggle="tooltip" data-placement="top" title="Amount Should not gretter QCS GrandTotal"  class="form-control" >

				</div>
                </div>
				

</div>



			</br>

			
			  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			4
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Budget Sr. Number</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $capex_row->budget_no; ?> "  name="dft_budget_sr_no"  class="form-control" >

               
				  
                </div>
                </div>
			</br>
			
			
			
	  	<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
			5
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Project completion Date (Put-To-Use Date) (Approx.)</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $capex_row->proj_comp_date; ?> " name="dft_proj_comp_date" placeholder="DD/MM/YYYY" class="form-control" >

               
				  
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
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Recommender</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" style="background-color:#E6F2FF" value="<?php echo $capex_row->cap_recommender; ?>" readonly name="dft_cap_recommender"  class="form-control" >

               
				  
                </div>
                </div>
			<br>
				



<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
     7
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Company/ Unit</label>
				<div class="col-sm-7 pull-right">
                 
				  
                      <input type="Text" style="background-color:#E6F2FF" readonly name="dft_cap_comp_unit" class=" form-control"  value="<?php echo $capex_row->cap_unit; ?>" required>  
                  
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
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Type of Capex</label>
				<div class="col-sm-7 pull-right">
                 
				 <select class="form-control" name="dft_cap_capex_type">  
				<option value="<?php echo $capex_row->capex_type; ?>" ><?php echo $capex_row->capex_type; ?></option>
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
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Part of Business Plan for the FY?</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" value="<?php echo $capex_row->bussiness_plan; ?>"   name="dft_cap_fin_year" data-toggle="tooltip" data-placement="top" class="form-control" >

               
				  
                </div>
                </div>
				
				
				<br>
				
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		10
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Part of Approved Project</label>
				<div class="col-sm-7 pull-right">
                 
                 	 <select class="form-control" name="dft_cap_approve_proj">  
				 <option  value="<?php echo $capex_row->approved_proj; ?>"><?php echo $capex_row->approved_proj; ?></option>
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
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Brief Background/ Description of Capex</label>
				<div class="col-sm-7 pull-right">
                 
                  <textarea rows="4" cols="50" value="" required maxlength="250" name="dft_cap_brief_background"  class="form-control" ><?php echo $capex_row->des_capex; ?></textarea>

               
				<div id="the-count">
					<span id="current">0</span>
					<span id="maximum">/ 250</span>
				 </div>
				  
                </div>
				
                </div>
				<br>	<br>
		
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	12
      </div>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Brief Business/ Financial  Justification for Capex</label>
				<div class="col-sm-12 pull-right table-responsive">
				 <table id="exampletest" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                       
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
		<?php $view_item= $this->method_call->qcs_items_capex($capex_id);
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
 
		 </table>
				  
                </div>
                </div>
				<input type="hidden" name="dft_grand_total" id="dft_grand_total" value="<?php echo  $total_final_ammount1; ?>" readonly class="form-control" >

				<br>
	
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	13
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Source/ Supplier/ Agency</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_supllier" style="background-color:#E6F2FF" value="<?php echo $capex_row->cap_sel_supplier; ?>" readonly class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	14
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Credibility Check</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_credibility_check" value="<?php echo $capex_row->credibility_check; ?>" data-toggle="tooltip" data-placement="top" title="Do we have prior experience of this source? If so, how was it? Is this a Catalog/ standard item? If it is a new source and a designed item/ system then have we done any reference checks? If so, what is the feedback?" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	15
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Quantum (Total Amount) of Capex</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_quan_total_amt" style="background-color:#E6F2FF" readonly value= "<?php echo $capex_row->quant_capex; ?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	16
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Basis of Price</label>
				<div class="col-sm-7 pull-right">
                 
                 	 <select class="form-control" required name="dft_cap_basis_price">  
				<option value="<?php echo $capex_row->basis_price; ?>" ><?php echo $capex_row->basis_price; ?></option>
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
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Payment Terms</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_pay_term" style="background-color:#E6F2FF"  readonly value ="<?php echo $capex_row->pay_term; ?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	18
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Any warranties/ Guarantees</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_warranty" style="background-color:#E6F2FF" readonly value ="<?php echo $capex_row->warranties_capex; ?>"  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
19
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Any Bank Guarantees Involved</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_bank_gurantee" value ="<?php echo $capex_row->bank_guarantees; ?>" required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		20
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Any penalties involved for failure on delivery or performance</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_penalties_involved" value ="<?php echo $capex_row->delivery_peformace; ?>" required  class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		21
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Specific exclusions and inclusions in the scope of supply</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_specfic_exclusion" required value ="<?php echo $capex_row->scope_supply; ?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
					<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		22
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Any other special/ noteworthy terms or condition</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_noteworthy_cond" required value ="<?php echo $capex_row->noteworthy_capex; ?>" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		23
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Any Technical Aspect to be highlighted</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_cap_tech_asp" value="<?php echo $capex_row->technical_aspect; ?>" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
                </div>
                </div>
				
				<br>
				
				<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
		24
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">Estimated Associated or Consequential Costs- that is, cost to company to make the capex actually productive</label>
				<div class="col-sm-7 pull-right">
                 
                  <input type="text" name="dft_estimated_associated" value="<?php echo $capex_row->estimated_associated; ?>" required data-toggle="tooltip" data-placement="top" title="What would be technically useful life for the investment? Also specifically mention those aspects that will be new to us either in terms of design or during operations or for servicing requirements" class="form-control" >

               
				  
                </div>
                </div>
				
				
							<div class="row invoice-info">
			  
			 <div class="col-sm-1">
     
	 </div> 
	 <div class="col-sm-1 invoice-col" style="color:#3482AE">
	25
      </div>
			   <label class="col-sm-3 pull-left control-label" style="color:#3482AE">ROI Attachment</label>
				<div class="col-sm-7 pull-right">
				
				 <input type="file" name="capex_attachment"   class="form-control" >
             <input type="hidden" name="capex_attac_flag" value="<?php echo $capex_row->capex_attachment; ?>"   class="form-control" >
                     
                  <div class="col-sm-5">
        <b><a style="color: #337ab7;" href="<?php echo base_url()."uploads/capex_attachment/". $capex_row->capex_attachment ?>"> <?php echo $capex_row->capex_attachment ?></a> </b>
              </div>

                </div>
                </div>
				
				<br>
				
				   
			
				
				<br>

			</div>
			</div>
			
	<!-- end-->
<!-- Asset code -->
			
			
			 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title" style="color:#3482AE">3 . Asset Code Creation </h3>
				

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
		
							<?php $view_item = $this->method_call->qcs_items_assetcode_new($capex_id);
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
			<td class="glyphicon glyphicon-edit" style="color:red;" onclick="assetCodeUpdate_data('<?php echo $row_asset->asset_id;?>','<?php echo $row_asset->cost_center;?>','<?php echo $row_asset->asset_grp;?>','<?php echo $row_asset->q_item_code;?>','<?php $varassetDesc = $row_asset->q_item_description; echo htmlspecialchars($varassetDesc); ?>')" data-toggle="modal" data-target="#assetc_up_Modal"href="#assetc_up_Modal<?php echo $row_asset->asset_id;?>"><?php echo $row_asset->asset_id; ?></td>
			<td><?php echo $row_asset->cap_unit; ?></td>
				
			<td style="display:none"><?php echo $row_asset->capex_id; ?></td>
			
			 <td  ><?php echo $row_asset->q_item_code; ?></td> 
			<td>  <?php echo $row_asset->q_item_description; ?></td>  
			   <td> <?php echo $row_asset->q_uom; ?></td> 
            <td> <?php echo $row_asset->q_req_quantity; ?></td>  
			
          
            <td>  <?php echo $row_asset->cost_center; ?>   </td>  
			
			
            <td><?php echo $row_asset->asset_grp; ?>  </td>  
           
         
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
		
	
		 </tbody>
		
		 </table>
		
			 </div>
			   
			  
			     <div class="form-group col-sm-12">
				<div class="col-sm-4">
				</div>
				
				<div class="col-sm-3">
				<?php
				$getResult=$view_item->num_rows();
				//echo "It is an result".$getResult;
				if($getResult == ""){
					//echo "in the if condition -" . $getResult;
					?>
				
				 <button type="button"   class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);" data-toggle="modal" data-target="#costCenter_up_Modal">ADD ASSET CODE </button>
			 <?php  }
			 else{
				// echo "in the else condition -" . $getResult;
				 ?>
			 <button type="button" disabled class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD ASSET CODE  </button>
			 
			 <?php
			 }
			 
			 ?>
			   </div>
			    
			  <div class="col-sm-4">
				</div>
				
			   </div>
			   </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
            </div>
			
			
			
</div>
<!--end -->


			<!-- 4. Item Code Updation -->
			
			
			 <div class="box-header with-border">
					   <div class="box box-default collapsed-box">
					   <div class="box-header with-border">
             <h3 class="box-title" style="color:#3482AE">4. Item Code Updation</h3>

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
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
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
				
                                    <?php $view_item= $this->method_call->qcs_items_capex($capex_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>

               
				
			<tr>
				
				 <!--<td class="glyphicon glyphicon-edit" style="color:red;" onclick="itemCodeUpdate_data('<?php echo $rowitem->qcs_item_id;?>','<?php echo $rowitem->q_item_code;?>','<?php $varItemDesc = $rowitem->q_item_description; echo htmlspecialchars($varItemDesc); ?>')" data-toggle="modal" data-target="#itemc_up_Modal"href="#itemc_up_Modal<?php echo $rowitem->pr_id?>"><?php echo $rowitem->qcs_item_id; ?></td>-->
				 <td class="glyphicon glyphicon-edit" style="color:red;" onclick="itemCodeUpdate_data('<?php echo $rowitem->qcs_item_id;?>','<?php echo $rowitem->q_item_code;?>','<?php $varItemDesc = $rowitem->q_item_description; echo htmlspecialchars($varItemDesc); ?>')" data-toggle="modal" data-target="#itemc_up_Modal"href="#itemc_up_Modal<?php echo $rowitem->pr_id?>"><?php echo $rowitem->qcs_item_id; ?></td>
				
				
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




		


				
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Action</label>
				<div class="input-group  col-sm-6">
                 
                                        <input type="radio" name="capex_state"  value="capex_draft" required > Save AS Draft</input> 
			   &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
              <?php if ( $disableFlag == "True"){
				echo "Please fill-up asset list..";
			}else{ ?>
				 <input type="radio" name="capex_state" value="submitted_to_app1"> Submit For Approval</input>

			<?php }
			 ?>

         
                </div>
                </div>
				
				<div class="form-group col-sm-12">
			  
			 <label class="pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Justification for Capex Approval</label>
				<div class="input-group  col-sm-6">
                 
                                        <textarea class="form-control"  value ="" maxlength="250" rows="4" cols="50" name="justification_capex" > <?php echo $capex_row->justification_capex; ?></textarea>

                    <div id="the-count1">
					<span id="current1">0</span>
					<span id="maximum1">/ 250</span>
				 </div>
         
                </div>
                </div>

            </div>
			

			
</div>
<!--end -->
	

	<!-- body close -->
<!-- footer start -->	

<?php $eid_owner= $this->method_call->fetchemp_email($capex_row->capex_approval1); ?>
  <input type="hidden" name="approval1_emp_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>

  
  
 <input type="hidden" name="capx_owner_nm" class="form-control"  readonly value="<?php echo $emp_name; ?> "  required>   

				
<div class="box-footer">
					  <div class="form-group col-sm-12">
			  <div class="col-sm-3">
			  
				</div>

	
<div class="col-sm-1">
<img src="<?php echo base_url(); ?>assets/images/ilogo.png" style="height:30px;" data-toggle="tooltip" data-placement="top" title="Capital GL code Or Revenue GL Code Amount Should not gretter than QCS GrandTotal">
		
</div>		
<div class="col-sm-2">

<button type="submit"  id="btnDraftSubmit" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35); text-transform: uppercase;">Proceed</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/capex/capex_menu') ?>" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Cancel</a></div>
				
				
				<div class="col-sm-4 ">
				</div>
				
                </div>
					
	</div>				 
		
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
				<label class="col-sm-1 pull-left control-label" style="color:#3482AE">1</label>
                  <label class="col-sm-5 pull-left control-label" style="color:#3482AE">PR No </label>
	<div class="input-group  col-sm-6">
	
	<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF" readonly value=" <?php echo $capex_row->pr_id;  ?> "  required>     
					  
	   </div>
				</div>
		
		 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">2</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">PR Owner nm</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_owner_name" class="form-control" style="background-color:#E6F2FF"  readonly value="<?php echo $capex_row->pr_owner_name;  ?>" required>  
						
                </div>
                </div>
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">3</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Plant</label>
				<div class="input-group  col-sm-6">
				<input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF" readonly value="<?php echo $capex_row->plant_code; ?>" required>  
						
                </div>
                </div>
 
 			 <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">4</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Department</label>
				<div class="input-group  col-sm-6">
				<?php $dept_nm= $this->method_call->fetch_dept_nm($capex_row->dept_id); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
						
                </div>
                </div>
				
				
	  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">5</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">PR Type</label>
				<div class="input-group  col-sm-6">
			<?php $pt_name= $this->method_call->fetch_prtype_nm($capex_row->pr_type); ?>
						   <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php print_r($pt_name['pt_name']); ?>"  required>
                </div>
                </div>
		
		
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">6</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">PR Date</label>
				<div class="input-group  col-sm-6">
			  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF" readonly value="<?php echo $capex_row->pr_date; ?>"  required>
                </div>
                </div>
				
				
		   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">7</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Requirement Details</label>
				<div class="input-group  col-sm-6 pull-right">
					
                </div>
			  </div>	
			  
			  
			  			  <div class="table-responsive" style="width:100%;">
						  <table id="exam" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
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
				  <?php $item= $this->method_call->list_pr_items($capex_id);
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
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Cumulative Total Amount of PR <?php echo $capex_row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>	 	 
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE">8</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $capex_row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">9</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $capex_row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">10</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->budget_consider;  ?>

         
                </div>
                </div>
				
				   <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">11</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Ion No</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->ion_no;  ?>

         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">12</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Customer Cost Upfront</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->cust_cost_upfront;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">13</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Customer Cost Amortization</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->cust_cost_amortization;  ?>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">14</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Own Investment</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $capex_row->own_investment;  ?>

         
                </div>
                </div>
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE">15</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
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

<div class="modal-dialog" role="document" style="width:600px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Item Code </h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

		
  <form id="itemDetails" name="itemDetails" action="<?php echo site_url('purchase/capex/updateItemCodeEdit'); ?>" method="post">
            <div class="row">
			
			
			 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">1</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">Item Code</label>
				<div class="input-group  col-sm-6">
             
			 <input type="hidden" name="qcs_item_idEdit" class=" form-control" id="qcs_item_idEdit"   required>
			  <input type="Text" name="itm_codeEdit" class=" form-control" id="itm_codeEdit"   required>

         
                </div>
                </div>
				
				<br><br>
					 <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">2</label>
			   <label class="col-sm-5 pull-left control-label" style="color:#3482AE;text-transform: uppercase;">Item Description</label>
				<div class="input-group  col-sm-6">
             
			
			  <textarea name="qcs_desc_idEdit" style="background-color:#E6F2FF" class=" form-control" id="qcs_desc_idEdit" readonly></textarea>

         
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
   
   
   <!-- cost center model -->

<div class="modal fade" id="costCenter_up_Modal">

<div class="modal-dialog" role="document" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#3482AE">Cost Center </h4>
      </div>
	   <form id="costCenterDetails" name="costCenterDetails" action="<?php echo site_url('purchase/Capex/insertCostCenterDetails'); ?>" method="post">
      <div class="modal-body">
	  
	 
    
			   <div class="box-body table-responsive">
			   <table id="exampletest" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                          
			 
                  <th >Sr. No.</th>
				  <th >Business Area</th>
				  <th style="display:none">Item id</th>
				   <th style="display:none">Capex id</th>
				    <th style="display:none">Qcs id</th>
				   <th >Item Code</th>
				   
				 
				   <th >Item Descriptions</th>
				   <th >UOM</th>
				    <th >Qty.</th>
					<th>Cost Centre</th>
					<th>Asset Group </th>
				
      </tr>
	
                </thead>
		<tbody>
		
	<?php $view_item= $this->method_call->qcs_items_capex($capex_id);
				  	$final_rate=0; 
					$total_final_ammount1=0;
									

 if($view_item!=null){
	$sr_no=1;			  
foreach ($view_item->result() as $rowitem)  
         {  ?>
		 <!-- item code -->
	
		
				
		<tr> 
			
				 
			<td  ><?php echo $sr_no; ?> </td>
			<td><?php echo $q_row->plant_code; ?></td>
				<td style="display:none"><input type="text" name="draft_txt_qcs_itm[]" value="<?php echo $rowitem->qcs_item_id; ?>"  class="form-control" ></td>
			<td style="display:none"><input type="text" name="txtCapexId[]" value="<?php echo $capex_row->capex_id; ?>"></td>
			<td style="display:none"><input type="text" name="txtQcsId[]" value="<?php echo $q_row->qcs_id;; ?>"></td>
			 <td  ><?php echo $rowitem->q_item_code; ?></td> 
			<td>  <?php echo $rowitem->q_item_description; ?></td>  
			   <td> <?php echo $rowitem->q_uom; ?></td> 
            <td> <?php echo $rowitem->q_req_quantity; ?></td>  
			
          
            <td>  <input type="text" name="draft_txt_cost_cent[]" value=""  class="form-control" >  </td>  
			
			
            <td> <select class="form-control" required name="draft_txt_asset_grp[]">
						
							
							  <?php $assetgrp= $this->method_call->asset_grp();
							if($assetgrp!=null){
										foreach ($assetgrp->result() as $row_asset)  
						{  ?>
			
			<option value="<?php echo $row_asset->asset_group; ?>"><?php echo $row_asset->asset_group;  ?></option>
			
	<?php }
				}
					?>
							 </select> </td>  
           
         
      </tr>
		

		 <?php  $sr_no++; }
 } ?>
                
				
				
	
		 </tbody>
		
		 </table>
		 </br>
		 <div class="col-sm-12">
		 <div class="col-sm-5">
		 </div>
				<div class="col-sm-2"><button type="submit" name="save" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Add</button></div>
				
				<div class="col-sm-5"></div>
		</div>
			 </div>
			 
  </div>
  </form>
  </div>
  </div>
   </div>
   </div>
   
   
   <!-- Asset  code update model -->

<div class="modal fade displaycontent" id="assetc_up_Modal">

<div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3482AE">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" style="color:#FFFFFF; font-family:'exo'; text-transform: uppercase;"">Asset Code </h4>
      </div>
      <div class="modal-body">
     <section class="module pt-10" id="contact" >
          <div class="container" style="width: auto;">
          <div class="container" style="width: auto;">
            <br>

  <form id="itemDetails" name="itemDetails" action="<?php echo site_url('purchase/capex/updateAssetCodeEdit'); ?>" method="post">
            <div class="row">
				 <input type="hidden" name="asset_codeEdit" class=" form-control" id="asset_codeEdit"   required>
				 
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">Item Code </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="assetItemCode" id="assetItemCode" value="" style="background-color:#E6F2FF" readonly class="form-control"  required>                          
    
         
                </div>
                </div>
				
				 <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">Item Description </label>
				<div class="input-group  col-sm-6">
                 
                 <input type="text" name="assetItemDesc" id="assetItemDesc" style="background-color:#E6F2FF" readonly class="form-control"  required>                          
    
         
                </div>
                </div>
			
			 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">3</label>
			   <label class="col-sm-4 pull-left control-label"  style="color:#3482AE; text-transform: uppercase;"">Cost Center</label>
				<div class="input-group  col-sm-6">
             
		
			  <input type="Text" name="costCenterEdit" class=" form-control" id="costCenterEdit"   required>

         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;"">Asset Group</label>
				<div class="input-group  col-sm-6">
				
				<select class="form-control" required name="assetGrpEdit" id="assetGrpEdit">
				
						<?php $assetgrp= $this->method_call->asset_grp();
							if($assetgrp!=null){
										foreach ($assetgrp->result() as $row_asset)  
						{  ?>
			
							<option value="<?php echo $row_asset->asset_group; ?>"><?php echo $row_asset->asset_group;  ?></option>
			
	<?php }
				}
					?>
							 </select>
		
                </div>
                </div>
				
				
				<br><br><br>
				
				 <div class="form-group col-sm-12">
			 <div class="col-sm-4">
			 </div>
				
<div class="col-sm-4"><button type="submit" name="save"  class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">UPDATE</button></div>

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
	  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE ; text-transform: uppercase;">QCS No :</label>
				<div class="input-group  col-sm-6">
              <?php echo $capex_row->qcs_id; ?>
                </div>
                </div> 
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE ; text-transform: uppercase;">QCS Owner :</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $capex_row->qcs_owner; ?>
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">3</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">QCS Date/Time:</label>
				<div class="input-group  col-sm-6">
               <?php echo $capex_row->qcs_date; ?>
                </div>
                </div> 
				
					<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Selected Supplier :</label>
				<div class="input-group  col-sm-6">
                 
				<?php echo $capex_row->selected_supplier; ?>	
    
                </div>
                </div>
				<br><br>
					<div class="form-group col-sm-4">
			  
			 <label class="col-sm-1 pull-left control-label" style="color:#3482AE ;text-transform: uppercase;">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE; text-transform: uppercase;">Justification for Selection of Supplier :</label>
				<div class="input-group  col-sm-6">
                 
                              
         <?php echo $capex_row->justification_supplier; ?>

         
                </div>
                </div>
				</div></div></div>
				
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
									; border-color:#3482AE;text-align: center; width:100%;box-shadow: 8px 5px 5px 5px rgba(46,61,73,0.15);">
					<thead style="text-align: center;" >
						<tr style="background-color:#3482AE;color:#FFFFFF; text-transform: uppercase;">
            
			 
			 
         
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="4" ><center> 1. <?php echo $capex_row-> sup1_nm; ?>  <center></th>
			
				
				 <th colspan="4" > <center>2. <?php echo $capex_row-> sup2_nm; ?>  <center></th>
				 <th colspan="4" > <center>3. <?php echo $capex_row-> sup3_nm; ?>   <center></th>
				

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

									
				  <?php $view_item= $this->method_call->qcs_items_capex($capex_id);
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
	</div></div></div>	
		  
<!-- end -->	

   <!-- Technical specification --> 
  
              <!-- /.box-tools -->
			  
			  
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
				 <td colspan="6" style="text-align:right;">Technical Specification</td>
				 <td colspan="3" ><b> <center>Selected Supplier   :&nbsp;&nbsp; <?php echo $capex_row->sup1_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 2  :&nbsp;&nbsp;<?php echo $capex_row->sup2_nm; ?><center></b> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"><b><center>Supplier 3  :&nbsp;&nbsp;<?php echo $capex_row->sup3_nm; ?><center></b> </td>
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
	  
	   <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 14 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">Supplier Mobile NO</td>
				 <td colspan="3"  > <?php echo $capex_row->sup1_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				   <td colspan="3"  >  <?php echo $capex_row->sup2_contact_no; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->sup3_contact_no; ?> </td>
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
				 <td colspan="6"style="text-align:right;">Supplier Contact Person</td>
				 <td colspan="3"  > <?php echo $capex_row->sup1_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				    <td colspan="3"  >  <?php echo $capex_row->sup2_contact_person; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->sup3_contact_person; ?> </td>
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
				 <td colspan="6"style="text-align:right;">Supplier EmailID</td>
				 <td colspan="3"  > <?php echo $capex_row->sup1_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				   <td colspan="3"  >  <?php echo $capex_row->sup2_eid; ?> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <?php echo $capex_row->sup3_eid; ?> </td>
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
function itemCodeUpdate_data(qcs_item_id,q_item_code,q_item_description) {
 // alert("pr_id..... "+qcs_item_id);
  // alert("q_item_code..... "+q_item_code);
	
	document.getElementById("qcs_item_idEdit").value = qcs_item_id;
	document.getElementById("itm_codeEdit").value = q_item_code;
	document.getElementById("qcs_desc_idEdit").value = q_item_description;
	
	
}
</script>


<script>
	function assetCodeUpdate_data(asset_id,cost_center,asset_grp,q_item_code,q_item_description){
		
		document.getElementById("asset_codeEdit").value =asset_id;
		document.getElementById("costCenterEdit").value =cost_center;
		document.getElementById("assetGrpEdit").value=asset_grp;
		document.getElementById("assetItemCode").value =q_item_code;
		document.getElementById("assetItemDesc").value =q_item_description;
		
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

	<script>

$('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current1'),
      maximum = $('#maximum1'),
      theCount = $('#the-count1');
    
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

  </body>
</html>