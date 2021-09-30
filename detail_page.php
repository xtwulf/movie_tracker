<?php

session_start();

include('settings.php');

// Connecting to database
require_once 'pdo.php';

include 'functions.php';



// Redirect the browser to index.php if "Back to home" is clicked
if ( isset($_POST['back'] ) ) {
    header("Location: index.php");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- custom css -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
        $imdbid = $_SESSION['detail'];
        $result = (json_decode(executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&i='.$imdbid, true)));
        // echo (executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&t=%22'.$filmname.'%22&plot=full'));

        //convert object vars to an array
        $result = get_object_vars($result);


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
    <input type="submit" name="back" value="Back to Home">
</form>

</body>
</html>