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
</style>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';">    	  
        <?php include_once 'headsidelist.php'; ?> 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
            <!-- Content Header (Page header) -->
            <section class="content-header">      
               <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">TRAVEL REIMBURSEMENTS VIEW CLAIM
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
                    <li class="active" style="color:#FFFFFF;text-transform: uppercase;">Create Claim
                    </li>
                    </li>
                </ol>
            </section>
              <section class="content">
			 <div class="wrapper">
			<div class="box-body">
			 <?php $LocalClaimDetail= $this->method_call->travelClaimDetails($trv_mst_id);
 if($LocalClaimDetail!=null){
	 foreach ($LocalClaimDetail->result() as $row)  
         {  ?>
   
      <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">1 . Claim Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
				<div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">1</label>
			 <label class="col-sm-4 pull-left control-label">Claim No : </label>
			<div class="input-group  col-sm-6">
                 
                                        <?php echo $row->trv_mst_id; ?>
                </div>
                </div>
                <div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">2</label>
			  <label class="col-sm-3 pull-left control-label">Plant </label>
				<div class="input-group  col-sm-6">
				
				    <?php if ( $emp_dept == 12||$emp_dept == 13||$emp_dept == 100||$emp_dept == 26) { ?>
				 
				 <select class="form-control" required name="txtPlantId" id="txtPlantId" onchange="selectionPlant(this.value)">
							<option value="<?php echo $row->plant_code; ?>"><?php echo $row->plant_code;  ?></option>
			
							  <?php $plantlist= $this->method_call->plants();
 if($plantlist!=null){
     
	 foreach ($plantlist->result() as $row1)  
         {  ?>
			
			<option value="<?php echo $row1->plant_code; ?>"><?php echo $row1->plant_code;  ?></option>
			
	<?php }
				}
					?>
							 </select>
				  <?php }
                                  else { 
                                      ?>
                                               <?php echo $row->plant_code; ?>
                                    <input class="form-control" type="hidden" name="txtPlantId" value="<?php echo $row->plant_code; ?>"/>
				  <?php } ?>
				
                                     
           
               
         
                </div>
                </div>
                <div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">3</label>
			  <label class="col-sm-3 pull-left control-label">Claim Date :</label>
				<div class="input-group  col-sm-6">
                  
                                    <?php echo $row->reg_date; ?>
                                    
                                 </div>
				
			<!--	
-->
                </div>
                          	 <?php }
 } ?>
                <div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">4</label>
			 <label class="col-sm-4 pull-left control-label">Name : </label>
			<div class="input-group  col-sm-6">
                            <?php echo $emp_name; ?>
    
                </div>
                </div>
                <div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">5</label>
			  <label class="col-sm-3 pull-left control-label">Grade : </label>
				<div class="input-group  col-sm-6">
                                    <?php $grade=$this->method_call->getGradeDetails($emp_code);?>
                            <?php print_r($grade['grade']); ?>
    
                </div>
                </div>
                <div class="form-group col-sm-4">
			 <label class="col-sm-1 pull-left control-label">6</label>
			  <label class="col-sm-4 pull-left control-label"> Department: </label>
				<div class="input-group  col-sm-6">
                                    <input type="hidden" value="<?php echo $emp_dept; ?>" readonly   name="dept_id" class="form-control"  required>
                                    <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                    
                                    <?php print_r($dept_nm['dept_name']); ?>
                                  
		</div>
			  </div></div></div></div>
                          
                       <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">2 . Add Traveling Details</h3>

              <div class="box-tools pull-right">
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
                  <th>Date</th>
                  <th>From Station</th>
                  <th>Dep.Time</th>
                  <th>To Station</th>
                  <th>ARV Time</th>
                  <th>Travel Mode</th>
                  <th>Class</th>
                  <th>Amt Per</th>
                  <th>Total Amt</th>
                  <th>Persons</th>
                  <th>Invoice</th>
                  <th>Add Persons</th>
                  <th>View Persons</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchTrvlReimDetailsByClaimId($trv_mst_id);
                 $final_rate1=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                    <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#editTravelDetails" onclick="editTrvelDetails(<?php echo $row->trvd_id; ?>)"><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->trv_date; ?></td>
                  <td><?php echo $row->from_station; ?></td>
                  <td><?php echo $row->depr_time; ?></td>
                  <td><?php echo $row->to_station; ?></td>
                  <td><?php echo $row->arv_time; ?></td>
                  <td><?php echo $row->trv_mode; ?></td>
                  <td><?php echo $row->class; ?></td>
                  <td><?php echo $row->amount; ?></td>
                  <td><?php echo $row->total_amount; ?></td>
                  <td><?php echo $row->persons; ?></td>
                  <td><a style="color: #337ab7;" href="<?php echo base_url()."uploads/travel/".$row->invoice;?>"><?php print_r($row->invoice); ?></a></td>
                  <td><img src="<?php echo base_url(); ?>dist/img/addPerson.png"  data-toggle="modal" data-target="#personAddModel" onclick="setTrvDetToPerson(<?php echo $row->trvd_id; ?>)" ></a></td>
                  <td><a href="<?php echo site_url('ELAR/Travel/Travel_cntr/viewPersonsDtails/'.$row->trvd_id);?>"><img src="<?php echo base_url(); ?>dist/img/viewPerson.png" ></a></td>
                  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deleteTravelDetails/'.$row->trvd_id); ?>">
                  <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button></td>
                </form> 
                  <?php
                  
                                        $approx_rate=$row->total_amount;
					$final_rate1=$final_rate1+$approx_rate;
                         ?>
                </tr>
                  
                   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
             </div>          
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                              <h4> <label class="col-sm-12 pull-left control-label" style="margin-left: 135%">Total Amount : <span class="fa fa-inr"> <?php echo $final_rate1; ?> </span> </label>
                              </h4>
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			 
                  
                 
                  
                  <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#myModal" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button>
                                    </center>
                </div>  </div>  </div>  </div>
                <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">3 . Hotels Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
				 <div class="form-group col-sm-12">
				     <div class="table-responsive">
        <table id="hotels" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No.</th>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Bill No</th>
                  <th>Expenses</th>
                  <th>Total Amount</th>
                  <th>Invoice</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchHotelReimDetailsByClaimId($trv_mst_id);
                 $final_rate2=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                    <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#editHotelModel" onclick="editHotelDetails(<?php echo $row->hotdet_id; ?>)"><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->from_date; ?></td>
                  <td><?php echo $row->to_date; ?></td>
                  <td><?php echo $row->bill_no; ?></td>
                  <td><?php echo $row->expenses; ?></td>
                  <td><?php echo $row->total_amount; ?></td>
                  <td><a style="color: #337ab7;" href="<?php echo base_url()."uploads/travelHotel/".$row->invoice;?>"><?php print_r($row->invoice); ?></a></td>
                <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deleteHotelDetails/'.$row->hotdet_id); ?>">
                  <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button></td>
                  
                  <?php
                  
                                        $approx_rate=$row->total_amount;
					$final_rate2=$final_rate2+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
              </div>
                       
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                              <h4> <label class="col-sm-12 pull-left control-label" style="margin-left: 135%">Total Amount : <span class="fa fa-inr"><?php echo $final_rate2; ?> </span> </label>
                              </h4>
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			 
              
               <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#addHotelDetails" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Hotel Details</button>
                                    </center>
                </div>

			</div></div>
			</div>
            </div>
	<div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">4 . Intra City Travel Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
 
	 		 <div class="form-group col-sm-12">
	 		     <div class="table-responsive">
               <table id="travelIntraCity" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Sr.No.</th>
                  <th>Date</th>
                  <th>Place From</th>
                  <th>Place To</th>
                  <th>Travel Mode</th>
                  <th>Travel Amount</th>
                  <th>Reason</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLocalTrvlReimDetailsByClaimId($trv_mst_id);
                 $final_rate3=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                    <td><a href="#" class="glyphicon glyphicon-edit" style="color:red;" data-toggle="modal" data-target="#editIntraCity" onclick="editIntraCityDetails(<?php echo $row->trvl_locl_id; ?>)" ><?php echo $row->trvl_locl_id; ?><?php echo $sr_no; ?></a></td>
                  <td><?php echo $row->trvl_date; ?></td>
                  <td><?php echo $row->place_from; ?></td>
                  <td><?php echo $row->place_to; ?></td>
                  <td><?php echo $row->trvl_mode; ?></td>
                  <td><?php echo $row->trvl_amt; ?></td>
                  <td><?php echo $row->trvl_reason; ?></td>
                  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deleteIntraCityTrvlDetails/'.$row->trvl_locl_id); ?>">
                  <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button></td>
                  
                     
                  <?php
                  
                                        $approx_rate=$row->trvl_amt;
					$final_rate3=$final_rate3+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                  </div>     
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                              <h4> <label class="col-sm-12 pull-left control-label" style="margin-left: 155%">Total Amount : <span class="fa fa-inr"> <?php echo $final_rate3; ?></span> </label>
                              </h4>
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			  </div>
              
               <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#addLocalTravelDetails" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Local Travel Details</button>
                                    </center>
                </div>

			</div>
			</div>
            </div>
           <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">5 . Add Daily Allownce Deatils</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
	<div class="table-responsive">
                        <table id="MealDetails" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>Emp Code</th>
                  <th>Emp Name</th>
                  <th>Grade</th>
                  <th>Days</th>
                  <th>Applicable Rates</th>
                  <th>Total Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchMealTrvlDetailsByClaimId($trv_mst_id);
                 $final_rate4=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $row->emp_code; ?></td>
                  <td><?php echo $row->emp_name; ?></td>
                  <td><?php echo $row->grade; ?></td>
                  <td><?php echo $row->days; ?></td>
                  <td><?php echo $row->applicable_rate; ?></td>
                  <td><?php echo $row->total_amt; ?></td>
                  <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deleteMealPersonDetails/'.$row->meal_det_id); ?>">
                  <td><button type="submit" name="save"  class="btn btn-danger" style="border: 1px solid orange;margin-left:10%"><i class="fa fa-trash"></i></button></td>
                  
                     
                  <?php
                  
                                        $approx_rate=$row->total_amt;
					$final_rate4=$final_rate4+$approx_rate;
                  ?>
                 </form>
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                 </div>      
                       
                      
                       
                       
                  <div class="form-group col-sm-12">
                     
			
                          <div class="form-group col-sm-4">
                              <h4> <label class="col-sm-12 pull-left control-label" style="margin-left: 155%">Total Amount : <span class="fa fa-inr"> <?php echo $final_rate4; ?></span> </label>
                              </h4>
                          </div>
				<div class="form-group col-sm-1">
                                </div>

                </div>
			 
              
               <div class="col-sm-12">
                 
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#addMealDetails" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Daily Allownce</button>
                                    </center>
                </div> 
				<?php 
                  $totalAmtclaim = $final_rate1 + $final_rate2 + $final_rate3 + $final_rate4;
                ?>
                      
                       
                  <div class="form-group col-sm-12">
                      <center>
                              <h3> <label class="col-sm-12 pull-left control-label"> Total Claim Amount : <span class="fa fa-inr"> <?php echo $totalAmtclaim; ?></span> </label>
                              </h3>
                          </center>
                    </div> </div> </div>      </div>     
                   
				   <div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">6 . Link IOU With Travel Claim</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
				    <div class="table-responsive">
                <table id="iouLinkWithTrvel" class="table table">
                <thead>
                <tr style="background-color:#3482AE;color:#FFFFFF;width:100%;">
                  <th>IOU Claim No</th>
                  <th>IOU Amount</th>
                  <th>IOU Claim Date</th>
                   <th>IOU Justification</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $conveyanceList= $this->method_call->fetchLinkedIouWithTravel($trv_mst_id);
                 $final_rate5=0; 	   
                    if($conveyanceList!=null){
	$sr_no=1;			  
foreach ($conveyanceList->result() as $row)  
         {  ?>
                <tr>
                  <td><?php echo $row->lou_clm_id; ?></td>
                  <td><?php echo $row->iou_amt; ?></td>
                  <td><?php echo $row->iou_date; ?></td>
                  <td><?php echo $row->iou_justfic; ?></td>
                   <form method="post" role="form" enctype="multipart/form-data"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/deleteLinkedClaimIouTravel/'.$row->lou_clm_id); ?>">
                  
                       <td><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;"><i class="fa fa-trash"></i></button></td>
                  
                     
                  <?php
                  
                                        $approx_rate=$row->iou_amt;
					$final_rate5=$final_rate5+$approx_rate;
                                       
                  ?>
                 </form>
                  </tr>
                  
		   <?php  $sr_no++; }
 } ?>
                </tfoot>
              </table>
                </div> 	 
              
               <div class="col-sm-12">
                   <h4> <label class="col-sm-12 pull-left control-label"> Total Amount Linked IOU Amount:  <span class="fa fa-inr"> <?php  echo $final_rate5;?></label></span> </h4>
                                    <center>
                                        <button type="button" id="item_btnold" data-toggle="modal" data-target="#LinkIouTrvel" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Link IOU With Travel Claim</button>
                                    </center>
                </div> 
                  </div>     
               </div>
              </div>
			<div class="box-header with-border">
					   <div class="box box-default ">
					   <div class="box-header with-border">
              <h3 class="box-title">7 . About Traveling</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
			  </div>
				<div class="box-body">
              <form method="post" id="addTravelClaim" name="addTravelClaim" action="<?php echo site_url('ELAR/Travel/Travel_cntr/createClaimDraft') ?>" >
		 <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                 <?php $reporting_autho=$this->method_call->fetchReportingDetails($emp_code);?>
                                        <input class="form-control" type="hidden" name="txtRepAutho" value="<?php print_r($reporting_autho['reporting_autho']); ?>"/>
                  <?php $conveyanceList= $this->method_call->fetchTrvlDetailForDraft($trv_mst_id);
                  
                    if($conveyanceList!=null){			  
foreach ($conveyanceList->result() as $row)  
         {  ?>          
         
                           <div class="col-sm-6">
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">Jour. Date From: </label>
				<div class="input-group  col-sm-6">
                                     <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/> 
                                     <input class="form-control" required type="text" name="dateFrom" value="<?php echo $row->from_date; ?>" id="dateFrom"/>
                                     <input class="form-control" type="hidden"  name="txtPlantIdDynamic" value="<?php echo $row->plant_code; ?>" id="txtPlantIdDynamic"/> 
                                </div>
                           <br>
                </div>
                          
                           <div class="col-sm-6">
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">Jour. Date To: </label>
				<div class="input-group  col-sm-6">
                                    <input class="form-control" required type="text" value="<?php echo $row->to_date; ?>" name="dateTo" id="dateTo"/>
                </div>
                           <br>
                </div>
                           <div class="col-sm-6">
			  <label class="col-sm-1 pull-left control-label">3</label>
			   <label class="col-sm-4 pull-left control-label">Total Days: </label>
				<div class="input-group  col-sm-6">
                                    <input class="form-control" required type="text" value="<?php echo $row->days; ?>" name="txtTotalDay" />
                </div>
                           <br>
                </div>
                           <div class="col-sm-6">
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Purpose of the tour: </label>
				<div class="input-group  col-sm-6">
                                     <textarea class="form-control" required rows="4" cols="50" name="areaJustif"><?php echo $row->justification; ?></textarea>
                </div>
                           <br>
                </div> </div> </div> </div>
                                   
  
  <?php  }
 } ?>
                                
                  <input class="form-control" required type="hidden" name="txtTotalAmt" id="txtTotalAmt" value = "<?php echo $totalAmtclaim; ?>"/>
               <div class="form-group col-sm-12"><br>
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-3 pull-left control-label">Action </label>
				<div class="input-group  col-sm-6">
                    <input type="radio" name="claim_state" value="draft" required > &nbsp;&nbsp;Save as Draft</input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="claim_state" value="submited_dh" > &nbsp;&nbsp;Submit for Approval</input>
                </div>
                </div>          
                
                                <!------Mail Details Code Start From here--->
                           <?php $hodEmail=$this->method_call->fetchHODMailDetailsForClaimer($emp_code);?>
                                <input class="form-control" type="hidden" name="txtHodEmail" value="<?php print_r($hodEmail['hodEmail']); ?>"/>
                                        <?php $SancAuthoEmail=$this->method_call->fetchSancAuthoMailDetailsForClaimer();?>
                             <input class="form-control" type="hidden" name="txtSancAuthoEmail" value="<?php print_r($SancAuthoEmail['SancAuthoEmail']); ?>"/>
                                        <input class="form-control" type="hidden" name="txtEmpName" value="<?php print_r($emp_name); ?>"/>
                                       
                                        
                                         <?php $claimerPlant=$this->method_call->getClaimerPlant($trv_mst_id);?>
                                        <input class="form-control" type="hidden" name="txtPlantCode" id="txtPlantCode" value="<?php print_r($claimerPlant['claimerPlant']); ?>"/>
                                        
                                        
                                        <?php $dept_nm=$this->method_call->fetch_dept_nm($emp_dept);?>
                                        <input class="form-control" type="hidden" name="txtDeptName" value="<?php print_r($dept_nm['dept_name']); ?>"/>
                                        <?php $reg_date=$this->method_call->fetchVoucherDate($trv_mst_id);                                         ?>
                                        <input class="form-control" type="hidden" name="txtClaimDate" value="<?php print_r($reg_date['reg_date']); ?>"/>
                                         <input class="form-control" type="hidden" name="txtClaimAmountTotal" value="<?php print_r($totalAmtclaim); ?>"/>
                                    <div class="col-sm-12">
                 
                                    <center>
                                       <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;"> Proceed Claim</button></center> 
                                    </center>
								</div>        
							</form>      
						</div>
					</div>
				</div>
             </div>
      <!-- /.box -->
  </section>
            
