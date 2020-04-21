<html>
    <body>
        
        <table id="exampletestExport" name="exampletestExport" class="table table-bordered" style="font-size: 12px!important;">
                <thead>
					<tr>
			 
                  <th >Sr. No.</th>
				  <th >Business Area</th>
				  <th >ION NO</th>
				  <th>Fund No</th>
				  <th>Project Name</th>
				  <th>Date of Project Completion</th>
				  <th >Item Code</th>
				    <th >Item Descriptions</th>
				   <th >UOM</th>
				    <th >Qty.</th>
					<th>Cost Centre</th>
					<th>Asset Group </th>
					<th>Asset Sub Group</th>
					<th>Asset Code</th>
					<th>Asset Sr No</th>
				
      </tr>
	
                </thead>
		<tbody>
		
		
							<?php
							
							$capex_id="340";
							$view_item = $this->method_call->qcs_items_assetcode($capex_id);
						
						$proj_det= $this->method_call->pr_proj_detail($capex_id); 
				
								
 if($view_item!=null){
	$sr_no=1;	

	
foreach ($view_item->result() as $row_asset1)  
			
         { 
			if($row_asset1->q_uom =="Each"){		
	
		
					for($i=0;$i < $row_asset1->q_req_quantity; $i++){
			
			
			
			//echo "printing data herere.......".$row_asset1->q_req_quantity." - asset id - ".$row_asset1->asset_id;
			//echo "test assset id------<br>".$row_asset1->asset_id;
				?>
				
				<tr> 
			<td><?php echo $row_asset1->asset_id; ?></td>
			<td><?php echo $row_asset1->cap_unit; ?></td>
				<td><?php echo "701035"; ?></td>
	            <td><?php echo "P10190011 (BUDGET SR. NO - 1401)"; ?></td>
			<td><?php print_r ($proj_det['project_detail']);?></td>
			<td><?php echo "2020-06-30"; ?></td>
		
			<td><?php echo $row_asset1->q_item_code; ?></td> 
			<td><?php echo $row_asset1->q_item_description; ?></td>  
			<td><?php echo $row_asset1->q_uom; ?></td> 
            <td><?php echo $row_asset1->q_req_quantity; ?></td>  
			<td><?php echo $row_asset1->cost_center; ?></td>  
			<td><?php echo $row_asset1->asset_grp; ?>  </td>  
			<td></td>
			<td></td>
			<td></td>
			</tr>
	
		
		 <?php  $sr_no++; }
		}
		
		elseif($row_asset1->q_uom !="Each") {
			
			
			
			
			
			//echo "printing data herere.......".$row_asset1->q_req_quantity." - asset id - ".$row_asset1->asset_id;
			//echo "test assset id------<br>".$row_asset1->asset_id;
				?>
				
				<tr> 
			<td><?php echo $row_asset1->asset_id; ?></td>
			<td><?php echo $row_asset1->cap_unit; ?></td>
			<td><?php echo "701035"; ?></td>
			<td><?php echo "P10190011 (BUDGET SR. NO - 1401)"; ?></td>
			<td><?php print_r ($proj_det['project_detail']);?></td>
			<td><?php echo "2020-06-30"; ?></td>
		
			<td><?php echo $row_asset1->q_item_code; ?></td> 
			<td><?php echo $row_asset1->q_item_description; ?></td>  
			<td><?php echo $row_asset1->q_uom; ?></td> 
            <td><?php echo $row_asset1->q_req_quantity; ?></td>  
			<td><?php echo $row_asset1->cost_center; ?></td>  
			<td><?php echo $row_asset1->asset_grp; ?>  </td>  
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<?php 
		}
		 }
		 
		 
 } ?>
                
				
	
	
		 </tbody>
		
		 </table>
        
    </body>
    
    </html>