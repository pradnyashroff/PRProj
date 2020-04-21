<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Other Reimbursement</title> 
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


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" > 	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
              <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">OTHER REIMBURSEMENTS CLAIM DRAFT VIEW
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;">Other Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Other Claim Draft
                    </li>
                    </li>
                </ol>
            </section>
             <section class="content">
        <div class="wrapper">
          <?php $LocalClaimDetail= $this->method_call->otherClaimDetailsApproval($ocm_id);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row1)  
         {  ?>
		 <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/Other/Other_cntr/createClaimDraft') ?>" >
		 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Your Details</h3>
				<div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
              <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">1</label>
			  <label class="col-sm-3 pull-left control-label">Claim No.: </label>
			<div class="input-group  col-sm-6">
                                  <?php echo $row1->ocm_id; ?>
                </div>
                </div>
                <div class="form-group col-sm-4">
				<label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Plant: </label>
				<div class="input-group  col-sm-6">
				
				     <?php if ( $emp_dept == 12||$emp_dept == 13||$emp_dept == 100||$emp_dept == 26) { ?>
				 
				 <select class="form-control" required name="txtPlantId" onchange="dynamicPlant(this.value)">
							<option value="<?php echo $row1->plant_code; ?>"><?php echo $row1->plant_code;  ?></option>
			
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
     
	 foreach ($plantlist->result() as $row2)  
         {  ?>
			
			<option value="<?php echo $row2->plant_code; ?>"><?php echo $row2->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				  <?php }
                                  else { 
                                      ?>
                                               <?php echo $row1->plant_code; ?>
                                    <input class="form-control" type="hidden" name="txtPlantId" value="<?php echo $row1->plant_code; ?>"/>
				  <?php } ?>
				
                                     
           
               
         
                </div>
			  </div>
              <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-3 pull-left control-label">Claim Date :</label>
				<div class="input-group  col-sm-6">
                  
                                  <?php echo $row1->reg_date; ?>
                                       </div>
                </div>
                <div class="form-group col-sm-4">
                <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-3 pull-left control-label">Name:</label>
				<div class="input-group  col-sm-6">
                                    
                                    <?php echo $row1->emp_name; ?>
                            
                </div>
                </div>
                <div class="form-group col-sm-4">
                <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Grade: </label>
				<div class="input-group  col-sm-6">
                                    <?php echo $row1->grade; ?>
    
                </div>
                </div>
                <div class="form-group col-sm-4">
				<label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label"> Department:</label>
				<div class="input-group  col-sm-6">
                                     <?php echo $row1->dept_name; ?>
                                  
		</div>
			  </div></div></div></div>
			  <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Invoice Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
			       <div class="table-responsive">
        <table id="example" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No.</th>
                  <th>Invoice Date</th>
                  <th>Invoice No</th>
                  <th>Supplier Name</th>
                  <th>Reason</th>
                  <th>Amount</th>
                  <th>Attachment</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchOtherReimDetailsByClaimId($ocm_id);
                 $final_rate=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                    <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#edit" onclick="edit_person(<?php echo $row->ocd_id; ?>)" ><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->invoice_date; ?></td>
                  <td><?php echo $row->invoice_no; ?></td>
                  <td><?php echo $row->supplier_name; ?></td>
                  <td><?php echo $row->being; ?></td>
                  <td><?php echo $row->amount; ?></td>
                  <td>
                       <a style="color: #337ab7;" href="<?php echo base_url()."uploads/otherReim/".$row->ack_file;?>"><?php print_r($row->ack_file); ?></a>
                    <?php

				$total_rate=$row->amount;
					$final_rate=$final_rate+$total_rate;
				?>
    <td><a href="#" onclick="deleteData('<?php echo $row->ocd_id; ?>')"><span class='glyphicon glyphicon-trash' style='color:red;'></span></a></td>
                  
                  </tr>
                	 <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
              </div>
                       
                  <div class="form-group col-sm-12">
                      <div class="form-group col-sm-7"></div>
			
                          <div class="form-group col-sm-4">
                              <label class="col-sm-12 pull-left control-label" style="margin-left: 35%"><h5>Total Amount : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?></h5> </label>
                           
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			     
                  <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button>
                                    </center>
                </div>  </div>  </div>  </div> 
							<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Bank Account Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
                
                                    <input class="form-control" type="hidden" name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                        <input class="form-control" type="hidden" name="txtFinalRate" value="<?php echo $final_rate; ?>"/>
                                       <input class="form-control" type="hidden" name="txtClaimId" value="<?php echo $ocm_id; ?>"/>
                                          <!-- bank details--->
                               
	          
                <div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			  <label class="col-sm-3 pull-left control-label">Bank Name: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" style="background-color:#E6F2FF;" id="txtBankName" readonly value=" <?php echo $row1->bank_name; ?>" name="txtBankName"/>
                </div><br>
                </div>
                <div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			  <label class="col-sm-3 pull-left control-label">Account No.: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" style="background-color:#E6F2FF;" id="txtAccountNo" readonly value=" <?php echo $row1->acc_no; ?>" name="txtAccountNo"/>
                </div><br>
                </div>
                <div class="form-group col-sm-12">
			 <label class="col-sm-1 pull-left control-label">3</label>
			  <label class="col-sm-3 pull-left control-label">IFSC Code: </label>
				<div class="input-group  col-sm-6">
                               <input type="text" class="form-control" style="background-color:#E6F2FF;" id="txtIFSC" readonly  value=" <?php echo $row1->ifsc; ?>" name="txtIFSC"/>
                                </div><br>
                </div>
                                  
               <div class="form-group col-sm-12">
			 <label class="col-sm-1 pull-left control-label">4</label>
			  <label class="col-sm-3 pull-left control-label">Justification: </label>
				<div class="input-group  col-sm-6">
                               <textarea class="form-control" rows="4" cols="50" name="areaJustification" required><?php echo $row1->justification; ?></textarea>

                </div>
                </div><?php $reporting_autho=$this->method_call->fetchReportingDetails($emp_code);?>
                                        <input class="form-control" type="hidden" name="txtRepAutho" value="<?php print_r($reporting_autho['reporting_autho']); ?>"/>
                                    
                                        
                                  
                                  
			</div>
			</div></div>
          <div class="form-group col-sm-12"><br>
		<label class="col-sm-1 pull-left control-label">4</label>
		<label class="col-sm-3 pull-left control-label">Action On Claim</label>
			   <div class="input-group  col-sm-6 pull-left">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="claim_state" value="draft" required > &nbsp; &nbsp; Save as Draft</input>
				
                      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
                 
                                    <input type="radio" name="claim_state" value="submited_dh" >  &nbsp; &nbsp;Submit for Approval</input>

         
                </div>
                           
                </div>
			<!-- end -->
                             <?php }
 } ?>           
                        
                         <!------Mail Details Code Start From here--->
                           <?php $hodEmail=$this->method_call->fetchHODMailDetailsForClaimer($emp_code);?>
                             <input class="form-control" type="hidden" name="txtHodEmail" value="<?php print_r($hodEmail['hodEmail']); ?>"/>
                                        <?php $SancAuthoEmail=$this->method_call->fetchSancAuthoMailDetailsForClaimer();?>
                             <input class="form-control" type="hidden" name="txtSancAuthoEmail" value="<?php print_r($SancAuthoEmail['SancAuthoEmail']); ?>"/>
                                        <input class="form-control" type="hidden" name="txtEmpName" value="<?php print_r($emp_name); ?>"/>
                                       
                                       
                                       <?php $claimerPlant=$this->method_call->getClaimerPlant($ocm_id);?>
                                         <input class="form-control" type="hidden" name="txtPlantCode" id="txtPlantCode" value="<?php print_r($claimerPlant['claimerPlant']); ?>"/>
                                        
                                       
                                       
                                        <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                        <input class="form-control" type="hidden" name="txtDeptName" value="<?php print_r($dept_nm['dept_name']); ?>"/>
                                        <?php $reg_date=$this->method_call->fetchVoucherDate($ocm_id);                                         ?>
                                       <input class="form-control" type="hidden" name="txtClaimDate" value="<?php print_r($reg_date['reg_date']); ?>"/>
                                        
                                    <!------Mail Details Code End here--->
                                       
                          <div class="form-group col-sm-12">        
                        <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Save Claim Details</button>
                                    </center></div>    
									</form>
           
                         
       
        </div>
        <!-- /.box-body -->
     
      </div>
      <!-- /.box -->
  
            </section>
