<?php
// session_start();
include 'new-connection.php';
if(isset($_POST['add']) == 'Add'){
    $title = $_POST['title'];
    $details = $_POST['description'];
    $sql = "insert into `information`(title, description, created_at) values('$title', '$details', NOW())";
            $result = mysqli_query($connection, $sql);
            if($result){
                    // echo "Data inserted success!!";
                    header('Location: main.php');
                }else{
                    die(mysqli_error($connection));
                }
}
if(isset($_POST['skip']) == 'Skip'){
    header('Location: main.php');
}

?>