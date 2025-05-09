<?php
// class Login extends CI_Controller
// {
//     public function __construct()
//     {
//         parent::__construct();
//         $this->load->helper('url');
//         $this->load->model('hmis/login_model');
//     }
//     public function index()
//     {
//         $this->load->view('hmis/login_view');
// echo 'test';

//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $data['form_entry'] = [
//                 'UserID' => $this->input->post('userID'),
//                 'Password' => $this->input->post('pass')
//             ];echo 'test';
//             $pass = $this->login_model->get_password($data);
//                 if ($pass == 'Password') {
//                     echo 'Login success';
//                 }
//                 else{
//                     echo 'Wrong entry!';
//                     echo 'test';
//                 }
            
//         }
//     }
// }
?>


<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hmis/login_model');

        $this->load->library('session');
    }

    public function index()
    {
        if (isset($_GET['Logout']) || isset($_POST['Logout'])) {
            session_unset();
            session_destroy();
            header("Location: Login");
            exit();
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // $this->load->library('session');

            $userID = $this->input->post('userID');
            $input_password = $this->input->post('pass');

            $stored_password = $this->login_model->get_password($userID);

            if ($stored_password) {
                if ($stored_password === $input_password) {
                    echo "Login Successful!";

                    $this->session->set_userdata('userid', $userID);

                     redirect('hmis/DisplayPatients'); 
                } else {?>

                    <script>
                        alert("Incorrect Password!");
                    </script>

                   <?php
                    echo "Incorrect Password!";
                }
            } else {?>
                <script>
                alert("User ID not found!");
            </script>

            <?php
                echo "User ID not found!";
            }
        }

        // Always load view after checking POST
        $this->load->view('hmis/login_view');
    }
}
?>
