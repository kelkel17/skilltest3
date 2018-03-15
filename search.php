<?php
 	include ('dbconn.php');
	if(isset($_POST['searchcus'])){
		$serch=trim(htmlentities($_POST['serch']));
		$srch=getRecords("select * from customers where lname LIKE '%".$serch."%'");
	//	echo'<script> alert("Search Successfully!"); window.location="";</script>';	
		header('location: viewcustomers.php?lname='.$serch.'');
	}

	if(isset($_POST['searchsup'])){
		$serch=trim(htmlentities($_POST['serch']));
		$srch=getRecords("select * from suppliers where slname LIKE '%".$serch."%'");
	//	echo'<script> alert("Search Successfully!"); window.location="";</script>';	
		header('location: viewsuppliers.php?lname='.$serch.'');
	}

	if(isset($_POST['searchit'])){
		$serch=trim(htmlentities($_POST['serch']));
		$srch=getRecords("select * from items where itname LIKE '%".$serch."%'");
	//	echo'<script> alert("Search Successfully!"); window.location="";</script>';	
		header('location: viewitems.php?itname='.$serch.'');
	}
?>	