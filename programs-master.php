<?php include('includes/conn.php'); ?>
<?php $title = "Programs Master List"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable({
    	paging: false
    });
} );
</script>

<h1><?php echo $title; ?></h1>



<?php //Attempt to pull table from db and display

echo '<table id="programs">';
echo '<thead>
        <tr>
          <th>Program Name</th>
          <th></th>
        </tr>
      </thead>
    <tbody>';

try {
//Gather all Major Information
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sth = $conn->prepare('SELECT * FROM Majors');
$sth->execute();

//Generate table
foreach ($sth as $item) {
  echo '<tr>';
  //echo '<td class="pid"><a href="program.php?id='.$item['MajorID'].'">'. $item['MajorID'] .'</td>';
  echo '<td class="Mname"><a href="program.php?id='.$item['MajorID'].'">'. $item['Mname'] .'</td>';
  echo '<td><button class="edit-program">Edit</button> <button class="remove-program">Remove</button> <button class="save-program hideit">Save</button> <button class="cancel-program hideit">Cancel</button></td>';
  echo '</tr>';
}

  echo '</tbody>
        </table>';
?>
<h3>Add Program</h3>
<div class="container_12">
	<div class="grid_8">
		Program Name</br>
		<input type="text" id="addMname">
	</div>
	<div class="grid_4">
		<button id="add-program">ADD PROGRAM</button>
	</div>
</div>

<?php

} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}






$conn = NULL; // kill connection data

?>






<?php include('includes/footer.php'); ?>
