<?php
include('dbconn.php');

if(isset($_POST['edit'])){
	$add = trim(htmlentities($_POST['add']));
	$id = trim(htmlentities($_POST['id']));
	$qty=trim(htmlentities($_POST['qty']));
	$temp = $qty + $add;
	
	addRecord("UPDATE items SET qty='$temp' where itemid=$id");
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
<input type="hidden" name="id" value="<?php echo $v['itemid'];?>" readonly /><br>
<input type="hidden" name="qty" value="<?php echo $v['qty'];?>" readonly ><br>
<input type="number" name="add" placeholder="add more quantity"><br>
<input type="submit" name="edit">
<a href="viewitems.php">Cancel</a>
</form>
</body>
</html>
<?php } ?>