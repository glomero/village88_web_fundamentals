
<?php   if(isset($_GET['fname'])){
            $start_row = 1;
            $end_row = 50;
        }else{
            $start_row = ($_GET['page'] * $record_page) - $record_page;
            $end_row = $_GET['page'] * $record_page; 
        }
?>

data display here
        <h1>CSV file:</h1>
        <h2 class="file"><?= $_SESSION['fname'] ?></h2>
        <div class="container">
            <table>
                <thead>
<?php               foreach($column as $col)
                    {
?>                      <th><?= $col ?></th>
<?php               }
?>              </thead>                       
                <tbody>
<?php               for($row = $start_row; $row <= $end_row; $row++)
                    {
?>                      <tr>
<?php                       for($j = 0; $j < 11; $j++)
                            { ?> 
<?php                           if(!empty($records[$row][$j]))
                                {
?>                                  <td><?= $records[$row][$j] ?></td>          
<?php                           }else {break;} 
?>
<?php                        } 
?>                            
                        </tr>                        
<?php               }
?>
                </tbody>
        </table>
        </div>
        <!-- page link -->
        <div class="link">
            <p>Pages:</p>
<?php       for($index = 1; $index <= $total_pages; $index++)
            {
?>              <a href="exceltohtml.php?page=<?= $index ?>"><?= $index ?></a>
<?php       }
?>
        </div>
    </body>