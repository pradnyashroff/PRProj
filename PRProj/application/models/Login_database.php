<?php

Class login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('employee_master', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
public function login($emp_code,$encrypted) {
$condition = "emp_code =" . "'" . $emp_code . "' AND " . "emp_password =" . "'" . $encrypted . "'";
//$condition = "emp_code =" . "'" . $data['emp_code'] . "' AND " . "emp_password =" . "'" . $data['emp_password'] . "'";
$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($emp_code) {

$condition = "emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}



public function change_pwd($data,$emp_code)  
      {
          
	  
	   $this->db->where('emp_id', $emp_code);
       $this->db->update('employee_master',$data);
         
		 
		 
		 
		 if ($this->db->affected_rows() > 0) {
return true;
}
 else {
return false;
}
		 
		 
		 
      }
      
      
      
        
	  //password enccyption 
	  
	  public function pwd_encrypt(){
		  
		
$this->db->select('*');
$this->db->from('employee_master');

$query = $this->db->get();
return $query;

}

public function pwd_encryptUpdate($encrypted,$ecode){
	
	   $query=$this->db->query("update employee_master SET emp_password='$encrypted' where emp_code='".$ecode."'");

}

}

?>