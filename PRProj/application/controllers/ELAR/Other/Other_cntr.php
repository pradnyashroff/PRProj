<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other_cntr extends CI_Controller {

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
        $this->load->model('ELAR/Other/OtherModel');
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
    public function create_other_claim() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/create_claim');
    }

     public function other_claim_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimDraftTbl');
    }
     public function sanc_accepted_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckAcceptReqTbl');
    }
    public function sanc_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckRejectReqTbl');
    }
    
     public function other_higherAuthority_claim_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthoritylCheckPendingReqTbl');
    }
     public function other_mdOfficeAuthority_claim_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeAuthoritylCheckPendingReqTbl');
    }
    
    
    public function other_mdOffice_claim_accept_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeAuthorityCheckAcceptedReqTbl');
    }
    public function viewDraftOtherClaim($ocm_id) {//
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimDraftView', $data);
    }
    
    public function appr_other_claim_rejct_view($ocm_id) {//
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckRejctReqView', $data);
    }
    
        
    public function higher_other_claim_rejct_view($ocm_id) {//
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthorityCheckRejctReqView', $data);
    }
    
      public function mdOffice_other_claim_rejct_view($ocm_id) {//
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeCheckRejctReqView', $data);
    }
    


    public function appr_other_claim_pend_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckPendingReqTbl');
    }
      public function appr_other_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckAcceptedReqTbl');
    }

    public function appr_other_claim_pend_view($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckPendingReqView', $data);
    }   
    public function fetchOtherReimAcceptMdOfficeClaimView($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeAuthorityCheckAcceptedReqView', $data);
    }   
     public function sanc_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckPendReqTbl');
    }

        public function sanc_other_claim_pend_view($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckPendReqView', $data);
    }
    
    public function other_Approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimApprovedTbl');
    }
    public function other_Rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimRejectTbl');
    }
    public function other_claim_approved_view($ocm_id) {
      
          $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimViewApproved',$data);
    }
    public function sanc_autho_other_claim_accpt_view($ocm_id) {
      
          $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckAcceptReqView',$data);
    }
    
      public function appr_other_claim_accpt_view($ocm_id) {
      
          $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckAcceptedReqView',$data);
    }
    
     public function sanc_autho_other_claim_rejct_view($ocm_id) {
      
          $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/sanctionAuthoCheckRejectReqView',$data);
    }
     public function other_claim_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimPendingTbl');
    }
     public function other_higher_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthorityCheckRejctReqTbl');
    }
    public function other_higher_accepted_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthorityCheckAcceptedReqTbl');
    }
    
     public function approval_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/approvalCheckRejctReqTbl');
    }
    
      public function rejectOtherMdOfficeClaim() {
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeCheckRejctReqTbl');
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

    public function addOtherRimDetails() {//Local Reimbursememnt claim details adding here....
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        //Check whether user upload picture
        echo 'printing-------------' . $_FILES['picture']['name'];
            if(!empty($_FILES['picture']['name'])){
                
                $config['upload_path'] = 'uploads/otherReim/';
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
                'dynamic_id' => $this->input->post('txtEmpCode'),
                'invoice_date' => $this->input->post('datepicker'),
                'invoice_no' => $this->input->post('txtInvoiceNo'),
                'supplier_name' => $this->input->post('txtSupplierName'),
                'being' => $this->input->post('areaReason'),
                'amount' => $this->input->post('txtAmount'),
                'ack_file' => $picture,
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        $this->OtherModel->addOtherRimDetails($data);
          echo '<script>window.history.back();</script>';
    }
    
    
    function fetchOtherReimDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->OtherModel->fetchOtherReimDetails($emp_code);
        return $data['conveyanceList'];
    }

     public function ajax_edit($id) {
        $data = $this->OtherModel->get_by_id($id);
        echo json_encode($data);
    }

    public function updateOtherRimDetails() {//Local Reimbursememnt claim details adding here....
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
         $editId = $this->input->post('editId');
       
            $data = array(
                'invoice_date' => $this->input->post('editDatepicker'),
                'invoice_no' => $this->input->post('editTxtInvoiceNo'),
                'supplier_name' => $this->input->post('editTxtSupplierName'),
                'being' => $this->input->post('editAreaReason'),
                'amount' => $this->input->post('editTxtAmount'),
                'reg_date' => $date,
                'reg_time' => $time,
            );
        $this->OtherModel->updateOtherRimDetails($data, $editId);
       echo '<script>window.history.back();</script>';
    }
    
    public function deletedata() {
            $id = $this->input->get('id');
            $this->OtherModel->deleterecords($id);
            redirect('ELAR/Other/Other_cntr/create_other_claim');
         }
    
      public function createClaim() {//Other Reimbursememnt claim details adding here....
         $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
         //Check whether user upload picture
           
        $data = array(
            'emp_code' => $this->input->post('txtEmpCode'),
            'plant_code' => $this->input->post('txtPlantId'),
            'total_amt' => $this->input->post('txtFinalRate'),
            'bank_name' => $this->input->post('txtBankName'),
            'acc_no' => $this->input->post('txtAccountNo'),
            'ifsc' => $this->input->post('txtIFSC'),
            'reg_date' => $date,
            'reg_time' => $time,
            'justification' => $this->input->post('areaJustification')
        );
        
      
     $this->OtherModel->addOtherReimClaim($data);
        $empCode = $this->input->post('txtEmpCode');

        $row = $this->db->query('SELECT MAX(ocm_id) AS ocm_id FROM other_claim_mst WHERE emp_code=' . $empCode)->row();
        if ($row) {
            $ocm_id = $row->ocm_id;
            $data1 = array(
                'dynamic_id' => $ocm_id
            );
            $this->db->where('dynamic_id', $empCode);
            $this->db->update('other_claim_details', $data1);
            
                     
           // echo 'printing claim number here......' . $lrcm_id;
        }


        redirect('ELAR/Other/Other_cntr/other_claim_draft_tbl');
    }
    
      function fetchOtherReimDraftDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->OtherModel->fetchOtherReimDraftDetails($emp_code);
        return $data['claimList'];
    }
    
      function otherClaimDetails($ocm_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->OtherModel->otherClaimDetails($ocm_id);
        return $data['LocalClaimDetail'];
    }
    
     function fetchOtherReimDetailsByClaimId($ocm_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->OtherModel->fetchOtherReimDetailsByClaimId($ocm_id);
        return $data['conveyanceList'];
    }

     public function deleteOtherData($id) {
        $this->load->helper('url');
        $this->load->database();
        $this->db->query("delete from other_claim_details where ocd_id='" . $id . "'");
    }
    
      public function createClaimDraft() {//Local Reimbursememnt claim details adding here....
        $this->load->helper('url');
        $this->load->database();
        $ClaimState = $this->input->post('claim_state');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $UpdateId = $this->input->post('txtClaimId');
       
                
      
        if ($ClaimState == "draft") {
            
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'bank_name' => $this->input->post('txtBankName'),
                'acc_no' => $this->input->post('txtAccountNo'),
                'ifsc' => $this->input->post('txtIFSC'),
                'reg_date' => $date,
                'reg_time' => $time, 
                'justification' => $this->input->post('areaJustification')
            );
        } else {
            $data = array(
                'total_amt' => $this->input->post('txtFinalRate'),
                'plant_code' => $this->input->post('txtPlantId'),
                'bank_name' => $this->input->post('txtBankName'),
                'acc_no' => $this->input->post('txtAccountNo'),
                'ifsc' => $this->input->post('txtIFSC'),
                'reg_date' => $date,
                'reg_time' => $time, 
                'ocm_status' => 1,
                'justification' => $this->input->post('areaJustification')
            );

            $dataProcess = array(
                'ocm_id' => $UpdateId,
                'emp_code' => $this->input->post('txtEmpCode'),
                'rep_autho' => $this->input->post('txtRepAutho'),
                'level_of' => 1,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->OtherModel->otherReimClaimProcess($dataProcess);
            
            
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtHodEmail');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='New Other Reimbursement Claim Created By '.$this->input->post('txtEmpName').' Voucher No '.$UpdateId.' ';
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

        $this->OtherModel->addOtherReimClaimDraft($data, $UpdateId);



     redirect('ELAR/Other/Other_cntr/other_claim_draft_tbl');
        
            
    }
    
        function fetchReportingDetails($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $data['reporting_autho'] = $this->CommnModel->fetchReportingDetails($emp_code);
        return $data;
    }
    
       function fetchOtherReimApprovalDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->OtherModel->fetchOtherReimApprovalDetails($emp_code);
        return $data['claimListApproval'];
    }
    
    
         function hodActionOtherClaim(){
             echo 'in the controller';
            $date = date('d-m-Y');
            $time = date("h:i A");
            $ClaimId = $this->input->post('txtClaimId');
            $FinalRate = $this->input->post('txtFinalRate');
            $EmpCode = $this->input->post('txtEmpCode');
            $sanc_autho = $this->input->post('sanc_autho');
            $action = $this->input->post('claim_state');
             $StatusId = $this->input->post('txtStatusId');
            $authoHih_one = $this->input->post('authoHih_one');
                if ($action == "accept") {
                    echo 'in  the accept condition';
                if($FinalRate < "701"){
                    echo 'in  the compare method......';
                        $data = array(
                     'rep_autho' => $EmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('comment'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
                 echo '$ClaimId...........'.$ClaimId;
                   echo '$StatusId...........'.$StatusId;
                   echo '$data...........'.$data;
                        $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                        $data2 = array(
                            'ocm_id' => $ClaimId,
                            'emp_code' => $this->input->post('claimer_id'),
                            'rep_autho' => $sanc_autho,
                            'level_of' => 4,
                            'action' => 0,
                            'actual_action' => 0,
                            'action_date' => $date,
                            'action_time' => $time
                        );
            
            $this->OtherModel->otherClaimProcessRepAutho($data2);
                    
                
                // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Other Reimbursement Claim Accepted By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
                        else {
                             echo 'in  the compare else......';
                             
                             $data = array(
                     'rep_autho' => $EmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('comment'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
                            $data2 = array(
                            'ocm_id' => $ClaimId,
                            'emp_code' => $this->input->post('claimer_id'),
                            'rep_autho' => $authoHih_one,
                            'level_of' => 2,
                            'action' => 0,
                            'actual_action' => 0,
                            'action_date' => $date,
                            'action_time' => $time
                        );
                            $data1 = array(
                            'ocm_status' => 1
                        );
           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                             $this->OtherModel->otherClaimProcessRepAutho($data2);
                           $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);      
                           
                           
                           // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtHigherAuthoEmail');
        $subject='Other Reimbursement Claim Accepted By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
                }else{
                                $data = array(
                            'rep_autho' => $EmpCode,
                            'action' => 2,
                            'actual_action' => 2,
                            'comment' => $this->input->post('comment'),
                            'action_date' => $date,
                            'action_time' => $time,
                        );
                        $data1 = array(
                            'ocm_status' => 2
                        );
           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                    $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                   


        // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $subject='Other Reimbursement Claim Rejected By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
           
            
                }
                
                  redirect('ELAR/Other/Other_cntr/appr_other_claim_pend_tbl');
        
        
    }
    
    function actionTakerDetails($ocm_id,$emp_code) {
        $this->load->database();
        $data['$actionTakenBy'] = $this->OtherModel->actionTakerDetails($ocm_id,$emp_code);
        return $data['$actionTakenBy'];
    }
    function getSanctionAuthoDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['autho_code'] = $this->CommnModel->getSanctionAuthoDetails();
        return $data;
    }
     function getClaimerDetails($ocm_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['claimer'] = $this->OtherModel->getClaimerDetails($ocm_id);
        return $data;
    }
      function getHigherAuthoOneDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['authoHih_one'] = $this->OtherModel->getHigherAuthoOneDetails();
        return $data;
    }
    
    function fetchOtherReimHigherAuthoOneDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->OtherModel->fetchOtherReimHigherAuthoOneDetails($emp_code);
        return $data['claimListApproval'];
    }
   
     public function fetchOtherReimHigherAuthoOneDetailsView($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthorityCheckPendingReqView', $data);
    }
    
    
    public function other_claim_pending_view($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimViewPending', $data);
    }
       public function other_claim_reject_view($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/otherClaimViewRejected', $data);
    }
    public function fetchOtherReimApprovalHigherAuthoClaimView($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/higherAuthorityCheckAcceptedReqView', $data);
    }
    
    function getHigherAuthoTwoDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['authoHih_one'] = $this->OtherModel->getHigherAuthoTwoDetails();
        return $data;
    }
    
    function higherAuthoOneActionOtherClaim(){
             echo 'in the controller';
            $date = date('d-m-Y');
            $time = date("h:i A");
            $ClaimId = $this->input->post('txtClaimId');
            $FinalRate = $this->input->post('txtFinalRate');
            $EmpCode = $this->input->post('txtEmpCode');
            $action = $this->input->post('claim_state');
             $StatusId = $this->input->post('txtStatusId');
            $authoHih_one = $this->input->post('authoHih_one');
                if ($action == "accept") {
                        $data = array(
                     'rep_autho' => $EmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('comment'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
                
                        $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                        $data2 = array(
                            'ocm_id' => $ClaimId,
                            'emp_code' => $this->input->post('claimer_id'),
                            'rep_autho' => $authoHih_one,
                            'level_of' =>3 ,
                            'action' => 0,
                            'actual_action' => 0,
                            'action_date' => $date,
                            'action_time' => $time
                        );
            
                         $this->OtherModel->otherClaimProcessRepAutho($data2);
                         
                         // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtMdOfficeEmail');
        $subject='Other Reimbursement Claim Accepted By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
           
                         
                         
                         
                         
                         
                     }else{
                                $data = array(
                            'rep_autho' => $EmpCode,
                            'action' => 2,
                            'actual_action' => 2,
                            'comment' => $this->input->post('comment'),
                            'action_date' => $date,
                            'action_time' => $time,
                        );
                        $data1 = array(
                            'ocm_status' => 2
                        );           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                    $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                    
                      // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $subject='Other Reimbursement Claim Rejected By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
           
                }
                
                redirect('ELAR/Other/Other_cntr/other_higherAuthority_claim_draft_tbl');
        
        
    }
    
        
    function fetchOtherReimHigherAuthoTwoDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->OtherModel->fetchOtherReimHigherAuthoTwoDetails($emp_code);
        return $data['claimListApproval'];
    }
    
     public function fetchOtherReimHigherAuthoTwoDetailsView($ocm_id) {
        $data['ocm_id'] = $ocm_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Other/mdOfficeAuthorityCheckPendingReqView', $data);
    }
    
    function higherAuthoTwoActionOtherClaim(){
             echo 'in the controller';
            $date = date('d-m-Y');
            $time = date("h:i A");
            $ClaimId = $this->input->post('txtClaimId');
            $EmpCode = $this->input->post('txtEmpCode');
            $action = $this->input->post('claim_state');
            $StatusId = $this->input->post('txtStatusId');
            $sanc_autho = $this->input->post('sanc_autho');
            echo 'printing $sanc_autho$sanc_autho$sanc_autho------>'.$sanc_autho;
                if ($action == "accept") { 
                     $data = array(
                     'rep_autho' => $EmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('comment'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
                
                        $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                        $data2 = array(
                            'ocm_id' => $ClaimId,
                            'emp_code' => $this->input->post('claimer_id'),
                            'rep_autho' => $sanc_autho,
                            'level_of' =>4,
                            'action' => 0,
                            'actual_action' => 0,
                            'action_date' => $date,
                            'action_time' => $time
                        );
            
            $this->OtherModel->otherClaimProcessRepAutho($data2);
                    
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Other Reimbursement Claim Accepted By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
                
                       
                }else{
                                $data = array(
                            'rep_autho' => $EmpCode,
                            'action' => 2,
                            'actual_action' => 2,
                            'comment' => $this->input->post('comment'),
                            'action_date' => $date,
                            'action_time' => $time,
                        );
                        $data1 = array(
                            'ocm_status' => 2
                        );
           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                    $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                    
                    
                       // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $subject='Other Reimbursement Claim Rejected By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
        
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
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
                    
            
                }      
                
                 redirect('ELAR/Other/Other_cntr/other_mdOfficeAuthority_claim_draft_tbl');
    }
    
    function fetchLocalReimSancAuthoDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->OtherModel->fetchLocalReimSancAuthoDetails($emp_code);
        return $data['claimListApproval'];
    }
    
    
     function sanctionAuthoActionOtherClaim(){
             echo 'in the controller';
            $date = date('d-m-Y');
            $time = date("h:i A");
            $ClaimId = $this->input->post('txtClaimId');
            $EmpCode = $this->input->post('txtEmpCode');
            $action = $this->input->post('claim_state');
            $StatusId = $this->input->post('txtStatusId');
            $sanc_autho = $this->input->post('sanc_autho');
            echo 'printing $sanc_autho$sanc_autho$sanc_autho------>'.$sanc_autho;
                if ($action == "accept") { 
                     $data = array(
                     'rep_autho' => $EmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('comment'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
                     $data1 = array(
                            'ocm_status' => 3
                        );
           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                
                        $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                       
                // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $subject='Other Reimbursement Claim Accepted By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->send();
    // Email Code End Here...........................
           

                       
                }else{
                                $data = array(
                            'rep_autho' => $EmpCode,
                            'action' => 2,
                            'actual_action' => 2,
                            'comment' => $this->input->post('comment'),
                            'action_date' => $date,
                            'action_time' => $time,
                        );
                        $data1 = array(
                            'ocm_status' => 2
                        );
           
                    $this->db->where('ocm_id', $ClaimId);
                    $this->db->update('other_claim_mst', $data1);
                    $this->OtherModel->hodActionOtherClaim($data, $ClaimId, $StatusId);
                    
                    
                    // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $subject='Other Reimbursement Claim Rejected By '.$this->input->post('txtHodName').' Voucher No '.$ClaimId.' ';
        $message='<ol>
	<li><b>Plant Code:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptNameDetails'). '</li>
	<li><b>Voucher No:</b>  '.$ClaimId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtFinalRate').'</li>
        <li><b>Claim Comment:</b>  '.$this->input->post('comment').'</li>
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
                
                 redirect('ELAR/Other/Other_cntr/sanc_pending_tbl');
    }
    
        function fetchOtherReimApprovedDetailsTbl($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['approvedClaimList'] = $this->OtherModel->fetchOtherReimApprovedDetailsTbl($emp_code);
        return $data['approvedClaimList'];
    }
    
     function otherClaimDetailsApproval($ocm_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->OtherModel->otherClaimDetailsApproval($ocm_id);
        return $data['LocalClaimDetail'];
    }
    
    
     function otherClaimDetailsStatusLog($ocm_id) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->OtherModel->otherClaimDetailsStatusLog($ocm_id);
        return $data['LocalClaimHodApproved'];
    }
    function fetchOtherReimPendingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->OtherModel->fetchOtherReimPendingDetails($emp_code);
        return $data['claimList'];
    }
     function fetchOtherReimRejectDetails($emp_code) {
     
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->OtherModel->fetchOtherReimRejectDetails($emp_code);
        return $data['claimList'];
    }
    function fetchOtherReimApprovalHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimApprovalHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
     function fetchOtherReimRejectHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimRejectHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
     function fetchOtherReimApprovalHigherAuthoClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimApprovalHigherAuthoClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
    function fetchOtherReimRejectHigherAuthoClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimRejectHigherAuthoClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    function fetchOtherReimAcceptmdOfficeClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimAcceptmdOfficeClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
     function fetchOtherReimRejectMdOfficeClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->OtherModel->fetchOtherReimRejectMdOfficeClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
     public function showSancAuthoReportAccept() {
        
        $txtFromDate = $this->input->post('fromDate');
        $txtToDate = $this->input->post('toDate');
        
        $this->load->database();
        $result = $this->OtherModel->showSancAuthoReportAccept($txtFromDate,$txtToDate);
       // $data['query'] = $this->CommnModel->showSancAuthoReportAccept();
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/Other/sanctionAuthoCheckAcceptReqTbl', $data);

    }
   function fetchOtherReimSancAuthoRejectDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
         $data['claimListApproval'] = $this->OtherModel->fetchOtherReimSancAuthoRejectDetails($emp_code);
        return $data['claimListApproval'];
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
                'ocm_status'=>0,
            );
            $this->db->where('ocm_id', $UpdateId);
            $this->db->update('other_claim_mst', $data);
             redirect('ELAR/Other/Other_cntr/other_claim_draft_tbl');
        }
            else{
            echo $ClaimState;
                $message = "Ok! You have selected no action on claim";
            echo "<script type='text/javascript'>alert('$message');</script>";
             redirect('ELAR/Other/Other_cntr/other_Rejected_tbl');
            
            }
            
           
    }
    
  function higherAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['ocha_id'] = $this->CommnModel->higherAuthNavBarStatus($emp_code);
        return $data;
        
    }
    
    function repoAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['reporting_autho'] = $this->CommnModel->repoAuthNavBarStatus($emp_code);
        return $data;
    }
    
    function mdOfficeAuthNavBarStatus($emp_code) {//Full Department name from dept_master
        
        
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['ocha_id'] = $this->CommnModel->mdOfficeAuthNavBarStatus($emp_code);
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
      function fetchSancAuthoMailDetailsForClaimer() {
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['SancAuthoEmail'] = $this->CommnModel->fetchSancAuthoMailDetailsForClaimer();
        return $data;
    }
    
     function fetchVoucherDate($ocm_id) {//Full Department name from dept_master
        $this->load->database();
        $data['reg_date'] = $this->OtherModel->fetchVoucherDate($ocm_id);
        return $data;
    }
    
     public function addOtherReimDetailsDraft() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
          if(!empty($_FILES['picture']['name'])){
                
                $config['upload_path'] = 'uploads/otherReim/';
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
                'dynamic_id' => $this->input->post('txtClaimId'),
                'invoice_date' => $this->input->post('datepicker'),
                'invoice_no' => $this->input->post('txtInvoiceNo'),
                'supplier_name' => $this->input->post('txtSupplierName'),
                'being' => $this->input->post('areaReason'),
                'amount' => $this->input->post('txtAmount'),
                'ack_file' => $picture,
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode')
            );
        $this->OtherModel->addOtherRimDetails($data);
          echo '<script>window.history.back();</script>';
    }

    function fetchUserMailDetails($ocm_id) {
        $this->load->database();
        $data['emp_email'] = $this->OtherModel->fetchUserMailDetails($ocm_id);
        return $data;
    }
    function fetchEmpNameForMail($ocm_id) {//Full Department name from dept_master
        $this->load->database();
        $data['emp_name'] = $this->OtherModel->fetchEmpNameForMail($ocm_id);
        return $data;
    }
   
    function fetchHigherAuthoMailDetailsForClaimer() {
        $this->load->database();
        $data['HigherAuthoEmail'] = $this->OtherModel->fetchHigherAuthoMailDetailsForClaimer();
        return $data;
    }
    
     function fetchMdOfficeMailDetailsForClaimer() {
        $this->load->database();
        $data['mdOfficeAuthoEmail'] = $this->OtherModel->fetchMdOfficeMailDetailsForClaimer();
        return $data;
    }
      function fetchUserDepartmentDetails($ocm_id) {
        $this->load->database();
        $data['dept_name'] = $this->OtherModel->fetchUserDepartmentDetails($ocm_id);
        return $data;
    }
    function fetchUserPlantDetails($ocm_id) {
        $this->load->database();
        $data['plant_name'] = $this->OtherModel->fetchUserPlantDetails($ocm_id);
        return $data;
    }
     function otherBankDetails($emp_code) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->OtherModel->otherBankDetails($emp_code);
        return $data['LocalClaimDetail'];
    }
    
     //--------------------------------------------Start----------------------------------------
    //get claimer plant from claim id
    //Additional Development 2019-11-11 
    //Author: Kaustubh Ashok Khadke
    //Requirement By: Mate Sir At 2019-11-09
    
     function getClaimerPlant($ocm_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimerPlant'] = $this->OtherModel->getClaimerPlant($ocm_id);
        return $data;
    }
     //------------------------------End -------------------------------------------------------
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */