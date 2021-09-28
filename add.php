<?php
require_once('pdo.php');

include ('settings.php');


session_start();

if ($debug) {
    print_r ($_SESSION);
    echo ("<br>");
    print_r ($_POST);
    
}



//INSERT INTO `favorites` (`id`, `user_id`, `title`, `plot_short`, `imdbID`, `preview`) VALUES (NULL, '1', 'Test', 'Test - Plot short', 'xyz1234', 'https://www.google.de');

/*

        
        $stmt = $pdo->prepare('INSERT INTO Profile
        (user_id, first_name, last_name, email, headline, summary ) VALUES ( :us_id, :fname, :lname, :mail, :head, :summ )');
        
        $stmt->execute(array(
            ':fname' => htmlentities($_POST['first_name']),
            ':lname' => htmlentities($_POST['last_name']),
            ':mail' => htmlentities($_POST['email']),
            ':head' => htmlentities($_POST['headline']),
            ':summ' => htmlentities($_POST['summary']),
            ':us_id' => htmlentities($_SESSION['user_id'])
                )
            );

*/
$stmt = $pdo->prepare('INSERT INTO favourites (id, user_id, title, plot_short, imdbID, preview ) VALUES ( :id, :us_id, :title, :plot_short, :imdbid, :preview )');
$stmt->execute(array(
    ':id' => NULL,
    ':us_id' => $_SESSION['user_id'],
    ':title' => $_SESSION['search_result']['Title'],
    ':plot_short' => $_SESSION['search_result']['Plot'],
    ':imdbid' => $_SESSION['search_result']['imdbID'],
    ':preview' => $_SESSION['search_result']['Poster']

));


echo ("<br><a href = 'http://localhost:8888/movie_tracker/'>Add called</a>")
?>


