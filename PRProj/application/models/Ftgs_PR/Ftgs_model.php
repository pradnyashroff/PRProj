<?php
	class ftgs_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}
		//profile fetch
		public function profile_fetch($emp_code) {
			$condition = "emp_code =" . "'" . $emp_code . "' ";
			$this->db->select('*');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			}
			else {
				return false;
			}
		}
		//pr type
		public function pr_type() {
			$condition = "pt_id = 14";
			$this->db->select('*');
			$this->db->from('pt_type');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			}
			else {
				return false;
			}
		}
		//plant
		public function plant() {
			$this->db->select('*');
			$this->db->from('plant_master');
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			}
			else {
				return false;
			}
		}
		//department
		public function department($dept_id) {
			$condition = "dept_code="."'".$dept_id."'";
			$this->db->select('dept_name');
			$this->db->from('department_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) 
			{
				return $query->row()->dept_name;
			} else {
				return false;
			}
		}
		//ftgs pr items fetch
		public function ftgs_item($emp_code) {
			$condition = "ftgs_pr_id =" . "'" . $emp_code . "' ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_items');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			}
			else {
				return false;
			}
		}
		//add ftgs pr
		 public function add_ftgs_pr($data) 
		 {
			$this->load->database();
			$this->db->insert('ftgs_pr_items', $data);
		}
		//delete items
		 function deleteitem($id)
		{
			$this->db->query("delete from ftgs_pr_items where ftgs_item_id='".$id."'");
		}
		//update ftgs items
		 public function update_ftgs_pr($data, $editId) 
		 {
			$this->db->where('ftgs_item_id', $editId);
			$this->db->update('ftgs_pr_items',$data);
        }
		//update ftgs items code
		 public function update_itemCode($data, $editId) 
		 {
			$this->db->where('ftgs_item_id', $editId);
			$this->db->update('ftgs_pr_items',$data);
        }
		//fetch ftgs items
		 public function fetch_ftgs($id)
		{
			 $condition = "ftgs_item_id =" . "'" . $id . "'";
			$this->db->select('*');
			$this->db->from('ftgs_pr_items');
			$this->db->where($condition);
			$query = $this->db->get();
			return $query->row();
		}
		
		//insert ftgs pr
		 public function insert_ftgs_pr($data) 
		 {
			$this->load->database();
			$this->db->insert('ftgs_pr_master', $data);
		}
		//insert file attachment
		public function file_insert($datanew) 
		 {
			$this->load->database();
			$this->db->insert('ftgs_pr_attachment', $datanew);
		}
		//update pr ftgs pr id
		public function update_item_withftgs($new_id,$old_id)  
      {  
	  
	   $this->db->where('ftgs_pr_id', $old_id);
       $this->db->update('ftgs_pr_items',$new_id);
         
      }  
	  //fetch draft ftgs 
		 public function fetchdraftFTGSpr($emp_code)
		{
			$condition = "ftgs_pr_status=0 and ftgs_pr_owner_code =" . "'" . $emp_code . "'";
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
				return $query->row();
		}
		//fetch pending ftgs 
		 public function fetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and pm.ftgs_pr_status=1 and ag.action=0 and ag.emp_code =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch PH pending ftgs 
		 public function ph_fetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=1 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch ftgs pr details 
		 public function ftgsPrDetails($ftgs_pr_id)
		{
			$condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
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
				return $query->row();
		}
		//fetch upload attachment details 
		 public function fetchuploadattach($ftgs_pr_id)
		{
			$condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
			$this->db->select('*');
			$this->db->from('ftgs_pr_attachment');
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
				return $query->row();
		}
		//edit ftgs item draft
		 public function drftupdate_item_ftgs($data, $editId) 
		 {
			$this->db->where('ftgs_item_id', $editId);
			$this->db->update('ftgs_pr_items',$data);
        }
		//insert ftgs item draft
		 public function draft_add_ftgs_pr($data) 
		 {
			$this->load->database();
			$this->db->insert('ftgs_pr_items', $data);
		}
		//insert action grid
		 public function authorityone($dataauth) 
		 {
			$this->load->database();
			$this->db->insert('ftgs_action_grid', $dataauth);
		}
		 public function updatedraft($id,$data)  
      {  
	  
	   $this->db->where('ftgs_pr_id', $id);
       $this->db->update('ftgs_pr_master',$data);
         
      } 
	  
	  //fetch auth ID
	  
		public function fetchReportingDetails($plant_code) 
		{
			$condition = "auth_level=1 and CURDATE() between auth_fromDate and auth_ToDate and plant_code =" . "'" . $plant_code . "'";
			 //plant_code = 1001 AND auth_level = 1
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
		//reject ftgs pr tbl
		
      public function fetchrejectTBL($emp_code) 
	  {
        $condition = "ftgs_pr_status=2 AND ftgs_pr_owner_code=" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('ftgs_pr_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
	//ph reject ftgs pr tbl
		
      public function ph_fetchrejectTBL($emp_code) 
	  {
        $condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.action=2 and ag.level_of=1 and ag.emp_code=em.emp_code and ag.action_autho =" . "'" . $emp_code . "'";
		$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
		$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
	//fetch approval table
	 public function fetchFTGSapprovalTbl($emp_code) {
        $condition = "ftgs_pr_status=3 AND ftgs_pr_owner_code=" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('ftgs_pr_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
	//ph fetch approval table
	 public function phfetchFTGSapprovalTbl($emp_code) {
        $condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.action=1 and ag.level_of=1 and ag.emp_code=em.emp_code and ag.action_autho =" . "'" . $emp_code . "'";
		$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
		$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
	public function fetch_dh_name($emp_id) 
	{
		$condition = "emp_code =" . "'" . $emp_id . "'";
		$this->db->select('emp_name');
		$this->db->from('employee_master');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query->row()->emp_name;
		} 
		else {
			return false;
		}
	}
	public function fetch_ph_id($del_loc) 
	{
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
	//fetch local_rim_id 
	public function ftgsDetailsHodActionData($emp_code,$ftgs_pr_id) 
	{
      $sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=1 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
      $query = $this->db->query($sql);
      if ($query->num_rows() >= 1) 
	  {
            return $query;
      } 
	  else 
		{
           return false;
       }
    }
	public function getUserDetails($ftgs_pr_id) {

        $condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
        $this->db->select('ftgs_pr_owner_code as user');
        $this->db->from('ftgs_pr_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->user;
        } else {
            return false;
        }
    }
	//fetch sanction ID
	  
		public function fetchSanctionDetails($plant_code) 
		{
			$condition = "auth_level=2 and CURDATE() between auth_fromDate and auth_ToDate and plant_code =" . "'" . $plant_code . "'";
			 //plant_code = 1001 AND auth_level = 1
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
		 public function updateuserAction($data, $editId,$Ftgs_action_id) 
		 {
			$condition = "ftgs_pr_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
			$this->db->where($condition);
			$this->db->update('ftgs_action_grid',$data);
        }
		public function updatesanAction($data, $editId,$Ftgs_action_id) 
		 {
			$condition = "ftgs_pr_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
			$this->db->where($condition);
			$this->db->update('ftgs_action_grid',$data);
        }
		public function ftgsProcessRepAutho($data2) {
        $this->load->database();
        $this->db->insert('ftgs_action_grid', $data2);
        }
		public function ftgsProcessSancAutho($data2) {
        $this->load->database();
        $this->db->insert('ftgs_action_grid', $data2);
        }
		
		///PLANT HEAD......
		//fetch plant pending ftgs 
		 public function plant_fetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=2 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch plant reject ftgs 
		 public function plant_fetchRejectFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=2 and ag.level_of=2 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch plant reject ftgs 
		 public function plant_fetchplantFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and ag.level_of=2 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch sanction ID
	  
		public function getSanctionAuthoDetails() 
		{
			$condition = "auth_level=3 and CURDATE() between auth_fromDate and auth_ToDate";
			 //plant_code = 1001 AND auth_level = 1
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
		//fetch sanc level
	public function ftgsDetailsSancActionData($emp_code,$ftgs_pr_id) 
	{
      $sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=2 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
      $query = $this->db->query($sql);
      if ($query->num_rows() >= 1) 
	  {
            return $query;
      } 
	  else 
		{
           return false;
       }
    }
	//ITEM CODE fetch data pendding table
		 public function ICfetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=3 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//ITEM CODE fetch data Reject table
		 public function ICfetchRejectFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=2 and ag.level_of=3 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//ITEM CODE fetch data Approved table
		 public function ICfetchApproveFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and ag.level_of=3 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		public function getItemCodeAuthoDetails() 
		{
			$condition = "auth_level=4 and CURDATE() between auth_fromDate and auth_ToDate";
			 //plant_code = 1001 AND auth_level = 1
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
		//fetch sanc level
		public function ftgsItemCodeAction($emp_code,$ftgs_pr_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=3 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		//ION============
		//ION fetch data pendding table
		 public function IONfetchPendingFTGSpr($emp_code)
		{
			$condition = "cm.ftgs_capex_id=ag.ftgs_capex_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=13 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('cm.ftgs_capex_id,cm.ftgs_qcs_id,cm.ftgs_pr_id,cm.ftgs_capex_date,cm.ftgs_cap_sel_supplier,cm.ftgs_cap_recommender,cm.ftgs_radio_val,ag.action,cm.ftgs_capex_status');
			$this->db->from('ftgs_capex_master cm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//ION fetch data Reject table
		 public function IONfetchrejectFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=2 and ag.level_of=4 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//ION fetch data approve table
		 public function IONfetchapproveDetails($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and ag.level_of=4 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		//ION Action bhujang sir 
		public function getIONAuthoDetails() 
		{
			//$condition = "auth_level=5 and CURDATE() between auth_fromDate and auth_ToDate";
			$condition = "frg.auth_id= em.emp_code and frg.auth_level=12 and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id,em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		//fetch ION Autho level
		public function ftgsIONAction($emp_code,$ftgs_pr_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=4 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		//Asset Code ==========
		public function ACCfetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=5 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		public function getACCAuthoDetails() 
		{
			$condition = "auth_level=6 and CURDATE() between auth_fromDate and auth_ToDate";
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
		//fetch Asset Autho level
		public function ftgsACCAction($emp_code,$ftgs_pr_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=5 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		//Asset code fetch data Reject table
		 public function ACCfetchrejectFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=2 and ag.level_of=5 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//Asset code fetch data approve table
		 public function ACCfetchapproveDetails($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and ag.level_of=5 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		public function POfetchPendingFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=6 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}

	//PO fetch data Reject table
		 public function POfetchrejectFTGSpr($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=2 and ag.level_of=6 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//PO fetch data approve table
		 public function POfetchapproveDetails($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and ag.level_of=6 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		//fetch IO Autho level
		public function ftgsIOAction($emp_code,$ftgs_pr_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=6 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
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
	public function approval_status($ftgs_pr_id) 
	{
		$condition = "em.emp_code=frg.auth_id AND frg.auth_id=fag.action_autho AND fag.ftgs_pr_id=fpm.ftgs_pr_id AND fpm.ftgs_pr_id=" . "'" . $ftgs_pr_id . "' GROUP BY fag.action_grid_id ORDER BY `fag`.`action_grid_id` ASC";
        $this->db->select('em.emp_code, em.emp_name,fpm.ftgs_pr_id,fpm.ftgs_pr_status,frg.auth_level,fag.action,fag.comment,fag.action_date,fag.action_time, fag.action_grid_id');
        $this->db->from('employee_master em,ftgs_pr_master fpm,ftgs_reporting_grid frg,ftgs_action_grid fag');
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
				return $query->row();
	}
		public function ftgs_item_list($ftgs_pr_id) {
			$condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "' ";
			$this->db->select('*');
			$this->db->from('ftgs_pr_items');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			}
			else {
				return false;
			}
		}
	 public function File_update($editId,$dataFile){
		
		$this->db->where('ftgs_capex_id',$editId);
	   $this->db->update('ftgs_capex_master',$dataFile);
	   
	    
}
	//fetch upload attachment details 
		 public function fetchAssetAttach($ftgs_pr_id)
		{
			$condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
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
				return $query->row();
		}
        	//fetch email Dept Head
		public function fetchDHMailDetails($DHCode) 
		{
			$condition = "emp_code =" . "'" . $DHCode . "'";
			$this->db->select('emp_email As dhEmail');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->dhEmail;
			} else {
				return false;
			}
		}
        
        
        	//fetch email Plant Head
		public function fetchPHMailDetails($IOCode) 
		{
			$condition = "emp_code =" . "'" . $IOCode . "'";
			$this->db->select('emp_email As PhEmail');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->PhEmail;
			} else {
				return false;
			}
		}
		//fetch email ItemCode Head
		public function fetchItemCodeMailDetails($ICCode) 
		{
			$condition = "emp_code =" . "'" . $ICCode . "'";
			$this->db->select('emp_email As itemCodeEmail');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->itemCodeEmail;
			} else {
				return false;
			}
		}
		//fetch email ION Head
		public function fetchIONMailDetails($IONCode) 
		{
			$condition = "emp_code =" . "'" . $IONCode . "'";
			$this->db->select('emp_email As IONEmail');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->IONEmail;
			} else {
				return false;
			}
		}
		//fetch email Asset Head
		public function fetchAssetMailDetails($ACCCode) 
		{
			$condition = "emp_code =" . "'" . $ACCCode . "'";
			$this->db->select('emp_email As AssetEmail');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->AssetEmail;
			} else {
				return false;
			}
		}
		//fetch email PO Head
		public function fetchPoCreateMailDetails($emp_code) 
		{
			$condition = "ag.action_autho=em.emp_code and ag.level_of=6  and ag.emp_code =" . "'" . $emp_code . "'";
			$this->db->select('em.emp_email As POCreateEmail');
			$this->db->from('ftgs_action_grid ag,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->POCreateEmail;
			} else {
				return false;
			}
		}
		//fetch email User
		 public function fetchUserMailDetails($ftgs_pr_id) {
        $condition = "em.emp_code=fpm.ftgs_pr_owner_code and ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('ftgs_pr_master fpm,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
		//fetch User Name
		public function fetchEmpNameMailDetails($emp_code) 
		{
			$condition = "emp_code=" . "'" . $emp_code . "'";
			$this->db->select('emp_Name As emp_Name');
			$this->db->from('employee_master');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query->row()->emp_Name;
			} else {
				return false;
			}
		}
		//fetch User Plant
		public function getUserPlant($ftgs_pr_id) {

        $condition = "ftgs_pr_id =" . "'" . $ftgs_pr_id . "'";
        $this->db->select('ftgs_plant_code as UserPlant');
        $this->db->from('ftgs_pr_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->UserPlant;
        } else {
            return false;
        }
    }
	//fetch User Department
	public function getUserDept($emp_dept) {

        $condition = "dept_code =" . "'" . $emp_dept . "'";
        $this->db->select('dept_name as UserDept');
        $this->db->from('department_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->UserDept;
        } else {
            return false;
        }
    }
	
	
	//New dev QCS Creation pps 2020-03-26
	
	//fetch Approval 5 ID
	  
		public function getApproval5AuthID() 
		{
			$condition = "auth_level=5 and CURDATE() between auth_fromDate and auth_ToDate";
			 //plant_code = 1001 AND auth_level = 1
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
	
	//Approve sourcing person fetch Soucing Level
		
		public function ftgssourcingAuthoActionData($emp_code,$ftgs_pr_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=0 and level_of=4 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
		//fetch soucing personapproval  list 
	public function pendingSoucingList($emp_code)
		{
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=4 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
}


					//fetch sanc level
	public function ftgsDetailsSourcing1Action($emp_code,$ftgs_pr_id) 
	{
      $sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_pr_id=".$ftgs_pr_id." and action=1 and level_of=4 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
      $query = $this->db->query($sql);
      if ($query->num_rows() >= 1) 
	  {
            return $query;
      } 
	  else 
		{
           return false;
       }
    }


		public function ftgsProcessRepAutho5($data2) {
        $this->load->database();
        $this->db->insert('ftgs_action_grid', $data2);
        }

	//fetch qcs step list 
	/*public function pendingQcsListCreate($emp_code)
		{
			echo'in odel';
			$condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.emp_code=em.emp_code and ag.action=1 and fpi.ftgs_qcs_gen='null' and ag.level_of=4 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
			$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em,ftgs_pr_items fpi');
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
				return $query->row();
		}*/
		
		
		public function pendingQcsListCreate($emp_code)
		{
			echo'in odel';
			
			$condition = "fpi.ftgs_qcs_gen = 'null' and pm.ftgs_pr_id = fpi.ftgs_pr_id and frg.auth_id =" . "'" . $emp_code . "'";
			$this->db->DISTINCT();
			$this->db->select('pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,pm.ftgs_pr_status,fpi.ftgs_qcs_gen');
				
			$this->db->from('ftgs_pr_master pm,ftgs_pr_items fpi,ftgs_reporting_grid frg');
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
				return $query->row();
		}
		
		//insert step 1
		public function ftgsInsertStepOne($data1) {
        $this->load->database();
        $this->db->insert('ftgs_qcs_master', $data1);
        }
		
		
		 //fetch Incomp QCS tbl ftgs 
		 public function fetchIncompQcsTbl($emp_code)
		{
			$condition = "ftgs_qcs_status=0 and ftgs_qcs_emp_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master');
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
				return $query->row();
		}
		
		
		//fetch ftgs pr details 
		 public function ftgsqcsDetails($ftgs_qcs_id)
		{
			$condition = "ftgs_qcs_master.ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master');
			//$this->db->ORDER_BY('ftgs_qcs_technical_spec.ftgs_qcs_id','DESC');
			//$this->db->join('ftgs_qcs_technical_spec', 'ftgs_qcs_master.ftgs_qcs_id = ftgs_qcs_technical_spec.ftgs_qcs_id'); 
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
				return $query->row();
		}
		
		
		//List Of items 
			  
	  public function ftgs_list_items_qcs($ftgs_qcs_id) {
$condition = "ftgs_qcs_master.ftgs_qcs_id =" . " " . $ftgs_qcs_id . " AND ftgs_pr_items.ftgs_qcs_gen = 'null' ";
$this->db->select('*');
$this->db->from('ftgs_pr_items');
$this->db->where($condition);
$this->db->  join('ftgs_qcs_master', 'ftgs_pr_items.ftgs_pr_id = ftgs_qcs_master.ftgs_pr_id'); 

//$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


	  //add item in QCS
		function ftgs_item_insert($data)
	{
		$query = $this->db->insert('ftgs_qcs_item', $data);
       return $query;  

	}
	

	//qcs id  update in pr_itm table 
		public function ftgs_qcs_itm_upd($id,$itemupdate)  
      {  
	  
	   $this->db->where('ftgs_item_id', $id);
       $this->db->update('ftgs_pr_items',$itemupdate);
         
      }
	  
	  
	  //view qcs item in step 2page
	public function ftgs_view_qcs_items($ftgs_qcs_id)
	{
			$condition = "ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_item');
			$this->db->where($condition);
			$this->db->order_by("ftgs_qcs_item_id ", "DESC");
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
			return $query;
			} else {
			return false;
			}
	}
	


public function ftgs_view_pr_items($ftgs_qcs_id) {
	$condition = "ftgs_qcs_master.ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "'";

$this->db->select('*');
$this->db->from('ftgs_qcs_master');
$this->db->where($condition);
$this->db->JOIN('ftgs_pr_items','ftgs_qcs_master.ftgs_pr_id = ftgs_pr_items.ftgs_pr_id');
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}	
		//Fetch Item in ID Wise fetchQCSItemInID
		
		public function fetchQCSItemInID($ftgs_qcs_item_id) {
			$condition = "ftgs_qcs_item_id  =" . "'" . $ftgs_qcs_item_id . "'";

				$this->db->select('*');
				$this->db->from('ftgs_qcs_item');
				$this->db->where($condition);
				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
		}
		
		
		//qcs detail show related to qcs_item id 
			public function qcs_detail_itemid($ftgs_qcs_item_id) {
				$condition = "ftgs_qcs_item.ftgs_qcs_item_id  =" . "'" . $ftgs_qcs_item_id . "'";

				$this->db->select('*');
				$this->db->from('ftgs_qcs_master');
				$this->db->where($condition);
				$this->db->join('ftgs_qcs_item', 'ftgs_qcs_master.ftgs_qcs_id = ftgs_qcs_item.ftgs_qcs_id'); 
				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
		}
		
		
		//update item 
	
		public function update_qcs_item($id,$data)  
      {  
	  
	   $this->db->where('ftgs_qcs_item_id', $id);
       $this->db->update('ftgs_qcs_item',$data);
         
      }
	  
	  
	  
	  //delete item at that time qcs gen will null  
		public function qcs_itm_gen($del_itemid,$data) 
      {  
			$this->db->where('ftgs_item_id', $del_itemid);
			$this->db->update('ftgs_pr_items',$data);
         
      }
	  
	  
	   //supllier and justification update
		public function qcs_step_upd($id,$dataupdate)  
      {  
	  
	   $this->db->where('ftgs_qcs_id', $id);
       $this->db->update('ftgs_qcs_master',$dataupdate);
         
      } 
	  
	  //technical Spec insert
	 
		function QCS_tecSpecInsert($data){
			  $query = $this->db->insert('ftgs_qcs_technical_spec', $data);
			  return $query;  

}

//fetch ION NO
			public function fetch_ion_no($pr_id) {
					$condition = "ftgs_pr_id =" . "'" . $pr_id . "'";
					$this->db->select('ftgs_ion_no');
					$this->db->from('ftgs_pr_master');
					$this->db->where($condition);
					$query = $this->db->get();

					if ($query->num_rows() >= 1) {
							return $query->row()->ftgs_ion_no;
							
							
						} else {
						return false;
						}
}


//file upload
function insertfiles($data){
	$query = $this->db->insert('qcsfile_master', $data);
           return $query;  

}

//fetch QCS draft ftgs 
		 public function fetchQcsDraftDetails($emp_code)
		{
			$condition = "ftgs_qcs_status=1 and ftgs_qcs_emp_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master');
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
				return $query->row();
		}

		
			//Draft Step1 update data 
	
			public function ftgsUpdateStepOne($editId ,$data1)
			{  
	  
			   $this->db->where('ftgs_qcs_id', $editId);
			   $this->db->update('ftgs_qcs_master',$data1);
         
			} 


		 	  // qcs draft step2 quatation attachment
			public function filefetch_qcs($ftgs_qcs_id)
		  {
			$condition = "ftgs_qcs_id =" . "'" . $ftgs_qcs_id ."'";
			$this->db->select('*');
			$this->db->from(' qcsfile_master');
			$this->db->where($condition);
			$query = $this->db->get();

			if ($query->num_rows() >= 1) {
			return $query;
			} else {
			return false;
}
}


			public function getQcsApproval2Autho() 
		{
			$condition = "auth_level=6 and CURDATE() between auth_fromDate and auth_ToDate";
			 //plant_code = 1001 AND auth_level = 1
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
		
		
		//in drfat tech spec update 
		public function updatedraftTechSpec($editId,$datatechSpec){
			$this->db->where('ftgs_qcs_id', $editId);
			$this->db->update('ftgs_qcs_technical_spec',$datatechSpec);
		}
		
		//fetch Approval 1  pending ftgs 
		 public function QcsApproval1_fetchPendingFTGSpr($emp_code)
		{
			$condition = "qm.ftgs_qcs_id=ag.ftgs_qcs_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=5 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_justification_supplier,qm.ftgs_sup1_nm,ag.action');
			$this->db->from('ftgs_qcs_master qm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
	
	
			public function updateFtgsID($dataID, $editId, $Ftgs_action_id) 
		 {
			$condition = "ftgs_pr_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
			$this->db->where($condition);
			$this->db->update('ftgs_action_grid',$dataID);
        }
		
		
		
		//qcs  draft page tech specification show

				public function ftgsqcsTechDetails($ftgs_qcs_id) {
					$condition = "ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "'";

				$this->db->select('*');
				$this->db->from('ftgs_qcs_technical_spec');
				$this->db->order_by('ftgs_qcs_id','DESC');
				$this->db->where($condition);
				$this->db->limit(1); 
				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
				}
				
				
				
				//fetch pending QCS in sourcing user 
		 public function fetchPendingQcsUser($emp_code)
		{
			$condition = "qm.ftgs_qcs_status=2 and qm.ftgs_qcs_emp_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master qm');
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
				return $query->row();
		}
		
		
		
			
				//fetch Approved  QCS in sourcing user section 
		 public function fetchApprovedQcsSourcingUser($emp_code)
		{
			$condition = "qm.ftgs_qcs_status=4 and qm.ftgs_qcs_emp_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master qm');
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
				return $query->row();
		}
		
		
		
		
				//fetch Approved QCS in sourcing user  
		 public function fetchApprovedQcsUser($emp_code)
		{
			$condition = "qm.ftgs_qcs_status=4 and qm.ftgs_pr_owner_empcode =" . "'" . $emp_code . "'";
			//$condition = "qm.ftgs_qcs_status=4 and qm.ftgs_qcs_emp_code =" . "'" . $emp_code . "'";    //2020-04-28
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master qm');
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
				return $query->row();
		}
		
		
		
		
		//fetch Reject QCS in sourcing user 
		 public function RejectedQcsForUser($emp_code)
		{
			$condition = "qm.ftgs_qcs_status=3 and qm.ftgs_pr_owner_empcode =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master qm');
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
				return $query->row();
		}
		
		
			public function qcs_approval_status($ftgs_qcs_id) 
	{
		$condition = "em.emp_code=frg.auth_id AND frg.auth_id=fag.action_autho AND fag.ftgs_qcs_id=fqm.ftgs_qcs_id AND fqm.ftgs_qcs_id=" . "'" . $ftgs_qcs_id . "' GROUP BY fag.action_grid_id ORDER BY `fag`.`action_grid_id` ASC";
        $this->db->select('em.emp_code, em.emp_name,fqm.ftgs_qcs_id,fqm.ftgs_qcs_status,frg.auth_level,fag.action,fag.comment,fag.action_date,fag.action_time, fag.action_grid_id');
        $this->db->from('employee_master em,ftgs_qcs_master fqm,ftgs_reporting_grid frg,ftgs_action_grid fag');
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
				return $query->row();
	}
	
	
			//fetch Qcs Approval1(100258) Autho level
		public function ftgsApproval1Action($emp_code,$ftgs_qcs_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_qcs_id=".$ftgs_qcs_id." and action=0 and level_of=5 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
			//get auth level6 (100297)
	
			public function getApproval2AuthoDetails() 
		{
			$condition = "auth_level=6 and CURDATE() between auth_fromDate and auth_ToDate";
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
	
			//update data using qcs id
			 public function updateQCSuserAction($data, $editId,$Ftgs_action_id) 
				 {
					$condition = "ftgs_qcs_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
					$this->db->where($condition);
					$this->db->update('ftgs_action_grid',$data);
				}
		
			//fetch Approval 2  pending ftgs 
		 public function QcsApproval2_fetchPendingFTGSpr($emp_code)
		{
			$condition = "qm.ftgs_qcs_id=ag.ftgs_qcs_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=6 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_justification_supplier,qm.ftgs_sup1_nm,ag.action');
			$this->db->from('ftgs_qcs_master qm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
			//get auth level7 (100121)
			
			
			public function getApproval3AuthoDetails() 
		{
			$condition = "frg.auth_level=7 and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id, em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
		
		
			//fetch Qcs Approval2(100297) Autho level
		public function ftgsApproval2Action($emp_code,$ftgs_qcs_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_qcs_id=".$ftgs_qcs_id." and action=0 and level_of=6 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
			//update data using qcs id in qcs item
			 public function updateQcsItemData($data3, $editId,$ftgs_qcs_item_id) 
				 {
					$condition = "ftgs_qcs_id=" . "'" . $editId . "' and ftgs_qcs_item_id=" . "'" . $ftgs_qcs_item_id ."'";
					$this->db->where($condition);
					$this->db->update('ftgs_qcs_item',$data3);
				}
				
				
			//fetch pending QCS in user section 
		 public function pendingQcsForUser($emp_code)
		{
			$condition = "qm.ftgs_qcs_status=2 and qm.ftgs_pr_owner_empcode =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_sup1_nm,qm.ftgs_justification_supplier,qm.ftgs_qcs_status');
			$this->db->from('ftgs_qcs_master qm');
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
				return $query->row();
		}
			//Sourcing reject ftgs QCS tbl
		
      public function fetchAuthoRejectTbl($emp_code) 
	  {
        $condition = "ftgs_qcs_status=3 AND ftgs_qcs_emp_code=" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('ftgs_qcs_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
	
	
			//fetch Approval3  pending ftgs 
		 public function QcsApproval3_fetchPendingFTGSpr($emp_code)
		{
			$condition = "qm.ftgs_qcs_id=ag.ftgs_qcs_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=7 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_justification_supplier,qm.ftgs_sup1_nm,ag.action');
			$this->db->from('ftgs_qcs_master qm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
			//get auth level8 (100198)
	
			public function getApproval4AuthoDetails() 
		{
			$condition = "frg.auth_level=8  and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id , em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
				//fetch Qcs Approval3(100121) Autho level
		public function ftgsApproval3Action($emp_code,$ftgs_qcs_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_qcs_id=".$ftgs_qcs_id." and action=0 and level_of=7 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
		//fetch Approval4  pending ftgs 
		 public function QcsApproval4_fetchPendingFTGSpr($emp_code)
		{
			$condition = "qm.ftgs_qcs_id=ag.ftgs_qcs_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=8 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_justification_supplier,qm.ftgs_sup1_nm,ag.action');
			$this->db->from('ftgs_qcs_master qm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
				//get auth level9 (100098)
	
			public function getApproval5AuthoDetails() 
		{
			$condition = "frg.auth_level=9  and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id , em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
		
						//fetch Qcs Approval4(1000198) Autho level
		public function ftgsApproval4Action($emp_code,$ftgs_qcs_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_qcs_id=".$ftgs_qcs_id." and action=0 and level_of=8 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
			//fetch Approval5 pending ftgs 
		 public function QcsApproval5_fetchPendingFTGSpr($emp_code)
		{
			$condition = "qm.ftgs_qcs_id=ag.ftgs_qcs_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=9 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('qm.ftgs_qcs_id,qm.ftgs_pr_id,qm.ftgs_qcs_date,qm.ftgs_qcs_owner,qm.ftgs_justification_supplier,qm.ftgs_sup1_nm,ag.action');
			$this->db->from('ftgs_qcs_master qm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
		
			//fetch Qcs Approval5(100098) Autho level
		public function ftgsApproval5Action($emp_code,$ftgs_qcs_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_qcs_id=".$ftgs_qcs_id." and action=0 and level_of=9 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
			//FTGS CAPEX Count CREATE PR
		public function CapexCreteCount($emp_code) 
		{
			$condition = "ftgs_pr_owner_empcode =" . "'" . $emp_code . "' and ftgs_qcs_status = 4 and ftgs_capex_gen = 'null' ";
			$this->db->select('*');
			$this->db->from('ftgs_qcs_master');
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
		
		
		
		
				// pr qcs detail fetch for create capex inner join
				public function pr_qcs_detail_capex($ftgs_qcs_id) {
					$condition = "ftgs_qcs_master.ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "' ";

				$this->db->select('*');
				$this->db->from('ftgs_qcs_master');
				$this->db->where($condition);
				$this->db->join('ftgs_qcs_technical_spec', 'ftgs_qcs_technical_spec.ftgs_qcs_id = ftgs_qcs_master.ftgs_qcs_id'); 
				$this->db->join('ftgs_pr_master ', 'ftgs_pr_master.ftgs_pr_id = ftgs_qcs_master.ftgs_pr_id'); 
				

				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
				}
				
				
				//Insert capex
				
				public function ftgs_insert_capex($data){
					$this->load->database();
					$this->db->insert('ftgs_capex_master', $data);
				}
			
				//update capex gen in qcs master 			
					
				public function capex_gen_update($qcs_id,$capex_gen_up){
						$this->db->where('ftgs_qcs_id', $qcs_id);
						$this->db->update('ftgs_qcs_master',$capex_gen_up);
					}

					
					
					//fetch draft capex 
		 public function CapextDraftData($emp_code)
		{
			$condition = "cm.ftgs_capex_status= 0 and cm.ftgs_capex_owner_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_capex_master cm');
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
				return $query->row();
		}
		
		
		public function capex_detail($ftgs_capex_id) {
					$condition = "ftgs_capex_master.ftgs_capex_id =" . "'" . $ftgs_capex_id . "' ";

				$this->db->select('*');
				$this->db->from('ftgs_capex_master');
				$this->db->where($condition);
				$this->db->join('ftgs_qcs_technical_spec', 'ftgs_qcs_technical_spec.ftgs_qcs_id = ftgs_capex_master.ftgs_qcs_id'); 
				$this->db->join('ftgs_pr_master ', 'ftgs_pr_master.ftgs_pr_id = ftgs_capex_master.ftgs_pr_id'); 
				$this->db->join('ftgs_qcs_master ', 'ftgs_qcs_master.ftgs_qcs_id = ftgs_capex_master.ftgs_qcs_id'); 
				

				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
				}
				
				
			  //qcs item for asset code 
				public function qcs_items_assetcode_new($ftgs_capex_id){
	 
	 $sql = "SELECT
			tac.ftgs_asset_id,tac.ftgs_cost_center,tac.ftgs_asset_grp, qi.ftgs_q_item_code,qi.ftgs_q_item_description,qi.ftgs_q_req_quantity,qi.ftgs_q_uom,tcm.ftgs_cap_unit 
			FROM ftgs_asset_code tac, ftgs_qcs_item qi, ftgs_capex_master tcm
			WHERE tac.ftgs_capex_id=".$ftgs_capex_id."
            AND qi.ftgs_qcs_item_id=tac.ftgs_qcs_item_id
            AND tac.ftgs_capex_id=tcm.ftgs_capex_id ";
			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }	
 
 
			// qcs item list for capex 
				public function view_qcs_items($ftgs_capex_id) {
	
					
					$condition = "ftgs_capex_master.ftgs_capex_id =" . "'" . $ftgs_capex_id . "'";

				$this->db->select('*');
				$this->db->from('ftgs_capex_master');
				$this->db->where($condition);
				$this->db->join('ftgs_qcs_item ', 'ftgs_qcs_item.ftgs_qcs_id = ftgs_capex_master.ftgs_qcs_id');
				//$this->db->join('tbl_asset_code', 'tbl_asset_code.capex_id = tbl_capex_master.capex_id');  
				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
		}
		
		
		 //draft capex master data update 
			public function capex_mast_update($dft_capex_no ,$data_update){
					$this->db->where('ftgs_capex_id', $dft_capex_no);
				   $this->db->update('ftgs_capex_master',$data_update);
			}

					//fetch Capex level 1 Autho level
		public function ftgsApprovalCapxAction($emp_code) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code."   and action=0 and level_of=10 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
		
			public function updateFtgsQCSID($dataID, $editId, $Ftgs_action_id) 
		 {
			$condition = "ftgs_qcs_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
			$this->db->where($condition);
			$this->db->update('ftgs_action_grid',$dataID);
        }
		
		
			//update data using Capex id
			 public function updateCapexuserAction($data,$dft_capex_no,$Ftgs_action_id) 
				 {
					$condition = "ftgs_capex_id=" . "'" . $dft_capex_no . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
					$this->db->where($condition);
					$this->db->update('ftgs_action_grid',$data);
				 }
				
				
				//FTGS CAPEX Count CREATE PR
		public function cpxAuthPenCount($emp_code) 
		{
			$condition = "(level_of=13 OR level_of=14) AND action=0 and action_autho =" . "'" . $emp_code . "'";
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
		
		
		
		//get auth level9 (100098)
	
			public function getCaxapp2AuthoDetails() 
		{
			$condition = "frg.auth_level=13  and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id , em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
		
		//fetch Capex Approval1(100006) Autho level
		public function ftgscpxIDAction($emp_code,$ftgs_capex_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_capex_id=".$ftgs_capex_id." and action=0 and level_of=13 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		public function updateuserActionCapex($data, $editId, $Ftgs_action_id)
		{
			$condition = "ftgs_capex_id=" . "'" . $editId . "' and action_grid_id=" . "'" . $Ftgs_action_id ."'";
			$this->db->where($condition);
			$this->db->update('ftgs_action_grid',$data);
		}
		
		
		
		//Pending cpx user tbl
				
		 public function UserPendingCpxTblData($emp_code)
		{
			$condition = "cm.ftgs_capex_status = 1 and cm.ftgs_capex_owner_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_capex_master cm');
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
				return $query->row();
		}
		
		
		
		//Asset fetch data pendding table
		 public function AssetfetchpenddingDetails($emp_code)
		{
			$condition = "cm.ftgs_capex_id=ag.ftgs_capex_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=14 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('cm.ftgs_capex_id,cm.ftgs_qcs_id,cm.ftgs_pr_id,cm.ftgs_capex_date,cm.ftgs_cap_sel_supplier,cm.ftgs_cap_recommender,cm.ftgs_radio_val,ag.action,cm.ftgs_capex_status');
			$this->db->from('ftgs_capex_master cm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		// capex approval sts history 
			public function cpx_approval_status($ftgs_capex_id) 
	{
		$condition = "em.emp_code=frg.auth_id AND frg.auth_id=fag.action_autho AND fag.ftgs_capex_id=fqm.ftgs_capex_id AND fqm.ftgs_capex_id=" . "'" . $ftgs_capex_id . "' GROUP BY fag.action_grid_id ORDER BY `fag`.`action_grid_id` ASC";
        $this->db->select('em.emp_code, em.emp_name,fqm.ftgs_capex_id,fqm.ftgs_capex_status,frg.auth_level,fag.action,fag.comment,fag.action_date,fag.action_time, fag.action_grid_id');
        $this->db->from('employee_master em,ftgs_capex_master fqm,ftgs_reporting_grid frg,ftgs_action_grid fag');
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
				return $query->row();
	}
	
	
	
	 
  //qcs item for asset code 
 public function qcs_items_assetcode($ftgs_capex_id){
	 
	 $sql = "SELECT
			tac.ftgs_asset_id,tac.ftgs_cost_center,tac.ftgs_asset_grp, qi.ftgs_q_item_code,qi.ftgs_q_item_description,qi.ftgs_q_req_quantity,qi.ftgs_q_uom,tcm.ftgs_cap_unit 
			FROM ftgs_asset_code tac, ftgs_qcs_item qi, ftgs_capex_master tcm
			WHERE tac.ftgs_capex_id=".$ftgs_capex_id."
AND qi.ftgs_qcs_item_id=tac.ftgs_qcs_item_id
AND tac.ftgs_capex_id=tcm.ftgs_capex_id and qi.ftgs_q_item_code != '0' and qi.ftgs_q_item_code != 'NEW'
and qi.ftgs_q_item_code != 'new' and qi.ftgs_q_item_code != '-' and qi.ftgs_q_item_code != '00' ";

			
			
	$query = $this->db->query($sql);
	
	
	return $query;
			
			
 }
 
 
 //fetch project detail in pR item
public function pr_proj_detail($ftgs_capex_id) {
	$condition = "ftgs_capex_id =" . "'" . $ftgs_capex_id . "'";

$this->db->select('ftgs_project_detail ');
$this->db->from('ftgs_capex_master');
$this->db->where($condition);
$this->db->join('ftgs_pr_items','ftgs_capex_master.ftgs_pr_id = ftgs_pr_items.ftgs_pr_id');

$query = $this->db->get();

if ($query->num_rows() >= 1) {
	return $query->row()->ftgs_project_detail;
} else {
return false;
}
}


//get auth level14 (sumit )
	
			public function getCaxapp3AuthoDetails() 
		{
			$condition = "frg.auth_level=14  and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id , em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
		
		//fetch Capex Approval3(100662) Autho level
		public function ftgscpx2IDAction($emp_code,$ftgs_capex_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_capex_id=".$ftgs_capex_id." and action=0 and level_of=14 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
				//Reject cpx user tbl
				
		 public function UserRejectedCpxTblData($emp_code)
		{
			$condition = "cm.ftgs_capex_status = 2 and cm.ftgs_capex_owner_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_capex_master cm');
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
				return $query->row();
		}
		
		
			
		//PO fetch data pendding table
		 public function POfetchpenddingDetails($emp_code)
		{
			$condition = "cm.ftgs_capex_id=ag.ftgs_capex_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=15 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('cm.ftgs_capex_id,cm.ftgs_qcs_id,cm.ftgs_pr_id,cm.ftgs_capex_date,cm.ftgs_cap_sel_supplier,cm.ftgs_cap_recommender,cm.ftgs_radio_val,ag.action,cm.ftgs_capex_status');
			$this->db->from('ftgs_capex_master cm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
		//get auth level15 (sumit )
	
			public function getCaxapp4AuthoDetails() 
		{
			$condition = "frg.auth_level=15  and frg.auth_id=em.emp_code and CURDATE() between auth_fromDate and auth_ToDate";
			$this->db->select('frg.auth_id , em.emp_email');
			$this->db->from('ftgs_reporting_grid frg,employee_master em');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() >= 1) {
				return $query;
			} else {
				return false;
			}
		}
		
		
				//fetch Capex Approval4(100840) Autho level
		public function ftgscpx3IDAction($emp_code,$ftgs_capex_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_capex_id=".$ftgs_capex_id." and action=0 and level_of=15 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
		
				
		//PO fetch data pendding table
		 public function POp4fetchpenddingDetails($emp_code)
		{
			$condition = "cm.ftgs_capex_id=ag.ftgs_capex_id and ag.emp_code=em.emp_code and ag.action=0 and ag.level_of=16 and ag.action_autho =" . "'" . $emp_code . "'";
			$this->db->select('cm.ftgs_capex_id,cm.ftgs_qcs_id,cm.ftgs_pr_id,cm.ftgs_capex_date,cm.ftgs_cap_sel_supplier,cm.ftgs_cap_recommender,cm.ftgs_radio_val,ag.action,cm.ftgs_capex_status');
			$this->db->from('ftgs_capex_master cm,ftgs_action_grid ag,employee_master em');
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
				return $query->row();
		}
		
		
				//fetch Capex Approval4(100171) Autho level
		public function ftgscpx4IDAction($emp_code,$ftgs_capex_id) 
		{
			$sql = "SELECT action_grid_id FROM ftgs_action_grid WHERE action_autho=".$emp_code." and ftgs_capex_id=".$ftgs_capex_id." and action=0 and level_of=16 ORDER BY action_grid_id DESC LIMIT 0, 1" ;
			$query = $this->db->query($sql);
			if ($query->num_rows() >= 1) 
			{
				return $query;
			} 
			else 
			{
				return false;
			}	
		}
		
				//fetch email User
		 public function fetchUserMailDetailscpxid($ftgs_capex_id) {
        $condition = "em.emp_code=fpm.ftgs_capex_owner_code and ftgs_capex_id =" . "'" . $ftgs_capex_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('ftgs_capex_master fpm,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
	
	
	//Pending cpx user tbl
				
		 public function UserApprovedCpxTblData($emp_code)
		{
			$condition = "cm.ftgs_capex_status = 3 and cm.ftgs_capex_owner_code =" . "'" . $emp_code . "'";
			$this->db->select('*');
			$this->db->from('ftgs_capex_master cm');
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
				return $query->row();
		}
		
		
		//Approved QCS in 100258 login 
			 public function qcsapp2fetchFTGSapprovalTbl($emp_code) {
        $condition = "pm.ftgs_pr_id=ag.ftgs_pr_id and ag.action=1 and (ag.level_of=5 OR ag.level_of=7 OR ag.level_of=8)and ag.emp_code=em.emp_code and ag.action_autho =" . "'" . $emp_code . "'";
		$this->db->select('ag.ftgs_qcs_id,pm.ftgs_pr_id,pm.ftgs_pr_date,pm.ftgs_pr_owner_name,pm.ftgs_delivary_loc,pm.ftgs_procurement_res,ag.action,pm.ftgs_pr_status');
		$this->db->from('ftgs_pr_master pm,ftgs_action_grid ag,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
		

	//update percentege value
		 public function PerAddAgaintItem($data, $editId) 
		 {
			$this->db->where('ftgs_qcs_item_id', $editId);
			$this->db->update('ftgs_qcs_item',$data);
        }	




		 //query one for supplier one
     public function supplierOne(){
    $arrReturn1 = array();//Declare the array to be passed
    $this->db->select('ftgs_qcs_id,ftgs_sup1_nm as sname');
    $this->db->from('ftgs_qcs_master');
    $this->db->group_by('ftgs_sup1_nm'); 
    $qu11 = $this->db->get();
    $result1 =  $qu11->result_array(); 
    if(!empty($result1)){
       $arrReturn1 = $result1;
    }
    
    //query one for supplier two
    $arrReturn2 = array();//Declare the array to be passed
    $this->db->select('ftgs_qcs_id,ftgs_sup2_nm as sname');
    $this->db->from('ftgs_qcs_master');
    $this->db->group_by('ftgs_sup2_nm'); 
    $qu12 = $this->db->get();
    $result2 =  $qu12->result_array(); 
    if(!empty($result2)){
       $arrReturn2 = $result2;
    }
    
    
    
    
    //query one for supplier three
    $arrReturn3 = array();//Declare the array to be passed
    $this->db->select('ftgs_qcs_id,ftgs_sup3_nm as sname');
    $this->db->from('ftgs_qcs_master');
    $this->db->group_by('ftgs_sup3_nm'); 
    $qu13 = $this->db->get();
    $result3 =  $qu13->result_array(); 
    if(!empty($result3)){
       $arrReturn3 = $result3;
    }
    $ftgs_qcs_id = array_merge($arrReturn1, $arrReturn2,$arrReturn3);
    
    return $ftgs_qcs_id;
 }
 
 
   public function selectSuplier1($ftgs_qcs_id) {
	   
         $condition = "ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "'";
        $this->db->select('ftgs_sup1_contact_no,ftgs_sup1_contact_person,ftgs_sup1_eid');
        $this->db->from('ftgs_qcs_master');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->row();

}		



		
				// pr qcs detail fetch for create capex inner join
				public function prDetails($ftgs_qcs_id) {
					$condition = "ftgs_qcs_master.ftgs_qcs_id =" . "'" . $ftgs_qcs_id . "' ";

				$this->db->select('*');
				$this->db->from('ftgs_qcs_master');
				$this->db->where($condition);
			
				$this->db->join('ftgs_pr_master ', 'ftgs_pr_master.ftgs_pr_id = ftgs_qcs_master.ftgs_pr_id'); 
				

				$query = $this->db->get();

				if ($query->num_rows() >= 1) {
				return $query;
				} else {
				return false;
				}
				}
	}	
?>