<?php

function connect(){
	global $dbconn;
	try{
		$dbconn=new PDO("mysql:host=localhost;dbname=stest","root","");		
	}catch(PDOException $e){
		echo'Connection Error :'.$e->getMessage();
	}
}

function addRecord($sql){
	global $dbconn;
	connect();
	try{
		$stmt=$dbconn->prepare($sql);
		$stmt->execute();
		$dbconn=null;
	}catch(PDOException $e){
		echo'Adding Error :'.$e->getMessage();
	}	
}

function getRecords($sql){
	global $dbconn;
	connect();
	try{
		$stmt=$dbconn->prepare($sql);
		$stmt->execute();
		$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbconn=null;
	}catch(PDOException $e){
		echo'SQL Error :'.$e->getMessage();
	}	
	return $rows;
}
?>