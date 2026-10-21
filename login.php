<?php

include("db.php");

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        $errors[] = "Username does not exist";
    }

   $result = pg_query_params($conn, 'SELECT username, password FROM users WHERE username = $1', [$username]);
   $user = pg_fetch_assoc($result);

    if($user){
        if(password_verify($password , $user['password'])){
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $errors[] = "Incorrect Credentials";
        }
    }

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
    <h3>Login System</h3>
    <form method="POST">
        <label for="Username">Enter Username:
            <input type="text" name="username">
        </label>
        <br></br>

        <label for="Username">Enter Password:
            <input type="text" name="password">
        </label>
        <br></br>

        <button type="submit">Submit</button>
    </form>
<p>
    <?php 
      foreach($errors as $error){
      echo $error."<br>";
      }
      ?>
      
</p>

</body>
</html>