 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pending Approval</title>
     	   <?php include_once 'styles.php'; ?>
<style>
   @media (min-width: 992px) {
Pending Approval (Submited PR)

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
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:white;font-family:'exo'">
     Approval Pending PR

      </h1>
     <ol class="breadcrumb" style="color:white;font-family:'exo'">
        <li style="color:white"><a href="<?php echo site_url('Welcome/index') ?>" style="color:white"><i style="color:white"class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>"  style="color:white">Purchase</a></li>

<li class="active" style="color:white"> Pending Approval Master </li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body" style="font-family:'exo'">
			
			<form id="frm-example" action="" method="POST">
						<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img></a>

			<!--<input type="submit" title="Delete Candidates"  class="fa fa-trash-o" value="&#xf014;" name="delete_can" style="font-size:20px;background-color:red;color:#fff;" onsubmit="return confirm(Do you really want to delete this application?);" ></input>
 						<a href="#" id="cmda" title="Generate PDF" ><img src="<?php echo base_url(); ?>assets/images/pdf.png" style="heu=ight:30px;width:30px;"></img></a>-->

 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" class="table table-sm" style="font-size: 12px!important;border:1px solid black;
  ; border-color:#3482AE;text-align: center; width:100%;box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
                <thead style="text-align: center;" >
                <tr style="background-color:#3482AE;color:#FFFFFF">
                  <th style="display:none;"></th>
                  <th scope="col" style="text-align: center;">PR No</th>
				 <th scope="col" style="text-align: center;">PR Date</th>
                  <th scope="col" style="text-align: center;">Pr Owner Name</th>
                 <th scope="col" style="text-align: center;">Location</th>
                  <th scope="col" style="text-align: center;">Procurement Reason</th>
                  <th scope="col" style="text-align: center;">PR Status</th>
                 
                </tr>
				
                </thead>
		
                <tbody>
				<?php $is_PH=$this->method_call->is_PH($emp_code); 
				
				//if($is_PH == false){
				
				 $pr_submited_dh= $this->method_call->list_pr_submited_dh($emp_code);
 if($pr_submited_dh!=null){
	 	   
	$sr_no=1;			  
foreach ($pr_submited_dh->result() as $row)  
         {  ?>
			
			
			<tr>  
            <td style="display:none;"><?php echo $row->pr_id;?></td>  
            <td><a href="<?php echo site_url('purchase/PR/approve_dh_pr/'.$row->pr_id);?>"> PR <?php echo $row->pr_id;?> </a></td>  
            <td><?php echo $row->pr_date;?></td>  
            <td><?php echo $row->pr_owner_name;?></td>  
            <td><?php echo $row->delivary_loc;?></td>  
            <td><?php echo $row->procurement_res;?></td>  
            <td><?php echo $row->pr_state;?></td>  
            </tr>  
				<?php }  } //}
				
			
				
				 $pr_submited_ph= $this->method_call->list_pr_submited_PH($emp_code);
 if($pr_submited_ph!=null){
	 	   
	$sr_no=1;			  
foreach ($pr_submited_ph->result() as $row)  
         {  ?>
			
			
			<tr>  
            <td style="display:none;"><?php echo $row->pr_id;?></td>  
            <td >  <a href="<?php echo site_url('purchase/PR/approve_pr_ph/'.$row->pr_id);?>"> PR <?php echo $row->pr_id;?> </a></td>  
			 <td><?php echo $row->pr_date;?></td>  
                         <td style="text-align:left;"><?php echo $row->pr_owner_name;?></td>  
            <td><?php echo $row->delivary_loc;?></td>  
           <td style="text-align:left;"><?php echo $row->procurement_res;?></td>  
		              <td><?php echo $row->pr_state;?></td>  

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