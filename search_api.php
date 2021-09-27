<?php
include ('settings.php');
echo("Debug: ".$debug);

session_start();

if ($debug) {
    print_r ($_SESSION);
    echo ("<br>");
    print_r ($_POST);
    
}

// Redirect the browser to index.php if Cancel is pressed
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

function executeRESTCall($methode, $adresse, $daten = false) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $adresse);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $methode);
    if ($daten){
        $head = ['Content-Type: application/text', 
                 'Content-Length: '. strlen($daten)];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $head);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $daten);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $filmname = $_SESSION['filmname'];
        $result = (json_decode(executeRESTCall('GET', 'https://www.omdbapi.com/?apikey=2bfa0b8a&t=%22'.$filmname.'%22&plot=full'), true));
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
    <input type="submit" value="Save Film">
    <input type="submit" name="cancel" value="Cancel">
</form>

</body>
</html>