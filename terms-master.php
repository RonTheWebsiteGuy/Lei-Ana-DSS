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
echo '<tr><th>Term ID</th><th>Term Name</th><th></th></tr>';
echo "</thead>";
echo "<tbody>";

try {
$sth = $conn->prepare("SELECT * FROM Terms");
$sth->execute();

foreach ($sth as $item) {
	echo '<tr>';
	echo '<td class="termid" data-id="'.$item["TermID"].'"><a href="term.php?id='.$item["TermID"].'">'. $item['TermID'] .'</a></td>';
	echo '<td class="termname">'. $item['Term']. '</td>';
	echo '<td><button class="edit-term">Edit</button> <button class="remove-term">Remove</button><button class="save-term hideit">Save</button><button class="cancel-term hideit">Cancel</button>';
	echo '</tr>';
}

echo "</tbody>";
echo "</table>";
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
