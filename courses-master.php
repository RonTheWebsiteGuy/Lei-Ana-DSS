<?php include('includes/conn.php'); ?>
<?php $title = "Course Master List"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#courses').DataTable({
    	paging: false
    });
} );
</script>

<h1><?php echo $title; ?></h1>



<?php 

	

try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('SELECT * FROM Classes');
$sth2 = $conn->prepare('SELECT * FROM Classes');
$sth->execute();
$sth2->execute();


?>

<form action="course.php" method="get">
	View Course Details: 
	<select name="id">
		<?php 
		foreach ($sth as $item) { 
			echo '<option name="id">'.$item[ClassID].'</option>';
		}; 		
		?>
	</select>
	<input type="submit" value="Look it up!">
</form>


<?php


// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
///print_r($array);
//echo "</pre>";


//
//[ClassID] => ACCT6000
//[Class_Name] => Accounting for Managers
//[Class_Number] => 6000
//[PrereqID] => ACCT2000


echo '<table id="courses">';
echo '<thead><tr><th>Class ID</th><th>Class Name</th><th>CRN</th></tr></thead><tbody>';

foreach ($sth2 as $item) {
	echo '<tr><td><a href="course.php?id='.$item['ClassID'].'">'.$item['ClassID'].'</a></td><td>'.$item['Class_Name'].'</td><td>CRN Here</td></tr>';
}	
echo '</tbody></table>';


} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>