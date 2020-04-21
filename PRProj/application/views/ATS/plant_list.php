 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plants Master</title>
     	   <?php include_once 'styles.php'; ?>
<style>


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
    <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
      Plants Master

      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/ats_menu') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
   
<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Plants Master

</li>
</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Plant</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo form_open('ATS/Ats/add_plant'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Plant ID</label>
                  <input type="number" class="form-control" name="plant_id" id="exampleInputEmail1" placeholder="Enter Plant ID">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Plant Name</label>
                  <input type="text" class="form-control" name="plant_name" id="exampleInputEmail1" placeholder="Enter Plant Name">
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center><button type="submit" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Submit</button></center>
              </div>
  <?php echo form_close(); ?>
  
   <!-- /.box-header -->
            <div class="box-body">
			<form id="frm-example" action="" method="POST">
			 <a href="#" id="excel"><img src="<?php echo base_url(); ?>assets/images/excel.jpg"  style="height:30px;width:30px;"></img></a>
	
 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" class="table table">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th >Plant Name</th>
				   <th >Plant ID</th>
               
                 
                </tr>
				</thead>
                <tbody>
				
				 <?php  
				  $plantlist= $this->method_call->listplant();
				   if($plantlist!=null){
         foreach ($plantlist->result() as $row)  
         {  
            ?>
			<tr>  
          <td><?php echo $row->plant_id;?></td>  
            <td><?php echo $row->plant_name;?></td>  
       
            </tr>  
				   <?php }  }
         ?>  
				
				
				
                
       
                </tbody>
               		
              </table>
			  
		

			</form>
            </div>  </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section><!-- /.content -->
 <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
 <script>
   
    $(function () {
      
      $('#example').excelTableFilter();
   
    });
  </script>
  <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example').DataTable({
    
	  "bStateSave": true,
	  "orderCellsTop": false,
	  "orderable": false,
      'order': [[1, 'desc']]
   });

   
});
</script>
  </body>
</html>