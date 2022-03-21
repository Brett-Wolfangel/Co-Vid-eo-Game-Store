<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ./");
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
    
    echo("Welcome back " . $_SESSION['username']);
    ?>
    <br>
    <a href="../index.php">Home Page</a> <a href="../games.php">Games Page</a>
    <h3>Add a game</h3>
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
        
        if (isset($_POST['submit']))
        {
            //$consoleID = $_POST['consoleID'];
            $consoleName = $_POST['consoleName'];
            $consoleInventory = $_POST['consoleInventory'];
            $consoleRelease = $_POST['consoleRelease'];
            //$gameRating = $_POST['gameRating'];

            $insert = mysqli_query($db, "INSERT INTO consoles (consoleName, consoleInventory, consoleRelease) VALUES ('$consoleName', '$consoleInventory', '$consoleRelease')");

            

            if($insert)
            {
                echo("Console edited successfully");
            } 
            else
            {
                echo(mysqli_error($db));
            }
            
        }


    ?>
    <form action="" method="POST">
        
        <label for="consoleName">Console</label>
        <input type="text" name="consoleName" id="consoleName">
        <br>
        <label for="gameTitle">Console Inventory</label>
        <input type="text" name="consoleInventory" id="consoleInventory">
        <br>
        <label for="gameRating">Console Release</label>
        <input type="datetime" name="consoleRelease" id="consoleRelease">
        <br>
        
        <input type="submit" value="submit" name="submit">
    </form>
    
    <br>
    <br>
    <br>

    <?php
        // I also got this data below from the same internet source from the link on edit.php
    ?>
    <h3>Edit a console</h3>
    <table border="2">
  <tr>
    <td>Console ID </td>
    <td>Console</td>
    <td>Console Inventory</td>
    <td>Release Date</td>
    
    
    <td>Edit</td>
    
  </tr>
    <?php
        $records = mysqli_query($db, "SELECT * FROM consoles");

        while($data = mysqli_fetch_array($records))
        {
        ?>
            <tr>
            <td><?php echo $data['consoleID']; ?></td>
                <td><?php echo $data['consoleName']; ?></td>
                <td><?php echo $data['consoleInventory']; ?></td>
                <td><?php echo $data['consoleRelease']; ?></td>
                     
                <td><a href="./model/edit.php?consoleID=<?php echo $data['consoleID']; ?>">Edit</a></td>
                
            </tr>
        <?php
        }
        ?>
        </table>
        <br>
        <br>
        <?php
            include "menu.php";
        ?>
</body>
</html>