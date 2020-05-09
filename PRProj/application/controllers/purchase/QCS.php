<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QCS extends CI_Controller {

	
	 
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


$this->load->model('purchase/qcs_model');
$this->load->model('purchase/pr_model');
$this->load->model('purchase/Capex_model');

}
	
###########navigation##############
	public function index()//qcs_menu 
   {
      
      $this->load->helper('url');


	$this->load->view('QCS/qcs_menu');
	
	/*	if($emp_code == '100121'){
      $this->load->helper('url');
  $this->load->view('QCS/qcs_menu_cfo');  
}
else{
      $this->load->helper('url');
	$this->load->view('QCS/qcs_menu');
}	
$this->load->view('QCS/qcs_menu_cfo');*/

   }
		
	
  	public function index_cfo(){
		$this->load->helper('url');
		$this->load->view('QCS/qcs_menu_cfo');
		
	} 
   
		public function Pending_Approval()//Show All PR Pending at sourcing end
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/pending_approval_master');
   }
		public function in_process_master()//shows all Rejected PR converted in draft 
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/in_process_master');
   }
		
 public function processed_master()//shows all Rejected PR converted in draft 
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/processed_master');
   }
		
 public function in_process_master_source()//shows all Rejected PR converted in draft 
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/in_process_master');
   }
		
 
		
		public function view_pr($pr_id)//
   {
              $data['pr_id']=$pr_id;

        $this->load->helper('url');


		$this->load->view('purchase/view_pr',$data);
   }
   
   public function view_qcs($pr_id)//
   {
              $data['pr_id']=$pr_id;

        $this->load->helper('url');


		$this->load->view('QCS/view_qcs',$data);
   }
		public function create_qcs($pr_id)//
   {
              $data['pr_id']=$pr_id;

        $this->load->helper('url');


		$this->load->view('QCS/create_qcs',$data);
   }
		
		
  function fetch_status_dt($pr_id,$approval_id)//Fetch status date_time  with pr and approval id
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['status_date']=$this->pr_model->fetch_status_dt($pr_id,$approval_id);  		  		
	return  $data['status_date'];
} 

###########navigation##############
###########Database Insertion Code##############

   
   
public function ph_update_pr()//Plant Head Approve/reject with ccomment and status
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
 $pr_id=$this->input->post('pr_id');
 $pr_state=$this->input->post('pr_state');

 
	  $data = array(
'pr_state' => $this->input->post('pr_state'),
'ph_comment' => $this->input->post('ph_comment'),

);
	$pr_upd=$this->pr_model->pr_status_upd($pr_id,$data);

	
	
  if($pr_state == "PH_approved"){$status_name = "12"; }
  if($pr_state == "PH_reject"){$status_name = "13"; }
  
  
  
  $statusdata= array(
'pr_id' => $pr_id,
'status_name' => $status_name,
'pr_by_id' => $this->input->post('pr_by_id'),
'approval_id' => $this->input->post('approval_id'),
'status_date' => $date,
);

$status_upd=$this->pr_model->pr_status_insert($statusdata);
	 
  
  
  
        $this->load->helper('url');
		$this->load->view('purchase/processed_master');
   }
   
   
   
  
###########Database Insertion Code##############
	
	
	
	
		
	  
######################################file upload#############################
/*
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
	
	
	
	*/
	
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
 function list_pr_approved_ph($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_approved_ph']=$this->qcs_model->pr_approved_ph($emp_code);  		  		
	return  $data['pr_approved_ph'];
		  
} 

 function list_pr_rejected($emp_code)//all pr master status filter 
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_master_list']=$this->pr_model->pr_master_list_rejected($emp_code);  		  		
	return  $data['pr_master_list'];
		  
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
	  
	  function list_pr_approved_sourcing($emp_code)//Identify employe is PH comp with plantmaster
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_approved_source']=$this->qcs_model->pr_approved_source($emp_code);  		  		
	return  $data['pr_approved_source'];
}   
	  
	//email ph/emp
	   function fetchemp_email($emp_code)//Full emp email  from employee master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetchemp_email($emp_code);  		  		
	return  $data;
}	  
	  
//new code QCS 31 jan 



//emp name
	    function fetch_empname($emp_code)//fetch dh/ph/emp name from pr with emp_code
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['emp_name']=$this->qcs_model->fetch_empname($emp_code);  		  		
	return  $data['emp_name'];
}






//qcs history show in bottom of view qcs page
 	   function qcs_history($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_history']=$this->qcs_model->qcs_history($qcs_id);  		  		
	return  $data['qcs_history'];
		  
}



 public function qcs_step_one($pr_id)//Create QCS step 1
   {
           $data['pr_id']=$pr_id;
        $this->load->helper('url');

		$this->load->view('QCS/qcs_step_one',$data);
   }
   
   
   
//crete qcs 
public function insert_qcs($pr_id)
{
	 $data['pr_id']=$pr_id;
	 //$datapr['pr_id']=$pr_id;
	date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y  h:i');
 $date=date('Y-m-d H:i:s');
 
 
  
//Supplier1................. 08/03/2020
$sup1_nm = $this->input->post('sup1_nm');
$sup1_name = $this->input->post('sup1_name');
if($sup1_nm=="")
{
	$paraSup1=$sup1_name;
}
elseif($sup1_name==""){
	$split = explode("-",$sup1_nm);
	$paraSup1=$split[1];
}


//Supplier2....................08/03/2020
$sup2_nm = $this->input->post('sup2_nm');
$sup2_name = $this->input->post('sup2_name');
if($sup2_nm==" ")
{
	$paraSup2=$sup2_name;
}
elseif($sup2_name==""){
	$split = explode("-",$sup2_nm);
	$paraSup2=$split[1];
}

//Supplier 3................08/03/2020
$sup3_nm = $this->input->post('sup3_nm');
$sup3_name = $this->input->post('sup3_name');

if($sup3_nm=="")
{
	$paraSup3=$sup3_name;
}
elseif($sup3_name==""){
	$split = explode("-",$sup3_nm);
	$paraSup3=$split[1];
}



   $data = array(
   'pr_id' => $this->input->post('pr_id'),
   'qcs_date' => $date,
   'dept_id' => $this->input->post('dept_id'),
   'qcs_emp_code' =>$this->input->post('qcs_owner_id'),
   'pr_owner_empcode'=>$this->input->post('pr_owner_empcode'),
   
    'pr_type' => $this->input->post('pr_type'),
	'qcs_owner' => $this->input->post('qcs_owner'),
	'plant_code' => $this->input->post('pr_plant'),
	
	 'sup1_nm' => $paraSup1,
	'sup1_contact_no' => $this->input->post('sup1_mno'),
	'sup1_contact_person' => $this->input->post('sup1_contactp'),
	'sup1_eid' => $this->input->post('sup1_eid'),
	
	'sup2_nm' => $paraSup2,
	'sup2_contact_no' => $this->input->post('sup2_mno'),
	'sup2_contact_person' => $this->input->post('sup2_contactp'),
	'sup2_eid' => $this->input->post('sup2_eid'),
	
	'sup3_nm' => $paraSup3,
	'sup3_contact_no' => $this->input->post('sup3_mno'),
	'sup3_contact_person' => $this->input->post('sup3_contactp'),
	'sup3_eid' => $this->input->post('sup3_eid'),
	'qcs_status'=>'Incomplete_Qcs',
	
   );
		$result=$this->qcs_model->qcs_insert($data);
		$row = $this->db->query('SELECT MAX(qcs_id) AS `maxid` FROM `qcs_master`')->row();
if ($row) {
	$qcs_id=$row->maxid+1;
  }
  ?>
  <?php
		$this->load->helper('url');

		$this->load->view('QCS/qcs_last_id_list',$data);
} 


//qcs last Id page show 
public function qcs_last_id_list($pr_id)
   {
          $data['pr_id']=$pr_id;
        $this->load->helper('url');

		$this->load->view('QCS/qcs_last_id_list',$data);
   } 
  
  //qcs step2 last record qcs_step2list_lastrecord 
     public function qcs_step2list_lastrecord($emp_code,$pr_id) 
   {
		$this->load->database();  
		  $this->load->model('purchase/qcs_model'); 
	$data['step2_list_Lrecord']=$this->qcs_model->qcs_step2list_lastrecord($emp_code,$pr_id);  return  $data['step2_list_Lrecord'];
	
	   
   }
//page showw step 2
	public function qcs_step2_list()
   {
        $this->load->helper('url');


		$this->load->view('QCS/qcs_step2_list');
   }

//QCS step2 pending list	  
   public function qcs_step2list_show($emp_code) 
   {
		$this->load->database();  
		  $this->load->model('purchase/qcs_model'); 
		$data['step2_list']=$this->qcs_model->qcs_step2_list($emp_code);  		  		
		return  $data['step2_list'];
	
	   
   }
  
//Create QCS step 2
public function qcs_step_two($qcs_id)
   {
          $data['qcs_id']=$qcs_id;
        $this->load->helper('url');

		$this->load->view('QCS/qcs_step_two',$data);
   } 
  
   
   //qcs detail for supplier detail step2
 	   function qcs_detail_steptwo($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_detail']=$this->qcs_model->qcs_detail_steptwo($qcs_id);  		  		
	return  $data['qcs_detail'];
		  
}

//qcs step 2 insert data qcs_step2_insert

