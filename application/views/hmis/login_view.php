<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIS Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/tableSmall.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/loginStyle.css') ?>">

</head>

<body>

 <!-- <div class="container mx-5 my-3"> -->
 <div class="container d-flex justify-content-center align-items-center my-5" style="min-height: calc(50vh);">
 <div class="w-50 p-4 border rounded shadow">
    <form id="loginform" method="post" action="">
        <!-- <h1 class = "container mx-auto my-2">Login</h1> -->
        <h1 class="text-center mb-4">Login</h1>
        <label for="uid">UserID</label>
        <input type="text" id="uid" name="userID" class="form-control" required><br><br>

        <label for="pwd">Password</label>
        <input type="text" id="pwd" name="pass"  class="form-control" required><br><br>

        <input type="submit" value="Login">
    </form>
    </div>
    </div>

</body>

</html>