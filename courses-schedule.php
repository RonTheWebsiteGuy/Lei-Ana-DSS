<?php include('includes/conn.php'); ?>
<?php $title = "Courses By Term"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#schedule').DataTable({
		paging: false
	});
});
</script>

<h1><?php echo $title; ?></h1>


<?php  //Attempt to pull table from db and display
echo "<table id='schedule'>";
echo "<thead>";
echo "<tr><th>Schedule ID</th><th>Class ID</th><th>Class Name</th><th>Term</th><th>Class Length</th></tr>";
echo "</thead>";
echo "<tbody>";

try {
$sth = $conn->prepare("SELECT * FROM Schedule JOIN Classes ON Schedule.classID = Classes.classID JOIN Terms ON Schedule.termID = Terms.termID");
$sth->execute();

foreach ($sth as $item) {
	echo '<tr>';
	echo '<td>'. $item['ScheduleID'] .'</td>';
	echo '<td><a href="course.php?id='. $item['ClassID'] .'">'. $item['ClassID'] .'</a></td>';
	echo '<td>'. $item['Class_Name'] .'</td>';
	echo '<td>'. $item['Term']. '</td>';
	echo '<td>'. $item['Length']. '</td>';
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
