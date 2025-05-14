<html>

<head>
    <title>HMIS</title>
    <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">

</head>

<body>
    <h1>OP Patient - Visit Details</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Visit_ID</th>
                <th>Patient_ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Reason for visit</th>
                <th>Discharge status</th>
                <th>IP/OP</th>
                <th>Visit_Date</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($op_patient_visits)): ?>
                <?php foreach ($op_patient_visits as $row): ?>
                    <tr>
                        <td><?= $row['visit_id']; ?></td>
                        <td><?= $row['patient_id']; ?></td>
                        <td><?= $row['firstname']; ?></td>
                        <td><?= $row['lastname']; ?></td>
                        <td><?= $row['age']; ?></td>
                        <td><?= $row['phoneno']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td><?= $row['Reason_for_visit']; ?></td>
                        <td><?= $row['Discharge_status']; ?></td>
                        <td><?= $row['IP_OP']; ?></td>
                        <td><?= $row['Visit_Date']; ?></td>

                        <?php echo "<td>

                        <form method='post' action='../DisplayPatients/deletePatientVisit' onsubmit=\"return confirm('Are you sure?');\">
                            <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["visit_id"]) . "'>
                            <button type='submit' name='delete'>Delete Visit</button>
                        </form>
                    </td>";

                        echo "<td>
                    <form method='get' action='../DisplayPatients/updatePatientVisit'>
                        <input type='hidden' name='id' value='" . htmlspecialchars($row["visit_id"]) . "'>
                        <button type='submit'>Update</button>
                    </form>
                  </td>";

                //         echo "<td>
                //     <form method='get' action='Billing/displayBill.php'>
                //         <input type='hidden' name='patient_id' value='" . htmlspecialchars($row["patient_id"]) . "'>
                //         <button type='submit'>Billing</button>
                //     </form>
                //   </td>";
                        echo "</tr>";
                        ?>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="14" class="text-center">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>


    </table><br>

    <form method="get" action="../DisplayPatients">
        <button type="submit">All Visits</button>
    </form>

</body>

</html>