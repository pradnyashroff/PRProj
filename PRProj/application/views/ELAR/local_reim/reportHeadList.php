<?php
if (isset($this->session->userdata['logged_in'])) {
    $emp_id = ($this->session->userdata['logged_in']['emp_id']);
    $emp_code = ($this->session->userdata['logged_in']['emp_code']);
    $plant_code = ($this->session->userdata['logged_in']['plant_code']);
    $grade_id = ($this->session->userdata['logged_in']['grade_id']);
    $emp_name = ($this->session->userdata['logged_in']['emp_name']);
    $emp_designation = ($this->session->userdata['logged_in']['emp_designation']);
    $emp_dept = ($this->session->userdata['logged_in']['emp_dept']);
    $emp_email = ($this->session->userdata['logged_in']['emp_email']);
    $emp_mobile = ($this->session->userdata['logged_in']['emp_mobile']);
    $pr_dh_id = ($this->session->userdata['logged_in']['pr_dh_id']);
    $pr_allowed = ($this->session->userdata['logged_in']['pr_allowed']);
    $emp_status = ($this->session->userdata['logged_in']['emp_status']);
} else {

    redirect('Welcome/user_login_process', 'location');
}
?>
