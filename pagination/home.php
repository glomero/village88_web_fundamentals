<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excel to HTML with Pagination</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h4>Excel to HTML with Pagination</h4>
        <div class="card_body">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="import_file" class="form-control">
                        <input type="submit" name="action" class="btn btn-primary mt-3" value="Upload">
                </form>
        </div>
        <!-- error message -->
<?php   if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
?>              <h4 class="error"><?= $error ?></h4>                
<?php       }
            unset($_SESSION['errors']);
        }
?>
        <!-- success message -->
<?php   if(isset($_SESSION['success'])){
?>          <h4 class="success"><?= $_SESSION['success'] ?></h4>
<?php       unset($_SESSION['success']);    
        }
?>
        <!-- Display the list uploaded files -->
<?php   require_once('connection.php');
        $query = "SELECT * FROM directories";
        $filenames = fetch_all($query);
		// var_dump($filenames);
		// die();
        $_SESSION['filename'] = $filenames;
?>
        <h5>Uploaded Files:</h5>
        <ol>
<?php   foreach($filenames as $file){
	?>      <li>
				<a href="process.php?id=<?= $file['id'] ?>"><?= $file['file_name'] ?></a>
				<p class="date">&nbsp=&nbsp<?= $file['created_at'] ?></p>
			</li>
<?php    }
?>
        </ol>
</body>
</html>