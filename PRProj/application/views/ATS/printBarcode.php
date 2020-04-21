 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
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

@media print{
   .noprint{
       display:none;
   }
} 
</style>

</head>
<body class="hold-transition" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Print Asset
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('ATS/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">  Print Asset
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
<div class="noprint">
      <div class="row" >
	          <div class="col-md-1">
</div>
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box">

            <!-- /.box-header -->
            <!-- form start -->
		
<div id="pradnyaJiShroff">

<form method="post" id="" name="" action="<?php echo site_url('ATS/Ats/printBarcodeNO') ?>" >


              <div class="box-body">
			  
			
			  
			  
			  
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">1</label>
			   <label class="col-sm-5 pull-left control-label">Enter Asset SR No<span style="color:red"><sup>*</sup></span>
</label>
				<div class="col-sm-5 pull-right">
               
 <input type="text" value="" name="txtSrNo"  required class="form-control" >

                </div>
			  </div>
			 
			  
              </div>
			  
              <!-- /.box-body -->
              <div class="box-footer">
			    <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" class="btn  bg-skincolor "  style="border: 1px solid orange;width: 100%;">Submit</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('ATS/index') ?>" class="btn  bg-skincolor pull-right" style="border: 1px solid orange;width: 100%; ">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
              </div>
              <!-- /.box-footer -->
</form>
         </div>
        
        <!--/.col (right) -->
        
			  </div>
            </div>
                         
       
        </div>   
        </div>
        </br>
        </br>
         <div class="">
             
<?php
if (isset($result_display)) {
    

if ($result_display == 'No record found !') {
echo $result_display;
} else {
    

foreach ($result_display as $value) {
 echo '<div class="toPrint">';
echo '<p>'  . '<span style="font-family: idauto; font-size:30px; font-weight:100; ">* ' . $value-> barcode . ' *</span>'.'</br></br> ' . $value->asset_spec .' <p/>';
echo '</div>';
echo '<button type="button" id="clickBtn" class="nonprint btn  bg-skincolor pull-left" style="border: 1px solid orange;width: 30%; " onclick="pradnyaShroff()">Print Barcode</button>';


}

}


}

?>    


                      </div>   
             
       
		<div class="col-md-1">
</div>
</div>
</div>

      </div>
      <!-- /.row -->
    </section>
	  	   <?php include_once 'scripts.php'; ?>
<script>
 

function pradnyaShroff() {
document.getElementById('pradnyaJiShroff').style.display = "none";
document.getElementById('clickBtn').style.display = "none";
window.print();
}

</script>

  </body>
</html>