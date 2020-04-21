<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listview extends CI_Controller {

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


	public function index()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);

		   if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_allpr_admin();  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_allpr_mdo();  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_allpr_store();  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_allpr_is_lead($username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_allpr_by_status($pr_by);  
			  }  

			$data['page_title'] = 'Check existing PR Status';  

         $this->load->view('PR/listview',$data); 
		
	}
	

	public function pending()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);

		   if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store_admin();  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('3aapp');  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('0');  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_pr_is_lead('0',$username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status('0',$pr_by);  
			  }  
$data['page_title'] = 'Pending PR Status';
         $this->load->view('PR/listview',$data); 
		
	}
	
	
	
	public function processed()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);

		   if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store_not_admin();  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store_not_mdo();  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store_not();  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_pr_is_lead_not('0',$username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status_not('0',$pr_by);  
			  }  
$data['page_title'] = 'Processed PR Status';
         $this->load->view('PR/listview',$data); 
		
	}
	
	public function mdo_approved()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
			$username = ($this->session->userdata['logged_in']['username']);


		  if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('3a');  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('3');  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('3');  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_pr_is_lead_concern('3a',$username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status('3a',$pr_by);  
			  }  
         $this->load->view('PR/listview',$data); 
		
	}
	
	
	public function PO_Generated()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
			$username = ($this->session->userdata['logged_in']['username']);


		   if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('4');  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('4');  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('4');  	 	  

		  }
		  else if($group_id==2){
              $data['listdata']=$this->pr_model->show_pr_is_lead_concern('4',$username); 
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status('4',$pr_by);  
			  }   
         $this->load->view('PR/listview',$data); 
		
	}
	
	
	
		
	public function Material_Delivery()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
			$username = ($this->session->userdata['logged_in']['username']);


		  if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('5');  	 	  
		  }
		  else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('5');  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('5');  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_pr_is_lead_concern('5',$username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status('5',$pr_by);  
			  }  
         $this->load->view('PR/listview',$data); 
		
	}
	
	
	
	public function rejected()
	{
		$this->load->helper('url');
		//load the database  
         $this->load->database();  
         $this->load->model('PR/pr_model');  
		$pr_by=$this->session->userdata['logged_in']['email'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
			$username = ($this->session->userdata['logged_in']['username']);


		  if($group_id==1){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('Rejected');  	 	  
		  }
		    else if($group_id==6){
			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('Rejected');  	 	  
		  }
		  
		  
		  else if($group_id==3){
			  			  		  $data['listdata']=$this->pr_model->show_pr_by_status_store('Rejected');  	 	  

		  }
		  else if($group_id==2){
               $data['listdata']=$this->pr_model->show_pr_is_lead('Rejected',$username);  
		  }
		  
		  else{
			    $data['listdata']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);  
			  }  
         $this->load->view('PR/listview',$data); 
		
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
		  $data['pending']=$this->pr_model->show_pr_by_status_store('1');  
		  $data['Rejected']=$this->pr_model->show_pr_by_status_store('Rejected');  
		  $data['approved']=$this->pr_model->show_pr_by_status_store('2');  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status_store('3a');
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status_store('4');
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status_store('5');
		 
			  
			  
		  }
		  else{
			  $data['pr_approval']=$this->pr_model->show_pr_is_lead('0',$username); 
			    $data['pending']=$this->pr_model->show_pr_by_status('1',$pr_by);  
			    $data['Rejected']=$this->pr_model->show_pr_by_status('Rejected',$pr_by);  
		  $data['approved']=$this->pr_model->show_pr_by_status('2',$pr_by);  
		  $data['Awaiting_PO']=$this->pr_model->show_pr_by_status('3a',$pr_by);
		  $data['PO_Generated']=$this->pr_model->show_pr_by_status('4',$pr_by);
		  $data['Material_Delivery']=$this->pr_model->show_pr_by_status('5',$pr_by);
		
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

///ccs and capex

public function ccs($id)
	{
		$this->load->helper('url');
		
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);

		  $data['pr']=$this->pr_model->show_pr_by_id($id);  
		  
         $this->load->view('PR/ccs',$data); 
		
	}
	
		public function capex($id)
	{
		$this->load->helper('url');
		
		$pr_by=$this->session->userdata['logged_in']['user_id'];
		$group_id = $this->session->userdata['logged_in']['group_id'];
	$username = ($this->session->userdata['logged_in']['username']);

		  $data['pr']=$this->pr_model->show_pr_by_id($id);  
		  
         $this->load->view('PR/capex',$data); 
		
	}
		}
