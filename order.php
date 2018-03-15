
<?php
include('dbconn.php');

	if(isset($_POST['add'])){
		$itemid = $_POST['itemid'];
		$qty = $_POST['qty'];
		$id = $_GET['id'];
		$it = getRecords("SELECT * FROM items WHERE itemid = '$itemid'");

		foreach ($it as $key) {

			$tem = $key['qty'];
			$temp =  $tem - $qty;
			$total = $qty * $key['price'];
			echo 'Database Qty: '.$tem.'<br>';
			echo 'New Qty: '.$temp.'<br>';
			echo $qty.'<br>';
			echo 'Database Price: '.$key['price'].'<br>';
			echo 'Total Price: '.$total.'<br>';
			echo 'Item ID'.$itemid.'<br>';
			echo 'Customer ID'.$id;

			$add = addRecord("INSERT INTO orders(custid,itemid,qty,price) VALUES('$id','$itemid','$qty','$total')");
			
			$update = addRecord("UPDATE items SET qty = '$temp' WHERE itemid = '$itemid'");	
			
		}
			
			echo '<script>alert("SUCESSFULLY ORDER AN ITEM"); window.location="viewcustomer.php?id='.$id.'";</script>';
	
	}
?>	
