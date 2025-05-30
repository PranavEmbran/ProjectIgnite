<?php
class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('Demo/Demo_model');
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
            $data = [
                'newname' => $this->input->post('name'),
                'newpass' => $this->input->post('pass')
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
}
?>