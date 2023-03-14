<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Raffle Entry</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
        <p>There are <?= $this->session->userdata('counter'); ?> lucky winners selected</p>
        <div class="rand_num">
            <span><?= rand(1000000,9999999) ?></span>
        </div>
        <form action="main" method="post">
            <input type="submit" value="Pick more">
        </form>
    </body>
</html>