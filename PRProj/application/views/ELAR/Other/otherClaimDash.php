<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Other Reimbursement</title>
        <?php include_once 'styles.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>
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

    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">OTHER REIMBURSEMENTS CLAIM Dashboard
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
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/cashdashboard
					') ?>" style="color:#FFFFFF;text-transform: uppercase;">Other Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">OTHER CLAIM Dashboard
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
				 <div class="row" style="margin-left:0%;margin-right:0%;">
		
	   <div class="col-lg-2" style="padding-top:12px;padding-bottom:36px;">
	   
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Other/Other_cntr/create_other_claim') ?>" style="color: #FFFFFF;">create Claim </a></h4>
		    <h4 class="card-block text-center">
				
					
	   
         
       </div>
	   
	  
	   
	  
	    <div class="col-lg-2">
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Other/Other_cntr/other_claim_draft_tbl') ?>" style="color: #FFFFFF;">Draft Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->otherClaimdraft($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
         
       </div>
	  
	    <div class="col-lg-2">
         <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Other/Other_cntr/other_claim_pending_tbl') ?>" style="color: #FFFFFF;">Pending Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->otherClaimpending($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5>  
				</div>
	   
	    
	    <div class="col-lg-2">
          
		
		   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Approved_tbl') ?>" style="color: #FFFFFF;">Approval Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->otherClaimapproval($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
       </div>
	   <div class="col-lg-2">
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Rejected_tbl') ?>" style="color: #FFFFFF;">Reject Claim </a></h4>
		    <h4 class="card-block text-center">
			<?php $noti= $this->method_call->otherClaimreject($emp_code);
					if($noti!=null){
				?> 
				<h5><?php echo count($noti->result()); ?></h5>
				<?php
				}
				else{?>
					<h5 style="font-family:'exo';"> <?php echo '0' ;}?> 
					</h5> 
	   </div>
	    <div class="col-lg-2" style="padding-bottom:19px;">
	   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/menuSelect') ?>" style="color: #FFFFFF;">Controls </a></h4>
		    <div class="row">
			<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/menuSelect') ?>" style="color: #FFFFFF;"> <i class="fa fa-home" aria-hidden="true"></i>
Home </a>
<?php $reporting_autho=$this->method_call->repoAuthNavBarStatus($emp_code);?>
                                 <?php 
                                    if($reporting_autho['reporting_autho']==""){?>
                                 <?php } else {
                                    ?>  
			<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Sa_Approaval_Dash') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Appr.</a>
 <?php } ?>
                                    <?php $sam_id=$this->method_call->sancAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($sam_id['sam_id']==""){?>
                                
                                 <?php } else {
                                    ?>  
 <a href="<?php echo site_url('ELAR/Other/Other_cntr/other_Sa_Approaval_Dash') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Sanc.Autho.</a>
 <?php } ?>
 <?php $ocha_id=$this->method_call->higherAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($ocha_id['ocha_id']==""){?>
                                 
                                 <?php } else {
                                    ?>  
<a href="<?php echo site_url('ELAR/Other/Other_cntr/other_approval_dash') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
  High Aut</a>
 
 <?php } ?>
 
 <?php $ocha_id=$this->method_call->mdOfficeAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($ocha_id['ocha_id']==""){?>
                                 
                                 <?php } else {
                                    ?>  
 <a href="<?php echo site_url('ELAR/Other/Other_cntr/other_MD_Officedash') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
 MD Off.</a>
 <?php } ?>
 
 
			</div>
	   </div>
			  </div>
		<div class="col-sm-12"><br>
			  <h4>Pending ClaimTable</h4><br>
			  <div class="table-responsive">
                <table id="example" class="table table">
                <thead>
               <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Claim No</th>
                  <th>Claim Date</th>
                  <th>Total Amount</th>
                  <th>Approval Pending With</th>
                  <th>Claim Status</th>
                </tr>
                </thead>
                <tbody>
                     <?php $claimList= $this->method_call->fetchOtherReimPendingDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimList!=null){
	$sr_no=1;			  
foreach ($claimList->result() as $row)  
         {  ?>
                <tr>
                  <td> <a href="<?php echo site_url('ELAR/Other/Other_cntr/other_claim_pending_view/'.$row->ocm_id);?>" style="color:red;" class="glyphicon glyphicon-edit"><?php echo $row->ocm_id; ?></a></td>
                  <td><?php echo $row->reg_date; ?></td>
                  <td><?php echo $row->total_amt; ?></td>
                   <td><?php echo $row->emp_name; ?></td>
                  <td>Claim Pending</td>
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
    </div>
    </section>
</div>
    
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

