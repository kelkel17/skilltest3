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
<table>
<thead>
<tr>
<td>DATE</td>
<td>Total Quantity Sold</td>
<td>Total Sales</td>
</tr>
</thead>
<tbody>

<?php
include('dbconn.php');
$view = getRecords("select sum(o.qty) as total, o.itemid, i.itname , i.price, o.ordate from orders o, items i where o.itemid = i.itemid group by o.ordate");
	
foreach($view as $v){
	$temp = $v['total'] * $v['price'];
echo'<tr><td>'.date('F j, Y', strtotime($v['ordate'])).'</td>';
echo'<td>'.$v['total'].'</td>';
echo'<td>'.$temp.'</td></tr>';
}
?>
</tbody>
</table>
</body>
</html>