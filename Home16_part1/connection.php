<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "reg_users";
//connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} echo "Connection succesfully";
echo "<br>";
?>



