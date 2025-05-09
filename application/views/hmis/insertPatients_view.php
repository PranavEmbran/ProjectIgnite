<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIS - Create Patient</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">


</head>

<body>
    <h1>Basic Details</h1>
    <form method="post" action="<?php echo site_url('hmis/DisplayPatients/insertPatients'); ?>">

        <label for="firstname">First Name:</label>
        <input id="firstname" type="text" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input id="lastname" type="text" name="lastname" required><br><br>

        <label for="age">Age:</label>
        <input id="age" type="number" name="age" required><br><br>

        <label for="ph">Phone no:</label>
        <input id="ph" type="text" name="phoneno" required><br><br>

        <label for="gen">Gender:</label>
        <select id="gen" name="gender" required>
            <option value="F">Female</option>
            <option value="M">Male</option>
            <option value="O">Other</option>
        </select><br><br>

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

        <input type="submit" name="submit" value="Create">
    </form>

    <form method="get">
        <button type="submit">Close Create</button>
    </form>
</body>

</html>