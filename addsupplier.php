<?php
include('dbconn.php');

if(isset($_POST['addsup'])){
	
	$sfname=trim(htmlentities($_POST['sfname']));
	$slname=trim(htmlentities($_POST['slname']));
	$addr=trim(htmlentities($_POST['addr']));
	$number = RAND(100, 1000);
	addRecord("insert into suppliers(sfname,slname,addr,supnum) values('$sfname','$slname','$addr','$number')");
	echo'<script> alert("Added Successfully!"); window.location="viewsuppliers.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="sfname" placeholder="First Name" required><br>
<input type="text" name="slname" placeholder="Last Name" required><br>
<input type="text" name="addr" placeholder="Address" required><br>
<input type="submit" name="addsup">
<a href="viewsuppliers.php">Cancel</a>
</form>
</body>
</html>