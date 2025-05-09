<?php
class displayPatients_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    public function get_patient_visits()
    {
        $sql = "SELECT v.id AS visit_id, p.id AS patient_id, p.firstname, p.lastname, p.age, p.phoneno, p.gender,v.Reason_for_visit, v.Discharge_status, v.IP_OP, v.Visit_Date
FROM 
    patientdetails p
INNER JOIN 
    visitdetails v ON v.Patient_id = p.id
ORDER BY 
    v.Visit_Date DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function add_patient_visit($data)
    {
        $sql1 = "INSERT INTO patientdetails (firstname, lastname, age, phoneno, gender)
        VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql1, [$data['firstname'], $data['lastname'], $data['age'], $data['phoneno'], $data['gender']]);

        $patient_id = $this->db->insert_id();

        $sql2 = "INSERT INTO visitdetails (Patient_id, Reason_for_visit, Discharge_status, IP_OP, Visit_Date)
        VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql2, [$patient_id, $data['Reason_for_visit'], $data['Discharge_status'], $data['IP_OP'], $data['Visit_Date']]);

    }


    public function get_patient_visit_by_id($visit_id)
    {
        $sql = "SELECT v.id AS visit_id, p.id AS patient_id, p.firstname, p.lastname, p.age, p.phoneno, p.gender,v.Reason_for_visit, v.Discharge_status, v.IP_OP, v.Visit_Date
        FROM 
            patientdetails p
        INNER JOIN 
            visitdetails v ON v.Patient_id = p.id
            WHERE 
    v.id = $visit_id
        ORDER BY 
            v.Visit_Date DESC"
        ;
        //In SQL, the WHERE clause must come before ORDER BY.

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_patient_visit($dataInsert)
    {
        $sql1 = "UPDATE patientdetails SET firstname=?, lastname=?, age=?, phoneno=?, gender=? WHERE id=?";
        $this->db->query($sql1, [$dataInsert['firstname'], $dataInsert['lastname'], $dataInsert['age'], $dataInsert['phoneno'], $dataInsert['gender'], $dataInsert['id']]);



        $sql2 = "UPDATE visitdetails SET Reason_for_visit=?, Discharge_status=?, IP_OP=?, Visit_Date=?
         WHERE id=?";
        $this->db->query($sql2, [$dataInsert['Reason_for_visit'], $dataInsert['Discharge_status'], $dataInsert['IP_OP'], $dataInsert['Visit_Date'], $dataInsert['visit_id']]);

    }

    public function delete_patient_visit($id)
    {
        $sqlTrans = "begin_transaction()";

        // Delete associated visitdetails
        $deletesql = "DELETE FROM visitdetails WHERE id = ?";
        $this->db->query($deletesql, [$id]);
        $sqlCommit = "commit()";

    }

    public function get_patients_only()
    {
        $sql = "SELECT id, firstname, lastname FROM patientdetails ORDER BY firstname ASC";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // public function create_for_existing(){
    //     $sql="";
    // }

    public function get_patient_by_id($id)
    {
        $sql = "SELECT * FROM patientdetails WHERE id = ?";
        $query = $this->db->query($sql, [$id]);
        return $query->row_array();
    }



    public function insert_visit_for_existing($data)
    {
        $sql = "INSERT INTO visitdetails (Patient_id, Reason_for_visit, Discharge_status, IP_OP, Visit_Date)
                VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql, [
            $data['Patient_id'],
            $data['Reason_for_visit'],
            $data['Discharge_status'],
            $data['IP_OP'],
            $data['Visit_Date']
        ]);
    }

    public function add_visit_only($data)
    {
        $sql = "INSERT INTO visitdetails (Patient_id, Reason_for_visit, Discharge_status, IP_OP, Visit_Date, Lab_charge)
            VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [
            $data['Patient_id'],
            $data['Reason_for_visit'],
            $data['Discharge_status'],
            $data['IP_OP'],
            $data['Visit_Date'],
            $data['Lab_charge']
        ]);
    }

    public function ipDisplay()
    {
        $sql = "SELECT 
    v.id AS visit_id, p.id AS patient_id, p.firstname, p.lastname, p.age, p.phoneno, p.gender, v.Reason_for_visit, v.Discharge_status, v.IP_OP,v.Visit_Date FROM patientdetails p
LEFT JOIN 
    visitdetails v ON v.Patient_id = p.id
WHERE 
    v.IP_OP = 'IP'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function opDisplay()
    {
        $sql = "SELECT 
    v.id AS visit_id, p.id AS patient_id, p.firstname, p.lastname, p.age, p.phoneno, p.gender, v.Reason_for_visit, v.Discharge_status, v.IP_OP,v.Visit_Date FROM patientdetails p
LEFT JOIN 
    visitdetails v ON v.Patient_id = p.id
WHERE 
    v.IP_OP = 'OP'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


}

?>