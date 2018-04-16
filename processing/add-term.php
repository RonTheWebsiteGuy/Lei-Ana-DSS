<?php

include("../includes/conn.php");


//add post values to variables
$name = $_POST['termname'];
$start = $_POST['termstart'];
$end = $_POST['termend'];

echo $start;

// sql query
$sth = $conn->prepare("INSERT INTO Terms (Term, Start, End) VALUES ( '" . $name. "' , " . $start . ", " . $end . " ) ");
$sth->execute();



?>