public function qcs_step2_insert()
{
	
	      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y h:i');
 $date=date('Y-m-d H:i:s');
  $qcs_up_id=$this->input->post('qcs_no');
  $pr_status =$this->input->post('pr_status'); 
  $pr_id=$this->input->post('pr_no');
	  $data = array(
'qcs_id' => $this->input->post('qcs_no'),
'pr_id' => $this->input->post('pr_no'),
'tech_det_sup1' => $this->input->post('tech_det_sup1'),
'tech_det_sup2' => $this->input->post('tech_det_sup2'),
'tech_det_sup3' => $this->input->post('tech_det_sup3'),

'credibility_sup1' => $this->input->post('supplier1_checked'),
'credibility_sup2' => $this->input->post('supplier2_checked'),
'credibility_sup3' => $this->input->post('supplier3_checked'),

'insurance_sup1' => $this->input->post('supplier1_insurance'),
'insurance_sup2' => $this->input->post('supplier2_insurance'),
'insurance_sup3' => $this->input->post('supplier3_insurance'),

'del_period_sup1' => $this->input->post('delivery_period_sup1'),
'del_period_sup2' => $this->input->post('delivery_period_sup2'),
'del_period_sup3' => $this->input->post('delivery_period_sup3'),

'del_mode_sup1' => $this->input->post('delivery_mode_sup1'),
'del_mode_sup2' => $this->input->post('delivery_mode_sup2'),
'del_mode_sup3' => $this->input->post('delivery_mode_sup3'),

'inspection_sup1' => $this->input->post('supplier1_testing'),
'inspection_sup2' => $this->input->post('supplier2_testing'),
'inspection_sup3' => $this->input->post('supplier3_testing'),

'pymt_terms_sup1' => $this->input->post('pay_terms_sup1'),
'pymt_terms_sup2' => $this->input->post('pay_terms_sup2'),
'pymt_terms_sup3' => $this->input->post('pay_terms_sup3'),

'warranty_sup1' => $this->input->post('warranty_sup1'),
'warranty_sup2' => $this->input->post('warranty_sup2'),
'warranty_sup3' => $this->input->post('warranty_sup3'),

'scope_instal_sup1' => $this->input->post('scope_inst_sup1'),
'scope_instal_sup2' => $this->input->post('scope_inst_sup2'),
'scope_instal_sup3' => $this->input->post('scope_inst_sup3'),


'taxes_duties_sup1' => $this->input->post('sup1_taxes'),
'taxes_duties_sup2' => $this->input->post('sup2_taxes'),
'taxes_duties_sup3' => $this->input->post('sup2_taxes'),

'note_sup1' => $this->input->post('sup1_note'),
'note_sup2' => $this->input->post('sup2_note'),
'note_sup3' => $this->input->post('sup3_note'),

'validity_price_sup1' => $this->input->post('price_sup1'),
'validity_price_sup2' => $this->input->post('price_sup2'),
'validity_price_sup3' => $this->input->post('price_sup3'),

'note_sup1' => $this->input->post('sup1_note'),
'note_sup2' => $this->input->post('sup2_note'),
'note_sup3' => $this->input->post('sup3_note'),

'repl_scope_sup1' => $this->input->post('repl_sup1'),
'repl_scope_sup2' => $this->input->post('repl_sup2'),
'repl_scope_sup3' => $this->input->post('repl_sup3'),
//'additional_attachment' =>$this->input->post('additional_attachment'),


'tech_spec_date' => $date,

);

		$result=$this->qcs_model->qcs_step2_insert($data);
$row = 
$this->db->query('SELECT MAX(qcs_id) AS `maxid` FROM `tbl_qcs_technical_spec`')->row();
if ($row) {
	$qcs_id=$row->maxid;
  }
 
//end


	  $dataupdate = array(
'qcs_status'=> $this->input->post('qcs_status'),
'selected_supplier' => $this->input->post('select_sup'),
'justification_supplier' => $this->input->post('justification_sup'),
'additional_attachment' =>preg_replace('/\s+/', '_', $_FILES['additional_attachment']['name']),
'approval_level1'=>$this->input->post('sourcing_approval1'),
'approval_level2'=>$this->input->post('sourcing_approval2'),
'approval_level3'=>$this->input->post('sourcing_approval3'),
'approval_level4'=>$this->input->post('sourcing_approval4'),
'approval_level5'=> $this->input->post('sourcing_approval5'),


'outside_budget'=>$this->input->post('outside_budget'),
'just_outside_budget'=>$this->input->post('just_outside_budget'),
//'pr_value'=>$this->input->post('order_value'),
'order_value' =>$this->input->post('order_value'),
'just_order_value'=>$this->input->post('just_order_value'),

'offers_received'=>$this->input->post('quotation_received'),
'just_quot_reec'=>$this->input->post('just_quot_reec'),

'non_properitery_item'=>$this->input->post('advance_nonproprietery'),
'just_adv_nonproprietery'=>$this->input->post('just_adv_nonproprietery'),

'properitery_item'=>$this->input->post('advance_proprietery'),
'just_adv_proprietery'=>$this->input->post('just_adv_proprietery'),

'post_grn_nonproprietary'=>$this->input->post('final_payment_grn'),
'just_final_payment_grn'=>$this->input->post('just_final_payment_grn'),

'post_grn_proprietary'=>$this->input->post('final_payment_post_grn'),
'just_final_pymt_post_grn'=>$this->input->post('just_final_pymt_post_grn'),

'delivery_terms'=>$this->input->post('delivery_gate'),
'just_delivery_gate'=>$this->input->post('just_delivery_gate'),


'cost_reimb_cust'=>$this->input->post('cost_reimb_cust'),
'just_cost_reimb_cust'=>$this->input->post('just_cost_reimb_cust'),


'repl_cost_agreed'=>$this->input->post('repl_cost_agreed'),
'just_repl_cost_agree'=>$this->input->post('just_repl_cost_agree'),

'advance_bg'=>$this->input->post('advance_payment_bg'),
'just_adv_pymt_bg'=>$this->input->post('just_adv_pymt_bg'),

'advance_25'=>$this->input->post('advance_25'),
'just_advance_25'=>$this->input->post('just_advance_25'),

'paymt_trm_grn_90'=>$this->input->post('paymt_trm_grn_90'),
'just_paymt_trm_grn_90'=>$this->input->post('just_paymt_trm_grn_90'),


'imported_item'=>$this->input->post('imported_item'),
'just_imported_item'=>$this->input->post('just_imported_item'),

);
	$qcs_upd=$this->qcs_model->qcs_step_upd($qcs_up_id,$dataupdate);
	
	//pr status update in pr_master table
	/*
	  $pr_status_update = array(
'pr_state'=> $this->input->post('pr_status'),


);
	$pr_state_upd=$this->qcs_model->pr_step_upd($pr_id,$pr_status_update);
	*/
	
  //additional attachment 	
 if (!empty($_FILES['additional_attachment']['name'])) {//single file upload 
                chmod('./uploads/additional_attachment/', 0777);
$path   = './uploads/additional_attachment/';
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
if($this->upload->do_upload('additional_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
  //end
     if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files($_FILES['upload_data']['name'], $_FILES['upload_data'], $qcs_up_id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded 6 Successfully");
                </script>
            <?php
					
                }
				
            }
			else{
				
				
			}
  ?>
   <script type="text/javascript">
                    alert("Your QCS Recoarded QCS ID <?php echo $qcs_up_id; ?>");
                </script>
  <?php
		$this->load->helper('url');

		$this->load->view('QCS/qcs_master_draft');
	
}


//upload file

 private function upload_files($title, $files, $qcs_up_id)
    {
		 $this->load->database();  
		  $this->load->model('purchase/qcs_model');  
		  

		chmod('./uploads/qcs/', 0777);
$path   = './uploads/qcs/'.$qcs_up_id;
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

            $config['qcs_file_nm'] = $fileName;
			
			
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
					date_default_timezone_set('Asia/Kolkata');
 $filedate=date('d-m-Y');
				
				$datanew = array(
'qcs_id' => $qcs_up_id,
'qcs_file_nm' => preg_replace('/\s+/', '_', $fileName),
'insert_date' => $filedate,


);
$this->qcs_model->insertfiles($datanew);//Inserting 6 files

            } else {
                return false;
            }
        }

        return $images;
    }	
   


//end

   
// update qcs file



 private function upload_files1($title, $files, $draft_qcs_no)
    {
		 $this->load->database();  
		  $this->load->model('purchase/qcs_model');  
		  

		chmod('./uploads/qcs/', 0777);
$path   = './uploads/qcs/'.$draft_qcs_no;
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

            $config['qcs_file_nm'] = $fileName;
			
			
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
					date_default_timezone_set('Asia/Kolkata');
 $filedate=date('d-m-Y');
				
				$datanew = array(
'qcs_id' => $draft_qcs_no,
'qcs_file_nm' => preg_replace('/\s+/', '_', $fileName),
'insert_date' => $filedate,


);
//$this->qcs_model->updatefiles($datanew,$draft_qcs_no);//Inserting 6 files

$this->qcs_model->insertfiles($datanew);//Inserting 6 files
            } else {
                return false;
            }
        }

        return $images;
    }
	
	
	//end
 public function Qcs_master_draft()//shows all QCS draft list
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/qcs_master_draft');
   }


public function Qcs_master($pr_id)//Create QCS //not use 
   {
          $data['pr_id']=$pr_id;
        $this->load->helper('url');


		$this->load->view('QCS/qcs_step_two',$data);
   } 
   
   
  //Item Addition in QCS 
     
   public function add_item()
   {
	  
		   
	   date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y h:i');
 $date=date('Y-m-d H:i:s');
 $temp_qcs=$this->input->post('tempqcs_id');
 $temp_prid=$this->input->post('temp_prid');
 $item_code=$this->input->post('item_code');
	  $data = array(
'qcs_id' =>  $temp_qcs,
'pr_id' => $temp_prid,
'q_item_code' => $this->input->post('pr_itemid'),
'item_id'=> $this->input->post('item_code'),
//'q_item_code'=>$this->input->post('custom_item_code') ,
'q_item_description' => $this->input->post('item_description'),
'q_item_specification'=> $this->input->post('item_specification'),
'q_req_quantity' => $this->input->post('qty'),
'q_uom' => $this->input->post('uom'),
'q_hsn_code' => $this->input->post('hsn_code'),
'quot_rate1' => $this->input->post('quot_rate1'),
'quoted_amt1' => $this->input->post('quot_amt1'),
'final_rate1' => $this->input->post('final_rate1'),
'final_amt1' => $this->input->post('amount1'),
'quot_rate2	' => $this->input->post('quot_rate2'),
'quoted_amt2' => $this->input->post('quot_amt2'),
'final_rate2' => $this->input->post('final_rate2'),
'final_amt2' => $this->input->post('amount2'),
'quot_rate3	' => $this->input->post('quot_rate3'),
'quoted_amt3' => $this->input->post('quot_amt3'),
'final_rate3' => $this->input->post('final_rate3'),
'final_amt3' => $this->input->post('amount3'),
'qcs_item_date' => $date,
);
		$result=$this->qcs_model->item_insert($data);
		 	
		
	  $itemupdate = array(
'qcs_gen'=> $this->input->post('tempqcs_id'),

);
	$item_upd=$this->qcs_model->qcs_itm_upd($item_code,$itemupdate);
		 
        $this->load->helper('url');
		 $data['qcs_id']=$temp_qcs;
		$this->load->view('QCS/qcs_step_two',$data);
   }
   
   
   //step 2 page pr owner name fetch  with pr id
   	    function fetch_pr_name($prid)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_owner_name']=$this->qcs_model->fetch_pr_name($prid);  		  		
	return  $data;
}

//view qcs item in step 2 page 
	   function view_qcs_items($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_view']=$this->qcs_model->view_qcs_items($qcs_id);  
		return  $data['item_view'];
		  
}


//edit qcs item in step 2 page  by id
	   function edit_qcs_items($qcs_item_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_qcs']=$this->qcs_model->edit_qcs_items($qcs_item_id);  
		return  $data['item_qcs'];
		  
}
//qcs detail show related to qcs_item id 
	   function qcs_detail_itemid($qcs_item_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['data_qcs']=$this->qcs_model->qcs_detail_itemid($qcs_item_id);  
		return  $data['data_qcs'];
		  
}
//Edit /Delete item page show 

  public function qcs_edit_item($qcs_item_id) 
   {	$data['qcs_item_id']=$qcs_item_id;
	    $this->load->helper('url');

		$this->load->view('QCS/qcs_edit_delete_item',$data);
   }
   
    //Edit /Delete item page show  draft

  public function qcs_edit_del_item($qcs_item_id) 
   {	$data['qcs_item_id']=$qcs_item_id;
	    $this->load->helper('url');

		$this->load->view('QCS/draft_qcs_edit_delete_item',$data);
   } 
   
   
   //delete item Id wise 
   			public function deleteItem($qcs_item_id)
   {

		$del_itemid=$this->input->post('del_itemid');
		$data = array(
				'qcs_gen'=>'NULL',
		);
		

	$itema_upd=$this->qcs_model->qcs_itm_gen($del_itemid,$data); //10 avb
	?>
		   <script type="text/javascript">
                    alert("Delete item <?php echo $del_itemid ?>");
                </script>
		<?php		
	   //$data['qcs_id']=$qcs_item_id;
	   $this->db->where('qcs_item_id',$qcs_item_id);
	   $this->db->delete('qcs_item');
	   
	   
	
	   $this->load->helper('url');
		$this->load->view('QCS/qcs_step2_list');
   }
