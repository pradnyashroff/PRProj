 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee Master</title>
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
       <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;margin-left:8%;">
      Employee Master

      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/ats_menu') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
   
<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Employee Master

</li>
</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
			
			<form id="frm-example"  action="" method="POST">
						 <a href="#" id="excel"><img src="<?php echo base_url(); ?>assets/images/excel.jpg"  style="height:30px;width:30px;"></img></a>


			
 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" class="table table" style="width:100%;">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th >Employee Name</th>
				   <th >Username</th>
                  <th>Plant</th>
                  <th >Date</th>
                 
                </tr>
				</thead>
                <tbody>
				
				 <?php  
				 
				   if($listdata!=null){
         foreach ($listdata->result() as $row)  
         {  
            ?>
			<tr>  
          <td><?php echo $row->emp_name;?></td>  
            <td><?php echo $row->user_name;?></td>  
            <td><?php echo $row->plant_name;?></td>  
            <td><?php echo $row->insert_date;?></td>  
            </tr>  
				   <?php }  }
         ?>  
				
				
				
                
       
                </tbody>
               		
              </table>
			  
		

			</form>
            </div>
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
          "scrollX": true,
      'order': [[1, 'desc']]
   });

   
});
</script>
  </body>
</html>