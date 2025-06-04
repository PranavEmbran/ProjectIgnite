<?php
class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Demo/Demo_model');

        $this->load->library('Email');
        $this->initializeEmail();
        $this->sentEmail();

    }

    public function index()
    {
        $this->read_dbData();
        // $data['readData'] = $this->Demo_model->read_FromDB();
        // $this->load->view('Demo/display_view', $data);

        // $this->load->view('Demo/insert_view');


    }

    public function add_FormData()
    {
        //******************************************************************************************* */
        // Code to receive data from view form and assign each value to an associative array as key-value pairs.
        //******************************************************************************************* */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $Pass = $this->input->post('pass');
            $hashedPass = password_hash($Pass, PASSWORD_DEFAULT);

            $data = [
                'newname' => $this->input->post('name'),
                // 'newpass' => $this->input->post('pass') //used without hashing
                'newpass' => $hashedPass
            ];
            $this->Demo_model->insert_FormData($data); /***** Passing the associative array to the model-function. *****/
            redirect('Demo/Demo');/***** Go back after insert. *****/
        } else {
            $this->load->view('Demo/insert_view');/***** First load form view to get data values. *****/
        }
    }


    public function read_dbData()
    {
        //******************************************************************************************* */
        // Code to receive data from model fetched from db and assign each value to an associative array as 
        // key-value pairs, where each key is the name attribute from the form.
        //******************************************************************************************* */
        $data['readData'] = $this->Demo_model->read_FromDB(); /***** readData from here will be used as $readData in the if and for code segments in the view. *****/
        $this->load->view('Demo/display_view', $data);/***** Send associative array while loading form view. *****/
    }

    public function deleteDataRow()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $this->input->post('id')
            ];
        }
        $this->Demo_model->delete_rowFromDB($data); /***** Passing the associative array to the model-function. *****/
        redirect('Demo/Demo');
    }

    //*******************************************************************************************
    // loadDataRowToForm() and updateDataRow() for update_view.
    //*******************************************************************************************
    public function loadDataRowToForm()
    {
        $data["currentData"] = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data["currentData"] = [
                'currentid' => $this->input->post('id'),
                'currentName' => $this->input->post('name'),
                'pass' => $this->input->post('pass')
            ];
            $this->load->view('Demo/update_view', $data);
        }
    }

    public function updateDataRow()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name')
            ];
            $this->Demo_model->update_RowDB($data);
            redirect('Demo/Demo');
        }
    }

    // #####################################################################################
    // #####################################################################################
    // #####################################################################################

    // public function initializeEmail()
    // {
    //     // $config['protocol'] = 'sendmail';
    //     $config['protocol'] = 'SMTP';
    //     $config['mailpath'] = '/usr/sbin/sendmail';
    //     $config['charset'] = 'iso-8859-1';
    //     $config['wordwrap'] = TRUE;

    //     $this->email->initialize($config);
    // }
    public function initializeEmail()
    {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = 587;
        $config['smtp_user'] = 'pranav.embran@hodo.in';
        $config['smtp_pass'] = 'neqb rprf zfck axnp';    // Gmail App Password
        // Security -> 2 step verification -> App passwords
        $config['smtp_crypto'] = 'tls';                   // 🟢 Required for Gmail
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $this->email->initialize($config);
    }


    public function sentEmail()
    {
        $this->load->library('email');

        $this->email->from('pranav.embran@hodo.in', 'Pranav Embran S');
        $this->email->to('pranav.embran@hodo.in');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('<h3>Demo</h3> <br> Testing the <b> email </b> class.');

        // $this->email->send();
        if ($this->email->send()) {
            echo "✅ Email sent successfully!";
        } else {
            echo "❌ Email failed to send.<br>";
            echo $this->email->print_debugger();
        }

    }
}
?>