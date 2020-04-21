<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PR extends CI_Controller {

	
	 
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
	public function index()//fetching pr data 
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/purchase_menu');
   }
		
	public function purchase_requisition()//fetching pr data 
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/purchase_requisition');
   }
   
   public function check_existing()//fetching pr data 
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/check_existing_pr');
   } 
   
   public function check_approve_status()//check_approve_status menu
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/check_approve_status');
   }
		public function create_pr()//fetching pr data 
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/create_pr');
   }
		public function create_qcs()//fetching pr data 
   {
      
        $this->load->helper('url');


		$this->load->view('purchase/create_qcs');
   }
	
	public function pr_master_draft()//
   {
        $this->load->helper('url');


		$this->load->view('purchase/pr_master_draft');
   }
		public function pr_master()//
   {
        $this->load->helper('url');


		$this->load->view('purchase/pr_master');
		
		
   }
   
   
		public function processed_pr_master()//shows all processed pr not in draft mode
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/processed_pr_master');
   }
		public function rejected_pr_master()//shows all Rejected PR converted in draft 
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/pr_master_rejected');
   }
		
   public function view_draft_pr($pr_id)//
   {
       $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('purchase/view_draft_pr',$data);
   }
		
		public function view_pr($pr_id)//
   {
              $data['pr_id']=$pr_id;

        $this->load->helper('url');


		$this->load->view('purchase/view_pr',$data);
   }
		public function Pending_Approval()//
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/pending_approval_master');
   }

   public function processed_master()//
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/processed_master');
   }
		public function approve_dh_pr($pr_id)//open pr for DH approval
   {
        $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('purchase/approve_dh_pr',$data);
   }
   
   public function approve_pr_ph($pr_id)//open pr for PH approval
   {
        $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('purchase/approve_pr_ph',$data);
   }
		public function view_processed_pr_dh($pr_id)//
   {
        $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('purchase/view_processed_pr_dh',$data);
   }
		public function view_processed_pr_ph($pr_id)//
   {
        $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('purchase/view_processed_pr_ph',$data);
   }
		

###########navigation##############
###########Database Insertion Code##############

public function insert_pr()//fetching pr data 
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 $date=date('Y-m-d H:i:s');
	  $data = array(
'plant_code' => $this->input->post('plant_code'),
'pr_date' => $this->input->post('pr_date'),
'pr_type' => $this->input->post('pr_type'),
'pr_owner' => $this->input->post('pr_owner'),
'pr_owner_name' => $this->input->post('pr_owner_name'),
'dept_id' => $this->input->post('dept_id'),
'delivary_loc' => $this->input->post('delivary_loc'),
'inspection_req' => $this->input->post('inspection_req'),
'budget_consider' => $this->input->post('budget_consider'),
//'cust_cost' => $this->input->post('cust_cost'),
//'cust_cost_val' => $this->input->post('cust_cost_val'),
'procurement_res' => $this->input->post('procurement_res'),
'add_date' => $date,
'pr_state' => $this->input->post('pr_state'),
'dh_id' => $this->input->post('pr_dh_id'),
'ion_no' => $this->input->post('ion_no'),
'cust_cost_upfront'=> $this->input->post('cust_cost_upfront'),
'cust_cost_amortization'=> $this->input->post('cust_cost_amortization'),
'own_investment'=> $this->input->post('own_investment'),
);
		$result=$this->pr_model->pr_insert($data);
	   $row = $this->db->query('SELECT MAX(pr_id) AS `maxid` FROM `pr_master`')->row();
if ($row) {
	$pr_id=$row->maxid;
  }
  
  $old_id=$this->input->post('pr_owner');
$new_id = array(
'pr_id' => $pr_id,
);
  
  $this->pr_model->update_item_withpr($new_id,$old_id);
  
  
   if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files($_FILES['upload_data']['name'], $_FILES['upload_data'], $pr_id) === FALSE) {
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
                    alert("Your Purchase Requision Recoarded as Draft with PR ID <?php echo $pr_id; ?>");
                </script>
            <?php
        $this->load->helper('url');
		$this->load->view('purchase/pr_master_draft',$new_id);
   }
   
 