<!--Add Persons in traveling details model start from here---------->
<!-- Modal -->
<div class="modal fade displaycontent" id="personAddModel">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
           <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Person Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="add_localRim_detailsEdit" name="add_localRim_detailsEdit" action="<?php echo site_url('ELAR/Travel/Travel_cntr/addDraftPersonDetails') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="  ">
                                     
                                      <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/> 
                                       <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/> 
                                      <input class="form-control" type="hidden" required name="txtTravelId" value="" id="txtTravelId" />  
                                  
                                        <div class="form-group col-md-8">
                                            <select class="form-control" name="comboPersons" id="comboPersons">
                                            <option>Select</option>
                                            
                                            <?php $employee= $this->method_call->getEmployeeDetails();
 if($employee!=null){
			  
foreach ($employee->result() as $row8) 
 
         {  ?>
                                            
                                           
                              <option value="<?php echo $row8->emp_code ; ?>"> <?php echo $row8->emp_name; ?></option>
                                            <?php 
		 }
 } ?>
                                          </select>
                                        </div>
                                    <div class="form-group col-md-4">
                                       
                                       <button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button>
                                         </div>
                                    </form>
                        
                        
                       
                                   
 

                                   
                                    
                                </div>
                                 </section>

                            </div>
                            
                    </div>
            </div>
        </div>
    




