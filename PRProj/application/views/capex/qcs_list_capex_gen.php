 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> QCS List </title>
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
	box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);
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
   <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo'">

 Approved QCS List 

      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('purchase/capex/index') ?>" style="color:#FFFFFF;">Capex </a></li>

<li class="active" style="color:#FFFFFF;">QCS List</li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body"  style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
			
			<form id="frm-example" action="" method="POST">
						<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img></a>

 <br><br><table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
						; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;">
                <tr style="background-color:#3482AE;color:#FFFFFF">
 

                  <th style="display:none;"></th>
				 <th style="text-align: center;text-transform: uppercase;">QCS No</th>
				   <th style="text-align: center;text-transform: uppercase;">QCS Date / Time</th>
                  <th style="text-align: center;text-transform: uppercase;">Plant</th>
				  <th style="text-align: center;text-transform: uppercase;">Selected Supplier</th>
                  <th style="text-align: center;text-transform: uppercase;">Capex Status</th>
                 
                </tr>
				
                </thead>
		
                <tbody>
				
					<?php
				
				
				 $qcs_approved = $this->method_call->qcs_approved_capexlist($emp_code);
 if($qcs_approved!=null){
	 	   
	$sr_no=1;			  
foreach ($qcs_approved->result() as $row)  
         {  ?>
			
			
			<tr>  
            <td style="display:none;"><?php echo $row->qcs_id;?></td>  
           <td style="text-align: center;" ><a href="<?php echo site_url('purchase/capex/create_capex/'.$row->qcs_id);?>"> QCS <?php echo $row->qcs_id;?> </a></td> 
			<td style="text-align: center;" ><?php echo $row->qcs_date;?></td>
			<td style="text-align: center;" ><?php echo $row->plant_code;?></td>  				 
            <td style="text-align: center;" ><?php echo $row->selected_supplier;?></td>
			<td style="text-align: center;" ><?php echo $row->qcs_status;?></td>
           
         
          
		   
           </tr>  
				<?php }  } 
				
				
				
				
				
         ?>

				</tbody>
               		
              </table>
		<pre id="example-console-rows" style="display:none!important"></pre>

<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="can_id" id="can_id"> 

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
		   		         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>


<script>
$(document).ready(function(){ 
var doc = new jsPDF();

// We'll make our own renderer to skip this editor
var specialElementHandlers = {
	'#editor': function(element, renderer){
		return true;
	}
};

    $('#cmd').click(function () {
        doc.fromHTML($('#example').get(0), 15, 15, {
	'width': 170, 
	'elementHandlers': specialElementHandlers
});
        doc.save('sample-file.pdf');
    });
});
</script>
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
	  "ordering": false,
      'order': [[1, 'desc']]
   });


		
		
		
		
		
		 $("#status_filter").change(function () {
			   var num=$(this).val();
			   $('input[type=search].form-control').val(num);
	
    $('input[type=search].form-control').keyup();
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