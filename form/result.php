<?php
    if(isset($_POST['submit']))
    {
    $track_name =  $_POST['courses'];
    $name = $_POST['name'];
    $score = $_POST['scores'];
    $description = $_POST['description'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Result</title>
    </head>
    <style>
        .wrapper{
            background-color: white;
            width: 50%;
            margin-left: 350px;
            margin-top: 100px;
            padding: 20px;
            border-radius: 10px;
            color: black;
            font-size: 20px;
            box-shadow:0 2px 2px 2px black;
        }

        .wrapper h1{
            text-align: center;
        }

        .wrapper a{
            display: block;
            text-decoration: none;
            color: black;
            margin-top: 10px;
            border: 2px solid black;
            width: 60px;
            text-align: center;
            box-shadow: 0px 2px  black;
        }

        .wrapper p ,a{
            margin-left: 100px;
        }
        
    </style>
    <body>
        <div class="wrapper">
            <h1>Submitted Entry</h1>
            <p>Your Name (optional):<?= ' ', $name?></p>
            <p>Course Title:<?= ' ', $track_name?></p>
            <p>Given Score (1-10):<?= ' ',$score?></p>
            <p>Reason:</p>
            <p><?= $description?></p>
            <a href="index.html">Return</a>
        </div>
    </body>
</html>