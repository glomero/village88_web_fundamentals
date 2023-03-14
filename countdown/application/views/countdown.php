<?php
    date_default_timezone_set("Asia/Hong_Kong");
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuntdown</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
        <p>Countdown before day end!</p>
        <div class="main">
            <span class="highlight"><?= $seconds ?></span>
            <span class="seconds">seconds</span>
            <p><?= $current_date ?></p>
        </div>
    </body>
</html>