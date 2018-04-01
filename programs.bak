<?php include('includes/conn.php'); ?>
<?php $title = "Programs"; include('includes/header.php'); ?>

<script>
jQuery(document).ready( function () {
    jQuery('#programs').DataTable();
} );
</script>

<h1><?php echo $title; ?></h1>


<?php  //Attempt to pull table from db and display
echo "<table id='programs'>";
echo "<thead>";
echo "<tr><th>Class Id</th><th>Major</th><th>Class Name</th><th>Class Number</th></tr>";
echo "</thead>";

echo "<tbody>";
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

try {
  $stmt = $conn->prepare("SELECT Required_Classes.ClassID, Required_Classes.MajorID, Classes.Class_Name, Classes.Class_Number
FROM Required_Classes
Join Classes ON Required_Classes.ClassID=Classes.ClassID
ORDER BY Required_Classes.MajorID, Required_Classes.ClassID ASC;");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</tbody>";
echo "</table>";
?>

<?php include('includes/footer.php'); ?>
