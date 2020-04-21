 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All PR Status</title>
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

</head>
<body class="hold-transition skin-blue sidebar-mini" >
 
       	   <?php include_once 'purchase_sidebar.php'; ?>

 
 
 
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Create a PR
		<?php
if (isset($error)) {
echo "<div class='message'>";
echo $error;
echo "</div>";
}
?>
      </h1>
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li> <a href="<?php echo site_url('purchase/PR/purchase_requisition') ?>">Purchase</a></li>

<li class="active">Create a PR
</li>
</li>
      </ol>

    </section>

    <!-- Main content -->
      <section class="content">
      <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
   <div class="box-header with-border">
              <h3 class="box-title">Purchase Requisition</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">PR Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" readonly class="form-control"  required>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label">2</label>
			   <label class="col-sm-4 control-label"> Plant </label>
				<div class="input-group  col-sm-6">
                                      <input type="text" name="" readonly class="form-control"  required>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">PR Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" readonly name="pr_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">PR Type</label>
				<div class="input-group  col-sm-6">
                                    <input type="text" readonly name="" class="form-control"  required>
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5 </label>
			   <label class="col-sm-4 pull-left control-label">PR Owner</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly name="" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly name="" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				
				
				
			   <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-10 pull-left control-label">Requirement Details</label>
				
			  </div>
			  
			  
			    <div class="form-group col-sm-12">
			        <table id="example" class="table table-bordered table-striped" style="font-size: 12px!important;">
                <thead>
                <tr>
                  <th ></th>
                  
                  <th >Sr. No.</th>
				   <th>Item Code</th>
				   <th>Item Descriptions</th>
				   <th>Req Qty.</th>
				   <th>UOM</th>
				   <th>Approx. Rate</th>
				   <th>Approx. Total Amount</th>
				   <th>ION No.</th>
				   <th>Expected Delivery Period	</th>
				   <th>Project Details</th>
				   <th>Technical Details / Mfg Name</th>
                  
                </tr>
				
                </thead>
		
                <tbody>
				
	 

				<tr>
				 <td  > </td>
				 <td  > <input type="text" readonly name="serial_no" placeholder="" class="form-control"   required></td>
				 <td  > <input type="text" readonly name="product_model" placeholder=""class="form-control"  required>
</td>  
            <td>   <input type="text" readonly name="ship_date" class="form-control "   required></td>  
            <td> <input type="text" readonly name="install_date" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control " required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "  required></td>  
            <td>  <input type="text" readonly name="warranty_exp" class="form-control "   required></td>  
                
      </tr>
				
                </tbody>
               		
              </table>
			
			  </div>
			  
			  <div class="form-group col-sm-6">
			  
			  <label class="col-sm-1 pull-left control-label">8</label>
			   <label class="col-sm-5 pull-left control-label">Delivery Location</label>
				<div class="input-group  col-sm-6">
                 
                                                <input type="text" readonly name="" class="form-control"  required>

         
                </div>
                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">9</label>
			   <label class="col-sm-5 pull-left control-label">Inspection Required At Supplier End</label>
				<div class="input-group  col-sm-6">
                                                  <input type="text" readonly name="" class="form-control"  required>

               
         
                </div>
                </div>
				
				
				  <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">10</label>
			   <label class="col-sm-5 pull-left control-label">Considered in Budget</label>
				<div class="input-group  col-sm-6">
                 
                                                <input type="text" readonly name="" class="form-control"  required>

         
                </div>
                </div>
				
			    <div class="form-group col-sm-6">
			  
			 <label class="col-sm-1 pull-left control-label">11</label>
			   <label class="col-sm-5 pull-left control-label">Customer Cost</label>
				<div class="input-group  col-sm-6">
                  <input type="text" readonly name="" class="form-control"  required>
               
         
                </div><br>
							 <label class="col-sm-1 control-label"></label>

				  <label class="col-sm-5 control-label">Depending Field</label>
				<div class="input-group  col-sm-6">
                 
                                 <input type="text" readonly name="" class="form-control"  required>

         
                </div>
                </div>
				
			  <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">12</label>
			   <label class="col-sm-3 pull-left control-label">Reason Of Procurement</label>
				<div class="input-group  col-sm-8">
                 
                                                <input type="text" readonly name="" class="form-control"  required>

         
                </div>
                </div>
				
			    <div class="form-group col-sm-12">
			  
			 <label class="col-sm-1 pull-left control-label">13</label>
			   <label class="col-sm-3 pull-left control-label">Attachment</label>
				
                </div>
				  <div class="form-group col-sm-12">
