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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'newname' => $this->input->post('name'),
                'newpass' => $this->input->post('pass')
            ];
            $this->Demo_model->insert_FormData($data);
            redirect('Demo/Demo');
        } else {
            $this->load->view('Demo/insert_view');
        }
    }

    public function read_dbData()
    {
        $data['readData'] = $this->Demo_model->read_FromDB();
        $this->load->view('Demo/display_view', $data);
    }

    public function deleteDataRow()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'id' => $this->input->post('id')
            ];
        }
        $this->Demo_model->delete_rowFromDB($data);
        redirect('Demo/Demo');
    }
}
?>