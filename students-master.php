<?php include('includes/conn.php'); ?>
<?php $title = "Students"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#students').DataTable({
		paging: false
	});
});
</script>

<h1><?php echo $title; ?></h1>


<?php  //Attempt to pull table from db and display
echo "<table id='students'>";
echo "<thead>";
echo "<tr><th>Student ID</th><th>LName</th><th>FName</th><th>Program</th><th>Concentration</th><th></th></tr>";
echo "</thead>";
echo "<tbody>";

try {
$sth = $conn->prepare("SELECT * FROM Students");
$sth->execute();

foreach ($sth as $item) {
	echo '<tr>';
	echo '<td class="sid"><a href="student.php?id='.$item['StudentID'].'">'. $item['StudentID'] .'</td>';
	echo '<td class="lname">'. $item['Lname'] .'</td>';
	echo '<td class="fname">'. $item['Fname'] .'</td>';
	echo '<td>'. $item['MajorID'] .'</td>';
	echo '<td>'. $item['ConcentrationID']. '</td>';
	echo '<td><button class="edit-student">Edit</button> <button class="remove-student">Remove</button> <button class="save-student hideit">Save</button> <button class="cancel-student hideit">Cancel</button></td>';
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
