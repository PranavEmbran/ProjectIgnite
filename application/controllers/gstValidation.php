<?php
class GstValidation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("gst_model");
        $this->load->helper('url');

    }
    public function index()
    {
        $this->load->view("gst_view");
        // $this->load->view("listGST_view");
    }

    public function insertGSTIN()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ['validGSTIN' => $this->input->post('gstinName')];
            $this->gst_model->insert_valid_gstin($data);
            redirect('GstValidation');
        }
    }

    public function displayGSTIN_List()
    {
        echo "displayGSTIN_List";

        $data['validGSTIN'] = $this->gst_model->display_valid_gstin();

        $this->load->view("gst_view");
        $this->load->view("listGST_view", $data);

    }
}
?>