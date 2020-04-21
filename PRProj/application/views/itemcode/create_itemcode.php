 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create ItemCode</title>
     	   <?php include_once 'styles.php'; ?>
<style>

.kv-file-upload{
	display:none;
	
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
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#3482AE">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
       Create ItemCode
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" style="color:#FFFFFF;">ItemCode</a></li>

<li class="active" style="color:#FFFFFF;">Create ItemCode
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
  	<section class="content" id="content">
	  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">

 	  
	  <?php $itencode_detail = $this->method_call->pr_qcs_detail_itemcode($qcs_id);
 if($itencode_detail!=null){
	 foreach ($itencode_detail->result() as $row4)  
         {  ?>
 
      <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
        <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
						<h3 class="box-title">1. Basic ItemCode Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
<form method="post" id="main_form" action="<?php echo site_url('purchase/itemcode/create_itemcode'); ?>" enctype='multipart/form-data'>
            
			 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">ItemCode Number </label>
				<div class="input-group  col-sm-6">
                      <input type="text" name="itemcodeno" value="auto-genrated" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
                 <input type="Text" name="pr_plant" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->plant_code; ?>"  required>                          

                </div>
                </div> 
				
				
			  
		
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">

	
	 <?php $dept_nm= $this->method_call->fetch_dept_nm($row4->dept_id); ?>


	  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($dept_nm['dept_name']); ?>"  required>
                  
          
                </div>
                </div>
			  
			 	 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR No</label>
				<div class="input-group  col-sm-6">
                <input type="Text" name="itemcode_pr_no" class=" form-control"  style="background-color:#E6F2FF;" readonly value="<?php echo $row4->pr_id; ?>"  required>
    
          
         
                </div>
                </div> 
			 
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">QCS NO</label>
				<div class="input-group  col-sm-6">
				
				
				  <input type="Text" name="itemcode_qcs_no"  class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->qcs_id; ?>" required> 
                  
          
				              
    
         
                </div>
                </div>
			
		 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
				
				
				 <input type="Text" name="qcs_owner_nm" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->qcs_owner; ?>"required> 
                  
          
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4" hidden>
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">pr Owner emp </label>
				<div class="input-group  col-sm-6">
				
				
				 <input type="Text" name="pr_owner_empcode" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row4->pr_owner_empcode; ?>"required> 
                  
          
         
                </div>
                </div>
				 </div>
				 </div>
				 </div>
				
				<!-- end -->
				<!-- ItemCode start -->
				 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
						<h3 class="box-title">2. ItemCode Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			  
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
			  
				   <table id="example" class="table table">
                <thead style="text-align: center;" >
						<tr style="background-color:#3482AE;color:#FFFFFF">
                				
				
				<th style ="text-align:center;"> QCS ID</th>  
				<th style ="text-align:center;"> ItemCode </th>  
				<th style ="text-align:center;"> HSN Code  </th>  
				<th style ="text-align:center;"> Item Description</th>
				<th style ="text-align:center;"> Item Date</th>
			
                </tr>  
			
				
                </thead>
		
                <tbody>
				
	 				  <?php $item= $this->method_call->qcs_itemcode($qcs_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $row5)  
         {  ?>
			<tr>
				 <td style ="text-align:center;"><?php echo $row5->qcs_id; ?></td>
				 <td style ="text-align:center;"><?php echo $row5->q_item_code; ?> </td>
				 <td style ="text-align:center;"><?php echo $row5->q_hsn_code; ?></td> 
				 
				<td><?php echo $row5->q_item_description; ?></td>
				<td style ="text-align:center;"><?php echo $row5->qcs_item_date; ?></td>
			</tr>
	 

				
		 <?php  }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>	  		  
				

			</div>
			</div>
          
			
			<br>
			
			 <div class="form-group col-sm-12">
			  
			  <label class="pull-left control-label" style="font-size:18px; font-family:'exo';"><h4 style="font-size:18px; font-family:'exo';">3.</h4></label>
			   <label class="col-sm-5 pull-left control-label"  style="font-size:18px; font-family:'exo';"><h4 style="font-size:18px; font-family:'exo';">File Attachments </h4></label>
				<div class="input-group  col-sm-4">
                 
                <input type="file"  name="itemcode_attachment" class="form-control" required style="width:90%;">
    
                </div>
                </div>
			
			
		
</div>

<?php
 }
 } 
?>
<!--end -->
				
	<!-- body close -->
<!-- footer start -->	
<div class="box-footer">

<input type="hidden" name="item_gen_approval1" class="form-control" readonly value="<?php echo 100013; ?>"> 

<input type="hidden" name="item_gen_approval2" class="form-control" readonly value="<?php echo 100095; ?>"> 
					  <div class="form-group col-sm-12">
			  <div class="col-sm-4">
				</div>
				
<div class="col-sm-2"><button type="submit" id="" class="btn" style="width:70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Save Draft</button></div>

<div class="col-sm-2"> <a href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" class="btn" style="width:70%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Cancel</a></div>
				
				
				<div class="col-sm-4 ">
				</div>
				
                </div>
					
	</div>				 
		
	<!--end -->		
			             <!-- /.box-body -->
          
              <!-- /.box-footer -->
			  
			  
			  
			  	<!-- end -->
		

   </div>
  
  </div>			
			    </form>
        

       

   
   </section>
   
   
  
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
   <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example6').DataTable({
	   
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
	   "scrollX": true,
	  "bStateSave": true,
	  	  "ordering": false,
		  "paging": false,
  //"scrollY":        '50vh',
     //   "scrollCollapse": true
   });
   
   
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	
	
    // Handle form submission event
    $('#delete_can').on('click', function(e){
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
        text: "Delete Customer Purchase Information!",
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
 
  <script type='text/javascript'>
$('#btn-submit').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Submit QCS Step-1",
        text: "You will not be able to Edit this QCS!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your QCS Step -1 Recorded Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}
	
});
</script>




  </body>
</html>