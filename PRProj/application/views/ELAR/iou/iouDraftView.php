<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IOU Draft View</title> 
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
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">ADVANCE IOU REIMBURSEMENTS CLAIM FORM
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                 <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;">IOU Claim</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">IOU Draft View
                    </li>
                    </li>
                </ol>
            </section>
          
           <section class="content">
        <div class="wrapper">
             <?php $LocalClaimDetail= $this->method_call->iouClaimDetails($lou_clm_id);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row)  
         {  ?>
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
			   <label class="col-sm-4 pull-left control-label">Claim No.: </label>
				<div class="input-group  col-sm-6">
                                <?php echo $row->lou_clm_id; ?>
                </div>
                </div>
                 <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Plant: </label>
			<div class="input-group  col-sm-6">
                                      <?php echo $plant_code; ?>
                               
                     </div>
                </div>
                  <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Claim Date:</label>
				<div class="input-group  col-sm-6">
                  
                                   <?php echo $row->reg_date; ?>
                                 </div>
			
                </div>
                 <div class="form-group col-sm-4">
                <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Name:</label>
				<div class="input-group  col-sm-6">
                                       <?php echo $emp_name; ?>
                                  
                            
                </div>
                </div>
                  <div class="form-group col-sm-4">
                  <label class="col-sm-1 pull-left control-label">5</label>
					<label class="col-sm-4 pull-left control-label">Grade: </label>
				<div class="input-group  col-sm-6">
                                    <?php $grade=$this->method_call->getGradeDetails($emp_code);?>
                            <?php print_r($grade['grade']); ?>
    
                </div>
                </div>
                 <div class="form-group col-sm-4">
				 <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label"> Department:</label>
				<div class="input-group  col-sm-6">
                                    <input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="dept_id" class="form-control"  required>
                                    <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                    
                                  <?php print_r($dept_nm['dept_name']); ?>
                                  
		</div>
			  </div>  </div>  </div>  </div>
                           
                          	
                          <p>&nbsp;</p>
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/IOU/IouCntr/iouClaimDraftCreate') ?>" >
		
 	<!-- Claim detail collapsed-box -->
	
	<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Claim Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
			<input type="hidden" class="form-control" id="txtEmpCode" value="<?php echo $emp_code;?>" name="txtEmpCode"/>
                              <div class="form-group col-sm-12">
                          <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-3 pull-left control-label">Advance Amount: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" id="txtAdvAmount" value="<?php echo $row->iou_amt; ?>" name="txtAdvAmount"/>
                </div><br>
                          </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Justification : </label>
				<div class="input-group  col-sm-6">
                               <textarea class="form-control" rows="3" cols="50" name="areaJustification" required><?php echo $row->iou_justfic; ?> </textarea>
                </div>
                </div>
            </div>
			</div>
          </div>
	  </div>  
        
        <!-- bank details--->
		<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Account Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
		<div class="form-group col-sm-12">
              <div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">Bank Name: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" id="txtBankName" style="background-color:#E6F2FF;" readonly value="<?php echo $row->bank_name; ?>" name="txtBankName"/>
                </div><br>
                </div>
               <div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Account No.: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" id="txtAccountNo" style="background-color:#E6F2FF;" readonly value="<?php echo $row->acc_no; ?>" name="txtAccountNo"/>
                </div><br>
                </div>
              <div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">IFSC Code: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" id="txtIFSC" style="background-color:#E6F2FF;" readonly value="<?php echo $row->ifsc; ?>" name="txtIFSC"/>
                </div>
                </div>
               	</div>
			</div>
           
	        
			
			<div class="form-group col-sm-12"><br>
                       <div class="col-sm-12">
						  <label class="col-sm-1 pull-left control-label">4</label>
						  <label class="col-sm-4 pull-left control-label">Action: </label>
						  <div class="input-group  col-sm-6">
                             <input type="radio" name="claim_state" value="draft" required >&nbsp;&nbsp; Save As Draft</input>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <input type="radio" name="claim_state" value="submited_dh" >&nbsp;&nbsp; Submit for Approval</input>

						 </div>
					   </div>
				 </div>
                                <input type="hidden" class="form-control" id="txtEmpCode" value="<?php echo $emp_code;?>" name="txtEmpCode"/>
                            <input class="form-control" type="hidden" name="txtClaimId" value="<?php echo $lou_clm_id; ?>"/>    
			 <?php $reporting_autho=$this->method_call->fetchReportingDetails($emp_code);?>
                            <input class="form-control" type="hidden" name="txtRepAutho" value="<?php print_r($reporting_autho['reporting_autho']); ?>"/>
        </div>
        
              <!------Mail Details Code Start From here--->
                           <?php $hodEmail=$this->method_call->fetchHODMailDetailsForClaimer($emp_code);?>
              <input class="form-control" type="hidden" name="txtHodEmail" value="<?php print_r($hodEmail['hodEmail']); ?>"/>
                                        <?php $SancAuthoEmail=$this->method_call->fetchSancAuthoMailDetailsForClaimer();?>
              <input class="form-control" type="hidden" name="txtSancAuthoEmail" value="<?php print_r($SancAuthoEmail['SancAuthoEmail']); ?>"/>
                                        <input class="form-control" type="hidden" name="txtEmpName" value="<?php print_r($emp_name); ?>"/>
                                        <input class="form-control" type="hidden" name="txtPlantCode" value="<?php print_r($plant_code); ?>"/>
                                        <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                        <input class="form-control" type="hidden" name="txtDeptName" value="<?php print_r($dept_nm['dept_name']); ?>"/>
                                        <?php $reg_date=$this->method_call->fetchVoucherDate($lou_clm_id);                                         ?>
                                       <input class="form-control" type="hidden" name="txtClaimDate" value="<?php print_r($reg_date['reg_date']); ?>"/>
                                        
                                    <!------Mail Details Code End here--->
                                    
                                 <div class="form-group col-sm-12">    
                            <?php $closing_amt=$this->method_call->statusCheckIOUPending($emp_code);?>  
                                    
                                    <?php 
                                    if($closing_amt['closing_amt']=="0"){
                                    
                                    ?>
                        <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Save Claim Details</button></center>
                                    <?php } else {
                            echo '<h4 style="color:red"> We cant procced your IOU Advance Claim because you have &#8377;'.$closing_amt['closing_amt'].' Outstanding Balance Amount. </h4>';    
                        }?>
                                 </div>
                  </form>
        <br>
         <?php }
 } ?>
        <p>&nbsp;</p>
           
                         
        </div>
        </div>
        <!-- /.box-body -->
            </section>
          </div>
      
<!-- /.content -->


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
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
  </script>
  
  
  <script>
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
      function edit_person(id)
{
    //alert(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/local_reim/Local_cntr/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   $('[name="editId"]').val(data.lrcd_id);
            $('[name="modeOfTravelEdit"]').val(data.vehicle);
            $('[name="datepicker1"]').val(data.trvl_date);
            $('[name="txtGatePassEdit"]').val(data.gate_pass_no);
            $('[name="txtPlaceFromEdit"]').val(data.place_from);
            $('[name="txtPlaceToEdit"]').val(data.place_to);
            $('[name="txtKMEdit"]').val(data.trvl_km);
            $('[name="txtCrrKmRateEdit"]').val(data.rate);
            $('[name="txtAmountEdit"]').val(data.trvl_amt);
            $('[name="areaReasonEdit"]').val(data.trvl_reason);
            if(!data.trvl_km){
              //  alert(data.trvl_km);
              
                document.getElementById("txtKMEdit").disabled = true;
                document.getElementById("txtAmountEdit").disabled = false;
            }else{
                 document.getElementById("txtKMEdit").disabled = false;
                  document.getElementById("txtAmountEdit").disabled = true;
            }
            
            
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

