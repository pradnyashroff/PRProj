 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> View PR </title>
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


@media print {
  #printPageButton {
    display: none;
  }
  #printPageButtonCancel{
	  display: none;
  }
  #q_attachement{
	  display :none;
  }
  #po_attachement{
	  display:none;
  }
 
}
label,.col-sm-1,.box-title,.col-sm-4
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
      PR View
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/QCS/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">QCS</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;"> PR View
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      	<section class="content" id="content">
	     <div class="wrapper">
	  
							  <?php $pr_detail= $this->method_call->pr_detail($pr_id);
 if($pr_detail!=null){
	 foreach ($pr_detail->result() as $row)  
         {  ?>
	  
	   <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
     
       
          <!-- Horizontal Form -->
		  

         
 
            <!-- /.box-header -->
            <!-- form start -->
		
		
		<!-- Approver History -->
		 
			<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1. &nbsp; Basic PR Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">

              
				   <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label"style="font-family:'exo';">1</label>
			   <label class="col-sm-4 pull-left control-label"style="font-family:'exo';">PR Number</label>
				<div class="input-group  col-sm-6">
                 
               
                                     <?php echo $row->pr_id; ?>
                </div>
                </div>
			  
			 
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 pull-left control-label" style="font-family:'exo';">2</label>
			   <label class="col-sm-4 pull-left control-label" style="font-family:'exo';"> Plant </label>
				<div class="input-group  col-sm-6">
                                    <?php echo $row->plant_code; ?>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">PR Date</label>
				<div class="input-group  col-sm-6">
                  
				<?php echo $row->pr_date; ?>

               
         
                </div>
                </div>
				  
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
<?php print_r($dept_nm['dept_name']); ?>
    
         
                </div>
                </div>
				<div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
				
                          
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
		<?php print_r($pr_type_nm['pt_name']); ?>
					
							
          
         
                </div>
                </div></div></div></div>
				
				
			
				
			   
			   
			   <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2. &nbsp; Requirement Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
			  
			  
			  
			   
			        <table id="example" class="table table" style="width:100%;">
                 <thead style="text-align: center;width:100%;" >
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  
                  <th > </th>
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
				
	 

				
				  <?php $item= $this->method_call->list_items($pr_id);
 if($item!=null){
	 	   
	$sr_no=1;			  
foreach ($item->result() as $row3)  
         {  ?>
			<tr>
				 <td  ><?php echo $row3->item_id; ?></td>
				 <td  ><?php echo $row3->item_id; ?></td>
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
                
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
               		
              </table>
			
			  </div></div></div>
			  
			  		
			  		
				
			  
			  <div class="form-group col-sm-6"> 
			  <br>
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
				
				
				<?php echo $row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			   <br>
			 <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                
			<?php echo $row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
             
				<?php echo $row->budget_consider;  ?>

         
                </div>
                </div>
				<!--
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
                
                -->
                
                  	<div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost - Upfront (In Rs.) </label>
				<div class="input-group  col-sm-6">
                 <?php echo $row->cust_cost_upfront; ?>
               
                                 
    
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost - Amortization  (In Months) </label>
				<div class="input-group  col-sm-6">
                 
               
                                    <?php echo $row->cust_cost_amortization; ?>
    
                </div>
                </div>

				
				
				   <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Own Investment (Recovery Period In Months)	 </label>
				<div class="input-group  col-sm-6">
                 
               
                                   <?php echo $row->own_investment; ?>
                </div>
                </div>
                	<div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Fund NO/ION NO</label>
				<div class="input-group  col-sm-6">
                 
                                             <?php echo $row->ion_no;  ?>

         
                </div>
                </div>
				
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-6">
                 
                                             <?php echo $row->procurement_res;  ?>

         
                </div>
                </div>
				
			 
			  
			  
			  
			   <div class="form-group col-sm-12" hidden>
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-5 pull-left control-label">Sourcing Department Comment</label>
				<div class="input-group  col-sm-6">
			<?php $source_name= $this->method_call->fetch_emp_name($row->pr_source_id); ?>

                 <?php if($row->source_comment == null){
					 echo "Approval Pending From Sourcing Department ($source_name)" ;
					 
				 }else{
				$source_dt= $this->method_call->fetch_status_dt($pr_id,$row->pr_source_id);
	 
				 echo $row->source_comment; echo ' ('.$source_name.')'; echo ' ('. $source_dt.')';
				
			?> 


</div>

                </div>
                
                
                
                
                            
	<div class="form-group col-lg-12">
					 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">11 . Approver History</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
			  	   <div class="form-group col-lg-12">
				
			        <table id="example" class="table table">
                <thead>
					
				
			
                 <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                				
				
				<th> PR ID</th>
				
				<th>Approver Name</th>				
				<th> Approver Comment </th>
				<th> Approver Status</th>  				
				<th>  Date / Time </th>  
				
                </tr>  
			
				
                </thead>
				

                <tbody>
				
				 <tr style="background-color:  #FCF8E4">
	  
			
				
				 
 
				<?php $approval1_name= $this->method_call->fetch_emp_name($row->dh_id); ?>
						<td colspan=""  >  <?php echo $row->pr_id ?> </td>
						
					   
					<td colspan=""  > <?php echo $approval1_name ?> </td>
			
				 
				  <?php if($row->dh_comment == null){
					 
					  ?>
					   
					    <td colspan="" >APPORVAL PENDING FROM BUDGET DEPARTMENT</td>
					
				<?php	 
				 }else{
				?>
	 
				  <td colspan=""  > <?php  echo $row->dh_comment ?> </td>
                                  
				 <?php
				 }
				 ?>
				 
				 	 <td colspan=""  >  Recent Action </td>
					<td colspan=""  ><?php
	 
				  echo "--";
				
			?>  </td>
				  
				
				
      </tr> 
	  <!-- aPPROVER 2- -->.
				 <tr style="background-color:  #ccffcc">
	  
			
				
				 
 
				<?php $approval2_name= $this->method_call->fetch_emp_name($row->ph_id); ?>
						<td colspan=""  >  <?php echo $row->pr_id ?> </td>
					   
					<td colspan=""  > <?php echo $approval2_name ?> </td>
			
				 
				  <?php if($row->ph_comment == null){
					 
					  ?>
					   
					    <td colspan="" >APPORVAL PENDING FROM Plant Head DEPARTMENT</td>
					
				<?php	 
				 }else{
				?>
	 
				  <td colspan=""  > <?php  echo $row->ph_comment ?> </td>
                                  
				 <?php
				 }
				 ?>
				 
				 	 <td colspan=""  >  Recent Action  </td>
					<td colspan=""  ><?php
	 
				  echo "--"
				
			?>  </td>
				  
				
				
      </tr> 
			<!-- END -->
			
			
			<!-- APPROVER 3 -->
			
						
				 <tr style="background-color:  #ccddff">
	  
			
				
				 
 
				<?php $approval3_name= $this->method_call->fetch_emp_name($row->pr_source_id); ?>
						<td colspan=""  >  <?php echo $row->pr_id ?> </td>
					  
					<td colspan=""  > <?php echo $approval3_name ?> </td>
			
				 
				  <?php if($row->source_comment == null){
					 
					  ?>
					   
					    <td colspan="" >APPORVAL PENDING FROM SOURCING DEPARTMENT</td>
					
				<?php	 
				 }else{
				?>
	 
				  <td colspan=""  > <?php  echo $row->source_comment ?> </td>
                                  
				 <?php
				 }
				 ?>
				 
				 	 <td colspan=""  >  Recent Action  </td>
					<td colspan=""  ><?php
	 
				  echo "--";
				
			?>  </td>
				  
				  
				
				
      </tr> 
			<!-- END-->
			
			
	 				  <?php $item= $this->method_call->pr_approver_history_id($pr_id);
 if($item!=null){
	 	   
	  
foreach ($item->result() as $rowhistory)  
         {$appver_name= $this->method_call->fetch_emp_name($rowhistory->pr_approver_id);
         ?>  
	
			<tr>
				 <td> <?php echo $rowhistory->pr_id; ?> </td>
				
				 <td> <?php echo $appver_name; ?></td>
				 <td> <?php echo $rowhistory->pr_approver_cmt; ?></td> 
				 
			<td><?php echo $rowhistory->pr_approver_status; ?></td>
			<td><?php echo $rowhistory->pr_approver_date; ?></td>
			</tr>
	 

				
		 <?php  }
 } ?>
                
				</tbody>
				

	  
	  
	  </tbody>
               		
              </table>
		
		  </div>
			  
			
			
              </div> </div> </div></div>

	  	
			
			<div class="form-group col-sm-12">
			<center>
<button type="button" onclick="window.print();" id= "printbtn" class="btn" style="width: 10%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">PDF</button>
</center>
				<div class="col-sm-4">
				
				
			
			<?php	 } ?>

         
                </div>
                </div> 

			
			  
			  
			  
			  
			
              <!-- /.box-body -->
              <div class="box-footer">
			   	 	
	
		 <div class="form-group col-sm-12" id="pr_atta">
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
		
		  <div class="form-group col-sm-12" id="q_btn">

			<center>
			
			  </center>
              </div>
		 
			  
	
	   
			   
	   

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

