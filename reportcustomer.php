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
<td>CUSTOMER NAME</td>
<!--<td>ITEM ID</td>
<td>ITEM NAME</td>-->
<td>Total Quantity Ordered</td>
<td>Total Payment</td>
</tr>
</thead>
<tbody>

<?php
include('dbconn.php');
$view = getRecords("SELECT sum(o.qty) as total, sum(o.price) as p, o.itemid, i.itname , c.fname, c.lname, i.price from orders o, items i, customers c where o.itemid = i.itemid AND o.custid = c.custid group by o.custid");
	
foreach($view as $v){
	echo'<tr><td>'.$v['fname'].' '.$v['lname'].'</td>';
//echo'<td>'.$v['itemid'].'</td>';
//echo'<td>'.$v['itname'].'</td>';
echo'<td>'.$v['total'].'</td>';
echo'<td>'.number_format($v['p'],2).'</td>';
}
	$total = getRecords("SELECT sum(price) as p FROM orders");
	foreach ($total as $row) {
		echo '<tr><td></td>';
		echo '<td><strong>Total: </strong></td>';
		echo '<td>'.number_format($row['p'],2).'</td></tr>';
	}
?>
</tbody>
</table>
</body>
</html>