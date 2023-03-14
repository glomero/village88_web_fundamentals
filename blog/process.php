<?php
    session_start();
    require_once ('new_connection.php');
    //process for the create_review
    if (isset($_POST['action']) && $_POST['action'] == 'create_review') {
        //do insert the query
        $query = "INSERT INTO reviews (user_id, content, created_at) VALUES ({$_SESSION['user_id']}, '{$_POST['content']}', NOW())";
        run_mysql_query($query);
        header('location: dashboard.php');
        die();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'create_reply') { //create a reply for a comment or reviews
        //do insert the query
        // var_dump($_POST);
        $query = "INSERT INTO replies (user_id, content, review_id, created_at) VALUES ({$_SESSION['user_id']}, '{$_POST['reply']}', {$_POST['review_id']}, NOW())";
    

        run_mysql_query($query);
        // echo $query;
        // die();
        header('location: dashboard.php');
        die();
    }
    
    //register
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        //calling function
        register_user($_POST); //use the actual POST
    }
    //login
    elseif (isset($_POST['action']) && $_POST['action'] == 'login') {
        login_user($_POST);
    }else { //loging off
        //session_destroy();  
        header('location: signin.php');
    }
    ////------------------begin of validation check----------//
    function register_user($post) { //call parameter post
        $_SESSION['errors'] = array();

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
        // header('Location: signin.php');
        // die();
        ///----------------end of validation-----//
        // now insert to the database
            if (count($_SESSION['errors']) > 0) { //if There is any errors
                header('location: signin.php');
                die();
            } else { // now insert to the database
                $password = $_POST['password'];
                $password = md5($password);
                $query = "INSERT INTO users (first_name, last_name, password, email, created_at, updated_at) VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$password}', '{$post['email']}', NOW(), NOW())";
                run_mysql_query($query);
                $_SESSION['success_message'] = 'User successfully created!';
                header('location: signin.php');
                die();
            }
        }  
    function login_user($post) {// call parameter
        $password = $_POST['password'];
        $password = md5($password);
        $query = "SELECT * FROM users WHERE users.password = '{$password}' AND users.email = '{$post['email']}'";
        $user = fetch_all($query); //attemp to grab user with above credentials
        if (count($user) > 0){
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $_SESSION['logged_in'] = TRUE;
            header('location: dashboard.php');
        }else {
            $_SESSION['errors'][] = "Cant find user!";
            header('location: signin.php');
            die();
        }
    }
?>