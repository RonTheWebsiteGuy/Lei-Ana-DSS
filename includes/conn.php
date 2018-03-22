<?php 

$host = 'is6120db.cg2tsjxicqqb.us-east-1.rds.amazonaws.com';
$dbname = 'is6120db'; 
$port = 3306;
$user = 'ronster';
$pass = 'tidepodmarine';


//PDO here

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>