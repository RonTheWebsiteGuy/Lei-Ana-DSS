<!--
Project Name: Lei Ana Decision Support System (temporary name)
Group: Chin Cameron / Lum Ron / Mateo Blake / Shrestha Niju / Wurzel Alex
Developers: Came-Ron
Repository: https://github.com/ronlum/Lei-Ana-DSS
PM Page: https://trello.com/b/S5Q571K7/is6120-software-practicum (private)
Structure: not responsive, 960px grid
-->

<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--below is to tell robots to go away and request not index-->
<meta name="robots" content="noindex, nofollow">
<!-- dynamic title below -->
<title><?php echo $title; ?></title>
<!-- general, user customized stylesheet-->
<link rel="stylesheet" href="css/style.css">
<!-- stylesheet for our grid system 960px -->
<link rel="stylesheet" href="css/960_12_col.css">
<!-- data tables CSS-->
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/jquery-1.7.2.min.js"></script>
<!-- this will be the primary place to make scripts to keep our <head> clean-->
<script src="js/scripts.js"></script>
<!-- data tables js-->
<script src="js/datatables.min.js"></script>
<!--Load the GOOGLE CHARTS API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php 
// LOAD tHIS IF IT'S THE HOME PAGE
if (basename(__FILE__) == 'index.php') {  

//no need to set connection since include conn.php is b efore header
$sth6 = $conn->prepare("SELECT Students.MajorID, COUNT(*) FROM Students JOIN Majors ON Students.MajorID = Majors.MajorID GROUP BY MajorID;");
$sth6->execute();


	?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
<?php 
			foreach ($sth6 as $item) {
				echo "['".$item['MajorID']."', ".$item['COUNT(*)']."],";
			}
?>

        ]);

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data);
      }
</script>	
<?php } ?>



</head>
<body>

<!-- MENU-->
<header id="header" class="container_12">
<div id="logo"><h1>LEI ANA DSS</h1></div>
<nav id="nav">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="programs-master.php">Programs</a></li>
		<li><a href="programs-requirements.php">Program Requirements</a></li>
		<li><a href="faculty-master.php">Faculty</a></li>
		<li><a href="students-master.php">Students</a></li>
		<li><a href="courses-master.php">Courses</a></li>
		<li><a href="courses-schedule.php">Course Schedule</a></li>
		<li><a href="terms-master.php">Terms</a></li>
		<!--<li><a href="programs.php">Programs</a></li>-->
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>
</header>
<main id="main" class="container_12">
