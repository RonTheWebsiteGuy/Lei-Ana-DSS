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
echo "<tr><th>Student ID</th><th>LName</th><th>FName</th><th>Program</th><th></th></tr>";
echo "</thead>";
echo "<tbody>";

try {
//this is for generating data
$sth = $conn->prepare("SELECT * FROM Students JOIN Majors ON Students.MajorID = Majors.majorID WHERE Students.Status=0");
//this is for generating the major dropdown
$sql = "SELECT * FROM Majors";
$sth->execute();
// to run this multiple foreachs
$maj = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);


foreach ($sth as $item) {
	echo '<tr>';
	echo '<td class="sid"><a href="student.php?id='.$item['StudentID'].'">'. $item['StudentID'] .'</td>';
	echo '<td class="lname">'. $item['Lname'] .'</td>';
	echo '<td class="fname">'. $item['Fname'] .'</td>';
	echo '<td class="majorid"><span>'. $item['Mname'] .'</span><br><select class="hideit majselect" >';

	foreach ($maj as $item2) {
		echo '<option data-maj="'. $item2['MajorID'].'">'.$item2["Mname"].'</option>';
	}

	echo '</select></td>';
	//echo '<td>'. $item['ConcentrationID']. '</td>';
	//echo '<td>'. $item['MajorID'] .'</td>';
//	echo '<td>'. $item['ConcentrationID']. '</td>';
	echo '<td><button class="edit-student">Edit</button> <button class="remove-student">Remove</button> <button class="save-student hideit">Save</button> <button class="cancel-student hideit">Cancel</button></td>';
	echo '</tr>';
}
// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
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



$conn = null;

echo "</tbody>";
echo "</table>";
?>

<h3 id="add">Add Student</h3>
<div class="container_12">
	<div class="grid_2">
		Student ID<br>
		<input type="text" id="addsid" required>
	</div>
	<div class="grid_2">
		First Name<br>
		<input type="text" id="addfname" required>
	</div>
	<div class="grid_2">
		Last Name<br>
		<input type="text" id="addlname" required>
	</div>
	<div class="grid_4">
		Program Enrolled<br>
		<select type="select" id="addmajor" required>
			<option></option>
<?php	foreach ($maj as $item2) {
		echo '<option data-maj="'. $item['MajorID'].'">'.$item2["Mname"].'</option>';
	}
?>	</select>
	</div>
	<div class="grid_2">
		<button id="add-student">ADD STUDENT</button>
	</div>
</div>




<?php

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>

<?php  include('includes/footer.php'); ?>

<?php include('includes/footer.php'); ?>
