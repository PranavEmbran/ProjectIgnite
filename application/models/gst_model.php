<?php
class gst_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_valid_gstin($data)
    {
        $sql = "INSERT INTO gstin_list (GSTIN) VALUES (?)";
        $this->db->query($sql, [$data['validGSTIN']]);
    }

    public function display_valid_gstin()
    {
        $sql = "Select SL_ID, GSTIN from gstin_list";

        $query = $this->db->query($sql);
        return $query->result_array();

        // return $this->db->query($sql);
    }
}
?>