<!--Add Persons in traveling details model to from here---------->            
            
            
<!-- /.content -->
<!--Add local reimbursement details model start form here-->
<div class="modal fade displaycontent" id="myModal">

    <div class="modal-dialog" role="document" style="width: 920px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Traveling Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/Travel/Travel_cntr/addTravelingDraftDetails') ?>" >

                            <div class="row">
                                 
                                <div class="col-sm-12" style="  ">
                                    <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                                    <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                    <div class="form-group col-md-4">
                                        <label >Traveling Date</label>
                                        <input class="form-control"  readonly type="text" required name="datepicker" value="" id="datepicker"/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >From Station</label>
                                        <input class="form-control"   type="text" required name="txtFromSt" value="" id="txtFromSt"/>		
                                    </div>
									<div class="form-group col-md-4">
                                        <label >To Station</label>
                                        <input class="form-control"   type="text" required name="txtToSt" value="" id="txtToSt"/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Departure Time</label>
                                        <input class="form-control"   type="text" required name="txtDepTime" value="" id="txtDepTime"/>		
                                    </div>
                                     
                                    <div class="form-group col-md-4">
                                        <label >Arrival Time</label>
                                        <input class="form-control"   type="text" required name="txtArrTime" value="" id="txtArrTime"/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Travel Mode</label>
                                      
                                        <select class="form-control" name="comboTrvMode" id="comboTrvMode">
                                            <option value="Bus">Bus</option>
                                            <option value="Train">Train</option>
                                            <option value="Plain">Airplain</option>
                                            <option value="Car">Taxi\Car</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Class</label>
                                        <select class="form-control" name="comboClass" id="comboClass">
                                            <option value="AC-III">AC-III</option>
                                            <option value="AC-II">AC-II</option>
                                            <option value="AC-I">AC-I</option>
                                            <option value="General-Class">General-Class</option>
                                            <option value="Sleeper-AC">Sleeper-AC</option>
                                            <option value="Semi-Sleeper-AC">Semi-Sleeper-AC</option>
                                            <option value="Sleeper-NON-AC">Sleeper-NON-AC</option>
                                            <option value="Semi-Sleeper-NON-AC">Semi-Sleeper-NON-AC</option>
                                          </select>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Amount Per Person</label>
                                        <input class="form-control"  type="text" required name="txtAmountPerPers" value="" id="txtAmountPerPers"/>		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control"  type="text" required name="txtTotalAmt" value="" id="txtTotalAmt"/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Number Of Persons</label>
                                        <input class="form-control"  type="text" required name="txtNoOfPers" value="" id="txtNoOfPers"/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Invoice</label>
                                        <input class="form-control" type="file"  name="fileTicket" value="" id="fileTicket"/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Justification About Travel</label>
                                       <textarea class="form-control" rows="4" cols="50" name="areaTrvJusti" required> </textarea>		
                                    </div>
                                       
                                     
                                      
                                     </div>
                                <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
<!--Add local reimbursement details model end form here-->





<!--Edit local reimbursement details model start form here-->
<div class="modal fade displaycontent" id="editTravelDetails">

    <div class="modal-dialog" role="document" style="width: 920px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Traveling Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="editTravelDetails" name="editTravelDetails" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/Travel/Travel_cntr/editTravelData') ?>" >

                            <div class="row">
                                 
                                <div class="col-sm-12" style="">
                                    <input class="form-control" type="hidden" required name="editTxtEmpCode" id="editTxtEmpCode"/>
                                    <input class="form-control" type="hidden" required name="editIdTrvelDetails" id="editIdTrvelDetails"/>
                                    <div class="form-group col-md-4">
                                        <label >Traveling Date</label>
                                        <input class="form-control"  readonly type="text" required name="editTdatepicker" value="" id="editTdatepicker"/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >From Station</label>
                                        <input class="form-control"   type="text" required name="editTxtFromSt" value="" id="editTxtFromSt"/>		
                                    </div>
									<div class="form-group col-md-4">
                                        <label >To Station</label>
                                        <input class="form-control"   type="text" required name="editTxtToSt" value="" id="editTxtToSt"/>		
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Departure Time</label>
                                        <input class="form-control"   type="text" required name="editTxtDepTime" value="" id="editTxtDepTime"/>		
                                    </div>
                                     
                                    <div class="form-group col-md-4">
                                        <label >Arrival Time</label>
                                        <input class="form-control"   type="text" required name="editTxtArrTime" value="" id="editTxtArrTime"/>		
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label >Amount Per Person</label>
                                        <input class="form-control"  type="text" required name="editTxtAmountPerPers" value="" id="editTxtAmountPerPers"/>		
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control"  type="text" required name="editTxtTotalAmt" value="" id="editTxtTotalAmt"/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Number Of Persons</label>
                                        <input class="form-control"  type="text" required name="editTxtNoOfPers" value="" id="editTxtNoOfPers"/>		
                                    </div>
                                    
                                    
                                     <div class="form-group col-md-4">
                                        <label >Justification About Travel</label>
                                        <textarea class="form-control" rows="4" cols="50" name="editAreaTrvJusti" id="editAreaTrvJusti" required> </textarea>		
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label  >Invoice Attachment</label>
                                        <div class="div_imagetranscrits">
                                        </div>
                                    </div>
                                       
                                     
                                      
                                     </div>
                                <center><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Edit Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
<!--Edit local reimbursement details model end form here-->



<!--Edit Hotel model action model pop up start from here-->
<div class="modal fade displaycontent" id="editHotelModel">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Hotel Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post"  action="<?php echo site_url('ELAR/Travel/Travel_cntr/editHotelData') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="  ">
                                    
                                    <div class="form-group col-md-4">
                                        <label >From Date</label>
                                        <input class="form-control" readonly type="hidden" required name="hotelDetailEditId" id="hotelDetailEditId"  data-validation-required-message="Please enter Valid Item Code."/>
                                        <input class="form-control" readonly type="text" required name="editFromDateAddHotel" id="editFromDateAddHotel"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                         
                                    <div class="form-group col-md-4">
                                        <label >To Date</label>
                                         
                                        <input class="form-control" readonly type="text" required name="editToDateAddHotel" id="editToDateAddHotel"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Bill No</label>
                                         
                                        <input class="form-control" type="text" required name="editTxtHotelBillNo" id="editTxtHotelBillNo"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                         
                                  
                                        <div class="form-group col-md-4">
                                        <label >Expenses</label>
                                        <input class="form-control" type="text" required name="editTxtExpense" id="editTxtExpense" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                    
                                    
                                   <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control" type="text" required name="editTxtAmount" id="editTxtAmount" value=""  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                        
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="editAreaReason"  id="editAreaReason"></textarea>  
                                     </div>
                                  <div class="form-group col-md-6">
                                        <label  >Invoice Attachment</label>
                                        <div class="div_imagetranscritsHotel">
                                        </div>
                                    </div>
                                </div>
                                <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Edit delete action model pop up end from here-->






