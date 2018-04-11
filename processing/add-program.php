<?php

include("../includes/conn.php");


//add post values to variables
$Mname = $_POST['Mname'];

// sql query
$sth = $conn->prepare("INSERT INTO Majors (Mname) VALUES ( '" . $Mname. "')");
$sth->execute();



?>
