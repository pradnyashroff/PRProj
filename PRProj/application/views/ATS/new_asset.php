 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add New Asset</title>
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
       Add an Asset
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/AssetDashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  Add an Asset
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
		

<?php echo form_open_multipart('ATS/Ats/add_asset'); ?>

              <div class="box-body">
			  
			
			  
			  
			  
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Enter Asset No<span style="color:red"><sup>*</sup></span>
</label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value=""  name="scan_asset_no" maxlength="12"  required class="form-control onlynum" >

                </div>
			  </div>
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Enter Asset Sub No <span style="color:red"><sup>*</sup></span>
</label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value=""  name="scan_asset_subno" required maxlength="4" class="form-control onlynum" >

                </div>
			  </div>
			  
			  

  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Asset Class Description<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                  <select name="asset_class_desc" class="form-control" required>
				   <option value="">Select Class</option>
				<option value="Computer: Hardware">Computer: Hardware</option>
				<option value="CWIP- Factory Equipment">CWIP- Factory Equipment</option>
				<option value="CWIP-Plant & Machinery">CWIP-Plant & Machinery</option>
				<option value="Dies & Fixtures">Dies & Fixtures</option>
				<option value="Factory Equipments">Factory Equipments</option>
				<option value="Furnitures & Fixtures">Furnitures & Fixtures</option>
				<option value="Office Equipments">Office Equipments</option>
				<option value="Plant & Machinery">Plant & Machinery</option>
				<option value="Tools & Tackles">Tools & Tackles</option>
			    <option value="Factory Building">Factory Building</option>


		
                   
              
                  </select>

                </div>
			  </div>

             


			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">GRN Number<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text" name="grn_no" class="form-control" required>

				  
 
                </div>
			  </div>


			
			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Asset Description <span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text" name="asset_spec" class="form-control" required>

				  
 
                </div>
			  </div>


			  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Business Area <span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                  
                  <select name="business_area" class="form-control" required>
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
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Storage Location Code<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text" name="storage_loc" class="form-control" required>

				  
 
                </div>
			  </div>
			  
			  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Capitalization Date<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="date" name="cap_date" class="form-control" required>

				  
 
                </div>
			  </div>
			  
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Capitalization Amount<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text" name="cap_amount" class="form-control" required>

				  
 
                </div>
			  </div>
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">GRN Date<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="date" name="grn_date" class="form-control" required>

				  
 
                </div>
			  </div>
			  
			  
			  
			  
			  
<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Upload Photo</label>
				<div class="col-sm-5 pull-right">
                
                           <input type="file" name="asset_photo" accept="image/x-png,image/gif,image/jpeg" class="form-control" >

				  
 
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
                <a href="<?php echo site_url('ATS/Ats/AssetDashboard') ?>" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%; ">Cancel</a>
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