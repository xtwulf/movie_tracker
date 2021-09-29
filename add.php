<?php
/* 
To Do: 
- Check, if film already exists for this user in favorites table



*/
require_once('pdo.php');

include ('settings.php');
include ('functions.php');


session_start();

if ($debug) {
    print_r ($_SESSION);
    echo ("<br>");
    print_r ($_POST);
    
}

if ($_SESSION['search_result']['Poster'] == "" ) {
    $_SESSION['search_result']['Poster'] = "/img/default-image.jpeg";
}

// Check if year is valid
$year = checkYear($_SESSION['search_result']['Year']);

$stmt = $pdo->prepare('INSERT INTO favorites (id, user_id, title, year, plot_short, imdbID, preview ) VALUES ( :id, :us_id, :title, :year, :plot_short, :imdbid, :preview )');
$stmt->execute(array(
    ':id' => NULL,
    ':us_id' => $_SESSION['user_id'],
    ':title' => $_SESSION['search_result']['Title'],
    ':year' => $year,
    ':plot_short' => $_SESSION['search_result']['Plot'],
    ':imdbid' => $_SESSION['search_result']['imdbID'],
    ':preview' => $_SESSION['search_result']['Poster']

));

$_SESSION['message'] = "\"".$_SESSION['search_result']['Title'] . "\" was added successfully to favorites";

header('location: index.php');
//echo ("<br><a href = 'http://localhost:8888/movie_tracker/'>Add called</a>")
?>


