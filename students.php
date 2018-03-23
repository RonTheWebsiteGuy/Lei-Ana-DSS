<?php //include('includes/conn.php'); ?>
<?php $title = "Students"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#students').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>

<table id="students">
<thead>
<tr><th>Student ID (PK)</th><th>LName</th><th>FName</th><th>Degree</th><th>Progress</th></tr>
</thead>
<tbody>
<tr><td>00000001</td><td>Asgard</td><td>Aaron</td><td>MSIS</td><td>0%</td></tr>
<tr><td>00000002</td><td>Beauchamp</td><td>Bobby</td><td>BBA</td><td>12%</td></tr>
<tr><td>00000003</td><td>Carter</td><td>Caroline</td><td>BSW</td><td>50%</td></tr>
<tr><td>00000004</td><td>Denoument</td><td>Denzel</td><td>--</td><td>0%</td></tr>
<tr><td>00000005</td><td>Eumaxolous</td><td>Euphrite</td><td>MSN</td><td>25%</td></tr>
</tbody>
<?php 
  //foreach($conn->query('SELECT * from FOO') as $row) {
    //    echo "<li>".$row[0]."</li>"; 
    //}
?>
</table>







<?php include('includes/footer.php'); ?>