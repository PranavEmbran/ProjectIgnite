<?php
class Demo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function insert_FormData($data)
    {
        $sql = "INSERT INTO DEMO (Name, Pass) VALUES (?,?)";
        $values = [$data['newname'], $data['newpass']];
        $this->db->query($sql, $values);
    }

    public function read_FromDB()
    {
        $sql = "SELECT id, Name, pass from DEMO";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function delete_rowFromDB($data)
    {
        $sql = "DELETE FROM Demo WHERE id = ?";
        $values = [$data['id']];
        $this->db->query($sql,$values);
        // redirect('Demo/Demo');   
    }
}
?>