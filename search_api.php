<?php

/* 
ToDo:
- add pagination

*/
include ('settings.php');
include ('functions.php');

session_start();

if ($debug) {
    echo('<pre>');
    print_r ($_SESSION);
    echo('</pre>');
    echo ("<br>");
    echo('<pre>');
    print_r ($_POST);
    echo('</pre>');
    
}

// Redirect the browser to index.php if "Cancel" is clicked
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

// load add.php if "add to favorites" is clicked
if (isset($_POST['add'])) {
    echo('<pre>');
    print_r($_POST);

    die;
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
                    echo('<img style = "width: 100px;" src="'.$img.'">');
                    echo ('
                    <form method = "post">
                        <input type = "hidden" value = "'.$element['imdbID'].'" name = "'.$element['imdbID'].'">
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

            echo ('

                <form  action="add.php" method="post">
                <input type="hidden" name="vorname" value="test"><br />
                Namename: <input type="text" name="nachname" /><br />
                <input type="Submit" value="add" name="add"/>
                </form>
            ');



            $_SESSION['search_result'] = $result;
            echo ('<pre>');
            print_r($_SESSION);
            echo ('</pre>');


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