<?php
class DisplayPatients extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('hmis/displayPatients_model');

        $this->load->library('session');

    }
    public function index()
    {
        $data['patient_visits'] = $this->displayPatients_model->get_patient_visits();
        $data['patientDetailsOnly'] = $this->listExistingPatients();
        // $this->load->view('hmis/displayPatients_view', $data);

        // $this->load->library('session');
        if ($this->session->userdata('userid')) {
            $this->load->view('hmis/displaySetting_view');
            $this->load->view('hmis/displayPatients_view', $data);
            $this->load->view('hmis/titlebar_view');

        } else {
            redirect('hmis/Login');
        }

    }

    public function insertPatients()
    {
        if ($this->session->userdata('userid')) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'age' => $this->input->post('age'),
                    'phoneno' => $this->input->post('phoneno'),
                    'gender' => $this->input->post('gender'),
                    'Reason_for_visit' => $this->input->post('Reason_for_visit'),
                    'Discharge_status' => $this->input->post('Discharge_status'),
                    'IP_OP' => $this->input->post('IP_OP'),
                    'Visit_Date' => $this->input->post('Visit_Date'),
                ];
                $this->displayPatients_model->add_patient_visit($data);
                redirect('hmis/DisplayPatients');
            } else {
                $this->load->view('hmis/insertPatients_view');

            }
        } else {
            redirect('hmis/Login');
        }
    }
    public function deletePatientVisit()
    {
        if ($this->session->userdata('userid')) {
            if (isset($_POST['delete'])) {
                $delete_id = $_POST['delete_id'];
                $this->displayPatients_model->delete_patient_visit($delete_id);
                redirect('hmis/DisplayPatients');
            }
        } else {
            redirect('hmis/Login');
        }
    }

    public function updatePatientVisit()
    {
        if ($this->session->userdata('userid')) {
            $visit_id = $_GET['id'];
            $result = $this->displayPatients_model->get_patient_visit_by_id($visit_id);
            $data['patient_visit'] = isset($result[0]) ? $result[0] : null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // handle update here...

                $dataInsert = [
                    'id' => $this->input->post('patient_id'), //Hidden input
                    'visit_id' => $visit_id,
                    'firstname' => $this->input->post('fname'),
                    'lastname' => $this->input->post('lname'),
                    'age' => $this->input->post('age'),
                    'phoneno' => $this->input->post('phno'),
                    'gender' => $this->input->post('gender'),
                    'Reason_for_visit' => $this->input->post('Reason_for_visit'),
                    'Discharge_status' => $this->input->post('Discharge_status'),
                    'IP_OP' => $this->input->post('IP_OP'),
                    'Visit_Date' => $this->input->post('Visit_Date'),
                ];

                $this->displayPatients_model->update_patient_visit($dataInsert);

                redirect('hmis/DisplayPatients');
            } else {
                $this->load->view('hmis/updatePatients_view', $data);
            }
        } else {
            redirect('hmis/Login');
        }
    }

    public function listExistingPatients()
    {
        if ($this->session->userdata('userid')) {
            // $dataList = $this->displayPatients_model->get_patients_only();
            return $this->displayPatients_model->get_patients_only();

            // $data['patientDetailsOnly'] = $dataList;
            // $this->load->view('hmis/displayPatients_view', $data);
        } else {
            redirect('hmis/Login');
        }

    }


    public function createForExisting()
    {
        if ($this->session->userdata('userid')) {
            // $patient_id = $this->input->get('id');
            $patient_id = $this->input->get('patient_id');
            if (!$patient_id) {
                show_error("Patient ID missing.");
            }

            $patient = $this->displayPatients_model->get_patient_by_id($patient_id);
            if (!$patient) {
                show_error("Patient not found.");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'Patient_id' => $this->input->post('patient_id'),
                    'Reason_for_visit' => $this->input->post('Reason_for_visit'),
                    'Discharge_status' => $this->input->post('Discharge_status'),
                    'IP_OP' => $this->input->post('IP_OP'),
                    'Visit_Date' => $this->input->post('Visit_Date'),
                    'Lab_charge' => 0.00 // Add other charges as required or default them
                ];

                $this->displayPatients_model->add_visit_only($data);
                redirect('hmis/DisplayPatients');
            } else {
                $data['patient'] = $patient;
                $this->load->view('hmis/createForExisting_view', $data);
            }
        } else {
            redirect('hmis/Login');
        }




    }

    public function filter()
    {
        $type = $this->input->get('dataset'); // In CodeIgniter
        
        // $type = $_GET['selection'];

        if ($type == 'IP') {
            $data['ip_patient_visits'] = $this->displayPatients_model->ipDisplay();
            if ($this->session->userdata('userid')) {
                $this->load->view('hmis/Filter/ipPatients_view', $data);
            } else {
                redirect('hmis/Login');
            }
        } elseif ($type == 'OP') {
            $data['op_patient_visits'] = $this->displayPatients_model->opDisplay();
            if ($this->session->userdata('userid')) {
                $this->load->view('hmis/Filter/opPatients_view', $data);
            } else {
                redirect('hmis/Login');     
            }
        }
    }
}
?>