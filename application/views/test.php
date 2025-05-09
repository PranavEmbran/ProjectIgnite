<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter View Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <body>
        CodeIgniter View Example

        <h1>Patients</h1>
        <!-- <table class="table table-dark table-striped table-hover" border="1"> -->
        <div class="container">


            <table class="table table-hover" border="1">
                <thead>
                    <tr>
                        <th>Userid</th>
                        <th>Password</th>
                        <!-- Add more fields as per your DB -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['Userid']; ?></td>
                            <td><?= $user['Password']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <style>
        .table{
            max-width: 600px;  
            margin: 0 auto;
        }
    </style> -->


    </body>
</body>

</html>