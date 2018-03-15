<?php
include('dbconn.php');

if(isset($_POST['edit'])){
	$id = trim(htmlentities($_POST['id']));
	$itname=trim(htmlentities($_POST['itname']));
	$price=trim(htmlentities($_POST['price']));
	$supplier=trim(htmlentities($_POST['supplier']));
	
	addRecord("UPDATE items SET itname='$itname',price='$price',supid='$supplier' where itemid=$id");
	//echo $fname,$lname,$gender,$date,$course,$cid;
	echo'<script> alert("Updated Successfully!"); window.location="viewitems.php";</script>';
}
$id=$_GET['id'];
$view = getRecords("select * from items i, suppliers s WHERE i.supid = s.supid and itemid=$id");
foreach($view as $v){
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="id" value="<?php echo $v['itemid'];?>" readonly /><br>
<input type="text" name="itname" value="<?php echo $v['itname'];?>"><br>
<input type="number" name="price" value="<?php echo $v['price'];?>"><br>
<select name="supplier">
<?php 
	echo '<option value="'.$v['supid'].'">'.$v['sfname'].' '.$v['slname'].'</option>';
?>
</select><br>
<input type="submit" name="edit">
<a href="viewitems.php">Cancel</a>
</form>
</body>
</html>
<?php } ?>