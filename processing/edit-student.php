<?php

include("../includes/conn.php");

//add post values to variables
$sid =  $_POST['sid'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$majorid = $_POST['majorid'];


// sql query
$sth = $conn->prepare("UPDATE Students SET Fname = '" . $fname . "', Lname = '" . $lname . "', MajorID = '" .$majorid. "' WHERE StudentID = ". $sid );
$sth->execute();


?>