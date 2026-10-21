<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
            
        calculator($num1, $num2);
}

    function calculator($num1, $num2){
        $op = $_POST['op'];
        $result = 0;

        if ($op == "+") {
            $result = $num1 + $num2;
        } elseif ($op == "-") {
            $result = $num1 - $num2; 
        } elseif ($op == "*") {
            $result = $num1 * $num2;
        } elseif ($op == "/") {
            $result = $num1 / $num2;
        } else {
            $result = "Invalid Operator";
        }

        echo "Addition: {$result}<br>";
        echo "Subtraction: {$result}<br>";
        echo "Multiplication: {$result}<br>";
        echo "Division: {$result}<br>";
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="num1">
        <br></br>

        <input type="text" name="num2">
        <br></br>

        <select name="op" id="">
            <option value="+">Add</option>
            <option value="-">Subtraction</option>
            <option value="*">Multiplication</option>
            <option value="/">Division</option>
        </select>

        <button type="submit">Calculate</button>

    </form>
</body>
</html>