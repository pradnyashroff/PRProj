<?php
class Capex_model extends CI_Model{
function __construct() {
parent::__construct();
}
function pr_insert($data){
  $query = $this->db->insert('pr_master', $data);
           return $query;  

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
public function fetch_ph_id($del_loc) {
	$condition = "plant_code =" . "'" . $del_loc . "'";

$this->db->select('ph_id');
$this->db->from('plant_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->ph_id;
} else {
return false;
}
}
######################

public function fetch_ph_ide($del_loc) {
	$condition = "plant_code =" . "'" . $del_loc . "'";

$this->db->select('ph_id');
$this->db->from('plant_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->ph_id;
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

//capex start 18 May 2019


//Approved qcs list  and qcs_status = 'COO_Approved' in CAPEX Section
public function qcs_approved_capexlist($emp_code) {
	
	$condition = "qcs_status  = 'QCS_Approved' AND capex_gen = 'null' AND pr_type != 13 and pr_owner_empcode =" . "'" . $emp_code . "'";


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

//qcs detail fetch for create capex 
public function qcs_detail_capex($qcs_id) {
	$condition = "qcs_master.qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('tbl_qcs_technical_spec ', 'tbl_qcs_technical_spec.qcs_id = qcs_master.qcs_id'); 
$this->db->join('pr_master ', 'pr_master.pr_id = qcs_master.pr_id'); 
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//pr date fetch  for crete capex detail 
public function fetch_pr_date($pr_dt) {
	$condition = "pr_id =" . "'" . $pr_dt . "'";

$this->db->select('pr_date');
$this->db->from('pr_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->pr_date;
} else { 
return false;
}
}




// pr qcs detail fetch for create capex inner join
public function pr_qcs_detail_capex($qcs_id) {
	$condition = "qcs_id =" . "'" . $qcs_id . "' ";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('pr_master ', 'pr_master.pr_id = qcs_master.pr_id'); 

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//DH name fetch  for crete capex detail  
public function fetch_dh_nm($dh_nm) {
	$condition = "emp_id =" . "'" . $dh_nm . "'";

$this->db->select('emp_name');
$this->db->from('employee_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->emp_name;
} else {
return false;
}
}
	
// create capex
public function insert_capex($data){
	$query = $this->db->insert('tbl_capex_master',$data);
	return $query;
}



//asset code  insert
/*
public function insert_asset_code($assetdata){
	$query = $this->db->insert('tbl_asset_code',$assetdata);
	return $query;
}
*/


//capex id update in qcs master
public function capex_gen_update($qcs_id,$capex_gen_up){
	$this->db->where('qcs_id', $qcs_id);
	$this->db->update('qcs_master',$capex_gen_up);
}

public function capex_draft_record($emp_code){
	$condition = "capex_status  = 'capex_draft' AND capex_owner_code =" . "'" . $emp_code . "'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >= 1){
		return $query;
	}
	else{
		return false;
	}
}
 

//capex detail  

public function detail_capex($capex_id){
	$condition = "tbl_capex_master.capex_id =" . "'" . $capex_id . "'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->join('pr_master','tbl_capex_master.pr_id = pr_master.pr_id');
	$this->db->join('qcs_master','tbl_capex_master.qcs_id = qcs_master.qcs_id');
	$this->db->join('tbl_qcs_technical_spec','tbl_capex_master.qcs_id = tbl_qcs_technical_spec.qcs_id');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >= 1){
		return $query;
	}
	else{
		return false;
	}
}


// qcs item list for capex 
public function view_qcs_items($capex_id) {
	
	$sql = 
	$condition = "tbl_capex_master.capex_id =" . "'" . $capex_id . "'";

$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);
$this->db->join('qcs_item ', 'qcs_item.qcs_id = tbl_capex_master.qcs_id');
//$this->db->join('tbl_asset_code', 'tbl_asset_code.capex_id = tbl_capex_master.capex_id');  
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
 
 
 
 //capex question 
 public function capex_ques_detail($capex_id){
	 
	 	$condition = "capex_id =" . "'" . $capex_id . "'";

$this->db->select('*');
$this->db->from('tbl_capex_quest');
$this->db->where($condition);
//$this->db->join('qcs_item ', 'qcs_item.qcs_id = tbl_capex_master.qcs_id'); 
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
	 
 }
 
 
 
 //capex qcs detail

 public function qcs_detail_for_capex($capex_id){

 $condition = "capex_id =" . "'" . $capex_id . "'";

$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);
$this->db->join('qcs_master ', 'qcs_master.qcs_id = tbl_capex_master.qcs_id'); 
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
	 
 }
 
 
 //fetch approval 1
 public function fetch_approval1_empcode(){
	$condition = "action = 'YES' AND cra_level = '1'";

$this->db->select('cra_reporting_emp');
$this->db->from('capex_reporting_action');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->cra_reporting_emp;
	
} else {
return false;
} 
 }
 
 
 //approval 1 email 
  public function fetch_approval1_email_emp(){
	$condition = "action = 'YES' AND cra_level = '1'";

$this->db->select('rep_email');
$this->db->from('capex_reporting_action');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->rep_email;
	
} else {
return false;
} 
 }
 
 //approval1_ level2
 
  public function fetch_approval1_l2_empcode(){
	$condition = "action = 'YES' AND cra_level = '2'";

$this->db->select('cra_reporting_emp');
$this->db->from('capex_reporting_action');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->cra_reporting_emp;
} else {
return false;
} 
 }
 
