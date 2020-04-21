<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Reimbursement</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        

    </head>
     <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">   	    	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
                <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">TRAVEL REIMBURSEMENTS CLAIM REJECT
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase";>
                   <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase";><i class="fa fa-dashboard"></i> Home</a></li>
                   <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>" style="color:#FFFFFF;text-transform: uppercase";>Travel Reimbursement</a></li>
                   <li class="active" style="color:#FFFFFF;text-transform: uppercase";>Reject Claim Table
                    </li>
                    </li>
                </ol>
            </section>
           <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
          <div class="form-group col-sm-12"> 
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
                     <?php $claimListApproval= $this->method_call->fetchTravelReimSancAuthoRejectDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimListApproval!=null){
	$sr_no=1;			  
foreach ($claimListApproval->result() as $row)  
         {  ?>
                <tr>
                  <td><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_reject_view/'.$row->trv_mst_id);?>" style="color:red;" class="glyphicon glyphicon-edit"><?php echo $sr_no; ?></a></td>
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
             </div>
          </div>
       </div>
    </section>
</div>
<!-- /.content -->
    
<!--Edit delete action model pop up end from here-->
<?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
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
</script>
</body>
</html>
