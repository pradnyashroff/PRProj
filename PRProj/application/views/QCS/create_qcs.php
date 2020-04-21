 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create QCS</title>
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
       Create QCS
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

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create QCS
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
     <section class="content" id="content">
	  <div class="wrapper">
	    <div class="box-body">
	  
							  <?php $pr_detail= $this->method_call->pr_detail($pr_id);
 if($pr_detail!=null){
	 foreach ($pr_detail->result() as $row)  
         {  ?>
	  
	  
      <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Basic Pr Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
			  
			   <div class="box-body">
			  
			  <div class="form-group col-lg-4">
			  
			  <label class="col-lg-1 pull-left control-label">1</label>
			   <label class="col-lg-4 pull-left control-label">PR Number </label>
				<div class="input-group  col-lg-6">
                 
               
            <?php echo $row->pr_id; ?>
    
                </div>
                </div>
				 <div class="form-group col-lg-4">
				 <label class="col-lg-1 pull-left control-label">2</label>
			   <label class="col-lg-4 pull-left control-label"> Plant </label>
				<div class="input-group  col-lg-6">
                                    <?php echo $row->plant_code; ?>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-lg-4">
			  
			  <label class="col-lg-1 pull-left control-label">3</label>
			   <label class="col-lg-4 pull-left control-label">PR Date</label>
				<div class="input-group  col-lg-6">
                  
				<?php echo $row->pr_date; ?>

               
         
                </div>
                </div>
				  <div class="form-group col-lg-4">
			  
			  <label class="col-lg-1 pull-left control-label">4</label>
			   <label class="col-lg-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-lg-6">
				
				
				
                          
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
		<?php print_r($pr_type_nm['pt_name']); ?>
					
							
          
         
                </div>
                </div>
			  
			  <div class="form-group col-lg-4">
			  
			  <label class="col-lg-1 pull-left control-label">5</label>
			   <label class="col-lg-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-lg-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-lg-4">
			  
			  <label class="col-lg-1 pull-left control-label">6</label>
			   <label class="col-lg-4 pull-left control-label">Department</label>
				<div class="input-group  col-lg-6">
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
<?php print_r($dept_nm['dept_name']); ?>
    
         
                </div>
                </div></div></div></div>
				
				
				
				
				 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Requirement Details</h3>

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
            <?php
                    $approx_rate=$row3->approx_total_amt;
					$final_rate=$final_rate+$approx_rate;
            ?>
                
      </tr>
	 
		 <?php  $sr_no++; }
 } ?>
                
				</tbody>
               		
              </table>
			
			  </div> </div> </div> </div>
			  
			  		
			  	 <div class="form-group col-lg-12">
			  
			  <label class="col-lg-4 pull-left control-label"></label>
			   <label class="col-lg-5 pull-left control-label">Cumulative Total Amount of PR <?php echo $row->pr_id; ?> : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
				<div class="input-group  col-lg-8 pull-right">

                </div>
			  </div>	 		
				
			  
			  <div class="form-group col-lg-6">
			  <br>
			  <label class="col-lg-1 pull-left control-label">3</label>
			   <label class="col-lg-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-lg-6">
				
				
				<?php echo $row->delivary_loc; ?>
							
						
							
                </div>
                </div>
				
			   
			  <div class="form-group col-lg-6">
			 
			 <label class="col-lg-1 pull-left control-label">4</label>
			   <label class="col-lg-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-lg-6">
                                                
			<?php echo $row->inspection_req;  ?>
				
				 </select>          
               
         
                </div>
                </div>
				
				
				  <div class="form-group col-lg-6">
			  
			 <label class="col-lg-1 pull-left control-label">5</label>
			   <label class="col-lg-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-lg-6">
             
				<?php echo $row->budget_consider;  ?>

         
                </div>
                </div>
				
			<!--    <div class="form-group col-lg-6">
			  
			 <label class="col-lg-1 pull-left control-label">11</label>
			   <label class="col-lg-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-lg-6">
                <?php echo $row->cust_cost;  ?>
         
                </div><br>
							 <label class="col-lg-1 control-label"></label>

				  <label class="col-lg-5 control-label" id="lab">Depending Field</label>
				<div class="input-group  col-lg-6">
                 
                            <?php echo $row->cust_cost_val;  ?>
         
                </div>
                </div>
                -->
                
                	<div class="form-group col-lg-6">
			  
			  <label class="col-lg-1 pull-left control-label">6</label>
			   <label class="col-lg-5 pull-left control-label">Customer Cost - Upfront (In Rs.) </label>
				<div class="input-group  col-lg-6">
                 <?php echo $row->cust_cost_upfront; ?>
               
                                 
    
                </div>
                </div>
				
				
				  <div class="form-group col-lg-6">
			  
			  <label class="col-lg-1 pull-left control-label">7</label>
			   <label class="col-lg-5 pull-left control-label">Customer Cost - Amortization  (In Months) </label>
				<div class="input-group  col-lg-6">
                 
               
                                    <?php echo $row->cust_cost_amortization; ?>
    
                </div>
                </div>

				
			
				   <div class="form-group col-lg-6">
			  
			  <label class="col-lg-1 pull-left control-label">8</label>
			   <label class="col-lg-5 pull-left control-label">Own Investment (Recovery Period In Months)	 </label>
				<div class="input-group  col-lg-6">
                 
               
                                   <?php echo $row->own_investment; ?>
                </div>
                </div>
                	<div class="form-group col-lg-6">
			  
			 <label class="col-lg-1 pull-left control-label">9</label>
			   <label class="col-lg-5 pull-left control-label">Fund NO/ION NO</label>
				<div class="input-group  col-lg-6">
                 
                                             <?php echo $row->ion_no;  ?>

         
                </div>
                </div>
			
			  <div class="form-group col-lg-6">
			  
			 <label class="col-lg-1 pull-left control-label">10</label>
			   <label class="col-lg-5 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-lg-6">
                 
                                             <?php echo $row->procurement_res;  ?>

         
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
              <!-- /.box-body -->
              <div class="box-footer">
			   	 	
 <form method="post" action="<?php echo site_url('purchase/QCS/source_update_pr') ?>" >

			    <div class="form-group col-lg-12">
			  
			 <label class="col-lg-1 pull-left control-label">12</label>
			 <label class="col-lg-3 pull-left control-label">Action</label>
			 
				<div class="input-group  col-lg-8">
									<input type="radio" name="pr_state" value="sourcing_approved" required >&nbsp;&nbsp;  APPROVE</input>
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <input type="radio" name="pr_state" value="sourcing_reject" > &nbsp; &nbsp; REJECT</input>

         
                </div>
                </div>
				<div class="form-group col-lg-12">
			  
			 <label class="col-lg-1 pull-left control-label">13</label>
			   <label class="col-lg-3 pull-left control-label">Sourcing Comment</label>
				<div class="input-group  col-lg-8">
                 
                                        <textarea class="form-control" rows="4" cols="50" name="source_comment" required> </textarea>

         
                </div>
                </div>
				
			  
			    <div class="form-group col-lg-12">
