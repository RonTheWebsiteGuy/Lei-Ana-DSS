<?php include('includes/conn.php'); ?>
<?php $title = "Program Requirements"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>

<?php 

	

try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('SELECT * FROM Majors LEFT JOIN Required_Classes ON Majors.majorID = Required_Classes.majorID JOIN Classes ON Required_Classes.classID = Classes.classID ORDER BY Mname, Required_Classes.ClassID');

$sth->execute();


// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";


?>


<?php 

/*
[MajorID] => MAODC
[ConcentrationID] => 
[Mname] => Master of Arts in Organizational Development and Change
[ClassID] => HR6320
[Class_Name] => Global Human Resource Management
[Class_Number] => 6320
[PrereqID] => 
*/

$prev_major = ''; // set major variable
$current_major = 'x';

foreach ($sth as $item) {
	if($prev_major != $current_major) {
		echo "<h2>".$item['Mname']."</h2><ul>";
		$current_major = $item['Mname'];
	}	

	echo '<li><a href="course.php?id='.$item['ClassID'].'">'.$item['ClassID']."</a> - ".$item['Class_Name']."</li>";

	$prev_major = $item['Mname'];
	
	if($prev_major != $current_major) {
		echo "</ul>";	
	}

}




} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>