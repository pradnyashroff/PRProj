<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Local Reimbursement</title>
        <?php include_once 'styles.php'; ?>
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
            <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Local Claim Dashboard
                   
                    <?php
                    if (isset($error)) {
                        echo "<div class='message'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
                </h1>
                <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
                    <li><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" style="color:#FFFFFF;text-transform: uppercase;">Cash Reimbursement</a></li>
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Local Claim Dashboard
                    </li>
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
      
	  
	  <!-- start user-->
				 <div class="row" style="margin-left:0%;margin-right:0%;">
		
	   <div class="col-lg-2" style="padding-top:12px;padding-bottom:36px;">
	   
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/create_local_claim') ?>" style="color: #FFFFFF;">create Claim </a></h4>
		    <h4 class="card-block text-center">
				
					
	   
         
       </div>
	   
	  
	   
	  
	    <div class="col-lg-2">
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_draft_tbl') ?>" style="color: #FFFFFF;">Draft Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->localClaimdraft($emp_code);
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
         <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_pending_tbl') ?>" style="color: #FFFFFF;">Pending Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->localClaim($emp_code);
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
          
		
		   <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_approved_tbl') ?>" style="color: #FFFFFF;">Approval Claim </a></h4>
		    <h4 class="card-block text-center">
				<?php $noti= $this->method_call->localClaimappr($emp_code);
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
	    <h4 style="font-family:'exo';" ><a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_reject_tbl') ?>" style="color: #FFFFFF;">Reject Claim </a></h4>
		    <h4 class="card-block text-center">
			<?php $noti= $this->method_call->localClaimreject($emp_code);
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
Home </a> &nbsp;&nbsp;&nbsp;
<?php $reporting_autho=$this->method_call->repoAuthNavBarStatus($emp_code);?>
                                 <?php 
                                    if($reporting_autho['reporting_autho']==""){?>
                              
                                 <?php } else {
                                    ?>  
			<a href="<?php echo site_url('ELAR/local_reim/Local_cntr/localClaimApprSA') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Approval </a>
 <?php } ?>
                                    <?php $sam_id=$this->method_call->sancAuthNavBarStatus($emp_code);?>
                                    
                                    <?php 
                                    if($sam_id['sam_id']==""){?>
									 <?php } else {
                                    ?>  
 <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/localClaimApprSA') ?>" style="color: #FFFFFF;"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Sanc.Autho.</a>
 <?php } ?>
 
 
			</div>
	   </div>
			  </div>
			  <div class="col-sm-12"><br>
			  <h4>Pending Cliam Table</h4><br>
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
                     <?php $claimList= $this->method_call->fetchLocalReimPendingDetails($emp_code);
                 $final_rate=0; 	   
                    if($claimList!=null){
	$sr_no=1;			  
foreach ($claimList->result() as $row)  
         {  ?>
                <tr>
                  <td> <a href="<?php echo site_url('ELAR/local_reim/Local_cntr/local_claim_pending_view/'.$row->lrcm_id);?>" class="glyphicon glyphicon-edit" style="color:red;"><?php echo $row->lrcm_id; ?></a></td>
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
			  
			   
			  
			  <!-- end User-->
			  
			  
         </div>
        </div>
            <!-- /.box-body -->
        <!-- /.box-body -->
     
    
      <!-- /.box -->
  
            </section></div>
<!-- /.content -->
    
<!--Edit delete action model pop up end from here-->
<?php include_once 'scripts.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
</body>
</html>

