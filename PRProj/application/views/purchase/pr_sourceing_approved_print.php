 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php $pr_detail= $this->method_call->pr_detail($pr_id);
 if($pr_detail!=null){
	 foreach ($pr_detail->result() as $row)  
         {  ?>
	  
  <title>View PR <?php echo $row->pr_id; ?></title>
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
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
      	   <?php include_once 'headsidelist_qcs_sourcing.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     View PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/QCS/index') ?>">PR</a></li>

<li class="active">View PR
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
	  
	  
							  
	  
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  

          <div class="box box-info">
 
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">PR Number </label>
				<div class="input-group  col-sm-6">
                 
               
            <?php echo $row->pr_id; ?>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label">2</label>
			   <label class="col-sm-4 control-label"> Plant </label>
				<div class="input-group  col-sm-6">
                                    <?php echo $row->plant_code; ?>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">PR Date</label>
				<div class="input-group  col-sm-6">
                  
				<?php echo $row->pr_date; ?>

               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
				
                          
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
		<?php print_r($pr_type_nm['pt_name']); ?>
					
							
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
<?php print_r($dept_nm['dept_name']); ?>
    
         
                </div>
                </div>
				
				
				
				
				
			   <div class="form-group col-sm-12">
			  
			  <label class="col-sm-2 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Requirement Details</label>
				<div class="input-group  col-sm-5 pull-right">

                </div>
			  </div>
			<!--  
			    <div class="form-group col-sm-12">
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
                <tr>
                  
                  <th ></th>
				  <th >ID </th>
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
				   <th>ION No.</th>
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details/Mfg Name</th>
                  
                </tr>
				
                </thead>
		
                <tbody>
				
	 -->
	 
	 
	     <div class="form-group col-sm-12">
			        <table id="exam" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
                <tr>
                  
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
				   <th>ION No.</th>
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details/Mfg Name</th>
                  <th>Customer Code</th>
				   <th>Sales Material</th>
				   <th>Ecn/New</th>
				   <th>Ecn/New Code</th>
                </tr>
				
                </thead>
		
                <tbody>
				
	 

				
				  <?php $item= $this->method_call->list_items($pr_id);
				    $final_rate=0;
 if($item!=null){
	 	   
	$sr_no=1;			  
foreach ($item->result() as $row3)  
         {  ?>
			<tr>
				 <td  ><?php echo $sr_no; ?> </td>
				 <td  ><?php echo $row3->item_code; ?></td>  
            <td>  <?php echo $row3->item_description; ?></td>  
            <td> <?php echo $row3->req_qty; ?></td>  
            <td> <?php echo $row3->uom; ?></td>  
            <td> <?php echo $row3->approx_rate; ?></td>  
            <td>  <?php echo $row3->approx_total_amt; ?></td>  
            <td> <?php echo $row3->ion_no; ?></td>  
            <td>  <?php echo $row3->expected_delivery; ?> </td>  
            <td> <?php echo $row3->project_detail; ?> </td>  
            <td> <?php echo $row3->technical_detail; ?> </td>  
			<td>  <?php echo $row3->cust_code; ?> </td>  
            <td> <?php echo $row3->sales_material; ?> </td>  
            <td> <?php echo $row3->ecn_new; ?> </td>  
			<td> <?php echo $row3->ecn_newcode; ?> </td>  
   <?php

				$approx_rate=$row3->approx_total_amt;
					$final_rate=$final_rate+$approx_rate;
				?>
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                	</tbody>
               		
              </table>
			
			  </div>

				
				
			  
			  			 
			  		
				
			  
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->budget_consider;  ?>

         
                </div>
                </div>
				
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6" id ="cust_cost">
                <?php echo $row->cust_cost;  ?>
         
                </div><br>
				<?php
	if($row->cust_cost == 'Up Front'){
	  $lab='Customer Cost Rs.';
  }	

 else if($row->cust_cost == 'Amortization') {
	  
	  	 $lab='Recovery Period (In Months)';

  }
  else if($row->cust_cost == 'REPL Own Investment') {
	  
	   $lab='ROI Period (In Months)';

  }  
				?>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label" id="lab"> <?php echo $lab;  ?></label>
				<div class="input-group  col-sm-6">
                 
                              <?php echo $row->cust_cost_val;  ?>
         
                </div>
                </div>
				
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                 
                                             <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
				
			 
			 	  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-3 pull-left control-label">Department Head Comment</label>
				<div class="input-group  col-sm-8">
                   <?php $dh_name= $this->method_call->fetch_emp_name($row->dh_id); ?>

                                   <?php if($row->dh_comment == null){
					 echo "Approval Pending From Department Head ($dh_name)";
					 
				 }else{
					 
					 $dh_dt= $this->method_call->fetch_status_dt($pr_id,$row->dh_id);
					 
				 echo $row->dh_comment; echo ' ('.$dh_name.')'; echo ' ('. $dh_dt.')'; } ?>

         
                </div>
                </div> 
			  
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">14</label>
			   <label class="col-sm-3 pull-left control-label">Plant Head Comment</label>
				<div class="input-group  col-sm-8">
			<?php $ph_name= $this->method_call->fetch_emp_name($row->ph_id); ?>

                 <?php if($row->ph_comment == null){
					 echo "Approval Pending From Plant Head ($ph_name)" ;
					 
				 }else{
					 
				 $ph_dt= $this->method_call->fetch_status_dt($pr_id,$row->ph_id);
				 
				 echo $row->ph_comment; echo ' ('.$ph_name.')'; echo ' ('. $ph_dt.')';
				
				 } ?>

         
                </div>
                </div> 
			  
			   <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">15</label>
			   <label class="col-sm-3 pull-left control-label">Sourcing Department Comment</label>
				<div class="input-group  col-sm-8">
			<?php $source_name= $this->method_call->fetch_emp_name($row->pr_source_id); ?>

                 <?php if($row->source_comment == null){
					 echo "Approval Pending From Sourcing Department ($source_name)" ;
					 
				 }else{
				$source_dt= $this->method_call->fetch_status_dt($pr_id,$row->pr_source_id);
	 
				 echo $row->source_comment; echo ' ('.$source_name.')'; echo ' ('. $source_dt.')';
				
			?> 




	  	
			
		<div class="form-group col-sm-12">

<div class="col-sm-4"><br><button type="button" onclick="window.print();"  class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Print</button></div>
<div class="col-sm-4"></div>
				<div class="col-sm-4"></div>

                </div>
				
				
			
			<?php	 } ?>

         
                </div>
                </div> 
			
			  
			  
			  
			  
			
              <!-- /.box-body -->
              <div class="box-footer">
			   	 	
	
		 <div class="form-group col-sm-12">
<?php $filea= $this->method_call->filefetch($pr_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
			
			    <div class="form-group col-sm-4">
			  <a style="color: #337ab7;" href="<?php echo base_url()."uploads/PR/". $pr_id ."/".$rowfile->file_name;?>"><?php echo $rowfile->file_name; ?></a>
			  </div>
		 <?php }
 } ?>
			  
			                </div>
							
							
							 <input type="hidden" name="pr_state" value="submited_dh" class="form-control"  required> 
		<?php $ph_id= $this->method_call->fetch_ph_id($row->delivary_loc); ?>
		<input type="hidden" name="pr_ph_id" value="<?php print_r($ph_id['ph_id']);  ?>" class="form-control"  required>
		<input type="hidden" name="pr_dh_id" value="<?php echo $row->dh_id;  ?>" class="form-control"  required>
		
		 
		 
			  
	
	   
			   
	   

              </div>
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
		
		
		 <?php
$pr_plant=$row->plant_code;
		$emp_dept=$dept_nm['dept_name'];
		$qcs_owner=$row->pr_owner_name;

		 }
 } ?>
      </div>
      <!-- /.row -->
	  

	  
	  
	  
	  
	  
	  
	  
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<form method="POST" action="<?php echo site_url('purchase/PR/add_item');?>" id="delpur">

	<pre id="example-console-rows" style="display:none!important"></pre>
