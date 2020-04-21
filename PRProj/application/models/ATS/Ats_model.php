<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ats_model extends CI_Model{
function __construct() {
        parent::__construct();
        $this->load->database();
    }

function employee_insert($data){
  $query = $this->db->insert('ats_login', $data);
           return $query;  

}
function plant_insert($data){
  $query = $this->db->insert('plants', $data);
           return $query;  

}
function asset_insert($data){
  $query = $this->db->insert('assets_master', $data);
           return $query;  

}
function asset_history($data){
  $query = $this->db->insert('asset_history', $data);
           return $query;  

}

function asset_archive($data){
  $query = $this->db->insert('asset_archive', $data);
           return $query;  

}
function excel_add($data){
  $query = $this->db->insert('assets_master', $data);
           return $query;  

}

function plantlist(){
  
$this->db->select('*');
$this->db->from('plants');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}
function listasset(){
  
$this->db->select('*');
$this->db->from('assets_master');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}


function listarchive(){
  
$this->db->select('*');
$this->db->from('asset_archive');
$this->db->join('assets_master', 'assets_master.aid = asset_archive.asset_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}
function get_hist($aid){
       $condition = "aid ='".$aid."'";

$this->db->select('*');
$this->db->from('asset_history');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}


function fetch_multibarcode($ids){
       $condition = "aid IN (".$ids.")";

$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}

function detailasset($barcode){
     $condition = "barcode ='".$barcode."'";
$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}

function detailassetforarchive($barcode){
     $condition = "barcode ='".$barcode."'";
$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}


function asset_detail($max){
      $condition = "aid ='".$max."'";

$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}

function show_emp_all(){
    $condition = "ats_login.plant_group !='1' ";

$this->db->select('*');
$this->db->from('ats_login');
$this->db->join('plants','ats_login.plant_id=plants.plant_id');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

}


function show_cust_by_id($id){
  $condition = "sup_cust_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('support_customer');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query;
} else {
return false;
}

}








public function cust_upd($id,$data)  
      {  
	  
	   $this->db->where('sup_cust_id', $id);
       $this->db->update('support_customer',$data);
         
      }
public function asset_update($id,$data)  
      {  
	  
	   $this->db->where('aid', $id);
       $this->db->update('assets_master',$data);
         
      }

	  
	  public function check_serial($serial)  
      {  
	  
	 $condition = "scan_asset_no =" . "'" . $serial . "'";
$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return true;
} else {
return false;
}
         
      }  	
	  



public function printBarcodeNo($srNo)
{
    
    	 $condition = "aid =" . "'" . $srNo . "'";
         $this->db->select('*');
$this->db->from('assets_master');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
}
  
  //print Barcode in Table 
function BarcodeTable(){
  $condition = "business_area = 1007"; 
$this->db->select('*');
$this->db->from('assets_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}

} 


//new code
// profile pic 
public function profile_pic_fetch($emp_code){
	$condition = "emp_code =" . "'" . $emp_code . "' ";

$this->db->select('*');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
   
}

?>