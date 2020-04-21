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


$this->load->model('PR/pr_model');
}
//new PR Insertion
	public function new_pr()//opens new pr form page
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
		  $this->load->model('PR/pr_model');  
		  $maxid = 1;
$row = $this->db->query('SELECT MAX(pr_id) AS `maxid` FROM `tbl_purchase`')->row();
if ($row) {
    $maxid = $row->maxid+1; 
}
	  $data = array('last_id' =>$maxid);
         $this->load->view('PR/new_pr',$data); 
		
	}
	
	
	
	
	public function add_pr()//inserting new pr in database
		{
			$group_id = $this->session->userdata['logged_in']['group_id'];
			
			date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
				
			if($this->input->post('other_uom')){
				$uom=$this->input->post('other_uom');
			}
			else{
				$uom=$this->input->post('item_uom');
			}
			
			$data = array(
'pr_date' =>  $date,
'requester_name' => $this->input->post('requester_name'),
'req_email' => $this->input->post('req_email'),
'pro_name' => $this->input->post('pro_name'),
'pro_lead' => $this->input->post('pro_lead'),
'pro_man' => $this->input->post('pro_man'),
'item_name' => $this->input->post('item_name'),
'item_list' => $this->input->post('item_list'),
'item_ref' => $this->input->post('item_ref'),
'ref_attach' =>preg_replace('/\s+/', '_', $_FILES['ref_attach']['name']),
'item_approx_tot' => $this->input->post('item_approx_tot'),
'item_delivery' => $this->input->post('item_delivery'),
'item_comment' => $this->input->post('item_comment'),
'pr_by_id' => $this->input->post('pr_by_id'),
'pr_by_name' => $this->input->post('pr_by_name'),
'pr_by_number' => $this->input->post('pr_by_number'),
'ion_no' => $this->input->post('ion_no'),

);

 if (!empty($_FILES['ref_attach']['name'])) {//single file upload for pr_reference completed
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
if($this->upload->do_upload('ref_attach')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            }   

//Transfering data to Model
$result=$this->pr_model->pr_insert($data);

  $datanew = array(
'is_lead_approved' =>"1",


);


if($result==TRUE){
	
	
}
else{
	?>
                <script type="text/javascript">
                    alert("Not Inserted");
                </script>
            <?php
	
}
$datas['message'] = 'Data Inserted Successfully';
//Loading View
$this->load->helper('url');
$row = $this->db->query('SELECT MAX(pr_id) AS `maxid` FROM `tbl_purchase`')->row();
if ($row) {
	$pr_id=$row->maxid;
  }
if($group_id==2){
			$this->pr_model->updstatuslead($pr_id,$datanew);  
}

   //$data = array('last_id' =>$pr_id);
   $to=$this->input->post('pro_lead');
   $cc=$this->input->post('req_email');
  $subject='New PR Filed By '.$this->input->post('requester_name').' PR No '.$pr_id.'';
   $message='<ol>
	<li>PR No: '.$pr_id.'</li>
	<li>Project Name/Purpose: '. $this->input->post('pro_name'). '</li>
	<li>Item/Service Description: '. $this->input->post('item_name') .'</li>
	<li>Status Changed to: New PR Filed</li>
</ol>

   Kindly visit your Purchase panel';
  $this->send_mail($to,$cc,$message,$subject);
$this->load->view('PR/purchase_menu');
			
			
		}
	

		//########################Show single pr############################################
		
		public function show_pr($id)//fetching pr data 
   {
      
        $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		
		$data['cmt']=$this->pr_model->show_cmt_by_id($id);//cmt fetch
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($id);  

		$this->load->view('PR/show_pr', $data);
   }
		
		
		//########################Show single pr end############################################
		
		
		//########################Change PR status ############################################
		
		
		public function changestatus($id)//chnaging main status
   {
	
	   if($this->input->post('reject_res')){
		    $datanew = array(
'status' => $this->input->post('stats'),
'reject_res' => $this->input->post('reject_res'),

);
 $statustext="Rejected";
		    }
	   else{
       $datanew = array(
'status' => $this->input->post('stats'),
);

 $st=$this->input->post('stats');
					
				if($st == "1on"){ echo "Level 3: Forms uploaded by SE."; }
					if($st == "1off"){ echo "Level 3: Forms uploaded by SE."; }
					if($st == "2"){ $statustext= "Level 4: PR Approved by PM"; }
					if($st == "3aapp"){ $statustext= "Level 4: PR Approved by PM"; }
					if($st == "3a"){ $statustext= "Level 5a: Ecommerce Supplier: PR approved by MDO"; }
					if($st == "3b"){ $statustext= "Level 5b: Offline Supplier: Sent for PO creation"; }
					if($st == "4"){ $statustext= "Level 6: Ecommerce Supplier: Payment done. Awaiting Delivery"; }
		
	   }
	    $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
			 
         //load the method of model  
			$this->pr_model->updstatus($id,$datanew);  
	  
	  		$pr_by=$this->session->userdata['logged_in']['email'];
			$group_id = $this->session->userdata['logged_in']['group_id'];
			$status=$this->input->post('stats');
			$username = ($this->session->userdata['logged_in']['username']);
		   if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('0');  
	
			  
		  }
		  else{
			  $data['pr_approval']=$this->pr_model->show_pr_is_lead('0',$username);  
			 
		  }  
		  
 $row = $this->db->query('SELECT * FROM `tbl_purchase` where pr_id='.$id.'')->row();
if ($row) {
	$requester_name=$row->requester_name;
	$pro_name=$row->pro_name;
	$item_name=$row->item_name;
	$req_email=$row->req_email;
  }
		
	
   $message='<ol>
	<li>PR No: '. $id .'</li>
	<li>Project Name/Purpose: '. $pro_name. '</li>
	<li>Item/Service Description: '. $item_name .'</li>
	<li>Status Changed to: '. $statustext .'</li>
</ol>

   Kindly visit your Purchase panel';			
		  
		  if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_allpr_admin();  	
  $to='mdoffice@ruchagroup.com';//mdoffice@ruchagroup.com consider mdo mail
   $subject='New PR Filed By '.$requester_name.' PR No '.$id.'';
      $cc='smdhokane@ruchagroup.com';

  
   
   
  $this->send_mail($to,$cc,$message,$subject);					  
		  }
		  else if($group_id==6){
			  		   $data['listdata']=$this->pr_model->show_allpr_mdo();    	
 $to='smdhokane@ruchagroup.com';// smdhokane@ruchagroup.com consider sourcing mail
   $subject='New PR Filed By '.$requester_name.' PR No '.$id.'';
      $cc='rohit@ruchagroup.com';//admin

  
   
   
  $this->send_mail($to,$cc,$message,$subject);					  
		  }
		  
		  
		  else if($group_id==3){
			  			  		 $data['listdata']=$this->pr_model->show_allpr_store();    	

 $to='rohit@ruchagroup.com';//consider admin mail
   $subject='New PR Filed By '.$requester_name.' PR No '.$id.'';
      $cc='rohit@ruchagroup.com';

  
   
  $this->send_mail($to,$cc,$message,$subject);								  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_allpr_is_lead($username);  
			   
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_allpr_by_status($pr_by);  
			  }   
			  
						$this->add_tbl_status($statustext,$pr_by,$id); 	  
			  
