<?php

/* 
ToDo:
- add pagination

*/
include ('settings.php');
include ('functions.php');

session_start();

// Redirect the browser to index.php if "Cancel" is clicked
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

// load add.php if "add to favorites" is clicked
if (isset($_POST['add'])) {
    

    $_SESSION['film_info'] = $_POST;
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
    

            echo("Your search has several hits. Please select below:<br>");
            echo ("####################");
            echo('<br>');
            foreach ($result['Search'] as $element) {
                if (($element['Type'] == 'movie') || ($element['Type'] == 'series') ) {
                    //Assign default image if 'N/A'
                    if ($element['Poster'] == 'N/A') {
                        $img = 'img/default-image.jpeg';
                    }
                    else {$img = $element['Poster'];}

                    echo('Title: ' . $element['Title']);
                    echo('<br>');
                    echo('Year: ' . $element['Year']);
                    echo('<br>');
                    // get plot info with a new api call ("by ID")
                    $id = $element['imdbID'];
                    $id_result = (json_decode(executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&i='.$id), true)); 
                    echo('Plot: ' . $id_result['Plot']);
                    echo('<br>');
                    

                    echo('<img style = "width: 100px;" src="'.$img.'">');
                    echo ('
                    <form method = "post">
                        <input type = "hidden" value = "'.$element['Title'].'" name = "title">
                        <input type = "hidden" value = "'.$element['Year'].'" name = "year">
                        <input type = "hidden" value = "'.$img.'" name = "img">
                        <input type = "hidden" value = "'.$id_result['Plot'].'" name = "plot">
                        <input type = "hidden" value = "'.$element['imdbID'].'" name = "film_id">
                        <input type = "submit" name = "add" value = "Add to favorites">
                    </form>
                    ');
                    echo('<br>');
                    echo('<br>');
                }
            }
            echo('
                <form method="post">
                    <input type="submit" name="cancel" value="Cancel">
                </form>
            ');




            /* $_SESSION['search_result'] = $result;
            echo ('<pre>');
            print_r($_SESSION);
            echo ('</pre>');
 */

        if ($result['Response'] == "False") {
            echo ($result['Error']);
            $_SESSION['api_error'] = $result['Error'];
            header('location: index.php');
        
        }
 
       
    ?>
<!--     <form method="POST">
        <input type="submit" name = "add" value="Add to favourites">
        <input type="submit" name="cancel" value="Cancel">
    </form> -->
    </div>

</body>
</html>