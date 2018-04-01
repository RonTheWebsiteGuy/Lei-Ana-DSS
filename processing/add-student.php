<?php

include("../includes/conn.php");

//add post values to variables

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$majorid = $_POST['majorid'];


// sql query
$sth = $conn->prepare("INSERT INTO Students (Fname, Lname, MajorID) VALUES ('".$lname."','".$fname."','".$majorid."') "); 
$sth->execute();

echo "added student";

?>