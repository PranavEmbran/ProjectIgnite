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
        $values = [$data['newname'], $data['newpass']]; /***** Assigning the keys from associative array of controller to the new array. *****/
        $this->db->query($sql, $values);
    }

    public function read_FromDB()
    {
        $sql = "SELECT id, Name, pass from DEMO";
        $query = $this->db->query($sql);
        return $query->result_array(); /***** Return the query result to the controller so as to pass it on to the view. *****/
    }

    public function delete_rowFromDB($data)
    {
        $sql = "DELETE FROM Demo WHERE id = ?";
        $values = [$data['id']];
        $this->db->query($sql,$values);
        // redirect('Demo/Demo');   
    }

    public function update_RowDB($data)
    {
        $sql = "UPDATE `demo` SET `Name` = ? WHERE `demo`.`id` = ?";
        $values = [$data['name'],$data['id']];
        echo $data['name'];
        echo $data['id'];

        $this->db->query($sql,$values);
    }
}
?>

