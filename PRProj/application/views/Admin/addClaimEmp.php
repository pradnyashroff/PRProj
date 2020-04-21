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
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add an Employee
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Admin/Admin/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">  Add an Employee
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
		

<?php echo form_open_multipart('Admin/Admin/claimAddEmployee'); ?>

              <div class="box-body">
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Employee Code </label>
				<div class="col-sm-5 pull-right">
               
				<input type="text" value=""  name="emp_code" required class="form-control" >

                </div>
			  </div>
			  
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Reporting Authority </label>
				<div class="col-sm-5 pull-right">
               
				<input type="text" value=""  name="repAutho" required class="form-control" >

                </div>
			  </div>
			 

			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Reporting Level</label>
				<div class="col-sm-5 pull-right">
                 <select class="form-control" required name="repLevel">
							 <option value="" >Reporting Level</option>
							 <option value="1" >1</option>
							 <option value="2" >2</option>
							
				</select>
				
                </div>
			  </div>
	

			<input type="hidden" value="2050-01-01"  name="repToDate" required class="form-control" >
          <input type="hidden" value="1"  name="repStatus" required class="form-control" >
        
              </div>
			  
			  
			  
			   
		
			  
			  
			  
			  
			  
			  
              <!-- /.box-body -->
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Submit</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('Admin/index') ?>" class="btn  bg-skincolor pull-right" style="border: 1px solid orange;width: 100%; ">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div>
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