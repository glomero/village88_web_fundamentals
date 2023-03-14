<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ninjas</title>
        <style>
            img{
                display: block;
                width: 20%;
                margin:0 0 0 30px; 
                margin: auto;
            }
        </style>
    </head>
    <body>
        <!-- <img src="../assets/img/ninjas/1.jpg" alt="ninja-photo">
        <img src="../assets/img/ninjas/2.jpg" alt="ninja-photo">
        <img src="../assets/img/ninjas/3.jpg" alt="ninja-photo">
        <img src="../assets/img/ninjas/4.jpg" alt="ninja-photo">
        <img src="../assets/img/ninjas/5.jpeg" alt="ninja-photo"> -->
<?php   $ImgNum = $this->session->userdata('times'); //putting varaibles
        for($i = 1; $i <= $ImgNum; $i++){
                // $RandomImg = rand(1, 4);
?>              <h2><?= $i ?></h2>
                <img src="<?= base_url('assets/img/ninjas/1.jpg') ?>">
<?php       }
?>
    </body>
</html>