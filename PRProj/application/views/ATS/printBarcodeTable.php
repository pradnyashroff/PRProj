 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asset Master</title>
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
      Asset Master

      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('ATS/Ats/AssetDashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home" style="color:#FFFFFF;text-transform: uppercase;"></i> Home</a></li>
   
<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Asset Master

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

			<a href="#" id="Print_asset"><span class="fa fa-print" style="font-size:30px;color:red; margin-top: -3px; position: absolute; margin-left:15px;" ></span></a>

			
 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" style="width:100%;" class="table table">
                <thead>
                 <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th >SrNo</th>
                  <th >Asset No.</th>
				   <th >Asset Description</th>
				   <th >Barcode</th>
                  
                 
                </tr>
				</thead>
                <tbody>
				
	 <?php  
				  $BarcodeTable= $this->method_call->BarcodeTable();
				   if($BarcodeTable!=null){
         foreach ($BarcodeTable->result() as $row)  
         {  
            ?>
			<tr>  
          <td><?php echo $row->aid;?></td>  
          <td><a href="<?php echo site_url('ATS/ats/view_asset/'.$row->aid) ?>"><?php echo $row->scan_asset_no;?></td>  
     
            <td><?php echo $row->asset_spec;?></td>  
           
         
            <td><span style="font-family: 'idauto'; font-size:10px; font-weight:100;">*<?php $bar= $row->barcode; echo $row->barcode; ?>*</span></td>  
            </tr>  
				   <?php }  }
         ?>  
				
				
                
       
                </tbody>
               		
              </table>
			  
		

			</form>
					<form method="POST" action="<?php echo site_url('ATS/ats/print_all/');?>" id="delpur">

	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="barcode_list" id="can_id"> 
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
	  "ordering": false,
      'order': [[1, 'desc']],
	  "aLengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
	"scrollX": true,
    "iDisplayLength": -1
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
        if (isConfirm) $( "#delpur" ).submit();
    });
    
   }); 
});
</script>

  </body>
</html>