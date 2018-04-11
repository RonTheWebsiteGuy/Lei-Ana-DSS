<?php

include("../includes/conn.php");

//add post values to variables
$sid =  $_POST['sid'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$maj = $_POST['major'];


// sql query
$sth = $conn->prepare("UPDATE Students SET Fname = '" . $fname . "', Lname = '" . $lname . "' , MajorID = ". $maj." WHERE StudentID = ". $sid );
$sth->execute();


?>