<?php include('includes/conn.php'); ?>
<?php $title = "Degrees and Programs"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>
<!--
<table id="programs">
<thead>
<tr><th>Program Name</th><th>Classification</th><th>Enrollment</th></tr>
</thead>
<tbody>
<tr><td>MSIS</td><td>Graduate</td><td>25</td></tr>
<tr><td>MBA</td><td>Graduate</td><td>50</td></tr>
<tr><td>BBA</td><td>Undergraduate</td><td>500</td></tr>
</tbody>


</table>
-->
<?php 

	

try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('SELECT * FROM Required_Classes JOIN Classes ON Required_Classes.classID = Classes.classID');

$sth->execute();


// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";


?>

<table id="programs">
<tr><th>Prereq ID</th><th>Class ID</th><th>Major Id</th><th>Note</th></tr>
<?php 
foreach ($sth as $item) {
	echo "<tr>";
	echo "<td>";
	echo $item[0];
	echo "</td><td>";
	echo $item[1];
	echo "</td><td>";
	echo $item[2];
	echo "</td><td>";
	echo $item[3];
	echo "</td>";
}




} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>