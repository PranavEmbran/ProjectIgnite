<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Demo MVC</h1>
    <h2>Update</h2>
    <form action="updateDataRow" method="POST">
        <!-- <label for="">ID: <?php // echo htmlspecialchars($currentData['currentid']) ?> </label> -->
        <label for="">ID: </label>
        <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($currentData['currentid']) ?>" readonly>

        <br><br>
        <label for="nameid">Name: </label>
        <input type="text" id="nameid" name="name" value="<?php echo htmlspecialchars($currentData['currentName']) ?>">
        <br><br>
        <!-- <label for="passid">Pass: </label> -->
        <label for="">Pass: <?php echo htmlspecialchars($currentData['pass']) ?> </label>
        <!-- <input type="text" id="passid" name="pass" value="<?php// echo htmlspecialchars($currentData['pass']) ?>"> -->
         <br><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>