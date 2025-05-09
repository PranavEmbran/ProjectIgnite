
<html>

<head>
    <title>HMIS</title>
    <script>
        function updateAction(form) {
            // const value = document.getElementById('dataset').value;
            const value = document.getElementById('dataset').value;
            switch (value) {
                // case 'PatientDetails':
                //     form.action = 'Filter/patientDetailsOnly_view.php';
                //     break;
                case 'IP':
                    form.action = 'DisplayPatients/filter';
                    break;
                case 'OP':
                    form.action = 'DisplayPatients/filter';
                    break;
                // case 'Active':
                //     form.action = 'Filter/activePatients_view.php';
                //     break;
                // case 'Discharged':
                //     form.action = 'Filter/dischargedPatients_view.php';
                //     break;
                default:
                    form.action = ''; // fallback
            }
        }
    </script>
</head>

<body>
    <h1>Patient Details</h1>

    <form method="get" onsubmit="updateAction(this)">
        <label for="dataset">Choose Display Dataset:</label>
        <select id="dataset" name="dataset" required>
            <option value="AllVisits" selected>All Visits</option>
            <!-- <option value="PatientDetails">Patient Details Only</option> -->
            <option value="IP">IP</option>
            <option value="OP">OP</option>
            <!-- <option value="Active">Active</option>
            <option value="Discharged">Discharged</option> -->
        </select>
        <button type="submit">Get</button>
    </form>

</body>

</html>