<?php
    session_start();
    $num_item_per_page = 50;
    ini_set("auto_detect_line_endings", true);
    //files info
    $file = fopen('upload/'.$_SESSION['file_name'], "r");
    $records = [];
    while(($column_names = fgetcsv($file)) !== false){
        $records[] = $column_names;
        
    }
    fclose($file);
    $_SESSION['records_arr'] = $records;
    $_SESSION['num_pages'] = (count($records) - 1) / $num_item_per_page;
    if((count($records) -1 ) % $num_item_per_page !== 0){
        $_SESSION['num_pages'] += 1;
    }

    if(isset($_GET['page'])){
        $_SESSION['page'] = $_GET['page'];
    }else{
        $_SESSION['page'] = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Data page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <table class="styled-table">
            <thead>
                <tr>   
<?php                for($i = 0; $i < count($_SESSION['records_arr'][0]); $i++)
                    { 
?>                      <th><?= $_SESSION['records_arr'][0][$i] ?></th>
<?php               } 
?>              </tr>
            </thead>
            <tr>
<?php 
            if($_SESSION['page'] == 1){
                $start_row = 1;
            }else{
                $start_row = (($_SESSION['page'] * $num_item_per_page ) + 1) - $num_item_per_page;
            }
            $end_row = $start_row + ($num_item_per_page - 1); 
?>              
            <tbody>
<?php               for($row = $start_row; $row <= $end_row; $row++)
                    {
?>                      <tr>
<?php                       for($j = 0; $j < 11; $j++)
                            { 
?> 
<?php                           if(!empty($records[$row][$j]))
                                {
?>                                  <td><?= $records[$row][$j] ?></td>          
<?php                           }else {break;} 
?>
<?php                        } 
?>                            
                        </tr>                        
<?php               }
?>          </tbody>
        </table>
        <!-- pagination  -->
        <div class="pagination_section">
<?php       for($index = 1; $index <= $_SESSION['num_pages']; $index++)
            {
?>              <a href="exceltohtml.php?page=<?= $index ?>"><?= $index ?></a>
<?php       }
?>      </div>
    </body>
</html>
