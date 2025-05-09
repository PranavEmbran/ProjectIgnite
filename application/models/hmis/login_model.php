<?php
// class login_model extends CI_Model
// {
//     public function __construct()
//     {
//         parent::__construct();
//         $this->load->database();
//     }
//     public function get_password($data)
//     {
//         $sql1 = "Select Password from login where Userid = ?";
//         if ($pass = $this->db->query($sql1, [$data['UserID']])) {
//             return $pass;
//         }
//         else{
//             echo 'Wrong entry!';
//         }
//     }
// }
?>


<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_password($userID)
    {
        $sql = "SELECT Password FROM login WHERE UserID = ?";
        $query = $this->db->query($sql, [$userID]);

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['Password'];
        } else {
            return false;
        }
    }
}
?>
