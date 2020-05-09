<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllDoc_model extends CI_Model{
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
			
	//fetch cat 
	
	public function fetchCatName(){
		 

			$this->db->select('um_cat');
			$this->db->from('tbl_user_manual');
			$this->db->DISTINCT('um_cat');
			$this->db->ORDER_BY('um_cat','ASC');
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
			return $query;
			} else {
			return false;
}

	}

	
	//Book data 
	function listFetchDocTbl(){
   

				$this->db->select('*');
				$this->db->from('tbl_user_manual');
				$this->db->ORDER_BY('um_cat','ASC');

				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}

				}

}
?>