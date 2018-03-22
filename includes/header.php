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
<script src="js/jquery-3.2.1.min.js"></script>
<!-- this will be the primary place to make scripts to keep our <head> clean-->
<script src="js/script.js"></script> 
<!-- data tables js-->
<script src="js/datatables.min.js"></script>
<!--Load the GOOGLE CHARTS API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<!-- MENU-->
<header id="header" class="container_12">
<nav id="nav">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Degrees</a></li>
		<li><a href="#">Faculty</a></li>
		<li><a href="#">Students</a></li>
		<li><a href="#">Course</a></li>
		<li><a href="#">Terms</a></li>
		<li><a href="#">Schedule</a></li>
		<li><a href="#">Logout</a></li>
	</ul>
</nav>
</header> 
<main id="main" class="container_12">