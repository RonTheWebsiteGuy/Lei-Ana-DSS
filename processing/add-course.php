<?php

include("../includes/conn.php");


//add post values to variables
//$cid = $_POST['cid'];
$cnum = $_POST['cnum'];
$cname = $_POST['cname'];

// sql query
$sth = $conn->prepare("INSERT INTO Classes (Class_Number, Class_Name) VALUES ( '" . $cnum. "' , '" . $cname . "' ) ");
$sth->execute();



?>