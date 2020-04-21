<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Reimbursement</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">   	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">TRAVEL REIMBURSEMENT ACCEPTED NON IOU CLAIM TABLE
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase";>
                   <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase";><i class="fa fa-dashboard"></i> Home</a></li>
                   <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase";>Travel Reimbursement</a></li>
                   <li class="active" style="color:#FFFFFF;text-transform: uppercase";>Accepted Request Non IOU Table
                    </li>
                    </li>
                </ol>
            </section>
           <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
			<div class="form-group col-sm-12">
              <div class="container">
    <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('ELAR/Travel/Travel_cntr/showSancAuthoReportAcceptNonIOU') ?>" >
    <div class="row">
        <div class='col-sm-4'>
            <div class="form-group">
                <label>From Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    
                    <input type='text' name="fromDate"  autocomplete="off" id="fromDate" class="form-control" />
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
                    <input type='text' name="toDate" autocomplete="off" id="toDate" class="form-control" />
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
                      <button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase; margin-left:10%  ">Search</button>
                      
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
echo "<div class='table-responsive'><table id='example' class='table table'>";
echo '<thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Claim No</th>
                  <th>Claim Date</th>
                  <th>Claim By</th>
                  <th>Emp Code</th>
                  <th>Department</th>
                  <th>Plant</th>
                  <th>Total Amount</th>
                  <th>Claim Status</th>
                </tr>
                </thead> <tbody>';
foreach ($result_display as $value) {
echo '<tr>' . '<td class="e_id"> <a href="'. site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_nonIOU_claim_approved_view/'.$value->trv_mst_id).'" style="color:red;" class="glyphicon glyphicon-edit">' . $value->trv_mst_id . '</a></td>' . '<td>' . $value->reg_date . '</td>' . '<td>' . $value->emp_name . '</td>' . '<td>' . $value->emp_code . '</td>'.'<td>' . $value->dept_name . '</td>'.'<td>' . $value->plant_name . '</td>'.'<td>' . $value->total_amt . '</td>' .''. '</td> <td>You Approved</td>' . '<tr/>';
}
echo '</tbody></table></div>';
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
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
    function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('example'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
    </script>
    <script> 
    $(function () {
      
    
   
    });
     //Date picker
    $('#fromDate').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      orientation: 'bottom'
    })
     //Date picker
    $('#toDate').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      orientation: 'bottom'
    })
  </script>
  
</body>
</html>

