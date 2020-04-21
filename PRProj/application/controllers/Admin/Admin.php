<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	 
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
$this->load->model('Admin/Admin_model');

}
#############################listing functions#####################
function listplant()
{
	
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	


	
		  $data['plants']=$this->Ats_model->plantlist();  
		  		

 return  $data['plants'];
		  
}

####################################################################################
###############################################Redirectiononly###############################################################################
	public function index()
	{
		
		
 $this->load->helper('url');
  
		 $this->load->view('Admin/index');
	}
	
	public function new_employee()
	{
		
		
 $this->load->helper('url');

		 $this->load->view('Admin/new_employee');
	}
	
	public function new_department()
	{
		
		
 $this->load->helper('url');

		 $this->load->view('Admin/new_department');
	}
	
	
	
###############################################Redirectiononly###############################################################################
###############################################Insert into DB###############################################################################
public function add_employee()
	{
		date_default_timezone_set('Asia/Kolkata');

$date=date('Y-m-d');	
 $emp_code=$this->input->post('emp_code');
 $exist=$this->Admin_model->employee_check($emp_code);
 
 if($exist == false){
		$data = array(
'emp_code' =>  $this->input->post('emp_code'),
'plant_code' => $this->input->post('plant_code'),
'emp_name' => $this->input->post('emp_name'),
'emp_designation' => $this->input->post('emp_designation'),
'emp_dept' => $this->input->post('emp_dept'),
'emp_email' => $this->input->post('emp_email'),
'emp_mobile' => $this->input->post('emp_mobile'),
'pr_dh_id' => $this->input->post('pr_dh_id'),
'pr_allowed' => $this->input->post('pr_allowed'),
//'emp_password' => $this->input->post('emp_password'),
'emp_status' => $this->input->post('emp_status'),
'grade_id'=> $this->input->post('emp_grade'),
'bank_acc_no'=> $this->input->post('emp_AcNo'),
'bank_name'=> $this->input->post('emp_Branchnm'),
'ifsc_no'=> $this->input->post('emp_ifscno'),



);
		$result=$this->Admin_model->employee_insert($data);
		
		 $data_rep = array(
			'emp_code' =>  $this->input->post('emp_code'),
		    'reporting_autho'=> $this->input->post('emp_claimDhId'),
			'reporting_level'=> $this->input->post('rep_level'),
			'from_date'=> $date,
			'to_date'=> $this->input->post('rep_to_date'),
			'rec_date'=> $date,
			'rep_mst_status'=> $this->input->post('rep_mst_status'),
			
	 );
	 
	 	$result=$this->Admin_model->reporting_master_insert($data_rep);
	 
	$data['listdata']=$this->Admin_model->show_emp_all();
 $this->load->helper('url');
  $this->load->view('Admin/employee_master',$data);
 }

 else {
	 ?>
	 <script>
	 alert('Employee Already Present');
	 </script>
	 <?php 
	 
	  $this->load->helper('url');

	  $this->load->view('Admin/index');
	 
 }
	}
	
	public function update_employee()
	{
	
 $emp_code=$this->input->post('emp_code');

		$data = array(
'emp_code' =>  $this->input->post('emp_code'),
'plant_code' => $this->input->post('plant_code'),
'emp_name' => $this->input->post('emp_name'),
'emp_designation' => $this->input->post('emp_designation'),
'emp_dept' => $this->input->post('emp_dept'),
'emp_email' => $this->input->post('emp_email'),
'emp_mobile' => $this->input->post('emp_mobile'),
'pr_dh_id' => $this->input->post('pr_dh_id'),
'bank_acc_no'=>$this->input->post('edit_emp_AcNo'),
'bank_name'=>$this->input->post('edit_emp_Branchnm'),
'ifsc_no'=>$this->input->post('edit_emp_ifscno'),
'grade_id'=>$this->input->post('edit_emp_grade'),



);
		$result=$this->Admin_model->employee_update($emp_code,$data);
		
			$data1 = array(
'reporting_autho' =>  $this->input->post('edit_emp_claimDhId'),
);
	$result=$this->Admin_model->employee_reporting_update($emp_code,$data1);
	
	$data['listdata']=$this->Admin_model->show_emp_all();
 $this->load->helper('url');
  $this->load->view('Admin/employee_master',$data);
	}
	
	
	
	public function add_department()
	{
	
 
		$data = array(
'dept_name' =>  $this->input->post('dept_name'),


);
		$result=$this->Admin_model->dept_insert($data);
 $this->load->helper('url');
  $this->load->view('Admin/index');
	}
	
	
