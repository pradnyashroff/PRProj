<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IouCntr extends CI_Controller {
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
        $this->load->model('ELAR/iou/IouModel');
    }

   
      public function iou_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouDraftTbl');
    }
      public function iou_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouPendingTbl');
    }
      public function iou_accepted_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouApprovedTbl');
    }
      public function iou_reject_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouRejectTbl');
    }
    
    public function approval_accepted_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckAcceptedReqTbl');
    }
     public function approval_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckPendingReqTbl');
    }
     public function approval_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckRejctReqTbl');
    }
   
       public function sanc_accepted_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckAcceptReqTbl');
    }
       public function sanc_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckRejectReqTbl');
    }
       public function sanc_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckPendReqTbl');
    }
    
    public function create_local_claim() {
        $this->load->helper('url');
        $this->load->view('ELAR/iou/create_iou_claim');
    }
    
    
    public function iou_claim_pend_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouViewPending', $data);
    }

      public function iou_claim_accept_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouViewApproved', $data);
    }
    
     public function iou_claim_reject_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouViewRejected', $data);
    }
    
    public function iou_approval_claim_pending_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckPendingReqView', $data);
    }
    
     public function iou_reject_claim_pending_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckRejctReqView', $data);
    }
    
      public function iou_approved_claim_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/approvalCheckAcceptedReqView', $data);
    }
      public function iou_sancAutho_claim_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckPendReqView', $data);
    }
    
      public function iou_sancAutho_reject_view($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckRejectReqView', $data);
    }
        
    
    public function profile_pic_fetch($emp_code) {
        $this->load->database();
        $this->load->model('PR/pr_model');
        $data['profile_attachment'] = $this->pr_model->profile_pic_fetch($emp_code);
        return $data['profile_attachment'];
    }
    
    function getGradeDetails($emp_code) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
         $this->load->model('universal/CommnModel');
        $data['grade'] = $this->CommnModel->getGradeDetails($emp_code);
        return $data;
    }
    
    function fetch_dept_nm($emp_dept) {
        //Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['dept_name'] = $this->CommnModel->fetch_dept_nm($emp_dept);
        return $data;
    }
    
        public function createIOUClaim() {
        //Local Reimbursememnt claim details adding here....
         $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        
            
        $data = array(
            'emp_code' => $this->input->post('txtEmpCode'),
            'iou_date' => $date,
            'iou_amt' => $this->input->post('txtAdvAmount'),
            'iou_justfic' => $this->input->post('areaJustification'),
            'bank_name' => $this->input->post('txtBankName'),
            'acc_no' => $this->input->post('txtAccountNo'),
            'ifsc' => $this->input->post('txtIFSC'),
            'reg_date' => $date,
            'reg_time' => $time);
        $this->IouModel->addIouClaim($data);
        
          redirect('ELAR/IOU/IouCntr/iou_draft_tbl');
        
    }
    
      function fetchIouDraftDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->IouModel->fetchIouDraftDetails($emp_code);
        return $data['claimList'];
    }
    
     public function viewDraftIou($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/iouDraftView', $data);
    }
    
    
    
      function iouClaimDetails($lou_clm_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->IouModel->iouClaimDetails($lou_clm_id);
        return $data['LocalClaimDetail'];
    }
       function fetchReportingDetails($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reporting_autho'] = $this->CommnModel->fetchReportingDetails($emp_code);
        return $data;
    }
    
        public function iouClaimDraftCreate() {
        $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $UpdateId = $this->input->post('txtClaimId');
         $ClaimState = $this->input->post('claim_state');
        if ($ClaimState == "draft") {
            $data = array(
                'iou_amt' => $this->input->post('txtAdvAmount'),
                'iou_justfic' => $this->input->post('areaJustification'),
                'bank_name' => $this->input->post('txtBankName'),
                'acc_no' => $this->input->post('txtAccountNo'),
                'ifsc' => $this->input->post('txtIFSC'),
                'reg_date' => $date,
                'reg_time' => $time
                
            );
        } else {
            $data = array(
               'iou_amt' => $this->input->post('txtAdvAmount'),
                'iou_justfic' => $this->input->post('areaJustification'),
                'bank_name' => $this->input->post('txtBankName'),
                'acc_no' => $this->input->post('txtAccountNo'),
                'ifsc' => $this->input->post('txtIFSC'),
                'iou_status' => 1,
                'reg_date' => $date,
                'reg_time' => $time
            );

            $dataProcess = array(
                'lou_clm_id' => $UpdateId,
                'emp_code' => $this->input->post('txtEmpCode'),
                'rep_autho' => $this->input->post('txtRepAutho'),
                'level_of' => 1,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->IouModel->iouClaimProcess($dataProcess);
              // Email Code Start From Here...........................
        $reciver= $this->input->post('txtHodEmail');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='New Advance IOU Claim Created By '.$this->input->post('txtEmpName').' Voucher No '.$UpdateId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptName'). '</li>
	<li><b>Voucher No:</b>  '.$UpdateId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtEmpName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtAdvAmount').'</li>
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


        $this->IouModel->addIouClaimDraft($data, $UpdateId);



      redirect('ELAR/IOU/IouCntr/iou_pending_tbl');
        
           
    }
    
    
    
      function fetchIouPendingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->IouModel->fetchIouPendingDetails($emp_code);
        return $data['claimList'];
    }
    
       function iouClaimDetailsStatusLog($lou_clm_id) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->IouModel->iouClaimDetailsStatusLog($lou_clm_id);
        return $data['LocalClaimHodApproved'];
    }
    
       function iouClaimDetailsHodActionStatus($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodActtionStatus'] = $this->IouModel->iouClaimDetailsHodActionStatus($lou_clm_id,$emp_code);
        return $data['LocalClaimHodActtionStatus'];
    }
    
             function iouDetailsSanAuthoActionStatus($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimSanAuthoActtionStatus'] = $this->IouModel->iouDetailsSanAuthoActionStatus($lou_clm_id,$emp_code);
        return $data['LocalClaimSanAuthoActtionStatus'];
    }
    
        function fetchIouApprovedDetailsTbl($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['approvedClaimList'] = $this->IouModel->fetchIouApprovedDetailsTbl($emp_code);
        return $data['approvedClaimList'];
    }
    
       function fetchIouRejectDetails($emp_code) {
     
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->IouModel->fetchIouRejectDetails($emp_code);
        return $data['claimList'];
    }
    
      function fetchIouApprovalDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->IouModel->fetchIouApprovalDetails($emp_code);
        return $data['claimListApproval'];
    }
    function iouDetailsApproval($lou_clm_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->IouModel->iouDetailsApproval($lou_clm_id);
        return $data['LocalClaimDetail'];
    }
        function getClaimerDetails($lou_clm_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['claimer'] = $this->IouModel->getClaimerDetails($lou_clm_id);
        return $data;
    }
    function getSanctionAuthoDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['autho_code'] = $this->CommnModel->getSanctionAuthoDetails();
        return $data;
    }
    
     public function sanc_view_approved ($lou_clm_id) {
        $data['lou_clm_id'] = $lou_clm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/iou/sanctionAuthoCheckAcceptReqView', $data);
    }
    
    function fetchUserMailDetails($lou_clm_id) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['emp_email'] = $this->IouModel->fetchUserMailDetails($lou_clm_id);
        return $data;
    }
      function fetchSancAuthoMailDetailsForClaimer() {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['SancAuthoEmail'] = $this->CommnModel->fetchSancAuthoMailDetailsForClaimer();
        return $data;
    }
    
       function iouDetailsHodActionData($emp_code,$lou_clm_id) {
        $this->load->database();
        $data['hodActionData'] = $this->IouModel->iouDetailsHodActionData($emp_code,$lou_clm_id);
        return $data['hodActionData'];
    }
    
    
    
     public function updateClaimAction() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('lou_clm_id');

        $action = $this->input->post('localClaimState');
        
         $iou_status_id = $this->input->post('iou_status_id');
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
                'lou_clm_id' => $this->input->post('lou_clm_id'),
                'emp_code' => $this->input->post('claimer_id'),
                'rep_autho' => $this->input->post('auto_code'),
                'level_of' => 2,
                'action' => 0,
                'actual_action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->IouModel->updateClaimAction($data, $editId, $iou_status_id);
            $this->IouModel->iouClaimProcessRepAutho($data2);
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Advance IOU Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmt').'</li>
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
                'iou_status' => 2
            );
            echo 'printing here......' . $editId;
            $this->db->where('lou_clm_id', $editId);
            $this->db->update('iou_claim_mst', $data1);
            $this->IouModel->updateClaimAction($data, $editId, $iou_status_id);
            
            
             // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Advance IOU Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmtupdateClaimActionBySancAutho').'</li>
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
        redirect('ELAR/IOU/IouCntr/approval_pending_tbl');
    }
    
     function iouRejectHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->IouModel->iouRejectHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
    
      function iouDetailsHodReject($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->IouModel->iouDetailsHodReject($lou_clm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
    function fetchIouApprovalHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->IouModel->fetchIouApprovalHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
       function iouClaimDetailsHodApproved($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->IouModel->iouClaimDetailsHodApproved($lou_clm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
        
         function iouSancAuthoDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->IouModel->iouSancAuthoDetails($emp_code);
        return $data['claimListApproval'];
    }
    
            function iouDetailsLastApprovalDetils($emp_code,$lou_clm_id) {
        $this->load->database();
        $data['LocalClaimLastApprovalDetail'] = $this->IouModel->iouDetailsLastApprovalDetils($emp_code,$lou_clm_id);
        return $data['LocalClaimLastApprovalDetail'];
    }
    
     function fetchVoucherDate($lou_clm_id) {//Full Department name from dept_master
        $this->load->database();
        $data['reg_date'] = $this->IouModel->fetchVoucherDate($lou_clm_id);
        return $data;
    }
     
      function fetchEmpNameForMail($lou_clm_id) {//Full Department name from dept_master
        $this->load->database();
        $data['emp_name'] = $this->IouModel->fetchEmpNameForMail($lou_clm_id);
        return $data;
    }
      function fetchFinalRateForMail($lou_clm_id) {//Full Department name from dept_master
        $this->load->database();
        $data['iou_amt'] = $this->IouModel->fetchFinalRateForMail($lou_clm_id);
        return $data;
    }
    
        public function updateClaimActionBySancAutho() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $lou_clm_id = $this->input->post('lou_clm_id');
        $auto_code = $this->input->post('auto_code');
        $iou_status_id = $this->input->post('iou_status_id');
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
                'iou_status' => 3
            );
        
            $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('iou_claim_mst', $data1);
            
            $this->IouModel->updateClaimActionBySancAutho($data, $lou_clm_id,$auto_code,$iou_status_id);
          
            $closing_amt = $this->input->post('closing_amt');
            $claimAmt=$this->input->post('txtFinalRate');
            $insertAmt = $closing_amt+$claimAmt;
            $regBy=$this->input->post('txtEmpCode');
            echo "closing amount- ".$closing_amt;
             echo "insertAmt amount- ".$insertAmt;
             echo "claimAmt amount- ".$claimAmt;
            
            //data for transaction........
             $dataTransaction = array(
                'emp_code' => $this->input->post('claimer_id'),
                'iou_id' => $this->input->post('lou_clm_id'),
                'debit' => 0,
                'credit' =>$claimAmt,
                'closing_amt' => $insertAmt,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $regBy,
                'trn_status' => 0  // when claim is approved then in transaction claim will be 0 as credited not used 
                 );
             $this->IouModel->addIOUTransaction($dataTransaction);
            
            
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Local Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$lou_clm_id.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$lou_clm_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$claimAmt.'</li>
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
                'iou_status' => 2
            );
        
            $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('iou_claim_mst', $data1);
            
             $iou_status_id = $this->input->post('iou_status_id');
              $final_rep_autho = $this->input->post('final_rep_autho');
               $final_lou_clm_id = $this->input->post('final_lou_clm_id');
             
                echo '$final_rep_autho----' . $final_rep_autho;
                echo '$final_lou_clm_id----' . $final_lou_clm_id;
             $data2 = array(
                'action' => 2
            );
            $condition = "rep_autho=" . "'" . $final_rep_autho . "' and lou_clm_id=" . "'" . $final_lou_clm_id . "' and iou_status_id=" . "'" . $final_local_rim_id . "'";
            $this->db->where($condition);
            $this->db->update('iou_status', $data2);
            $this->IouModel->updateClaimActionBySancAutho($data, $lou_clm_id,$auto_code,$iou_status_id);
                                
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Advance IOU Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$lou_clm_id.' ';
        $message='<ol>
	<li><b>Voucher No:</b>  '.$lou_clm_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$claimAmt.'</li>
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
    redirect('ELAR/IOU/IouCntr/sanc_pending_tbl');
    }
    
    
    
     public function showSancAuthoReportAccept() {
        
        $txtFromDate = $this->input->post('fromDate');
        $txtToDate = $this->input->post('toDate');
        
        $this->load->database();
        $result = $this->IouModel->showSancAuthoReportAccept($txtFromDate,$txtToDate);
      
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/iou/sanctionAuthoCheckAcceptReqTbl', $data);

    }
    
      function iouDetailsSancApprovedReq($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->IouModel->iouDetailsSancApprovedReq($lou_clm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
      function iouReimSancAuthoRejectDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->IouModel->iouReimSancAuthoRejectDetails($emp_code);
        return $data['claimListApproval'];
    }
    
      function iouDetailsSancAuthoReject($lou_clm_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->IouModel->iouDetailsSancAuthoReject($lou_clm_id,$emp_code);
        return $data['LocalClaimHodApproved'];
    }
    
     function repoAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reporting_autho'] = $this->CommnModel->repoAuthNavBarStatus($emp_code);
        return $data;
    }
    
      function sancAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['sam_id'] = $this->CommnModel->sancAuthNavBarStatus($emp_code);
        return $data;
    }
      function fetchHODMailDetailsForClaimer($emp_code) {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['hodEmail'] = $this->CommnModel->fetchHODMailDetailsForClaimer($emp_code);
        return $data;
    }
     function statusCheckIOUPending($emp_code) {
        $this->load->database();
        $data['closing_amt'] = $this->IouModel->statusCheckIOUPending($emp_code);
        return $data;
    }
    function statusCheckIOUPendingComapny($claimerId) {
        $this->load->database();
        $data['closing_amt'] = $this->IouModel->statusCheckIOUPendingComapny($claimerId);
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
                'iou_status'=>0,
            );
            $this->db->where('lou_clm_id', $UpdateId);
            $this->db->update('iou_claim_mst', $data);
        }
            else {
                $message = "Ok! You have selected no action on claim";
            echo "<script type='text/javascript'>alert('$message');</script>";
            }

         redirect('ELAR/IOU/IouCntr/iou_draft_tbl');
    }
    
    function iouBankDetails($emp_code) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->IouModel->iouBankDetails($emp_code);
        return $data['LocalClaimDetail'];
    }
    
    function getClosingAmount($claimer_id) {//Full Department name from dept_master
       
        $this->load->helper('url');
        $this->load->database();
        $data['closing_amt'] = $this->IouModel->getClosingAmount($claimer_id);
        return $data;
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>