<?php
class cmt_model extends CI_Model{
function __construct() {
parent::__construct();
}
function cmt_insert($data){
  $query = $this->db->insert('tbl_comment', $data);
           return $query;  

}


}
?>