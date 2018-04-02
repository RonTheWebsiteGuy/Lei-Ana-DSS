<?php

include("../includes/conn.php");

//add post values to variables
$cid =  $_POST['cid'];
$cname = $_POST['cname'];
$cnumber = $_POST['cnumber'];
$pid = $_POST['pid'];
$crn = $_POST['crn'];

// sql query
$sth = $conn->prepare("UPDATE Classes SET Class_Name = '" . $cname . "', crn = '" . $crn . "', Class_Number = '" . $cnumber . "', 
PrereqID = '" . $pid . "' WHERE ClassID = ". $cid);
$sth->execute();


?>
