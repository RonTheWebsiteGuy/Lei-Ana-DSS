<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Course"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>

<script>
jQuery(document).ready( function () {
    jQuery('#classes').DataTable({
		paging: false
	});
});
</script>

<?php




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Classes WHERE ClassID = '$_GET[id]'");
$sth2 = $conn->prepare("SELECT * FROM Schedule JOIN Terms ON Schedule.TermID = Terms.TermID WHERE ClassID = '$_GET[id]'   ");
$sth->execute();
$sth2->execute();



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
?>

<div class="info">

<?php 
foreach($sth as $item) {
	echo '<span>Class Number</span>';
	echo $item['Class_Number'];
	echo '<br><br>';
	
	echo '<span>Class Name</span>';
	echo $item['Class_Name'];
	echo '<br><br>';
	
	echo '<span>Note</span>';
	echo $item['Note'];
	echo '<br><br>';
	
}


?>
</div>

<hr>

<h2>When is this class offered?</h2>

<table id="classes">
	<thead>
		<th>Term</th>
		<th>Term Date</th>
		<th>Class Time</th>
		<th>Meeting Day</th>
		<th>CRN</th>
	</thead>
<tbody>
<?php 

foreach ($sth2 as $item) {
	echo '<tr>';
	echo '<td>'. $item['Term'] . '</td>';
	echo '<td>'. $item['Start'] .' to '. $item['End'] . '</td>';

	echo '<td>'. $item['Start_Time'] .' to '. $item['End_Time'] . '</td>';
	
	echo '<td>'. $item['DayOfWeek'] .'</td>';
	echo '<td>'. $item['CRN'] .'</td>'; 
	echo '</tr>';
}

?>

</tbody></table>

<?php 

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>

