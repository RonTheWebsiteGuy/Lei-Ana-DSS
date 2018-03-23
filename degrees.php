<?php //include('includes/conn.php'); ?>
<?php $title = "Degrees and Programs"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>

<table id="programs">
<thead>
<tr><th>Program Name</th><th>Classification</th><th>Enrollment</th></tr>
</thead>
<tbody>
<tr><td>MSIS</td><td>Graduate</td><td>25</td></tr>
<tr><td>MBA</td><td>Graduate</td><td>50</td></tr>
<tr><td>BBA</td><td>Undergraduate</td><td>500</td></tr>
</tbody>
<?php 
  //foreach($conn->query('SELECT * from FOO') as $row) {
    //    echo "<li>".$row[0]."</li>"; 
    //}
?>
</table>







<?php include('includes/footer.php'); ?>