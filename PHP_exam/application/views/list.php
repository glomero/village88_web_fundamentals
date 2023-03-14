
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignments</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    </head>
    <body>
    <table id="assignments">
        <h1><?= count($assignments) ?> Assignments</h1>
                <tr>
                    <th>Assignment</th>
                    <th>Sequence num</th>
                    <th>Level</th>
                    <th>Track</th>
                </tr>
                <!-- Loop through each assignments from the variable assignment that the controller passed -->
<?php	        foreach($assignments as $assignment){ ?>
                <tr>
                    <td><?=$assignment['assignments']?></td>
                    <td><?=$assignment['num']?></td>
                    <td><?=$assignment['level']?></td>
                    <td><?=$assignment['track']?></td>
                </tr>
<?php   } ?>
	</table>
    </body>
</html>
        