<pre id="example-console-form" style="display:none!important"></pre>
<input type="hidden" name="item_id_list" id="can_id"> 
		</form>
       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
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
	   "scrollX": true,
	  "bStateSave": true,
	  	  "ordering": false,

   });
   
   
   
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
   
   
      // Handle form submission event
    $('#submit_main').on('click', function(e){
     
     
    swal({
        title: "Are you sure?",
        text: "Submit PR into Draft Mode!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#main_form" ).submit();
    });
    
   });  
   
     $('#item_btn').on('click', function(e){

     
    swal({
        title: "Are you sure?",
        text: "Add Items!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#item_form" ).submit();
    });
    
   });  
   
   
   
   
   
   
   
   

});
</script>
 

   <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example6').DataTable({
	   
	 
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
        title: "Submit PR",
        text: "You will not be able to Edit this PR!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your PR Recorded Successfully.", "success");				 
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


<script>

function mul() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt1').value = result;
      }
}
</script>


<!--sup  final rate 1 -->
<script>
function mulfinal_amt() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate1').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount1').value = result;
      }
}
</script>


<!-- quoted 2 -->
<script>

function mul_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt2').value = result;
      }
}
</script>


<!--sup  final rate 2 -->
<script>
function mul_final_quat2() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate2').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount2').value = result;
      }
}
</script>




<!-- quoted 3 -->
<script>

function mul_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('quot_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('quot_amt3').value = result;
      }
}
</script>


<!--sup  final rate 3 -->
<script>
function mul_final_quat3() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('final_rate3').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('amount3').value = result;
      }
}
</script>


<!-- Reset button --->
<script>
function cleartext() {

     document.getElementById("clear_con_dt").value = "";
     document.getElementById("clear_con_dt1").value = "";
}
</script>

