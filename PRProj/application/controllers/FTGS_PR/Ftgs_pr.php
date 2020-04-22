<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ftgs_pr extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_database');
        $this->method_call =& get_instance();
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->load->model('purchase/qcs_model');
        $this->load->model('purchase/pr_model');
        $this->load->model('purchase/Capex_model');
    }
    
    //create ftgs pr
    public function create_Pr()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/create_FTGS_pr');
    }
    //draft tbl ftgs pr
    public function draftTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/draft_FTGS_pr_tbl');
    }
    //draft tbl ftgs pr
    public function draftFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/draft_FTGS_pr_view',$data);
    }
    //pendding tbl ftgs pr
    public function penddingTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/pendding_FTGS_pr_tbl');
    }
    //pendding view ftgs pr
    public function penddingFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/pendding_FTGS_pr_view',$data);
    }
    //Reject tbl ftgs pr
    public function rejectTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/reject_FTGS_pr_tbl');
    }
    //Reject view ftgs pr
    public function rejectFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/reject_FTGS_pr_view',$data);
    }
    //approval tbl ftgs pr
    public function approvalTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/approval_FTGS_pr_tbl');
    }
    //Approved view ftgs pr
    public function approvalFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/approval_FTGS_pr_view',$data);
    }
    //PH pendding tbl ftgs pr
    public function ph_penddingTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_pendding_FTGS_pr_tbl');
    }
    //PH pendding view ftgs pr
    public function ph_penddingFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_pendding_FTGS_pr_view',$data);
    }
    //PH Reject tbl ftgs pr
    public function ph_rejectTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_reject_FTGS_pr_tbl');
    }
    //PH Reject view ftgs pr
    public function ph_rejectFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_reject_FTGS_pr_view',$data);
    }
    //PH approval tbl ftgs pr
    public function ph_approvalTBL()
    {
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_approval_FTGS_pr_tbl');
    }
    //PH Approved view ftgs pr
    public function ph_approvalFTGSview($ftgs_pr_id)
    {
        $data['ftgs_pr_id'] = $ftgs_pr_id;
        $this->load->helper('url');
        $this->load->view('FTGSPR/PH_approval_FTGS_pr_view',$data);
    }
    //profile fetch
    public function profile_pic($emp_code)
    {
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['profile']=$this->ftgs_model->profile_fetch($emp_code);
        return  $data['profile'];
    }
    //pr type
    public function pr_type()
    {
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pr_type']=$this->ftgs_model->pr_type();
        return  $data['pr_type'];
    }
    //list plant
    public function plant()
    {
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['plant']=$this->ftgs_model->plant();
        return  $data['plant'];
    }
    //fetch Department
    public function department($emp_dept)
    {
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['dept_name']=$this->ftgs_model->department($emp_dept);
        return  $data;
    }
    //fetch ftgs pr items
    public function ftgs_item($emp_code)
    {
        
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['item']=$this->ftgs_model->ftgs_item($emp_code);
        return $data['item'];
    }
    //add ftgs items
    public function add_item_ftgs()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $data = array(
            'ftgs_pr_id' => $this->input->post('txt_temp_ftgs_id'),
            'ftgs_item_code' => $this->input->post('txt_item_code'),
            'ftgs_item_description' => $this->input->post('txt_description'),
            'ftgs_req_qty' => $this->input->post('txt_reqr_quntity'),
            'ftgs_uom' => $this->input->post('txt_uom'),
            'ftgs_approx_rate' => $this->input->post('txt_approx_rate'),
            'ftgs_approx_total_amt' => $this->input->post('txt_apporox_amt'),
            'ftgs_expected_delivery' => $this->input->post('txt_delivary_period'),
            'ftgs_project_detail' => $this->input->post('txt_project_details'),
            'ftgs_technical_detail' => $this->input->post('txt_mfg_nm'),
            'ftgs_cust_code' => $this->input->post('txt_cust_cost'),
            'ftgs_sales_material' => $this->input->post('txt_sales_meterial'),
            'ftgs_ecn_new' => $this->input->post('txt_ecn_new'),
            'ftgs_ecn_newcode' => $this->input->post('txt_ecn_newcode'),
            'ftgs_reg_date' => $date,
            'ftgs_reg_time' => $time,
            'ftgs_reg_by' => $this->input->post('txt_temp_ftgs_id')
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->ftgs_model->add_ftgs_pr($data);
        $this->load->helper('url');
        $this->load->view('FTGSPR/create_FTGS_pr');
        
    }
    //update ftgs items
    public function update_item_ftgs()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('edit_item_id');
        
        $data = array(
            'ftgs_item_code' => $this->input->post('edit_item_code'),
            'ftgs_item_description' => $this->input->post('edit_description'),
            'ftgs_req_qty' => $this->input->post('edit_reqri_quntity'),
            'ftgs_uom' => $this->input->post('edit_uom'),
            'ftgs_approx_rate' => $this->input->post('edit_approx_rate'),
            'ftgs_approx_total_amt' => $this->input->post('edit_apporox_amt'),
            'ftgs_expected_delivery' => $this->input->post('edit_delivary_period'),
            'ftgs_project_detail' => $this->input->post('edit_project_details'),
            'ftgs_technical_detail' => $this->input->post('edit_mfg_nm'),
            'ftgs_cust_code' => $this->input->post('edit_cust_cost'),
            'ftgs_sales_material' => $this->input->post('edit_sales_meterial'),
            'ftgs_ecn_new' => $this->input->post('edit_ecn_new'),
            'ftgs_ecn_newcode' => $this->input->post('edit_ecn_newcode'),
            'ftgs_reg_date' => $date,
            'ftgs_reg_time' => $time,
            'ftgs_reg_by' => $this->input->post('edit_ftgs_emp')
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->ftgs_model->update_ftgs_pr($data, $editId);
        $this->load->helper('url');
        $this->load->view('FTGSPR/create_FTGS_pr');
        
    }
    //update ftgs items code
    public function update_itemCode()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('edit_item_id');
        $data = array(
            'ftgs_item_code' => $this->input->post('edit_item_code'),
            'ftgs_item_status' => $this->input->post('edit_item_status'),
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->ftgs_model->update_itemCode($data, $editId);
        $this->load->helper('url');
        echo '<script>window.history.back();</script>';
        
    }
    //add draft ftgs items
    public function draft_add_item_ftgs()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $temp_pr=$this->input->post('draft_temp_ftgs_id');
        $data = array(
            'ftgs_pr_id' => $temp_pr,
            'ftgs_item_code' => $this->input->post('draft_item_code'),
            'ftgs_item_description' => $this->input->post('draft_description'),
            'ftgs_req_qty' => $this->input->post('draft_reqr_quntity'),
            'ftgs_uom' => $this->input->post('draft_uom'),
            'ftgs_approx_rate' => $this->input->post('draft_approx_rate'),
            'ftgs_approx_total_amt' => $this->input->post('draft_apporox_amt'),
            'ftgs_expected_delivery' => $this->input->post('draft_delivary_period'),
            'ftgs_project_detail' => $this->input->post('draft_project_details'),
            'ftgs_technical_detail' => $this->input->post('draft_mfg_nm'),
            'ftgs_cust_code' => $this->input->post('draft_cust_cost'),
            'ftgs_sales_material' => $this->input->post('draft_sales_meterial'),
            'ftgs_ecn_new' => $this->input->post('draft_ecn_ne'),
            'ftgs_ecn_newcode' => $this->input->post('draft_ecn_newcode'),
            'ftgs_reg_date' => $date,
            'ftgs_reg_time' => $time,
            'ftgs_reg_by' => $this->input->post('draft_temp_ftgs_id')
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $result=$this->ftgs_model->draft_add_ftgs_pr($data);
        $this->load->helper('url');
        $data['ftgs_pr_id']=$temp_pr;
        $this->load->helper('url');
        echo '<script>window.history.back();</script>';
        
    }
    //update draft ftgs
    public function drftupdate_item_ftgs()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $editId = $this->input->post('editdrft_item_id');
        $data = array(
            'ftgs_item_code' => $this->input->post('editdrft_item_code'),
            'ftgs_item_description' => $this->input->post('editdrft_description'),
            'ftgs_req_qty' => $this->input->post('editdrft_reqri_quntity'),
            'ftgs_uom' => $this->input->post('editdrft_uom'),
            'ftgs_approx_rate' => $this->input->post('editdrft_approx_rate'),
            'ftgs_approx_total_amt' => $this->input->post('editdrft_apporox_amt'),
            'ftgs_expected_delivery' => $this->input->post('editdrft_delivary_period'),
            'ftgs_project_detail' => $this->input->post('editdrft_project_details'),
            'ftgs_technical_detail' => $this->input->post('editdrft_mfg_nm'),
            'ftgs_cust_code' => $this->input->post('editdrft_cust_cost'),
            'ftgs_sales_material' => $this->input->post('editdrft_sales_meterial'),
            'ftgs_ecn_new' => $this->input->post('editdrft_ecn_new'),
            'ftgs_ecn_newcode' => $this->input->post('editdrft_ecn_newcode'),
            'ftgs_reg_date' => $date,
            'ftgs_reg_time' => $time
            
            
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->ftgs_model->drftupdate_item_ftgs($data,$editId);
        $this->load->helper('url');
        echo '<script>window.history.back();</script>';
        
        //$this->load->view('FTGSPR/draft_FTGS_pr_view',$data);
    }
    
    //inser ftgs ftgs items
    public function insert_ftgs_pr()
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");
        $data = array(
            'ftgs_plant_code' => $this->input->post('txt_plant'),
            'ftgs_pr_date' => $date,
            'ftgs_pr_type' => $this->input->post('txt_pr_type'),
            'ftgs_pr_owner_code' => $this->input->post('txt_pr_owner_code'),
            'ftgs_pr_owner_name' => $this->input->post('txt_pr_owner'),
            'ftgs_dept_id' => $this->input->post('txt_dept_id'),
            'ftgs_delivary_loc' => $this->input->post('txt_location'),
            'ftgs_inspection_req' => $this->input->post('txt_supplier'),
            'ftgs_budget_consider' => $this->input->post('txt_conside_budge'),
            'ftgs_procurement_res' => $this->input->post('txt_reson'),
            'ftgs_ion_no' => $this->input->post('txt_ion_no'),
            'ftgs_cust_cost_upfront' => $this->input->post('txt_cust_cost_upfront'),
            'ftgs_cust_cost_amortization' => $this->input->post('txt_cust_cost_amort'),
            'ftgs_own_investment' => $this->input->post('txt_own_inve'),
            'ftgs_draft_date' => $date,
            'ftgs_reg_time' => $time,
            'ftgs_reg_by' => $this->input->post('txt_emp_code')
            
        );
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $this->ftgs_model->insert_ftgs_pr($data);
        $row = $this->db->query('SELECT MAX(ftgs_pr_id) AS `maxid` FROM `ftgs_pr_master`')->row();
        if ($row)
        {
            $ftgs_pr_id=$row->maxid;
            
        }
        $old_id=$this->input->post('txt_emp_code');
        $new_id = array(
            'ftgs_pr_id' => $ftgs_pr_id,
        );
        $this->ftgs_model->update_item_withftgs($new_id,$old_id);
        
        //upload file insert
        if (!empty($_FILES['upload_file']['name'][0]))
        {
            if ($this->upload_files($_FILES['upload_file']['name'], $_FILES['upload_file'], $ftgs_pr_id) === FALSE)
            {
                $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                ?>
					<script type="text/javascript">
						alert("Your Files Uploaded Successfully");
					</script>
					<?php
				}
			}
			else
			{
			}
			?>
            <script type="text/javascript">
                 alert("Record Successfully inserted with PR ID <?php echo $ftgs_pr_id; ?>");
             </script> <?php
			 $this->load->helper('url');
			 $this->load->view('FTGSPR/draft_FTGS_pr_tbl',$new_id);
		}
		 private function upload_files($title, $files, $ftgs_pr_id)
		{
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model'); 
			chmod('./uploads/ftgs_pr/', 0777);
			$path   = './uploads/ftgs_pr/'.$ftgs_pr_id;
			if (!is_dir($path)) 
			{ 
				mkdir($path, 0777, TRUE);
			}
		   $config = array(
				'upload_path'   => $path,
				'allowed_types' => '*',
				'overwrite'     => 1,                       
			);
			$this->load->library('upload', $config);
			$images = array();
			foreach ($files['name'] as $key => $image)
			{
				$_FILES['images[]']['name']= $files['name'][$key];
				$_FILES['images[]']['type']= $files['type'][$key];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['images[]']['error']= $files['error'][$key];
				$_FILES['images[]']['size']= $files['size'][$key];
				$fileName = $image;
				$images[] = $fileName;
				$config['file_name'] = $fileName;
				$this->upload->initialize($config);
				if ($this->upload->do_upload('images[]'))
				{
					$this->upload->data();
					date_default_timezone_set('Asia/Kolkata');
					$date = date('d-m-Y');
					$time = date("h:i A");
					$datanew = array(
						'ftgs_pr_id' => $ftgs_pr_id,
						'ftgs_file_name' => preg_replace('/\s+/', '_', $fileName),
						'ftgs_reg_date' => $date,
						'ftgs_reg_time' => $time,
						'ftgs_reg_by' => $this->input->post('txt_emp_code'),
						'ftgs_file_status' => 1
					);
					$this->load->database();  
					$this->load->model('Ftgs_PR/ftgs_model'); 
					$this->ftgs_model->file_insert($datanew);
				} 
				else 
				{
					return false;
				}
			}
			return $images;
		}	  
		//delete ftgs items
		public function deleteftgs() 
		{	
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');
			$id = $this->input->get('id');
			$this->ftgs_model->deleteitem($id);
			?>
			<script>alert("Delete Successfully");</script>
			<?php
			$this->load->helper('url');
			echo '<script>window.history.back();</script>';
		}
		public function ftgs_edit($id) 
		{
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');
			$data = $this->ftgs_model->fetch_ftgs($id);
			echo json_encode($data);
		}
		
		 //fetch draft ftgs 
		public function draftTBLfetch($emp_code) 
		{
			$this->load->helper('url');
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model'); 
			$data['claimList'] = $this->ftgs_model->fetchdraftftgspr($emp_code);
			return $data['claimList'];
			
		}
		//draft table
		function fetchDraftDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['draftList'] = $this->ftgs_model->fetchdraftFTGSpr($emp_code);
        return $data['draftList'];
    }
	//pendding table
	function fetchpenddingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pendingList'] = $this->ftgs_model->fetchPendingFTGSpr($emp_code);
        return $data['pendingList'];
    }
	//PH pendding table
	function ph_fetchpenddingDetails($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pendingList'] = $this->ftgs_model->ph_fetchPendingFTGSpr($emp_code);
        return $data['pendingList'];
    }
	//fetch ftgs pr details
		function ftgsprDetails($ftgs_pr_id) {
		$this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['ftgsprdetails'] = $this->ftgs_model->ftgsPrDetails($ftgs_pr_id);
        return $data['ftgsprdetails'];
    }
	//fetch upload attachment ftgs 
		public function fetchupload($ftgs_pr_id) 
		{
			$this->load->helper('url');
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model'); 
			$data['filefetch'] = $this->ftgs_model->fetchuploadattach($ftgs_pr_id);
			return $data['filefetch'];
			
		}
		//delete for draft gtgs pr
		public function deleteftgsData($id) {
			$this->load->helper('url');
			$this->load->database();
			$this->db->query("delete from ftgs_pr_items where ftgs_item_id='" . $id . "'");
		}
		
		//update data draft
		
		public function draft_insert_ftgs_pr()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$pr_status=$this->input->post('rdo_ftgs_status');
			$pr_emp_code=$this->input->post('txt_emp_code');
			$FTGSpr_no=$this->input->post('txtftgsId');
			if($pr_status==1)
			{
				$data = array(
				'ftgs_plant_code' => $this->input->post('draft_plant'),
				'ftgs_delivary_loc' => $this->input->post('draft_location'),
				'ftgs_inspection_req' => $this->input->post('draft_supplier'),
				'ftgs_budget_consider' => $this->input->post('draft_conside_budge'),
				'ftgs_procurement_res' => $this->input->post('draft_reson'),
				'ftgs_ion_no' => $this->input->post('draft_ion_no'),
				'ftgs_cust_cost_upfront' => $this->input->post('draft_cust_cost_upfront'),
				'ftgs_cust_cost_amortization' => $this->input->post('draft_cust_cost_amort'),
				'ftgs_own_investment' => $this->input->post('draft_own_inve'),
				'ftgs_draft_date' => $date,
				'ftgs_pr_status' => 1
              
				);
				$draft_pr_id=$this->input->post('draft_pr_no');
				$this->ftgs_model->updatedraft($draft_pr_id,$data);
				$dataauth = array(
				'ftgs_pr_id' => $draft_pr_id,
				'emp_code' => $pr_emp_code,
				'action_autho' => $this->input->post('authIDLevel1'),
				'level_of' => 1,
				'action' => 0,
				'action_date' => $date,
				'action_time' => $time
                );
					
				$this->load->model('Ftgs_PR/ftgs_model'); 
				$this->ftgs_model->authorityone($dataauth);
				// Email Code Start-
					$reciver= $this->input->post('txtDHAuthoEmail');
					
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='New Interplant FTGS PR Created By '.$this->input->post('txtEmpNameEmail').' Against FTGS PR NO.  '.$FTGSpr_no.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$FTGSpr_no.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$date. '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Reason:</b>  '.$this->input->post('draft_reson').'</li>
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
					
				$this->load->helper('url');
				$this->load->view('FTGSPR/draft_FTGS_pr_tbl');
			}
			else{
				$data = array(
				'ftgs_plant_code' => $this->input->post('draft_plant'),
				'ftgs_delivary_loc' => $this->input->post('draft_location'),
				'ftgs_inspection_req' => $this->input->post('draft_supplier'),
				'ftgs_budget_consider' => $this->input->post('draft_conside_budge'),
				'ftgs_procurement_res' => $this->input->post('draft_reson'),
				'ftgs_ion_no' => $this->input->post('draft_ion_no'),
				'ftgs_cust_cost_upfront' => $this->input->post('draft_cust_cost_upfront'),
				'ftgs_cust_cost_amortization' => $this->input->post('draft_cust_cost_amort'),
				'ftgs_own_investment' => $this->input->post('draft_own_inve'),
				'ftgs_draft_date' => $date,
               
				);

			
				$draft_pr_id=$this->input->post('draft_pr_no');
				$this->ftgs_model->updatedraft($draft_pr_id,$data);
				$this->load->helper('url');
				$this->load->view('FTGSPR/draft_FTGS_pr_tbl');
			}
							 if (!empty($_FILES['upload_file']['name'][0])) {
                if ($this->upload_files($_FILES['upload_file']['name'], $_FILES['upload_file'], $draft_pr_id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
				?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
		}
		
		//fetch auth ID
		function fetchReportingDetails($plant_code) 
		{
			$this->load->database();
			$data['auth_id'] = $this->ftgs_model->fetchReportingDetails($plant_code);
			return $data;
		}
		//reject fetch ftgs pr
		 function fetchRejectTBL($emp_code) 
		 {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['rejectList'] = $this->ftgs_model->fetchrejectTBL($emp_code);
			return $data['rejectList'];
		}
		//PH reject fetch ftgs pr
		 function phfetchRejectTBL($emp_code) 
		 {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['phrejectList'] = $this->ftgs_model->ph_fetchrejectTBL($emp_code);
			return $data['phrejectList'];
		}
		//reject view to draft
		public function ftgsRejectPR() 
		{
			$ftgsStatus = $this->input->post('rdo_ftgs_status');
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$UpdateId = $this->input->post('txtftgsId');
			if ($ftgsStatus == "draft") {
				$data = array(
				  'ftgs_draft_date' => $date,
				  'ftgs_reg_time' => $time,
				  'ftgs_pr_status'=>0,
				);
				$this->db->where('ftgs_pr_id', $UpdateId);
				$this->db->update('ftgs_pr_master', $data);
			}
			else 
			{
			   $message = "Ok! You have selected no action on FTGS PR";
			   echo "<script type='text/javascript'>alert('$message');</script>";
			}
			$this->load->helper('url');
			$this->load->view('FTGSPR/reject_FTGS_pr_tbl');
		}
		//fetch approav pr table
		function fetchFTGSApprovalTbl($emp_code) 
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approvedftgs'] = $this->ftgs_model->fetchFTGSapprovalTbl($emp_code);
			return $data['approvedftgs'];
		}
		//ph fetch approav pr table
		function phfetchFTGSApprovalTbl($emp_code) 
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['phapprovedftgs'] = $this->ftgs_model->phfetchFTGSapprovalTbl($emp_code);
			return $data['phapprovedftgs'];
		}
		//Department name from dept_master
		 function fetch_ph_id($del_loc)
			{
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');
				$data['ph_id']=$this->ftgs_model->fetch_ph_id($del_loc);  		  		
				return  $data;
			} 
			//fetch local_rim_id 
		 function ftgsActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsDetailsHodActionData($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		function getUserDetails($ftgs_pr_id) 
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['user'] = $this->ftgs_model->getUserDetails($ftgs_pr_id);
			return $data;
		}
		public function upadatePend_insert_ftgs_pr()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$phName = $this->input->post('txtPHName');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('sanc_code'),
                'level_of' => 2,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            	// Email Code Start-
					$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='Interplant FTGS PR Approved By '.$phName.' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$phName.' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/PH_pendding_FTGS_pr_tbl');
		
	}
	//fetch sanction ID
		function fetchsanctionDetails($plant_code) 
		{
			$this->load->database();
			$data['sanc_id'] = $this->ftgs_model->fetchSanctionDetails($plant_code);
			return $data;
		}
		
		
		//PLANT HEAD......
		
		//plant pendding tbl ftgs pr
		public function plant_penddingTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_pendding_FTGS_pr_tbl');
        }
		
		//plant pendding table
		function plant_fetchpenddingDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->plant_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		//pendding view ftgs pr
		public function plantpenddingFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_pendding_FTGS_pr_view',$data);
        }
		//plant Reject tbl ftgs pr
		public function plant_rejectTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_reject_FTGS_pr_tbl');
        }
		//Reject view ftgs pr
		public function plantRejectFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_reject_FTGS_pr_view',$data);
        }
		//plant Reject table
		function plant_fetchRejectDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['rejectList'] = $this->ftgs_model->plant_fetchRejectFTGSpr($emp_code);
			return $data['rejectList'];
		}
		//plant Approved tbl ftgs pr
		public function plant_approvTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_approval_FTGS_pr_tbl');
        }
		//Reject Approved ftgs pr
		public function plantApproveFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/plant_approval_FTGS_pr_view',$data);
        }
		//plant Approved table
		function plant_fetchApproveDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approveList'] = $this->ftgs_model->plant_fetchplantFTGSpr($emp_code);
			return $data['approveList'];
		}
		function getSanctionAuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getSanctionAuthoDetails();
        return $data;
    }
	public function plantHead_insert_ftgs_pr()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$plantName = $this->input->post('txtPHName');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('txt_plant_Autho'),
                'level_of' => 3,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            //email Code
                    $reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='Interplant FTGS PR Approved By '.$plantName.' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$plantName.' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/plant_pendding_FTGS_pr_tbl');
		
	}
	//fetch sanction level 
		 function ftgsSancActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsDetailsSancActionData($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		
		
		
		// ITEM CODE ................
		//ITEM CODE  pendding tbl ftgs pr
		public function IC_penddingTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_pendding_FTGS_pr_tbl');
        }
		//ITEM CODE pendding view ftgs pr
		public function ICpenddingFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_pendding_FTGS_pr_view',$data);
        }
		//ITEM CODE fetch data pendding table
		function ICfetchpenddingDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->ICfetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		//ITEM CODE  Reject tbl ftgs pr
		public function ICrejectTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_reject_FTGS_pr_tbl');
        }
		//ITEM CODE Reject view ftgs pr
		public function ICrejectFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_FTGS_pr_view',$data);
        }
		//ITEM CODE fetch data Reject table
		function ICfetchRejectDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['RejectList'] = $this->ftgs_model->ICfetchRejectFTGSpr($emp_code);
			return $data['RejectList'];
		}
		//ITEM CODE  Approved tbl ftgs pr
		public function ICapproveTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_approval_FTGS_pr_tbl');
        }
		//ITEM CODE Approved view ftgs pr
		public function ICapprovalFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/IC_FTGS_pr_view',$data);
        }
		//ITEM CODE fetch data approve table
		function ICfetchApprovDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approveList'] = $this->ftgs_model->ICfetchApproveFTGSpr($emp_code);
			return $data['approveList'];
		}
		function getItemCodeAuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getItemCodeAuthoDetails();
        return $data;
    }
	
	
	public function ItemCodeAuth_insert()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('txt_ItemCode_Autho'),
                'level_of' => 4,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            
            // Email Code Start-
            
					$reciver= $this->input->post('txtItemCodeAuthoEmail');  //PH email
				  
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='Interplant FTGS PR Approved By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal (http://rucha.co.in/portal)';
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
					// Email Code End
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            	// Email Code Start-
					
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/IC_pendding_FTGS_pr_tbl');
		
	}
	//fetch Item code level
		 function ftgsItemCodeActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsItemCodeAction($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		
		
		
		//ION Create---------
		//ION  pendding tbl ftgs pr
		public function ION_penddingTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_pendding_FTGS_pr_tbl');
        }
		//ION pendding view ftgs pr
		public function IONpenddingFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_pendding_FTGS_pr_view',$data);
        }
		//ION fetch data pendding table
		function IONfetchpenddingDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->IONfetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		//ION Reject TBL ftgs pr
		public function ION_rejectTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_reject_FTGS_pr_tbl');
        }
		//ION Reject view ftgs pr
		public function IONrejectFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_FTGS_pr_view',$data);
        }
		//ION fetch data Reject table
		function IONfetchrejectDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['rejectList'] = $this->ftgs_model->IONfetchrejectFTGSpr($emp_code);
			return $data['rejectList'];
		}
		//ION Approved TBL ftgs pr
		public function ION_approveTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_approval_FTGS_pr_tbl');
        }
		//ION Approved view ftgs pr
		public function IONapproveFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ION_FTGS_pr_view',$data);
        }
		//ION fetch data Approved table
		function IONfetchapproveDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approveList'] = $this->ftgs_model->IONfetchapproveDetails($emp_code);
			return $data['approveList'];
		}
		//ION fetch  Approved Authority
		function getIONAuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['auth_id'] = $this->ftgs_model->getIONAuthoDetails();
        return $data['auth_id'];
    }
	public function IONAuth_insert()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$ion_no = $this->input->post('txt_ionNo');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('txt_ION_Autho'),
                'level_of' => 5,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			$data1 = array(
				'ftgs_ion_no' => $ion_no
            );
			
			$this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='Interplant FTGS PR Approved By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
					
					
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2,
				'ftgs_ion_no' => $ion_no
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            	// Email Code Start-
				
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$this->input->post('txtEmpNameEmail').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/ION_pendding_FTGS_pr_tbl');
		
	}
	//fetch ION Autho level
		 function ftgsIONAuthoActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsIONAction($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
	//Asset Code Create---------
		//Asset Code  pendding tbl ftgs pr
		public function AssCode_penddingTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_pendding_FTGS_pr_tbl');
        }
		//Asset Code pendding view ftgs pr
		public function AssCodependFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_pendding_FTGS_pr_view',$data);
        }
		//Asset Code fetch data pendding table
		function AssCodefetchpendDtl($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->ACCfetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}	
		//Asset code fetch  Approved Authority
		function getAssetAuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['Asset_code'] = $this->ftgs_model->getACCAuthoDetails();
        return $data;
    }
	//fetch Asset Autho level
		 function ftgsACCAuthoActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsACCAction($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		/*public function ASSAuth_insert()
		{
	
		date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$data = array(
				'assetFile_attach_ftgs' =>preg_replace('/\s+/', '_', $_FILES['assetFile_attach_ftgs']['name']),
			);
			$capex_upd=$this->ftgs_model->File_update($editId,$data);	
			//assetFile_attach attachment 	
			if (!empty($_FILES['assetFile_attach_ftgs']['name'])) {//single file upload 
                chmod('./uploads/assetFile_attach_ftgs/', 0777);
				$path   = './uploads/assetFile_attach_ftgs/';
				if (!is_dir($path)) { //create the folder if it's not already exists
					mkdir($path, 0777, TRUE);
				}
			$config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('assetFile_attach_ftgs')){
		}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
			$capex_upd=$this->ftgs_model->File_update($editId,$data);

            } 
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('txt_Asset_Autho'),
                'level_of' => 6,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			 
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            
            // Email Code Start-
					$reciver= $this->input->post('txtIONAuthoEmail');  //PH email
					$ccuser=$this->input->post('txtUserAuthoEmail');
					$subject='Interplant FTGS PR Approved By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
					
					
					
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2,
				
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
				
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }

		  $this->load->helper('url');
		$this->load->view('FTGSPR/ACC_pendding_FTGS_pr_tbl');
		}*/

	//Asset code Reject TBL ftgs pr
		public function ACC_rejectTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_reject_FTGS_pr_tbl');
        }
		//Asset code Reject view ftgs pr
		public function ACCrejectFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_FTGS_pr_view',$data);
        }
		//Asset code fetch data Reject table
		function ACCfetchrejectDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['rejectList'] = $this->ftgs_model->ACCfetchrejectFTGSpr($emp_code);
			return $data['rejectList'];
		}
		//Asset code Approved TBL ftgs pr
		public function ACC_approveTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_approval_FTGS_pr_tbl');
        }
		//Asset code Approved view ftgs pr
		public function ACCapproveFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/ACC_FTGS_pr_view',$data);
        }
		//Asset code fetch data Approved table
		function ACCfetchapproveDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approveList'] = $this->ftgs_model->ACCfetchapproveDetails($emp_code);
			return $data['approveList'];
		}
		
	//PO Create ---------
		//PO  pendding tbl ftgs pr
		public function POCret_penddingTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/PO_pendding_FTGS_pr_tbl');
        }
		//PO  pendding view ftgs pr
		public function POCretpendFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/PO_pendding_FTGS_pr_view',$data);
        }
			
		//PO fetch data pendding table
		function POCodefetchpendDtl($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->POfetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		//PO Reject TBL ftgs pr
		public function PO_rejectTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/po_reject_FTGS_pr_tbl');
        }
		//PO Reject view ftgs pr
		public function POrejectFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/PO_FTGS_pr_view',$data);
        }
		//PO fetch data Reject table
		function POfetchrejectDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['rejectList'] = $this->ftgs_model->POfetchrejectFTGSpr($emp_code);
			return $data['rejectList'];
		}
		//PO Approved TBL ftgs pr
		public function po_approveTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/PO_approval_FTGS_pr_tbl');
        }
		//PO Approved view ftgs pr
		public function POapproveFTGSview($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/PO_FTGS_pr_view',$data);
        }
		//PO fetch data Approved table
		function POfetchapproveDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['approveList'] = $this->ftgs_model->POfetchapproveDetails($emp_code);
			return $data['approveList'];
		}
		//fetch PO Autho level
		 function ftgsPOAuthoActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsIOAction($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		public function IOAuth_insert()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
			$data1 = array(
                'ftgs_pr_status' => 3
            );
			 $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            
            // Email Code Start-
					$reciver= $this->input->post('txtUserAuthoEmail');  //user 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
          }
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
				
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/createQcsList');
		//$this->load->view('FTGSPR/PO_pendding_FTGS_pr_tbl');
		
	}
	function deptAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['dept_autho'] = $this->ftgs_model->deptAuthNavBarStatus($emp_code);
        return $data;
    }
	function plantAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['PlantHead'] = $this->ftgs_model->plantAuthNavBarStatus($emp_code);
        return $data;
    }
	function ItemCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['itemcode'] = $this->ftgs_model->ItemCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function IONCreateAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['IONCreate'] = $this->ftgs_model->IONCreateAuthNavBarStatus($emp_code);
        return $data;
    }
	function AssetCodeAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['AssetCode'] = $this->ftgs_model->AssetCodeAuthNavBarStatus($emp_code);
        return $data;
    }
	function POCreationAuthNavBarStatus($emp_code) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['POCreation'] = $this->ftgs_model->POCreationAuthNavBarStatus($emp_code);
        return $data;
    }
	function approval_status($ftgs_pr_id) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['approval'] = $this->ftgs_model->approval_status($ftgs_pr_id);
        return $data['approval'];
    }
	public function ftgs_item_list($ftgs_pr_id)
		{
			
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');  
			$data['item']=$this->ftgs_model->ftgs_item_list($ftgs_pr_id);  
		  	return $data['item'];
		}
	//fetch upload attachment ftgs 
		public function fetchAssetAttach($ftgs_pr_id) 
		{
			$this->load->helper('url');
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model'); 
			$data['filefetch'] = $this->ftgs_model->fetchAssetAttach($ftgs_pr_id);
			return $data['filefetch'];
			
		}
	    //fetch email Dept Head
		function fetchDHMailDetails($DHCode)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['DHEmail'] = $this->ftgs_model->fetchDHMailDetails($DHCode);
			return $data;
		}
		
		
		
				//fetch email plant Head
		function fetchPHMailDetails($IOCode)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['PhEmail'] = $this->ftgs_model->fetchPHMailDetails($IOCode);
			return $data;
		}
		//fetch email Item Code Head
		function fetchItemCodeMailDetails($ICCode)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['itemCodeEmail'] = $this->ftgs_model->fetchItemCodeMailDetails($ICCode);
			return $data;
		}
		//fetch email ION  Head
		function fetchIONMailDetails($IONCode)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['IONEmail'] = $this->ftgs_model->fetchIONMailDetails($IONCode);
			return $data;
		}
		//fetch email Asset Head
		function fetchAssetMailDetails($ACCCode)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['AssetEmail'] = $this->ftgs_model->fetchAssetMailDetails($ACCCode);
			return $data;
		}
		
		
		

		//fetch email PO Head
		function fetchPoCreateMailDetails($emp_code)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['POCreateEmail'] = $this->ftgs_model->fetchPoCreateMailDetails($emp_code);
			return $data;
		}
		//fetch email User Head
		function fetchUserMailDetails($ftgs_pr_id)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['UserEmail'] = $this->ftgs_model->fetchUserMailDetails($ftgs_pr_id);
			return $data;
		}
		//fetch User Name
		function fetchEmpNameMailDetails($emp_code)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['emp_Name'] = $this->ftgs_model->fetchEmpNameMailDetails($emp_code);
			return $data;
		}
		//fetch User Plant
		function getUserPlant($ftgs_pr_id)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['UserPlant'] = $this->ftgs_model->getUserPlant($ftgs_pr_id);
			return $data;
		}
		//fetch User Department
		function getUserDept($emp_dept)
		{
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['UserDept'] = $this->ftgs_model->getUserDept($emp_dept);
			return $data;
		}
		
		//QCS Process pps 2020-03-26
		//Soucing Person pendding table
		function pendingSoucingList($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->pendingSoucingList($emp_code);
			return $data['pendingList'];
		}
		
		//fetch Sourcing Autho level 4
		 function ftgssourcingAuthoActionData($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgssourcingAuthoActionData($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		
		
		function getApproval5AuthID() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getApproval5AuthID();
        return $data;
    }
	
		//Soucing person level 4 pradnya
		public function sourcing1_insert()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
		
			$data1 = array(
                'ftgs_pr_status' => 3
            );
			 $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
			
			/* $data2 = array(
                'ftgs_pr_id' => $this->input->post('txtftgsId'),
                'emp_code' => $this->input->post('user_id'),
                'action_autho' => $this->input->post('txt_sourcing1_Autho'),
                'level_of' => 5,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
           
            $this->ftgs_model->ftgsProcessRepAutho5($data2);*/
			
            
            
            // Email Code Start-
					$reciver= $this->input->post('txtUserAuthoEmail');  //user 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
          }
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_pr_status' => 2
            );
          
            $this->db->where('ftgs_pr_id', $editId);
            $this->db->update('ftgs_pr_master', $data1);
            $this->ftgs_model->updateuserAction($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
				
					$reciver= $this->input->post('txtUserAuthoEmail');
			
					$subject='Interplant FTGS PR Rejected By '.$this->input->post('txtPHName').' Against  PR NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS PR No:</b>  '.$editId.'</li>
								<li><b>FTGS PR Owner:</b>  '.$this->input->post('txtEmpNameEmail'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtPRDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/QCS_create_tbl');
		//$this->load->view('FTGSPR/PO_pendding_FTGS_pr_tbl');
		
	}
		//CreateQCS List 
		public function CreateQcsList() 
		{
			$this->load->helper('url');
			
			$this->load->view('FTGSPR/QCS_create_tbl');
        }
		
		//Fetch create QCS  list 
		public function fetchCreateQcsList($emp_code){
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['qcsList'] = $this->ftgs_model->pendingQcsListCreate($emp_code);
			return $data['qcsList'];
		}
		//fetch sanction level ftgsDetailsSourcing1Action
		 function ftgsDetailsSourcing1Action($emp_code,$ftgs_pr_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsDetailsSourcing1Action($emp_code,$ftgs_pr_id);
			return $data['ftgsActionData'];
		}
		//QCS Step 1
		public function createQcsStepOne($ftgs_pr_id) 
		{
			$data['ftgs_pr_id'] = $ftgs_pr_id;
			$this->load->helper('url');
			
			$this->load->view('FTGSPR/QCS_CreateStepOne',$data);
        }
		
		//Inset Step 1 QCS 
		public function insertQcsStepOne()
		{
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			//$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcsName = $this->input->post('txtQcsName');
		
            $data1 = array(
				'ftgs_pr_id'=>$editId,
				'ftgs_pr_owner_empcode'=>$this->input->post('txtprempcode'),
				'ftgs_qcs_date' => $date,
				'ftgs_dept_id'=>$this->input->post('txtDeptID'),
				'ftgs_pr_type'=>$this->input->post('txtPRTypeID'),
				'ftgs_qcs_emp_code'=>$this->input->post('txtQcsempcode'),
				'ftgs_qcs_owner' => $qcsName,
				'ftgs_qcs_status' => 0, //Incomplete QCS
				'ftgs_plant_code'=>$this->input->post('txtPlantCode'),
				'ftgs_sup1_nm'=>$this->input->post('txt_sup1_nm'),
				'ftgs_sup1_contact_no'=>$this->input->post('txt_sup1_mno'),
				'ftgs_sup1_contact_person'=>$this->input->post('txt_sup1_contactp'),
				'ftgs_sup1_eid'=>$this->input->post('txt_sup1_eid'),
				
				
				'ftgs_sup2_nm'=>$this->input->post('txt_sup2_nm'),
				'ftgs_sup2_contact_no'=>$this->input->post('txt_sup2_mno'),
				'ftgs_sup2_contact_person'=>$this->input->post('txt_sup2_contactp'),
				'ftgs_sup2_eid'=>$this->input->post('txt_sup2_eid'),
				
				'ftgs_sup3_nm'=>$this->input->post('txt_sup3_nm'),
				'ftgs_sup3_contact_no'=>$this->input->post('txt_sup3_mno'),
				'ftgs_sup3_contact_person'=>$this->input->post('txt_sup3_contactp'),
				'ftgs_sup3_eid'=>$this->input->post('txt_sup3_eid'),
				
            );
            
            $this->ftgs_model->ftgsInsertStepOne($data1);
			
			$row = $this->db->query('SELECT MAX(ftgs_qcs_id) AS `maxid` FROM `ftgs_qcs_master`')->row();
if ($row) {
	$ftgs_qcs_id=$row->maxid;
  }
  
			$dataID = array(
				'ftgs_qcs_id'=>$ftgs_qcs_id,
            );
            
            $this->ftgs_model->updateFtgsID($dataID, $editId, $Ftgs_action_id);
           
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_incomplete_tbl');
		
	}
		
		//Incomplete qcs table 
		
		public function QCS_incomplete_tbl() 
		{
			
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_incomplete_tbl');
        }
		
		//Fetch Incpmp Qcs List 
		public function fetchIncompQcsTbl($emp_code){
			$this->load->helper('url');
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model'); 
			$data['qcsList'] = $this->ftgs_model->fetchIncompQcsTbl($emp_code);
			return $data['qcsList'];
			
		}
		
		//view of step 2
		public function QCS_CreateStepTwo($ftgs_qcs_id){
			$data['ftgs_qcs_id']=$ftgs_qcs_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_CreateStepTwo',$data);
		}
		
		//fetch details using qcs id 
		
			function ftgsqcsDetails($ftgs_qcs_id) {
		$this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['ftgsqcsDetails'] = $this->ftgs_model->ftgsqcsDetails($ftgs_qcs_id);
        return $data['ftgsqcsDetails'];
		}
		
		
		//insert step2
		public function insertQcsSteptwo(){
				date_default_timezone_set('Asia/Kolkata');
				 //$date=date('d-m-Y h:i');
				  $date=date('Y-m-d H:i:s');
				  $qcs_up_id=$this->input->post('ftgs_qcs_no');
				  //$pr_status =$this->input->post('pr_status'); 
				  $pr_id=$this->input->post('pr_no');
				  
	  $data = array(
'ftgs_qcs_id' => $this->input->post('ftgs_qcs_no'),
'ftgs_pr_id' => $this->input->post('pr_no'),
'ftgs_tech_det_sup1' => $this->input->post('tech_det_sup1'),
'ftgs_tech_det_sup2' => $this->input->post('tech_det_sup2'),
'ftgs_tech_det_sup3' => $this->input->post('tech_det_sup3'),

'ftgs_credibility_sup1' => $this->input->post('supplier1_checked'),
'ftgs_credibility_sup2' => $this->input->post('supplier2_checked'),
'ftgs_credibility_sup3' => $this->input->post('supplier3_checked'),

'ftgs_insurance_sup1' => $this->input->post('supplier1_insurance'),
'ftgs_insurance_sup2' => $this->input->post('supplier2_insurance'),
'ftgs_insurance_sup3' => $this->input->post('supplier3_insurance'),

'ftgs_del_period_sup1' => $this->input->post('delivery_period_sup1'),
'ftgs_del_period_sup2' => $this->input->post('delivery_period_sup2'),
'ftgs_del_period_sup3' => $this->input->post('delivery_period_sup3'),

'ftgs_del_mode_sup1' => $this->input->post('delivery_mode_sup1'),
'ftgs_del_mode_sup2' => $this->input->post('delivery_mode_sup2'),
'ftgs_del_mode_sup3' => $this->input->post('delivery_mode_sup3'),

'ftgs_inspection_sup1' => $this->input->post('supplier1_testing'),
'ftgs_inspection_sup2' => $this->input->post('supplier2_testing'),
'ftgs_inspection_sup3' => $this->input->post('supplier3_testing'),

'ftgs_pymt_terms_sup1' => $this->input->post('pay_terms_sup1'),
'ftgs_pymt_terms_sup2' => $this->input->post('pay_terms_sup2'),
'ftgs_pymt_terms_sup3' => $this->input->post('pay_terms_sup3'),

'ftgs_warranty_sup1' => $this->input->post('warranty_sup1'),
'ftgs_warranty_sup2' => $this->input->post('warranty_sup2'),
'ftgs_warranty_sup3' => $this->input->post('warranty_sup3'),

'ftgs_scope_instal_sup1' => $this->input->post('scope_inst_sup1'),
'ftgs_scope_instal_sup2' => $this->input->post('scope_inst_sup2'),
'ftgs_scope_instal_sup3' => $this->input->post('scope_inst_sup3'),


'ftgs_taxes_duties_sup1' => $this->input->post('sup1_taxes'),
'ftgs_taxes_duties_sup2' => $this->input->post('sup2_taxes'),
'ftgs_taxes_duties_sup3' => $this->input->post('sup2_taxes'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_validity_price_sup1' => $this->input->post('price_sup1'),
'ftgs_validity_price_sup2' => $this->input->post('price_sup2'),
'ftgs_validity_price_sup3' => $this->input->post('price_sup3'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_repl_scope_sup1' => $this->input->post('repl_sup1'),
'ftgs_repl_scope_sup2' => $this->input->post('repl_sup2'),
'ftgs_repl_scope_sup3' => $this->input->post('repl_sup3'),
'ftgs_tech_spec_date' => $date,

);

		$result=$this->ftgs_model->QCS_tecSpecInsert($data);
$row = 
$this->db->query('SELECT MAX(ftgs_qcs_id) AS `maxid` FROM `ftgs_qcs_technical_spec`')->row();
if ($row) {
	$qcs_id=$row->maxid;
  }
 
//end


	  $dataupdate = array(
'ftgs_qcs_status'=> 1 , //drfat status
'ftgs_justification_supplier' => $this->input->post('justification_sup'),
'ftgs_additional_attachment' =>preg_replace('/\s+/', '_', $_FILES['ftgs_additional_attachment']['name']),

'ftgs_outside_budget'=>$this->input->post('outside_budget'),
'ftgs_just_outside_budget'=>$this->input->post('just_outside_budget'),
//'pr_value'=>$this->input->post('order_value'),



'ftgs_non_properitery_item'=>$this->input->post('advance_nonproprietery'),
'ftgs_just_adv_nonproprietery'=>$this->input->post('just_adv_nonproprietery'),

'ftgs_properitery_item'=>$this->input->post('advance_proprietery'),
'ftgs_just_adv_proprietery'=>$this->input->post('just_adv_proprietery'),

'ftgs_post_grn_nonproprietary'=>$this->input->post('final_payment_grn'),
'ftgs_just_final_payment_grn'=>$this->input->post('just_final_payment_grn'),

'ftgs_post_grn_proprietary'=>$this->input->post('final_payment_post_grn'),
'ftgs_just_final_pymt_post_grn'=>$this->input->post('just_final_pymt_post_grn'),

'ftgs_delivery_terms'=>$this->input->post('delivery_gate'),
'ftgs_just_delivery_gate'=>$this->input->post('just_delivery_gate'),


'ftgs_cost_reimb_cust'=>$this->input->post('cost_reimb_cust'),
'ftgs_just_cost_reimb_cust'=>$this->input->post('just_cost_reimb_cust'),


'ftgs_repl_cost_agreed'=>$this->input->post('repl_cost_agreed'),
'ftgs_just_repl_cost_agree'=>$this->input->post('just_repl_cost_agree'),


);
	$qcs_upd=$this->ftgs_model->qcs_step_upd($qcs_up_id,$dataupdate);

  //additional attachment 	
 if (!empty($_FILES['ftgs_additional_attachment']['name'])) {//single file upload 
                chmod('./uploads/ftgs_additional_attachment/', 0777);
$path   = './uploads/ftgs_additional_attachment/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 	
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);
if($this->upload->do_upload('ftgs_additional_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
  //end
     if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data']['name'], $_FILES['upload_data'], $qcs_up_id) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded 6 Successfully");
                </script>
            <?php
					
                }
				
            }
			else{
				
				
			}
  ?>
   <script type="text/javascript">
                    alert("Your QCS Recoarded QCS ID <?php echo $qcs_up_id; ?>");
                </script>
  <?php
		$this->load->helper('url');

		$this->load->view('FTGSPR/QCS_DrfatTbl');
		}
		
		
		
		//upload file

 private function upload_files1($title, $files, $qcs_up_id)
    {
		 $this->load->database();  
		  $this->load->model('Ftgs_PR/ftgs_model');  
		  

		chmod('./uploads/Ftgs_qcs/', 0777);
$path   = './uploads/Ftgs_qcs/'.$qcs_up_id;
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 
		
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $image;

            $images[] = $fileName;

            $config['ftgs_qcs_file_nm'] = $fileName;
			
			
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
					date_default_timezone_set('Asia/Kolkata');
 $filedate=date('d-m-Y');
				
				$datanew = array(
'ftgs_qcs_id' => $qcs_up_id,
'ftgs_qcs_file_nm' => preg_replace('/\s+/', '_', $fileName),
'ftgs_insert_date' => $filedate,


);
$this->ftgs_model->insertfiles($datanew);//Inserting 6 files

            } else {
                return false;
            }
        }

        return $images;
    }	
   