<!--Edit delete action model pop up start from here-->
<div class="modal fade displaycontent" id="editIntraCity">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Edit Intra City Travel Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="addIntraTrvlDetails" name="addIntraTrvlDetails" action="<?php echo site_url('ELAR/Travel/Travel_cntr/editIntraTrvlDetails') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="">
                                     <div class="form-group col-md-4">
                                        <label >Travel Date</label>
                                        <input class="form-control" type="hidden" required name="intraCityEditId" id="intraCityEditId"   data-validation-required-message="Please enter Valid Item Code."/>
                                          <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>"  data-validation-required-message="Please enter Valid Item Code."/>
                                        <input class="form-control" readonly type="text" required name="editTrvelDate" id="editTrvelDate"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Place From</label>
                                        <input class="form-control" type="text" required name="editPlaceFrom" id="editPlaceFrom" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label >Place To</label>
                                        <input class="form-control" type="text" required name="editPlaceTo" id="editPlaceTo" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                      <div class="form-group col-md-4">
                                        <label >Travel Mode</label>
                                        <input class="form-control" type="text" required name="editTrvlMode" id="editTrvlMode" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label >Travel Amount</label>
                                        <input class="form-control" type="text" required name="editAmount" id="editAmount" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3"  name="editAreaReason" id="editAreaReason"></textarea>  
                                     </div>
                                    
                                </div>
                                <center><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Edit delete action model pop up end from here-->