// draft mode delete item Id wise 
   			public function draft_deleteItem($qcs_item_id)
   {

		$del_itemid=$this->input->post('del_itemid');
		$data = array(
				'qcs_gen'=>'null',
		);
		

	$itema_upd=$this->qcs_model->qcs_itm_gen($del_itemid,$data); //10 avb
	?>
		   <script type="text/javascript">
                    alert("Delete item <?php echo $del_itemid ?>");
                </script>
		<?php		
	   //$data['qcs_id']=$qcs_item_id;
	   $this->db->where('qcs_item_id',$qcs_item_id);
	   $this->db->delete('qcs_item');
	   
	   
	
	   $this->load->helper('url');
		$this->load->view('QCS/qcs_master_draft');
   }
   //update item in qcs
   	
				public function updateitem()
		{

			$id=$this->input->post('q_item_id');
			
			$data = array(

'q_item_code' => $this->input->post('q_update_itemc'),
'q_item_description' => $this->input->post('q_update_item_desc'),
'q_req_quantity' => $this->input->post('q_update_qty'),
'q_hsn_code'=>$this->input->post('q_update_hsn'),
'q_uom' => $this->input->post('q_update_uom'),
 
 'quot_rate1'=>$this->input->post('q_update_quot_rate1'),
 'quoted_amt1'=>$this->input->post('q_update_quot_amt1'),
 'final_rate1'=>$this->input->post('q_update_final_rate1'),
'final_amt1'=>$this->input->post('q_update_amount1'),

'quot_rate2'=>$this->input->post('q_update_quot_rate2'),
 'quoted_amt2'=>$this->input->post('q_update_quot_amt2'),
 'final_rate2'=>$this->input->post('q_update_final_rate2'),
'final_amt2'=>$this->input->post('q_update_amount2'),

'quot_rate3'=>$this->input->post('q_update_quot_rate3'),
 'quoted_amt3'=>$this->input->post('q_update_quot_amt3'),
 'final_rate3'=>$this->input->post('q_update_final_rate3'),
'final_amt3'=>$this->input->post('q_update_amount3'),




);
//Transfering data to Model
$this->load->helper('url');


 $this->load->database();  
         //load the model  
         $this->load->model('qcs_model'); 

		 $this->qcs_model->update_qcs_item($id,$data);
$data['message'] = 'Data Updated Successfully';
//Loading View
 
         //load the method of model  
         //$data['h']=$this->qcs_model->qcs_step2_list();  
 ?>
	<script>
	
	alert("Item is Updated!");
	</script>

		<?php 
//$this->load->view('QCS/qcs_step2_list', $data);
			echo '<script>window.history.back();</script>';	
			
		}
		
		 //draft update item in qcs
   	
				public function draft_updateitem()
		{

			$id=$this->input->post('q_item_id');
			
			$data = array(

'q_item_code' => $this->input->post('q_update_itemc'),
'q_item_description' => $this->input->post('q_update_item_desc'),
'q_req_quantity' => $this->input->post('q_update_qty'),
'q_hsn_code'=>$this->input->post('q_update_hsn'),
'q_uom' => $this->input->post('q_update_uom'),
 
 'quot_rate1'=>$this->input->post('q_update_quot_rate1'),
 'quoted_amt1'=>$this->input->post('q_update_quot_amt1'),
 'final_rate1'=>$this->input->post('q_update_final_rate1'),
'final_amt1'=>$this->input->post('q_update_amount1'),

'quot_rate2'=>$this->input->post('q_update_quot_rate2'),
 'quoted_amt2'=>$this->input->post('q_update_quot_amt2'),
 'final_rate2'=>$this->input->post('q_update_final_rate2'),
'final_amt2'=>$this->input->post('q_update_amount2'),

'quot_rate3'=>$this->input->post('q_update_quot_rate3'),
 'quoted_amt3'=>$this->input->post('q_update_quot_amt3'),
 'final_rate3'=>$this->input->post('q_update_final_rate3'),
'final_amt3'=>$this->input->post('q_update_amount3'),




);
//Transfering data to Model
$this->load->helper('url');


 $this->load->database();  
         //load the model  
         $this->load->model('qcs_model'); 

		 $this->qcs_model->update_qcs_item($id,$data);
$data['message'] = 'Data Updated Successfully';
 
 ?>
	<script>
	
	alert("Item is Updated!");
	</script>

		<?php 
//$this->load->view('QCS/qcs_master_draft');
 echo '<script>window.history.back();</script>';			
			
		}
		
 
 
// item code name display from pr_item table 
	   function fetch_item_nm($item_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['item_code']=$this->qcs_model->fetch_item_nm($item_code);  		  		
	return  $data;
} 
   
   //qcs save in draft  mode
   public function qcs_draft_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/qcs_master_draft');
   }
   

  
   //QCS draft list display 
 function list_qcs_draft($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_master_list']=$this->qcs_model->list_qcs_draft($emp_code);  		  		
	return  $data['pr_master_list'];
		  
}
//QCS draft step 1 page
 public function draft_qcs_step_one($qcs_id) 
   {	$data['qcs_id']=$qcs_id;
	    $this->load->helper('url');

		$this->load->view('QCS/draft_qcs_step_one',$data);
   }
   
   //update step1 draft changes 
   
      public function draft_step1()
   {
	    date_default_timezone_set('Asia/Kolkata');
        //$date=date('d-m-Y');
        
 $date=date('Y-m-d H:i:s');
 $draft_q_no=$this->input->post('draft_q_no');
 
//Supplier1................. 21/03/2020
$sup1_name = $this->input->post('draft_sup1_nm');
$sup1_nm = $this->input->post('draft_sup1_name');
if($sup1_nm=="")
{
	$paraSup1=$sup1_name;
}
elseif($sup1_name==""){
	$split = explode("-",$sup1_nm);
	$paraSup1=$split[1];
}
 //Supplier2................. 21/03/2020
$sup2_name = $this->input->post('draft_sup2_nm');
$sup2_nm = $this->input->post('draft_sup2_name');
if($sup2_nm=="")
{
	$paraSup2=$sup2_name;
}
elseif($sup2_name==""){
	$split = explode("-",$sup2_nm);
	$paraSup2=$split[1];
}
//Supplier3................. 21/03/2020
$sup3_name = $this->input->post('draft_sup3_nm');
$sup3_nm = $this->input->post('draft_sup3_name');
if($sup3_nm=="")
{
	$paraSup3=$sup3_name;
}
elseif($sup3_name==""){
	$split = explode("-",$sup3_nm);
	$paraSup3=$split[1];
}
 
	
	  $step1_update = array(
	'qcs_id' =>  $draft_q_no,

	 'sup1_nm' => $paraSup1,
	 'sup1_contact_no' => $this->input->post('draft_sup1_mno'),
	'sup1_contact_person' => $this->input->post('draft_sup1_contactp'),
	'sup1_eid' => $this->input->post('draft_sup1_eid'),
	
	'sup2_nm' => $paraSup2,
	'sup2_contact_no' => $this->input->post('draft_sup2_mno'),
	'sup2_contact_person' => $this->input->post('draft_sup2_contactp'),
	'sup2_eid' => $this->input->post('draft_sup2_eid'),
	
	'sup3_nm' => $paraSup3,
	'sup3_contact_no' => $this->input->post('draft_sup3_mno'),
	'sup3_contact_person' => $this->input->post('draft_sup3_contactp'),
	'sup3_eid' => $this->input->post('draft_sup3_eid'),
	
	'qcs_date' => $date,
);
		
		 	
	$step1_upd = $this->qcs_model->draft_step1_upd($draft_q_no,$step1_update);
		 ?>
	<script>
	
	alert("Step1 dats is Updated!!! Move to Step2");
	</script>

		<?php  
        $this->load->helper('url');
		 $data['qcs_id']=$draft_q_no;
		$this->load->view('QCS/approve_qcs_draft',$data);
   }
   
//qcs draft step2 page
   public function view_qcs_draft($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/approve_qcs_draft',$data);
   }

 	   function qcs_detail($qcs_id)//Full qcs detail for draft and detail QCS 
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_detail']=$this->qcs_model->qcs_detail($qcs_id);  		  		
	return  $data['qcs_detail'];
		  
}

   //QCS draft technical specificatio display 
 function qcs_techspec_show($qid)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_tech']=$this->qcs_model->qcs_techspec_show($qid);  		  		
	return  $data['qcs_tech'];
		  
}
//qcs draft step2 attachment
  
function filefetchqcs($qcs_id)
{
	
	$this->load->database();  
                 $this->load->model('purchase/qcs_model');  
	
 $data['files']=$this->qcs_model->filefetch_qcs($qcs_id);  
		  		

 return  $data['files'];
		  
}

 //Item Addition in QCS 
     
   public function draft_add_item()
   {
	  
		   
	   date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y h:i');
 $date=date('Y-m-d H:i:s');
 $temp_qcs=$this->input->post('tempqcs_id');
 $temp_prid=$this->input->post('temp_prid');
 $item_code=$this->input->post('item_code');
	  $data = array(
'qcs_id' =>  $temp_qcs,
'pr_id' => $temp_prid,
'q_item_code' => $this->input->post('pr_itemid'),
'item_id'=> $this->input->post('item_code'),
//'q_item_code'=>$this->input->post('custom_item_code') ,
'q_item_description' => $this->input->post('item_description'),
'q_item_specification'=> $this->input->post('item_specification'),
'q_req_quantity' => $this->input->post('qty'),
'q_uom' => $this->input->post('uom'),
'q_hsn_code' => $this->input->post('hsn_code'),
'quot_rate1' => $this->input->post('quot_rate1'),
'quoted_amt1' => $this->input->post('quot_amt1'),
'final_rate1' => $this->input->post('final_rate1'),
'final_amt1' => $this->input->post('amount1'),
'quot_rate2	' => $this->input->post('quot_rate2'),
'quoted_amt2' => $this->input->post('quot_amt2'),
'final_rate2' => $this->input->post('final_rate2'),
'final_amt2' => $this->input->post('amount2'),
'quot_rate3	' => $this->input->post('quot_rate3'),
'quoted_amt3' => $this->input->post('quot_amt3'),
'final_rate3' => $this->input->post('final_rate3'),
'final_amt3' => $this->input->post('amount3'),
'qcs_item_date' => $date,
);
		$result=$this->qcs_model->item_insert($data);
		 	
		
	  $itemupdate = array(
'qcs_gen'=> $this->input->post('tempqcs_id'),

);
	$item_upd=$this->qcs_model->qcs_itm_upd($item_code,$itemupdate);
		 
        $this->load->helper('url');
		 $data['qcs_id']=$temp_qcs;
		$this->load->view('QCS/approve_qcs_draft',$data);
   }
   