public function dh_update_pr()//Department Head Approve/reject with ccomment and status
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y');
  $date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
 $pr_state=$this->input->post('pr_state');

 
	  $data = array(
'pr_state' => $this->input->post('pr_state'),
'dh_comment' => $this->input->post('dh_comment'),
'dh_approval_date'=>$date,

);
	$pr_upd=$this->pr_model->pr_status_upd($pr_id,$data);
	
	
		//PR approver History
	$data = array(
			'pr_id'=>$this->input->post('pr_id'),
			'pr_approver_id'=>$this->input->post('approval_id'),
			//'pr_approver_nm'=>$this->input->post('dhnm'),
			'pr_approver_cmt'=>$this->input->post('dh_comment'),
			'pr_approver_status'=>$this->input->post('pr_state'),
			'pr_approver_date'=>$date,
	);
	
	$result=$this->pr_model->approval_his_insert($data);

//end

 $row = $this->db->query('SELECT * FROM `pr_master` where pr_id='.$pr_id.'')->row();
if ($row) {
	
	$pr_owner_name=$row->pr_owner_name;
	$delivary_loc=$row->delivary_loc;
	$procurement_res=$row->procurement_res;
	$cust_cost_val=$row->cust_cost_val;
	$pr_date = $row->pr_date;
	
  }	
	
  if($pr_state == "DH_approved"){$status_name = "2";
  
  
  		$reciver = $this->input->post('ph_eid');
  		$ccuser=$this->input->post('emp_email');
		$subject = "New PR Filed By $pr_owner_name AND  PR No $pr_id Waiting for your Approval ";
		

		$message = '<ol>
			
		
	<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>
	<li><b> PR Date:</b> '.$pr_date.' </li>

	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('dh_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
    <li><b>Date:</b>  '. $date.' </li>
	
	
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
   
   
   
   
   
  if($pr_state == "DH_reject"){$status_name = "3";
  
  $reciver = $this->input->post('emp_email');
  		
		$subject = "Your  PR No $pr_id has been  Rejected By Department Head ";
		

		$message = '<ol>
		
		<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>
		<li><b> PR Date:</b> '.$pr_date.' </li>

	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('dh_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
		<li><b>Date:</b>  '. $date.' </li>
	
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
      //$this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
  
   }
  
  
  
  $statusdata= array(
'pr_id' => $pr_id,
'status_name' => $status_name,
'pr_by_id' => $this->input->post('pr_by_id'),
'approval_id' => $this->input->post('approval_id'),
'status_date' => $date,
);

$status_upd=$this->pr_model->pr_status_insert($statusdata);
	 
    
  

  
        $this->load->helper('url');
		//$this->load->view('purchase/processed_master');
		$this->load->view('purchase/pending_approval_master'); //processed_master
   }
   
   
   
public function ph_update_pr()//Plant Head Approve/reject with ccomment and status
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y');
 $date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
 $pr_state=$this->input->post('pr_state');

 
	  $data = array(
'pr_state' => $this->input->post('pr_state'),
'ph_comment' => $this->input->post('ph_comment'),
'ph_approval_date'=>$date,

);
	$pr_upd=$this->pr_model->pr_status_upd($pr_id,$data);
	
	//PR approver History
$data = array(
			'pr_id'=>$this->input->post('pr_id'),
			'pr_approver_id'=>$this->input->post('approval_id'),
			//'pr_approver_nm'=>$this->input->post('ph_nm'),
			'pr_approver_cmt'=>$this->input->post('ph_comment'),
			'pr_approver_status'=>$this->input->post('pr_state'),
			'pr_approver_date'=>$date,
	);
	
	$result=$this->pr_model->approval_his_insert($data);



 $row = $this->db->query('SELECT * FROM `pr_master` where pr_id='.$pr_id.'')->row();
if ($row) {
	
	$pr_owner_name=$row->pr_owner_name;
	$delivary_loc=$row->delivary_loc;
	$procurement_res=$row->procurement_res;
	$pr_date = $row->pr_date;

	
  }
  	
	
  if($pr_state == "PH_approved"){$status_name = "12"; 
  
  $reciver = $this->input->post('pr_source_eid');
  		$ccuser=$this->input->post('emp_email');
		$subject = "New PR Filed By $pr_owner_name AND  PR No $pr_id waiting for Your Approval ";
		//$subject = "New PR Filed By '.$pr_owner_name.' AND  PR No '.$pr_id.' waiting for Your Approval ";

		$message = '<ol>
		
		<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>

		<li><b> PR Date:</b> '.$pr_date.' </li>
	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('ph_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
		<li><b>Date:</b>  '. $date.' </li>	
	
	
</ol>

  Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>4655,
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
  if($pr_state == "PH_reject"){$status_name = "13"; 
  
  $reciver = $this->input->post('emp_email');
  		//$ccuser=$this->input->post('emp_email');
		$subject = "Your PR No $pr_id Rejected By Plant Head";
		

		$message = '<ol>
		<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>

		<li><b> PR Date:</b> '.$pr_date.' </li>
	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('ph_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
		<li><b>Date:</b>  '. $date.' </li>
	
	
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
     // $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
  
  
  }
  
  
  
  $statusdata= array(
'pr_id' => $pr_id,
'status_name' => $status_name,
'pr_by_id' => $this->input->post('pr_by_id'),
'approval_id' => $this->input->post('approval_id'),
'status_date' => $date,
);

$status_upd=$this->pr_model->pr_status_insert($statusdata);
	 
  
  
  
        $this->load->helper('url');
		//$this->load->view('purchase/processed_master');
		$this->load->view('purchase/pending_approval_master'); //processed_master
   }
   
      
public function source_update_pr()//Sourcing Approve/reject with ccomment and status
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y');
 $date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
 $pr_state=$this->input->post('pr_state');

 
	  $data = array(
'pr_state' => $this->input->post('pr_state'),
'source_comment' => $this->input->post('source_comment'),
'soucing_approval_date'=>$date,
);
	$pr_upd=$this->pr_model->pr_status_upd($pr_id,$data);
	
	
	//PR approver History
$data = array(
			'pr_id'=>$this->input->post('pr_id'),
			'pr_approver_id'=>$this->input->post('approval_id'),
			//'pr_approver_nm'=>$this->input->post('source_nm'),
			'pr_approver_cmt'=>$this->input->post('source_comment'),
			'pr_approver_status'=>$this->input->post('pr_state'),
			'pr_approver_date'=>$date,
	);
	
	$result=$this->pr_model->approval_his_insert($data);
	
   
	
		 $row = $this->db->query('SELECT * FROM `pr_master` where pr_id='.$pr_id.'')->row();

if ($row) {
	
	$pr_owner_name=$row->pr_owner_name;
	$delivary_loc=$row->delivary_loc;
	$procurement_res=$row->procurement_res;
	$cust_cost_val=$row->cust_cost_val;
    $pr_date = $row->pr_date;
	
  }
	
	
  if($pr_state == "sourcing_approved"){$status_name = "22";
  $reciver = $this->input->post('emp_email');
  		//$ccuser=$this->input->post('emp_email');
		$subject = "Your PR No $pr_id Approved By Sourcing Head";
		

		$message = '<ol>
		<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>
	<li><b> PR Date:</b> '.$pr_date.' </li>
	
	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('source_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
	<li><b>Date:</b>  '. $date.' </li>
	
	
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
     // $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
  
   }
 if($pr_state == "sourcing_reject"){$status_name = "23";
 
 $reciver = $this->input->post('emp_email');
  		//$ccuser=$this->input->post('emp_email');
		$subject = "Your PR No $pr_id Rejected By Sourcing Head";
		

		$message = '<ol>
		<li><b>Plant:</b> '.$delivary_loc .' </li>	
	<li><b>PR No:</b> '.$pr_id.'</li>
		<li><b> PR Date:</b> '.$pr_date.' </li>

	<li><b>PR Owner:</b>  '.$pr_owner_name.' </li>
	
	<li><b>Pocurement Reason:</b> '. $procurement_res.'</li>
	<li><b>Ammount:</b>  '.$this->input->post('final_rate'). '</li>
	<li><b>Approver Comment:</b>  '.$this->input->post('source_comment') .'</li>
	<li><b>Status Changed to:</b>  '. $this->input->post('pr_state') .'</li>
	<li><b>Date:</b>  '. $date.' </li>
	
	
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
     // $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
 
  }
  
  
  
  $statusdata= array(
'pr_id' => $pr_id,
'status_name' => $status_name,
'pr_by_id' => $this->input->post('pr_by_id'),
'approval_id' => $this->input->post('approval_id'),
'status_date' => $date,
);

$status_upd=$this->pr_model->pr_status_insert($statusdata);
	 
  
  
  
        $this->load->helper('url');
		$this->load->view('QCS/qcs_menu');
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
 $temp_pr=$this->input->post('temp_pr_id');
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
'cust_code' => $this->input->post('customer_code'),
'sales_material' => $this->input->post('saleable_material'),
'ecn_new' => $this->input->post('ecn_new'),
'ecn_newcode' => $this->input->post('ecn_newcode'),
'add_date' => $date,
);
		$result=$this->pr_model->item_insert($data);
	   }
        $this->load->helper('url');
		$this->load->view('purchase/create_pr');
   }
   
   
   
    public function add_item_draft()//Item Addition Draft
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
 $temp_pr=$this->input->post('temp_pr_id');
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
		 $data['pr_id']=$temp_pr;
		$this->load->view('purchase/view_draft_pr',$data);
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
$dir   = 'uploads/PR/'.$id.'/';
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


    }
		
		##################################zip Download End###################
		
		
  
function filefetch($pr_id)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	


	
		  $data['files']=$this->pr_model->fetchfiles($pr_id);  
		  		

 return  $data['files'];
		  
} 

