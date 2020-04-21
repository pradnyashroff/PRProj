 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit / Delete Item </title>
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

</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family:'exo';" >
 
      	   <?php include_once 'headsidelist.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:#3482AE;text-transform: uppercase;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:#FFFFFF; font-family:'exo';text-transform: uppercase;">
      Edit / Delete Item 
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb" style="color:#FFFFFF;text-transform: uppercase;">
        <li><a href="<?php echo site_url('Welcome/index') ?>" style="color:#FFFFFF;text-transform: uppercase;"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/QCS/index') ?>" style="color:#FFFFFF;text-transform: uppercase;">QCS</a></li>

<li class="active" style="color:#FFFFFF;text-transform: uppercase;"> Edit / Delete Item 
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
	  
	  <?php $item_qdetail= $this->method_call->edit_qcs_items($qcs_item_id);
 if($item_qdetail!=null){
	 foreach ($item_qdetail->result() as $row)  
         {  ?>
	  
	  
      <div class="row" >
<form method="POST" action="<?php echo site_url('purchase/QCS/draft_updateitem');?>">  
        <div class="col-md-12">
          <!-- Horizontal Form -->
		  

          <div class="box">
 
            <!-- /.box-header -->
            <!-- form start -->
		


             <div class="box-body" style="box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);">
			  
			
			 <input type="hidden" name="q_item_id"value="<?php echo $row->qcs_item_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>
				  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               <input type="text" name="qid"value="<?php echo $row->qcs_id; ?>" style="background-color:#E6F2FF;" readonly class="form-control"  required>
    
                </div>
                </div>
					  <?php $q_detail= $this->method_call->qcs_detail_itemid($qcs_item_id);
 if($q_detail!=null){
	 foreach ($q_detail->result() as $rowdata)  
         {  ?>
	  
				
				 <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">2</label>
			   <label class="col-sm-4 pull-left control-label">PR NO </label>
				<div class="input-group  col-sm-6">
                 
              <input type="text" style="background-color:#E6F2FF;" readonly name="pr_id" value="<?php echo $rowdata->pr_id; ?>" class="form-control"  required>
    
                </div>
                </div>
			
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly name="qcs_date" value ="<?php echo $rowdata->qcs_date; ?>">

                </div>
                </div>
				 
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
                 
                  <input type="text" class="form-control" style="background-color:#E6F2FF;" readonly name="" value ="<?php echo $rowdata->qcs_owner; ?>">
    
         
                </div>
                </div>
				
				
			 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
			   <div class="input-group  col-sm-6">
				  <?php $dept_nm= $this->method_call->fetch_dept_nm($rowdata->dept_id); ?>


	  <input type="Text" name="pr_dept" class=" form-control" id="pr_dept" style="background-color:#E6F2FF;" readonly value="<?php print_r($dept_nm['dept_name']); ?>" placeholder="PR Department" required>
	  </div>
                </div>
			  
			 
			 
			 
					  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Plant</label>
				<div class="input-group  col-sm-6">
				
				<input type="text" class="form-control" style="background-color:#E6F2FF;" readonly name="qcs_date" value ="<?php echo $rowdata->plant_code; ?>">
          
         
                </div>
                </div>
						
				
				
	
				
				
		
				
			  
			    <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   
			   <label class="col-sm-4 pull-left control-label"> Item Details </label>
			  </div>
			  
			  		 
			 
 <div class="form-group col-sm-12">
            <div class="row">
              <div class="col-sm-12" style="  "><!-- temp_qcs_id = cobination of pr+emp_code -->
  <!--
<input type="text"  name="temp_itemcode" value="<?php echo $row->item_id; ?>" class="form-control"  > -->
      
				  <div class="form-group col-md-4">
                    <label >Item Code</label>
		  <input class="form-control" type="text" name="q_update_itemc" required value="<?php echo $row->q_item_code;?>"  data-validation-required-message="Please enter Valid Item code."/>
			
       <!--  <?php $item_nm= $this->method_call->fetch_item_nm($row->q_item_code); ?>
 <input type="Text" name="" class=" form-control" id=""  value="<?php print_r($item_nm['item_code']); ?>"  >-->
	 	</div>
		
		
				  <div class="form-group col-md-8" style="float: right;">
                    <label >Item Description</label>
 <input class="form-control" type="text" name="q_update_item_desc" required value="<?php echo $row->q_item_description; ?>"  data-validation-required-message="Please enter Valid Item Descriptions."/>		 	</div>
				    
         <div class="form-group col-md-4">
                    <label >Required Quantity</label>
 <input class="form-control" type="text" name="q_update_qty" id="qty" onkeyup="mulReq(this.value);" required value="<?php echo $row->q_req_quantity; ?>"  data-validation-required-message="Please enter Valid Quantity."/>		 	</div>

  <div class="form-group col-md-4">
                    <label >UOM</label>
				  <select class="form-control" name="q_update_uom" required > 
			<option value="<?php echo $row->q_uom; ?>"><?php echo $row->q_uom; ?>	</option>				  
					<option value="Each">	Each	</option>
					
<option value="Kilogram">	Kilogram	</option>
<option value="Dozen">	Dozen	</option>
<option value="Meter">	Meter	</option>
<option value="Foot">	Foot	</option>
<option value="Liter">	Liter	</option>
<option value="BOX">	BOX	</option>
<option value="Bag">	Bag	</option>
<option value="Rupees">	Rupees	</option>
<option value="SET">	SET	</option>
<option value="Kilometer">	Kilometer	</option>
<option value="Gram">	Gram	</option>
<option value="Hours">	Hours	</option>
<option value="Days">	Days	</option>
<option value="Months">	Months	</option>
<option value="Minute">	Minute	</option>
<option value="Pack">	Pack	</option>
<option value="Pair">	Pair	</option>
<option value="Pallet">	Pallet	</option>
<option value="Centimeter">	Centimeter	</option>
<option value="Inch">	Inch	</option>
<option value="1_minute">	1_minute</option>
<option value="1_Square Meter">	1_Square Meter	</option>
<option value="Acre">	Acre	</option>
<option value="Activity unit">	Activity unit	</option>
<option value="Bottle">	Bottle	</option>
<option value="Canister">	Canister	</option>
<option value="Carton">	Carton	</option>
<option value="Case">	Case	</option>
<option value="Centiliter">	Centiliter	</option>
<option value="Centimeter/second">	Centimeter/second	</option>
<option value="Crate">	Crate	</option>
<option value="Cubic centimeter">	Cubic centimeter	</option>
<option value="Cubic centimeter/second">	Cubic centimeter/second	</option>
<option value="Cubic decimeter">	Cubic decimeter	</option>
<option value="Cubic foot">	Cubic foot	</option>
<option value="Cubic inch">	Cubic inch	</option>
<option value="Cubic meter">	Cubic meter	</option>
<option value="Cubic meter/day">	Cubic meter/day	</option>
<option value="Cubic meter/Hour">	Cubic meter/Hour	</option>
<option value="Cubic meter/second">	Cubic meter/second	</option>
<option value="Cubic millimeter">	Cubic millimeter	</option>
<option value="Cubic yard">	Cubic yard	</option>
<option value="Days">	Days	</option>
<option value="Decibel (A Weighting)">	Decibel (A Weighting)	</option>
<option value="Decibel (C Weighting)">	Decibel (C Weighting)	</option>
<option value="Decimeter">	Decimeter	</option>
<option value="Degree">	Degree	</option>
<option value="Drum">	Drum	</option>
<option value="Enzyme Units">	Enzyme Units	</option>
<option value="Enzyme Units/Milliliter">	Enzyme Units/Milliliter	</option>
<option value="Evaporation Rate">	Evaporation Rate	</option>
<option value="Fluid Ounce US">	Fluid Ounce US	</option>
<option value="Gallon">	Gallon	</option>
<option value="Gallons per hour (US)">	Gallons per hour (US)	</option>
<option value="Gallons per mile (US)">	Gallons per mile (US)	</option>
<option value="Gigajoule">	Gigajoule	</option>
<option value="Gigaohm">	Gigaohm	</option>
<option value="Gram Active Ingredient">	Gram Active Ingredient	</option>
<option value="Gram Active Ingredient/Liter">	Gram Active Ingredient/Liter	</option>
<option value="Gram Gold">	Gram Gold	</option>
<option value="Gram/Cubic Centimeter">	Gram/Cubic Centimeter	</option>
<option value="Gram/Cubic meter">	Gram/Cubic meter	</option>
<option value="Gram/liter">	Gram/liter	</option>
<option value="Gram/Mole">	Gram/Mole	</option>
<option value="Gram/square meter">	Gram/square meter	</option>
<option value="Gross">	Gross	</option>
<option value="Group proportion">	Group proportion	</option>
<option value="Half Yearly">	Half Yearly	</option>
<option value="Heat Conductivity">	Heat Conductivity	</option>
<option value="Hectare">	Hectare	</option>
<option value="Hectoliter">	Hectoliter	</option>
<option value="Hour">	Hour	</option>
<option value="Joule/Kilogram">	Joule/Kilogram	</option>
<option value="Joule/Mole">	Joule/Mole	</option>
<option value="Kelvin/Minute">	Kelvin/Minute	</option>
<option value="Kelvin/Second">	Kelvin/Second	</option>
<option value="kg / ea">	kg / ea	</option>
<option value="kg Active Ingredient/kg">	kg Active Ingredient/kg	</option>
<option value="Kilogram Active Ingredient">	Kilogram Active Ingredient	</option>
<option value="Kilogram/cubic decimeter">	Kilogram/cubic decimeter	</option>
<option value="Kilogram/cubic meter">	Kilogram/cubic meter	</option>
<option value="Kilogram/Mole">	Kilogram/Mole	</option>
<option value="Kilogram/second">	Kilogram/second	</option>
<option value="Kilogram/US Barrel">	Kilogram/US Barrel	</option>
<option value="Kilojoule/kilogram">	Kilojoule/kilogram	</option>
<option value="Kilojoule/Mole">	Kilojoule/Mole	</option>
<option value="Kilometer/hour">	Kilometer/hour	</option>
<option value="Kilomol">	Kilomol	</option>
<option value="Kilonewton">	Kilonewton	</option>
<option value="Kilopascal">	Kilopascal	</option>
<option value="Kiloton">	Kiloton	</option>
<option value="Kilovoltampere">	Kilovoltampere	</option>
<option value="Length in Metres per Unit">	Length in Metres per Unit	</option>
<option value="Liter per 100 km">	Liter per 100 km	</option>
<option value="Liter per hour">	Liter per hour	</option>
<option value="Liter/Minute">	Liter/Minute	</option>
<option value="Liter/Mole Second">	Liter/Mole Second	</option>
<option value="Megajoule">	Megajoule	</option>
<option value="Meganewton">	Meganewton	</option>
<option value="Megavolt">	Megavolt	</option>
<option value="Megavoltampere">	Megavoltampere	</option>
<option value="Megawatt hour">	Megawatt hour	</option>
<option value="Megohm">	Megohm	</option>
<option value="Meter/Hour">	Meter/Hour	</option>
<option value="Meter/Minute">	Meter/Minute	</option>
<option value="Meter/second">	Meter/second	</option>
<option value="Meter/Square Second">	Meter/Square Second	</option>
<option value="Microampere">	Microampere	</option>
<option value="Microfarad">	Microfarad	</option>
<option value="Microgram/cubic meter">	Microgram/cubic meter	</option>
<option value="Microgram/liter">	Microgram/liter	</option>
<option value="Microliter">	Microliter	</option>
<option value="Micrometer">	Micrometer	</option>
<option value="Microsecond">	Microsecond	</option>
<option value="Microsiemens per centimeter">	Microsiemens per centimeter	</option>
<option value="Mile">	Mile	</option>
<option value="Miles per gallon (US)">	Miles per gallon (US)	</option>
<option value="Millifarad">	Millifarad	</option>
<option value="Milligram">	Milligram	</option>
<option value="Milligram/cubic meter">	Milligram/cubic meter	</option>
<option value="Milligram/liter">	Milligram/liter	</option>
<option value="Milliliter">	Milliliter	</option>
<option value="Milliliter Active Ingredient">	Milliliter Active Ingredient	</option>
<option value="Millimeter">	Millimeter	</option>
<option value="Millimole per Liter">	Millimole per Liter	</option>
<option value="Millinewton/meter">	Millinewton/meter	</option>
<option value="Millipascal seconds">	Millipascal seconds	</option>
<option value="Millisecond">	Millisecond	</option>
<option value="Mole per Cubic Meter">	Mole per Cubic Meter	</option>
<option value="Mole per Liter">	Mole per Liter	</option>
<option value="Nanoampere">	Nanoampere	</option>
<option value="Nanofarad">	Nanofarad	</option>
<option value="Nanometer">	Nanometer	</option>
<option value="Nanosecond">	Nanosecond	</option>
<option value="Newton/meter">	Newton/meter	</option>
<option value="Newton/Square millimeter">	Newton/Square millimeter	</option>
<option value="Number of Persons">	Number of Persons	</option>
<option value="Ounce">	Ounce	</option>
<option value="Parts per billion">	Parts per billion	</option>
<option value="Parts per million">	Parts per million	</option>
<option value="Parts per trillion">	Parts per trillion	</option>
<option value="Pascal second">	Pascal second	</option>
<option value="Per mille">	Per mille	</option>
<option value="Percentage">	Percentage	</option>
<option value="Permeation Rate">	Permeation Rate	</option>
<option value="Permeation Rate SI">	Permeation Rate SI	</option>
<option value="Picosecond">	Picosecond	</option>
<option value="Piece">	Piece	</option>
<option value="Pikofarad">	Pikofarad	</option>
<option value="Pint, US liquid">	Pint, US liquid	</option>
<option value="Points">	Points	</option>
<option value="Pound">	Pound	</option>
<option value="Quart, US liquid">	Quart, US liquid	</option>
<option value="Quarterly">	Quarterly	</option>
<option value="Role">	Role	</option>
<option value="Siemens per meter">	Siemens per meter	</option>
<option value="Spec. Heat Capacity">	Spec. Heat Capacity	</option>
<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
<option value="Specific Electrical Resistance">	Specific Electrical Resistance	</option>
<option value="Square centimeter">	Square centimeter	</option>
<option value="Square foot">	Square foot	</option>
<option value="Square inch">	Square inch	</option>
<option value="Square kilometer">	Square kilometer	</option>
<option value="Square meter">	Square meter	</option>
<option value="Square meter/second">	Square meter/second	</option>
<option value="Square mile">	Square mile	</option>
<option value="Square millimeter">	Square millimeter	</option>
<option value="Square Yard">	Square Yard	</option>
<option value="Thousands">	Thousands	</option>
<option value="Ton">	Ton	</option>
<option value="Ton/Cubic meter">	Ton/Cubic meter	</option>
<option value="US gallon">	US gallon	</option>
<option value="US Ton">	US Ton	</option>
<option value="Value-Only Material">	Value-Only Material	</option>
<option value="Voltampere">	Voltampere	</option>
<option value="Weeks">	Weeks	</option>
<option value="Yards">	Yards	</option>
<option value="Years">	Years	</option>

					
					</select>
		 	</div>

	 <div class="form-group col-md-4" style="float: right;">
                    <label >HSN Code</label>
 <input class="form-control" type="text" name="q_update_hsn" required value="<?php echo $row->q_hsn_code; ?>"  data-validation-required-message="Please enter Valid Item Descriptions."/>	
 </div>		
			
  <div class="form-group col-md-12">		
<div class="form-group col-md-4">
                    <label >Supplier Name</label>
</div>			
<div class="form-group col-md-2">
                    <label >Quot Rates</label>
</div>

<div class="form-group col-md-2">
                    <label >Quoted  Amt</span></label>
 	 	</div>
		
		
<div class="form-group col-md-2">
                    <label >Final Rates</span></label>
 	 	</div>
 
<div class="form-group col-md-2">
                    <label >Final Amt</label>
 	 	</div>

 <!-- supplier1 -->
 <div class="form-group col-md-4" style="display:block;text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">
                    <label >1. <?php echo $rowdata -> sup1_nm;?></label>
</div>	
		
 <div class="form-group col-md-2">
   <input class="form-control" type="text" name="q_update_quot_rate1" id ="quot_rate1"  onkeyup="mulQuotRate1();"  required value="<?php echo $row->quot_rate1; ?>"  data-validation-required-message="Please enter Valid Item Descriptions."/>	                

 </div>
 
 
  <div class="form-group col-md-2">
                   
 <input class="form-control" type="text"  required name="q_update_quot_amt1" style="background-color:#E6F2FF;" readonly id="quot_amt1" value="<?php echo $row->quoted_amt1; ?>"  />	
 </div>
 
 
 
				<div class="form-group col-md-2">
                 <input class="form-control" type="text"  value="<?php echo $row->final_rate1; ?>"  required name="q_update_final_rate1" id= "final_rate1" onkeyup="mulfinal_amt1();"  value=""  />		
				 </div>
				 
				 <div class="form-group col-md-2">
                  
 <input class="form-control" type="text"  required name="q_update_amount1" style="background-color:#E6F2FF;" readonly id="amount1" value="<?php echo $row->final_amt1; ?>" />	
 </div>
 </div>
 
 <div class="form-group col-md-12">
			
	<div class="form-group col-md-4" style="display:block;text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">
                    <label > 2. <?php echo $rowdata -> sup2_nm;?></label>
	 	</div>			
<div class="form-group col-md-2">
                   
 <input class="form-control" type="text" value="<?php echo $row->quot_rate2; ?>"   required name="q_update_quot_rate2" id="quot_rate2" onkeyup="mulQuotRate2();"  value=""  />
 </div>
 
 <div class="form-group col-md-2">
                   
 <input class="form-control" type="text"  value="<?php echo $row->quoted_amt2; ?>" style="background-color:#E6F2FF;" readonly required name="q_update_quot_amt2" id="quot_amt2" value=""  />	
 </div>
 
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="text"  value="<?php echo $row->final_rate2; ?>"  required name="q_update_final_rate2" id="final_rate2"  onkeyup="mulfinal_amt2();"   />		 	</div>
 
<div class="form-group col-md-2">
                   
 <input class="form-control" type="text"  value="<?php echo $row->final_amt2; ?>" style="background-color:#E6F2FF;" readonly required name="q_update_amount2" id="amount2"   />		 	</div>

</div>
 
 
 <!-- Supplier 3-->
 <div class="form-group col-md-12">
 
 	<div class="form-group col-md-4" style="display:block;text-overflow: ellipsis;overflow: hidden; white-space: nowrap;">
 <label > 3.  <?php echo $rowdata -> sup3_nm;?></label>
  	</div>
			
			
<div class="form-group col-md-2">
                  
 <input class="form-control" type="text" onkeyup="mulQuotRate3();"   required name="q_update_quot_rate3" id="quot_rate3" value="<?php echo $row->quot_rate3; ?>"  />	
 </div>
 
 <div class="form-group col-md-2">
                  
 <input class="form-control" type="text" required name="q_update_quot_amt3" style="background-color:#E6F2FF;" readonly  id="quot_amt3" value="<?php echo $row->quoted_amt3; ?>"  />	
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="text" onkeyup="mulfinal_amt3();" required name="q_update_final_rate3"  id="final_rate3" value="<?php echo $row->final_rate3; ?>"     />
 </div>
 
<div class="form-group col-md-2">
                    
 <input class="form-control" type="text" required name="q_update_amount3" style="background-color:#E6F2FF;" readonly id="amount3" value="<?php echo $row->final_amt3; ?>"     />
 </div>

 </div>
		  <!--button -->
   <div class="form-group col-sm-12">
			<div class="col-sm-4">
			</div>
<div class="col-sm-2">

 <button type="submit" id="item_btnold" class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Update Item</button>
 </form>
 </div>

  
	<!-- Delete Item -->
	<form method="post" action="<?php echo site_url('purchase/QCS/draft_deleteItem/'.$row->qcs_item_id);
			?>">
			  
<input type="hidden"  name="del_itemid" value="<?php echo $row->item_id; ?>" class="form-control"  >
<div class="col-sm-2">
<button type="submit" id="item_btnold"  class="btn" style="width: 80%;background-color:#3482AE;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);font-family:'exo';text-transform: uppercase;">Delete Item </button>
</div>

</form>	



<div class="col-sm-4">
			</div>
 
		
				
                </div>
				<!--end-->

		</div>
		
		
              <!-- /.box-body -->
          
              <!-- /.box-footer -->
			 		 <?php }  
		}
         ?>   
          </div>
</div>
        </div>
        <!--/.col (right) -->

      </div>
      <!-- /.row -->
	  
	
	  
	  
	  	 <?php }
 } ?>
			  
	  
      <!-- /.row -->
   
    <!-- /.content -->
   <!-- /.content -->
  </div>
   </section>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
