 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Draft QCS Step-1</title>
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
       Draft QCS (Step -1 : Supplier Details)
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

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Draft QCS Step -1
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
	  
	  
							  <?php $pr_detail= $this->method_call->qcs_detail_steptwo($qcs_id);
 if($pr_detail!=null){
	 foreach ($pr_detail->result() as $row)  
         {  ?>
	  
	  
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  

          <div class="box">
 
            <!-- /.box-header -->
            <!-- form start -->
		

<form method="post" id="main_form" action="<?php echo site_url('purchase/QCS/draft_step1') ?>" enctype='multipart/form-data'>
              <div class="box-body">
			  
			  <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 
<?php echo $row->pr_owner_name; ?>
    
         
                </div>
                </div>
				
			
				  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">1</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               <input type="text" name="draft_q_no" value="<?php echo $row->qcs_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">2</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;">PR NO </label>
				<div class="input-group  col-sm-6">
                 
              <input type="text" readonly style="background-color:#E6F2FF;" name="pr_id" value="<?php echo $row->pr_id; ?>" class="form-control"  required>
    
                </div>
                </div>
			
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label" style="color:#3482AE;">3</label>
			   <label class="col-sm-4 control-label" style="color:#3482AE;">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly name="qcs_date" value="<?php echo $row->qcs_date; ?>"  style=" line-height: 10px;padding: 0px 8px;   float: none;">

               
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">4</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;">Department</label>
				<div class="input-group  col-sm-6">
                  <input type="hidden" value="<?php echo $row->dept_id; ?>" readonly   name="dept_id" class="form-control"  required>
  <?php $dept_nm= $this->method_call->fetch_dept_nm($row->dept_id); ?>
  <input type="text" value="<?php print_r($dept_nm['dept_name']); ?>" style="background-color:#E6F2FF;" readonly  class="form-control"  required>
  
    
         
                </div>
                </div>
			  
			 
			 
			 
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">5</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;">PR Type</label>
				<div class="input-group  col-sm-6">
				
				
				
                             <select class="form-control" style="background-color:#E6F2FF;" readonly required name="pr_type">
				
 <?php $pr_type_nm= $this->method_call->fetch_pr_type_nm($row->pr_type); ?>
  
				<option value="<?php echo $row->pr_type; ?>" ><?php print_r($pr_type_nm['pt_name']); ?></option>
							
							  <?php $list= $this->method_call->pr_type();
 if($list!=null){
	 foreach ($list->result() as $row1)  
         {  ?>
			
			<option value="<?php echo $row1->pt_id; ?>"><?php echo $row1->pt_name;  ?></option>
			
	<?php }
				}
				?>
							 </select>
          
         
                </div>
                </div>
						
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">6</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;"> QCS Owner</label>
				<div class="input-group  col-sm-6">
                 
                   <input type="text" value="<?php echo $row->qcs_owner; ?>" style="background-color:#E6F2FF;" readonly   name="owner_id" class="form-control"  required>
				                          
    
         
                </div>
                </div>
	
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label" style="color:#3482AE;">7</label>
			   <label class="col-sm-4 pull-left control-label" style="color:#3482AE;">Plant</label>
				<div class="input-group  col-sm-6">
                 
                 
				
				 <input type="Text" name="pr_plant" class=" form-control" id="pr_plant" style="background-color:#E6F2FF;" readonly value=" <?php echo $row->plant_code; ?>"" placeholder="PR Type" required>                          
    
         
                </div>
                </div>
				
				
				
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-5 pull-left control-label" style="color:#3482AE;"> 8. &nbsp;&nbsp;&nbsp;&nbsp; Supplier Details in the following Table: </label>
			  </div>
			  
			  		    <div class="form-group col-sm-12">
							<table id="example" class="table table">
          		                <tbody>
									<tr style="background-color:#3482AE;color:#FFFFFF;">
										<td colspan="2" >Detail</td>
										<td colspan="3" style="text-align:center;"><center>  Name <center> </td>
										<td colspan="3" style="text-align:center;" ><center>Contact Number  <center> </td>
										<td colspan="3" style="text-align:center;" > <center>Contact Person   <center> </td>
										<td colspan="3" style="text-align:center;"> <center> Contact Mail ID<center>    </td>
									</tr>
									<tr>
										<td><input type="radio" name="rdo_Final_Supplier" value="new_Final_Supplier" onclick="ClearFields()">New Supplier</td>
										<td><input type="radio" name="rdo_Final_Supplier" value="old_Final_Supplier" checked="check" onclick="ClearFields()">Final Supplier</td>
										
										<td colspan="3"  style="text-align:center;">  
											<div id="new_final_nm" style="display:none;"><input type="text" style="text-align:center;" value="<?php echo $row->sup1_nm; ?>" id="draft_sup1_nm" name="draft_sup1_nm" class="form-control full_width"></div> 
											<div id="old_final_nm" > <select class="form-control select2" id="draft_sup1_name" name="draft_sup1_name" onChange="funSupData(this.value);">
													<option value="<?php echo $row->sup1_nm; ?>"><?php echo $row->sup1_nm; ?></option>
														<?php $dataList= $this->method_call->supplierList(); ?>
														<?php                                                 
															foreach($dataList as $ser)
															{
														?>
														<option  value="<?php echo $ser['qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
														<?php 
															}
														?>
											</select>
										</div>
										</td>
										<td colspan="3"  style="text-align:center;">  <input type="text"  style="text-align:center;" value="<?php echo $row->sup1_contact_no; ?>"   id="draft_sup1_mno" name="draft_sup1_mno" class="form-control full_width"   > </td>
										<td colspan="3"  style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup1_contact_person; ?>" id="draft_sup1_contactp" name="draft_sup1_contactp" class="form-control full_width"   > </td>
										<td colspan="3"  style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup1_eid; ?>" id="draft_sup1_eid" name="draft_sup1_eid" class="form-control full_width" > </td>
									</tr> 
									<tr>
										<td><input type="radio" name="rdo_Supplier_2"  value="new_Supplier2" onclick="ClearSupplier2()">New Supplier 2</td>
										<td><input type="radio" name="rdo_Supplier_2" checked="check" value="old_Supplier2" onclick="ClearSupplier2()">Supplier-2</td>
										<td colspan="3" style="text-align:center;">
											<div id="new_sup2nm"  style="display:none;"><input type="text"  style="text-align:center;" value="<?php echo $row->sup2_nm; ?>" id="draft_sup2_nm" name="draft_sup2_nm" value="" class="form-control full_width"   ></div> 
											<div id="old_sup2nm"><select class="form-control select2" id="draft_sup2_name" name="draft_sup2_name" onChange="funSup2Data(this.value);">
												<option value="<?php echo $row->sup2_nm; ?>"><?php echo $row->sup2_nm; ?></option>
												<?php $dataList= $this->method_call->supplierList(); ?>
												<?php                                                 
													foreach($dataList as $ser)
													{
												?>
												<option  value="<?php echo $ser['qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
												<?php 
													}
												?>
											</select></div>
										</td>
										<td colspan="3" style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup2_contact_no; ?>"  id="draft_sup2_mno" name="draft_sup2_mno" value="" class="form-control full_width"   > </td>
										<td colspan="3" style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup2_contact_person; ?>" id="draft_sup2_contactp" name="draft_sup2_contactp" value="" class="form-control full_width"   > </td>
										<td colspan="3"  style="text-align:center;">  <input type="text"  style="text-align:center;" id="draft_sup2_eid" name="draft_sup2_eid" value="<?php echo $row->sup2_eid; ?>" class="form-control full_width" > </td>
									</tr> 
									<tr>
										<td><input type="radio" name="rdo_supplier3" value="new_Supplier3" onclick="ClearSupplier3()">New Supplier 3 </td>
										<td><input type="radio" name="rdo_supplier3" checked="check" value="old_Supplier3" onclick="ClearSupplier3()"> Supplier-3</td>
										<td colspan="3"  style="text-align:center;">  
											<div id="new_sup3_nm" style="display:none;"> <input type="text" style="text-align:center;" value="<?php echo $row->sup3_nm; ?>" id="draft_sup3_nm"  name="draft_sup3_nm" class="form-control full_width"   > </div>
												<div id="old_sup3_nms" > <select class="form-control select2" id="draft_sup3_name" name="draft_sup3_name" onChange="funSup3Data(this.value);">
														<option value="<?php echo $row->sup3_nm; ?>"><?php echo $row->sup3_nm; ?></option>
														<?php $dataList= $this->method_call->supplierList(); ?>
														<?php                                                 
															foreach($dataList as $ser)
															{
														?>
													<option  value="<?php echo $ser['qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
													<?php 
															}
													?>
												</select></div>
										</td>
										<td colspan="3"  style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup3_contact_no; ?>" id="draft_sup3_mno"  name="draft_sup3_mno" class="form-control full_width"   > </td>
										<td colspan="3"  style="text-align:center;">  <input type="text" style="text-align:center;" value="<?php echo $row->sup3_contact_person; ?>" id="draft_sup3_contactp" name="draft_sup3_contactp" class="form-control full_width"   > </td>
										<td colspan="3" style="text-align:center;">  <input type="text" style="text-align:center;" id="draft_sup3_eid" name="draft_sup3_eid" value="<?php echo $row->sup3_eid; ?>" class="form-control full_width"   > </td>
									</tr> 
							</tbody>
						</table>
					</div>
			  
			  	 				  <?php $item= $this->method_call->qcs_last_inserid();
 if($item!=null){
	 	//$sr_no=$qcs_id+1;   
	  
foreach ($item->result() as $row9)  
         {  ?>
	
	   <input type="hidden" readonly name="last_inserqcs_id" value="<?php echo $row9->qcs_id+1; ?>" class="form-control"  required>
	   
		 <?php  }
 } ?>
			  
			
			   <div class="col-sm-12">
			    <div class="col-sm-3">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" id="" name="step2_pending" value="step2_pending" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('purchase/QCS/Qcs_master_draft') ?>" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
				</div>
				
				 <div class="col-sm-2">
                <a href="<?php echo site_url('purchase/QCS/view_qcs_draft/'.$row->qcs_id) ?>" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Next</a>
				</div>
				
                 <div class="col-sm-3">
				</div>
                 </div>
				  <input type="hidden" readonly name="last_inserqcs_id" value="<?php echo $row9->qcs_id+1; ?>" class="form-control"  required>
           
					 <?php }
 } ?>
			  
              <!-- /.box-body -->
          
              <!-- /.box-footer -->
			    </form>
          </div>

        </div>
        <!--/.col (right) -->

      </div>
      <!-- /.row -->
	  
	
	  
	  
	  
	  
      <!-- /.row -->
   
    <!-- /.content -->
   <!-- /.content -->
  </div>
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
function funSupData(qcs_id){
		//alert(qcs_id);
		var supplier1 = qcs_id.split('-')[0];
		
		$.ajax(
        {
            type: "post",
            url: "<?php echo base_url(); ?>index.php/purchase/QCS/selectSuplier1",
            data:{'qcs_id':supplier1},
            dataType: 'JSON',
            success:function(data)
            {
				
				
				$('[id="draft_sup1_mno"]').val(data.sup1_contact_no);
				$('[id="draft_sup1_contactp"]').val(data.sup1_contact_person);
				$('[id="draft_sup1_eid"]').val(data.sup1_eid);
	        }
        });
	 }
	 
	function funSup2Data(qcs_id){
		var supplier2 = qcs_id.split('-')[0];
		
    $.ajax(
        {
			type: "post",
            url: "<?php echo base_url(); ?>index.php/purchase/QCS/selectSuplier1",
            data:{'qcs_id':supplier2},
            dataType: 'JSON',
            success:function(data)
            {
				$('[id="draft_sup2_mno"]').val(data.sup1_contact_no);
				$('[id="draft_sup2_contactp"]').val(data.sup1_contact_person);
				$('[id="draft_sup2_eid"]').val(data.sup1_eid);
            }
        });
	}
       function funSup3Data(qcs_id){
		   var supplier3 = qcs_id.split('-')[0];
		
          $.ajax(
			{
				type: "post",
				url: "<?php echo base_url(); ?>index.php/purchase/QCS/selectSuplier1",
				data:{'qcs_id':supplier3},
				dataType: 'JSON',
				success:function(data)
				{
					$('[id="draft_sup3_mno"]').val(data.sup1_contact_no);
					$('[id="draft_sup3_contactp"]').val(data.sup1_contact_person);
					$('[id="draft_sup3_eid"]').val(data.sup1_eid);
	            }
			});
		  }
        
