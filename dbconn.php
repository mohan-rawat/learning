
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "suraj";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}
else{
  echo "Connected successfully";
}
?>