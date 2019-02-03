<?php
$dbname = "home16_part2";
$conn = new Mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//first query
echo "1. Get all blocks from block table where theme is bartik and module is system" . "<br>";
$sql="SELECT * FROM `block`
WHERE block.theme LIKE 'bartik' AND block.module LIKE 'system'
ORDER BY block.bid";
$result = $conn->query($sql);;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo $row["bid"]. ", ". $row["module"]. ", " . $row["delta"] .  ", " . $row["theme"]  .  ", " . $row["status"]  .  ", " . $row["weight"]  .  ", " . $row["region"]  .  ", " . $row["custom"]  .  ", " . $row["visibility"]  .  ", " . $row["title"]  .  ", " . $row["cache"] ;
}
"<br>";
}
} else {
echo "0 results";
}
echo "<br>";
//second task
echo "2. Get nodes where type is delivery and all that made in october and title begins with 8046" . "<br>";
$sql = "SELECT title, type, created FROM `node` WHERE type = 'delivery' AND title LIKE '8046%' AND created BETWEEN 1538352000 AND 1541030399";
$result = $conn->query($sql);;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo " • Title " . $row["title"] . " • Type " . $row["type"] . " • Created " . $row["created"] . "<br>";
}
} else {
echo "0 results";
}
echo "<br>";
//third task
echo "3. Get user name and nodes that where published by user 'serhiy'(output username and email with each node). get last 20 nodes." . "<br>";
$sql = "SELECT node.nid, node.title, users.name, users.mail
FROM node
LEFT JOIN users ON node.uid = users.uid
WHERE users.uid = 3
ORDER BY node.created DESC
LIMIT 20";
$result = $conn->query($sql);;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo " • Node ID " . $row["nid"] . " • Node title " . $row["title"] . " • User name " . $row["name"] . " • User mail " . $row["mail"] . "<br>";
}
} else {
echo "0 results";
}
echo "<br>";
//fourth task
echo "4. Get all variable name that has cache word(cache_akjsgdkjag) but not (cache)(see variable table)" . "<br>";
$sql = "SELECT DISTINCT name FROM `variable` WHERE `name` LIKE 'cache!_%' ESCAPE '!'";
$result = $conn->query($sql);;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo " • Name variable " . $row["name"] . "<br>";
}
} else {
echo "0 results";
}
echo "<br>";
$conn->close();
?>