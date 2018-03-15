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
<td>SUPPLIER NAME</td>
<!--<td>ITEM ID</td>
<td>ITEM NAME</td>-->
<td>Total Quantity Sold</td>
<td>Total Sales</td>
</tr>
</thead>
<tbody>

<?php
include('dbconn.php');
$view = getRecords("select sum(o.qty) as total, o.itemid, i.itname , c.sfname, c.slname, i.price from orders o, items i, suppliers c where o.itemid = i.itemid AND i.supid = c.supid group by i.supid");
	
foreach($view as $v){
	$temp = $v['total'] * $v['price'];
	echo'<tr><td>'.$v['sfname'].' '.$v['slname'].'</td>';
//echo'<td>'.$v['itemid'].'</td>';
//echo'<td>'.$v['itname'].'</td>';
echo'<td>'.$v['total'].'</td>';
echo'<td>'.$temp.'</td>';
}
?>
</tbody>
</table>
</body>
</html>