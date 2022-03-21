<?php
    include "../model/functionsdb.php";

    function validateUser()
    {
        return true;
    }



    function addAGame($consoleName, $consoleInventory, $consoleRelease)
    {
        global $db;
        $sql = "INSERT INTO video_games (consoleName, consoleInventory, consoleRelease) VALUES ('$_POST[consoleName]', '$_POST[consoleInventory]', '$_POST[consoleRelease]')";
        if (mysqli_query($db, $sql))
        {
            echo("New record added!");
        } else
        {
            echo("Error " . $sql . "<br>" . mysqli_error($db));
        }
    }

?>