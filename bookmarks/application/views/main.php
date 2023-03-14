<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookmarks</title>
    </head>
    <body>
        <h1>Add a Bookmark</h1>
        <form action="<?= site_url('Bookmarks/add') ?>" method="POST">
            Name: <input type="text" name="name">
            URL: <input type="text" name="url">
            <select name="folder" id="folder">
                <option value="Favorites">Favorites</option>
                <option value="Others">Others</option>
            </select>
            <input type="hidden" name="action">
            <input type="submit" value="Add">
        </form>
        <div class="detail">
            <h2>Bookmarks</h2>
            <table>
                <thead>
                    <tr>
                        <th>Folder</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
<?php                   foreach($details as $data){
?>                          <tr>
                                <td><?= $data['folder']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><a href="<?= $data['url'] ?>" target="_blank"><?= $data['url'] ?></a></td>
                                <td>
                                    <form action="<?= site_url('Bookmarks/destroy/' . $data['id']) ?>" method="POST">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>    
<?php                   }?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>