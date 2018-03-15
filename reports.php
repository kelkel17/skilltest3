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
<a href="index.php">Go Back!</a><br>
<a href="reports.php">Reports by Total Sales & Total Sold Product per Supplier</a><br>
<a href="reportitem.php">Reports by Total Sales & Total Sold Product per Item</a><br>
<a href="reportcustomer.php">Reports by Total Sales & Total Sold Product per Customer</a><br><br>
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
$view = getRecords("SELECT sum(o.qty) as total, o.itemid, i.itname , c.sfname, c.slname, i.price from orders o, items i, suppliers c where o.itemid = i.itemid AND i.supid = c.supid group by i.supid");
	
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