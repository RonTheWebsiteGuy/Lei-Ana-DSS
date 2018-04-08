<?php

include("../includes/conn.php");

//add post values to variables
$termid=  $_POST['termid'];
$termname = $_POST['termname'];



// sql query
$sth = $conn->prepare("UPDATE Terms SET TermID = '" . $termid . "', Term = '" . $termname . "' WHERE ClassID = ". $cid);
$sth->execute();


?>
