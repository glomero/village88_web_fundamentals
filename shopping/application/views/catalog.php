<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
    </head>
    <body>
        <header>
            <h1>ebaligya Store</h1>
            <a href="/">home</a>
        </header>
        <div class="checkout">
            <h2>Check Out</h2>
            <h3>Total: <span>$<?= $total ?></span></h3>
        </div>
        <table class="records">
            <thead>
<?php           if(!empty($header)){
                    foreach($header as $value){
?>                      <th><?= $value ?></th>    
<?php               }
                }
?>                
            </thead>
<?php       if(!empty($orders)){
                foreach($orders as $key => $value){
?>                  <tr>
<?php                   foreach($orders[$key] as $id => $val){
                            if($id != 'id'){
?>                              <td><?= $val ?></td>                                
<?php                       }else{
?>                              <td>
                                    <button><a href="remove/<?=$val['id'] ?>">X</a></button> 
                                </td>
<?php                       }

                        }

?>                   </tr>                    
<?php           }
            }
?>
        </table>
        <h2 class="billing">Billing Info</h2>
        <div class="billin_info">
            <form action="bill" method="post">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="address" class="address"></td>
                    </tr>
                    <tr>
                        <td>Card Number:</td>
                        <td><input type="text" name="card_num" class="card"></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" value="Submit"></p>
            </form>        
        </div>
        <p class="success"><?= $this->session->flashdata('message') ?></p>
    </body>
</html>