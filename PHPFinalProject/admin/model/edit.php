<?php

     $host = 'localhost';
     $username = 'root';
     $password = '';
     $db_name = 'covideodb';
     //database connection string
     $db = mysqli_connect($host, $username, $password, $db_name) or die(include "404.php");
     $connection_error = mysqli_connect_error();
     if ($connection_error != null)
     {
        echo $connection_error;
     }

     $consoleID = $_GET['consoleID'];
     $qry = mysqli_query($db, "SELECT * FROM consoles WHERE consoleID='$consoleID'");
     $data = mysqli_fetch_array($qry);

     if(isset($_POST['update']))
     {
        //$consoleID = $_POST['consoleID'];
        $consoleName = $_POST['consoleName'];
        $consoleInventory = $_POST['consoleInventory'];
        $consoleRelease = $_POST['consoleRelease'];

        $edit = mysqli_query($db, "UPDATE consoles SET consoleName = '$consoleName', consoleInventory = '$consoleInventory', consoleRelease = '$consoleRelease' WHERE consoleID = '$consoleID'");

        if($edit)
        {
            mysqli_close($db);
            header("location:../homepage.php");
            exit;
        }
        else{
            echo(mysqli_error($db));
        }
     }
?>

<h3>Update Consoles from DataBase</h3>
<form action="" method="POST">
    <input type="text" name="consoleName" value="<?php echo $data['consoleName'] ?>" placeholder="Console Name" Required>
    <input type="text" name="consoleInventory" value="<?php echo $data['consoleInventory'] ?>" placeholder="Console Inventory" Required>
    <input type="datetime" name="consoleRelease" value="<?php echo $data['consoleRelease'] ?>" placeholder="Console Date" Required>
    <input type="submit" name="update" value="Update">
</form>