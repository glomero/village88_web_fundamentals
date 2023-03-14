
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
        <div class="wrapper">
            <h1>Bulletin Board Entry</h1>
            <form method="POST" action="proccess.php">
                <label>Subject:</label>
                <input type="text" name="title">
                <label>Details:</label>
                <textarea name="description" cols="30" rows="2"></textarea>
                <input class="btn1" type="submit" name="add" value="Add">
                <input class="btn2" type="submit" name="skip" value="Skip">
            </form>
        </div>
    </body>
</html>