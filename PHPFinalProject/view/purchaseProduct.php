<h1>Purchase Product</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
    include "navbar.php";

    //db connection
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

    // print the console on the page depending on what the user clicked on
    $purchaseConsole = $_GET['purchaseConsole'];
    
    global $db;
    $mySql = "SELECT * FROM consoles WHERE '$purchaseConsole' = consoleID";
    $qry = mysqli_query($db, $mySql);
    $consoles = mysqli_fetch_all($qry);
    

    foreach ($consoles as $console)
    {
        echo("<img src='../$console[2]' width=300px height=300px> <br>$console[1] <br>  <br> <p>Inventory Remaining: $console[3] </p>");
        $consoleId = $console[0];
    }

    $mySql2 = "SELECT consoleRelease FROM consoles WHERE '$purchaseConsole' = consoleID AND consoleRelease < getdate()";
    $qry2 = mysqli_query($db, $mySql2);

    // used this to send the customer to the purchaseComplete page after the purchase.
    echo ('
    <form action="" method="GET">
    <button type="submit" formaction="./purchaseComplete.php"  value="'.$consoleId.'" name="console">Purchase Now </button> 
    </form>');

    // tried many things for the purchase button to be disabled depending on the date but was never successful. 
    // :( 

    
    //echo("<button formaction='./purchaseComplete.php' value=$consoleId> Purchase Now </button>");

    //print_r($qry2);
    /* if($qry2)
    {
        print_r($qry2);
        echo("<button> Purchase Now </button>");
    }
    else{
        echo("<button disabled> Purchase Now </button>");
    } */

    /* $RelaseDate = $consoles['consoleRelease'];
    $date = date('Y-m-d',time());
    //echo $date;
    $RelaseDate = strtotime($ReleaseDate);
    $date = strtotime($date);
    if($ReleaseDate<$date){
        echo("<button> Purchase Now </button>");
    }
    else{
        echo("<button disabled> Purchase Now </button>");
    } */

    

    //$todaysDate = getdate();
    //$releaseDate = $consoles[4];
    //$dateDiff = date_diff($todaysDate, $releaseDate);
    
    //echo($dateDiff);


    /* if ($consoles[4] >= getdate())
       {
        echo("<button disabled> Purchase Now </button>");
       }
       else{
        echo("<button> Purchase Now </button>");
       } */

    
    

?>

