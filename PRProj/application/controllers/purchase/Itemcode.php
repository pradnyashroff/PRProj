<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemcode extends CI_Controller {

	
	 
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
$this->load->model('purchase/Itemcode_model');
$this->load->model('purchase/pr_model');

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



//Item Code  start  23 feb 2019

   //itemcode menu
		public function itemcode_menu()
   {
       
        $this->load->helper('url');


		$this->load->view('itemcode/itemcode_menu');
   }	  
 
//list for item code gen

public function itemcode_create_list(){
	
	$this->load->helper('url');
	$this->load->view('itemcode/qcs_list_itemcode_gen');
	}

//create item code list

function qcs_approved_item_gen($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['qcs_approved_list']=$this->Itemcode_model->qcs_approved_item_gen($emp_code);  		  		
	return  $data['qcs_approved_list'];
		  
}

//create item code view

public function itemcode_create($qcs_id){
	$data['qcs_id'] = $qcs_id;
	$this->load->helper('url');
	$this->load->view('itemcode/create_itemcode',$data);
}
//fetch item code list for qcs no qcs_itemcode

function qcs_itemcode($qcs_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['qcs_itemcode']=$this->Itemcode_model->qcs_itemcode($qcs_id);  		  		
	return  $data['qcs_itemcode'];
		  
}

//fetch qcs details from qcs_master table pr_qcs_detail_itemcode

public function pr_qcs_detail_itemcode($qcs_id){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['qcs_det'] = $this->Itemcode_model->pr_qcs_detail_itemcode($qcs_id);
	return $data['qcs_det'];
} 

	  
	   function fetch_dept_nm($emp_dept)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['dept_name']=$this->Itemcode_model->fetch_dept_nm($emp_dept);  		  		
	return  $data;
} 

   function fetch_prtype_nm($pt_id)//Full pr type name fetch
		{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['pt_name']=$this->qcs_model->fetch_pr_type_nm($pt_id);  		  		
		return  $data;
		}

