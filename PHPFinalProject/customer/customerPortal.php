<link rel="stylesheet" href="style.css">

<?php
    if (isset($_POST['submit']))
    {
        setcookie("custName", $_POST["custName"], time() + 86400, '/'); // sets cookies using the form on the page.
        setcookie("custEmail", $_POST['custEmail'], time() + 86400, '/'); // i learned to add the '/' at the end to save the cookie as you move from page to page.
    }
?>

<body>
<h1>Customer Portal</h1>
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<?php
    include "../view/navbar.php";
?>

<!-- form here saves the customer name and email to the db, as well as sets the cookie -->

<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="custName" name="custName">
    <br>
    <label for="email">Email</label>
    <input type="email" id="custEmail" name="custEmail">
    <br>
    <input type="submit" value="submit" name="submit">
</form>

<?php

    // conection db
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'covideodb';

    $db = mysqli_connect($host, $username, $password, $db_name) or die(include "404.php");
    $connection_error = mysqli_connect_error();
    if ($connection_error != null)
    {
        echo $connection_error;
    }

    if(isset($_POST['submit']))
    {
        $custName = $_POST['custName'];
        $custEmail = $_POST['custEmail'];

        $edit = mysqli_query($db, "INSERT INTO customers SET custName = '$custName', custEmail = '$custEmail'"); // SQL statement to insert the customer name and email into the database from the form above

        if($edit)
        {
            mysqli_close($db);
            header("location:../index.php"); // when the customer clicks submit, send them back to the page where they can purchase a console.
            exit;
        }
        else{
            echo(mysqli_error($db));
        }
    }
?>