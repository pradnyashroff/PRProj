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
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Employee Details
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('purchase/PR/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">  Employee Details
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
          <div class="box box-info">

            <!-- /.box-header -->
            <!-- form start -->
	  <?php $emp_detail= $this->method_call->emp_detail_fetch($emp_code);
	  if($emp_detail != null){
		  foreach($emp_detail->result() as $row){
			  ?>
		

 <form method="post" id="form" action="<?php echo site_url('purchase/PR/emp_profile_update') ?>" enctype='multipart/form-data'>

              <div class="box-body">
			  
			  
			   <div class="form-group col-sm-12">
			    <div class="col-sm-4">
				</div>
			     <div class="col-sm-4">
	   
		
     <img src ="<?php echo base_url()."uploads/profile_attachment/". $row->profile_attachment ?>"style="height:130px;width:150px;border-radius: 50%;"></img>
		 
	<!--<img src ="<?php echo base_url();?>uploads/profile_attachment/admin.png"style="height:130px;width:150px;border-radius: 50%;"></img>-->
        
		
      </div>
	  
	   <div class="col-sm-4">
	   </div>
			   
			 
			  </div>
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
               <input type="text" value=" <?php echo $row->plant_code;  ?>" readonly name="plant_code" required class="form-control" >

                </div>
			  </div>
			  
		
			  

  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Employee Name</label>
				<div class="col-sm-5 pull-right">
                
                  <input type="text" value=" <?php echo $row->emp_name;  ?>" name="emp_name" class="form-control" required readonly>

                </div>
			  </div>

             


			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Employee Designation</label>
				<div class="col-sm-5 pull-right">
                

				    <input type="text" value=" <?php echo $row->emp_designation;  ?>" name="emp_designation" readonly class="form-control" required>
 
                </div>
			  </div>
			  
 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Employee Department</label>
				<div class="col-sm-5 pull-right">
                
				
				<input type="hidden" value="<?php echo $row->emp_dept;  ?>" name="emp_dept" readonly class="form-control" required>
				
				 
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->emp_dept); ?>
  <input type="text" value="<?php print_r($dept_nm['dept_name']); ?>" readonly  class="form-control"  required>
  

				  
 
                </div>
			  </div>
<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Employee Email</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value=" <?php echo $row->emp_email;  ?>"  name="emp_email" readonly required class="form-control" >

				  
 
                </div>
			  </div>


			<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Employee Mobile</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value=" <?php echo $row->emp_mobile;  ?>"  name="emp_mobile" readonly required class="form-control" >

				  
 
                </div>
			  </div>

<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Employee DH ID</label>
				<div class="col-sm-5 pull-right">
                
          <input type="text" value=" <?php echo $row->pr_dh_id;  ?>"  name="pr_dh_id"readonly required class="form-control" >
  
				  
 
                </div>
			  </div>
			  
			  
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Profile Pic Attachments </label>
					<div class="col-sm-5 pull-right">
                <input type="file"  name="profile_attachment"  class="form-control">
    
                </div>
                </div>
    
              </div>
			    
              <!-- /.box-body -->
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
		
			   <button type="submit" class="btn  "  id="btn_submit" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Update</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('purchase/PR/index') ?>" class="btn   pull-right" style="width: 100%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div>
              <!-- /.box-footer -->

          </div>

        </div>
        <!--/.col () -->
		<div class="col-md-1">
</div>


      </div>
	  <?php 
	    }
	  }?>
      <!-- /.row -->
    </section>
	  	   <?php include_once 'scripts.php'; ?>

  
  

  </body>
</html>

<script type='text/javascript'>
$('#btn_submit').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Employee Profile Update",
        text: "You will not be able to Edit this Profile!",
        type: "success",
        showCancelButton: true, 
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("updated!", "Profile Update Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}	
});
</script>