<?php
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=movie_tracker', 
   'movie_app', 'movie1234!');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//print_r($pdo);

?>

