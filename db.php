
<?php

$host = 'db.fr-pari1.bengt.wasmernet.com';
$username = '80d1a626733280002194310178c5'; 
$password = '068d80d1-a627-7038-8000-1341c6ffb512'; 
$dbname = 'dbJWu5oVKJ7FHSDwiU828BjE'; 
$port= '10272';



// $host = 'localhost'; // Your database host (usually localhost)
// $username = 'root'; // Your database username (default is root for local server)
// $password = ''; // Your database password (default is empty for local server)
// $dbname = 'medical'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


