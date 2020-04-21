<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_cntr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Load session library
        $this->load->library('session');
        $this->load->library('upload');
// Load database
        $this->load->model('login_database');
        $this->method_call = & get_instance();
        $this->load->model('purchase/pr_model');
        $this->load->model('universal/CommnModel');
    }

    public function index() {
        // $this->load->helper('url');
        // $this->load->view('ELAR/local_reim/create_claim');
    }
     public function plants(){
	$this->load->database();  
        $this->load->model('purchase/pr_model');  
        $data['plant_list']=$this->pr_model->plant_list();  
        return  $data['plant_list'];		  
    } 

    public function create_local_claim() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/create_claim');
    }

    public function local_claim_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimDraftTbl');
    }

    public function local_claim_draft_view() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimDraftView');
    }

    public function local_claim_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimPendingTbl');
    }

    public function local_claim_pending_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimViewPending',$data);
    }

    public function local_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimApprovedTbl');
    }

    public function local_claim_approved_view($lrcm_id) {
      
          $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimViewApproved',$data);
    }

    public function local_claim_reject_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimRejectTbl');
    }

    public function local_claim_reject_view($lrcm_id) {//
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimViewRejected', $data);
    }

    public function appr_local_claim_pend_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckPendingReqTbl');
    }

    public function appr_local_claim_pend_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckPendingReqView', $data);
    }

    public function appr_local_claim_accpt_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckAcceptedReqTbl');
    }
    
    public function appr_local_claim_accpt_view($lrcm_id) {
         $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckAcceptedReqView',$data);
    }

    public function appr_local_claim_rejct_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckRejctReqTbl');
    }

    public function appr_local_claim_rejct_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/approvalCheckRejctReqView',$data);
    }

    public function sanc_local_claim_pend_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckPendReqTbl');
    }
    
    public function sanc_local_claim_pend_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckPendReqView', $data);
    }
    
    public function sanc_local_claim_reject_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckRejectReqTbl');
    }
    
     public function sanc_autho_local_claim_rejct_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckRejectReqView',$data);
    }
    public function sanc_local_claim_Accept_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckAcceptReqTbl');
    }
    

    //profile pic fetch 

    public function profile_pic_fetch($emp_code) {
        $this->load->database();
        $this->load->model('PR/pr_model');
        $data['profile_attachment'] = $this->pr_model->profile_pic_fetch($emp_code);
        return $data['profile_attachment'];
    }

    function fetch_dept_nm($emp_dept) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['dept_name'] = $this->CommnModel->fetch_dept_nm($emp_dept);
        return $data;
    }

    function getGradeDetails($emp_code) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['grade'] = $this->CommnModel->getGradeDetails($emp_code);
        return $data;
    }

    function getVehicleDetailsByGrade($grade_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['vehicles'] = $this->CommnModel->getVehicleDetailsByGrade($grade_id);
        return $data['vehicles'];
    }

    public function addLocalReimDetails() {//Local Reimbursememnt claim details adding here....
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $totalAmount = $this->input->post('txtAmount');
        $km = $this->input->post('txtKM');



        $rate = $this->input->post('txtCrrKmRate');
        $finalAmount = $km * $rate;

        if ($totalAmount == NULL) {
            $data = array(
                'dynamic_id' => $this->input->post('txtEmpCode'),
                'trvl_mode' => $this->input->post('comboVehicle'),
                'trvl_date' => $this->input->post('datepicker'),
                'gate_pass_no' => $this->input->post('txtGatePass'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_km' => $this->input->post('txtKM'),
                'trvl_amt' => $finalAmount,
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        } else {
            $data = array(
                'dynamic_id' => $this->input->post('txtEmpCode'),
                'trvl_mode' => $this->input->post('comboVehicle'),
                'trvl_date' => $this->input->post('datepicker'),
                'gate_pass_no' => $this->input->post('txtGatePass'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_km' => $this->input->post('txtKM'),
                'trvl_amt' => $this->input->post('txtAmount'),
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        }
        $this->CommnModel->addLocalReimDetails($data);
        redirect('ELAR/local_reim/Local_cntr/create_local_claim');
    }

    public function addLocalReimDetailsDraft() {//Local Reimbursememnt claim details adding here....
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $totalAmount = $this->input->post('txtAmount');
        $km = $this->input->post('txtKM');
        $rate = $this->input->post('txtCrrKmRate');
        $finalAmount = $km * $rate;

        if ($totalAmount == NULL) {
            $data = array(
                'dynamic_id' => $this->input->post('txtlrcm_id'),
                'trvl_mode' => $this->input->post('comboVehicle'),
                'trvl_date' => $this->input->post('datepicker'),
                'gate_pass_no' => $this->input->post('txtGatePass'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_km' => $this->input->post('txtKM'),
                'trvl_amt' => $finalAmount,
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        } else {
            $data = array(
                'dynamic_id' => $this->input->post('txtlrcm_id'),
                'trvl_mode' => $this->input->post('comboVehicle'),
                'trvl_date' => $this->input->post('datepicker'),
                'gate_pass_no' => $this->input->post('txtGatePass'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_km' => $this->input->post('txtKM'),
                'trvl_amt' => $this->input->post('txtAmount'),
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        }
        $this->CommnModel->addLocalReimDetailsDraft($data);
        echo '<script>window.history.back();</script>';
    }

    function fetchLocalReimDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['conveyanceList'] = $this->CommnModel->fetchLocalReimDetails($emp_code);
        return $data['conveyanceList'];
    }

    function fetchLocalReimDraftDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimList'] = $this->CommnModel->fetchLocalReimDraftDetails($emp_code);
        return $data['claimList'];
    }

        public function deletedata() {
            $id = $this->input->get('id');
            $this->CommnModel->deleterecords($id);
            redirect('ELAR/local_reim/Local_cntr/create_local_claim');
         }
    public function deletedataDraft() {
        $id = $this->input->get('id');
        $this->CommnModel->deleterecords($id);
        $this->load->view('ELAR/local_reim/localClaimDraftView', $id);
        //redirect('ELAR/local_reim/Local_cntr/localClaimDraftView',$id);
    }

    function fetchLocalReimDetailsEdit() {
        echo '<script>alert("dfdfdfdfd");</script>';
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['conveyanceListEdit'] = $this->CommnModel->fetchLocalReimDetailsEdit($lrcd_id);
        return $data['conveyanceListEdit'];
    }

    public function ajax_edit($id) {
        $data = $this->CommnModel->get_by_id($id);
        echo json_encode($data);
    }

    public function deleteLocalConvData($id) {
        $this->load->helper('url');
        $this->load->database();
        $this->db->query("delete from locrim_clm_detail where lrcd_id='" . $id . "'");
    }

    public function updateConvensesData() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('editId');
        $km = $this->input->post('txtKMEdit');
        $rate = $this->input->post('txtCrrKmRateEdit');

        $finalAmount = $km * $rate;
        echo 'printing km ' . $km;
        echo 'printing rate ' . $rate;
        echo 'printing finalAmount ' . $finalAmount;

        if ($km == NULL) {
            $data = array(
                'trvl_date' => $this->input->post('datepicker1'),
                'gate_pass_no' => $this->input->post('txtGatePassEdit'),
                'place_from' => $this->input->post('txtPlaceFromEdit'),
                'place_to' => $this->input->post('txtPlaceToEdit'),
                'trvl_amt' => $this->input->post('txtAmountEdit'),
                'trvl_reason' => $this->input->post('areaReasonEdit'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit')
            );
        } else {
            $data = array(
                'trvl_date' => $this->input->post('datepicker1'),
                'gate_pass_no' => $this->input->post('txtGatePassEdit'),
                'place_from' => $this->input->post('txtPlaceFromEdit'),
                'place_to' => $this->input->post('txtPlaceToEdit'),
                'trvl_km' => $this->input->post('txtKMEdit'),
                'trvl_amt' => $finalAmount,
                'trvl_reason' => $this->input->post('areaReasonEdit'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit')
            );
        }
        $this->CommnModel->updateConvensesData($data, $editId);

        redirect('ELAR/local_reim/Local_cntr/create_local_claim');
    }

    public function updateConvensesDataDraftEdit() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('editId');
        $km = $this->input->post('txtKMEdit');
        $rate = $this->input->post('txtCrrKmRateEdit');

        $finalAmount = $km * $rate;


        if ($km == NULL) {
            $data = array(
                'trvl_date' => $this->input->post('datepicker1'),
                'gate_pass_no' => $this->input->post('txtGatePassEdit'),
                'place_from' => $this->input->post('txtPlaceFromEdit'),
                'place_to' => $this->input->post('txtPlaceToEdit'),
                'trvl_amt' => $this->input->post('txtAmountEdit'),
                'trvl_reason' => $this->input->post('areaReasonEdit'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit')
            );
        } else {
            $data = array(
                'trvl_date' => $this->input->post('datepicker1'),
                'gate_pass_no' => $this->input->post('txtGatePassEdit'),
                'place_from' => $this->input->post('txtPlaceFromEdit'),
                'place_to' => $this->input->post('txtPlaceToEdit'),
                'trvl_km' => $this->input->post('txtKMEdit'),
                'trvl_amt' => $finalAmount,
                'trvl_reason' => $this->input->post('areaReasonEdit'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit')
            );
        }
        $this->CommnModel->updateConvensesData($data, $editId);
        echo '<script>  window.history.back()</script>';
    }

    public function createClaim() {//Local Reimbursememnt claim details adding here....
         $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
         //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['picture']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['picture']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
        $data = array(
            'emp_code' => $this->input->post('txtEmpCode'),
            'plant_code' => $this->input->post('txtPlantId'),
            'total_amt' => $this->input->post('txtFinalRate'),
            'reg_date' => $date,
            'reg_time' => $time,
            'pic_file' => $picture,
            'justification' => $this->input->post('areaJustification')
        );
        
      
     $this->CommnModel->addLocalReimClaim($data);
 
     
     
 
        $empCode = $this->input->post('txtEmpCode');

        $row = $this->db->query('SELECT MAX(lrcm_id) AS lrcm_id FROM locrim_clm_mst WHERE emp_code=' . $empCode)->row();
        if ($row) {
            $lrcm_id = $row->lrcm_id;
            $data1 = array(
                'dynamic_id' => $lrcm_id
            );
            $this->db->where('dynamic_id', $empCode);
            $this->db->update('locrim_clm_detail', $data1);
            
                     
           // echo 'printing claim number here......' . $lrcm_id;
        }


        redirect('ELAR/local_reim/Local_cntr/local_claim_draft_tbl');
    }

    public function viewDraftLocalClaim($lrcm_id) {//
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimDraftView', $data);
    }

    function localClaimDetails($lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimDetail'] = $this->CommnModel->localClaimDetails($lrcm_id);
        return $data['LocalClaimDetail'];
    }

    function localClaimDetailsApproval($lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimDetail'] = $this->CommnModel->localClaimDetailsApproal($lrcm_id);
        return $data['LocalClaimDetail'];
    }

    function fetchLocalReimDetailsByClaimId($lrcm_id) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['conveyanceList'] = $this->CommnModel->fetchLocalReimDetailsByClaimId($lrcm_id);
        return $data['conveyanceList'];
    }

    public function getRateFromVehicle($id) {
        $data = $this->CommnModel->getRateFromVehicle($id);
        echo json_encode($data);
    }

    function fetchReportingDetails($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reporting_autho'] = $this->CommnModel->fetchReportingDetails($emp_code);
        return $data;
    }

    public function createClaimDraft() {//Local Reimbursememnt claim details adding here....
        $this->load->helper('url');
        $this->load->database();
        $ClaimState = $this->input->post('claim_state');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $UpdateId = $this->input->post('txtClaimId');
        $txtFileName=$this->input->post('txtFileName');
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['picture']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['picture']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
             
      
        if(empty($picture)){
              echo 'in 1rd contion-----------------------------'.$txtFileName;
           
        if ($ClaimState == "draft") {
           
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'reg_date' => $date,
                'reg_time' => $time, 
                'justification' => $this->input->post('areaJustification')
            );
        } else {
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'reg_date' => $date,
                'reg_time' => $time,
                'lrcd_status' => 1,
                'justification' => $this->input->post('areaJustification')
            );

            $dataProcess = array(
                'lrcm_id' => $UpdateId,
                'emp_code' => $this->input->post('txtEmpCode'),
                'rep_autho' => $this->input->post('txtRepAutho'),
                'level_of' => 1,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->CommnModel->localReimClaimProcess($dataProcess);
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtHodEmail');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='New Local Reimbursement Claim Created By '.$this->input->post('txtEmpName').' Voucher No '.$UpdateId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptName'). '</li>
	<li><b>Voucher No:</b>  '.$UpdateId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtEmpName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
</ol>

    Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
    $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
        }


        $this->CommnModel->addLocalReimClaimDraft($data, $UpdateId);



      redirect('ELAR/local_reim/Local_cntr/local_claim_draft_tbl');
        }
      
            elseif($txtFileName !== $picture) {
                echo 'in 3rd contion';
                
            echo 'In the else condition.................';
            echo 'in else check picture'.$picture;
                 if ($ClaimState == "draft") {
                      echo 'In the if draft of else condition.................';
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'reg_date' => $date,
                'reg_time' => $time,
                'pic_file' => $picture
            );
        } else {
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'reg_date' => $date,
                'reg_time' => $time,
                'lrcd_status' => 1,
                'pic_file' => $picture
            );

            $dataProcess = array(
                'lrcm_id' => $UpdateId,
                'emp_code' => $this->input->post('txtEmpCode'),
                'rep_autho' => $this->input->post('txtRepAutho'),
                'level_of' => 1,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->CommnModel->localReimClaimProcess($dataProcess);
            $this->CommnModel->addLocalReimClaimDraft($data, $UpdateId);
        }


        $this->CommnModel->addLocalReimClaimDraft($data, $UpdateId);
                 redirect('ELAR/local_reim/Local_cntr/local_claim_draft_tbl');
            }
    }

    function fetchLocalReimApprovalDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimListApproval'] = $this->CommnModel->fetchLocalReimApprovalDetails($emp_code);
        return $data['claimListApproval'];
    }

    public function updateClaimAction() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('lrcm_id');

        $km = $this->input->post('txtKMEdit');
        $rate = $this->input->post('txtCrrKmRateEdit');
        $action = $this->input->post('localClaimState');
        
         $local_rim_id = $this->input->post('local_rim_id');
        echo 'action----' . $action;
        if ($action == "1") {

            $data = array(
                'rep_autho' => $this->input->post('emp_code'),
                'action' => 1,
                'actual_action' => 1,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'lrcm_id' => $this->input->post('lrcm_id'),
                'emp_code' => $this->input->post('claimer_id'),
                'rep_autho' => $this->input->post('auto_code'),
                'level_of' => 2,
                'action' => 0,
                'actual_action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->CommnModel->updateClaimAction($data, $editId, $local_rim_id);
            $this->CommnModel->localReimClaimProcessRepAutho($data2);
            
        // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Local Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Comment :</b>  '.$this->input->post('comment').'</li>
</ol>

   Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
    $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
            
        } else {
            $data = array(
                'rep_autho' => $this->input->post('emp_code'),
                'action' => 2,
                'actual_action' => 2,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'lrcd_status' => 2
            );
            echo 'printing here......' . $editId;
            $this->db->where('lrcm_id', $editId);
            $this->db->update('locrim_clm_mst', $data1);
            $this->CommnModel->updateClaimAction($data, $editId, $local_rim_id);
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Local Reimbursement Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Comment :</b>  '.$this->input->post('comment').'</li>
</ol>

    Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
    $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
        }
        redirect('ELAR/local_reim/Local_cntr/appr_local_claim_pend_tbl');
    }

    function getSanctionAuthoDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['autho_code'] = $this->CommnModel->getSanctionAuthoDetails();
        return $data;
    }

    function getClaimerDetails($lrcm_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimer'] = $this->CommnModel->getClaimerDetails($lrcm_id);
        return $data;
    }

     function fetchLocalReimSancAuthoDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimListApproval'] = $this->CommnModel->fetchLocalReimSancAuthoDetails($emp_code);
        return $data['claimListApproval'];
    }
    
    public function updateClaimActionBySancAutho() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $lrcm_id = $this->input->post('lrcm_id');
        $auto_code = $this->input->post('auto_code');
        $final_local_rim_id = $this->input->post('final_local_rim_id');
        

        $km = $this->input->post('txtKMEdit');
        $rate = $this->input->post('txtCrrKmRateEdit');
        $action = $this->input->post('localClaimState');
       
        if ($action == "1") {

            $data = array(
                'rep_autho' => $this->input->post('emp_code'),
                'action' => 1,
                'actual_action' => 1,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time
            );
            $data1 = array(
                'lrcd_status' => 3
            );
        
            $this->db->where('lrcm_id', $lrcm_id);
            $this->db->update('locrim_clm_mst', $data1);
            
            $this->CommnModel->updateClaimActionBySancAutho($data, $lrcm_id,$auto_code,$final_local_rim_id);
          
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Local Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$lrcm_id.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$lrcm_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Commnet:</b>  '.$this->input->post('comment').'</li>
</ol>

   Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
    $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
            
        } else {
            $data = array(
                'rep_autho' => $this->input->post('emp_code'),
                'action' => 2,
                'actual_action' => 2,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'lrcd_status' => 2
            );
        
            $this->db->where('lrcm_id', $lrcm_id);
            $this->db->update('locrim_clm_mst', $data1);
            
             $final_local_rim_id = $this->input->post('final_local_rim_id');
              $final_rep_autho = $this->input->post('final_rep_autho');
               $final_lrcm_id = $this->input->post('final_lrcm_id');
                echo '$final_local_rim_id----' . $final_local_rim_id;
                echo '$final_rep_autho----' . $final_rep_autho;
                echo '$final_lrcm_id----' . $final_lrcm_id;
             $data2 = array(
                'action' => 2
            );
            $condition = "rep_autho=" . "'" . $final_rep_autho . "' and lrcm_id=" . "'" . $final_lrcm_id . "' and local_rim_id=" . "'" . $final_local_rim_id . "'";
            $this->db->where($condition);
            $this->db->update('local_rim_status', $data2);
            $this->CommnModel->updateClaimActionBySancAutho($data, $lrcm_id,$auto_code,$final_local_rim_id);
                                
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Local Reimbursement Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$lrcm_id.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$lrcm_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Commnet:</b>  '.$this->input->post('comment').'</li>
</ol>

    Kindly Login to Portal ( https://www.rucha.co.in/portal ) And process ';
		
		$this->load->library('email');
    $confing =array(
    'protocol'=>'none',
    'smtp_host'=>"relay-hosting.secureserver.net",
    'smtp_port'=>465,
    'smtp_user'=>"no-reply@rucha.co.in",
    'smtp_pass'=>'pass@1234',
    'mailtype'=>'html'  
    );
    $this->email->initialize($confing);
    $this->email->set_newline("\r\n");
    $this->email->from('no-reply@rucha.co.in');
    $this->email->to($reciver);
    $this->email->cc($ccuser);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................      
        }
        redirect('ELAR/local_reim/Local_cntr/sanc_local_claim_pend_tbl');
    }
    
     function localClaimDetailsLastApprovalDetils($emp_code,$lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimLastApprovalDetail'] = $this->CommnModel->localClaimDetailsLastApprovalDetils($emp_code,$lrcm_id);
        return $data['LocalClaimLastApprovalDetail'];
    }
    
     function fetchLocalReimRejectDetails($emp_code) {
     
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimList'] = $this->CommnModel->fetchLocalReimRejectDetails($emp_code);
        return $data['claimList'];
    }
     function localClaimDetailsHodActionStatus($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodActtionStatus'] = $this->CommnModel->localClaimDetailsHodActionStatus($lrcm_id,$emp_code);
        return $data['LocalClaimHodActtionStatus'];
    }
     function localClaimDetailsSanAuthoActionStatus($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimSanAuthoActtionStatus'] = $this->CommnModel->localClaimDetailsSanAuthoActionStatus($lrcm_id,$emp_code);
        return $data['LocalClaimSanAuthoActtionStatus'];
    }
    
      public function userActionOnRejectedClaim() {//Local Reimbursememnt claim details adding here....
        $ClaimState = $this->input->post('claim_state');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $UpdateId = $this->input->post('txtClaimId');
        echo 'printing here.....' . $ClaimState;
        if ($ClaimState == "draft") {
            $data = array(
              
                'reg_date' => $date,
                'reg_time' => $time,
                'lrcd_status'=>0,
            );
            $this->db->where('lrcm_id', $UpdateId);
            $this->db->update('locrim_clm_mst', $data);
        }
            else {
                $message = "Ok! You have selected no action on claim";
            echo "<script type='text/javascript'>alert('$message');</script>";
            }

         redirect('ELAR/local_reim/Local_cntr/local_claim_reject_tbl');
    }
    
     function localClaimDetailsHodActionData($emp_code,$lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['hodActionData'] = $this->CommnModel->localClaimDetailsHodActionData($emp_code,$lrcm_id);
        return $data['hodActionData'];
    }
    
    function fetchLocalReimApprovedDetailsTbl($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['approvedClaimList'] = $this->CommnModel->fetchLocalReimApprovedDetailsTbl($emp_code);
        return $data['approvedClaimList'];
    }
    
    function fetchLocalReimPendingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimList'] = $this->CommnModel->fetchLocalReimPendingDetails($emp_code);
        return $data['claimList'];
    }
    
       function fetchLocalReimApprovalHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimApprovHodList'] = $this->CommnModel->fetchLocalReimApprovalHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
    function localClaimDetailsHodApproved($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodApproved'] = $this->CommnModel->localClaimDetailsHodApproved($lrcm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
	
     function fetchLocalReimRejectHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimApprovHodList'] = $this->CommnModel->fetchLocalReimRejectHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
      function localClaimDetailsHodReject($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodApproved'] = $this->CommnModel->localClaimDetailsHodReject($lrcm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
     function fetchLocalReimSancAuthoRejectDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimListApproval'] = $this->CommnModel->fetchLocalReimSancAuthoRejectDetails($emp_code);
        return $data['claimListApproval'];
    }
    
    
      function localClaimDetailsSancAuthoReject($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodApproved'] = $this->CommnModel->localClaimDetailsSancAuthoReject($lrcm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
     function fetchLocalReimApprovalSancAutho($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimApprovHodList'] = $this->CommnModel->fetchLocalReimApprovalSancAutho($emp_code);
        return $data['claimApprovHodList'];
    }
    
     public function sanc_autho_local_claim_accpt_view($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/sanctionAuthoCheckAcceptReqView',$data);
    }
    
      function localClaimDetailsSancApprovedReq($lrcm_id,$emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodApproved'] = $this->CommnModel->localClaimDetailsSancApprovedReq($lrcm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
      function localClaimDetailsStatusLog($lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['LocalClaimHodApproved'] = $this->CommnModel->localClaimDetailsStatusLog($lrcm_id);
        return $data['LocalClaimHodApproved'];
    }
     function getAttachmentDownload($lrcm_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['pic_file'] = $this->CommnModel->getAttachmentDownload($lrcm_id);
        return $data;
    }
    
     
    function sancAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['sam_id'] = $this->CommnModel->sancAuthNavBarStatus($emp_code);
        return $data;
    }
     function repoAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reporting_autho'] = $this->CommnModel->repoAuthNavBarStatus($emp_code);
        return $data;
    }
    
    function fetchHODMailDetailsForClaimer($emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['hodEmail'] = $this->CommnModel->fetchHODMailDetailsForClaimer($emp_code);
        return $data;
    }
    function fetchSancAuthoMailDetailsForClaimer() {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['SancAuthoEmail'] = $this->CommnModel->fetchSancAuthoMailDetailsForClaimer();
        return $data;
    }
    function fetchVoucherDate($lrcm_id) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reg_date'] = $this->CommnModel->fetchVoucherDate($lrcm_id);
        return $data;
    }
       function fetchUserMailDetails($lrcm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['emp_email'] = $this->CommnModel->fetchUserMailDetails($lrcm_id);
        return $data;
    }
       function fetchEmpNameForMail($lrcm_id) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['emp_name'] = $this->CommnModel->fetchEmpNameForMail($lrcm_id);
        return $data;
    }
    
    public function showSancAuthoReportAccept() {
        
        $txtFromDate = $this->input->post('fromDate');
        $txtToDate = $this->input->post('toDate');
        
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $result = $this->CommnModel->showSancAuthoReportAccept($txtFromDate,$txtToDate);
       // $data['query'] = $this->CommnModel->showSancAuthoReportAccept();
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/local_reim/sanctionAuthoCheckAcceptReqTbl', $data);

    }
     function getDraftJustification($lrcm_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['justification'] = $this->CommnModel->getDraftJustification($lrcm_id);
        return $data;
    }
    
        function higherAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['ocha_id'] = $this->CommnModel->higherAuthNavBarStatus($emp_code);
        return $data;
    }
         function mdOfficeAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['ocha_id'] = $this->CommnModel->mdOfficeAuthNavBarStatus($emp_code);
        return $data;
    }
    
    //--------------------------------------------Start----------------------------------------
      //Printing report local reports
    //Additional development 2019-10-26
    public function printingLocalReport($lrcm_id) {
        $data['lrcm_id'] = $lrcm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localReimReport',$data);
    }
    
    
    function getPlantNameDetails($plant_code) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['plant_name'] = $this->CommnModel->getPlantNameDetails($plant_code);
        return $data;
    }
      //------------------------------End -------------------------------------------------------
     //--------------------------------------------Start----------------------------------------
    //Plant Wise Reporting Authority Claim Forword
    //Additional Development 2019-11-11 
    //Author: Kaustubh Ashok Khadke
    //Requirement By: Mate Sir At 2019-11-09
    
     function getClaimerPlant($lrcm_id) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['claimerPlant'] = $this->CommnModel->getClaimerPlant($lrcm_id);
        return $data;
    }
    //------------------------------End ---------------------------------------------------------
    
    
     // Dashboard creat - ganesh 2020-01-22
	 
	    public function cashdashboard() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/claimMenuSelect');
    }
	public function localClaimApprSA() {
        $this->load->helper('url');
        $this->load->view('ELAR/local_reim/localClaimApprSA');
    }

 public function localDashboard() {
	 
       $this->load->database();
					$this->load->helper(array('url','html','form'));
					$monthQuery =  $this->db->query("SELECT COUNT(lrcd_status)as pradnya,lrcd_status FROM locrim_clm_mst GROUP by lrcd_status"); 
					$data['month_wise'] = $monthQuery->result();
        $this->load->view('ELAR/local_reim/localClaimDashboard',$data);
    }
	
	
