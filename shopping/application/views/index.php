<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <header>
            <h1>ebaligya Store</h1>
            <a href="cart">Cart(<?= $cart ?>)</a>
        </header>
        <div class="wrapper">
<?php   if(!empty($records)){
            foreach($records as $key => $value){
?>                <div class="items">
                    <img class="phones" src= <?php $file = $value['filename']; echo base_url("assets/img/$file"); ?>>
                    <h3><?= $value['name'] ?></h3>
                    <h2>$<?= $value['price'] ?></h2>
                    <div class="purchase">
                        <form action="buy" method="post">
                            <input type="number" min="0" name="<?= $value['name'] ?>" placeholder='0'>
                            <input type="submit" value="Buy">
                        </form>
                    </div>
                </div>
<?php       }
        } 
?>
        </div>
    </body>
</html>