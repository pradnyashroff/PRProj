<?php
class qcs_model extends CI_Model{
function __construct() {
parent::__construct();
}


	  #######################QCS 
	public function pr_approved_ph($emp_code) { //pr master pending pr at PH end emp-wise
	$condition = "pr_source_id =" . "'" . $emp_code . "' and pr_state ='PH_approved' ";

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
	  
	  
	  
	  
	  #######################  QCS END
	  public function pr_type_list() {
$this->db->select('*');
$this->db->from('pt_type');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
 public function plant_list() {
$this->db->select('*');
$this->db->from('plant_master');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function pr_item_list($emp_code) {
	$condition = "pr_id =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('pr_items');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function fetchpr($pr_id) {
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

public function pr_master_list($emp_code) {
	$condition = "pr_state !='draft' and pr_owner =" . "'" . $emp_code . "'";

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
public function pr_master_list_draft($emp_code) {//show only draft pr
	$condition = "pr_state ='draft' and pr_owner =" . "'" . $emp_code . "'";

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

public function pr_master_list_rejected($emp_code) { // show only Rejected PR
	$condition = "pr_state ='DH_reject' OR pr_state ='PH_reject' and pr_owner =" . "'" . $emp_code . "'";

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


public function submited_pr_master_list($emp_code) {//submited pr by engg or anyone which is not in draft mode empl wise
	$condition = "pr_state != 'draft' and pr_owner =" . "'" . $emp_code . "' ";

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
public function pr_submited_dh_list($emp_code) { // pr master pending pr at DH end emp-wise
	$condition = "dh_id =" . "'" . $emp_code . "' and pr_state ='submited_dh' ";

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

public function pr_submited_ph_list($emp_code) { //pr master pending pr at PH end emp-wise
	$condition = "ph_id =" . "'" . $emp_code . "' and pr_state ='DH_approved' ";

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
/*
public function pr_approved_source($emp_code) { //pr master pending pr at PH end emp-wise
	$condition = "pr_source_id =" . "'" . $emp_code . "' and pr_state ='sourcing_approved' ";

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
*/

public function pr_approved_source($emp_code) { //pr master pending pr at PH end emp-wise
	//$condition = "pr_source_id =" . "'" . $emp_code . "' and pr_state ='sourcing_approved' ";
	$condition = "pr_master.pr_source_id =" . "'" . $emp_code . "' and pr_master.pr_state ='sourcing_approved' and pr_items.qcs_gen = 'null'  ";
	$this->db->DISTINCT();
	$this->db->select('pr_master.pr_id,pr_master.pr_date,pr_master.pr_owner_name,pr_master.delivary_loc,pr_master.procurement_res,pr_master.pr_state');
//$this->db->select('*');
$this->db->from('pr_master');
$this->db->where($condition);
$this->db->  join('pr_items', 'pr_master.pr_id = pr_items.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


public function listapproved_pr_submited_dh($emp_code) { //aprroved pr by dh emp_code wise
	$condition = "dh_id =" . "'" . $emp_code . "' and dh_comment != 'NULL' ";

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
public function listapproved_pr_submited_ph($emp_code) { //aprroved pr by ph emp_code wise
	$condition = "ph_id =" . "'" . $emp_code . "' and ph_comment != 'NULL' ";

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

public function fetch_dh_name($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";

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


public function is_PH($emp_code) {
	$condition = "ph_id =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('plant_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return true;
} else {
return false;
}
}
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

 public function fetch_source_id($plant_code) {
$condition = "plant_code ='" . $plant_code ."'";
$this->db->select('plant_source_id');
$this->db->from('plant_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}


public function fetch_cap_source_id($pr_type) {
	$condition = "pt_id =" . "'" . $pr_type . "'";

$this->db->select('source_emp_code');
$this->db->from('pt_type');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->source_emp_code;
} else {
return false;
}
}
	####################### 
#########  update################
	  
	  
 public function update_item_withpr($new_id,$old_id)  
      {  
	  
	   $this->db->where('pr_id', $old_id);
       $this->db->update('pr_items',$new_id);
         
      }  
	  
	   public function updatedraft($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$data);
         
      }  

	  public function pr_status_upd($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$data);
         
      }  
            function pr_status_insert($data){
  $query = $this->db->insert('status_master', $data);
           return $query;  

}

//new qcs code 31 jan
//emp name
public function fetch_empname($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";

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


  //emp name
public function emp_name_pr($emp_id) {
	$condition = "emp_code =" . "'" . $emp_id . "'";

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


public function qcs_master_list_draft($emp_code) {//show only draft pr
	//$condition = "qcs_status ='Draft' and qcs_emp_code =" . "'" . $emp_code . "'";
	$condition = "qcs_emp_code =" . "'" . $emp_code . "'";
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



//Qcs insert
function qcs_insert($data){
  $query = $this->db->insert('qcs_master', $data);
  
           return $query;  

}

//QCS detail for draft view 
public function qcs_detail($qcs_id) {
	$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->JOIN('pr_master','qcs_master.pr_id = pr_master.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//qcs history show in bottom of view qcs page
public function qcs_history($qcs_id) {
	$condition = "pr_id =" . "'" . $qcs_id . "'";

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
//qcs detail for step 2
public function qcs_detail_steptwo($qcs_id) {
	$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->JOIN('pr_master','qcs_master.pr_id = pr_master.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//pr owner name in step 2 page 
public function fetch_pr_name($prid) {
	$condition = "pr_id =" . "'" . $prid . "'";

$this->db->select('pr_owner_name');

$this->db->from('pr_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->pr_owner_name;
	//return $query->row()->emp_email;
	
} else {
return false;
}
}

// qcs step2 insert
function qcs_step2_insert($data){
  $query = $this->db->insert('tbl_qcs_technical_spec', $data);
   return $query;  

}
//file upload
function insertfiles($data){
  $query = $this->db->insert('tbl_qcs_file_master', $data);
           return $query;  

}

 //supllier and justification update
   public function qcs_step_upd($id,$dataupdate)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('qcs_master',$dataupdate);
         
      } 
	  
	//pr status update as  qcs_draft  //not use 21-09
	 public function pr_step_upd($id,$pr_status_update)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$pr_status_update);
         
      } 

//id for step1 SELECT MAX(qcs_id) AS `maxid` FROM `qcs_master`
public function qcs_last_inserid() {
	//$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->order_by("qcs_id","DESC");
$this->db->limit('1');
//$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	  
	  //add item in QCS
 function item_insert($data){
 $query = $this->db->insert('qcs_item', $data);
       return $query;  

}




 //qcs id  update in pr_itm table 
   public function qcs_itm_upd($id,$itemupdate)  
      {  
	  
	   $this->db->where('item_id', $id);
       $this->db->update('pr_items',$itemupdate);
         
      }

//view qcs item in step 2page
public function view_qcs_items($qcs_id) {
	$condition = "qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_item');
$this->db->where($condition);
$this->db->order_by("qcs_item_id ", "DESC");
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//edit qcs item in step 2page
public function edit_qcs_items($qcs_item_id) {
	$condition = "qcs_item_id  =" . "'" . $qcs_item_id . "'";

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

//qcs detail show related to qcs_item id 
public function qcs_detail_itemid($qcs_item_id) {
	$condition = "qcs_item.qcs_item_id  =" . "'" . $qcs_item_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('qcs_item', 'qcs_master.qcs_id = qcs_item.qcs_id'); 
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//delete item at that time qcs gen will null  
  public function qcs_itm_gen($del_itemid,$data)  //10 avb
      {  
	  
	   $this->db->where('item_id', $del_itemid);
       $this->db->update('pr_items',$data);
         
      }
//update item 
	
public function update_qcs_item($id,$data)  
      {  
	  
	   $this->db->where('qcs_item_id', $id);
       $this->db->update('qcs_item',$data);
         
      }
	 	  
//item name show 
public function fetch_item_nm($item_code) {
	$condition = "item_id =" . "'" . $item_code . "'";

$this->db->select('item_code');
$this->db->from('pr_items');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->item_code;
} else {
return false;
}
}	  

//step2 pending list qcs_step2_list
public function qcs_step2_list($emp_code) {
	
	$condition = "pr.pr_id=qm.pr_id AND qcs_status ='Incomplete_Qcs' and  qcs_emp_code =" . "'" . $emp_code . "'";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');

$this->db->where($condition);
//$this->db->order_by("qcs_id","DESC");
//$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
 //step1 draft data update
   public function draft_step1_upd($id,$step1_update)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('qcs_master',$step1_update);
         
      }
	  // qcs draft step2 quatation attachment
	  	  public function filefetch_qcs($qcs_id) {
$condition = "qcs_id =" . "'" . $qcs_id ."'";
$this->db->select('*');
$this->db->from(' tbl_qcs_file_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//fetch approval1 source id
public function fetch_sourcing_approval1($approval1) {
	$condition = "pt_id =" . "'" . $approval1 . "'";

$this->db->select('approval_level1');
$this->db->from('pt_type');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->approval_level1;
} else {
return false;
}
}
//fetch approval2 source id 
public function fetch_sourcing_approval2($approval2) {
	$condition = "pt_id =" . "'" . $approval2 . "'";

$this->db->select('approval_level2');
$this->db->from('pt_type');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->approval_level2;
} else {
return false;
}
}
//fetch approval3 source id 
public function fetch_sourcing_approval3($approval3) {
	$condition = "pt_id =" . "'" . $approval3 . "'";

$this->db->select('approval_level3');
$this->db->from('pt_type');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->approval_level3;
} else {
return false;
}
}

//fetch approval4 source id 
public function fetch_sourcing_approval4($approval4){
	$condition = "pt_id =" . "'" . $approval4 . "'";
	$this->db->select('approval_level4');
	$this->db->from('pt_type');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows()>=1){
		return $query->row()->approval_level4;
	}
	else{
		return false;
	}
	}
//qcs step2 draft mode technical details update

public function qcs_draft_step2($id,$step2_update)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('tbl_qcs_technical_spec',$step2_update);
         
      }
	  
	  //qcs_draft_step2_qcsmaster qcs_master data update in step2
	  
public function qcs_draft_step2_qcsmaster($id,$step2_qcs_data)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('qcs_master',$step2_qcs_data);
         
      }
	  	  
//submited_Sourcing_Mgr data update	  
public function qcs_attachments_update($id,$data_attachment)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('qcs_master',$data_attachment);
         
      }
	  //pr status update  submited_Sourcing_Mgr  //not use 21-09
	  public function pr_status_sourcing_mgr($id,$pr_status_qid)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$pr_status_qid);
         
      }
//qcs last record show
public function qcs_step2list_lastrecord($emp_code,$pr_id) {
	
	$condition = "qcs_status ='Incomplete_Qcs' and pr_id =" . "'" . $pr_id . "' and   qcs_emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->order_by("qcs_id","DESC");
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//item 
/*
public function pr_item_list_qcs($emp_code) {
	$condition = "pr_id =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('pr_items');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
*/


	  
	  public function pr_item_list_qcs($emp_code) {
$condition = "qcs_master.qcs_id =" . " " . $emp_code . " AND pr_items.qcs_gen = 'null' ";

$this->db->select('*');

$this->db->from('pr_items');
$this->db->where($condition);
$this->db->  join('qcs_master ', 'pr_items.pr_id = qcs_master.pr_id'); 

//$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//pr detail
public function pr_detail_qcs($qcs_id) {
	$condition = "pr_id =" . "'" . $qcs_id . "'";

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
//draft qcs //step2 pending list qcs_step2_list
public function list_qcs_draft($emp_code) {
$condition = "pr.pr_id=qm.pr_id AND qcs_status ='Qcs_Draft' AND qm.qcs_emp_code =" . "'" . $emp_code . "'";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
//$this->db->order_by("qcs_id","DESC");
//$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//qcs  draft page tech specification show

public function qcs_techspec_show($qid) {
	$condition = "qcs_id =" . "'" . $qid . "'";

$this->db->select('*');
$this->db->from('tbl_qcs_technical_spec');
$this->db->where($condition);
$this->db->limit(1); 
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//submit for approval 1
function qcs_status_insert($statusdata){
  $query = $this->db->insert('qcs_status_master', $statusdata);
           return $query;  

}

//QCS approval1 sourcing manager list display 
public function list_sourcing_mgr_approval1($emp_code) {

$condition = "pr.pr_id=qm.pr_id AND approval_level1 =" . "'" . $emp_code . "' and qcs_status ='submited_Sourcing_Mgr' ";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//sourcing manager aprroved /Rejected status update 

  public function qcs_status_sourcing_mgr($id,$data)  
      {  
	  
	   $this->db->where('qcs_id', $id);
       $this->db->update('qcs_master',$data);
         
      } 

//QCS approval_two sourcing head list display 
public function list_sourcing_head_approval2($emp_code) {

$condition = "pr.pr_id=qm.pr_id AND approval_level2 =" . "'" . $emp_code . "' and qcs_status ='Sourcing_Mgr_approved' ";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	 
//fetch status date_time by qcs soucing mgr and approval_id
public function fetch_status_sourcing_mgr($qcs_id,$approval_id) { 
	$condition = "qcs_id =" . "'" . $qcs_id . "' and  qcs_approval_id =" . "'" . $approval_id . "' and qcs_status_name!='1' ";

$this->db->select('qcs_status_date');
$this->db->from('qcs_status_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->qcs_status_date;
} else {
return false;
}
}
//QCS list rejected	
public function qcs_rejected_list($emp_code) { // show only Rejected PR
	/*$condition = "pr_state ='DH_reject' OR pr_state ='PH_reject' OR pr_state ='sourcing_reject' OR pr_state = 'Sourcing_Head_Reject' and pr_owner =" . "'" . $emp_code . "'";*/
	
$condition = "pr.pr_id=qm.pr_id and qcs_emp_code =" . "'" . $emp_code . "'and (qcs_status ='Sourcing_Mgr_reject' OR qcs_status ='Sourcing_Head_Reject' OR qcs_status ='CFO_Reject' OR qcs_status ='COO_Reject'OR qcs_status ='QCS_Reject')";

$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 


//QCS pproval_3 sourcing CFO list display 
public function list_cfo_approval1($emp_code) {

$condition = "pr.pr_id=qm.pr_id AND approval_level3 =" . "'" . $emp_code . "' AND qcs_status ='Sourcing_Head_Approved'  ";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//QCS pproval_4 sourcing COO list display 
public function list_coo_approval1($emp_code) {

$condition = "pr.pr_id=qm.pr_id AND approval_level4 =" . "'" . $emp_code . "' and qcs_status ='CFO_Approved' ";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//qcs owner shows pending qcs
public function list_pending_qcs($emp_code) {
//$condition = "pr.pr_id=qm.pr_id AND qcs_status !='Incomplete_Qcs' and qcs_status !='Qcs_Draft'   and qcs_status != 'COO_Approved'  and qcs_emp_code =" . "'" . $emp_code . "' ";


$condition = "pr.pr_id=qm.pr_id AND qcs_status !='Incomplete_Qcs' and qcs_status !='Qcs_Draft' and qcs_status !='Qcs_Draftt' AND qcs_status !='Incomplete_Qcss' and qcs_status != 'QCS_Approved'  and qcs_emp_code =" . "'" . $emp_code . "' ";


$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
$query = $this->db->get();
if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Approved qcs list  and qcs_status != 'COO_Approved'
public function list_approved_qcs($emp_code) {
	//$condition = "qcs_status  = 'COO_Approved' OR qcs_status = 'Sourcing_Head_Approved' and pr_type = '13'   and qcs_emp_code =" . "'" . $emp_code . "'";
	
	
	$condition = "pr.pr_id=qm.pr_id AND qcs_status  = 'QCS_Approved' and qcs_emp_code =" . "'" . $emp_code . "'";



$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//Approved qcs list  and qcs_status = 'COO_Approved' in PR Section
public function list_approved_pr_qcs($emp_code) {
	
//$condition = "qcs_status  = 'COO_Approved' and pr_owner_empcode =" . "'" . $emp_code . "'";

$condition = "qcs_status  = 'QCS_Approved' and pr_owner_empcode =" . "'" . $emp_code . "'";   //10AUG



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



//Approved qcs list  by sourcing manager
public function approved_list_by_sou_mgr($emp_code) {
	
	$condition = "pr.pr_id=qm.pr_id AND approval_level1  = " . "'".$emp_code."' and approval_level1_comment!= 'NULL'";


$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//Approved qcs list  by sourcing Head
public function approved_list_by_sou_head($emp_code) {
	
	$condition = "pr.pr_id=qm.pr_id AND approval_level2  = " . "'".$emp_code."' and approval_level2_comment!= 'NULL'";


$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function approved_list_by_cfo($emp_code){
	$condition="pr.pr_id=qm.pr_id AND approval_level3 = " . "'".$emp_code."' and approval_level3_comment!= 'NULL'";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');

$this->db->from('qcs_master qm, pr_master pr');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
	
}

public function approved_list_by_coo($emp_code){
	$condition="pr.pr_id=qm.pr_id AND approval_level4 = " . "'".$emp_code."' and approval_level4_comment!= 'NULL'";
    $this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
    $this->db->from('qcs_master qm, pr_master pr');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
	
}
// approval history
function qcs_approver_history($datahistory){
  $query = $this->db->insert('qcs_approval_history', $datahistory);
           return $query;  

}

 //Approver history
    
public function qcs_approver_history_id($qcs_id) { 
	
	$condition = " qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_approval_history');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function list_pr_source_approved_sourcing($emp_code) { //pr master pending pr at PH end emp-wise

$condition = "pr_source_id =" . "'" . $emp_code . "' and pr_state ='sourcing_approved'  ";

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


public function listpr_approved_source($emp_code) { //pr master pending pr at PH end emp-wise
	
	$condition = "pr_source_id =" . "'" . $emp_code . "' and pr_state ='sourcing_approved'and pr_state ='sourcing_approvedd'  ";

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

//PR Approval history 
function approval_his_insert($data){
  $query = $this->db->insert('pr_approval_history', $data);
           return $query;  

}


//PR Approved history 
public function pr_approver_history_id($pr_id) {
	
	$condition = "pr_id =" . "'" . $pr_id . "'";


$this->db->select('*');
$this->db->from('pr_approval_history');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//fetch ION NO
public function fetch_ion_no($pr_id) {
	$condition = "pr_id =" . "'" . $pr_id . "'";

$this->db->select('ion_no');

$this->db->from('pr_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->ion_no;
	
	
} else {
return false;
}
}




//Informal PO  approved  list 

public function approved_po($emp_code) { 
	
	
	$condition = "informal_po_status ='PO_Approved' and po_approval_level1 =" . "'" . $emp_code . "'";

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




//list item in PR

public function list_items_pr($qcs_id) {
	$condition = "qcs_master.qcs_id =" . "'" . $qcs_id . "'";

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->JOIN('pr_items','qcs_master.pr_id = pr_items.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//update file
public function updatefiles($data,$draft_qcs_no){
		$this->db->where('qcs_id', $draft_qcs_no);
       $this->db->update('tbl_qcs_file_master',$data);
}




//capex Approve list 
public function capex_approved_record($emp_code){
		$condition = "capex_status ='capex_approved' and qcs_emp_code =" . "'" . $emp_code . "'";

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



//PO and QCS Detail 05 july

public function informal_po_qcs_detail($informal_po_id) {
	
	$condition = "informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from(' tbl_informal_po');
$this->db->where($condition);
$this->db->join('pr_master','tbl_informal_po.pr_id = pr_master.pr_id');
$this->db->join('qcs_master','tbl_informal_po.qcs_id = qcs_master.qcs_id ');
//$this->db->join('qcs_approval_history','tbl_informal_po.qcs_id = qcs_approval_history.qcs_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//view qcs item 05 july
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


 //qcs po Approver history 05 july
    
public function po_qcs_approver_history_id($informal_po_id) { 
	
	$condition = " informal_po_id =" . "'" . $informal_po_id . "'";

$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->where($condition);
$this->db->join('qcs_approval_history','tbl_informal_po.qcs_id = qcs_approval_history.qcs_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



//	QCS Approver history 
public function capex_qcs_approver_history_id($capex_id){
		$condition = "capex_id =" . "'" . $capex_id . "'";

		$this->db->select('*');
		$this->db->from('tbl_capex_master');
		$this->db->where($condition);
		$this->db->join('qcs_approval_history','tbl_capex_master.qcs_id = qcs_approval_history.qcs_id');
		$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}





//***********************16 july 19******************//
//fetch approval4 source id 
public function fetch_sourcing_approval5($approval5){
	$condition = "pt_id =" . "'" . $approval5 . "'";
	$this->db->select('approval_level5');
	$this->db->from('pt_type');
	$this->db->where($condition);
	$query = $this->db->get();
	
	if($query->num_rows()>=1){
		return $query->row()->approval_level5;
	}
	else{
		return false;
	}
	}
	


	//QCS pproval_5 sourcing COO list display 
public function list_mdo_approval1($emp_code) {

$condition = "(approval_level5 =" . "'" . $emp_code . "' OR approval_level3 =" . "'" . $emp_code . "') and pr.pr_id=qm.pr_id and qcs_status ='COO_Approved' ";
$this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
$this->db->from('qcs_master qm, pr_master pr');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//approved by MDO

public function approved_list_by_mdo($emp_code){
	$condition="pr.pr_id=qm.pr_id and (approval_level5 = " . "'".$emp_code."' OR approval_level3 = " . "'".$emp_code."') and approval_level5_comment!= 'NULL'";
 $this->db->select('qm.qcs_id,qm.qcs_date,qm.pr_id,pr.pr_owner_name,pr.procurement_res,qm.plant_code,qm.qcs_status');
    $this->db->from('qcs_master qm, pr_master pr');
	$this->db->where($condition);
	$query = $this->db->get();
	if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
	
}

  public function checkApprovalMaxDate($qcs_id) {
        $condition = " qcs_id =" . "'" . $qcs_id . "' ORDER by q_status_id DESC LIMIT 1";
        $this->db->select('*');
        $this->db->from('qcs_status_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->qcs_status_name;
        } else {
            return false;
        }
    }
    
    //approved by sourcing head 2020-1-13
public function approved_by_sourcing($emp_code) { 
	
	$condition = "pr_master.pr_source_id =" . "'" . $emp_code . "' and pr_master.pr_state ='sourcing_approved' ";
	
	$this->db->select('*');
//$this->db->select('*');
$this->db->from('pr_master');
$this->db->where($condition);

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//INTERPLANT FTGS PR
	
		//count pending ftgs pr sourcing 
		public function pendingFtgsPR($emp_code) 
		{
			$condition = "level_of=4 AND action=0 and action_autho =" . "'" . $emp_code . "'";
			//$condition = "level_of=6 AND action=0 and action_autho =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_action_grid');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}
		}
		
				//count pending ftgs pr sourcing level 5
		public function pendingFtgsPRLevel5($emp_code) 
		{
			$condition = "(level_of=5 || level_of=6 ||level_of=7||level_of=8 ||level_of=9)AND action=0 and action_autho =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_action_grid');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}
		}
		//count Reject ftgs pr sourcing 
		public function rejectFtgsPR($emp_code) 
		{
			$condition = "level_of=6 AND action=2 and action_autho =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_action_grid');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}
		}
		//count Reject ftgs pr sourcing 
		public function approveFtgsPR($emp_code) 
		{
			$condition = "level_of=6 AND action=1 and action_autho =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_action_grid');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}
		}
		
		
}
?>