//pending count local claim	
function localClaim($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['draft_local']=$this->CommnModel->local_draft($emp_code);  		  		
	return  $data['draft_local'];
		  
}

//approval count local claim
function localClaimappr($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['approv_local']=$this->CommnModel->local_approval($emp_code);  		  		
	return  $data['approv_local'];
		  
}

//draft count local claim
function localClaimdraft($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_draftl']=$this->CommnModel->local_Draftcl($emp_code);  		  		
	return  $data['local_draftl'];
		  
}


//reject count local claim
function localClaimreject($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_reject']=$this->CommnModel->local_rejectcl($emp_code);  		  		
	return  $data['local_reject'];
		  
}

//Pending count local claim
function localpendingapprove($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_pend_approv']=$this->CommnModel->local_pend_approv($emp_code);  		  		
	return  $data['local_pend_approv'];
		  
}
//approve count local claim
function localacceptapprove($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_accpt_approv']=$this->CommnModel->local_accept_approv($emp_code);  		  		
	return  $data['local_accpt_approv'];
		  
}
//reject count local claim
function localrjtapprove($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_rjt_approv']=$this->CommnModel->local_rjt_approv($emp_code);  		  		
	return  $data['local_rjt_approv'];
		  
}
//SA Approve count local claim
function localapproveSA($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_appor_sa']=$this->CommnModel->local_approve_sa($emp_code);  		  		
	return  $data['local_appor_sa'];
		  
}
//SA Reject count local claim
function localrejectSA($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_rjt_sa']=$this->CommnModel->local_reject_sa($emp_code);  		  		
	return  $data['local_rjt_sa'];
		  
}
//SA Reject count local claim
function localpendingSA($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['local_panding_sa']=$this->CommnModel->local_pending_sa($emp_code);  		  		
	return  $data['local_panding_sa'];
		  
}
//user draft count iou claim
function iouClaimdraft($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_draftl']=$this->CommnModel->local_draft_user($emp_code);  		  		
	return  $data['iou_draftl'];
}
//user pending count iou claim
function iouClaimpending($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_pending']=$this->CommnModel->local_pending_user($emp_code);  		  		
	return  $data['iou_pending'];
}
//user Approve count iou claim
function iouClaimapprove($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_approve']=$this->CommnModel->local_approve_user($emp_code);  		  		
	return  $data['iou_approve'];
}
//user Reject count iou claim
function iouClaimReject($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_reject']=$this->CommnModel->local_reject_user($emp_code);  		  		
	return  $data['iou_reject'];
}
 //draft count other claim
