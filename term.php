<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Term"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>
<script>
jQuery(document).ready( function () {
    jQuery('#scheduled').DataTable({
		paging: false
	});
});
</script>



<?php 




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Terms WHERE TermID = '$_GET[id]'");
$sth->execute();
$sth2 = $conn->prepare("SELECT * FROM Schedule JOIN Classes ON Schedule.ClassID = Classes.ClassID WHERE TermID = '$_GET[id]' ");
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
<?php foreach ($sth as $item) { ?>
	
	<span>ID</span>
	<?php echo $item['TermID']; ?>
	
	<span>Term Name</span>
	<?php echo $item['Term']; ?>
	
	<span>Start Date</span>
	<?php echo $item['Start']; ?>
	
	<span>End Date</span>
	<?php echo $item['End']; ?>
	
	<span>Note</span>
	<?php echo $item['Note']; ?>
	
<?php } ?>
</div>

<hr>

<h2>Classes Offered This Term</h2>



<table id="scheduled">
	<thead>
	<tr>
		<th>CRN</th>
		<th>Class Number</th>
		<th>Class Name</th>
	</tr>
	</thead>
	<?php 
	
	foreach ($sth2 as $item) { 
		
		echo "<tr>";
		echo "<td>".$item['CRN']."</td>"; 
		echo "<td>".$item['Class_Number']."</td>"; 
		echo "<td>".$item['Class_Name']."</td>"; 
		echo "</tr>";

	
	 } 
	 
	 ?>


</table>














	
<?php 

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>