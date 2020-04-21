 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee Details</title>
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
      <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;margin-left:8%;">
      Employee Details
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('Admin/Admin/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  Employee Details
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
      <div class="row" >
	          <div class="col-md-1">
</div>
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box">

            <!-- /.box-header -->
            <!-- form start -->
		 <?php  
				 
				   if($emp_detail!=null){
         foreach ($emp_detail->result() as $row)  
         {  
		 ?>

<?php echo form_open_multipart('Admin/Admin/update_employee'); ?>

              <div class="box-body">
			  
		 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Employee Code </label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value="<?php echo $row->emp_code;?>" readonly name="emp_code" required class="form-control" >

                </div>
			  </div>
			     <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Plant Code</label>
				<div class="col-sm-5 pull-right">
                <select class="form-control" required name="plant_code">
							 <option value="<?php echo $row->plant_code;?>" ><?php echo $row->plant_code;?></option>
							
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
	 foreach ($plantlist->result() as $row2)  
         {  ?>
			
			<option value="<?php echo $row2->plant_code; ?>"><?php echo $row2->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>

                </div>
			  </div>
			  
		
			  

  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Employee Name</label>
				<div class="col-sm-5 pull-right">
                
                  <input type="text" value="<?php echo $row->emp_name;  ?>" name="emp_name" class="form-control" required>

                </div>
			  </div>

             


			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Employee Designation</label>
				<div class="col-sm-5 pull-right">
                 <select class="form-control" required name="emp_designation">
							 <option value="<?php echo $row->emp_designation;  ?>" ><?php echo $row->emp_designation;  ?></option>
							 <option value="ASSISTANT" >ASSISTANT</option>
							 <option value="ASST MANAGER" >ASST MANAGER</option>
							 <option value="DGM" >DGM</option>
							 <option value="ENGINEER" >ENGINEER</option>
							 <option value="GM" >GM</option>
							 <option value="MANAGER" >MANAGER</option>
							 <option value="OFFICER" >OFFICER</option>
							 <option value="SR OFFICER" >SR OFFICER</option>

							 <option value="SR ENGINEER" >SR ENGINEER</option>
							 <option value="SR MANAGER" >SR MANAGER</option>
							 <option value="SUPERVISOR" >SUPERVISOR</option>
							 <option value="TRAINEE" >TRAINEE</option>

				</select>
				

				  
 
                </div>
			  </div>
			  
 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Employee Department</label>
				<div class="col-sm-5 pull-right">
                
				  <select class="form-control" required name="emp_dept">
							 <option value="<?php echo $row->emp_dept;  ?>" >	<?php $dept_nm= $this->method_call->fetch_dept_nm($row->emp_dept); ?>
			<?php print_r($dept_nm['dept_name']); ?></option>
							
							  <?php $deptlist= $this->method_call->listdept();
 if($deptlist!=null){
	 foreach ($deptlist->result() as $row3)  
         {  ?>
			
			<option value="<?php echo $row3->dept_code; ?>"><?php echo $row3->dept_name;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				

				  
 
                </div>
			  </div>
<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Employee Email</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->emp_email;  ?>"  name="emp_email" required class="form-control" >

				  
 
                </div>
			  </div>


			<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Employee Mobile</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->emp_mobile;  ?>"  name="emp_mobile" required class="form-control" >

				  
 
                </div>
			  </div>

<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Employee DH ID</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->pr_dh_id;?>"  name="pr_dh_id" required class="form-control" >
  
				  
 
                </div>
			  </div>
			  
			  
			  
			  	<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Employee Grade</label>
				<div class="col-sm-5 pull-right">
                
        
				
    <select class="form-control" required name="edit_emp_grade">
							 <option value="<?php echo $row->grade_id;  ?>" >
							   <?php $grade= $this->method_call->fetch_grade_nm($row->grade_id); ?>
			<?php print_r($grade['grade']); ?></option>
							
							  <?php $deptlist= $this->method_call->listgrade();
 if($deptlist!=null){
	 foreach ($deptlist->result() as $row3)  
         {  ?>
			
			<option value="<?php echo $row3->grade_id; ?>"><?php echo $row3->grade;  ?></option>
			
	<?php }
				}
					?>
							 </select>

                </div>
			  </div>
			  
			  	<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Employee Bank AC No</label>
				<div class="col-sm-5 pull-right">
               
          <input type="text"  name="edit_emp_AcNo" value="<?php echo $row->bank_acc_no;?>"  required class="form-control" >

				  
 
                </div>
			  </div>
			  
			 
			  
			  			<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Employee Bank Branch</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->bank_name;?>"  name="edit_emp_Branchnm" required class="form-control" >

				  
 
                </div>
			  </div>

			<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">12</label>
			   <label class="col-sm-5 pull-left control-label">Employee Bank IFSC No</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->ifsc_no;?>"  name="edit_emp_ifscno" required class="form-control" >

				  
 
                </div>
			  </div>
			  
			  	<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Cash Claim DH ID</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value="<?php echo $row->reporting_autho;?>"  name="edit_emp_claimDhId" required class="form-control" >

				  
 
                </div>
			  </div>

        	  
              </div>
			    
              <!-- /.box-body -->
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%;">Submit</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('ATS/index') ?>" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%;">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div>
              <!-- /.box-footer -->
  <?php echo form_close(); ?>
  
		 <?php }
				   }
				   ?>
          </div>

        </div>
        <!--/.col (right) -->
		<div class="col-md-1">
</div>


      </div>
      <!-- /.row -->
    </section>
	  	   <?php include_once 'scripts.php'; ?>

 
  </body>
</html>