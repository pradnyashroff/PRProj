<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	 
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

$this->load->model('login_database');


$this->load->model('purchase/pr_model');
$this->load->model('purchase/Itemcode_model');
$this->load->model('purchase/Informal_po_model');

}
	 
	 // Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('emp_code', 'emp_code', 'trim|required');
$this->form_validation->set_rules('emp_password', 'emp_password', 'trim|required');

$emp_code=$this->input->post('emp_code');
$salt = $this->input->post('emp_password');
$encrypted=hash('sha256', $salt);


if ($this->form_validation->run() == FALSE) {
	
	
if(isset($this->session->userdata['logged_in'])){
	
	
	
	$this->load->helper('url');
	
$this->load->view('home');
}


else{
	
	$this->load->helper('url');
	
$this->load->view('login');
}





} else {
//$data = array(
//'emp_code' => $this->input->post('emp_code'),
//'emp_password' => $this->input->post('emp_password')
//);

$result = $this->login_database->login($emp_code,$encrypted);
if ($result == TRUE) {

$emp_code = $this->input->post('emp_code');
$result = $this->login_database->read_user_information($emp_code);
if ($result != false) {
$session_data = array(
'emp_id' => $result[0]->emp_id,
'emp_code' => $result[0]->emp_code,
'plant_code' => $result[0]->plant_code,
'emp_name' => $result[0]->emp_name,
'emp_designation' => $result[0]->emp_designation,
'emp_dept' => $result[0]->emp_dept,
'emp_email' => $result[0]->emp_email,
'emp_mobile' => $result[0]->emp_mobile,
'pr_dh_id' => $result[0]->pr_dh_id,
'pr_allowed' => $result[0]->pr_allowed,
'emp_password' => $result[0]->emp_password,
'emp_status' => $result[0]->emp_status,
'grade_id'=> $result[0]->grade_id,
);

$this->load->helper('url');


// Add user data in session
$this->session->sess_expiration = '14400';

$this->session->set_userdata('logged_in', $session_data);



if($result[0]->emp_dept == "25"){
	$this->load->view('QCS/home', $emp_code,$encrypted);	
	
}
else if($result[0]->emp_code == "100121"){
	//$this->load->view('QCS/qcs_menu_cfo', $data);	
		$this->load->view('QCS/home', $emp_code,$encrypted);	
	
}
else if($result[0]->emp_code == "100198"){
	$this->load->view('QCS/home', $emp_code,$encrypted);	
	
}
else if($result[0]->emp_dept == "99"){
		$this->load->view('Admin/index', $emp_code,$encrypted);	

}

else if($result[0]->emp_code =="111112")
{
	//$this->load->view('mgmt_view/Mds_menu', $emp_code,$encrypted);
	$this->load->view('mgmt_view/Mds_home', $emp_code,$encrypted);
}
else{

		$this->load->view('home', $emp_code,$encrypted);	
}
}


} else {
			$this->load->helper('url');

$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login', $emp_code,$encrypted);
}
}
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

	 
	 
	 
	 
	 public function reset_password()
	{
		$this->load->helper('url');
	$emp_code = $this->input->post('emp_code');

$result = $this->login_database->read_user_information($emp_code);
if ($result != false) {
$email = $result[0]->emp_email;
$user_id = $result[0]->emp_id;


$message='';
$message .= '<table cellspacing="0" cellpadding="0" border="0" style="color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px/1.25em "Helvetica Neue",Arial,Helvetica">';
 $message .= ' <tbody>';
   $message .= ' <tr width="100%">
      <td valign="top" align="left" style="background:#f6f7f8;font:15px/1.25em "Helvetica Neue",Arial,Helvetica">
        <table style="border:none;padding:0 18px;margin:50px auto;width:500px">
          <tbody>
            <tr width="100%" height="60">
              <td valign="top" align="left" style="border-top-left-radius:4px;border-top-right-radius:4px;background-color: white;text-align:center">
              <img height="250" width="150" src="https://www.rucha.co.in/assets/img/master/RUCHA-LOGO_sm.png" title="Rucha Group" style="font-weight:bold;font-size:18px;color:#fff;vertical-align:top"
                  class="CToWUd"> </td>
            </tr>
            <tr width="100%">
              <td valign="top" align="left" style="background:#fff;padding:18px">';

              $message .= '   <h1 style="font-size:16px;margin:16px 0;color:#333;text-align:center">Hello,&nbsp;&nbsp;'. $email.' </h1>';

              $message .= '  <p style="font:15px/1.25em "Helvetica Neue",Arial,Helvetica;color:#333;text-align:center"> You Have requested a Link to change your password.
</p>

                <div style="background:#f6f7f8;border-radius:3px"> <br>

                  <p style="text-align:center;style="font:26px/1.25em "Helvetica Neue",Arial,Helvetica;text-decoration:none;font-weight:bold"> You can do this through the link below</p>

                  <p style="font:15px/1.25em "Helvetica Neue",Arial,Helvetica;margin-bottom:0;text-align:center"> <a href="https://www.rucha.co.in/portal/index.php/Welcome/setnewpassword/'.$user_id.'" style="border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 6px;padding:10px 18px;text-decoration:none;width:180px" target="_blank"> Change my Password</a>                    </p>

                  <br><br> </div>

                <p style="font:14px/1.25em "Helvetica Neue",Arial,Helvetica;color:#333">  Your password wont change until you access the link above and create new one.

If you dint requested this, please ignore this email.                  </p>

              </td>

            </tr>';

        $message .= '  </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>';

$cc="no-reply@rucha.co.in";
$sub="Password Reset Request";
$this->send_mail($email,$cc,$message,$sub);


?>
                <script type="text/javascript">
                    alert("Please check your registered email inbox for new password generation link");
                </script>
            <?php


}
else{
	
		?>
                <script type="text/javascript">
                    alert("Requested User is not Found Try again!");
                </script>
            <?php
}

         $this->load->view('login'); 
		
	}
	 
	 
	 
	 
	public function index()
	{
		$this->load->helper('url');
		//load the database  
        
         $this->load->view('home'); 
		
	}
	
	public function reset_my_password()
	{
		$this->load->helper('url');
		//load the database  
        
         $this->load->view('password_reset'); 
		
	}
	public function setnewpassword($user_id)
	{
		$this->load->helper('url');
		//load the database  
        $data['id'] = array(
'user_id' => $user_id,
);

         $this->load->view('setnewpass',$data); 
		
	}
	