function otherClaimdraft($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_draftl']=$this->CommnModel->other_Draftcl($emp_code);  		  		
	return  $data['other_draftl'];
		  
}
  //pending count other claim
function otherClaimpending($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->other_pending_claim($emp_code);  		  		
	return  $data['other_pending'];
		  
}

//approval count other claim
function otherClaimapproval($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approval']=$this->CommnModel->other_approval_claim($emp_code);  		  		
	return  $data['other_approval'];
		  
}
//reject count other claim
function otherClaimreject($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approval']=$this->CommnModel->other_reject_claim($emp_code);  		  		
	return  $data['other_approval'];
		  
}
//draft count travel claim
function travel_Claim_draft($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_draftl']=$this->CommnModel->travel_Draftcl($emp_code);  		  		
	return  $data['other_draftl'];
		  
}
  //pending count travel claim
function travel_Claim_pending($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->travel_pendingcl($emp_code);  		  		
	return  $data['other_pending'];
		  
}
//Approve count travel claim
function travel_Claim_approve($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approve']=$this->CommnModel->travel_approvecl($emp_code);  		  		
	return  $data['other_approve'];
		  
}
//Approve count travel claim
function travel_Claim_Reject($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject']=$this->CommnModel->travel_rejectcl($emp_code);  		  		
	return  $data['other_reject'];
		  
}
//Approve non iou count travel claim
function travel_Claim_Approve_noniou($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['travel_Approve_noniou']=$this->CommnModel->travel_approve_noniou($emp_code);  		  		
	return  $data['travel_Approve_noniou'];
		  
}


//approval pending count iou claim
function iou_approv_pending($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_pending']=$this->CommnModel->iou_pending_approv($emp_code);  		  		
	return  $data['iou_pending'];
}
//approval Approve count iou claim
function iou_approv_approve($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_approve']=$this->CommnModel->iou_approve_approv($emp_code);  		  		
	return  $data['iou_approve'];
}
//approval Reject count iou claim
function iou_approv_Reject($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_reject']=$this->CommnModel->iou_reject_approv($emp_code);  		  		
	return  $data['iou_reject'];
}
//pending count other claim approval
function otherpendingapprove($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->other_pending_approval($emp_code);  		  		
	return  $data['other_pending'];
		  
}
//accept count other claim approval
function other_accept_approve($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_accept']=$this->CommnModel->other_accept_approval($emp_code);  		  		
	return  $data['other_accept'];
		  
}
//Reject count other claim approval
function other_reject_approve($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject']=$this->CommnModel->other_reject_approval($emp_code);  		  		
	return  $data['other_reject'];
		  
}
//pending count travel claim Approval
function travel_Claim_pending_approver($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->travel_pending_approv($emp_code);  		  		
	return  $data['other_pending'];
		  
}
//approve count travel claim Approval
function travel_Claim_approve_approver($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approve']=$this->CommnModel->travel_approve_approv($emp_code);  		  		
	return  $data['other_approve'];
		  
}
//reject count travel claim Approval
function travel_Claim_reject_approver($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject']=$this->CommnModel->travel_reject_approv($emp_code);  		  		
	return  $data['other_reject'];
		  
}
//SA pending count iou claim
function iou_sa_pending($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_pending']=$this->CommnModel->iou_pending_sa($emp_code);  		  		
	return  $data['iou_pending'];
}

