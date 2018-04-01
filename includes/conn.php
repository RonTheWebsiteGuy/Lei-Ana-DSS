<?php
//set to exception mode
$dbname = 'Degree_Plan';
$host = 'is6120db.cg2tsjxicqqb.us-east-1.rds.amazonaws.com';
$dbname = 'Degree_Plan';
$port = 3306;
$user = 'ronster';
$pass = 'tidepodmarine';





try {
    $conn = new PDO("mysql:host=$host;port=$port; dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//try {
    $conn = new PDO("mysql:host=$host;port=$port; dbname=$dbname", $user, $pass);

//} catch(PDOException $e) {
///    echo "Connection failed: " . $e->getMessage();/
//}

?>
