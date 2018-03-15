<?php
include('dbconn.php');

if(isset($_POST['add'])){
	
	$fname=trim(htmlentities($_POST['fname']));
	$lname=trim(htmlentities($_POST['lname']));
	$gender=trim(htmlentities($_POST['gender']));
	$date=trim(htmlentities($_POST['date']));
	$course=trim(htmlentities($_POST['course']));
	$number = RAND(100, 1000);
	addRecord("insert into customers(fname,lname,gender,date,course,custnum) values('$fname','$lname','$gender','$date','$course','$number')");
	echo'<script> alert("Added Successfully!"); window.location="viewcustomers.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post">
<input type="text" name="fname" placeholder="First Name" required><br>
<input type="text" name="lname" placeholder="Last Name" required><br>
<input type="radio" name="gender" value="Male" required>Male
<input type="radio" name="gender" value="Female" required>Female<br>
<input type="date" name="date" required><br>
<select name="course" required>
<option value="bsit">BSIT</option>
<option value="bsba">BSBA</option>
<option value="bsce">BSCE</option>
</select><br>
<input type="submit" name="add">
<a href="viewcustomers.php">Cancel</a>
</form>
</body>
</html>