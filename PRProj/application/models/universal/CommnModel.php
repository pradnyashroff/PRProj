<?php

class CommnModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
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

//        function findGradeByEmpCode($emp_code)//Full Department name from dept_master
//        {
//            echo '';
//            $condition = "emp_code =" . "'" . $emp_code . "'";
//        $this->db->select('grade_id');
//        $this->db->from('employee_master');
//        $this->db->where($condition);
//        $query = $this->db->get();
//        
//        if ($query->num_rows() >= 1) {
//            $emp_grade=$query->row()->grade_id;
//             
//            return $query->row()->grade_id;
//        } else {
//            return false;
//        }
//        
//        }


    public function getGradeDetails($emp_code) {

        $condition = " em.grade_id=gr.grade_id and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('gr.grade');
        $this->db->from('employee_master em, grade_mst gr');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->grade;
        } else {
            return false;
        }
    }

    public function getVehicleDetailsByGrade($grade_id) {
        echo 'calling modle method here......';
        $condition = "vg.veh_id=vm.veh_id and vg.grade_id =" . "'" . $grade_id . "'";
        $this->db->select("vm.vehicle,vm.veh_id");
        $this->db->from('vehicle_grid vg, vehicle_mst vm');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }

    public function addLocalReimDetails($data) {
        $this->load->database();
        $this->db->insert('locrim_clm_detail', $data);
    }
     public function addLocalReimDetailsDraft($data) {
        $this->load->database();
        $this->db->insert('locrim_clm_detail', $data);
    }
     public function addLocalReimClaim($data) {
        $this->load->database();
        $this->db->insert('locrim_clm_mst', $data);
    }
    
   
    public function fetchLocalReimDetails($emp_code) {
        $condition = "trvl_mode=veh_id and lrcd_status = 0 and dynamic_id =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_detail,vehicle_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchLocalReimDraftDetails($emp_code) {
        $condition = "lrcd_status=0 and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchLocalReimApprovedDetails($emp_code) {
        $condition = "lrcd_status=0 and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
   public function fetchLocalReimDetailsEdit($lrcd_id) {
        $condition = "trvl_mode=veh_id and lrcd_id =" . "'" . $lrcd_id . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_detail,vehicle_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function get_by_id($id)
	{
		  $condition = "CURDATE() BETWEEN fr.app_from and fr.app_to and ld.trvl_mode=fr.veh_id and ld.trvl_mode= vm.veh_id and ld.lrcd_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_detail ld,vehicle_mst vm, fule_rate  fr');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
         public function getRateFromVehicle($id)
	{
        $condition = "CURDATE() BETWEEN app_from and app_to and veh_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('fule_rate');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
    public function updateConvensesData($data, $editId) {
        $this->db->where('lrcd_id', $editId);
        $this->db->update('locrim_clm_detail',$data);
        }
        
        public function localClaimDetails($lrcm_id) {
        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";

        $this->db->select('*');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function localClaimDetailsApproal($lrcm_id) {
        $condition = "lcm.emp_code=em.emp_code and em.emp_dept=dm.dept_code and em.grade_id=gm.grade_id and lcm.lrcm_id=" . "'" . $lrcm_id . "'";
        $this->db->select('lcm.lrcm_id, em.emp_code, em.emp_name, lcm.plant_code, lcm.reg_date, gm.grade, dm.dept_name');
        $this->db->from('locrim_clm_mst lcm, employee_master em, department_master dm, grade_mst gm');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }

     public function fetchLocalReimDetailsByClaimId($lrcm_id) {
        $condition = "trvl_mode=veh_id and lrcd_status = 0 and dynamic_id =" . "'" . $lrcm_id . "'";
        $this->db->select('*');
        $this->db->from('locrim_clm_detail,vehicle_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    function deleterecords($id)
    {
        $this->db->query("delete from locrim_clm_detail where lrcd_id='".$id."'");
    } 
       public function fetchReportingDetails($emp_code) {

        $condition = "rep_mst_status=1 and emp_code =" . "'" . $emp_code . "'";
        $this->db->select('reporting_autho');
        $this->db->from('reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reporting_autho;
        } else {
            return false;
        }
    }
     public function addLocalReimClaimDraft($data, $UpdateId) {
        $this->db->where('lrcm_id', $UpdateId);
        $this->db->update('locrim_clm_mst',$data);
        }
    
   
      public function localReimClaimProcess($dataProcess) {
        $this->load->database();
        $this->db->insert('local_rim_status', $dataProcess);
        }
   public function fetchLocalReimApprovalDetails($emp_code) {
     
        $condition = "ls.lrcm_id=lm.lrcm_id and lm.emp_code=em.emp_code and ls.actual_action = 0 and ls.level_of=1 and ls.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,lm.lrcm_id,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, employee_master em, local_rim_status  ls');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
     public function updateClaimAction($data, $editId,$local_rim_id) {
        $condition = "lrcm_id=" . "'" . $editId . "' and local_rim_id=" . "'" . $local_rim_id ."'";
        $this->db->where($condition);
        $this->db->update('local_rim_status',$data);
        }
        
        
    public function getSanctionAuthoDetails() {

        $condition = "sam_status=1";
        $this->db->select('emp_code as autho_code');
        $this->db->from('saction_autho_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->autho_code;
        } else {
            return false;
        }
    }
    
    public function localReimClaimProcessRepAutho($data2) {
        $this->load->database();
        $this->db->insert('local_rim_status', $data2);
        }
        
         public function getClaimerDetails($lrcm_id) {

        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('emp_code as claimer');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimer;
        } else {
            return false;
        }
    }
    
     public function fetchLocalReimSancAuthoDetails($emp_code) {
     
        $condition = "ls.lrcm_id=lm.lrcm_id and lm.emp_code=em.emp_code and ls.actual_action = 0 and ls.level_of=2 and ls.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('em.emp_name,lm.lrcm_id,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, employee_master em, local_rim_status  ls');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function updateClaimActionBySancAutho($data, $lrcm_id,$auto_code,$final_local_rim_id) {
        $condition = "lrcm_id=" . "'" . $lrcm_id . "' and rep_autho=" . "'" . $auto_code . "' and local_rim_id=" . "'" . $final_local_rim_id . "'";
        $this->db->where($condition);
        $this->db->update('local_rim_status',$data);
        }
        
        
    
    
      public function fetchLocalReimRejectDetails($emp_code) {
       
        $condition = "lrcd_status=2 AND emp_code=" . "'" . $emp_code . "'";
        $this->db->select('lrcm_id,total_amt,reg_date');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function localClaimDetailsHodActionStatus($lrcm_id,$emp_code) {
         
        $sql = "SELECT em.emp_name,ls.local_rim_id,ls.emp_code,ls.actual_action, ls.action_date, ls.action_time , ls.comment"
                . " FROM local_rim_status ls, employee_master em "
                . "WHERE ls.lrcm_id=".$lrcm_id ." and ls.emp_code=".$emp_code ." "
                . "and ls.level_of=1 AND em.emp_code=ls.rep_autho  "
                . "ORDER BY ls.local_rim_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function localClaimDetailsSanAuthoActionStatus($lrcm_id,$emp_code) {
         
        $sql = "SELECT em.emp_name,ls.local_rim_id,ls.emp_code,ls.actual_action, ls.action_date, ls.action_time , ls.comment"
                . " FROM local_rim_status ls, employee_master em "
                . "WHERE ls.lrcm_id=".$lrcm_id ." and ls.emp_code=".$emp_code ." "
                . "and ls.level_of=2 AND em.emp_code=ls.rep_autho  "
                . "ORDER BY ls.local_rim_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function localClaimDetailsLastApprovalDetils($emp_code,$lrcm_id) {
          $sql = "SELECT local_rim_id,rep_autho,level_of,lrcm_id FROM local_rim_status WHERE rep_autho=".$emp_code." and lrcm_id=".$lrcm_id." and actual_action=0 and level_of=2 ORDER BY local_rim_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
        
     public function localClaimDetailsHodActionData($emp_code,$lrcm_id) {
             $sql = "SELECT local_rim_id FROM local_rim_status WHERE rep_autho=".$emp_code." and lrcm_id=".$lrcm_id." and actual_action=0 and level_of=1 ORDER BY local_rim_id DESC LIMIT 0, 1";
            $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
       public function fetchLocalReimApprovedDetailsTbl($emp_code) {
        $condition = "ls.emp_code=lm.emp_code and ls.level_of=2 and ls.action=1 and ls.lrcm_id=lm.lrcm_id and lm.lrcd_status=3 and ls.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,lm.total_amt,lm.reg_date,ls.action_date,ls.action');
        $this->db->from('local_rim_status ls, locrim_clm_mst lm ');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
      public function fetchLocalReimPendingDetails($emp_code) {
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.rep_autho=em.emp_code and ls.action=0 and lm.lrcd_status=1 and ls.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,lm.total_amt,lm.reg_date,em.emp_name');
        $this->db->from('locrim_clm_mst lm ,local_rim_status ls ,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
  public function fetchLocalReimApprovalHODClaim($emp_code) {
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=1 and ls.emp_code=em.emp_code
        and ls.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function localClaimDetailsHodApproved($lrcm_id,$emp_code) {
         
        $sql = "SELECT lm.total_amt,ls.action_date,ls.action_time,ls.comment FROM locrim_clm_mst lm, local_rim_status ls
WHERE lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=1 and ls.rep_autho=".$emp_code." AND ls.lrcm_id=".$lrcm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchLocalReimRejectHODClaim($emp_code) {
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=2 and ls.level_of=1 and ls.emp_code=em.emp_code
        and ls.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function localClaimDetailsHodReject($lrcm_id,$emp_code) {
         
        $sql = "SELECT ls.local_rim_id, lm.total_amt,ls.action_date,ls.action_time,ls.comment FROM locrim_clm_mst lm, local_rim_status ls WHERE lm.lrcm_id=ls.lrcm_id and ls.action=2 and ls.level_of=1 and ls.rep_autho=".$emp_code." AND ls.lrcm_id=".$lrcm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function fetchLocalReimSancAuthoRejectDetails($emp_code) {
     
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=2 and ls.level_of=2 and ls.emp_code=em.emp_code
        and ls.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function localClaimDetailsSancAuthoReject($lrcm_id,$emp_code) {
         
        $sql = "SELECT ls.local_rim_id, lm.total_amt,ls.action_date,ls.action_time,ls.comment FROM locrim_clm_mst lm, local_rim_status ls WHERE lm.lrcm_id=ls.lrcm_id and ls.action=2 and ls.level_of=2 and ls.rep_autho=".$emp_code." AND ls.lrcm_id=".$lrcm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
  public function fetchLocalReimApprovalSancAutho($emp_code) {
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=2 and ls.emp_code=em.emp_code
        and ls.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function localClaimDetailsSancApproved($emp_code) {
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=2 and ls.emp_code=em.emp_code
        and ls.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date');
        $this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    public function localClaimDetailsSancApprovedReq($lrcm_id,$emp_code) {
         
        $sql = "SELECT lm.total_amt,ls.action_date,ls.action_time,ls.comment FROM locrim_clm_mst lm, local_rim_status ls
        WHERE lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=2 and ls.rep_autho=".$emp_code." AND ls.lrcm_id=".$lrcm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function localClaimDetailsStatusLog($lrcm_id) {
         
        $sql = "SELECT ls.lrcm_id,ls.actual_action,ls.comment,ls.action_date,ls.action_time,em.emp_name FROM local_rim_status ls, employee_master em WHERE em.emp_code=ls.rep_autho and ls.lrcm_id=".$lrcm_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
     public function getAttachmentDownload($lrcm_id) {

        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('pic_file');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->pic_file;
        } else {
            return false;
        }
    }

       public function sancAuthNavBarStatus($emp_code) {

        $condition = "sam_status=1 and emp_code  =" . "'" . $emp_code . "'";
        $this->db->select('sam_id');
        $this->db->from('saction_autho_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->sam_id;
        } else {
            return false;
        }
    }
    
    public function repoAuthNavBarStatus($emp_code) {

        $condition = "rep_mst_status=1 and reporting_autho  =" . "'" . $emp_code . "'";
        $this->db->select('reporting_autho');
        $this->db->from('reporting_grid');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reporting_autho;
        } else {
            return false;
        }
    }
    
        public function fetchHODMailDetailsForClaimer($emp_code) {
        $condition = "rg.reporting_autho=em.emp_code  and rg.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('em.emp_email As hodEmail');
        $this->db->from('reporting_grid rg , employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->hodEmail;
        } else {
            return false;
        }
    }
    
     public function fetchSancAuthoMailDetailsForClaimer() {
        $condition = "sm.emp_code=em.emp_code and sm.sam_status=1";
        $this->db->select('em.emp_email As SancAuthoEmail');
        $this->db->from('saction_autho_mst sm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->SancAuthoEmail;
        } else {
            return false;
        }
    }
      public function fetchVoucherDate($lrcm_id) {

        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('reg_date');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reg_date;
        } else {
            return false;
        }
    }
    
         public function fetchUserMailDetails($lrcm_id) {
        $condition = "em.emp_code=lm.emp_code and lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('locrim_clm_mst lm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
    
       public function fetchEmpNameForMail($lrcm_id) {

        $condition = "em.emp_code=lm.emp_code and lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('em.emp_name');
        $this->db->from('locrim_clm_mst lm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_name;
        } else {
            return false;
        }
    }
      public function showSancAuthoReportAccept($txtFromDate,$txtToDate) {
        
        $condition = "lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=2 and ls.emp_code=em.emp_code
        and lm.lrcd_status=3 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and lm.reg_date BETWEEN  " . "'" . $txtFromDate . "'" . " AND " . "'" . $txtToDate . "'";
         $this->db->select('lm.lrcm_id,em.emp_name,lm.total_amt,lm.reg_date,em.emp_code,dm.dept_name,pm.plant_name');
$this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em, department_master dm, plant_master pm');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
     public function getDraftJustification($lrcm_id) {

        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('justification');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->justification;
        } else {
            return false;
        }
    }
    
     public function higherAuthNavBarStatus($emp_code) {

        $condition = " ocha_status=1 and level=1 and emp_code  =" . "'" . $emp_code . "'";
        $this->db->select('ocha_id');
        $this->db->from('other_claim_higher_autho');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->ocha_id;
        } else {
            return false;
        }
    }
    
    public function mdOfficeAuthNavBarStatus($emp_code) {

        $condition = " ocha_status=1 and level=2 and emp_code  =" . "'" . $emp_code . "'";
        $this->db->select('ocha_id');
        $this->db->from('other_claim_higher_autho');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->ocha_id;
        } else {
            return false;
        }
    }
    //-----------------------------------------Start------------------------------
     //Additonal Development Of Local Report 2019-10-26
       public function getPlantNameDetails($plant_code) {

        $condition = " plant_code =" . "'" . $plant_code . "'";
        $this->db->select('plant_name');
        $this->db->from('plant_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->plant_name;
        } else {
            return false;
        }
    }
     //------------------------------------------------End-------------------------
     //--------------------------------------------Start----------------------------------------
    //Plant Wise Reporting Authority Claim Forword
    //Additional Development 2019-11-11 
    //Author: Kaustubh Ashok Khadke
    //Requirement By: Mate Sir At 2019-11-09
    
    public function getClaimerPlant($lrcm_id) {

        $condition = "lrcm_id =" . "'" . $lrcm_id . "'";
        $this->db->select('plant_code as claimerPlant');
        $this->db->from('locrim_clm_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimerPlant;
        } else {
            return false;
        }
    }
    //------------------------------------------------End-------------------------
    // Ganesh Barhate Code Started From Here For Dashboard 2020-02-08
    
    //user pending count local claim
public function local_draft($emp_code) {
$condition = "emp_code =" . "'" . $emp_code . "' and action ='0' ";
$this->db->select('action');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//user approval count local claim
public function local_approval($emp_code) {
$condition = "ls.emp_code=lm.emp_code and ls.level_of=2 and ls.action=1 and ls.lrcm_id=lm.lrcm_id and lm.lrcd_status=3 and ls.emp_code = " . "'" . $emp_code . "' ";
$this->db->select('*');
$this->db->from('local_rim_status ls, locrim_clm_mst lm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//user  draft count local claim
public function local_Draftcl($emp_code) {
$condition = "emp_code =" . "'" . $emp_code . "' and lrcd_status ='0'";
$this->db->select('*');
$this->db->from('locrim_clm_mst');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//user Reject count local claim
public function local_rejectcl($emp_code) {
$condition = "emp_code =" . "'" . $emp_code . "' and lrcd_status ='2'";
$this->db->select('*');
$this->db->from('locrim_clm_mst');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

// approval Pending count local claim
public function local_pend_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action = 0";
$this->db->select('*');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//approval  Approve count local claim
public function local_accept_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action = 1";
$this->db->select('*');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

// approval reject count local claim
public function local_rjt_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action = 2";
$this->db->select('*');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// SA Appprove count local claim
public function local_approve_sa($emp_code) {
$condition = "lm.lrcm_id=ls.lrcm_id and ls.action=1 and ls.level_of=2 and ls.emp_code=em.emp_code and lm.lrcd_status=3 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('locrim_clm_mst lm, local_rim_status ls, employee_master em, department_master dm, plant_master pm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// SA Reject count local claim
public function local_reject_sa($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action = 2";
$this->db->select('*');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// SA pending count local claim
public function local_pending_sa($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action = 0";
$this->db->select('*');
$this->db->from('local_rim_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// user draft count iou claim
public function local_draft_user($emp_code) {
$condition = "emp_code =" . "'" . $emp_code . "' and iou_status = 0";
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
// user pending count iou claim
public function local_pending_user($emp_code) {
$condition =  "im.lou_clm_id=ios.lou_clm_id and ios.rep_autho=em.emp_code and ios.action=0 and im.iou_status=1 and ios.emp_code =" . "'" . $emp_code . "'";
$this->db->select('im.lou_clm_id,im.iou_amt,im.reg_date,em.emp_name');
$this->db->from('iou_claim_mst im ,iou_status ios ,employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// user Approve count iou claim
public function local_approve_user($emp_code) {
$condition = "ios.emp_code=im.emp_code and ios.level_of=2 and ios.action=1 and ios.lou_clm_id=im.lou_clm_id and im.iou_status=3 and ios.emp_code =" . "'" . $emp_code . "'";
$this->db-> select('im.lou_clm_id');
$this->db->from('iou_status ios, iou_claim_mst im');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// user Reject count iou claim
public function local_reject_user($emp_code) {
$condition = "emp_code =" . "'" . $emp_code . "' and iou_status = 2";
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

//user  draft count other claim
public function other_Draftcl($emp_code) {
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

//user pending count other claim
public function other_pending_claim($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.rep_autho=em.emp_code and ocs.action=0 and ocm.ocm_status=1 and ocs.emp_code=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm ,other_claim_status ocs ,employee_master em ');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//user approval count other claim
public function other_approval_claim($emp_code) {
$condition = "ocs.emp_code=ocm.emp_code and ocs.level_of=4 and ocs.action=1 and ocs.ocm_id=ocm.ocm_id and ocm.ocm_status=3 and ocs.emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_status ocs, other_claim_mst ocm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//user Reject count other claim
public function other_reject_claim($emp_code) {
$condition = "ocm_status=2 AND emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
        //user  draft count travel claim
public function travel_Draftcl($emp_code) {
$condition = "trv_mst_status=0 and emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
 //user  pending count travel claim
public function travel_pendingcl($emp_code) {
$condition = "tm.trv_mst_id=ts.trv_mst_id and ts.rep_autho=em.emp_code and ts.action=0 and tm.trv_mst_status=1 and ts.emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//user  Approve count travel claim
public function travel_approvecl($emp_code) {
$condition = "ts.emp_code=tm.emp_code and ts.level_of=2 and ts.action=1 and ts.trv_mst_id=tm.trv_mst_id and tm.trv_mst_status=4 and ts.emp_code=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//user  Reject count travel claim
public function travel_rejectcl($emp_code) {
$condition = "trv_mst_status=2 AND emp_code=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//user  travel non iou count travel claim
public function travel_approve_noniou($emp_code) {
$condition = "ts.emp_code=tm.emp_code and ts.level_of=2 and ts.action=1 and ts.trv_mst_id=tm.trv_mst_id and tm.trv_mst_status=7 and ts.emp_code =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
 // Approval pending count iou claim
public function iou_pending_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action=0 and actual_action=0";
$this->db->select('*');
$this->db->from('iou_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 
// Approval Approve count iou claim
public function iou_approve_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action=1 and actual_action=1";
$this->db->select('*');
$this->db->from('iou_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

// reject Reject count iou claim
public function iou_reject_approv($emp_code) {
$condition = "rep_autho =" . "'" . $emp_code . "' and action=2 and actual_action=2";
$this->db->select('*');
$this->db->from('iou_status');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//approval pending count other claim
public function other_pending_approval($emp_code) {
$condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=1 and os.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//approval accept count other claim
public function other_accept_approval($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=1 and ocs.emp_code=em.emp_code
    and ocs.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//reject accept count other claim
public function other_reject_approval($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=1 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel approval  pending count claim
public function travel_pending_approv($emp_code) {
$condition = "ts.trv_mst_id=tm.trv_mst_id and tm.emp_code=em.emp_code and ts.actual_action = 0 and ts.level_of=1 and ts.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel approval  approve count claim
public function travel_approve_approv($emp_code) {
$condition = "tm.trv_mst_id =ts.trv_mst_id and ts.action=1 and ts.level_of=1 and ts.emp_code=em.emp_code and ts.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel approval  reject count claim
public function travel_reject_approv($emp_code) {
$condition = "ts.trv_mst_id=tm.trv_mst_id and ts.action=2 and ts.level_of=1 and ts.emp_code=em.emp_code and ts.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
// SA pending count iou claim
public function iou_pending_sa($emp_code) {
$condition ="ios.lou_clm_id=im.lou_clm_id and im.emp_code=em.emp_code and ios.actual_action = 0 and ios.level_of=2 and ios.rep_autho  =" . "'" . $emp_code . "'";
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


// SA reject count iou claim
public function iou_reject_sa($emp_code) {
$condition ="im.lou_clm_id =ios.lou_clm_id  and ios.action=2 and ios.level_of=2 and ios.emp_code=em.emp_code and ios.rep_autho  =" . "'" . $emp_code . "'";
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
// SA approve count iou claim
public function iou_approve_sa($emp_code) {
$condition ="im.lou_clm_id=ios.lou_clm_id and ios.action=1 and ios.level_of=2 and ios.emp_code=em.emp_code and im.iou_status=3 	and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and im.reg_date and ios.rep_autho  =" . "'" . $emp_code . "'";
$this->db->select('im.lou_clm_id,em.emp_name,im.iou_amt,im.reg_date,em.emp_code,dm.dept_name,pm.plant_name');
$this->db->from('iou_claim_mst im, iou_status ios, employee_master em, department_master dm, plant_master pm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
} 
//SA pending count other claim
public function other_pending_sa($emp_code) {
$condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=4 and os.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst om, employee_master em, other_claim_status os');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//SA accept count other claim
public function other_accept_sa($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=4 and ocs.emp_code=em.emp_code and ocm.ocm_status=3 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code  and rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em, department_master dm, plant_master pm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//SA reject count other claim
public function other_reject_sa($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=4 and ocs.emp_code=em.emp_code and ocs.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel SA  pending count claim
public function travel_pending_sa($emp_code) {
$condition = "ts.trv_mst_id=tm.trv_mst_id and tm.emp_code=em.emp_code and ts.actual_action = 0 and ts.level_of=2 and ts.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel SA  approve count claim
public function travel_approve_sa($emp_code) {
$condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=1 and ts.level_of=2 and ts.emp_code=em.emp_code and tm.trv_mst_status=4 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and ts.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em, department_master dm, plant_master pm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel SA  reject count claim
public function travel_reject_sa($emp_code) {
$condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=2 and ts.level_of=2 and ts.emp_code=em.emp_code and ts.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}

//Travel SA  NON IOU APPROVED count claim
public function travel_noniou_sa($emp_code) {
$condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=1 and ts.level_of=2 and ts.emp_code=em.emp_code and tm.trv_mst_status=7 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and ts.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em, department_master dm, plant_master pm');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel SA  CLAIMER OUTSTANDING count claim
public function travel_outstanding_sa($emp_code) {
$condition = "tm.emp_code=em.emp_code and tm.trv_mst_id=tt.trv_mst_id and tm.trv_mst_status=6 and tt.tt_status=2";
$this->db->select('*');
$this->db->from('trvel_mst tm,trvl_transaction tt,employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Travel SA  COMPANY OUTSTANDING count claim
public function travel_companyoutstanding_sa($emp_code) {
$condition = "tm.emp_code=em.emp_code and tm.trv_mst_id=tt.trv_mst_id and tm.trv_mst_status=6 and tt.tt_status=2";
$this->db->select('*');
$this->db->from('trvel_mst tm,trvl_transaction tt,employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other higher autho pending count claim
public function travel_pending_highAutho($emp_code) {
$condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=2 and os.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other higher autho approve count claim
public function travel_approve_highAutho($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=2 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other higher autho reject count claim
public function travel_reject_highAutho($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=2 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other mdoffice autho pending count claim
public function travel_pending_mdofficeAutho($emp_code) {
$condition = "os.ocm_id=om.ocm_id and om.emp_code=em.emp_code and os.actual_action = 0 and os.level_of=3 and os.rep_autho=" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst om, employee_master em, other_claim_status  os');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other mdoffice autho approval count claim
public function travel_approval_mdofficeAutho($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=1 and ocs.level_of=3 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}
//Other mdoffice autho reject count claim
public function travel_reject_mdofficeAutho($emp_code) {
$condition = "ocm.ocm_id=ocs.ocm_id and ocs.action=2 and ocs.level_of=3 and ocs.emp_code=em.emp_code and ocs.rep_autho =" . "'" . $emp_code . "'";
$this->db->select('*');
$this->db->from('other_claim_mst ocm, other_claim_status ocs, employee_master em');
$this->db->where($condition);
$query = $this->db->get();

if ($query->num_rows() >= 1) {
return $query;
} else {
return false;
}
}


}

