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

if (isset($_POST['detail'])) {
  $_SESSION['detail'] = $_POST['imdbid'];
  header('location: detail_page.php');
  return;
}

if (isset($_POST['remove'])) {
  $_SESSION['remove'] = $_POST['db_id'];
  header('location: remove.php');
  return;
}

?>

<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">


    <!-- custom css -->
    <link href="style.css" rel="stylesheet">

    <title>Movie Tracker</title>
  </head>
  <body>
    <div class = "container">
      <h1>Welcome to Movie Tracker</h1>
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
      $stmt = $pdo->prepare('SELECT title, plot_short, imdbID, preview, year, id FROM favorites WHERE user_id = :uid');
      $stmt->execute(array(':uid' => $_SESSION['user_id']));
      // print out the favorite films
      $row = $stmt->fetchAll();
      foreach($row as $key => $value) {
      
        echo('
        <div class="card" style="width: 18rem; display: flex;">
    
          <img src="'.$value[3].'" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">'.$value[0].'<br>
            '.$value[4].'</h5>
            <p class="card-text">'.$value[1].'</p>
            <form method = "POST">
              <input type = "hidden" name = "imdbid" value = "'.$value[2].'">
              <input type = "submit" name = "detail" value = "Go to detail page">
            </form>
            <form method = "POST">
              <input type = "hidden" name = "db_id" value = "'.$value[5].'">
              <input type = "submit" name = "remove" value = "remove from favorites">
            </form>
          
        </div>
        ');
     
      }
      
      ?>

    </table>

    </div>
    </div>



  </body>
</html>