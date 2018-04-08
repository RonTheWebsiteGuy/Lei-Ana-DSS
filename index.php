<?php include("includes/conn.php"); ?>
<?php $title = "Lei Ana DSS"; include("includes/header.php"); ?>

<h1>Lei Ana DSS</h1>
<p>Welcome to the HPU academic advising Decision Support System.</p>



<?php

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare("SELECT COUNT(*) FROM Students;");
$sth->execute();
$result = $sth->fetchColumn();

$sth2 = $conn->prepare("SELECT COUNT(*) FROM Majors;");
$sth2->execute();
$result2 = $sth2->fetchColumn();


$sth3 = $conn->prepare("SELECT COUNT(*) FROM Classes;");
$sth3->execute();
$result3 = $sth3->fetchColumn();


//$sth4 = $conn->prepare("SELECT COUNT(*) FROM Faculty;");
//$sth4->execute();
//$result4 = $sth4->fetchColumn();

$sth5 = $conn->prepare("SELECT COUNT(*) FROM Terms;");
$sth5->execute();
$result5 = $sth5->fetchColumn();




?>




<hr>

<div class="container_12">
	<div class="grid_6">
		<h2>Basic Stats</h2>
		Students: <?php echo $result; ?><br>
		Programs: <?php echo $result2; ?><br>
		Courses: <?php echo $result3; ?><br>
		Faculty: <?php //echo $result4; ?><br>
		Terms: <?php echo $result5; ?><br>
	</div>
	<div class="grid_6">
		<h2>Enrollment Breakdown</h2>
		<?php
			foreach ($sth6 as $item) {
				echo $item['MajorID']; 
				echo " - ";
				echo $item['COUNT(*)'];
			}

		?>
		<div id="piechart" style="width:450px; height:400px"></div>
	</div>
</div>

<hr>


<?php include("includes/footer.php"); ?>	