<?php

include("../includes/conn.php");

//add post values to variables
$pid =  $_POST['pid'];
$mname = $_POST['mname'];




// sql query
$sth = $conn->prepare("UPDATE Majors SET mName = '" . $mname . "' WHERE majorID = ". $pid);
$sth->execute();


?>
