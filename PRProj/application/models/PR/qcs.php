<?php
class qcs extends CI_Model{
function __construct() {
parent::__construct();
}
function pr_insert($data){
  $query = $this->db->insert('tbl_purchase', $data);
           return $query;  

}

function capex_insert($data){
  $query = $this->db->insert('tbl_capex', $data);
           return $query;  

}


function ccs_insert($data){
  $query = $this->db->insert('tbl_ccs', $data);
           return $query;  

}

function stat_insert($data){
  $query = $this->db->insert('tbl_stats', $data);
           return $query;  

}

function insertcapfile($data){
  $query = $this->db->insert('capex_files', $data);
           return $query;  

}




	  
	  
	 	  public function show_pr_by_id($id) {
$condition = "pr_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query;
} else {
return false;
}
}



public function show_capex_pr_by_id($id) {
$condition = "pr_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('tbl_capex');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query;
} else {
return false;
}
}




	 public function show_ccs_pr_by_id($id) {
$condition = "pr_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('tbl_ccs');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query;
} else {
return false;
}
}
	  
	  public function show_pr_by_status($status,$pr_by) {
$condition = "status =" . "'" . $status . "'AND pr_by_id =" . "'" . $pr_by ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	 
	  public function show_pr_by_status_not($status,$pr_by) {//for all TM status which is not 0
$condition = "status <>" . "'" . $status . "'AND pr_by_id =" . "'" . $pr_by ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	
	
	public function fetch_stats($id) {
$condition = "pr_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('tbl_stats');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	
//for lead approval
	public function show_pr_is_lead($status,$username) {
$condition = "is_lead_approved =" . "'" . $status . "'AND pro_lead =" . "'" . $username ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//for lead approval
	public function show_pr_is_lead_not($status,$username) {
//$condition = "is_lead_approved <>" . "'" . $status . "' AND  status <> '0' AND pro_lead =" . "'" . $username ."' order by pr_id desc";
$condition = "is_lead_approved <>" . "'" . $status . "' AND  is_lead_approved <> 'Rejected' AND pro_lead =" . "'" . $username ."' order by pr_id desc";

$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function show_pr_is_lead_concern($status,$username) {
$condition = "status =" . "'" . $status . "'AND pro_lead =" . "'" . $username ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//for lead approval end

	
	//###########################pr by user####################
public function show_pr_by_userid($status,$user_id) {
$condition = "status =" . "'" . $status . "'AND user_id =" . "'" . $user_id ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	//#######################################by user end####################



 public function updstatus($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	  
	   public function updstatuslead($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	  
	  #################cost comp sheet upd add in tbl_purchase############
	  public function updccs($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	  
	   public function updcapex($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	   public function updfile($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	   public function upd_rejcetby_id($id,$data)  
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	   public function amd_pr($data,$id)  //amend PR
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	   public function amd_capex($data,$id)  //amend PR
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_capex',$data);
         
      }  	
	   public function amd_ccs($data,$id)  //amend PR
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_ccs',$data);
         
      }  	

	  public function hidepr($id,$data)  //amend PR
      {  
	  
	   $this->db->where('pr_id', $id);
       $this->db->update('tbl_purchase',$data);
         
      }  	
	  
	  #################cost comp sheet upd add in tbl_purchase############
	  ####################cmt table fetch cmt by id###############
	  
	   	  public function show_cmt_by_id($id) {
$condition = "pr_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('tbl_stats');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	  ####################END cmt table fetch cmt by id###############
	  ####################show all pr to store only###############
	  
	    public function show_pr_by_status_store($status) {
$condition = "status =" . "'" . $status . "'AND is_lead_approved = '1' AND display_flag = '1' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 

public function show_pr_by_status_store_admin() {
$condition = "status ='1on' OR status ='1off' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


public function show_pr_by_status_store_not_admin() {
$condition = "status <> '0' AND status <> '1on' AND status <> '1off'  AND is_lead_approved = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');

$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


public function show_pr_by_status_store_not_mdo() {
$condition = "status <> '0' AND status <> '1on' AND status <> '1off' AND status <> '2' AND status <> '3aapp'  AND is_lead_approved = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

public function show_pending_mdo() {
$condition = "status = '3aapp'  AND is_lead_approved = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
public function show_pending_lead($username) {
$condition = "status = '0'  AND is_lead_approved = '0' And pro_lead= '" . $username  ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


	     public function show_pr_by_status_store_not() {
$condition = "status <> '0' AND status <> '1on' AND status <> '1off' AND is_lead_approved = '1' AND display_flag = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	  
	  
	  ####################show all pr to store only end###############
	  
 public function show_all_user() {
$condition = "group_id=2";
$this->db->select('*');
$this->db->from('portal_user_login');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	#######################  showing all pr by revise format###################
	
	
	public function show_allpr() {
$this->db->select('*');
$this->db->from('tbl_purchase');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	
	
	public function show_allpr_admin() {
$condition = "status <> '0' AND is_lead_approved = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	public function show_allpr_mdo() {
$condition = "status <> '0' AND status <> '1on' AND status <> '1off'  AND is_lead_approved = '1'   order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	
	
	public function show_allpr_store() {
$condition = "is_lead_approved ='1' AND display_flag = '1'  order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	
	public function show_allpr_is_lead($username) {
//$condition = "pro_lead =" . "'" . $username ."' AND is_lead_approved !='Rejected' order by pr_id desc";
$condition = "pro_lead =" . "'" . $username ."' AND status !='Rejected' AND is_lead_approved !='Rejected' order by pr_id desc";

$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



public function show_allpr_by_status($pr_by) {
$condition = "pr_by_id =" . "'" . $pr_by ."' order by pr_id desc";
$this->db->select('*');
$this->db->from('tbl_purchase');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	#######################  
	  public function fetchfiles($pr_id) {
$condition = "pr_id =" . "'" . $pr_id ."'";
$this->db->select('*');
$this->db->from('capex_files');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	#######################  
	  #######################  
	  public function leadlist() {
$condition = "group_id = '2' ";
$this->db->select('*');
$this->db->from('portal_user_login');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
	#######################  
	  
}
?>