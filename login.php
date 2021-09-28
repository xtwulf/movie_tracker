<?php
session_start();
echo ("Post: ");
print_r($_POST);
echo '<br>';
echo ("Session: ");
print_r($_SESSION);
echo '<br>'; 

// Connecting to database
require_once 'pdo.php';

// Redirect the browser to index.php if Cancel is pressed
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

// Check if fields are filled
if (isset($_POST['user']) OR isset($_POST['pass'])) {
    if ($_POST['user'] == '' OR $_POST['pass'] == '') {    
        $_SESSION['error'] = "User name and password are required";
        header("Location: login.php");
        return;
    }  
}


if (isset($_POST['user']) && isset($_POST['pass'])) {
    //Check if mail contains '@' and isn´t empty

    if( (strpos($_POST['user'],"@")) == FALSE AND $_POST['user'] !="" ) 
    
    { 
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }

    // Login
    $salt = 'XyZzy12*_';
    $check = hash('md5', $salt.$_POST['pass']);
    echo ("hash:".$check);
    
    //$check = "2ab943ddc6a8691a26be4f0e1f4e3763";
    echo("PW HAsh:".$check);
    $stmt = $pdo->prepare('SELECT id, username FROM users WHERE username = :un AND password = :pw');
    $stmt->execute(array( ':un' => $_POST['user'], ':pw' => $check));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if ( $row !== false ) {

        $_SESSION['name'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];

        
        // Redirect the browser to index.php
        header("Location: index.php");        
        return;
    }
    if ( $row == false) {
        $_SESSION['error'] = "Error while logging in... \n Either no user data found, or wrong password!";
        echo("Fehler\n");
        $_SESSION['hash'] = $check;
        header('Location: login.php');
        return;
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Tracker</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

<!-- <script src = "doValidate.js"></script>   -->
<script>
function doValidate() {
    console.log('Validating...');
    
        addr = document.getElementById('1d_1').value;
        pw = document.getElementById('id_1723').value;
      
        console.log("Validating addr="+addr+" pw="+pw);
        if (addr == null || addr == "" || pw == null || pw == "") {
            alert("Both fields must be filled out");
            return true;
        }
        if ( addr.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return true;
        }
        return true;
    
}
</script>

</head>

<body>
<div class="container">
<h1>Please Log In</h1>
<?php   
    if ( isset($_SESSION['error']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
?>
<form method="POST">
    <label for="name">Username (Mail adress)</label>
    <input type="text" name="user" id="1d_1" value="test@movietracker.com"><br/>
    <label for="id_1723">Password</label>
    <input type="text" name="pass" id="id_1723" value="movie1234!"><br/>
    <input type="submit" onclick="return doValidate();" value="Log In">
    <input type="submit" name="cancel" value="Cancel">
</form>

</div>
</body>
</html>