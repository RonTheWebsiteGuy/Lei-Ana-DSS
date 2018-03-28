<?php include('includes/conn.php'); ?>
<?php $title = "Faculty"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#faculty').DataTable({
		paging: false
	});
});
</script>

<h1><?php echo $title; ?></h1>


<?php  //Attempt to pull table from db and display
echo "<table id='faculty'>";
echo "<thead>";
echo "<tr><th>Faculty ID</th><th>Name</th><th>Department</th></tr>";
echo "</thead>";
echo "<tbody>";

try {
$sth = $conn->prepare("SELECT * FROM Faculty");
$sth->execute();

foreach ($sth as $item) {
	echo '<tr>';
	echo '<td><a href="faculty.php?id='.$item['FacultyID'].'">'. $item['FacultyID'] .'</td>';
	echo '<td>'. $item['Lname'] .', '. $item['Fname'] .'</td>';
	echo '</tr>';
}
// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $stmt->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";



/* FIELDS
[StudentID] => 1
[MajorID] => MSIS
[ConcentrationID] => 
[Fname] => Alex
[Lname] => Wurzel
*/




	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</tbody>";
echo "</table>";
?>

<?php include('includes/footer.php'); ?>
