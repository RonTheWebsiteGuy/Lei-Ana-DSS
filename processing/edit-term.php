<?php

include("../includes/conn.php");

//add post values to variables
$termid=  $_POST['termid'];
$termname = $_POST['termname'];
$termstart = $_POST['termstart'];
$termend = $_POST['termend']; 


// sql query
$sth = $conn->prepare("UPDATE Terms SET Term = '" . $termname . "', Start = '".$termstart."', End = '".$termend."' WHERE TermID = ". $termid);
$sth->execute();


?>
