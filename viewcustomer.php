<?php
include('dbconn.php');
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
tr, td, th{
	border: 2px solid grey;
}
</style>
</head>
<body>
<a href="viewcustomers.php"> Go Back!</a>
<br/>
<table style="float:left;">
<thead>
<tr>
<td>ID</td>
<td>ITEM NAME</td>
<td>QUANTITY AVAILABLE</td>
<td>PRICE</td>
<td>SUPPLIER</td>
<td>Quantity to order</td>
<td>Add to cart</td>
</tr>
</thead>
<tbody>

<?php

	$s = getRecords("SELECT * FROM items i, suppliers s WHERE i.supid = s.supid");
				foreach($s as $d){
					echo'<tr><td>'.$d['itemnum'].'</td>';
					echo'<td>'.$d['itname'].'</td>';
					echo'<td>'.$d['qty'].'</td>';
					echo'<td>'.$d['price'].'</td>';
					echo'<td>'.$d['sfname'].' '.$d['slname'].'</td>';
?>
<form action="order.php?id=<?php echo $id; ?>" method="post"> 
		<input type="hidden" name="itemid" value="<?php echo $d['itemid'];?>">
		<td><input type="number" name="qty"></td>
		<td><input type="submit" name="add" value="Order Now"></td></tr>

</form>		
<?php } ?>
</tbody>
</table>
<table style="float:right;">
	<thead>
		<tr>
			<th>ID</th>
			<th>ITEM NAME</th>
			<th>SUPPLIER NAME</th>
			<th>PRICE PER ITEM</th>
			<th>TOTAL QTY</th>
			<th>TOTAL PRICE</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$order = getRecords("SELECT o.qty as qty, sum(o.qty) as quan, s.sfname, i.itemid as i,  s.slname, o.orderid, i.itname, i.price as p FROM orders o, items i, suppliers s WHERE o.itemid = i.itemid AND i.supid = s.supid AND o.custid = $id GROUP BY o.itemid");

			if(count($order) > 0){
				foreach ($order as $row) {

					$temp = $row['p'] * $row['qty'];
					
					echo '<tr><td>'.$row['i'].'</td>';
					echo '<td>'.$row['itname'].'</td>';
					echo '<td>'.$row['sfname'].' '.$row['slname'].'</td>';
					echo '<td>'.$row['p'].'</td>';
					echo '<td>'.$row['quan'].'</td>';
					echo '<td>'.number_format($temp,2).'</td></tr>';

				}
				$total = getRecords("SELECT sum(price) as price FROM orders WHERE custid = $id");
				foreach ($total as $row) {
				
					echo '<tr><td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td><strong>Total:</strong></td>';
					echo '<td>'.number_format($row['price'],2).'</td></tr>';
				}	

			}else{
					echo '<tr><td>No Record</td>';
					echo '<td>No Record</td>';
					echo '<td>No Record</td>';
					echo '<td>No Record</td>';
					echo '<td>No Record</td></tr>';
			}	
		?>
	</tbody>
</table>
</body>
</html>