/*	public function set_new_password()
	{
		$this->load->helper('url');
		
		
		$emp_code =$this->input->post('user_id');

		//load the database  
        $data = array(
'emp_password' => $this->input->post('conf_password'),
);
		$result = $this->login_database->change_pwd($data,$emp_code);
if ($result != false) {
	?>
                <script type="text/javascript">
                    alert("Password is changed!");
                </script>
            <?php
	 $this->load->view('login'); 
}		else{
	?>
                <script type="text/javascript">
                    alert("Passwordis not changed Try again!");
                </script>
            <?php
	
}
        
		
	}
	
	*/
	
	
		public function set_new_password()
	{
		$this->load->helper('url');
		
		
		$emp_code =$this->input->post('user_id');
		
		
		$salt = $this->input->post('conf_password');
		$encrypted=hash('sha256', $salt);
		//load the database  
        $data = array(
//'emp_password' => $this->input->post('conf_password'),
'emp_password' => $encrypted,
);
		$result = $this->login_database->change_pwd($data,$emp_code);
if ($result != false) {
	?>
                <script type="text/javascript">
                    alert("Password is changed!");
                </script>
            <?php
	 $this->load->view('login'); 
}		else{
	?>
                <script type="text/javascript">
                    alert("Passwordis not changed Try again!");
                </script>
            <?php
	
}
        
		
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
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'Rucha@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@ruchagroup.com');
    $this->email->to($reciver);
    $this->email->subject($subject);
    $this->email->message($message);
		
		
   
  $data['message'] = "Sorry Unable to send email..."; 
  if($this->email->send()){     
   $data['message'] = "Mail sent...";   
		
  }
		$this->load->helper('url');
		//load the database  
		
		
		
		
      }
	  
	 public function profile_pic_fetch($emp_code)
	{
		$this->load->database();  
		$this->load->model('PR/pr_model');  
		$data['profile_attachment']=$this->pr_model->profile_pic_fetch($emp_code);    
		return  $data['profile_attachment'];
		
		
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
		$this->load->model('purchase/pr_model');
		$data['pendingn'] = $this->pr_model->pending_noti($emp_code);
		return $data['pendingn'];
		}
	
	//rejected notificaton 
	
	public function rejpr_noti($emp_code){
		$this->load->database();
		$this->load->model('purchase/pr_model');
		$data['rej_noti'] = $this->pr_model->pr_master_list_rejected($emp_code);
		return $data['rej_noti'];
	}
	
	//aprrove notification
	public function approved_noti($emp_code){
		$this->load->database();
		$this->load->model('purchase/pr_model');
		$data['app_noti'] = $this->pr_model->processed_pr_master_list($emp_code);
		return $data['app_noti'];
	}
	
	  //QCS notification 
	  
	  public function approved_qcs_noti($emp_code){
		  
		 $this->load->database();
			$this->load->model('purchase/pr_model');
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
		
		
		//Qcs notification
		
	
		//draft notification 
		
		public function draft_noti($emp_code){
			$this->load->database();
			$this->load->model('purchase/qcs_model');
			$data['qcs_create'] = $this->qcs_model->list_qcs_draft($emp_code);
			return $data['qcs_create'];
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
		
		public function list_qcs_draft($emp_code){
			
			$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['pr_master_list']=$this->qcs_model->list_qcs_draft($emp_code);  		  		
	return  $data['pr_master_list'];
	
	
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
	
		
		
	/*	 public function view_pwd(){
			 
			
		
 $this->load->helper('url');
 $this->load->model('login_database');
 $data['password_details']=$this->login_database->pwd_encrypt();
 
 $this->load->view('password_encryption',$data);
 	
	  }*/
	  
	 
	  
	     //QCS approval1 sourcing manager list display 
 function list_sourcing_mgr_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_sourcing_mgr_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}
  
     //QCS approval_two sourcing manager list display 
 function list_sourcing_head_approval2($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval2_list']=$this->qcs_model->list_sourcing_head_approval2($emp_code);  		  		
	return  $data['approval2_list'];
		  
}

   //QCS approval_3 sourcing CFO list display 
 function list_cfo_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_cfo_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}


   //QCS approval_4 sourcing COO list display 
 function list_coo_approval1($emp_code)
{
	
	$this->load->database();  
    $this->load->model('purchase/qcs_model');  	
	$data['approval1_list']=$this->qcs_model->list_coo_approval1($emp_code);  		  		
	return  $data['approval1_list'];
		  
}

		//password encryption
		public function update_ency_pwd_one($encrypted,$ecode){
			
			//echo "<script>alert('.$ecode.')</script>";
			$this->load->database();
			$this->load->model('Login_database');
			$data['password_details'] = $this->Login_database->pwd_encryptUpdate($encrypted,$ecode);
			return $data['password_details'];
		}
 

		}