//end

		
		//List of Items 
	
	   function ftgs_list_items_qcs($ftgs_qcs_id)
		{
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  
				$data['item']=$this->ftgs_model->ftgs_list_items_qcs($ftgs_qcs_id);  
				return  $data['item'];
		  
	    }
		
		
		  
  //Item Addition in QCS 
     
   public function inserQcsAddItem()
   {   
	   date_default_timezone_set('Asia/Kolkata');
 //$date=date('d-m-Y h:i');
 $date=date('Y-m-d H:i:s');
 $temp_qcs=$this->input->post('tempqcs_id');
 $temp_prid=$this->input->post('temp_prid');
 $item_code=$this->input->post('item_code');
	  $data = array(
'ftgs_qcs_id' =>  $temp_qcs,
'ftgs_pr_id' => $temp_prid,
'ftgs_q_item_code' => $this->input->post('pr_itemid'),
'ftgs_item_id'=> $this->input->post('item_code'),
'ftgs_q_item_description' => $this->input->post('item_description'),
'ftgs_q_item_specification'=> $this->input->post('item_specification'),
'ftgs_q_req_quantity' => $this->input->post('qty'),
'ftgs_q_uom' => $this->input->post('uom'),
'ftgs_q_itm_sts' => $this->input->post('item_sts'),
'ftgs_q_hsn_code' => $this->input->post('hsn_code'),
'ftgs_quot_rate1' => $this->input->post('quot_rate1'),
'ftgs_quoted_amt1' => $this->input->post('quot_amt1'),
'ftgs_final_rate1' => $this->input->post('final_rate1'),
'ftgs_final_amt1' => $this->input->post('amount1'),
'ftgs_quot_rate2	' => $this->input->post('quot_rate2'),
'ftgs_quoted_amt2' => $this->input->post('quot_amt2'),
'ftgs_final_rate2' => $this->input->post('final_rate2'),
'ftgs_final_amt2' => $this->input->post('amount2'),
'ftgs_quot_rate3	' => $this->input->post('quot_rate3'),
'ftgs_quoted_amt3' => $this->input->post('quot_amt3'),
'ftgs_final_rate3' => $this->input->post('final_rate3'),
'ftgs_final_amt3' => $this->input->post('amount3'),
'ftgs_qcs_item_date' => $date,
);
		$result=$this->ftgs_model->ftgs_item_insert($data);
		 	
		
	  $itemupdate = array(
'ftgs_qcs_gen'=> $this->input->post('tempqcs_id'),

);
	$item_upd=$this->ftgs_model->ftgs_qcs_itm_upd($item_code,$itemupdate);
		 
        $this->load->helper('url');
		 $data['ftgs_qcs_id']=$temp_qcs;
		  echo '<script>window.history.back();</script>';
		//$this->load->view('FTGSPR/QCS_CreateStepTwo',$data);
 }
 
 

