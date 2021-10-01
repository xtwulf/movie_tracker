<?php
/* 
To Do: 
- Check, if film already exists for this user in favorites table



*/
require_once('pdo.php');

include ('settings.php');
include ('functions.php');


session_start();



/* 
    echo('<pre>');
    echo("Post:");
    echo("<br>");
    print_r ($_POST);
    echo('</pre>'); */
    
    
    

/* 
if ($_SESSION['film_info']['Poster'] == "" ) {
    $_SESSION['film_info']['Poster'] = "/img/default-image.jpeg";
} */

// Check if year is valid and write in session variable
$_SESSION['film_info']['year'] = checkYear($_SESSION['film_info']['year']); 


// Check if film already exists for this user in favorites table
$film_id = $_SESSION['film_info']['film_id'];
$user = $_SESSION['user_id'];
$stmt = 'SELECT * FROM favorites WHERE imdbid = "'.$film_id.'" and user_id = '.$user;
$test = $pdo->query($stmt)->fetchAll();
if (!(empty($test))) {
    $_SESSION['message'] = "<p class = \"alert\">\"".$_SESSION['film_info']['title'] . "\" ist bereits in den Favoriten gespeichert</p>";
    header('location: index.php');
    return;
};

// write film information into database
$stmt = $pdo->prepare('INSERT INTO favorites (id, user_id, title, year, plot_short, imdbID, preview ) VALUES ( :id, :us_id, :title, :year, :plot_short, :imdbid, :preview )');
$stmt->execute(array(
    ':id' => NULL,
    ':us_id' => $_SESSION['user_id'],
    ':title' => $_SESSION['film_info']['title'],
    ':year' => $_SESSION['film_info']['year'],
    ':plot_short' => $_SESSION['film_info']['plot'],
    ':imdbid' => $_SESSION['film_info']['film_id'],
    ':preview' => $_SESSION['film_info']['img']

));

$_SESSION['message'] = "<p class = \"success\">\"".$_SESSION['film_info']['title'] . "\" was added successfully to favorites</p>";

header('location: index.php');

?>


