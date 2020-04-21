<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgmt_ctr extends CI_Controller {

	
	 
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
$this->load->model('purchase/Itemcode_model');
$this->load->model('purchase/Informal_po_model');
$this->load->model('purchase/Mgmt_model');
$this->load->model('purchase/qcs_model');
$this->load->model('purchase/Capex_model');
}
	
###########navigation##############
	public function home()
   {
      
        $this->load->helper('url');


		$this->load->view('mgmt_view/Mds_menu');
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
	  
	  
	// ************* Management code *****************************//
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
	}
	
//PR list

public function pr_list(){
	$this->load->helper('url');
	$this->load->view('mgmt_view/pr_list');
}	


//Pr list count 
public function list_pr_count(){
	$this->load->database();  
    $this->load->model('purchase/Mgmt_model');  	
	$data['pr_master_list']=$this->Mgmt_model->list_pr_count();  		  		
	return  $data['pr_master_list'];
}
//view PR load

	public function view_pr($pr_id)
   {
       $data['pr_id']=$pr_id;
		$this->load->helper('url');
		$this->load->view('mgmt_view/view_pr',$data);
   }

//Full pr detail for draft and detail PR 
	   function pr_detail($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_detail']=$this->pr_model->pr_detail($pr_id);  		  		
	return  $data['pr_detail'];
		  
} 


	   function fetch_pr_type_nm($pt_id)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pt_name']=$this->pr_model->fetch_pr_type_nm($pt_id);  		  		
	return  $data;
}

	   function fetch_dept_nm($emp_dept)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['dept_name']=$this->pr_model->fetch_dept_nm($emp_dept);  		  		
	return  $data;
} 


	   function list_items($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	  $data['item']=$this->pr_model->pr_item_list($emp_code);  
		return  $data['item'];
		  
} 
		  
//pR Approval history fetch

     	  function pr_approver_history_id($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['pr_approved_his']=$this->pr_model->pr_approver_history_id($pr_id);  		  		
	return  $data['pr_approved_his'];
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


	   function fetch_ph_id($del_loc)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['ph_id']=$this->pr_model->fetch_ph_id($del_loc);  		  		
	return  $data;
} 


//qcs list 
public function qcs_list(){
	$this->load->helper('url');
	$this->load->view('mgmt_view/qcs_list');
}

public function qcs_list_count(){
	$this->load->database();  
    $this->load->model('purchase/Mgmt_model');  	
	$data['qcs_master_list']=$this->Mgmt_model->qcs_list_count();  		  		
	return  $data['qcs_master_list'];
}

//view QCS 
public function qcs_view($qcs_id){
	$data['qcs_id'] = $qcs_id;
	$this->load->helper('url');
	$this->load->view('mgmt_view/view_qcs',$data);
	
}
//Full qcs detail for draft and detail QCS  	   
	   function qcs_detail($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_detail']=$this->qcs_model->qcs_detail($qcs_id);  		  		
	return  $data['qcs_detail'];
		  
}

//Full pr type name fetch

 function fetch_prtype_nm($pt_id)
		{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['pt_name']=$this->qcs_model->fetch_pr_type_nm($pt_id);  		  		
		return  $data;
		}
		
		
		 //fetch ION NO
 	    function fetch_ion_no($pr_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['ion_no']=$this->qcs_model->fetch_ion_no($pr_id);  		  		
	return  $data['ion_no'];
} 


//view qcs item in step 2 page 
	   function view_qcs_items($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_view']=$this->qcs_model->view_qcs_items($qcs_id);  
		return  $data['item_view'];
		  
}

// item code name display from pr_item table 
	   function fetch_item_nm($item_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['item_code']=$this->qcs_model->fetch_item_nm($item_code);  		  		
	return  $data;
}

   //QCS draft technical specificatio display 
 function qcs_techspec_show($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_tech']=$this->qcs_model->qcs_techspec_show($qcs_id);  		  		
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


// approval1 sourcing mgr status fetch with date
	  function fetch_status_sourcing_mgr($qcs_id,$approval_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_status_date']=$this->qcs_model->fetch_status_sourcing_mgr($qcs_id,$approval_id);  		  		
	return  $data['qcs_status_date'];
}


   //Approver history
    
 function qcs_approver_history_id($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approver_history']=$this->qcs_model->qcs_approver_history_id($qcs_id);  		  		
	return  $data['approver_history'];
		  
}



//fetch approval1_qcs id 
	   function fetch_sourcing_approval1($approval1)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval_level1']=$this->qcs_model->fetch_sourcing_approval1($approval1);  		  		
	return  $data;
}



//************************** Informal PO ******************************//
//po list

public function informal_po_list(){
	$this->load->helper('url');
	$this->load->view('mgmt_view/Info_po_list');
} 

public function info_po_list_count(){
	$this->load->database();  
    $this->load->model('purchase/Mgmt_model');  	
	$data['qcs_master_list']=$this->Mgmt_model->info_po_list_count();  		  		
	return  $data['qcs_master_list'];
}

 //view PO
public function view_informal_po($informal_po_id){
	$data['informal_po_id'] = $informal_po_id;
	$this->load->helper('url');
	$this->load->view('mgmt_view/view_informal_po',$data);
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


   //Approver history
    
 function po_approver_history_id($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approver_history']=$this->Informal_po_model->po_approver_history_id($informal_po_id);  		  		
	return  $data['approver_history'];
		  
}


//qcs  attachment
  
function filefetchqcs_po($informal_po_id)
{
	
	$this->load->database();  
   $this->load->model('purchase/Informal_po_model');  
	$data['files']=$this->Informal_po_model->filefetch_qcs_po($informal_po_id);  
	return  $data['files'];
		  
}


	//status Date 
	  function fetch_po_status_dt($informal_po_id,$approval_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['status_date']=$this->Informal_po_model->fetch_po_status_dt($informal_po_id,$approval_id);  		  		
	return  $data['status_date'];
} 


	 //pr item list in Informal PO
 	   function list_pr_items_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  
	
		  $data['item']=$this->Informal_po_model->list_pr_items_po($informal_po_id);  
		  		
		return  $data['item'];
		  
}


//***********************  Itemcode_model ************************//
public function itemcode_list(){
	$this->load->helper('url');
	$this->load->view('mgmt_view/itemcode_list');
}

//list count 

public function itemcode_list_count(){
	$this->load->database();  
    $this->load->model('purchase/Mgmt_model');  	
	$data['itemcode_list']=$this->Mgmt_model->itemcode_list_count();  		  		
	return  $data['itemcode_list'];
}

//view itemcode_list
public function view_itemcode($iten_gen_id){
	$data['iten_gen_id'] = $iten_gen_id;
	$this->load->helper('url');
	$this->load->view('mgmt_view/view_itemcode',$data);
	
}
 
 
  //item attachment file 
 public function itemcode_file($iten_gen_id){
		$this->load->database();  
		$this->load->model('purchase/Itemcode_model');  	
		$data['itemcode_attachment']=$this->Itemcode_model->itemcode_file($iten_gen_id);  		  		
		return  $data['itemcode_attachment'];
 }
 
 //fetch item code list for item id qcs_itemcode

function qcs_itemcode_itemid($iten_gen_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['qcs_itemcode']=$this->Itemcode_model->qcs_itemcode_itemid($iten_gen_id);  		  		
	return  $data['qcs_itemcode'];
		  
}

//qcs item list in itemcode page 
	
	public function qcs_items_list($iten_gen_id){
		$this->load->database();  
		$this->load->model('purchase/Itemcode_model');  
		$data['item']=$this->Itemcode_model->qcs_items_list($iten_gen_id);  
		return  $data['item'];
	}
	
	
	 //pr item list in item code gen page
 	   function list_pr_items($iten_gen_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  
	
		  $data['item']=$this->Itemcode_model->list_pr_items($iten_gen_id);  
		  		
		return  $data['item'];
		  
}





// capex 30/07/2019


public function capex_list()
{
	$this->load->helper('url');
	$this->load->view('mgmt_view/capex_list');
}



public function capex_list_count(){
	$this->load->database();
	$this->load->model('purchase/Mgmt_model');
	$data['item']=$this->Mgmt_model->capex_list_count();  
	return  $data['item'];
}


public function capex_view($capex_id)
{
	$data['capex_id'] = $capex_id;
	$this->load->helper('url');
	$this->load->view('mgmt_view/capex_view',$data);
	
}


	//capex detail fetch 
	public function detail_capex($capex_id){
		$this->load->database();  
		$this->load->model('purchase/Capex_model');  	
		$data['detail_capex']=$this->Capex_model->detail_capex($capex_id);  		  		
		return  $data['detail_capex'];
		
	}
	
	
	
//QCS detail for capex

		public function qcs_detail_for_capex($capex_id)
		{
	
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

 	   function list_pr_items_capex($capex_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Capex_model');  
	
		  $data['item']=$this->Capex_model->list_pr_items($capex_id);  
		  		
		return  $data['item'];
		  
}

//PR Reports 

public function purchaseReport()
{
	
	$this->load->helper('url');
	$this->load->view('mgmt_view/PrReport_menu');
}

public function PrReport_menu()
{
		$this->load->helper('url');
	$this->load->view('mgmt_view/PrReport_menu');
}
//Pending PR List 
public function pendingPRList()
{
	$this->load->helper('url');
	$this->load->view('mgmt_view/pendingPRList');
}


	//PendingPR_List 
		
		public function PendingPR_List(){
			$this->load->database();  
			 $this->load->model('purchase/Mgmt_model');  	
			$data['pr_master_list']=$this->Mgmt_model->PendingPR_List();  			  		
			return  $data['pr_master_list'];
		}
		
		
		
//Full pr type name fetch

 function fetchprtype_nm($pt_id)
		{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['pt_name']=$this->qcs_model->fetch_pr_type_nm($pt_id);  		  		
		return  $data['pt_name'];
		}

//QCS Report list 
public function QCSReportList()
{
		$this->load->helper('url');
		$this->load->view('mgmt_view/QCSReportList');
}

	//QcsReportList 
		
		public function QcsReport_List(){
			$this->load->database();  
			 $this->load->model('purchase/Mgmt_model');  	
			$data['QCS_master_list']=$this->Mgmt_model->QcsReport_List();  			  		
			return  $data['QCS_master_list'];
		}
		
			
//mds menu list
public function mds_menus(){
	$this->load->helper('url');
	$this->load->view('mgmt_view/pr_menus');
}
		
	
}        //eof  
