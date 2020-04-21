<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Local Reimbursement</title> 
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
				<h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">LOCAL CONVEYANCES REIMBURSEMENTS CLAIM FORM
				<?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
				</h1>
               
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-Home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create Claim
                    </li>
                    </li>
                </ol>
            </section>
                
           
            <!-- Main content -->
            <section class="content">
        <div class="wrapper">
	    <div class="box-body">
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/local_reim/Local_cntr/createClaim') ?>" >
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
                                 Automatic
                </div>
                </div>
                 <div class="form-group col-sm-4">
				<label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-3 pull-left control-label"> Plant </label>
				<div class="input-group  col-sm-6">
				
				   <?php if ( $emp_dept == 12||$emp_dept == 13||$emp_dept == 100||$emp_dept == 26) { ?>
				 
				 <select class="form-control" required name="txtPlantId">
							 <option value="" >Select Your Location</option>
							
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
	 foreach ($plantlist->result() as $row)  
         {  ?>
			
			<option value="<?php echo $row->plant_code; ?>"><?php echo $row->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				  <?php } else { ?>
                                               <?php echo $plant_code; ?>
                                    <input class="form-control" type="hidden" name="txtPlantId" value="<?php echo $plant_code; ?>"/>
				  <?php } ?>
				
                                     
           
               
         
                </div>
			  </div>
               <div class="form-group col-sm-4">
			  <label class="col-sm-1 pull-left control-label">3</label>
			  <label class="col-sm-3 pull-left control-label">Claim Date :</label>
				<div class="input-group  col-sm-6">
                  
                                    <lable  id="e"></lable>
                                    <script>
                                    document.getElementById('e').innerHTML  = new Date().toISOString().substring(0, 10);
                                    </script>
                                 </div>
				
			<!--	<?php
				
				$expire = time() + 30 * 24 * 60 *60;
$date_in_future = date( "Y-m-d", $expire );
echo ($date_in_future);
?>
</br>
<?php
echo date('Y-m-d', strtotime("+40 days"));
?>

</br>

<?php
$today=date('d-m-Y');
$next_date= date('d-m-Y', strtotime($today. ' + 90 days'));
echo $next_date;
?>
-->
                </div>
                  <div class="form-group col-sm-4">
                             <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-3 pull-left control-label">Name :</label>
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
			   <label class="col-sm-4 pull-left control-label">Department:</label>
				<div class="input-group  col-sm-6">
                                    <input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="dept_id" class="form-control"  required>
                                    <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                    
                                  <?php print_r($dept_nm['dept_name']); ?>
                                  
		</div>
			  </div> </div> </div> </div>
                     

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
			     <div class="form-group col-sm-12">
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
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLocalReimDetails($emp_code);
                 $final_rate=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
				 
                    <td><p style="color:red;font-size:15px;">  
					<a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#edit" onclick="edit_person(<?php echo $row->lrcd_id; ?>)" ><?php echo $sr_no; ?></a></p></td>
                  <td><?php echo $row->vehicle; ?></td>
                  <td><?php echo $row->trvl_date; ?></td>
                  <td><?php echo $row->gate_pass_no; ?></td>
                  <td><?php echo $row->place_from; ?></td>
                  <td><?php echo $row->place_to; ?></td>
                  <td><?php echo $row->trvl_km; ?></td>
                  <td><?php echo $row->trvl_amt; ?></td>
                  <td><?php echo $row->trvl_reason; ?></td>
                    <?php

				$total_rate=$row->trvl_amt;
					$final_rate=$final_rate+$total_rate;
				?>
  <?php  echo "<td><a href='deletedata?id=".$row->lrcd_id."'><span class='glyphicon glyphicon-trash'style='color:red;'></span></a> </td>";?>
                  
                  </tr>
                	 <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
              </div>
                       
                  <div class="form-group col-sm-12">
                      <div class="form-group col-sm-7"></div>
			
                          <div class="form-group col-sm-4">
			   <label class="col-sm-12 pull-left control-label" style="margin-left: 35%">Total Amount : <span class="fa fa-inr"> </span> <?php echo $final_rate; ?> </label>
                           
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			  </div> </div> </div> </div><br>
                   <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button>
                                    </center>
                </div>
                 <br>
			    <div class="form-group col-lg-12">
			  <br>
			 <label class="col-lg-1 pull-left control-label">3</label>
			 <label class="col-lg-4 pull-left control-label">Choose File</label>
			 
				<div class="input-group  col-lg-6">
									<input class="form-control" type="file" required name="picture" / style="width:40%;">
                                   
                                        <input class="form-control" type="hidden" name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                        <input class="form-control" type="hidden" name="txtFinalRate" value="<?php echo $final_rate; ?>"/>
                                      
                                  

         
                </div>
                </div>
				<div class="form-group col-lg-12">
			  
			 <label class="col-lg-1 pull-left control-label">4</label>
			 <label class="col-lg-4 pull-left control-label">Justification</label>
			 
				<div class="input-group  col-lg-6">
									  <textarea class="form-control" rows="4" cols="50" name="areaJustification" required> </textarea>
                                      
                                  

         
                </div>
                </div>
                  

				  <div class="col-sm-12">

                                       		
                      <center> <button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Save Claim Details</button>
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

                        <form method="post" id="add_localRim_details" name="add_localRim_details" action="<?php echo site_url('ELAR/local_reim/Local_cntr/addLocalReimDetails') ?>" >

                            <div class="row">
                                 
                                <div class="col-sm-12" style="  ">
                                    <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                    <div class="form-group col-md-4">
                                        <label >Date</label>
                                        <input class="form-control"  readonly type="text" required name="datepicker" value="" id="datepicker"/>		
                                    </div>
                                         <div class="form-group col-md-4">
                                          <label for="sel1">Mode Of Travel</label>
                                          <select class="form-control" id="comboVehicle" name="comboVehicle" onchange="get_data(this.value)">
                                              <option value="select">select</option>
					
			 <?php $vehicles= $this->method_call->getVehicleDetailsByGrade($grade_id);
 if($vehicles!=null){
			  
foreach ($vehicles->result() as $row8) 
 
         {  ?>
			
		 <option value="<?php echo $row8->veh_id ; ?>"> <?php echo $row8->vehicle; ?></option>
			
		 <?php 
		 }
 } ?>
                                            </select>
                                         </div>
                                     
                                        <div class="form-group col-md-4">
                                        <label >Gate Pass No</label>
                                        <input class="form-control" type="text" required name="txtGatePass" value="" />	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >Place From</label>
                                        <input class="form-control" type="text" required name="txtPlaceFrom" value="" />		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Place To</label>
                                        <input class="form-control" type="text" required name="txtPlaceTo" value="" />	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >KM Rec.</label>
                                        <input class="form-control" type="number"  disabled  name="txtKM" value="NULL" onkeyup="calulate_total();" id="txtKM" data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Current Rate Per KM</label>
                                       
                                        <input class="form-control" style="background-color:#E6F2FF;" readonly type="text" required name="txtCrrKmRate"  id="txtCrrKmRate" value="" data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control"  disabled   type="number"  name="txtAmount" value="" id="txtAmount" data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="areaReason"></textarea>  
                                     </div>
                                     <div class="form-group col-md-12">
                                   <label class="col-sm-8 pull-left control-label" name="lbAmount" value="" id="lbAmount" ></label>
                                     </div>
                                     </div>
										
                                <center><button type="submit" name="save"  class="btn" style="width: 15%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
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

                        <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('ELAR/local_reim/Local_cntr/updateConvensesData') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="  ">
                                     <div class="form-group col-md-4">
                                        <label >Date</label>
                                          <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>"  data-validation-required-message="Please enter Valid Item Code."/>
                                        <input class="form-control"  readonly type="text" required name="datepicker1" id="datepicker1"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                         <div class="form-group col-md-4">
                                          <label for="sel1">Mode Of Travel</label>
                                          <input class="form-control" style="background-color:#E6F2FF;" readonly type="hidden"  name="editId" id="editId"  data-validation-required-message="Please enter Valid Item Code."/>
                                         <input class="form-control" style="background-color:#E6F2FF;" readonly type="text" required name="modeOfTravelEdit" id="modeOfTravelEdit"  data-validation-required-message="Please enter Valid Item Code."/>
                                         </div>
                                  
                                  
                                        <div class="form-group col-md-4">
                                        <label >Gate Pass No</label>
                                        <input class="form-control" type="text" required name="txtGatePassEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >Place From</label>
                                        <input class="form-control" type="text" required name="txtPlaceFromEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Place To</label>
                                        <input class="form-control" type="text" required name="txtPlaceToEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >KM Rec.</label>
                                        <input class="form-control" type="number"  required name="txtKMEdit" onkeyup="calulate_totalEdit();" id="txtKMEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Current Rate Per KM</label>
                                        <input class="form-control" type="text" style="background-color:#E6F2FF;" readonly required id="txtCrrKmRateEdit" name="txtCrrKmRateEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                   <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control"  disabled  type="number" required name="txtAmountEdit" id="txtAmountEdit" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="areaReasonEdit"></textarea>  
                                     </div>
                                    <div class="form-group col-md-12">
                                   <label class="col-sm-8 pull-left control-label" name="lbAmountEdit" value="" id="lbAmountEdit" ></label>
                                     </div>
                                </div>
                                <center><button type="submit" name="save"  class="btn" style="width: 19%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Details</button></center> 
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
   if(document.add_localRim_details.comboVehicle.value != '2'){
		document.add_localRim_details.txtAmount. disabled =1;
                document.add_localRim_details.txtKM. disabled =0;  
                document.add_localRim_details.txtKM.value=0;  
    }
	else {
		document.add_localRim_details.txtAmount. disabled =0;
                 document.add_localRim_details.txtKM. disabled =1;
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
              
                document.getElementById("txtKMEdit"). disabled  = true;
                document.getElementById("txtAmountEdit"). disabled  = false;
            }else{
                 document.getElementById("txtKMEdit"). disabled  = false;
                  document.getElementById("txtAmountEdit"). disabled  = true;
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

 <script type="text/javascript">
     
     function calulate_totalEdit(){
          var txtKM = document.getElementById('txtKMEdit').value;
          var txtCrrKmRate = document.getElementById('txtCrrKmRateEdit').value;
          var txtTotal='Total KM Running In Rupees - &#x20b9; ';
           var result = parseFloat(txtKM) * parseFloat(txtCrrKmRate);
            if (!isNaN(result)) {
            document.getElementById('lbAmountEdit').innerHTML  = txtTotal +' '+ result;
        }
           
     }
 
 </script>
</body>
</html>