$req_subject='PR# '.$id.' Status Update';
$cc='no-reply@yantrallp';
$this->send_mail($req_email,$cc,$message,$subject);

         $this->load->view('PR/listview',$data); 
   }
		
		//########################Change PR status end############################################
		
		
		
		
		
		//########################Change PR status pro lead ############################################
		
		
		public function changestatuslead($id)//status update by lead
   {
	   $statuspost=$this->input->post('stats');

	   if($this->input->post('reject_res')){//rejected
		    $datanew = array(
'status' => $this->input->post('stats'),
'reject_res' => $this->input->post('reject_res'),
'is_lead_approved' => $this->input->post('stats'),

);
		   $statustext="Rejected";
	   }
	   else{
       $datanew = array(//lead aprove
'is_lead_approved' => $this->input->post('stats'),


);
  $statustext="Lead Approval Done";	

	}
	   
        $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
			 
         //load the method of model  
			$this->pr_model->updstatuslead($id,$datanew); 

			
		
	  		$pr_by=$this->session->userdata['logged_in']['email'];
			$group_id = $this->session->userdata['logged_in']['group_id'];
			$status=$this->input->post('stats');
			$mobile=$this->input->post('pr_by_number');
				$username = ($this->session->userdata['logged_in']['username']);

		   if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('0');  
		   }
		  else{
			    $data['pending']=$this->pr_model->show_pr_by_status('0',$pr_by);  
			  }  
		   $row = $this->db->query('SELECT * FROM `tbl_purchase` where pr_id='.$id.'')->row();