//draft qcs step2 save as draft mode 
function qcs_draft_step2(){
	$date=date('d-m-Y h:i');
	$draft_qcs_no = $this->input->post('draft_qcs_no');
	$pr_no =$this->input->post('pr_id');
	$qcs_emp_code = $this->input->post('qcs_emp_code');
	$sourcing_approval1= $this->input->post('sourcing_approval1');
	$qcs_status=$this->input->post('qcs_state');
	
	$attachment_flag = $this->input->post('additional_attachment');
	$attachment_check =$this->input->post('attachment_check');

			if($attachment_flag ==''){
			    
			    	$tech_det_sup1=htmlentities($this->input->post('draft_tech_det_sup1'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
			    	$tech_det_sup2=htmlentities($this->input->post('draft_tech_det_sup2'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
			    	$tech_det_sup3=htmlentities($this->input->post('draft_tech_det_sup3'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
			    	
			    	
		 $step2_update = array(
				
				//'qcs_id' =>$this->input->post('draft_qcs_no'),
				
			
			'tech_det_sup1'=>$tech_det_sup1,
				'tech_det_sup2'=>$tech_det_sup2,
				'tech_det_sup3'=>$tech_det_sup3,

				'credibility_sup1'=>$this->input->post('draft_supplier1_checked'),
				'credibility_sup2'=>$this->input->post('draft_supplier2_checked'),
				'credibility_sup3'=>$this->input->post('draft_supplier3_checked'),
				
				'insurance_sup1'=>$this->input->post('draft_supplier1_insurance'),
				'insurance_sup2'=>$this->input->post('draft_supplier2_insurance'),
				'insurance_sup3'=>$this->input->post('draft_supplier3_insurance'),

				'del_period_sup1'=>$this->input->post('draft_delivery_period_up_sup1'),
				'del_period_sup2'=>$this->input->post('draft_delivery_period_up_sup2'),
				'del_period_sup3'=>$this->input->post('draft_delivery_period_up_sup3'),

				'del_mode_sup1'=>$this->input->post('draft_del_mode_sup1'),
				'del_mode_sup2'=>$this->input->post('draft_del_mode_sup2'),
				'del_mode_sup3'=>$this->input->post('draft_del_mode_sup3'),
				
				'inspection_sup1'=>$this->input->post('draft_supplier1_testing'),
				'inspection_sup2'=>$this->input->post('draft_supplier2_testing'),
				'inspection_sup3'=>$this->input->post('draft_supplier3_testing'),

				'pymt_terms_sup1'=>$this->input->post('draft_pay_terms_sup1'),
				'pymt_terms_sup2'=>$this->input->post('draft_pay_terms_sup2'),
				'pymt_terms_sup3'=>$this->input->post('draft_pay_terms_sup3'),

				'warranty_sup1'=>$this->input->post('draft_warranty_sup1'),
				'warranty_sup2'=>$this->input->post('draft_warranty_sup2'),
				'warranty_sup3' =>$this->input->post('draft_warranty_sup3'),
				
				'scope_instal_sup1' => $this->input->post('draft_scope_inst_sup1'),
				'scope_instal_sup2' => $this->input->post('draft_scope_inst_sup2'),
				'scope_instal_sup3' => $this->input->post('draft_scope_inst_sup3'),


				'taxes_duties_sup1' => $this->input->post('draft_sup1_taxes'),
				'taxes_duties_sup2' => $this->input->post('draft_sup2_taxes'),
				'taxes_duties_sup3' => $this->input->post('draft_sup2_taxes'),

				'note_sup1' => $this->input->post('draft_sup1_note'),
				'note_sup2' => $this->input->post('draft_sup2_note'),
				'note_sup3' => $this->input->post('draft_sup3_note'),
				
				'validity_price_sup1' => $this->input->post('draft_price_sup1'),
				'validity_price_sup2' => $this->input->post('draft_price_sup2'),
				'validity_price_sup3' => $this->input->post('draft_price_sup3'),


                'repl_scope_sup1'=> $this->input->post('draft_repl_sup1'),
				'repl_scope_sup2'=> $this->input->post('draft_repl_sup2'),
				'repl_scope_sup3'=> $this->input->post('draft_repl_sup3'),

		
	 );
	 
		$draft_step2 = $this->qcs_model->qcs_draft_step2($draft_qcs_no ,$step2_update);
	
	
$step2_qcs_data = array(
			
				'selected_supplier'=> $this->input->post('draft_select_sup'),
				'justification_supplier'=> $this->input->post('draft_select_sup_justi'),
				
				'approval_level1'=> $this->input->post('sourcing_approval1'),
				'approval_level2'=> $this->input->post('sourcing_approval2'),
				'approval_level3'=> $this->input->post('sourcing_approval3'),
				'approval_level4'=> $this->input->post('sourcing_approval4'),
				'approval_level5'=> $this->input->post('sourcing_approval5'),
				
				
		        	'outside_budget'=>$this->input->post('draft_outside_budget'),
				'just_outside_budget'=>$this->input->post('just_draft_outside_budget'),
				
				'order_value' =>$this->input->post('draft_order_value'),
				'just_order_value'=>$this->input->post('just_draft_order_value'),
				
				'offers_received'=>$this->input->post('draft_quotation_received'),
				'just_quot_reec'=>$this->input->post('draft_just_quot_reec'),
				
				
				'non_properitery_item'=>$this->input->post('draft_advance_nonproprietery'),
				'just_adv_nonproprietery'=>$this->input->post('draft_just_adv_nonprop'),
				
				'properitery_item'=>$this->input->post('draft_advance_proprietery'),
				'just_adv_proprietery'=>$this->input->post('draft_just_adv_prop'),
				
				'post_grn_nonproprietary'=>$this->input->post('draft_final_payment_grn'),
				'just_final_payment_grn'=>$this->input->post('draft_just_final_pay_grn'),
				
				'post_grn_proprietary'=>$this->input->post('draft_final_payment_post_grn'),
				'just_final_pymt_post_grn'=>$this->input->post('draft_just_final_pay_post_grn'),
				
				'delivery_terms'=>$this->input->post('draft_delivery_gate'),
				'just_delivery_gate'=>$this->input->post('draft_just_delivery_gate'),
				
				'cost_reimb_cust'=>$this->input->post('draft_cost_reimb_cust'),
				'just_cost_reimb_cust'=>$this->input->post('draft_just_cost_reimb'),
				
				'repl_cost_agreed'=>$this->input->post('draft_repl_cost_agreed'),
				'just_repl_cost_agree'=>$this->input->post('draft_just_repl_cost_agreed'),
				
				'advance_bg'=>$this->input->post('draft_advance_payment_bg'),
				'just_adv_pymt_bg'=>$this->input->post('draft_just_adva_pay_bg'),
				
				'advance_25'=>$this->input->post('draft_advance_25'),
				'just_advance_25'=>$this->input->post('draft_just_advance_25'),
				
				'paymt_trm_grn_90'=>$this->input->post('draft_paymt_trm_grn_90'),
				'just_paymt_trm_grn_90'=>$this->input->post('draft_just_paymt_trm_grn_90'),
				
				'imported_item'=>$this->input->post('draft_imported_item'),
				'just_imported_item'=>$this->input->post('draft_just_imported_item'),
				
				
				'additional_attachment' =>preg_replace('/\s+/', '_', $_FILES['additional_attachment']['name']),
				'qcs_status'=>$this->input->post('qcs_state'),
				'qcs_sub_date' =>$date,
		);
	$step2_qcs_data1 = $this->qcs_model->qcs_draft_step2_qcsmaster($draft_qcs_no ,$step2_qcs_data);
	
		//additional_attachment attachment 	
 if (!empty($_FILES['additional_attachment']['name'])) {
	 //single file upload 
                chmod('./uploads/additional_attachment/', 0777);
$path   = './uploads/additional_attachment/';
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
if($this->upload->do_upload('additional_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
					$step2_qcs_data1 = $this->qcs_model->qcs_draft_step2_qcsmaster($draft_qcs_no ,$step2_qcs_data);		
			
            } 
				
			else{
		
		
		 $step2_update = array(
				
				//'qcs_id' =>$this->input->post('draft_qcs_no'),
					//'tech_det_sup1'=>$this->input->post('draft_tech_det_sup1'),
						'tech_det_sup1'=>$tech_det_sup1,
				'tech_det_sup2'=>$tech_det_sup2,
				'tech_det_sup3'=>$tech_det_sup3,

				'credibility_sup1'=>$this->input->post('draft_supplier1_checked'),
				'credibility_sup2'=>$this->input->post('draft_supplier2_checked'),
				'credibility_sup3'=>$this->input->post('draft_supplier3_checked'),
				
				'insurance_sup1'=>$this->input->post('draft_supplier1_insurance'),
				'insurance_sup2'=>$this->input->post('draft_supplier2_insurance'),
				'insurance_sup3'=>$this->input->post('draft_supplier3_insurance'),

				'del_period_sup1'=>$this->input->post('draft_delivery_period_up_sup1'),
				'del_period_sup2'=>$this->input->post('draft_delivery_period_up_sup2'),
				'del_period_sup3'=>$this->input->post('draft_delivery_period_up_sup3'),

				'del_mode_sup1'=>$this->input->post('draft_del_mode_sup1'),
				'del_mode_sup2'=>$this->input->post('draft_del_mode_sup2'),
				'del_mode_sup3'=>$this->input->post('draft_del_mode_sup3'),
				
				'inspection_sup1'=>$this->input->post('draft_supplier1_testing'),
				'inspection_sup2'=>$this->input->post('draft_supplier2_testing'),
				'inspection_sup3'=>$this->input->post('draft_supplier3_testing'),

				'pymt_terms_sup1'=>$this->input->post('draft_pay_terms_sup1'),
				'pymt_terms_sup2'=>$this->input->post('draft_pay_terms_sup2'),
				'pymt_terms_sup3'=>$this->input->post('draft_pay_terms_sup3'),

				'warranty_sup1'=>$this->input->post('draft_warranty_sup1'),
				'warranty_sup2'=>$this->input->post('draft_warranty_sup2'),
				'warranty_sup3' =>$this->input->post('draft_warranty_sup3'),
				
				'scope_instal_sup1' => $this->input->post('draft_scope_inst_sup1'),
				'scope_instal_sup2' => $this->input->post('draft_scope_inst_sup2'),
				'scope_instal_sup3' => $this->input->post('draft_scope_inst_sup3'),


				'taxes_duties_sup1' => $this->input->post('draft_sup1_taxes'),
				'taxes_duties_sup2' => $this->input->post('draft_sup2_taxes'),
				'taxes_duties_sup3' => $this->input->post('draft_sup2_taxes'),

				'note_sup1' => $this->input->post('draft_sup1_note'),
				'note_sup2' => $this->input->post('draft_sup2_note'),
				'note_sup3' => $this->input->post('draft_sup3_note'),
				
				'validity_price_sup1' => $this->input->post('draft_price_sup1'),
				'validity_price_sup2' => $this->input->post('draft_price_sup2'),
				'validity_price_sup3' => $this->input->post('draft_price_sup3'),


                'repl_scope_sup1'=> $this->input->post('draft_repl_sup1'),
				'repl_scope_sup2'=> $this->input->post('draft_repl_sup2'),
				'repl_scope_sup3'=> $this->input->post('draft_repl_sup3'),

		
	 );
	 
		$draft_step2 = $this->qcs_model->qcs_draft_step2($draft_qcs_no ,$step2_update);
	
	
$step2_qcs_data = array(
			
				'selected_supplier'=> $this->input->post('draft_select_sup'),
				'justification_supplier'=> $this->input->post('draft_select_sup_justi'),
				
				'approval_level1'=> $this->input->post('sourcing_approval1'),
				'approval_level2'=> $this->input->post('sourcing_approval2'),
				'approval_level3'=> $this->input->post('sourcing_approval3'),
				'approval_level4'=> $this->input->post('sourcing_approval4'),
				'approval_level5'=> $this->input->post('sourcing_approval5'),
				
				
		        	'outside_budget'=>$this->input->post('draft_outside_budget'),
				'just_outside_budget'=>$this->input->post('just_draft_outside_budget'),
				
				'order_value' =>$this->input->post('draft_order_value'),
				'just_order_value'=>$this->input->post('just_draft_order_value'),
				
				'offers_received'=>$this->input->post('draft_quotation_received'),
				'just_quot_reec'=>$this->input->post('draft_just_quot_reec'),
				
				
				'non_properitery_item'=>$this->input->post('draft_advance_nonproprietery'),
				'just_adv_nonproprietery'=>$this->input->post('draft_just_adv_nonprop'),
				
				'properitery_item'=>$this->input->post('draft_advance_proprietery'),
				'just_adv_proprietery'=>$this->input->post('draft_just_adv_prop'),
				
				'post_grn_nonproprietary'=>$this->input->post('draft_final_payment_grn'),
				'just_final_payment_grn'=>$this->input->post('draft_just_final_pay_grn'),
				
				'post_grn_proprietary'=>$this->input->post('draft_final_payment_post_grn'),
				'just_final_pymt_post_grn'=>$this->input->post('draft_just_final_pay_post_grn'),
				
				'delivery_terms'=>$this->input->post('draft_delivery_gate'),
				'just_delivery_gate'=>$this->input->post('draft_just_delivery_gate'),
				
				'cost_reimb_cust'=>$this->input->post('draft_cost_reimb_cust'),
				'just_cost_reimb_cust'=>$this->input->post('draft_just_cost_reimb'),
				
				'repl_cost_agreed'=>$this->input->post('draft_repl_cost_agreed'),
				'just_repl_cost_agree'=>$this->input->post('draft_just_repl_cost_agreed'),
				
				'advance_bg'=>$this->input->post('draft_advance_payment_bg'),
				'just_adv_pymt_bg'=>$this->input->post('draft_just_adva_pay_bg'),
				
				'advance_25'=>$this->input->post('draft_advance_25'),
				'just_advance_25'=>$this->input->post('draft_just_advance_25'),
				
				'paymt_trm_grn_90'=>$this->input->post('draft_paymt_trm_grn_90'),
				'just_paymt_trm_grn_90'=>$this->input->post('draft_just_paymt_trm_grn_90'),
				
				'imported_item'=>$this->input->post('draft_imported_item'),
				'just_imported_item'=>$this->input->post('draft_just_imported_item'),
				
				
				'additional_attachment' =>$attachment_check,
				'qcs_status'=>$this->input->post('qcs_state'),
				'qcs_sub_date' =>$date,
		);
	$step2_qcs_data1 = $this->qcs_model->qcs_draft_step2_qcsmaster($draft_qcs_no ,$step2_qcs_data);
		
			
			
		
	}
	}
		
	
	
	
	//status change
	if($qcs_status=='submited_Sourcing_Mgr'){
$statusdata= array(
'qcs_id' =>$draft_qcs_no,
'pr_id' => $pr_no,
'qcs_status_name' => "1",
'qcs_owner_id' =>$qcs_emp_code,
'qcs_approval_id' =>$sourcing_approval1,
'qcs_status_date' => $date,
);

		$reciver= $this->input->post('sourcing_head_email');
 	    $ccuser=$this->input->post('pr_owner_email');
 	
 		//$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser= 'mis@ruchagroup.com';
 	//	$ccuser1='pradnyashroff@gmail.com';
 		
		 $subject='QCS No '.$draft_qcs_no.' Filed By '.$this->input->post('qcs_owner_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>QCS No:</b>  '.$draft_qcs_no.'</li>
	<li><b>QCS Date:</b>  '.$this->input->post('qcs_date'). '</li>
	<li><b>PR No:</b>  '.$pr_no.'</li>
	<li><b>QCS Owner Name:</b>  '.$this->input->post('qcs_owner_nm'). '</li>
	<li><b>Selected Supplier:</b>  '.$this->input->post('draft_select_sup').'</li>
	<li><b>Justification QCS:</b>  '.$this->input->post('draft_select_sup_justi').'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('draft_select_sup_justi').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	
	
	
	<li><b>Status Changed to: Submitted to Sourcing Manager</b></li>
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
      $this->email->cc($ccuser);
     // $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
$status_upd=$this->qcs_model->qcs_status_insert($statusdata);
}

	if($qcs_status=='submited_Sourcing_Mgr'){
$data_attachment= array(
'qcs_id' =>$draft_qcs_no,
'qcs_status'=>$this->input->post('qcs_state'),		
);


$data_upd=$this->qcs_model->qcs_attachments_update($draft_qcs_no ,$data_attachment);

$setNull="";
 date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
$resetData= array(
'approval_level1_comment'=>$setNull,
'approval_level2_comment'=>$setNull,	
'approval_level3_comment'=>$setNull,	
'approval_level4_comment'=>$setNull,	
'approval_level5_comment'=>$setNull);

			$this->db->where('qcs_id', $draft_qcs_no);
            $this->db->update('qcs_master', $resetData);
}


//end
 if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data']['name'], $_FILES['upload_data'], $draft_qcs_no) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			if (!empty($_FILES['upload_data2']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data2']['name'], $_FILES['upload_data2'], $draft_qcs_no) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			if (!empty($_FILES['upload_data3']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data3']['name'], $_FILES['upload_data3'], $draft_qcs_no) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data4']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data4']['name'], $_FILES['upload_data4'], $draft_qcs_no) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data5']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data5']['name'], $_FILES['upload_data5'], $draft_qcs_no) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data6']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data6']['name'], $_FILES['upload_data6'], $draft_qcs_no) === FALSE) {
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
                    alert("Your QCS Updated with QCS ID <?php echo $draft_qcs_no; ?>");
                </script>
				
            <?php
	 
		$this->load->helper('url');
		
		$this->load->view('QCS/qcs_master_draft');
}
//fetch approval1_qcs id 
	   function fetch_sourcing_approval1($approval1)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval_level1']=$this->qcs_model->fetch_sourcing_approval1($approval1);  		  		
	return  $data;
} 

//fetch approval2 id 
	   function fetch_sourcing_approval2($approval2)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval_level2']=$this->qcs_model->fetch_sourcing_approval2($approval2);  		  		
	return  $data;
}
//fetch approval3 id 
	   function fetch_sourcing_approval3($approval3)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval_level3']=$this->qcs_model->fetch_sourcing_approval3($approval3);  		  		
	return  $data;
}
//fetch approval4 id
		
		function fetch_sourcing_approval4($approval4)
		{
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['approval_level4']=$this->qcs_model->fetch_sourcing_approval4($approval4);
			return $data;
		}
		
	   function fetch_prtype_nm($pt_id)//Full pr type name fetch
		{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['pt_name']=$this->qcs_model->fetch_pr_type_nm($pt_id);  		  		
		return  $data;
		}

//sourcing_head_approve_list
   public function sourcing_head_approve_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/sourcing_head_approve_list');
   }
   
   //sourcing approve  page
   

   public function sourcing_head_approve($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/sourcing_head_approve',$data);
   }


 	   function qcs_last_inserid()//Full qcs detail for draft and detail QCS 
{
	
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcsid_detail']=$this->qcs_model->qcs_last_inserid();  		  		
	return  $data['qcsid_detail'];
		  
}

//item list 

	   function list_items_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	 $data['item']=$this->qcs_model->pr_item_list_qcs($emp_code);  
	return  $data['item'];
		  
}

//pr detail 
	  
	   function pr_detail_qcs($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['prdetail']=$this->qcs_model->pr_detail_qcs($qcs_id);  		  		
	return  $data['prdetail'];
		  
} 

//pending approval qcs

   public function qcs_pending_approval_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/qcs_pending_approval');
   }
   
  
   //QCS approval1 sourcing manager list display 
 function list_sourcing_mgr_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_sourcing_mgr_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}

