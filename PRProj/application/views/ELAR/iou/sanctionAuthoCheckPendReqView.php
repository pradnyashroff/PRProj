<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IOU PENDING CLAIM</title> 
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >   	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">ADVANCE IOU CLAIM PENDING
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">IOU Pending Claim View
                    </li>
                    </li>
                </ol>
            </section>
		<section class="content">
        <div class="wrapper">
		
                       <?php
                        $LocalClaimDetail = $this->method_call->iouDetailsApproval($lou_clm_id);
                        if ($LocalClaimDetail != null) {
                            foreach ($LocalClaimDetail->result() as $row) {
                                ?>
								<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Basic Claim Details</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
                                <div class="form-group col-sm-4">
                                    <label class="col-sm-1 pull-left control-label">1</label>
                                    <label class="col-sm-4 pull-left control-label">Claim No.:</label>
                                     <div class="input-group  col-sm-6">
                                        <?php echo $row->lou_clm_id; ?>
                                    </div>
                                </div>
                                 <div class="form-group col-sm-4">
                                    <label class="col-sm-1 pull-left control-label">2</label>
                                    <label class="col-sm-4 pull-left control-label">Plant:</label>
                                     <div class="input-group  col-sm-6">
                                         <?php echo $row->plant_code; ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                   <label class="col-sm-1 pull-left control-label">3</label>
                                    <label class="col-sm-4 pull-left control-label">Claim Date:</label>
                                     <div class="input-group  col-sm-6">
                                            <?php echo $row->reg_date; ?>
                                    </div>

                                    <!--	
                                    -->
                                </div>
                          
                         <div class="form-group col-sm-4">
                           <label class="col-sm-1 pull-left control-label">4</label>
                            <label class="col-sm-4 pull-left control-label">Name:</label>
                             <div class="input-group  col-sm-6">
                            <?php echo $row->emp_name; ?>

                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-1 pull-left control-label">5</label>
                            <label class="col-sm-4 pull-left control-label">Grade:</label>
                             <div class="input-group  col-sm-6">
                                <?php echo $row->grade; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-1 pull-left control-label">6</label>
                            <label class="col-sm-4 pull-left control-label">Department:</label>
                             <div class="input-group  col-sm-6">
                            <?php echo $row->dept_name; ?>    
                            </div>
                        </div> </div> </div> </div>
  <?php }
                        }
                        ?>
                       
                       
                          <?php $LocalClaimDetail= $this->method_call->iouClaimDetails($lou_clm_id);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row)  
         {  ?>
		 
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
                           
                          <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-3 pull-left control-label">Advance Amount: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" style="background-color:#E6F2FF;" disabled class="form-control" id="txtAdvAmount" value="<?php echo $row->iou_amt; ?>" name="txtAdvAmount"/>
                </div><br>
                          </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Being : </label>
				<div class="input-group  col-sm-6">
                               <textarea class="form-control" style="background-color:#E6F2FF;" disabled rows="3" cols="50" name="areaJustification" required><?php echo $row->iou_justfic; ?> </textarea>
                </div>
                </div></div></div></div>
                        
                   
        <!-- bank details--->
		<div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Account Details For Debit</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
                          <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-3 pull-left control-label">Bank Name: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" style="background-color:#E6F2FF;" disabled class="form-control" id="txtBankName" value="<?php echo $row->bank_name; ?>" name="txtBankName"/>
                </div><br>
                </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label">Account No.: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" style="background-color:#E6F2FF;" disabled class="form-control" id="txtAccountNo" value="<?php echo $row->acc_no; ?>" name="txtAccountNo"/>
                </div><br>
                </div>
                                   <div class="col-sm-12">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-3 pull-left control-label">IFSC Code: </label>
				<div class="input-group  col-sm-6">
                                    <input type="text" style="background-color:#E6F2FF;" disabled class="form-control" id="txtIFSC" value="<?php echo $row->ifsc; ?>" name="txtIFSC"/>
                </div>
                </div></div></div>  </div>
                                  
            
                                    <?php }
 } ?>

                            
                      
					  <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Claim Actions Log</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
			       <div class="table-responsive">
			  <table id="example" class="table table	">
          		
                <tbody>
       <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                                <th colspan="3" > <center><b>No</b>   <center> </th>
                                <th colspan="3" ><center><b> Claim No</b> <center> </th>      
                                <th colspan="3" > <center><b>Action Date - Time</b>   <center> </th>
				<th colspan="3" ><center><b>Action By </b> <center> </th>
                                <th colspan="3" ><center><b> Action</b> <center> </th>
				<th colspan="3" > <center><b>Comment</b>   <center> </th>
                       
        </tr>

	
	  <tr>
                     <?php
                        $LocalClaimHodApproved = $this->method_call->iouClaimDetailsStatusLog($lou_clm_id);
                       // echo '$lrcm_id-----------' .$lrcm_id;
                        // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimHodApproved != null) {
                             $sr_no = 1;
                            foreach ($LocalClaimHodApproved->result() as $row) {
                               
                                ?>
                         <td colspan="3"><?php echo $sr_no; ?></td>
			 <td colspan="3"><?php echo $row->lou_clm_id; ?></td>
                         <td colspan="3"><?php echo $row->action_date ?> - <?php echo $row->action_time ?> </td>
                         <td colspan="3"><?php echo $row->emp_name?> </td>
                         <td colspan="3">
                         <?php 
                                 if($row->actual_action=="1"){
                                     echo 'Accepted';
                                 }elseif ($row->actual_action=="2") {
                                     echo 'Rejected';
                                    }
                                    else {
                                        echo 'Pending';
                                    }
                                 ?></td>			 
                         
                         <td colspan="3"><?php 
                                 if($row->comment==""){
                                     echo 'No Comment Found';
                                 }  else {
                                        echo $row->comment;
                                    }
                                 ?> </td>
                        						
	 </tr> 
	 
         <?php $sr_no++;}
                        }
                        ?>	
				
	 	</tbody>
               		
              </table>
              </div>
	
	</div></div></div> 
  <form method="post" id="crateClaim" name="crateClaim" action="<?php echo site_url('ELAR/IOU/IouCntr/updateClaimActionBySancAutho') ?>" >
   <input type="hidden" name="lou_clm_id" class="form-control" value="<?php echo $lou_clm_id;?>"> 
<?php $claimer=$this->method_call->getClaimerDetails($lou_clm_id);
                                  $claimerId=$claimer['claimer'];
                                  ?>
                                  <input type="hidden" name="claimer_id" class="form-control" value="<?php print_r($claimer['claimer']); ?>">
                                  <input type="hidden" name="emp_code" class="form-control" value="<?php echo $emp_code;?>">
                                  <?php $autho_code=$this->method_call->getSanctionAuthoDetails();?>
                                  <input type="hidden" value="<?php print_r($autho_code['autho_code']); ?>" name="auto_code" class="form-control"  required>
                                    <?php
                        $LocalClaimLastApprovalDetail= $this->method_call->iouDetailsLastApprovalDetils($emp_code,$lou_clm_id);
                        if ($LocalClaimLastApprovalDetail != null) {
                            foreach ($LocalClaimLastApprovalDetail->result() as $row) {
                                ?>
                              <?php 
                                $claimer_id = $claimer['claimer']; 
                              
                                $closing_amt=$this->method_call->getClosingAmount($claimer_id);
                                
                                
                              ?>
                                <input type="hidden" name="closing_amt" class="form-control" value="<?php print_r($closing_amt['closing_amt']); ?>">
                                <br>
                                
                                <input type="hidden" name="iou_status_id" class="form-control" value="<?php echo $row->iou_status_id;?>">
                                <input type="hidden" name="final_rep_autho" class="form-control" value="<?php echo $row->rep_autho;?>">
                                <input type="hidden" name="final_lou_clm_id" class="form-control" value="<?php echo $row->lou_clm_id;?>">
                                <input type="hidden" name="final_level_of" class="form-control" value="<?php echo $row->level_of;?>">
                                 <?php }
                        }
                        ?>   
	 
			<div class="form-group col-sm-12">
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-3 pull-left control-label">Action : </label>
				<div class="input-group  col-sm-6">
                    <input type="radio" name="localClaimState" value="1" required >&nbsp;&nbsp; APPROVE</input>  
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="localClaimState" value="2" >&nbsp;&nbsp; REJECT</input>					
                </div>
                </div>
                  
				<div class="form-group col-sm-12">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-3 pull-left control-label">Approver Comment</label>
				<div class="input-group  col-sm-6">
                 
                                        <textarea class="form-control" rows="4" cols="50" name="comment" required> </textarea>

          <!------Mail Details Code Start From here--->
                           <?php $emp_email=$this->method_call->fetchUserMailDetails($lou_clm_id);?>
                              <input class="form-control" type="hidden" name="txtEmp_email" value="<?php print_r($emp_email['emp_email']); ?>"/>
                                        <?php $SancAuthoEmail=$this->method_call->fetchSancAuthoMailDetailsForClaimer();?>
                                        <input class="form-control" type="hidden"name="txtSancAuthoEmail" value="<?php print_r($SancAuthoEmail['SancAuthoEmail']); ?>"/>
                                        <input class="form-control" type="hidden" name="txtEmpName" value="<?php print_r($emp_name); ?>"/>
                                        <input class="form-control" type="hidden" name="txtPlantCode" value="<?php print_r($plant_code); ?>"/>
                                        <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                        <input class="form-control" type="hidden" name="txtDeptName" value="<?php print_r($dept_nm['dept_name']); ?>"/>
                                        <?php $reg_date=$this->method_call->fetchVoucherDate($lou_clm_id); ?>
                                        <input class="form-control" type="hidden" name="txtClaimDate" value="<?php print_r($reg_date['reg_date']); ?>"/>
                                        <?php $emp_name=$this->method_call->fetchEmpNameForMail($lou_clm_id); ?>
                                        <input class="form-control" type="hidden" name="txtClaimerName" value="<?php print_r($emp_name['emp_name']); ?>"/>
                                        <?php $iou_amt=$this->method_call->fetchFinalRateForMail($lou_clm_id); ?>
                                        <input class="form-control" type="hidden" name="txtFinalRate" value="<?php print_r($iou_amt['iou_amt']); ?>"/>
                                        <!------Mail Details Code End here--->
                                        
                </div>
                </div>
                            <center>
                                <input class="form-control" type="hidden" name="txtEmpCode" value="<?php echo $emp_code; ?>"/>
                             
                                <input class="form-control" type="hidden" name="txtClaimId" value="<?php echo $lou_clm_id; ?>"/>
                               <?php $closing_amt=$this->method_call->statusCheckIOUPendingComapny($claimerId);?>  
                                    
                                    <?php 
                                    if($closing_amt['closing_amt']=="0"){
                                    
                                    ?>
                                
                                <button type="submit" name="save"  class="btn" style=" width:15%; background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Proceed This Claim</button>  
                                 <?php } else {
                            echo '<h4 style="color:red"> Dear Sanction Authority We Cant procced this claim Beacuse The Outstanding Amount In Minous  &#8377;'.$closing_amt['closing_amt'].' </h4>';    
                        }?>
                                <a href="<?php echo site_url('ELAR/IOU/IouCntr/sanc_accepted_tbl');?>"> <input type="button" value="Cancel" class="btn" style="width:15%; background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;"></a>
                            </center>
                             
                        </form>
                    </div>
                </div>
                
        </div>
        <!-- /.box -->
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
                           // alert(id);
                            if (document.add_localRim_details.comboVehicle.value != '2') {
                                document.add_localRim_details.txtAmount.disabled = 1;
                                document.add_localRim_details.txtKM.disabled = 0;
                                document.add_localRim_details.txtKM.value = 0;
                            }
                            else {
                                document.add_localRim_details.txtAmount.disabled = 0;
                                document.add_localRim_details.txtKM.disabled = 1;
                            }
                            //Ajax Load data from ajax
                            $.ajax({
                                url: "<?php echo site_url('ELAR/local_reim/Local_cntr/getRateFromVehicle') ?>/" + id,
                                type: "GET",
                                dataType: "JSON",
                                success: function (data)
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
                        function deleteData(delete_id) {

                            $.ajax({
                                url: "<?php echo site_url('ELAR/local_reim/Local_cntr/deleteLocalConvData') ?>/" + delete_id,
                                type: "GET",
                                dataType: "JSON",
                                success: function ()
                                {
                                }
                            });
                            location.reload();

                        }
                    </script>
                    <script>
                        function edit_person(id)
                        {
                           // alert(id);
                            //Ajax Load data from ajax
                            $.ajax({
                                url: "<?php echo site_url('ELAR/local_reim/Local_cntr/ajax_edit') ?>/" + id,
                                type: "GET",
                                dataType: "JSON",
                                success: function (data)
                                {
                                    $('[name="editId"]').val(data.lrcd_id);
                                    $('[name="modeOfTravelEdit"]').val(data.vehicle);
                                    $('[name="datepicker1"]').val(data.trvl_date);
                                    $('[name="txtGatePassEdit"]').val(data.gate_pass_no);
                                    $('[name="txtPlaceFromEdit"]').val(data.place_from);
                                    $('[name="txtPlaceToEdit"]').val(data.place_to);
                                    $('[name="txtKMEdit"]').val(data.trvl_km);
                                    $('[name="txtCrrKmRateEdit"]').val(data.rate);
                                    $('[name="txtAmountEdit"]').val(data.trvl_amt);
                                    $('[name="areaReasonEdit"]').val(data.trvl_reason);
                                    if (!data.trvl_km) {
                                       // alert(data.trvl_km);

                                        document.getElementById("txtKMEdit").disabled = true;
                                        document.getElementById("txtAmountEdit").disabled = false;
                                    } else {
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

                        $(document).ready(function () {
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
                                var num = $(this).val();
                                $('input[type=search].form-control').val(num);

                                $('input[type=search].form-control').keyup();
                            });
                            // Handle form submission event
                            $('#frm-example').on('submit', function (e) {
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
                    </script>
                    </body>
                    </html>