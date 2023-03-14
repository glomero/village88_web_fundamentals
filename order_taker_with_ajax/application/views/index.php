<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/style.css">
        <title>Order taker</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script>
            $(document).ready(function(){
                //getting aall the orders when the users first request the page
                $.get('orders/index_html', function(res){
                    $('#orders').html(res);
                });
                $('form').submit(function(){
                    $.post('orders/create', $(this).serialize(), function(res){
                        $('#orders').html(res);
                    });
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <h3>Order Queue:</h3>
        <div id="orders"></div>
        <form action="orders/create" method="post">
            <input id="search" type="text" name="description" value="Type customer's order here">
            <input id="btn" type="submit" value="Submit">
        </form>
    </body>
</html>