//view qcs item in step 2 page 
	   function ftgs_view_qcs_items($ftgs_qcs_id)
		{
	
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  
				$data['item_view']=$this->ftgs_model->ftgs_view_qcs_items($ftgs_qcs_id);  
				return  $data['item_view'];
		  
		}	
		
		
//Edit Delete Item
public function QCS_editDeleteItem($ftgs_qcs_item_id)
{
		$data['ftgs_qcs_item_id']=$ftgs_qcs_item_id;
	    $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_editDeleteItem',$data);
}

//Fetch Item in ID Wise fetchQCSItemInID
	public function fetchQCSItemInID($ftgs_qcs_item_id)
		{
	
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');  
			$data['item_qcs']=$this->ftgs_model->fetchQCSItemInID($ftgs_qcs_item_id);  
		    return  $data['item_qcs'];
		  
		}
		
		//qcs detail show related to qcs_item id 
	   function qcs_detail_itemid($ftgs_qcs_item_id)
{
	
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');  
			$data['data_qcs']=$this->ftgs_model->qcs_detail_itemid($ftgs_qcs_item_id);  
			return  $data['data_qcs'];
		  
}


  //update item in qcs
   	
				public function QCSItemUpdate()
		{

				$id=$this->input->post('q_item_id');
			
			$data = array(

					'ftgs_q_item_code' => $this->input->post('q_update_itemc'),
					'ftgs_q_item_description' => $this->input->post('q_update_item_desc'),
					'ftgs_q_req_quantity' => $this->input->post('q_update_qty'),
					'ftgs_q_hsn_code'=>$this->input->post('q_update_hsn'),
					'ftgs_q_uom' => $this->input->post('q_update_uom'),
					 
					 'ftgs_quot_rate1'=>$this->input->post('q_update_quot_rate1'),
					 'ftgs_quoted_amt1'=>$this->input->post('q_update_quot_amt1'),
					 'ftgs_final_rate1'=>$this->input->post('q_update_final_rate1'),
					'ftgs_final_amt1'=>$this->input->post('q_update_amount1'),

					'ftgs_quot_rate2'=>$this->input->post('q_update_quot_rate2'),
					 'ftgs_quoted_amt2'=>$this->input->post('q_update_quot_amt2'),
					 'ftgs_final_rate2'=>$this->input->post('q_update_final_rate2'),
					'ftgs_final_amt2'=>$this->input->post('q_update_amount2'),

					'ftgs_quot_rate3'=>$this->input->post('q_update_quot_rate3'),
					 'ftgs_quoted_amt3'=>$this->input->post('q_update_quot_amt3'),
					 'ftgs_final_rate3'=>$this->input->post('q_update_final_rate3'),
					'ftgs_final_amt3'=>$this->input->post('q_update_amount3'),




);
//Transfering data to Model
$this->load->helper('url');
$this->load->database();  
         //load the model  
$this->load->model('Ftgs_PR/ftgs_model');  
$this->ftgs_model->update_qcs_item($id,$data);
$data['message'] = 'Data Updated Successfully';
//Loading View

 ?>
	<script>
	
	alert("Item is Updated!");
	</script>

		<?php 
			echo '<script>window.history.back();</script>';	
			
		}
		
		
			//fetch ION NO
				function fetch_ion_no($pr_id)
			{
	
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  	
				$data['ftgs_ion_no']=$this->ftgs_model->fetch_ion_no($pr_id);  		  		
				return  $data['ftgs_ion_no'];
			} 
			
			
			//emp name fetch for qcs email Full emp name  from employee master emp_name_pr
 
	   function emp_name_pr($emp_code)
{
		$this->load->database();  
		$this->load->model('purchase/qcs_model');  	
		$data['emp_name']=$this->qcs_model->emp_name_pr($emp_code);  		  		
		return  $data;
}

		
		  
   //delete item Id wise 
   			public function QcsDeleteItem($ftgs_qcs_item_id)
   {

		$del_itemid=$this->input->post('del_itemid');
		$data = array(
				'ftgs_qcs_gen'=>'null',
		);
		
		
	
				$itema_upd=$this->ftgs_model->qcs_itm_gen($del_itemid,$data); //10 avb
	?>
	
	
		   <script type="text/javascript">
                    alert("Delete item <?php echo $del_itemid ?>");
                </script>
		<?php		
	   //$data['qcs_id']=$qcs_item_id;
	   $this->db->where('ftgs_qcs_item_id',$ftgs_qcs_item_id);
	   $this->db->delete('ftgs_qcs_item');
	   $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_incomplete_tbl');
   }
   
   
   // Drft Table list
   
   public function QCS_DrfatTbl(){
	   $this->load->helper('url');
	   $this->load->view('FTGSPR/QCS_DrfatTbl');
	
	  
	   
   }
   
   
   //QCS Draft fetch data 
   public function fetchQcsDraftDetails($emp_code){
	   $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['draftList'] = $this->ftgs_model->fetchQcsDraftDetails($emp_code);
        return $data['draftList'];
   }
   
   //pendding tbl ftgs QCS
		public function penddingQCSTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_Userpendding_FTGS_tbl');
        }
		
		//pendding table data 
		function pendingQcsForUser($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pendingList'] = $this->ftgs_model->pendingQcsForUser($emp_code);
        return $data['pendingList'];
    }	
		
		 //Approved tbl ftgs QCS
		public function approvedQCSTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_UserApproved_FTGS_tbl');
        }
		
		
		 //Rejected tbl ftgs QCS
		public function rejectedQCSTBL() 
		{
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_UserRejected_FTGS_tbl');
        }
	
	
		//Sourcing pendding qcs tbl
		public function QCS_Pending_FTGS_tbl(){
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_SourcingPending_FTGS_tbl');
		}
		
		
		//Sourcing Approved qcs tbl
		public function QCS_Approved_FTGS_tbl(){
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_SourcingApproved_FTGS_tbl');
		}
		
		//Sourcing Rejected qcs tbl
		public function QCS_Rejected_FTGS_tbl(){
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_SourcingRejected_FTGS_tbl');
		}
		
		//Draft step one
		public function QCS_DraftStepOne($ftgs_qcs_id){
			$data['ftgs_qcs_id']=$ftgs_qcs_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_DraftStepOne',$data);
		} 
		//Draft step Two
		public function QCS_DraftStepTwo($ftgs_qcs_id){
			$data['ftgs_qcs_id']=$ftgs_qcs_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/QCS_DraftStepTwo',$data);
		} 
		
		//update draft step one 
		public function DraftinsertQcsStepOne (){

			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('ftgsQCsId');
			
			
		
            $data1 = array(
				'ftgs_qcs_id'=>$editId,
				
				'ftgs_qcs_sub_date' => $date,
				'ftgs_sup1_nm'=>$this->input->post('txt_sup1_nm'),
				'ftgs_sup1_contact_no'=>$this->input->post('txt_sup1_mno'),
				'ftgs_sup1_contact_person'=>$this->input->post('txt_sup1_contactp'),
				'ftgs_sup1_eid'=>$this->input->post('txt_sup1_eid'),
				
				
				'ftgs_sup2_nm'=>$this->input->post('txt_sup2_nm'),
				'ftgs_sup2_contact_no'=>$this->input->post('txt_sup2_mno'),
				'ftgs_sup2_contact_person'=>$this->input->post('txt_sup2_contactp'),
				'ftgs_sup2_eid'=>$this->input->post('txt_sup2_eid'),
				
				'ftgs_sup3_nm'=>$this->input->post('txt_sup3_nm'),
				'ftgs_sup3_contact_no'=>$this->input->post('txt_sup3_mno'),
				'ftgs_sup3_contact_person'=>$this->input->post('txt_sup3_contactp'),
				'ftgs_sup3_eid'=>$this->input->post('txt_sup3_eid'),
				
            );
            
            $this->ftgs_model->ftgsUpdateStepOne($editId ,$data1);
           
			$this->load->helper('url');
			 $data['ftgs_qcs_id']=$editId;
			$this->load->view('FTGSPR/QCS_DraftStepTwo',$data);
		}
		
		
		//qcs draft step2 attachment
  
		function filefetchqcs($ftgs_qcs_id)
{
	
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');  
			$data['files']=$this->ftgs_model->filefetch_qcs($ftgs_qcs_id);  
		   return  $data['files'];
				  
}



