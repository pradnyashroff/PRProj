<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informal_po extends CI_Controller {

	
	 
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
$this->load->model('purchase/Informal_po_model');
$this->load->model('purchase/pr_model');
$this->load->model('purchase/Capex_model');
}
	
###########navigation##############
	public function index()
   {
      
        $this->load->helper('url');


		$this->load->view('informal_po/informal_po_menu');
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
	    function fetch_emp_email($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetch_dh_email($emp_code);  		  		
	return  $data['emp_email'];
}



//Informal_PO start  03 april

 	public function informal_po_menu()
   {
      
        $this->load->helper('url');


		$this->load->view('informal_po/informal_po_menu');
   }
		
//pending PO list after qcs approved process  
		public function po_pending_list(){
			$this->load->helper('url');
			$this->load->view('informal_po/qcs_list_in_po_gen');
		}


//coo_approved for PO generation
public function qcs_approved_polist($emp_code){
		$this->load->database();
		$this->load->model('purchase/Informal_po_model');
		$data['po_list']=$this->Informal_po_model->qcs_approved_polist($emp_code);
		return $data['po_list'];
		
		
}
 
 //PO_creation 
 public function create_po($qcs_id){
	 $data['qcs_id'] =$qcs_id;
	 $this->load->helper('url');
	 $this->load->view('informal_po/create_po',$data);
 }
 
 
 //qcs detail for PO 
 public function qcs_po_detail($qcs_id){
	 $this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['po_detail']=$this->Informal_po_model->qcs_detail_po($qcs_id);  		  		
	return  $data['po_detail'];
	 
 }
 
 //quotation attachemet file  fetch based on qcs_id
 
function filefetchqcs($qcs_id)
{
	
	$this->load->database();  
                 $this->load->model('purchase/qcs_model');  
	
 $data['files']=$this->qcs_model->filefetch_qcs($qcs_id);  
		  		

 return  $data['files'];
		  
}

   //QCS  technical specificatio display 
 function qcs_techspec_show($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['qcs_tech']=$this->qcs_model->qcs_techspec_show($qcs_id);  		  		
	return  $data['qcs_tech'];
		  
}


//view qcs item in Inforaml PO
	   function view_qcs_items($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_view']=$this->qcs_model->view_qcs_items($qcs_id);  
		return  $data['item_view'];
		  
}



//Full Department name from dept_master
	   function fetch_dept_nm($emp_dept)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['dept_name']=$this->qcs_model->fetch_dept_nm($emp_dept);  		  		
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
		
		 //pr item list in Informal PO
 	   function list_pr_items($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  
	
		  $data['item']=$this->Informal_po_model->list_pr_items($qcs_id);  
		  		
		return  $data['item'];
		  
}


//insert_po

public function insert_po()
{
	 date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$qcs_id =$this->input->post('po_qcs_no'); 
		
		$data_insert = array(
			'pr_id'=>$this->input->post('po_pr_no'),
			'qcs_id'=>$this->input->post('po_qcs_no'),
			'informal_po_empcode'=>$this->input->post('po_pr_empcode'),
			'informal_po_date'=>$date,
			'po_approval_level1'=>$this->input->post('po_app_lev1'),
			//'po_approval_level2'=>$this->input->post('po_app_lev2'),
			'informal_po_status'=>$this->input->post('info_po_status'),
			'informal_po_attachment' =>preg_replace('/\s+/', '_', $_FILES['informal_po_attachment']['name']),
		
			'just_informal_po'=>$this->input->post('justi_info_po'),
		);
		
		$result=$this->Informal_po_model->insert_po($data_insert);
		
	
		
		$row = $this->db->query('SELECT MAX(informal_po_id) AS `maxid` FROM `tbl_informal_po`')->row();
if ($row) {
	$po_gen_id=$row->maxid;
	$po_id=$row->maxid+1;
  }
  
  	        $reciver=$this->input->post('po_app_lev1_email');// approval1
 		   //$ccuser=$this->input->post('po_owner_eid'); //pr owner
 		   
	
		 $subject='New Informal PO Created By User '.$this->input->post('po_pr_owner').'  ';
		

		   $message='<ol>
		    <li><b>Informal PO NO:</b>  '.$po_gen_id.'</li>
		   <li><b>Informal PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
        	<li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	        <li><b>Department:</b>  '.$this->input->post('pr_dept_nm').'</li>
            <li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
            <li><b>Justification For Inforaml PO:</b>  '.$this->input->post('justi_info_po').'</li>
	
	
	<li><b>Creation Date:</b>  '.$date.'</li>
	<li><b>Status:</b>  Informal PO Created And Pending for Approval </li>
	
</ol>

   Kindly visit your Purchase panel(https://www.rucha.co.in/portal/)';
		
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
     
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    
    
    //informal_po_attachment attachment 	
 if (!empty($_FILES['informal_po_attachment']['name'])) {//single file upload 
                chmod('./uploads/informal_po_attachment/', 0777);
$path   = './uploads/informal_po_attachment/';
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
if($this->upload->do_upload('informal_po_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
  //end
 
 
 
 
  $info_po_gen_up = array(
	
	'infomal_po_gen' =>$po_gen_id,
  );
 $qcs_upd_po_gen=$this->Informal_po_model->po_gen_up($qcs_id,$info_po_gen_up);
  
  ?>

  <?php
		$this->load->helper('url');

		$this->load->view('informal_po/qcs_list_in_po_gen');
}


// informal_po_approval list  page load

public function informal_po_approval(){
	$this->load->helper('url');
	$this->load->view('informal_po/informal_po_approval_list');
}

	public function informal_po_approval1($emp_code){
		
		$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approval1_list']=$this->Informal_po_model->informal_po_approval1($emp_code);  		  		
	return  $data['approval1_list'];
	}
	
	//approval  level1 page load
	public function approval_level1($informal_po_id){
		$data['informal_po_id']=$informal_po_id;
		$this->load->helper('url');
		$this->load->view('informal_po/approval1_informal_po',$data);
		
	}
	
	
	//informal po detail 
	public function informal_po_detail($informal_po_id){
		 $this->load->database();  
		$this->load->model('purchase/Informal_po_model');  	
	$data['po_detail']=$this->Informal_po_model->informal_po_detail($informal_po_id);  		  		
	return  $data['po_detail'];
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

//qcs item fetch fo PO 
	
		 function qcs_items_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['item_po']=$this->Informal_po_model->qcs_items_po($informal_po_id);  		  		
	return  $data['item_po'];
		  
}
	
		 //pr item list in Informal PO
 	   function list_pr_items_po($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  
	
		  $data['item']=$this->Informal_po_model->list_pr_items_po($informal_po_id);  
		  		
		return  $data['item'];
		  
}

//approval 1 PO status and data update 
public function approval1_po(){
	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$info_po = $this->input->post('po_no');
		$info_po_status=$this->input->post('info_po_state');
		$login_unm= $this->input->post('login_unm');
		$emp_code = $this->input->post('login_emp_code');
		
		$data = array(
'informal_po_status' => $this->input->post('info_po_state'),
'po_approval_level1_cmt' => $this->input->post('po_approver_cmt'),

);
	$info_upd=$this->Informal_po_model->approval1_po($info_po,$data);
	
	
	//approver history
$datahistory = array(
		'informal_po_id'=> $this->input->post('po_no'),
		'qcs_id' =>$this->input->post('po_qcs_no'),
		'po_approval_emp_code'=>$this->input->post('po_approval1_emp'),
		'po_approval_comment' =>$this->input->post('po_approver_cmt'),
		'po_approver_status' =>$this->input->post('info_po_state'),
		'po_approval_date'=>$date,
 );
$approver_upd=$this->Informal_po_model->po_approver_history($datahistory);



	
	
	  if($info_po_status == "PO_Approved"){
	  $status_name = "11";
	  
	  
 	    $reciver=$this->input->post('po_owner_eid');//pr owner 
 		
 		//	$ccuser='ppshroff@ruchagroup.com';//pr owner 
	
		 $subject='Informal PO NO '.$info_po.' Approved BY '.$login_unm.'  ';
		

		   $message='<ol>
		    <li><b>Informal PO NO:</b>  '.$info_po.'</li>
		   <li><b>Informal PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
		   	<li><b>Creation Date:</b>  '.$this->input->post('po_date').'</li>
	        <li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	        <li><b>Department:</b>  '.$this->input->post('pr_dept_nm').'</li>
	
	        <li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
	         <li><b>Justification Of Informal PO:</b>  '.$this->input->post('just_informalpo').'</li>
	    	<li><b>Approve Date:</b>  '.$date.'</li>
	    		<li><b>Approver Comment:</b>  '.$this->input->post('po_approver_cmt').'</li>
	    		<li><b>Status Change To:</b> Informal PO Completed Successfully...!! </li>
	
</ol>

   Kindly visit your Purchase panel (https://www.rucha.co.in/portal)';
		
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
     
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	  }
	  
	  if($info_po_status == "PO_Reject"){
		  $status_name = "12"; 
		  
	
 		$reciver=$this->input->post('po_owner_eid');//pr owner 

		 $subject='Informal PO NO '.$info_po.' Rejected BY '.$login_unm.'  ';
		

		   $message='<ol>
		    <li><b>Informal PO NO:</b>  '.$info_po.'</li>
		   <li><b>Informal PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
		   	<li><b>Creation Date:</b>  '.$this->input->post('po_date').'</li>
	        <li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	        <li><b>Department:</b>  '.$this->input->post('pr_dept_nm').'</li>
	
	        <li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
	         <li><b>Justification Of Informal PO:</b>  '.$this->input->post('just_informalpo').'</li>
	    	<li><b>Approve Date:</b>  '.$date.'</li>
	    	<li><b>Approver Comment:</b>  '.$this->input->post('po_approver_cmt').'</li>
	    	<li><b>Status Change To:</b> Informal PO Rejected BY '.$login_unm.'  </li>
	
</ol>

   Kindly visit your Purchase panel (https://www.rucha.co.in/portal)';
		
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
'informal_po_id' =>$info_po,

'ipo_status_name' =>$status_name,
'ipr_owner_id' =>$this->input->post('po_empcode'),
'ipo_approval_id' =>$this->input->post('po_approval1_emp'),
'ipo_date' => $date,
);


$status_upd=$this->Informal_po_model->info_po_status_insert($statusdata);

	
	$this->load->helper('url');
	//$this->load->view('informal_po/informal_po_approval_list');
	
	$this->load->helper('url');
	
	
		 	//$this->load->view('informal_po/informal_po_approval_list');
	

		$this->load->view('QCS/approved_informal_po_list');
		

}	


	
	//view approval 2 page 
	public function approval_level2($informal_po_id){
		$data['informal_po_id'] =$informal_po_id;
		$this->load->helper('url');
		$this->load->view('informal_po/approval2_informal_po',$data);
		
		
	}
	
	//status Date 
	  function fetch_po_status_dt($informal_po_id,$approval_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['status_date']=$this->Informal_po_model->fetch_po_status_dt($informal_po_id,$approval_id);  		  		
	return  $data['status_date'];
} 

//Rejected list

	public function po_rejected_list(){
		$this->load->helper('url');
		$this->load->view('informal_po/informal_po_rejected_list');
	}
	
	public function informal_po_rejectlist($emp_code){
		$this->load->database();
		$this->load->model('purchase/Informal_po_model');
		$data['$rejectlist'] = $this->Informal_po_model->informal_po_rejectlist($emp_code);
		return $data['$rejectlist'];
	}
	
	//reject informal po view 	
	
	public function reject_view($informal_po_id){
		$data['informal_po_id']=$informal_po_id;
		$this->load->helper('url');
		$this->load->view('informal_po/reject_view_informal_po',$data);
		
	}
	//Approval level 2
/*	public function approval2_po(){
		date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$info_po = $this->input->post('po_no');
		$info_po_status=$this->input->post('info_po_state');
		
		$data = array(
'informal_po_status' => $this->input->post('info_po_state'),
'po_approval_level2_cmt' => $this->input->post('po_approver_cmt'),

);
	$info_upd=$this->Informal_po_model->approval2_po($info_po,$data);
	
	  if($info_po_status == "PO_Approved"){
	  $status_name = "11";
	  
	  	$reciver=$this->input->post('qcs_eid');//QCS owner
    	$ccuser=$this->input->post('po_owner_eid');//pr owner 
	
		 $subject='Informal PO NO '.$info_po.' Approved BY MDO ';
		

		   $message='<ol>
		    <li><b>Inforaml PO NO:</b>  '.$info_po.'</li>
		   <li><b>Inforaml PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
		   	<li><b>Creation Date:</b>  '.$this->input->post('po_date').'</li>
	        <li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	        <li><b>Department:</b>  '.$this->input->post('pr_dept_nm').'</li>
	
	        <li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
	           <li><b>Approver Comment:</b>  '.$this->input->post('po_approver_cmt').'</li>
	    	<li><b>Approve Date:</b>  '.$date.'</li>
	    		<li><b>Status Change To:</b> Informal PO Completed Successfully...!! </li>
	
</ol>

   Kindly visit your Purchase panel (https://www.rucha.co.in/portal)';
		
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
	  
	  if($info_po_status == "PO_Reject"){
		  $status_name = "12"; 
		  
		  	$reciver=$this->input->post('qcs_eid');//QCS owner
    	$ccuser=$this->input->post('po_owner_eid');//pr owner 
    	
		 $subject='Informal PO NO '.$info_po.' Rejected BY MDO ';
		

		   $message='<ol>
		    <li><b>Inforaml PO NO:</b>  '.$info_po.'</li>
		   <li><b>Inforaml PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
		   	<li><b>Creation Date:</b>  '.$this->input->post('po_date').'</li>
	        <li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	        <li><b>Department:</b>  '.$this->input->post('pr_dept_nm').'</li>
	
	        <li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
	          <li><b>Approver Comment:</b>  '.$this->input->post('po_approver_cmt').'</li>
	    	<li><b>Approve Date:</b>  '.$date.'</li>
		<li><b>Status Change To:</b> Informal PO Rejected  </li>
</ol>

   Kindly visit your Purchase panel (https://www.rucha.co.in/portal)';
		
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
'informal_po_id' =>$info_po,

'ipo_status_name' =>$status_name,
'ipr_owner_id' =>$this->input->post('po_empcode'),
'ipo_approval_id' =>$this->input->post('po_approval2_emp'),
'ipo_date' => $date,
);


$status_upd=$this->Informal_po_model->info_po_status_insert($statusdata);

//approver history
$datahistory = array(
		'informal_po_id'=> $this->input->post('po_no'),
		'qcs_id' =>$this->input->post('po_qcs_no'),
		'po_approval_emp_code'=>$this->input->post('po_approval2_emp'),
		'po_approval_comment' =>$this->input->post('po_approver_cmt'),
		'po_approver_status' =>$this->input->post('info_po_state'),
		'po_approval_date'=>$date,
 );
$approver_upd=$this->Informal_po_model->po_approver_history($datahistory);

	
	
	$this->load->helper('url');
	$this->load->view('informal_po/informal_po_approval_list');
	}*/
	
	
   //Approver history
    
 function po_approver_history_id($informal_po_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approver_history']=$this->Informal_po_model->po_approver_history_id($informal_po_id);  		  		
	return  $data['approver_history'];
		  
}	
//rejected po forword to creted 


//rejected po forword to creted 


public function reject_draft_po()
{
	 date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		
		$informal_po_no = $this->input->post('po_no');
		$attachment_flag = preg_replace('/\s+/', '_', $_FILES['informal_po_attachment']['name']);//input type file name
		$attachment_check =$this->input->post('attachment_check');// text box name
		$nullFlag ="";//Null file
		
		
		//informal_po_attachment attachment 	
 if (!empty($_FILES['informal_po_attachment']['name'])) {//single file upload 
                chmod('./uploads/informal_po_attachment/', 0777);
$path   = './uploads/informal_po_attachment/';
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
if($this->upload->do_upload('informal_po_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
				
				
            } 
			
			
  //end
		
		
		
if($attachment_flag =="" && $attachment_check  ==""){
	
  $data_up = array(
			'informal_po_status'=>$this->input->post('info_po_status'),
			//'informal_po_attachment' =>preg_replace('/\s+/', '_', $_FILES['informal_po_attachment']['name']),
			'informal_po_attachment' =>$nullFlag,
			'just_informal_po'=>$this->input->post('draft_justi_info_po'),
	);				 
	
 }
 
elseif($attachment_flag == $attachment_check){
	
	$data_up = array(
			'informal_po_status'=>$this->input->post('info_po_status'),
			//'informal_po_attachment' =>preg_replace('/\s+/', '_', $_FILES['informal_po_attachment']['name']),
			'informal_po_attachment' =>$attachment_check,
			'just_informal_po'=>$this->input->post('draft_justi_info_po'),
	);
	
} 
elseif(empty($attachment_flag)){
	$data_up = array(
			'informal_po_status'=>$this->input->post('info_po_status'),
			'informal_po_attachment' =>$attachment_check,
			//'informal_po_attachment' =>$attachment_check,
			'just_informal_po'=>$this->input->post('draft_justi_info_po'),
	);
	
}

elseif($attachment_flag !== $attachment_check){
	$data_up = array(
			'informal_po_status'=>$this->input->post('info_po_status'),
			'informal_po_attachment' =>preg_replace('/\s+/', '_', $_FILES['informal_po_attachment']['name']),
			//'informal_po_attachment' =>$attachment_check,
			'just_informal_po'=>$this->input->post('draft_justi_info_po'),
	);
	
	
}

 
   $data_up = $this->Informal_po_model->reject_draft_po($informal_po_no ,$data_up);
   
   
 
		$reciver=$this->input->post('po_app_lev1_email');//approval 1
	       // $reciver='ppshroff@ruchagroup.com';//approval 1
 	

		 $subject=' Informal PO Resubmitted By  '.$this->input->post('po_pr_owner').'  ';
		

		   $message='<ol>
		    <li><b>Informal PO NO:</b>  '.$informal_po_no.'</li>
		   <li><b>Informal PO User/PR Owner:</b>  '.$this->input->post('po_pr_owner').'</li>
	<li><b>Plant:</b>  '.$this->input->post('po_plant'). '</li>
	<li><b>Department:</b>  '.$this->input->post('pr_dept').'</li>
	
	<li><b>Selected Supplier:</b>  '.$this->input->post('final_sup').'</li>
	<li><b>Justification Of Informal PO :</b>  '.$this->input->post('draft_justi_info_po').'</li>
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
  
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	
	
	
	
  

 
  ?>
   <script type="text/javascript">
                    alert("Your Informal PO  Is Submitted...!! ");
                </script>
  <?php
		$this->load->helper('url');

	$this->load->view('informal_po/qcs_list_in_po_gen');
}



//approved PO list
public function approved_list(){
	$this->load->helper('url');
	$this->load->view('informal_po/approved_informal_po_list');
}


function approved_po($emp_code){
	
	$this->load->database();
	$this->load->model('purchase/Informal_po_model');
	$data['approve_po'] = $this->Informal_po_model->approved_po($emp_code);
	return $data['approve_po'];
}


//view informal PO
public function view_informal_po($informal_po_id){
	
	$data['informal_po_id']=$informal_po_id;
	$this->load->helper('url');
	$this->load->view('informal_po/view_informal_po',$data);
}

//pending list 

public function pending_list(){
	$this->load->helper('url');
	$this->load->view('informal_po/pending_informal_po_list');
} 

public function pending_po_list($emp_code){
	$this->load->database();
	$this->load->model('purchase/Informal_po_model');
	$data['pending_list'] = $this->Informal_po_model->pending_po_list($emp_code);
	return $data['pending_list'];
	
}

//view qcs item in Inforaml PO
	   function view_qcs_items1($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  
	  $data['item_view']=$this->qcs_model->view_qcs_items($qcs_id);  
		return  $data['item_view'];
		  
}

//approved list by approver 
public function po_approved_list (){
	$this->load->helper('url');
	$this->load->view('informal_po/informal_po_approvedlist');
}




    	  function informal_po_approved1list ($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approved1_list']=$this->Informal_po_model->informal_po_approved1list ($emp_code);  		  		
	return  $data['approved1_list'];
		  
} 

	//profile pic fetch 
	
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
	}
	
	
	
	//updating item code method
 public function updateItemCode(){
     
    
     $this->load->helper('form');
   //  echo 'in the method of updateItemCode';
                $data = array('q_item_code'=>$this->input->post('q_item_code'));
                $this->db->where('qcs_item_id', $this->input->post('qcs_item_id'));
                $this->db->update('qcs_item', $data);
               
            
           // header('Content-Type: application/json');
            //echo json_encode($res);
                 $this->load->helper('url');
                 $this->load->view('informal_po/informal_po_approval_list');
                 echo '<script>window.history.back();</script>';
            //exit;
          
        }
        
        
        
        //approval 2
	/*public function informal_po_approval2($emp_code){
		$this->load->database();  
    $this->load->model('purchase/Informal_po_model');  	
	$data['approval2_list']=$this->Informal_po_model->informal_po_approval2($emp_code);  		  		
	return  $data['approval2_list'];
		
	}*/
	
	
		//profile
		public function emp_profile($emp_code){
			
			$data['emp_code']=$emp_code;
			$this->load->helper('url');
			$this->load->view('Welcome/index',$data); 
			
			
		}	
		
		
			//Item code edit in reject view 2019-Oct-11
	
	
		 public function updateItemCodeEdit()
		 {
			 
	
				$q_itm_id = $this->input->post('qcs_item_idEdit');
				
                $data = array(
				'q_item_code'=>$this->input->post('itm_codeEdit')
				);
				$itm_upd=$this->Capex_model->updateItemCodeEdit($q_itm_id,$data);
				
                $this->load->helper('url');
               //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }
	//FTGS 12/03/2020
	function deptAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('PR/pr_model');   
        $data['dept_autho'] = $this->pr_model->deptAuthNavBarStatus($emp_code);
        return $data;
    }
	function plantAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('PR/pr_model');   
        $data['PlantHead'] = $this->pr_model->plantAuthNavBarStatus($emp_code);
        return $data;
    }
	function ItemCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('PR/pr_model'); 
        $data['itemcode'] = $this->pr_model->ItemCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function IONCreateAuthNavBarStatus($emp_code) 
	{
       $this->load->database();  
		$this->load->model('PR/pr_model');   
        $data['IONCreate'] = $this->pr_model->IONCreateAuthNavBarStatus($emp_code);
        return $data;
    }
	function AssetCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('PR/pr_model');  
        $data['AssetCode'] = $this->pr_model->AssetCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function POCreationAuthNavBarStatus($emp_code) 
	{
       $this->load->database();  
		$this->load->model('PR/pr_model');  
        $data['POCreation'] = $this->pr_model->POCreationAuthNavBarStatus($emp_code);
        return $data;
    }

}//eof