<div class="col-lg-4"><input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>"></input>

<input type="hidden" name="pr_by_id" value="<?php echo $row->pr_owner;  ?>"></input>
<input type="hidden" name="approval_id" value="<?php echo $emp_code;  ?>"></input>
<input type="hidden" name="final_rate" value="<?php echo $final_rate;  ?>" class="form-control"  required>
</div>
<div class="col-lg-3"><button type="submit" id="btn-submit" class="btn" style="width: 40%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed</button></div>
<div class="col-lg-3"><button type="button" onclick="window.print();" class="btn" style="width: 40%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">PDF</button></div>
				
                </div>
				
					<!-- email owner-->
								 <div class="form-group col-lg-4 hidden">
			  
			  <label class="col-lg-1 pull-left control-label">7</label>
			   <label class="col-lg-4 pull-left control-label">email owner</label>
				<div class="input-group  col-lg-6">
                  <input type="text" value="<?php echo $row->pr_owner; ?>" readonly   name="owner_id" class="form-control"  required>
  <?php $eid_owner= $this->method_call->fetchemp_email($row->pr_owner); ?>
  <input type="text" name="emp_email" value="<?php print_r($eid_owner['emp_email']); ?>" readonly  class="form-control"  required>


                </div>	
				
				</div>
			</form>		
		 <div class="form-group col-lg-12">
<?php $filea= $this->method_call->filefetch($pr_id); //displaying ccs
 if($filea!=null){ 
  foreach ($filea->result() as $rowfile)  
         {  
 ?>
			  
			
			    <div class="form-group col-lg-4">
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
		 <?php }
 } ?>
      </div>
      <!-- /.row -->
	  
	
	  
	  
	  
	  
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
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