 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pending Approval QCS</title>
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
         QCS Pending for Approval 

      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" style="color:#FFFFFF;text-transform: uppercase;">Purchase</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">  QCS Pending for Approval  </li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
			
			<form id="frm-example" action="" method="POST">
						<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img></a>

 <br><br>
              <table id="example" class="table table">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;">
                  <th style="display:none;"></th>
                  <th>QCS No</th>
				 <th>QCS Date</th>
				  <th>PR No </th>
                  <th>PR Owner Name</th>
                    <th>Procurement reson </th>
				  <th>Plant</th>
                  <th>QCS Status</th>
                 
                </tr>
				
                </thead>
		
                <tbody>
				
				  
				
				
				
				  <?php $pr= $this->method_call->list_pending_qcs($emp_code);
 if($pr!=null){
	 	   
	//$sr_no=1;			  
foreach ($pr->result() as $row)  
         {  ?>
			
			
			<tr>  
            <td style="display:none;"><?php echo $row->qcs_id;?></td>  
            <td >  <a href="<?php echo site_url('purchase/QCS/qcs_pending_view/'.$row->qcs_id);?>"> QCS <?php echo $row->qcs_id;?> </a></td>  
			 <td><?php echo $row->qcs_date;?></td>  
          
            <td><?php echo $row->pr_id;?></td> 
              <td><?php echo $row->pr_owner_name;?></td>  
             <td><?php echo $row->procurement_res;?></td>  
			    <td><?php echo $row->plant_code;?></td>  
		   	 <td>  

			  <?php
			$comp=$row->qcs_status;
$status="";
if($comp == "Qcs_Draft" ){ $status="Pending For QCS Draft"; }
if($comp == "submited_Sourcing_Mgr" ){ $status="Pending For Sourcing Manager Approval"; }
if($comp == "Sourcing_Mgr_approved" ){ $status="Pending For Sourcing Head Approval"; }
if($comp == "Sourcing_Head_Approved" ){ $status="Pending For CFO Approval"; }
if($comp == "CFO_Approved" ){ $status="Pending For COO Approval"; }
if($comp == "COO_Approved" ){ $status="Pending For MDO Approval"; }
if($comp == "Sourcing_Mgr_reject" ){ $status="Rejected By Sourcing Manager"; }
if($comp == "Sourcing_Head_Reject" ){ $status="Rejected By Sourcing Head"; }
if($comp == "CFO_Reject" ){ $status="Rejected By CFO"; }
if($comp == "COO_Reject" ){ $status="Rejected By COO"; }
if($comp == "QCS_Approved" ){ $status="QCS Process Completed"; }
if($comp == "QCS_Reject" ){ $status="QCS Rejected"; }
/*
		if($row->pr_type =='13' && $row->qcs_status == "Sourcing_Head_Approved"){
					echo "Approval Done";
					
				}else{
					$status="Pending For CFO Approval"; 
				}*/
			echo $status 
			?>
		
			 </td>
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