<script>
function mulReq(quantity){

//alert("in the mulreq function->"+quantity);	
var quoteRate1 = document.getElementById('quot_rate1').value;
var quoteRate2 = document.getElementById('quot_rate2').value;
var quoteRate3 = document.getElementById('quot_rate3').value;

var finalRate1 = document.getElementById('final_rate1').value;
var finalRate2 = document.getElementById('final_rate2').value;
var finalRate3 = document.getElementById('final_rate3').value;

	var quotedMultiply1 = quoteRate1 * quantity;
	var quotedMultiply2 = quoteRate2 * quantity;
	var quotedMultiply3 = quoteRate3 * quantity;
	
	var finalMultiply1 = finalRate1 * quantity;
	var finalMultiply2 = finalRate2 * quantity;
	var finalMultiply3 = finalRate3 * quantity;
	
document.getElementById('quot_amt1').value = quotedMultiply1;
document.getElementById('quot_amt2').value = quotedMultiply2;
document.getElementById('quot_amt3').value = quotedMultiply3;

document.getElementById('amount1').value = finalMultiply1;
document.getElementById('amount2').value = finalMultiply2;
document.getElementById('amount3').value = finalMultiply3;




}
</script>



<script>
	function mulQuotRate1(){
		var quantity = document.getElementById('qty').value;
		var quotRate1 = document.getElementById('quot_rate1').value;
		
		
		var multiply1 = quantity * quotRate1;
		var setResult = multiply1.toFixed(2);
	
		document.getElementById('quot_amt1').value = setResult;	
		
		
	}
