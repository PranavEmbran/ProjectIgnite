<?php
class Test extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
   }

   public function index()
   {
      $data['users'] = $this->User_model->get_users();
      $this->load->view('test', $data);
   }

   // public function index() { 
   //    echo "This is default - index function from controllers/Test.php.<br>"; 
   //    $this->load->view('test');
   //    $this->load->model('User_model');
   // } 

   public function hello()
   {
      echo "This is hello function.";

   }
}
?>