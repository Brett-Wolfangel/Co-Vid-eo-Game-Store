<!DOCTYPE html>
<html lang="en">


<!--
  Name: Brett Wolfangel
  Date: 12/8/2021
  Project: Final Co-Video Store
  Merry Christmas!
-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Home</title>



  <?php
    include "./model/functionsdb.php"; // functions page
  ?>

</head>

<body>
  <h1>Co-Vid-eo Game Store</h1>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer/customerPortal.php">Customer Log-In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="background">
    <div class="container">
      <?php
        
        $consoles = getConsoles(); // prints out the consoles from the database
        
        foreach ($consoles as $console) // loops through to print out all consoles and anchor tag to make the picture clickable
        {
          
            echo(" <div class='consoles'>
            <a href='./view/purchaseProduct.php?purchaseConsole={$console[0]}' $console[1]> <img src='$console[2]' width=175px height=175px> </a> <br> $console[1] <br>  In-Stock: $console[3] <br> $console[4] <br>  <br> </div>");
            
        }
    ?>
    </div>

    <footer>
      <br>
      <a href="admin/index.php">Admin Login</a> <!-- this is for the admins to login -->
    </footer>
  </div>
</body>

</html>