//emp name fetch for qcs email Full emp name  from employee master emp_name_pr
 
	   function emp_name_pr($emp_code)
{
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['emp_name']=$this->qcs_model->emp_name_pr($emp_code);  		  		
	return  $data;
}

//Sourcing head manager Approve/reject with ccomment and status
public function approve_sourcing_mgr()
{
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$pr_id = $this->input->post('pr_id');
		$qcs_num=$this->input->post('qcs_num');
		$qcs_status=$this->input->post('qcs_state');
		
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level1_comment' => $this->input->post('sourcing_mgr_app_cmt'),
'approval1_date'=>$date,
);
	$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);
 //end

	 //approver history
 
 $datahistory = array(
		'qcs_id'=> $this->input->post('qcs_num'),
		'pr_id' =>$this->input->post('pr_id'),
		'approval_emp_code'=>$this->input->post('sourcing_approval1'),
		'approval_comment' =>$this->input->post('sourcing_mgr_app_cmt'),
		'approver_status' =>$this->input->post('qcs_state'),
		'approval_date'=>$date,
 );
$approver_upd=$this->qcs_model->qcs_approver_history($datahistory);
//end	

 	 $row = $this->db->query('SELECT * FROM `qcs_master` where qcs_id='.$qcs_num.'')->row();
if ($row) {
	
	$qcs_date=$row->qcs_date;
	$qcs_owner_nm=$row->qcs_owner;
	$pr_code=$row->plant_code;
	$selected_supplier=$row->selected_supplier;
	$justification_supplier=$row->justification_supplier;
	
  } 
 
   if($qcs_status == "Sourcing_Mgr_approved"){
	  $status_name = "11";
	  
	 	$reciver=$this->input->post('pr_owner_email'); //pr owner 
	    $ccuser= $this->input->post('approval2_email'); //gs jite
 	    $ccuser1=$this->input->post('qcs_ow_email'); //qcs owner
 	    
 	    	//$reciver= 'ppshroff@ruchagroup.com';
 		    //$ccuser= 'mis@ruchagroup.com';
 		    //$ccuser1='pradnyashroff@gmail.com';
 	    
		$subject='QCS No '.$qcs_num.' Approved By Sourcing Manager '.$this->input->post('login_user_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_mgr_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to:</b> QCS Approved BY '.$this->input->post('login_user_nm').'</li>
	
	
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
        $this->email->cc($ccuser1);
	    $this->email->bcc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	
	  }
	  
	  if($qcs_status == "Sourcing_Mgr_reject"){
	  $status_name = "12";
	  
	  		$reciver=$this->input->post('pr_owner_email'); //pr owner to
	       //$ccuser1= $this->input->post('approval2_email'); //gs jite bcc
 		  $ccuser=$this->input->post('qcs_ow_email'); //qcs owner cc
		
		
		//	$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser= 'mis@ruchagroup.com';
 	//	$ccuser1='pradnyashroff@gmail.com';
 		
		
		 $subject='QCS No '.$qcs_num.' Rejected By Sourcing Manager '.$this->input->post('login_user_nm').'  ';
		


		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_mgr_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	
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
    $this->email->cc($ccuser);
      //$this->email->bcc($ccuser1);
	  
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  //pr status update in pr_master table
	/*
	  $pr_status_update = array(
'pr_id' => $pr_id,
'pr_state'=> $this->input->post('qcs_state'),


);
	$pr_state_upd=$this->qcs_model->pr_step_upd($pr_id,$pr_status_update);
	*/  
	  $statusdata= array(
'qcs_id' =>$qcs_num,
'pr_id' => $pr_id,
'qcs_status_name' =>$status_name,
'qcs_owner_id' =>$this->input->post('qcs_emp_code'),
'qcs_approval_id' =>$this->input->post('sourcing_approval1'),
'qcs_status_date' => $date,
);


$status_upd=$this->qcs_model->qcs_status_insert($statusdata);

$this->load->helper('url');
$this->load->view('QCS/sourcing_head_approve_list');
}

   //QCS approval_two sourcing manager list display 
 function list_sourcing_head_approval2($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval2_list']=$this->qcs_model->list_sourcing_head_approval2($emp_code);  		  		
	return  $data['approval2_list'];
		  
}
//sourcing head approval level two page load
   public function sourcing_head_approval2($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/sourcing_head_approval2',$data);
   }
// approval1 sourcing mgr status fetch with date
	  function fetch_status_sourcing_mgr($qcs_id,$approval_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_status_date']=$this->qcs_model->fetch_status_sourcing_mgr($qcs_id,$approval_id);  		  		
	return  $data['qcs_status_date'];
}

//approval2 Approve/reject with ccomment and status approve_sourcing_head 

public function approve_sourcing_head()
{
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$pr_id = $this->input->post('pr_id');
		$qcs_num=$this->input->post('qcs_num');
		$qcs_status=$this->input->post('qcs_state');
		
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level2_comment' => $this->input->post('sourcing_head_app_cmt'),
'approval2_date' =>$date,
);
	$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);
 
//end
//approver history
 
 $datahistory = array(
		'qcs_id'=> $this->input->post('qcs_num'),
		'pr_id' =>$this->input->post('pr_id'),
		'approval_emp_code'=>$this->input->post('sourcing_approval2'),
		'approval_comment' =>$this->input->post('sourcing_head_app_cmt'),
		'approver_status' =>$this->input->post('qcs_state'),
		'approval_date'=>$date,
 );
$approver_upd=$this->qcs_model->qcs_approver_history($datahistory);

 $row = $this->db->query('SELECT * FROM `qcs_master` where qcs_id='.$qcs_num.'')->row();
