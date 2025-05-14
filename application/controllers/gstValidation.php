<?php
class GstValidation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("gst_model");
        $this->load->helper('url');

    }
    public function index()
    {
        $this->load->view("gst_view");
    }
}
?>