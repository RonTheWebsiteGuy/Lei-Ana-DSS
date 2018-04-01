<?php include('includes/conn.php'); ?>
<?php $title = "Programs Master List"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable({
    	paging: false
    });
} );
</script>

<h1><?php echo $title; ?></h1>



<?php 

	

try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('SELECT * FROM Majors');
$sth->execute();


?>

<!--<form action="course.php" method="get">
	View Course Details: 
	<select name="id">
		<?php 
		//foreach ($sth as $item) { 
		//	echo '<option name="id">'.$item[ClassID].'</option>';
		//}; 		
		?>
	</select>
	<input type="submit" value="Look it up!">
</form>-->


<?php


// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY //
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";


/*
[MajorID] => MSIS
[ConcentrationID] => 
[Mname] => Master of Science in Information Systems
*/


echo '<table id="programs">';
echo '<thead><tr><th>Program ID</th><th>Program Name</th></tr></thead><tbody>';

foreach ($sth as $item) {
	echo '<tr><td><a href="program.php?id='.$item['MajorID'].'">'.$item['MajorID'].'</td><td>'.$item['Mname'].'</a></td></tr>';
}	
echo '</tbody></table>';


} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>