<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_cntr extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->view('ELAR/Dashboard/create_claim');
       }
        //profile pic fetch 

    public function profile_pic_fetch($emp_code) {
        $this->load->database();
        $this->load->model('PR/pr_model');
        $data['profile_attachment'] = $this->pr_model->profile_pic_fetch($emp_code);
        return $data['profile_attachment'];
    }

    }