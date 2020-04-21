<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_cntr extends CI_Controller {

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
        $this->load->model('ELAR/Travel/TravelModel');
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
   
 
    public function create_travel_claim() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/create_claim');
    }
    public function travel_claim_draft_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/trvelClaimDraftTbl');
    }
    public function travel_claim_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimPendingTbl');
    }
     public function travel_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimApprovedTbl');
    }
    public function travel_claim_rejected_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimRejectTbl');
    }
     public function travel_without_iou_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelWithOutIOUClaimApprovedTbl');
    }
    public function travel_without_iou_claim_approved_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelWithOutIOUClaimViewApproved', $data);
    } 
    //approval at level hod navigation start
    
      public function approval_travel_claim_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckPendingReqTbl');
    }
    
    public function approval_travel_claim_pending_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckPendingReqView', $data);
    }
    
     public function approval_travel_claim_reject_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckRejctReqTbl');
    }
    public function approval_travel_claim_reject_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckRejctReqView', $data);
    }
    public function approval_travel_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckAcceptedReqTbl');
    }
    public function approval_travel_claim_approved_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/approvalCheckAcceptedReqView', $data);
    } 
    //approval at level hod navigation end
    /////////////////sanction authority
    
     public function sancAutho_travel_claim_pending_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckPendReqTbl');
    }
    
    public function sancAutho_travel_claim_pending_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckPendReqView', $data);
    }
    
     public function sancAutho_travel_claim_reject_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckRejectReqTbl');
    }
    public function sancAutho_travel_claim_reject_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckRejectReqView', $data);
    }
    public function sancAutho_travel_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqTbl');
    }
    public function sancAutho_travel_claim_approved_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqView', $data);
    } 
    public function sancAutho_travel_nonIOU_claim_approved_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqTblNonIOU');
    }
    public function sancAutho_travel_nonIOU_claim_approved_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqViewlNonIOU', $data);
    }
    
     public function sancAutho_travel_Claimer_OutStanding_claim_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckClaimerOutStandTbl');
    }
    
     public function sancAutho_travel_Claimer_OutStanding_claim_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckClaimerOutStandView', $data);
    }
    
    
     public function sancAutho_travel_Company_OutStanding_claim_tbl() {
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckCompanyOutStandTbl');
    }
     public function sancAutho_travel_Company_OutStanding_claim_view($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/sanctionAuthoCheckCompanyOutStandView', $data);
    }
    ////////////////////////////////////////// sanction authority

    
    
    public function addTravelingDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        if(!empty($_FILES['fileTicket']['name'])){
                
                $config['upload_path'] = 'uploads/travel/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['fileTicket']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['fileTicket']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileTicket')){
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
                'trv_date' => $this->input->post('datepicker'),
                'from_station' => $this->input->post('txtFromSt'),
                'depr_time' => $this->input->post('txtDepTime'),
                'to_station' => $this->input->post('txtToSt'),
                'arv_time' => $this->input->post('txtArrTime'),
                'trv_mode' => $this->input->post('comboTrvMode'),
                'class' => $this->input->post('comboClass'),
                'amount' => $this->input->post('txtAmountPerPers'),
                'total_amount' => $this->input->post('txtTotalAmt'),
                'persons' => $this->input->post('txtNoOfPers'),
                'invoice' => $picture,
                'justification' => $this->input->post('areaTrvJusti'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            );
        $this->TravelModel->addTravelingDetails($data);
        echo '<script>window.history.back();</script>';
        
    }
    
    
    public function addTravelingDraftDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        if(!empty($_FILES['fileTicket']['name'])){
                
                $config['upload_path'] = 'uploads/travel/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['fileTicket']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['fileTicket']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileTicket')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
        
        $data = array(
                'dynamic_id' => $this->input->post('trv_mst_id'),
                'trv_date' => $this->input->post('datepicker'),
                'from_station' => $this->input->post('txtFromSt'),
                'depr_time' => $this->input->post('txtDepTime'),
                'to_station' => $this->input->post('txtToSt'),
                'arv_time' => $this->input->post('txtArrTime'),
                'trv_mode' => $this->input->post('comboTrvMode'),
                'class' => $this->input->post('comboClass'),
                'amount' => $this->input->post('txtAmountPerPers'),
                'total_amount' => $this->input->post('txtTotalAmt'),
                'persons' => $this->input->post('txtNoOfPers'),
                'invoice' => $picture,
                'justification' => $this->input->post('areaTrvJusti'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            );
        $this->TravelModel->addTravelingDetails($data);
        echo '<script>window.history.back();</script>';
        
    }
    
      function fetchTravelDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchTravelDetails($emp_code);
        return $data['conveyanceList'];
    }
      
        function addPersonDetails(){
            $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'per_dynamic_id' => $this->input->post('txtEmpCode'),
                'emp_code' => $this->input->post('comboPersons'),
                'trvd_id' => $this->input->post('txtTravelId'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            
            );
        $this->TravelModel->addPersonDetails($data);
          echo '<script>window.history.back();</script>';
            
        }
        
           function addDraftPersonDetails(){
            $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'per_dynamic_id' => $this->input->post('trv_mst_id'),
                'emp_code' => $this->input->post('comboPersons'),
                'trvd_id' => $this->input->post('txtTravelId'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            
            );
        $this->TravelModel->addPersonDetails($data);
          echo '<script>window.history.back();</script>';
            
        }
        
            public function showPersonsDetailsOnClick() {
        
        $txtTravelIdFetch = $this->input->post('txtTravelIdFetch');
       
        
        $this->load->database();
        $result = $this->TravelModel->showPersonsDetailsOnClick($txtTravelIdFetch);
       // $data['query'] = $this->CommnModel->showSancAuthoReportAccept();
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/Travel/create_claim', $data);

    }
    
    
     public function showSancAuthoReportAccept() {
        
        $txtFromDate = $this->input->post('fromDate');
        $txtToDate = $this->input->post('toDate');
        
        $this->load->database();
        $result = $this->TravelModel->showSancAuthoReportAccept($txtFromDate,$txtToDate);
      
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqTbl', $data);

    }
    
    
    
    public function showSancAuthoReportAcceptNonIOU() {
        
        $txtFromDate = $this->input->post('fromDate');
        $txtToDate = $this->input->post('toDate');
       
        $this->load->database();
        $result = $this->TravelModel->showSancAuthoReportAcceptNonIOU($txtFromDate,$txtToDate);
      
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
           $this->load->view('ELAR/Travel/sanctionAuthoCheckAcceptReqTblNonIOU', $data);

    }
    
    
    
     public function viewPersonsDtails($trvd_id) {
        $data['trvd_id'] = $trvd_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/personDetails', $data);
    }
    
     public function viewPersonsDtailsShow($trvd_id) {
        $data['trvd_id'] = $trvd_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/personShow', $data);
    }
    
     function fetchPersonsDetailsByTrvelId($trvd_id) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchPersonsDetailsByTrvelId($trvd_id);
        return $data['claimListApproval'];
    }
    public function deletePerson($per_det_id) {
            $this->db->where('per_det_id',$per_det_id);
            $this->db->delete('person_details');
  
              $this->load->helper('url');
          echo '<script>window.history.back();</script>';
         }
         
          public function editTravelDetailsAjax($id) {
        $data = $this->TravelModel->editTravelDetailsAjax($id);
        echo json_encode($data);
    }
    
      public function editTravelData() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $editIdTrvelDetails = $this->input->post('editIdTrvelDetails');
        

       
            $data = array(
                'trv_date' => $this->input->post('editTdatepicker'),
                'from_station' => $this->input->post('editTxtFromSt'),
                'depr_time' => $this->input->post('editTxtDepTime'),
                'to_station' => $this->input->post('editTxtToSt'),
                'arv_time' => $this->input->post('editTxtArrTime'),
                'amount' => $this->input->post('editTxtAmountPerPers'),
                'total_amount' => $this->input->post('editTxtTotalAmt'),
                'persons' => $this->input->post('editTxtNoOfPers'),
                'justification' => $this->input->post('editAreaTrvJusti'),
                'reg_date' => $date,
                'reg_time' => $time
            );
        
        $this->TravelModel->editTravelData($data, $editIdTrvelDetails);

         echo '<script>window.history.back();</script>';
    }
    
        public function addHotelsDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
       if(!empty($_FILES['fileTicket']['name'])){
                
                $config['upload_path'] = 'uploads/travelHotel/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['fileTicket']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['fileTicket']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileTicket')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
        
        
        $data = array(
                'hotel_dynamic_id' => $this->input->post('txtEmpCode'),
                'bill_no' => $this->input->post('txtHotelBillNo'),
                'from_date' => $this->input->post('fromDateAddHotel'),
                'to_date' => $this->input->post('toDateAddHotel'),
                'expenses' => $this->input->post('txtExpense'),
                'total_amount' => $this->input->post('txtAmount'),
                'invoice' => $picture,
                'justification' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            );
        $this->TravelModel->addHotelsDetails($data);
      echo '<script>window.history.back();</script>';
        
    }
    
    
     public function addHotelsDraftDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
       if(!empty($_FILES['fileTicket']['name'])){
                
                $config['upload_path'] = 'uploads/travelHotel/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $_FILES['fileTicket']['name'];
                 echo 'in if condtion printing '. $config['file_name'] ;
                  echo 'in if condtion $_FILES '.$_FILES['fileTicket']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileTicket')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
        
        
        $data = array(
                'hotel_dynamic_id' => $this->input->post('trv_mst_id'),
                'bill_no' => $this->input->post('txtHotelBillNo'),
                'from_date' => $this->input->post('fromDateAddHotel'),
                'to_date' => $this->input->post('toDateAddHotel'),
                'expenses' => $this->input->post('txtExpense'),
                'total_amount' => $this->input->post('txtAmount'),
                'invoice' => $picture,
                'justification' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCode'),
            );
        $this->TravelModel->addHotelsDetails($data);
      echo '<script>window.history.back();</script>';
        
    }
    
    
    function fetchHotelDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchHotelDetails($emp_code);
        return $data['conveyanceList'];
    }
    
    
    public function editHotelData() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $hotelDetailEditId = $this->input->post('hotelDetailEditId');
        

       
            $data = array(
                'bill_no' => $this->input->post('editTxtHotelBillNo'),
                'from_date' => $this->input->post('editFromDateAddHotel'),
                'to_date' => $this->input->post('editToDateAddHotel'),
                'expenses' => $this->input->post('editTxtExpense'),
                'total_amount' => $this->input->post('editTxtAmount'),
                'justification' => $this->input->post('editAreaReason'),
                'reg_date' => $date,
                'reg_time' => $time
            );
        
        $this->TravelModel->editHotelData($data, $hotelDetailEditId);

      echo '<script>window.history.back();</script>';
    }

    
     public function addIntraTrvlDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'trvl_loc_dynamic_id' => $this->input->post('txtEmpCodeEdit'),
                'trvl_mode' => $this->input->post('comboTravMode'),
                'trvl_date' => $this->input->post('txtTrvelDate'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_amt' => $this->input->post('txtAmount'),
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit'),
            );
        $this->TravelModel->addIntraTrvlDetails($data);
       echo '<script>window.history.back();</script>';
        
    }
    
    
    public function addIntraTrvlDraftDetails(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'trvl_loc_dynamic_id' => $this->input->post('trv_mst_id'),
                'trvl_mode' => $this->input->post('comboTravMode'),
                'trvl_date' => $this->input->post('txtTrvelDate'),
                'place_from' => $this->input->post('txtPlaceFrom'),
                'place_to' => $this->input->post('txtPlaceTo'),
                'trvl_amt' => $this->input->post('txtAmount'),
                'trvl_reason' => $this->input->post('areaReason'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit'),
            );
        $this->TravelModel->addIntraTrvlDetails($data);
       echo '<script>window.history.back();</script>';
        
    }
    
    function fetchIntraCityTrvDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchIntraCityTrvDetails($emp_code);
        return $data['conveyanceList'];
    }
    
      public function createTravelClaim() {//Local Reimbursememnt claim details adding here....
         $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
         
        $data = array(
            'emp_code' => $this->input->post('txtEmpCode'),
            'plant_code' => $this->input->post('txtPlantIdDynamic'),
            'total_amt' => $this->input->post('txtTotalAmt'),
            'from_date' => $this->input->post('dateFrom'),
            'to_date' => $this->input->post('dateTo'),
            'days' => $this->input->post('txtTotalDay'),
            'justification' => $this->input->post('areaJustif'),
            'reg_date' => $date,
            'reg_time' => $time,
        );
        $this->TravelModel->createTravelClaim($data);
 
     
     
 
        $empCode = $this->input->post('txtEmpCode');

        $row = $this->db->query('SELECT MAX(trv_mst_id) AS trv_mst_id FROM trvel_mst WHERE emp_code=' . $empCode)->row();
       
            $trv_mst_id = $row->trv_mst_id;
            echo 'printing $trv_mst_id 1...................'.$trv_mst_id;
             
            
                echo 'printing $trv_mst_id 2...................'.$trv_mst_id;
            
               $data8 = array(
                'dynamic_id' => $trv_mst_id
            );
            $this->db->where('dynamic_id', $empCode);
            $this->db->update('trvel_details', $data8); 
                
                
                
                $data2 = array(
                'trvl_loc_dynamic_id' => $trv_mst_id
            );
            $this->db->where('trvl_loc_dynamic_id', $empCode);
            $this->db->update('trvl_locl_details', $data2);
            
                echo 'printing $trv_mst_id 3...................'.$trv_mst_id;
            $data3 = array(
                'hotel_dynamic_id' => $trv_mst_id
            );
            $this->db->where('hotel_dynamic_id', $empCode);
            $this->db->update('hotel_details', $data3);
            
                echo 'printing $trv_mst_id 4...................'.$trv_mst_id;
            $data4 = array(
                'per_dynamic_id' => $trv_mst_id
            );
            $this->db->where('per_dynamic_id', $empCode);
            $this->db->update('person_details', $data4);
            
                     
           // echo 'printing claim number here......' . $lrcm_id;
      


       redirect('ELAR/Travel/Travel_cntr/travel_claim_draft_tbl');
    }
    
     function fetchTrvlReimDraftDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->TravelModel->fetchTrvlReimDraftDetails($emp_code);
        return $data['claimList'];
    }
    
    public function viewDraftTravelClaim($trv_mst_id) {//
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/draftTravelClaim', $data);
    }
    
       public function viewPendingDraftClaim($trv_mst_id) {//
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimViewPending', $data);
    }
    
    public function travel_claim_approved_view($trv_mst_id) {
      
          $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimViewApproved',$data);
    }
    
    public function travel_claim_reject_view($trv_mst_id) {//
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelClaimViewRejected', $data);
    }
    
     function travelClaimDetails($trv_mst_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->TravelModel->travelClaimDetails($trv_mst_id);
        return $data['LocalClaimDetail'];
    }
    
    
    
     
      public function addPersonsInMeal(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $data = array(
                'trv_mst_id' => $this->input->post('trv_mst_id'),
                'person_id' => $this->input->post('comboPersonsMeal'),
                'applicable_rate' => $this->input->post('txtMealRates'),
                'total_amt' => $this->input->post('txtTotalRate'),
                'days' => $this->input->post('totalDays'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit'),
            );
        $this->TravelModel->addPersonsInMeal($data);
       echo '<script>window.history.back();</script>';
        
    }
    
    
     function travelClaimDetailsStatusLog($trv_mst_id) {
        $this->load->database();
        $data['LocalClaimHodApproved'] = $this->TravelModel->travelClaimDetailsStatusLog($trv_mst_id);
        return $data['LocalClaimHodApproved'];
    }
    
    function travelClaimDetailsApproval($trv_mst_id) {
        $this->load->database();
        $data['LocalClaimDetail'] = $this->TravelModel->travelClaimDetailsApproval($trv_mst_id);
        return $data['LocalClaimDetail'];
    }
    
    
     function getClaimerDetails($trv_mst_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['claimer'] = $this->TravelModel->getClaimerDetails($trv_mst_id);
        return $data;
    }
    function getSanctionAuthoDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('universal/CommnModel');
        $data['autho_code'] = $this->CommnModel->getSanctionAuthoDetails();
        return $data;
    }
    
     function travelClaimDetailsHodActionData($emp_code,$trv_mst_id) {
        $this->load->database();
        $data['hodActionData'] = $this->TravelModel->travelClaimDetailsHodActionData($emp_code,$trv_mst_id);
        return $data['hodActionData'];
    }
    
    public function updateClaimAction() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $editId = $this->input->post('trv_mst_id');
       $action = $this->input->post('localClaimState');
        
         $trvl_status_id = $this->input->post('trvl_status_id');
        if ($action == "1") {

            $data = array(
                'action' => 1,
                'actual_action' => 1,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'trv_mst_id' => $this->input->post('trv_mst_id'),
                'emp_code' => $this->input->post('claimer_id'),
                'rep_autho' => $this->input->post('auto_code'),
                'level_of' => 2,
                'action' => 0,
                'actual_action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->TravelModel->updateClaimAction($data, $editId, $trvl_status_id);
            $this->TravelModel->travelReimClaimProcessRepAutho($data2);
            
            
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
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
                'action' => 2,
                'actual_action' => 2,
                'comment' => $this->input->post('comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'trv_mst_status' => 2
            );
            $this->db->where('trv_mst_id', $editId);
            $this->db->update('trvel_mst', $data1);
            $this->TravelModel->updateClaimAction($data, $editId, $trvl_status_id);
            
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$editId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$editId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
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
        redirect('ELAR/Travel/Travel_cntr/approval_travel_claim_pending_tbl');
    }
    
     function fetchBlanceTravelAmount($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
         $data['closing_amt'] = $this->TravelModel->fetchBlanceTravelAmount($trv_mst_id);
        return $data;
    }
    function fetchLinkedIOUCount($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
         $data['df'] = $this->TravelModel->fetchLinkedIOUCount($trv_mst_id);
        return $data;
    }
     function fetchBalanceIOUAmount($emp_id) {//Full Department name from dept_master
        $this->load->database();
         $data['closing_amt'] = $this->TravelModel->fetchBalanceIOUAmount($emp_id);
        return $data;
    }
       function fetchActualTravelAmount($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
         $data['total_amt'] = $this->TravelModel->fetchActualTravelAmount($trv_mst_id);
        return $data;
    }
       function fetchLinkedIOUTotlAmount($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
         $data['iouSum'] = $this->TravelModel->fetchLinkedIOUTotlAmount($trv_mst_id);
        return $data;
    }
    
        function fetchClaimBase($trv_mst_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['countData'] = $this->TravelModel->fetchClaimBase($trv_mst_id);
        return $data;
    }
   
    
    
    function fetchBlanceTravelOutStandingID($trv_mst_id) {
        $this->load->database();
         $data['tt_id'] = $this->TravelModel->fetchBlanceTravelOutStandingID($trv_mst_id);
        return $data;
    }
  
    function fetchBlanceTravelOutStandingIDForCompany($trv_mst_id) {
        $this->load->database();
         $data['tt_id'] = $this->TravelModel->fetchBlanceTravelOutStandingIDForCompany($trv_mst_id);
        return $data;
    }
    
    function fetchBalanceIOUOutStandingID($emp_id) {
        $this->load->database();
         $data['iou_tr_id'] = $this->TravelModel->fetchBalanceIOUOutStandingID($emp_id);
        return $data;
    }
    
    function fetchBalanceIOUOutStandingIDForCompany($emp_id) {
        $this->load->database();
         $data['iou_tr_id'] = $this->TravelModel->fetchBalanceIOUOutStandingIDForCompany($emp_id);
        return $data;
    }
    
    public function userActionOnRejectedClaim() {
        $ClaimState = $this->input->post('claim_state');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $UpdateId = $this->input->post('trv_mst_id');
        echo 'printing here.....' . $ClaimState;
        if ($ClaimState == "draft") {
            $data = array(
              
                'reg_date' => $date,
                'reg_time' => $time,
                'trv_mst_status'=>0,
            );
            $this->db->where('trv_mst_id', $UpdateId);
            $this->db->update('trvel_mst', $data);
             redirect('ELAR/Travel/Travel_cntr/travel_claim_draft_tbl');
        }
            else{
            echo $ClaimState;
                $message = "Ok! You have selected no action on claim";
            echo "<script type='text/javascript'>alert('$message');</script>";
             redirect('ELAR/Travel/Travel_cntr/travel_claim_draft_tbl');
            
            }
            
           
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

    function getEmployeeDetails() {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['employee'] = $this->TravelModel->getEmployeeDetails();
        return $data['employee'];
    }
    
    function personList($id){
        echo "<script type='text/javascript'>alert();</script>";
        
		$data=$this->TravelModel->personList($id);
		echo json_encode($data);
	}
        
        
        function fetchTrvlReimDetailsByClaimId($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchTrvlReimDetailsByClaimId($trv_mst_id);
        return $data['conveyanceList'];
    }
    
       function fetchHotelReimDetailsByClaimId($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchHotelReimDetailsByClaimId($trv_mst_id);
        return $data['conveyanceList'];
    }
    function fetchLocalTrvlReimDetailsByClaimId($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchLocalTrvlReimDetailsByClaimId($trv_mst_id);
        return $data['conveyanceList'];
    }
    
     function personsMealRateFetch($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->personsMealRateFetch($trv_mst_id);
        return $data['conveyanceList'];
    }
    
           function fetchTrvelReimApprovalHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->TravelModel->fetchTrvelReimApprovalHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
        function fetchTravelReimApprovalDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchTravelReimApprovalDetails($emp_code);
        return $data['claimListApproval'];
    }
    
    function fetchTravelReimRejectHODClaim($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimApprovHodList'] = $this->TravelModel->fetchTravelReimRejectHODClaim($emp_code);
        return $data['claimApprovHodList'];
    }
    
    
    function fetchTravelReimSancAuthoDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchTravelReimSancAuthoDetails($emp_code);
        return $data['claimListApproval'];
    }
    
     function fetchTravelReimSancAuthoRejectDetails($emp_code) {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchTravelReimSancAuthoRejectDetails($emp_code);
        return $data['claimListApproval'];
    }
     function fetchTravelReimApprovedDetailsTbl($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['approvedClaimList'] = $this->TravelModel->fetchTravelReimApprovedDetailsTbl($emp_code);
        return $data['approvedClaimList'];
    }
      function fetchWithoutIOUTravelReimApprovedDetailsTbl($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['approvedClaimList'] = $this->TravelModel->fetchWithoutIOUTravelReimApprovedDetailsTbl($emp_code);
        return $data['approvedClaimList'];
    }
    
    function fetchTravelReimPendingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->TravelModel->fetchTravelReimPendingDetails($emp_code);
        return $data['claimList'];
    }
     function fetchTravelReimRejectDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimList'] = $this->TravelModel->fetchTravelReimRejectDetails($emp_code);
        return $data['claimList'];
    }
    
     function fetchMealTrvlDetailsByClaimId($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchMealTrvlDetailsByClaimId($trv_mst_id);
        return $data['conveyanceList'];
    }
    
    
    function fetchTrvlDetailForDraft($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchTrvlDetailForDraft($trv_mst_id);
        return $data['conveyanceList'];
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
        $date = date('Y-m-d');
        $time = date("h:i A");
        $UpdateId = $this->input->post('trv_mst_id');
       
                
      
        if ($ClaimState == "draft") {
            
            $data = array(
                'total_amt' => $this->input->post('txtTotalAmt'),
                'plant_code' => $this->input->post('txtPlantIdDynamic'),
                'from_date' => $this->input->post('dateFrom'),
                'to_date' => $this->input->post('dateTo'),
                'days' => $this->input->post('txtTotalDay'),
                'reg_date' => $date,
                'reg_time' => $time, 
                'justification' => $this->input->post('areaJustif')
            );
        } else {
            $data = array(
                'total_amt' => $this->input->post('txtTotalAmt'),
                'plant_code' => $this->input->post('txtPlantIdDynamic'),
                'from_date' => $this->input->post('dateFrom'),
                'to_date' => $this->input->post('dateTo'),
                'days' => $this->input->post('txtTotalDay'),
                'reg_date' => $date,
                'reg_time' => $time, 
                'trv_mst_status' => 1,
                'justification' => $this->input->post('areaJustif')
            );

            $dataProcess = array(
                'trv_mst_id' => $UpdateId,
                'emp_code' => $this->input->post('txtEmpCode'),
                'rep_autho' => $this->input->post('txtRepAutho'),
                'level_of' => 1,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->TravelModel->travelReimClaimProcess($dataProcess);
            
                     
            // Email Code Start From Here...........................
        $reciver= $this->input->post('txtHodEmail');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='New Travel Reimbursement Claim Created By '.$this->input->post('txtEmpName').' Voucher No '.$UpdateId.' ';
        $message='<ol>
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
        <li><b>Department:</b>  '.$this->input->post('txtDeptName'). '</li>
	<li><b>Voucher No:</b>  '.$UpdateId.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtEmpName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
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

        $this->TravelModel->addTravelReimClaimDraft($data, $UpdateId);
       redirect('ELAR/Travel/Travel_cntr/travel_claim_draft_tbl');         
    }
    
       public function linkIouWithTravel(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $editId =$this->input->post('comboLinkTrvlIou');
        $data = array(
                'trv_mst_id' => $this->input->post('trv_mst_id'),
                'lou_clm_id' => $this->input->post('comboLinkTrvlIou'),
                'emp_code' => $this->input->post('txtEmpCodeEdit'),
                'reg_date' => $date,
                'reg_time' => $time,
                'reg_by' => $this->input->post('txtEmpCodeEdit'),
            );
        
         $data1 = array(
                'iou_status' => 4
            );
         $this->db->where('lou_clm_id', $editId);
            $this->db->update('iou_claim_mst', $data1);
            
        $this->TravelModel->linkIouWithTravel($data);
       echo '<script>window.history.back();</script>';
        
    }
    
     function fetchLinkedIouWithTravel($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchLinkedIouWithTravel($trv_mst_id);
        return $data['conveyanceList'];
    }
    function fetchTakenActionClaim($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchTakenActionClaim($trv_mst_id);
        return $data['conveyanceList'];
    }
    function fetchClaimerOutStandingAmtList() {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchClaimerOutStandingAmtList();
        return $data['claimListApproval'];
    }
    
    function fetchCompanyOutStandingAmtList() {

        $this->load->helper('url');
        $this->load->database();
        $data['claimListApproval'] = $this->TravelModel->fetchCompanyOutStandingAmtList();
        return $data['claimListApproval'];
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
    function fetchVoucherDate($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
        $data['reg_date'] = $this->TravelModel->fetchVoucherDate($trv_mst_id);
        return $data;
    }
       function fetchUserMailDetails($trv_mst_id) {
        $this->load->database();
        $data['emp_email'] = $this->TravelModel->fetchUserMailDetails($trv_mst_id);
        return $data;
    }
       function fetchEmpNameForMail($trv_mst_id) {//Full Department name from dept_master
        $this->load->database();
        $data['emp_name'] = $this->TravelModel->fetchEmpNameForMail($trv_mst_id);
        return $data;
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
    
     public function editHotelDetailsAjax($id) {
        $data = $this->TravelModel->editHotelDetailsAjax($id);
        echo json_encode($data);
    }
    
      public function deleteHotelDetails($hotdet_id) {
            $this->db->where('hotdet_id',$hotdet_id);
            $this->db->delete('hotel_details');
            $this->load->helper('url');
          echo '<script>window.history.back();</script>';
       }
       
       public function deleteTravelDetails($trvd_id) {
            $this->db->where('trvd_id',$trvd_id);
            $this->db->delete('trvel_details');
            $this->load->helper('url');
            
            $this->db->where('trvd_id',$trvd_id);
            $this->db->delete('person_details');
            $this->load->helper('url');
          echo '<script>window.history.back();</script>';
       }
       
       public function editIntraCityDetailsAjax($id) {
        $data = $this->TravelModel->editIntraCityDetailsAjax($id);
        echo json_encode($data);
    }
    
    
    
        public function editIntraTrvlDetails() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $intraCityEditId = $this->input->post('intraCityEditId');
        

       
            $data = array(
                'trvl_date' => $this->input->post('editTrvelDate'),
                'place_from' => $this->input->post('editPlaceFrom'),
                'place_to' => $this->input->post('editPlaceTo'),
                'trvl_amt' => $this->input->post('editAmount'),
                'trvl_reason' => $this->input->post('editAreaReason'),
                'reg_date' => $date,
                'reg_time' => $time
            );
        
        $this->TravelModel->editIntraTrvlDetails($data, $intraCityEditId);

       echo '<script>window.history.back();</script>';
    }
    
     public function deleteIntraCityTrvlDetails($trvl_locl_id) {
            $this->db->where('trvl_locl_id',$trvl_locl_id);
            $this->db->delete('trvl_locl_details');
            $this->load->helper('url');
          echo '<script>window.history.back();</script>';
       }
       function getTravllerListByClaimId($trv_mst_id) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['employee'] = $this->TravelModel->getTravllerListByClaimId($trv_mst_id);
        return $data['employee'];
    }
       public function getPersonDeatils($id) {
        $data = $this->TravelModel->getPersonDeatils($id);
        echo json_encode($data);
    }
    
    public function deleteMealPersonDetails($meal_det_id) {
            $this->db->where('meal_det_id',$meal_det_id);
            $this->db->delete('meal_details');
            $this->load->helper('url');
          echo '<script>window.history.back();</script>';
       }
       
     function getIouApprovedClaimList($emp_code) {//Full Department name from dept_master
        $this->load->helper('url');
        $this->load->database();
        $data['employee'] = $this->TravelModel->getIouApprovedClaimList($emp_code);
        return $data['employee'];
    }    
    public function deleteLinkedClaimIouTravel($lou_clm_id) {
        
        
            $this->db->where('lou_clm_id',$lou_clm_id);
            $this->db->delete('trvl_iou_link');
            
            
            $data1 = array(
                'iou_status' => 3
            );
         $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('iou_claim_mst', $data1);
            
            $this->load->helper('url');
          echo '<script>window.history.back();</script>';
       }
       
       
       public function transactionOnClaim(){
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        //-------------------------------------------
        $trvl_iou_link_id =$this->input->post('trvl_iou_link_id');
        echo 'linked id .........'.$trvl_iou_link_id;
        $lou_clm_id =$this->input->post('lou_clm_id');
        $trv_mst_id =$this->input->post('trv_mst_id');
        $closingAmt =$this->input->post('closingAmt');
        
        
        $iou_amt =$this->input->post('iou_amt');
        $actualTvlAmt =$this->input->post('actualTvlAmt');
        $claimerID =$this->input->post('claimerID');
        $iouTotalAmt =$this->input->post('iouTotalAmt');
        $trvlAmountTrans =$this->input->post('trvlAmountTrans');
        $totalIOUClaimAmt=$this->input->post('totalIOUClaimAmt');
        $iouClaimCount=$this->input->post('iouClaimCount');
        //-------------------------------------------------------
        
       
        //this condtiion to check balance and outstanding travel balance
        if($trvlAmountTrans=="NULL"){ // null first
            if($iouClaimCount=="1"){
                
              $iouClosingAmt = $iou_amt-$actualTvlAmt; 
               echo '<br>$actualTvlAmt=$iou_amt-$iou_amt'.$iouClosingAmt;
            }
                else {
             $iouClosingAmt = $iouTotalAmt-$iou_amt;
             }
        }
            else {
                $iouClosingAmt = $iouTotalAmt-$trvlAmountTrans;
                
            }
            
        //end check balance condition.......
            
      //  echo '<br><br><br>actual total amount>>>>>>>>>>>>>'.$actualTvlAmt;
        // echo '<br><br><br>IOU total amount>>>>>>>>>>>>>>'.$totalIOUClaimAmt;
            
            
            
            
            
        $trvlClosingAmt =$closingAmt-$iou_amt;
        //echo 'procced  amount.............'.$proccedAmount;
        echo 'closingAmt  amount.............'.$closingAmt;
        echo 'iou_amt  amount.............'.$iou_amt;
        echo '$iouClosingAmt  amount.............'.$iouClosingAmt;
        
        
        //--------------------------------------------------------case1
       if($totalIOUClaimAmt > $actualTvlAmt){
           
           echo "in first condition ioutotalamt > actualtvlamt";
           
            if($closingAmt == $iou_amt ){
            $statusForTrvl="1";// status 1 is for iou is cleared
             $linkingStatus="3";// it means claim cleard
            echo 'condtion 1';
        }
        elseif ($closingAmt > $iou_amt) {
             $statusForTrvl="1";// status 1 is for iou is cleared
              $linkingStatus="3";// it means claim cleard
             echo '<br>CLOSING AMOUNT------------->'.$closingAmt;
              echo '<br>CLOSING AMOUNT------------->'.$closingAmt;
              echo '<br>condtion 2';
        }elseif ($closingAmt < $iou_amt) {
            $statusForTrvl="2"; // status 2 for outstanding at user
            $linkingStatus="1";// it means claim claim in balance
             echo '<br>condtion 3';
        }
           
        
         //travel transaction start form here......
        $data = array(
                'trvl_iou_link_id' => $trvl_iou_link_id,
                'lou_clm_id' => $lou_clm_id,
                'trv_mst_id' => $trv_mst_id,
                'claim_amt' => $actualTvlAmt,
                'deduct_amt' => $iou_amt,
                'closing_amt' => $trvlClosingAmt,
                'tt_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnClaim($data);
        
         //travel transaction end form here......
        
        $linkStatusData = array(
                'til_status' => $linkingStatus
            );
            $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('trvl_iou_link', $linkStatusData);
        
        
        
        
        
        $dataForIOU = array( // iou transaction......
                'emp_code' => $claimerID,
                'iou_id' => $lou_clm_id,
                'debit' => $iou_amt,
                'credit' => 0,
                'closing_amt' => $iouClosingAmt,
                'trn_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnIOUClaim($dataForIOU);
        
        
        
    
       }
       
      //----------------------------------------------- case 2
       elseif($totalIOUClaimAmt < $actualTvlAmt){
          echo"in second condition totalIOUClaimAmt < actualTvlAmt........";
          
          if($closingAmt == $iou_amt ){
            $statusForTrvl="1";// status 1 is for iou is cleared
             $linkingStatus="3";// clear linking 
            echo '$closingAmt!!!!!!!!!!!!!!!!!!!- '.$closingAmt;
            echo '$closingAmt!!!!!!!!!!!!!!!!!!!- '.$iou_amt;
            echo '$$$$$$$$$$$$$$$$$$$$$$$$$$ sub condtion 1';
        }elseif ($iouClosingAmt<0) {
                 $statusForTrvl="3";
                 echo 'in minus case.....';
                 
                  $linkingStatus="3";// clear linking 
            }
        elseif ( $closingAmt > $iou_amt) {
            echo 'kaustubhhhhhhhhhhhhhhhh';
           $statusForTrvl="1";
             $linkingStatus="3";// clear linking 
                
            }
            elseif ( $iou_amt <  $closingAmt) {
                echo 'saurabhhhhhhhhhhhhhhhh';
           $statusForTrvl="3";
                  $linkingStatus="3";// clear linking 
            }
           
                 
         $linkStatusData = array(
                'til_status' => $linkingStatus
            );
            $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('trvl_iou_link', $linkStatusData);
        
        
               
                 
        
           
        
         //travel transaction start form here......
        $data = array(
                'trvl_iou_link_id' => $trvl_iou_link_id,
                'lou_clm_id' => $lou_clm_id,
                'trv_mst_id' => $trv_mst_id,
                'claim_amt' => $actualTvlAmt,
                'deduct_amt' => $iou_amt,
                'closing_amt' => $trvlClosingAmt,
                'tt_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnClaim($data);
        
         //travel transaction end form here......
        
        
        
        
        $dataForIOU = array( // iou transaction......
                'emp_code' => $claimerID,
                'iou_id' => $lou_clm_id,
                'debit' => $iou_amt,
                'credit' => 0,
                'closing_amt' => $iouClosingAmt,
                'trn_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnIOUClaim($dataForIOU);
        
        
          
       }
        //-----------------------------------------3 case
       
       elseif($totalIOUClaimAmt == $actualTvlAmt){
          echo"in second condition totalIOUClaimAmt < actualTvlAmt........";
          
          if($closingAmt == $iou_amt ){
            $statusForTrvl="1";// status 1 is for iou is cleared
            echo '$closingAmt!!!!!!!!!!!!!!!!!!!- '.$closingAmt;
            echo '$closingAmt!!!!!!!!!!!!!!!!!!!- '.$iou_amt;
            echo '$$$$$$$$$$$$$$$$$$$$$$$$$$ sub condtion 1';
            $linkingStatus="3";// clear linking 
        }elseif ($iouClosingAmt<0) {
                 $statusForTrvl="3";
                 echo 'in minus case.....';
                 $linkingStatus="3";// clear linking 
            }
        elseif ( $closingAmt > $iou_amt) {
            echo 'kaustubhhhhhhhhhhhhhhhh';
           $statusForTrvl="1";
           $linkingStatus="3";// clear linking 
                
            }
            elseif ( $iou_amt <  $closingAmt) {
                echo 'saurabhhhhhhhhhhhhhhhh';
           $statusForTrvl="3";
           $linkingStatus="3";// clear linking 
                
            }
           
                 
               
                 
        
           
        
         //travel transaction start form here......
        $data = array(
                'trvl_iou_link_id' => $trvl_iou_link_id,
                'lou_clm_id' => $lou_clm_id,
                'trv_mst_id' => $trv_mst_id,
                'claim_amt' => $actualTvlAmt,
                'deduct_amt' => $iou_amt,
                'closing_amt' => $trvlClosingAmt,
                'tt_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnClaim($data);
        
         //travel transaction end form here......
        
        
         $linkStatusData = array(
                'til_status' => $linkingStatus
            );
            $this->db->where('lou_clm_id', $lou_clm_id);
            $this->db->update('trvl_iou_link', $linkStatusData);
        
        
               
        
        
        
        $dataForIOU = array( // iou transaction......
                'emp_code' => $claimerID,
                'iou_id' => $lou_clm_id,
                'debit' => $iou_amt,
                'credit' => 0,
                'closing_amt' => $iouClosingAmt,
                'trn_status' =>$statusForTrvl,
                'trn_date' => $date,
                'trn_time' => $time,
                'trn_by' => $this->input->post('sanctionAuthoId'));
        
         
        $this->TravelModel->transactionOnIOUClaim($dataForIOU);
        
        
          
       }
        
        
        
        
        
      echo '<script>window.history.back();</script>';
        
    }
     function travelLastApprovalDetils($emp_code,$trv_mst_id) {
        $this->load->database();
        
        $data['TravelClaimLastApprovalDetail'] = $this->TravelModel->travelLastApprovalDetils($emp_code,$trv_mst_id);
        return $data['TravelClaimLastApprovalDetail'];
    }
    
     public function finalActionOnTrvlClaim() {
        $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $trv_mst_id = $this->input->post('trv_mst_id');
        $ClaimState = $this->input->post('claim_state');
        $txtEmpCode = $this->input->post('txtEmpCode');
   
        
        
        $final_trvl_status_id = $this->input->post('final_trvl_status_id');
        $final_rep_autho = $this->input->post('final_rep_autho');
        $final_trv_mst_id = $this->input->post('final_trv_mst_id');
        $final_level_of = $this->input->post('final_level_of');
                
      
        if ($ClaimState == "5") {//Outstanding at company
            
            $trvlClaimMstStatus = array(
                'trv_mst_status' => $ClaimState
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            
           
            $dataInStatus = array(
                     'rep_autho' => $txtEmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('areaJustif'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
            
             $this->TravelModel->sanctionAuthorityAction($dataInStatus, $final_trv_mst_id, $final_trvl_status_id);
             // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$trv_mst_id.' ';
        $message='<ol>
        <li><b>Claim Based:</b>IOU Based (This claim is outstanding at company side) </li>   
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$trv_mst_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
        <li><b>Comment :</b>  '.$this->input->post('areaJustif').'</li>
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
        elseif ($ClaimState == "4") {//Claim Cleared
            
                  $trvlClaimMstStatus = array(
                'trv_mst_status' => $ClaimState
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            
           
            $dataInStatus = array(
                     'rep_autho' => $txtEmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('areaJustif'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
            
             $this->TravelModel->sanctionAuthorityAction($dataInStatus, $final_trv_mst_id, $final_trvl_status_id);
            
             
              // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$trv_mst_id.' ';
        $message='<ol>
        <li><b>Claim Based:</b>IOU Based (This claim is cleared) </li>   
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$trv_mst_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
        <li><b>Comment :</b>  '.$this->input->post('areaJustif').'</li>
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
        elseif ($ClaimState == "7") {//Non IOU Claim
            
            $trvlClaimMstStatus = array(
                'trv_mst_status' => $ClaimState
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            
            $dataInStatus = array(
                     'rep_autho' => $txtEmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('areaJustif'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
            
            
            
                        // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$trv_mst_id.' ';
        $message='<ol>
        <li><b>Claim Based:</b> NON IOU </li>   
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$trv_mst_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
        <li><b>Comment :</b>  '.$this->input->post('areaJustif').'</li>
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
            
         $this->TravelModel->sanctionAuthorityAction($dataInStatus, $final_trv_mst_id, $final_trvl_status_id);
            
        }
        elseif ($ClaimState == "2") {//reject claim
            
                  $trvlClaimMstStatus = array(
                'trv_mst_status' => $ClaimState
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            
           
            $dataInStatus = array(
                     'rep_autho' => $txtEmpCode,
                     'action' => 2,
                     'actual_action' => 2,
                     'comment' => $this->input->post('areaJustif'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
            
             $this->TravelModel->sanctionAuthorityAction($dataInStatus, $final_trv_mst_id, $final_trvl_status_id);
            
            
                        // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Rejected By '.$this->input->post('txtEmpName').' Voucher No '.$trv_mst_id.' ';
        $message='<ol>
        <li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$trv_mst_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
        <li><b>Comment :</b>  '.$this->input->post('areaJustif').'</li>
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
        
        elseif ($ClaimState == "6") {//Outstanding at user
            
            $trvlClaimMstStatus = array(
                'trv_mst_status' => $ClaimState
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            
            
           
            $dataInStatus = array(
                     'rep_autho' => $txtEmpCode,
                     'action' => 1,
                     'actual_action' => 1,
                     'comment' => $this->input->post('areaJustif'),
                     'action_date' => $date,
                     'action_time' => $time
                 );
            
             $this->TravelModel->sanctionAuthorityAction($dataInStatus, $final_trv_mst_id, $final_trvl_status_id);
            
         
             
                        // Email Code Start From Here...........................
        $reciver= $this->input->post('txtEmp_email');
        $ccuser=$this->input->post('txtSancAuthoEmail');
        $subject='Travel Reimbursement Claim Accepted By '.$this->input->post('txtEmpName').' Voucher No '.$trv_mst_id.' ';
        $message='<ol>
        <li><b>Claim Based:</b>IOU Based (This claim is outstanding at claimer side) </li>   
	<li><b>Plant:</b>  '.$this->input->post('txtPlantCode'). '</li>
	<li><b>Voucher No:</b>  '.$trv_mst_id.'</li>
	<li><b>Claim Date:</b>  '.$this->input->post('txtClaimDate'). '</li>
	<li><b>Claim Owner:</b>  '.$this->input->post('txtClaimerName'). '</li>
	<li><b>Claim Amount:</b>  '.$this->input->post('txtClaimAmountTotal').'</li>
        <li><b>Comment :</b>  '.$this->input->post('areaJustif').'</li>
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
        
            
            

       // $this->TravelModel->addTravelReimClaimDraft($data, $UpdateId);
       redirect('ELAR/Travel/Travel_cntr/sancAutho_travel_claim_pending_tbl');         
    }
    
    
     public function claimerOutstandingAmtClearAction() {
        $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $tt_id = $this->input->post('tt_id');
        $iou_tr_id = $this->input->post('iou_tr_id');
        $iouClosingBal = $this->input->post('iouClosingBal');
        $txtEmpCode = $this->input->post('txtEmpCode');
        $trv_mst_id = $this->input->post('trv_mst_id');
        $Justification = $this->input->post('areaJustif');
   
        
        //this following code to maintain history of clear transaction in claimer outstanding table
        
        $dataOfClaimerHistory = array(
                     'trv_mst_id' => $trv_mst_id,
                     'tt_id' => $tt_id,
                     'iou_tr_id' => $iou_tr_id,
                     'clearing_amt' => $iouClosingBal,
                     'reg_date' => $date,
                     'reg_time' => $time,
                     'justification' =>$Justification,
                     'reg_by' =>$txtEmpCode
                 );
            
             $this->TravelModel->claimerOutstandingAmtClearAction($dataOfClaimerHistory);
            
             // code to clear travel master status
             $trvlClaimMstStatus = array(
                'trv_mst_status' => 4
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            // code to clear travel transaction status
             $trvlClaimTrnStatus = array(
                'closing_amt' =>0,
                 'tt_status' => 1,
                 
            );
            $this->db->where('tt_id', $tt_id);
            $this->db->update('trvl_transaction', $trvlClaimTrnStatus);
    
         // code to clear iou transaction status
             $iouClaimTrnStatus = array(
                'closing_amt' =>0,
                 'trn_status' => 1,
                 
            );
            $this->db->where('iou_tr_id', $iou_tr_id);
            $this->db->update('iou_transaction', $iouClaimTrnStatus);
    
          
        
           
            
            
            

       // $this->TravelModel->addTravelReimClaimDraft($data, $UpdateId);
       redirect('ELAR/Travel/Travel_cntr/sancAutho_travel_Claimer_OutStanding_claim_tbl');         
    }
    
    
    
    public function companyOutstandingAmtClearAction() {
        $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $time = date("h:i A");
        $tt_id = $this->input->post('tt_id');
        $iou_tr_id = $this->input->post('iou_tr_id');
        $iouClosingBal = $this->input->post('iouClosingBal');
        $txtEmpCode = $this->input->post('txtEmpCode');
        $trv_mst_id = $this->input->post('trv_mst_id');
        $Justification = $this->input->post('areaJustif');
   
        
        //this following code to maintain history of clear transaction in company outstanding table
        
        $dataOfCompanyHistory = array(
                     'trv_mst_id' => $trv_mst_id,
                     'tt_id' => $tt_id,
                     'iou_tr_id' => $iou_tr_id,
                     'clearing_amt' => $iouClosingBal,
                     'reg_date' => $date,
                     'reg_time' => $time,
                     'justification' =>$Justification,
                     'reg_by' =>$txtEmpCode
                 );
            
             $this->TravelModel->companyOutstandingAmtClearAction($dataOfCompanyHistory);
            
             // code to clear travel master status
             $trvlClaimMstStatus = array(
                'trv_mst_status' => 4
            );
            $this->db->where('trv_mst_id', $trv_mst_id);
            $this->db->update('trvel_mst', $trvlClaimMstStatus);
            
            // code to clear travel transaction status
             $trvlClaimTrnStatus = array(
                'closing_amt' =>0,
                 'tt_status' => 1,
                 
            );
            $this->db->where('tt_id', $tt_id);
            $this->db->update('trvl_transaction', $trvlClaimTrnStatus);
    
         // code to clear iou transaction status
             $iouClaimTrnStatus = array(
                'closing_amt' =>0,
                 'trn_status' => 1,
                 
            );
            $this->db->where('iou_tr_id', $iou_tr_id);
            $this->db->update('iou_transaction', $iouClaimTrnStatus);
    
          
        
           
            
            
            

       // $this->TravelModel->addTravelReimClaimDraft($data, $UpdateId);
       redirect('ELAR/Travel/Travel_cntr/sancAutho_travel_Claimer_OutStanding_claim_tbl');         
    }
    
     //Printing report trvel reports
    //Additional development 2019-10-22
    public function printingTravelReport($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelPrintReport',$data);
    }
    
      function fetchTrvlReimDetailsByClaimIdTeamMemeber($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['teamList'] = $this->TravelModel->fetchTrvlReimDetailsByClaimIdTeamMemeber($trv_mst_id);
        return $data['teamList'];
    }
    
     function TravelClaimDetailsHodActionStatus($trv_mst_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimHodActtionStatus'] = $this->TravelModel->TravelClaimDetailsHodActionStatus($trv_mst_id,$emp_code);
        return $data['LocalClaimHodActtionStatus'];
    }
    
             function TravelDetailsSanAuthoActionStatus($trv_mst_id,$emp_code) {
        $this->load->database();
        $data['LocalClaimSanAuthoActtionStatus'] = $this->TravelModel->TravelDetailsSanAuthoActionStatus($trv_mst_id,$emp_code);
        return $data['LocalClaimSanAuthoActtionStatus'];
    }
    
     public function printingTravelReportApproved($trv_mst_id) {
        $data['trv_mst_id'] = $trv_mst_id;
        $this->load->helper('url');
        $this->load->view('ELAR/Travel/travelPrintReportApproved',$data);
    }
    
     function fetchLinkedIouWithTravelAfterApproved($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['conveyanceList'] = $this->TravelModel->fetchLinkedIouWithTravelAfterApproved($trv_mst_id);
        return $data['conveyanceList'];
    }
    
     //--------------------------------------------Start----------------------------------------
    //get claimer plant from claim id
    //Additional Development 2019-11-11 
    //Author: Kaustubh Ashok Khadke
    //Requirement By: Mate Sir At 2019-11-09
    
     function getClaimerPlant($trv_mst_id) {
        $this->load->helper('url');
        $this->load->database();
        $data['claimerPlant'] = $this->TravelModel->getClaimerPlant($trv_mst_id);
        return $data;
    }
     //------------------------------End -------------------------------------------------------
    
       
       
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */