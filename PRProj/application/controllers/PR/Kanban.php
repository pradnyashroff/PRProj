<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanban extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
 $this->method_call =& get_instance();
$this->load->model('PR/pr_model');

}
	 
	 
	 
	 
	 
	 
	 
	 
	 // Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
			$this->load->helper('url');

$this->load->view('login', $data);
}

	 
	 
	 
	 
	 
	 
	 
	 
	 
	public function index()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         //load the model  
          
         $this->load->view('login'); 
		
	}
	public function pr_home()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         //load the model  
          
         $this->load->view('PR/pr_home'); 
		
	}
	
	public function purchase_menu()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         //load the model  
          
         $this->load->view('PR/purchase_menu'); 
		
	}
	
	public function home()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
                 $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);
		    if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('PENDING');  
		  $data['Rejected']=$this->pr_model->show_pr_by_status_store('Rejected');  
		  $data['approved']=$this->pr_model->show_pr_by_status_store('Approved');  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status_store('Awaiting PO');
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status_store('PO Generated');
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status_store('Material Delivery');
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status_store('Material Inspection');
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status_store('Inspection Failed');
		  $data['rework']=$this->pr_model->show_pr_by_status_store('Rework');
		  $data['scrap']=$this->pr_model->show_pr_by_status_store('Scrap');
		  $data['In_Store']=$this->pr_model->show_pr_by_status_store('In Store');
			  
			  
		  }
		  else{
			  
			    $data['pr_approval']=$this->pr_model->show_pr_is_lead('PENDING',$username);  
			    $data['pending']=$this->pr_model->show_pr_by_status('PENDING',$pr_by);  
			    $data['Rejected']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);  
		  $data['approved']=$this->pr_model->show_pr_by_status('Approved',$pr_by);  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status('Awaiting PO',$pr_by);
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status('PO Generated',$pr_by);
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status('Material Delivery',$pr_by);
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status('Material Inspection',$pr_by);
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status('Inspection Failed',$pr_by);
		  $data['rework']=$this->pr_model->show_pr_by_status('Rework',$pr_by);
		  $data['scrap']=$this->pr_model->show_pr_by_status('Scrap',$pr_by);
		  $data['In_Store']=$this->pr_model->show_pr_by_status('In Store',$pr_by);
		  }    
         $this->load->view('PR/pr_status',$data); 
		
	}
	
	
	public function store()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
                 $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];
		$username = ($this->session->userdata['logged_in']['username']);
		$group_id = $this->session->userdata['logged_in']['group_id'];

		    if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('PENDING');  
		  $data['Rejected']=$this->pr_model->show_pr_by_status_store('Rejected');  
		  $data['approved']=$this->pr_model->show_pr_by_status_store('Approved');  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status_store('Awaiting PO');
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status_store('PO Generated');
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status_store('Material Delivery');
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status_store('Material Inspection');
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status_store('Inspection Failed');
		  $data['rework']=$this->pr_model->show_pr_by_status_store('Rework');
		  $data['scrap']=$this->pr_model->show_pr_by_status_store('Scrap');
		  $data['In_Store']=$this->pr_model->show_pr_by_status_store('In Store');
			  
			  
		  }
		  else{
			  $data['pr_approval']=$this->pr_model->show_pr_is_lead('PENDING',$username);  
			    $data['pending']=$this->pr_model->show_pr_by_status('PENDING',$pr_by);  
			    $data['Rejected']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);  
		  $data['approved']=$this->pr_model->show_pr_by_status('Approved',$pr_by);  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status('Awaiting PO',$pr_by);
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status('PO Generated',$pr_by);
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status('Material Delivery',$pr_by);
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status('Material Inspection',$pr_by);
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status('Inspection Failed',$pr_by);
		  $data['rework']=$this->pr_model->show_pr_by_status('Rework',$pr_by);
		  $data['scrap']=$this->pr_model->show_pr_by_status('Scrap',$pr_by);
		  $data['In_Store']=$this->pr_model->show_pr_by_status('In Store',$pr_by);
		  }    
         $this->load->view('PR/pr_status',$data); 
		
	}
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	

		
		
		
		
		
		
		
		
		
		//########################Mailing function end############################################
		public function send_mail() { 
		
		
		
		$reciver = $this->input->post('reciver');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'smtp',
    'smtp_host'=>"smtp.gmail.com",
    'smtp_port'=>465,
    'smtp_user'=>"wanisnehil@gmail.com",
    'smtp_pass'=>'$ne#ilwani13',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('wanisnehil@gmail.com');
    $this->email->to($reciver);
    $this->email->subject($subject);
    $this->email->message($message);
		
		
		
		
		
		
		
		
		
		
		

   
  $data['message'] = "Sorry Unable to send email..."; 
  if($this->email->send()){     
   $data['message'] = "Mail sent...";   
		
  }
		
		
		
		
		
		
		
	 
		
      } 
		
		
		
		function checkChildExists()
{
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];
		$username = ($this->session->userdata['logged_in']['username']);
		   if($group_id==3||$group_id==1){
		  $data['pending']=$this->pr_model->show_pr_by_status_store('PENDING');  
		  $data['Rejected']=$this->pr_model->show_pr_by_status_store('Rejected');  
		  $data['approved']=$this->pr_model->show_pr_by_status_store('Approved');  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status_store('Awaiting PO');
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status_store('PO Generated');
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status_store('Material Delivery');
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status_store('Material Inspection');
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status_store('Inspection Failed');
		  $data['rework']=$this->pr_model->show_pr_by_status_store('Rework');
		  $data['scrap']=$this->pr_model->show_pr_by_status_store('Scrap');
		  $data['In_Store']=$this->pr_model->show_pr_by_status_store('In Store');
			  
			  
		  }
		  else{
			  
			  $data['pr_approval']=$this->pr_model->show_pr_is_lead('PENDING',$username);  
			    $data['pending']=$this->pr_model->show_pr_by_status('PENDING',$pr_by);  
			    $data['Rejected']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);  
		  $data['approved']=$this->pr_model->show_pr_by_status('Approved',$pr_by);  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status('Awaiting PO',$pr_by);
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status('PO Generated',$pr_by);
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status('Material Delivery',$pr_by);
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_status('Material Inspection',$pr_by);
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status('Inspection Failed',$pr_by);
		  $data['rework']=$this->pr_model->show_pr_by_status('Rework',$pr_by);
		  $data['scrap']=$this->pr_model->show_pr_by_status('Scrap',$pr_by);
		  $data['In_Store']=$this->pr_model->show_pr_by_status('In Store',$pr_by);
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

			function leadnoti($username)
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['user_id'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

	
			 $data['approved']=$this->pr_model->show_pending_lead($username);    
			 
		  
		 

 return  $data['approved'];
		  
} 
	



public function view_all()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         //load the model  
          $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];
		  
		$data['all_user']=$this->pr_model->show_all_user();
         $this->load->view('PR/view_all',$data); 
		
	}



public function view_all_pr($user_id)
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         //load the model  
          $this->load->model('PR/pr_model');  

		$group_id = $this->session->userdata['logged_in']['group_id'];
		  
		  
		  
			    $data['pending']=$this->pr_model->show_pr_by_userid('PENDING',$user_id);  
			    $data['Rejected']=$this->pr_model->show_pr_by_userid('Rejected',$user_id);  
		  $data['approved']=$this->pr_model->show_pr_by_userid('Approved',$user_id);  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_userid('Awaiting PO',$user_id);
		  $data['PO_Generated']=$this->pr_model->show_pr_by_userid('PO Generated',$user_id);
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_userid('Material Delivery',$user_id);
		  $data['Material_Inspection']=$this->pr_model->show_pr_by_userid('Material Inspection',$user_id);
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_userid('Inspection Failed',$user_id);
		  $data['rework']=$this->pr_model->show_pr_by_userid('Rework',$user_id);
		  $data['scrap']=$this->pr_model->show_pr_by_userid('Scrap',$user_id);
		  $data['In_Store']=$this->pr_model->show_pr_by_userid('In Store',$user_id);
		     
	
         $this->load->view('PR/pr_status',$data); 
		
	}








	}
