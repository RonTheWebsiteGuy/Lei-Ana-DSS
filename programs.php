<?php include('includes/conn.php'); ?>
<?php $title = "Programs"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>

<table id="programs">
<thead>
<tr><th>CRN (PK)</th><th>Subject</th><th>Course#</th><th>Section</th><th>Term</th><th>Enrolled</th></tr>
</thead>
<tbody>
<tr><td>1397</td><td>ECON</td><td>6000</td><td>A</td><td>Fall 2018</td><td>10</td></tr>
<tr><td>2815</td><td>FIN</td><td>6000</td><td>A</td><td>Fall 2018</td><td>10</td></tr>
<tr><td>3396</td><td>FIN</td><td>6300</td><td>A</td><td>Fall 2018</td><td>10</td></tr>
<tr><td>2328</td><td>HR</td><td>6300</td><td>A</td><td>Fall 2018</td><td>10</td></tr>
<tr><td>3192</td><td>HR</td><td>6320</td><td>OE</td><td>Fall 2018</td><td>10</td></tr>
<tr><td>9999</td><td>IS</td><td>9999</td><td>A</td><td>Spring 2099</td><td>0</td></tr>
</tbody>
<?php
  //foreach($conn->query('SELECT * from FOO') as $row) {
    //    echo "<li>".$row[0]."</li>";
    //}
?>
</table>







<?php include('includes/footer.php'); ?>
