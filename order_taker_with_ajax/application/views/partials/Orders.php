

<?php 
        foreach($orders as $order){         
?>      <div class="orders">
            <h2><?= $order['id'] ?></h2>
            <span><?= $order['description'] ?></span>
        </div>
<?php   }
?>