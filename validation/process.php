<?php
    if (isset($_POST['action']) && $_POST['action'] == 'login')
    {
        session_start();
        $errors = array();
    
        if(empty($_POST['email']))
        {
            $errors[] = "Email is empty";
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errors[] = "Email is invalid.";
        }
    
        if(empty($_POST['password']))
        {
            $errors[] = "Password is empty.";
        }
    
        if(!empty($errors))
        {
            $_SESSION['error_messages'] = $errors;
            header('Location: signin.php');
        }
        else
        {
            header('Location: home.php');
        }
    }
?>