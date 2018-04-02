<?php 

include("../includes/conn.php"); 



try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('UPDATE Majors SET Mname = $_POST['Mname'] WHERE MajorID = $_POST['MajorID'] ');
$sth->execute();


echo "<div class='msg'>Updated the record.</div>";


$conn = null;
}


catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

