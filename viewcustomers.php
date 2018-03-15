<?php
include('dbconn.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
	addRecord("delete from customers where custid=$id");
	echo'<script> alert("Deleted Successfully!"); window.location="viewcustomers.php";</script>';
}
	
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
<a href="index.php"> Go Back!</a>

<a href="addcustomer.php">Add Customer!</a>
<form method="POST" action="search.php">
<input type="text" name="serch" placeholder="Search...">
<input type="submit" name="searchcus">
</form>
<table>
<thead>
<tr>
<td>ID</td>
<td>FIRST NAME</td>
<td>LAST NAME</td>
<td>GENDER</td>
<td>DATE</td>
<td>COURSE</td>
<td>ACTION</td>
</tr>
</thead>
<tbody>

<?php
if(isset($_GET['lname'])){
	$lname = $_GET['lname'];

	$s = getRecords("SELECT * FROM customers WHERE lname = '$lname'");
		if($s != ''){
			if(count($s) > 0){
				foreach($s as $d){
					echo'<tr><td>'.$d['custnum'].'</td>';
					echo'<td>'.$d['fname'].'</td>';
					echo'<td>'.$d['lname'].'</td>';
					echo'<td>'.$d['gender'].'</td>';
					echo'<td>'.date('F j, Y',strtotime($d['date'])).'</td>';
					echo'<td>'.$d['course'].'</td>';

					echo'<td><a href="viewcustomer.php?id='.$d['custid'].'">VIEW</a>
					|| <a href="editcustomer.php?id='.$d['custid'].'">EDIT</a>
					|| <a href="viewcustomers.php?id='.$d['custid'].'">DELETE</a></td></tr>';

				}
			}elseif(count($s) < 0 || $lname != $s){
				echo 'No Record Found';
			}	
		} if($lname == ''){
				$view = getRecords("select * from customers");

				foreach($view as $v){
					echo'<tr><td>'.$v['custid'].'</td>';
					echo'<td>'.$v['fname'].'</td>';
					echo'<td>'.$v['lname'].'</td>';
					echo'<td>'.$v['gender'].'</td>';
					echo'<td>'.date('F j, Y',strtotime($v['date'])).'</td>';
					echo'<td>'.$v['course'].'</td>';
					echo'<td><a href="viewcustomer.php?id='.$v['custid'].'">VIEW</a>
					|| <a href="editcustomer.php?id='.$v['custid'].'">EDIT</a>
					|| <a href="viewcustomers.php?id='.$v['custid'].'">DELETE</a></td></tr>';
				}	

			}
		}
		
		if(!(isset($_GET['lname']))){		
			$view = getRecords("select * from customers");

			foreach($view as $v){
				echo'<tr><td>'.$v['custid'].'</td>';
				echo'<td>'.$v['fname'].'</td>';
				echo'<td>'.$v['lname'].'</td>';
				echo'<td>'.$v['gender'].'</td>';
				echo'<td>'.date('F j, Y',strtotime($v['date'])).'</td>';
				echo'<td>'.$v['course'].'</td>';
				echo'<td><a href="viewcustomer.php?id='.$v['custid'].'">VIEW</a>
				|| <a href="editcustomer.php?id='.$v['custid'].'">EDIT</a>
				|| <a href="viewcustomers.php?id='.$v['custid'].'">DELETE</a></td></tr>';
			}
		}	


?>

</table>
</body>
</html>