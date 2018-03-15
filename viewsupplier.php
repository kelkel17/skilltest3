<?php
include('dbconn.php');
$id=$_GET['id'];

?>
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
	
<table style="">

<a href="viewsuppliers.php">Go Back!</a>
<thead>
<tr>
<td>ID</td>
<td>FIRST NAME</td>
<td>LAST NAME</td>
<td>ADDRESS</td>
</tr>
</thead>
<tbody>

<?php
$view = getRecords("SELECT * from suppliers WHERE supid=$id");

foreach($view as $v){
echo'<tr><td>'.$v['supid'].'</td>';
echo'<td>'.$v['sfname'].'</td>';
echo'<td>'.$v['slname'].'</td>';
echo'<td>'.$v['addr'].'</td>';
}
?>
</tbody>
</table>
<h1><p style="padding-top: 150px;">Supplied Items</p></h1>
<table style="float:left;">

<thead>
<tr>
<td>ID</td>
<td>ITEM NAME</td>
<td>QUANTIY</td>
<td>PRICE</td>
<td>ESTIMATED SALES</td>
</tr>
</thead>
<tbody>

<?php
$view = getRecords("SELECT * from suppliers s, items i where s.supid = i.supid AND s.supid=$id");

foreach($view as $v){
	$temp = $v['qty'] * $v['price'];
	echo'<tr><td>'.$v['itemnum'].'</td>';
	echo'<td>'.$v['itname'].'</td>';
	echo'<td>'.$v['qty'].'</td>';
	echo'<td>'.number_format($v['price'], 2).'</td>';
	echo'<td>'.number_format($temp, 2).'</td>';
}
?>
</tbody>
</table>
</body>
</html>