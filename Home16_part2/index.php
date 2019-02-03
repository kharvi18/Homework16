<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "home16";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//query1
echo "1 запрос";
echo "<br>";
$sql = "SELECT bid, module, delta FROM block WHERE theme LIKE 'bartik' AND module LIKE 'system'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "bid: " . $row["bid"]. " | module: " . $row["module"]. " | delta: " . $row["delta"]. "<br>";
    }
} else {
    echo "0 results";
}
//query2
echo "<br>";
echo "2 запрос";
echo "<br>";
$sql = "SELECT entity_type, bundle, field_date_value  FROM `field_data_field_date` WHERE field_data_field_date.field_date_value= '2018-06-18T00:00:00' AND field_data_field_date.bundle= 'delivery' AND field_data_field_date.entity_id>8
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "entity_type: " . $row["entity_type"]. " | bundle: " . $row["bundle"]. " | field_date_value: " . $row["field_date_value"]. "<br>";
    }
} else {
    echo "0 results";
}
//query3
echo "<br>";
echo "3 запрос";
echo "<br>";
$sql = "SELECT entity_type, bundle, field_driver_value FROM `field_data_field_driver` WHERE bundle = 'cars' and field_driver_value LIKE '%Сергей%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "entity_type: " . $row["entity_type"]. " | bundle: " . $row["bundle"]. " | field_driver_value: " . $row["field_driver_value"]. "<br>";
    }
} else {
    echo "0 results";
}

//query4
echo "<br>";
echo "4 запрос";
echo "<br>";
$sql = "SHOW tables like 'cache%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "tables: " . $row["Tables_in_test (cache%)"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>