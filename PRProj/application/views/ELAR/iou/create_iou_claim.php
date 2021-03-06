<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IOU</title> 
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


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >     	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">  Create Advance IOU
                    <br>
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create Claim
                    </li>
                    </li>
                </ol>
            </section>
           <!-- Main content -->
  	<section class="content" id="content">
	  
 <!-- Content Wrapper. Contains page content -->
 <div class="wrapper">
      <div class="box-body">
				<!-- IOU detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Your Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
              
			
              <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">Claim No.: </label>
				<div class="input-group  col-sm-6">
                                 Automatic
                </div>
                </div>
              <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Plant : </label>
				<div class="input-group  col-sm-">
                                      <?php echo $plant_code; ?>
                               
                     </div>
                </div>
               <div class="form-group col-sm-4">
			  
			 <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Claim Date :</label>
				<div class="input-group  col-sm-6">
                  
                                    <lable  id="e"></lable>
                                    <script>
                                    document.getElementById('e').innerHTML  = new Date().toISOString().substring(0, 10);
                                    </script>
                                 </div>
				
			
                </div>
               <div class="form-group col-sm-4">
             <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Name :</label>
				<div class="input-group  col-sm-6">
                                       <?php echo $emp_name; ?>
                                  
                            
                </div>
                </div>
                <div class="form-group col-sm-4">
                <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Grade : </label>
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
			  </div>
                          
                          
                          
                          	</div>
			</div>
            </div>
                          
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/IOU/IouCntr/createIOUClaim') ?>" >

 	<!-- Claim detail collapsed-box -->
 <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Claim Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">               
                
             
                          <input type="hidden" class="form-control" id="txtEmpCode" value="<?php echo $emp_code;?>" name="txtEmpCode"/>
                              <div class="form-group col-sm-12">
                          <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-3 pull-left control-label">Advance Amount: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" id="txtAdvAmount" name="txtAdvAmount"/>
                </div><br>
                          </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Justification : </label>
				<div class="input-group  col-sm-6">
                               <textarea class="form-control" rows="3" cols="50" name="areaJustification" required> </textarea>
                </div>
                </div>
                        
                                  
                                  
                                  </div>
			</div>
            </div>
			
      
                              </div>  
        
        <!-- bank details--->
        <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Account Details For Debit </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
              <!-- /.box-tools -->
			  
	  <div class="box-body">
			  
			   <?php $LocalClaimDetail= $this->method_call->iouBankDetails($emp_code);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row)  
         {  ?>
 
                              <div class="form-group col-sm-12">
                          <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-3 pull-left control-label">Bank Name: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->bank_name; ?>" id="txtBankName" name="txtBankName"/>
                </div><br>
                </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Account No.: </label>
				<div class="input-group  col-sm-6">
                                 <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->bank_acc_no; ?>" id="txtAccountNo" name="txtAccountNo"/>
                </div><br>
                </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-3 pull-left control-label">IFSC Code: </label>
				<div class="input-group  col-sm-6">
                               <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly value="<?php echo $row->ifsc_no; ?>" id="txtIFSC" name="txtIFSC"/>
                </div>
                </div>
                                  
                                  
                                  
			</div>
              
              
                <?php  }
 } ?>
	
			</div>
            </div>
			<!-- end -->
      
                              </div> 
                
			  </div>
                       <center> <button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Save Claim Details</button>
                       </center> <br>
                  </form>
        <br>
     
        </div>
        <!-- /.box-body -->
            </section>
      
      
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

