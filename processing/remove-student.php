<?php

include("../includes/conn.php");

//add post values to variables
$sid =  $_POST['sid'];




// sql query
$sth = $conn->prepare("UPDATE Students SET Status=1 WHERE StudentID = ". $sid);
$sth->execute();


?>