function fetchpr($pr_id)//fetch single pr
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	


	
		  $data['pr_id']=$this->pr_model->fetchpr($pr_id);  
		  		

 return  $data['pr_id'];
		  
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


//listapproved_DH

   function listapproved_DH($emp_code) //2020-02-29
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_dh']=$this->pr_model->listapproved_DH($emp_code);  		  		
	return  $data['pr_approved_dh'];
		  
} 

//Approved by sourciing 


   function listapproved_pr_sourcing($emp_code) //2020-02-29
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_sourcing']=$this->pr_model->listapproved_pr_sourcing($emp_code);  		  		
	return  $data['pr_approved_sourcing'];
		  
} 
	   function listapproved_pr_submited_ph($emp_code)//all pr Approval Master lists Approved by PH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_ph']=$this->pr_model->listapproved_pr_submited_ph($emp_code);  		  		
	return  $data['pr_approved_ph'];
		  
} 
	    function listapproved_pr_submited_both($emp_code)//all pr Approval Master lists Approved by PH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_ph']=$this->pr_model->listapproved_pr_submited_both($emp_code);  		  		
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
	   function is_PH_dh($emp_code)//Identify employe is PH comp with plantmaster
{
	
	
	$data['is_PH_dh']=$this->pr_model->is_PH_dh($emp_code);  		  		
	return  $data['is_PH_dh'];
}   
	  