<!--Add Hotel Detail model pop up start from here-->
<div class="modal fade displaycontent" id="addHotelDetails">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
           <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Hotel Claim Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('ELAR/Travel/Travel_cntr/addHotelsDraftDetails') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="  ">
                                     <div class="form-group col-md-4">
                                        <label >Date From</label>
                                        <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                                          <input class="form-control" type="hidden" required name="txtEmpCode" value="<?php echo $emp_code;?>"/>
                                        <input class="form-control" readonly type="text" required name="fromDateAddHotel" id="fromDateAddHotel"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                     
                                    <div class="form-group col-md-4">
                                        <label >Date To</label>
                                        <input class="form-control" readonly type="text" required name="toDateAddHotel" id="toDateAddHotel"  data-fromDateAddHotel-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                  
                                        <div class="form-group col-md-4">
                                        <label >Bill No.</label>
                                            <input class="form-control" type="text" required name="txtHotelBillNo" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                         </div>
                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label >Expenses</label>
                                        <input class="form-control" type="text" required name="txtExpense" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Total Amount</label>
                                        <input class="form-control" type="text" required name="txtAmount" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label >Invoice</label>
                                        <input class="form-control" type="file"  name="fileTicket" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3" name="areaReason"></textarea>  
                                     </div>
                                    
                                </div>
                                <center><button type="submit" name="save"  class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Add Hotel Detail model pop up end from here-->




<!--Add Travel Local Detail model pop up start from here-->
<div class="modal fade displaycontent" id="addLocalTravelDetails">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
           <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Travel Local Claim Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="addIntraTrvlDetails" name="addIntraTrvlDetails" action="<?php echo site_url('ELAR/Travel/Travel_cntr/addIntraTrvlDraftDetails') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="">
                                     <div class="form-group col-md-4">
                                        <label >Travel Date</label>
                                         <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                                          <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>"/>
                                        <input class="form-control" readonly type="text" required name="txtTrvelDate" id="txtTrvelDate"  data-validation-required-message="Please enter Valid Item Code."/>		
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Place From</label>
                                        <input class="form-control" type="text" required name="txtPlaceFrom" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label >Place To</label>
                                        <input class="form-control" type="text" required name="txtPlaceTo" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                    
                                     <div class="form-group col-md-4">
                                       <label for="sel1">Travel Mode:</label>
                                       <select class="form-control" name="comboTravMode" id="comboTravMode">
                                           <option value="Bike">Bike</option>
                                           <option value="Car">Car</option>
                                           <option value="Cab">Cab</option>
                                           <option value="Public Transport">Public Transport</option>
                                        </select>          
                                        </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label >Travel Amount</label>
                                        <input class="form-control" type="text" required name="txtAmount" id="txtAmount" value=""  data-validation-required-message="Please enter Valid Item Code."/>	
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label >Reason</label>
                                        <textarea class="form-control" required rows="3"  name="areaReason" id="areaReason"></textarea>  
                                     </div>
                                    
                                </div>
                                <center><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Add Local Travel Detail model pop up end from here-->





