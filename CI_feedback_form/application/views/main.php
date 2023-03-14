<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback Form</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Feedback Form</h1>
            <form action="result" method="POST">
                <label>Your name (optional): <input type = "text" name = "name"></label>
                <label>Course Title:</label>
                <select class="tracks" name="courses">
                    <option value="PHP Track">PHP Track</option>
                    <option value="Web fundamental">Web fundamental</option>
                    <option value="JS">JS</option>
                    <option value="Ruby">Ruby</option>
                </select>
                <label>Given Score (1-10):</label>
                <select class="tracks" name="scores">
                    <option value="10">10</option>
                    <option value="68">6</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                <label>Reason:</label>
                <textarea rows="5" cols="50" name="description">
                </textarea>
                <input type="submit" class="btn" name="submit">
            </form>
            
        </div>
    </body>
</html>