<?php
class Mgmt_model extends CI_Model{
function __construct() {
parent::__construct();
}

	  #######################  
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



// total PR list 
public function list_pr_count() { 
	

$this->db->select('*');
$this->db->from('pr_master');
$this->db->order_by("pr_id", "desc");

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}



// total QCS list 
public function qcs_list_count() { 
	

$this->db->select('*');
$this->db->from('qcs_master');
$this->db->order_by("qcs_id", "desc");

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


  // total PO list 
public function info_po_list_count() { 
	

$this->db->select('*');
$this->db->from('tbl_informal_po');
$this->db->order_by("informal_po_id", "desc");

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


//Itemcode list 
public function itemcode_list_count() { 
	

$this->db->select('*');
$this->db->from('tbl_itemcode_gen');
$this->db->order_by("iten_gen_id", "desc");

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}





// total Capex list 
public function capex_list_count() { 
	

$this->db->select('*');
$this->db->from('tbl_capex_master');
$this->db->order_by("capex_id", "desc");

$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Pending PR LIST
 public function PendingPR_List() {
	 //$condition ="pr_state='submited_dh' OR pr_state='DH_approved' OR pr_state='PH_approved'";
	  $condition ="pr_state !='draft'";
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

//Pending QCS LIST
 public function QcsReport_List() {
	 $condition ="qcs_status='submited_Sourcing_Mgr' OR qcs_status='Sourcing_Mgr_approved' OR qcs_status='Sourcing_Head_Approved'OR qcs_status='CFO_Approved'OR qcs_status='COO_Approved'";
$this->db->select('*');
$this->db->from('qcs_master');
$this->db->where($condition);
$this->db->join('pr_master','qcs_master.pr_id = pr_master.pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


}
?>