<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title> 
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
    <body class="hold-transition skin-blue sidebar-mini" >    	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1>
                    <br>
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('ELAR/Other/Other_cntr/create_other_claim') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/Other/Other_cntr/create_other_claim') ?>">Other Reimbursement</a></li>
                    <li class="active">Create Claim
                    </li>
                    </li>
                </ol>
            </section>
                
            
            <!-- Main content -->
            <section class="content">
           
    
            
            
  		<div class="row">
      <div class="col-sm-4">
	  
	   <div class="list-group" id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);">
	   
	   <span class="list-group-item list-group-item-action" style="background-color:#2F4F4F;" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center;color:white;"> Quick Learn </h6></span>
	   
	   
      <a class="list-group-item list-group-item-action" href="<?php echo site_url('purchase/PR/purchase_requisition') ?>" id="list-home-list" data-toggle="list"  role="tab" aria-controls="home">What Is Cash Reimbursement..?</a>
	  <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="<?php echo site_url('purchase/PR/approved_list') ?>" role="tab" aria-controls="profile">Travel Reimbursement</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="<?php echo site_url('purchase/itemcode/itemcode_menu') ?>" role="tab" aria-controls="messages">Advance IOU</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo site_url('purchase/informal_po/informal_po_menu') ?>" role="tab" aria-controls="settings">Local Reimbursement</a>
	  <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="<?php echo site_url('purchase/capex/capex_menu') ?>" role="tab" aria-controls="settings">Other Reimbursement</a> 
    </div>
       
      </div>
	  
	   <div class="col-sm-4">
	
       <div class="list-group"  id="list-tab" role="tablist" style="box-shadow: 0 6px 12px rgba(0, 0, 0, .175);-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);" >
	   
	   <span class="list-group-item list-group-item-action " style="background-color:#2F4F4F;"id="list-home-list" data-toggle="list"  role="tab" aria-controls="home"><h6 style="text-align:center; color:white;">Current Notification</h6></span>
	  <marquee scrollamount="2" behavior="scroll" direction="up"  onmouseover="this.stop();" onmouseout="this.start();" style="height:30%;" > 
	   <div id="scroll">
	   

	   <!-- start -->
	 
			
		<a class="list-group-item list-group-item-action" href="#" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> Two Wheeler Petrol Rates Rs. 2.50 /-</a>
                <a class="list-group-item list-group-item-action" href="#" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> Four Wheeler Petrol Rates Rs. 8.50 /-</a>
                <a class="list-group-item list-group-item-action" href="#" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> Zero Hour – 4 Hours : Zero reimbursement.</a>
		<a class="list-group-item list-group-item-action" href="#" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> 4 Hours to 12 Hours : Will be considered as Half Day.</a>
		<a class="list-group-item list-group-item-action" href="#" id="list-home-list" data-toggle="list"   role="tab" aria-controls="home"> More than 12 Hours : Will be considered as Full Day.</a>
				
				
	   <!-- end -->
		
		
     
    </div></marquee>
	</div>
	   
		
      </div>       
	  
	<!-- profile pic-->  
	   <div class="col-sm-4">

	 <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-bus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Travel Reimbursement</span>
              <span class="info-box-number">Total Claim 3</span>

              <div class="progress">
                <div class="progress-bar" style="width: 95%"></div>
              </div>
              <span class="progress-description">
                    Total Amount 4571
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-bicycle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Local Reimbursement</span>
              <span class="info-box-number">Total Claim 5</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    Total Amount 700
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Other Reimbursement</span>
              <span class="info-box-number">Total Claim 0</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                     Total Amount 0
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Advance IOU</span>
              <span class="info-box-number">Total Claim 1</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    Total Amount 748
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
		</div>
        
        
      
	  
</div>	 
   
            
       
    
  
            </section>
<!-- /.content -->

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

    