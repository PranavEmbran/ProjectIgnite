<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMIS</title>
    <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">

</head>

<body>
    <?php
    // $visit = $data;
    $visit = $patient_visit;

    ?>

    <h1>Update Patient</h1>
    <form method="post" action="">
        <input type="hidden" name="patient_id" value="<?= htmlspecialchars($visit['patient_id']) ?>">

        First Name: <input type="text" name="fname" value="<?= htmlspecialchars($visit['firstname']) ?>"
            required><br><br>
        Last Name: <input type="text" name="lname" value="<?= htmlspecialchars($visit['lastname']) ?>" required><br><br>
        Age: <input type="number" name="age" value="<?= htmlspecialchars($visit['age']) ?>" required><br><br>
        Phone Number: <input type="text" name="phno" value="<?= htmlspecialchars($visit['phoneno']) ?>"
            required><br><br>
        Gender:
        <select name="gender">
            <option value="M" <?= $visit['gender'] == 'M' ? 'selected' : '' ?>>Male</option>
            <option value="F" <?= $visit['gender'] == 'F' ? 'selected' : '' ?>>Female</option>
            <option value="O" <?= $visit['gender'] == 'O' ? 'selected' : '' ?>>Other</option>
        </select><br><br>

        Reason for visit: <input type="text" name="Reason_for_visit"
            value="<?= htmlspecialchars($visit['Reason_for_visit']) ?>" required><br><br>
        Discharge status:
        <select name="Discharge_status">
            <option value="Active" <?= $visit['Discharge_status'] == 'Active' ? 'selected' : '' ?>>Active</option>
            <option value="Discharged" <?= $visit['Discharge_status'] == 'Discharged' ? 'selected' : '' ?>>Discharged
            </option>
        </select><br><br>

        IP/OP:
        <select name="IP_OP">
            <option value="OP" <?= $visit['IP_OP'] == 'OP' ? 'selected' : '' ?>>OP</option>
            <option value="IP" <?= $visit['IP_OP'] == 'IP' ? 'selected' : '' ?>>IP</option>
        </select><br><br>

        Visit Date: <input type="date" name="Visit_Date" value="<?= htmlspecialchars($visit['Visit_Date']) ?>"
            required><br><br>

        <input type="submit" name="update" value="Update">
    </form>

    <!-- <form action="displayPatients.php" method="get">
        <input type="hidden" name="patient_id" value="<?= htmlspecialchars($visit['patient_id']) ?>">
        <button type="submit">All Visits</button> -->
    <form method="get" action="<?= site_url('hmis/DisplayPatients') ?>">
        <button type="submit">Close Update</button>
    </form>
    </form>

</body>

</html>