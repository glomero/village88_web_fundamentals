<?php
include 'new-connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bulletin Board</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <h1 class="main_header">Bulletin Board View</h1>
    <?php       $sql = "SELECT title, description, DATE_FORMAT(created_at, '%m/%d/%y') as created_at FROM `information`";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['title'];
                        $description = $row['description'];
                        $date = $row['created_at'];
    ?>                  <div class="content">
                            <span><?= $date ?> - </span>
                            <span><?= $title ?> </span>
                            <p><?= $description ?></p>
                        </div>
    <?php               }
                }
    ?>
            
            <a href="index.php">Add new entry</a>
        </div>
 
    </body>
</html>