<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
function __construct() {
parent::__construct();
}
function employee_insert($data){
  $query = $this->db->insert('employee_master', $data);
           return $query;  

}

function dept_insert($data){
  $query = $this->db->insert('departments', $data);
           return $query;  

}




function show_emp_all(){
   

$this->db->select('*');
$this->db->from('employee_master em');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}

function prdata(){
   

$this->db->select('*');
$this->db->from('pr_master');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}
function deptlist(){
   

$this->db->select('*');
$this->db->from('department_master');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}


function show_emp_id($emp_code){
  $condition = "em.emp_code=rg.emp_code AND em.emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('employee_master em , reporting_grid rg');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query;
} else {
return false;
}

}








public function employee_update($emp_code,$data)  
      {  
	  
	   $this->db->where('emp_code', $emp_code);
       $this->db->update('employee_master',$data);
         
      }

	  
	  public function employee_check($emp_code)  
      {  
	  
	 $condition = "emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return true;
} else {
return false;
}
         
      } 
      
      
      
//ELAR Emp 
			public function elarEmpCheck($emp_code)
			{
				$condition = "emp_code =" . "'" . $emp_code . "'";
				$this->db->select('*');
				$this->db->from('reporting_grid');
				$this->db->where($condition);
				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return true;
				} else {
				return false;
				}
				
			}
			
	
//Add employee 
			public function claimAddEmployee($data){
				 $query = $this->db->insert('reporting_grid', $data);
				return $query;  
				
			}
			//Grade Master 14/08/2018
function listgrade(){
   

$this->db->select('*');
$this->db->from('grade_mst');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}
//reporting master insert
function reporting_master_insert($data_rep){
  $query = $this->db->insert('reporting_grid', $data_rep);
           return $query;  

}
	
			
		
//Update reporting authority ELAR
public function employee_reporting_update($emp_code,$data1)  
      {  
	  
	   $this->db->where('emp_code', $emp_code);
       $this->db->update('reporting_grid',$data1);
         
      }
      
      public function fetch_grade_nm($grade_id) {
	$condition = "grade_id =" . "'" . $grade_id . "'";

$this->db->select('grade');
$this->db->from('grade_mst');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->grade;
} else {
return false;
}
}

//rep autho ID from rep grid table use in USer Id 111111 admin login 2019-11-28
public function fetch_elar_dhid($emp_code) {
	$condition = "emp_code =" . "'" . $emp_code . "'";

$this->db->select('reporting_autho');
$this->db->from('reporting_grid');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->reporting_autho;
} else {
return false;
}
}

}
?>