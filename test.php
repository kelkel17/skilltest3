
<?php
include('dbconn.php');
	$id=$_GET['id'];

	if(isset($_POST['add'])){
		$item = $_POST['item'];
		$qty = $_POST['test'];
			$data = array();
			foreach ($item as $check) {
				$it = getRecords("SELECT * FROM items WHERE itemid = '$check' GROUP BY itemnum ");
					foreach($qty as $k){
							foreach ($it as $key) {
										//$data[] = $key['price'];

										echo 'Inputed Item: '.$check.'<br>';
										echo 'Inputed Quantity: '.$k.'<br>';
							
						
										$data = $key['qty'];
										$temp =  $data - $k;
										$total = $k * $key['price'];
										echo 'Database Qty: '.$data.'<br>';
										echo 'Database Price: '.$key['price'].'<br>';
										echo 'New Qty: '.$temp.'<br>';
										echo 'Total Price: '.$total.'<br>';
										echo '<br>';			
		//	$add = addRecord("INSERT INTO orders(custid) VALUES('$id')");
		//	if($add){
					//$addt = addRecord("INSERT INTO order_details(itemid,orderid,qty,total_price) VALUES('$check','$add','$temp','$total')");
		//			if($addt){
					//	$update = addRecord("UPDATE items SET qty = '$temp' WHERE itemid = '$check'");
					}	
				}
			}
			//}
		//}
			
			//echo '<script>alert("SUCESSFULLY ORDER AN ITEM"); window.location="viewcustomer.php?id='.$id.'";</script>';
	
	}
?>	