</script>
		

<script>
	function mulQuotRate2(){
		var quantity = document.getElementById('qty').value;
		var quotRate2 = document.getElementById('quot_rate2').value;
		
		var multiply2 = quantity * quotRate2;
		var setResult = multiply2.toFixed(2);
	
		document.getElementById('quot_amt2').value = setResult;	
		
	}
</script>


<script>

		function mulQuotRate3(){
				var quantity = document.getElementById('qty').value;
				var quotRate3 = document.getElementById('quot_rate3').value;
		
				var multiply3 = quantity * quotRate3;
				var setResult = multiply3.toFixed(2);
	
				document.getElementById('quot_amt3').value = setResult;	
		
		}
</script>

<script>

		 function mulfinal_amt1(){
			var quantity = document.getElementById('qty').value;
			var finalRate1 = document.getElementById('final_rate1').value;
			var multiplyFinal1 = quantity * finalRate1;
				var setResult = multiplyFinal1.toFixed(2);
			document.getElementById('amount1').value = setResult;	
			 
		 }
</script>


<script>
		function mulfinal_amt2(){
			var quantity = document.getElementById('qty').value;
			var finalRate2 = document.getElementById('final_rate2').value;
			var multiplyFinal2 = quantity * finalRate2;
				var setResult = multiplyFinal2.toFixed(2);
			document.getElementById('amount2').value = setResult;	
			
		}
</script>


<script>
		function mulfinal_amt3(){
			var quantity = document.getElementById('qty').value;
			var finalRate3 = document.getElementById('final_rate3').value;
			var multiplyFinal3 = quantity * finalRate3;
				var setResult = multiplyFinal3.toFixed(2);
			document.getElementById('amount3').value = setResult;	
			
		}
</script>   

  <script type='text/javascript'>
$('#btn-submit').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Submit QCS Step-1",
        text: "You will not be able to Edit this QCS!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your QCS Step -1 Recorded Successfully.", "success");				 
				} 
    }
	
	);
	
	}
	else{
			  swal("Warning!", "Please Fill the required fields.", "warning");

	}
	
});
</script>




  </body>
</html>