<!-- /.content -->
<!--Add local reimbursement details model start form here-->
<div class="modal fade displaycontent" id="myModal">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
           <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Claim Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">

                        
                        
                            <br>

                        <form method="post" role="form" enctype="multipart/form-data" id="add_localRim_details" name="add_localRim_details" action="<?php echo site_url('ELAR/Other/Other_cntr/addOtherReimDetailsDraft') ?>" >
                                    <input class="form-control" type="hidden" name="txtClaimId" value="<?php echo $ocm_id; ?>"/>
                            <div class="row">
                                 
                                <div class="col-sm-12" style="  ">
                                    <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                    <div class="form-group col-md-6">
                                        <label >Invoice Date</label>
                                        <input class="form-control"  readonly type="text" required name="datepicker" value="" id="datepicker"/>		
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label >Invoice No</label>
                                        <input class="form-control"  type="text" required name="txtInvoiceNo" id="txtInvoiceNo"/>		
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label >Supplier Name</label>
                                        <input class="form-control"  type="text" required name="txtSupplierName" id="txtSupplierName"/>		
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label >Invoice Amount</label>
                                            <input class="form-control"  type="number"  name="txtAmount" value="" id="txtAmount" data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="areaReason"></textarea>  
                                     </div>
                                     
                                    <div class="form-group col-md-6">
                                        <label >Invoice Attachment</label>
                                        <input class="form-control"  type="file"  name="picture" />		
                                    </div>
                                     </div>
                                <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
