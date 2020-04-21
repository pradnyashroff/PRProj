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
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Employee Master

      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('PR/kanban/pr_home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('PR/kanban/purchase_menu') ?>">Purchase</a></li>

<li class="active">Employee Master

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


<br><br>
              <table id="example" class="table table-bordered">
                <thead>
                <tr>
				 <th >Employee code</th>
				 <th >Reporting Authority</th>
                  <th >From Date </th>
                 
                
                
                </tr>
				
                </thead>
		
                <tbody>
				
				
				 <?php  
				 
				   if($listdata!=null){
         foreach ($listdata->result() as $row)  
         {  
		 
		 
		 
		 
            ?>
			
			
			<tr>  
         
		
            <td><a href="<?php echo site_url('Admin/Admin/show_employee/'.$row->emp_code) ?>"><?php echo $row->emp_code;?></a></td>  
            <td><?php echo $row->reporting_autho;?></td>  
            <td><?php echo $row->reporting_level;?></td>  
            
          
                              
			
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
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
	  "bStateSave": true,
	  "orderCellsTop": false,
	  "orderable": false,
      'order': [[1, 'desc']]
   });


		
		
		
		
		
		
		
		
   // Handle form submission event
    $('#frm-example').on('submit', function(e){
      var form = this;
      
      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'text')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      $('#can_id').val(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
    
   });   
});
</script>
  </body>
</html>