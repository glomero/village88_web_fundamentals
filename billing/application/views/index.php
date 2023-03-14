<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Billing</title>
        <script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	title: {
		text: "Column Chart in jQuery CanvasJS"              
	},
	data: [              
	{
		// Change type to "doughnut", "line", "splineArea", etc.
		type: "column",
		dataPoints: [
<?php 
            foreach($total_charges as $total){
                    
?>          
            { label: "<?= $total['month'] ?>",  y: <?= $total['total_cost'] ?> },    

<?php            }
            
?>
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
    </head>
    <body>
        <div class="wrapper">
            <form action="/billings/process" method="post">
                From: <input type="date" name="date1" value="2011-01-01">
                To: <input type="date" name="date2" value="2011-12-31">
            </form>
            <div class="table">
                <p>List of total charges per month:</p>
                <table>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Total Cost</th>
                    </tr>
<?php               foreach($total_charges as $total){
?>                  <tr>
                        <td><?= $total['month'] ?></td>
                        <td><?= $total['year'] ?></td>
                        <td><?= $total['total_cost'] ?></td>
                    </tr>    
<?php               }
?>                </table>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    </body>
</html>