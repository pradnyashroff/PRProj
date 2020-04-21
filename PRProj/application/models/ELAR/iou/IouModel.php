<?php

class IouModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
     public function addIouClaim($data) {
         
        $this->db->insert('iou_claim_mst', $data);
    }
        
    public function fetchIouDraftDetails($emp_code) {
        $condition = "iou_status=0 and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('iou_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function iouClaimDetails($lou_clm_id) {
        $condition = "lou_clm_id =" . "'" . $lou_clm_id . "'";

        $this->db->select('*');
        $this->db->from('iou_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchIouPendingDetails($emp_code) {
        $condition = "im.lou_clm_id=ios.lou_clm_id and ios.rep_autho=em.emp_code and ios.action=0 and im.iou_status=1 and ios.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('im.lou_clm_id,im.iou_amt,im.reg_date,em.emp_name');
        $this->db->from('iou_claim_mst im ,iou_status ios ,employee_master em ');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
        public function iouClaimProcess($dataProcess) {
        $this->load->database();
        $this->db->insert('iou_status', $dataProcess);
        }
            public function addIouClaimDraft($data, $UpdateId) {
        $this->db->where('lou_clm_id', $UpdateId);
        $this->db->update('iou_claim_mst',$data);
        }
   
        
      public function iouClaimDetailsStatusLog($lou_clm_id) {
         
        $sql = "SELECT ios.lou_clm_id,ios.actual_action,ios.comment,ios.action_date,ios.action_time,em.emp_name FROM iou_status ios, employee_master em WHERE em.emp_code=ios.rep_autho and ios.lou_clm_id=".$lou_clm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function iouClaimDetailsHodActionStatus($lou_clm_id,$emp_code) {
         
        $sql = "SELECT em.emp_name,ios.iou_status_id,ios.emp_code,ios.actual_action, ios.action_date, ios.action_time , ios.comment FROM iou_status ios, employee_master em WHERE ios.lou_clm_id=".$lou_clm_id." and ios.emp_code=".$emp_code." and ios.level_of=1 AND em.emp_code=ios.rep_autho ORDER BY ios.iou_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function iouDetailsSanAuthoActionStatus($lou_clm_id,$emp_code) {
         
        $sql = "SELECT  em.emp_name,ios.iou_status_id,ios.emp_code,ios.actual_action, ios.action_date, ios.action_time , ios.comment FROM iou_status ios, employee_master em WHERE ios.lou_clm_id=".$lou_clm_id."  and ios.emp_code=".$emp_code." and ios.level_of=2 AND em.emp_code=ios.rep_autho ORDER BY ios.iou_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchIouApprovedDetailsTbl($emp_code) {
        $condition = "ios.emp_code=im.emp_code and ios.level_of=2 and ios.action=1 and ios.lou_clm_id=im.lou_clm_id and im.iou_status=3 and ios.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('im.lou_clm_id,im.iou_amt,im.reg_date,ios.action_date,ios.action');
        $this->db->from('iou_status ios, iou_claim_mst im');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function fetchIouRejectDetails($emp_code) {
       
        $condition = "iou_status=2 AND emp_code=" . "'" . $emp_code . "'";
        $this->db->select('lou_clm_id,iou_amt,reg_date');
        $this->db->from('iou_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchIouApprovalDetails($emp_code) {
     
        $condition = "ios.lou_clm_id=im.lou_clm_id and im.emp_code=em.emp_code and ios.actual_action = 0 and ios.level_of=1 and ios.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,im.lou_clm_id,im.iou_amt,im.reg_date');
        $this->db->from('iou_claim_mst im, employee_master em, iou_status  ios');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function iouDetailsApproval($lou_clm_id) {
        $condition = "im.emp_code=em.emp_code and em.emp_dept=dm.dept_code and em.grade_id=gm.grade_id and im.lou_clm_id=" . "'" . $lou_clm_id . "'";
        $this->db->select('im.lou_clm_id, em.emp_code, em.emp_name, em.plant_code, im.reg_date, gm.grade, dm.dept_name');
        $this->db->from('iou_claim_mst im, employee_master em, department_master dm, grade_mst gm ');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function getClaimerDetails($lou_clm_id) {

        $condition = "lou_clm_id =" . "'" . $lou_clm_id . "'";
        $this->db->select('emp_code as claimer');
        $this->db->from('iou_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimer;
        } else {
            return false;
        }
    }
    
    public function fetchUserMailDetails($lou_clm_id) {
        $condition = "em.emp_code=im.emp_code and im.lou_clm_id =" . "'" . $lou_clm_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('iou_claim_mst im, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
     public function iouDetailsHodActionData($emp_code,$lou_clm_id) {
             $sql = "SELECT iou_status_id  FROM iou_status WHERE rep_autho=".$emp_code." and lou_clm_id=".$lou_clm_id." and actual_action=0 and level_of=1 ORDER BY iou_status_id DESC LIMIT 0, 1";
            $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function updateClaimAction($data, $editId,$iou_status_id) {
        $condition = "lou_clm_id=" . "'" . $editId . "' and iou_status_id=" . "'" . $iou_status_id ."'";
        $this->db->where($condition);
        $this->db->update('iou_status',$data);
        }
        
           public function iouClaimProcessRepAutho($data2) {
        $this->load->database();
        $this->db->insert('iou_status', $data2);
        }
          public function iouRejectHODClaim($emp_code) {
        $condition = "im.lou_clm_id=ios.lou_clm_id and ios.action=2 and ios.level_of=1 and ios.emp_code=em.emp_code and ios.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('im.lou_clm_id,em.emp_name,im.iou_amt,im.reg_date');
        $this->db->from('iou_claim_mst im, iou_status ios, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
        public function iouDetailsHodReject($lou_clm_id,$emp_code) {
         
       $sql = "SELECT ios.iou_status_id, im.iou_amt,ios.action_date,ios.action_time,ios.comment FROM iou_claim_mst im, iou_status ios WHERE im.lou_clm_id=ios.lou_clm_id and ios.action=2 and ios.level_of=1 and ios.rep_autho=".$emp_code." AND ios.lou_clm_id=".$lou_clm_id."";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
      public function fetchIouApprovalHODClaim($emp_code) {
        $condition = "im.lou_clm_id=ios.lou_clm_id and ios.action=1 and ios.level_of=1 and ios.emp_code=em.emp_code and ios.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('im.lou_clm_id,em.emp_name,im.iou_amt,im.reg_date');
        $this->db->from('iou_claim_mst im, iou_status ios, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
         public function iouClaimDetailsHodApproved($lou_clm_id,$emp_code) {
         
        $sql = "SELECT  im.iou_amt,ios.action_date,ios.action_time,ios.comment FROM iou_claim_mst im, iou_status ios
                WHERE im.lou_clm_id=ios.lou_clm_id and ios.action=1 and ios.level_of=1 and ios.rep_autho=".$emp_code." AND ios.lou_clm_id=".$lou_clm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
        public function iouSancAuthoDetails($emp_code) {
     
        $condition = "ios.lou_clm_id=im.lou_clm_id and im.emp_code=em.emp_code and ios.actual_action = 0 and ios.level_of=2 and ios.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,im.lou_clm_id,im.iou_amt,im.reg_date');
        $this->db->from('iou_claim_mst im, employee_master em, iou_status  ios');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
            public function iouDetailsLastApprovalDetils($emp_code,$lou_clm_id) {
          $sql = "SELECT iou_status_id,rep_autho,level_of,lou_clm_id FROM iou_status WHERE rep_autho=".$emp_code." and lou_clm_id=".$lou_clm_id." and actual_action=0 and level_of=2 ORDER BY iou_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchVoucherDate($lou_clm_id) {

        $condition = "lou_clm_id =" . "'" . $lou_clm_id . "'";
        $this->db->select('reg_date');
        $this->db->from('iou_claim_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reg_date;
        } else {
            return false;
        }
    }
    
      public function fetchEmpNameForMail($lou_clm_id) {
        $condition = "em.emp_code=im.emp_code and im.lou_clm_id =" . "'" . $lou_clm_id . "'";
        $this->db->select('em.emp_name');
        $this->db->from('iou_claim_mst im, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_name;
        } else {
            return false;
        }
    }
        
        public function fetchFinalRateForMail($lou_clm_id) {
        $condition = "em.emp_code=im.emp_code and im.lou_clm_id =" . "'" . $lou_clm_id . "'";
        $this->db->select('im.iou_amt');
        $this->db->from('iou_claim_mst im, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->iou_amt;
        } else {
            return false;
        }
    }
    
      public function updateClaimActionBySancAutho($data, $lou_clm_id,$auto_code,$iou_status_id) {
        $condition = "lou_clm_id=" . "'" . $lou_clm_id . "' and rep_autho=" . "'" . $auto_code . "' and iou_status_id=" . "'" . $iou_status_id . "'";
        $this->db->where($condition);
        $this->db->update('iou_status',$data);
        }
        
       public function showSancAuthoReportAccept($txtFromDate,$txtToDate) {
         $condition = "im.lou_clm_id=ios.lou_clm_id and ios.action=1 and ios.level_of=2 and ios.emp_code=em.emp_code and im.iou_status=3 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and im.reg_date BETWEEN   " . "'" . $txtFromDate . "'" . " AND " . "'" . $txtToDate . "'";
         $this->db->select('im.lou_clm_id,em.emp_name,im.iou_amt,im.reg_date,em.emp_code,dm.dept_name,pm.plant_name');
$this->db->from('iou_claim_mst im, iou_status ios, employee_master em, department_master dm, plant_master pm');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
    public function iouDetailsSancApprovedReq($lou_clm_id,$emp_code) {
         
        $sql = "SELECT im.iou_amt,ios.action_date,ios.action_time,ios.comment  FROM iou_claim_mst im, iou_status ios
        WHERE im.lou_clm_id=ios.lou_clm_id and ios.action=1 and ios.level_of=2 and ios.rep_autho=".$emp_code." AND ios.lou_clm_id=".$lou_clm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
        public function iouReimSancAuthoRejectDetails($emp_code) {
        $condition = "im.lou_clm_id =ios.lou_clm_id  and ios.action=2 and ios.level_of=2 and ios.emp_code=em.emp_code and ios.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('im.lou_clm_id,em.emp_name,im.iou_amt,im.reg_date');
        $this->db->from('iou_claim_mst im, iou_status ios, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function iouDetailsSancAuthoReject($lou_clm_id,$emp_code) {
        $sql = "SELECT ios.iou_status_id,im.iou_amt,ios.action_date,ios.action_time,ios.comment FROM iou_claim_mst im, iou_status ios WHERE im.lou_clm_id =ios.lou_clm_id and ios.action=2 and ios.level_of=2 and ios.rep_autho=".$emp_code." AND ios.lou_clm_id=".$lou_clm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function iouBankDetails($emp_code) {
        $condition = "emp_code =" . "'" . $emp_code . "'";

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
    
    public function addIOUTransaction($dataTransaction) {
         
        $this->db->insert('iou_transaction', $dataTransaction);
    }
       
  
     public function getClosingAmount($claimer_id) {

        //$condition = "ORDER BY iou_tr_id DESC LIMIT 0, 1 emp_code =" . "'" . $claimer_id . "'";
         $condition = "emp_code='".$claimer_id."'  ORDER BY iou_tr_id DESC LIMIT 0, 1";
        $this->db->select('closing_amt');
        $this->db->from('iou_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->closing_amt;
        } else {
            return false;
        }
    }
    
     public function statusCheckIOUPending($emp_code) {
             $condition = "trn_status=2 and emp_code='".$emp_code."'  ";
        $this->db->select('closing_amt');
        $this->db->from('iou_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->closing_amt;
        } else {
            return false;
        }
    }
    
     public function statusCheckIOUPendingComapny($claimerId) {
             $condition = "trn_status=3 and emp_code='".$claimerId."'  ";
        $this->db->select('closing_amt');
        $this->db->from('iou_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->closing_amt;
        } else {
            return false;
        }
    }
    
    
}

?>