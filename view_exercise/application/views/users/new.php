<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New</title>
    </head>
    <body>
        <!-- Set it up so that accessing "/users/new" would load view/users/new.php view file. Display a simple html form where a new user can be added and have this form be submitted to 'users/create'. Have this form specify first name, last name and email address. No need to have this form work on the back-end. -->
        <form action="create" method="POST">
            First Name: <input type="text" name="fname">
            Last Name: <input type="text" name="lname">
            Email Address: <input type="text" name="lname">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>