<div class="col-sm-4"></div>
<div class="col-sm-4"><a href="#">Download Attachments</a></div>
<div class="col-sm-4"></div>
				
                </div>
		
			  
			  
			  
			  
			
			  
              </div>
              <!-- /.box-body -->
            
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
	
      </div>
	  
	     <div class="row" >
	          
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
   <div class="box-header with-border">
              <h3 class="box-title">QCS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		


              <div class="box-body">
			  
			  <div class="col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">1</label>
			   <label class="col-sm-4 pull-left control-label">QCS Number </label>
				<div class="input-group  col-sm-6">
                 
               
                                      <input type="text" name="" readonly class="form-control"  required>
    
                </div>
                </div>
				 <div class="form-group col-sm-4">
				 <label class="col-sm-1 control-label">2</label>
			   <label class="col-sm-4 control-label"> Plant </label>
				<div class="input-group  col-sm-6">
                                      <input type="text" name="" readonly class="form-control"  required>
           
               
         
                </div>
			  </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1  control-label">3</label>
			   <label class="col-sm-4 control-label">QCS Date</label>
				<div class="input-group  col-sm-6">
                  
				  <input type="date" class="form-control" readonly name="pr_date" readonly id="e" style=" line-height: 10px;padding: 0px 8px;   float: none;">
<script>
document.getElementById('e').value = new Date().toISOString().substring(0, 10);
</script>
               
         
                </div>
                </div>
				  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">4</label>
			   <label class="col-sm-4 pull-left control-label">Department</label>
				<div class="input-group  col-sm-6">
                                    <input type="text" readonly name="" class="form-control"  required>
          
         
                </div>
                </div>
			  
			  <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">5 </label>
			   <label class="col-sm-4 pull-left control-label">QCS Owner</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly name="" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				 <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">6</label>
			   <label class="col-sm-4 pull-left control-label">PR Reference</label>
				<div class="input-group  col-sm-6">
                 
                                            <input type="text" readonly name="" class="form-control"  required>
    
         
                </div>
                </div>
				
				
				
				
				
			   <div class="form-group col-sm-4">
			  
			  <label class="col-sm-1 pull-left control-label">7</label>
			   <label class="col-sm-10 pull-left control-label">Requirement Details</label>
				
			  </div>
			  
			  
			    <div class="form-group col-sm-12">
			        <table id="example6" class="table table-bordered table-striped display" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
			   <th  ></th>
                  
                  <th >Sr. No.</th>
				   <th >Item Code</th>
				   <th >HSN Code</th>
				   <th >Item Descriptions</th>
				   <th >Qty.</th>
				   <th >UOM</th>
				 <th colspan="3" ><center> <input type="text"placeholder="supplier 1 name"  name="" class="form-control"  required> <center></th>
			
				
				 <th colspan="3" > <center> <input type="text"placeholder="supplier 2 name"  name="" class="form-control"  required> <center></th>
				 <th colspan="3" > <center> <input type="text"placeholder="supplier 3 name"  name="" class="form-control"  required> <center></th>

				
                
      </tr>
			
                <tr >
                				 <th colspan="7" style="text-align:right;"></th>

				    <th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
			
			<th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
			<th>  Quot Rates </th>  
            <th>  Final Rates </th>  
            <th> Amount	</th>  
				  
                </tr>  
			
				
                </thead>
		
                <tbody>
				
	 
					<tr>
				 <td  >  </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;"  required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;"  required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;"  required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" required></td>
				
                
      </tr>
	  
	    <tr>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="7" style="text-align:right;"> Grand Total</td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly required></td>
				 <td  >  </td>
				 <td  >  </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly  required></td>
				 <td  >  </td>
				 <td  > </td>
				 <td  >  <input type="text"  name="" class="form-control" style="width: 100px;" readonly required></td>
				
                
      </tr> 

	  <tr>
			 
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="7" style="text-align:right;">PO to Be Release In Favor Of </td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 1 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">TECHNICAL DETAILS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 


	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 2 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">CREDIBILITY OF THE SUPPLIER CHECKED													
