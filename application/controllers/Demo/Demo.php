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
        $this->load->view('Demo/Demo_view');
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

        }
    }
}
?>