<?php

include("../includes/conn.php");

//add post values to variables
$pid =  $_POST['pid'];




// sql query
$sth = $conn->prepare("UPDATE Majors SET Status=1 WHERE MajorID = ". $pid);
$sth->execute();


?>
