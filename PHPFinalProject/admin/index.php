<?php
    session_start();
    $_SESSION['username'] = "Fred";
    $_SESSION['password'] = "1234";

    if (filter_input(INPUT_GET, 'lo') == 'y')
    {
        
        session_unset();
        session_destroy();
    }
    //logic to check creditials
    include "./model/db.php";
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    //echo($username);
    if($username && $password)
    {
        //echo("valid");
        $valid = true;
    } else
    {
        //echo("nope");
        $valid = false;
    }

    if($valid)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: homepage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //include "./view/menu.php";
    ?>
    <h1>Login for Admin</h1>
    <?php
        //echo($_SESSION['username']);

    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username">
        <br>
        <label for="password">Password:</label>
        <input type="text" name="password">
        <input type="submit" value="Log In">
    </form>
</body>
</html>