<!--Add local reimbursement details model end form here-->
<!--Edit delete action model pop up start from here-->
<div class="modal fade displaycontent" id="edit">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
             <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Claim Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('ELAR/Other/Other_cntr/updateOtherRimDetails') ?>" >

                            
                            <div class="row">
                                 
                                <div class="col-sm-12" style="  ">
                                    <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                    <input class="form-control"  type="hidden" required name="editId"/>
                                    <div class="form-group col-md-6">
                                        <label >Invoice Date</label>
                                        <input class="form-control"  readonly type="text" required name="editDatepicker" value="" id="editDatepicker"/>		
                                    </div>
                                         <div class="form-group col-md-6">
                                        <label >Invoice No</label>
                                        <input class="form-control"  type="text" required name="editTxtInvoiceNo" id="editTxtInvoiceNo"/>		
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label >Supplier Name</label>
                                        <input class="form-control"  type="text" required name="editTxtSupplierName" id="editTxtSupplierName"/>		
                                    </div>
                                    
                                       
                                     <div class="form-group col-md-6">
                                        <label >Total Amount</label>
                                            <input class="form-control"  type="number"  name="editTxtAmount" value="" id="editTxtAmount" data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="editAreaReason"></textarea>  
                                     </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label  >Invoice Attachment</label>
                                        <div class="div_imagetranscrits">
                                        </div>
                                    </div>
                                     </div>
                                <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Details</button></center> 
                                </section>

                            </div>
                            </div>
            </div>
            
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Edit delete action model pop up end from here-->
 <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script> 
    $(function () {
      
      $('#example').excelTableFilter();
   
    });
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
     //Date picker
    $('#editDatepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
  </script>
  
  
  <script>
  
    function dynamicPlant(plantCode){
         
           document.getElementById("txtPlantCode").value = plantCode;
          
      }
  
      function get_data(id)
{
    //alert(id);
   if(document.add_localRim_details.comboVehicle.value != '2'){
		document.add_localRim_details.txtAmount.disabled=1;
                document.add_localRim_details.txtKM.disabled=0;  
                document.add_localRim_details.txtKM.value=0;  
    }
	else {
		document.add_localRim_details.txtAmount.disabled=0;
                 document.add_localRim_details.txtKM.disabled=1;
            }
    
           
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/local_reim/Local_cntr/getRateFromVehicle')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="txtCrrKmRate"]').val(data.rate);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
}



      </script>
      
       <script>
      function deleteData(delete_id){
          
          $.ajax({
        url : "<?php echo site_url('ELAR/Other/Other_cntr/deleteOtherData')?>/" + delete_id,
        type: "GET",
        dataType: "JSON",
        success: function()
        {
          
        }
            
            
        });
        location.reload();
        
      }
      </script>
  <script>
      function edit_person(id)
{
    //alert(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/Other/Other_cntr/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   $('[name="editId"]').val(data.ocd_id);
            $('[name="editDatepicker"]').val(data.invoice_date);
            $('[name="editAreaReason"]').val(data.being);
            $('[name="editTxtAmount"]').val(data.amount);
            $('[name="editTxtInvoiceNo"]').val(data.invoice_no);
            $('[name="editTxtSupplierName"]').val(data.supplier_name);
            $('.div_imagetranscrits').html('<img src="<?php echo base_url()."uploads/otherReim/"?>' + data.ack_file + '" style="height:100px;width:100px" />');
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

      </script>
  
  <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example').DataTable({
      'columnDefs': [
         {
            'targets': 0,
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

 <script type="text/javascript">
     
     function calulate_total(){
          var txtKM = document.getElementById('txtKM').value;
          var txtCrrKmRate = document.getElementById('txtCrrKmRate').value;
          var txtTotal='Total KM Running In Rupees - &#x20b9; ';
           var result = parseFloat(txtKM) * parseFloat(txtCrrKmRate);
            if (!isNaN(result)) {
            document.getElementById('lbAmount').innerHTML  = txtTotal +' '+ result;
        }
           
     }
 
 </script>

</body>
</html>

