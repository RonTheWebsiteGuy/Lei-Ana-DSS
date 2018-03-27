<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Course"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>



<?php 




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Classes WHERE ClassID = '$_GET[id]'");
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

echo "<table>";

foreach($sth as $item) {
	echo '<tr>';
	echo '<td>classID</td><td>'.$item[ClassID].'</td></tr>'; 
	echo '<td>className</td><td>'.$item[Class_Name].'</td></tr>';
	echo '<td>classNumber</td><td>'.$item[Class_Number].'</td></tr>';
	echo '<td>prerequisite</td><td>'.$item[PrereqID].'</td></tr>';
}

echo "</table>";

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>