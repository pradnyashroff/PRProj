 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create QCS Step-1</title>
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
 <?php include_once 'headsidelistFTGS.php'; ?>	
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
       Create QCS (Step -1 : Supplier Details)
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

<li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create QCS Step -1
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
	  
	  
							  <?php $Ftgs_pr_detail= $this->method_call->ftgsprDetails($ftgs_pr_id);
 if($Ftgs_pr_detail!=null){
	 foreach ($Ftgs_pr_detail->result() as $row)  
         {  ?>
	  
	  
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  

          <div class="box">
 
            <!-- /.box-header -->
            <!-- form start -->
		

<form method="post" id="main_form" action="<?php echo site_url('FTGS_PR/Ftgs_pr/insertQcsStepOne'); ?>" enctype='multipart/form-data'>
              <div class="box-body">
			  
			  <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6" >
                 <input type="hidden" value="<?php echo $row->ftgs_pr_owner_code; ?>" name="txtprempcode" class="form-control"  required>

    
         
                </div>
                </div>
				
			
				  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" value="auto-genrated" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
				
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" style="background-color:#E6F2FF;" readonly name="txtftgsId" value="<?php echo $ftgs_pr_id; ?>" class="form-control"  required>
                                      <p style="color:red;font-size:15px;">  
	<!--<span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#pr_view_Modal"href="#pr_view_Modal<?php echo $row->ftgs_pr_id?>">&nbsp;<?php echo $row->ftgs_pr_id; ?></span>-->
				</p>
    
                </div>
                </div>
			
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" style="background-color:#E6F2FF;" readonly name="qcs_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
                  <?php
											$emp_dept=$row->ftgs_dept_id;
											$dept=$this->method_call->department($emp_dept);
										 ?>
										
    <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php print_r($dept['dept_name']); ?>" name="txtDeptName" readonly  style=" line-height: 10px;padding: 0px 8px;   float: none;">

         
                </div>
				<input type="hidden" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->ftgs_dept_id; ?>" name="txtDeptID" readonly  style=" line-height: 10px;padding: 0px 8px;   float: none;">
				
                </div>
			  
			 
			 
			 
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
					<?php
									$pr_type=$this->method_call->pr_type();
									if($pr_type!=null)
									{
										foreach($pr_type->result() as $prtype)
										{?>
											
										<?php }
									}
								?>
								<input type="hidden" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->ftgs_pr_type; ?>" name="txtPRTypeID" readonly  style=" line-height: 10px;padding: 0px 8px;   float: none;">

								<input type="text" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $prtype->pt_name; ?>" name="txtPrTypeNm" readonly  style=" line-height: 10px;padding: 0px 8px;   float: none;">

                </div>
                </div>
						
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
          			
									<input type="text" value="<?php echo $emp_name; ?>" name="txtQcsName" class="form-control"  required>
										<input type="hidden" value="<?php echo $emp_code; ?>" name="txtQcsempcode" class="form-control"  required>
									
         
                </div>
                </div>
			
		<div class="input-group  col-sm-6">
		 
		  </div>
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
                 <input type="text" value="<?php echo $row->ftgs_plant_code; ?>" name="txtPlantCode" class="form-control"  required>
                
                </div>
                </div> 
				
					 <div class="form-group col-sm-4 hidden">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Pr Owner emp</label>
				<div class="input-group  col-sm-6">
                  <input type="text" value="<?php echo$row->ftgs_pr_owner_name; ?>" name="txt_sourcing1_Autho" class="form-control"  required>
                
                
                </div>
                </div>
				
			  
			    <div class="form-group col-sm-12">
			  
			  <label class="col-sm-6 pull-left control-label">8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Supplier Details in the following Table: </label>
			  </div>
			  
			  		    <div class="form-group col-sm-12">
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
          		
                <tbody>
				
				 
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
	  
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="2" style="text-align:right;">Detail</td>
								 <td style="display:none"> </td>
				<td colspan="3" ><center>  Name <center> </td>
				 <td colspan="3" ><center>Contact Number  <center> </td>
				
				 <td colspan="3" > <center>Contact Person   <center> </td>
				
				  <td colspan="3" > <center> Contact Mail ID<center>    </td>
				 
				
                
      </tr>

	  	<tr>
								
								<!--  supplier1  08/03/2020  -->
								<td><input type="radio" name="rdo_Final_Supplier" value="new_Final_Supplier" onclick="ClearFields()">New Supplier</td>
								<td><input type="radio" name="rdo_Final_Supplier" value="old_Final_Supplier" checked="check" onclick="ClearFields()">Final Supplier</td>
								
									<td colspan="3"  ><div id="new_final_nm" style="display:none;"><input type="text" id="new_sup1_nm" name="sup1_name" class="form-control full_width"   > </div>
									<div id="old_final_nm" > 
									<select class="form-control select2" id="old_sup1_nm" name="sup1_nm" onChange="funSupData(this.value);">
									
									
										<?php $dataList= $this->method_call->supplierList(); ?>
										<?php                                                 
											foreach($dataList as $ser)
											{
												
										?>
										
										<option  value="<?php echo $ser['ftgs_qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
										
										
										<?php }?>
									</select></div>
								</td>
								<td colspan="3"><input type="text" pattern="[0-9]{10}" placeholder="Enter 10 Digit Number" id="old_sup1_mno" name="sup1_mno" class="form-control full_width"   >
								</td>
								
								<td colspan="3"><input type="text" id="old_sup1_contactp" name="sup1_contactp" class="form-control full_width">
								</td>
								
								<td colspan="3"><input type="email" id="old_sup1_eid"name="sup1_eid" class="form-control full_width"   > 
								</td>
							</tr> 
							
									
							<!--Supplier 2 08/03/2020 -->
							<tr>
								<td><input type="radio" name="rdo_Supplier_2"  value="new_Supplier2" onclick="ClearSupplier2()">New Supplier 2</td>
								<td><input type="radio" name="rdo_Supplier_2" checked="check" value="old_Supplier2" onclick="ClearSupplier2()">Supplier-2</td>
								
								<td colspan="3"><div id="new_sup2nm"  style="display:none;"><input type="text" id="old_sup2_nm" name="sup2_name" value="" class="form-control full_width" ></div>
								<div id="old_sup2nm"><select class="form-control select2" id="txt_sup2_nm" name="sup2_nm" onChange="funSup2Data(this.value);">
										<?php $dataList= $this->method_call->supplierList(); ?>
										<?php                                                 
											foreach($dataList as $ser)
											{
												
										?>
										<option  value="<?php echo $ser['ftgs_qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
										<?php }?>
									</select></div></td>
								
								<td colspan="3"><input type="text"  placeholder="Enter 10 Digit Number"  id="old_sup2_mno" name="sup2_mno" value="" class="form-control full_width"   > </td>
								
								<td colspan="3"><input type="text"  name="sup2_contactp" value="" id="old_sup2_contactp" class="form-control full_width"   > </td>
								
								<td colspan="3"  ><input type="email" id="old_sup2_eid"  name="sup2_eid" value="" class="form-control full_width"> </td>
							</tr> 
							
								<!--Supplier 3 08/03/2020 -->
							<tr>
								<td><input type="radio" name="rdo_supplier3" value="new_Supplier3" onclick="ClearSupplier3()">New Supplier 3 </td>
								<td><input type="radio" name="rdo_supplier3" checked="check" value="old_Supplier3" onclick="ClearSupplier3()"> Supplier-3</td>
								
								<td colspan="3"  ><div id="new_sup3_nm" style="display:none;"> <input type="text" id="old_sup3_nm" name="sup3_name" class="form-control full_width"   > </div>
								<div id="old_sup3_nms" > <select class="form-control select2" id="txt_sup3_nm" name="sup3_nm" onChange="funSup3Data(this.value);">
										<?php $dataList= $this->method_call->supplierList(); ?>
										<?php                                                 
											foreach($dataList as $ser)
											{
											
										?>
										<option  value="<?php echo $ser['ftgs_qcs_id'] ?> - <?php echo $ser['sname'];  ?>" ><?php echo $ser['sname'];  ?></option>
										<?php }?>
									</select> </div></td>
								
								<td colspan="3" ><input type="text"  placeholder="Enter 10 Digit Number" id="old_sup3_mno" name="sup3_mno" class="form-control full_width"   ></td>
								
								<td colspan="3"  ><input type="text" id="old_sup3_contactp" name="sup3_contactp" class="form-control full_width"   > </td>
								
								<td colspan="3"  ><input type="email" id="old_sup3_eid" name="sup3_eid" class="form-control full_width"   > </td>
								
							</tr> 
							

				</tbody>
               		
              </table>
			
			  </div>
			  
			   <?php
								$ftgsActionData = $this->method_call->ftgsDetailsSourcing1Action($emp_code,$ftgs_pr_id);
							
								if ($ftgsActionData != null) {
								foreach ($ftgsActionData->result() as $row1) {
										?>
                            <input type="hidden" name="Ftgs_action_id" class="form-control" value="<?php echo $row1->action_grid_id;?>">
								<?php
								}
								}
								?>
                              
			
			
			
			
			   <div class="col-sm-12">
			    <div class="col-sm-4">
				</div>
				  <div class="col-sm-2">
			
			   <button type="submit" id="" name="step2_pending" value=""class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Procced</button>
			   	</div>
				 <div class="col-sm-2">
                <a href="<?php echo site_url('purchase/QCS/in_process_master_source') ?>" class="btn" style="width: 60%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Cancel</a>
				</div>
                 <div class="col-sm-4">
				</div>
                 </div>
				 
				
				 </form>
           
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

   function funSupData(ftgs_qcs_id){
		alert(ftgs_qcs_id);
		var supplier1 = ftgs_qcs_id.split('-')[0];
		
		$.ajax(
        {
            type: "post",
            url: "<?php echo base_url(); ?>index.php/FTGS_PR/Ftgs_pr/selectSuplier1",
            data:{'ftgs_qcs_id':supplier1},
            dataType: 'JSON',
            success:function(data)
            {
				
				
				$('[id="old_sup1_mno"]').val(data.ftgs_sup1_contact_no);
				$('[id="old_sup1_contactp"]').val(data.ftgs_sup1_contact_person);
				$('[id="old_sup1_eid"]').val(data.ftgs_sup1_eid);
	        }
        });
	 }
	 
	function funSup2Data(ftgs_qcs_id){
		var supplier2 = ftgs_qcs_id.split('-')[0];
		
    $.ajax(
        {
			type: "post",
            url: "<?php echo base_url(); ?>index.php/FTGS_PR/Ftgs_pr/selectSuplier1",
            data:{'ftgs_qcs_id':supplier2},
            dataType: 'JSON',
            success:function(data)
            {
				$('[id="old_sup2_mno"]').val(data.ftgs_sup1_contact_no);
				$('[id="old_sup2_contactp"]').val(data.ftgs_sup1_contact_person);
				$('[id="old_sup2_eid"]').val(data.ftgs_sup1_eid);
            }
        });
	}
       function funSup3Data(ftgs_qcs_id){
		   var supplier3 = ftgs_qcs_id.split('-')[0];
		
          $.ajax(
			{
				type: "post",
				url: "<?php echo base_url(); ?>index.php/FTGS_PR/Ftgs_pr/selectSuplier1",
				data:{'ftgs_qcs_id':supplier3},
				dataType: 'JSON',
				success:function(data)
				{
					$('[id="old_sup3_mno"]').val(data.ftgs_sup1_contact_no);
					$('[id="old_sup3_contactp"]').val(data.ftgs_sup1_contact_person);
					$('[id="old_sup3_eid"]').val(data.ftgs_sup1_eid);
	            }
			});
		  }
        
   
   
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

<script>
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
	document.getElementById("old_sup1_nm").value = "";
	document.getElementById("new_sup1_nm").value = "";
     document.getElementById("old_sup1_mno").value = "";
     document.getElementById("old_sup1_contactp").value = "";
	 document.getElementById("old_sup1_eid").value = "";
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
	document.getElementById("old_sup2_nm").value = "";
	document.getElementById("txt_sup2_nm").value = "";
     document.getElementById("old_sup2_mno").value = "";
     document.getElementById("old_sup2_contactp").value = "";
	 document.getElementById("old_sup2_eid").value = "";
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
	document.getElementById("old_sup3_nm").value = "";
	document.getElementById("txt_sup3_nm").value = "";
     document.getElementById("old_sup3_mno").value = "";
     document.getElementById("old_sup3_contactp").value = "";
	 document.getElementById("old_sup3_eid").value = "";
}
</script>

</script>



  </body>
</html>