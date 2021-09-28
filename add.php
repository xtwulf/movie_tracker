<?php
/* 
To Do: 
- Check, if film already exists for this user in favourites table


*/
require_once('pdo.php');

include ('settings.php');


session_start();

if ($debug) {
    print_r ($_SESSION);
    echo ("<br>");
    print_r ($_POST);
    
}


$stmt = $pdo->prepare('INSERT INTO favourites (id, user_id, title, plot_short, imdbID, preview ) VALUES ( :id, :us_id, :title, :plot_short, :imdbid, :preview )');
$stmt->execute(array(
    ':id' => NULL,
    ':us_id' => $_SESSION['user_id'],
    ':title' => $_SESSION['search_result']['Title'],
    ':plot_short' => $_SESSION['search_result']['Plot'],
    ':imdbid' => $_SESSION['search_result']['imdbID'],
    ':preview' => $_SESSION['search_result']['Poster']

));

$_SESSION['message'] = "\"".$_SESSION['search_result']['Title'] . "\" was added successfully to favourites";

header('location: index.php');
//echo ("<br><a href = 'http://localhost:8888/movie_tracker/'>Add called</a>")
?>


