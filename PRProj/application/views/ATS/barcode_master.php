 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asset Master</title>
     	   <?php include_once 'styles.php'; ?>
<style>

 @media print
    {
        .non-printable { display: none; }
        .printable { display: block; }
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
    <section class="content-header non-printable" >
      <h1>
      Barcode Master

      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('ATS/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   
<li class="active"> Barcode Master

</li>
</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row ">
        <div class="col-xs-12">
     
          <div class="box" style="border-top: 0px" >
            
            <!-- /.box-header -->
            <div class="box-body">
			 <?php   if($barcode_detail!=null){
         foreach ($barcode_detail->result() as $row)  
         {  
            ?>
			

			<div class="col-xs-12"><span style="font-family: 'idauto'; font-size:40px; font-weight:100;">*<?php  echo $row->barcode; ?>*</span><br>
			<br><?php echo $row->asset_spec;?><br><br><br><br><br><br>
			</div>
			
			   <?php }  }
         ?>  
	
					
					   <button type="button" onclick="myFunction()" class="btn  bg-skincolor non-printable" style="border: 1px solid orange;width: 100%;">Print</button>

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
function myFunction() {
            $("#barcode").show();
    window.print();
}


</script>
 <script>
   
    $(function () {
      
      $('#example').excelTableFilter();
   
    });
  </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/checkboxes.js"></script>
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
    $('#Print_asset').on('click', function(e){
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
	    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Print Selected Barcodes!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#delpura" ).submit();
    });
    
   }); 
});
</script>
  </body>
</html>