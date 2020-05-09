<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capex extends CI_Controller {

	
	 
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
$this->load->model('purchase/qcs_model');
$this->load->model('purchase/Capex_model');
}
	
###########navigation##############
	public function index()
   {
      
        $this->load->helper('url');


		$this->load->view('capex/capex_menu');
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
		//$group_id = $this->session->userdata['logged_in']['group_id'];
		
		
		
		
      }
	  
	 //Listing Function#########################################################################################  
	 
	 // profile pic 
public function profile_pic_fetch($emp_code){
	$condition = "emp_code =" . "'" . $emp_code . "' ";

$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	  
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


	    function listapproved_pr_submited_both($emp_code)//all pr Approval Master lists Approved by PH emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_ph']=$this->pr_model->listapproved_pr_submited_both($emp_code);  		  		
	return  $data['pr_approved_ph'];
		  
} 
	  



//emp email id
	   function fetch_user_eid($emp_eid)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetch_user_eid($emp_eid);  		  		
	return  $data;
}

//email ph/emp
	   function fetchemp_email($emp_code)//Full emp email  from employee master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetchemp_email($emp_code);  		  		
	return  $data;
}


	    function fetch_emp_name($emp_code)//fetch dh/ph/emp name from pr with emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_name']=$this->pr_model->fetch_dh_name($emp_code);  		  		
	return  $data['emp_name'];
} 

//email ph/emp
	    function fetch_emp_email($emp_code)//fetch dh/ph/emp name from pr with emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetch_dh_email($emp_code);  		  		
	return  $data['emp_email'];
}



//CAPEX start  17 feb 2019

   //capex menu
		public function capex_menu()
   {
       
        $this->load->helper('url');


		$this->load->view('capex/capex_menu');
   }	  
 
		 //pr item list in Capex
 	   function list_pr_items_qid($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/capex_model');  
	$data['item']=$this->capex_model->list_pr_items_qid($qcs_id);  
	return  $data['item'];
		  
}
 
//qcs approved list for cretion capex
		
		public function capex_create_list()
		{
			$this->load->helper('url');
			$this->load->view('capex/qcs_list_capex_gen');
		}
   
//list coo approved in capex create
    	  function qcs_approved_capexlist($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/capex_model');  	
	$data['qcs_approved_list']=$this->capex_model->qcs_approved_capexlist($emp_code);  		  		
	return  $data['qcs_approved_list'];
		  
}
//create capex page
	public function create_capex($qcs_id)
	{
		$data['qcs_id']=$qcs_id;
		$this->load->helper('url');
		$this->load->view('capex/create_capex',$data);
	}

	//fetch qcs detail   
	   function qcs_detail_capex($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/capex_model');  	
	$data['qcs_detail']=$this->capex_model->qcs_detail_capex($qcs_id);  		  		
	return  $data['qcs_detail'];
		  
} 

//Full Department name from dept_master	  
	   function fetch_dept_nm($emp_dept)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['dept_name']=$this->pr_model->fetch_dept_nm($emp_dept);  		  		
	return  $data;
}	
//Full pr type name fetch
	   function fetch_prtype_nm($pt_id)
		{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['pt_name']=$this->qcs_model->fetch_pr_type_nm($pt_id);  		  		
		return  $data;
		}

//PR date  from pr master table
	   function fetch_pr_date($pr_dt)
{
	
	$this->load->database();  
    $this->load->model('purchase/capex_model');  	
	$data['pr_date']=$this->capex_model->fetch_pr_date($pr_dt);  		  		
	return  $data;
}


	
		//fetch pr qcs detail inner join
	   function pr_qcs_detail_capex($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/capex_model');  	
	$data['qcs_detail']=$this->capex_model->pr_qcs_detail_capex($qcs_id);  		  		
	return  $data['qcs_detail'];
		  
}

//view qcs item  and ammount 
	   function view_qcs_items($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_view']=$this->qcs_model->view_qcs_items($qcs_id);  
		return  $data['item_view'];
		  
}


//Draft list 

public function capex_draft_list(){
	
	$this->load->helper('url');
	$this->load->view('capex/capex_draft_list');
	
}

//create capex 

