<?php

session_start();
// Connecting to database
require_once 'pdo.php';

include 'functions.php';

//print_r($_POST);
print_r($_SESSION);


?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $imdbid = $_SESSION['detail'];
        $result = (json_decode(executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&i=tt0112442', true)));
        // echo (executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&t=%22'.$filmname.'%22&plot=full'));
        if ($debug) {
            echo ('$result: ');
            print_r($result);
            echo('<br>');
            var_dump($result ,true);
        }

        if ($result['Response'] == "False") {
            echo ($result['Error']);
            $_SESSION['api_error'] = $result['Error'];
            header('location: index.php');
        
        }


        foreach ($result as $key => $value) {
            // check if $key is in $display array (settings.php)
            if (in_array($key, $display)) {
                echo ($key . ':' . $value .'<br>');
             }

        }      
        $_SESSION['search_result'] = $result;
    ?>
<form method="POST">
    <input type="submit" name="cancel" value="Cancel">
</form>

</body>
</html>