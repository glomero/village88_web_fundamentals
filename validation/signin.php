<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Validation</title>
    </head>
    <body>
<?php
        if(isset($_SESSION['error_messages']))
        {
            foreach($_SESSION['error_messages'] as $message)
            {
?>                <p><?= $message; ?>
<?php       }
        }

?>
        <form action='process.php' method='post'>
        Email: <input type='text' name='email'>
        Password: <input type='text' name='password'>
        <input type='hidden' name='action' value='login'>
        <input type='submit' value='Login'>
        </form>
    </body>
</html>