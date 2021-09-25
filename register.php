<?php

session_start();

// Redirect the browser to index.php if Cancel is pressed
if ( isset($_POST['cancel'] ) ) {
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
</head>
<body>
    
<?php
echo ('<h1>Register</h1>')
?>
<form method="POST">

<input type="submit" name="cancel" value="Cancel">
</form>

</body>
</html>
