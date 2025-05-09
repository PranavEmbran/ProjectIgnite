<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    public function get_users()
    {
        $query = $this->db->get('login');
        return $query->result_array();
    }
}
?>