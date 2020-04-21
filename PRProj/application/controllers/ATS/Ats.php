<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ats extends CI_Controller {

	
	 
	 public function __construct() {
parent::__construct();

// Load form helper library
//$this->load->library('EXcel');
//$this->load->helper('form');
// Load form validation library
$this->load->library('form_validation');
 $this->method_call =& get_instance();

// Load session library
$this->load->library('session');

// Load database 
$this->load->model('ATS/Ats_model');
$this->load->model('PR/pr_model');

}
#############################listing functions#####################
function listplant()
{
	
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	


	
		  $data['plants']=$this->Ats_model->plantlist();  
		  		

 return  $data['plants'];
		  
}
function assetlist()
{
	
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	


	
		  $data['assetlist']=$this->Ats_model->listasset();  
		  		

 return  $data['assetlist'];
		  
}

function archivelist()
{
    
    $this->load->database();  
    $this->load->model('ATS/Ats_model');  
    
 
 
    
          $data['assetlist']=$this->Ats_model->listarchive();  
                
 
 return  $data['assetlist'];
          
}
function assetdetail($barcode)
{
	
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	


	
		  $data['assetdetail']=$this->Ats_model->detailasset($barcode);  
		  		

 return  $data['assetdetail'];
		  
}

function get_asset_history($aid)
{
	
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	


	
		  $data['staa']=$this->Ats_model->get_hist($aid);  
		  		

 return  $data['staa'];
		  
}


####################################################################################
###############################################Redirectiononly###############################################################################
	public function index()
	{
		
		
 $this->load->helper('url');
  
		 $this->load->view('ATS/index');
	}
	public function home()
	{
		
		
 $this->load->helper('url');
  
		 $this->load->view('ATS/home');
	}
	
	public function plants()
	{
		
		
 $this->load->helper('url');
	  
		 $this->load->view('ATS/plant_list');
	}
	
	public function insert_excel()
	{
		
		
 $this->load->helper('url');
	  
		 $this->load->view('ATS/insert_excel');
	}
public function new_employee()
	{
		
		
 $this->load->helper('url');

		 $this->load->view('ATS/new_employee');
	}
	
	public function new_asset()
	{
		
		
 $this->load->helper('url');

		 $this->load->view('ATS/new_asset');
	}
	
	public function asset_master()
	{
		
		
 $this->load->helper('url');

		 $this->load->view('ATS/asset_master');
	}


public function archival_master()
    {
        
        
 $this->load->helper('url');
 
         $this->load->view('ATS/archival_master');
    }

	public function view_asset($aid)
	{
		
		
	$data['dat']=$this->Ats_model->asset_detail($aid);
 $this->load->helper('url');
  $this->load->view('ATS/print_barcode',$data);
	}
	
public function scan_asset()
    {
        date_default_timezone_set('Asia/Kolkata');
 $scandate=date('d-m-Y');
        
 
 $this->load->helper('url');
 
if($this->input->post('scanned_barcode')){
    $barcode=$this->input->post('scanned_barcode');
        
        $result =$this->Ats_model->detailassetforarchive($barcode);
        if($result != false){
            
            foreach ($result->result() as $row)
{
    $asset_id = $row->aid;
    
    $dataarchive=array(
        'asset_id' => $asset_id,
        'barcode' => $barcode,
        'scan_date' => $scandate,
        
        );
$this->Ats_model->asset_archive($dataarchive);
            
}
            
                
            
        }
$data['asset']=$this->Ats_model->detailasset($barcode);
 
}
 
else{
    $data['asset']=null;
}
         $this->load->view('ATS/scan_asset',$data);
    }
###############################################Redirectiononly###############################################################################
###############################################Insert into DB###############################################################################
public function add_employee()
	{
		date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
 
		$data = array(
'plant_id' =>  $this->input->post('plant_id'),
'emp_name' => $this->input->post('emp_name'),
'user_name' => $this->input->post('user_name'),
'plant_group' => $this->input->post('plant_group'),
'password' => $this->input->post('password'),
'insert_date'=>$date,

);
		$result=$this->Ats_model->employee_insert($data);
	
 $this->load->helper('url');
  $this->load->view('ATS/home');
	}
	
	
	
	public function add_asset()
	{
		date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
 $barcode= $this->input->post('scan_asset_no').$this->input->post('scan_asset_subno');
 if (!empty($_FILES['asset_photo']['name'])) {
 
 $file_stat="1";
 $file_name=$_FILES['asset_photo']['name'];
 }
 else{
	 $file_stat="0";
	 $file_name=null;
 }
 
		$data = array(
'scan_asset_no' =>  $this->input->post('scan_asset_no'),
'scan_asset_subno' => $this->input->post('scan_asset_subno'),
'asset_class_desc' => $this->input->post('asset_class_desc'),
'grn_no' => $this->input->post('grn_no'),
'asset_spec' => $this->input->post('asset_spec'),
'business_area' => $this->input->post('business_area'),
'storage_loc' => $this->input->post('storage_loc'),
'grn_date' => $this->input->post('grn_date'),
'cap_date' => $this->input->post('cap_date'),
'cap_amount' => $this->input->post('cap_amount'),
'barcode' => $barcode,
'file_stat' => $file_stat,
'file_name' => preg_replace('/\s+/', '_', $file_name),
'insert_date'=>$date,

);
$serial_no=$this->input->post('scan_asset_no');

$sericheck=$this->Ats_model->check_serial($serial_no);
if($sericheck){
			
			?>
                <script type="text/javascript">
                    alert("Serial ID is Already Present Try again!");
                </script>
            <?php
			 $this->load->helper('url');

			 $this->load->view('ATS/new_asset');
		}
		
		else{
			
			if ($file_stat=="1") {//single file upload for sale_invoice completed
              
$path   = './uploads/';
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
if($this->upload->do_upload('asset_photo')){
	
}else{	?>
                <script type="text/javascript">
                    alert("file upload error");
                </script>
            <?php
					
				}
            } 
			
			
			
			
			
			
			
		$result=$this->Ats_model->asset_insert($data);
		
		$row = $this->db->query('SELECT MAX(aid) AS `maxid` FROM `assets_master`')->row();
if ($row) {
	$max=$row->maxid;
  }
  
  	$data['dat']=$this->Ats_model->asset_detail($max);
 $this->load->helper('url');
  $this->load->view('ATS/print_barcode',$data);
		}
	}
	
	
	public function update_asset()
	{
	
$pri_loc=$this->input->post('privious_loc');
$cur_loc=$this->input->post('business_area');

	date_default_timezone_set('Asia/Kolkata');
 $date=date('d-m-Y');
 

 $aid=$this->input->post('aid');
		$data = array(

'business_area' => $this->input->post('business_area'),
'storage_loc' => $this->input->post('storage_loc'),
'status' => $this->input->post('status'),
);
   $result=$this->Ats_model->asset_update($aid,$data);

if($pri_loc !=$cur_loc){
		$datahist=array(
		'aid' => $this->input->post('aid'),
		'barcode' => $this->input->post('barcode'),
		'privious_loc' => $pri_loc,
		'new_loc' => $cur_loc,
		'moved_by' => $this->input->post('moved_by'),
		'doe' => $date,
		);
   $this->Ats_model->asset_history($datahist);
}
 $this->load->helper('url');
  $this->load->view('ATS/asset_master');
		
	}
	
	public function add_plant()
	{
		
		$data = array(
'plant_id' =>  $this->input->post('plant_id'),
'plant_name' => $this->input->post('plant_name'),


);
		$result=$this->Ats_model->plant_insert($data);
	
 $this->load->helper('url');
	 $this->load->view('ATS/plant_list');
	 }
	 
	 public function print_all()
	{
		
		if($this->input->post('barcode_list')){
				$ids = $this->input->post('barcode_list');
				$data['barcode_detail']=$this->Ats_model->fetch_multibarcode($ids);
	
		}
	
 $this->load->helper('url');
	 $this->load->view('ATS/barcode_master',$data);
	 }
###############################################Insert into DB###############################################################################

	##################################################################
public function employee_master()
	{
$data['listdata']=$this->Ats_model->show_emp_all();
		
 $this->load->helper('url');
 $this->load->view('ATS/emp_list',$data);
	}
	##################################################################

public function show_customer($cust_id)
	{
		$data['cust_detail']=$this->support_model->show_cust_by_id($cust_id);
		$data['pur_details']=$this->support_model->show_pur_by_id($cust_id);
 $this->load->helper('url');
$this->load->view('Support/add_purchase_record',$data);
	}
##################################################################
public function delete_record($cust_id)
	{
		
		$this->db->where('sup_cust_id', $cust_id);
$this->db->delete('support_cust_purchase');

$this->db->where('sup_cust_id', $cust_id);
$this->db->delete('support_customer');


 $this->load->helper('url');
 $this->load->view('Support/new_customer');
	}
##################################################################
public	function ExcelDataAdd()	{  
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = FCPATH.'uploads/excel/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '15000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');	
         $upload_data = $this->upload->data(); 
		 //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
		 $extension=$upload_data['file_ext'];    // uploded file extension
		
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 //$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	 
			$this->load->library('EXcel');
			try {
                $inputFileType = PHPExcel_IOFactory::identify(FCPATH.'uploads/excel/'.$file_name);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load(FCPATH.'uploads/excel/'.$file_name);
				} 
			catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
				} 
			//Set to read only
			$objReader->setReadDataOnly(true); 		  
			//Load excel file
			$totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
			$objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
			//loop from first data untill last data
			for($i=2;$i<=$totalrows;$i++)
			{
			date_default_timezone_set('Asia/Kolkata');
			$date=date('d-m-Y');
			$scan_asset_no= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			 //Excel Column 1
            $scan_asset_subno= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 2
			$asset_class_desc= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 3
			$asset_spec=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 4
			$business_area=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 5
			$storage_loc=$objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 6
			$cap_amount=$objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 7
			$cap_date=$objWorksheet->getCellByColumnAndRow(7,$i)->getValue(); //Excel Column 8
			$grn_no=$objWorksheet->getCellByColumnAndRow(8,$i)->getValue(); //Excel Column 9
			$grn_date=$objWorksheet->getCellByColumnAndRow(9,$i)->getValue(); //Excel Column 10
			
			/*$UNIX_DATE = ($cap_date - 25569) * 86400;
			$findate=gmdate("d-m-Y", $UNIX_DATE);
			$UNIX_DATE1 = ($grn_date - 25569) * 86400;
			$findategrn_date=gmdate("d-m-Y", $UNIX_DATE1);*/
			$data_user=array(
				'scan_asset_no' =>  $scan_asset_no,
				'scan_asset_subno' => $scan_asset_subno,
				'asset_class_desc' => $asset_class_desc,
				'asset_spec' => $asset_spec,
				'business_area' => $business_area,
				'storage_loc' => $storage_loc,
				'grn_no' => $grn_no,
				'grn_date' => $grn_date,
				'cap_date' => $cap_date,
				'cap_amount' => $cap_amount,
				'barcode' => $scan_asset_no.$scan_asset_subno,
				'file_stat' => "0",
				'file_name' => null,
				'insert_date'=>$date,);
				$this->Ats_model->excel_add($data_user);
				}
				//unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
				$this->load->helper('url');
				$this->load->view('ATS/asset_master');	           
				}

