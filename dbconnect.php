<?php
 $servername = "Is6120db.cg2tsjxicqqb.us-east-1.rds.amazonaws.com";
 $dbname = "Degree_Plan";
 $user = "lag";
 $password = "bearCatGo39!@";
 $port = 3306;

	try{

		$db_con = new PDO("mysql:host={$servername};port={$port}; dbname={$dbname}",$user,$password);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
