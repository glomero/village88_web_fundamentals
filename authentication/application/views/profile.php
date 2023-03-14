<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1 id="header">Basic Information <?= $this->session->userdata('first_name') ?></h1>
    <a href="/users/logout">Log out</a>
    <div id="profile">
        <p>First Name: <?= $this->session->userdata('users_first_name') ?></p>
        <p>Last Name: <?= $this->session->userdata('users_last_name') ?></p>
        <p>Contact Number: <?= $this->session->userdata('users_contact') ?></p>
    </div>
</body>
</html>