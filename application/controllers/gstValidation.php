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
        // redirect(base_url('gstView/index.html'));


        // $this->load->view("listGST_view");
    }

    // public function validateReactGstin()
    // {
    //     header("Access-Control-Allow-Origin: *");
    //     header("Content-Type: application/json");

    //     $data = json_decode(file_get_contents("php://input"), true);
    //     $gstin = trim($data['gstin'] ?? '');

    //     if (preg_match("/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/", $gstin)) {
    //         echo json_encode(["message" => "✅ GSTIN is valid"]);
    //     } else {
    //         echo json_encode(["message" => "❌ Invalid GSTIN format"]);
    //     }
    // }

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
        // redirect('GstValidation');

    }
}
?>