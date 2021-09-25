<?php
session_start();

// Including Database connection
require_once "pdo.php";


if (isset($_SESSION['test'])) {
  echo $_SESSION['test'];
}

print_r ($_SESSION);
echo ('<br>');
print_r ($_POST);

if (isset($_POST['filmname'])) {
  $_SESSION['filmname'] = $_POST['filmname'];

  header("Location: search_api.php");        
  return;
}

?>

<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- custom css -->
    <link href="style.css" rel="stylesheet">
    <title>Movie Tracker</title>
  </head>
  <body>
    <div>
    <h1>Welcome to Movie Tracker</h1>

 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </div>
  <div>
    <?php

    if (!isset($_SESSION['name'])) {
      
      echo '<a href="login.php"><p>Please log in to use the application</p></a>';

      echo '<a href = "register.php"><p>No account yet? Register here</p></a>';
      die;
    }
    else {
      echo '<a href="logout.php"><p>logout</p></a>';
      
    }
    ?>
    </div>
    <div>My films</div>

    <div class="container">
      <div class="row">
        <div class="col">
          <card>Card1</card>
        </div>
        <div class="col">
          Column
        </div>
        <div class="col">
          Column
        </div>
      </div>
    </div>

    
    <div>
    <form method="POST">
    <label for="name">Film name</label>
    <input type="text" name="filmname" id="search_1" value=""><br/>
    <input type="submit" name="search" value="Search">
    </form>

    </div>

  </body>
</html>