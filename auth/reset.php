<?php
    session_start();
    require('new_connection.php');
    if (isset($_POST) == 'Reset') {
        $contact_number = $_POST['contact_number'];
        if(empty($contact_number)){
            echo "<p>Please enter a number</p>";
        }elseif(!is_numeric($contact_number)){
            echo "<p>Please enter a valid number</p>";
        }elseif(strlen($contact_number) != 11){
            echo "<p> The number entered was not 11 digits long</p>";
        }
            $password = $_POST['contact_number'];
            // Connect to database
            $connection = mysqli_connect("localhost", "root", "P@ssw0rd", "auth");
            // Check connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // Retrieve user record
            $query = "SELECT * FROM users WHERE users.contact_number = '{$_POST['contact_number']}'";
            $user = fetch_all($query); //attemp to grab user with above credentials
            // Check if user exists
            if (!empty($user)) {
                // password md5 encrypted
                $password = "village88";
                $password = md5($password);
                $sql = ("UPDATE users SET password='{$password}' WHERE contact_number='{$contact_number}'");
                header('location: index.php');
            } else {
                echo "<p>User not found</p>";
            }
            // Close connection
            mysqli_close($connection);
    }
?>

