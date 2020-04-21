<?php
class Itemcode_model extends CI_Model{
function __construct() {
parent::__construct();
}



//Item code  start 17 feb 2019



//Approved qcs list for ITEM CODE generation
public function qcs_approved_item_gen($emp_code) {
	
$condition = "qcs_item.q_item_code = '0' and qcs_master.qcs_status = 'QCS_Approved' and qcs_master.pr_owner_empcode =" . "'" . $emp_code . "'";

//$condition = "qcs_item.q_item_code = '0' and qcs_master.pr_owner_empcode =" . "'" . $emp_code . "'";

$this->db->DISTINCT();
$this->db->select('qcs_item.qcs_id,qcs_master.qcs_owner, qcs_master.qcs_status,qcs_master.plant_code');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('qcs_item','qcs_master.qcs_id = qcs_item.qcs_id');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

  //item code list for qcs no
  
  public function qcs_itemcode($qcs_id) {
	
$condition = "qcs_item.q_item_code = '0' and qcs_id =" . "'" . $qcs_id . "'";
$this->db->select('*');
$this->db->from('qcs_item');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//darft list for ITEM CODE generation
public function draft_list($emp_code) {

$condition = "item_gen_status = 'Itemcode_Draft' and pr_owner_empcode =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

  //fetch qcs details from qcs_master table pr_qcs_detail_itemcode
 public function pr_qcs_detail_itemcode($qcs_id) {
	
$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Department name fetch
public function fetch_dept_nm($dept_id) {
	$condition = "dept_code =" . "'" . $dept_id . "'";

$this->db->select('dept_name');
$this->db->from('department_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->dept_name;
} else {
return false;
}
}

// itemcode  insert
function create_itemcode($data){
  $query = $this->db->insert('tbl_itemcode_gen', $data);
   return $query;  

}

/*
//Draft mode item code fiile fetch
public function itemcode_file($iten_gen_id) {
	

$condition = "iten_gen_id =" . "'" . $iten_gen_id . "'";
$this->db->select('*');
$this->db->from(' tbl_itemcode_gen');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
*/

//Draft mode item code fiile fetch
public function itemcode_file($iten_gen_id) {
	

$condition = "iten_gen_id =" . "'" . $iten_gen_id . "'";
$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);

$this->db->JOIN('pr_master','tbl_itemcode_gen.pr_id = pr_master.pr_id');
$this->db->JOIN('qcs_master','tbl_itemcode_gen.qcs_id = qcs_master.qcs_id');
$this->db->JOIN('tbl_qcs_technical_spec','tbl_itemcode_gen.qcs_id = tbl_qcs_technical_spec.qcs_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

  
  //item code list for itemcode no 
  
  public function qcs_itemcode_itemid($iten_gen_id) {
	
$condition = "qcs_item.q_item_code = '0' and iten_gen_id =" . "'" . $iten_gen_id . "'";
$this->db->select('*');
$this->db->from('qcs_item');
$this->db->where($condition);
$this->db->join('tbl_itemcode_gen','qcs_item.qcs_id = tbl_itemcode_gen.qcs_id');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//draft mode file update 
	  
public function draftmode_itemcode($id,$draft_itemcode_update)  
      {  
	  
	   $this->db->where('iten_gen_id', $id);
       $this->db->update('tbl_itemcode_gen',$draft_itemcode_update);
         
      }
	  
	  //Submited_taxtation_dept data update	  
public function item_status_update($itemcodeno ,$status_up)  
      {  
	  
	   $this->db->where('iten_gen_id',$itemcodeno);
       $this->db->update('tbl_itemcode_gen',$status_up);
         
      }
	  
	  //insert status in item_status_master item_status_insert
	  
	  public function item_status_insert($statusdata){
		  $query = $this->db->insert('tbl_itemcode_status', $statusdata);
			return $query;
	  }
	 //pr detail    not use
	 
  public function pr_detail_itemcode($pr_id) {
	
	$condition = "pr_id =" . "'" . $pr_id . "'";

$this->db->select('pr_owner');

$this->db->from('pr_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->pr_owner;
	
	
} else {
return false;
}
}

//pr item list display 
public function list_pr_items($iten_gen_id) {
	

$condition = "iten_gen_id =" . "'" . $iten_gen_id . "'";
$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);

$this->db->JOIN('pr_items','tbl_itemcode_gen.pr_id = pr_items.pr_id ');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	





// Qcs item  list display 
public function qcs_items_list($iten_gen_id) {
	

$condition = "iten_gen_id =" . "'" . $iten_gen_id . "'";
$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);

$this->db->JOIN('qcs_item','tbl_itemcode_gen.qcs_id = qcs_item.qcs_id ');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//Approval 1 for ITEM CODE list
public function approval_itemcodelist($emp_code) {

$condition = "item_gen_status = 'Submited_taxtation_dept' and item_gen_approval1 =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//update hsn code 	  
public function update_hsncode($ids ,$dataup)  
      {  
	  
	   $this->db->where('qcs_item_id', $ids);
       $this->db->update('qcs_item',$dataup);
         
      }
	  
	    //update item code 	  
	  public function update_itemcode($q_itm_id,$data)  
      {  
	  
	   $this->db->where('qcs_item_id', $q_itm_id);
       $this->db->update('qcs_item',$data);
         
      }
	  //Taxtation Department aprroved /Rejected status update 

  public function itemcode_status_taxtiondept($id,$data)  
      {  
	  
	   $this->db->where('iten_gen_id', $id);
       $this->db->update('tbl_itemcode_gen',$data);
         
      } 
	  
	  
	  //Itemcode list rejected	
public function rejected_itemc_list($emp_code) { 

	$condition = "item_gen_status ='Reject_by_taxation_dept' and pr_owner_empcode =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Rejected list  by SAP dept 
public function rejected_Sap_list($emp_code) { 

	$condition = "item_gen_status ='Reject_by_sap_dept' and pr_owner_empcode =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Approval 2 for ITEM CODE list
public function sap_approval_itemcodelist($emp_code) {

$condition = "item_gen_status = 'Approve_by_taxation_dept' and item_gen_approval2 =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//pending Itemcode list
public function pending_itemcodelist($emp_code) {

$condition = "item_gen_status != 'Itemcode_Draft'  and item_gen_status != 'Approve_by_sap_dept' and pr_owner_empcode =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//aprove bt SAP dept
public function approved_list_itemcode($emp_code){
	$condition = "item_gen_status = 'Approve_by_sap_dept' and pr_owner_empcode = "."'". $emp_code."'"."";
	$this->db->select('*');
	$this->db->from('tbl_itemcode_gen');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query ->num_rows() >= 1){
		return $query;
	}else{
		return false;
	}
}


	  
	  //SAP Department aprroved /Rejected status update 

  public function itemcode_status_sapdept($id,$data)  
      {  
	  
	   $this->db->where('iten_gen_id', $id);
       $this->db->update('tbl_itemcode_gen',$data);
         
      }

//aprove bt taxtation  dept
public function taxation_approved_list($emp_code){
	$condition = "item_gen_app1_cmt != '' and item_gen_approval1 = "."'". $emp_code."'"."";
	$this->db->select('*');
	$this->db->from('tbl_itemcode_gen');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query ->num_rows() >= 1){
		return $query;
	}else{
		return false;
	}
}

//approve by SAp Department
public function sap_approved_list($emp_code){
	$condition ="item_gen_app2_cmt !='' and item_gen_approval2 = "."'".$emp_code."'"."";
	$this->db->select('*');
	$this->db->from('tbl_itemcode_gen');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query ->num_rows() >=1){
		return $query;
		
	} else{
		return false;
	}
}

//FTGS
	//12-03-2020
 public function deptAuthNavBarStatus($emp_code) 
		 {
		$condition = "auth_status=1 and auth_level=1 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->auth_id;
        } else {
            return false;
        }
    }
	public function plantAuthNavBarStatus($emp_code) 
		 {
		$condition = "auth_status=1 and auth_level=2 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->auth_id;
        } else {
            return false;
        }
    }
	public function ItemCodeAuthNavBarStatus($emp_code) 
	{
		$condition = "auth_status=1 and auth_level=3 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) 
		{
            return $query->row()->auth_id;
        } 
		else 
		{
            return false;
        }
    }
	public function IONCreateAuthNavBarStatus($emp_code) 
	{
		$condition = "auth_status=1 and auth_level=4 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) 
		{
            return $query->row()->auth_id;
        } 
		else 
		{
            return false;
        }
    }
	public function AssetCodeAuthNavBarStatus($emp_code) 
	{
		$condition = "auth_status=1 and auth_level=5 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) 
		{
            return $query->row()->auth_id;
        } 
		else 
		{
            return false;
        }
    }
	public function POCreationAuthNavBarStatus($emp_code) 
	{
		$condition = "auth_status=1 and auth_level=6 and auth_id  =" . "'" . $emp_code . "'";
        $this->db->select('auth_id');
        $this->db->from('ftgs_reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) 
		{
            return $query->row()->auth_id;
        } 
		else 
		{
            return false;
        }
    }  
}
?>