if ($row) {
	$requester_name=$row->requester_name;
	$pro_name=$row->pro_name;
	$item_name=$row->item_name;
$req_email=$row->req_email;
  }
		  
		   $to='smdhokane@ruchagroup.com';//smdhokane@ruchagroup.com consider sourcing mail
   $subject='New PR Filed By '.$requester_name.' PR No '.$id.'';
   $message='<ol>
	<li>PR No: '. $id .'</li>
	<li>Project Name/Purpose: '. $pro_name. '</li>
	<li>Item/Service Description: '. $item_name .'</li>
	<li>Status Changed to: '. $statustext .'</li>
</ol>

   Kindly visit your Purchase panel';
      $cc='no-reply@yantrallp';

  $this->send_mail($to,$cc,$message,$subject);
	 $this->send_mail($req_email,$cc,$message,$subject);	  
		  
		  
		  
		   if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_allpr();  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_allpr();  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_allpr();  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_allpr_is_lead($username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_allpr_by_status($pr_by);  
			  }  
			  
				$this->add_tbl_status($statustext,$pr_by,$id); 
			  
			  
         $this->load->view('PR/listview',$data); 
   }
		
		//########################Change PR status project lead end############################################
		
		

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
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
######################################file upload#############################
 private function upload_files($title, $files, $pr_id)
    {
		 $this->load->database();  
		  $this->load->model('PR/pr_model');  
		  

		chmod('./uploads/', 0777);
$path   = './uploads/'.$pr_id;
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
				$datanew = array(
'pr_id' => $pr_id,
'f_name' => preg_replace('/\s+/', '_', $fileName),


);
$this->pr_model->insertcapfile($datanew);//Inserting 6 files

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
		
		
		
		
		
			function checkChildExists()
{
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];
				$username = ($this->session->userdata['logged_in']['username']);

		   if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('0');  
					  
		  }
		  else{
			  $data['pending']=$this->pr_model->show_pr_is_lead('0',$username); 
			    }  

 return  $data['pending'];
		  
} 
			function storenoti()
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

		 if($group_id==3){
			 $data['approved']=$this->pr_model->show_pr_by_status_store('0');   
			 
		  		
			  
			  
		  }
		 

 return  $data['approved'];
		  
} 
function tmnoti()
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['user_id'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

	
			 $data['approved']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);   
			 
		  
		 

 return  $data['approved'];
		  
} 
function pmnoti()
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['user_id'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

	
			 $data['approved']=$this->pr_model->show_pr_by_status_store_admin();   
			 
		  
		 

 return  $data['approved'];
		  
} 
function mdonoti()
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['user_id'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

	
			 $data['approved']=$this->pr_model->show_pending_mdo();    
			 
		  
		 

 return  $data['approved'];
		  
} 

