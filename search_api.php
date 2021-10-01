<?php
include ('settings.php');
include ('functions.php');

session_start();

if ($debug) {
    print_r ($_SESSION);
    echo ("<br>");
    print_r ($_POST);
    
}

// Redirect the browser to index.php if "Cancel" is clicked
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

// load add.php if "add to favourites" is clicked
if (isset($_POST['add'])) {
    header('location: add.php');
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
</head>
<body>
    <div class = "container">
    <?php
        $filmname = $_SESSION['filmname'];
        $result = (json_decode(executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&s=%22'.$filmname.'%22&plot=full'), true));
        // echo (executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&s=%22'.$filmname.'%22&plot=full'));
        if (!$debug) {

            echo("Your search has several hits. Please select below:<br>");
            echo ("####################");
            echo('<br>');
            foreach ($result['Search'] as $element) {
                if (($element['Type'] == 'movie') || ($element['Type'] == 'series') ) {
                    print_r($element);
                    echo('<br>');
                    echo ('
                    <form>
                        <input type = "submit" name="Test" value ="test">
                    ');
                    echo('<br>');
                    echo('<br>');
                }
            }
            $_SESSION['search_result'] = $result;
            echo ('<pre>');
            print_r($_SESSION);
            echo ('</pre>');

        

            
            die;
           }

        if ($result['Response'] == "False") {
            echo ($result['Error']);
            $_SESSION['api_error'] = $result['Error'];
            header('location: index.php');
        
        }


      /*   foreach ($result as $key => $value) {
            // check if $key is in $display array (settings.php)
            if (in_array($key, $display)) {
                echo ($key . ':' . $value .'<br>');
             } 

        }  */   
       
    ?>
    <form method="POST">
        <input type="submit" name = "add" value="Add to favourites">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    </div>

</body>
</html>