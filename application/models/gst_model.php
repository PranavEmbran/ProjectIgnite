<?php
class gst_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_valid_gstin($data)
    {
        $sql = "INSERT INTO gstin_list (GSTIN)
        VALUES (?)";
        $this->db->query($sql, [$data['validGSTIN']]);
    }
}
?>