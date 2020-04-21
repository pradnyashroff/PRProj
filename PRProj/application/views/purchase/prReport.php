<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PR Report</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
    <body class="hold-transition skin-blue sidebar-mini" >    	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1>
                    <br>
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>">Cash Reimbursement</a></li>
                    <li class="active">PR Report
                    </li>
                    </li>
                </ol>
            </section>
                
        
            <section class="content">
            <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">PR Report</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			 
			
                              <div class="form-group col-sm-12">
                                  
<div class="container">

			  <form method="post" action="<?php echo site_url('purchase/PR/prReportData') ?>" >

    <div class="row">
        <div class='col-sm-4'>
            <div class="form-group">
                <label>From Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    
                    <input type='Date' name="fromDate" autocomplete="off" id="fromDate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
        </div>
         <div class='col-sm-4'>
            <div class="form-group">
                <label>To Date</label>
                <div class='input-group date' >
                    <input type='Date' name="toDate" autocomplete="off" id="toDate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
        </div>
        <div class='col-sm-2'>
            <div class="form-group">
                <label>Action</label>
                <div class='input-group date' >
                      <button type="submit" name="save"  class="btn  bg-skincolor" style="border: 1px solid orange;margin-left:10%  ">Search</button>
                      
                </div>
            </div>
            
        </div>
        <div class='col-sm-2'>
            <div class="form-group">
                <label></label>
                <div class='input-group date' id='datetimepicker1'>
                    <img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="width: 55px" onclick="fnExcelReport();">
                    
                </div>
            </div>
            
        </div>
    </div>
        </form>
</div>
                <div class="message">
<?php
if (isset($result_display)) {
echo "<p><u>Result</u></p>";
if ($result_display == 'No record found !') {
echo $result_display;
} else {
echo "<table id='example' class='table table-bordered table-striped'>";
echo '<thead>
                <tr>
                  <th>PR No</th>
                  <th>PR Date</th>
                  <th>Plant</th>
                  <th>Pr Owner</th>
                  <th>Department</th>
				  <th>Reports</th>
                
                </tr>
                </thead> <tbody>';
foreach ($result_display as $value) {
echo '<tr>' . '<td class="e_id">'. $value->pr_id . '</td>' . '<td>' . $value->pr_date . '</td>' . '<td>' . $value->plant_code . '</td>' . '<td>' . $value->pr_owner_name . '</td>'.'<td>' . $value->dept_name . '</td>' .'<td onclick=prExport("'. $value->pr_id . '")>PR </td>'.'</td>' .'<a class="pull-right btn btn-primary btn-xs" href="'.site_url().'/purchase/PR/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a>'. '<tr/>';
}
echo '</tbody></table>';
}
}
?>    
                    
                      </div>   
                  
			  </div>
            </div>
                         
       
        </div>
            <!-- /.box-body -->
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
  
            </section>
<!-- /.content -->
    
<!--Edit delete action model pop up end from here-->
<?php include_once 'scripts.php'; ?>
<script type="text/javascript">

$(document).ready(function (){
   var table = $('#example').DataTable({
      'columnDefs': [
         {
            'targets': 0,
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


<script>
function prExport(para){
	alert(para);
}

</script>

</body>
</html>

	