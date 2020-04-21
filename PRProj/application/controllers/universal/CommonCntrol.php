<?php
//Author: Kaustubh Ashok Khadke
//Created Date: 03-06-2019
//Need: To fetch common details in all over project
// we need a common controller
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonCntrol extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

        $this->load->model('universal/CommonModel');
    }
    //--------------------------------------------------------------------------
    //Author: Kaustubh Ashok Khadke
    //Created Date:03-06-2019
    //Need:To Fetch Deparment Details we needed
    // common method witch will fetch data from dept_id
    
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
    //--------------------------------------------------------------------------
}