<!--Add Meal Local Detail model pop up start from here-->
<div class="modal fade displaycontent" id="addMealDetails">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
           <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Add Daily Allownce Details</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="addIntraTrvlDetails" name="addIntraTrvlDetails" action="<?php echo site_url('ELAR/Travel/Travel_cntr/addPersonsInMeal') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="">
                                     <div class="form-group col-md-6">
                                            <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                                          <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>"/>
                                         <label >Select Person</label>
                                            <select class="form-control" name="comboPersonsMeal" id="comboPersonsMeal" onchange="myFunction()">
                                            <option>Select</option>
                                            
                                            <?php $employee= $this->method_call->getTravllerListByClaimId($trv_mst_id);
 if($employee!=null){
			  
foreach ($employee->result() as $row8) 
 
         {  ?>
                                            
                                           
                              <option value="<?php echo $row8->emp_code ; ?>"> <?php echo $row8->emp_name; ?></option>
                                            <?php 
		 }
 } ?>
                                          </select>
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label >Enter Days</label>
                                        <input class="form-control" type="text" required name="totalDays" id="totalDays" onkeyup="calulate_total();" />	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Applicable Meal Rates Per Day</label>
                                        <input class="form-control" type="text" readonly name="txtMealRates" id="txtMealRates"/>	
                                    </div>
                                     <div class="form-group col-md-6">
                                        <label >Total Rates</label>
                                        <input class="form-control" type="text" readonly name="txtTotalRate" id="txtTotalRate"/>	
                                    </div>
                                    
                                    
                                </div>
                                <center><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Add Meal Detail model pop up end from here-->

<!--Add linkup Detail model pop up start from here-->
<div class="modal fade displaycontent" id="LinkIouTrvel">

    <div class="modal-dialog" role="document" style="width: 720px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3482AE">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">Link IOU With Travel</h4>
            </div>
            <div class="modal-body">



                <section class="module pt-10" id="contact" >
                    <div class="container" style="width: auto;">
                        <br>

                        <form method="post" id="addIntraTrvlDetails" name="addIntraTrvlDetails" action="<?php echo site_url('ELAR/Travel/Travel_cntr/linkIouWithTravel') ?>" >

                            <div class="row">
                                <div class="col-sm-12" style="">
                                     <div class="form-group col-md-8">
                                            <input class="form-control" type="hidden" required name="trv_mst_id" value="<?php echo $trv_mst_id;?>"/>
                                          <input class="form-control" type="hidden" required name="txtEmpCodeEdit" value="<?php echo $emp_code;?>"/>
                                         <label >Select Approved IOU Claim</label>
                                            <select class="form-control" name="comboLinkTrvlIou" id="comboLinkTrvlIou">
                                            <option>Select</option>
                                            
                                        <?php $employee= $this->method_call->getIouApprovedClaimList($emp_code);
 if($employee!=null){
			  
foreach ($employee->result() as $row8) 
 
         {  ?>
                                            
                                           
                              <option value="<?php echo $row8->lou_clm_id ; ?>"> <?php echo "Claim Date- ".$row8->iou_date." Claim Amount- ".$row8->iou_amt." Claim No- ".$row8->lou_clm_id; ?></option>
                                            <?php 
		 }
 } ?>
                                          </select>
                                        </div>
                                    
                                     <div class="form-group col-md-4">
                                         <label > &nbsp;</label>
                                         <center><button type="submit" name="save" class="btn" style="background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Add Details</button></center> 	
                                    </div>
                                    
                                    
                                </div>
                              
                                </section>

                            </div>
                            </form>
                    </div>
            </div>
        </div>
    
    
    
<!--Add linkup Detail model pop up end from here-->



 <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    
   function selectionPlant(palntId){
          
        if(palntId == ""){
            document.getElementById("btnSaveClaim").disabled= true;
            document.getElementById('txtPlantIdDynamic').value = '';
        }else{
         document.getElementById("txtPlantIdDynamic").value =  palntId;
         document.getElementById("txtPlantCode").value =  palntId;
        document.getElementById("btnSaveClaim").disabled= false;
    }     
    
   }
 function setTrvDetToPerson(setId){
    //alert(setId);
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
        // alert(id);
         
         
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