  //fetch approval 2
 public function fetch_approval2_empcode(){
	$condition = "action = 'NO' AND cra_level = '1'";

$this->db->select('cra_reporting_emp');
$this->db->from('capex_reporting_action');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->cra_reporting_emp;
} else {
return false;
} 
 }
 
 //bujang sir mail ID 
 
  public function fetch_approval2_emp_email(){
	$condition = "action = 'NO' AND cra_level = '1'";

$this->db->select('rep_email');
$this->db->from('capex_reporting_action');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->rep_email;
} else {
return false;
} 
 }
 
 //draft capex master update 05/06/19
 public function capex_mast_update($id,$data){
	    $this->db->where('capex_id', $id);
       $this->db->update('tbl_capex_master',$data);
 }


//draft approval update 
 public function capx_status_update($id1,$data1){
	 $this->db->where('capex_id',$id1);
	   $this->db->update('tbl_capex_master',$data1);
 }
 
 
 //asset code update 

 public function capex_asset_code($id1,$data1){
	 $this->db->where('capex_id',$id1);
	   $this->db->update('tbl_asset_code',$data1);
 }
 
 //pr item list display 
public function list_pr_items($capex_id) {
	

$condition = "tbl_capex_master.capex_id =" . "'" . $capex_id . "'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);

$this->db->JOIN('pr_items','tbl_capex_master.pr_id = pr_items.pr_id ');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



//capex pending list 
public function capex_pending_list($emp_code){
	$condition = "capex_owner_code =" . "'" . $emp_code . "' AND capex_status !='capex_draft' AND capex_status !='capex_approved'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//approval pending list capex_approval_pending_list

public function capex_approval_pending_list($emp_code){
		$condition = "capex_approval1 =" . "'" . $emp_code . "' AND  capex_status ='submitted_to_app1'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//approval 2 pending list capex_approval_pending_list

public function capex_approval2_pending_list($emp_code){
	$condition = "capex_approval2 =" . "'" . $emp_code . "' AND  capex_status ='capex_approved_by_finance'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//approval 3 pending list capex_approval_pending_list

public function capex_approval3_pending_list($emp_code){
	//	$condition = "capex_approval3 =" . "'" . $emp_code . "' AND  capex_status ='capex_approved_by_finance'";
		$condition = "qcs_emp_code =" . "'" . $emp_code . "' AND  capex_status ='capex_approved_by_asset_dept'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//pr item list display  
public function list_pr_items_qid($qcs_id) {
	

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


//Asset group list 
public function asset_grp(){

$this->db->select('*');
$this->db->from('tbl_asset_grp_master');



$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//update 
public function updateItemCodeEdit($q_itm_id,$data)
{
	
		$this->db->where('qcs_item_id',$q_itm_id);
	   $this->db->update('qcs_item',$data);
}


//capex status and comment insert
public function capex_status_update($id,$data){
		$this->db->where('capex_id',$id);
	   $this->db->update('tbl_capex_master',$data);
	   
	    
}
//capex_approver_history

public function capex_approver_history($capex_history){
	$query = $this->db->insert('capex_approver_history',$capex_history);
	return $query;
}


//capex status insert
public function capex_status_insert($capex_status){
	$query = $this->db->insert('capex_status_master',$capex_status);
	return $query;
}


 //Approver history
    
/*public function  capex_approver_history_id($capex_id){
$condition = " capex_id =" . "'" . $capex_id . "'";
$this->db->select('*');
$this->db->from('capex_approver_history');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}*/


 public function capex_approver_history_id($capex_id){
	 
	 $sql = "SELECT
			cah.capex_id,dm.dept_name,em.emp_name,cah.cpx_approval_comment,cah.cpx_approver_status,cah.cpx_approval_date
			FROM capex_approver_history cah , employee_master em , department_master dm
			WHERE cah.capex_id=".$capex_id."
            AND cah.cpx_approval_emp_code = em.emp_code
			AND em.emp_dept = dm.dept_code";
			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }
 

//Rejected list 

public function capex_rejected_record($emp_code){
	
	$condition ="capex_owner_code=" . "'" . $emp_code . "'AND (capex_status = 'capex_rejected_by_mds' OR capex_status = 'capex_rejected_by_finance' OR capex_status = 'capex_rejected')";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
}
 
 

 
 //qcs item for asset code (export to excel)
/* public function qcs_items_assetcode($capex_id){
	 
	 $sql = "SELECT
			tac.asset_id,tac.cost_center,tac.asset_grp, qi.q_item_code,qi.q_item_description,qi.q_req_quantity,qi.q_uom,tcm.cap_unit 
			FROM tbl_asset_code tac, qcs_item qi, tbl_capex_master tcm
			WHERE tac.capex_id=".$capex_id."
            AND qi.qcs_item_id=tac.qcs_item_id
            AND tac.capex_id=tcm.capex_id and qi.q_item_code != '0' and qi.q_item_code != 'NEW'
            and qi.q_item_code != 'new' and qi.q_item_code != '-' and qi.q_item_code != '00' ";
			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }*/
 
 
  //qcs item for asset code 
 public function qcs_items_assetcode($capex_id){
	 
	 $sql = "SELECT
			tac.asset_id,tac.cost_center,tac.asset_grp, qi.q_item_code,qi.q_item_description,qi.q_req_quantity,qi.q_uom,tcm.cap_unit 
			FROM tbl_asset_code tac, qcs_item qi, tbl_capex_master tcm
			WHERE tac.capex_id=".$capex_id."
AND qi.qcs_item_id=tac.qcs_item_id
AND tac.capex_id=tcm.capex_id and qi.q_item_code != '0' and qi.q_item_code != 'NEW'
and qi.q_item_code != 'new' and qi.q_item_code != '-' and qi.q_item_code != '00' ";

			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }
 
  //qcs item for asset code 
 public function qcs_items_assetcode_new($capex_id){
	 
	 $sql = "SELECT
			tac.asset_id,tac.cost_center,tac.asset_grp, qi.q_item_code,qi.q_item_description,qi.q_req_quantity,qi.q_uom,tcm.cap_unit 
			FROM tbl_asset_code tac, qcs_item qi, tbl_capex_master tcm
			WHERE tac.capex_id=".$capex_id."
            AND qi.qcs_item_id=tac.qcs_item_id
            AND tac.capex_id=tcm.capex_id ";
			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }
 //update asset code 
 public function updateAssetCodeEdit($asset_id,$data_asset){
	
	 $this->db->where('asset_id',$asset_id);
	  $this->db->update('tbl_asset_code',$data_asset);
	 
 }
 
 //Approved list 

public function capex_approved_record($emp_code){
	
	$condition ="capex_owner_code=" . "'" . $emp_code . "' AND capex_status = 'capex_approved'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
}


//

public function capex_app_approver_record($emp_code){
	$condition ="capex_approval1=" . "'" . $emp_code . "' AND capex_approval1_cmt != 'NULL'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
}



//capex_app_approver2_record

public function capex_app_approver2_record($emp_code){
	
	$condition ="capex_approval2=" . "'" . $emp_code . "' AND capex_approval2_cmt != 'NULL'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
	
}


//capex_app_approver3_record
public function capex_app_approver3_record($emp_code){
	$condition ="capex_approval3=" . "'" . $emp_code . "' AND capex_approval3_cmt != 'NULL'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
}
//fetch project detail in pR item
public function pr_proj_detail($capex_id) {
	$condition = "capex_id =" . "'" . $capex_id . "'";

$this->db->select('project_detail ');
$this->db->from('tbl_capex_master');
$this->db->where($condition);
$this->db->join('pr_items','tbl_capex_master.pr_id = pr_items.pr_id');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->project_detail;
} else {
return false;
}
}




//approval 4 pending list capex_approval_pending_list

/*public function capex_approval4_pending_list($emp_code){
		$condition = "qcs_emp_code =" . "'" . $emp_code . "' AND  capex_status ='capex_approved_by_asset_dept'";
$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->where($condition);


$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

*/

//glCodeList
public function glCodeList(){

$this->db->select('*');
$this->db->order_by("gl_id", "DESC");
$this->db->from('tbl_gl_code');



$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}




//capex_app_approver4_record
public function capex_app_approver4_record($emp_code){
	$condition ="qcs_emp_code=" . "'" . $emp_code . "' AND capex_approval4_cmt != 'NULL'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
		return false;
	}
}



//glCodeList
public function revenu_glCodeList(){
$condition ="rev_gl_code NOT LIKE '%0%'";
$this->db->select('*');
//$this->db->order_by("rev_gl_code", "DESC");
$this->db->from('tbl_revenue_glcode');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//capex approved list
public function capex_AssetList_Approved(){
	
	$condition ="capex_status 	= 'capex_approved_by_asset_dept'";
	$this->db->select('*');
	$this->db->from('tbl_capex_master');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows() >=1)
	{
		return $query;
	
	} else {
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