##################################################################
public function printBarcode()
	{

		
 $this->load->helper('url');
 $this->load->view('ATS/printBarcode');
	}


public function printBarcodeNO()
{
    
      $srNo = $this->input->post('txtSrNo');
      
        
        $this->load->database();
       
      $result=$this->Ats_model->printBarcodeNo($srNo);
        $data['result_display'] = $result;
        if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
            $this->load->helper('url');
           $this->load->view('ATS/printBarcode', $data);
 
}

########################### print barcode in table#######################################

public function printBarcodeTable()
	{
		$this->load->helper('url');
		$this->load->view('ATS/printBarcodeTable');
	}
	

function BarcodeTable()
{
	$this->load->database();  
    $this->load->model('ATS/Ats_model');  
	 $data['BarcodeTable']=$this->Ats_model->BarcodeTable();  
	return  $data['BarcodeTable'];
		  
}
// ATS New design 2020-01-23

 
  public function profile_pic_fetch($emp_code) {
        $this->load->database();
        $this->load->model('ATS/Ats_model');
        $data['profile_attachment'] = $this->Ats_model->profile_pic_fetch($emp_code);
        return $data['profile_attachment'];
    }
	
public function AssetDashboard()
   {
      
        $this->load->helper('url');
		$this->load->view('ATS/assetDashboard');
   }
   
   public function ats_menu()
	{

		
 $this->load->helper('url');
 $this->load->view('mgmt_view/ats_menus');
	}

		}