public function insert_capex(){
		date_default_timezone_set('Asia/Kolkata');
 $date=date('Y-m-d H:i:s');
 
 $qcs_id =$this->input->post('qcs_no'); 
 
  $data = array(
  'qcs_emp_code' => $this->input->post('qcs_emp_code'),
  'capex_owner_code'=>$this->input->post('capex_emp_code'),
  'pr_id'=> $this->input->post('cap_pr_no'),
  'qcs_id'=> $this->input->post('qcs_no'),
  'capex_approval3'=> $this->input->post('qcs_emp_code'),	
	'fund_no' => $this->input->post('fund_no'),
	'master_gl_code' => $this->input->post('asset_gl_code'),
	'radio_val'=> $this->input->post('yesno'),
	'actual_gl_code' => $this->input->post('capitalGlCode1'),
	'actual_gl_code2' => $this->input->post('capitalGlCode2'),
	'actual_gl_code3' => $this->input->post('capitalGlCode3'),
	'amtGlCode1' => $this->input->post('amtGlCode1'),
	'amtGlCode2' => $this->input->post('amtGlCode2'),
	'amtGlCode3' => $this->input->post('amtGlCode3'),
	
	
	
	'revenue_gl_code1' => $this->input->post('revenuGlCode1'),
	'revenue_gl_code2' => $this->input->post('revenuGlCode2'),
	'amtRevenueGlCode1' => $this->input->post('amtRevenueGlCode1'),
	'amtRevenueGlCode2' => $this->input->post('amtRevenueGlCode1'),
	
'budget_no' => $this->input->post('budget_sr_no'),
'proj_comp_date' => $this->input->post('proj_comp_date'),
'cap_recommender' => $this->input->post('cap_recommender'),


'cap_unit' => $this->input->post('cap_comp_unit'),
'capex_type' => $this->input->post('cap_capex_type'),
'bussiness_plan' => $this->input->post('cap_fin_year'),


'approved_proj' => $this->input->post('cap_approve_proj'),
'des_capex' => $this->input->post('cap_brief_background'),
//'fin_just_capex' => $this->input->post('cap_fincial_justi'),


'cap_sel_supplier' => $this->input->post('cap_supllier'),
'credibility_check' => $this->input->post('cap_credibility_check'),
'quant_capex' => $this->input->post('cap_quan_total_amt'),

'basis_price' => $this->input->post('cap_basis_price'),

'pay_term' => $this->input->post('cap_payment_term'),


'warranties_capex' => $this->input->post('cap_warranty'),
'bank_guarantees' => $this->input->post('cap_bank_gurantee'),
'delivery_peformace' => $this->input->post('cap_penalties_involved'),


'scope_supply' => $this->input->post('cap_specfic_exclusion'),
'noteworthy_capex' => $this->input->post('cap_noteworthy_cond'),
'technical_aspect' => $this->input->post('cap_tech_asp'),

'estimated_associated' => $this->input->post('estimated_associated'),
'capex_attachment' =>preg_replace('/\s+/', '_', $_FILES['capex_attachment']['name']),
'capex_status' => $this->input->post('capex_status'),

'capex_date'=>$date,

);



		
		
				//capex_attachment attachment 	
 if (!empty($_FILES['capex_attachment']['name'])) {//single file upload 
                chmod('./uploads/capex_attachment/', 0777);
$path   = './uploads/capex_attachment/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
//	echo "path ----".$path;
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);
if($this->upload->do_upload('capex_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
			
			$result=$this->Capex_model->insert_capex($data);
	
	   $row = $this->db->query('SELECT MAX(capex_id) AS `maxid` FROM `tbl_capex_master`')->row();
if ($row) {
	$capex_id=$row->maxid;
  }
  //capex gen col update 
 $capex_gen_up =  array(
		'capex_gen' => $capex_id,
 );
   $capex_gen_up=$this->Capex_model->capex_gen_update($qcs_id,$capex_gen_up);
   
  ?>
                <script type="text/javascript">
                    alert("Your CAPEX Recoarded as Draft with Capex ID <?php echo $capex_id; ?>");
                </script>
            <?php
        $this->load->helper('url');
		$this->load->view('capex/capex_draft_list');
}
			

//draft list dispaly 

public function capex_draft_record($emp_code){
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['draft_list'] = $this->Capex_model->capex_draft_record($emp_code);
	return $data['draft_list'];
	}
	
	
 //draft capex page 
 
public function draft_capex($capex_id){
	
	  $data['capex_id']=$capex_id;
	   $this->load->helper('url');
		$this->load->view('capex/draft_capex',$data);
	}
	
	
	//capex detail fetch 
	public function detail_capex($capex_id){
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  	
		$data['detail_capex']=$this->Capex_model->detail_capex($capex_id);  		  		
		return  $data['detail_capex'];
		
	}
	
	
	//view qcs item  and ammount 
	   function qcs_items_capex($capex_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	  $data['item_view']=$this->Capex_model->view_qcs_items($capex_id);  
		return  $data['item_view'];
		  
}


//capex ques detail 

public function capex_ques_detail($capex_id){
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  
		$data['cap_ques']=$this->Capex_model->capex_ques_detail($capex_id);  
		return  $data['cap_ques'];
}


//QCS detail for capex

public function qcs_detail_for_capex($capex_id){
	
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  
		$data['qcs_detail']=$this->Capex_model->qcs_detail_for_capex($capex_id);  
		return  $data['qcs_detail'];
	
}


//fetch approval1 emp_code
public function fetch_approval1_empcode(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  	
	$data['cra_reporting_emp']=$this->Capex_model->fetch_approval1_empcode();  		  		
	return  $data;
}

//approval email id  MD office

public function fetch_approval1_emp_email(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  	
	$data['rep_email']=$this->Capex_model->fetch_approval1_email_emp();  		  		
	return  $data;
}


//fetch approval2 emp code
public function fetch_approval2_empcode(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  	
	$data['cra_reporting_emp']=$this->Capex_model->fetch_approval2_empcode();  		  		
	return  $data;
	
}
//bujang sir mail ID 
public function fetch_approval2_emp_email(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  	
	$data['rep_email']=$this->Capex_model->fetch_approval2_emp_email();  		  		
	return  $data;
}


//draft capex update 04-06-2019

public function draft_update_capex(){
	
	date_default_timezone_set('Asia/Kolkata');
	$date=date('Y-m-d H:i:s');
	$dft_capex_no = $this->input->post('dft_cno');
	$capex_status =$this->input->post('capex_state');
	$capx_attachment = $this->input->post('capex_attachment');
	$attachment_check =$this->input->post('capex_attac_flag');
	if($capx_attachment==''){
		
	$data_update = array(
	'fund_no'=>$this->input->post('dft_fund_no'),
	'master_gl_code' =>$this->input->post('dft_asset_gl_code'),
	
	'radio_val' => $this->input->post('yesno'),
	'actual_gl_code' => $this->input->post('dft_capitalGlCode1'),
	'actual_gl_code2' => $this->input->post('dftcapitalGlCode2'),
	'actual_gl_code3' => $this->input->post('dftcapitalGlCode3'),
	'amtGlCode1' => $this->input->post('dftamtGlCode1'),
	'amtGlCode2' => $this->input->post('dftamtGlCode2'),
	'amtGlCode3' => $this->input->post('dftamtGlCode3'),

	'revenue_gl_code1' => $this->input->post('dftrevenuGlCode1'),
	'revenue_gl_code2' => $this->input->post('dftrevenuGlCode2'),
	'amtRevenueGlCode1' => $this->input->post('dftamtRevenueGlCode1'),
	'amtRevenueGlCode2' => $this->input->post('dftamtRevenueGlCode2'),
	
	
	
	'budget_no'=>$this->input->post('dft_budget_sr_no'),
	'proj_comp_date'=>$this->input->post('dft_proj_comp_date'),
	'cap_recommender' =>$this->input->post('dft_cap_recommender'),
	'cap_unit' =>$this->input->post('dft_cap_comp_unit'),
	'capex_type' =>$this->input->post('dft_cap_capex_type'),
	'bussiness_plan'=>$this->input->post('dft_cap_fin_year'),
	'approved_proj' =>$this->input->post('dft_cap_approve_proj'),
	//'fin_just_capex'=>$this->input->post('dft_asset_gl_code'),
	'cap_sel_supplier' =>$this->input->post('dft_cap_supllier'),
	'credibility_check' =>$this->input->post('dft_cap_credibility_check'),
	'quant_capex'=>$this->input->post('dft_cap_quan_total_amt'),
	'basis_price' =>$this->input->post('dft_cap_basis_price'),

	'pay_term'=>$this->input->post('dft_cap_pay_term'),
	'warranties_capex' =>$this->input->post('dft_cap_warranty'),
	'bank_guarantees' =>$this->input->post('dft_cap_bank_gurantee'),
	'delivery_peformace'=>$this->input->post('dft_cap_penalties_involved'),
	'scope_supply'=>$this->input->post('dft_cap_specfic_exclusion'),
	'noteworthy_capex'=>$this->input->post('dft_cap_noteworthy_cond'),
	'technical_aspect'=>$this->input->post('dft_cap_tech_asp'),
	'estimated_associated'=>$this->input->post('dft_estimated_associated'),
	'capex_status'=>$this->input->post('capex_state'),
	'justification_capex'=>$this->input->post('justification_capex'),
	'capex_attachment' =>preg_replace('/\s+/', '_', $_FILES['capex_attachment']['name']),
	
		
	);
	
		
	$draft_data_up = $this->Capex_model->capex_mast_update($dft_capex_no ,$data_update);
           	
	
	
				//capex_attachment attachment 	
 if (!empty($_FILES['capex_attachment']['name'])) {//single file upload 
                chmod('./uploads/capex_attachment/', 0777);
						$path   = './uploads/capex_attachment/';
						if (!is_dir($path)) { //create the folder if it's not already exists
						mkdir($path, 0777, TRUE);
				}
							echo "path ----".$path;
							$config = array(
							'upload_path'   => $path,
							'allowed_types' => '*',
							'overwrite'     => 1,                       
							);

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if($this->upload->do_upload('capex_attachment')){
	
								}
								
								
				
				$draft_data_up = $this->Capex_model->capex_mast_update($dft_capex_no ,$data_update);
				
				 }

			

else{
				$data_update = array(
	'fund_no'=>$this->input->post('dft_fund_no'),
	'master_gl_code' =>$this->input->post('dft_asset_gl_code'),
	
	'radio_val' => $this->input->post('yesno'),
	'actual_gl_code' => $this->input->post('dft_capitalGlCode1'),
	'actual_gl_code2' => $this->input->post('dftcapitalGlCode2'),
	'actual_gl_code3' => $this->input->post('dftcapitalGlCode3'),
	'amtGlCode1' => $this->input->post('dftamtGlCode1'),
	'amtGlCode2' => $this->input->post('dftamtGlCode2'),
	'amtGlCode3' => $this->input->post('dftamtGlCode3'),

	'revenue_gl_code1' => $this->input->post('dftrevenuGlCode1'),
	'revenue_gl_code2' => $this->input->post('dftrevenuGlCode2'),
	'amtRevenueGlCode1' => $this->input->post('dftamtRevenueGlCode1'),
	'amtRevenueGlCode2' => $this->input->post('dftamtRevenueGlCode2'),
	
	
	
	'budget_no'=>$this->input->post('dft_budget_sr_no'),
	'proj_comp_date'=>$this->input->post('dft_proj_comp_date'),
	'cap_recommender' =>$this->input->post('dft_cap_recommender'),
	'cap_unit' =>$this->input->post('dft_cap_comp_unit'),
	'capex_type' =>$this->input->post('dft_cap_capex_type'),
	'bussiness_plan'=>$this->input->post('dft_cap_fin_year'),
	'approved_proj' =>$this->input->post('dft_cap_approve_proj'),
	//'fin_just_capex'=>$this->input->post('dft_asset_gl_code'),
	'cap_sel_supplier' =>$this->input->post('dft_cap_supllier'),
	'credibility_check' =>$this->input->post('dft_cap_credibility_check'),
	'quant_capex'=>$this->input->post('dft_cap_quan_total_amt'),
	'basis_price' =>$this->input->post('dft_cap_basis_price'),

	'pay_term'=>$this->input->post('dft_cap_pay_term'),
	'warranties_capex' =>$this->input->post('dft_cap_warranty'),
	'bank_guarantees' =>$this->input->post('dft_cap_bank_gurantee'),
	'delivery_peformace'=>$this->input->post('dft_cap_penalties_involved'),
	'scope_supply'=>$this->input->post('dft_cap_specfic_exclusion'),
	'noteworthy_capex'=>$this->input->post('dft_cap_noteworthy_cond'),
	'technical_aspect'=>$this->input->post('dft_cap_tech_asp'),
	'estimated_associated'=>$this->input->post('dft_estimated_associated'),
	'capex_status'=>$this->input->post('capex_state'),
	'capex_attachment' =>$attachment_check,
	
		
	);
	
		
	$draft_data_up = $this->Capex_model->capex_mast_update($dft_capex_no ,$data_update);
}			
			
	
	}	
		
			if($capex_status == 'submitted_to_app1'){
	
			$reciver= $this->input->post('approval1_emp_email');
			//$reciver= 'ppshroff@ruchagroup.com';
			$subject='New Capex Filed By '.$this->input->post('capx_owner_nm').' Capex No '.$dft_capex_no.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$dft_capex_no. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capx_owner_nm'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('dft_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('dft_plant'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('dft_q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('dft_cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('dft_grand_total'). '</li>
			<li><b>Brief Background of CAPEX:</b>  '.$this->input->post('dft_cap_brief_background').'</li>
			<li>Status Changed to: New Capex Filed</li>
</ol>

   Kindly visit your Purchase panel (https://rucha.co.in/portal)';
		
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

	?>
                <script type="text/javascript">
                    alert("Your CAPEX Updated with Capex ID <?php echo $dft_capex_no; ?>");
                </script>
				
            <?php
	 
		$this->load->helper('url');
		
		$this->load->view('capex/capex_draft_list');
}




//pr item fetch for modal 

 	   function list_pr_items($capex_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	
		  $data['item']=$this->Capex_model->list_pr_items($capex_id);  
		  		
		return  $data['item'];
		  
}

//capex pending list 06-06-19
public function pending_list(){
	$this->load->helper('url');
	$this->load->view('capex/capex_pending_list');
}

//capex pending record 
public function capex_pending_list($emp_code){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['pending_list']=$this->Capex_model->capex_pending_list($emp_code);  
	return  $data['pending_list'];
	
}


//approval pending list
public function capx_pending_list (){
	$this->load->helper('url');
	$this->load->view('capex/capex_approval_pending_list');
}

public function capex_approval_pending_list($emp_code){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['pending_list']=$this->Capex_model->capex_approval_pending_list($emp_code);  
	return  $data['pending_list'];
}

//approval 2 pending list 
public function capex_approval2_pending_list($emp_code){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['pending_list']=$this->Capex_model->capex_approval2_pending_list($emp_code);  
	return  $data['pending_list'];
}
//Asset group list 
public function asset_grp(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['assetgrp']=$this->Capex_model->asset_grp();  
	return  $data['assetgrp'];
}


//updating item code method

		
		 public function updateItemCodeEdit(){
			 
	
				$q_itm_id = $this->input->post('qcs_item_idEdit');
				
                $data = array(
				'q_item_code'=>$this->input->post('itm_codeEdit')
				);
				$itm_upd=$this->Capex_model->updateItemCodeEdit($q_itm_id,$data);
				
                $this->load->helper('url');
               //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }
		
		
//updating item code method

		
		 public function insertCostCenterDetails(){
			 
		$temp = count($this->input->post('txtCapexId'));
		$txtCapexId = $this->input->post('txtCapexId');
        $draft_txt_cost_cent = $this->input->post('draft_txt_cost_cent');
        $draft_txt_asset_grp = $this->input->post('draft_txt_asset_grp');
		
		
	
		
		 
						 for($i=0; $i<$temp; $i++){

				$txtCapexId  =   $this->input->post('txtCapexId');
				$draft_txt_cost_cent  =   $this->input->post('draft_txt_cost_cent');
				$draft_txt_asset_grp  =  $this->input->post('draft_txt_asset_grp');
				$draft_txt_qcs_itm = $this->input->post('draft_txt_qcs_itm');
				$txtQcsId = $this->input->post('txtQcsId');

				  if(  $draft_txt_asset_grp[$i]!= '') { 
					//echo "in draft_txt_asset_grp if condition......";				  
				$data[] = array(
					  'qcs_id' =>$txtQcsId[$i],
					 'capex_id'=>$txtCapexId[$i],
					 'qcs_item_id'=>$draft_txt_qcs_itm[$i],
					 'cost_center'=>$draft_txt_cost_cent[$i],
					 'asset_grp' =>$draft_txt_asset_grp[$i]
					 
					 );} }
					  $insert = count($data);

							if($insert)
							{
								//echo "in insert if condition......";
							$this->db->insert_batch('tbl_asset_code', $data);
							}

							//return $insert;
						 echo '<script>window.history.back();</script>';
							
							
      } 
		
		
		//Approval 1 view 
		
		public function approval1_capex($capex_id){
			$data['capex_id']=$capex_id;
			$this->load->helper('url');
			$this->load->view('capex/approval1_capex',$data);
		}
		
		//approval 1 insert
		
		public function approval1_capex_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$capex_id = $this->input->post('capex_no');
			$capex_status = $this->input->post('capex_state');
			
			  $data = array(
			  
'capex_ion_no' =>$this->input->post('cpx_ion_no'),	
'cpx_release_no' =>$this->input->post('cpx_release_no'),
'capex_status' => $this->input->post('capex_state'),
'capex_approval1_cmt' => $this->input->post('capex_comment'),

);
	$capex_upd=$this->Capex_model->capex_status_update($capex_id,$data);

 //aprrover history
 
 $capex_history = array(
 
 'capex_id' =>$capex_id,
 'qcs_id' =>$this->input->post('qcs_no'),
 'cpx_approval_emp_code' =>$this->input->post('approval_emp_code'),
 'cpx_approval_comment' =>$this->input->post('capex_comment'),
 'cpx_approver_status' =>$this->input->post('capex_state'),
 'cpx_approval_date'=>$date,
 
 );
 $approver_upd=$this->Capex_model->capex_approver_history($capex_history);

		if($capex_status == "capex_approved_by_finance"){
	  $status_name = "11";
	  
			$reciver = $this->input->post('cap_owner_email');
			$ccuser= $this->input->post('asset_email'); // makrand sir
			$bccuser= 'mdoffice@ruchagroup.com';
			
			
				//$reciver = 'ppshroff@ruchagroup.com';
			   // $ccuser= 'kakhadke@ruchagroup.com'; // makrand sir
			    //$bccuser= 'pradnyashroff@gmail.com';
			
			$subject='Capex Approved  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
		    <li><b>Fund No :</b>  '.$this->input->post('dft_fund_no'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
			<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li><b> Capex View Link:</b> '.$this->input->post('viewurlnm').'</li>
			<li>Status Changed to: Capex Approved By Budget Controller & forward TO Asset Code Creation </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
   
   
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
    $this->email->bcc($bccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
}

		if($capex_status == "capex_rejected_by_finance"){
	  $status_name = "23";
	  
			$reciver = $this->input->post('cap_owner_email');
			//$ccuser= $this->input->post('asset_email'); // makrand sir
			
			$subject='Capex Rejected  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
				<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Capex Rejected By Finance Controller </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
		
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

$capex_status = array(
	'capex_id'=>$capex_id,
	'capex_status_name'=> $status_name,
	'capex_owner_id' =>$this->input->post('cpx_emp_code'),
	'capex_approval_id' =>$this->input->post('approval_emp_code'),
	'capex_status_date'=>$date,
	);
 $capex_status=$this->Capex_model->capex_status_insert($capex_status);
 
$this->load->helper('url');
	$this->load->view('capex/capex_approval_pending_list');
		}
		
		
		//capex_approver_history_id
		
		public function capex_approver_history_id($capex_id){
			$this->load->database();  
			$this->load->model('purchase/Capex_model');  	
			$data['approver_history']=$this->Capex_model->capex_approver_history_id($capex_id);  		  		
			return  $data['approver_history'];
		}
		
		
		// approval 2 capex 
		public function approval2_capex($capex_id){
			$data['capex_id']=$capex_id;
			$this->load->helper('url');
			$this->load->view('capex/approval2_capex',$data);
		}
		
		
		public function approval2_capex_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$capex_id = $this->input->post('capex_no');
			$capex_status = $this->input->post('capex_state');
			
			  $data = array(
			
'capex_status' => $this->input->post('capex_state'),
'capex_approval2_cmt' => $this->input->post('capex_comment'),
//'capex_ion_no'=>$this->input->post('cpx_ion_no'),

);
	$capex_upd=$this->Capex_model->capex_status_update($capex_id,$data);

 //aprrover history
 
 $capex_history = array(
 
 'capex_id' =>$capex_id,
 'qcs_id' =>$this->input->post('qcs_no'),
 'cpx_approval_emp_code' =>$this->input->post('approval_emp_code'),
 'cpx_approval_comment' =>$this->input->post('capex_comment'),
 'cpx_approver_status' =>$this->input->post('capex_state'),
 'cpx_approval_date'=>$date,
 
 );
 $approver_upd=$this->Capex_model->capex_approver_history($capex_history);
 
 
 	if($capex_status == "capex_approved_by_finance"){
	  $status_name = "22";
	  
			$reciver = $this->input->post('capex_emp_email');
			$ccuser= $this->input->post('asset_email'); // makrand sir
			
			$subject='Capex Approved  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
			<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Capex Approved By Finance Controller & forward TO Asset Code Creation </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
   
   
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

		if($capex_status == "capex_rejected_by_finance"){
	  $status_name = "23";
	  
			$reciver = $this->input->post('capex_emp_email');
			//$ccuser= $this->input->post('asset_email'); // makrand sir
			
			$subject='Capex Rejected  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
				<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Capex Rejected By Finance Controller </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
		
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

$capex_status = array(
	'capex_id'=>$capex_id,
	'capex_status_name'=> $status_name,
	'capex_owner_id' =>$this->input->post('cpx_emp_code'),
	'capex_approval_id' =>$this->input->post('approval_emp_code'),
	'capex_status_date'=>$date,
	);
 $capex_status=$this->Capex_model->capex_status_insert($capex_status);
 
	$this->load->helper('url');
	$this->load->view('capex/capex_approval_pending_list');
			
		}
		
		
		// approval 3  pending list 
		
		public function capex_approval3_pending_list($emp_code){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['pending_list']=$this->Capex_model->capex_approval3_pending_list($emp_code);  
	return  $data['pending_list'];
}
		
		
		
public function approval3_capex($capex_id){
	$data['capex_id'] = $capex_id;
	$this->load->helper('url');
	$this->load->view('capex/approval3_capex',$data);
	
}

		
public function pradnyaShroff(){
	$this->load->helper('url');
	$this->load->view('capex/simple');
	
}

//view capex 
public function view_capex($capex_id){
	$data['capex_id'] = $capex_id;
	$this->load->helper('url');
	$this->load->view('capex/capex_view',$data);
}

//Rejected list 

public function rejected_list(){
	
	//$data['capex_id'] = $capex_id;
	$this->load->helper('url');
	$this->load->view('capex/capex_reject_list');
}


public function capex_rejected_record($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['rejected_list'] = $this->Capex_model->capex_rejected_record($emp_code);
	return  $data['rejected_list'];
	
}

public function approval3_capex_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$capex_id = $this->input->post('capex_no');
			$capex_status = $this->input->post('capex_state');
			
			  $data = array(
			
'capex_status' => $this->input->post('capex_state'),
'capex_approval2_cmt' => $this->input->post('capex_comment'),
'assetFile_attach' =>preg_replace('/\s+/', '_', $_FILES['assetFile_attach']['name']),

);
	$capex_upd=$this->Capex_model->capex_status_update($capex_id,$data);

//assetFile_attach attachment 	
	
 if (!empty($_FILES['assetFile_attach']['name'])) {//single file upload 
                chmod('./uploads/assetFile_attach/', 0777);
$path   = './uploads/assetFile_attach/';
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
if($this->upload->do_upload('assetFile_attach')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
			$capex_upd=$this->Capex_model->capex_status_update($capex_id,$data);

            } 
				
	
 //aprrover history
 
 $capex_history = array(
 
 'capex_id' =>$capex_id,
 'qcs_id' =>$this->input->post('qcs_no'),
 'cpx_approval_emp_code' =>$this->input->post('approval_emp_code'),
 'cpx_approval_comment' =>$this->input->post('capex_comment'),
 'cpx_approver_status' =>$this->input->post('capex_state'),
 'cpx_approval_date'=>$date,
 
 );
 $approver_upd=$this->Capex_model->capex_approver_history($capex_history);
 
 if($capex_status == "capex_approved_by_asset_dept"){
	  $status_name = "32";
	  
			$reciver = $this->input->post('capex_emp_email'); //to
			$ccuser= $this->input->post('qcs_email'); // cc
			//$ccuser= 'ppshroff@ruchagroup.com';
			
			$subject='Capex Approved  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('capex_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
			<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Asset Code Approved BY Finance Department </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
   
   
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

		if($capex_status == "capex_rejected_by_asset_dept"){
	  $status_name = "33";
	  
			$reciver = $this->input->post('capex_emp_email');
			//$ccuser= $this->input->post('asset_email'); // cc
			
			$subject='Capex Rejected  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('capex_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
				<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Asset Code Rejected BY Finance Department </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
		
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

$capex_status = array(
	'capex_id'=>$capex_id,
	'capex_status_name'=> $status_name,
	'capex_owner_id' =>$this->input->post('cpx_emp_code'),
	'capex_approval_id' =>$this->input->post('approval_emp_code'),
	'capex_status_date'=>$date,
	);
 $capex_status=$this->Capex_model->capex_status_insert($capex_status);
 
	$this->load->helper('url');
	$this->load->view('capex/capex_approval_pending_list');

	
}



//qcs item for asset code  (makrand sir)
public function qcs_items_assetcode($capex_id){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	$data['item_view']=$this->Capex_model->qcs_items_assetcode($capex_id);  
	return  $data['item_view'];
		  
}

//qcs item for asset code (All)
public function qcs_items_assetcode_new($capex_id){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	$data['item_view']=$this->Capex_model->qcs_items_assetcode_new($capex_id);  
	return  $data['item_view'];
		  
}


//update Asset code
public function updateAssetCodeEdit(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$asset_id = $this->input->post('asset_codeEdit');	

		$data = array(
				'cost_center'=>$this->input->post('costCenterEdit'),
				'asset_grp'=>$this->input->post('assetGrpEdit'),
				'asset_create_date'=>$date,
				);
				$asset_upd = $this->Capex_model->updateAssetCodeEdit($asset_id,$data);
				
                $this->load->helper('url');
			
            //  echo '<script>history.go(0);</script>'; 
             echo '<script>window.history.back();</script>';		
	
}


				
				
 //capex Approved list 
public function approved_list(){
	$this->load->helper('url');
	$this->load->view('capex/capex_approved_list');
} 

public function capex_approved_record($emp_code){
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['approved_list'] = $this->Capex_model->capex_approved_record($emp_code);
	return  $data['approved_list'];
}


//Approval Approved list
public function capex_approver_list(){
	$this->load->helper('url');
	$this->load->view('capex/capex_app_approval_list');
}

public function capex_app_approver_record($emp_code){
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['approved_list'] = $this->Capex_model->capex_app_approver_record($emp_code);
	return  $data['approved_list'];
}


//approver 2 

public function capex_app_approver2_record($emp_code){
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['approved_list'] = $this->Capex_model->capex_app_approver2_record($emp_code);
	return  $data['approved_list'];
}

//approver 3
public function capex_app_approver3_record($emp_code){
	$this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['approved_list'] = $this->Capex_model->capex_app_approver3_record($emp_code);
	return  $data['approved_list'];
}

//project detail in pr _item
public function pr_proj_detail($capex_id){
	
	$data['project_detail']=$this->Capex_model->pr_proj_detail($capex_id);  		  		
	return  $data;
}


//print capex form 
		public function print_capex_view($capex_id)
		{
			$data['capex_id'] = $capex_id;
			$this->load->helper('url');
			$this->load->view('capex/print_capex_view',$data);
		}
		
		
		
		
				// approval 4  pending list 
		
	/*	public function capex_approval4_pending_list($emp_code)
		{
				$this->load->database();  
				$this->load->model('purchase/Capex_model');  
				$data['pending_list']=$this->Capex_model->capex_approval4_pending_list($emp_code);  
				return  $data['pending_list'];
				

	    }
		*/
		
		
		public function approval4_capex($capex_id)
		{
				$data['capex_id'] = $capex_id;
				$this->load->helper('url');
				$this->load->view('capex/approval4_capex',$data);
	
		}
		//approval4_capex_insert
		
		
		public function approval4_capex_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$capex_id = $this->input->post('capex_no');
			$capex_status = $this->input->post('capex_state');
			
			  $data = array(
			
'capex_status' => $this->input->post('capex_state'),
'capex_approval3_cmt' => $this->input->post('capex_comment'),


);
	$capex_upd=$this->Capex_model->capex_status_update($capex_id,$data);


	
 //aprrover history
 
 $capex_history = array(
 
 'capex_id' =>$capex_id,
 'qcs_id' =>$this->input->post('qcs_no'),
 'cpx_approval_emp_code' =>$this->input->post('approval_emp_code'),
 'cpx_approval_comment' =>$this->input->post('capex_comment'),
 'cpx_approver_status' =>$this->input->post('capex_state'),
 'cpx_approval_date'=>$date,
 
 );
 $approver_upd=$this->Capex_model->capex_approver_history($capex_history);
 
 if($capex_status == "capex_approved"){
	  $status_name = "42";
	  
			$reciver = $this->input->post('capex_emp_email'); //to
			//$ccuser= $this->input->post('qcs_email'); // cc
			
			$subject='Capex Approved  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
		    <li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Capex Process is Completed...!! </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
   
   
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

		if($capex_status == "capex_rejected"){
	  $status_name = "43";
	  
			$reciver = $this->input->post('capex_emp_email');
			//$ccuser= $this->input->post('asset_email'); // cc
			
			$subject='Capex Rejected  By '.$this->input->post('approver_owner_nm').' Capex No '.$capex_id.' ';
		

		   $message='<ol>
		   <li><b>Capex NO:</b>  '.$capex_id. '</li>
		    <li><b>Capex Owner:</b>  '.$this->input->post('capex_owner'). '</li>
			<li><b>Capex Date:</b>  '.$this->input->post('cpx_date'). '</li>
		   <li><b>Plant:</b>  '.$this->input->post('plant_code'). '</li>
			<li><b>QCS Owner Name:</b>  '.$this->input->post('q_owner'). '</li>
			<li><b>Selected Supplier:</b>  '.$this->input->post('cap_supllier'). '</li>
			<li><b>Total Ammount:</b>  '.$this->input->post('grand_total'). '</li>
			<li><b>Approver Comment:</b>  '.$this->input->post('capex_comment'). '</li>
			<li>Status Changed to: Capex Rejected </li>
			</ol>

   Kindly visit your Purchase panel( https://www.rucha.co.in/portal )';
		
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

$capex_status = array(
	'capex_id'=>$capex_id,
	'capex_status_name'=> $status_name,
	'capex_owner_id' =>$this->input->post('cpx_emp_code'),
	'capex_approval_id' =>$this->input->post('approval_emp_code'),
	'capex_status_date'=>$date,
	);
 $capex_status=$this->Capex_model->capex_status_insert($capex_status);
 
	$this->load->helper('url');
	$this->load->view('QCS/capex_approved_list');

	
}


//GL Code List 
public function glCodeList(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['glCode']=$this->Capex_model->glCodeList();  
	return  $data['glCode'];
}


//GL Code List 
public function revenu_glCodeList(){
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	 $data['glCode']=$this->Capex_model->revenu_glCodeList();  
	return  $data['glCode'];
}




//Approve capex list for Bhijang Sir 

public function approvedBYAssetDeptList(){
	$this->load->helper('url');
	$this->load->view('capex/approvedBYAssetDeptList');
}


public function capex_AssetList_Approved()
{
	
				$this->load->database();  
				$this->load->model('purchase/Capex_model');  
				$data['approved_list']= $this->Capex_model->capex_AssetList_Approved();  
				return  $data['approved_list'];
	
}

public function capexViewUrl($passID){
	$data['passID'] =  $passID;
	$this->load->helper('url');
	$this->load->view('capex/capexViewUrl',$data);
}
//FTGS 12/03/2020
	function deptAuthNavBarStatus($emp_code) 
	{
       $this->load->database();  
		$this->load->model('purchase/Capex_model');    
        $data['dept_autho'] = $this->Capex_model->deptAuthNavBarStatus($emp_code);
        return $data;
    }
	function plantAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');   
        $data['PlantHead'] = $this->Capex_model->plantAuthNavBarStatus($emp_code);
        return $data;
    }
	function ItemCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');  
        $data['itemcode'] = $this->Capex_model->ItemCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function IONCreateAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');   
        $data['IONCreate'] = $this->Capex_model->IONCreateAuthNavBarStatus($emp_code);
        return $data;
    }
	function AssetCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');  
        $data['AssetCode'] = $this->Capex_model->AssetCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function POCreationAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model'); 
        $data['POCreation'] = $this->Capex_model->POCreationAuthNavBarStatus($emp_code);
        return $data;
    }


}//eof
