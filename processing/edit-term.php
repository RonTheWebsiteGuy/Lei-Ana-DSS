<?php

include("../includes/conn.php");

//add post values to variables
$termid=  $_POST['termid'];
$termname = $_POST['termname'];



// sql query
$sth = $conn->prepare("UPDATE Terms SET Term = '" . $termname . "' WHERE TermID = ". $termid);
$sth->execute();


?>
