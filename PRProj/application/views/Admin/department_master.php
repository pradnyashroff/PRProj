 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Department Master</title>
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
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Department Master

      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('PR/kanban/pr_home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('PR/kanban/purchase_menu') ?>">Purchase</a></li>

<li class="active">Department Master

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
			
			<form id="frm-example" action="" method="POST">
												 <a href="#" id="excel"><img src="<?php echo base_url(); ?>assets/images/excel.jpg"  style="height:30px;width:30px;"></img></a>


			
 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" class="table table-bordered">
                <thead>
                <tr>
				 <th >Dept id</th>
                  <th >Deparment name</th>
				  
              
                </tr>
				
                </thead>
		
                <tbody>
				
				
				
				 <?php  
				 
				   if($dept_list!=null){
         foreach ($dept_list->result() as $row)  
         {  
		 
		 
		 
		 
            ?>
			
			
			<tr>  
         
			 <td><?php echo $row->dept_id;?></td>  
            <td><?php echo $row->dept_name;?></td>  
         
                              
			
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
      'order': [[1, 'desc']]
   });

});
</script>
  </body>
</html>