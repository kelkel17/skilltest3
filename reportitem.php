<!DOCTYPE html>
<html>
<head>
<style>
tr, td{
	border: 2px solid grey;
}
</style>
</head>
<body>
<a href="reports.php">Go Back!</a>
<table>
<thead>
<tr>
<td>ID</td>
<td>ITEM NAME</td>
<td>Total Quantity Sold</td>
<td>Total per Item Sales</td>
</tr>
</thead>
<tbody>

<?php
include('dbconn.php');
$view = getRecords("SELECT sum(o.qty) as total, o.itemid, i.itname , i.price FROM orders o, items i WHERE o.itemid = i.itemid GROUP BY o.itemid");
	
foreach($view as $v){
	$temp = $v['total'] * $v['price'];
echo'<tr><td>'.$v['itemid'].'</td>';
echo'<td>'.$v['itname'].'</td>';
echo'<td>'.$v['total'].'</td>';
echo'<td>'.number_format($temp,2).'</td>';
}
$total = getRecords("SELECT sum(price) as p FROM orders");
foreach ($total as $row) {
			echo '<tr><td></td>';
			echo '<td></td>';
			echo '<td><strong>Total:</strong></td>';
			echo '<td>'.number_format($row['p'],2).'</td></tr>';
	}
?>
</tbody>
</table>
</body>
</html>