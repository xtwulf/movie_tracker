<?php

session_start();
print_r($_SESSION);
// Connecting to database
require_once 'pdo.php';

echo ("Remove Page");

$stmt = $pdo->prepare('DELETE FROM favorites WHERE favorites.id = :id');
// DELETE FROM `favorites` WHERE `favorites`.`id` = 16
$stmt->execute(array( ':id' => $_SESSION['remove']));

$_SESSION['message'] = "Film was successfully removed from favorites";
header ('location: index.php');
return;


?>