</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 3 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">INSURANCE & FREIGHT</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>

	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 4 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">DELIVERY PERIOD (In Working Days)</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 5 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">DELIVERY MODE</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr> 
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 6 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">INSPECTION / TESTING													</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 7 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">PAYMENT TERMS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 8 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">WARRANTY</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 9 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">TAXES & DUTIES</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
              <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 10 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">SCOPE OF INSTALLATION</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
              <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 11 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">SUPPLIERS CONTACT DETAILS</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 12 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">VALIDITY OF PRICE /QUOT (In Days)</td>
				 <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				  <td colspan="3"  >  <input type="text"  name="" class="form-control full_width"   required> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
	  
	  <tr>
	  
			 <td style="display:none" >  </td>
			  <td > 13 </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
			 <td style="display:none" >  </td>
				 <td colspan="6" style="text-align:right;">Quotation</td>
								 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 <td colspan="3" >  <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Initial Quote</button>
 <input type="file" id="btn-submit" class="btn" style="border: 1px solid orange;width: 100%;">Final Quote</button> </td>
				 <td style="display:none"> </td>
				 <td style="display:none" >  </td>
				 <td style="display:none"> </td>
				 
				
                
      </tr>
                </tbody>
               		
              </table>
			  
			  
			  
			  
			  
			  
			  
		  </div>
			  
			  <div class="form-group col-sm-3">
			  
	
			   <label class="col-sm-12 pull-left control-label">Additional Remarks </label>
			                </div>
				
			   
			  <div class="form-group col-sm-6">
			  
			    <textarea></textarea>
                </div>
				
				
				
			  
			
			  
              </div>
              <!-- /.box-body -->
                <div class="box-footer">
			   		
			  <div class="form-group col-sm-12">
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Save</button></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Reset</button></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Cancel</button></div>
				
                </div>
			    <div class="form-group col-sm-12">
<div class="col-sm-4"></div>
<div class="col-sm-4"><button type="button" id="btn-submit" class="btn  bg-skincolor " style="border: 1px solid orange;width: 100%;">Approve</button></div>
<div class="col-sm-4"></div>
				
                </div>
              </div>
              <!-- /.box-footer -->
          </div>

        </div>
        <!--/.col (right) -->
	
      </div>
	  
	  
	  
	  
	  
	  
	  
      <!-- /.row -->
    </section>
    <!-- /.content -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

       	   <?php include_once 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
   <script type="text/javascript">

$(document).ready(function (){
   var table = $('#example6').DataTable({
	   
	   'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
	   "scrollX": true,
	  "bStateSave": true,
	  	  "ordering": false,
		  "paging": false,
  //"scrollY":        '50vh',
     //   "scrollCollapse": true
   });
   
   
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	
	
    // Handle form submission event
    $('#delete_can').on('click', function(e){
      var form = this;
      
      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'text')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

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
	    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Delete Customer Purchase Information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) $( "#delpur" ).submit();
    });
    
   });  
   
   
   
   
   
   
   
   

});
</script>
 
  <script type='text/javascript'>
$('#btn-submit').on('click',function(e){
	

    var form = $(this).parents('form');
	if(form.valid()){
			
    swal({
        title: "Submit PR",
        text: "You will not be able to Edit this PR!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    }, function(isConfirm){
		
        if (isConfirm){			 
				 form.submit();		
 swal("Submitted!", "Your PR Recorded Successfully.", "success");				 
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