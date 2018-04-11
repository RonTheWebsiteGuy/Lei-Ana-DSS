<?php include('includes/conn.php'); ?>
<?php $title = "View Individual Student"; include('includes/header.php'); ?>


<h1><?php echo $title; ?></h1>

<script>
jQuery(document).ready( function () {
    jQuery('#progress').DataTable({
		paging: false
	});
});
</script>


<?php 




try {

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT * FROM Students JOIN Majors ON Students.MajorID = Majors.MajorID WHERE StudentID = '$_GET[id]'");
$sth2 = $conn->prepare("SELECT * FROM Students JOIN Majors ON Students.MajorID = Majors.MajorID JOIN Required_Classes ON Majors.MajorID = Required_Classes.MajorID JOIN Classes ON Required_Classes.ClassID = Classes.ClassID WHERE StudentID = '$_GET[id]'");
$sth->execute();
$sth2->execute();



// USE THE BELOW TO DEBUG AND VIEW YOUR DB DATA AS AN ARRAY 
//$array = $sth2->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//print_r($array);
//echo "</pre>";

/*
            [StudentID] => 20202104
            [MajorID] => 3
            [ConcentrationID] => 
            [Fname] => Ron
            [Lname] => Lum
            [Mname] => Master of Science in Information Systems
            [ClassID] => 7
            [Class_Number] => IS6020
            [Class_Name] => Modern Methods in Project Management
            [PrereqID] => 
*/

echo '<div class="student-single">';


foreach ($sth as $item) {
	echo '<span>Student ID</span>'. $item['StudentID'] .'<br><br>';
	echo '<span>Last Name</span>'. $item['Lname'] .'<br><br>';
	echo '<span>First Name</span>'. $item['Fname'] .'<br><br>';
	echo '<span>Program</span>'. $item['Mname'] .'<br><br>';
	echo '<span>Concentration</span>'. $item['ConcentrationID']. '<br><br>';
}


echo "<hr>";


echo "<h2>Degree Progress</h2>";

echo "<table id='progress'>";
echo "<thead><tr>
<th>#</th>
<th>CourseID</th>
<th>Name</th>
<th>Passed?</th>
<th>Change Pass Status</th>
</tr></thead>";
echo "<tbody>";
foreach ($sth2 as $piece) {
	echo "<tr><td class='cnum'>".$piece['ClassID']."</td><td>". $piece['Class_Number'] ."</td><td>" . $piece['Class_Name'] . "</td><td></td><td>
	<select class='cselect'>
		<option value='NULL'>Not Taken</option>
		<option value='0'>Failed</option>
		<option value='1'>Credit</option>
	</select>
	
	
	</td></tr>";
}

echo "</tbody></table>";


echo '</div><!-- end .student-single-->';

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>