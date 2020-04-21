<?php
class Informal_po_model extends CI_Model{
function __construct() {
parent::__construct();
}




public function pr_detail($pr_id) {
	$condition = "pr_id =" . "'" . $pr_id . "'";

$this->db->select('*');
$this->db->from('pr_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

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


//emp email id PH/DH
public function fetch_user_eid($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";

$this->db->select('emp_email');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->emp_email;
} else {
return false;
}
}

//email oh
public function fetchemp_email($ph_id) {
	$condition = "emp_code =" . "'" . $ph_id . "'";

$this->db->select('emp_email');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->emp_email;
} else {
return false;
}
}

public function fetch_dh_name($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";

$this->db->select('emp_name');

$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->emp_name;
	//return $query->row()->emp_email;
	
} else {
return false;
}
}

//ph email 
public function fetch_dh_email($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";
$this->db->select('emp_email');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	
	return $query->row()->emp_email;
	
} else {
return false;
}
}

//end


public function fetch_pr_type_nm($pt_id) {
	$condition = "pt_id =" . "'" . $pt_id . "'";

$this->db->select('pt_name');
$this->db->from('pt_type');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->pt_name;
} else {
return false;
}
}





#######################  
	  public function fetchfiles($pr_id) {
$condition = "pr_id =" . "'" . $pr_id ."'";
$this->db->select('*');
$this->db->from('files_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 0) {
return $query;
} else {
return false;
}
}

//Informal_po_model start 03 Aprb 2019


//coo_approved for PO generation
public function qcs_approved_polist($emp_code) {
	
	$condition = "qcs_status  = 'QCS_Approved' and infomal_po_gen = 'null' and pr_type = 13 and  pr_owner_empcode =" . "'" . $emp_code . "'";


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



//qcs detail 
public function qcs_detail_po($qcs_id) {
	$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('pr_master','qcs_master.pr_id = pr_master.pr_id');
//$this->db->join('','qcs_master.pr_id = pr_items.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//pr item list display 
public function list_pr_items($qcs_id) {
	

$condition = "qcs_id =" . "'" . $qcs_id . "'";
$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);

$this->db->JOIN('pr_items','qcs_master.pr_id = pr_items.pr_id ');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	


//PO insert
function insert_po($data_insert){
  $query = $this->db->insert('tbl_informal_po', $data_insert);
  
           return $query;  

}

//	informal_po_gen update in qcs_master table    


   public function po_gen_up($qcs_id,$info_po_gen_up)  
      {  
	  
	   $this->db->where('qcs_id', $qcs_id);
       $this->db->update('qcs_master',$info_po_gen_up);
         
      }


//informal _po approval1 list 


public function informal_po_approval1($emp_code) {

$condition = "po_approval_level1 =" . "'" . $emp_code . "' and informal_po_status ='informal_po_created' ";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//qcs detail 
public function informal_po_detail($informal_po_id) {
	
	$condition = "informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from(' tbl_informal_po');
$this->db->where($condition);
$this->db->join('pr_master','tbl_informal_po.pr_id = pr_master.pr_id');
$this->db->join('qcs_master','tbl_informal_po.qcs_id = qcs_master.qcs_id ');
//$this->db->join('tbl_qcs_file_master','tbl_informal_po.qcs_id = tbl_qcs_file_master.qcs_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


public function qcs_techspec_show_po($informal_po_id) {
	$condition = "informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);
$this->db->join('tbl_qcs_technical_spec','tbl_informal_po.qcs_id = tbl_qcs_technical_spec.qcs_id ');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

	  // qcs draft step2 quatation attachment
	  	  public function filefetch_qcs_po($informal_po_id) {
$condition = "informal_po_id =" . "'" . $informal_po_id ."'";
$this->db->select('*');
$this->db->from(' tbl_informal_po');
$this->db->where($condition);
$this->db->join('tbl_qcs_file_master','tbl_informal_po.qcs_id = tbl_qcs_file_master.qcs_id ');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//view qcs item 
public function qcs_items_po($informal_po_id) {
	$condition = "informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);
$this->db->join('qcs_item','tbl_informal_po.qcs_id = qcs_item.qcs_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



//pr item list display  
public function list_pr_items_po($informal_po_id) {
	

$condition = "informal_po_id =" . "'" . $informal_po_id . "'";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$this->db->JOIN('pr_items','tbl_informal_po.pr_id = pr_items.pr_id ');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	


//approval1 comment and status update 
public function approval1_po($info_po,$data){
	   $this->db->where('informal_po_id', $info_po);
       $this->db->update('tbl_informal_po',$data);
}

//submit for approval 1
function info_po_status_insert($statusdata){
  $query = $this->db->insert('tbl_informalpo_status', $statusdata);
           return $query;  

}





//fetch status date 
public function fetch_po_status_dt($informal_po_id,$approval_id) { 
	$condition = "informal_po_id =" . "'" . $informal_po_id . "' and  ipo_approval_id =" . "'" . $approval_id . "' ";

$this->db->select('ipo_date');
$this->db->from('tbl_informalpo_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->ipo_date;
} else {
return false;
}
}

//rejected list
public function informal_po_rejectlist($emp_code){
	$condition = "informal_po_empcode =" . "'" . $emp_code . "' and informal_po_status ='PO_Reject' ";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	


//approver history
public function po_approver_history_id($informal_po_id) { 
	
	$condition = "informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from('informalpo_approval_history');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 
 // approval history
function po_approver_history($datahistory){
  $query = $this->db->insert('informalpo_approval_history', $datahistory);
           return $query;  

}

//rejected po forword to strting  update status po_created

public function reject_draft_po($informal_po_no ,$data_up){
	   $this->db->where('informal_po_id', $informal_po_no);
       $this->db->update('tbl_informal_po',$data_up);
}
//approved PO 
public function approved_po($emp_code){
	$condition = "informal_po_empcode =" . "'" . $emp_code . "' and informal_po_status ='PO_Approved'  ";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



//pending list

public function pending_po_list($emp_code){
	$condition = "informal_po_empcode =" . "'" . $emp_code . "'    and informal_po_status !='PO_Approved'";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//approval1 approved list

public function informal_po_approved1list($emp_code) {
	
	$condition = "po_approval_level1  = " . "'".$emp_code."' and po_approval_level1_cmt!= 'NULL'";
	//$condition2 = "po_approval_level2  = " . "'".$emp_code."' and po_approval_level2_cmt!= 'NULL'";


$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);
//$this->db->where($condition2);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



//informal _po approval2 list 

/*
public function informal_po_approval2($emp_code) {

$condition = "qcs_approval =" . "'" . $emp_code . "' and informal_po_status ='MDO_Approved' ";
$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

*/

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