//crete Itemcode generation 
public function create_itemcode()
{
	
	
	date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y  h:i');
   $data = array(
	'qcs_id'=>$this->input->post('itemcode_qcs_no'),
	'pr_id' => $this->input->post('itemcode_pr_no'),
	'item_gen_date' => $date,
	'plant_code'=> $this->input->post('pr_plant'),
	'pr_owner_empcode'=>$this->input->post('pr_owner_empcode'),
	'item_gen_approval1' => $this->input->post('item_gen_approval1'),
	'item_gen_approval2' => $this->input->post('item_gen_approval2'),
	'itemcode_attachment' =>preg_replace('/\s+/', '_', $_FILES['itemcode_attachment']['name']),
	'item_gen_status'=>'Itemcode_Draft',
	
   );
		$result=$this->Itemcode_model->create_itemcode($data);
		
		//itemcode_attachment attachment 	
 if (!empty($_FILES['itemcode_attachment']['name'])) {//single file upload 
                chmod('./uploads/itemcode_attachment/', 0777);
$path   = './uploads/itemcode_attachment/';
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
if($this->upload->do_upload('itemcode_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
		
		$row = $this->db->query('SELECT MAX(iten_gen_id) AS `maxid` FROM `tbl_itemcode_gen`')->row();
if ($row) {
	$iten_gen_id=$row->maxid+1;
  }
?>
				<script type="text/javascript">
                    alert("Your Itemcode Recoarded Item ID ");
                </script>
  <?php
		$this->load->helper('url');

		$this->load->view('itemcode/draft_itemcode_list',$data);
}
 

 
 //draft item code list
 
 public function itemcode_draftlist(){
	
		$this->load->helper('url');
		$this->load->view('itemcode/draft_itemcode_list');
 }
 
 //darft list data fetch 
 public function draft_list($emp_code){
	 	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['draft_list']=$this->Itemcode_model->draft_list($emp_code);  		  		
	return  $data['draft_list'];
 }
 
 //draft item code view 
 
 public function itemcode_draft($iten_gen_id){
	 
		$data['iten_gen_id'] = $iten_gen_id;
		$this->load->helper('url');
		$this->load->view('itemcode/draft_itemcode',$data);
	 
	 
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
 
 //draft item data saved 
 public function draftmode_itemcode(){
	 	date_default_timezone_set('Asia/Kolkata');
		$date=date('Y-m-d H:i:s');
		$itemcodeno = $this->input->post('itemcodeno');
		$itemcode_state =$this->input->post('itemcode_state');
		$qcs_id = $this->input->post('qcs_id');

	
		 $draft_itemcode_update = array(
	
				'itemcode_attachment'=>preg_replace('/\s+/', '_', $_FILES['itemcode_attachment']['name']),
				'item_gen_status'=>$this->input->post('itemcode_state'),
				
				);
				
				
					//itemcode_attachment attachment 	
 if (!empty($_FILES['itemcode_attachment']['name'])) {//single file upload 
                chmod('./uploads/itemcode_attachment/', 0777);
$path   = './uploads/itemcode_attachment/';
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
if($this->upload->do_upload('itemcode_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
				$draft_data = $this->Itemcode_model->draftmode_itemcode($itemcodeno ,$draft_itemcode_update);
            } 
				
				
				
				//status  code 
				
					if($itemcode_state=='Submited_taxtation_dept'){
$statusdata= array(
'iten_gen_id' =>$this->input->post('itemcodeno'),
'qcs_id' => $this->input->post('itemcode_qcs_no'),
'item_status_name' => "1",
'pr_owner_id' =>$this->input->post('pr_emp_code'),
'i_approval_id' =>$this->input->post('item_gen_approval1'),
'i_status_date' => $date,
);

	    $reciver= $this->input->post('tax_emp_email');
 		$ccuser=$this->input->post('pr_owner_email');
 		
 	//$reciver= 'ppshroff@ruchagroup.com';
 	//$ccuser='mis@ruchagroup.com';
 		
 		
		 $subject='New Itemcode Request  Filed By '.$this->input->post('pr_owner_name').' Itemcode No '.$itemcodeno.' ';
		

		   $message='<ol>
	<li><b>PR Owner Name:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>Itemcode Date:</b>  '.$this->input->post('itemdate'). '</li>
	<li><b>PR No:</b>  '.$this->input->post('itemcode_pr_no').'</li>
	<li><b>QCS No:</b>  '.$this->input->post('itemcode_qcs_no').'</li>
	
	<li><b>Approval Date:</b>  '.$date.'</li>
	

</ol>
Status Changed to: Submited To Taxtation Department
</br>
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
	
	
$status_upd=$this->Itemcode_model->item_status_insert($statusdata);
}
				
				//status update in itemcode table 
				if($itemcode_state =='Submited_taxtation_dept'){
					$status_up = array(
						'iten_gen_id'=> $itemcodeno,
						'item_gen_status'=>$this->input->post('itemcode_state'),	
					);
			$data_status_upd=$this->Itemcode_model->item_status_update($itemcodeno,$status_up);
}
	
 ?>
                <script type="text/javascript">
                    alert("Your Itemcode Updated with  ID <?php echo $itemcodeno; ?>");
                </script>
				
            <?php
	 
		$this->load->helper('url');
		
		$this->load->view('itemcode/draft_itemcode_list');
	 
 }
 
 //draft item data save and proceed 
 public function approve_taxtation($iten_gen_id){
		$data['iten_gen_id']=$iten_gen_id;
		$this->load->helper('url');
		$this->load->view('itemcode/apprpval1_itemcode',$data);
 }
 
 
 //approval1 list 
 
 public function approval_list (){
		$this->load->helper('url');
		$this->load->view('itemcode/approval1_itemcode_list');
 }
 
 // pr detail fetch according item_gen_id  not use 
 public function pr_detail_itemcode($iten_gen_id){
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['pr_owner']=$this->Itemcode_model->pr_detail_itemcode($iten_gen_id);  		  		
	return  $data; 
 }
 //pr item list in item code gen page
 	   function list_pr_items($iten_gen_id)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  
	
		  $data['item']=$this->Itemcode_model->list_pr_items($iten_gen_id);  
		  		
		return  $data['item'];
		  
}

//qcs item list in itemcode page 
	
	public function qcs_items_list($iten_gen_id){
		$this->load->database();  
		$this->load->model('purchase/Itemcode_model');  
		$data['item']=$this->Itemcode_model->qcs_items_list($iten_gen_id);  
		return  $data['item'];
	}
	
	//approval  item code list

function approval_itemcodelist($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['approved_list']=$this->Itemcode_model->approval_itemcodelist($emp_code);  		  		
	return  $data['approved_list'];
		  
}

//update HSN COde in approval1

public function approval1_itmCode(){
	
	$date=date('Y-m-d H:i:s');
	$itemcode_status=$this->input->post('itemcode_state');
	$update_id=$this->input->post('up_itemcodeno');
		 
	 $data = array(
'item_gen_status' => $this->input->post('itemcode_state'),
'item_gen_app1_cmt'=> $this->input->post('tax_comment'),
);
	$status_upd=$this->Itemcode_model->itemcode_status_taxtiondept($update_id,$data);
 //end
 
if($itemcode_status == "Approve_by_taxation_dept"){
	  $status_name = "11";
	  
	    $reciver= $this->input->post('sap_dept_email');
 		$ccuser=$this->input->post('pr_owner_email');
 		
 		//$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser='mis@ruchagroup.com';
 		
 		
		 $subject='New Itemcode Request  Filed By '.$this->input->post('pr_owner_name').' Itemcode No '.$update_id.' ';
		

		   $message='<ol>
	<li><b>PR Owner Name:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>Itemcode Date:</b>  '.$this->input->post('itemdate'). '</li>
	<li><b>PR No:</b>  '.$this->input->post('itemcode_pr_no').'</li>
	<li><b>QCS No:</b>  '.$this->input->post('itemcode_qcs_no').'</li>
		<li><b>Approver Comment:</b>  '.$this->input->post('tax_comment').'</li>
	
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li> Status Changed to: <b>Submited To SAP Department</b> </li>

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

 if($itemcode_status == "Reject_by_taxation_dept"){
	  $status_name = "12";
	  
	 $reciver= $this->input->post('sap_dept_email');
 		$ccuser=$this->input->post('pr_owner_email');
 		
 		//$reciver= 'ppshroff@ruchagroup.com';
 		//$ccuser='mis@ruchagroup.com';
 		
 		
		 $subject='New Itemcode Request  Rejected With Itemcode No '.$update_id.' ';
		

		   $message='<ol>
	<li><b>PR Owner Name:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>Itemcode Date:</b>  '.$this->input->post('itemdate'). '</li>
	<li><b>PR No:</b>  '.$this->input->post('itemcode_pr_no').'</li>
	<li><b>QCS No:</b>  '.$this->input->post('itemcode_qcs_no').'</li>
		<li><b>Approver Comment:</b>  '.$this->input->post('tax_comment').'</li>
	
	<li><b>Approval Date:</b>  '.$date.'</li>
<li> Status Changed to: <b> Rejected BY Taxation  Department <b> </li>	

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
 //status history
  $statusdata= array(
'iten_gen_id' =>$update_id,
'qcs_id' => $this->input->post('itemcode_qcs_no'),
'item_status_name' =>$status_name,
'pr_owner_id' =>$this->input->post('pr_emp_code'),
'i_approval_id' =>$this->input->post('item_gen_approval2'),
'i_status_date' => $date,
);


$status_upd=$this->Itemcode_model->item_status_insert($statusdata);

		$this->load->helper('url');
		
		$this->load->view('itemcode/approval1_itemcode_list');
		   }

		
		
//update HSN CODE in model 

		
		 public function updateHSNCode(){
			 
	
				$q_itm_id = $this->input->post('item_idEdit');
				
                $data = array(
				'q_hsn_code'=>$this->input->post('item_hsncode')
				);
				$itm_upd=$this->Itemcode_model->update_hsncode($q_itm_id,$data);
				
                $this->load->helper('url');
               //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }
		
				  
//update item CODE in model 

		
		 public function updateitemCode(){
			 
	
				$q_itm_id = $this->input->post('item_idEdit');
				
                $data = array(
				'q_item_code'=>$this->input->post('item_itemcode')
				);
				$itm_upd=$this->Itemcode_model->update_itemcode($q_itm_id,$data);
				
                $this->load->helper('url');
               //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }		  

 
  public function rejected_Itemcode (){
		$this->load->helper('url');
		$this->load->view('itemcode/rejected_itemcode_list');
 }
 
    //Rejected Itemcode  list 
 function rejected_itemcodelist($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['itemcode_reject']=$this->Itemcode_model->rejected_itemc_list($emp_code);  		  		
	return  $data['itemcode_reject'];
		  
}

 
    //Rejected Itemcode  list by SAP dept 
 function rejected_Sap_list($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/Itemcode_model');  	
	$data['itemcode_reject']=$this->Itemcode_model->rejected_Sap_list($emp_code);  		  		
	return  $data['itemcode_reject'];
		  
}


//SAP approval 2 list 
public function sap_approval_itemcodelist($emp_code){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['sap_list']=$this->Itemcode_model->sap_approval_itemcodelist($emp_code);
	return $data['sap_list'];
}

//pending list load page
public function pending_list(){
		$this->load->helper('url');
		$this->load->view('itemcode/pending_itemcode_list');
}

//pending Itemcode list 

public function pending_itemcodelist($emp_code){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['pending_list']=$this->Itemcode_model->pending_itemcodelist($emp_code);
	return $data['pending_list'];
}


//view itemcode

public function view_itemcode($iten_gen_id){
	$data['iten_gen_id'] = $iten_gen_id;
	$this->load->helper('url');
	$this->load->view('itemcode/view_itemcode',$data);
}


//SAP Approval view

public function approve_by_sap($iten_gen_id){
	$data['iten_gen_id'] = $iten_gen_id;
	$this->load->helper('url');
	$this->load->view('itemcode/apprpval2_itemcode',$data);
}


//final approved list shown in pr owner
public function approved_itemcode_list(){
	$this->load->helper('url');
	$this->load->view('itemcode/approved_itemcode_list');
}

//approve list show 
public function approved_list_itemcode($emp_code){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['approved_list']=$this->Itemcode_model->approved_list_itemcode($emp_code);
	return $data['approved_list'];
	
}


//update Item COde in approval2

public function update_itemcode(){
	
	$date=date('Y-m-d H:i:s');
	$itemcode_status=$this->input->post('itemcode_state');
	$update_id=$this->input->post('up_itemcodeno');
	
	 if($this->input->post('item_id_list')){
				$ids = $this->input->post('item_id_list');
		 
			$var=explode(',',$ids);
   foreach($var as $row)
    {
		 $dataup = array(
    'q_item_code' => $this->input->post('edit_itemcode'),
	
	
    );		
		 $this->db->where('qcs_item_id', $row);
		  //$this->db->set($dataup);
			$this->db->update('qcs_item',$dataup);
	
    }?>
	<!--
	<script>
	
	alert("Records are Updated Successfully");
	</script>-->
	
		<?php 
		$this->load->helper('url');
		$data['iten_gen_id']=$update_id;
		$this->load->view('itemcode/apprpval2_itemcode',$data);
		   }
		   else{
		 
	 $data = array(
'item_gen_status' => $this->input->post('itemcode_state'),
'item_gen_app2_cmt'=> $this->input->post('sap_comment'),
'item_code_list'=> $this->input->post('itemcode_list'),
);
	$status_upd=$this->Itemcode_model->itemcode_status_sapdept($update_id,$data);
 //end
 
if($itemcode_status == "Approve_by_sap_dept"){
	  $status_name = "22";
	  
	      $reciver= $this->input->post('pr_owner_email');
 		
 		//$reciver= 'ppshroff@ruchagroup.com';
 	
 		
 		
		 $subject='Itemcode Created Successfully...!!';
		

		   $message='<ol>
	<li><b>PR Owner Name:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>Itemcode Date:</b>  '.$this->input->post('itemdate'). '</li>
	<li><b>PR No:</b>  '.$this->input->post('itemcode_pr_no').'</li>
	<li><b>QCS No:</b>  '.$this->input->post('itemcode_qcs_no').'</li>
    <li><b>Approver Comment:</b>  '.$this->input->post('sap_comment').'</li>
	<li><b>Itemcode List:</b>'.$this->input->post('itemcode_list').'</li>
			</br></br>
	
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li> Status Changed to: <b>Itemcode Created</b> </li>

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
    
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
}

 if($itemcode_status == "Reject_by_sap_dept"){
	  $status_name = "23";
	  
	      $reciver= $this->input->post('pr_owner_email');
 		
 		
 		//$reciver= 'ppshroff@ruchagroup.com';
 	
 		
 		
		 $subject='Itemcode Request is Rejected By SAP Department';
		

		   $message='<ol>
	<li><b>PR Owner Name:</b>  '.$this->input->post('pr_owner_name'). '</li>
	<li><b>Plant:</b>  '.$this->input->post('pr_plant'). '</li>
	<li><b>Itemcode Date:</b>  '.$this->input->post('itemdate'). '</li>
	<li><b>PR No:</b>  '.$this->input->post('itemcode_pr_no').'</li>
	<li><b>QCS No:</b>  '.$this->input->post('itemcode_qcs_no').'</li>
		<li><b>Approver Comment:</b>  '.$this->input->post('sap_comment').'</li>
		<li> Itemcode List:</b>'.$this->input->post('itemcode_list').'</li>
	
	<li><b>Approval Date:</b>  '.$date.'</li>
	<li>Status Changed to: <b>Itemcode Rejected</b> </li>

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
    
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
	  
 }
 //status history
  $statusdata= array(
'iten_gen_id' =>$update_id,
'qcs_id' => $this->input->post('itemcode_qcs_no'),
'item_status_name' =>$status_name,
'pr_owner_id' =>$this->input->post('pr_emp_code'),
'i_approval_id' =>$this->input->post('item_gen_approval2'),
'i_status_date' => $date,
);


$status_upd=$this->Itemcode_model->item_status_insert($statusdata);

		$this->load->helper('url');
		
		$this->load->view('itemcode/approval1_itemcode_list');
		   }

		
		
		  
}


//self approved list 
public function approved_list(){
	$this->load->helper('url');
	$this->load->view('itemcode/self_approved_itemcode_list');
}
//Approved by Taxation dept 
public function taxation_approved_list($emp_code){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['approved_list']=$this->Itemcode_model->taxation_approved_list($emp_code);
	return $data['approved_list'];
	
}

//Approved By SAP Department

public function sap_approved_list($emp_code){
	$this->load->database();
	$this->load->model('purchase/Itemcode_model');
	$data['approvedlist']=$this->Itemcode_model->sap_approved_list($emp_code);
	return $data['approvedlist'];
	
}


	//profile pic fetch 
	
	public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
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
