<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Reimbursement</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        

    </head>
   <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >   	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">PERSONS DETAILS
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Person Details
                    </li>
                </ol>
            </section>
              
             <!-- Main content -->
           <section class="content">
      <div class="row">
        <div class="col-xs-12">
     
          <div class="box">
            
            <!-- /.box-header -->
           <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
               <div class="table-responsive">
        <table id="example" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No</th>
                  <th>Employee Code</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Plant</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                     <?php $claimListApproval= $this->method_call->fetchPersonsDetailsByTrvelId($trvd_id);
                 $final_rate=0; 	   
                    if($claimListApproval!=null){
	$sr_no=1;			  
foreach ($claimListApproval->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $sr_no; ?></td>
                  <td><?php echo $row->emp_code; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td><?php echo $row->emp_designation; ?></td>
                  <td><?php echo $row->dept_name; ?></td>
                  <td><?php echo $row->plant_code; ?></td>
                  <td><img src="<?php echo base_url(); ?>uploads/profile_attachment/<?php echo $row->profile_attachment; ?>" style="width: 45px; height: 45px "></td>
                  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deletePerson/'.$row->per_det_id); ?>">
                     <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button>
                     </td>
                  </form>
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

