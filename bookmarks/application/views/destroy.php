<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Destroy</title>
    </head>
    <body>
        <div class="wrapper">
            <h2>Are you sure you want to delete?</h2>
            <span><?= $details['folder'] ?></span>
            <span><?= $details['name'] ?></span>
            <a href="<?= $details['url'] ?>" target="_blank"><?= $details['url'] ?></a>
            <form action="<?= site_url('Bookmarks/delete/' . $details['id']) ?>" method="post">
                <input type="submit" name="action" value="Yes, I want to delete">
            </form>
            <form action="<?= site_url('Bookmarks') ?>" method="post">
                <input type="submit" name="action" value="No">
            </form>
        </div>
    </body>
</html>