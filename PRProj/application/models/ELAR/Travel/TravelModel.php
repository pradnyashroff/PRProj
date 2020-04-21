<?php
class TravelModel extends CI_Model
{
    
   public function getEmployeeDetails() {
        $condition = "emp_status=1";
        $this->db->select("*");
        $this->db->from('employee_master');
        $this->db->order_by("emp_name");
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      public function addTravelingDetails($data) {
        $this->load->database();
        $this->db->insert('trvel_details', $data);
    }
    
    public function addPersonDetails($data) {
        $this->load->database();
        $this->db->insert('person_details', $data);
    }
    
        public function fetchTravelDetails($emp_code) {
        $condition = "dynamic_id =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('trvel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    function personList($id){
        
          $condition = "trvd_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('person_details');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->result();
        
       
	}
        
        public function showPersonsDetailsOnClick($txtTravelIdFetch) {
        
          $condition = "trvd_id =" . "'" . $txtTravelIdFetch . "'";
         $this->db->select('*');
$this->db->from('person_details');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
    public function fetchPersonsDetailsByTrvelId($trvd_id) {
     
        $condition = "pd.emp_code=em.emp_code and  em.emp_dept=dm.dept_code and pd.trvd_id=" . "'" . $trvd_id . "'";
        $this->db->select(' pd.per_det_id,pd.emp_code,em.emp_name,em.profile_attachment,em.emp_designation,em.plant_code,dm.dept_name');
        $this->db->from('person_details pd,   employee_master em, department_master dm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    function deletePerson($id)
    {
        $this->db->query("delete from person_details where per_det_id='".$id."'");
    } 
    
      public function editTravelDetailsAjax($id)
	{
		  $condition = "trvd_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('trvel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
        
         public function editTravelData($data, $editIdTrvelDetails) {
        $this->db->where('trvd_id', $editIdTrvelDetails);
        $this->db->update('trvel_details',$data);
        }
        
         public function addHotelsDetails($data) {
        $this->load->database();
        $this->db->insert('hotel_details', $data);
    }
    
     public function fetchHotelDetails($emp_code) {
        $condition = "hotel_dynamic_id =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('hotel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function editHotelDetailsAjax($id)
	{
		  $condition = "hotdet_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('hotel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
        
        public function editHotelData($data, $hotelDetailEditId) {
        $this->db->where('hotdet_id', $hotelDetailEditId);
        $this->db->update('hotel_details',$data);
        }
        
         public function addIntraTrvlDetails($data) {
        $this->load->database();
        $this->db->insert('trvl_locl_details', $data);
    }
    
     public function fetchIntraCityTrvDetails($emp_code) {
        $condition = "trvl_loc_dynamic_id =" . "'" . $emp_code . "'";
        $this->db->select('*');
        $this->db->from('trvl_locl_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
     public function editIntraCityDetailsAjax($id)
	{
		  $condition = "trvl_locl_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('trvl_locl_details');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
       
         public function editIntraTrvlDetails($data, $intraCityEditId) {
        $this->db->where('trvl_locl_id', $intraCityEditId);
        $this->db->update('trvl_locl_details',$data);
        }
        
         public function createTravelClaim($data) {
        $this->load->database();
        $this->db->insert('trvel_mst', $data);
    }
    
       public function fetchTrvlReimDraftDetails($emp_code) {
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
    
    public function travelClaimDetails($trv_mst_id) {
        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";

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
    
     public function fetchTrvlReimDetailsByClaimId($trv_mst_id) {
        $condition = "trvd_status = 0 and dynamic_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('*');
        $this->db->from('trvel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchHotelReimDetailsByClaimId($trv_mst_id) {
        $condition = "trv_mst_status = 0 and hotel_dynamic_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('*');
        $this->db->from('hotel_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchLocalTrvlReimDetailsByClaimId($trv_mst_id) {
        $condition = "trv_loc_status = 0 and trvl_loc_dynamic_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('*');
        $this->db->from('trvl_locl_details');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
     public function personsMealRateFetch($trv_mst_id) {
        $condition = "em.emp_code=pd.emp_code AND pd.trvd_id=td.trvd_id AND em.grade_id=mg.grade_id AND em.grade_id=gm.grade_id AND
    mg.meal_rate_id=mr.meal_rate_id AND tm.trv_mst_id=td.dynamic_id AND pd.per_dynamic_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('pd.emp_code,em.emp_name, pd.trvd_id, mr.meal_rate, mg.grade_id, td.from_station,td.to_station, gm.grade, tm.days');
        $this->db->from('employee_master em, meal_grid mg, meal_rate mr,  person_details pd, trvel_details td, grade_mst gm, trvel_mst tm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
      public function fetchTrvelReimApprovalHODClaim($emp_code) {
        $condition = "tm.trv_mst_id =ts.trv_mst_id and ts.action=1 and ts.level_of=1 and ts.emp_code=em.emp_code
        and ts.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id ,em.emp_name,tm.total_amt,tm.reg_date');
        $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchTravelReimApprovalDetails($emp_code) {
     
        $condition = "ts.trv_mst_id=tm.trv_mst_id and tm.emp_code=em.emp_code and ts.actual_action = 0 and ts.level_of=1 and ts.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id ,em.emp_name,tm.total_amt,tm.reg_date');
        $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchTravelReimRejectHODClaim($emp_code) {
        $condition = "ts.trv_mst_id=tm.trv_mst_id and ts.action=2 and ts.level_of=1 and ts.emp_code=em.emp_code
        and ts.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id ,em.emp_name,tm.total_amt,tm.reg_date');
        $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function showSancAuthoReportAccept($txtFromDate,$txtToDate) {
        
        $condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=1 and ts.level_of=2 and ts.emp_code=em.emp_code
        and tm.trv_mst_status=4 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and tm.reg_date BETWEEN  " . "'" . $txtFromDate . "'" . " AND " . "'" . $txtToDate . "'";
         $this->db->select('tm.trv_mst_id,em.emp_name,tm.total_amt,tm.reg_date,em.emp_code,dm.dept_name,pm.plant_name');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em, department_master dm, plant_master pm');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
    
    public function showSancAuthoReportAcceptNonIOU($txtFromDate,$txtToDate) {
        
        $condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=1 and ts.level_of=2 and ts.emp_code=em.emp_code
        and tm.trv_mst_status=7 and em.emp_dept=dm.dept_code and em.plant_code=pm.plant_code and tm.reg_date BETWEEN  " . "'" . $txtFromDate . "'" . " AND " . "'" . $txtToDate . "'";
         $this->db->select('tm.trv_mst_id,em.emp_name,tm.total_amt,tm.reg_date,em.emp_code,dm.dept_name,pm.plant_name');
$this->db->from('trvel_mst tm, trvl_status ts, employee_master em, department_master dm, plant_master pm');

$this->db->where($condition);
$query = $this->db->get();

        
            return $query->result();
           
    }
    
     public function fetchTravelReimSancAuthoDetails($emp_code) {
     
        $condition = "ts.trv_mst_id=tm.trv_mst_id and tm.emp_code=em.emp_code and ts.actual_action = 0 and ts.level_of=2 and ts.rep_autho=" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id ,em.emp_name,tm.total_amt,tm.reg_date');
        $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchTravelReimSancAuthoRejectDetails($emp_code) {
     
        $condition = "tm.trv_mst_id=ts.trv_mst_id and ts.action=2 and ts.level_of=2 and ts.emp_code=em.emp_code
        and ts.rep_autho =" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id ,em.emp_name,tm.total_amt,tm.reg_date');
            $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
    public function fetchClaimerOutStandingAmtList() {
     
        $condition = "tm.emp_code=em.emp_code and tm.trv_mst_id=tt.trv_mst_id and tm.trv_mst_status=6 and tt.tt_status=2";
        $this->db->select('tm.trv_mst_id,em.emp_name,em.emp_code,em.emp_mobile,tm.reg_date,tm.total_amt,tt.closing_amt');
            $this->db->from('trvel_mst tm,trvl_transaction tt,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchCompanyOutStandingAmtList() {
     
        $condition = "tm.emp_code=em.emp_code and tm.trv_mst_id=tt.trv_mst_id and tm.trv_mst_status=5 and tt.tt_status=3";
        $this->db->select('tm.trv_mst_id,em.emp_name,em.emp_code,em.emp_mobile,tm.reg_date,tm.total_amt,tt.closing_amt');
            $this->db->from('trvel_mst tm,trvl_transaction tt,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
     public function fetchTravelReimApprovedDetailsTbl($emp_code) {
        $condition = "ts.emp_code=tm.emp_code and ts.level_of=2 and ts.action=1 and ts.trv_mst_id=tm.trv_mst_id and tm.trv_mst_status=4 and ts.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id,tm.total_amt,tm.reg_date,ts.action_date,ts.action');
        $this->db->from('trvel_mst tm, trvl_status ts');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchWithoutIOUTravelReimApprovedDetailsTbl($emp_code) {
        $condition = "ts.emp_code=tm.emp_code and ts.level_of=2 and ts.action=1 and ts.trv_mst_id=tm.trv_mst_id and tm.trv_mst_status=7 and ts.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id,tm.total_amt,tm.reg_date,ts.action_date,ts.action');
        $this->db->from('trvel_mst tm, trvl_status ts');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchTravelReimPendingDetails($emp_code) {
        $condition = "tm.trv_mst_id=ts.trv_mst_id and ts.rep_autho=em.emp_code and ts.action=0 and tm.trv_mst_status=1 and ts.emp_code =" . "'" . $emp_code . "'";
        $this->db->select('tm.trv_mst_id,tm.total_amt,tm.reg_date,em.emp_name');
        $this->db->from('trvel_mst tm, trvl_status ts, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchTravelReimRejectDetails($emp_code) {
       // this function status problem please check all functions status fild
        $condition = "trv_mst_status=2 AND emp_code=" . "'" . $emp_code . "'";
        $this->db->select('trv_mst_id,total_amt,reg_date');
        $this->db->from('trvel_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
         public function getTravllerListByClaimId($trv_mst_id) {
        $condition = "pd.emp_code=em.emp_code AND pd.per_dynamic_id =" . "'" . $trv_mst_id . "'";
        $this->db->distinct();
        $this->db->select('em.emp_code,em.emp_name');
        $this->db->from('person_details pd,employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function getPersonDeatils($id)
	{
        $condition = "em.grade_id=mg.grade_id and mg.meal_rate_id=mr.meal_rate_id and em.emp_code =" . "'" . $id . "'";
        $this->db->select('mr.meal_rate');
        $this->db->from('employee_master em,meal_grid mg,meal_rate mr');
        $this->db->where($condition);
        $query = $this->db->get();
        
		return $query->row();
	}
        
        
        public function addPersonsInMeal($data) {
        $this->load->database();
        $this->db->insert('meal_details', $data);
    }
    
     public function fetchMealTrvlDetailsByClaimId($trv_mst_id) {
        $condition = "em.emp_code=md.person_id AND em.grade_id=gm.grade_id AND md.trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('md.meal_det_id,em.emp_code,em.emp_name,gm.grade,md.days,md.applicable_rate,md.total_amt');
        $this->db->from('employee_master em,meal_details md,grade_mst gm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
     public function fetchTrvlDetailForDraft($trv_mst_id) {
        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";
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
    
    public function travelReimClaimProcess($dataProcess) {
        $this->load->database();
        $this->db->insert('trvl_status', $dataProcess);
        }
        
        public function addTravelReimClaimDraft($data, $UpdateId) {
          $this->load->database();
        $this->db->where('trv_mst_id', $UpdateId);
        $this->db->update('trvel_mst',$data);
        }
        
        public function travelClaimDetailsStatusLog($trv_mst_id) {
         
        $sql = "SELECT ts.trv_mst_id,ts.actual_action,ts.comment,ts.action_date,ts.action_time,em.emp_name FROM trvl_status ts, employee_master em  WHERE em.emp_code=ts.rep_autho and ts.trv_mst_id=".$trv_mst_id."";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function travelClaimDetailsApproval($trv_mst_id) {
        $condition = "tm.emp_code=em.emp_code and em.emp_dept=dm.dept_code and em.grade_id=gm.grade_id and tm.plant_code=pm.plant_code and tm.trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('tm.trv_mst_id, em.emp_code, em.emp_name, tm.plant_code,pm.plant_name, tm.reg_date, gm.grade, dm.dept_name');
        $this->db->from('trvel_mst tm, employee_master em, department_master dm, grade_mst gm, plant_master pm');
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function getClaimerDetails($trv_mst_id) {

        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('emp_code as claimer');
        $this->db->from('trvel_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimer;
        } else {
            return false;
        }
    }
    
    public function travelClaimDetailsHodActionData($emp_code,$trv_mst_id) {
             $sql = "SELECT trvl_status_id FROM trvl_status WHERE rep_autho=".$emp_code." and trv_mst_id=".$trv_mst_id." and actual_action=0 and level_of=1 ORDER BY trvl_status_id DESC LIMIT 0, 1";
            $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function updateClaimAction($data, $editId,$trvl_status_id) {
        $condition = "trv_mst_id=" . "'" . $editId . "' and trvl_status_id=" . "'" . $trvl_status_id ."'";
        $this->db->where($condition);
        $this->db->update('trvl_status',$data);
        }
        
         public function travelReimClaimProcessRepAutho($data2) {
        $this->load->database();
        $this->db->insert('trvl_status', $data2);
        }
     
    
     public function getIouApprovedClaimList($emp_code) {
        $condition = "iou_status=3 and emp_code=" . "'" . $emp_code . "'";
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
    
     public function linkIouWithTravel($data) {
        $this->load->database();
        $this->db->insert('trvl_iou_link', $data);
    }
    
     public function fetchLinkedIouWithTravel($trv_mst_id) {
        $condition = "til.til_status=0 and til.lou_clm_id=icm.lou_clm_id  and til.trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('til.trvl_iou_link_id,icm.lou_clm_id, icm.iou_amt, icm.iou_date, icm.iou_justfic');
        $this->db->from('trvl_iou_link til, iou_claim_mst icm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function fetchBlanceTravelAmount($trv_mst_id) {

        //$condition = "ORDER BY iou_tr_id DESC LIMIT 0, 1 emp_code =" . "'" . $claimer_id . "'";
         $condition = "trv_mst_id='".$trv_mst_id."'  ORDER BY tt_id DESC LIMIT 0, 1";
        $this->db->select('closing_amt');
        $this->db->from('trvl_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->closing_amt;
        } else {
            return false;
        }
    }
    
    public function fetchBlanceTravelOutStandingID($trv_mst_id) {

        //$condition = "ORDER BY iou_tr_id DESC LIMIT 0, 1 emp_code =" . "'" . $claimer_id . "'";
         $condition = "tt_status=2 and trv_mst_id='".$trv_mst_id."'  ORDER BY tt_id DESC LIMIT 0, 1";
        $this->db->select('tt_id');
        $this->db->from('trvl_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->tt_id;
        } else {
            return false;
        }
    }
   
     public function fetchBlanceTravelOutStandingIDForCompany($trv_mst_id) {

        //$condition = "ORDER BY iou_tr_id DESC LIMIT 0, 1 emp_code =" . "'" . $claimer_id . "'";
         $condition = "tt_status=3 and trv_mst_id='".$trv_mst_id."'  ORDER BY tt_id DESC LIMIT 0, 1";
        $this->db->select('tt_id');
        $this->db->from('trvl_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->tt_id;
        } else {
            return false;
        }
    }
   
    
    
    
     public function fetchLinkedIOUCount($trv_mst_id) {

        $condition = "til_status=0 AND trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('count(lou_clm_id) as df');
        $this->db->from('trvl_iou_link');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->df;
        } else {
            return false;
        }
    }
    
    
         public function fetchBalanceIOUAmount($emp_id) {

        $condition = " emp_code='".$emp_id."'  ORDER BY iou_tr_id DESC LIMIT 0, 1";
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
    
    public function fetchBalanceIOUOutStandingID($emp_id) {

        $condition = "trn_status=2 and emp_code='".$emp_id."'  ORDER BY iou_tr_id DESC LIMIT 0, 1";
        $this->db->select('iou_tr_id');
        $this->db->from('iou_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->iou_tr_id;
        } else {
            return false;
        }
    }
    
    public function fetchBalanceIOUOutStandingIDForCompany($emp_id) {

        $condition = "trn_status=3 and emp_code='".$emp_id."'  ORDER BY iou_tr_id DESC LIMIT 0, 1";
        $this->db->select('iou_tr_id');
        $this->db->from('iou_transaction');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->iou_tr_id;
        } else {
            return false;
        }
    }
    
    
     public function fetchActualTravelAmount($trv_mst_id) {

        //$condition = "ORDER BY iou_tr_id DESC LIMIT 0, 1 emp_code =" . "'" . $claimer_id . "'";
         $condition = "trv_mst_id='".$trv_mst_id."'";
        $this->db->select('total_amt');
        $this->db->from('trvel_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->total_amt;
        } else {
            return false;
        }
    }
    
      public function transactionOnClaim($data) {
        $this->load->database();
        $this->db->insert('trvl_transaction', $data);
    }
     public function transactionOnIOUClaim($dataForIOU) {
        $this->load->database();
        $this->db->insert('iou_transaction', $dataForIOU);
    }
    
    public function fetchLinkedIOUTotlAmount($trv_mst_id) {

        $condition = "icm.lou_clm_id=til.lou_clm_id and til.trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('SUM(icm.iou_amt) as iouSum');
        $this->db->from('iou_claim_mst icm,trvl_iou_link til');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->iouSum;
        } else {
            return false;
        }
    }

      public function fetchTakenActionClaim($trv_mst_id) {
        $condition = "til.lou_clm_id=icm.lou_clm_id   and icm.lou_clm_id=it.iou_id  and it.trn_status <> '0' and til.trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('icm.iou_amt,icm.lou_clm_id,it.trn_status,it.closing_amt');
        $this->db->from('trvl_iou_link til,iou_claim_mst icm,iou_transaction it');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
        public function fetchClaimBase($trv_mst_id) {

        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('COUNT(trvl_iou_link_id) as countData');
        $this->db->from('trvl_iou_link');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->countData;
        } else {
            return false;
        }
    }
    
        public function travelLastApprovalDetils($emp_code,$trv_mst_id) {
          $sql = "SELECT trvl_status_id,rep_autho,level_of,trv_mst_id FROM trvl_status WHERE rep_autho=".$emp_code." and trv_mst_id=".$trv_mst_id." and actual_action=0 and level_of=2 ORDER BY trvl_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
       public function sanctionAuthorityAction($dataInStatus, $final_trv_mst_id,$final_trvl_status_id) {
        $condition = "trv_mst_id=" . "'" . $final_trv_mst_id . "' and trvl_status_id=" . "'" . $final_trvl_status_id ."'";
        $this->db->where($condition);
        $this->db->update('trvl_status',$dataInStatus);
        }
        
        public function claimerOutstandingAmtClearAction($dataOfClaimerHistory) {
        $this->load->database();
        $this->db->insert('trvl_outstnd_claimer', $dataOfClaimerHistory);
    }
    
       public function companyOutstandingAmtClearAction($dataOfCompanyHistory) {
        $this->load->database();
        $this->db->insert('trvl_outstnd_company', $dataOfCompanyHistory);
    }
    
     public function fetchVoucherDate($trv_mst_id) {

        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('reg_date');
        $this->db->from('trvel_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->reg_date;
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
    
       public function fetchUserMailDetails($trv_mst_id) {
        $condition = "em.emp_code=tm.emp_code and tm.trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('em.emp_email');
        $this->db->from('trvel_mst tm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_email;
        } else {
            return false;
        }
    }
    
      public function fetchEmpNameForMail($trv_mst_id) {

        $condition = "em.emp_code=tm.emp_code and tm.trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('em.emp_name');
        $this->db->from('trvel_mst tm, employee_master em');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->emp_name;
        } else {
            return false;
        }
    }
    
     //Additional Development Traveling report 2019-10-22
    //printing traveling report with team memeber 
       public function fetchTrvlReimDetailsByClaimIdTeamMemeber($trv_mst_id) {
        $condition = " em.emp_code=pd.emp_code AND pd.trvd_id =" . "'" . $trv_mst_id . "'";
        $this->db->select(' em.emp_code,em.emp_name');
        $this->db->from('employee_master em, person_details pd');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
      
     public function TravelClaimDetailsHodActionStatus($trv_mst_id,$emp_code) {
         
        $sql = "SELECT em.emp_name, ts.trvl_status_id, ts.emp_code, ts.actual_action, ts.action_date, ts.action_time, ts.comment FROM trvl_status ts, employee_master em  WHERE ts.trv_mst_id=".$trv_mst_id." and ts.emp_code=".$emp_code." and ts.level_of=1 AND em.emp_code=ts.rep_autho ORDER BY ts.trvl_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function TravelDetailsSanAuthoActionStatus($trv_mst_id,$emp_code) {
         
        $sql = "SELECT em.emp_name, ts.trvl_status_id, ts.emp_code, ts.actual_action, ts.action_date, ts.action_time, ts.comment FROM trvl_status ts, employee_master em  WHERE ts.trv_mst_id=".$trv_mst_id." and ts.emp_code=".$emp_code." and ts.level_of=2 AND em.emp_code=ts.rep_autho ORDER BY ts.trvl_status_id DESC LIMIT 0, 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
     public function fetchLinkedIouWithTravelAfterApproved($trv_mst_id) {
        $condition = "til.til_status=3 and til.lou_clm_id=icm.lou_clm_id  and til.trv_mst_id=" . "'" . $trv_mst_id . "'";
        $this->db->select('til.trvl_iou_link_id,icm.lou_clm_id, icm.iou_amt, icm.iou_date, icm.iou_justfic');
        $this->db->from('trvl_iou_link til, iou_claim_mst icm');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    //--------------------------------------------Start----------------------------------------
    //get claimer plant from claim id
    //Additional Development 2019-11-11 
    //Author: Kaustubh Ashok Khadke
    //Requirement By: Mate Sir At 2019-11-09
    
    public function getClaimerPlant($trv_mst_id) {

        $condition = "trv_mst_id =" . "'" . $trv_mst_id . "'";
        $this->db->select('plant_code as claimerPlant');
        $this->db->from('trvel_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->row()->claimerPlant;
        } else {
            return false;
        }
    }
    
    //--------------------------------------------End----------------------------------------
    
    
        
}

?>
