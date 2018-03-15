<?php
include('dbconn.php');

if(isset($_POST['edit'])){
	$cid = trim(htmlentities($_POST['id']));
	$fname=trim(htmlentities($_POST['fname']));
	$lname=trim(htmlentities($_POST['lname']));
	$gender=trim(htmlentities($_POST['gender']));
	$date=trim(htmlentities($_POST['date']));
	$course=trim(htmlentities($_POST['course']));
	
	addRecord("UPDATE customers SET fname='$fname',lname='$lname',gender='$gender',date='$date',course='$course' where custid=$cid");
	//echo $fname,$lname,$gender,$date,$course,$cid;
	echo'<script> alert("Added Successfully!"); window.location="viewcustomers.php";</script>';
}
$id=$_GET['id'];
$view = getRecords("select * from customers where custid=$id");
foreach($view as $v){
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="id" value="<?php echo $v['custid'];?>" readonly /><br>
<input type="text" name="fname" placeholder="First Name" value="<?php echo $v['fname'];?>"><br>
<input type="text" name="lname" placeholder="Last Name"  value="<?php echo $v['lname'];?>"><br>
<input type="date" name="date" value="<?php echo $v['date'];?>"><br>
<?php
	if($v['gender'] == "Male"){
		echo'<input type="radio" name="gender" value="Male" checked>Male';
		echo'<input type="radio" name="gender" value="Female">Female<br>';
	}else{
		echo'<input type="radio" name="gender" value="Male">Male';
		echo'<input type="radio" name="gender" value="Female" checked>Female<br>';
	}
	echo'<select name="course">';
		if($v['course'] == "bsit"){
			echo'<option value="'.$v['course'].'" selected />BSIT</option>';
			echo'<option value="bsba">BSBA</option>';
			echo'<option value="bsce">BSCE</option>';
		}elseif($v['course'] == "bsba"){
			echo'<option value="bsit">BSIT</option>';
			echo'<option value="'.$v['course'].'" selected />BSBA</option>';
			echo'<option value="bsce">BSCE</option>';			
		}elseif($v['course'] == "bsce"){
			echo'<option value="bsit">BSIT</option>';
			echo'<option value="bsba"/>BSBA</option>';
			echo'<option value="'.$v['course'].'" selected>BSCE</option>';			
		}
	echo'</select><br>';
?>
<input type="submit" name="edit">
<a href="viewcustomers.php">Cancel</a>
</form>
</body>
</html>
<?php } ?>