//updating file in qcs quotation

 //updating item code method
 public function updateFtgsFile(){
     
    // echo "testing function update item code.....";
 
	  $this->load->helper('url');
	  $this->load->database();
	 
	$qcs_folder_Name = preg_replace('/\s+/', '', $this->input->post('qcs_folder_Name'));
	echo "printing folder name as qcs id".$qcs_folder_Name;
//	echo 'in the method of updateItemCode';
//	echo '<br> showing file name here........'.$_FILES['picture']['name']; 
    if(!empty($_FILES['picture']['name'])){
                 echo 'in if condtions......';
		//echo '<br> showing file name in if condition............'.$_FILES['picture']['name']; 
            	
				
	
		//	echo "<br>folderrrrr nm---->".$qcs_folder_Name;
				$config['upload_path'] ='uploads/Ftgs_qcs/'.$qcs_folder_Name.'/';
		//		echo "folder path:-------> ".$config['upload_path'];
			    $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['picture']['name'];
          //       echo 'in if condtion printing '. $config['file_name'] ;
                //  echo 'in if condtion'.$_FILES['picture']['name'];
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
				'ftgs_qcs_file_nm'=>$picture
				);
                $this->db->where('ftgs_fQcs_id', $this->input->post('qcs_file_id'));
                $this->db->update('qcsfile_master', $data);
               
            
           
                 $this->load->helper('url');
                 //$this->load->view('QCS/home');
                 echo '<script>window.history.back();</script>';
           
          
        }
		
		
		//Delete quotation file 
		
		public function draftDeleteFile($ftgs_fQcs_id)
   {

		$delFileID=$this->input->post('ftgs_fQcs_id');
		//echo "file id---->".$delFileID;
			
	   $this->db->where('ftgs_fQcs_id',$ftgs_fQcs_id);
	   $this->db->delete('qcsfile_master');
	   
	   $this->load->helper('url');
	 echo '<script>window.history.back();</script>';
   }
   
   		function getQcsApproval2Autho() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getQcsApproval2Autho();
        return $data;
    }
	
	
	   //QCS draft technical specificatio display 
			 function ftgsqcsTechDetails($ftgs_qcs_id)
			{
				
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  	
				$data['qcs_tech']=$this->ftgs_model->ftgsqcsTechDetails($ftgs_qcs_id);  		  		
				return  $data['qcs_tech'];
					  
			}
   //Dragt step 2
   
   public function DraftinsertQcsSteptwo(){
	  date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$qcs_status=$this->input->post('rdo_qcsftgs_status');
			$qcs_emp_code=$this->input->post('txt_emp_code');
			$editId=$this->input->post('txtftgsId');
			
			$attachment_flag = $this->input->post('ftgs_additional_attachment');
			$attachment_check =$this->input->post('attachment_check');
			
			
			if($qcs_status==1)
			{
				if($attachment_flag ==''){
						$tech_det_sup1=htmlentities($this->input->post('tech_det_sup1'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
						$tech_det_sup2=htmlentities($this->input->post('tech_det_sup2'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
						$tech_det_sup3=htmlentities($this->input->post('tech_det_sup3'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
			    	
				
				//technical speci update 
				$datatechSpec = array(
'ftgs_tech_det_sup1' => $tech_det_sup1,
'ftgs_tech_det_sup2' => $tech_det_sup2,
'ftgs_tech_det_sup3' => $tech_det_sup3,

'ftgs_credibility_sup1' => $this->input->post('supplier1_checked'),
'ftgs_credibility_sup2' => $this->input->post('supplier2_checked'),
'ftgs_credibility_sup3' => $this->input->post('supplier3_checked'),

'ftgs_insurance_sup1' => $this->input->post('supplier1_insurance'),
'ftgs_insurance_sup2' => $this->input->post('supplier2_insurance'),
'ftgs_insurance_sup3' => $this->input->post('supplier3_insurance'),

'ftgs_del_period_sup1' => $this->input->post('delivery_period_sup1'),
'ftgs_del_period_sup2' => $this->input->post('delivery_period_sup2'),
'ftgs_del_period_sup3' => $this->input->post('delivery_period_sup3'),

'ftgs_del_mode_sup1' => $this->input->post('delivery_mode_sup1'),
'ftgs_del_mode_sup2' => $this->input->post('delivery_mode_sup2'),
'ftgs_del_mode_sup3' => $this->input->post('delivery_mode_sup3'),

'ftgs_inspection_sup1' => $this->input->post('supplier1_testing'),
'ftgs_inspection_sup2' => $this->input->post('supplier2_testing'),
'ftgs_inspection_sup3' => $this->input->post('supplier3_testing'),

'ftgs_pymt_terms_sup1' => $this->input->post('pay_terms_sup1'),
'ftgs_pymt_terms_sup2' => $this->input->post('pay_terms_sup2'),
'ftgs_pymt_terms_sup3' => $this->input->post('pay_terms_sup3'),

'ftgs_warranty_sup1' => $this->input->post('warranty_sup1'),
'ftgs_warranty_sup2' => $this->input->post('warranty_sup2'),
'ftgs_warranty_sup3' => $this->input->post('warranty_sup3'),

'ftgs_scope_instal_sup1' => $this->input->post('scope_inst_sup1'),
'ftgs_scope_instal_sup2' => $this->input->post('scope_inst_sup2'),
'ftgs_scope_instal_sup3' => $this->input->post('scope_inst_sup3'),


'ftgs_taxes_duties_sup1' => $this->input->post('sup1_taxes'),
'ftgs_taxes_duties_sup2' => $this->input->post('sup2_taxes'),
'ftgs_taxes_duties_sup3' => $this->input->post('sup2_taxes'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_validity_price_sup1' => $this->input->post('price_sup1'),
'ftgs_validity_price_sup2' => $this->input->post('price_sup2'),
'ftgs_validity_price_sup3' => $this->input->post('price_sup3'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_repl_scope_sup1' => $this->input->post('repl_sup1'),
'ftgs_repl_scope_sup2' => $this->input->post('repl_sup2'),
'ftgs_repl_scope_sup3' => $this->input->post('repl_sup3'),
'ftgs_tech_spec_date' => $date,
				
				);
				$this->ftgs_model->updatedraftTechSpec($editId,$datatechSpec);
				//end

					//qcs master data start 
				$data1 = array(
					'ftgs_qcs_status'=> 1 , //drfat status
					'ftgs_justification_supplier' => $this->input->post('draftjustification_sup'),
					'ftgs_additional_attachment' =>preg_replace('/\s+/', '_', $_FILES['ftgs_additional_attachment']['name']),
					'ftgs_qcs_sub_date'=>$date,
					'ftgs_outside_budget'=>$this->input->post('draft_outside_budget'),
					'ftgs_just_outside_budget'=>$this->input->post('just_draft_outside_budget'),
					//'pr_value'=>$this->input->post('order_value'),
					'ftgs_non_properitery_item'=>$this->input->post('draft_advance_nonproprietery'),
					'ftgs_just_adv_nonproprietery'=>$this->input->post('draft_just_adv_nonprop'),

					'ftgs_properitery_item'=>$this->input->post('draft_advance_proprietery'),
					'ftgs_just_adv_proprietery'=>$this->input->post('draft_just_adv_prop'),

					'ftgs_post_grn_nonproprietary'=>$this->input->post('draft_final_payment_grn'),
					'ftgs_just_final_payment_grn'=>$this->input->post('draft_just_final_pay_grn'),

					'ftgs_post_grn_proprietary'=>$this->input->post('draft_final_payment_post_grn'),
					'ftgs_just_final_pymt_post_grn'=>$this->input->post('draft_just_final_pay_post_grn'),

					'ftgs_delivery_terms'=>$this->input->post('draft_delivery_gate'),
					'ftgs_just_delivery_gate'=>$this->input->post('draft_just_delivery_gate'),


					'ftgs_cost_reimb_cust'=>$this->input->post('draft_cost_reimb_cust'),
					'ftgs_just_cost_reimb_cust'=>$this->input->post('draft_just_cost_reimb_cust'),


					'ftgs_repl_cost_agreed'=>$this->input->post('draft_repl_cost_agreed'),
					'ftgs_just_repl_cost_agree'=>$this->input->post('draft_just_repl_cost_agree'),

              
				);
				
			
				
				//additional_attachment attachment 	
 if (!empty($_FILES['ftgs_additional_attachment']['name'])) {
	 //single file upload 
                chmod('./uploads/ftgs_additional_attachment/', 0777);
$path   = './uploads/ftgs_additional_attachment/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
		 	
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);
if($this->upload->do_upload('ftgs_additional_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
				
            } 
			$this->ftgs_model->ftgsUpdateStepOne($editId,$data1);	
}
				

else
{
						$tech_det_sup1=htmlentities($this->input->post('tech_det_sup1'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
						$tech_det_sup2=htmlentities($this->input->post('tech_det_sup2'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
						$tech_det_sup3=htmlentities($this->input->post('tech_det_sup3'),ENT_QUOTES | ENT_IGNORE,"UTF-8");
						
						
						//technical speci update 
				$datatechSpec = array(
'ftgs_tech_det_sup1' => $tech_det_sup1,
'ftgs_tech_det_sup2' => $tech_det_sup2,
'ftgs_tech_det_sup3' => $tech_det_sup3,

'ftgs_credibility_sup1' => $this->input->post('supplier1_checked'),
'ftgs_credibility_sup2' => $this->input->post('supplier2_checked'),
'ftgs_credibility_sup3' => $this->input->post('supplier3_checked'),

'ftgs_insurance_sup1' => $this->input->post('supplier1_insurance'),
'ftgs_insurance_sup2' => $this->input->post('supplier2_insurance'),
'ftgs_insurance_sup3' => $this->input->post('supplier3_insurance'),

'ftgs_del_period_sup1' => $this->input->post('delivery_period_sup1'),
'ftgs_del_period_sup2' => $this->input->post('delivery_period_sup2'),
'ftgs_del_period_sup3' => $this->input->post('delivery_period_sup3'),

'ftgs_del_mode_sup1' => $this->input->post('delivery_mode_sup1'),
'ftgs_del_mode_sup2' => $this->input->post('delivery_mode_sup2'),
'ftgs_del_mode_sup3' => $this->input->post('delivery_mode_sup3'),

'ftgs_inspection_sup1' => $this->input->post('supplier1_testing'),
'ftgs_inspection_sup2' => $this->input->post('supplier2_testing'),
'ftgs_inspection_sup3' => $this->input->post('supplier3_testing'),

'ftgs_pymt_terms_sup1' => $this->input->post('pay_terms_sup1'),
'ftgs_pymt_terms_sup2' => $this->input->post('pay_terms_sup2'),
'ftgs_pymt_terms_sup3' => $this->input->post('pay_terms_sup3'),

'ftgs_warranty_sup1' => $this->input->post('warranty_sup1'),
'ftgs_warranty_sup2' => $this->input->post('warranty_sup2'),
'ftgs_warranty_sup3' => $this->input->post('warranty_sup3'),

'ftgs_scope_instal_sup1' => $this->input->post('scope_inst_sup1'),
'ftgs_scope_instal_sup2' => $this->input->post('scope_inst_sup2'),
'ftgs_scope_instal_sup3' => $this->input->post('scope_inst_sup3'),


'ftgs_taxes_duties_sup1' => $this->input->post('sup1_taxes'),
'ftgs_taxes_duties_sup2' => $this->input->post('sup2_taxes'),
'ftgs_taxes_duties_sup3' => $this->input->post('sup2_taxes'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_validity_price_sup1' => $this->input->post('price_sup1'),
'ftgs_validity_price_sup2' => $this->input->post('price_sup2'),
'ftgs_validity_price_sup3' => $this->input->post('price_sup3'),

'ftgs_note_sup1' => $this->input->post('sup1_note'),
'ftgs_note_sup2' => $this->input->post('sup2_note'),
'ftgs_note_sup3' => $this->input->post('sup3_note'),

'ftgs_repl_scope_sup1' => $this->input->post('repl_sup1'),
'ftgs_repl_scope_sup2' => $this->input->post('repl_sup2'),
'ftgs_repl_scope_sup3' => $this->input->post('repl_sup3'),
'ftgs_tech_spec_date' => $date,
				
				);
				$this->ftgs_model->updatedraftTechSpec($editId,$datatechSpec);
				//end
				
				
					//qcs master data start 
				$data1 = array(
					'ftgs_qcs_status'=> 1 , //drfat status
					'ftgs_justification_supplier' => $this->input->post('draftjustification_sup'),
					'ftgs_additional_attachment' =>$attachment_check,
					'ftgs_qcs_sub_date'=>$date,
					'ftgs_outside_budget'=>$this->input->post('draft_outside_budget'),
					'ftgs_just_outside_budget'=>$this->input->post('just_draft_outside_budget'),
					//'pr_value'=>$this->input->post('order_value'),
					'ftgs_non_properitery_item'=>$this->input->post('draft_advance_nonproprietery'),
					'ftgs_just_adv_nonproprietery'=>$this->input->post('draft_just_adv_nonprop'),

					'ftgs_properitery_item'=>$this->input->post('draft_advance_proprietery'),
					'ftgs_just_adv_proprietery'=>$this->input->post('draft_just_adv_prop'),

					'ftgs_post_grn_nonproprietary'=>$this->input->post('draft_final_payment_grn'),
					'ftgs_just_final_payment_grn'=>$this->input->post('draft_just_final_pay_grn'),

					'ftgs_post_grn_proprietary'=>$this->input->post('draft_final_payment_post_grn'),
					'ftgs_just_final_pymt_post_grn'=>$this->input->post('draft_just_final_pay_post_grn'),

					'ftgs_delivery_terms'=>$this->input->post('draft_delivery_gate'),
					'ftgs_just_delivery_gate'=>$this->input->post('draft_just_delivery_gate'),


					'ftgs_cost_reimb_cust'=>$this->input->post('draft_cost_reimb_cust'),
					'ftgs_just_cost_reimb_cust'=>$this->input->post('draft_just_cost_reimb_cust'),


					'ftgs_repl_cost_agreed'=>$this->input->post('draft_repl_cost_agreed'),
					'ftgs_just_repl_cost_agree'=>$this->input->post('draft_just_repl_cost_agree'),

              
				);

			 $this->ftgs_model->ftgsUpdateStepOne($editId,$dataupdate);   	
}	
				
			if (!empty($_FILES['upload_data']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data']['name'], $_FILES['upload_data'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			if (!empty($_FILES['upload_data2']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data2']['name'], $_FILES['upload_data2'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			if (!empty($_FILES['upload_data3']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data3']['name'], $_FILES['upload_data3'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data4']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data4']['name'], $_FILES['upload_data4'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data5']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data5']['name'], $_FILES['upload_data5'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			
			if (!empty($_FILES['upload_data6']['name'][0])) {
                if ($this->upload_files1($_FILES['upload_data6']['name'], $_FILES['upload_data6'], $editId) === FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
					
						?>
                <script type="text/javascript">
                    alert("Your Files Uploaded Successfully");
                </script>
            <?php
					
                }
				
            }
			else{
				
				
			}
			
			
			
			
    ?>
                <script type="text/javascript">
                    alert("Your QCS Updated with QCS ID <?php echo $draft_qcs_no; ?>");
                </script>
				
            <?php	
			
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_DrfatTbl');
			
			}
			else{
				$dataupdate = array(
				'ftgs_qcs_status'=> 2 , //submitted to approval1 
				'ftgs_qcs_sub_date' => $date,
               
				);
				$this->ftgs_model->ftgsUpdateStepOne($editId,$dataupdate);
				
				
				$data2 = array(
				'ftgs_qcs_id'=> $this->input->post('txtftgsId'),
                'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_sourcingApp2'),
                'level_of' => 5,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
           
            $this->ftgs_model->ftgsProcessRepAutho5($data2);
				//email code 
				//email end 
				
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_DrfatTbl');
			}
		
   }
	

			//Authority approval table 
			public function QCS_AuthorityPending_FTGS_tbl(){
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
			}	
			
			
				//QCS Approval 1 pendding table
			function QcsApproval1_fetchPendingFTGSpr($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->QcsApproval1_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		
		
		//Pending tbl for qcs user 
			function fetchPendingQcsUser($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->fetchPendingQcsUser($emp_code);
			return $data['pendingList'];
		}
		
		
		//QCS View
		
		public function QCS_FtgsView($ftgs_qcs_id){
				$data['ftgs_qcs_id'] = $ftgs_qcs_id;
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_FtgsView',$data);
		}
		
		//Qcs Approval Process
			function qcs_approval_status($ftgs_qcs_id) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['approval'] = $this->ftgs_model->qcs_approval_status($ftgs_qcs_id);
        return $data['approval'];
    }
	
	//view approal 1 (100258)
		public function QCS_Approval1Ftgs_View($ftgs_qcs_id){
				$data['ftgs_qcs_id'] = $ftgs_qcs_id;
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_Approval1Ftgs_View',$data);
		}
		//fetch Approval 1 Autho level
		 function ftgsApproval1Action($emp_code,$ftgs_qcs_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApproval1Action($emp_code,$ftgs_qcs_id);
			return $data['ftgsActionData'];
		}	
		
		//Approval 2 Autho details
				function getApproval2AuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getApproval2AuthoDetails();
        return $data;
    }
		//Approve / reject of approval 1
		public function QcsApproval1_insert()
		{
		date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcs_emp_nm= $this->input->post('qcs_emp_nm');
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_approval2_Autho'),
                'level_of' => 6,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            
            //email Code
                    $reciver= 'ppshroff@ruchagroup.com';  //rud mail
					
					$ccuser='kakhadke@ruchagroup.com'; //skshahed 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_qcs_status' => 3   //Reject qcs 
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= 'pdmane@ruchagroup.com';   //qcs owner
								
					$subject='Interplant FTGS QCS Rejected By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
		}
		
		
				//QCS Approval 2 pendding table
			function QcsApproval2_fetchPendingFTGSpr($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->QcsApproval2_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		
		//view approval 2(100297)
		public function QCS_Approval2Ftgs_View($ftgs_qcs_id){
				$data['ftgs_qcs_id'] = $ftgs_qcs_id;
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_Approval2Ftgs_View',$data);
		}
		
		
			//Approval 3 Autho details
				function getApproval3AuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['autho_code'] = $this->ftgs_model->getApproval3AuthoDetails();
        return $data;
    }
	
	
		//fetch Approval 2 Autho level
		 function ftgsApproval2Action($emp_code,$ftgs_qcs_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApproval2Action($emp_code,$ftgs_qcs_id);
			return $data['ftgsActionData'];
		}
		
		
		//Approval 2 insert 
		public function QcsApproval2_insert(){
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcs_emp_nm= $this->input->post('qcs_emp_nm');
			$ftgs_qcs_item_id =$this->input->post('qcsItemId'); //for temp use
			
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_approval3_Autho'),
                'level_of' => 7,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			$data3 = array(
				'ftgs_qcs_item_id'=>$this->input->post('qcsItemId'),
				'amt_per_add'=>$this->input->post('add10per'),
				'per_final_amt'=>$this->input->post('txt_10_amt'),
			);
			
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            $this->ftgs_model->updateQcsItemData($data3,$editId,$ftgs_qcs_item_id);
			
            //email Code
                    $reciver= 'ppshroff@ruchagroup.com';  //MID mail
					
					$ccuser='kakhadke@ruchagroup.com'; //skshahed 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_qcs_status' => 3 //Reject QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= 'pdmane@ruchagroup.com';   //qcs owner
								
					$subject='Interplant FTGS QCS Rejected By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
		}
		
		
		//In Autority reject table 
		public function fetchAuthoRejectTbl($emp_code){
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['phrejectList'] = $this->ftgs_model->fetchAuthoRejectTbl($emp_code);
			return $data['phrejectList'];
		}
		
		
		//Reject qcs move to draft 
		public function RejectForwordToDraft(){
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			
			if ($action == "1") {
            $data = array(
				
				'ftgs_qcs_status' => 1,
				
            );
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data);
			 $this->load->helper('url');
			$this->load->view('FTGSPR/QCS_DrfatTbl');
			}
		}
		
		
		
			//QCS Approval 3 pendding table
			function QcsApproval3_fetchPendingFTGSpr($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->QcsApproval3_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		
		
		//approval 3 view 
		
		public function QCS_Approval3Ftgs_View($ftgs_qcs_id){
				$data['ftgs_qcs_id'] = $ftgs_qcs_id;
				$this->load->helper('url');
				$this->load->view('FTGSPR/QCS_Approval3Ftgs_View',$data);
		}
		
				
			//Approval 4 Autho details
				function getApproval4AuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['authoData'] = $this->ftgs_model->getApproval4AuthoDetails();
        return $data['authoData'];
    }
		
	
		//fetch action ID
		 function ftgsApproval3Action($emp_code,$ftgs_qcs_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApproval3Action($emp_code,$ftgs_qcs_id);
			return $data['ftgsActionData'];
		}

		//QCS owner wmail 

	   function fetchemp_email($emp_code)//Full emp email  from employee master
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['emp_email']=$this->pr_model->fetchemp_email($emp_code);  		  		
	return  $data;
}	


//inser approval 3

			public function QcsApproval3_insert(){
				date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcs_emp_nm= $this->input->post('qcs_emp_nm');
			
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_approval4_Autho'),
                'level_of' => 8,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			
			
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
           
            //email Code
                    $reciver= $this->input->post('txt_authoEmail');  //SJ mail
					
					$ccuser= $this->input->post('txt_QCSUseremail'); //qcs owner 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_qcs_status' => 3 //Reject QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txt_QCSUseremail');   //qcs owner
								
					$subject='Interplant FTGS QCS Rejected By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
				
			}
			
			
			//insert approval 4 QcsApproval4_fetchPendingFTGSpr
			function QcsApproval4_fetchPendingFTGSpr($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->QcsApproval4_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		
		
					//Approval 5 Autho details
				function getApproval5AuthoDetails() {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['authoData'] = $this->ftgs_model->getApproval5AuthoDetails();
        return $data['authoData'];
    }
	
	
	
		//fetch action ID
		 function ftgsApproval4Action($emp_code,$ftgs_qcs_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApproval4Action($emp_code,$ftgs_qcs_id);
			return $data['ftgsActionData'];
		}
	
			//approval 4 insert
	public function QcsApproval4_insert()
	{
		
		date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcs_emp_nm= $this->input->post('qcs_emp_nm');
			$aut5ID = $this->input->post('txt_approval5_Autho');
			
			if ($action == "1" && $aut5ID == "100098") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_approval5_Autho'),
                'level_of' => 9,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			
			
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
           
            //email Code
                    $reciver= $this->input->post('txt_authoEmail');  //MD office mail
					
					$ccuser= $this->input->post('txt_QCSUseremail'); //qcs owner 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		
		
		else if($action == "1" && $aut5ID != "100098")
		{
			$data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_prOwnerEmpCode'),
                'level_of' => 10,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			 $data1 = array(
                'ftgs_qcs_status' => 4 //Final Approved QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
			
			
			
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
           
            //email Code
                    $reciver= $this->input->post('txt_PRUseremail');  //user mail
					
					$ccuser= $this->input->post('txt_QCSUseremail'); //qcs owner 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
		}
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_qcs_status' => 3 //Reject QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txt_QCSUseremail');   //qcs owner
								
					$subject='Interplant FTGS QCS Rejected By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
				
	}
	
	
	
	//insert approval 5 QcsApproval4_fetchPendingFTGSpr
			function QcsApproval5_fetchPendingFTGSpr($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->QcsApproval5_fetchPendingFTGSpr($emp_code);
			return $data['pendingList'];
		}
		
		
		
		
		//fetch action ID
		 function ftgsApproval5Action($emp_code,$ftgs_qcs_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApproval5Action($emp_code,$ftgs_qcs_id);
			return $data['ftgsActionData'];
		}
		
		
		
		//approval 5 insert
		public function QcsApproval5_insert(){
		
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('txtftgsId');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$qcs_emp_nm= $this->input->post('qcs_emp_nm');
			$aut5ID = $this->input->post('txt_approval5_Autho');
			
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('txt_prOwnerEmpCode'),
                'level_of' => 10,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			 $data1 = array(
                'ftgs_qcs_status' => 4 //Final Approved QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
			
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
           
            //email Code
                    $reciver= $this->input->post('txt_PRUseremail');  //user PR mail
					
					$ccuser= $this->input->post('txt_QCSUseremail'); //qcs owner 
					$subject='Interplant FTGS QCS Approved By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
            
		}
		
		
		
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_qcs_status' => 3 //Reject QCS
            );
          
            $this->db->where('ftgs_qcs_id', $editId);
            $this->db->update('ftgs_qcs_master', $data1);
            $this->ftgs_model->updateQCSuserAction($data, $editId, $Ftgs_action_id);
            
            // Email Code Start-
					//$reciver= $this->input->post('txtPHAuthoEmail');  //PH email
					$reciver= $this->input->post('txt_QCSUseremail');   //qcs owner
								
					$subject='Interplant FTGS QCS Rejected By '.$qcs_emp_nm.' Against  QCS NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
         }
		 $this->load->helper('url');
		$this->load->view('FTGSPR/QCS_AuthorityPending_FTGS_tbl');
		}
		
		
		//user section approved  table
	function fetchApprovedQcsUser($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pendingList'] = $this->ftgs_model->fetchApprovedQcsUser($emp_code);
        return $data['pendingList'];
    }
	
	
			//user section Reject  table
	function RejectedQcsForUser($emp_code) {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Ftgs_PR/ftgs_model');
        $data['pendingList'] = $this->ftgs_model->RejectedQcsForUser($emp_code);
        return $data['pendingList'];
    }
	
	
	/************* CAPEX Process (2020-04-15) *****************/
	
	
	//Create capex
	public function capexCreateTbl()
	{
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/CAPEX_create_tbl');
	}
	
	
		//FTGS CAPEX Create tbl
		public function CapexCreteCount($emp_code)
   {
		$this->load->database();  
		$this->load->model('Ftgs_PR/ftgs_model');  
		$data['approve']=$this->ftgs_model->CapexCreteCount($emp_code);    
		return  $data['approve'];
	}
	
	
	
		
		//fetch pr qcs detail inner join
	   function pr_qcs_detail_capex($ftgs_qcs_id)
{
	
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  	
				$data['qcs_detail']=$this->ftgs_model->pr_qcs_detail_capex($ftgs_qcs_id);  		  		
				return  $data['qcs_detail'];
		  
}

			public function CAPEX_CreateView($ftgs_qcs_id){
				$data['ftgs_qcs_id'] = $ftgs_qcs_id;
				$this->load->helper('url');
				$this->load->view('FTGSPR/CAPEX_CreateView',$data);
			}

		//GL Code List 
			public function glCodeList(){
				$this->load->database();  
				$this->load->model('purchase/Capex_model');  
				 $data['glCode']=$this->Capex_model->glCodeList();  
				return  $data['glCode'];
			}
			
		//GL Code List 
		public function revenu_glCodeList(){
			$this->load->database();  
			$this->load->model('purchase/Capex_model');  
			 $data['glCode']=$this->Capex_model->revenu_glCodeList();  
			return  $data['glCode'];
}	
	//Full Department name from dept_master	  
	   function fetch_dept_nm($emp_dept)
{
	
	$this->load->database();  
    $this->load->model('purchase/pr_model');  	
	$data['dept_name']=$this->pr_model->fetch_dept_nm($emp_dept);  		  		
	return  $data;
}		
			
			
			
				//insert capex 
				
		public function ftgs_insert_capex(){
				date_default_timezone_set('Asia/Kolkata');
					$date = date('d-m-Y');
					$time = date("h:i A");
				 
				 $qcs_id =$this->input->post('cap_qcs_no'); 
				  $Ftgs_action_id= $this->input->post('Ftgs_action_id'); 
 
  $data = array(
		  'ftgs_qcs_emp_code' => $this->input->post('qcs_emp_code'),
		  'ftgs_capex_owner_code'=>$this->input->post('capex_emp_code'),
		  'ftgs_pr_id'=> $this->input->post('cap_pr_no'),
		  'ftgs_qcs_id'=> $this->input->post('cap_qcs_no'),
		 
		'ftgs_fund_no' => $this->input->post('fund_no'),
		'ftgs_master_gl_code' => $this->input->post('asset_gl_code'),
		'ftgs_radio_val'=> $this->input->post('yesno'),
		'ftgs_actual_gl_code' => $this->input->post('capitalGlCode1'),
		'ftgs_actual_gl_code2' => $this->input->post('capitalGlCode2'),
		'ftgs_actual_gl_code3' => $this->input->post('capitalGlCode3'),
		'ftgs_amtGlCode1' => $this->input->post('amtGlCode1'),
		'ftgs_amtGlCode2' => $this->input->post('amtGlCode2'),
		'ftgs_amtGlCode3' => $this->input->post('amtGlCode3'),
	
		'ftgs_revenue_gl_code1' => $this->input->post('revenuGlCode1'),
		'ftgs_revenue_gl_code2' => $this->input->post('revenuGlCode2'),
		'ftgs_amtRevenueGlCode1' => $this->input->post('amtRevenueGlCode1'),
		'ftgs_amtRevenueGlCode2' => $this->input->post('amtRevenueGlCode2'),
		
		'ftgs_budget_no' => $this->input->post('budget_sr_no'),
		'ftgs_proj_comp_date' => $this->input->post('proj_comp_date'),
		'ftgs_cap_recommender' => $this->input->post('cap_recommender'),
		
		'ftgs_cap_unit' => $this->input->post('cap_comp_unit'),
		'ftgs_capex_type' => $this->input->post('cap_capex_type'),
		'ftgs_bussiness_plan' => $this->input->post('cap_fin_year'),


		'ftgs_approved_proj' => $this->input->post('cap_approve_proj'),
		'ftgs_des_capex' => $this->input->post('cap_brief_background'),
		//'fin_just_capex' => $this->input->post('cap_fincial_justi'),
		'ftgs_cap_sel_supplier' => $this->input->post('cap_supllier'),
		'ftgs_credibility_check' => $this->input->post('cap_credibility_check'),
		'ftgs_quant_capex' => $this->input->post('cap_quan_total_amt'),
		'ftgs_basis_price' => $this->input->post('cap_basis_price'),
		'ftgs_pay_term' => $this->input->post('cap_payment_term'),
			'ftgs_warranties_capex' => $this->input->post('cap_warranty'),
			'ftgs_bank_guarantees' => $this->input->post('cap_bank_gurantee'),
			'ftgs_delivery_peformace' => $this->input->post('cap_penalties_involved'),


			'ftgs_scope_supply' => $this->input->post('cap_specfic_exclusion'),
			'ftgs_noteworthy_capex' => $this->input->post('cap_noteworthy_cond'),
			'ftgs_technical_aspect' => $this->input->post('cap_tech_asp'),

			'ftgs_estimated_associated' => $this->input->post('estimated_associated'),
			'ftgs_capex_attachment' =>preg_replace('/\s+/', '_', $_FILES['ftgs_capex_attachment']['name']),
			'ftgs_capex_status' => 0,
			'ftgs_capex_date'=>$date,

);



		
		
				//capex_attachment attachment 	
 if (!empty($_FILES['ftgs_capex_attachment']['name'])) {//single file upload 
                chmod('./uploads/ftgs_capex_attachment/', 0777);
$path   = './uploads/ftgs_capex_attachment/';
if (!is_dir($path)) { //create the folder if it's not already exists
    mkdir($path, 0777, TRUE);
}
//	echo "path ----".$path;
         $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

      
            $this->upload->initialize($config);
if($this->upload->do_upload('ftgs_capex_attachment')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
			
			$result=$this->ftgs_model->ftgs_insert_capex($data);
	
	   $row = $this->db->query('SELECT MAX(ftgs_capex_id) AS `maxid` FROM `ftgs_capex_master`')->row();
if ($row) {
	$capex_id=$row->maxid;
  }
  //capex gen col update 
 $capex_gen_up =  array(
		'ftgs_capex_gen' => $capex_id,
 );
   $capex_gen_up=$this->ftgs_model->capex_gen_update($qcs_id,$capex_gen_up);
   
   	$dataID = array(
				'ftgs_capex_id'=>$capex_id,
            );
            
            $this->ftgs_model->updateFtgsQCSID($dataID, $qcs_id, $Ftgs_action_id);
   
  ?>
                <script type="text/javascript">
                    alert("Your CAPEX Recoarded as Draft with Capex ID <?php echo $capex_id; ?>");
                </script>
            <?php
        $this->load->helper('url');
		$this->load->view('FTGSPR/CAPEX_draft_tbl');
		}		
	
	
	//Item code update 
	public function updateItemCodeEdit (){
		
		$id=$this->input->post('qcs_item_idEdit');
		$data = array(
				'ftgs_q_item_code' => $this->input->post('itm_codeEdit'),
		);
		$item_upd=$this->ftgs_model->update_qcs_item($id,$data);
		
		  echo '<script>window.history.back();</script>';
	}

			//Draft table list
			public function CAPEX_draft_tbl(){
				  $this->load->helper('url');
					$this->load->view('FTGSPR/CAPEX_draft_tbl');
			}
	
	
			//Draft Table data 
			public function CapextDraftData($emp_code){
				$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->CapextDraftData($emp_code);
			return $data['ftgsActionData'];
			}
			
			
			//Draft view 
			public function CAPEX_DraftView($ftgs_capex_id){
					$data['ftgs_capex_id'] = $ftgs_capex_id;
					$this->load->helper('url');
					$this->load->view('FTGSPR/CAPEX_DraftView',$data);
			}
			
			//fetch capex details 
			public function capex_detail($ftgs_capex_id){
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  	
				$data['capex_detail']=$this->ftgs_model->capex_detail($ftgs_capex_id);  		  		
				return  $data['capex_detail'];
			}
			
			//qcs item for asset code (All)
		public function qcs_items_assetcode_new($ftgs_capex_id){
				$this->load->database();  
				$this->load->model('Ftgs_PR/ftgs_model');  
				$data['item_view']=$this->ftgs_model->qcs_items_assetcode_new($ftgs_capex_id);  
				return  $data['item_view'];
		  
	}
	
	
	//Asset group list 
		public function asset_grp(){
			$this->load->database();  
			$this->load->model('purchase/Capex_model');  
			 $data['assetgrp']=$this->Capex_model->asset_grp();  
			return  $data['assetgrp'];
}

			//view qcs item  and ammount 
	   function qcs_items_capex($ftgs_capex_id)
{
	
			$this->load->database();  
			$this->load->model('Ftgs_PR/ftgs_model');  
			$data['item_view']=$this->ftgs_model->view_qcs_items($ftgs_capex_id);  
			return  $data['item_view'];
		  
}


		
			//Add Cost center method

		
		 public function insertCostCenterDetails()
		 {
		date_default_timezone_set('Asia/Kolkata');
					$date = date('d-m-Y');
					$time = date("h:i A");
		$temp = count($this->input->post('txtCapexId'));
		$txtCapexId = $this->input->post('txtCapexId');
        $draft_txt_cost_cent = $this->input->post('draft_txt_cost_cent');
        $draft_txt_asset_grp = $this->input->post('draft_txt_asset_grp');
		
						 for($i=0; $i<$temp; $i++){

				$txtCapexId  =   $this->input->post('txtCapexId');
				$draft_txt_cost_cent  =   $this->input->post('draft_txt_cost_cent');
				$draft_txt_asset_grp  =  $this->input->post('draft_txt_asset_grp');
				$draft_txt_qcs_itm = $this->input->post('draft_txt_qcs_itm');
				$txtQcsId = $this->input->post('txtQcsId');

				  if(  $draft_txt_asset_grp[$i]!= '') { 
					//echo "in draft_txt_asset_grp if condition......";				  
				$data[] = array(
					  'ftgs_qcs_id' =>$txtQcsId[$i],
					 'ftgs_capex_id'=>$txtCapexId[$i],
					 'ftgs_qcs_item_id'=>$draft_txt_qcs_itm[$i],
					 'ftgs_cost_center'=>$draft_txt_cost_cent[$i],
					 'ftgs_asset_grp' =>$draft_txt_asset_grp[$i],
					 'ftgs_asset_date'=>$date[$i]
					 );} }
					  $insert = count($data);

							if($insert)
							{
								//echo "in insert if condition......";
							$this->db->insert_batch('ftgs_asset_code', $data);
							}

							//return $insert;
						 echo '<script>window.history.back();</script>';
							
							
      } 

	  
	  //Draft capex 
	  
				public function ftgs_draft_capex(){
					date_default_timezone_set('Asia/Kolkata');
					$date = date('d-m-Y');
					$time = date("h:i A");
	$dft_capex_no = $this->input->post('dft_cno');
	$action =$this->input->post('capex_state');
	$capx_attachment = $this->input->post('ftgs_capex_attachment');
	$attachment_check =$this->input->post('capex_attac_flag');
	
	$Ftgs_action_id = $this->input->post('Ftgs_action_id');
	$editId	 = $this->input->post('ftgs_qcs_id');	
	$capOwnerNm	 = $this->input->post('capex_emp_nm');	
	
	if($capx_attachment==''){
		
	$data_update = array(
	'ftgs_fund_no'=>$this->input->post('dft_fund_no'),
	'ftgs_master_gl_code' =>$this->input->post('dft_asset_gl_code'),
	
	'ftgs_radio_val' => $this->input->post('yesno'),
	'ftgs_actual_gl_code' => $this->input->post('dft_capitalGlCode1'),
	'ftgs_actual_gl_code2' => $this->input->post('dftcapitalGlCode2'),
	'ftgs_actual_gl_code3' => $this->input->post('dftcapitalGlCode3'),
	'ftgs_amtGlCode1' => $this->input->post('dftamtGlCode1'),
	'ftgs_amtGlCode2' => $this->input->post('dftamtGlCode2'),
	'ftgs_amtGlCode3' => $this->input->post('dftamtGlCode3'),

	'ftgs_revenue_gl_code1' => $this->input->post('dftrevenuGlCode1'),
	'ftgs_revenue_gl_code2' => $this->input->post('dftrevenuGlCode2'),
	'ftgs_amtRevenueGlCode1' => $this->input->post('dftamtRevenueGlCode1'),
	'ftgs_amtRevenueGlCode2' => $this->input->post('dftamtRevenueGlCode2'),
	
	
	
	'ftgs_budget_no'=>$this->input->post('dft_budget_sr_no'),
	'ftgs_proj_comp_date'=>$this->input->post('dft_proj_comp_date'),
	'ftgs_cap_recommender' =>$this->input->post('dft_cap_recommender'),
	'ftgs_cap_unit' =>$this->input->post('dft_cap_comp_unit'),
	'ftgs_capex_type' =>$this->input->post('dft_cap_capex_type'),
	'ftgs_bussiness_plan'=>$this->input->post('dft_cap_fin_year'),
	'ftgs_approved_proj' =>$this->input->post('dft_cap_approve_proj'),
	//'fin_just_capex'=>$this->input->post('dft_asset_gl_code'),
	'ftgs_cap_sel_supplier' =>$this->input->post('dft_cap_supllier'),
	'ftgs_credibility_check' =>$this->input->post('dft_cap_credibility_check'),
	'ftgs_quant_capex'=>$this->input->post('dft_cap_quan_total_amt'),
	'ftgs_basis_price' =>$this->input->post('dft_cap_basis_price'),

	'ftgs_pay_term'=>$this->input->post('dft_cap_pay_term'),
	'ftgs_warranties_capex' =>$this->input->post('dft_cap_warranty'),
	'ftgs_bank_guarantees' =>$this->input->post('dft_cap_bank_gurantee'),
	'ftgs_delivery_peformace'=>$this->input->post('dft_cap_penalties_involved'),
	'ftgs_scope_supply'=>$this->input->post('dft_cap_specfic_exclusion'),
	'ftgs_noteworthy_capex'=>$this->input->post('dft_cap_noteworthy_cond'),
	'ftgs_technical_aspect'=>$this->input->post('dft_cap_tech_asp'),
	'ftgs_estimated_associated'=>$this->input->post('dft_estimated_associated'),
	'ftgs_capex_status'=>0,
	'ftgs_justification_capex'=>$this->input->post('justification_capex'),
	'ftgs_capex_attachment' =>preg_replace('/\s+/', '_', $_FILES['ftgs_capex_attachment']['name']),
	
		
	);
	
		
	//$draft_data_up = $this->Capex_model->capex_mast_update($dft_capex_no ,$data_update);
           	
	
	
				//capex_attachment attachment 	
 if (!empty($_FILES['ftgs_capex_attachment']['name'])) {//single file upload 
                chmod('./uploads/ftgs_capex_attachment/', 0777);
						$path   = './uploads/ftgs_capex_attachment/';
						if (!is_dir($path)) { //create the folder if it's not already exists
						mkdir($path, 0777, TRUE);
				}
							echo "path ----".$path;
							$config = array(
							'upload_path'   => $path,
							'allowed_types' => '*',
							'overwrite'     => 1,                       
							);

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if($this->upload->do_upload('ftgs_capex_attachment')){
	
								}
								
								
				
				$draft_data_up = $this->ftgs_model->capex_mast_update($dft_capex_no ,$data_update);
				
				 }

			

else{
				$data_update = array(
	'ftgs_fund_no'=>$this->input->post('dft_fund_no'),
	'ftgs_master_gl_code' =>$this->input->post('dft_asset_gl_code'),
	
	'ftgs_radio_val' => $this->input->post('yesno'),
	'ftgs_actual_gl_code' => $this->input->post('dft_capitalGlCode1'),
	'ftgs_actual_gl_code2' => $this->input->post('dftcapitalGlCode2'),
	'ftgs_actual_gl_code3' => $this->input->post('dftcapitalGlCode3'),
	'ftgs_amtGlCode1' => $this->input->post('dftamtGlCode1'),
	'ftgs_amtGlCode2' => $this->input->post('dftamtGlCode2'),
	'ftgs_amtGlCode3' => $this->input->post('dftamtGlCode3'),

	'ftgs_revenue_gl_code1' => $this->input->post('dftrevenuGlCode1'),
	'ftgs_revenue_gl_code2' => $this->input->post('dftrevenuGlCode2'),
	'ftgs_amtRevenueGlCode1' => $this->input->post('dftamtRevenueGlCode1'),
	'ftgs_amtRevenueGlCode2' => $this->input->post('dftamtRevenueGlCode2'),
	
	
	
	'ftgs_budget_no'=>$this->input->post('dft_budget_sr_no'),
	'ftgs_proj_comp_date'=>$this->input->post('dft_proj_comp_date'),
	'ftgs_cap_recommender' =>$this->input->post('dft_cap_recommender'),
	'ftgs_cap_unit' =>$this->input->post('dft_cap_comp_unit'),
	'ftgs_capex_type' =>$this->input->post('dft_cap_capex_type'),
	'ftgs_bussiness_plan'=>$this->input->post('dft_cap_fin_year'),
	'ftgs_approved_proj' =>$this->input->post('dft_cap_approve_proj'),
	//'fin_just_capex'=>$this->input->post('dft_asset_gl_code'),
	'ftgs_cap_sel_supplier' =>$this->input->post('dft_cap_supllier'),
	'ftgs_credibility_check' =>$this->input->post('dft_cap_credibility_check'),
	'ftgs_quant_capex'=>$this->input->post('dft_cap_quan_total_amt'),
	'ftgs_basis_price' =>$this->input->post('dft_cap_basis_price'),

	'ftgs_pay_term'=>$this->input->post('dft_cap_pay_term'),
	'ftgs_warranties_capex' =>$this->input->post('dft_cap_warranty'),
	'ftgs_bank_guarantees' =>$this->input->post('dft_cap_bank_gurantee'),
	'ftgs_delivery_peformace'=>$this->input->post('dft_cap_penalties_involved'),
	'ftgs_scope_supply'=>$this->input->post('dft_cap_specfic_exclusion'),
	'ftgs_noteworthy_capex'=>$this->input->post('dft_cap_noteworthy_cond'),
	'ftgs_technical_aspect'=>$this->input->post('dft_cap_tech_asp'),
	'ftgs_estimated_associated'=>$this->input->post('dft_estimated_associated'),
	'ftgs_capex_status'=>0,
	'ftgs_justification_capex'=>$this->input->post('justification_capex'),
	'ftgs_capex_attachment' =>$attachment_check,
	
	
	);
	
		
	$draft_data_up = $this->ftgs_model->capex_mast_update($dft_capex_no ,$data_update);
}			
	}	
	
	
	
	
	if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('capex_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('justification_capex'),
				'action_date' => $date,
                'action_time' => $time
            );
            $data2 = array(
				'ftgs_capex_id' =>$dft_capex_no,
                'ftgs_qcs_id' => $this->input->post('txtftgsId'),
				'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('capex_emp_code'),
                'action_autho' => $this->input->post('txt_ION_Autho'),
                'level_of' => 13,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			
			 $data1 = array(
                'ftgs_capex_status' => 1 //Pending Capex
            );
          
            $this->db->where('ftgs_capex_id', $dft_capex_no);
            $this->db->update('ftgs_capex_master', $data1);
			
            $this->ftgs_model->updateCapexuserAction($data,$dft_capex_no,$Ftgs_action_id);
            $this->ftgs_model->ftgsProcessRepAutho($data2);
           
            //email Code
                    $reciver= $this->input->post('txt_authoEmail');  //user PR mail 
					
					//$ccuser= 'ppshroff@ruchagroup.com'; //qcs owner 
					$subject='Interplant FTGS Capex Created BY By '.$capOwnerNm.' Against  CAPEX NO.  '.$dft_capex_no.' ';
					$message='<ol>
								<li><b>FTGS QCS No:</b>  '.$editId.'</li>
								<li><b>FTGS PR No:</b>  '.$this->input->post('txtftgsPRId').'</li>
								<li><b>FTGS QCS Owner:</b>  '.$this->input->post('qcs_emp_nm'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								
								<li><b>FTGS QCS Date:</b>  '.$this->input->post('txtqcsDate'). '</li>
								<li><b>Total Amount:</b>  '.$this->input->post('txtTotalAmt').'</li>
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					//$this->email->cc($ccuser);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					// Email Code End
            
		}
		
		
		
		
		 $this->load->helper('url');
		$this->load->view('FTGSPR/CAPEX_draft_tbl');
}


//laste  action ID 

		
		 function ftgsApprovalCapxAction($emp_code) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgsApprovalCapxAction($emp_code);
			return $data['ftgsActionData'];
		}
		
		
	//CApex authority pending tabl 
		public function CAPEX_AuthorityPending_FTGS_tbl(){
			$this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_AuthorityPending_FTGS_tbl');
		}
		
		
		public function CAPEX_approval1View($ftgs_capex_id)
		{
			$data['ftgs_capex_id'] = $ftgs_capex_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_approval1View',$data);
			
		}
		
		
		
		//CApex Autho 1

		 function getCaxapp2AuthoDetails() 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->getCaxapp2AuthoDetails();
			return $data['ftgsActionData'];
		}
		
		
		
		//fetch action ID
		 function ftgscpxIDAction($emp_code,$ftgs_capex_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgscpxIDAction($emp_code,$ftgs_capex_id);
			return $data['ftgsActionData'];
		}

		//ION insert
		public function insert_capexApproval1(){
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('dft_cno');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$user_nm = $this->input->post('user_nm');
			
			
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
			$data1 = array(
				'ftgs_capex_status' => 1,
				 'ftgs_capex_ion_no' => $this->input->post('txtIonNo'),
				  'ftgs_cpx_release_no' => $this->input->post('txtRelseNo'),
            );
			 $this->db->where('ftgs_capex_id', $editId);
            $this->db->update('ftgs_capex_master', $data1);
			
			 $data2 = array(
				'ftgs_capex_id' => $this->input->post('dft_cno'),
				'ftgs_qcs_id' => $this->input->post('txtftgsQCSId'),
                'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('authoID'),
                'level_of' => 14,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			 
           
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            $this->ftgs_model->updateuserActionCapex($data, $editId, $Ftgs_action_id);
            
            
            // Email Code Start-
					$reciver= $this->input->post('authoMail');  //makrand sir 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('user_nm').' Against  CAPEX NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS CAPEX No:</b>  '.$editId.'</li>
								<li><b>FTGS CAPEX Owner:</b>  '.$this->input->post('dft_cap_recommender'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtCpxDate'). '</li>
								
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
          }
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_capex_status' => 2,
				 'ftgs_capex_ion_no' => $this->input->post('txtIonNo'),
				  'ftgs_cpx_release_no' => $this->input->post('txtRelseNo'),
            );
          
           $this->db->where('ftgs_capex_id', $editId);
            $this->db->update('ftgs_capex_master', $data1);
            $this->ftgs_model->updateuserActionCapex($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
				
						$reciver= $this->input->post('authoMail');  //makrand sir 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('user_nm').' Against  CAPEX NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS CAPEX No:</b>  '.$editId.'</li>
								<li><b>FTGS CAPEX Owner:</b>  '.$this->input->post('dft_cap_recommender'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtCpxDate'). '</li>
								
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
         }
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/CAPEX_AuthorityPending_FTGS_tbl');
		//$this->load->view('FTGSPR/PO_pendding_FTGS_pr_tbl');
		
		}
		
		
		//Pending Capex at user section 
		public function CAPEX_UserPending_tbl()
		{
			 $this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_UserPending_tbl');
		}
		
		public function UserPendingCpxTblData($emp_code)
		{
			 $this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->UserPendingCpxTblData($emp_code);
			return $data['pendingList'];
		}
		
			//Approved Capex at user section 
		public function CAPEX_UserApproved_tbl()
		{
			 $this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_UserApproved_tbl');
		}
		
			//Rejected  Capex at user section 
		public function CAPEX_UserRejected_tbl()
		{
			 $this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_UserRejected_tbl');
		}
		
			public function UserRejectedCpxTblData($emp_code)
		{
			 $this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->UserRejectedCpxTblData($emp_code);
			return $data['pendingList'];
		}
		//Asset fetch data pendding table
		function AssetfetchpenddingDetails($emp_code) {
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['pendingList'] = $this->ftgs_model->AssetfetchpenddingDetails($emp_code);
			return $data['pendingList'];
		}
		
		
		//Qcs Approval Process
			function cpx_approval_status($ftgs_capex_id) 
	{
        $this->load->database();
		$this->load->model('Ftgs_PR/ftgs_model');
        $data['approval'] = $this->ftgs_model->cpx_approval_status($ftgs_capex_id);
        return $data['approval'];
    }
	
	
	
		public function CAPEX_approval2View($ftgs_capex_id)
		{
			$data['ftgs_capex_id'] = $ftgs_capex_id;
			$this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_approval2View',$data);
			
		}
		
		
		//qcs item for asset code  (makrand sir)
			public function qcs_items_assetcode($ftgs_capex_id){
					$this->load->database();  
					$this->load->model('Ftgs_PR/ftgs_model');  
					$data['item_view']=$this->ftgs_model->qcs_items_assetcode($ftgs_capex_id);  
					return  $data['item_view'];
		  
}

//project detail in pr _item
				public function pr_proj_detail($ftgs_capex_id){
					
					$data['ftgs_project_detail']=$this->ftgs_model->pr_proj_detail($ftgs_capex_id);  		  		
					return  $data;
				}
				
				//Auth id feth
				
				public function getCaxapp3AuthoDetails(){
					$this->load->database();
					$this->load->model('Ftgs_PR/ftgs_model');
					$data['ftgsActionData'] = $this->ftgs_model->getCaxapp3AuthoDetails();
					return $data['ftgsActionData'];
				}
				
				//fetch action ID
		 function ftgscpx2IDAction($emp_code,$ftgs_capex_id) 
		 {
			$this->load->database();
			$this->load->model('Ftgs_PR/ftgs_model');
			$data['ftgsActionData'] = $this->ftgs_model->ftgscpx2IDAction($emp_code,$ftgs_capex_id);
			return $data['ftgsActionData'];
		}
			
			//Capex level 2 inset			
				public function insert_capexApproval2()
				{
					date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('dft_cno');
			$action = $this->input->post('ftgs_status');
			$Ftgs_action_id = $this->input->post('Ftgs_action_id');
			$user_nm = $this->input->post('user_nm');
			
			$dataFile = array(
				'assetFile_attach_ftgs' =>preg_replace('/\s+/', '_', $_FILES['assetFile_attach_ftgs']['name']),
			);
			$capex_upd=$this->ftgs_model->File_update($editId,$dataFile);	
			
			
			//assetFile_attach attachment 	
			if (!empty($_FILES['assetFile_attach_ftgs']['name'])) {//single file upload 
                chmod('./uploads/assetFile_attach_ftgs/', 0777);
				$path   = './uploads/assetFile_attach_ftgs/';
				if (!is_dir($path)) { //create the folder if it's not already exists
					mkdir($path, 0777, TRUE);
				}
			$config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('assetFile_attach_ftgs')){
		}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
					$capex_upd=$this->ftgs_model->File_update($editId,$dataFile);	
			
            } 
			
			if ($action == "1") {
            $data = array(
				'action_autho' => $this->input->post('txt_emp_code'),
				'action' => 1,
				'comment' => $this->input->post('txt_comment'),
				'action_date' => $date,
                'action_time' => $time
            );
			$data1 = array(
				'ftgs_capex_status' => 1,
				
            );
			 $this->db->where('ftgs_capex_id', $editId);
            $this->db->update('ftgs_capex_master', $data1);
			
			 $data2 = array(
				'ftgs_capex_id' => $this->input->post('dft_cno'),
				'ftgs_qcs_id' => $this->input->post('txtftgsQCSId'),
                'ftgs_pr_id' => $this->input->post('txtftgsPRId'),
                'emp_code' => $this->input->post('txt_emp_code'),
                'action_autho' => $this->input->post('authoID'),
                'level_of' => 15,
                'action' => 0,
                'action_date' => $date,
                'action_time' => $time
            );
			 
           
            $this->ftgs_model->ftgsProcessRepAutho($data2);
            $this->ftgs_model->updateuserActionCapex($data, $editId, $Ftgs_action_id);
            
            
            // Email Code Start-
					$reciver= $this->input->post('authoMail');  //makrand sir 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('user_nm').' Against  CAPEX NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS CAPEX No:</b>  '.$editId.'</li>
								<li><b>FTGS CAPEX Owner:</b>  '.$this->input->post('dft_cap_recommender'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtCpxDate'). '</li>
								
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
          }
		else 
		{
            $data = array(
                'action_autho' => $this->input->post('txt_emp_code'),
                'action' => 2,
                'comment' => $this->input->post('txt_comment'),
                'action_date' => $date,
                'action_time' => $time,
            );
            $data1 = array(
                'ftgs_capex_status' => 2,
				
            );
          
           $this->db->where('ftgs_capex_id', $editId);
            $this->db->update('ftgs_capex_master', $data1);
            $this->ftgs_model->updateuserActionCapex($data, $editId, $Ftgs_action_id);
            
            
            	// Email Code Start-
				
						$reciver= $this->input->post('authoMail');  //makrand sir 
				
					$subject='Interplant FTGS PR Approved By '.$this->input->post('user_nm').' Against  CAPEX NO.  '.$editId.' ';
					$message='<ol>
								<li><b>FTGS CAPEX No:</b>  '.$editId.'</li>
								<li><b>FTGS CAPEX Owner:</b>  '.$this->input->post('dft_cap_recommender'). '</li>
								<li><b>Plant:</b>  '.$this->input->post('txtEmpPlant'). '</li>
								<li><b>Department:</b>  '.$this->input->post('txtEmpDept'). '</li>
								<li><b>FTGS PR Date:</b>  '.$this->input->post('txtCpxDate'). '</li>
								
								<li><b>Approver Comment:</b>  '.$this->input->post('txt_comment').'</li>
								
							</ol>
							Kindly visit your PR Portal(http://rucha.co.in/portal)';
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
					// Email Code End
         }
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/CAPEX_AuthorityPending_FTGS_tbl');
				}
				
				
		
	//Capex view 
	public function CAPEX_View($ftgs_capex_id){
		 $data['ftgs_capex_id'] = $ftgs_capex_id;
		 $this->load->helper('url');
		 $this->load->view('FTGSPR/CAPEX_View',$data);
	}		
		
		
	//Move to drfat
		public function insert_cpxRejectDraft(){
		date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-Y');
			$time = date("h:i A");
			$editId = $this->input->post('dft_cno');
			$action = $this->input->post('ftgs_status');
			
			if ($action == "0") {
            $data = array(
				
				'ftgs_capex_status' => 0,
				
            );
            $this->db->where('ftgs_capex_id', $editId);
            $this->db->update('ftgs_capex_master', $data);
			 $this->load->helper('url');
			$this->load->view('FTGSPR/CAPEX_draft_tbl');
			}
		}
}	

?>