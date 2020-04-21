<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Reimbursement</title> 
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

		.col-lg-3,.col-lg-2,.col-lg-4{
				background-color:#3482AE;
				color:#FFFFFF;
				border:2px solid #FFFFFF;
				box-shadow: 0 4px 8px 0 rgba(40, 40, 40, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
				text-align:center;
				padding-top:1%;
				padding-bottom:1%;
				text-transform: uppercase;
				font-family:'exo';
				
				}
				
				body{
				
				font-family:'exo';
				}
				
				
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



        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >     	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Travel Claim DashBoard
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
                   <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase;">Travel Reimbursement</a></li>
                   <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Travel Claim DashBoard
                    </li>
                    </li>
                </ol>
            </section>
            <section class="content">
    <div class="row">
    <div class="col-xs-12">
     
        <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
				<!-- Travel approval -->
<?php $reporting_autho=$this->method_call->repoAuthNavBarStatus($emp_code);?>
                                 <?php 
                                    if($reporting_autho['reporting_autho']==""){?>
                                
                                 <?php } else {
                                    ?>  
				 <div class="row" style="margin-left:0%;margin-right:0%;">
		
	    <div class="col-lg-3">
         <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/approval_travel_claim_pending_tbl') ?>" style="color: #FFFFFF;">Pending Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->travel_Claim_pending_approver($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5>  
				</div>
	   
	    
	    <div class="col-lg-3">
          
		
		   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/approval_travel_claim_approved_tbl') ?>" style="color: #FFFFFF;">Approval Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->travel_Claim_approve_approver($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
       </div>
	   <div class="col-lg-3">
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/approval_travel_claim_reject_tbl') ?>" style="color: #FFFFFF;">Reject Claim </a></h4>
		    <h4 class="card-block text-center">
			<?php $noti= $this->method_call->travel_Claim_reject_approver($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
	   </div>
	    <div class="col-lg-3" style="padding-bottom:19px;">
	   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_Claim_dashboard') ?>" style="color: #FFFFFF;">Controls </a></h4>
		    <div class="row">
			<a href="<?php echo site_url('ELAR/Travel/Travel_cntr/travel_Claim_dashboard') ?>" style="color: #FFFFFF;"> <i class="fa fa-home" aria-hidden="true"></i>
Home </a> &nbsp;&nbsp;&nbsp;
 
 
			</div>
	   </div>
			  </div>
			  <div class="col-sm-12"><br>
			  <h4>Approval Pending Cliam Table</h4><br>
			  <div class="table-responsive">
                <table id="example" class="table table">
                <thead>
                 <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No</th>
                  <th>Date</th>
                  <th>Request By</th>
                  <th>Claim No</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                     <?php $claimListApproval= $this->method_call->fetchTravelReimApprovalDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimListApproval!=null){
	$sr_no=1;			  
foreach ($claimListApproval->result() as $row)  
         {  ?>
                <tr>
                  <td><a  href="<?php echo site_url('ELAR/Travel/Travel_cntr/approval_travel_claim_pending_view/'.$row->trv_mst_id);?>" style="color:red;" class="glyphicon glyphicon-edit"><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->reg_date; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td> <?php echo $row->trv_mst_id; ?></td>
                  <td><?php echo $row->total_amt; ?></td>
                  </tr>
        <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
              </div>
                       
            </div>
			  
			   
			  <?php } ?>
			  
			  <!-- Travel sanction authority -->
<?php $sam_id=$this->method_call->sancAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($sam_id['sam_id']==""){?>
                                
                                 <?php } else {
                                    ?> 
			  <div class="row" style="margin-left:0%;margin-right:0%;">
		
	    <div class="col-lg-3">
         <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_pending_tbl') ?>" style="color: #FFFFFF;">Pending Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->travel_Claim_pending_sa($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5>  
				</div>
	   
	    
	    <div class="col-lg-3">
          
		
		   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_approved_tbl') ?>" style="color: #FFFFFF;">Approval Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->travel_Claim_approve_sa($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
       </div>
	   <div class="col-lg-3">
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_reject_tbl') ?>" style="color: #FFFFFF;">Reject Claim </a></h4>
		    <h4 class="card-block text-center">
			<?php $noti= $this->method_call->travel_Claim_reject_sa($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
	   </div>
	    <div class="col-lg-3" style="padding-bottom:19px;">
	   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/menuSelect') ?>" style="color: #FFFFFF;">Controls </a></h4>
		    <div class="row">
			<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/menuSelect') ?>" style="color: #FFFFFF;"> <i class="fa fa-home" aria-hidden="true"></i>
Home </a> &nbsp;&nbsp;&nbsp;
 
 
			</div>
	   </div>
			  </div>
			  <div class="col-sm-12"><br>
			  <h4>Sanction Authority Pending Cliam Table</h4><br>
			  <div class="table-responsive">
               <table id="example" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No</th>
                  <th>Date</th>
                  <th>Request By</th>
                  <th>Claim No</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                     <?php $claimListApproval= $this->method_call->fetchTravelReimSancAuthoDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimListApproval!=null){
	$sr_no=1;			  
foreach ($claimListApproval->result() as $row)  
         {  ?>
                <tr>
                  <td><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_pending_view/'.$row->trv_mst_id);?>"  style="color:red;" class="glyphicon glyphicon-edit"><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->reg_date; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td><?php echo $row->trv_mst_id; ?></td>
                  <td><?php echo $row->total_amt; ?></td>
                  </tr>
        <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
              </div>
            </div>
			<?php } ?>
			  
			 
			   
			   
			  
		
             </div>
        </div>
    </div>
    </div>
    </section>
</div>
    
<!--Add linkup Detail model pop up end from here-->



 <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
 function setTrvDetToPerson(setId){
    alert(setId);
    document.getElementById("txtTravelId").value =  setId;
    document.getElementById("txtTravelIdFetch").value =  setId;
    
    
    
 }
</script>



<script> 
    $(function () {
      
    
   
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
    
      //Date picker
    $('#fromDateAddHotel').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
      //Date picker
    $('#toDateAddHotel').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
    //Date picker
    $('#editFromDateAddHotel').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
      //Date picker
    $('#editToDateAddHotel').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
     //Date picker
    $('#txtTrvelDate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
     //Date picker
    $('#editTrvelDate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
     //Date picker
    $('#dateFrom').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    
     //Date picker
    $('#dateTo').datepicker({
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
      function editTrvelDetails(id)
{
    //alert(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/Travel/Travel_cntr/editTravelDetailsAjax')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {  
            $('[name="editIdTrvelDetails"]').val(data.trvd_id);
            $('[name="editTdatepicker"]').val(data.trv_date);
            $('[name="editTxtEmpCode"]').val(data.reg_by);
            $('[name="editTxtFromSt"]').val(data.from_station);
            $('[name="editTxtDepTime"]').val(data.depr_time);
            $('[name="editTxtToSt"]').val(data.to_station);
            $('[name="editTxtArrTime"]').val(data.arv_time);
            $('[name="editTxtTrvMode"]').val(data.trv_mode);
            $('[name="editTxtClass"]').val(data.class);
            $('[name="editTxtAmountPerPers"]').val(data.amount);
            $('[name="editTxtTotalAmt"]').val(data.total_amount);
            $('[name="editTxtNoOfPers"]').val(data.persons);
            $('.div_imagetranscrits').html('<img src="<?php echo base_url()."uploads/travel/"?>' + data.invoice + '" style="height:100px;width:100px" />');
            $('[name="editAreaTrvJusti"]').val(data.justification);
            
            
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

      </script>
      
      
       <script>
      function editHotelDetails(id)
{
    //alert(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/Travel/Travel_cntr/editHotelDetailsAjax')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {  
            $('[name="hotelDetailEditId"]').val(data.hotdet_id);
            $('[name="editFromDateAddHotel"]').val(data.from_date);
            $('[name="editToDateAddHotel"]').val(data.to_date);
            $('[name="editTxtHotelBillNo"]').val(data.bill_no);
            $('[name="editTxtExpense"]').val(data.expenses);
            $('[name="editTxtAmount"]').val(data.total_amount);
            $('[name="editAreaReason"]').val(data.justification);
            $('.div_imagetranscritsHotel').html('<img src="<?php echo base_url()."uploads/travelHotel/"?>' + data.invoice + '" style="height:100px;width:100px" />');
            
            
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

      </script>
  
      
       <script>
      function editIntraCityDetails(id)
{
    //alert(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/Travel/Travel_cntr/editIntraCityDetailsAjax')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {  
            $('[name="intraCityEditId"]').val(data.trvl_locl_id);
            $('[name="editTrvelDate"]').val(data.trvl_date);
            $('[name="editPlaceFrom"]').val(data.place_from);
            $('[name="editPlaceTo"]').val(data.place_to);
            $('[name="editTrvlMode"]').val(data.trvl_mode);
            $('[name="editAmount"]').val(data.trvl_amt);
            $('[name="editAreaReason"]').val(data.trvl_reason);
            
            
            
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
   var table = $('#hotels').DataTable({
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

$(document).ready(function (){
   var table = $('#MealDetails').DataTable({
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

$(document).ready(function (){
   var table = $('#travelIntraCity').DataTable({
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

$(document).ready(function (){
   var table = $('#iouLinkWithTrvel').DataTable({
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
     
     function myFunction(){
          var id = document.getElementById("comboPersonsMeal").value;
         alert(id);
         
         
          //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ELAR/Travel/Travel_cntr/getPersonDeatils')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="txtMealRates"]').val(data.meal_rate);
            
            calulate_total();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
     
        }
        
        function calulate_total(){
        var totalDays = document.getElementById('totalDays').value;
         var rates = document.getElementById('txtMealRates').value;
            var result = parseFloat(totalDays) * parseFloat(rates);
            $('[name="txtTotalRate"]').val(result);
        
        }
           
           
     
 
 </script>
</body>
</html>