//final supplier------------------------------08/03/2020
$("form input:radio").change(function () {
     if ($(this).val() == "new_Final_Supplier") {
        document.getElementById('new_final_nm').style.display = 'block';
		document.getElementById('old_final_nm').style.display = 'none';
       
    } else if($(this).val() == "old_Final_Supplier") {
		
		document.getElementById('old_final_nm').style.display = 'block';
		document.getElementById('new_final_nm').style.display = 'none';
	}
});
function ClearFields() {
	document.getElementById("draft_sup1_name").value = "";
	document.getElementById("draft_sup1_nm").value = "";
     document.getElementById("draft_sup1_mno").value = "";
     document.getElementById("draft_sup1_contactp").value = "";
	 document.getElementById("draft_sup1_eid").value = "";
}
//supplier 2 ----------------------------------------08/03/2020
$("form input:radio").change(function () {
     if ($(this).val() == "new_Supplier2") {
        document.getElementById('new_sup2nm').style.display = 'block';
		document.getElementById('old_sup2nm').style.display = 'none';
		
    } else if($(this).val() == "old_Supplier2") {
		
       document.getElementById('old_sup2nm').style.display = 'block';
		document.getElementById('new_sup2nm').style.display = 'none';
		
    }
});
function ClearSupplier2() {
	document.getElementById("draft_sup2_nm").value = "";
	document.getElementById("draft_sup2_name").value = "";
     document.getElementById("draft_sup2_mno").value = "";
     document.getElementById("draft_sup2_contactp").value = "";
	 document.getElementById("draft_sup2_eid").value = "";
}
//supplier 3 ----------------------------------08/03/2020
$("form input:radio").change(function () {
     if ($(this).val() == "new_Supplier3") {
        document.getElementById('new_sup3_nm').style.display = 'block';
		document.getElementById('old_sup3_nms').style.display = 'none';
		
    } else if($(this).val() == "old_Supplier3"){
		
       document.getElementById('old_sup3_nms').style.display = 'block';
		document.getElementById('new_sup3_nm').style.display = 'none';
		
    }
});
function ClearSupplier3() {
	document.getElementById("draft_sup3_name").value = "";
	document.getElementById("draft_sup3_nm").value = "";
     document.getElementById("draft_sup3_mno").value = "";
     document.getElementById("draft_sup3_contactp").value = "";
	 document.getElementById("draft_sup3_eid").value = "";
}
</script>




  </body>
</html>