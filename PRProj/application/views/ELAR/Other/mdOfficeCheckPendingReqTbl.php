<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Other Reimbursement</title>
        <?php include_once 'styles.php'; ?>
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
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard') ?>">Other Reimbursement</a></li>
                    <li class="active">Pending Request Table
                    </li>
                    </li>
                </ol>
            </section>
              
            <img src="<?php echo base_url(); ?>dist/img/ElarAsset/approvalBar.png" style="width: 100%; ">
            <!-- Main content -->
            <section class="content">
            <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">OTHER CLAIM PENDING VIEW</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			 
			
                              <div class="form-group col-sm-12">
                         <div class="table-responsive">
        <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Date</th>
                  <th>Request By</th>
                  <th>Claim No</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                     <?php $claimListApproval= $this->method_call->fetchOtherReimHigherAuthoOneDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimListApproval!=null){
	$sr_no=1;			  
foreach ($claimListApproval->result() as $row)  
         {  ?>
                <tr>
                  <td><a  href="<?php echo site_url('ELAR/Other/Other_cntr/fetchOtherReimHigherAuthoOneDetailsView/'.$row->ocm_id);?>" class="glyphicon glyphicon-edit"><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->reg_date; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td> <?php echo $row->ocm_id; ?></td>
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
            <!-- /.box-body -->
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
  
            </section>
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

