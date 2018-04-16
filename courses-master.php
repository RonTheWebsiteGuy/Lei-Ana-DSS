<?php include('includes/conn.php'); ?>
<?php $title = "Course Master List"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#courses').DataTable({
    	paging: false
    });
});
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
			echo '<option name="id">'.$item[Class_Number].'</option>';
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
echo '<thead><tr><th>Number</th><th>Class Name</th><th></th></tr></thead><tbody>';

foreach ($sth2 as $item) {
	echo '<tr data-id="'. $item['ClassID'] . '">';
	echo '<td class="cnum"><a href="course.php?id='.$item['ClassID'].'">'.$item['Class_Number'].'</a></td>';
	echo '<td class="cname">'.$item['Class_Name'].'</td>';
	echo '<td>';
	echo '<button class="edit-course">Edit</button>';
	echo '<button class="remove-course">Remove</button>';
	echo '<button class="save-course hideit">Save</button>'; 
	echo '<button class="cancel-course hideit">Cancel</button>';
	echo '</td></tr>';
}
echo '</tbody></table>';


} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}



?>



<h3 id="add">Add Course</h3>
<div class="container_12">
	<div class="grid_4">
		Course Number<br>
		<input type="text" id="addcnum" required>
	</div>
	<div class="grid_4">
		Course Name<br>
		<input type="text" id="addcname" required>
	</div>
	<div class="grid_2">
		<button id="add-course">ADD COURSE</button>
	</div>
</div>




<?php


$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>
