<?php $title = "Degrees and Programs"; include('header.php'); ?>

<?php include('includes/conn.php'); ?>


<h1><?php echo $title; ?></h1>

<ul>
<?php 
  foreach($dbh->query('SELECT * from FOO') as $row) {
        echo "<li>".$row[0]."</li>"; 
    }
?>
</ul>








<?php include('footer.php'); ?>