


 <html>
			 <body>

      	  

 
 
 
 

      <h1>
      Employee Master 

      </h1>
   
</li>
      </ol>


    <!-- Main content -->
   	  
	<form method="post" id="main_form" action="<?php echo site_url('welcome/update_ency_pwd_one') ?>" enctype='multipart/form-data'>

              <table id="example" class="table table-bordered">
                <thead>
                <tr>
				 <th >Employee code</th>
				 <th >Employee Name</th>
                 
                  <th >Emp password</th>
				  <th >Encypted  password</th>
                
                </tr>
				
                </thead>
		
                <tbody>
				
				
				
				 <?php 
				 
				  
         foreach ($password_details->result() as $row)  
         {  
				$encrypted=crypt("RePl-lPeR@77", $row->emp_password);
				$ecode = $row->emp_code;
			$ency_pwd= $this->method_call->update_ency_pwd_one($encrypted,$ecode);
		
		    ?>
			
			 
			<tr> 
				
			<td><?php echo $row->emp_code;?></td>  
			 <td><?php echo $row->emp_name;?></td>   
				<td><?php echo $row->emp_password;?></td>   			
            <td><?php echo $encrypted;?></td>                
			
            </tr>  
				   <?php 
				
				   
				   } 
				   
				   
		 ?>  
				
			
       
                </tbody>
               		
              </table>
			  
		
<a href="#" id="excel" title="Generate Excel Sheet" ><img src="<?php echo base_url(); ?>assets/images/excel.jpg" style="heu=ight:30px;width:30px;"></img> Excel convert</a>
  
  
  </form>
   <?php include_once 'scripts.php'; ?>
  <script>
		
		$("#excel").click(function() {
	$('#example').tableExport({type:'excel'});

		});
		
</script>
			 </body>
</html>