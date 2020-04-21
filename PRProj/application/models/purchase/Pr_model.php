<?php
class pr_model extends CI_Model{
function __construct() {
parent::__construct();
}
function pr_insert($data){
  $query = $this->db->insert('pr_master', $data);
           return $query;  

}
function item_insert($data){
  $query = $this->db->insert('pr_items', $data);
           return $query;  

}
function pr_status_insert($data){
  $query = $this->db->insert('status_master', $data);
           return $query;  

}
function insertfiles($data){
  $query = $this->db->insert('files_master', $data);
           return $query;  

}

	  #######################  
	  public function pr_type_list() {
	      	$condition = "pt_status = 1 " ;
$this->db->select('*');
$this->db->from('pt_type');
$this->db->where($condition);
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

//condition change 2020-01-17

public function pr_master_list($emp_code) {
	$condition = "pr_state !='draft'  and pr_state != 'sourcing_approved' and pr_state != 'DH_reject' and pr_state != 'PH_reject'and pr_state != 'sourcing_reject'  and pr_owner =" . "'" . $emp_code . "'";

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
	$condition = "pr_state ='DH_reject' and pr_owner =" . "'" . $emp_code . "' || pr_state ='PH_reject' and pr_owner =" . "'" . $emp_code . "'|| pr_state ='sourcing_reject' and pr_owner =" . "'" . $emp_code . "'";

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


public function submited_pr_master_list($emp_code) {//submited pr by engg or anyone which is not in draft and sourc approved mode empl wise
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

public function processed_pr_master_list($emp_code) {//Processed pr by engg or anyone which is not in draft and sourc approved mode empl wise
	$condition = "pr_state = 'sourcing_approved' and pr_owner =" . "'" . $emp_code . "' ";

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


public function listapproved_pr_submited_both($emp_code) { //aprroved pr by dh emp_code wise
	$condition = "dh_id =" . "'" . $emp_code . "'  ";

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

//aprroved pr by ph emp_code wise
public function listapproved_pr_submited_ph($emp_code) { 
	$condition = "ph_id =" . "'" . $emp_code . "' and ph_comment != 'NULL' ";
	//$condition = "ph_id =" . "'" . $emp_code . "'  "; //2020-02-29

$this->db->select('*');
$this->db->from('pr_master');
$this->db->order_by('pr_id', 'DESC');
$this->db->limit(100);
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//DH approved 2020-02-29
public function listapproved_DH($emp_code) { 
	$condition = "dh_id =" . "'" . $emp_code . "'  and dh_comment != 'NULL'   ";

$this->db->select('*');
$this->db->from('pr_master');
$this->db->order_by("pr_id", "DESC");
$this->db->limit(100);
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 




//Sourcing  approved 2020-02-29
public function listapproved_pr_sourcing($emp_code) { 
	$condition = "pr_source_id =" . "'" . $emp_code . "'  and source_comment != 'NULL'   ";

$this->db->select('*');
$this->db->from('pr_master');
$this->db->order_by("pr_id", "DESC");
$this->db->limit(100);
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


public function fetch_status_dt($pr_id,$approval_id) { //fetch status date_time by pr and approval_id
	$condition = "pr_id =" . "'" . $pr_id . "' and  approval_id =" . "'" . $approval_id . "' and status_name!='1' ";

$this->db->select('status_date');
$this->db->from('status_master');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->status_date;
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

public function is_PH_dh($emp_code) {
	$condition = "ph_id =" . "'" . $emp_code . "' AND dh_id =" . "'" . $emp_code . "'";

$this->db->select('*');
$this->db->from('pr_master');
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
      
      
	  //update source id in pr master
	    public function pr_sourceid_update($id,$sourceid_update)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$sourceid_update);
         
      }  

	  public function pr_status_upd($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('pr_master',$data);
         
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

//notification
public function draftpr_noti($emp_code) {
$condition = "pr_owner =" . "'" . $emp_code . "' and pr_state ='draft'  ";

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

//pending notification
public function pending_noti($emp_code) {
$condition = "pr_owner =" . "'" . $emp_code . "' and pr_state !='draft'  and pr_state !='sourcing_approved' and pr_state != 'DH_reject' and pr_state != 'PH_reject'and pr_state != 'sourcing_reject' ";

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


public function approved_capex_noti($emp_code){
	$condition = "pr_owner =" . "'". $emp_code ."' and pr_state = 'capex_approved' ";
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


public function emp_detail_fetch($emp_code){
	$condition = "emp_code =" . "'". $emp_code ."' ";
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


public function employee_update($emp_code,$data){
		$this->db->where('emp_code', $emp_code);
       $this->db->update('employee_master',$data);
}


//Approved qcs list  and qcs_status = 'COO_Approved' in PR Section
public function list_approved_pr_qcs($emp_code) {
	
	$condition = "qcs_status  = 'QCS_Approved' and pr_owner_empcode =" . "'" . $emp_code . "'";


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



//pending  qcs list  
public function list_pending_pr_qcs($emp_code) {
	
	$condition = "qcs_status !='Incomplete_Qcs' and qcs_status !='Qcs_Draft' and  qcs_status != 'QCS_Approved' and pr_owner_empcode =" . "'" . $emp_code . "'";


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





//Rejected   qcs list  (qcs_status ='Sourcing_Mgr_reject' OR qcs_status ='Sourcing_Head_Reject' OR qcs_status ='CFO_Reject' OR qcs_status ='COO_Reject'OR qcs_status ='QCS_Reject')
public function list_rejected_pr_qcs($emp_code) {
	
	$condition = "(qcs_status ='Sourcing_Mgr_reject' OR qcs_status ='Sourcing_Head_Reject' OR qcs_status ='CFO_Reject' OR qcs_status ='COO_Reject'OR qcs_status ='QCS_Reject')and pr_owner_empcode =" . "'" . $emp_code . "'";


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


//edit item

    public function get_by_id($id)
	{
		  $condition = "item_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('pr_items');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
	
	
	//update item 
	 public function update_item($data, $editId) {
		
        $this->db->where('item_id', $editId);
        $this->db->update('pr_items',$data);
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


	
		//FTGS
	//02-03-2020
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
	//FTGS PR MENU 03/03/2020
		//FTGS PR Count Draft PR
		public function draftFtgsPRCount($emp_code) 
		{
			$condition = "ftgs_pr_owner_code =" . "'" . $emp_code . "' and ftgs_pr_status = 0  ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_master');
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
		//FTGS PR Count pending PR
		public function pendingFtgsPRCount($emp_code) 
		{
			$condition = "ftgs_pr_owner_code =" . "'" . $emp_code . "' and ftgs_pr_status = 1  ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_master');
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
		//FTGS PR Count Reject PR
		public function rejectFtgsPRCount($emp_code) 
		{
			$condition = "ftgs_pr_owner_code =" . "'" . $emp_code . "' and ftgs_pr_status = 2  ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_master');
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
		//FTGS PR Count Approved PR
		public function approvedFtgsPRCount($emp_code) 
		{
			$condition = "ftgs_pr_owner_code =" . "'" . $emp_code . "' and ftgs_pr_status = 3 ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_master');
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
		//FTGS PR Count pending DH
		public function pendDHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=1 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Reject DH
		public function rejectDHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=1 AND action=2 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Approved DH
		public function approveDHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=1 AND action=1 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count pending PH
		public function pendPHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=2 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Reject PH
		public function rejectPHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=2 AND action=2 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Approved PH
		public function approvePHFtgsPRCount($emp_code) 
		{
			$condition = "level_of=2 AND action=1 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count pending ItemCreation
		public function pendItemFtgsPRCount($emp_code) 
		{
			$condition = "level_of=3 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Reject ItemCreation
		public function rejectItemFtgsPRCount($emp_code) 
		{
			$condition = "level_of=3 AND action=2 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Approved ItemCreation
		public function approveItemFtgsPRCount($emp_code) 
		{
			$condition = "level_of=3 AND action=1 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count pending ION
		public function pendIONFtgsPRCount($emp_code) 
		{
			$condition = "level_of=4 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Reject ION
		public function rejectIONFtgsPRCount($emp_code) 
		{
			$condition = "level_of=4 AND action=2 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Approved ION
		public function approveIONFtgsPRCount($emp_code) 
		{
			$condition = "level_of=4 AND action=1 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count pending Asset
		public function pendAssetFtgsPRCount($emp_code) 
		{
			$condition = "level_of=5 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Reject Asset
		public function rejectAssetFtgsPRCount($emp_code) 
		{
			$condition = "level_of=5 AND action=2 and action_autho =" . "'" . $emp_code . "'";
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
		//FTGS PR Count Approved Asset
		public function approveAssetFtgsPRCount($emp_code) 
		{
			$condition = "level_of=5 AND action=1 and action_autho =" . "'" . $emp_code . "'";
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
		//fetch level 
		public function fetchLevel($emp_code) 
		{
			$condition = "CURDATE() between auth_fromDate and auth_ToDate and auth_id =" . "'" . $emp_code . "'";
			$this->db->select('auth_level');
			$this->db->from('ftgs_reporting_grid');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->auth_level;
			} else {
				return false;
			}
		}
		
		
		
			//FTGS QCS Count pending RUD login
		public function pendlevel2FtgsQcsCount($emp_code) 
		{
			$condition = "level_of=6 AND action=0 and action_autho =" . "'" . $emp_code . "'";
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