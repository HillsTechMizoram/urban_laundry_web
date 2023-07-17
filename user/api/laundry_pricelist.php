<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lmsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select data from table
$sql = "SELECT * FROM tblpricelist";
$result = mysqli_query($conn, $sql);

// Fetch data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Encode data in JSON format
$json = json_encode($data);

// Return JSON data
header('Content-Type: application/json');
echo $json;
?>
