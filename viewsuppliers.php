<?php
include('dbconn.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
	addRecord("delete from suppliers where supid=$id");
	echo'<script> alert("Deleted Successfully!"); window.location="viewsuppliers.php";</script>';
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
<a href="index.php">Go Back!</a>
<a href="addsupplier.php">Add Supplier</a>
<form method="POST" action="search.php">
<input type="text" name="serch" placeholder="Search...">
<input type="submit" name="searchsup">
</form>
<table>
<thead>
<tr>
<td>ID</td>
<td>FIRST NAME</td>
<td>LAST NAME</td>
<td>ADDRESS</td>
<td>ACTION</td>
</tr>
</thead>
<tbody>
<?php
if(isset($_GET['lname'])){
	$lname = $_GET['lname'];

	$s = getRecords("SELECT * FROM suppliers WHERE slname = '$lname'");
		if($s != ''){
			if(count($s) > 0){
				foreach($s as $d){
					echo'<tr><td>'.$d['supnum'].'</td>';
					echo'<td>'.$d['sfname'].'</td>';
					echo'<td>'.$d['slname'].'</td>';
					echo'<td>'.$d['addr'].'</td>';

					echo'<td><a href="viewsupplier.php?id='.$d['supid'].'">VIEW</a>
					|| <a href="editsupplier.php?id='.$d['supid'].'">EDIT</a>
					|| <a href="viewsuppliers.php?id='.$d['supid'].'">DELETE</a></td></tr>';

				}
			}elseif(count($s) < 0 || $lname != $s){
				echo 'No Record Found';
			}	
		} if($lname == ''){
				$view = getRecords("select * from suppliers");

				foreach($view as $v){
					echo'<tr><td>'.$v['supnum'].'</td>';
					echo'<td>'.$v['sfname'].'</td>';
					echo'<td>'.$v['slname'].'</td>';
					echo'<td>'.$v['addr'].'</td>';
					echo'<td><a href="viewsupplier.php?id='.$v['supid'].'">VIEW</a>
					|| <a href="editsupplier.php?id='.$v['supid'].'">EDIT</a>
					|| <a href="viewsuppliers.php?id='.$v['supid'].'">DELETE</a></td></tr>';
				}	

			}
		}
		
		if(!(isset($_GET['lname']))){		
			$view = getRecords("select * from suppliers");

			foreach($view as $v){
				echo'<tr><td>'.$v['supnum'].'</td>';
				echo'<td>'.$v['sfname'].'</td>';
				echo'<td>'.$v['slname'].'</td>';
				echo'<td>'.$v['addr'].'</td>';
				echo'<td><a href="viewsupplier.php?id='.$v['supid'].'">VIEW</a>
				|| <a href="editsupplier.php?id='.$v['supid'].'">EDIT</a>
				|| <a href="viewsuppliers.php?id='.$v['supid'].'">DELETE</a></td></tr>';
			}
		}	


?>
</tbody>
</table>
</body>
</html>