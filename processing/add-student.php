<?php

include("../includes/conn.php");


//add post values to variables
$sid = $_POST['sid'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$major = $_POST['major'];


// sql query
$sth = $conn->prepare("INSERT INTO Students (StudentID, Fname, Lname, MajorID) VALUES ( '" . $sid. "' , '" . $fname . "', '" . $lname . "' , ". $major." ) ");
$sth->execute();



?>