########################################
		function checkpr_stats($id)
{
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];
				$username = ($this->session->userdata['logged_in']['username']);

		  $data['staa']=$this->pr_model->fetch_stats($id);
		  
 return  $data['staa'];
		  
} 
			
		
				##########################Load PR and CCS######################################
		
		function load_capex($id)//load capex
   {
      
        $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		
		
         $data['capex']=$this->pr_model->show_capex_pr_by_id($id);  

	return  $data['capex'];
   }
		function load_ccs($id)//load ccs
   {
      
        $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		
		
         $data['capex']=$this->pr_model->show_ccs_pr_by_id($id);  

	return  $data['capex'];
   }
		

		
				function leadnoti($username)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['user_id'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

	
			 $data['approved']=$this->pr_model->show_pending_lead($username);    
			 
		  
		 

 return  $data['approved'];
		  
}
   
   ############add_capex now add ccs and fiule upload also status chnage also##############
   public function add_capex()//inser capex and cost comparion sheet and attachments in database
		{
			date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
			$pr_by=$this->session->userdata['logged_in']['email'];
			$id=$this->input->post('pr_id');
			
			$pur_type=$this->input->post('p_type');
			if($pur_type=="online"){ $pur_stat="1on"; } else{ $pur_stat="1off"; }
			$data = array(
'pr_id' =>  $this->input->post('pr_id'),
'cap_by_id' => $this->input->post('cap_by_id'),
'cap_recomend' => $this->input->post('cap_recomend'),
'cap_proposer' => $this->input->post('cap_proposer'),
'cap_fun_head' => $this->input->post('cap_fun_head'),
'cap_company' => $this->input->post('cap_company'),
'cap_type' => $this->input->post('cap_type'),
'cap_partof_fy' => $this->input->post('cap_partof_fy'),
'cap_part_project' => $this->input->post('cap_part_project'),
'cap_description' => $this->input->post('cap_description'),
'cap_brif' => $this->input->post('cap_brif'),
'cap_source' => $this->input->post('cap_source'),
'cap_experience' => $this->input->post('cap_experience'),
'cap_service_feed' => $this->input->post('cap_service_feed'),
'cap_std_item' => $this->input->post('cap_std_item'),
'cap_quant' => $this->input->post('cap_quant'),
'cap_basis_pri' => $this->input->post('cap_basis_pri'),
'cap_implementation' => $this->input->post('cap_implementation'),
'cap_pay_term' => $this->input->post('cap_pay_term'),
'cap_warranty' => $this->input->post('cap_warranty'),
'cap_bank_guarantee' => $this->input->post('cap_bank_guarantee'),
'cap_penalti' => $this->input->post('cap_penalti'),
'cap_exclusions' => $this->input->post('cap_exclusions'),
'cap_spl_term' => $this->input->post('cap_spl_term'),
'cap_tech_aspect' => $this->input->post('cap_tech_aspect'),
'cap_assoc_cost' => $this->input->post('cap_assoc_cost'),
'cap_date' => $date,

);

$dataccs= array(

'pr_id' =>  $this->input->post('pr_id'),
'sup_name1' =>  $this->input->post('sup_name1'),
'sup_name2' =>  $this->input->post('sup_name2'),
'sup_name3' =>  $this->input->post('sup_name3'),
'quote_price1' =>  $this->input->post('quote_price1'),
'quote_price2' => $this->input->post('quote_price2'),
'quote_price3' => $this->input->post('quote_price3'),
'final_price1' => $this->input->post('final_price1'),
'final_price2' => $this->input->post('final_price2'),
'final_price3' => $this->input->post('final_price3'),
'ship_charge1' => $this->input->post('ship_charge1'),
'ship_charge2' => $this->input->post('ship_charge2'),
'ship_charge3' => $this->input->post('ship_charge3'),
'pay_terms1' => $this->input->post('pay_terms1'),
'pay_terms2' => $this->input->post('pay_terms2'),
'pay_terms3' => $this->input->post('pay_terms3'),
'tax_duties1' => $this->input->post('tax_duties1'),
'tax_duties2' => $this->input->post('tax_duties2'),
'tax_duties3' => $this->input->post('tax_duties3'),
'deli_period1' => $this->input->post('deli_period1'),
'deli_period2' => $this->input->post('deli_period2'),
'deli_period3' => $this->input->post('deli_period3'),
'pack_charge1' => $this->input->post('pack_charge1'),
'pack_charge2' => $this->input->post('pack_charge2'),
'pack_charge3' => $this->input->post('pack_charge3'),
'warranty1' => $this->input->post('warranty1'),
'warranty2' => $this->input->post('warranty2'),
'warranty3' => $this->input->post('warranty3'),
'tot_price1' => $this->input->post('tot_price1'),
'tot_price2' => $this->input->post('tot_price2'),
'tot_price3' => $this->input->post('tot_price3'),
'ccs_choice1' => $this->input->post('ccs_choice1'),
'ccs_choice2' => $this->input->post('ccs_choice2'),
'ccs_choice3' => $this->input->post('ccs_choice3'),

'ccs_date' => $date,
'pr_type' => $pur_stat,


);
				
 $datanew = array(
'capex_stats' => "1",
'ccs_stat'=>"1",
'file_stats' => "1",
'status' => $pur_stat,
);


//Transfering data to Model
$result=$this->pr_model->capex_insert($data);
$result2=$this->pr_model->ccs_insert($dataccs);
$this->pr_model->updcapex($id,$datanew);  

 if (!empty($_FILES['images']['name'][0])) {
                if ($this->upload_files($_FILES['images']['name'], $_FILES['images'], $id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
                }
				else{
				
					?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
				}
            }
			else{
				?>
                <script type="text/javascript">
                    alert("no file found");
                </script>
            <?php
				
			}


if($result==TRUE && $result2==TRUE ){
	?>
                <script type="text/javascript">
                    alert("CAPEX submitted Successfully");
                </script>
            <?php
	
}
else{
	?>
                <script type="text/javascript">
                    alert("Not Inserted");
                </script>
            <?php
	
}

$statustext= "Level 3: Forms uploaded by SE.";

$this->add_tbl_status($statustext,$pr_by,$id); 
//Loading View
$this->load->helper('url');

$to='rohit@ruchagroup.com';//consider admin mail
   $subject='Purchase Requisition '.$id.' Forms Uploaded';
      $cc='no-reply@yantrallp';

  
   
   $message='PR no '.$id.' Status is changed to '.$statustext.' project Kindly visit your Purchase panel';
  $this->send_mail($to,$cc,$message,$subject);	
 
  
$data['cmt']=$this->pr_model->show_cmt_by_id($id);//cmt fetch
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($id);  

		$this->load->view('PR/show_pr', $data);			
			
		}
   

	//########################update status tabel############################################
		public function add_tbl_status($status,$staus_by,$pr_id) { 
		date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
		$this->load->helper('url');
		//load the database  
		$group_id = $this->session->userdata['logged_in']['group_id'];
		
		$datanew = array(
'status' => $status,
'status_by' => $staus_by,
'status_date' => $date,
'pr_id' => $pr_id,
'status_bygroup_id' => $group_id,

);

	$result6=$this->pr_model->stat_insert($datanew);
	if($status == "Rejected"){
	$dataupd = array(

'reject_by_group' => $group_id,

);
$this->pr_model->upd_rejcetby_id($pr_id,$dataupd);
	}
      }
	  
	  		public function amend_pr($id)//Amend pr data 
   {
      
        $this->load->helper('url');
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		
		$data['cmt']=$this->pr_model->show_cmt_by_id($id);//cmt fetch
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($id);  

		$this->load->view('PR/amend_pr', $data);
   }	
   
  ############insert_amend now add ccs and fiule upload also status chnage also##############
   public function insert_amend()//update PR capex and cost comparion sheet and attachments in database
		{
			
			$pr_id=$this->input->post('req_no');
		if (!empty($_FILES['ref_attach']['name'])){
				$fname=$_FILES['ref_attach']['name'];
				
			}
			else{ $fname=$this->input->post('oldfile');}
			
			if($this->input->post('other_uom')){
				$uom=$this->input->post('other_uom');
			}
			else{
				$uom=$this->input->post('item_uom');
			}
			
			$prdata = array(
'requester_name' => $this->input->post('requester_name'),
'pro_name' => $this->input->post('pro_name'),
'item_name' => $this->input->post('item_name'),

'item_list' => $this->input->post('item_list'),

'item_ref' => $this->input->post('item_ref'),
'ref_attach' =>$fname,
'item_approx_tot' => $this->input->post('item_approx_tot'),

'item_delivery' => $this->input->post('item_delivery'),
'item_comment' => $this->input->post('item_comment'),


);

 if (!empty($_FILES['ref_attach']['name'])) {//single file upload for pr_reference completed
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
if($this->upload->do_upload('ref_attach')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            }   

			
			
			$statusdata=array(
'status' => $this->input->post('pr_type'),


);
			
			//Transfering data to Model
$result=$this->pr_model->amd_pr($prdata,$pr_id);//update pr

$this->pr_model->updstatus($pr_id,$statusdata);  
			
			$capdata = array(
'cap_recomend' => $this->input->post('cap_recomend'),
'cap_proposer' => $this->input->post('cap_proposer'),
'cap_fun_head' => $this->input->post('cap_fun_head'),
'cap_company' => $this->input->post('cap_company'),
'cap_type' => $this->input->post('cap_type'),
'cap_partof_fy' => $this->input->post('cap_partof_fy'),
'cap_part_project' => $this->input->post('cap_part_project'),
'cap_description' => $this->input->post('cap_description'),
'cap_brif' => $this->input->post('cap_brif'),
'cap_source' => $this->input->post('cap_source'),
'cap_experience' => $this->input->post('cap_experience'),
'cap_service_feed' => $this->input->post('cap_service_feed'),
'cap_std_item' => $this->input->post('cap_std_item'),
'cap_quant' => $this->input->post('cap_quant'),
'cap_basis_pri' => $this->input->post('cap_basis_pri'),
'cap_implementation' => $this->input->post('cap_implementation'),
'cap_pay_term' => $this->input->post('cap_pay_term'),
'cap_warranty' => $this->input->post('cap_warranty'),
'cap_bank_guarantee' => $this->input->post('cap_bank_guarantee'),
'cap_penalti' => $this->input->post('cap_penalti'),
'cap_exclusions' => $this->input->post('cap_exclusions'),
'cap_spl_term' => $this->input->post('cap_spl_term'),
'cap_tech_aspect' => $this->input->post('cap_tech_aspect'),
'cap_assoc_cost' => $this->input->post('cap_assoc_cost'),

);

$result2=$this->pr_model->amd_capex($capdata,$pr_id);//update CapEX


$dataccs= array(
'sup_name1' =>  $this->input->post('sup_name1'),
'sup_name2' =>  $this->input->post('sup_name2'),
'sup_name3' =>  $this->input->post('sup_name3'),
'quote_price1' =>  $this->input->post('quote_price1'),
'quote_price2' => $this->input->post('quote_price2'),
'quote_price3' => $this->input->post('quote_price3'),
'final_price1' => $this->input->post('final_price1'),
'final_price2' => $this->input->post('final_price2'),
'final_price3' => $this->input->post('final_price3'),
'ship_charge1' => $this->input->post('ship_charge1'),
'ship_charge2' => $this->input->post('ship_charge2'),
'ship_charge3' => $this->input->post('ship_charge3'),
'pay_terms1' => $this->input->post('pay_terms1'),
'pay_terms2' => $this->input->post('pay_terms2'),
'pay_terms3' => $this->input->post('pay_terms3'),
'tax_duties1' => $this->input->post('tax_duties1'),
'tax_duties2' => $this->input->post('tax_duties2'),
'tax_duties3' => $this->input->post('tax_duties3'),
'deli_period1' => $this->input->post('deli_period1'),
'deli_period2' => $this->input->post('deli_period2'),
'deli_period3' => $this->input->post('deli_period3'),
'pack_charge1' => $this->input->post('pack_charge1'),
'pack_charge2' => $this->input->post('pack_charge2'),
'pack_charge3' => $this->input->post('pack_charge3'),
'warranty1' => $this->input->post('warranty1'),
'warranty2' => $this->input->post('warranty2'),
'warranty3' => $this->input->post('warranty3'),
'tot_price1' => $this->input->post('tot_price1'),
'tot_price2' => $this->input->post('tot_price2'),
'tot_price3' => $this->input->post('tot_price3'),
'ccs_choice1' => $this->input->post('ccs_choice1'),
'ccs_choice2' => $this->input->post('ccs_choice2'),
'ccs_choice3' => $this->input->post('ccs_choice3'),

);
				
 $result3=$this->pr_model->amd_ccs($dataccs,$pr_id);//update CCS


 

 if (!empty($_FILES['images']['name'][0])) {
	 
	 $dir = glob( './uploads/'.$pr_id.'/*.*');

foreach($dir as $file){
    if(is_file($file))
        unlink($file);
}
$this->db->where('pr_id', $pr_id);
$this->db->delete('capex_files');


                if ($this->upload_files($_FILES['images']['name'], $_FILES['images'], $pr_id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
                }
				else{
				
					?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
				}
            }
			else{
				
				
			}


//Loading View
$this->load->helper('url');

 
  
$data['cmt']=$this->pr_model->show_cmt_by_id($pr_id);//cmt fetch
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($pr_id);  

		$this->load->view('PR/show_pr', $data);		
		
			 $to='rohit@ruchagroup.com';//consider admin mail
  
	  $cc=$this->input->post('pro_lead');
  $subject='PR Filed By '.$this->input->post('requester_name').' PR No '.$pr_id.' Is Amended ';
   $message='<ol>
	<li>PR No: '.$pr_id.'</li>
	<li>Project Name/Purpose: '. $this->input->post('pro_name'). '</li>
	<li>Item/Service Description: '. $this->input->post('item_name') .'</li>
	<li>Status Changed to: New PR Filed</li>
</ol>

   Kindly visit your Purchase panel';
   
     $this->send_mail($to,$cc,$message,$subject);					  

   $dataupd = array(

'reject_by_group' => null,

);
$this->pr_model->upd_rejcetby_id($pr_id,$dataupd);
		}
   
function filefetch($pr_id)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	


	
		  $data['files']=$this->pr_model->fetchfiles($pr_id);  
		  		

 return  $data['files'];
		  
} 

public function delete_pr($pr_id)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	

 /*$dir = glob( './uploads/'.$pr_id.'/*.*');

foreach($dir as $file){
    if(is_file($file))
        unlink($file);
}

$this->db->where('pr_id', $pr_id);
$this->db->delete('capex_files');
	
		$this->db->where('pr_id', $pr_id);
$this->db->delete('capex_files');


	$this->db->where('pr_id', $pr_id);
$this->db->delete('tbl_capex');

		  $this->db->where('pr_id', $pr_id);
$this->db->delete('tbl_ccs');

		  $this->db->where('pr_id', $pr_id);
$this->db->delete('tbl_stats');

		    $this->db->where('pr_id', $pr_id);
$this->db->delete('tbl_purchase');*/
$dataupd = array(

'display_flag' => '0',

);
$this->pr_model->hidepr($pr_id,$dataupd);  

$this->load->helper('url');
$this->load->view('PR/purchase_menu');
		  
} 


function listlead()
{
	
	$this->load->database();  
    $this->load->model('PR/pr_model');  
	


	
		  $data['leads']=$this->pr_model->leadlist();  
		  		

 return  $data['leads'];
		  
} 
}//eof
