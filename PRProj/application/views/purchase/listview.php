 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All PR Status In LIST</title>
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
      <?php if(isset($page_title)){ echo $page_title;} else { echo "Check existing PR Status";} ?>

      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('PR/kanban/pr_home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li> <a href="<?php echo site_url('PR/kanban/purchase_menu') ?>">Purchase</a></li>

<li class="active"><?php if(isset($page_title)){ echo $page_title;} else { echo "Check existing PR Status";} ?>

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
						<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img></a>

			<!--<input type="submit" title="Delete Candidates"  class="fa fa-trash-o" value="&#xf014;" name="delete_can" style="font-size:20px;background-color:red;color:#fff;" onsubmit="return confirm(Do you really want to delete this application?);" ></input>
 						<a href="#" id="cmda" title="Generate PDF" ><img src="<?php echo base_url(); ?>assets/images/pdf.png" style="heu=ight:30px;width:30px;"></img></a>-->

 <!--<button  type="button" id="clear"  title="Clear Filters"><span class="fa fa-refresh"  style="font-size:20px"  > </span></button>-->
 <br><br>
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;"></th>
                  <th>PR No</th>
				   <th>PR Date</th>
                  <th>Requester Name</th>
                  <th>Proj Name</th>
                  <th>Item Name</th>
                  <th>Aprrox Total Price</th>
                 
                 
                  <th>Status</th>
                </tr>
				
                </thead>
		
                <tbody>
				
				
				
				 <?php  
				 
				   if($listdata!=null){
         foreach ($listdata->result() as $row)  
         {  
		 
		 
		 
		 
            ?>
			
			
			<tr>  
            <td style="display:none;"><?php echo $row->pr_id;?></td>  
            <td >  <a href="<?php echo site_url('PR/PR/show_pr/'.$row->pr_id);?>"> PR <?php echo $row->pr_id;?> </a></td>  
			 <td><?php echo $row->pr_date;?></td>  
            <td><?php echo $row->requester_name;?></td>  
            <td><?php echo $row->pro_name;?></td>  
           <td><?php echo $row->item_name;?></td>  
            <td><?php echo $row->item_approx_tot;?></td>  
          
                    <td><?php $st=$row->status;
								$lp=$row->is_lead_approved;
					
				if($st == "0" && $lp=="0" ){ echo "Level 1: Requisition Submitted"; }
					if($st == "0" && $lp=="1" ){ echo "Level 2: Lead Approval Done"; }
					if($st == "1on"){ echo "Level 3: Forms uploaded by SE."; }
					if($st == "1off"){ echo "Level 3: Forms uploaded by SE."; }
					if($st == "2"){ echo "Level 4: PR Approved by PM"; }
					if($st == "3aapp"){ echo "Level 4: PR Approved by PM"; }
					if($st == "3a"){ echo "Level 5a: Ecommerce Supplier: PR approved by MDO"; }
					if($st == "3b"){ echo "Level 5b: Offline Supplier: Sent for PO creation"; }
					if($st == "4"){ echo "Level 6: Ecommerce Supplier: Payment done. Awaiting Delivery"; }
						if($group_id=="4" && $st == "Rejected"){ 
						echo "Due for Amendment";
						}
						else{
					if($st == "Rejected"){ echo "Rejected"; }
						}
					if($row->reject_by_group == "1" && $group_id=="3"){ ?>
						 <a href="<?php echo site_url('PR/PR/amend_pr/'.$row->pr_id);?>" class="btn btn-success btn-xs pull-right">Amend & Resend</a><br><br>
						 <a href="<?php echo site_url('PR/PR/delete_pr/'.$row->pr_id);?>" class="btn btn-success btn-xs pull-right">Delete</a>
					<?php }
					
					
					?></td>  
            
			
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