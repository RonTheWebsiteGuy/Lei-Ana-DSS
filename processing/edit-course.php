<?php

include("../includes/conn.php");

//add post values to variables
$cid =  $_POST['cid'];
$cname = $_POST['cname'];
$crn = $_POST['crn'];


// sql query
$sth = $conn->prepare("UPDATE Classes SET Class_Name = '" . $cname . "', crn = '" . $crn . "' WHERE ClassID = ". $cid);
$sth->execute();


?>