if ($row) {
	
	$qcs_date=$row->qcs_date;
	$qcs_owner_nm=$row->qcs_owner;
	$pr_code=$row->plant_code;
	$selected_supplier=$row->selected_supplier;
	$justification_supplier=$row->justification_supplier;
	
  } 
   if($qcs_status == "Sourcing_Head_Approved"  OR $qcs_status == "COO_Approved" ){
	  $status_name = "22";
	  
		$reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email');//qcs owner  
		$ccuser1=$this->input->post('approval3_email'); //manoj dusad cfo
		
			//$reciver= 'ppshroff@ruchagroup.com';
 	    	//$ccuser= 'mis@ruchagroup.com';
 		   // $ccuser1='pradnyashroff@gmail.com';
		
	
		 //$subject='QCS No '.$qcs_num.' Approved By Sourcing Head '.$this->input->post('qcs_owner_nm').'  ';
         $subject='QCS No '.$qcs_num.' Approved By Sourcing Head '.$this->input->post('qcs_emp_nm').'  ';

 
		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_head_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
    <li><b>Status Changed to:</b> QCS Approved BY  Sourcing Head '.$this->input->post('qcs_emp_nm').' </li>
	
	
</ol>

  Kindly visit your Purchase panel(https://rucha.co.in/portal)';
	
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
	   $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  if($qcs_status == "Sourcing_Head_Reject" OR $qcs_status == "COO_Reject"){
	  $status_name = "23";
	  
			$reciver=$this->input->post('pr_owner_email');//pr owner
 	        $ccuser=$this->input->post('qcs_ow_email');//qcs owner  
	    	//$ccuser1=$this->input->post('approval3_email'); //manoj dusad cfo
	

 		
		 $subject='QCS No '.$qcs_num.' Rejected By Sourcing Head '.$this->input->post('qcs_owner_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_head_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
    <li><b>Status Changed to:</b> QCS Rejected Sourcing Head '.$this->input->post('qcs_emp_nm').' </li>
	
</ol>

  Kindly visit your Purchase panel(https://rucha.co.in/portal)';
  
		
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
	  
if($qcs_status == "QCS_Approved"){
	  $status_name = "55";
	  
		$reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email');//qcs owner
 		 $ccuser1='repl@ruchagroup.com';
	
		
			//$reciver= 'ppshroff@ruchagroup.com';
 	    	//$ccuser= 'mis@ruchagroup.com';
 		   // $ccuser1='pradnyashroff@gmail.com';
		
		
		// $subject='QCS No '.$qcs_num.' Approved By Sourcing Head '.$this->input->post('qcs_owner_nm').'  ';
		 $subject='QCS No '.$qcs_num.' Approved By  '.$this->input->post('qcs_emp_nm').'  ';

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_head_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to:</b> QCS Process Completed....!! </li>
	
</ol>

   Kindly visit your Purchase panel(https://rucha.co.in/portal)';
		
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
	  $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  
	    if($qcs_status == "QCS_Reject"){
	  $status_name = "56";
	  
		$reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email');//qcs owner  
	    	 $ccuser1='repl@ruchagroup.com';
		
			//$reciver= 'ppshroff@ruchagroup.com';
 	    	//$ccuser= 'mis@ruchagroup.com';
 		   // $ccuser1='pradnyashroff@gmail.com';
		
		
		// $subject='QCS No '.$qcs_num.' Approved By Sourcing Head '.$this->input->post('qcs_owner_nm').'  ';
		 $subject='QCS No '.$qcs_num.' Rejectd By MD Office '.$this->input->post('qcs_emp_nm').'  ';

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('sourcing_head_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to:</b> QCS Rejected....!! </li>
	
</ol>

   Kindly visit your Purchase panel(https://rucha.co.in/portal)';
		
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
	 $this->email->bcc($ccuser1); 
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  $statusdata= array(
'qcs_id' =>$qcs_num,
'pr_id' => $pr_id,
'qcs_status_name' =>$status_name,
'qcs_owner_id' =>$this->input->post('qcs_emp_code'),
'qcs_approval_id' =>$this->input->post('sourcing_approval2'),
'qcs_status_date' => $date,
);


$status_upd=$this->qcs_model->qcs_status_insert($statusdata);

$this->load->helper('url');
	$this->load->view('QCS/sourcing_head_approve_list');
}

//Rejected QCS list qcs_rejected 21-09-19
   public function qcs_rejected() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/qcs_rejected');
   }

   //Rejected list 
 function qcs_rejected_list($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_reject']=$this->qcs_model->qcs_rejected_list($emp_code);  		  		
	return  $data['qcs_reject'];
		  
}

   //QCS approval_3 sourcing CFO list display 
 function list_cfo_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_cfo_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}


//CFO approval level three page load
   public function cfo_approval($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/cfo_approval',$data);
   }
	
//approval 3  Approve/reject with comment cfo_approval d-m-Y  h:i

public function approve_cfo()
{
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$pr_id = $this->input->post('pr_id');
		$qcs_num=$this->input->post('qcs_num');
		$qcs_status=$this->input->post('qcs_state');
		
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level3_comment' => $this->input->post('cfo_app_cmt'),
'approval3_date' =>$date,
);
	$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);
	//end
	
	$datahistory = array(
		'qcs_id'=> $this->input->post('qcs_num'),
		'pr_id' =>$this->input->post('pr_id'),
		'approval_emp_code'=>$this->input->post('sourcing_approval3'),
		'approval_comment' =>$this->input->post('cfo_app_cmt'),
		'approver_status' =>$this->input->post('qcs_state'),
		'approval_date'=>$date,
 );
$approver_upd=$this->qcs_model->qcs_approver_history($datahistory);

//end
	 $row = $this->db->query('SELECT * FROM `qcs_master` where qcs_id='.$qcs_num.'')->row();
if ($row) {
	
	$qcs_date=$row->qcs_date;
	$qcs_owner_nm=$row->qcs_owner;
	$pr_code=$row->plant_code;
	$selected_supplier=$row->selected_supplier;
	$justification_supplier=$row->justification_supplier;
	
  }
 
   if($qcs_status == "CFO_Approved"){
	  $status_name = "33";
	  
			   $reciver=$this->input->post('pr_owner_email');//pr owner to
                 $ccuser=$this->input->post('qcs_ow_email'); //qcs owner  cc
		    	$ccuser1=$this->input->post('approval4_email'); //sohoni coo bcc
		    	
		    		//$reciver= 'ppshroff@ruchagroup.com';
 		            //$ccuser= 'mis@ruchagroup.com';
 		            //$ccuser1='pradnyashroff@gmail.com';
 		
		  $subject='QCS No '.$qcs_num.' Approved By CFO '.$this->input->post('login_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('cfo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	
<li><b>Status Changed to:</b>  QCS Approved By '.$this->input->post('login_nm').' & Forward to Next Process </li>
	
	
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
      $this->email->cc($ccuser);
	   $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  if($qcs_status == "CFO_Reject"){
	  $status_name = "34";
	  
	 $reciver=$this->input->post('pr_owner_email');//pr owner to
     $ccuser=$this->input->post('qcs_ow_email'); //qcs owner  cc
	

	   // $reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser= 'mis@ruchagroup.com';
 		//$ccuser1='pradnyashroff@gmail.com';
 		
		 //$subject='QCS No '.$qcs_num.' Rejected By CFO '.$this->input->post('qcs_owner_nm').'  ';
		 $subject='QCS No '.$qcs_num.' Rejected By CFO '.$this->input->post('login_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('cfo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to:</b>  QCS Rejected By '.$this->input->post('login_nm').' </li>
	
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
      $this->email->cc($ccuser);

    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	
	  }
	
	  $statusdata= array(
'qcs_id' =>$qcs_num,
'pr_id' => $pr_id,
'qcs_status_name' =>$status_name,
'qcs_owner_id' =>$this->input->post('qcs_emp_code'),
'qcs_approval_id' =>$this->input->post('sourcing_approval3'),
'qcs_status_date' => $date,
);


$status_upd=$this->qcs_model->qcs_status_insert($statusdata);

$this->load->helper('url');
	$this->load->view('QCS/sourcing_head_approve_list');
}	


   //QCS approval_4 sourcing COO list display 
 function list_coo_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_coo_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}


//COO approval level 4 page load
   public function coo_approval($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/coo_approval',$data);
   }


//approval 4 Approve/reject with comment coo_approval

public function approve_coo()
{
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$pr_id = $this->input->post('pr_id');
		$qcs_num=$this->input->post('qcs_num');
		$qcs_status=$this->input->post('qcs_state');
		
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level4_comment' => $this->input->post('coo_app_cmt'),
'approval4_date' =>$date,
);
	$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);
 //end
 
 //approval history 
 	$datahistory = array(
		'qcs_id'=> $this->input->post('qcs_num'),
		'pr_id' =>$this->input->post('pr_id'),
		'approval_emp_code'=>$this->input->post('sourcing_approval4'),
		'approval_comment' =>$this->input->post('coo_app_cmt'),
		'approver_status' =>$this->input->post('qcs_state'),
		'approval_date'=>$date,
 );
$approver_upd=$this->qcs_model->qcs_approver_history($datahistory);
//end


  $row = $this->db->query('SELECT * FROM `qcs_master` where qcs_id='.$qcs_num.'')->row();
if ($row) {
	
	$qcs_date=$row->qcs_date;
	$qcs_owner_nm=$row->qcs_owner;
	$pr_code=$row->plant_code;
	$selected_supplier=$row->selected_supplier;
	$justification_supplier=$row->justification_supplier;
	
  }
  
if($qcs_status == "COO_Approved"){
	  $status_name = "44";
	  
		$reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email'); //qcs owner
		$ccuser1=$this->input->post('mdo_email'); //md ofc bcc
 		
		//$ccuser1=$this->input->post('qcs_ow_email'); //
		
		//$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser= 'mis@ruchagroup.com';
 		//$ccuser1='pradnyashroff@gmail.com';
 		
		 $subject='QCS No '.$qcs_num.' Approved By COO '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('coo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed To:</b> QCS Approved BY '.$this->input->post('qcs_emp_nm').'</li>
	
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
      $this->email->cc($ccuser);
	   $this->email->bcc($ccuser1);
	  
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  if($qcs_status == "COO_Reject"){
	  $status_name = "45";
	  
	  $reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email'); //qcs owner
	
		
			//$reciver= 'ppshroff@ruchagroup.com';
 	
 	//	$ccuser='pradnyashroff@gmail.com';
 		
		 $subject='QCS No '.$qcs_num.' Rejected By COO '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('coo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed To:</b> QCS Rejected BY '.$this->input->post('qcs_emp_nm').'</li>

	
</ol>

   Kindly visit your Purchase panel(https://rucha.co.in/portal)';
		
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
	  
	  
	    if($qcs_status == "QCS_Approved"){
	  $status_name = "55";
	  
	  $reciver=$this->input->post('pr_owner_email');//pr owner
 	    $ccuser=$this->input->post('qcs_ow_email'); //qcs owner
	
		
			//$reciver= 'ppshroff@ruchagroup.com';
 	       // $ccuser='pradnyashroff@gmail.com';
 		
		 $subject='QCS No '.$qcs_num.' Approved By MD Office  '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('coo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed To:</b> QCS Approved BY '.$this->input->post('qcs_emp_nm').'</li>
	
	
</ol>

   Kindly visit your Purchase panel(https://rucha.co.in/portal)';
		
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
	  
	  
	    if($qcs_status == "QCS_Reject"){
	  $status_name = "56";
	  
	    $reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email'); //qcs owner
		
		//$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser= 'pradnyashroff@gmail.com';
 	
 		
		 $subject='QCS No '.$qcs_num.' Rejected By MD Office '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
	<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('coo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed To:</b> QCS Approved BY '.$this->input->post('qcs_emp_nm').'</li>
	
	
</ol>

   Kindly visit your Purchase panel(https://rucha.co.in/portal)';
		
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
	
	  $statusdata= array(
'qcs_id' =>$qcs_num,
'pr_id' => $pr_id,
'qcs_status_name' =>$status_name,
'qcs_owner_id' =>$this->input->post('qcs_emp_code'),
'qcs_approval_id' =>$this->input->post('sourcing_approval4'),
'qcs_status_date' => $date,
);


$status_upd=$this->qcs_model->qcs_status_insert($statusdata);

$this->load->helper('url');
	$this->load->view('QCS/sourcing_head_approve_list');
}  


// pending approval in  qcs _ owner  
 	  function list_pending_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_master_list']=$this->qcs_model->list_pending_qcs($emp_code);  		  		
	return  $data['qcs_master_list'];
		  
} 
//qcs pending approval view 
   public function qcs_pending_view($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/qcs_pending_view',$data);
   }

   
   
   //Approve QCS list
   public function approved_qcs_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/approved_qcs_list');
   }
  //Approve qcs list data list_approved_qcs
  
    	  function list_approved_qcs($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_approved_list']=$this->qcs_model->list_approved_qcs($emp_code);  		  		
	return  $data['qcs_approved_list'];
		  
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

//qcs  view  in PR section
   public function qcs_view($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/pr_qcs_view',$data);
   }

 //Approve BY sourcing manager 
   public function approved1_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/approved_list_by_sou_mgr');
   }
  

// Approve BY sourcing manager
    	  function approved_list_by_sou_mgr($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approved1_list']=$this->qcs_model->approved_list_by_sou_mgr($emp_code);  		  		
	return  $data['approved1_list'];
		  
} 


// Approve BY sourcing Head
    	  function approved_list_by_sou_head ($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approved1_list']=$this->qcs_model->approved_list_by_sou_head ($emp_code);  		  		
	return  $data['approved1_list'];
		  
} 

//Approve by cfo_app_cmt

function approved_list_by_cfo($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/qcs_model');
	$data['approve_cfo'] = $this->qcs_model->approved_list_by_cfo($emp_code);
	return $data['approve_cfo'];
}

//Approve by coo_app_cmt

function approved_list_by_coo($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/qcs_model');
	$data['approve_cooo'] = $this->qcs_model->approved_list_by_coo($emp_code);
	return $data['approve_cooo'];
}


//Qcs print view

   public function qcs_print($qcs_id) 
   {
	     $data['qcs_id']=$qcs_id;
	    $this->load->helper('url');


		$this->load->view('QCS/qcs_print_view',$data);
   }
//qcs Approved view 
   public function qcs_approved_view($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/qcs_approved_printview',$data);
   }


   //Approver history
    
 function qcs_approver_history_id($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approver_history']=$this->qcs_model->qcs_approver_history_id($qcs_id);  		  		
	return  $data['approver_history'];
		  
}

//shows sourcing approved pr 
 public function sourcing_approved()
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/pr_sourcing_approvelist');
   }

//list approve sourcing list
     	  function list_pr_source_approved_sourcing($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_approved_source']=$this->qcs_model->list_pr_source_approved_sourcing($emp_code);  		  		
	return  $data['pr_approved_source'];
} 

	//sourcing approved pr
   public function view_pr_source_approved($pr_id)
   {
	    $data['pr_id']=$pr_id;
	   $this->load->helper('url');


		$this->load->view('QCS/pr_sourceing_approved_print',$data);
   }
   
   //Sourcing Approve/reject with ccomment and status
  public function source_update_pr()
   {
	   
	   
      		date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y');
  $date=date('Y-m-d H:i:s');
 $pr_id=$this->input->post('pr_id');
 $pr_state=$this->input->post('pr_state');

 
	  $data = array(
'pr_state' => $this->input->post('pr_state'),
'source_comment' => $this->input->post('source_comment'),

);
	$pr_upd=$this->qcs_model->pr_status_upd($pr_id,$data);
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
  
  
 //PR approver History
$data = array(
			'pr_id'=>$this->input->post('pr_id'),
			'pr_approver_id'=>$this->input->post('approval_id'),
			//'pr_approver_nm'=>$this->input->post('source_nm'),
			'pr_approver_cmt'=>$this->input->post('source_comment'),
			'pr_approver_status'=>$this->input->post('pr_state'),
			'pr_approver_date'=>$date,
	);
	
	$result=$this->qcs_model->approval_his_insert($data);
	
   
  
  $statusdata= array(
'pr_id' => $pr_id,
'status_name' => $status_name,
'pr_by_id' => $this->input->post('pr_by_id'),
'approval_id' => $this->input->post('approval_id'),
'status_date' => $date,
);

$status_upd=$this->qcs_model->pr_status_insert($statusdata);
	 
  
  
  
        $this->load->helper('url');
		$this->load->view('QCS/pending_approval_master');//in_process_master_source 
		
		//$this->load->view('purchase/pr_sourcing_approvelist');
		
		//$this->load->view('QCS/pr_sourcing_approvelist');
   }
   
   
   
      //pR Approval history fetch

     	  function pr_approver_history_id($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_approved_his']=$this->qcs_model->pr_approver_history_id($pr_id);  		  		
	return  $data['pr_approved_his'];
}  


 //fetch ION NO
 	    function fetch_ion_no($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['ion_no']=$this->qcs_model->fetch_ion_no($pr_id);  		  		
	return  $data['ion_no'];
} 


/******************** Informal PO **************/
	//approve informal pO LIst 

public function approved_informal_po_list(){
	$this->load->helper('url');
	$this->load->view('QCS/approved_informal_po_list');
}


function approved_po($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/qcs_model');
	$data['approve_po'] = $this->qcs_model->approved_po($emp_code);
	return $data['approve_po'];
}

//view informal PO
public function view_informal_po($informal_po_id){
	
	$data['informal_po_id']=$informal_po_id;
	$this->load->helper('url');
	$this->load->view('QCS/view_informal_po',$data);
}

	//informal po detail 
	public function informal_po_detail($informal_po_id){
		 $this->load->database();  
		$this->load->model('purchase/Informal_po_model');  	
	$data['po_detail']=$this->Informal_po_model->informal_po_detail($informal_po_id);  		  		
	return  $data['po_detail'];
	}
	
	//qcs item fetch fo PO 
	
		 function qcs_items_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['item_po']=$this->Informal_po_model->qcs_items_po($informal_po_id);  		  		
	return  $data['item_po'];
		  
}
	//technical specification 
	 function qcs_techspec_show_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['qcs_tech']=$this->Informal_po_model->qcs_techspec_show_po($informal_po_id);  		  		
	return  $data['qcs_tech'];
		  
}

//qcs  attachment
  
function filefetchqcs_po($informal_po_id)
{
	
	$this->load->database();  
                 $this->load->model('purchase/Informal_po_model');  
	
 $data['files']=$this->Informal_po_model->filefetch_qcs_po($informal_po_id);  
		  		

 return  $data['files'];
		  
}
		 //pr item list in Informal PO
 	   function list_pr_items_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  
	
		  $data['item']=$this->Informal_po_model->list_pr_items_po($informal_po_id);  
		  		
		return  $data['item'];
		  
}

	//status Date 
	  function fetch_po_status_dt($informal_po_id,$approval_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['status_date']=$this->Informal_po_model->fetch_po_status_dt($informal_po_id,$approval_id);  		  		
	return  $data['status_date'];
}

	   //Approver history
    
 function po_approver_history_id($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approver_history']=$this->Informal_po_model->po_approver_history_id($informal_po_id);  		  		
	return  $data['approver_history'];
		  
}

 //*************  dashboard *******//

//profile pic fetch 
	
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
	}

	
//pending notification 
	public function pending_pr_noti($emp_code){
		$this->load->database();
		$this->load->model('PR/pr_model');
		$data['pendingn'] = $this->qcs_model->pr_approved_ph($emp_code);
		return $data['pendingn'];
		}
		
		
		//qcs count notification 
		
		public function create_qcs_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['qcs_create'] = $this->qcs_model->pr_approved_source($emp_code);
			return $data['qcs_create'];
		}
		
		
		
		//draft notification 
		
		public function draft_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['qcs_create'] = $this->qcs_model->list_qcs_draft($emp_code);
			return $data['qcs_create'];
		}
		
		
		//pending qcs notification
		public function pending_qcs_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['pending_noti'] = $this->qcs_model->list_pending_qcs($emp_code);
			return $data['pending_noti'];
		}
		
		
		
		//rejected Qcs 
		public function rejected_qcs_noti($emp_code){
			$this->load->Database();
			$this->load->model('purchase/qcs_model');
			$data['rej_noti'] = $this->qcs_model->qcs_rejected_list($emp_code);
			return $data['rej_noti'];
		}
		
		//aprove qcs notification 
		public function appove_noti_qcs($emp_code){
			$this->load->Database();
			$this->load->model('purchase/qcs_model');
			$data['approve_noti'] = $this->qcs_model->list_approved_qcs($emp_code);
			return $data['approve_noti'];
		}
		
		
		//profile
		public function emp_profile($emp_code){
			
			$data['emp_code']=$emp_code;
			$this->load->helper('url');
			$this->load->view('QCS/emp_profile',$data); 
			
			
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
		$this->load->view('QCS/qcs_menu');
		}
		
		
		//home page 
		
		public function qcs_menu (){
		     $this->load->helper('url');
        	$this->load->view('QCS/qcs_menu');
		}
		
		
				//pr list item 
		
	   function list_items_pr($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	 $data['item']=$this->qcs_model->list_items_pr($qcs_id);  
	return  $data['item'];
		  
}



//updating file in qcs quotation

 //updating item code method
 public function updateItemCode(){
     
    // echo "testing function update item code.....";
 
	  $this->load->helper('url');
	  $this->load->database();
	 
	$qcs_folder_Name = preg_replace('/\s+/', '', $this->input->post('qcs_folder_Name'));
//	echo "printing folder name as qcs id".$qcs_folder_Name;
//	echo 'in the method of updateItemCode';
//	echo '<br> showing file name here........'.$_FILES['picture']['name']; 
    if(!empty($_FILES['picture']['name'])){
                 echo 'in if condtions......';
		//echo '<br> showing file name in if condition............'.$_FILES['picture']['name']; 
            	
				
	
		//	echo "<br>folderrrrr nm---->".$qcs_folder_Name;
				$config['upload_path'] ='uploads/qcs/'.$qcs_folder_Name.'/';
		//		echo "folder path:-------> ".$config['upload_path'];
			    $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['picture']['name'];
          //       echo 'in if condtion printing '. $config['file_name'] ;
                //  echo 'in if condtion'.$_FILES['picture']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
                $data = array(
				'qcs_file_nm'=>$picture
				);
                $this->db->where('f_qcs_id', $this->input->post('qcs_file_id'));
                $this->db->update('tbl_qcs_file_master', $data);
               
            
           
                 $this->load->helper('url');
                 //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }
        
  
	//QCS AND PO Print view 05 july
		public function printview($informal_po_id){
	
	$data['informal_po_id']=$informal_po_id;
	$this->load->helper('url');
	$this->load->view('QCS/qcs_po_print_view',$data);
	}
        
		
		//PO QCS Detail 05 july
	
			public function informal_po_qcs_detail($informal_po_id)
			{
			$this->load->database();  
			$this->load->model('purchase/qcs_model');  	
			$data['po_qcs_detail']=$this->qcs_model->informal_po_qcs_detail($informal_po_id);  		  		
			return  $data['po_qcs_detail'];
			}
			
			
			
		   //Approver history 05 july
    
 function po_qcs_approver_history_id($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approver_history']=$this->qcs_model->po_qcs_approver_history_id($informal_po_id);  		  		
	return  $data['approver_history'];
		  
}



//Delete quotation file 
		
		public function draftDeleteFile($f_qcs_id)
   {

		$delFileID=$this->input->post('f_qcs_id');
		//echo "file id---->".$delFileID;
			
	   $this->db->where('f_qcs_id',$f_qcs_id);
	   $this->db->delete('tbl_qcs_file_master');
	   
	   $this->load->helper('url');
		   echo '<script>window.history.back();</script>';
   }
   
   
   
   //capex approved list 
		public function capex_approved_list() 
   {
	    $this->load->helper('url');


		$this->load->view('QCS/capex_approved_list');
   }	
	//capex approved list 
	public function capex_approved_record($emp_code){
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['cpx_approved_list']=$this->qcs_model->capex_approved_record($emp_code);  		  		
		return  $data['cpx_approved_list'];
	}
	
	
	//view capex 
		public function view_capex($capex_id){
	$data['capex_id'] = $capex_id;
	$this->load->helper('url');
	$this->load->view('QCS/capex_view',$data);
	}
	
	
		//capex detail fetch 
	public function detail_capex($capex_id){
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  	
		$data['detail_capex']=$this->Capex_model->detail_capex($capex_id);  		  		
		return  $data['detail_capex'];
		
	}
	
	
		
//QCS detail for capex

		public function qcs_detail_for_capex($capex_id){
	
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  
		$data['qcs_detail']=$this->Capex_model->qcs_detail_for_capex($capex_id);  
		return  $data['qcs_detail'];
	
}
	//view qcs item  and ammount 
	   function qcs_items_capex($capex_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	  $data['item_view']=$this->Capex_model->view_qcs_items($capex_id);  
		return  $data['item_view'];
		  
}


//capex_approver_history_id
		
		public function capex_approver_history_id($capex_id){
			$this->load->database();  
			$this->load->model('purchase/Capex_model');  	
			$data['approver_history']=$this->Capex_model->capex_approver_history_id($capex_id);  		  		
			return  $data['approver_history'];
		}
		
		
	//pr item fetch for modal 

 	   function list_pr_items($capex_id)
{
			$this->load->database();  
			$this->load->model('purchase/Capex_model');  
			$data['item']=$this->Capex_model->list_pr_items($capex_id);  
			return  $data['item'];
		  
}	

		//print capex view
		
		public function print_capex_view($capex_id){
			$data['capex_id'] = $capex_id;
			$this->load->helper('url');
			$this->load->view('QCS/print_capex_view',$data);
		}
		
		
		//Qcs approval history  capex
		public function capex_qcs_approver_history_id($capex_id){
			$this->load->database();  
			$this->load->model('purchase/qcs_model');  	
			$data['approver_history']=$this->qcs_model->capex_qcs_approver_history_id($capex_id);  		  		
			return  $data['approver_history'];
		}
		
//approval pending list
public function capx_pending_list (){
	$this->load->helper('url');
	$this->load->view('QCS/capex_app_approval_list');
}

//Approval Approved list
public function capex_approver_list(){
	$this->load->helper('url');
	$this->load->view('QCS/capex_approved_list');
}

//approver 4

public function capex_app_approver4_record($emp_code){
    $this->load->database();
	$this->load->model('purchase/Capex_model');
	$data['approved_list'] = $this->Capex_model->capex_app_approver4_record($emp_code);
	return  $data['approved_list'];
}
				// approval 4  pending list 
		
		public function capex_approval4_pending_list($emp_code)
		{
				$this->load->database();  
				$this->load->model('purchase/Capex_model');  
				$data['pending_list']=$this->Capex_model->capex_approval4_pending_list($emp_code);  
				return  $data['pending_list'];
				

	    }
	    
	    
	    
	    		
		public function approval4_capex($capex_id)
		{
				$data['capex_id'] = $capex_id;
				$this->load->helper('url');
				$this->load->view('QCS/approval4_capex',$data);
	
		}
		//approval4_capex_insert
		
		
		public function approval4_capex_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date=date('Y-m-d H:i:s');
			$capex_id = $this->input->post('capex_no');
			$capex_status = $this->input->post('capex_state');
			
			  $data = array(
			
'capex_status' => $this->input->post('capex_state'),
'capex_approval4_cmt' => $this->input->post('capex_comment'),


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
	  
			//$reciver = $this->input->post('capex_emp_email'); //to
			//$ccuser= $this->input->post('qcs_email'); // cc
				$reciver = 'ppshroff@ruchagroup.com'; //to
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
			<li>Status Changed to: Capex Process Completed...!! </li>
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
			<li><b>Selected Supplier:</b>  '.$this->input->post('capex_supllier'). '</li>
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


//fetch approval5 id
		
		function fetch_sourcing_approval5($approval5)
		{
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['approval_level5']=$this->qcs_model->fetch_sourcing_approval5($approval5);
			return $data;
		}
   

   //QCS approval_5 sourcing MDO list display 
 function list_mdo_approval1($emp_code)
{
    
    
    if($emp_code=="100098"){
        
        $this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_mdo_approval1($emp_code);  		  		
	return  $data['approval1_list'];
	
    }else{
        
         $this->list_cfo_approval1($emp_code);     //20 Aug 2019
         
       /* $this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_cfo_approval1($emp_code);  		  		
	return  $data['approval1_list'];*/
        
    }
	
	
		  
}

//MDO view page 
   public function mdo_approval($qcs_id)
   {
	    $data['qcs_id']=$qcs_id;
	   $this->load->helper('url');


		$this->load->view('QCS/mdo_approval',$data);
   }

   
   
//approval 5 Approve/reject with comment mdo_approval

public function approve_mdo()
{
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$pr_id = $this->input->post('pr_id');
		$qcs_num=$this->input->post('qcs_num');
		$qcs_status=$this->input->post('qcs_state');
		$pr_type_id = $this->input->post('pr_type_id');
	//echo "typt....".$pr_type_id;
if($pr_type_id != '13')	
{
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level5_comment' => $this->input->post('mdo_app_cmt'),
'approval5_date' =>$date,
);
$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);
}
else
{
	
		  $data = array(
'qcs_status' => $this->input->post('qcs_state'),
'approval_level3_comment' => $this->input->post('mdo_app_cmt'),
'approval3_date' =>$date,
);
$qcs_upd=$this->qcs_model->qcs_status_sourcing_mgr($qcs_num,$data);	
}
	
 //end
 
 //approval history 
 	$datahistory = array(
		'qcs_id'=> $this->input->post('qcs_num'),
		'pr_id' =>$this->input->post('pr_id'),
		'approval_emp_code'=>$this->input->post('sourcing_approval5'),
		'approval_comment' =>$this->input->post('mdo_app_cmt'),
		'approver_status' =>$this->input->post('qcs_state'),
		'approval_date'=>$date,
 );
$approver_upd=$this->qcs_model->qcs_approver_history($datahistory);
//end


  $row = $this->db->query('SELECT * FROM `qcs_master` where qcs_id='.$qcs_num.'')->row();
if ($row) {
	
	$qcs_date=$row->qcs_date;
	$qcs_owner_nm=$row->qcs_owner;
	$pr_code=$row->plant_code;
	$selected_supplier=$row->selected_supplier;
	$justification_supplier=$row->justification_supplier;
	
  }
  
   if($qcs_status == "QCS_Approved"){
	  $status_name = "55";
	  
		$reciver=$this->input->post('pr_owner_email');//pr owner
 		$ccuser=$this->input->post('qcs_ow_email'); //qcs owner
		$ccuser1='repl@ruchagroup.com';
	
		
	
 		
		 $subject='QCS No '.$qcs_num.' Approved By MD Office '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
		<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>PR Date:</b>  '.$this->input->post('pr_date_email').'</li>
	<li><b>PR Owner:</b>  '.$this->input->post('prOwnerName').'</li>
	<li><b>Requirement Justification :</b>  '.$this->input->post('pr_prpcRes').'</li>
		
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>

	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
	<li><b>Selected Supplier Final Ammount:</b>  '.$this->input->post('sup1FinalAmt').'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('mdo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to: </b>  Approved By MD Office & Qcs Process is Completed BY  '.$this->input->post('qcs_emp_nm').'  </li>

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
      $this->email->cc($ccuser);
	 $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	  }
	  
	  if($qcs_status == "QCS_Reject"){
	  $status_name = "56";
	  
	  $reciver=$this->input->post('pr_owner_email');//pr owner
 	    $ccuser=$this->input->post('qcs_ow_email'); //qcs owner
		$ccuser1='repl@ruchagroup.com';
		
 		
		 $subject='QCS No '.$qcs_num.' Rejected By MD Office '.$this->input->post('qcs_emp_nm').'  ';
		

		   $message='<ol>
	
		
			<li><b>Plant:</b>  '.$pr_code. '</li>
	<li><b>PR No:</b>  '.$pr_id.'</li>
	<li><b>PR Date:</b>  '.$this->input->post('pr_date_email').'</li>
	<li><b>PR Owner:</b>  '.$this->input->post('prOwnerName').'</li>
	<li><b>Requirement Justification :</b>  '.$this->input->post('pr_prpcRes').'</li>
		
	<li><b>QCS No:</b>  '.$qcs_num.'</li>
	<li><b>QCS Date:</b>  '.$qcs_date. '</li>

	<li><b>QCS Owner Name:</b>  '.$qcs_owner_nm. '</li>
	<li><b>Selected Supplier:</b>  '.$selected_supplier.'</li>
		<li><b>Selected Supplier Final Ammount:</b>  '.$this->input->post('sup1FinalAmt').'</li>
	<li><b>Justification QCS:</b>  '.$justification_supplier.'</li>
	<li><b>Approval Comment:</b>  '.$this->input->post('mdo_app_cmt').'</li>
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li><b>Status Changed to: </b>  Rejected By MD Office    '.$this->input->post('qcs_emp_nm').'  </li>
		
	
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
     $this->email->cc($ccuser);
	  $this->email->bcc($ccuser1);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	
	  }
	
	  $statusdata= array(
'qcs_id' =>$qcs_num,
'pr_id' => $pr_id,
'qcs_status_name' =>$status_name,
'qcs_owner_id' =>$this->input->post('qcs_emp_code'),
'qcs_approval_id' =>$this->input->post('sourcing_approval5'),
'qcs_status_date' => $date,
);


$status_upd=$this->qcs_model->qcs_status_insert($statusdata);

$this->load->helper('url');
$this->load->view('QCS/sourcing_head_approve_list');
}  

//Approve by mdo office

function approved_list_by_mdo($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/qcs_model');
	$data['approve_mdo'] = $this->qcs_model->approved_list_by_mdo($emp_code);
	return $data['approve_mdo'];
}

//check last status date
 function checkApprovalMaxDate($qcs_id) {
        $this->load->database();
        $this->load->model('purchase/qcs_model');
        $data['qcs_status_name'] = $this->qcs_model->checkApprovalMaxDate($qcs_id);
        return $data;
    }
    
    //shows all approved by pr sourcing  2020-1-15
    public function approved_by_sourcing_list()
   {
       
        $this->load->helper('url');


		$this->load->view('QCS/list_sourcingapproveinPR');
   }
   
   
   	  function approved_by_Sourcing($emp_code)//2020-12-01 ganesh 
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approved_by_sourcing']=$this->qcs_model->approved_by_sourcing($emp_code);  		  		
	return  $data['approved_by_sourcing'];
}   


    public function prview($pr_id)
   {
        $data['pr_id']=$pr_id;

        $this->load->helper('url');


		$this->load->view('QCS/view_pr',$data);
   }

	
	//end
//item code fetch  in add new item
/*	   function list_items_pr($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	
		  $data['item']=$this->pr_model->pr_item_list_qcs($emp_code);  
	
		return  $data['item'];
		  
}*/

//INTERPLANT FTGS PR MENU COUNT

			//count pending ftgs pr sourcing 
			public function pendingFtgsPR($emp_code)
			{
				$this->load->database();
				$this->load->model('purchase/qcs_model');
				$data['pending_noti'] = $this->qcs_model->pendingFtgsPR($emp_code);
				return $data['pending_noti'];
			}
			
			//count pending ftgs pr sourcing 
			public function pendingFtgsPRLevel5($emp_code)
			{
				$this->load->database();
				$this->load->model('purchase/qcs_model');
				$data['pending_noti'] = $this->qcs_model->pendingFtgsPRLevel5($emp_code);
				return $data['pending_noti'];
			}
			
			//count Reject ftgs pr sourcing 
			public function rejectFtgsPR($emp_code)
			{
				$this->load->database();
				$this->load->model('purchase/qcs_model');
				$data['reject_noti'] = $this->qcs_model->rejectFtgsPR($emp_code);
				return $data['reject_noti'];
			}
			//count Approved ftgs pr sourcing 
			public function approveFtgsPR($emp_code)
			{
				$this->load->database();
				$this->load->model('purchase/qcs_model');
				$data['approved_noti'] = $this->qcs_model->approveFtgsPR($emp_code);
				return $data['approved_noti'];
			}
			
			
			
			  function supplierList() {
      
         $this->load->database();
        $this->load->model('purchase/qcs_model');
        $data['qcs_id'] = $this->qcs_model->supplierOne();
          
   //print_r($data);
   return  $data['qcs_id'];
	
        
    }
    
    function selectSuplier1(){
		$this->load->helper('url');
        $this->load->database();
		$qcs_id = $this->input->post('qcs_id');
		$this->load->model('purchase/qcs_model');
		$data = $this->qcs_model->selectSuplier1($qcs_id);
        echo json_encode($data);
		
}


   public function viewQCSDraftPrint($qcs_id)//Print draft qcs view 09/03/2020
   {
       $data['qcs_id'] = $qcs_id;
        $this->load->helper('url');
		$this->load->view('QCS/viewQCSDraftPrint',$data);
   }

}//eof 
