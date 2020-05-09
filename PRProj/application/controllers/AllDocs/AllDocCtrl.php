<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllDocCtrl extends CI_Controller {

	
	 
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
$this->load->model('AllDoc/AllDoc_model');
$this->load->model('purchase/pr_model');
$this->load->model('purchase/Capex_model');
}

	
	
###############################################Redirectiononly###############################################################################
###############################################Insert into DB###############################################################################


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
		$this->load->model('purchase/Capex_model');    
        $data['dept_autho'] = $this->Capex_model->deptAuthNavBarStatus($emp_code);
        return $data;
    }
	function plantAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');   
        $data['PlantHead'] = $this->Capex_model->plantAuthNavBarStatus($emp_code);
        return $data;
    }
	function ItemCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');  
        $data['itemcode'] = $this->Capex_model->ItemCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function IONCreateAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');   
        $data['IONCreate'] = $this->Capex_model->IONCreateAuthNavBarStatus($emp_code);
        return $data;
    }
	function AssetCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model');  
        $data['AssetCode'] = $this->Capex_model->AssetCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function POCreationAuthNavBarStatus($emp_code) 
	{
        $this->load->database();  
		$this->load->model('purchase/Capex_model'); 
        $data['POCreation'] = $this->Capex_model->POCreationAuthNavBarStatus($emp_code);
        return $data;
    }

/******************** Doc code ******************************************/

	public function DocsList(){
		$this->load->helper('url');
		$this->load->view('AllDocs/DocsList');
	}
	
	
	public function listFetchDocTbl(){
		$this->load->database();  
		$this->load->model('AllDoc/AllDoc_model');  	
		$data['list']=$this->AllDoc_model->listFetchDocTbl();  		  		
		return  $data['list'];
	}
	
	public function fetchCatName(){
		$this->load->database();  
		$this->load->model('AllDoc/AllDoc_model');  	
		$data['list']=$this->AllDoc_model->fetchCatName();  		  		
		return  $data['list'];
	}	
	
	}
