 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print New Asset</title>
     	   <?php include_once 'styles.php'; ?>
<style>
@font-face {
    font-family: "customfont";
    src: url(https://www.yantrallp.com/ourfonts/IDAutomationHC39M.ttf) format("truetype");
}
 @media print
    {
        .non-printable { display: none; }
        .printable { display: block; }
    }
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
    <section class="content-header non-printable">
     <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;margin-left:8%;">
       Print an Asset
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/AssetDashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  Print an Asset
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content non-printable">
      <div class="row" >
	          <div class="col-md-1">
</div>
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box">

            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body">
			  
			<?php 
			   if($dat!=null){
         foreach ($dat->result() as $row)  
         {  
			  ?>
			  
			   <div class="form-group col-sm-12 ">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Scan Asset No</label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value="<?php echo $row->scan_asset_no; ?>"  name="scan_asset_no"   style="background-color:#E6F2FF;"  readonly class="form-control" >

                </div>
			  </div>
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">2</label>
			   <label class="col-sm-5 pull-left control-label">Scan Asset Sub No</label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value="<?php echo $row->scan_asset_subno; ?>"  name=""   style="background-color:#E6F2FF;"  readonly class="form-control" >

                </div>
			  </div>
			  
			  

  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Asset Class Description</label>
				<div class="col-sm-5 pull-right">
                
                  <input type="text" value="<?php echo $row->asset_class_desc; ?>"  name=""   style="background-color:#E6F2FF;"  readonly class="form-control" >

                </div>
			  </div>

             
 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">GRN Number<span style="color:red"><sup>*</sup></span></label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text"   style="background-color:#E6F2FF;"  readonly value="<?php echo $row->grn_no; ?>" class="form-control" required>

				  
 
                </div>
			  </div>



			
			 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Asset Specification/Capacity/Size </label>
				<div class="col-sm-5 pull-right">
                
                           <input type="text"   style="background-color:#E6F2FF;"  readonly value="<?php echo $row->asset_spec; ?>"  class="form-control" required>

				  
 
                </div>
			  </div>


			  <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Business Area </label>
				<div class="col-sm-5 pull-right">
                   <input type="text"   style="background-color:#E6F2FF;"  readonly value="<?php echo $row->business_area; ?>"  class="form-control" required>

                  
                </div>
			  </div>

 <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Storage Location Code/Vendor Code</label>
				<div class="col-sm-5 pull-right">
                   <input type="text"   style="background-color:#E6F2FF;"  readonly value="<?php echo $row->storage_loc; ?>"  class="form-control" required>

                </div>
			  </div>
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Grn Date</label>
				<div class="col-sm-5 pull-right">
                   <input type="text"  value="<?php $grn=$row->grn_date; 
				   echo $row->grn_date; ?>" name="storage_loc"   style="background-color:#E6F2FF;"  readonly class="form-control" required>

				  
 
                </div>
			  </div>
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Status</label>
				<div class="col-sm-5 pull-right">
								 <?php $st=$row->status;
					  if($st=="1"){ $stats="Active"; }
					  if($st=="2"){ $stats="Obselete"; }
					  if($st=="3"){ $stats="On Lease(to vendor)"; }
					  if($st=="4"){ $stats="Sale"; }
			
			?>
				 <input type="text"   style="background-color:#E6F2FF;"  readonly value="<?php echo $stats; ?>"  class="form-control" required>

                </div>
			  </div>
<div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Photo</label>
				<div class="col-sm-5 pull-right">
				<?php if($row->file_stat=="1"){ ?>
				<a href="<?php echo base_url(); ?>uploads/<?php echo $row->file_name; ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $row->file_name; ?>" style="height:100;width:200px"></img></a>
				<?php } else { ?>
				
                                   <input type="text"   style="background-color:#E6F2FF;"  readonly value="NA"  class="form-control" required>

				<?php } ?>
 
                </div>
			  </div>
		       
			  <div class="form-group col-sm-12 barcode" style="padding-top:5%">
			  
			  <label class="col-sm-2 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Barcode</label>
				<div class="col-sm-5 pull-right">

<span style="font-family: 'customfont'; font-size:20px; font-weight:100;">*<?php $bar= $row->barcode; echo $row->barcode; ?>*</span>
				  
 <br><br><br><br>
                </div>
			  </div>
			  <div class="row invoice-info non-printable" style="padding-top:5%">

	  <div class="col-sm-1 invoice-col">

      </div>
      <!-- /.col -->
      <div class="col-sm-10 invoice-col">
         <div class="table-responsive" style="width:100%;">
          <table class="table table">
             <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
              <th >Previous Location</th>
              <th >New Location</th>
			                <th >GRN Date</th>

              <th >Shifting Date</th>
              
            </tr>
			<?php $staa= $this->method_call->get_asset_history($row->aid);
 if($staa!=null){
	 
	 foreach ($staa->result() as $row2) {
		 ?>
			<tr>
              <td ><?php echo $row2->privious_loc ?></td>
              <td ><?php echo $row2->new_loc ?></td>
			                <td ><?php echo $grn; ?></td>

              <td ><?php echo $row2->doe ?></td>
              
            </tr>
		 <?php } }  ?>
          </table>
        </div>
              </div>	
 <div class="col-sm-1 invoice-col">

      </div>			  
    </div>
		 <?php }
			   }
		 ?>
              </div>
			  
              <!-- /.box-body -->
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="button" onclick="myFunction()" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%;">Print</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('ATS/Ats/AssetDashboard') ?>" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;width: 100%; ">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div>
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
		<div class="col-md-1">
</div>


      </div>
      <!-- /.row -->
    </section>
<div id="barcode" style="margin-left:9%;">
    
    <span  style="font-family: 'customfont'; background-color:white;font-size:30px; font-weight:40;">*<?php $bar= $row->barcode; echo $row->barcode; ?>*</span><br><br><?php echo $row->asset_spec;?>
	
	
	
<!--	<span  style="font-family: 'idauto'"><label style="font-size:30px">*<?php $bar= $row->barcode; echo $row->barcode; ?>*</label></span><br><br><br><label style="font-size:15px;width:250px; word-wrap:break-word;"><?php echo $row->asset_spec;?></label>-->
</div>

	  	   <?php include_once 'scripts.php'; ?>

 <script>
function myFunction() {
            $("#barcode").show();
    window.print();
}


</script>
  </body>
</html>