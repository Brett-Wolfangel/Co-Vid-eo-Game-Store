<?php
// connect to db
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

    // function used in my index page
    function getConsoles()
    {
        global $db;

        $mySql = "select * from consoles"; // SQL statement

        $qry = mysqli_query($db, $mySql);
        $consoles = mysqli_fetch_all($qry);

        return $consoles;
    }




   

   

?>