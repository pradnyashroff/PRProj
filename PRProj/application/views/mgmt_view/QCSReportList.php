 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QCS Reports</title>
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
QCS Reports

      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>">Purchase</a></li>

<li class="active">QCS Reports</li>

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
					<img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;" onclick="pradnya()"  ></h3>
<div class="box-body table-responsive">
              <table id="exampletestExport" class="table table-bordered table-striped" >
                <thead>
                <tr>
                 
                  <th>PR No </th>
				   <th>Plant</th>
				    <th>PR Owner Name</th>
                  <th>PR Type</th>
				  <th>QCS No</th>
				 <th>QCS Date</th>
				 <th>QCS Owner Name</th>
				  <th>Selected Supplier</th>
                  <th>QCS Status</th>
				 <th> QCS Submitted Date </th>
                 
				 
				  
				   <th>approval_level1</th>
				    <th width="20px";>approval_l_comment</th>
					<th>approval1 Date</th>
					 <th>approval_level2</th>
					   <th width="10%">approval_2_comments</th>
					<th>approval2 Date</th>					   
					  <th>CFO Approval</th> 
					   <th width="10%">CFO Comments</th> 
					   	<th>approval3 Date</th>
					  <th>COO Approval</th> 
					   <th width="10%">COO Comments</th> 
					   	<th>approval4 Date</th>
					    <th>MDO Approval</th> 
					  <th width="10%">MDO Comments</th> 
					  	<th>approval5 Date</th>
				  
                 
                </tr>
				
                </thead>
		
                <tbody>
				
				  
						

				
				
	  <?php $qcs_approval1= $this->method_call->QcsReport_List();
 if($qcs_approval1!=null){
	 	   
	//$sr_no=1;			  
foreach ($qcs_approval1->result() as $row)  
         { 
			$pt_type= $this->method_call->fetchprtype_nm($row->pr_type); 
			$s_head_name= $this->method_call->fetch_emp_name($row->approval_level1);
			$s_mgr_name= $this->method_call->fetch_emp_name($row->approval_level2);	
			$cfo_nm= $this->method_call->fetch_emp_name($row->approval_level3);	
			$coo_nm= $this->method_call->fetch_emp_name($row->approval_level4);	
			$mdo_nm= $this->method_call->fetch_emp_name($row->approval_level5);	
			?>
			
			
			<tr>  
				<td><?php echo $row->pr_id;?></td>  
				<td><?php echo $row->plant_code;?></td>  
				<td><?php echo $row->pr_owner_name;?></td>  
				<td><?php echo $pt_type;?></td>
				
				
				<td><?php echo $row->qcs_id;?></td>  
				<td><?php echo $row->qcs_date;?></td>  
				<td><?php echo $row->qcs_owner;?></td>  
				
			
				<td><?php echo $row->sup1_nm;?></td>
				<td><?php echo $row->qcs_status;?></td>
				<td><?php echo $row->qcs_sub_date;?></td>  
				
				<td><?php echo $s_head_name;?></td>
			    <td width="20px";><?php echo $row->approval_level1_comment;?></td>
				<td><?php echo $row->approval1_date;?></td> 
				
				<td><?php echo $s_mgr_name;;?></td>
				<td><?php echo $row->approval_level2_comment;?></td>
				<td><?php echo $row->approval2_date;?></td> 
				
				<td><?php echo  $cfo_nm;?></td>
				<td><?php echo $row->approval_level3_comment;?></td>
				<td><?php echo $row->approval3_date;?></td> 
				<td><?php echo  $coo_nm;?></td>
				 <td><?php echo $row->approval_level4_comment;?></td>
				 <td><?php echo $row->approval4_date;?></td> 
				<td><?php echo $mdo_nm;?></td>  
				<td><?php echo $row->approval_level5_comment;?></td>
						<td><?php echo $row->approval5_date;?></td> 
						    
			 
		
           </tr>  
				   <?php }  }
      
				
				
	
		
         ?>  

				
                
       
                </tbody>
                
       
              
               		
              </table>
	</div>

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
 <script>
	function pradnya(){
		
	
		exportMe();
		
	}
	</script>
	<script>
	function exportMe(){
	
		
		  //getting values of current time for generating the file name
	
		
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('exampletestExport');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = "QCS Report--"+ postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
      
  
	}
	</script>
  </body>
</html>