###############################################Insert into DB###############################################################################

	##################################################################
public function employee_master()
	{
$data['listdata']=$this->Admin_model->show_emp_all();
		
 $this->load->helper('url');
 $this->load->view('Admin/employee_master',$data);
	}
	
	public function pr_master()
	{
$data['prdata']=$this->Admin_model->prdata();
		
 $this->load->helper('url');
 $this->load->view('Admin/pr_master',$data);
	}
	##################################################################

public function show_employee($emp_code)
	{
		$data['emp_detail']=$this->Admin_model->show_emp_id($emp_code);
 $this->load->helper('url');
$this->load->view('Admin/show_emp',$data);
	}
##################################################################
public function delete_record($cust_id)
	{
		
		$this->db->where('sup_cust_id', $cust_id);
$this->db->delete('support_cust_purchase');

$this->db->where('sup_cust_id', $cust_id);
$this->db->delete('support_customer');


 $this->load->helper('url');
 $this->load->view('Support/new_customer');
	}
##################################################################

function listdept()
{
	
	$this->load->database();  
	


	
		  $data['dept']=$this->Admin_model->deptlist();  
		  		

 return  $data['dept'];
		  
} 
	
	  function plants()
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  
	


	
		  $data['plant_list']=$this->pr_model->plant_list();  
		  		

 return  $data['plant_list'];
		  
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



//Add Employee in Claim master
public function addElarEmp()
{
		$this->load->helper('url');
		$this->load->view('Admin/addClaimEmp');
} 


//Add claim employee 

public function claimAddEmployee(){
		   date_default_timezone_set('Asia/Kolkata');
 
			$date=date('Y-m-d');
	 $emp_code=$this->input->post('emp_code');
	$exist=$this->Admin_model->elarEmpCheck($emp_code);
 
 if($exist == false){
		$data = array(
'emp_code' =>  $this->input->post('emp_code'),
'reporting_autho'=>  $this->input->post('repAutho'),
'reporting_level'=>  $this->input->post('repLevel'),
'from_date'=>$date,
'to_date'=>$this->input->post('repToDate'),
'rec_date'=>$date,
'rep_mst_status'=>$this->input->post('repStatus'),



);
		$result=$this->Admin_model->claimAddEmployee($data);
	
 $this->load->helper('url');
  $this->load->view('Admin/index',$data);
 }
 else {
	 ?>
	 <script>
	 alert('Employee Already Present');
	 </script>
	 <?php 
	 
	  $this->load->helper('url');

	  $this->load->view('Admin/index');
	 
 }
	
}
//grade list 14/08/2019
	
	function listgrade()
{
	
	$this->load->database();  
	 $data['grade']=$this->Admin_model->listgrade();  
	return  $data['grade'];
		  
} 
 
	   function fetch_grade_nm($grade)//Full Department name from dept_master
{
	
	$this->load->database();  
    $this->load->model('Admin/Admin_model');  	
	$data['grade']=$this->Admin_model->fetch_grade_nm($grade);  		  		
	return  $data;
}


	   function fetch_elar_dhid($cash_rep)//rep autho ID from rep grid table 2019-11-28
{
	
	$this->load->database();  
    $this->load->model('purchase/Admin_model');  	
	$data['reporting_autho']=$this->Admin_model->fetch_elar_dhid($cash_rep);  		  		
	return  $data;
}


	}
