<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">


    <title>HMIS Display Patients Visits</title>
</head>

<body>

    <body>
        <h1>All Patient Visits</h1>
        <table class="table table-striped" border="1">
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
                    <th>Billing</th>
                </tr>

            </thead>

            <tbody>
                <?php if (!empty($patient_visits)): ?>
                    <?php foreach ($patient_visits as $row): ?>
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

                        <form method='post' action='DisplayPatients/deletePatientVisit' onsubmit=\"return confirm('Are you sure?');\">
                            <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["visit_id"]) . "'>
                            <button type='submit' name='delete'>Delete Visit</button>
                        </form>
                    </td>";

                            echo "<td>
                    <form method='get' action='DisplayPatients/updatePatientVisit'>
                        <input type='hidden' name='id' value='" . htmlspecialchars($row["visit_id"]) . "'>
                        <button type='submit'>Update</button>
                    </form>
                  </td>";

                            echo "<td>
                    <form method='get' action='Billing/displayBill.php'>
                        <input type='hidden' name='patient_id' value='" . htmlspecialchars($row["patient_id"]) . "'>
                        <button type='submit'>Billing</button>
                    </form>
                  </td>";
                            echo "</tr>";
                            ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="14" class="text-center">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>

        <form method='' action='DisplayPatients/insertPatients'>
            <div class="mb-3">
                <label for="newPatient">Create new patient-visit record</label>
                <button id="newPatient" type='submit'>Create</button>
        </form>
        </div>

        <!-- <form method="get" action="createForExisting.php"> -->
        <form method="get" action="<?= site_url('hmis/DisplayPatients/createForExisting') ?>">
            <label for="patient_id">Create new visit for existing patient:<br>Select Patient:</label>
            <select name="patient_id" id="patient_id" required>
                <option value="" disabled selected>-- Choose Patient --</option>
                <?php foreach ($patientDetailsOnly as $row): ?>
                    <option value="<?= $row['id'] ?>">
                        <?= $row['firstname'] . ' ' . $row['lastname'] ?> (ID: <?= $row['id'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Create Visit</button>
        </form>

    </body>

</html>