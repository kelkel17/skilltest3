<?php
include('dbconn.php');

if(isset($_POST['edit'])){
	$id = trim(htmlentities($_POST['id']));
	$sfname=trim(htmlentities($_POST['sfname']));
	$slname=trim(htmlentities($_POST['slname']));
	$addr=trim(htmlentities($_POST['addr']));
	
	addRecord("UPDATE suppliers SET sfname='$sfname',slname='$slname',addr='$addr' where supid=$id");
	//echo $fname,$lname,$gender,$date,$course,$cid;
	echo'<script> alert("Updated Successfully!"); window.location="viewsuppliers.php";</script>';
}
$id=$_GET['id'];
$view = getRecords("select * from suppliers where supid=$id");
foreach($view as $v){
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="id" value="<?php echo $v['supid'];?>" readonly /><br>
<input type="text" name="sfname" placeholder="First Name" value="<?php echo $v['sfname'];?>"><br>
<input type="text" name="slname" placeholder="Last Name"  value="<?php echo $v['slname'];?>"><br>
<input type="text" name="addr" value="<?php echo $v['addr'];?>"><br>
<input type="submit" name="edit">
<a href="viewsuppliers.php">Cancel</a>
</form>
</body>
</html>
<?php } ?>