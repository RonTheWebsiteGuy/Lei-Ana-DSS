<?php include('includes/conn.php'); ?>
<?php $title = "Terms"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#terms').DataTable({
		paging: false
	});
});
</script>

<h1><?php echo $title; ?></h1>


<?php  //Attempt to pull table from db and display
echo "<table id='terms'>";
echo "<thead>";
echo '<tr><th>Term ID</th><th>Term Name</th><th>Start</th><th>End</th><th></th></tr>';
echo "</thead>";
echo "<tbody>";

try {
$sth = $conn->prepare("SELECT * FROM Terms");
$sth->execute();

foreach ($sth as $item) {
	echo '<tr>';
	echo '<td class="termid" data-id="'.$item["TermID"].'">'. $item["TermID"] .'</td>';
	echo '<td class="termname"><a href="term.php?id='.$item["TermID"].'">'. $item["Term"]. '</a></td>';
	echo '<td class="termstart">'.$item["Start"].'</td>';
	echo '<td class="termend">'.$item["End"].'</td>'; 
//	echo '<td class="termnote">'.$item['Note'].'</td>';
	echo '<td><button class="edit-term">Edit</button> <button class="remove-term">Remove</button><button class="save-term hideit">Save</button><button class="cancel-term hideit">Cancel</button>';
	echo '</tr>';
}

echo "</tbody>";
echo "</table>";


?>


<h3 id="add">Add Term</h3>
<div class="container_12">
	<div class="grid_3">
		Term Name<br>
		<input type="text" id="addname" required>
	</div>
	<div class="grid_3">
		Start Date<br>
		<input type="date" id="addstart" required>
	</div>
	<div class="grid_3">
		End Date<br>
		<input type="date" id="addend" required>
	</div>
	<div class="grid_3">
		<button id="add-term">ADD TERM</button>
	</div>
</div>

<?php 
//USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";



/* FIELDS
            [ScheduleID] => 1
            [ClassID] => IS6005
            [TermID] => F18
            [Date] => 2018-03-20
            [Start_Time] => 2018-08-27
            [Length] => 15 weeks
            [Class_Name] => Information Systems Management
            [Class_Number] => 6005
            [PrereqID] => MIS3060
            [Term] => Fall 18
*/



	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<?php include('includes/footer.php'); ?>
