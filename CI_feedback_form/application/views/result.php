<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>result</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Submitted Entry</h1>
            <p>Your Name (optional):<?= $this->session->userdata('name') ?></p>
            <p>Course Title:<?= $this->session->userdata('courses') ?></p>
            <p>Given Score (1-10):<?= $this->session->userdata('scores') ?></p>
            <p>Reason:</p>
            <p><?= $this->session->userdata('description') ?></p>
            <a href="main">Return</a>
        </div>
    </body>
</html>