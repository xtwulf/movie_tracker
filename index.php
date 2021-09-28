<?php
session_start();
include('settings.php');

// Including Database connection
require_once "pdo.php";


if (isset($_SESSION['test'])) {
  echo $_SESSION['test'];
}

if ($debug) {
  print_r ($_SESSION);
  echo ('<br>');
  echo ('<br>');
  print_r ($_POST);
  
}

if (isset($_POST['filmname'])) {
  $_SESSION['filmname'] = str_replace(' ','+',$_POST['filmname']);
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">


    <!-- custom css -->
    <link href="style.css" rel="stylesheet">

    <title>Movie Tracker</title>
  </head>
  <body>
    <div>
    <h1>Welcome to Movie Tracker</h1>


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

        
    <div>
      <form method="POST">
      <label for="name">Film name</label>
      <input type="text" name="filmname" id="search_1" value=""><br/>
      <input type="submit" name="search" value="Search">
      <?php
      if (isset($_SESSION['api_error'])) {
        echo ($_SESSION['api_error']);
        //clear session variable 'api_error' when flash message is shown
        unset($_SESSION['api_error']);
      }

      

      ?>
      </form>
    </div>
    <div>
      <h2>My favorite films</h2>
      <p>
      <?php if(isset($_SESSION['message'])) {
        echo ($_SESSION['message']);
        unset($_SESSION['message']);
        }
      ?>
      </p>

    </div>


    <div class="container">
      <?php

      // SQL statement, loading favorite films for user
      
      
      $stmt = $pdo->prepare('SELECT title, plot_short, imdbID, preview FROM favourites WHERE user_id = :uid');
      $stmt->execute(array(':uid' => $_SESSION['user_id']));

      // print out the favorite films

      $row = $stmt->fetchAll();

      ?>
  
      <?php
      
      foreach($row as $key => $value) {

        echo('
        <div class="card" style="width: 18rem;">
          <img src="'.$value[3].'" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">'.$value[0].'</h5>
            <p class="card-text">'.$value[1].'</p>
            <a href="#" class="btn btn-primary"><button>Go to detail page</button></a>
            <a href="#" class="btn btn-primary"><button>remove from favorites</button></a>
        </div>
        ');
        

        echo($key . ": " . $value[0]);
        echo('<br>');        
        echo('<br>');
      }
      
      ?>

    </table>
<!--
      <div class="card" style="width: 18rem;">
        <img src="https://m.media-amazon.com/images/M/MV5BMTI5Mjg1MzM4NF5BMl5BanBnXkFtZTcwNTAyNzUzMw@@._V1_SX300.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Rambo</h5>
        <p class="card-text">In Thailand, John Rambo joins a group of mercenaries to venture into war-torn Burma, and rescue a group of Christian aid workers who were kidnapped by the ruthless local infantry unit.</p>
        <a href="#" class="btn btn-primary"><button>Go to detail page</button></a>
        <a href="#" class="btn btn-primary"><button>remove from favorites</button></a>
        
      </div>
      -->
    </div>
    </div>



  </body>
</html>