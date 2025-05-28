<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Demo MVC</h1>
    <form action="<?php echo site_url('Demo/Demo/add_FormData'); ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="nameid" name="name">
        <br><br>
        <label for="pass">Pass:</label>
        <input type="text" id="passid" name="pass">
        <br><br>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>

</html>