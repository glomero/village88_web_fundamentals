<?php
session_start();
// echo "hello!!, {$_SESSION['first_name']}!";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authentication</title>
    </head>
    <body>
        <h1>hello!!,<?= $_SESSION['first_name']?>!</h1>
        <a href="index.php">Log off</a>
        <form action="reset.php" method="post">
            <label>Enter Contact Number to reset password:</label>
            <input type="text" name="contact_number">
            <input type="submit" value="Reset">
        </form>
    </body>
</html>