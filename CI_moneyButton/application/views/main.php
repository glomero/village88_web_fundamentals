<?php
    $this->session->userdata('datas'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Money Button Game</title>
    </head>
    <body>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Money Button</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
        <div class="nav">
            <h3>Your money: <?= $this->session->userdata('money') ?></h3>
            <p>Chances left: <?= $this->session->userdata('chances') ?></p>
        </div>
        <div class="reset">
            <form action="reset" method="POST">
                <input type="hidden" name="action" value="reset">
                <input id="reset" type="submit" value="Reset">
            </form>
        </div>
        <div class="row1">
            <h3>Low Risk</h3>
            <form action="risk" method="POST">
                <input type="hidden" name="action" value="Low Risk">
                <input type="submit" value="Bet" <?= ($this->session->userdata('money') <= 0) || ($this->session->userdata('chances') == 0)?"disabled":''?>>
            </form>
            <p>by-25 up to 100</p>
        </div>
        <div class="row2">
            <h3>Moderate Risk</h3>
            <form action="risk" method="POST">
                <input type="hidden" name="action" value="Moderate Risk">
                <input type="submit" value="Bet" <?= ($this->session->userdata('money') <= 0 )?"disabled":''?><?= ($this->session->userdata('chances') == 0 )?"disabled":''?>>
            </form>
            <p>by-100 up to 1000</p>
        </div>
        <div class="row3">
            <h3>High Risk</h3>
            <form action="risk" method="POST">
                <input type="hidden" name="action" value="High Risk">
                <input type="submit" value="Bet" <?= ($this->session->userdata('money') <= 0 )?"disabled":''?><?= ($this->session->userdata('chances') == 0 )?"disabled":''?>>
            </form>
            <p>by-500 up to 2500</p>
        </div>
        <div class="row4">
            <h3>Severe Risk</h3>
            <form action="risk" method="POST">
                <input type="hidden" name="action" value="Severe Risk">
                <input type="submit" value="Bet" <?= ($this->session->userdata('money') <= 0 )?"disabled":''?><?= ($this->session->userdata('chances') == 0 )?"disabled":''?>>
                
            </form>
            <p>by-3000 up to 5000</p>
        </div>
        <div class="dialog_box">
            <p>Game Host:</p>
            <p>Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money 500. Choose wisely and good luck!</p>
<?php       for($i = 0; $i < count($this->session->userdata('datas')); $i++){
?>
<?php        echo $this->session->userdata('datas')[$i];
            }
?>
            </div>
        </div>
    </body>
</html>