//SA reject count iou claim
function iou_sa_reject($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_reject']=$this->CommnModel->iou_reject_sa($emp_code);  		  		
	return  $data['iou_reject'];
}
//SA approve count iou claim
function iou_sa_approve($emp_code)
{
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['iou_approve']=$this->CommnModel->iou_approve_sa($emp_code);  		  		
	return  $data['iou_approve'];
}
//pending count other claim SA
function other_pending_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->other_pending_sa($emp_code);  		  		
	return  $data['other_pending'];
		  
}
//accept count other claim SA
function other_accept_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_accept']=$this->CommnModel->other_accept_sa($emp_code);  		  		
	return  $data['other_accept'];
		  
}
//Reject count other claim SA
function other_reject_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject']=$this->CommnModel->other_reject_sa($emp_code);  		  		
	return  $data['other_reject'];
		  
}


//pending count travel claim SA
function travel_Claim_pending_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending']=$this->CommnModel->travel_pending_sa($emp_code);  		  		
	return  $data['other_pending'];
		  
}  
 //approve count travel claim SA
function travel_Claim_approve_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approve']=$this->CommnModel->travel_approve_sa($emp_code);  		  		
	return  $data['other_approve'];
		  
}  
    //reject count travel claim SA
function travel_Claim_reject_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject']=$this->CommnModel->travel_reject_sa($emp_code);  		  		
	return  $data['other_reject'];
		  
}  
 //NON IOU APPROVED count travel claim SA
