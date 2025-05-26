<?php
Class Demo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function insert_FormData($data)
    {
        $sql = "INSERT INTO DEMO (Name, Pass) VALUES (?,?)";
        $values=[$data['newname'],$data['newpass']];
        $this->db->query($sql,$values);
    }
}
?>