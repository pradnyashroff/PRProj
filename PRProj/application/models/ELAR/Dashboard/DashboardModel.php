<?php

class DashboardModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

  public function addOtherRimDetails($data) {
        $this->load->database();
        $this->db->insert('other_claim_details', $data);
    }
    
    public function fetchOtherReimDetails($emp_code) {
        $condition = "dynamic_id =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('other_claim_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function get_by_id($id){
         $condition = "ocd_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('other_claim_details');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
    
          public function updateOtherRimDetails($data, $editId) {
        $this->db->where('ocd_id', $editId);
        $this->db->update('other_claim_details',$data);
        }
        
         function deleterecords($id)
    {
        $this->db->query("delete from other_claim_details where ocd_id='".$id."'");
    }
     public function addOtherReimClaim($data) {
        $this->load->database();
        $this->db->insert('other_claim_mst', $data);
    }
    
     public function fetchOtherReimDraftDetails($emp_code) {
        $condition = "ocm_status=0 and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('other_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function otherClaimDetails($ocm_id) {
        $condition = "ocm_id =" . "'" . $ocm_id . "'";

        $this->db->select('*');
        $this->db->from('other_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchOtherReimDetailsByClaimId($ocm_id) {
        $condition = "ocd_status = 0 and dynamic_id =" . "'" . $ocm_id . "' ";
        $this->db->select('*');
        $this->db->from('other_claim_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
     public function addOtherReimClaimDraft($data, $UpdateId) {
          $this->load->database();
        $this->db->where('ocm_id', $UpdateId);
        $this->db->update('other_claim_mst',$data);
        }
     public function otherReimClaimProcess($dataProcess) {
        $this->load->database();
        $this->db->insert('other_claim_status', $dataProcess);
        }
        
      public function fetchOtherReimApprovalDetails($emp_code) {
     
        $condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=1 and os.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,om.ocm_id,om.total_amt,om.reg_date');
        $this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
      }
     
        

    
        public function actionTakerDetails($ocm_id,$emp_code) {
         
        $sql = "SELECT * FROM other_claim_status WHERE ocm_id=".$ocm_id." and rep_autho=".$emp_code." ORDER BY other_status_id DESC LIMIT 0,1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        }
        
        public function getClaimerDetails($ocm_id) {

        $condition = "ocm_id =" . "'" . $ocm_id . "'";
        $this->db->select('emp_code as claimer');
        $this->db->from('other_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimer;
        } else {
            return false;
        }
    }
    public function hodActionOtherClaim($data, $ClaimId,$StatusId) {
        echo 'in the hod model ';
        $condition = "ocm_id=" . "'" . $ClaimId . "' and other_status_id=" . "'" . $StatusId ."'";
        $this->db->where($condition);
        $this->db->update('other_claim_status',$data);
        }
        
           public function otherClaimProcessRepAutho($data2) {
        $this->load->database();
        $this->db->insert('other_claim_status', $data2);
        }
        
          public function getHigherAuthoOneDetails() {

        $condition = "ocha_status=1 and level=1";
        $this->db->select('emp_code as authoHih_one');
        $this->db->from('other_claim_higher_autho');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->authoHih_one;
        } else {
            return false;
        }
    }
    
       
      public function fetchOtherReimHigherAuthoOneDetails($emp_code) {
     
        $condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=2 and os.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,om.ocm_id,om.total_amt,om.reg_date');
        $this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
      }
      
       public function getHigherAuthoTwoDetails() {

        $condition = "ocha_status=1 and level=2";
        $this->db->select('emp_code as authoHih_one');
        $this->db->from('other_claim_higher_autho');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->authoHih_one;
        } else {
            return false;
        }
    }
    
      public function fetchOtherReimHigherAuthoTwoDetails($emp_code) {
     
        $condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=3 and os.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,om.ocm_id,om.total_amt,om.reg_date');
        $this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
      }
      
      
        public function fetchLocalReimSancAuthoDetails($emp_code) {
     
       $condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=4 and os.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,om.ocm_id,om.total_amt,om.reg_date');
        $this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function fetchOtherReimApprovedDetailsTbl($emp_code) {
        $condition = "ocs.emp_code=ocm.emp_code and ocs.level_of=4 and ocs.action=1 and ocs.ocm_id=ocm.ocm_id and ocm.ocm_status=3 and ocs.emp_code=" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,ocm.total_amt,ocm.reg_date,ocs.action_date,ocs.action');
        $this->db->from('other_claim_status ocs, other_claim_mst ocm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
        
     public function otherClaimDetailsApproval($ocm_id) {
        $condition = "ocm.emp_code=em.emp_code and em.emp_dept=dm.dept_code and em.grade_id=gm.grade_id and ocm.ocm_id=" . "'" . $ocm_id . "'";
        $this->db->select('ocm.ocm_id, em.emp_code, em.emp_name, em.plant_code, ocm.reg_date, gm.grade, dm.dept_name, ocm.bank_name,ocm.acc_no,ocm.ifsc,ocm.justification');
        $this->db->from('other_claim_mst ocm, employee_master em, department_master dm, grade_mst gm ');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function otherClaimDetailsStatusLog($ocm_id) {
         
        $sql = "SELECT ocs.ocm_id,ocs.actual_action,ocs.comment,ocs.action_date,ocs.action_time,em.emp_name FROM other_claim_status ocs, employee_master em WHERE em.emp_code=ocs.rep_autho and ocs.ocm_id=".$ocm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function fetchOtherReimPendingDetails($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.rep_autho=em.emp_code and ocs.action=0 and ocm.ocm_status=1 and ocs.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,ocm.total_amt,ocm.reg_date,em.emp_name');
        $this->db->from('other_claim_mst ocm ,other_claim_status ocs ,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function fetchOtherReimRejectDetails($emp_code) {
       
        $condition = "ocm_status=2 AND emp_code=" . "'" . $emp_code . "'";
        $this->db->select('ocm_id,total_amt,reg_date');
        $this->db->from('other_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
      
      public function fetchOtherReimApprovalHODClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=1 and ocs.emp_code=em.emp_code
    and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchOtherReimRejectHODClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=1 and ocs.emp_code=em.emp_code
    and ocs.rep_autho  =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchOtherReimApprovalHigherAuthoClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=2 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchOtherReimRejectHigherAuthoClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=2 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function fetchOtherReimAcceptmdOfficeClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=3 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchOtherReimRejectMdOfficeClaim($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=3 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function showSancAuthoReportAccept($txtFromDate,$txtToDate) {
        
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=4 and ocs.emp_code=em.emp_code and ocm.ocm_status=3 and  ocm.reg_date BETWEEN  " . "'" . $txtFromDate . "'" . " AND " . "'" . $txtToDate . "'";
         $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
      public function fetchOtherReimSancAuthoRejectDetails($emp_code) {
        $condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=4 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('ocm.ocm_id,em.emp_name,ocm.total_amt,ocm.reg_date');
        $this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
     public function fetchVoucherDate($ocm_id) {

        $condition = "ocm_id =" . "'" . $ocm_id . "'";
        $this->db->select('reg_date');
        $this->db->from('other_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reg_date;
        } else {
            return false;
        }
    }
    
    public function fetchUserMailDetails($ocm_id) {
        $condition = "em.emp_code=ocm.emp_code and ocm.ocm_id =" . "'" . $ocm_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('other_claim_mst ocm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
    
      public function fetchEmpNameForMail($ocm_id) {

        $condition = "em.emp_code=ocm.emp_code and ocm.ocm_id =" . "'" . $ocm_id . "'";
        $this->db->select('em.emp_name');
        $this->db->from('other_claim_mst ocm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_name;
        } else {
            return false;
        }
    }
     public function fetchHigherAuthoMailDetailsForClaimer() {
        $condition = "oa.emp_code=em.emp_code and oa.ocha_status=1 AND oa.level=1";
        $this->db->select('em.emp_email As HigherAuthoEmail');
        $this->db->from('other_claim_higher_autho oa, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->HigherAuthoEmail;
        } else {
            return false;
        }
    }
    
     public function fetchUserDepartmentDetails($ocm_id) {
        $condition = "em.emp_dept=dm.dept_code and em.emp_code=ocm.emp_code and ocm.ocm_id=" . "'" . $ocm_id . "'";
        $this->db->select('dm.dept_name');
        $this->db->from('employee_master em, department_master dm, other_claim_mst ocm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->dept_name;
        } else {
            return false;
        }
    }
    
    public function fetchUserPlantDetails($ocm_id) {
        $condition = "em.plant_code =pm.plant_code and em.emp_code=ocm.emp_code and ocm.ocm_id=" . "'" . $ocm_id . "'";
        $this->db->select('pm.plant_name');
        $this->db->from('employee_master em, plant_master pm, other_claim_mst ocm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->plant_name;
        } else {
            return false;
        }
    }
   
    public function fetchMdOfficeMailDetailsForClaimer() {
        $condition = "oa.emp_code=em.emp_code and oa.ocha_status=1 AND oa.level=2";
        $this->db->select('em.emp_email As mdOfficeAuthoEmail');
        $this->db->from('other_claim_higher_autho oa, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->mdOfficeAuthoEmail;
        } else {
            return false;
        }
    }
}

