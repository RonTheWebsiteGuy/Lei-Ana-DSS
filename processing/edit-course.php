<?php

include("../includes/conn.php");

//add post values to variables
$cid =  $_POST['cid'];
$cnum = $_POST['cnum'];
$cname = $_POST['cname'];


// sql query
$sth = $conn->prepare("UPDATE Classes SET Class_Name = '" . $cname . "', Class_Number = '" . $cnum . "' WHERE ClassID = ". $cid);
$sth->execute();


?>
