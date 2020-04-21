<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PR_draft extends CI_Controller {

	
	 
	 public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');
 $this->method_call =& get_instance();


$this->load->model('purchase/pr_model');
}
	
###########navigation##############
	
		
	
   

###########navigation##############
###########Database Insertion Code##############

public function draft_update_pr()//fetching pr data 
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y');
 $date=date('Y-m-d H:i:s');
	  $data = array(

'pr_type' => $this->input->post('pr_type'),
'delivary_loc' => $this->input->post('delivary_loc'),
'inspection_req' => $this->input->post('inspection_req'),
'budget_consider' => $this->input->post('budget_consider'),
//'cust_cost' => $this->input->post('cust_cost'),
//'cust_cost_val' => $this->input->post('cust_cost_val'),
'procurement_res' => $this->input->post('procurement_res'),
'add_date' => $date,
'pr_state' => $this->input->post('pr_state'),
'ph_id' => $this->input->post('pr_ph_id'),
'pr_source_id' => $this->input->post('pr_source_id'),
'ion_no' => $this->input->post('ion_no'),
'cust_cost_upfront'=> $this->input->post('cust_cost_upfront'),
'cust_cost_amortization'=> $this->input->post('cust_cost_amortization'),
'own_investment'=> $this->input->post('own_investment'),
);

$draft_pr_id=$this->input->post('draft_pr_id');
$pr_state=$this->input->post('pr_state');
$this->pr_model->updatedraft($draft_pr_id,$data); 


if($pr_state=='submited_dh'){
$statusdata= array(
'pr_id' => $draft_pr_id,
'status_name' => "1",
'pr_by_id' => $this->input->post('pr_owner'),
'approval_id' => $this->input->post('pr_dh_id'),
'status_date' => $date,
);

$status_upd=$this->pr_model->pr_status_insert($statusdata);
}

