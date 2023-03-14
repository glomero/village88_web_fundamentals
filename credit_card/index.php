<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
<?php
    $users = array( 
        array('cardholder_name'=> "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> "John Supsupin",'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123'),
        array('cardholder_name'=> "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name'=> "John Supsupin",'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name'=> "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123')
    );
?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name in uppercase</th>
                    <th>Account Num</th>
                    <th>CVC Num</th>
                    <th>Full account</th>
                    <th>Length of full account</th>
                    <th>Is valid</th>
                </tr>
<?php for ($index = 0; $index < count($users); $index++):?>
                <tr <?=(($index + 1) % 3 == 0) ? 'class="bg-highlight"' : '' ?>>
                    <td><?= $index+1?></td>
                    <td><?= $users[$index]['cardholder_name'] ?></td>
                    <td><?= strtoupper($users[$index]['cardholder_name']) ?></td>
                    <td><?= $users[$index]['acc_num'] ?></td>
                    <td><?= $users[$index]['cvc'] ?></td>
                    <td><?= $users[$index]['acc_num'] . $users[$index]['cvc']?></td>
                    <td><?= strlen($users[$index]['acc_num'])?></td>
                    <td><?= (strlen($users[$index]['acc_num']) == 19)? 'Yes' : 'No'?></td>
                </tr>
<?php endfor; ?>
            </table>
        </div>
    </body>
</html>