//email ph/emp
	   function fetchemp_email($emp_code)//Full emp email  from employee master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetchemp_email($emp_code);  		  		
	return  $data;
}	  
	  
//Approve QCS list in PR Section
   public function approved_list() 
   {
	    $this->load->helper('url');


		$this->load->view('purchase/approved_pr_qcs_list');
   }
   
   // approve qcs list in PR section
    	  function list_approved_pr_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_approved_list']=$this->qcs_model->list_approved_pr_qcs($emp_code);  		  		
	return  $data['qcs_approved_list'];
		  
}
	 //Approve QCS list in PR Section
   public function approved_qcs_list() 
   {
	    $this->load->helper('url');


		$this->load->view('purchase/approved_qcs_list');
   }
   
   
   //pR Approval history fetch

     	  function pr_approver_history_id($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_his']=$this->pr_model->pr_approver_history_id($pr_id);  		  		
	return  $data['pr_approved_his'];
}  

//notification count 
	
	
	public function draftpr_noti($emp_code){
		
	$this->load->database();  
     $this->load->model('PR/pr_model');  
	
	 $data['approved']=$this->pr_model->draftpr_noti($emp_code);    
	
 return  $data['approved'];
	}
	
	//pending notification 
	public function pending_noti($emp_code){
		$this->load->database();
		$this->load->model('PR/pr_model');
		$data['pendingn'] = $this->pr_model->pending_noti($emp_code);
		return $data['pendingn'];
		}
	
	//rejected notificaton 
	
	public function rejpr_noti($emp_code){
		$this->load->database();
		$this->load->model('PR/pr_model');
		$data['rej_noti'] = $this->pr_model->pr_master_list_rejected($emp_code);
		return $data['rej_noti'];
	}
	
	//aprrove notification
	public function approved_noti($emp_code){
		$this->load->database();
		$this->load->model('PR/pr_model');
		$data['app_noti'] = $this->pr_model->processed_pr_master_list($emp_code);
		return $data['app_noti'];
	}
	
	//profile pic fetch 
	
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
	}
	
	//QCS notification 
	  
	  public function approved_qcs_noti($emp_code){
		  
		 $this->load->database();
			$this->load->model('PR/pr_model');
		$data['qcs_noti'] =$this->pr_model->list_approved_pr_qcs($emp_code);
		return $data['qcs_noti'];
		 
	  }
	  
	  
	    //itemcode notification
	  
	  public function approved_itemcode_noti($emp_code){
		  $this->load->database();
		  $this->load->model('purchase/Itemcode_model');
			$data['itemcode_noti'] = $this->Itemcode_model->approved_list_itemcode($emp_code);
			return $data['itemcode_noti'];
		}
		
		//Informal PO Notification 
		public function approved_po_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/Informal_po_model');
			$data['po_noti'] = $this->Informal_po_model->approved_po($emp_code);
			return $data['po_noti'];
		}
		
		
			//capex notification
		public function approved_capex_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/pr_model');
			$data['capex_noti'] = $this->pr_model->approved_capex_noti($emp_code);
			return $data['capex_noti'];
			
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
		
		
		
			
		   // qcs_pending_list qcs list in PR section 2 Aug 2019
		   
		   
		   	public function PendingQCSList()
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/pending_pr_qcs_list');
   }



		   function list_pending_pr_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['qcs_pending_list']=$this->pr_model->list_pending_pr_qcs($emp_code);  		  		
	return  $data['qcs_pending_list'];
		  
}



//	rejected list 	   
		   	public function RejectedQCSList()
   {
       
        $this->load->helper('url');


		$this->load->view('purchase/rejected_pr_qcs_list');
   }
   
   
   
      
    function list_rejected_pr_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['qcs_pending_list']=$this->pr_model->list_rejected_pr_qcs($emp_code);  		  		
	return  $data['qcs_pending_list'];
		  
}


  //Edit item 
   
       public function ajax_edit($id) {
        $data = $this->pr_model->get_by_id($id);
        echo json_encode($data);
    }
	
	    public function update_item() {
		
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('edit_item_id');
     
            $data = array(
             		
'item_code' => $this->input->post('edit_item_code'),
'item_description' => $this->input->post('edit_item_description'),
'req_qty' => $this->input->post('edit_quntity'),
'uom' => $this->input->post('edit_uom'),
'approx_rate' => $this->input->post('edit_amt'),
'approx_total_amt' => $this->input->post('edit_approx_total_amt'),
//'ion_no' => $this->input->post('ion_no'),
'expected_delivery' => $this->input->post('edit_expected_delivery'),
'project_detail' => $this->input->post('edit_project_detail'),
'technical_detail' => $this->input->post('edit_technical_detail'),
'cust_code' => $this->input->post('edit_Customer_Code'),
'sales_material' => $this->input->post('edit_saleable_material'),
'ecn_new' => $this->input->post('edit_ecn_new'),
'ecn_newcode' => $this->input->post('edit_ecn_newcode'),
'add_date' => $date,
            );
  
        $this->pr_model->update_item($data, $editId);
		$this->load->helper('url');
      $this->load->view('purchase/create_pr');
	  //echo '<script>window.history.back();</script>';
    }
	public function update_items() {
		
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('edit_item_id');
     
            $data = array(
             		
'item_code' => $this->input->post('edit_item_code'),
'item_description' => $this->input->post('edit_item_description'),
'req_qty' => $this->input->post('edit_quntity'),
'uom' => $this->input->post('edit_uom'),
'approx_rate' => $this->input->post('edit_amt'),
'approx_total_amt' => $this->input->post('edit_approx_total_amt'),
//'ion_no' => $this->input->post('ion_no'),
'expected_delivery' => $this->input->post('edit_expected_delivery'),
'project_detail' => $this->input->post('edit_project_detail'),
'technical_detail' => $this->input->post('edit_technical_detail'),
'cust_code' => $this->input->post('edit_Customer_Code'),
'sales_material' => $this->input->post('edit_saleable_material'),
'ecn_new' => $this->input->post('edit_ecn_new'),
'ecn_newcode' => $this->input->post('edit_ecn_newcode'),
'add_date' => $date,
            );
  
        $this->pr_model->update_item($data, $editId);
		$this->load->helper('url');
      //$this->load->view('purchase/create_pr');
	  echo '<script>window.history.back();</script>';
    }


//FTGS
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
   
   
   //FTGS PR 03/03/2020
   
   //FTGS PR Count Draft PR
   public function draftFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['draft']=$this->pr_model->draftFtgsPRCount($emp_code);    
		return  $data['draft'];
	}
	//FTGS PR Count pending PR
	public function pendingFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendingFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//FTGS PR Count Reject PR
	public function rejectFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//FTGS PR Count Approved PR
	public function approvedFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approve']=$this->pr_model->approvedFtgsPRCount($emp_code);    
		return  $data['approve'];
	}
	//DH Pending COunt
	public function pendDHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendDHFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//DH Reject COunt
	public function rejectDHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectDHFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//DH Approved COunt
	public function approveDHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approved']=$this->pr_model->approveDHFtgsPRCount($emp_code);    
		return  $data['approved'];
	}
	//PH Pending COunt 
	public function pendPHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendPHFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//PH Reject COunt
	public function rejectPHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectPHFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//PH Approved COunt
	public function approvePHFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approved']=$this->pr_model->approvePHFtgsPRCount($emp_code);    
		return  $data['approved'];
	}
	//ItemCreation Pending COunt
	public function pendItemFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendItemFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//ItemCreation Reject COunt
	public function rejectItemFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectItemFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//ItemCreation Approved COunt
	public function approveItemFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approved']=$this->pr_model->approveItemFtgsPRCount($emp_code);    
		return  $data['approved'];
	}
	//ION Pending COunt
	public function pendIONFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendIONFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//ION Reject COunt
	public function rejectIONFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectIONFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//ION Approved COunt
	public function approveIONFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approved']=$this->pr_model->approveIONFtgsPRCount($emp_code);    
		return  $data['approved'];
	}
	//Asset Pending COunt
	public function pendAssetFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendAssetFtgsPRCount($emp_code);    
		return  $data['pending'];
	}
	//Asset Reject COunt
	public function rejectAssetFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['reject']=$this->pr_model->rejectAssetFtgsPRCount($emp_code);    
		return  $data['reject'];
	}
	//Asset Approved COunt
	public function approveAssetFtgsPRCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['approved']=$this->pr_model->approveAssetFtgsPRCount($emp_code);    
		return  $data['approved'];
	}
	//fetch level
		function fetchLevel($emp_code) 
		{
			$this->load->database();  
			$this->load->model('PR/pr_model');  
			$data['auth_level'] = $this->pr_model->fetchLevel($emp_code);
			return $data;
		}
		
		
		//QCS
		//QCS Pending COunt pendlevel2FtgsQcsCount
	public function pendlevel2FtgsQcsCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['pending']=$this->pr_model->pendlevel2FtgsQcsCount($emp_code);    
		return  $data['pending'];
	}
	
	
				//count pending ftgs pr sourcing 
			public function pendingFtgsPRLevel5($emp_code)
			{
				$this->load->database();
				$this->load->model('purchase/qcs_model');
				$data['pending_noti'] = $this->qcs_model->pendingFtgsPRLevel5($emp_code);
				return $data['pending_noti'];
			}
			
			
		//FTGS CAPEX Count Approved PR
		public function CapexCreteCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('Ftgs_PR/ftgs_model');  
		$data['approve']=$this->ftgs_model->CapexCreteCount($emp_code);    
		return  $data['approve'];
	}
	
	
	
			
		//FTGS CAPEX Count Auth Pending PR
		public function cpxAuthPenCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('Ftgs_PR/ftgs_model');  
		$data['approve']=$this->ftgs_model->cpxAuthPenCount($emp_code);    
		return  $data['approve'];
	}
   
}//eof
