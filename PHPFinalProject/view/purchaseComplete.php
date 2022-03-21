<h1>Purchase Complete!</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
    include "../view/navbar.php";
?>
<!-- prints out your name from the cookies which get set from the customer portal form -->
<h3>Thanks for your order, <?php echo($_COOKIE['custName']); ?></h3>

<?php
    // db connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "covideodb";
 
    @$db = mysqli_connect($host, $username, $password, $db_name) or die(include "404.php");
    $connection_error = mysqli_connect_error();
    if ($connection_error != null)
    {
        echo $connection_error;
    }
    global $db;

    if (isset($_GET['console'])){
        $purchaseConsole = $_GET['console'];
    }
   
    
    // subtracting the inventory from the consoleInventroy on the db.
    $mysql = "UPDATE consoles SET consoleInventory = consoleInventory - 1  WHERE '$purchaseConsole' = consoleID";
    $qry = mysqli_query($db, $mysql);

    // inserting the info to the purchases table, ran into issues with the auto-increment to I left the number 1 in there to make sure it was working.
    $mysql2 = "INSERT INTO purchases (purchaseID, customerID, consoleID) values(1,1, '$purchaseConsole')";
    $purchases = mysqli_query($db, $mysql2);
?>