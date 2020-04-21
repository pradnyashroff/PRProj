<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

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
 $this->method_call =& get_instance();

// Load session library
$this->load->library('session');

// Load database
$this->load->model('PR/cmt_model');

$this->load->model('PR/pr_model');
}

	public function index($pr_id)
	{
		
		 date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y H:i');
			
			
			$data = array(
'comment' =>  $this->input->post('comment'),
'cmt_from' => $this->input->post('cmt_from'),
'cmt_date' => $date,
'pr_id' => $pr_id,


);
 $this->load->helper('url');
		//load the database  
         $this->load->database();  
		  $this->load->model('PR/cmt_model');  
		$result=$this->cmt_model->cmt_insert($data);
if($result==TRUE){
	?>
                <script type="text/javascript">
                    alert("Comment is recorded");
                </script>
            <?php
	
}
else{
	?>
                <script type="text/javascript">
                    alert("Comment failed");
                </script>
            <?php
	
}

$data['cmt']=$this->pr_model->show_cmt_by_id($pr_id);//cmt fetch

$this->load->model('PR/pr_model');  
			 
         //load the method of model  
         //load the method of model  
         $data['pr']=$this->pr_model->show_pr_by_id($pr_id);
		 
		  $mobile=$this->input->post('pr_by_number');
		  $from=$this->input->post('cmt_from');
		  $comment=$this->input->post('comment');
		  $pr_by_email=$this->input->post('pr_by_email');
		
		  $message='Comment is added for PR no '.$pr_id.' from '. $from .' comment is : '. $comment.' kindly visit your panel';
		  $no=urlencode($mobile);
		  $sms_text = urlencode($message);	
 // $url ="http://buzz.cloudsmsindia.com/http-api.php?username=jennycakes&password=naskraft@123&senderid=JCAKES&route=7&number=$no&message=$sms_text";
 /* $url ="http://api.msg91.com/api/sendhttp.php?sender=YANTRA&route=4&mobiles=$no&authkey=192689AhGRGYFu5a574b80&country=91&message=$sms_text";
  
	 $c=curl_init();
	 curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
	 curl_setopt($c,CURLOPT_URL,$url);
	 $contents = curl_exec($c);
	 curl_close($c);*/
		  
		     $to='snehiluwani@gmail.com';//add $pr_by_email
   
  // $this->send_mail($to,$message);
		  
		$this->load->view('PR/show_pr', $data);
	}

	
	
	function checkChildExists()
{
	
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

 return  $data['pending'];
		  
} 
		
		function storenoti()
{
	
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

		 if($group_id==3||$group_id==1){
		  $data['approved']=$this->pr_model->show_pr_by_status_store('Approved');  
		  		
			  
			  
		  }
		  else{
		  $data['approved']=$this->pr_model->show_pr_by_status('Approved',$pr_by);  
		
		  }

 return  $data['approved'];
		  
} 	
	
	
			function deptnoti()
{
	
	$this->load->database();  
                 $this->load->model('PR/pr_model');  
	
$pr_by=$this->session->userdata['logged_in']['email'];

		$group_id = $this->session->userdata['logged_in']['group_id'];

		 if($group_id==3||$group_id==1){
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status_store('Inspection Failed');  
		  		
			  
			  
		  }
		  else{
		  $data['Inspection_Failed']=$this->pr_model->show_pr_by_status('Inspection Failed',$pr_by);  
		
		  }

 return  $data['Inspection_Failed'];
		  
} 
	
	
	//########################Mailing function end############################################
		public function send_mail($to,$message) { 
		
		
		
		$reciver = $to;
		$subject = $message;
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
		
		
		
		
		
		
		
	 
	
		
      }
	  
	
	
		}