if($pr_state=='submited_dh'){
$sourceid_update= array(
'pr_id' => $draft_pr_id,
'pr_source_id' => $this->input->post('pr_source_id'),
);
$sourceid_upd=$this->pr_model->pr_sourceid_update($draft_pr_id,$sourceid_update);


  $reciver= $this->input->post('dh_eid');
 		
  		$ccuser=$this->input->post('owner_eid');
		 $subject='New PR Filed By '.$this->input->post('pr_owner_name').' PR No '.$draft_pr_id.' Waiting for your Approval ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('delivary_loc'). '</li>
	<li><b>PR No:</b>  '.$draft_pr_id.'</li>
	<li><b>PR Date:</b>  '.$this->input->post('pr_date'). '</li>
	<li><b>PR Owner:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Pocurement Reason:</b>  '.$this->input->post('procurement_res'). '</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approval Date:</b>  '.$date. '</li>
	
	<li>Status Changed to: New PR Filed</li>
</ol>

   Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
      $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    
    
}



     if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files($_FILES['upload_data']['name'], $_FILES['upload_data'], $draft_pr_id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			else{
				
				
			}
    ?>
                <script type="text/javascript">
                    alert("Your Purchase Requision Updated with PR ID <?php echo $draft_pr_id; ?>");
                </script>
            <?php
  
  
  
  
        $this->load->helper('url');
        
      
		$this->load->view('purchase/pr_master');
   }
   
   
   
   
   
   public function add_item_draft()//fetching pr data  Draft
   {
	   if($this->input->post('item_id_list')){
				$ids = $this->input->post('item_id_list');
				 $pr_id=$this->input->post('pr_id');

			$var=explode(',',$ids);
   foreach($var as $row)
    {
		
		 $this->db->where('item_id', $row);
$this->db->delete('pr_items');
	
    }?>	
	<script>
	
	alert("Records are Deleted Successfully");
	</script>
		<?php 
		   }
	   
	   else{
      		date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
	  $data = array(
'pr_id' =>  $pr_id,
'item_code' => $this->input->post('item_code'),
'item_description' => $this->input->post('item_description'),
'req_qty' => $this->input->post('req_qty'),
'uom' => $this->input->post('uom'),
'approx_rate' => $this->input->post('approx_rate'),
'approx_total_amt' => $this->input->post('approx_total_amt'),
//'ion_no' => $this->input->post('ion_no'),
'expected_delivery' => $this->input->post('expected_delivery'),
'project_detail' => $this->input->post('project_detail'),
'technical_detail' => $this->input->post('technical_detail'),
'cust_code' => $this->input->post('customer_code'),
'sales_material' => $this->input->post('saleable_material'),
'ecn_new' => $this->input->post('ecn_new'),
'ecn_newcode' => $this->input->post('ecn_newcode'),
'add_date' => $date,
);
		$result=$this->pr_model->item_insert($data);
	   }
	   
       $data['pr_id']=$pr_id;
        $this->load->helper('url');

	//	$this->load->view('purchase/view_draft_pr',$data);
	  echo '<script>window.history.back();</script>';

   }
   
    public function add_item()//Item Addition 
   {
	   if($this->input->post('item_id_list')){
				$ids = $this->input->post('item_id_list');
				
			$var=explode(',',$ids);
   foreach($var as $row)
    {
		
		 $this->db->where('item_id', $row);
$this->db->delete('pr_items');
	
    }?>	
	<script>
	
	alert("Records are Deleted Successfully");
	</script>
		<?php 
		   }
	   
	   else{
      		date_default_timezone_set('Asia/Kolkata');
$date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
	  $data = array(
'pr_id' =>  $temp_pr,
'item_code' => $this->input->post('item_code'),
'item_description' => $this->input->post('item_description'),
'req_qty' => $this->input->post('req_qty'),
'uom' => $this->input->post('uom'),
'approx_rate' => $this->input->post('approx_rate'),
'approx_total_amt' => $this->input->post('approx_total_amt'),
//'ion_no' => $this->input->post('ion_no'),
'expected_delivery' => $this->input->post('expected_delivery'),
'project_detail' => $this->input->post('project_detail'),
'technical_detail' => $this->input->post('technical_detail'),
'add_date' => $date,
);
		$result=$this->pr_model->item_insert($data);
	   }
        $this->load->helper('url');
	
		 		$this->load->view('purchase/create_pr');

   }
###########Database Insertion Code##############
	
	
	
	
		
	  
######################################file upload#############################
 private function upload_files($title, $files, $pr_id)
    {
		 $this->load->database();  
		  $this->load->model('PR/pr_model');  
		  

		chmod('./uploads/PR/', 0777);
$path   = './uploads/PR/'.$pr_id;
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 
		
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
					date_default_timezone_set('Asia/Kolkata');
 $filedate=date('d-m-Y');
				
				$datanew = array(
'pr_id' => $pr_id,
'file_name' => preg_replace('/\s+/', '_', $fileName),
'insert_date' => $filedate,


);
$this->pr_model->insertfiles($datanew);//Inserting 6 files

            } else {
                return false;
            }
        }

        return $images;
    }	  
	
	
	
	
	
	
	######################################file upload single#############################
 private function upload_files_single($title, $files)
    {
		 $this->load->database();  
		  $this->load->model('PR/pr_model');  
		  
		chmod('./uploads/pr_ref/', 0777);
$path   = './uploads/pr_ref/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 
		
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);

            if ($this->upload->do_upload('files')) {
                $this->upload->data();
            } else {
                return false;
            }
        

        return $files;
    }	  
    	  
		##################################zip Download###################
	
	
	
	
	
	
	
	
	
	
    	  
		##################################zip Download###################
		public function downloadall($id){
$dir   = 'uploads/'.$id.'/';
$archive = 'download_PR.zip';




$zip = new ZipArchive;
$zip->open($archive, ZipArchive::CREATE);
$files = scandir($dir);
unset($files[0], $files[1]);
foreach ($files as $file) {
$zip->addFile($dir.''.$file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$archive);
header('Content-Length: '.filesize($archive));
readfile($archive);
unlink($archive);


 $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
			 
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($id);  

		$this->load->view('PR/show_pr', $data);

    }
		
		##################################zip Download End###################
		
		
  
function filefetch($pr_id)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	


	
		  $data['files']=$this->pr_model->fetchfiles($pr_id);  
		  		

 return  $data['files'];
		  
} 


