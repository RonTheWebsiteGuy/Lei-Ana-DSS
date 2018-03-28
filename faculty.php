<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Student"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>



<?php 




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Students WHERE StudentID = '$_GET[id]'");
$sth->execute();




// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";

/*
[ClassID] => HR6400
[Class_Name] => Human Resource Management
[Class_Number] => 6400
[PrereqID] => 
*/

echo '<ul>';
foreach ($sth as $item) {
	echo '<li>Student ID: '. $item['StudentID'] .'</li>';
	echo '<li>Last Name: '. $item['Lname'] .'</li>';
	echo '<li>First Name: '. $item['Fname'] .'</li>';
	echo '<li>Program: '. $item['MajorID'] .'</li>';
	echo '<li>Concentration: '. $item['ConcentrationID']. '</li>';
}
echo '</ul>';

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>