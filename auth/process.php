<?php
    session_start();
    require('new_connection.php');
    //register
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        //calling function
        register_user($_POST); //use the actual POST
    }
    //login
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        login_user($_POST);
    }
////------------------begin of validation check----------//
    function register_user($post) { //call parameter post
        $_SESSION['errors'] = array();
        // if (isset($_POST) == 'Reset') {
        //     $contact_number = $_POST['contact_number'];
        //     if (empty($contact_number)) {
        //         echo "<p>Please enter a number</p>";
        //     } elseif (!is_numeric($contact_number)) {
        //         echo "<p>Please enter a valid number</p>";
        //     } elseif (strlen($contact_number) != 11) {
        //         echo "<p> The number entered was not 11 digits long</p>";
        //     }
        // }
        if (empty($post['first_name'])) { //validate post
            $_SESSION['errors'][] = "First name can't be blank!";
        } elseif (is_numeric($post['first_name'])) {
            $_SESSION['errors'][] = "First name must only contain letters!";
        }elseif (strlen($post['first_name']) <= 2){
            $_SESSION['errors'][] = "First name must be minimum 2 characters long each";
        }
        if (empty($post['last_name'])) { //validate post
            $_SESSION['errors'][] = "Last name can't be blank!";
        } elseif (is_numeric($post['last_name'])) {
            $_SESSION['errors'][] = "Last name must only contain letters!";
        } elseif (strlen($post['last_name']) <= 2){
            $_SESSION['errors'][] = "last names must be minimum 2 characters long each";
        }
        if (empty($post['password'])) {
            $_SESSION['errors'][] = "Password can't be blank!";
        }
        if ($post['password'] !== $post['confirm_password']) {
            $_SESSION['errors'][] = "password does not match!";
        }elseif (strlen($post['password']) < 8){
            $_SESSION['errors'][] = "Password must be at least 8 characters long";
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "Please a valid email address!";
        }
        if (empty($post['contact_number'])) {
            $_SESSION['errors'][] = "Please enter a number";
        }elseif (!is_numeric($post['contact_number'])) {
            $_SESSION['errors'][] = "Please enter a valid number";
        }elseif (strlen($post['contact_number']) != 11) {
            $_SESSION['errors'][] = "The number entered was not 11 digits long";
        }
        // header('Location: index.php');
        // die();
        ///----------------end of validation-----//
        
        if (count($_SESSION['errors']) > 0) { //if There is any errors
            header('location: index.php');
            die();
        }else { // now insert to the database
            $password = $_POST['password'];
            $password = md5($password);
            $query = "INSERT INTO users (first_name, last_name, password, email, contact_number, created_at, updated_at)
                        VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$password}', '{$post['email']}', '{$post['contact_number']}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success_message'] = 'User successfully created!';
            header('location: index.php');
    }      
}   
    function login_user($post) {// call parameter
        $password = $_POST['password'];
        $password = md5($password);
        $query = "SELECT * FROM users WHERE users.password = '{$password}' AND users.contact_number = '{$post['contact_number']}'";
        $user = fetch_all($query); //attemp to grab user with above credentials
        if (count($user) > 0){
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $_SESSION['logged_in'] = TRUE;
            header('location: success.php');
        }else {
            $_SESSION['errors'][] = "Cant find user!";
            header('location: index.php');
            die();
    }
}
?>