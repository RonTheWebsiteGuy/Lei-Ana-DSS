<?php

include("../includes/conn.php");

//add post values to variables
$sid =  $_POST['sid'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];



// sql query
$sth = $conn->prepare("UPDATE Students SET Fname = '" . $fname . "', Lname = '" . $lname . "' WHERE StudentID = ". $sid );
$sth->execute();


?>