<?php
include('dbconn.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
	addRecord("delete from items where itemid=$id");
	echo'<script> alert("Deleted Successfully!"); window.location="viewitems.php";</script>';
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

<a href="additem.php">Add Item!</a>
<form method="POST" action="search.php">
<input type="text" name="serch" placeholder="Search...">
<input type="submit" name="searchit">
</form>
<table>
<thead>
<tr>
<td>ID</td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>PRICE</td>
<td>SUPPLIER NAME</td>
<td>ACTION</td>
</tr>
</thead>
<tbody>
<?php
if(isset($_GET['itname'])){
	$lname = $_GET['itname'];

	$s = getRecords("SELECT * FROM items i, suppliers s WHERE i.supid = s.supid AND i.itname = '$lname'");
		if($s != ''){
			if(count($s) > 0){
				foreach($s as $d){
					echo'<tr><td>'.$d['itemnum'].'</td>';
					echo'<td>'.$d['itname'].'</td>';
					echo'<td>'.$d['qty'].'</td>';
					echo'<td>'.$d['price'].'</td>';
					echo'<td>'.$d['sfname'].''.$d['slname'].'</td>';

					echo'<td><a href="viewitem.php?id='.$d['itemid'].'">VIEW</a>
					|| <a href="edititem.php?id='.$d['itemid'].'">EDIT</a>
					|| <a href="viewitems.php?id='.$d['itemid'].'">DELETE</a>
					|| <a href="addqty.php?id='.$d['itemid'].'">ADD QUANTITY</a></td></tr>';

				}
			}elseif(count($s) <= 0 || $lname != $s){
				echo 'No Record Found';
			}	
		} if($lname == ''){
				$view = getRecords("select * from items i, suppliers s WHERE i.supid = s.supid");

				foreach($view as $v){
					echo'<tr><td>'.$v['itemnum'].'</td>';
					echo'<td>'.$v['itname'].'</td>';
					echo'<td>'.$v['qty'].'</td>';
					echo'<td>'.$v['price'].'</td>';
					echo'<td>'.$v['sfname'].''.$v['slname'].'</td>';

					echo'<td><a href="viewitem.php?id='.$v['itemid'].'">VIEW</a>
					|| <a href="edititem.php?id='.$v['itemid'].'">EDIT</a>
					|| <a href="viewitems.php?id='.$v['itemid'].'">DELETE</a>
					|| <a href="addqty.php?id='.$v['itemid'].'">ADD QUANTITY</a></td></tr>';
				}

			}
		}
		
		if(!(isset($_GET['itname']))){		
			$view = getRecords("select * from items i, suppliers s WHERE i.supid = s.supid");

				foreach($view as $v){
					echo'<tr><td>'.$v['itemnum'].'</td>';
					echo'<td>'.$v['itname'].'</td>';
					echo'<td>'.$v['qty'].'</td>';
					echo'<td>'.$v['price'].'</td>';
					echo'<td>'.$v['sfname'].''.$v['slname'].'</td>';

					echo'<td><a href="viewitem.php?id='.$v['itemid'].'">VIEW</a>
					|| <a href="edititem.php?id='.$v['itemid'].'">EDIT</a>
					|| <a href="viewitems.php?id='.$v['itemid'].'">DELETE</a>
					|| <a href="addqty.php?id='.$v['itemid'].'">ADD QUANTITY</a></td></tr>';
				}
		}	


?>


</tbody>
</table>
</body>
</html>