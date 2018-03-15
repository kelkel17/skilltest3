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
<a href="viewitems.php">Go Back!</a>
<table>
<thead>
<tr>
<td>ID</td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>PRICE</td>
<td>SUPPLIER NAME</td>
</tr>
</thead>
<tbody>

<?php
include('dbconn.php');
$id=$_GET['id'];
$view = getRecords("select * from items i, suppliers s WHERE i.supid = s.supid and itemid=$id");

foreach($view as $v){
echo'<tr><td>'.$v['itemid'].'</td>';
echo'<td>'.$v['itname'].'</td>';
echo'<td>'.$v['qty'].'</td>';
echo'<td>'.$v['price'].'</td>';
echo'<td>'.$v['sfname'].''.$v['slname'].'</td>';
}
?>
</tbody>
</table>
</body>
</html>