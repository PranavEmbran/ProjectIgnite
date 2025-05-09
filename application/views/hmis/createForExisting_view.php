<?php

// $patient_id = $_GET['id'] ?? null;
// $firstname = $lastname = $age = $phno = $gender = '';

// // Fetch patient details from DB
// if ($patient_id) {
//     $CI =& get_instance();
//     $CI->load->model('hmis/displayPatients_model');
//     $patient = $CI->displayPatients_model->get_patient_by_id($patient_id);
//     if ($patient) {
//         $firstname = $patient['firstname'];
//         $lastname = $patient['lastname'];
//         $age = $patient['age'];
//         $phno = $patient['phoneno'];
//         $gender = $patient['gender'];
//     }
// }

?>
<?php
$firstname = $lastname = $age = $phno = $gender = '';
$patient_id = $patient['id'] ?? null;

if ($patient) {
    $firstname = $patient['firstname'];
    $lastname = $patient['lastname'];
    $age = $patient['age'];
    $phno = $patient['phoneno'];
    $gender = $patient['gender'];
}
?>


<html>

<head>
    <title>HMIS - Create Visit for Existing Patient</title>
    <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">

</head>

<body>
    <h1>Basic Details</h1>
    <form method="post" action="">
        <input type="hidden" name="patient_id" value="<?= htmlspecialchars($patient_id) ?>">

        <label for="firstname">First Name:</label>
        <input id="firstname" type="text" name="fname" value="<?= htmlspecialchars($firstname) ?>" required readonly><br><br>

        <label for="lastname">Last Name:</label>
        <input id="lastname" type="text" name="lname" value="<?= htmlspecialchars($lastname) ?>" required readonly><br><br>

        <label for="age">Age:</label>
        <input id="age" type="number" name="age" value="<?= htmlspecialchars($age) ?>" required readonly><br><br>

        <label for="ph">Phone no:</label>
        <input id="ph" type="text" name="phno" value="<?= htmlspecialchars($phno) ?>" required readonly><br><br>

        <label for="gen">Gender:</label>
        <input id="gen" type="text" name="gender" value="<?= htmlspecialchars($gender) ?>" required readonly><br><br>

        <label for="reason">Reason for visit:</label>
        <input id="reason" type="text" name="Reason_for_visit" required><br><br>

        <label for="dstatus">Discharge status:</label>
        <select id="dstatus" name="Discharge_status" required>
            <option value="Active">Active</option>
            <option value="Discharged">Discharged</option>
        </select><br><br>

        <label for="ipop">IP/OP:</label>
        <select id="ipop" name="IP_OP" required>
            <option value="OP">OP</option>
            <option value="IP">IP</option>
        </select><br><br>

        <label for="visitdate">Visit Date:</label>
        <input id="visitdate" type="date" name="Visit_Date" required><br><br>

        <button type="submit" name="submit">Create Visit Record</button>
    </form>

    <!-- <form method="get" action="index"> -->
    <form method="get" action="<?= site_url('hmis/DisplayPatients') ?>">
        <button type="submit">Close Create</button>
    </form>
    <!-- *********************************************************** -->
    <?php
    // if (isset($_POST['submit'])) {

    //     $reason = $_POST['Reason_for_visit'];
    //     $disstat = $_POST['Discharge_status'];
    //     $inpout = $_POST['IP_OP'];
    //     $visitDate = $_POST['Visit_Date'];
    
    // }
    ?>
    <!-- *********************************************************** -->


</body>

</html>