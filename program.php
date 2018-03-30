<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Program"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>



<?php 




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Majors LEFT JOIN Concentrations ON Majors.MajorID = Concentrations.MajorID WHERE Majors.MajorID = '$_GET[id]'");
$sth->execute();




//// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";

/*
[ClassID] => HR6400
[Class_Name] => Human Resource Management
[Class_Number] => 6400
[PrereqID] => 


[MajorID] => MSIS
[ConcentrationID] => 
[Mname] => Master of Science in Information Systems
[MajorID] => MBA
[ConcentrationID] => INTB
[Mname] => Master of Business Administration
[Cname] => International Business
*/



$count = 0;
foreach($sth as $item) {
	if ($count==0){
		echo '<ul>';
		echo '<li>Program ID: '. $item['MajorID'] .'</li>';
		echo '<li>Program Name: '. $item['Mname'] .'</li>';
		echo '<li>Concentrations: </li>';
		echo '<ul>';
		$count = 1;
	}
	
	echo '<li>'. $item['Cname'] .'</li>';
	
}
echo "</ul></ul>";

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>