//########################Mailing function end############################################
		public function send_mail($to,$cc,$message,$sub) { 
		
		
		
		$reciver = $to;
		$subject = $sub;
		$message = $message;
		

		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>25,
    'smtp_user'=>"no-reply@yantrallp.com",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@yantrallp.com');
    $this->email->to($reciver);
    $this->email->subject($subject);
    $this->email->message($message);
		
		
   
  $data['message'] = "Sorry Unable to send email..."; 
  if($this->email->send()){     
   $data['message'] = "Mail sent...";   
		
  }
		$this->load->helper('url');
		//load the database  
		$group_id = $this->session->userdata['logged_in']['group_id'];
		
		
		
		
      }
	  
	  	  
	  
	  
	//Listing Function#########################################################################################  
	  
	 function pr_type()
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	


	
		  $data['pr_type']=$this->pr_model->pr_type_list();  
		  		

 return  $data['pr_type'];
		  
} 
	  function plants()
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	


	
		  $data['plant_list']=$this->pr_model->plant_list();  
		  		

 return  $data['plant_list'];
		  
} 
	  
	   function list_items($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	


	
		  $data['item']=$this->pr_model->pr_item_list($emp_code);  
		  		

 return  $data['item'];
		  
} 
	  
	  function list_pr($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_master_list']=$this->pr_model->pr_master_list($emp_code);  		  		
	return  $data['pr_master_list'];
		  
} 

 function list_pr_draft($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_master_list']=$this->pr_model->pr_master_list_draft($emp_code);  		  		
	return  $data['pr_master_list'];
		  
} 

 function list_pr_rejected($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_master_list']=$this->pr_model->pr_master_list_rejected($emp_code);  		  		
	return  $data['pr_master_list'];
		  
} 
 function list_pr_submited($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['submited_pr_master_list']=$this->pr_model->submited_pr_master_list($emp_code);  		  		
	return  $data['submited_pr_master_list'];
		  
} 
function list_pr_processed($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['processed_pr_master_list']=$this->pr_model->processed_pr_master_list($emp_code);  		  		
	return  $data['processed_pr_master_list'];
		  
} 

	   function list_pr_submited_dh($emp_code)//all pr Approval Master lists pending approval by DH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_submited_dh']=$this->pr_model->pr_submited_dh_list($emp_code);  		  		
	return  $data['pr_submited_dh'];
		  
}

 function list_pr_submited_PH($emp_code)//all pr Approval Master lists pending approval by PH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_submited_ph']=$this->pr_model->pr_submited_ph_list($emp_code);  		  		
	return  $data['pr_submited_ph'];
		  
} 
	    function listapproved_pr_submited_dh($emp_code)//all pr Approval Master lists Approved by DH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_dh']=$this->pr_model->listapproved_pr_submited_dh($emp_code);  		  		
	return  $data['pr_approved_dh'];
		  
} 
	   function listapproved_pr_submited_ph($emp_code)//all pr Approval Master lists Approved by PH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_ph']=$this->pr_model->listapproved_pr_submited_ph($emp_code);  		  		
	return  $data['pr_approved_ph'];
		  
} 
	  
	   function pr_detail($pr_id)//Full pr detail for draft and detail PR 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_detail']=$this->pr_model->pr_detail($pr_id);  		  		
	return  $data['pr_detail'];
		  
} 
	  
	   function fetch_dept_nm($emp_dept)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['dept_name']=$this->pr_model->fetch_dept_nm($emp_dept);  		  		
	return  $data;
} 
	    function fetch_emp_name($emp_code)//fetch dh/ph/emp name from pr with emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_name']=$this->pr_model->fetch_dh_name($emp_code);  		  		
	return  $data['emp_name'];
} 

	  function fetch_status_dt($pr_id,$approval_id)//Fetch status date_time  with pr and approval id
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['status_date']=$this->pr_model->fetch_status_dt($pr_id,$approval_id);  		  		
	return  $data['status_date'];
} 

	  
	   function fetch_pr_type_nm($pt_id)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pt_name']=$this->pr_model->fetch_pr_type_nm($pt_id);  		  		
	return  $data;
} 
	  
	   function fetch_ph_id($del_loc)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['ph_id']=$this->pr_model->fetch_ph_id($del_loc);  		  		
	return  $data;
} 
	  
	  
	  function fetch_source_id($plant_code)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['plant_source_id']=$this->pr_model->fetch_source_id($plant_code);  		  		
	return  $data;
}   
	  function fetch_cap_source_id($pr_type)//Full Department name from dept_master
{
	
	
	$data['cap_source_id']=$this->pr_model->fetch_cap_source_id($pr_type);  		  		
	return  $data;
}   
	  
	   function is_PH($emp_code)//Identify employe is PH comp with plantmaster
{
	
	
	$data['is_PH']=$this->pr_model->is_PH($emp_code);  		  		
	return  $data['is_PH'];
}


	//profile
		public function emp_profile($emp_code){
			
			$data['emp_code']=$emp_code;
			$this->load->helper('url');
			$this->load->view('purchase/emp_profile',$data); 
			
			
		}
		
		// emp data fetch

			public function emp_detail_fetch($emp_code){
				
				$this->load->database();
				$this->load->model('purchase/pr_model');
				$data['profile_data'] = $this->pr_model->emp_detail_fetch($emp_code);
				return $data['profile_data'];
				
			}
			
			//update profile 
			public function emp_profile_update(){
			$emp_code=$this->input->post('emp_code');
			
			$data = array(
				'profile_attachment' =>preg_replace('/\s+/', '_', $_FILES['profile_attachment']['name']),
			);
			
			//profile pic  attachment 	
 if (!empty($_FILES['profile_attachment']['name'])) {//single file upload 
                chmod('./uploads/profile_attachment/', 0777);
$path   = './uploads/profile_attachment/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 	
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);
if($this->upload->do_upload('profile_attachment')){
	?>
	<script type="text/javascript">
                    alert("Profile Updated Successfully...!!!");
                </script>
<?php	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
			
			
		$result=$this->pr_model->employee_update($emp_code,$data);
		$this->load->helper('url');
		$this->load->view('purchase/purchase_menu');
		}
	  
	//profile pic fetch 
	
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
	}
	
	//email
	    function fetch_emp_email($emp_code)//fetch dh/ph/emp name from pr with emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetch_ph_email($emp_code);  		  		
	return  $data['emp_email'];
} 


//FTGS PR 09/03/2020
	function deptAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['dept_autho'] = $this->pr_model->deptAuthNavBarStatus($emp_code);
        return $data;
    }
	function plantAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['PlantHead'] = $this->pr_model->plantAuthNavBarStatus($emp_code);
        return $data;
    }
	function ItemCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['itemcode'] = $this->pr_model->ItemCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function IONCreateAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['IONCreate'] = $this->pr_model->IONCreateAuthNavBarStatus($emp_code);
        return $data;
    }
	function AssetCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['AssetCode'] = $this->pr_model->AssetCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function POCreationAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/pr_model');  
        $data['POCreation'] = $this->pr_model->POCreationAuthNavBarStatus($emp_code);
        return $data;
    }
   


}//eof
