<?php
    require ('new_connection.php');
    session_start();
    // echo "hello!!, {$_SESSION['first_name']}!";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Blog Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <h1>Blog</h1>
            <span>Welcome <?= $_SESSION['first_name'] ?>!</span>
            <a href="blog.php">Sign out</a>
        </nav>
        <div class="content">
            <h2>Title</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            <p class="break">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
        </div>
        <h3>Leave a Review</h3>
        <form action="process.php" method="POST">
            <input type="hidden" name="action" value="create_review">
            <textarea name="content" cols="30" rows="10"></textarea>
            <input type="submit" value="Post a review">
        </form>
        <!-- //comment and reviews -->
<?php
        $reviews = fetch_all("SELECT reviews.*, users.first_name, users.last_name FROM reviews LEFT JOIN users ON users.id = reviews.user_id ORDER BY id DESC");
        foreach ($reviews as $content) {
?>      <div class="reviews">
            <span><?= $content['first_name'] ?> <?= $content['last_name'] ?></span>
            <span><?= $content['created_at'] ?></span>
            <p><?= $content['content'] ?></p>
        </div>
<?php
            //$replies = fetch_all("SELECT replies.*, users.first_name, users.last_name FROM replies LEFT JOIN users ON users.id = replies.user_id WHERE replies.review_id = {$content['id']}");
            //para mak reply balik
?>          
<?php       $replies = fetch_all("SELECT replies.*, users.first_name, users.last_name FROM replies LEFT JOIN users ON users.id = replies.user_id WHERE replies.review_id = {$content['id']}");
            $review_id = $content['id'];
            foreach ($replies as $content) 
        { 
?>              <div class="reviews_replies">
                    <span><?= $content['first_name'] ?> <?= $content['last_name'] ?></span>
                    <span><?= $content['created_at'] ?></span>
                    <p><?= $content['content'] ?></p>
                </div>
<?php   } 
?>              <form class="replies" action="process.php" method="POST">
                    <input type="hidden" name="action" value="create_reply">
                    <input type="hidden" name="review_id" value='<?= $review_id?>'> <!-- what reviews to reply -->
                    <textarea class="comments" name="reply" cols="30" rows="10"></textarea>
                    <input type="submit" value="Reply">
                </form> 
<?php }
?>   
    </body>
</html>