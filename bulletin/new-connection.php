<?php 
    $connection = new mysqli('localhost', 'root', 'P@ssw0rd', 'bulletin');

    if(!$connection){
        // echo "Success!!";
        die(mysqli_error($connection));
    }

?>