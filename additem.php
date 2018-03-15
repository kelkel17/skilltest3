<?php
include('dbconn.php');

if(isset($_POST['additem'])){
	
	$itname=trim(htmlentities($_POST['itname']));
	$qty=trim(htmlentities($_POST['qty']));
	$price=trim(htmlentities($_POST['price']));
	$supplier=trim(htmlentities($_POST['supplier']));
	$number = RAND(100, 1000);
	addRecord("insert into items(itname,qty,price,supid,itemnum) values('$itname','$qty','$price','$supplier','$number')");
	echo'<script> alert("Added Successfully!"); window.location="viewitems.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="itname" placeholder="Item Name" required=""><br>
<input type="number" name="qty" placeholder="Quatity" required=""><br>
<input type="number" name="price" placeholder="Price" required=""><br>
<select name="supplier" required="">
<option value="">--SELECT SUPPLIER--</option>
<?php 
$supp = getRecords("select * from suppliers");

foreach($supp as $s){
	echo '<option value="'.$s['supid'].'">'.$s['sfname'].' '.$s['slname'].'</option>';
}
?>
</select>
<input type="submit" name="additem">
<a href="viewitems.php">Cancel</a>
</form>
</body>
</html>