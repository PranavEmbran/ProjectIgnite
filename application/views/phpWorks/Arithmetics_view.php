<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculator</h1>
    <form action="Arithmetics/calculate" method="POST">
        <label for="num1">First number: </label>
        <input type="text" id="num1" name="number1">
        <br><br>
        <label for="num1">Second number: </label>
        <input type="text" id="num2" name="number2">
        <br><br>
        <button type="submit" value="1" name="operation">Add</button>
        <button type="submit" value="2" name="operation">Subtract</button>
        <button type="submit" value="3" name="operation">Multiply</button>
        <button type="submit" value="4" name="operation">Divide</button>
        <!-- <input type="submit" value="Add">
        <input type="submit" value="Subtract">
        <input type="submit" value="Multiply">
        <input type="submit" value="Divide"> -->
        <br><br>
    </form>
    <label for="result">Result: </label>
    <input type="text" id="result" name="calcResult" value="<?php echo htmlspecialchars($ans) ?>">
</body>

</html>