function travel_Claim_noniou_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['travel_noniou']=$this->CommnModel->travel_noniou_sa($emp_code);  		  		
	return  $data['travel_noniou'];
		  
}  
//CLAIMER OUTSTANDING count travel claim SA
function travel_Claim_outstanding_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['travel_outstanding']=$this->CommnModel->travel_outstanding_sa($emp_code);  		  		
	return  $data['travel_outstanding'];
		  
}  
//COMPANY OUTSTANDING count travel claim SA
function travel_Claim_companyoutstanding_sa($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['travel_companyoutstanding']=$this->CommnModel->travel_companyoutstanding_sa($emp_code);  		  		
	return  $data['travel_companyoutstanding'];
		  
}  

 //pending count other claim high autho
function other_Claim_pending_high($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_high_pending']=$this->CommnModel->travel_pending_highAutho($emp_code);  		  		
	return  $data['other_high_pending'];
		  
}  
 //approval count other claim high autho
function other_Claim_approval_high($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_high_approval']=$this->CommnModel->travel_approve_highAutho($emp_code);  		  		
	return  $data['other_high_approval'];
		  
}  
//reject count other claim high autho
function other_Claim_reject_high($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_high_reject']=$this->CommnModel->travel_reject_highAutho($emp_code);  		  		
	return  $data['other_high_reject'];
		  
}  
//pending count other claim mdoffice autho
function other_Claim_pending_mdoffice($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_pending_mdoffice']=$this->CommnModel->travel_pending_mdofficeAutho($emp_code);  		  		
	return  $data['other_pending_mdoffice'];
		  
}  
//approval count other claim mdoffice autho
function other_Claim_approval_mdoffice($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_approval_mdoffice']=$this->CommnModel->travel_approval_mdofficeAutho($emp_code);  		  		
	return  $data['other_approval_mdoffice'];
		  
}  
//reject count other claim mdoffice autho
function other_Claim_reject_mdoffice($emp_code)
{
	
	$this->load->database();  
    $this->load->model('universal/CommnModel');  	
	$data['other_reject_mdoffice']=$this->CommnModel->travel_reject_mdofficeAutho($emp_code);  		  		
	return  $data['other_reject_mdoffice'];
		  
}  
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */