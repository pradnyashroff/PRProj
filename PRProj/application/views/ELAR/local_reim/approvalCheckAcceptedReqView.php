<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Local Reimbursement</title> 
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<style>
		body{
				font-family:'exo';
			}
			thead,th,td
			{
				font-family:'exo';
				text-align: center;
			}
			th {
				font-family:'exo';
				text-transform: uppercase;
			}
			table{
				font-size:12px!important;
				border:1px solid black;
				border-color:#3482AE;
				text-align: center;
				width:100%;
				box-shadow: 5px 5px 5px 5px rgba(46,61,73,0.15);
			}

			label,.col-sm-1,.box-title
			{
				color:#3482AE;
				text-transform: uppercase;
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
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">LOCAL CONVEYANCES REIMBURSEMENTS CLAIM APPROVED
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
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Accepted Request View
                    </li>
                    </li>
                </ol>
            </section>

            <!-- Main content -->
             <section class="content">
        <div class="wrapper">
                        <?php
                        $LocalClaimDetail = $this->method_call->localClaimDetailsApproval($lrcm_id);
                        if ($LocalClaimDetail != null) {
                            foreach ($LocalClaimDetail->result() as $row) {
                                ?>
                                 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Claim Details</h3>

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
                                        <?php echo $row->lrcm_id; ?>
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
                        </div></div></div></div>
  <?php }
                        }
                        ?>
						 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Gate Pass Details</h3>

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
                                        <th>Travel Mode</th>
                                        <th>Date</th>
                                        <th>Gate Pass No.</th>
                                        <th>From Location</th>
                                        <th>To Location</th>
                                        <th>KM</th>
                                        <th>Amount</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conveyanceList = $this->method_call->fetchLocalReimDetailsByClaimId($lrcm_id);
                                    $final_rate = 0;
                                    if ($conveyanceList != null) {
                                        $sr_no = 1;
                                        foreach ($conveyanceList->result() as $row) {
                                            ?>
                                            <tr>
                                                <td><a href="#" class="fas fa-eye" style="color:black;"  data-toggle="modal" data-target="#edit" onclick="edit_person(<?php echo $row->lrcd_id; ?>)" ><?php echo $sr_no; ?></a></td>
                                                <td><?php echo $row->vehicle; ?></td>
                                                <td><?php echo $row->trvl_date; ?></td>
                                                <td><?php echo $row->gate_pass_no; ?></td>
                                                <td><?php echo $row->place_from; ?></td>
                                                <td><?php echo $row->place_to; ?></td>
                                                <td><?php echo $row->trvl_km; ?></td>
                                                <td><?php echo $row->trvl_amt; ?></td>
                                                <td><?php echo $row->trvl_reason; ?></td>
                                                <?php
                                                $total_rate = $row->trvl_amt;
                                                $final_rate = $final_rate + $total_rate;
                                                ?>


                                            </tr>
        <?php $sr_no++;
    }
}
?>
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
                        </div></div></div>
						 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Claim Actions Log</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
                        
                        
		 <table id="example" class="table table">
          		
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
                        $LocalClaimHodApproved = $this->method_call->localClaimDetailsStatusLog($lrcm_id);
                       // echo '$lrcm_id-----------' .$lrcm_id;
                        // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimHodApproved != null) {
                             $sr_no = 1;
                            foreach ($LocalClaimHodApproved->result() as $row) {
                               
                                ?>
                         <td colspan="3"><?php echo $sr_no; ?></td>
			 <td colspan="3"><?php echo $row->lrcm_id; ?></td>
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
			
	
	</div></div></div>
                        
                        
                     
					 <div class="box-header with-border">
					   <div class="box box-default">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Approval Action</h3>

              <div class="box-tools pull-center">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
			   <div class="box-body">
                              
			 <table id="example" class="table table">
          		
                <tbody>
				<tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                                  <th colspan="3" > <center><b> Action Attempt</b>   <center> </th>
				 <th colspan="3" > <center><b> Total Amount</b>   <center> </th>
				<th colspan="3" ><center><b> Action Date</b> <center> </th>
				<th colspan="3" ><center><b>Action Time </b> <center> </th>
				<th colspan="3" > <center><b>Comment</b>   <center> </th>
                                
				
				 
				 
				
                
      </tr>

	
	  <tr>
                     <?php
                        $LocalClaimHodApproved = $this->method_call->localClaimDetailsHodApproved($lrcm_id,$emp_code);
                       // echo '$lrcm_id-----------' .$lrcm_id;
                        // echo '$emp_code----------' .$emp_code;
                        if ($LocalClaimHodApproved != null) {
                             $sr_no = 1;
                            foreach ($LocalClaimHodApproved->result() as $row) {
                               
                                ?>
                                 <td colspan="3"  >Attempt <?php echo $sr_no; ?></td>
			 <td colspan="3"  > <?php echo $row->total_amt; ?></td>
			 	  <td colspan="3"> <?php echo $row->action_date?></td>			 
					    <td colspan="3"><?php echo $row->action_time?> </td>
                                             <td colspan="3"><?php echo $row->comment ?> </td>
						
	 </tr> 


	  			  

		  <?php $sr_no++;}
                        }
                        ?>	
				
	 

               
	


	 
				</tbody>
               		
              </table>
			</div></div></div>
			<div class="form-group col-lg-12"><br>
			 <label class="col-lg-1 pull-left control-label">5</label>
			 <label class="col-lg-4 pull-left control-label"> Download Attachment</label>
			 
				<div class="input-group  col-lg-6">
					   <?php $pic_file=$this->method_call->getAttachmentDownload($lrcm_id);?>
                        <a style="color: #337ab7;" href="<?php echo base_url()."uploads/images/".$pic_file['pic_file'];?>"><?php print_r($pic_file['pic_file']); ?></a><br><br>                                
                </div> </div>
							  
				<div class="form-group col-lg-12">
			 <label class="col-lg-1 pull-left control-label">6</label>
			 <label class="col-lg-4 pull-left control-label"> Claim Justification</label>
			 
				<div class="input-group  col-lg-6">
					
                                <?php $justification=$this->method_call->getDraftJustification($lrcm_id);?>
                                <?php print_r($justification['justification']); ?> 
                </div> </div>
	
	
	
                    </div>
                </div>
                <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
    
            <!--Edit delete action model pop up start from here-->
            <div class="modal fade displaycontent" id="edit">

                <div class="modal-dialog" role="document" style="width: 720px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#3482AE">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                             <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">View Claim Details</h4>
                        </div>
                        <div class="modal-body">
                            <section class="module pt-10" id="contact" >
                                <div class="container" style="width: auto;">
                                    <br>
                                    <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('ELAR/local_reim/Local_cntr/updateConvensesDataDraftEdit') ?>" >
                                        <div class="row">
                                            <div class="col-sm-12" style="  ">
                                                <div class="form-group col-md-4">
                                                    <label >Date</label>
                                                    <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code; ?>"  data-validation-required-message="Please enter Valid Item Code."/>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" required name="datepicker1" id="datepicker1"  data-validation-required-message="Please enter Valid Item Code."/>		
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="sel1">Mode Of Travel</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" readonly type="hidden"  name="editId" id="editId"  data-validation-required-message="Please enter Valid Item Code."/>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" required name="modeOfTravelEdit" id="modeOfTravelEdit"  data-validation-required-message="Please enter Valid Item Code."/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Gate Pass No</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" required name="txtGatePassEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Place From</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" required name="txtPlaceFromEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Place To</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" required name="txtPlaceToEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >KM Rec.</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" readonly type="text"  name="txtKMEdit" id="txtKMEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Current Rate Per KM</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" disabled type="text" readonly required name="txtCrrKmRateEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Total Amount</label>
                                                    <input class="form-control" style="background-color:#E6F2FF;" readonly type="text" required name="txtAmountEdit" id="txtAmountEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Reason</label>
                                                    <textarea class="form-control" style="background-color:#E6F2FF;" disabled rows="3" name="areaReasonEdit"></textarea>  
                                                </div>
                                            </div>
                                            </section>
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
                                                $('#datepicker1').datepicker({
                                                    autoclose: true,
                                                    format: 'yyyy-mm-dd'
                                                })
                    </script>
                    <script>
                        function get_data(id)
                        {
                            //alert(id);
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