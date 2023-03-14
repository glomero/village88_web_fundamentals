<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login/Sign up</title>
    </head>
    <body>
        <h1>Login</h1>
        <?= $this->session->flashdata("login_error") ?>
        <form action="/Users/login" method="post">
            <label>Contact Number: </label><input type="text" name="contact_number" >
            <label>Password: </label><input type="password" name="password" >
            <input type="hidden" name="failed_login_attempts">
            <input type="submit" value="Submit" >
        </form>
        <h1>Register</h1>
        <?= $this->session->flashdata('errors') ?>
        <?= $this->session->flashdata("register_success") ?>
        <form action="/Users/register" method="post">
            <label>First Name: </label><input type="text" name="first_name" >
            <label>Last Name: </label><input type="text" name="last_name" >
            <label>Contact Number: </label><input type="text" name="contact_number" >
            <label>Email Address: </label><input type="text" name="email" >
            <label>Password: </label><input type="password" name="password" >
            <label>Repeat Password: </label><input type="password" name="confirm_password" >
            <input type="submit" value="Submit" >
        </form>
    </body>
</html>