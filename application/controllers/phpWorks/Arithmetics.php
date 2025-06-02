<?php
class Arithmetics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library('myCalculator');
        $this->load->library('MyCalculator', [], 'myCalculator'); // Alias to use camelCase
        $this->load->library('session');
    }


    public function index()
    {
        // $result = 0;
        $result = $this->session->flashdata('calc_result');
        $this->load->view('phpWorks/Arithmetics_view', ['ans' => $result ?? '']);
        // $this->load->view('phpWorks/Arithmetics_view', ['ans' => isset($result) ? $result : '']);


    }

    public function calculate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = $_POST['number1'];
            $num2 = $_POST['number2'];
            $oper = $this->input->post('operation');
            // $num1 = $this->input->post('number1');
            // $num2 = $this->input->post('number2');
            if ($oper == 1) {
                $result = $this->myCalculator->sumOf($num1, $num2);
            } elseif ($oper == 2) {
                $result = $this->myCalculator->diffOf($num1, $num2);
            } elseif ($oper == 3) {
                $result = $this->myCalculator->prodOf($num1, $num2);
            } elseif ($oper == 4) {
                $result = $this->myCalculator->division($num1, $num2);
            }
        }
        // $this->load->view('phpWorks/Arithmetics_view', ['ans' => $result]);
        $this->session->set_flashdata('calc_result', $result);

        redirect('phpWorks/Arithmetics');
    }
}
?>