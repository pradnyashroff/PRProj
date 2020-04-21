 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add New Employee</title>
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
 <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
 <?php include_once 'headsidelist.php'; ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
       Add an Employee
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/ats_menu') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
		<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  Add an Employee
		</li>
		</li>
      </ol>
	</section>

    <!-- Main content -->
       <section class="content">
			 <div class="wrapper">
			<div class="box-body">
      <div class="row" >
	   
<?php echo form_open_multipart('ATS/Ats/add_employee'); ?>
				<div class="col-sm-12" style="margin-top:3%;"></div>
				<div class="col-sm-12" style="margin-top:1%;margin-left:1%; margin-bottom:1%;"><h3>Employee Details</h3></div>
			   <div class="form-group col-sm-6">
					<label class="col-sm-1 pull-left control-label">1</label>
					<label class="col-sm-4 pull-left control-label">Plant </label>
					<div class="input-group  col-sm-6">
						<select name="plant_id" class="form-control" required>
							<option value="">Select Plant</option>
							<?php $plant= $this->method_call->listplant(); //displaying lead
								if($plant!=null){ 
								foreach ($plant->result() as $rowfile)  
								{  
							?>
			                <option value="<?php echo $rowfile->plant_id; ?>"><?php echo $rowfile->plant_name; ?></option>
							<?php }
							}?>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-1 pull-left control-label">2</label>
					<label class="col-sm-4 pull-left control-label">Employee Name </label>
					<div class="input-group  col-sm-6">
						<input type="text" value=""  name="emp_name" required class="form-control" >
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-1 pull-left control-label">3</label>
					<label class="col-sm-4 pull-left control-label">Username </label>
					<div class="input-group  col-sm-6">
						<input type="email" name="user_name" class="form-control" required>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-1 pull-left control-label">4</label>
					<label class="col-sm-4 pull-left control-label">Password </label>
					<div class="input-group  col-sm-6">
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-1 pull-left control-label">5</label>
					<label class="col-sm-4 pull-left control-label">Select group </label>
					<div class="input-group  col-sm-6">
						<select name="plant_group" class="form-control" required>
							<option value="">Select Group</option>
							<option value="1">sub-admin</option>
							<option value="2">Employee</option>
						</select>
					</div>
				</div>
				
				
				
				<div class="col-sm-12">
					<div class="col-sm-4"></div>
					<div class="col-sm-2">
						<button type="submit" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase; width:100%;">Submit</button>
					</div>
					<div class="col-sm-2">
						<a href="<?php echo site_url('ATS/index') ?>" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase; width:100%; ">Cancel</a>
					</div>
					<div class="col-sm-4"></div>
				</div>
				
			<!--
			  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Plant</label>
				<div class="col-sm-5 pull-right">
                  
                  <select name="plant_id" class="form-control" required>
				   <option value="">Select Plant</option>
				  <?php $plant= $this->method_call->listplant(); //displaying lead
 if($plant!=null){ 
  foreach ($plant->result() as $rowfile)  
         {  
 ?>
			                      <option value="<?php echo $rowfile->plant_id; ?>"><?php echo $rowfile->plant_name; ?></option>

		 <?php }
 } ?>

                   
              
                  </select>
                
               
                </div>
			  </div>
			  
			  
			  
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Employee Name </label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value=""  name="emp_name" required class="form-control" >

                </div>
			  </div>
			  
			  

  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Username</label>
				<div class="col-sm-5 pull-right">
                
                  <input type="email" name="user_name" class="form-control" required>

                </div>
			  </div>

             


			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Select group</label>
				<div class="col-sm-5 pull-right">
                
            <select name="plant_group" class="form-control" required>
				   <option value="">Select Group</option>
				 <option value="1">sub-admin</option>
				 <option value="2">Employee</option>

                  </select>
				  
 
                </div>
			  </div>


			



				
             <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Password</label>
				<div class="col-sm-5 pull-right">
                
                  <input type="password" name="password" class="form-control" required>

                </div>
			  </div>
        

			  		
								
        
								
        
							
        
								
        
								
	
			  
              </div>
			  
			  
			  
			   
		
			  
			  
			  
			  
			  
			  
             .box-body
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Submit</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('ATS/index') ?>" class="btn  bg-skincolor pull-right" style="border: 1px solid orange;width: 100%; ">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div> -->
              <!-- /.box-footer -->
  <?php echo form_close(); ?>
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